<link rel="stylesheet" href="{{ asset('assets/frontend/pet/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/pet/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/pet/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/pet/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/pet/css/responsive.css') }}">

@php
    $current_route = Route::currentRouteName();
@endphp
<style>
    .dropdown-item.active,
    .dropdown-item:active {
        color: var(--darkColor) !important;
        text-decoration: none;
        background-color: var(--lightColor);
    }
</style>

<!-- Header Start -->
<header class="logo-header-section logo-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo-header-wrap">
                    <a href="{{ route('home') }}" class="header-logo">
                        <img class="logo" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                    </a>

                    <nav class="d-none d-lg-block">
                        <ul class="header-menu-ul">
                            <li><a href="{{ route('home') }}"
                                    class="header-menuitem-a @if ($current_route == 'home') active @endif">{{ get_phrase('Home') }}</a>
                            </li>
                            <!-- Mega Menu Button -->
                            <li class="pt-mega-menu-btn">
                                <a href="javascript:void(0)" class="header-menuitem-a pt-mega-menu-link">
                                    <span>{{ get_phrase('Categories') }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6"
                                        viewBox="0 0 10 6" fill="none">
                                        <path d="M9 1L5 5L1 1" stroke="#4D4D4D" stroke-width="1.2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <!-- Mega Menu -->
                                <div class="pt-mega-menu-wrap">
                                    <div class="container">
                                        <div class="row g-4 justify-content-center">
                                            <div class="col-md-10 col-lg-6">
                                                <div class="mega-nav-main">
                                                    @php
                                                        $categories = App\Models\Category::where('parent_id', '=', 0)
                                                            ->orderBy('sort', 'asc')
                                                            ->orderBy('title', 'asc')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($categories as $category)
                                                        @php
                                                            $subCategories = App\Models\Category::where(
                                                                'parent_id',
                                                                '=',
                                                                $category->id,
                                                            )
                                                                ->orderBy('sort', 'asc')
                                                                ->orderBy('title', 'asc')
                                                                ->get();
                                                        @endphp
                                                        <div class="mega-nav-wrap">
                                                            <a href="{{ route('products', $category->slug) }}">
                                                                <h3 class="mega-nav-title">{{ $category->title }}</h3>
                                                            </a>
                                                            <ul class="pt-mega-nav mega-navbar-nav">
                                                                @if (!empty($subCategories) && $subCategories->count() > 0)
                                                                    @foreach ($subCategories as $subCategory)
                                                                        @php
                                                                            $subSubCategories = App\Models\Category::where(
                                                                                'parent_id',
                                                                                '=',
                                                                                $subCategory->id,
                                                                            )
                                                                                ->orderBy('sort', 'asc')
                                                                                ->orderBy('title', 'asc')
                                                                                ->get();
                                                                        @endphp
                                                                        @if ($subCategories->count() > 0 && $subSubCategories->count() > 0)
                                                                            <li class="mega-nav-item">
                                                                                <a href="javascript:void(0)"
                                                                                    class="mega-nav-link mega-nav-link-have-sub">{{ $subCategory->title }}</a>
                                                                                <ul class="mega-nav-dropdown">
                                                                                    @foreach ($subSubCategories as $subSubCategory)
                                                                                        <li><a href="{{ route('products', get_category_params($subSubCategory)) }}"
                                                                                                class="mage-nav-sublink">{{ $subSubCategory->title }}</a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        @else
                                                                            <li class="mega-nav-item"><a
                                                                                    href="{{ route('products', get_category_params($subCategory)) }}"
                                                                                    class="mega-nav-link">{{ $subCategory->title }}</a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-lg-6">
                                                <div class="mega-categories-wrap">
                                                    @foreach ($categories->take(4)->chunk(2) as $categoryChunk)
                                                        <div class="mega-two-categories">
                                                            @foreach ($categoryChunk as $category)
                                                                @if (!empty($category->thumbnail))
                                                                    <a href="javascript:;"
                                                                        class="mega-category mg-sml-category mb-14px">
                                                                        <img class="banner"
                                                                            src="{{ get_image($category->thumbnail) }}"
                                                                            alt="banner">
                                                                        <h3 class="mega-category-title">
                                                                            {{ $category->title }}</h3>
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ route('store') }}"
                                    class="header-menuitem-a @if ($current_route == 'store') active @endif">{{ get_phrase('Store') }}</a>
                            </li>
                            <li><a href="{{ route('events') }}"
                                    class="header-menuitem-a @if ($current_route == 'events') active @endif">{{ get_phrase('Events') }}</a>
                            </li>
                            <li><a href="{{ route('blog') }}"
                                    class="header-menuitem-a @if ($current_route == 'blog') active @endif">{{ get_phrase('Blog') }}</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="access-navigations">
                        <a data-bs-toggle="modal" data-bs-target="#searchModal" role="button" class="access-nav-item">
                            <span class="access-nav-inner" data-bs-toggle="tooltip" data-bs-title="Search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18" fill="none">
                                    <path
                                        d="M8.625 16.3125C4.3875 16.3125 0.9375 12.8625 0.9375 8.625C0.9375 4.3875 4.3875 0.9375 8.625 0.9375C12.8625 0.9375 16.3125 4.3875 16.3125 8.625C16.3125 12.8625 12.8625 16.3125 8.625 16.3125ZM8.625 2.0625C5.0025 2.0625 2.0625 5.01 2.0625 8.625C2.0625 12.24 5.0025 15.1875 8.625 15.1875C12.2475 15.1875 15.1875 12.24 15.1875 8.625C15.1875 5.01 12.2475 2.0625 8.625 2.0625Z"
                                        fill="#0D0E10"></path>
                                    <path
                                        d="M16.5 17.0625C16.3575 17.0625 16.215 17.01 16.1025 16.8975L13.5001 14.2951C13.2826 14.0776 13.2826 13.7176 13.5001 13.5001C13.7176 13.2826 14.0776 13.2826 14.2951 13.5001L16.8975 16.1025C17.115 16.32 17.115 16.68 16.8975 16.8975C16.785 17.01 16.6425 17.0625 16.5 17.0625Z"
                                        fill="#0D0E10"></path>
                                </svg>
                            </span>
                        </a>
                        <a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button" aria-controls="offcanvasCart"
                            onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                            class="access-nav-item">
                            <span class="access-nav-inner" data-bs-toggle="tooltip" data-bs-title="Cart">
                                <span
                                    class="access-nav-badge">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.6546 24.5384C22.6104 24.5384 23.3854 23.7635 23.3854 22.8077C23.3854 21.8518 22.6104 21.0769 21.6546 21.0769C20.6988 21.0769 19.9238 21.8518 19.9238 22.8077C19.9238 23.7635 20.6988 24.5384 21.6546 24.5384Z"
                                        fill="black" stroke="black" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M10.1165 24.5384C11.0724 24.5384 11.8473 23.7635 11.8473 22.8077C11.8473 21.8518 11.0724 21.0769 10.1165 21.0769C9.16063 21.0769 8.38574 21.8518 8.38574 22.8077C8.38574 23.7635 9.16063 24.5384 10.1165 24.5384Z"
                                        fill="black" stroke="black" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M4.92345 3.76924H24.5388L22.2311 16.4615H7.23114L4.92345 3.76924ZM4.92345 3.76924C4.73114 3.00001 3.76961 1.46155 1.46191 1.46155"
                                        stroke="black" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M22.2314 16.4615H7.23137H5.18995C3.13113 16.4615 2.03906 17.3629 2.03906 18.7692C2.03906 20.1755 3.13113 21.0769 5.18995 21.0769H21.6544"
                                        stroke="black" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                        <a href="javascript:;" class="access-nav-item d-none d-lg-block">
                            <span class="access-nav-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                <span
                                    class="access-nav-badge">{{ \App\Models\Wishlist_item::where('user_id', auth()->id())->count() }}</span>
                                <svg width="29" height="26" viewBox="0 0 29 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M27.4615 8.97722C27.4615 10.9599 26.6907 12.8642 25.3143 14.273C22.1458 17.5167 19.0726 20.8991 15.7857 24.0253C15.0323 24.7314 13.8372 24.7057 13.1162 23.9676L3.6467 14.273C0.784432 11.3426 0.784432 6.61185 3.6467 3.68151C6.53711 0.722381 11.2459 0.722381 14.1363 3.68151L14.4805 4.03388L14.8245 3.68172C16.2103 2.26219 18.0977 1.46155 20.0694 1.46155C22.041 1.46155 23.9283 2.26211 25.3143 3.68151C26.6909 5.09033 27.4615 6.99459 27.4615 8.97722Z"
                                        stroke="black" stroke-width="1.6" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>

                        <!-- Login Dropdown -->
                        @if (Auth::check())
                            <div class="dropdown">
                                <button class="btn pt-user-dropdown-btn dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="pt-user-dropdown-profile">
                                        <span
                                            class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-title="Profile">
                                            <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                        </span>
                                    </div>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end pt-user-dropdown-menu">
                                    <div class="d-flex align-items-center gap-1 pt-user-dropdown-header">
                                        <div class="pt-user-dropdown-profile2">
                                            <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                        </div>
                                        <h4 class="pt-user-dropdown-name">{{ auth()->user()->name }}</h4>
                                    </div>
                                    <ul>
                                        @if (auth()->user()->user_type == 'admin')
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.dashboard') }}">{{ get_phrase('Admin Dashboard') }}</a>
                                            </li>
                                        @else
                                            @if(auth()->user()->is_vendor == 1)
                                                <li>
                                                    <a href="{{ route('vendor.dashboard') }}"
                                                        class="dropdown-item @if ($current_route == 'vendor.dashboard') active @endif">{{ get_phrase('Store  Dashboard') }}</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('customer.wishlist_items') }}"
                                                    class="dropdown-item @if ($current_route == 'customer.wishlist_items') active @endif">{{ get_phrase('Wishlist') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.cart_items') }}"
                                                    class="dropdown-item @if ($current_route == 'customer.cart_items') active @endif">{{ get_phrase('Cart') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.orders') }}"
                                                    class="dropdown-item @if ($current_route == 'customer.orders') active @endif">{{ get_phrase('Orders') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.shipping_addresses') }}"
                                                    class="dropdown-item @if ($current_route == 'customer.shipping_addresses') active @endif">{{ get_phrase('Shipping addresses') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.payments') }}"
                                                    class="dropdown-item @if ($current_route == 'customer.payments') active @endif">{{ get_phrase('Payments') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.profile') }}"
                                                    class="dropdown-item @if ($current_route == 'customer.profile') active @endif">{{ get_phrase('My Profile') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.account') }}"
                                                    class="dropdown-item @if ($current_route == 'customer.account') active @endif">{{ get_phrase('Account') }}</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('logout') }}">{{ get_phrase('Logout') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="javascript:;"
                                onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"
                                data-bs-toggle="modal" data-bs-target="#loginModal" class="access-nav-item">
                                <span class="access-nav-inner" data-bs-toggle="tooltip" data-bs-title="Login">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13 1C6.37258 1 1 6.37258 1 13C1 19.6274 6.37258 25 13 25C19.6274 25 25 19.6274 25 13C25 6.37258 19.6274 1 13 1Z"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M3.72559 20.6148C3.72559 20.6148 6.40041 17.2 13.0004 17.2C19.6004 17.2 22.2753 20.6148 22.2753 20.6148"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13.0004 13C14.9887 13 16.6004 11.3883 16.6004 9.40005C16.6004 7.41183 14.9887 5.80005 13.0004 5.80005C11.0121 5.80005 9.40039 7.41183 9.40039 9.40005C9.40039 11.3883 11.0121 13 13.0004 13Z"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        @endif
                        <button class="pt-menu-button d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 5.25H3C2.59 5.25 2.25 4.91 2.25 4.5C2.25 4.09 2.59 3.75 3 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z"
                                    fill="black"></path>
                                <path
                                    d="M21 10.25H3C2.59 10.25 2.25 9.91 2.25 9.5C2.25 9.09 2.59 8.75 3 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z"
                                    fill="black"></path>
                                <path
                                    d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z"
                                    fill="black"></path>
                                <path
                                    d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z"
                                    fill="black"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Header End -->
<!-- Mobile Menu Start -->
<div class="d-block d-lg-none">
    <div class="offcanvas offcanvas-start menuoffcanvas" tabindex="-1" id="offcanvasMenu"
        aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header menuoffcanvas-header mb-3">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body menuoffcanvas-body">
            <form action="{{ route('filter.search') }}" method="post" class="mb-20px">
                @csrf
                <div class="position-relative">
                    <input type="search" class="form-control search-form-control" name="search"
                        placeholder="{{ get_phrase('Search Product...') }}">
                    <button type="submit" class="btn search-submit-btn">
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.7544 13.3951L17.3099 16.9506" stroke="white" stroke-width="1.44431"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M1.31006 8.0618C1.31006 11.9892 4.49377 15.1729 8.42108 15.1729C10.3882 15.1729 12.1687 14.3742 13.456 13.0834C14.7389 11.7971 15.5321 10.0221 15.5321 8.0618C15.5321 4.13444 12.3484 0.950684 8.42108 0.950684C4.49377 0.950684 1.31006 4.13444 1.31006 8.0618Z"
                                stroke="white" stroke-width="1.44431" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </form>
            <nav class="mb-40px">
                <ul class="d-flex flex-column gap-30px mobile-menu-ul">
                    <li>
                        <a href="{{ route('home') }}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.3701 6.25171L13.09 2.55754C11.6509 1.54921 9.44172 1.60421 8.05755 2.67671L3.46505 6.26088C2.54839 6.97588 1.82422 8.44255 1.82422 9.59755V15.9225C1.82422 18.26 3.72172 20.1667 6.05922 20.1667H15.9409C18.2784 20.1667 20.1759 18.2692 20.1759 15.9317V9.71671C20.1759 8.47921 19.3784 6.95755 18.3701 6.25171ZM11.6876 16.5C11.6876 16.8759 11.3759 17.1875 11.0001 17.1875C10.6242 17.1875 10.3126 16.8759 10.3126 16.5V13.75C10.3126 13.3742 10.6242 13.0625 11.0001 13.0625C11.3759 13.0625 11.6876 13.3742 11.6876 13.75V16.5Z"
                                    fill="#000000" />
                            </svg>
                            <span class="text">{{ get_phrase('Home') }}</span>
                        </a>
                    </li>
                    <li class="mobile-menuitem-have-sub active-mobile-submenu">
                        <a href="javascript:void(0)"
                            class="d-flex gap-2 mobile-menuitem-a mobile-menuitem-a-have-sub">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.5258 7.16816L11.4675 11.2565C11.1833 11.4215 10.8258 11.4215 10.5325 11.2565L3.47412 7.16816C2.96995 6.87482 2.84162 6.18732 3.22662 5.75649C3.49245 5.45399 3.79495 5.20649 4.11579 5.03232L9.08412 2.28232C10.1475 1.68649 11.8708 1.68649 12.9341 2.28232L17.9025 5.03232C18.2233 5.20649 18.5258 5.46316 18.7916 5.75649C19.1583 6.18732 19.03 6.87482 18.5258 7.16816Z"
                                    fill="#000000" />
                                <path
                                    d="M10.4775 12.9615V19.2131C10.4775 19.9098 9.77169 20.3681 9.14836 20.0656C7.26002 19.1398 4.07919 17.4073 4.07919 17.4073C2.96086 16.7748 2.04419 15.1798 2.04419 13.869V9.13898C2.04419 8.41481 2.80502 7.95647 3.42836 8.31397L10.0192 12.1365C10.2942 12.3106 10.4775 12.6223 10.4775 12.9615Z"
                                    fill="#000000" />
                                <path
                                    d="M11.5225 12.9615V19.2131C11.5225 19.9098 12.2283 20.3681 12.8516 20.0656C14.74 19.1398 17.9208 17.4073 17.9208 17.4073C19.0391 16.7748 19.9558 15.1798 19.9558 13.869V9.13898C19.9558 8.41481 19.195 7.95647 18.5716 8.31397L11.9808 12.1365C11.7058 12.3106 11.5225 12.6223 11.5225 12.9615Z"
                                    fill="#000000" />
                            </svg>
                            <span class="text">{{ get_phrase('Categories') }}</span>
                            <span class="arrow ms-auto">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </a>

                        <ul class="mobile-dropdown-menu">
                            @foreach ($categories as $category)
                                @php
                                    $subCategories = App\Models\Category::where('parent_id', $category->id)
                                        ->orderBy('sort', 'asc')
                                        ->orderBy('title', 'asc')
                                        ->get();
                                @endphp
                                @if ($subCategories->count() > 0)
                                    <li class="mobile-dropitem-have-sub">
                                        <a href="javascript:void(0)"
                                            class="mobile-menuitem-a mobile-dropitem-a-have-sub">
                                            <span class="text"> {{ $category->title }}</span>
                                            <span class="arrow ms-auto">
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="mobile-subdrop-menu">
                                            @foreach ($subCategories as $subCategory)
                                                @php
                                                    $subSubCategories = App\Models\Category::where(
                                                        'parent_id',
                                                        $subCategory->id,
                                                    )
                                                        ->orderBy('sort', 'asc')
                                                        ->orderBy('title', 'asc')
                                                        ->get();
                                                @endphp
                                                @if ($subSubCategories->count() > 0)
                                                    <li class="mobile-dropitem-have-sub">
                                                        <a href="javascript:void(0)"
                                                            class="mobile-menuitem-a mobile-dropitem-a-have-sub">
                                                            {{ $subCategory->title }}

                                                        </a>
                                                        <ul class="mobile-subdrop-menu">
                                                            @foreach ($subSubCategories as $subSubCategory)
                                                                <li>
                                                                    <a href="{{ route('products', get_category_params($subSubCategory)) }}"
                                                                        class="mobile-menuitem-a">
                                                                        {{ $subSubCategory->title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{ route('products', get_category_params($subCategory)) }}"
                                                            class="mobile-menuitem-a">
                                                            {{ $subCategory->title }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('products', get_category_params($category)) }}"
                                            class="mobile-menuitem-a">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </li>
                    <li>
                        <a href="{{ route('store') }}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.1776 7.97498L14.0251 3.82248C13.1542 2.95165 11.9534 2.48415 10.7251 2.54832L6.14173 2.76832C4.30839 2.85082 2.85089 4.30832 2.75923 6.13248L2.53923 10.7158C2.48423 11.9442 2.94256 13.145 3.81339 14.0158L7.96589 18.1683C9.67089 19.8733 12.4392 19.8733 14.1534 18.1683L18.1776 14.1442C19.8917 12.4483 19.8917 9.67998 18.1776 7.97498ZM8.70839 11.3483C7.26006 11.3483 6.06839 10.1658 6.06839 8.70832C6.06839 7.25082 7.26006 6.06832 8.70839 6.06832C10.1567 6.06832 11.3484 7.25082 11.3484 8.70832C11.3484 10.1658 10.1567 11.3483 8.70839 11.3483ZM16.0692 12.4025L12.4026 16.0692C12.2651 16.2067 12.0909 16.2708 11.9167 16.2708C11.7426 16.2708 11.5684 16.2067 11.4309 16.0692C11.1651 15.8033 11.1651 15.3633 11.4309 15.0975L15.0976 11.4308C15.3634 11.165 15.8034 11.165 16.0692 11.4308C16.3351 11.6967 16.3351 12.1367 16.0692 12.4025Z"
                                    fill="#000000" />
                            </svg>
                            <span class="text">{{ get_phrase('Store') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('events') }}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.4833 2.02579C14.1075 1.64995 13.4567 1.90662 13.4567 2.42912V5.62829C13.4567 6.96662 14.5933 8.07579 15.9775 8.07579C16.8483 8.08495 18.0583 8.08495 19.0942 8.08495C19.6167 8.08495 19.8917 7.47079 19.525 7.10412C18.205 5.77495 15.84 3.38245 14.4833 2.02579Z"
                                    fill="#000000" />
                                <path
                                    d="M18.7916 9.34099H16.1425C13.97 9.34099 12.2008 7.57183 12.2008 5.39933V2.75016C12.2008 2.246 11.7883 1.8335 11.2841 1.8335H7.39746C4.57413 1.8335 2.29163 3.66683 2.29163 6.93933V15.061C2.29163 18.3335 4.57413 20.1668 7.39746 20.1668H14.6025C17.4258 20.1668 19.7083 18.3335 19.7083 15.061V10.2577C19.7083 9.75349 19.2958 9.34099 18.7916 9.34099ZM10.5416 16.271H6.87496C6.49913 16.271 6.18746 15.9593 6.18746 15.5835C6.18746 15.2077 6.49913 14.896 6.87496 14.896H10.5416C10.9175 14.896 11.2291 15.2077 11.2291 15.5835C11.2291 15.9593 10.9175 16.271 10.5416 16.271ZM12.375 12.6043H6.87496C6.49913 12.6043 6.18746 12.2927 6.18746 11.9168C6.18746 11.541 6.49913 11.2293 6.87496 11.2293H12.375C12.7508 11.2293 13.0625 11.541 13.0625 11.9168C13.0625 12.2927 12.7508 12.6043 12.375 12.6043Z"
                                    fill="#000000" />
                            </svg>
                            <span class="text">{{ get_phrase('Events') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.8333 12.146H9.16663C8.79079 12.146 8.47913 12.4577 8.47913 12.8335C8.47913 13.2093 8.79079 13.521 9.16663 13.521H12.8333C13.2091 13.521 13.5208 13.2093 13.5208 12.8335C13.5208 12.4577 13.2091 12.146 12.8333 12.146Z"
                                    fill="#000000" />
                                <path
                                    d="M9.16663 9.854H11C11.3758 9.854 11.6875 9.54234 11.6875 9.1665C11.6875 8.79067 11.3758 8.479 11 8.479H9.16663C8.79079 8.479 8.47913 8.79067 8.47913 9.1665C8.47913 9.54234 8.79079 9.854 9.16663 9.854Z"
                                    fill="#000000" />
                                <path
                                    d="M14.8409 1.8335H7.16836C3.83169 1.8335 1.84253 3.82266 1.84253 7.15933V14.8318C1.84253 18.1685 3.83169 20.1577 7.16836 20.1577H14.8409C18.1775 20.1577 20.1667 18.1685 20.1667 14.8318V7.15933C20.1667 3.82266 18.1775 1.8335 14.8409 1.8335ZM16.5 13.7502C16.5 15.5835 15.5834 16.5002 13.75 16.5002H8.25002C6.41669 16.5002 5.50002 15.5835 5.50002 13.7502V8.25016C5.50002 6.41683 6.41669 5.50016 8.25002 5.50016H11.9167C13.75 5.50016 14.6667 6.41683 14.6667 8.25016V9.16683C14.6667 9.671 15.0792 10.0835 15.5834 10.0835C16.0875 10.0835 16.5 10.496 16.5 11.0002V13.7502Z"
                                    fill="#000000" />
                            </svg>
                            <span class="text">{{ get_phrase('Blog') }}</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>
<!-- Mobile Menu End -->

<!-- Search Modal Start -->
<div class="modal fade header-search-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-20px">
                    <form action="{{ route('filter.search') }}" method="post">
                        @csrf
                        <label for="searchFormControlInput1"
                            class="form-label modal-search-label mb-12px builder-editable" builder-identity="PH1">{{ get_phrase('Search') }}</label>
                        <div class="modal-search-wrap">
                            <input type="search" name="search" class="form-control modal-search-input"
                                id="searchFormControlInput1"
                                placeholder="{{ get_phrase('What are you looking for?') }}">
                            <button type="submit" class="modal-search-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18"
                                    viewBox="0 0 19 18" fill="none">
                                    <path
                                        d="M9.36298 16.3125C5.12548 16.3125 1.67548 12.8625 1.67548 8.625C1.67548 4.3875 5.12548 0.9375 9.36298 0.9375C13.6005 0.9375 17.0505 4.3875 17.0505 8.625C17.0505 12.8625 13.6005 16.3125 9.36298 16.3125ZM9.36298 2.0625C5.74048 2.0625 2.80048 5.01 2.80048 8.625C2.80048 12.24 5.74048 15.1875 9.36298 15.1875C12.9855 15.1875 15.9255 12.24 15.9255 8.625C15.9255 5.01 12.9855 2.0625 9.36298 2.0625Z"
                                        fill="#0D0E10" />
                                    <path
                                        d="M17.238 17.0625C17.0955 17.0625 16.953 17.01 16.8405 16.8975L14.238 14.2951C14.0205 14.0776 14.0205 13.7176 14.238 13.5001C14.4555 13.2826 14.8155 13.2826 15.033 13.5001L17.6355 16.1025C17.853 16.32 17.853 16.68 17.6355 16.8975C17.523 17.01 17.3805 17.0625 17.238 17.0625Z"
                                        fill="#0D0E10" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal End -->
