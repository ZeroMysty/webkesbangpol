@extends('landingpage.layouts.app')
@section('title', 'Profile')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">

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
        <!-- Bagian Share -->
    <section class="share-section py-4">
        <div class="container">
            <div class="page-share p-3 rounded shadow-sm" style="background: #ffffff;">
                <h3 class="share-title mb-3">
                    <i class="fas fa-share-alt"></i>
                    Bagikan Halaman Ini
                </h3>
                <div class="share-options d-flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" class="share-icon facebook" title="Bagikan ke Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Menu Profile Badan Kesatuan Bangsa dan Politik Kota Bandung') }}" 
                        target="_blank" class="share-icon twitter" title="Bagikan ke Twitter">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode('Menu Profile Badan Kesatuan Bangsa dan Politik Kota Bandung') }}%20{{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" class="share-icon whatsapp" title="Bagikan ke WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ urlencode('Menu Profile Badan Kesatuan Bangsa dan Politik Kota Bandung') }}&body={{ urlencode('Saya ingin berbagi halaman menarik ini: ' . request()->fullUrl()) }}" 
                        class="share-icon email" title="Bagikan via Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="copyToClipboard()" 
                        class="share-icon copy" title="Salin Link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>

            <!-- Toast Notification -->
            <div id="copyToast" class="copy-toast hidden">
                <i class="fas fa-check-circle"></i>
                Link berhasil disalin!
            </div>
        </div>
    </section>

        <!-- Script Share -->
    <script>
        function copyToClipboard() {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    showToast();
                }).catch(() => {
                    fallbackCopyToClipboard();
                });
            } else {
                fallbackCopyToClipboard();
            }
        }

        function fallbackCopyToClipboard() {
            const tempInput = document.createElement('input');
            tempInput.value = window.location.href;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            showToast();
        }

        function showToast() {
            const toast = document.getElementById('copyToast');
            toast.classList.remove('hidden');
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 300);
            }, 3000);
        }
    </script>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-dokumen.css') }}">
@endpush
@endsection