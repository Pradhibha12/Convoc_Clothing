<link rel="stylesheet" href="{{ asset('assets/frontend/car-dark/vendors/slick/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/car-dark/vendors/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/car-dark/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/car-dark/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/car-dark/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/car-dark/css/responsive.css') }}">



@php
    $current_route = Route::currentRouteName();
@endphp

<!-- Start Header -->
<header class="ca-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-logo-area">
                    <a href="{{ route('home') }}" class="header-logo">
                        <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-between align-items-end align-items-lg-center">
            <div class="col-xl-3 col-auto">
                <div class="header-search-area">
                    <form action="{{ route('filter.search') }}" method="post" class="d-lg-block d-none">
                        @csrf
                        <div class="position-relative">
                            <input type="search" id="h-search" name="search" class="form-control header-form-control"
                                placeholder="{{ get_phrase('Search') }}">

                        </div>
                    </form>
                    <!-- Menu Button -->
                    <button class="wch-menu-button d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M21 5.25H3C2.59 5.25 2.25 4.91 2.25 4.5C2.25 4.09 2.59 3.75 3 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z"
                                fill="white"></path>
                            <path
                                d="M21 10.25H3C2.59 10.25 2.25 9.91 2.25 9.5C2.25 9.09 2.59 8.75 3 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z"
                                fill="white"></path>
                            <path
                                d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z"
                                fill="white"></path>
                            <path
                                d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z"
                                fill="white"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-xl-6 col-auto">
                <nav class="ca-header-navbar d-none d-lg-block">
                    <ul class="ca-navbar-nav">
                        <li class="ca-nav-item"><a class="ca-nav-link"
                                href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                        <li class="ca-nav-item"><a class="ca-nav-link"
                                href="{{ route('blog') }}">{{ get_phrase('Blog') }}</a></li>
                        <li class="ca-nav-item"><a class="ca-nav-link"
                                href="{{ route('contact_us') }}">{{ get_phrase('Contact us') }}</a></li>
                        <!-- Mega Menu Button -->
                        <li class="ca-nav-item ca-mega-menu-btn">
                            <a href="javascript:void(0)" class="ca-nav-link ca-mega-menu-link">
                                <span>{{ get_phrase('Categories') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    fill="none">
                                    <path d="M9 1L5 5L1 1" stroke="#FFFFFF99" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                            <!-- Mega Menu -->
                            <div class="ca-mega-menu-wrap">
                                <div class="container">
                                    @php
                                        $categories = App\Models\Category::where('parent_id', '=', 0)
                                            ->orderBy('sort', 'asc')
                                            ->orderBy('title', 'asc')
                                            ->get();
                                    @endphp
                                    <div class="row g-4 mega-nav-mb">
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
                                            <div class="col-md-3">
                                                <div class="mega-nav-wrap">
                                                    <a href="{{ route('products', $category->slug) }}">
                                                        <h3 class="mega-nav-title">{{ $category->title }}</h3>
                                                    </a>
                                                    <ul class="mega-navbar-nav">
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
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="row mega-banner-row">
                                        @foreach ($categories->take(3) as $index => $category)
                                            @if (!empty($category->thumbnail))
                                                <div
                                                    class="
                                                    @if ($index < 2) col-md-3
                                                    @else col-md-6 @endif
                                                ">
                                                    <div class="mega-banner">
                                                        <img class="banner" src="{{ get_image($category->thumbnail) }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-3 col-auto">
                <div class="header-access-items">

                    <a href="javascript:;" class="header-access-item" data-bs-toggle="tooltip" data-bs-title="Cart">
                        <span
                            class="access-item-inner"onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                            data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                            aria-controls="offcanvasCart">
                            <div class="access-item-badge">
                                {{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                viewBox="0 0 25 24" fill="none">
                                <path
                                    d="M9.08838 22.8969C9.65172 22.8969 10.1084 22.4402 10.1084 21.8768C10.1084 21.3135 9.65172 20.8568 9.08838 20.8568C8.52504 20.8568 8.06836 21.3135 8.06836 21.8768C8.06836 22.4402 8.52504 22.8969 9.08838 22.8969Z"
                                    stroke="white" stroke-width="1.57522" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M20.3091 22.8969C20.8724 22.8969 21.3291 22.4402 21.3291 21.8768C21.3291 21.3135 20.8724 20.8568 20.3091 20.8568C19.7457 20.8568 19.2891 21.3135 19.2891 21.8768C19.2891 22.4402 19.7457 22.8969 20.3091 22.8969Z"
                                    stroke="white" stroke-width="1.57522" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M0.927734 1.4765H5.00782L7.74147 15.1346C7.83475 15.6042 8.09022 16.026 8.46318 16.3263C8.83614 16.6265 9.30281 16.786 9.78151 16.7768H19.6961C20.1748 16.786 20.6415 16.6265 21.0144 16.3263C21.3874 16.026 21.6429 15.6042 21.7361 15.1346L23.3682 6.5766H6.02784"
                                    stroke="white" stroke-width="1.57522" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <!-- Login Dropdown -->
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn header-user-dropdown-btn dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="header-user-profile">
                                    <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                </div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end header-user-dropdown-menu">
                                <div class="d-flex align-items-center gap-1 header-user-dropdown-header">
                                    <div class="header-user-dropdown-profile">
                                        <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                    </div>
                                    <h4 class="header-user-dropdown-name">{{ auth()->user()->name }}</h4>
                                </div>
                                <ul>
                                    @if (auth()->user()->user_type == 'admin')
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.dashboard') }}">{{ get_phrase('Admin Dashboard') }}</a>
                                        </li>
                                    @else
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
                        <!-- without login -->
                        <div>
                            <a href="javascript:;"
                                onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"class="header-access-item"
                                data-bs-toggle="modal">
                                <span class="access-item-inner" data-bs-toggle="tooltip" data-bs-title="Login"
                                    data-bs-placement="top">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M9 9.5625C6.6225 9.5625 4.6875 7.6275 4.6875 5.25C4.6875 2.8725 6.6225 0.9375 9 0.9375C11.3775 0.9375 13.3125 2.8725 13.3125 5.25C13.3125 7.6275 11.3775 9.5625 9 9.5625ZM9 2.0625C7.245 2.0625 5.8125 3.495 5.8125 5.25C5.8125 7.005 7.245 8.4375 9 8.4375C10.755 8.4375 12.1875 7.005 12.1875 5.25C12.1875 3.495 10.755 2.0625 9 2.0625Z"
                                            fill="#fff" />
                                        <path
                                            d="M15.4426 17.0625C15.1351 17.0625 14.8801 16.8075 14.8801 16.5C14.8801 13.9125 12.2401 11.8125 9.00011 11.8125C5.76011 11.8125 3.12012 13.9125 3.12012 16.5C3.12012 16.8075 2.86512 17.0625 2.55762 17.0625C2.25012 17.0625 1.99512 16.8075 1.99512 16.5C1.99512 13.2975 5.13761 10.6875 9.00011 10.6875C12.8626 10.6875 16.0051 13.2975 16.0051 16.5C16.0051 16.8075 15.7501 17.0625 15.4426 17.0625Z"
                                            fill="#fff" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->
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
                    <input type="search" name="search" class="form-control search-form-control"
                        placeholder="Search Product...">
                    <button type="submit" class="btn search-submit-btn">
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.7544 13.3951L17.3099 16.9506" stroke="black" stroke-width="1.44431"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M1.31006 8.0618C1.31006 11.9892 4.49377 15.1729 8.42108 15.1729C10.3882 15.1729 12.1687 14.3742 13.456 13.0834C14.7389 11.7971 15.5321 10.0221 15.5321 8.0618C15.5321 4.13444 12.3484 0.950684 8.42108 0.950684C4.49377 0.950684 1.31006 4.13444 1.31006 8.0618Z"
                                stroke="black" stroke-width="1.44431" stroke-linecap="round"
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
                                    fill="#fff" />
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
                                    fill="#fff" />
                                <path
                                    d="M10.4775 12.9615V19.2131C10.4775 19.9098 9.77169 20.3681 9.14836 20.0656C7.26002 19.1398 4.07919 17.4073 4.07919 17.4073C2.96086 16.7748 2.04419 15.1798 2.04419 13.869V9.13898C2.04419 8.41481 2.80502 7.95647 3.42836 8.31397L10.0192 12.1365C10.2942 12.3106 10.4775 12.6223 10.4775 12.9615Z"
                                    fill="#fff" />
                                <path
                                    d="M11.5225 12.9615V19.2131C11.5225 19.9098 12.2283 20.3681 12.8516 20.0656C14.74 19.1398 17.9208 17.4073 17.9208 17.4073C19.0391 16.7748 19.9558 15.1798 19.9558 13.869V9.13898C19.9558 8.41481 19.195 7.95647 18.5716 8.31397L11.9808 12.1365C11.7058 12.3106 11.5225 12.6223 11.5225 12.9615Z"
                                    fill="#fff" />
                            </svg>
                            <span class="text">{{ get_phrase('Categories') }}</span>
                            <span class="arrow ms-auto">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z"
                                        fill="white" />
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
                                                        fill="white" />
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
                                                            <span class="arrow ms-auto">
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z"
                                                                        fill="white" />
                                                                </svg>
                                                            </span>
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
                                    fill="#fff" />
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
                                    fill="#fff" />
                                <path
                                    d="M18.7916 9.34099H16.1425C13.97 9.34099 12.2008 7.57183 12.2008 5.39933V2.75016C12.2008 2.246 11.7883 1.8335 11.2841 1.8335H7.39746C4.57413 1.8335 2.29163 3.66683 2.29163 6.93933V15.061C2.29163 18.3335 4.57413 20.1668 7.39746 20.1668H14.6025C17.4258 20.1668 19.7083 18.3335 19.7083 15.061V10.2577C19.7083 9.75349 19.2958 9.34099 18.7916 9.34099ZM10.5416 16.271H6.87496C6.49913 16.271 6.18746 15.9593 6.18746 15.5835C6.18746 15.2077 6.49913 14.896 6.87496 14.896H10.5416C10.9175 14.896 11.2291 15.2077 11.2291 15.5835C11.2291 15.9593 10.9175 16.271 10.5416 16.271ZM12.375 12.6043H6.87496C6.49913 12.6043 6.18746 12.2927 6.18746 11.9168C6.18746 11.541 6.49913 11.2293 6.87496 11.2293H12.375C12.7508 11.2293 13.0625 11.541 13.0625 11.9168C13.0625 12.2927 12.7508 12.6043 12.375 12.6043Z"
                                    fill="#fff" />
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
                                    fill="#fff" />
                                <path
                                    d="M9.16663 9.854H11C11.3758 9.854 11.6875 9.54234 11.6875 9.1665C11.6875 8.79067 11.3758 8.479 11 8.479H9.16663C8.79079 8.479 8.47913 8.79067 8.47913 9.1665C8.47913 9.54234 8.79079 9.854 9.16663 9.854Z"
                                    fill="#fff" />
                                <path
                                    d="M14.8409 1.8335H7.16836C3.83169 1.8335 1.84253 3.82266 1.84253 7.15933V14.8318C1.84253 18.1685 3.83169 20.1577 7.16836 20.1577H14.8409C18.1775 20.1577 20.1667 18.1685 20.1667 14.8318V7.15933C20.1667 3.82266 18.1775 1.8335 14.8409 1.8335ZM16.5 13.7502C16.5 15.5835 15.5834 16.5002 13.75 16.5002H8.25002C6.41669 16.5002 5.50002 15.5835 5.50002 13.7502V8.25016C5.50002 6.41683 6.41669 5.50016 8.25002 5.50016H11.9167C13.75 5.50016 14.6667 6.41683 14.6667 8.25016V9.16683C14.6667 9.671 15.0792 10.0835 15.5834 10.0835C16.0875 10.0835 16.5 10.496 16.5 11.0002V13.7502Z"
                                    fill="#fff" />
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
