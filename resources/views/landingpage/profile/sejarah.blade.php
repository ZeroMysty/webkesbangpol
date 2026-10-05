@extends('landingpage.layouts.app')
@section('title', 'Sejarah')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">

@section('content')
    <!-- Hero Section -->
    <section class="visimisi-hero">
        <div class="visimisi-hero-overlay"></div>
        <div class="visimisi-hero-content">
            <div class="hero-badge">History</div>
            <h1 class="visimisi-title">SEJARAH</h1>
            <p class="visimisi-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>

        </div>
        <div class="hero-shape"></div>
    </section>

    <!-- Sejarah Section -->
    <section class="sejarah-section">
        <div class="sejarah-container">
            <div class="sejarah-content" data-aos="fade-up">
                @if ($visimisis)
                    <div class="sejarah-body">
                        @if ($visimisis->first()->sejarah_image)
                            <div class="sejarah-image">
                                <img src="{{ asset('images/component/sejarah_image.png') }}" alt="Sejarah Image">
                            </div>
                        @endif

                        {!! $visimisis->first()->sejarah !!}
                    </div>
                @else
                    <div class="sejarah-alert">
                        Data Sejarah belum tersedia.
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-share-section title="Sejarah Badan Kesatuan Bangsa dan Politik Kota Bandung" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80, // Offset for fixed header if needed
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
@endsection
