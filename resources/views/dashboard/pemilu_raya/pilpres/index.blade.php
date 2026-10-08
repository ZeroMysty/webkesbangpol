@extends('dashboard.layouts.app')

@section('title', 'Manajemen Pilpres')

@section('content')
<div class="pemilu-page-wrapper">

    {{-- 1. HERO HEADER & BREADCRUMB --}}
    <div class="mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <a href="{{ route('admin.pemilu-raya.dashboard') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Dashboard Pemilu Raya</span>
        </a>
        <div class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
            <i class="fas fa-flag text-danger me-1"></i> Pemilihan Presiden & Wakil Presiden RI
        </div>
    </div>

    <div class="pemilu-hero-header">
        <div class="pemilu-header-left">
            <div class="pemilu-badge-category">
                <i class="fas fa-landmark-flag"></i>
                <span>Pemilu Nasional</span>
            </div>
            <h1 class="pemilu-header-title">Manajemen Paslon Pilpres</h1>
            <p class="pemilu-header-subtitle">
                Kelola daftar pasangan calon Presiden dan Wakil Presiden Republik Indonesia, nomor urut peserta, profil biodata, serta koalisi partai politik.
            </p>
        </div>
        <div class="pemilu-header-right">
            <a href="{{ route('admin.pemilu.pilpres.create') }}" class="btn-tambah-sakip-modern">
                <i class="fas fa-plus"></i>
                <span>Tambah Paslon Baru</span>
            </a>
        </div>
    </div>

    {{-- Session Feedback Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <i class="fas fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 2. KONTEN PASLON --}}
    @if($paslons->isNotEmpty())
        <div class="paslon-grid">
            @foreach($paslons as $paslon)
                <div class="paslon-card">
                    <div>
                        {{-- Card Header --}}
                        <div class="paslon-card-header">
                            <div class="d-flex align-items-center gap-2">
                                <span class="paslon-number-chip" title="Nomor Urut Pasangan Calon">
                                    {{ sprintf('%02d', $paslon->no_urut) }}
                                </span>
                                <div>
                                    <span class="text-uppercase fw-bold text-muted small d-block" style="font-size: 0.72rem; letter-spacing: 0.05em;">Nomor Urut</span>
                                    <span class="fw-bold text-dark">Pasangan Calon</span>
                                </div>
                            </div>

                            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill small">
                                <i class="fas fa-calendar-check me-1 text-danger"></i> {{ $paslon->tahun_pemilu ?? '2024' }}
                            </span>
                        </div>

                        {{-- Duo Photos --}}
                        <div class="paslon-photos-duo">
                            {{-- Capres --}}
                            <div class="paslon-photo-box">
                                @if($paslon->capres_foto && file_exists(public_path($paslon->capres_foto)))
                                    <img src="{{ asset($paslon->capres_foto) }}" alt="{{ $paslon->capres_nama }}">
                                @else
                                    <div class="rounded-3 bg-light border d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 100px; height: 110px;">
                                        <i class="fas fa-user-tie fa-2x text-muted"></i>
                                    </div>
                                @endif
                                <span class="candidate-role text-danger d-block">Calon Presiden</span>
                            </div>

                            {{-- Cawapres --}}
                            <div class="paslon-photo-box">
                                @if($paslon->cawapres_foto && file_exists(public_path($paslon->cawapres_foto)))
                                    <img src="{{ asset($paslon->cawapres_foto) }}" alt="{{ $paslon->cawapres_nama }}">
                                @else
                                    <div class="rounded-3 bg-light border d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 100px; height: 110px;">
                                        <i class="fas fa-user-tie fa-2x text-muted"></i>
                                    </div>
                                @endif
                                <span class="candidate-role text-primary d-block">Calon Wakil Presiden</span>
                            </div>
                        </div>

                        {{-- Candidate Names --}}
                        <div class="paslon-candidate-names text-center">
                            <h4 class="paslon-name-item mb-1">{{ $paslon->capres_nama }}</h4>
                            <span class="text-muted small fw-semibold">&</span>
                            <h4 class="paslon-name-item mt-1">{{ $paslon->cawapres_nama }}</h4>
                        </div>

                        {{-- Partai Pengusung --}}
                        <div class="text-center mb-3">
                            <span class="paslon-partai-chip">
                                <i class="fas fa-landmark text-danger"></i>
                                <span>{{ $paslon->partai_pengusung }}</span>
                            </span>
                        </div>

                        @if($paslon->total_suara)
                            <div class="bg-light p-2 rounded-3 text-center mb-3 border">
                                <span class="small text-muted d-block">Total Suara Sah Terdata</span>
                                <span class="fw-bold text-dark fs-5">{{ number_format($paslon->total_suara, 0, ',', '.') }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Actions --}}
                    <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-2">
                        <a href="{{ route('admin.pemilu.pilpres.show', $paslon->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                            <i class="fas fa-eye me-1"></i> Rincian
                        </a>

                        <div class="d-flex align-items-center gap-1">
                            <a href="{{ route('admin.pemilu.pilpres.edit', $paslon->id) }}" class="btn-card-action btn-action-edit" title="Edit Paslon">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('admin.pemilu.pilpres.destroy', $paslon->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data paslon nomor urut {{ $paslon->no_urut }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-card-action btn-action-delete" title="Hapus Paslon">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card border-0 shadow-sm rounded-4 p-5 text-center">
            <div class="mb-3 text-muted">
                <i class="fas fa-landmark-flag fa-4x text-danger opacity-50"></i>
            </div>
            <h4 class="fw-bold text-dark">Belum Ada Pasangan Calon</h4>
            <p class="text-muted">Data pasangan calon Presiden & Wakil Presiden belum tersedia.</p>
            <div class="mt-2">
                <a href="{{ route('admin.pemilu.pilpres.create') }}" class="btn-tambah-sakip-modern mx-auto">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Paslon Baru</span>
                </a>
            </div>
        </div>
    @endif

</div>
@endsection
