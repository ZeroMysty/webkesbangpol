@extends('landingpage.layouts.app')
@section('title', 'Pemilihan Legislatif')

@section('content')
<style>
    .hero-legislatif {
        padding: 4rem 0;
        background: linear-gradient(135deg, #B40D14 0%, #8B0000 100%);
        color: white;
        text-align: center;
    }
    .filter-section {
        padding: 2rem 0;
        background-color: #fff;
        border-bottom: 1px solid #dee2e6;
    }
    .dapil-filter-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        width: 100%;
    }
    .dapil-filter-label {
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
        white-space: nowrap;
        font-size: 1.15rem;
    }
    #dapil-select.dapil-select {
        /* color-scheme: light + background/color pakai !important, supaya
           TIDAK bisa ke-timpa tema gelap OS/browser (itu penyebab select-nya
           kelihatan biru-navy gelap sebelumnya) */
        color-scheme: light;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        display: inline-block;
        min-width: 220px;
        background-color: #ffffff !important;
        color: #B40D14 !important;
        font-weight: 700;
        font-size: 1.15rem;
        line-height: 1.3;
        border: 2px solid #B40D14;
        border-radius: 10px;
        padding: 0.55rem 2.6rem 0.55rem 1.1rem;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(180, 13, 20, 0.12);
        transition: box-shadow 0.2s ease, border-color 0.2s ease, background-color 0.2s ease;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23B40D14' d='M4.646 6.646a.5.5 0 0 1 .708 0L8 9.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 14px;
    }
    #dapil-select.dapil-select:hover {
        background-color: #fdf1f1 !important;
        box-shadow: 0 4px 12px rgba(180, 13, 20, 0.22);
    }
    #dapil-select.dapil-select:focus {
        outline: none;
        border-color: #8B0000;
        box-shadow: 0 0 0 4px rgba(180, 13, 20, 0.18);
    }
    #dapil-select.dapil-select option {
        color: #212529 !important;
        background-color: #fff !important;
    }
    .dapil-section {
        margin-bottom: 3rem;
        display: none; /* Sembunyikan semua secara default */
    }
    .dapil-section.active {
        display: block; /* Tampilkan yang aktif */
    }
    .dapil-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0;
    }
    .dapil-toggle {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        background: #fff;
        border: none;
        border-bottom: 3px solid #B40D14;
        padding: 0.9rem 0.25rem;
        margin-bottom: 1.5rem;
        cursor: pointer;
        text-align: left;
    }
    .dapil-toggle-right {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        flex-shrink: 0;
    }
    .dapil-toggle-count {
        font-size: 0.82rem;
        font-weight: 600;
        color: #B40D14;
        background: #fdf1f1;
        padding: 4px 14px;
        border-radius: 20px;
        white-space: nowrap;
    }
    .dapil-toggle-icon {
        color: #B40D14;
        font-size: 1rem;
        transition: transform 0.25s ease;
    }
    .dapil-toggle[aria-expanded="true"] .dapil-toggle-icon {
        transform: rotate(180deg);
    }
    .dapil-body {
        display: none;
    }
    .dapil-body.open {
        display: block;
    }
    .caleg-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid #e9ecef;
        display: flex;
        flex-direction: column;
    }
    .caleg-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .caleg-card .card-body {
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .caleg-no-urut {
        background-color: #B40D14;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 1rem;
        align-self: center;
    }
    .caleg-partai {
        font-size: 0.8rem;
        font-weight: 600;
        color: #6c757d;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
        text-align: center;
    }
    .caleg-nama {
        font-size: 1.1rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 1rem;
        flex-grow: 1;
        text-align: center;
    }
    .caleg-nama a {
        text-decoration: none;
        color: inherit;
    }
    .caleg-nama a:hover {
        color: #B40D14;
    }

    /* ===== Card per-partai (dikelompokkan di dalam tiap dapil) ===== */
    .partai-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        border: 1px solid #e9ecef;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }
    .partai-card:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .partai-card-header {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        padding: 1rem 1.1rem;
        background: linear-gradient(135deg, #B40D14 0%, #8B0000 100%);
    }
    .partai-logo {
        flex-shrink: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    .partai-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 4px;
    }
    .partai-nama {
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
        margin: 0;
        line-height: 1.25;
        text-transform: uppercase;
    }
    .partai-caleg-count {
        display: block;
        color: rgba(255,255,255,0.8);
        font-weight: 400;
        font-size: 0.75rem;
        text-transform: none;
        margin-top: 2px;
    }
    .partai-caleg-list {
        list-style: none;
        margin: 0;
        padding: 0.5rem 0;
    }
    .partai-caleg-list li {
        border-bottom: 1px solid #f1f1f1;
    }
    .partai-caleg-list li:last-child {
        border-bottom: none;
    }
    .partai-caleg-list a {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        padding: 0.55rem 1.1rem;
        text-decoration: none;
        color: #212529;
        transition: background-color 0.2s ease;
    }
    .partai-caleg-list a:hover {
        background-color: #fdf1f1;
        color: #B40D14;
    }
    .caleg-no-urut-sm {
        flex-shrink: 0;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background-color: #B40D14;
        color: #fff;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .caleg-nama-sm {
        font-size: 0.92rem;
        font-weight: 500;
    }
</style>

<section class="hero-legislatif">
    <div class="container">
        <h1 class="display-5 fw-bold">{{ $judulHalaman ?? 'Pemilihan Legislatif' }}</h1>
        <p class="lead">Daftar Calon Anggota Legislatif DPRD Kota Bandung</p>
    </div>
</section>

{{-- Filter Section --}}
<section class="filter-section sticky-top">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10 text-center mb-3 mb-md-0">
                <div class="dapil-filter-wrap">
                    <label for="dapil-select" class="dapil-filter-label">Pilih Daerah Pemilihan (Dapil):</label>
                    <select class="dapil-select" id="dapil-select">
                        <option value="all" selected>Semua Dapil</option>
                        @for ($i = 1; $i <= 7; $i++)
                            <option value="{{ $i }}">Dapil {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            


<section class="py-5 bg-light">
    <div class="container">
        @php
            // Satukan dapil yang sebenarnya sama tapi beda cara nulis di database
            // (misal "Kota Bandung 1" vs "KOTA BANDUNG 1" vs "Kota  Bandung 1"
            // yang ada spasi dobel) -> supaya tidak muncul jadi 2 baris terpisah.
            function canonicalDapil($dapilRaw) {
                $clean = trim(preg_replace('/\s+/', ' ', $dapilRaw ?? ''));
                return [
                    'key'   => strtoupper($clean),
                    'label' => ucwords(strtolower($clean)),
                ];
            }

            $groupedLegislatifs = $groupedLegislatifs
                ->collapse()
                // Partai Gemoy bukan partai resmi (data ngaco) -> jangan ditampilkan sama sekali
                ->reject(function ($c) {
                    return str_contains(strtoupper($c->nama_partai ?? ''), 'GEMOY');
                })
                ->groupBy(function ($c) {
                    return canonicalDapil($c->dapil)['key'];
                })
                ->sortBy(function ($group, $key) {
                    // urutkan dari Dapil 1, 2, 3, dst (ambil angka di ujung nama)
                    preg_match('/(\d+)\s*$/', $key, $m);
                    return isset($m[1]) ? (int) $m[1] : 9999;
                });
        @endphp
        @if($groupedLegislatifs->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                <h3 class="text-muted">Data Calon Legislatif Belum Tersedia</h3>
                <p>Silakan periksa kembali nanti.</p>
            </div>
        @else
            @php
                // Mengenali nama partai dari POTONGAN KATA KHAS-nya (bukan harus sama
                // persis), supaya tetap ke-kenali walau di database ditulis beda-beda:
                // nama pendek ("Golkar") vs nama resmi panjang ("Partai Golongan
                // Karya"), typo ("Nasioanal", "Partao Garda...", "Nuranai"), dst.
                // Urutan aturan SENGAJA disusun dari yang paling spesifik ke yang
                // paling umum supaya tidak salah tangkap (misal "Nasional Demokrat"
                // punya kata "Demokrat" tapi harus dikenali sebagai NasDem, bukan
                // Partai Demokrat -> makanya aturan NasDem diletakkan lebih dulu).
                function canonicalPartai($namaPartaiRaw) {
                    $n = strtoupper(trim($namaPartaiRaw ?? ''));

                    $rules = [
                        ['keywords' => ['PERJUANGAN'],                                 'nama' => 'PDI Perjuangan',               'logo' => 'pdip.png'],
                        ['keywords' => ['GOLKAR', 'GOLONGAN KARYA'],                   'nama' => 'Partai Golkar',                'logo' => 'golkar.png'],
                        ['keywords' => ['GERINDRA', 'GERAKAN INDONESIA RAYA'],         'nama' => 'Partai Gerindra',              'logo' => 'gerindra.png'],
                        ['keywords' => ['NASDEM', 'NASIONAL DEMOKRAT'],                'nama' => 'Partai NasDem',                'logo' => 'nasdem.png'],
                        ['keywords' => ['KEBANGKITAN NUSANTARA', 'KEBANGKITAN NASIONAL'], 'nama' => 'Partai Kebangkitan Nusantara', 'logo' => 'pkn.png'],
                        ['keywords' => ['KEBANGKITAN BANGSA'],                        'nama' => 'Partai Kebangkitan Bangsa',    'logo' => 'pkb.png'],
                        ['keywords' => ['KEADILAN SEJAHTERA'],                         'nama' => 'Partai Keadilan Sejahtera',    'logo' => 'pks.png'],
                        ['keywords' => ['DEMOKRAT'],                                   'nama' => 'Partai Demokrat',              'logo' => 'demokrat.png'],
                        ['keywords' => ['AMANAT'],                                     'nama' => 'Partai Amanat Nasional',       'logo' => 'pan.png'],
                        ['keywords' => ['PERSATUAN PEMBANGUNAN'],                      'nama' => 'Partai Persatuan Pembangunan', 'logo' => 'ppp.png'],
                        ['keywords' => ['SOLIDARITAS'],                                'nama' => 'Partai Solidaritas Indonesia', 'logo' => 'psi.png'],
                        ['keywords' => ['PERINDO', 'PERSATUAN INDONESIA'],             'nama' => 'Partai Perindo',               'logo' => 'perindo.png'],
                        ['keywords' => ['HANURA', 'NURAN'],                            'nama' => 'Partai Hanura',                'logo' => 'hanura.png'],
                        ['keywords' => ['BURUH'],                                      'nama' => 'Partai Buruh',                 'logo' => 'buruh.png'],
                        ['keywords' => ['GELORA', 'GELOMBANG RAKYAT'],                 'nama' => 'Partai Gelora',                'logo' => 'gelora.png'],
                        ['keywords' => ['GARDA', 'GARUDA'],                            'nama' => 'Partai Garuda',                'logo' => 'garuda.png'],
                        ['keywords' => ['BULAN BINTANG'],                              'nama' => 'Partai Bulan Bintang',         'logo' => 'pbb.png'],
                        ['keywords' => ['UMMAT', 'UMAT'],                              'nama' => 'Partai Ummat',                 'logo' => 'ummat.png'],
                    ];

                    foreach ($rules as $rule) {
                        foreach ($rule['keywords'] as $kw) {
                            if ($n !== '' && str_contains($n, $kw)) {
                                return ['nama' => $rule['nama'], 'logo' => $rule['logo']];
                            }
                        }
                    }

                    // Tidak dikenali sama sekali (bukan salah satu dari 18 partai) ->
                    // tetap ditampilkan apa adanya, logo default.
                    return ['nama' => trim($namaPartaiRaw) ?: 'Partai Lainnya', 'logo' => null];
                }
            @endphp

            @foreach($groupedLegislatifs as $dapilKey => $calegsInDapil)
                @php
                    $collapseId = 'dapil-collapse-' . $loop->index;
                    $dapilLabel = canonicalDapil($calegsInDapil->first()->dapil)['label'];
                @endphp
                <div class="dapil-section" data-dapil="{{ $dapilLabel }}">
                    <button type="button" class="dapil-toggle" data-target="{{ $collapseId }}" aria-expanded="false" aria-controls="{{ $collapseId }}">
                        <h2 class="dapil-title mb-0">{{ $dapilLabel }}</h2>
                        <span class="dapil-toggle-right">
                            <span class="dapil-toggle-count">{{ $calegsInDapil->groupBy(fn($c) => canonicalPartai($c->nama_partai)['nama'])->count() }} Partai</span>
                            <i class="fas fa-chevron-down dapil-toggle-icon"></i>
                        </span>
                    </button>
                    <div class="dapil-body" id="{{ $collapseId }}">
                    <div class="row g-4 align-items-start mt-1">
                        {{-- Dikelompokkan per partai (pakai nama baku hasil pengenalan
                             kata kunci di atas), bukan per teks mentah nama_partai --}}
                        @php
                            $partaiGroups = $calegsInDapil->groupBy(function ($c) {
                                return canonicalPartai($c->nama_partai)['nama'];
                            })->sortByDesc(function ($calegsSatuPartai) {
                                return $calegsSatuPartai->count();
                            });
                        @endphp
                        @foreach($partaiGroups as $namaPartaiBaku => $calegsInPartai)
                            @php
                                $partaiInfo = canonicalPartai($calegsInPartai->first()->nama_partai);
                                if ($partaiInfo['logo']) {
                                    $logoPartaiUrl = asset('images/partai-logos/' . $partaiInfo['logo']);
                                } else {
                                    $logoDariAdmin = $calegsInPartai->firstWhere('logo_partai', '!=', null)->logo_partai ?? null;
                                    $logoPartaiUrl = $logoDariAdmin ? asset($logoDariAdmin) : asset('images/component/logoremovebg2.png');
                                }
                            @endphp
                            <div class="col-md-6 col-lg-4">
                                <div class="partai-card">
                                    <div class="partai-card-header">
                                        <div class="partai-logo">
                                            <img src="{{ $logoPartaiUrl }}" alt="Logo {{ $namaPartaiBaku }}">
                                        </div>
                                        <h5 class="partai-nama">
                                            {{ $namaPartaiBaku }}
                                            <span class="partai-caleg-count">{{ $calegsInPartai->count() }} Calon Legislatif</span>
                                        </h5>
                                    </div>
                                    <ul class="partai-caleg-list">
                                        @foreach($calegsInPartai as $caleg)
                                            <li>
                                                <a href="{{ route('pemilu.detail', ['kategori' => 'legislatif', 'id' => $caleg->id]) }}">
                                                    <span class="caleg-no-urut-sm">{{ $caleg->no_urut }}</span>
                                                    <span class="caleg-nama-sm">{{ $caleg->nama_lengkap }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('pemilu.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Menu Pemilu
            </a>
        </div>
    </div>
</section>

{{-- JavaScript untuk filter --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dapilSelect = document.getElementById('dapil-select');
    const dapilSections = document.querySelectorAll('.dapil-section');

    function filterDapil(filter) {
        dapilSections.forEach(section => {
            if (filter === 'all' || section.dataset.dapil.endsWith(filter)) {
                section.classList.add('active');
            } else {
                section.classList.remove('active');
            }
        });
    }

    // Tampilkan semua dapil saat pertama kali halaman dimuat
    filterDapil('all');

    // Tambahkan event listener untuk dropdown
    dapilSelect.addEventListener('change', function () {
        const filterValue = this.value;
        filterDapil(filterValue);
    });

    // Toggle buka/tutup daftar partai per dapil (dibuat sendiri, tidak
    // pakai Bootstrap collapse, biar tidak bentrok dengan script lain)
    document.querySelectorAll('.dapil-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const targetId = btn.getAttribute('data-target');
            const body = document.getElementById(targetId);
            if (!body) return;
            const isOpen = body.classList.toggle('open');
            btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    });
});
</script>
@endsection