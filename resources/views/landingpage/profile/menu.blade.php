@extends('landingpage.layouts.app')
@section('title', 'Profile')

@push('styles')
    @vite(['resources/css/landingpage-profile.css'])
@endpush

@section('content')

    <!-- Hero Section -->
    <div class="profile-container">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">PROFIL ORGANISASI</h1>
                <p class="hero-subtitle">Mengenal lebih dekat dengan Badan Kesatuan Bangsa dan Politik Kota Bandung</p>
            </div>
            <div class="hero-decoration">
                <div class="decoration-circle"></div>
                <div class="decoration-square"></div>
            </div>
        </div>

        <!-- Profile Menu Grid -->
        <div class="menu-container">
            <div class="menu-grid">
                <!-- Visi Misi -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-icon">
                        <i class="fas fa-eye fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Visi Misi</h3>
                        <p class="card-description">Pandangan masa depan dan tujuan utama organisasi dalam memberikan pelayanan terbaik</p>
                        <a href="{{ route('tampilvisimisi') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Tugas dan Fungsi -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-icon">
                        <i class="fas fa-tasks fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Tugas dan Fungsi</h3>
                        <p class="card-description">Peran dan tanggung jawab organisasi dalam menjalankan mandate yang diberikan</p>
                        <a href="{{ route('tampiltugasfungsi') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Struktur Organisasi -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-icon">
                        <i class="fas fa-sitemap fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Struktur Organisasi</h3>
                        <p class="card-description">Susunan kepemimpinan dan pembagian tugas dalam organisasi</p>
                        <a href="{{ route('tampilstruktur') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Landasan Hukum -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-icon">
                        <i class="fas fa-gavel fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Landasan Hukum</h3>
                        <p class="card-description">Dasar hukum pembentukan dan operasional organisasi</p>
                        <a href="{{ route('tampildasarhukum') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Program dan Kegiatan -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="card-icon">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Program dan Kegiatan</h3>
                        <p class="card-description">Berbagai program kerja dan kegiatan yang telah dan akan dilaksanakan</p>
                        <a href="{{ route('tampilprogram') }}" class="card-link">
                            <span>Selengkapnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Sejarah -->
                <div class="menu-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-icon">
                        <i class="fas fa-history fa-2x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Sejarah</h3>
                        <p class="card-description">Perjalanan dan perkembangan organisasi dari masa ke masa</p>
                        <a href="{{ route('tampilsejarah') }}" class="card-link">
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
    
    <x-share-section title="Menu Profile Badan Kesatuan Bangsa dan Politik Kota Bandung" />

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/sakip-menu.css') }}">
    @endpush
@endsection