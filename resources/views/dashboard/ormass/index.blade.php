@extends('dashboard.layouts.app')

@section('title', 'Organisasi Masyarakat')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('ormass.create') }}" class="btn-tambah-konten">
                            <i class="fas fa-plus"></i> <span>Tambah Organisasi</span>
                        </a>
                        
                        <!-- Search Form -->
                        <div class="search-container">
                            <form method="GET" action="{{ route('ormass.index') }}" class="d-flex">
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" 
                                            class="form-control" 
                                            name="search" 
                                            value="{{ request('search') }}" 
                                            placeholder="Cari nama organisasi..."
                                            aria-label="Search" autocomplete="off">
                                    <button class="btn btn-outline-secondary" type="submit" id="search-button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    @if(request('search'))
                                        <a href="{{ route('ormass.index') }}" class="btn btn-outline-danger" title="Clear search">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Search Results Info -->
                    @if(request('search'))
                        <div class="mb-3">
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle"></i>
                                Menampilkan hasil pencarian untuk: "<strong>{{ request('search') }}</strong>"
                                ({{ $ormass->total() }} hasil ditemukan)
                            </div>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered program-table">
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
                                                <a href="{{ route('ormass.index') }}" class="btn btn-sm btn-primary mt-2">
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
@endpush

<script>
    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
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