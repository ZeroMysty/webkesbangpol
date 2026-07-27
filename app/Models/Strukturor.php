<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strukturor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'nip',
        'golongan',
        'pangkat',
        'foto_profile',
        'parent_id',
        'x',
        'y',
        'color',
    ];

    public function parent()
    {
        return $this->belongsTo(Strukturor::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Strukturor::class, 'parent_id');
    }

    public static function checkAndInitializePositions()
    {
        $defaultLayout = [
            'KEPALA BADAN' => ['x' => 1464, 'y' => 50, 'color' => 'red'],
            'KELOMPOK JABATAN FUNGSIONAL' => ['x' => 488, 'y' => 250, 'color' => 'green'],
            'SEKRETARIS BADAN' => ['x' => 1464, 'y' => 250, 'color' => 'blue'],
            'KEPALA SUB BAGIAN UMUM DAN KEPEGAWAIAN' => ['x' => 976, 'y' => 450, 'color' => 'green'],
            'JABATAN FUNGSIONAL 1' => ['x' => 1464, 'y' => 450, 'color' => 'green'],
            'JABATAN FUNGSIONAL 2' => ['x' => 1952, 'y' => 450, 'color' => 'green'],
            'KEPALA BIDANG IDEOLOGI, WAWASAN KEBANGSAAN DAN KARAKTER BANGSA' => ['x' => 488, 'y' => 700, 'color' => 'blue'],
            'KEPALA BIDANG POLITIK DALAM NEGERI' => ['x' => 976, 'y' => 700, 'color' => 'blue'],
            'KEPALA BIDANG KETAHANAN EKONOMI, SOSIAL, BUDAYA, AGAMA, ORMAS' => ['x' => 1464, 'y' => 700, 'color' => 'blue'],
            'KEPALA BIDANG KEWASPADAAN NASIONAL DAN PENANGANAN KONFLIK' => ['x' => 2196, 'y' => 700, 'color' => 'blue'],
            'ANALIS KEBIJAKAN AHLI MUDA 1' => ['x' => 488, 'y' => 920, 'color' => 'green'],
            'ANALIS KEBIJAKAN AHLI MUDA 2' => ['x' => 976, 'y' => 920, 'color' => 'green'],
            'ANALIS KEBIJAKAN AHLI MUDA 4' => ['x' => 1220, 'y' => 920, 'color' => 'green'],
            'JABATAN FUNGSIONAL 4' => ['x' => 1708, 'y' => 920, 'color' => 'green'],
            'ANALIS KEBIJAKAN AHLI MUDA 5' => ['x' => 1952, 'y' => 920, 'color' => 'green'],
            'JABATAN FUNGSIONAL 5' => ['x' => 2440, 'y' => 920, 'color' => 'green'],
            'JABATAN FUNGSIONAL 3' => ['x' => 488, 'y' => 1140, 'color' => 'green'],
            'ANALIS KEBIJAKAN AHLI MUDA 3' => ['x' => 976, 'y' => 1140, 'color' => 'green'],
        ];

        $nullCount = self::whereNull('x')->orWhereNull('y')->count();
        if ($nullCount > 0) {
            $items = self::all();
            foreach ($items as $item) {
                if (is_null($item->x) || is_null($item->y)) {
                    $pos = $defaultLayout[strtoupper($item->jabatan)] ?? ['x' => rand(200, 2000), 'y' => rand(100, 1000), 'color' => 'green'];
                    $item->update([
                        'x' => $pos['x'],
                        'y' => $pos['y'],
                        'color' => $item->color ?: ($pos['color'] ?? 'green')
                    ]);
                }
            }
        }
    }
}
