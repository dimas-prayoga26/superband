<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RegistrationFileController extends Controller
{
    public function __invoke(Registration $registration, string $file): BinaryFileResponse
    {
        abort_unless(in_array($file, ['photo', 'student-card'], true), 404);

        $path = $file === 'photo'
            ? $registration->photo_path
            : $registration->student_card_path;

        abort_unless($path && Storage::disk('public')->exists($path), 404);

        return response()->file(Storage::disk('public')->path($path));
    }
}
