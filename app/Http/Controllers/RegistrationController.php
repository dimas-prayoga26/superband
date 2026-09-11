<?php

namespace App\Http\Controllers;

use App\Mail\PersonelRegistrationConfirmation;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'stage_name' => ['nullable', 'string', 'max:255'],
            'school' => ['required', 'string', 'max:255'],
            'grade' => ['required', 'integer', 'between:10,12'],
            'audition_position' => ['required', Rule::in(['Vocal', 'Gitaris', 'Bassis', 'Keyboardist', 'Drummer'])],
            'whatsapp' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'tiktok_url' => ['nullable', 'url', 'max:255'],
            'required_song_genre' => ['required', Rule::in(['Pop', 'Pop Folk', 'Rock'])],
            'free_song_title' => ['required', 'string', 'max:255'],
            'audition_video_url' => ['required', 'url', 'max:255'],
            'student_card' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:10240'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'commitments' => ['required', 'array', 'size:3'],
            'commitments.*' => ['required', Rule::in(['live_video', 'full_commitment', 'judge_decision'])],
            'cf-turnstile-response' => ['required', 'string'],
        ]);

        $this->verifyTurnstile($request);
        unset($validated['cf-turnstile-response']);

        $validated['student_card_path'] = $request->file('student_card')->store('registrations/student-cards', 'public');
        $validated['photo_path'] = $request->file('photo')->store('registrations/photos', 'public');
        unset($validated['student_card'], $validated['photo']);

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
}
