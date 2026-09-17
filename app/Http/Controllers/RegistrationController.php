<?php

namespace App\Http\Controllers;

use App\Mail\PersonelRegistrationConfirmation;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\ImageOptimizer\OptimizerChain;

class RegistrationController extends Controller
{
    public function index(): View
    {
        return view('register');
    }

    public function store(Request $request, OptimizerChain $optimizerChain): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'stage_name' => ['required', 'string', 'max:255'],
            'school' => ['required', 'string', 'max:255'],
            'grade' => ['required', 'integer', 'digits:2', 'between:10,12'],
            'audition_position' => ['required', Rule::in(['Vocal', 'Gitaris', 'Bassis', 'Keyboardist', 'Drummer'])],
            'whatsapp' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/'],
            'email' => ['required', 'email', 'max:255'],
            'instagram_url' => ['required', 'url:http,https', 'max:255'],
            'tiktok_url' => ['required', 'url:http,https', 'max:255'],
            'required_song_genre' => ['required', Rule::in(['Pop', 'Pop Folk', 'Rock'])],
            'free_song_title' => ['required', 'string', 'max:255'],
            'audition_video_url' => ['required', 'url:http,https', 'max:255'],
            'student_card' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:2048'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'commitments' => ['required', 'array', 'size:3'],
            'commitments.*' => ['required', Rule::in(['live_video', 'full_commitment', 'judge_decision'])],
            'cf-turnstile-response' => ['required', 'string'],
        ], [
            'required' => ':attribute wajib diisi.',
            'email' => ':attribute harus berupa email yang valid.',
            'url' => ':attribute harus berupa link yang valid.',
            'integer' => ':attribute harus berupa angka.',
            'digits' => ':attribute harus terdiri dari :digits digit.',
            'between' => ':attribute harus berisi kelas 10, 11, atau 12.',
            'max.string' => ':attribute maksimal :max karakter.',
            'mimes' => ':attribute harus berupa file dengan format yang sesuai.',
            'audition_position.in' => 'Kategori audisi yang dipilih tidak valid.',
            'required_song_genre.in' => 'Genre lagu wajib yang dipilih tidak valid.',
            'whatsapp.regex' => 'Nomor WhatsApp hanya boleh berisi angka.',
            'commitments.required' => 'Komitmen audisi wajib disetujui.',
            'commitments.size' => 'Semua komitmen audisi wajib dicentang.',
            'commitments.*.in' => 'Komitmen audisi yang dipilih tidak valid.',
            'student_card.max' => 'Ukuran foto kartu pelajar maksimal 2MB, silakan unggah file yang lebih kecil.',
            'student_card.mimes' => 'Foto kartu pelajar harus berupa JPG, JPEG, PNG, WEBP, atau PDF.',
            'photo.max' => 'Ukuran foto maksimal 2MB, silakan unggah file yang lebih kecil.',
            'photo.image' => 'File foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berupa JPG, JPEG, PNG, atau WEBP.',
        ], [
            'full_name' => 'Nama lengkap sesuai KTP/Kartu Pelajar',
            'stage_name' => 'Nama panggilan atau stage name',
            'school' => 'Asal sekolah',
            'grade' => 'Kelas',
            'audition_position' => 'Kategori audisi',
            'whatsapp' => 'Nomor WhatsApp',
            'email' => 'Email aktif',
            'instagram_url' => 'Link akun Instagram',
            'tiktok_url' => 'Link akun TikTok',
            'required_song_genre' => 'Genre lagu wajib',
            'free_song_title' => 'Judul lagu pilihan bebas',
            'audition_video_url' => 'Tautan video audisi',
            'student_card' => 'Foto kartu pelajar',
            'photo' => 'Upload foto',
            'commitments' => 'Komitmen audisi',
            'cf-turnstile-response' => 'Verifikasi keamanan',
        ]);

        $this->verifyTurnstile($request);
        unset($validated['cf-turnstile-response']);

        $validated['student_card_path'] = $request->file('student_card')->store('registrations/student-cards', 'public');
        $validated['photo_path'] = $request->file('photo')->store('registrations/photos', 'public');
        unset($validated['student_card'], $validated['photo']);

        $this->optimizeStoredImage($validated['student_card_path'], $optimizerChain);
        $this->optimizeStoredImage($validated['photo_path'], $optimizerChain);

        $registration = Registration::create($validated);

        Mail::to($registration->email)->send(new PersonelRegistrationConfirmation($registration));

        return redirect()->route('success');
    }

    private function verifyTurnstile(Request $request): void
    {
        $secretKey = config('services.turnstile.secret_key');
        $token = $request->input('cf-turnstile-response');

        if (! $secretKey || ! $token) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'Verifikasi keamanan wajib diisi.',
            ]);
        }

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => $secretKey,
            'response' => $token,
            'remoteip' => $request->ip(),
        ]);

        if (! $response->json('success')) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'Verifikasi keamanan gagal. Silakan coba lagi.',
            ]);
        }
    }

    private function optimizeStoredImage(string $path, OptimizerChain $optimizerChain): void
    {
        $disk = Storage::disk('public');
        $mimeType = $disk->mimeType($path);

        if (! in_array($mimeType, ['image/jpeg', 'image/png', 'image/webp'], true)) {
            return;
        }

        $absolutePath = $disk->path($path);
        $originalSize = filesize($absolutePath);

        $optimizerChain->optimize($absolutePath);

        clearstatcache(true, $absolutePath);

        if ($originalSize === false) {
            return;
        }

        $targetSize = (int) floor($originalSize * 0.5);
        $optimizedSize = filesize($absolutePath);

        if ($optimizedSize !== false && $optimizedSize <= $targetSize) {
            return;
        }

        $this->compressImageTowardTarget($absolutePath, $mimeType, $targetSize);
    }

    private function compressImageTowardTarget(string $absolutePath, string $mimeType, int $targetSize): void
    {
        $image = match ($mimeType) {
            'image/jpeg' => imagecreatefromjpeg($absolutePath),
            'image/png' => imagecreatefrompng($absolutePath),
            'image/webp' => imagecreatefromwebp($absolutePath),
            default => false,
        };

        if ($image === false) {
            return;
        }

        imagealphablending($image, false);
        imagesavealpha($image, true);

        try {
            $qualitySteps = match ($mimeType) {
                'image/png' => [6, 7, 8, 9],
                default => [72, 65, 58, 50, 42, 35, 28, 22],
            };

            foreach ($qualitySteps as $quality) {
                if (! $this->writeCompressedImage($image, $absolutePath, $mimeType, $quality, $targetSize)) {
                    continue;
                }

                break;
            }

            clearstatcache(true, $absolutePath);

            if ($mimeType === 'image/png' && filesize($absolutePath) > $targetSize && imageistruecolor($image)) {
                imagetruecolortopalette($image, true, 256);
                $this->writeCompressedImage($image, $absolutePath, $mimeType, 9, $targetSize);
            }
        } finally {
            imagedestroy($image);
        }
    }

    private function writeCompressedImage(\GdImage $image, string $absolutePath, string $mimeType, int $quality, int $targetSize): bool
    {
        $temporaryPath = $absolutePath.'.tmp';
        $currentSize = filesize($absolutePath);

        if ($currentSize === false) {
            return true;
        }

        $written = match ($mimeType) {
            'image/jpeg' => imagejpeg($image, $temporaryPath, $quality),
            'image/png' => imagepng($image, $temporaryPath, $quality),
            'image/webp' => imagewebp($image, $temporaryPath, $quality),
            default => false,
        };

        if (! $written) {
            @unlink($temporaryPath);

            return false;
        }

        clearstatcache(true, $temporaryPath);
        $compressedSize = filesize($temporaryPath);

        if ($compressedSize === false || $compressedSize >= $currentSize) {
            @unlink($temporaryPath);

            return false;
        }

        if (! rename($temporaryPath, $absolutePath)) {
            @unlink($temporaryPath);

            return false;
        }

        clearstatcache(true, $absolutePath);

        return $compressedSize <= $targetSize;
    }
}
