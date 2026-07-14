<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    /* Wrapper tetap stabil secara dimensi tinggi agar tidak jitter saat scroll */
    .nav-wrapper {
        position: sticky;
        top: 0;
        z-index: 9999;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.4s ease;
        background-color: #b01015; /* Merah Kesbangpol */
        width: 100%;
        padding: 0;
    }

    /* Smart Scroll Hide */
    .nav-wrapper.nav-hidden {
        transform: translateY(-100%);
    }

    /* NORMAL STATE (ATAS) - Full Width */
    .navbar-pill {
        background-color: #b01015;
        width: 100%;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        padding: 15px 50px;
        border-radius: 0;
    }

    /* SCROLLED STATE (JADI PILL MELAYANG) */
    .nav-wrapper.scrolled { 
        background-color: transparent !important; 
        padding: 15px 0;
    }
    .nav-wrapper.scrolled .navbar-pill {
        background-color: rgba(176, 16, 21, 0.9) !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 50px;
        width: 90%; 
        max-width: 1200px;
        margin: 0 auto; 
        padding: 10px 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    /* LOGO & RESPONSIVE BRANDING */
    .brand-logo img { height: 40px; width: auto; object-fit: contain; }
    
    @media (max-width: 576px) {
        .brand-text { display: none; }
        .brand-logo img { height: 35px; }
    }

    /* INTERACTIVE HOVER UNDERLINE & ACTIVE STATE */
    .nav-link { 
        color: rgba(255, 255, 255, 0.85) !important; 
        font-weight: 500; 
        cursor: pointer; 
        position: relative;
        padding: 8px 12px !important;
        transition: color 0.3s ease;
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: #ffffff;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after,
    .nav-item.is-active .nav-link::after,
    .nav-item.active .nav-link::after {
        width: 80%;
    }

    .nav-link:hover,
    .nav-item.is-active .nav-link,
    .nav-item.active .nav-link { 
        color: #ffffff !important; 
    }

    /* Active Highlight Khusus Mobile (Background) */
    @media (max-width: 991.98px) {
        .nav-item.active .nav-link {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }
        .nav-item.active .nav-link::after { display: none; }
    }

    /* CHEVRON ICON */
    .chevron-icon {
        font-size: 0.75rem;
        transition: transform 0.3s ease;
        vertical-align: middle;
    }
    .nav-item:hover .chevron-icon,
    .nav-item.is-active .chevron-icon {
        transform: rotate(180deg);
    }

    /* MEGA MENU (DESKTOP) */
    @media all and (min-width: 992px) {
        .navbar-pill .nav-item { position: static !important; }
        
        .mega-menu {
            display: block; 
            position: absolute;
            left: 5%; right: 5%; 
            top: 100%;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            z-index: 9998;
            min-height: 220px;
            
            opacity: 0;
            visibility: hidden;
            transform: translateY(15px);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .mega-menu::before {
            content: '';
            position: absolute;
            top: -30px;
            left: 0;
            width: 100%;
            height: 30px;
        }

        .nav-item:hover .mega-menu,
        .nav-item.is-active .mega-menu { 
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    }

    /* MEGA MENU DETAIL STYLING */
    .mega-menu .row { margin-left: 0; margin-right: 0; }

    .mega-menu-title {
        color: #b01015; font-weight: 700; font-size: 0.85rem;
        text-transform: uppercase; margin-bottom: 15px;
        border-bottom: 2px solid #f5f5f5; padding-bottom: 10px;
    }

    .mega-menu a {
        display: block; padding: 8px 15px; color: #555;
        text-decoration: none; border-radius: 8px;
        font-size: 0.9rem; transition: all 0.2s ease;
    }

    .mega-menu a:hover { 
        background: #fdf2f2; 
        color: #b01015; 
        padding-left: 20px; 
    }
    
    .mega-menu-empty { font-size: 0.8rem; color: #999; font-style: italic; margin-top: 10px; }

    /* OFFCANVAS MOBILE NAVIGATION */
    .mobile-menu-header { display: none; }
    
    @media (max-width: 991.98px) {
        .navbar-pill {
            padding: 10px 20px !important;
            width: 100%;
        }
        
        .mobile-menu-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .mobile-menu-header img { height: 35px; }
        
        .btn-close-menu {
            background: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .navbar-collapse {
            position: fixed;
            top: 0;
            right: -100%; /* Sembunyi di kanan */
            width: 85%;
            max-width: 350px;
            height: 100vh;
            background-color: rgba(176, 16, 21, 0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            z-index: 10000;
            padding: 30px 20px;
            transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow-y: auto;
            box-shadow: -10px 0 30px rgba(0,0,0,0.2);
            border-radius: 0;
            margin-top: 0;
            display: block !important;
        }
        
        .navbar-collapse.show-offcanvas {
            right: 0;
        }

        .nav-wrapper.scrolled .navbar-collapse {
            background-color: rgba(176, 16, 21, 0.98);
        }

        .mega-menu {
            position: static !important;
            box-shadow: none !important;
            padding: 15px !important;
            background: rgba(255,255,255,0.08) !important;
            border-radius: 10px !important;
            margin-top: 10px;
            min-height: auto !important;
            display: none;
        }

        .nav-item.is-active .mega-menu {
            display: block !important;
        }

        .mega-menu-title {
            color: #fff !important;
            border-bottom: 1px solid rgba(255,255,255,0.15) !important;
            margin-top: 10px;
        }

        .mega-menu a {
            color: rgba(255,255,255,0.85) !important;
        }

        .mega-menu a:hover {
            background: rgba(255,255,255,0.15) !important;
            color: #fff !important;
            padding-left: 15px;
        }

        .mega-menu-empty {
            color: rgba(255,255,255,0.5) !important;
        }
    }

    /* BACKDROP FOCUS MODE & OFFCANVAS */
    .nav-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
        z-index: 9998; /* Di bawah navbar */
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .nav-backdrop.show {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    /* Body lock scroll saat offcanvas buka */
    body.menu-open {
        overflow: hidden;
    }
</style>

<!-- Backdrop untuk Focus Mode & Mobile Menu -->
<div class="nav-backdrop" id="navBackdrop" onclick="closeMobileMenu()"></div>

<div class="nav-wrapper" id="mainNav">
    <nav class="navbar navbar-expand-lg navbar-pill container-fluid">
        <a href="/" class="brand-logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('images/component/logo3.png') }}" alt="Logo">
            <img src="{{ asset('images/component/logo1-2.png') }}" alt="Logo" class="ms-2">
            <div class="ms-3 text-white fw-bold brand-text" style="line-height: 1.1; font-size: 0.8rem;">
                BADAN KESATUAN BANGSA DAN POLITIK<br>KOTA BANDUNG
            </div>
        </a>

        <!-- Burger Button untuk Mobile -->
        <button class="navbar-toggler border-0 text-white shadow-none" type="button" onclick="toggleMobileMenu()" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="font-size: 1.3rem;"></i>
        </button>

        <div class="navbar-collapse" id="navbarContent">
            <!-- Header khusus Offcanvas Mobile -->
            <div class="mobile-menu-header">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/component/logo1-2.png') }}" alt="Logo" style="height: 35px;">
                    <span class="ms-2 text-white fw-bold" style="font-size: 0.9rem;">KESBANGPOL</span>
                </div>
                <button class="btn-close-menu" onclick="closeMobileMenu()">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        Profil <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Tentang Kami</div>
                            <a href="{{ route('tampilvisimisi') }}">Visi Misi</a>
                            <a href="{{ route('tampiltugasfungsi') }}">Tugas dan Fungsi</a>
                            <a href="{{ route('tampilstruktur') }}">Struktur Organisasi</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Lembaga</div>
                            <a href="{{ route('tampildasarhukum') }}">Landasan Hukum</a>
                            <a href="{{ route('tampilprogram') }}">Program & Kegiatan</a>
                            <a href="{{ route('tampilsejarah') }}">Sejarah</a>
                        </div>
                        <div class="col-md-4"><div class="mega-menu-empty">Informasi kelembagaan Kesbangpol Kota Bandung yang mencakup visi misi hingga sejarah.</div></div>
                    </div></div>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{ route('semua-artikel')}}">Artikel</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        SAKIP <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Perencanaan</div>
                            <a href="{{ route('tampiliku') }}">IKU</a>
                            <a href="{{ route('tampilrenja') }}">RENJA</a>
                            <a href="{{ route('tampilrenstra') }}">RENSTRA</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Evaluasi</div>
                            <a href="{{ route('tampilukurkerja') }}">Pengukuran Kerja</a>
                            <a href="{{ route('tampillakip') }}">Laporan AKIP</a>
                        </div>
                        <div class="col-md-4"><div class="mega-menu-empty">Dokumen akuntabilitas kinerja disusun sebagai transparansi publik.</div></div>
                    </div></div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        Mitra <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Pemerintahan</div>
                            <a href="{{ route('tampilmitra') }}">Semua Mitra</a>
                            <a href="{{ route('mitra.detail', ['kategori' => 'forkopimda']) }}">FORKOPIMDA</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Lembaga</div>
                            <a href="{{ route('mitra.detail', ['kategori' => 'bnn']) }}">BNN</a>
                            <a href="{{ route('mitra.detail', ['kategori' => 'partai-politik']) }}">Partai Politik</a>
                            <a href="{{ route('mitra.detail', ['kategori' => 'fkdm']) }}">FKDM</a>
                        </div>
                        <div class="col-md-4"><div class="mega-menu-empty">Mitra strategis dalam menjaga kondusivitas kota.</div></div>
                    </div></div>
                </li>

                <li class="nav-item"><a class="nav-link" href="https://layanan.bandung.go.id" target="_blank">Pelayanan</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" onclick="toggleDropdown(event, this)">
                        Informasi <i class="fas fa-chevron-down ms-1 chevron-icon"></i>
                    </a>
                    <div class="mega-menu"><div class="row">
                        <div class="col-md-4">
                            <div class="mega-menu-title">Pemilu</div>
                            <a href="{{ route('pemilu.index') }}">Pusat Info Pemilu</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Data Ormas</div>
                            <a href="{{ route('tampil-data-ormas') }}">Direktori Data Ormas</a>
                        </div>
                        <div class="col-md-4">
                            <div class="mega-menu-title">Statistik</div>
                            <a href="{{ route('tampil-jumlah-potensi-konflik') }}">Potensi Konflik</a>
                        </div>
                    </div></div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<script>
    // 1. SMART SCROLL NAVBAR
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('mainNav');
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        
        // Efek Scrolled (Pill)
        if (currentScroll > 50) { 
            nav.classList.add('scrolled'); 
        } else { 
            nav.classList.remove('scrolled'); 
        }
        
        // Smart Hide/Show Navbar
        if (currentScroll > lastScrollTop && currentScroll > 200) {
            // Scroll Down & sudah lewat header
            nav.classList.add('nav-hidden');
            // Tutup dropdown di desktop agar layar bersih
            if (window.innerWidth >= 992) {
                closeAllDropdowns();
            }
        } else {
            // Scroll Up
            nav.classList.remove('nav-hidden');
        }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });

    // 2. OFFCANVAS MOBILE MENU LOGIC
    const navbarContent = document.getElementById('navbarContent');
    const navBackdrop = document.getElementById('navBackdrop');

    function toggleMobileMenu() {
        navbarContent.classList.toggle('show-offcanvas');
        navBackdrop.classList.toggle('show');
        document.body.classList.toggle('menu-open');
    }

    function closeMobileMenu() {
        navbarContent.classList.remove('show-offcanvas');
        navBackdrop.classList.remove('show');
        document.body.classList.remove('menu-open');
        closeAllDropdowns();
    }

    // 3. DROPDOWN TOGGLE LOGIC
    function toggleDropdown(event, element) {
        event.preventDefault(); 
        event.stopPropagation();
        
        if (window.innerWidth < 992) {
            const parent = element.parentElement;
            const isActive = parent.classList.contains('is-active');
            closeAllDropdowns();
            if (!isActive) parent.classList.add('is-active');
        }
    }

    function closeAllDropdowns() {
        document.querySelectorAll('.nav-item.dropdown').forEach(el => el.classList.remove('is-active'));
    }

    // 4. FOCUS MODE (BLUR BACKDROP ON HOVER) - KHUSUS DESKTOP
    const navItemsDropdown = document.querySelectorAll('.nav-item.dropdown');
    navItemsDropdown.forEach(item => {
        item.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) {
                navBackdrop.classList.add('show');
            }
        });
        item.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) {
                navBackdrop.classList.remove('show');
            }
        });
    });

    // Klik di luar menu untuk menutup
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.nav-item.dropdown') && !e.target.closest('#navbarContent') && !e.target.closest('.navbar-toggler')) {
            closeAllDropdowns();
        }
    });

    // 5. AUTO ACTIVE LINK HIGHLIGHT
    document.addEventListener('DOMContentLoaded', () => {
        const currentUrl = window.location.href;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === '#' || link.getAttribute('href') === '') return;
            
            if (currentUrl === link.href || currentUrl.startsWith(link.href + '/') || currentUrl.startsWith(link.href + '?')) {
                link.closest('.nav-item').classList.add('active');
            }
        });
        
        const megaLinks = document.querySelectorAll('.mega-menu a');
        megaLinks.forEach(link => {
            if (currentUrl === link.href || currentUrl.startsWith(link.href + '/') || currentUrl.startsWith(link.href + '?')) {
                link.style.color = '#b01015';
                link.style.fontWeight = '600';
                link.style.backgroundColor = '#fdf2f2';
                const parentDropdown = link.closest('.nav-item.dropdown');
                if (parentDropdown) parentDropdown.classList.add('active');
            }
        });
        
        // Aturan khusus: Homepage
        if(currentUrl === window.location.origin + '/') {
            navLinks.forEach(l => l.closest('.nav-item').classList.remove('active'));
            const homeLink = document.querySelector('.nav-link[href="/"]');
            if (homeLink) homeLink.closest('.nav-item').classList.add('active');
        }
    });
</script>