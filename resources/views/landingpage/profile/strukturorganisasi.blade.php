@extends('landingpage.layouts.app')

@section('title', 'Struktur Organisasi')

@push('styles')
<style>
/* ---- Builder Node Styles (sama persis dengan dashboard) ---- */
.builder-node { position:absolute; z-index:10; cursor:default; user-select:none; min-width:180px; max-width:220px; padding:0; border-radius:10px; background:#fff; border:2px solid #dde3ec; box-shadow:0 3px 12px rgba(0,0,0,0.08); transition:box-shadow 0.15s; }
.builder-node:hover { box-shadow:0 6px 20px rgba(0,0,0,0.12); }
.node-header { display:flex; align-items:center; gap:8px; padding:8px 12px 6px; border-bottom:1px solid #eee; }
.node-color-dot { width:10px; height:10px; border-radius:50%; flex-shrink:0; }
.node-jabatan { font-size:0.72rem; font-weight:600; color:#555; text-transform:uppercase; letter-spacing:0.04em; line-height:1.3; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.node-body { padding:6px 12px 10px; }
.node-nama { font-size:0.88rem; font-weight:700; color:#1a1a2e; line-height:1.3; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.node-nama.empty { color:#b0b8c9; font-style:italic; font-weight:400; }
.node-nip { font-size:0.7rem; color:#8892a8; margin-top:2px; font-family:'Roboto Mono',monospace; }

/* ---- Full-screen Struktur Page (seperti sebelumnya) ---- */
:root {
    --color-primary: #B40D14;
}

.struktur-full {
    width: 100%;
    background: linear-gradient(180deg, #f4f6fa 0%, #eef1f6 40%, #f8f9fc 100%);
}

/* --- Top bar: title text + logos --- */
.struktur-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 24px;
    padding: 28px 5% 20px;
    max-width: 1600px;
    margin: 0 auto;
    width: 100%;
}
.struktur-top h1 {
    font-family: 'Inter', 'Arial Black', sans-serif;
    font-size: 1.25rem;
    color: #1a1a2e;
    margin: 0;
    line-height: 1.45;
    font-weight: 800;
    letter-spacing: 0.01em;
}
.struktur-top h1 small {
    display: block;
    font-size: 0.7rem;
    font-weight: 500;
    color: #8892a8;
    margin-top: 6px;
    letter-spacing: 0.04em;
}
.struktur-top .top-logos {
    display: flex;
    gap: 18px;
    align-items: center;
    flex-shrink: 0;
}
.struktur-top .top-logos img {
    height: 82px;
    object-fit: contain;
}

/* --- Separator garis tipis --- */
.struktur-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(180,13,20,0.2), transparent);
    max-width: 1600px;
    margin: 0 auto;
    width: calc(100% - 10%);
}

/* --- Chart area full-width --- */
.struktur-chart-area {
    width: 100%;
    padding: 24px 5% 48px;
}

/* --- Responsive --- */
@media (max-width: 768px) {
    .struktur-top {
        flex-direction: column;
        text-align: center;
        align-items: center;
        padding: 20px 4% 16px;
    }
    .struktur-top h1 { font-size: 1rem; }
    .struktur-top .top-logos img { height: 60px; }
    .struktur-chart-area { padding: 16px 4% 36px; }
}
@media (max-width: 480px) {
    .struktur-top { padding: 16px 4% 12px; }
    .struktur-top h1 { font-size: 0.85rem; }
    .struktur-top h1 small { font-size: 0.65rem; }
    .struktur-top .top-logos { gap: 10px; }
    .struktur-top .top-logos img { height: 46px; }
    .struktur-chart-area { padding: 12px 4% 28px; }
}
</style>
@endpush

@section('content')
<div class="struktur-full">
    {{-- Title + Logos full-width --}}
    <div class="struktur-top">
        <h1>
            STRUKTUR ORGANISASI<br>
            BADAN KESATUAN BANGSA<br>
            DAN POLITIK KOTA BANDUNG
            <small><i class="fas fa-sitemap"></i> Struktur kepemimpinan dan organisasi perangkat daerah</small>
        </h1>
        <div class="top-logos">
            <img src="{{ asset('images/component/logo3.png') }}" alt="Logo Bandung">
            <img src="{{ asset('images/component/logo1-2.png') }}" alt="Logo Kesbangpol">
        </div>
    </div>

    {{-- Garis pemisah --}}
    <div class="struktur-divider"></div>

    {{-- Org Chart full-width --}}
    <div class="struktur-chart-area" data-aos="fade-up">
        <x-org-chart-renderer :nodes="$strukturors" :connector-data="$connectorData ?? []" />
    </div>
</div>
@endsection
