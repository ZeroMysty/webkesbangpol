@extends('dashboard.layouts.app')

@section('title', 'Manajemen Calon Legislatif DPRD')

@section('content')
<div class="pemilu-page-wrapper">

    {{-- 1. HERO HEADER & BREADCRUMB --}}
    <div class="mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <a href="{{ route('admin.pemilu-raya.dashboard') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Dashboard Pemilu Raya</span>
        </a>
        <div class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
            <i class="fas fa-users-rectangle text-success me-1"></i> DPRD Kota Bandung
        </div>
    </div>

    <div class="pemilu-hero-header">
        <div class="pemilu-header-left">
            <div class="pemilu-badge-category" style="background: #ECFDF5; color: #047857; border-color: #A7F3D0;">
                <i class="fas fa-users-line"></i>
                <span>Legislatif Daerah</span>
            </div>
            <h1 class="pemilu-header-title">Manajemen Caleg DPRD</h1>
            <p class="pemilu-header-subtitle">
                Kelola data calon anggota legislatif DPRD Kota Bandung menurut Daerah Pemilihan (Dapil), partai politik pengusung, serta import massal data via berkas Excel.
            </p>
        </div>
        <div class="pemilu-header-right d-flex align-items-center gap-2 flex-wrap">
            <a href="{{ route('admin.pemilu.legislatif.import.form') }}" class="btn btn-outline-success rounded-pill px-3 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                <i class="fas fa-file-excel"></i>
                <span>Import Excel</span>
            </a>
            <a href="{{ route('admin.pemilu.legislatif.create') }}" class="btn-tambah-sakip-modern" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                <i class="fas fa-plus"></i>
                <span>Tambah Caleg Baru</span>
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
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <i class="fas fa-circle-exclamation me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 2. TOOLBAR (SEARCH & STATS) --}}
    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <form method="GET" action="{{ route('admin.pemilu.legislatif.index') }}" class="d-flex align-items-center gap-2 flex-grow-1" style="max-width: 480px;">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 rounded-start-pill ps-3">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" 
                           class="form-control bg-light border-start-0 border-end-0 py-2" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari nama caleg, partai, atau dapil..." 
                           autocomplete="off">
                    <button class="btn btn-dark rounded-end-pill px-3" type="submit">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('admin.pemilu.legislatif.index') }}" class="btn btn-outline-danger ms-2 rounded-pill px-3" title="Bersihkan Pencarian">
                            <i class="fas fa-rotate-left me-1"></i> Reset
                        </a>
                    @endif
                </div>
            </form>

            <div class="d-flex align-items-center gap-3 ms-auto">
                <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
                    <i class="fas fa-database me-1 text-success"></i> Total: <strong>{{ number_format($legislatifs->total(), 0, ',', '.') }}</strong> Caleg
                </span>

                @if($legislatifs->total() > 0)
                    <form action="{{ route('admin.pemilu.legislatif.destroy.all') }}" method="POST" onsubmit="return confirm('PERINGATAN: Apakah Anda yakin ingin MENGHAPUS SEMUA data calon legislatif? Tindakan ini tidak dapat dibatalkan!');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-2" title="Hapus seluruh data caleg">
                            <i class="fas fa-trash-can me-1"></i> Hapus Semua Data
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    {{-- 3. TABEL DATA CALEG MODERN --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 py-3 text-secondary text-uppercase small fw-bold" style="width: 70px;">No Urut</th>
                        <th class="py-3 text-secondary text-uppercase small fw-bold">Nama Lengkap Caleg</th>
                        <th class="py-3 text-secondary text-uppercase small fw-bold">Partai Politik</th>
                        <th class="py-3 text-secondary text-uppercase small fw-bold text-center">Dapil</th>
                        <th class="py-3 text-secondary text-uppercase small fw-bold text-center">Total Suara Sah</th>
                        <th class="pe-4 py-3 text-secondary text-uppercase small fw-bold text-center" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($legislatifs as $legislatif)
                        <tr>
                            <td class="ps-4">
                                <span class="badge bg-light text-dark border rounded-pill px-2 py-1 fw-bold">
                                    {{ sprintf('%02d', $legislatif->no_urut) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light text-success d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block">{{ $legislatif->nama_lengkap }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-primary border rounded-pill px-3 py-1 fw-semibold">
                                    <i class="fas fa-flag me-1"></i> {{ $legislatif->nama_partai }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-success border rounded-pill px-3 py-1 fw-bold">
                                    {{ $legislatif->dapil }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="fw-bold text-dark">
                                    {{ number_format($legislatif->suara_sah, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="pe-4 text-center">
                                <div class="d-inline-flex align-items-center gap-1">
                                    <a href="{{ route('admin.pemilu.legislatif.edit', $legislatif->id) }}" class="btn-card-action btn-action-edit" title="Edit Caleg">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.pemilu.legislatif.destroy', $legislatif->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data {{ $legislatif->nama_lengkap }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-card-action btn-action-delete" title="Hapus Caleg">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted mb-2">
                                    <i class="fas fa-users-slash fa-3x text-secondary opacity-50"></i>
                                </div>
                                <h5 class="fw-bold text-dark">Tidak Ada Data Ditemukan</h5>
                                <p class="text-muted mb-3">
                                    @if(request('search'))
                                        Tidak ada data calon legislatif untuk kata kunci: "<strong>{{ request('search') }}</strong>".
                                    @else
                                        Belum ada data calon legislatif DPRD yang tersimpan di sistem.
                                    @endif
                                </p>
                                @if(request('search'))
                                    <a href="{{ route('admin.pemilu.legislatif.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                        Bersihkan Pencarian
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- 4. PAGINATION --}}
    <div class="d-flex justify-content-center">
        {{ $legislatifs->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
