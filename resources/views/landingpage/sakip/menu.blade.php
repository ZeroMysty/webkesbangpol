@extends('landingpage.layouts.app')
@section('title', 'Dokumen')

@section('content')

    <!-- Hero Section -->
    <div class="profile-container">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">DOKUMEN & REGULASI</h1>
                <p class="hero-subtitle">Kumpulan kebijakan dan laporan resmi Badan Kesatuan Bangsa dan Politik Kota Bandung</p>
            </div>
            <div class="hero-decoration">
                <div class="decoration-circle"></div>
                <div class="decoration-square"></div>
            </div>
        </div>

        <!-- SAKIP Menu Grid -->
        <div class="menu-container">
            <div class="menu-grid">
                <!-- Indikator Kinerja Utama -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-icon">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Indikator Kinerja Utama</h3>
                        <p class="card-description">Ukuran pencapaian target dan sasaran strategis organisasi untuk menilai efektivitas kinerja</p>
                        <a href="{{ route('tampiliku') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Rencana Kerja -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-icon">
                        <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Rencana Kerja</h3>
                        <p class="card-description">Dokumen perencanaan yang memuat program dan kegiatan yang akan dilaksanakan dalam periode tertentu</p>
                        <a href="{{ route('tampilrenja') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Rencana Strategi -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-icon">
                        <i class="fas fa-chess fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Rencana Strategi</h3>
                        <p class="card-description">Dokumen perencanaan strategis jangka panjang untuk mencapai visi dan misi organisasi</p>
                        <a href="{{ route('tampilrenstra') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Pengukuran Kerja -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-icon">
                        <i class="fas fa-tachometer-alt fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Pengukuran Kerja</h3>
                        <p class="card-description">Sistem evaluasi dan monitoring untuk mengukur capaian kinerja organisasi secara berkala</p>
                        <a href="{{ route('tampilukurkerja') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Laporan AKIP -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="card-icon">
                        <i class="fas fa-file-alt fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Laporan AKIP</h3>
                        <p class="card-description">Laporan Akuntabilitas Kinerja Instansi Pemerintah sebagai pertanggungjawaban pelaksanaan tugas</p>
                        <a href="{{ route('tampillakip') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Laporan Kajian -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-icon">
                        <i class="fas fa-book-open fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Laporan Kajian</h3>
                        <p class="card-description">Dokumen kajian dan riset sebagai rekomendasi kebijakan dan transparansi publik</p>
                        <a href="{{ route('tampillaporankajian') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-share-section title="Menu Dokumen SAKIP Badan Kesatuan Bangsa dan Politik Kota Bandung" />

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/landingpage-dokumen.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/sakip-menu.css') }}">
    @endpush
@endsection