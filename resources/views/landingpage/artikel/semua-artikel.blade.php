@extends('landingpage.layouts.app')
@section('title', 'Kumpulan Artikel')

@section('content')

<style>
    /* CSS UNIFORMITY: Memaksa semua elemen input sejajar tingginya */
    .artikel-filter-bar .form-control, 
    .artikel-filter-bar .form-select {
        height: 45px !important; 
        padding: 0.375rem 1rem !important;
        border-radius: 8px !important;
        border: 1px solid #ced4da;
    }
    
    .artikel-filter-bar label {
        margin-bottom: 0.4rem;
        font-size: 0.9rem;
    }
</style>

<div id="semua-artikel" class="container py-5">
    <h2>Semua Artikel</h2>
    
    <div class="row g-3 align-items-end artikel-filter-bar mt-3">
        
        <div class="col-lg-3 col-md-6">
            <label class="form-label fw-semibold">
                <i class="fa-solid fa-layer-group me-1 text-danger"></i> Bidang
            </label>
            <select id="filter-bidang" class="form-select">
                <option value="">Semua Bidang</option>
                @foreach ($bidangs as $bidang)
                    <option value="{{ $bidang->id }}" {{ request('bidang_id') == $bidang->id ? 'selected' : '' }}>
                        {{ $bidang->nama_bidang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-3 col-md-6">
            <label class="form-label fw-semibold">
                <i class="fa-solid fa-magnifying-glass me-1 text-danger"></i> Pencarian
            </label>
            <input type="text" id="search-input" class="form-control" placeholder="Cari artikel..." autocomplete="off">
        </div>

        <div class="col-lg-3 col-md-6">
            <label class="form-label fw-semibold">
                <i class="fa-solid fa-sort me-1 text-danger"></i> Urutkan
            </label>
            <select id="filter-sort" class="form-select">
                <option value="">Urutkan</option>
                <option value="created_desc">Terbaru</option>
                <option value="created_asc">Terlama</option>
                <option value="title_asc">Judul A-Z</option>
                <option value="title_desc">Judul Z-A</option>   
            </select>
        </div>

        <div class="col-lg-3 col-md-6 d-grid">
            <button id="reset-filter" class="btn btn-outline-danger" style="height: 45px;">
                <i class="fa-solid fa-rotate-left me-1"></i> Reset Filter
            </button>
        </div>
    </div>
    
    <div id="artikel-list" class="mt-4">
        @include('landingpage.artikel.artikel-list', ['posts' => $posts])
    </div>
</div>

@endsection