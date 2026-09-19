<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ImportBatch extends Model
{
    protected $table = 'import_batches';

    protected $fillable = [
        'filename',
        'imported_count',
        'skipped_count',
        'imported_by',
    ];

    /**
     * Relasi ke semua ormas yang masuk di sesi import ini.
     */
    public function ormass(): HasMany
    {
        return $this->hasMany(Ormas::class, 'import_batch_id');
    }
}
