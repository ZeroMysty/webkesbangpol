<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Strukturor;

class StrukturorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('strukturors')->truncate();

        $defaultData = [
            'nama' => '-',
            'golongan' => '-',
            'pangkat' => '-',
            'foto_profile' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Helper to get unique default data
        $getDef = function() use ($defaultData) {
            return array_merge($defaultData, ['nip' => substr(uniqid(), 0, 18)]);
        };

        // Level 1
        $kepalaId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'KEPALA BADAN',
            'parent_id' => null,
        ]));

        // Level 2
        $kelompokId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'KELOMPOK JABATAN FUNGSIONAL',
            'parent_id' => $kepalaId,
        ]));

        $sekretarisId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'SEKRETARIS BADAN',
            'parent_id' => $kepalaId,
        ]));

        // Level 3 (Di Bawah Sekretaris)
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'KEPALA SUB BAGIAN UMUM DAN KEPEGAWAIAN',
            'parent_id' => $sekretarisId,
        ]));
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'JABATAN FUNGSIONAL 1',
            'parent_id' => $sekretarisId,
        ]));
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'JABATAN FUNGSIONAL 2',
            'parent_id' => $sekretarisId,
        ]));

        // Level 4 (4 Bidang di bawah Kepala Badan)
        $ideologiId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'KEPALA BIDANG IDEOLOGI, WAWASAN KEBANGSAAN DAN KARAKTER BANGSA',
            'parent_id' => $kepalaId,
        ]));
        $politikId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'KEPALA BIDANG POLITIK DALAM NEGERI',
            'parent_id' => $kepalaId,
        ]));
        $ekonomiId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'KEPALA BIDANG KETAHANAN EKONOMI, SOSIAL, BUDAYA, AGAMA, ORMAS',
            'parent_id' => $kepalaId,
        ]));
        $kewaspadaanId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'KEPALA BIDANG KEWASPADAAN NASIONAL DAN PENANGANAN KONFLIK',
            'parent_id' => $kepalaId,
        ]));

        // Bidang 1: Ideologi (Chain: Analis -> Jabfung)
        $anId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'ANALIS KEBIJAKAN AHLI MUDA 1',
            'parent_id' => $ideologiId,
        ]));
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'JABATAN FUNGSIONAL 3',
            'parent_id' => $anId,
        ]));

        // Bidang 2: Politik (Chain: Analis -> Analis)
        $anPolId = DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'ANALIS KEBIJAKAN AHLI MUDA 2',
            'parent_id' => $politikId,
        ]));
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'ANALIS KEBIJAKAN AHLI MUDA 3',
            'parent_id' => $anPolId,
        ]));

        // Bidang 3: Ekonomi (Siblings: Analis & Jabfung)
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'ANALIS KEBIJAKAN AHLI MUDA 4',
            'parent_id' => $ekonomiId,
        ]));
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'JABATAN FUNGSIONAL 4',
            'parent_id' => $ekonomiId,
        ]));

        // Bidang 4: Kewaspadaan (Siblings: Analis & Jabfung)
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'ANALIS KEBIJAKAN AHLI MUDA 5',
            'parent_id' => $kewaspadaanId,
        ]));
        DB::table('strukturors')->insertGetId(array_merge($getDef(), [
            'jabatan' => 'JABATAN FUNGSIONAL 5',
            'parent_id' => $kewaspadaanId,
        ]));

    }
}
