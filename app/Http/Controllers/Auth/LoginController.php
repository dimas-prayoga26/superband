<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    private const ADMIN_PANEL_PERMISSION = 'access admin panel';

    private const VOTING_PERMISSION = 'access voting';

    public function staff(): View
    {
        return view('auth.staff-login');
    }

    public function voting(): View
    {
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

        return redirect()->intended(route('admin.dashboard'));
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

    public function registerVoting(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/', Rule::unique('users', 'phone')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $votingPermission = Permission::findOrCreate(self::VOTING_PERMISSION, 'web');
        $voterRole = Role::findOrCreate('voter', 'web');
        $voterRole->givePermissionTo($votingPermission);

        $user = User::query()->create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => sprintf('voter+%s@superband.local', $validated['phone']),
            'password' => $validated['password'],
        ]);

        $user->assignRole($voterRole);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('voting');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
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
