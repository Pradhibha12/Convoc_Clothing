@php
    $is_corporate_polo_page = false;
    if (request()->is('product/customized-corporate-polo-t-shirt*') || 
        (isset($product) && (str_contains($product->slug ?? '', 'polo') || str_contains($product->slug ?? '', 'corporate')))) {
        $is_corporate_polo_page = true;
    }
@endphp

@if ($is_corporate_polo_page)
<!-- Floating Video Widget Start (Corporate Polo Page Only) -->
<div id="floatingVideoWidget" class="floating-video-widget">
    <!-- Close Button -->
    <button type="button" id="closeVideoWidgetBtn" class="floating-video-close-btn" aria-label="Close video widget">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>

    <!-- Sound Toggle Button -->
    <button type="button" id="toggleSoundBtn" class="floating-video-sound-btn" aria-label="Toggle sound">
        <svg id="soundMutedIcon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
            <line x1="23" y1="9" x2="17" y2="15"></line>
            <line x1="17" y1="9" x2="23" y2="15"></line>
        </svg>
        <svg id="soundUnmutedIcon" class="d-none" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
            <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
        </svg>
    </button>

    <!-- Looping Video Preview -->
    <div class="floating-video-wrapper">
        <video id="floatingWidgetVideo" 
               autoplay 
               loop 
               muted 
               playsinline 
               preload="auto">
            <source src="{{ asset('uploads/videos/promo_widget.mp4') }}" type="video/mp4">
            <source src="/uploads/videos/promo_widget.mp4" type="video/mp4">
        </video>
    </div>
</div>

<style>
.floating-video-widget {
    position: fixed !important;
    bottom: 30px !important;
    right: 25px !important;
    width: 115px !important;
    height: 175px !important;
    z-index: 999900 !important;
    border-radius: 14px !important;
    overflow: hidden !important;
    background-color: #000000 !important;
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.3), 0 2px 6px rgba(0, 0, 0, 0.15) !important;
    border: 1.5px solid rgba(255, 255, 255, 0.25) !important;
    display: block !important;
    transition: transform 0.25s ease, opacity 0.25s ease !important;
}

.floating-video-widget:hover {
    transform: translateY(-3px) scale(1.03) !important;
    box-shadow: 0 14px 34px rgba(0, 0, 0, 0.4) !important;
}

.floating-video-wrapper {
    width: 100% !important;
    height: 100% !important;
    position: relative !important;
    cursor: pointer !important;
}

.floating-video-wrapper video {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    display: block !important;
}

.floating-video-close-btn {
    position: absolute !important;
    top: 6px !important;
    right: 6px !important;
    width: 22px !important;
    height: 22px !important;
    border-radius: 50% !important;
    background: rgba(0, 0, 0, 0.65) !important;
    backdrop-filter: blur(4px) !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
    color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    z-index: 20 !important;
    transition: background 0.2s ease, transform 0.2s ease !important;
}

.floating-video-close-btn:hover {
    background: rgba(239, 68, 68, 0.9) !important;
    transform: scale(1.1) !important;
}

.floating-video-sound-btn {
    position: absolute !important;
    top: 6px !important;
    left: 6px !important;
    width: 22px !important;
    height: 22px !important;
    border-radius: 50% !important;
    background: rgba(0, 0, 0, 0.65) !important;
    backdrop-filter: blur(4px) !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
    color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    z-index: 20 !important;
    transition: background 0.2s ease !important;
}

@media (max-width: 576px) {
    .floating-video-widget {
        bottom: 20px !important;
        right: 15px !important;
        width: 95px !important;
        height: 145px !important;
        border-radius: 10px !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const widget = document.getElementById('floatingVideoWidget');
    const closeBtn = document.getElementById('closeVideoWidgetBtn');
    const soundBtn = document.getElementById('toggleSoundBtn');
    const video = document.getElementById('floatingWidgetVideo');
    const mutedIcon = document.getElementById('soundMutedIcon');
    const unmutedIcon = document.getElementById('soundUnmutedIcon');

    if (!widget || !video) return;

    // Force autoplay muted
    video.muted = true;
    const playPromise = video.play();
    if (playPromise !== undefined) {
        playPromise.catch(function(error) {
            console.log('Autoplay prevented:', error);
        });
    }

    // Close button handler
    closeBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (video) {
            video.pause();
        }
        widget.style.opacity = '0';
        widget.style.transform = 'translateY(15px) scale(0.9)';
        setTimeout(function() {
            widget.style.display = 'none';
        }, 250);
    });

    // Sound toggle handler
    soundBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (video.muted) {
            video.muted = false;
            mutedIcon.classList.add('d-none');
            unmutedIcon.classList.remove('d-none');
        } else {
            video.muted = true;
            mutedIcon.classList.remove('d-none');
            unmutedIcon.classList.add('d-none');
        }
    });

    // Click video to toggle mute
    const wrapper = widget.querySelector('.floating-video-wrapper');
    wrapper.addEventListener('click', function() {
        if (video.muted) {
            video.muted = false;
            mutedIcon.classList.add('d-none');
            unmutedIcon.classList.remove('d-none');
        } else {
            video.muted = true;
            mutedIcon.classList.remove('d-none');
            unmutedIcon.classList.add('d-none');
        }
    });
});
</script>
<!-- Floating Video Widget End -->
@endif
