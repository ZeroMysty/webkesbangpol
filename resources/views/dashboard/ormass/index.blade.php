@extends('dashboard.layouts.app')

@section('title', 'Organisasi Masyarakat')

@section('content')
<div class="container-fluid ormas-admin-page">
    <header class="ormas-page-header">
        <div>
            <span class="ormas-page-eyebrow">INFORMASI &amp; KEMASYARAKATAN</span>
            <h1>Organisasi Masyarakat</h1>
            <p>Kelola data organisasi, pengurus, dan dokumen legalitas.</p>
        </div>
        <div class="ormas-page-actions">
            <a href="{{ route('ormass.import-history') }}" class="ormas-history-button">
                <i class="fas fa-history" aria-hidden="true"></i>
                <span>Riwayat Import</span>
            </a>
            <a href="{{ route('ormass.create') }}" class="ormas-add-button">
                <i class="fas fa-plus" aria-hidden="true"></i>
                <span>Tambah Organisasi</span>
            </a>
        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="ormas-tools-card" aria-label="Pencarian dan pengurutan organisasi">
        <div class="ormas-filter-group" role="group" aria-label="Filter urutan data">
            <a href="{{ route('ormass.index', array_merge(request()->query(), ['sort' => 'terbaru', 'page' => 1])) }}"
                class="ormas-filter-button {{ request('sort', 'terbaru') == 'terbaru' ? 'active' : '' }}">
                <i class="fas fa-clock" aria-hidden="true"></i> Data Terbaru
            </a>
            <a href="{{ route('ormass.index', array_merge(request()->query(), ['sort' => 'terlama', 'page' => 1])) }}"
                class="ormas-filter-button {{ request('sort') == 'terlama' ? 'active' : '' }}">
                <i class="fas fa-history" aria-hidden="true"></i> Data Terlama
            </a>
        </div>

        <form method="GET" action="{{ route('ormass.index') }}" class="ormas-search-form">
            <input type="hidden" name="sort" value="{{ request('sort', 'terbaru') }}">
            <label class="visually-hidden" for="ormas-search">Cari nama organisasi</label>
            <div class="ormas-search-input-wrap">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input id="ormas-search" type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama organisasi..." autocomplete="off">
                @if(request('search'))
                    <a href="{{ route('ormass.index', ['sort' => request('sort', 'terbaru')]) }}"
                        class="ormas-clear-search" aria-label="Hapus pencarian" title="Hapus pencarian">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </a>
                @endif
            </div>
            <button type="submit" class="ormas-search-submit">Cari</button>
        </form>
    </section>

    @if(request('search'))
        <div class="ormas-search-summary">
            <div>
                <i class="fas fa-circle-info" aria-hidden="true"></i>
                Hasil pencarian untuk <strong>“{{ request('search') }}”</strong>
                <span class="ormas-result-count">{{ $ormass->total() }} data</span>
                <span class="ormas-sort-summary">Urutan: {{ request('sort') == 'terlama' ? 'Terlama' : 'Terbaru' }}</span>
            </div>
            <a href="{{ route('ormass.index', ['sort' => request('sort', 'terbaru')]) }}">Reset pencarian</a>
        </div>
    @else
        <div class="ormas-list-summary">
            <span>Daftar organisasi</span>
            <span>{{ $ormass->total() }} data</span>
        </div>
    @endif

    <div class="ormas-record-grid">
        @forelse($ormass as $o)
            @php
                $ketua = $o->pengurus->firstWhere('jabatan', 'Ketua');
                $dok = $o->dokumen->first();
                $aktaParts = preg_split('/,\s*(?=Tanggal\s*:)/i', trim((string) ($dok->akta_notaris ?? '')), 2);
                $ahuParts = preg_split('/,\s*(?=Tanggal\s*:)/i', trim((string) ($dok->ahu_skt ?? '')), 2);
            @endphp
            <article class="ormas-record-card">
                <header class="ormas-record-header">
                    <div class="ormas-record-identity">
                        <span class="ormas-record-icon"><i class="fas fa-people-group" aria-hidden="true"></i></span>
                        <div class="ormas-record-title">
                            <span class="ormas-record-kicker">ORGANISASI MASYARAKAT</span>
                            <h2>
                                @if(request('search'))
                                    {!! str_ireplace(request('search'), '<mark>' . e(request('search')) . '</mark>', e($o->nama_organisasi)) !!}
                                @else
                                    {{ $o->nama_organisasi }}
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="ormas-record-actions">
                        <a href="{{ route('ormass.edit', $o->id) }}" class="ormas-action-button edit"
                            aria-label="Edit {{ $o->nama_organisasi }}" title="Edit">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('ormass.destroy', $o->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus organisasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ormas-action-button delete"
                                aria-label="Hapus {{ $o->nama_organisasi }}" title="Hapus">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </header>

                <div class="ormas-record-body">
                    <section class="ormas-record-detail address">
                        <span class="ormas-detail-label"><i class="fas fa-location-dot" aria-hidden="true"></i> Alamat</span>
                        <div class="ormas-detail-value">{{ $o->alamat ? Str::limit(strip_tags($o->alamat), 200, '...') : '-' }}</div>
                    </section>
                    <section class="ormas-record-detail">
                        <span class="ormas-detail-label"><i class="fas fa-user-tie" aria-hidden="true"></i> Ketua</span>
                        <div class="ormas-detail-value">{{ $ketua->nama ?? '-' }}</div>
                    </section>
                    <section class="ormas-record-detail right">
                        <span class="ormas-detail-label"><i class="fas fa-file-signature" aria-hidden="true"></i> Akta Notaris</span>
                        <div class="ormas-detail-value ormas-document-value">
                            @if(count($aktaParts) === 2)
                                <span>{{ trim($aktaParts[0]) }}</span>
                                <span>{{ trim($aktaParts[1]) }}</span>
                            @else
                                <span>{{ $aktaParts[0] ?: '-' }}</span>
                            @endif
                        </div>
                    </section>
                    <section class="ormas-record-detail">
                        <span class="ormas-detail-label"><i class="fas fa-certificate" aria-hidden="true"></i> AHU / SKT</span>
                        <div class="ormas-detail-value ormas-document-value">
                            @if(count($ahuParts) === 2)
                                <span>{{ trim($ahuParts[0]) }}</span>
                                <span>{{ trim($ahuParts[1]) }}</span>
                            @else
                                <span>{{ $ahuParts[0] ?: '-' }}</span>
                            @endif
                        </div>
                    </section>
                    <section class="ormas-record-detail right">
                        <span class="ormas-detail-label"><i class="fas fa-layer-group" aria-hidden="true"></i> Bidang</span>
                        <div class="ormas-detail-value">{{ $o->bidang ?: '-' }}</div>
                    </section>
                </div>
            </article>
        @empty
            <div class="ormas-empty-state">
                <span class="ormas-empty-icon"><i class="fas fa-people-group" aria-hidden="true"></i></span>
                <h2>{{ request('search') ? 'Organisasi tidak ditemukan' : 'Belum ada data organisasi' }}</h2>
                <p>
                    @if(request('search'))
                        Tidak ada organisasi yang cocok dengan kata kunci “{{ request('search') }}”.
                    @else
                        Tambahkan organisasi masyarakat untuk mulai mengelola data dan legalitasnya.
                    @endif
                </p>
                @if(request('search'))
                    <a href="{{ route('ormass.index', ['sort' => request('sort', 'terbaru')]) }}" class="ormas-add-button">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali ke semua data
                    </a>
                @else
                    <a href="{{ route('ormass.create') }}" class="ormas-add-button">
                        <i class="fas fa-plus" aria-hidden="true"></i> Tambah Organisasi
                    </a>
                @endif
            </div>
        @endforelse
    </div>

    <div class="ormas-pagination">
        {{ $ormass->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    @if(session()->has('success'))
        toastr.success(@json(session('success')), 'BERHASIL!');
    @endif
    @if(session()->has('warning'))
        toastr.warning(@json(session('warning')), 'PERINGATAN!');
    @endif
    @if(session()->has('error'))
        toastr.error(@json(session('error')), 'GAGAL!');
    @endif
</script>
@stop

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-ormas-index.css') }}?v=4">
@endpush
