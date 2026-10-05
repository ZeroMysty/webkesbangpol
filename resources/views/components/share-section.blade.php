@props([
    'title' => 'Badan Kesatuan Bangsa dan Politik Kota Bandung',
    'heading' => 'Bagikan Halaman Ini',
    'inline' => false,
])

@if($inline)
    <div class="page-share p-3 rounded shadow-sm my-3" style="background: #ffffff;">
        <h3 class="share-title mb-3">
            <i class="fas fa-share-alt"></i>
            {{ $heading }}
        </h3>
        <div class="share-options d-flex gap-3 flex-wrap">
            <a href="https://www.tiktok.com/" 
                target="_blank" class="share-icon tiktok" title="Bagikan ke TikTok">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://www.instagram.com/" 
                target="_blank" class="share-icon instagram" title="Bagikan ke Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($title) }}%20{{ urlencode(request()->fullUrl()) }}" 
                target="_blank" class="share-icon whatsapp" title="Bagikan ke WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="mailto:?subject={{ urlencode($title) }}&body={{ urlencode('Saya ingin berbagi tautan menarik ini: ' . request()->fullUrl()) }}" 
                class="share-icon email" title="Bagikan via Email">
                <i class="fas fa-envelope"></i>
            </a>
            <a href="javascript:void(0)" onclick="copyShareLinkToClipboard()" 
                class="share-icon copy" title="Salin Link">
                <i class="fas fa-link"></i>
            </a>
        </div>
    </div>
@else
    <section class="share-section py-4">
        <div class="container">
            <div class="page-share p-3 rounded shadow-sm" style="background: #ffffff;">
                <h3 class="share-title mb-3">
                    <i class="fas fa-share-alt"></i>
                    {{ $heading }}
                </h3>
                <div class="share-options d-flex gap-3 flex-wrap">
                    <a href="https://www.tiktok.com/" 
                        target="_blank" class="share-icon tiktok" title="Bagikan ke TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.instagram.com/" 
                        target="_blank" class="share-icon instagram" title="Bagikan ke Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($title) }}%20{{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" class="share-icon whatsapp" title="Bagikan ke WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ urlencode($title) }}&body={{ urlencode('Saya ingin berbagi tautan menarik ini: ' . request()->fullUrl()) }}" 
                        class="share-icon email" title="Bagikan via Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="copyShareLinkToClipboard()" 
                        class="share-icon copy" title="Salin Link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>

            <!-- Toast Notification -->
            <div id="copyToast" class="copy-toast hidden">
                <i class="fas fa-check-circle"></i>
                Link berhasil disalin!
            </div>
        </div>
    </section>
@endif

@if($inline)
    <!-- Toast Notification for Inline usage -->
    <div id="copyToast" class="copy-toast hidden">
        <i class="fas fa-check-circle"></i>
        Link berhasil disalin!
    </div>
@endif

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/share-page.css') }}">
@endpush

@push('scripts')
<script>
    function copyShareLinkToClipboard() {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(window.location.href).then(() => {
                showShareToast();
            }).catch(() => {
                fallbackCopyShareLink();
            });
        } else {
            fallbackCopyShareLink();
        }
    }

    function fallbackCopyShareLink() {
        const tempInput = document.createElement('input');
        tempInput.value = window.location.href;
        document.body.appendChild(tempInput);
        tempInput.select();
        tempInput.setSelectionRange(0, 99999);
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        showShareToast();
    }

    function showShareToast() {
        const toast = document.getElementById('copyToast');
        if (!toast) return;
        toast.classList.remove('hidden');
        toast.classList.add('show');
        
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 300);
        }, 3000);
    }
</script>
@endpush
