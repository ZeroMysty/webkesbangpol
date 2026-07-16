@extends('landingpage.layouts.app')
@section('title', 'Pemilihan Legislatif')

@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-informasi.css') }}">
@endpush

<section class="hero-legislatif">
    <div class="container">
        <h1 class="display-5 fw-bold">{{ $judulHalaman ?? 'Pemilihan Legislatif' }}</h1>
        <p class="lead">Daftar Calon Anggota Legislatif DPRD Kota Bandung</p>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        @if($groupedLegislatifs->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                <h3 class="text-muted">Data Calon Legislatif Belum Tersedia</h3>
                <p>Silakan periksa kembali nanti.</p>
            </div>
        @else
            @foreach($groupedLegislatifs as $dapil => $calegsInDapil)
                <div class="dapil-section">
                    <h2 class="dapil-title">Daerah Pemilihan {{ $dapil }}</h2>
                    <div class="row g-4">
                        @foreach($calegsInDapil as $caleg)
                            <div class="col-md-6 col-lg-3">
                                <a href="{{ route('pemilu.detail', ['kategori' => 'legislatif', 'id' => $caleg->id]) }}" class="text-decoration-none">
                                    <div class="caleg-card">
                                        <div class="position-relative">
                                            <img src="{{ asset('images/legislatif/' . $caleg->foto_profile) }}" 
                                                 class="card-img-top" 
                                                 alt="Foto {{ $caleg->nama_lengkap }}"
                                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/e2e8f0/e2e8f0?text=Foto';">
                                            <div class="caleg-no-urut">{{ $caleg->no_urut }}</div>
                                        </div>
                                        <div class="card-body">
                                            <p class="caleg-partai">{{ $caleg->nama_partai }}</p>
                                            <h5 class="caleg-nama">{{ $caleg->nama_lengkap }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('pemilu.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Menu Pemilu
            </a>
        </div>
    </div>
</section>
@endsection
