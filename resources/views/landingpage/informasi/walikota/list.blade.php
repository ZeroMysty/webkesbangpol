@extends('landingpage.layouts.app')

@push('styles')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-informasi.css') }}">
@endpush
@endpush

@section('content')
<div class="container py-5">
    <div class="row text-center mb-5">
        <div class="col">
            <h2 class="display-5 fw-bold text-uppercase" style="color: #B40D14;">{{ $judulHalaman ?? 'Data Pemilu' }}</h2>
            <p class="lead text-muted">
                Tahun {{ $tahunPemilu ?? 'Tidak Diketahui' }}
            </p>
        </div>
    </div>
    
    <div class="row justify-content-center">
        @forelse ($paslons as $paslon)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card candidate-card h-100">
                <div class="card-header text-center">
                    Nomor Urut <strong>{{ $paslon->no_urut }}</strong>
                </div>

                {{-- ======================================================== --}}
                {{-- LOGIKA BARU UNTUK MENAMPILKAN FOTO --}}
                {{-- ======================================================== --}}
                <div class="photo-container">
                    @php
                        // Cek URL untuk kedua foto
                        $foto1Url = null;
                        if ($paslon->capres_foto) {
                            $cleanedPath1 = str_replace('public/', '', $paslon->capres_foto);
                            if (file_exists(public_path($cleanedPath1))) {
                                $foto1Url = asset($cleanedPath1);
                            }
                        }

                        $foto2Url = null;
                        if ($paslon->cawapres_foto) {
                            $cleanedPath2 = str_replace('public/', '', $paslon->cawapres_foto);
                            if (file_exists(public_path($cleanedPath2))) {
                                $foto2Url = asset($cleanedPath2);
                            }
                        }
                    @endphp

                    @if ($foto1Url && $foto2Url)
                        {{-- Jika KEDUA foto ada, tampilkan berdampingan --}}
                        <img src="{{ $foto1Url }}" class="candidate-photo-pair" alt="Foto {{ $paslon->capres_nama }}">
                        <img src="{{ $foto2Url }}" class="candidate-photo-pair" alt="Foto {{ $paslon->cawapres_nama }}">
                    @else
                        {{-- Jika hanya satu (atau tidak ada), tampilkan foto utama saja (atau placeholder) --}}
                        <img src="{{ $foto1Url ?? 'https://placehold.co/400x250/e2e8f0/e2e8f0?text=Foto' }}" class="candidate-photo-single" alt="Foto {{ $paslon->capres_nama }}">
                    @endif
                </div>
                {{-- ======================================================== --}}
                {{-- AKHIR LOGIKA BARU --}}
                {{-- ======================================================== --}}

                <div class="card-body text-center d-flex flex-column">
                    <div class="mt-auto">
                        <h5 class="fw-bold mb-1">{{ $paslon->capres_nama }}</h5>
                        @if($paslon->cawapres_nama)
                        <p class="text-muted mb-1">&</p>
                        <h5 class="fw-bold">{{ $paslon->cawapres_nama }}</h5>
                        @endif
                    </div>
                </div>

                <div class="card-footer text-center bg-light">
                    <a href="{{ route('pemilu.detail', ['kategori' => $kategori, 'id' => $paslon->id]) }}" class="btn btn-detail w-100">
                        <i class="fas fa-search-plus me-1"></i> Lihat Detail Profil
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-warning">
                <p class="mb-0">Tidak ada data pasangan calon untuk kategori ini.</p>
            </div>
        </div>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>
@endsection
