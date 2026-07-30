@extends('landingpage.layouts.app')
@section('title', 'Mitra Kami')

@section('content')


    <!-- Mitra Kerja Sama Section -->
    <section class="mitra-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title mb-3">Mitra Strategis</h2>
                <p class="section-lead">Lembaga dan instansi yang bekerja sama dengan Badan Kesbangpol</p>
                <div class="section-divider mx-auto"></div>
            </div>
            
            <div class="row g-4">
                @forelse ($mitraKerjaSama as $mitra)
                    <div class="col-md-6 col-lg-3 d-flex">
                        <a href="{{ route('mitra.show.detail', $mitra->id) }}" class="mitra-card-link">
                            <div class="mitra-card">
                                <div class="mitra-card-header">
                                    <div class="mitra-logo-container">
                                        @if($mitra->logo_lembaga)
                                            <img src="{{ asset('images/mitras/logo/' . $mitra->logo_lembaga) }}" 
                                                 alt="Logo {{ $mitra->nama_lembaga }}" 
                                                 class="mitra-logo">
                                        @else
                                            <div class="mitra-logo-placeholder">
                                                <i class="fas fa-building"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mitra-card-body">
                                    <h5 class="mitra-card-title">{{ $mitra->nama_lembaga }}</h5>
                                    <p class="mitra-card-subtitle">{{ $mitra->ketua }}</p>
                                    <div class="mitra-card-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Data mitra strategis belum tersedia</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>



    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-mitra.css') }}">
@endpush
@endsection