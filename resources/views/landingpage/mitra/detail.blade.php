@extends('landingpage.layouts.app')
@section('title', $mitra->nama_lembaga)
<link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/landingpage-mitra.css') }}">

@section('content')
    <!-- Hero Section -->
    <section class="category-hero">
        <div class="hero-background"></div>
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <h1 class="hero-title">Mitra</h1>
                    <p class="hero-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>
                </div>
            </div>
        </div>
    </section>


<!-- Detail Mitra Section -->
<section class="mitra-section" id="main-content">
    <div class="mitra-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">

                <!-- Mitra Header Card -->
<div class="mitra-header-card">
    
    <div class="header-top-row">
        
        <div class="mitra-logo-container">
            <div class="mitra-logo">
                <img src="{{ asset('images/mitras/logo/' . $mitra->logo_lembaga) }}" 
                     alt="Logo {{ $mitra->nama_lembaga }}">
            </div>
        </div>
        
        <div class="mitra-title-info">
            <h2 class="mitra-name">{{ $mitra->nama_lembaga }}</h2>
            <span class="mitra-category-badge">{{ $mitra->kategori_mitra }}</span>
        </div>

    </div>
    @if($mitra->deskripsi)
        <div class="mitra-description">
            <p>{!! $mitra->deskripsi !!}</p>
        </div>
    @endif
</div>
                    </div>
                </div>

                <!-- Mitra Detail Grid -->
                <div class="mitra-detail-grid">

                    <!-- Leadership Card -->
                    @if($mitra->ketua)
                        <div class="detail-card leadership-card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user-tie"></i>
                                    Pimpinan
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="leader-profile">
                                    @if($mitra->foto_ketua)
                                        <div class="leader-photo">
                                            <img src="{{ asset('images/mitras/foto_ketua/' . $mitra->foto_ketua) }}" 
                                                 alt="Foto {{ $mitra->ketua }}">
                                        </div>
                                    @endif
                                    <div class="leader-info">
                                        <h4 class="leader-name">{{ $mitra->ketua }}</h4>
                                        <p class="leader-position">Ketua {{ $mitra->nama_lembaga }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Kontak -->
                    @if($mitra->kontak)
                        <div class="detail-card contact-card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-address-book"></i>
                                    Informasi Kontak
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-list">
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-label">Kontak</span>
                                            <a href="tel:{{ $mitra->kontak }}" class="contact-value">{{ $mitra->kontak }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Alamat -->
                    <div class="detail-card contact-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-address-book"></i>
                                Alamat
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="contact-list">
                                @if($mitra->alamat)
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-label">Alamat</span>
                                            <span class="contact-value">{!! $mitra->alamat !!}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-label">Alamat</span>
                                            <span class="contact-value text-muted">Alamat tidak tersedia</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Back Navigation -->
                <div class="back-navigation">
                    <a href="{{ route('tampilmitra') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali ke Daftar Mitra</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="section-decoration">
        <div class="dot-pattern dot-pattern-1"></div>
        <div class="dot-pattern dot-pattern-2"></div>
    </div>
</section>
   

    <!-- Custom Styles -->
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-mitra.css') }}">
@endpush

    <!-- Scripts -->
    <script>
        // Copy to clipboard functionality
        function copyToClipboard() {
            const url = window.location.href;
            
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(() => {
                    showToast();
                }).catch(() => {
                    fallbackCopyToClipboard(url);
                });
            } else {
                fallbackCopyToClipboard(url);
            }
        }

        function fallbackCopyToClipboard(text) {
            const tempInput = document.createElement('input');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999);
            
            try {
                document.execCommand('copy');
                showToast();
            } catch (err) {
                console.error('Failed to copy text: ', err);
            }
            
            document.body.removeChild(tempInput);
        }

        function showToast() {
            const toast = document.getElementById('copyToast');
            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Enhanced scroll animations
        function observeElements() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.detail-card').forEach(card => {
                observer.observe(card);
            });
        }

        // Initialize animations when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            observeElements();
            
            // Add smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });

        // Add loading state for images
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                img.addEventListener('load', function() {
                    this.style.opacity = '1';
                });
                
                img.addEventListener('error', function() {
                    this.style.opacity = '0.5';
                    this.title = 'Gambar tidak dapat dimuat';
                });
            });
        });
    </script>
@endsection