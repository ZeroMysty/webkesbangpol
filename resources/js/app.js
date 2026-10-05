import $ from 'jquery';
import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

Swiper.use([Navigation, Pagination, Autoplay]);
import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";
window.$ = $;
window.jQuery = $;

// Inisialisasi AOS (animasi scroll) - once: true agar tidak re-trigger memberatkan scroll
AOS.init({
    once: true,
    duration: 800,
});

document.addEventListener('DOMContentLoaded', function () {

    // ===== SWIPER ARTIKEL =====
    const artikelSwiperElement = document.querySelector('.artikelSwiper');
    const btnArtikelPrev = document.querySelector('.swiper-prev');
    const btnArtikelNext = document.querySelector('.swiper-next');
    const artikelIndicator = document.querySelector('.swiper-current-index');

    if (artikelSwiperElement) {
        const artikelSwiper = new Swiper(artikelSwiperElement, {
            loop: document.querySelectorAll('.artikelSwiper .swiper-slide').length >= 2,
            autoplay: document.querySelectorAll('.artikelSwiper .swiper-slide').length >= 2 ? {
                delay: 5000,
                disableOnInteraction: false,
            } : false,
            effect: 'slide',
            speed: 800,
            allowTouchMove: document.querySelectorAll('.artikelSwiper .swiper-slide').length >= 2,
            spaceBetween: 0,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            on: {
                init: function () {
                    updateArtikelPagination(this);
                    toggleArtikelNavigation(this);
                },
                slideChange: function () {
                    updateArtikelPagination(this);
                },
            },
        });

        window.artikelSwiper = artikelSwiper;

        function updateArtikelPagination(swiperInstance) {
            const current = swiperInstance.realIndex + 1;
            const total = document.querySelectorAll('.artikelSwiper .swiper-slide').length;
            if (artikelIndicator) {
                artikelIndicator.textContent = `${current} dari ${total}`;
            }
        }

        function toggleArtikelNavigation(swiperInstance) {
            const totalSlides = document.querySelectorAll('.artikelSwiper .swiper-slide').length;
            const isActive = totalSlides >= 2;
            if (btnArtikelPrev && btnArtikelNext) {
                btnArtikelPrev.style.display = isActive ? 'inline-block' : 'none';
                btnArtikelNext.style.display = isActive ? 'inline-block' : 'none';
            }
            if (artikelIndicator) {
                artikelIndicator.style.display = isActive ? 'inline-block' : 'none';
            }
        }
    }

    // ===== SWIPER CAROUSEL =====
    const carouselEl = document.querySelector('.mySwiperCarousel');
    if (carouselEl) {
        const carouselSwiper = new Swiper('.mySwiperCarousel', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'slide',
            speed: 800,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                init: function () {
                    updateCustomPagination(this);
                    carouselEl.addEventListener('mouseenter', function() {
                        document.querySelectorAll('.custom-swiper-button').forEach(btn => {
                            btn.style.display = 'flex';
                        });
                    });
                    carouselEl.addEventListener('mouseleave', function() {
                        document.querySelectorAll('.custom-swiper-button').forEach(btn => {
                            btn.style.display = 'none';
                        });
                    });
                },
                slideChange: function () {
                    updateCustomPagination(this);
                }
            }
        });

        function updateCustomPagination(swiperInstance) {
            const current = swiperInstance.realIndex + 1;
            const total = swiperInstance.slides.length - swiperInstance.loopedSlides * 2;
            const indicator = document.querySelector('.swiper-custom-indicator');
            if (indicator) {
                indicator.textContent = `${current} dari ${total}`;
            }
        }
    }

    // === FANCYBOX GALERI ===
    Fancybox.bind('[data-fancybox="gallery"]', {
        Thumbs: false,
        Toolbar: true,
    });

    const items = document.querySelectorAll(".galeri-item.hidden");
    const loadMoreBtn = document.getElementById("lihat-lebih-btn");
    let index = 0;
    const perLoad = 3;
    
    loadMoreBtn?.addEventListener("click", () => {
        for (let i = 0; i < perLoad; i++) {
            const item = items[index + i];
            if (item) {
                setTimeout(() => {
                    item.classList.remove("hidden");
                    item.style.display = "block";
                    requestAnimationFrame(() => {
                        item.classList.add("show");
                    });
                }, i * 150);
            }
        }
    
        index += perLoad;
    
        if (index >= items.length) {
            loadMoreBtn.style.display = "none";
        }
    });

    // === SCROLL TO TOP BUTTON === //
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    scrollTopBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
    
    // ===== Article Page AJAX Filtering =====
    const route = '/filter-artikel';

    function showLoading() {
        $('#artikel-list').hide().html(`
            <div class="text-center py-5">
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `).fadeIn();
    }

    function fetchFilteredData(page = 1) {
        const search = $('#search-input').val();
        const bidang = $('#filter-bidang').val();
        const sort = $('#filter-sort').val();

        showLoading();

        $.ajax({
            url: `${route}?page=${page}`,
            method: 'GET',
            data: {
                search: search,
                bidang_id: bidang,
                sort: sort,
            },
            success: function (response) {
                if (response.html) {
                    $('#artikel-list').html(response.html);
                }
            },
            error: function (xhr) {
                console.error("AJAX Error:", xhr);
            }
        });
    }

    // Trigger saat filter atau search berubah (dengan debounce untuk search)
    let searchTimer;
    $('#search-input').on('keyup', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
            fetchFilteredData(1);
        }, 300);
    });

    $('#filter-bidang, #filter-sort').on('change', function () {
        fetchFilteredData(1);
    });

    // Reset filter
    $('#reset-filter').on('click', function () {
        $('#search-input').val('');
        $('#filter-bidang').val('');
        $('#filter-sort').val('');
        fetchFilteredData(1);
    });

    // Tangani klik pagination link
    const ajaxPages = ['/articles', '/filter-artikel'];
    if (ajaxPages.includes(window.location.pathname)) {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            const href = $(this).attr('href');
            if (href && href.includes('page=')) {
                const page = href.split('page=')[1];
                fetchFilteredData(page);
            }
        });
    }

    // ===== INSTANT PAGE SPECULATIVE PREFETCHING (0ms Transitions) =====
    const prefetchedUrls = new Set();
    const isSaveData = navigator.connection && (navigator.connection.saveData || /2g/.test(navigator.connection.effectiveType));

    if (!isSaveData) {
        function prefetchUrl(url) {
            if (!url || prefetchedUrls.has(url)) return;
            prefetchedUrls.add(url);

            const linkEl = document.createElement('link');
            linkEl.rel = 'prefetch';
            linkEl.href = url;
            linkEl.as = 'document';
            document.head.appendChild(linkEl);
        }

        function shouldPrefetch(anchor) {
            if (!anchor || !anchor.href) return false;
            if (anchor.target && anchor.target !== '_self') return false;
            if (anchor.hasAttribute('download')) return false;

            try {
                const url = new URL(anchor.href, window.location.origin);
                // Hanya prefetch domain yang sama
                if (url.origin !== window.location.origin) return false;
                // Jangan prefetch URL saat ini
                if (url.pathname === window.location.pathname && url.search === window.location.search) return false;
                // Jangan prefetch dashboard/admin/auth/logout/file statis
                if (/^\/(dashboard|admin|login|logout|register|api)/i.test(url.pathname)) return false;
                if (/\.(pdf|zip|rar|docx?|xlsx?|jpg|png|webp|svg)$/i.test(url.pathname)) return false;

                return url.href;
            } catch (e) {
                return false;
            }
        }

        // Prefetch on mouse hover or touchstart with 65ms intent threshold
        let prefetchTimer = null;
        document.addEventListener('mouseover', function (e) {
            const anchor = e.target.closest('a');
            const validUrl = shouldPrefetch(anchor);
            if (validUrl) {
                prefetchTimer = setTimeout(() => prefetchUrl(validUrl), 65);
            }
        }, { passive: true });

        document.addEventListener('mouseout', function (e) {
            if (prefetchTimer) {
                clearTimeout(prefetchTimer);
                prefetchTimer = null;
            }
        }, { passive: true });

        document.addEventListener('touchstart', function (e) {
            const anchor = e.target.closest('a');
            const validUrl = shouldPrefetch(anchor);
            if (validUrl) {
                prefetchUrl(validUrl);
            }
        }, { passive: true });
    }
});
