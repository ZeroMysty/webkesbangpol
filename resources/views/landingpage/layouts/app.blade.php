<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    @php
        $pageTitle = trim($__env->yieldContent('title')) ? trim($__env->yieldContent('title')) . ' - Badan Kesatuan Bangsa dan Politik Kota Bandung' : 'Bakesbangpol Kota Bandung';
        $metaDesc = trim($__env->yieldContent('meta_description')) ?: 'Portal Resmi Badan Kesatuan Bangsa dan Politik (Bakesbangpol) Kota Bandung. Menyajikan informasi berita, program kerja, ormas, dan pelayanan publik.';
        $metaImg = trim($__env->yieldContent('meta_image')) ?: asset('images/component/logoremovebg2.png');
        $ogType = trim($__env->yieldContent('og_type')) ?: 'website';
    @endphp

    <title>{{ $pageTitle }}</title>

    <meta name="description" content="{{ $metaDesc }}" />
    <meta name="keywords" content="Bakesbangpol Bandung, Kesbangpol Kota Bandung, Kesatuan Bangsa, Politik Kota Bandung, Ormas Bandung" />
    <meta name="author" content="Badan Kesatuan Bangsa dan Politik Kota Bandung" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ url()->current() }}" />

    {{-- Open Graph / Facebook / WhatsApp --}}
    <meta property="og:site_name" content="Bakesbangpol Kota Bandung" />
    <meta property="og:type" content="{{ $ogType }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ $pageTitle }}" />
    <meta property="og:description" content="{{ $metaDesc }}" />
    <meta property="og:image" content="{{ $metaImg }}" />

    {{-- Twitter / X --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="{{ url()->current() }}" />
    <meta name="twitter:title" content="{{ $pageTitle }}" />
    <meta name="twitter:description" content="{{ $metaDesc }}" />
    <meta name="twitter:image" content="{{ $metaImg }}" />

    {{-- Vite CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/component/logoremovebg2.png') }}" type="image/png" />

    {{-- FontAwesome 6 Free via Global CDN --}}
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-shared.css') }}">
    
    {{-- Tempat tambahan CSS dari blade lain --}}
    @stack('styles')
</head>
<body>
    <div id="app" class="main-wrapper">
        {{-- Header --}}
        @include('landingpage.shared.header')

        {{-- Main Content --}}
        <main class="main-content">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('landingpage.shared.footer')
    </div>

    {{-- Overlay loading --}}
    <div id="loading-overlay">
        <div class="loading-spinner"></div>
    </div>

    {{-- Scroll to top button --}}
    <button id="scrollTopBtn" class="scroll-top-btn" title="Kembali ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>

    {{-- Floating CS WhatsApp Button --}}
    @include('components.cs-button')

    {{-- Tempat tambahan JS dari blade lain --}}
    @stack('scripts')
</body>
</html>
