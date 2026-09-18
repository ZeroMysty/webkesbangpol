@php
    $csNumber = env('CS_WHATSAPP_NUMBER', '6281234567890');
    // Format number to ensure digits only and standard country code prefix
    $csNumber = preg_replace('/[^0-9]/', '', $csNumber);
    if (strpos($csNumber, '0') === 0) {
        $csNumber = '62' . substr($csNumber, 1);
    }
    $waText = urlencode("Halo CS Bakesbangpol Kota Bandung, saya ingin bertanya.");
    $waUrl = "https://wa.me/{$csNumber}?text={$waText}";
@endphp

<!-- Floating CS WhatsApp Button (Bottom Left - Expand on Hover) -->
<div class="cs-floating-container" id="csFloatingContainer">
    <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="cs-floating-btn" title="Hubungi CS via WhatsApp">
        <span class="cs-btn-pulse"></span>
        <span class="cs-btn-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c-.001 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </span>
        <span class="cs-btn-label">Hubungi CS</span>
    </a>
</div>

<style>
.cs-floating-container {
    position: fixed;
    bottom: 25px;
    left: 25px;
    z-index: 999999;
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.cs-floating-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
    color: #ffffff !important;
    text-decoration: none !important;
    height: 52px;
    width: 52px;
    padding: 0;
    border-radius: 50px;
    box-shadow: 0 8px 24px rgba(37, 211, 102, 0.45);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    user-select: none;
    overflow: hidden;
}

.cs-floating-btn:hover {
    width: auto;
    padding: 0 18px 0 8px;
    transform: translateY(-4px) scale(1.03);
    box-shadow: 0 12px 28px rgba(37, 211, 102, 0.6);
    color: #ffffff !important;
}

.cs-floating-btn:active {
    transform: translateY(-1px) scale(0.98);
}

.cs-btn-pulse {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50px;
    background: rgba(37, 211, 102, 0.5);
    z-index: -1;
    animation: cs-pulse-glow 2s infinite;
}

@keyframes cs-pulse-glow {
    0% {
        transform: scale(0.95);
        opacity: 0.8;
    }
    70% {
        transform: scale(1.15, 1.3);
        opacity: 0;
    }
    100% {
        transform: scale(0.95);
        opacity: 0;
    }
}

.cs-btn-icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.cs-btn-icon svg {
    width: 26px;
    height: 26px;
    fill: #ffffff;
    transition: transform 0.3s ease;
}

.cs-floating-btn:hover .cs-btn-icon svg {
    transform: scale(1.08);
}

.cs-btn-label {
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.3px;
    white-space: nowrap;
    max-width: 0;
    opacity: 0;
    margin-left: 0;
    transition: max-width 0.4s ease, opacity 0.3s ease 0.1s, margin-left 0.3s ease;
}

.cs-floating-btn:hover .cs-btn-label {
    max-width: 150px;
    opacity: 1;
    margin-left: 4px;
}

@media (max-width: 576px) {
    .cs-floating-container {
        bottom: 20px;
        left: 20px;
    }
    .cs-floating-btn {
        height: 46px;
        width: 46px;
    }
    .cs-btn-icon {
        width: 46px;
        height: 46px;
    }
    .cs-btn-icon svg {
        width: 22px;
        height: 22px;
    }
    .cs-btn-label {
        font-size: 13px;
    }
}
</style>
