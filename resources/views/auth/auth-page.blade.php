<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/component/logoremovebg2.png') }}" type="image/png">
    <title>
        @hasSection('title')
            @yield('title') - Badan Kesatuan Bangsa dan Politik Kota Bandung 
        @else
            Bakesbangpol Kota Bandung
        @endif
    </title>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/.css') }}"> --}}
    @stack('css')
    @yield('css')
<style>
    .auth-page *,
    .auth-page *::before,
    .auth-page *::after {
        animation: none !important;
        transition: none !important;
        scroll-behavior: auto !important;
    }

    html, body {
        min-height: 100%;
        background: #f3f5f8;
    }

</style>
</head>
<body class="auth-page @yield('body_class')">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                {{-- Card --}}
                <div>
                    {{-- Body --}}
                    <div class="card-body">
                        @yield('auth_body')
                    </div>

                    {{-- Footer --}}
                    @hasSection('auth_footer')
                        <div class="card-footer text-center">
                            @yield('auth_footer')
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    @stack('js')
    @yield('js')
</body>
</html>
