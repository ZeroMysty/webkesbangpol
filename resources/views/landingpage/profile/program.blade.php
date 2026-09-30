@extends('landingpage.layouts.app')
@section('title', 'Program')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">

@section('content')
    <!-- Hero Section -->
    <section class="visimisi-hero">
        <div class="visimisi-hero-overlay"></div>
        <div class="visimisi-hero-content">
            <div class="hero-badge">Programs & Activities</div>
            <h1 class="visimisi-title">PROGRAM DAN KEGIATAN</h1>
            <p class="visimisi-subtitle">Badan Kesatuan Bangsa dan Politik Kota Bandung</p>

        </div>
        <div class="hero-shape"></div>
    </section>

    <!-- Program Section -->
    <section class="program-section">
        <div class="container">
            @foreach($groupedPrograms as $bidang => $programs)
                <div class="program-bidang-box">
                    <h3 class="program-bidang-title">{{ $bidang }}</h3>
                    <ul class="program-list">
                        @foreach($programs as $key => $program)
                            <li class="program-item">
                                <span class="program-number">{{ $key + 1 }}</span>
                                <a href="{{ route('semua-artikel', ['program_id' => $program->id]) }}">
                                    {{ $program->nama_program }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>


    <x-share-section title="Program dan Kegiatan Badan Kesatuan Bangsa dan Politik Kota Bandung" />

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