<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title') - Bakesbangpol Kota Bandung
        @else
            Fullscreen
        @endif
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/component/logoremovebg2.png') }}" type="image/png">

    @stack('styles')
</head>
<body style="margin:0;padding:0;overflow:hidden;background:#f4f6f9;">
    @yield('content')
    @stack('scripts')
</body>
</html>
