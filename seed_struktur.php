<?php

use App\Models\Strukturor;
use Illuminate\Support\Facades\DB;

DB::table('strukturors')->truncate();

function createStruktur($jabatan, $parent_id) {
    return Strukturor::create([
        'nama' => '-',
        'nip' => uniqid(), // To avoid unique constraint violations
        'golongan' => '-',
        'pangkat' => '-',
        'foto_profile' => null,
        'jabatan' => $jabatan,
        'parent_id' => $parent_id,
    ]);
}

// 1. Kepala Badan
$kepala = createStruktur('KEPALA BADAN', null);

// 2. Kelompok Jabatan Fungsional
createStruktur('KELOMPOK JABATAN FUNGSIONAL', $kepala->id);

// 3. Sekretaris Badan
$sekretaris = createStruktur('SEKRETARIS BADAN', $kepala->id);
    // Children of Sekretaris
    createStruktur('KEPALA SUB BAGIAN UMUM DAN KEPEGAWAIAN', $sekretaris->id);
    createStruktur('JABATAN FUNGSIONAL', $sekretaris->id);
    createStruktur('JABATAN FUNGSIONAL', $sekretaris->id);

// 4. Bidang Ideologi
$bidang1 = createStruktur('KEPALA BIDANG IDEOLOGI, WAWASAN KEBANGSAAN DAN KARAKTER BANGSA', $kepala->id);
    // Children of Bidang 1 (CHAIN)
    $b1_anak1 = createStruktur('ANALIS KEBIJAKAN AHLI MUDA', $bidang1->id);
    createStruktur('JABATAN FUNGSIONAL', $b1_anak1->id); // Child of anak1

// 5. Bidang Politik
$bidang2 = createStruktur('KEPALA BIDANG POLITIK DALAM NEGERI', $kepala->id);
    // Children of Bidang 2 (CHAIN)
    $b2_anak1 = createStruktur('ANALIS KEBIJAKAN AHLI MUDA', $bidang2->id);
    createStruktur('ANALIS KEBIJAKAN AHLI MUDA', $b2_anak1->id); // Child of anak1

// 6. Bidang Ekonomi
$bidang3 = createStruktur('KEPALA BIDANG KETAHANAN EKONOMI, SOSIAL, BUDAYA, AGAMA, ORMAS', $kepala->id);
    // Children of Bidang 3 (SIBLINGS)
    createStruktur('ANALIS KEBIJAKAN AHLI MUDA', $bidang3->id);
    createStruktur('JABATAN FUNGSIONAL', $bidang3->id);

// 7. Bidang Kewaspadaan
$bidang4 = createStruktur('KEPALA BIDANG KEWASPADAAN NASIONAL DAN PENANGANAN KONFLIK', $kepala->id);
    // Children of Bidang 4 (SIBLINGS)
    createStruktur('ANALIS KEBIJAKAN AHLI MUDA', $bidang4->id);
    createStruktur('JABATAN FUNGSIONAL', $bidang4->id);

echo "Seeding completed.\n";
