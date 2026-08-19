@php
    $real_products = \App\Models\Product::where('status', 1)->latest()->take(8)->get();
    $real_events   = \App\Models\Event::where('status', 1)->latest()->take(5)->get();
    $real_blogs    = \App\Models\Blog::where('status', 1)->latest()->take(5)->get();

    // Prepare array for live notifications popups based on actual DB records
    $live_feed = [];
    // Helper: resolve image to a root-relative path (no APP_URL dependency)
    $resolveImg = function($raw) {
        $decoded = json_decode($raw, true);
        $firstImg = (is_array($decoded) && !empty($decoded)) ? $decoded[0] : null;
        if (!$firstImg) return '/uploads/system/placeholder.png';
        // If already an absolute URL return as-is
        if (str_starts_with($firstImg, 'http://') || str_starts_with($firstImg, 'https://')) return $firstImg;
        // Return root-relative path so browser always resolves to current host
        return '/' . ltrim($firstImg, '/');
    };

    foreach ($real_products as $p) {
        $live_feed[] = [
            'type'  => 'product',
            'badge' => '🔥 POPULAR ITEM',
            'title' => $p->title,
            'url'   => route('product', $p->slug),
            'image' => $resolveImg($p->thumbnail),
            'price' => '₹ ' . number_format($p->price),
            'meta'  => 'Just purchased in India',
        ];
    }
    foreach ($real_events as $e) {
        $live_feed[] = [
            'type'  => 'event',
            'badge' => '⚡ ACTIVE EVENT',
            'title' => $e->title,
            'url'   => route('events'),
            'image' => $resolveImg($e->thumbnail),
            'price' => 'Special Offer',
            'meta'  => 'Limited time celebration',
        ];
    }
    foreach ($real_blogs as $b) {
        $live_feed[] = [
            'type'  => 'blog',
            'badge' => '💡 NEW ARTICLE',
            'title' => $b->title,
            'url'   => route('blog_details', $b->slug),
            'image' => $resolveImg($b->thumbnail),
            'price' => 'Read Now',
            'meta'  => 'Latest fashion trends',
        ];
    }
@endphp

<!-- Side App Notifications Component -->
<style>
/* Side Notification Trigger Badge */
.side-app-notification-trigger {
    position: fixed;
    right: 20px;
    bottom: 30px;
    z-index: 9990;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    color: #ffffff;
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 50px;
    padding: 10px 18px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.4), 0 8px 10px -6px rgba(15, 23, 42, 0.3);
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(12px);
    font-family: inherit;
}

.side-app-notification-trigger:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 20px 30px -10px rgba(99, 102, 241, 0.4);
    border-color: rgba(99, 102, 241, 0.5);
}

.side-app-notification-trigger .icon-pulse {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.side-app-notification-trigger .pulse-ring {
    position: absolute;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(99, 102, 241, 0.4);
    animation: side-pulse 2s infinite;
}

@keyframes side-pulse {
    0% { transform: scale(0.8); opacity: 0.8; }
    70% { transform: scale(1.6); opacity: 0; }
    100% { transform: scale(1.6); opacity: 0; }
}

.side-app-notification-trigger .trigger-badge {
    background: #ef4444;
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 10px;
    line-height: 1;
}

/* Slide-out Offcanvas Panel */
.side-notifications-drawer {
    width: 380px !important;
    max-width: 90vw !important;
    background: #0f172a;
    color: #f8fafc;
    border-left: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: -15px 0 35px rgba(0, 0, 0, 0.5);
}

.side-notifications-drawer .offcanvas-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    padding: 1.25rem 1.5rem;
    background: rgba(15, 23, 42, 0.95);
}

.side-notifications-drawer .nav-tabs {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 1rem;
}

.side-notifications-drawer .nav-link {
    color: #94a3b8;
    border: none;
    font-size: 0.85rem;
    font-weight: 600;
    padding: 0.5rem 0.85rem;
    border-radius: 6px;
    transition: all 0.2s;
}

.side-notifications-drawer .nav-link:hover {
    color: #e2e8f0;
    background: rgba(255, 255, 255, 0.05);
}

.side-notifications-drawer .nav-link.active {
    color: #ffffff;
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
}

.side-notif-card {
    background: rgba(30, 41, 59, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.07);
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 0.85rem;
    transition: all 0.25s ease;
    backdrop-filter: blur(8px);
}

.side-notif-card:hover {
    transform: translateX(-4px);
    border-color: rgba(99, 102, 241, 0.4);
    background: rgba(30, 41, 59, 0.95);
}

.side-notif-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.side-notif-icon.purchase { background: rgba(16, 185, 129, 0.15); color: #10b981; }
.side-notif-icon.event { background: rgba(99, 102, 241, 0.15); color: #818cf8; }
.side-notif-icon.blog { background: rgba(245, 158, 11, 0.15); color: #fbbf24; }

/* REDESIGNED Live Popup Toast Notification Card */
.side-live-toast {
    position: fixed;
    bottom: 25px;
    left: 25px;
    z-index: 9980;
    width: 360px;
    max-width: calc(100vw - 50px);
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    color: #ffffff;
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 16px;
    padding: 14px 16px;
    box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.5), 0 0 25px rgba(99, 102, 241, 0.15);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    display: flex;
    align-items: center;
    gap: 14px;
    transform: translateY(140%) scale(0.95);
    opacity: 0;
    visibility: hidden;
    transition: all 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
    overflow: hidden;
    font-family: inherit;
}

.side-live-toast.show {
    transform: translateY(0) scale(1);
    opacity: 1;
    visibility: visible;
}

.side-live-toast:hover {
    box-shadow: 0 25px 45px -10px rgba(0, 0, 0, 0.6), 0 0 30px rgba(99, 102, 241, 0.25);
    border-color: rgba(99, 102, 241, 0.4);
}

.side-live-toast .toast-img-box {
    width: 62px;
    height: 62px;
    border-radius: 12px;
    overflow: hidden;
    flex-shrink: 0;
    background: #ffffff;
    border: 1px solid rgba(255, 255, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
}

.side-live-toast .toast-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.side-live-toast .toast-badge-pill {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.5px;
    padding: 3px 8px;
    border-radius: 20px;
    background: rgba(255, 153, 0, 0.18);
    color: #ff9900;
    border: 1px solid rgba(255, 153, 0, 0.35);
    display: inline-block;
}

.side-live-toast .toast-close-btn {
    background: rgba(255, 255, 255, 0.1);
    border: none;
    color: #94a3b8;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s;
}

.side-live-toast .toast-close-btn:hover {
    background: #ef4444;
    color: #ffffff;
}

.side-live-toast .toast-timer-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    background: linear-gradient(90deg, #ff9900 0%, #ff5722 100%);
    width: 0%;
    transition: width 5.5s linear;
}
</style>

<!-- Floating Trigger Edge Launcher -->
<div class="side-app-notification-trigger" data-bs-toggle="offcanvas" data-bs-target="#sideNotifOffcanvas" aria-controls="sideNotifOffcanvas">
    <div class="icon-pulse">
        <div class="pulse-ring"></div>
        <i class="fa-solid fa-bell text-indigo-400"></i>
    </div>
    <span class="fw-semibold small">Live Updates</span>
    <span class="trigger-badge">{{ count($real_products) + count($real_events) + count($real_blogs) }}</span>
</div>

<!-- Offcanvas Side Drawer -->
<div class="offcanvas offcanvas-end side-notifications-drawer" tabindex="-1" id="sideNotifOffcanvas" aria-labelledby="sideNotifOffcanvasLabel">
    <div class="offcanvas-header">
        <div>
            <h5 class="offcanvas-title fw-bold text-white mb-0" id="sideNotifOffcanvasLabel">
                <i class="fa-solid fa-bolt text-warning me-2"></i>Live Notifications
            </h5>
            <small class="text-secondary">Real-time updates from our store database</small>
        </div>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-3 py-3">
        <!-- Category Nav Tabs -->
        <ul class="nav nav-tabs border-0" id="notifTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="products-tab" data-bs-toggle="tab" data-bs-target="#tab-products" type="button" role="tab">Products</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#tab-events" type="button" role="tab">Events</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="blogs-tab" data-bs-toggle="tab" data-bs-target="#tab-blogs" type="button" role="tab">Blogs</button>
            </li>
        </ul>

        <div class="tab-content" id="notifTabContent">
            <!-- TAB PRODUCTS -->
            <div class="tab-pane fade show active" id="tab-products" role="tabpanel">
                @foreach($real_products as $p)
                    <div class="side-notif-card d-flex gap-3">
                        <div class="side-notif-icon purchase">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="badge bg-emerald-500/20 text-emerald-400 small fw-bold" style="background: rgba(16,185,129,0.2); color:#34d399;">Product</span>
                                <small class="text-secondary" style="font-size:11px;">₹{{ number_format($p->price) }}</small>
                            </div>
                            <h6 class="text-white mb-1 fs-6 font-semibold">{{ $p->title }}</h6>
                            <p class="text-secondary small mb-2" style="font-size:12px;">{{ Str::limit(strip_tags($p->summary ?? $p->description), 80) }}</p>
                            <a href="{{ route('product', $p->slug) }}" class="btn btn-sm btn-indigo text-white py-1 px-3" style="background:#4f46e5; font-size:12px; border-radius:6px;">View Item</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- TAB EVENTS -->
            <div class="tab-pane fade" id="tab-events" role="tabpanel">
                @foreach($real_events as $e)
                    <div class="side-notif-card d-flex gap-3">
                        <div class="side-notif-icon event">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="badge bg-indigo-500/20 text-indigo-300 small fw-bold" style="background: rgba(99,102,241,0.2); color:#a5b4fc;">Active Event</span>
                                <small class="text-secondary" style="font-size:11px;">Promo</small>
                            </div>
                            <h6 class="text-white mb-1 fs-6 font-semibold">{{ $e->title }}</h6>
                            <p class="text-secondary small mb-2" style="font-size:12px;">{{ Str::limit(strip_tags($e->summary ?? $e->description), 80) }}</p>
                            <a href="{{ route('events') }}" class="btn btn-sm btn-outline-light py-1 px-3" style="font-size:12px; border-radius:6px;">Event Details</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- TAB BLOGS -->
            <div class="tab-pane fade" id="tab-blogs" role="tabpanel">
                @foreach($real_blogs as $b)
                    <div class="side-notif-card d-flex gap-3">
                        <div class="side-notif-icon blog">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="badge bg-amber-500/20 text-amber-300 small fw-bold" style="background: rgba(245,158,11,0.2); color:#fcd34d;">Article</span>
                                <small class="text-secondary" style="font-size:11px;">Blog</small>
                            </div>
                            <h6 class="text-white mb-1 fs-6 font-semibold">{{ $b->title }}</h6>
                            <p class="text-secondary small mb-2" style="font-size:12px;">{{ Str::limit(strip_tags($b->summary ?? $b->description), 80) }}</p>
                            <a href="{{ route('blog_details', $b->slug) }}" class="btn btn-sm btn-outline-light py-1 px-3" style="font-size:12px; border-radius:6px;">Read Story</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<!-- REDESIGNED Live Auto Popup Toast Notification -->
<div class="side-live-toast" id="sideLiveToast">
    <div class="toast-img-box">
        <img id="toastProductImg" src="" alt="Product" onerror="this.src='/uploads/system/placeholder.png'">
    </div>
    <div class="flex-grow-1 overflow-hidden">
        <div class="d-flex align-items-center justify-content-between mb-1">
            <span class="toast-badge-pill" id="toastBadge">🔥 POPULAR ITEM</span>
            <button class="toast-close-btn" onclick="closeSideToast()">&times;</button>
        </div>
        <a id="toastLink" href="#" class="text-decoration-none text-white fw-bold d-block text-truncate mb-1" style="font-size:13px; line-height:1.3;"></a>
        <div class="d-flex align-items-center justify-content-between">
            <span class="fw-extrabold text-warning me-2" id="toastPrice" style="font-size:14px;"></span>
            <a id="toastActionBtn" href="#" class="text-primary text-decoration-none fw-bold small d-inline-flex align-items-center gap-1" style="font-size:11px; color:#60a5fa !important;">
                View Item <i class="fa-solid fa-arrow-right fs-10px"></i>
            </a>
        </div>
    </div>
    <div class="toast-timer-bar" id="toastTimerBar"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const liveFeed = @json($live_feed);
    let feedIdx = 0;
    let toastTimer = null;

    function showLiveToast() {
        if (!liveFeed || liveFeed.length === 0) return;
        
        const toast = document.getElementById('sideLiveToast');
        const badgeEl = document.getElementById('toastBadge');
        const linkEl = document.getElementById('toastLink');
        const imgEl = document.getElementById('toastProductImg');
        const priceEl = document.getElementById('toastPrice');
        const actionBtn = document.getElementById('toastActionBtn');
        const barEl = document.getElementById('toastTimerBar');

        if (!toast || !badgeEl || !linkEl) return;

        const item = liveFeed[feedIdx % liveFeed.length];
        feedIdx++;

        badgeEl.textContent = item.badge || '⚡ FEATURED';
        linkEl.textContent = item.title;
        linkEl.href = item.url;
        actionBtn.href = item.url;
        imgEl.src = item.image;
        priceEl.textContent = item.price;

        // Reset timer bar animation
        if (barEl) {
            barEl.style.transition = 'none';
            barEl.style.width = '0%';
            setTimeout(() => {
                barEl.style.transition = 'width 5.5s linear';
                barEl.style.width = '100%';
            }, 50);
        }

        toast.classList.add('show');

        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => {
            toast.classList.remove('show');
        }, 5500);
    }

    if (liveFeed.length > 0) {
        setTimeout(showLiveToast, 2500);
        setInterval(showLiveToast, 12000);
    }
});

function closeSideToast() {
    const toast = document.getElementById('sideLiveToast');
    if (toast) toast.classList.remove('show');
}
</script>
