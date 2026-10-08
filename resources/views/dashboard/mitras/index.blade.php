@extends('dashboard.layouts.app')

@section('title', 'Mitra')

@section('content')
<div class="container-fluid mitra-admin-page">
    <div class="mitra-page-header">
        <div>
            <span class="mitra-page-eyebrow">KEMITRAAN</span>
            <h1>Daftar Mitra</h1>
            <p>Kelola lembaga mitra dan informasi kontaknya.</p>
        </div>
        <a href="{{ route('mitras.create') }}" class="mitra-add-button">
            <i class="fas fa-plus" aria-hidden="true"></i>
            <span>Tambah Mitra</span>
        </a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <div class="mitra-grid">
        @forelse ($mitras as $mitra)
            <article class="mitra-card">
                <header class="mitra-card-header">
                    <div class="mitra-identity">
                        <div class="mitra-logo-frame">
                            @if($mitra->logo_lembaga)
                                <img src="{{ asset('images/mitras/logo/'.$mitra->logo_lembaga) }}" alt="Logo {{ $mitra->nama_lembaga }}">
                            @else
                                <i class="fas fa-building" aria-hidden="true"></i>
                            @endif
                        </div>
                        <div class="mitra-identity-copy">
                            <span class="mitra-category">{{ $mitra->kategori_mitra }}</span>
                            <h2>{{ $mitra->nama_lembaga }}</h2>
                        </div>
                    </div>
                    <div class="mitra-actions">
                        <a href="{{ route('mitras.edit', $mitra->id) }}" class="mitra-action edit" aria-label="Edit {{ $mitra->nama_lembaga }}" title="Edit">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('mitras.destroy', $mitra->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mitra-action delete" aria-label="Hapus {{ $mitra->nama_lembaga }}" title="Hapus">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </header>

                <div class="mitra-card-body">
                    <section class="mitra-detail">
                        <span class="mitra-detail-label"><i class="fas fa-location-dot" aria-hidden="true"></i> Alamat</span>
                        <div class="mitra-detail-value">{{ $mitra->alamat ? Str::limit(strip_tags($mitra->alamat), 180, '...') : 'Belum ada alamat' }}</div>
                    </section>

                    <section class="mitra-detail">
                        <span class="mitra-detail-label"><i class="fas fa-align-left" aria-hidden="true"></i> Deskripsi</span>
                        <div class="mitra-detail-value">{{ $mitra->deskripsi ? Str::limit(strip_tags($mitra->deskripsi), 220, '...') : 'Belum ada deskripsi' }}</div>
                    </section>
                </div>

                <footer class="mitra-card-footer">
                    <div class="mitra-chair">
                        <div class="mitra-chair-photo">
                            @if($mitra->foto_ketua)
                                <img src="{{ asset('images/mitras/foto_ketua/'.$mitra->foto_ketua) }}" alt="Foto {{ $mitra->ketua }}">
                            @else
                                <i class="fas fa-user" aria-hidden="true"></i>
                            @endif
                        </div>
                        <div class="mitra-chair-copy">
                            <span class="mitra-detail-label">Ketua</span>
                            <strong>{{ $mitra->ketua ?: 'Belum diisi' }}</strong>
                        </div>
                    </div>
                    <div class="mitra-contact">
                        <span class="mitra-detail-label"><i class="fas fa-phone" aria-hidden="true"></i> Kontak</span>
                        <strong>{{ $mitra->kontak ?: 'Belum diisi' }}</strong>
                    </div>
                </footer>
            </article>
        @empty
            <div class="mitra-empty">
                <span class="mitra-empty-icon"><i class="fas fa-handshake" aria-hidden="true"></i></span>
                <h2>Belum ada data mitra</h2>
                <p>Tambahkan lembaga mitra untuk mulai mengelola informasi kemitraan.</p>
                <a href="{{ route('mitras.create') }}" class="mitra-add-button">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                    <span>Tambah Mitra</span>
                </a>
            </div>
        @endforelse
    </div>

    <div class="mitra-pagination">
        {{ $mitras->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    @if(session()->has('success'))
        toastr.success(@json(session('success')), 'BERHASIL!');
    @elseif(session()->has('error'))
        toastr.error(@json(session('error')), 'GAGAL!');
    @endif
</script>
@stop

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-mitra.css') }}">
@endpush
