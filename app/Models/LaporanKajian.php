<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKajian extends Model
{
    protected $table = 'laporan_kajians';

    protected $fillable = [
        'title',
        'tanggal',
        'tahun',
        'file_upload',
        'file_upload_wm',
    ];
}
