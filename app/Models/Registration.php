<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'full_name',
        'stage_name',
        'school',
        'grade',
        'audition_position',
        'whatsapp',
        'email',
        'instagram_url',
        'tiktok_url',
        'required_song_genre',
        'free_song_title',
        'audition_video_url',
        'student_card_path',
        'photo_path',
        'commitments',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'commitments' => 'array',
        ];
    }

    public function roleSilhouettePath(): string
    {
        return match ($this->audition_position) {
            'Vocal', 'Vokalis' => 'assets/img/Siluet/email-watermark/Vokalist.svg',
            'Bassis' => 'assets/img/Siluet/email-watermark/Bassist.svg',
            'Keyboardist' => 'assets/img/Siluet/email-watermark/Keboardist.svg',
            'Drummer' => 'assets/img/Siluet/email-watermark/Drum.svg',
            default => 'assets/img/Siluet/email-watermark/Guitarist.svg',
        };
    }
}
