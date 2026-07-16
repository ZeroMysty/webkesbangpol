@extends('landingpage.layouts.app')
@section('title', 'Dokumen')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">

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
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Menu Dokumen Badan Kesatuan Bangsa dan Politik Kota Bandung') }}" 
                        target="_blank" class="share-icon twitter" title="Bagikan ke Twitter">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode('Menu Dokumen Badan Kesatuan Bangsa dan Politik Kota Bandung') }}%20{{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" class="share-icon whatsapp" title="Bagikan ke WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ urlencode('Menu Dokumen Badan Kesatuan Bangsa dan Politik Kota Bandung') }}&body={{ urlencode('Saya ingin berbagi halaman menarik ini: ' . request()->fullUrl()) }}" 
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

    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-dokumen.css') }}">
@endpush
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
@endsection