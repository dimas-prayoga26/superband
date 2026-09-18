<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    protected $fillable = [
        'phone',
        'name',
        'purpose',
        'code_hash',
        'password_hash',
        'expires_at',
        'verified_at',
        'consumed_at',
        'attempts',
    ];

    protected $hidden = [
        'code_hash',
        'password_hash',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'verified_at' => 'datetime',
            'consumed_at' => 'datetime',
            'attempts' => 'integer',
        ];
    }
}
