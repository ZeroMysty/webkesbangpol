@extends('landingpage.layouts.app')
@section('title', 'Kategori: ' . ucwords(str_replace('-', ' ', strtolower($namaKategori))))

@section('content')
    <!-- Hero Section dengan Gradient Modern -->
    <section class="category-hero">
        <div class="hero-background"></div>
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <h1 class="hero-title">{{ strtoupper(str_replace('-', ' ', $namaKategori)) }}</h1>
                    <p class="hero-subtitle">Daftar Semua Mitra Dalam Kategori Ini</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Mitra Grid Section -->
    <section class="mitra-grid-section">
        <div class="container">
            <div class="mitra-grid" id="mitraGrid">
                @forelse ($mitras as $mitra)
                    <div class="mitra-card" data-name="{{ strtolower($mitra->nama_lembaga) }}">
                        <a href="{{ route('mitra.show.detail', $mitra->id) }}" class="card-link">
                            <div class="card-content">
                                <div class="card-header">
                                    <div class="logo-container">
                                        @if($mitra->logo_lembaga)
                                            <img src="{{ asset('images/mitras/logo/' . $mitra->logo_lembaga) }}" 
                                                 alt="Logo {{ $mitra->nama_lembaga }}" 
                                                 class="mitra-logo">
                                        @else
                                            <div class="logo-placeholder">
                                                <i class="fas fa-building"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-badge">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3 class="mitra-name">{{ $mitra->nama_lembaga }}</h3>
                                    <p class="mitra-leader">
                                        <i class="fas fa-user-tie"></i>
                                        {{ $mitra->ketua }}
                                    </p>
                                    <div class="card-footer">
                                        <span class="view-detail">
                                            Lihat Detail
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="empty-title">Tidak Ada Mitra Ditemukan</h3>
                        <p class="empty-description">Belum ada mitra yang terdaftar dalam kategori ini.</p>
                        <a href="{{ route('tampilmitra') }}" class="btn-primary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Semua Mitra
                        </a>
                    </div>
                @endforelse
            </div>

            @if(count($mitras) > 0)
                <div class="back-section">
                    <a href="{{ route('tampilmitra') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Semua Mitra
                    </a>
                </div>
            @endif
        </div>
    </section>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-mitra.css') }}">
@endpush

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('mitraSearch');
            const mitraCards = document.querySelectorAll('.mitra-card');
            
            // Search functionality
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                mitraCards.forEach(card => {
                    const mitraName = card.getAttribute('data-name');
                    if (mitraName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
            
            // View toggle functionality (future enhancement)
            const viewButtons = document.querySelectorAll('.view-btn');
            viewButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    viewButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    // Add list/grid view toggle logic here
                });
            });
        });
    </script>
@endsection