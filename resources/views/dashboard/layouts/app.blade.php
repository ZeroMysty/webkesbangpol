<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title') - Badan Kesatuan Bangsa dan Politik Kota Bandung
        @else
            Bakesbangpol Kota Bandung 
        @endif
    </title>

    @vite(['resources/css/app.css', 'resources/js/dashboard.js'])
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/component/logoremovebg2.png') }}" type="image/png">
    
    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-artikel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-bidang.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-visimisi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-strukturors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-program.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-ormas.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bagan-strukturors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-banner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-galeri.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-landasanhukum.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-sakip.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-pemilu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-responsive.css') }}">

    @stack('styles')
</head>
<body class="admin-interface">
    <div class="d-flex">
        @include('dashboard.layouts.partials.sidebar')

        <div class="main-wrapper flex-grow-1">
            @include('dashboard.layouts.partials.navbar')

            <main class="dashboard-content p-3">
                @yield('content')
            </main>
        </div>
    </div>


    @include('dashboard.layouts.partials.flash-messages')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Letakkan paling bawah -->
    @stack('scripts')

</body>
</html>
