<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            cache()->forget('landing_banners');
        });
        static::deleted(function () {
            cache()->forget('landing_banners');
        });
    }
}
