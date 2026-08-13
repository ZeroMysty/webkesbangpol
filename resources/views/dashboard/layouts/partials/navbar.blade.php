<nav class="dashboard-navbar d-flex justify-content-end align-items-center px-3">
    <div class="d-flex align-items-center gap-2">
        <form class="navbar-search collapsed" role="search">
            <input type="text" class="dashboard-navbar-search-input" placeholder="Search...">
            <button type="button" class="dashboard-navbar-search-btn toggle-search">
                <i class="fas fa-search"></i>
            </button>
        </form>

        {{-- Fullscreen --}}
        <button class="btn-fullscreen" onclick="toggleFullscreen()" title="Fullscreen">
            <i class="fas fa-expand-arrows-alt"></i>
        </button>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inisialisasi dropdown Bootstrap
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(function (el) {
            new bootstrap.Dropdown(el);
        });
    });

    // Fungsi untuk toggle fullscreen
    function toggleFullscreen() {
        const doc = document.documentElement; // Ambil elemen root (html)
        
        // Cek apakah browser mendukung fullscreen API
        if (!document.fullscreenElement &&   // Jika tidak ada elemen fullscreen
            !document.webkitFullscreenElement && // Untuk Safari
            !document.mozFullScreenElement && // Untuk Firefox
            !document.msFullscreenElement) { // Untuk IE/Edge

            // Masukkan elemen dalam mode fullscreen
            if (doc.requestFullscreen) {
                doc.requestFullscreen();
            } else if (doc.webkitRequestFullscreen) { // Untuk Safari
                doc.webkitRequestFullscreen();
            } else if (doc.mozRequestFullScreen) { // Untuk Firefox
                doc.mozRequestFullScreen();
            } else if (doc.msRequestFullscreen) { // Untuk IE/Edge
                doc.msRequestFullscreen();
            }
        } else {
            // Keluar dari fullscreen
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { // Untuk Safari
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) { // Untuk Firefox
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) { // Untuk IE/Edge
                document.msExitFullscreen();
            }
        }
    }


    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.querySelector('.navbar-search');
        const toggleBtn = document.querySelector('.toggle-search');
        const inputField = searchForm.querySelector('.dashboard-navbar-search-input');

        toggleBtn.addEventListener('click', function () {
            searchForm.classList.toggle('expanded');
            inputField.focus();
        });

        // Auto-collapse saat klik di luar
        document.addEventListener('click', function (e) {
            if (!searchForm.contains(e.target)) {
                searchForm.classList.remove('expanded');
            }
        });
    });
</script>