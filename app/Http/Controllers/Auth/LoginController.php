<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpCode;
use App\Models\User;
use App\Services\FonnteClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Throwable;

class LoginController extends Controller
{
    private const ADMIN_PANEL_PERMISSION = 'access admin panel';

    private const VOTING_PERMISSION = 'access voting';

    private const VOTING_REGISTER_OTP_PURPOSE = 'voting_register';

    private const OTP_TTL_MINUTES = 5;

    private const OTP_MAX_ATTEMPTS = 5;

    private const OTP_RESEND_COOLDOWN_SECONDS = 60;

    public function staff(Request $request): View|RedirectResponse
    {
        if (! $request->user()) {
            return view('auth.staff-login');
        }

        if ($request->user()->can(self::ADMIN_PANEL_PERMISSION)) {
            return redirect()->route('admin.dashboard');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function voting(Request $request): View|RedirectResponse
    {
        if (! $request->user()) {
            return view('auth.voting-login');
        }

        if ($request->user()->can(self::VOTING_PERMISSION)) {
            return redirect()->route('voting');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.voting-login');
    }

    public function authenticateStaff(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $this->attemptLogin(
            $request,
            ['email' => $credentials['email'], 'password' => $credentials['password']],
            self::ADMIN_PANEL_PERMISSION,
            $request->boolean('remember'),
            'email',
        );

        return redirect()->route('admin.dashboard');
    }

    public function authenticateVoting(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'phone' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $this->attemptLogin(
            $request,
            ['phone' => $credentials['phone'], 'password' => $credentials['password']],
            self::VOTING_PERMISSION,
            $request->boolean('remember'),
            'phone',
        );

        return redirect()->intended(route('voting'));
    }

    public function registerVoting(Request $request, FonnteClient $fonnte): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/', Rule::unique('users', 'phone')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.min' => __('Password minimal 8 karakter.'),
            'password.confirmed' => __('Password tidak sama.'),
        ]);

        $this->ensureOtpCanBeResent($validated['phone']);

        try {
            $otpCode = $this->sendVotingRegistrationOtp(
                $fonnte,
                $validated['phone'],
                $validated['name'],
                Hash::make($validated['password']),
            );
        } catch (Throwable $exception) {
            report($exception);

            throw ValidationException::withMessages([
                'phone' => __('OTP gagal dikirim. Pastikan device Fonnte aktif lalu coba lagi.'),
            ]);
        }

        $request->session()->put('voting_register_otp_id', $otpCode->id);

        return response()->json([
            'message' => __('Kode OTP registrasi sudah dikirim ke WhatsApp Anda.'),
            'cooldown_seconds' => self::OTP_RESEND_COOLDOWN_SECONDS,
        ]);
    }

    public function resendVotingRegistrationOtp(Request $request, FonnteClient $fonnte): JsonResponse
    {
        $pendingOtp = $this->pendingVotingRegistrationOtp($request);

        if (! $pendingOtp) {
            throw ValidationException::withMessages([
                'otp' => __('Data registrasi tidak ditemukan. Silakan isi form register lagi.'),
            ]);
        }

        $this->ensureOtpCanBeResent($pendingOtp->phone);

        try {
            $otpCode = $this->sendVotingRegistrationOtp(
                $fonnte,
                $pendingOtp->phone,
                (string) $pendingOtp->name,
                (string) $pendingOtp->password_hash,
            );
        } catch (Throwable $exception) {
            report($exception);

            throw ValidationException::withMessages([
                'otp' => __('OTP gagal dikirim. Pastikan device Fonnte aktif lalu coba lagi.'),
            ]);
        }

        $request->session()->put('voting_register_otp_id', $otpCode->id);

        return response()->json([
            'message' => __('Kode OTP baru sudah dikirim ke WhatsApp Anda.'),
            'cooldown_seconds' => self::OTP_RESEND_COOLDOWN_SECONDS,
        ]);
    }

    public function verifyVotingRegistrationOtp(Request $request): JsonResponse
    {
        $pendingOtp = $this->pendingVotingRegistrationOtp($request);

        if (! $pendingOtp) {
            throw ValidationException::withMessages([
                'otp' => __('Data registrasi tidak ditemukan. Silakan isi form register lagi.'),
            ]);
        }

        $validated = $request->validate([
            'otp' => ['required', 'digits:4'],
        ], [
            'otp.required' => __('Kode OTP harus diisi.'),
            'otp.digits' => __('Kode OTP harus 4 digit.'),
        ]);

        if (! $this->verifyVotingOtp($pendingOtp, $validated['otp'])) {
            throw ValidationException::withMessages([
                'otp' => __('Kode OTP tidak valid atau sudah kedaluwarsa.'),
            ]);
        }

        if (User::query()->where('phone', $pendingOtp->phone)->exists()) {
            throw ValidationException::withMessages([
                'otp' => __('Nomor HP sudah terdaftar. Silakan login.'),
            ]);
        }

        $votingPermission = Permission::findOrCreate(self::VOTING_PERMISSION, 'web');
        $voterRole = Role::findOrCreate('voter', 'web');
        $voterRole->givePermissionTo($votingPermission);

        $user = User::query()->create([
            'name' => (string) $pendingOtp->name,
            'phone' => (string) $pendingOtp->phone,
            'email' => sprintf('voter+%s@superband.local', $pendingOtp->phone),
            'password' => (string) $pendingOtp->password_hash,
        ]);

        $user->assignRole($voterRole);

        Auth::login($user);
        $request->session()->forget('voting_register_otp_id');
        $request->session()->regenerate();

        return response()->json([
            'message' => __('Registrasi berhasil.'),
            'redirect_url' => route('voting'),
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    private function normalizePhoneForWhatsapp(string $phone): string
    {
        $phone = preg_replace('/\D+/', '', $phone) ?? '';

        if (str_starts_with($phone, '0')) {
            return '62'.substr($phone, 1);
        }

        if (str_starts_with($phone, '8')) {
            return '62'.$phone;
        }

        return $phone;
    }

    private function sendVotingRegistrationOtp(FonnteClient $fonnte, string $phone, string $name, string $passwordHash): OtpCode
    {
        $otp = (string) random_int(1000, 9999);

        OtpCode::query()
            ->where('phone', $phone)
            ->where('purpose', self::VOTING_REGISTER_OTP_PURPOSE)
            ->whereNull('consumed_at')
            ->update(['consumed_at' => now()]);

        $otpCode = OtpCode::query()->create([
            'phone' => $phone,
            'name' => $name,
            'purpose' => self::VOTING_REGISTER_OTP_PURPOSE,
            'code_hash' => Hash::make($otp),
            'password_hash' => $passwordHash,
            'expires_at' => now()->addMinutes(self::OTP_TTL_MINUTES),
        ]);

        $message = "Halo {$name},\n\nKode OTP registrasi ISC Voting Anda adalah:\n\n{$otp}\n\nKode ini berlaku selama ".self::OTP_TTL_MINUTES." menit. Jangan berikan kode ini kepada siapa pun.\n\nJika Anda tidak melakukan registrasi, abaikan pesan ini.";

        try {
            $fonnte->sendMessage($this->normalizePhoneForWhatsapp($phone), $message);
        } catch (Throwable $exception) {
            $otpCode->update(['consumed_at' => now()]);

            throw $exception;
        }

        return $otpCode;
    }

    private function pendingVotingRegistrationOtp(Request $request): ?OtpCode
    {
        $otpId = $request->session()->get('voting_register_otp_id');

        if (! $otpId) {
            return null;
        }

        return OtpCode::query()
            ->whereKey($otpId)
            ->where('purpose', self::VOTING_REGISTER_OTP_PURPOSE)
            ->whereNull('consumed_at')
            ->where('expires_at', '>', now())
            ->first();
    }

    private function ensureOtpCanBeResent(string $phone): void
    {
        $latestOtp = OtpCode::query()
            ->where('phone', $phone)
            ->where('purpose', self::VOTING_REGISTER_OTP_PURPOSE)
            ->whereNull('consumed_at')
            ->latest()
            ->first();

        if (! $latestOtp || $latestOtp->created_at->lte(now()->subSeconds(self::OTP_RESEND_COOLDOWN_SECONDS))) {
            return;
        }

        $remainingSeconds = (int) ceil(self::OTP_RESEND_COOLDOWN_SECONDS - $latestOtp->created_at->diffInSeconds(now()));

        throw ValidationException::withMessages([
            'otp' => __('Tunggu :seconds detik sebelum meminta OTP lagi.', ['seconds' => max(1, $remainingSeconds)]),
        ]);
    }

    private function verifyVotingOtp(OtpCode $otpCode, string $otp): bool
    {
        if ($otpCode->attempts >= self::OTP_MAX_ATTEMPTS) {
            return false;
        }

        $otpCode->increment('attempts');

        if (! Hash::check($otp, $otpCode->code_hash)) {
            return false;
        }

        $otpCode->update([
            'verified_at' => now(),
            'consumed_at' => now(),
        ]);

        return true;
    }

    /**
     * @param  array{email?: string, phone?: string, password: string}  $credentials
     */
    private function attemptLogin(Request $request, array $credentials, string $permission, bool $remember, string $errorKey): void
    {
        if (! Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                $errorKey => $errorKey === 'phone'
                    ? __('Nomor HP atau password tidak sesuai.')
                    : __('Email atau password tidak sesuai.'),
            ]);
        }

        $request->session()->regenerate();

        if ($request->user()?->can($permission)) {
            return;
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        throw ValidationException::withMessages([
            $errorKey => __('Akun ini tidak memiliki akses ke halaman ini.'),
        ]);
    }
}
