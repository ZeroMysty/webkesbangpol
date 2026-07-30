<?php

/**
 * Mapping nama partai -> nama file logo.
 *
 * Cara pakai:
 * 1. Taruh file logonya di folder: public/images/partai-logos/
 * 2. Isi baris di bawah, KIRI = nama partai PERSIS seperti tersimpan
 *    di kolom nama_partai pada tabel legislatifs (cek lewat php artisan
 *    tinker -> App\Models\Legislatif::distinct()->pluck('nama_partai'))
 *    KANAN = nama file logo yang kamu taruh di folder tadi.
 *
 * Partai yang diisi di sini akan otomatis dipakai di halaman
 * /pemilu/legislatif, TANPA perlu upload lewat dashboard admin.
 *
 * Kalau ada partai yang tidak diisi di sini, sistem akan otomatis
 * fallback ke logo yang di-upload lewat dashboard admin (kolom
 * logo_partai), dan kalau itu juga kosong baru pakai logo default.
 */

return [
    'PDI Perjuangan'                  => 'pdip.png',
    'Partai Golongan Karya'           => 'golkar.png',
    'Partai Gerakan Indonesia Raya'   => 'gerindra.png',
    'Partai Nasdem'                   => 'nasdem.png',
    'Partai Kebangkitan Bangsa'       => 'pkb.png',
    'Partai Keadilan Sejahtera'       => 'pks.png',
    'Partai Demokrat'                 => 'demokrat.png',
    'Partai Amanat Nasional'          => 'pan.png',
    'Partai Persatuan Pembangunan'    => 'ppp.png',
    'Partai Solidaritas Indonesia'    => 'psi.png',
    'Partai Perindo'                  => 'perindo.png',
    'Partai Hati Nurani Rakyat'       => 'hanura.png',
    'Partai Buruh'                    => 'buruh.png',
    'Partai Gelora Indonesia'         => 'gelora.png',
    'Partai Kebangkitan Nusantara'    => 'pkn.png',
    'Partai Garuda'                   => 'garuda.png',
    'Partai Bulan Bintang'            => 'pbb.png',
    'Partai Ummat'                    => 'ummat.png',
];
