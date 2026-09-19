@extends('dashboard.layouts.app')

@section('title', 'Organisasi Masyarakat')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="ormas-header-actions">
                        <a href="{{ route('ormass.create') }}" class="btn-tambah-konten">
                            <i class="fas fa-plus"></i> <span>Tambah Organisasi</span>
                        </a>
                        <a href="{{ route('ormass.import-history') }}" class="btn btn-sm text-white ms-2" style="background-color: #B40D14; border: 1px solid #B40D14;" title="Lihat riwayat import Excel">
                            <i class="fas fa-history me-1"></i> Riwayat Import
                        </a>
                        
                        <!-- Toolbar (Filter & Search) -->
                        <div class="ormas-toolbar-container">
                            <!-- Filter Dua Pilihan: Data Terbaru & Terlama -->
                            <div class="btn-group ormas-filter-btn-group" role="group" aria-label="Filter Urutan Data">
                                <a href="{{ route('ormass.index', array_merge(request()->query(), ['sort' => 'terbaru', 'page' => 1])) }}" 
                                   class="btn {{ request('sort', 'terbaru') == 'terbaru' ? 'btn-danger active' : 'btn-outline-secondary' }}"
                                   title="Urutkan dari data yang terbaru">
                                    <i class="fas fa-clock me-1"></i> Data Terbaru
                                </a>
                                <a href="{{ route('ormass.index', array_merge(request()->query(), ['sort' => 'terlama', 'page' => 1])) }}" 
                                   class="btn {{ request('sort') == 'terlama' ? 'btn-danger active' : 'btn-outline-secondary' }}"
                                   title="Urutkan dari data yang terlama">
                                    <i class="fas fa-history me-1"></i> Data Terlama
                                </a>
                            </div>

                            <!-- Search Form -->
                            <div class="ormas-search-container">
                                <form method="GET" action="{{ route('ormass.index') }}" class="d-flex">
                                    <input type="hidden" name="sort" value="{{ request('sort', 'terbaru') }}">
                                    <div class="input-group">
                                        <input type="text" 
                                                class="form-control" 
                                                name="search" 
                                                value="{{ request('search') }}" 
                                                placeholder="Cari nama organisasi..."
                                                aria-label="Search" autocomplete="off">
                                        <button class="btn btn-search-submit" type="submit" id="search-button" title="Cari">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        @if(request('search'))
                                            <a href="{{ route('ormass.index', ['sort' => request('sort', 'terbaru')]) }}" class="btn btn-outline-danger" title="Hapus pencarian">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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

                    <!-- Search Results Info -->
                    @if(request('search'))
                        <div class="mb-3">
                            <div class="alert alert-info mb-0 d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <i class="fas fa-info-circle me-1"></i>
                                    Menampilkan hasil pencarian untuk: "<strong>{{ request('search') }}</strong>"
                                    ({{ $ormass->total() }} hasil ditemukan) &bull;
                                    Urutan: <strong>{{ request('sort') == 'terlama' ? 'Data Terlama' : 'Data Terbaru' }}</strong>
                                </div>
                                <a href="{{ route('ormass.index', ['sort' => request('sort', 'terbaru')]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-times me-1"></i> Reset Pencarian
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered ormas-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="kolom-nama"><div class="text-wrap">NAMA ORGANISASI</div></th>
                                    <th class="kolom-alamat"><div class="text-wrap">ALAMAT</div></th>
                                    <th class="kolom-ketua"><div class="text-wrap">KETUA</div></th>
                                    <th class="kolom-akta"><div class="text-wrap">NO. TGL AKTA NOTARIS</div></th>
                                    <th class="kolom-ahu"><div class="text-wrap">NO. AHU/SKT/TGL</div></th>
                                    <th class="kolom-bidang"><div class="text-wrap">BIDANG</div></th>
                                    <th class="kolom-aksi"><div class="text-wrap">AKSI</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ormass as $o)
                                    @php
                                        $ketua      = $o->pengurus->firstWhere('jabatan', 'Ketua');
                                        $dok        = $o->dokumen->first();
                                    @endphp
                                    <tr>
                                        <td class="kolom-nama">
                                            @if(request('search'))
                                                {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', e($o->nama_organisasi)) !!}
                                            @else
                                                {{ $o->nama_organisasi }}
                                            @endif
                                        </td>
                                        <td class="kolom-alamat">{!! $o->alamat ?? '-' !!}</td>
                                        <td class="kolom-ketua">{{ $ketua->nama ?? '-' }}</td>

                                        <td class="kolom-akta">
                                            @if(!empty($dok->akta_notaris))
                                                {{ $dok->akta_notaris }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="kolom-ahu">
                                            @if(!empty($dok->ahu_skt))
                                                {{ $dok->ahu_skt }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td class="kolom-bidang">{{ $o->bidang ?? '-' }}</td>

                                        <td class="kolom-aksi text-center">
                                            <a href="{{ route('ormass.edit', $o->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ormass.destroy', $o->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus {{ $o->nama_organisasi }}?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            @if(request('search'))
                                                Tidak ada organisasi yang ditemukan dengan kata kunci "{{ request('search') }}".
                                                <br>
                                                <a href="{{ route('ormass.index', ['sort' => request('sort', 'terbaru')]) }}" class="btn btn-sm btn-primary mt-2">
                                                    <i class="fas fa-arrow-left"></i> Kembali ke semua data
                                                </a>
                                            @else
                                                Belum ada data organisasi.
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $ormass->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-crud.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-ormas-index.css') }}?v=2">
@endpush

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

    // Auto-focus search input when page loads if there's a search query
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[name="search"]');
        const urlParams = new URLSearchParams(window.location.search);
        
        if (urlParams.get('search') && searchInput) {
            searchInput.focus();
            // Move cursor to end of input
            searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);
        }
    });

    // Handle Enter key for search
    document.querySelector('input[name="search"]').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            this.closest('form').submit();
        }
    });
</script>

@stop