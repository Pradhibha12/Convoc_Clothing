@php $current_route = Route::currentRouteName(); @endphp

<div class="sidebar-logo-area">
    <a href="{{route('home')}}" class="sidebar-logos">
        <img class="sidebar-logo-lg" height="50px" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="">
        <img class="sidebar-logo-sm" height="40px" src="{{ get_image(get_frontend_settings('favicon')) }}" alt="">
    </a>
    <button class="sidebar-cross menu-toggler d-block d-lg-none">
        <span class="fi-rr-cross"></span>
    </button>
</div>
<h3 class="sidebar-title fs-12px px-30px pb-20px mt-4 text-uppercase">{{ get_phrase('Main Menu') }}</h3>
<div class="sidebar-nav-area">

    <nav class="sidebar-nav">
        <ul class="px-14px pb-24px">
            <li class="sidebar-first-li {{ $current_route == 'vendor.dashboard' ? 'active' : '' }}">
                <a href="{{ route('vendor.dashboard') }}">
                    <span class="icon fi-rr-apps"></span>
                    <div class="text">
                        <span>{{ get_phrase('Dashboard') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Order Management') }}</h3>
        <ul class="px-14px pb-24px">
            <li class="sidebar-first-li {{ $current_route == 'vendor.orders' || $current_route == 'vendor.order.add' || $current_route == 'vendor.order.details' ? 'active' : '' }}">
                <a href="{{ route('vendor.orders') }}">
                    <span class="icon fi-rr-clipboard-list-check"></span>
                    <div class="text">
                        <span>{{ get_phrase('Orders') }}</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-first-li {{ $current_route == 'vendor.order.return_requests' ||  $current_route == 'vendor.order.return_details' ? 'active' : '' }}">
                <a href="{{ route('vendor.order.return_requests') }}">
                    <span class="icon  fi-rr-house-laptop"></span>
                    <div class="text">
                        <span>{{ get_phrase('Return Requests') }}</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'vendor.payments' || $current_route == 'vendor.payment.invoice' || $current_route == 'vendor.payments.offline_request') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-usd-circle"></span>
                    <div class="text">
                        <span>{{ get_phrase('Payments') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Payments') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'vendor.payments' || $current_route == 'vendor.payment.invoice') active @endif">
                        <a href="{{ route('vendor.payments') }}">{{ get_phrase('Payment History') }}</a>
                    </li>

                    <li class="sidebar-second-li @if ($current_route == 'vendor.payments.offline_request') active @endif">
                        <a href="{{ route('vendor.payments.offline_request') }}">{{ get_phrase('Pending request(Offline)') }}</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'vendor.payout.reports' || $current_route == 'vendor.payout.setting') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi fi-rr-file-invoice-dollar"></span>
                    <div class="text">
                        <span>{{ get_phrase('Payout') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Payout') }}</li>
                    <li class="sidebar-second-li @if ($current_route == 'vendor.payout.reports') active @endif">
                        <a href="{{ route('vendor.payout.reports') }}">{{ get_phrase('Withdraw') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'vendor.payout.setting') active @endif">
                        <a href="{{ route('vendor.payout.setting') }}">{{ get_phrase('Settings') }}</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Product Management') }}</h3>
        <ul class="px-14px pb-24px">

            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'vendor.products' || $current_route == 'vendor.product.add' || $current_route == 'vendor.product.edit' || $current_route == 'vendor.coupons' || $current_route == 'vendor.coupon.add' || $current_route == 'vendor.coupon.edit') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-box-open-full"></span>
                    <div class="text">
                        <span>{{ get_phrase('Product') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Product') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'vendor.products' || $current_route == 'vendor.product.add' || $current_route == 'vendor.product.edit') active @endif">
                        <a href="{{ route('vendor.products') }}">{{ get_phrase('Products') }}</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Website') }}</h3>
        <ul class="px-14px pb-24px">

            
            <li class="sidebar-first-li {{ $current_route == 'vendor.messages' ? 'active' : '' }}">
                <a href="{{ route('vendor.messages') }}">
                    <span class="icon fi-rr-messages"></span>
                    <div class="text">
                        <span>{{ get_phrase('Message') }}</span>
                    </div>
                    @php
                        $count_unread_message = App\Models\Message::where('read_status', 0)
                            ->where(function ($query) {
                                $query->where('sender_id', auth()->user()->id)->orWhere('receiver_id', auth()->user()->id);
                            })
                            ->count();
                    @endphp
                    @if ($count_unread_message > 0)
                        <span class="d-inline-block mt-2px badge bg-danger ms-auto">
                            {{ $count_unread_message }}
                        </span>
                    @endif
                </a>
            </li>

        </ul>
    </nav>

    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Settings') }}</h3>
        <ul class="px-14px pb-24px pb-5 mb-5">
            <li class="sidebar-first-li first-li-have-sub {{ $current_route == 'vendor.settings' || $current_route == 'vendor.profile' ? 'active' : '' }}">
                <a href="javascript:void(0);">
                    <span class="icon fi fi-rr-settings"></span>
                    <div class="text">
                        <span>{{ get_phrase('Settings') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Settings') }}</li>
                    <li class="sidebar-second-li {{ $current_route == 'vendor.settings' ? 'active' : '' }}">
                        <a href="{{ route('vendor.settings') }}">{{ get_phrase('Store Settings') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'vendor.profile' ? 'active' : '' }}">
                        <a href="{{ route('vendor.profile') }}">{{ get_phrase('Store Profile') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>


<script>
    "use strict";

    document.addEventListener("DOMContentLoaded", function() {
        // Restore scroll position if it exists in localStorage
        const scrollPos = localStorage.getItem('navScrollPos');
        const sidebarNavArea = document.querySelector('.sidebar-nav-area');
        if (scrollPos) {
            sidebarNavArea.scrollTop = scrollPos;
        }

        // Ensure the active element is visible
        const activeElement = document.querySelector('.sidebar-nav-area .active');
        if (activeElement) {
            const activeElementTop = activeElement.getBoundingClientRect().top;
            const navAreaTop = sidebarNavArea.getBoundingClientRect().top;
            const navAreaBottom = navAreaTop + sidebarNavArea.clientHeight;

            if (activeElementTop < navAreaTop || activeElementTop > navAreaBottom) {
                sidebarNavArea.scrollTop = activeElement.offsetTop - sidebarNavArea.offsetTop;
            }
        }

        // Save scroll position before page unload
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('navScrollPos', sidebarNavArea.scrollTop);
        });
    });
</script>
