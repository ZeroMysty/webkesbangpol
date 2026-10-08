@extends('dashboard.layouts.app')

@section('title', 'Dashboard Pemilu Raya')

@section('content')
<div class="pemilu-page-wrapper">

    {{-- 1. HERO HEADER --}}
    <div class="pemilu-hero-header">
        <div class="pemilu-header-left">
            <div class="pemilu-badge-category">
                <i class="fas fa-check-to-slot"></i>
                <span>Sistem Informasi Pemilu & Demokrasi</span>
            </div>
            <h1 class="pemilu-header-title">Dashboard Pemilu Raya</h1>
            <p class="pemilu-header-subtitle">
                Pusat manajemen dan administrasi data terpadu untuk pemilihan Presiden & Wakil Presiden RI, Walikota & Wakil Walikota Bandung, serta Calon Anggota Legislatif DPRD Kota Bandung.
            </p>
        </div>
        <div class="pemilu-header-right">
            <div class="pemilu-header-meta">
                <i class="fas fa-calendar-day"></i>
                <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </div>
        </div>
    </div>

    {{-- Session Feedback Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <i class="fas fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 2. STATS OVERVIEW CARDS --}}
    <div class="pemilu-stats-grid">
        <div class="pemilu-stat-card">
            <div class="pemilu-stat-icon-wrapper stat-icon-red">
                <i class="fas fa-landmark-flag"></i>
            </div>
            <div class="pemilu-stat-info">
                <span class="pemilu-stat-value">{{ $pilpresCount ?? 3 }}</span>
                <span class="pemilu-stat-label">Pasangan Calon Pilpres</span>
            </div>
        </div>

        <div class="pemilu-stat-card">
            <div class="pemilu-stat-icon-wrapper stat-icon-blue">
                <i class="fas fa-building-columns"></i>
            </div>
            <div class="pemilu-stat-info">
                <span class="pemilu-stat-value">{{ $walikotaCount ?? 4 }}</span>
                <span class="pemilu-stat-label">Paslon Walikota Bandung</span>
            </div>
        </div>

        <div class="pemilu-stat-card">
            <div class="pemilu-stat-icon-wrapper stat-icon-green">
                <i class="fas fa-users-line"></i>
            </div>
            <div class="pemilu-stat-info">
                <span class="pemilu-stat-value">{{ number_format($legislatifCount ?? 763, 0, ',', '.') }}</span>
                <span class="pemilu-stat-label">Caleg DPRD Terdaftar</span>
            </div>
        </div>

        <div class="pemilu-stat-card">
            <div class="pemilu-stat-icon-wrapper stat-icon-purple">
                <i class="fas fa-map-location-dot"></i>
            </div>
            <div class="pemilu-stat-info">
                <span class="pemilu-stat-value">{{ $dapilCount ?? 7 }} Dapil</span>
                <span class="pemilu-stat-label">Wilayah Pemilihan Kota</span>
            </div>
        </div>
    </div>

    {{-- 3. SECTION HEADER --}}
    <div class="pemilu-section-title-box">
        <div>
            <h3>
                <i class="fas fa-sliders text-danger"></i>
                <span>Pilihan Manajemen Pemilihan Umum</span>
            </h3>
            <p>Pilih salah satu kategori manajemen pemilu di bawah ini untuk mengelola data calon, nomor urut, visi-misi, serta perolehan suara.</p>
        </div>
    </div>

    {{-- 4. THE 3 PORTAL CARDS (PILPRES, WALIKOTA, DPRD) --}}
    <div class="pemilu-portal-grid">

        {{-- KARTU 1: MANAJEMEN PILPRES --}}
        <div class="pemilu-portal-card theme-pilpres">
            <div>
                <div class="portal-card-top">
                    <span class="portal-category-chip">
                        <i class="fas fa-flag"></i>
                        <span>Pemilu Nasional</span>
                    </span>
                    <span class="portal-period-badge">
                        <i class="fas fa-calendar-alt"></i> Periode 2024–2029
                    </span>
                </div>

                <div class="portal-icon-area">
                    <div class="portal-icon-box">
                        <i class="fas fa-landmark-flag"></i>
                    </div>
                    <div class="portal-title-group">
                        <h4 class="portal-card-title">Manajemen Pilpres</h4>
                        <p class="portal-card-subtitle">Presiden & Wakil Presiden RI</p>
                    </div>
                </div>

                <p class="portal-card-desc">
                    Kelola data pasangan calon Presiden dan Wakil Presiden RI, nomor urut resmi, visi misi kebangsaan, riwayat profil, foto kandidat, serta koalisi partai pengusung.
                </p>

                <div class="portal-metrics-box">
                    <div class="portal-metric-item">
                        <span class="portal-metric-num">{{ $pilpresCount ?? 3 }} Paslon</span>
                        <span class="portal-metric-txt">Kandidat Terdaftar</span>
                    </div>
                    <div class="portal-metric-divider"></div>
                    <div class="portal-metric-item">
                        <span class="portal-metric-num">{{ number_format($pilpresSuara ?? 0, 0, ',', '.') }}</span>
                        <span class="portal-metric-txt">Total Suara Sah</span>
                    </div>
                </div>

                <ul class="portal-features-list">
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Biodata lengkap Capres & Cawapres</span>
                    </li>
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Foto resmi pasangan calon & no. urut</span>
                    </li>
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Partai politik dan gabungan pengusung</span>
                    </li>
                </ul>
            </div>

            <div class="portal-card-bottom">
                <a href="{{ route('admin.pemilu.pilpres.index') }}" class="btn-portal-action">
                    <span>Masuk Manajemen Pilpres</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        {{-- KARTU 2: MANAJEMEN WALIKOTA --}}
        <div class="pemilu-portal-card theme-walikota">
            <div>
                <div class="portal-card-top">
                    <span class="portal-category-chip">
                        <i class="fas fa-city"></i>
                        <span>Pilkada Kota</span>
                    </span>
                    <span class="portal-period-badge">
                        <i class="fas fa-calendar-alt"></i> Kota Bandung
                    </span>
                </div>

                <div class="portal-icon-area">
                    <div class="portal-icon-box">
                        <i class="fas fa-building-columns"></i>
                    </div>
                    <div class="portal-title-group">
                        <h4 class="portal-card-title">Manajemen Walikota</h4>
                        <p class="portal-card-subtitle">Walikota & Wakil Walikota Bandung</p>
                    </div>
                </div>

                <p class="portal-card-desc">
                    Kelola data pasangan calon kepala daerah Kota Bandung, nomor urut kandidat, visi misi pembangunan kota, rekam jejak pasangan, dan rekapitulasi suara pilkada.
                </p>

                <div class="portal-metrics-box">
                    <div class="portal-metric-item">
                        <span class="portal-metric-num">{{ $walikotaCount ?? 4 }} Paslon</span>
                        <span class="portal-metric-txt">Kandidat Terdaftar</span>
                    </div>
                    <div class="portal-metric-divider"></div>
                    <div class="portal-metric-item">
                        <span class="portal-metric-num">{{ number_format($walikotaSuara ?? 0, 0, ',', '.') }}</span>
                        <span class="portal-metric-txt">Total Suara Sah</span>
                    </div>
                </div>

                <ul class="portal-features-list">
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Profil pasangan calon Walikota & Wakil</span>
                    </li>
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Visi misi & program aksi kota Bandung</span>
                    </li>
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Rekapitulasi perolehan suara Pilkada</span>
                    </li>
                </ul>
            </div>

            <div class="portal-card-bottom">
                <a href="{{ route('admin.pemilu.walikota.index') }}" class="btn-portal-action">
                    <span>Masuk Manajemen Walikota</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        {{-- KARTU 3: MANAJEMEN DPRD --}}
        <div class="pemilu-portal-card theme-dprd">
            <div>
                <div class="portal-card-top">
                    <span class="portal-category-chip">
                        <i class="fas fa-users-rectangle"></i>
                        <span>Legislatif Daerah</span>
                    </span>
                    <span class="portal-period-badge">
                        <i class="fas fa-layer-group"></i> {{ $dapilCount ?? 7 }} Dapil Kota
                    </span>
                </div>

                <div class="portal-icon-area">
                    <div class="portal-icon-box">
                        <i class="fas fa-users-line"></i>
                    </div>
                    <div class="portal-title-group">
                        <h4 class="portal-card-title">Manajemen DPRD</h4>
                        <p class="portal-card-subtitle">DPRD Kota Bandung</p>
                    </div>
                </div>

                <p class="portal-card-desc">
                    Kelola data calon anggota legislatif Kota Bandung per Daerah Pemilihan (Dapil), partai politik pengusung, nomor urut, serta fasilitas import cepat data via Excel.
                </p>

                <div class="portal-metrics-box">
                    <div class="portal-metric-item">
                        <span class="portal-metric-num">{{ number_format($legislatifCount ?? 763, 0, ',', '.') }}</span>
                        <span class="portal-metric-txt">Caleg Terdaftar</span>
                    </div>
                    <div class="portal-metric-divider"></div>
                    <div class="portal-metric-item">
                        <span class="portal-metric-num">{{ number_format($legislatifSuara ?? 0, 0, ',', '.') }}</span>
                        <span class="portal-metric-txt">Total Suara Sah</span>
                    </div>
                </div>

                <ul class="portal-features-list">
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Direktori caleg per Dapil (1 – 7) & Partai</span>
                    </li>
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Import massal data dari berkas Excel</span>
                    </li>
                    <li>
                        <i class="fas fa-circle-check"></i>
                        <span>Pencarian cepat nama, nomor urut & partai</span>
                    </li>
                </ul>
            </div>

            <div class="portal-card-bottom">
                <a href="{{ route('admin.pemilu.legislatif.index') }}" class="btn-portal-action">
                    <span>Masuk Manajemen DPRD</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection