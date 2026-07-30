<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    {{-- Vite CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/component/logoremovebg2.png') }}" type="image/png" />

    <title>
        @hasSection('title')
            @yield('title') - Badan Kesatuan Bangsa dan Politik Kota Bandung
        @else
            Bakesbangpol Kota Bandung
        @endif
    </title>

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

    {{-- Tempat tambahan JS dari blade lain --}}
    @stack('scripts')

    {{-- Scroll to top button script --}}
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const scrollBtn = document.getElementById('scrollTopBtn');

        // Show button after scroll down 200px
        window.addEventListener('scroll', () => {
          if (window.scrollY > 200) {
            scrollBtn.style.display = 'block';
          } else {
            scrollBtn.style.display = 'none';
          }
        });

        // Scroll to top on click
        scrollBtn.addEventListener('click', () => {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      });
    </script>
</body>
</html>
