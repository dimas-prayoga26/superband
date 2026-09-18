<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class FonnteClient
{
    public function sendMessage(string $target, string $message): void
    {
        $token = config('services.fonnte.token');

        if (! $token) {
            throw new RuntimeException('Fonnte token belum dikonfigurasi.');
        }

        $response = Http::asForm()
            ->withHeaders(['Authorization' => $token])
            ->connectTimeout(5)
            ->timeout(20)
            ->post(config('services.fonnte.url'), [
                'target' => $target,
                'message' => $message,
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Gagal mengirim OTP WhatsApp.');
        }

        $body = $response->json();

        if (is_array($body) && array_key_exists('status', $body) && $body['status'] === false) {
            throw new RuntimeException($body['reason'] ?? 'Fonnte menolak pengiriman OTP.');
        }
    }
}
