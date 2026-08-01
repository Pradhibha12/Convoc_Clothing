{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<link rel="stylesheet" href="{{ asset('assets/frontend/shoe/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/shoe/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/shoe/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/shoe/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/shoe/css/responsive.css') }}">

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

<!-- Header Menu Area -->
<header class="sh1-header menu-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between gap-2">
                    <a href="{{ route('home') }}" class="sh1-header-logo">
                        <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="Logo" class="logo">
                    </a>
                    <nav class="sh1-header-navbar d-none d-lg-block">
                        <ul class="sh1-navbar-nav">
                            <li class="sh1-nav-item"><a class="sh1-nav-link"
                                    href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                            <!-- Mega Menu Button -->
                            <li class="sh1-nav-item sh1-mega-menu-btn">
                                <a href="javascript:void(0)" class="sh1-nav-link sh1-mega-menu-link">
                                    <span>{{ get_phrase('Categories') }}</span>
                                    <svg width="9" height="6" viewBox="0 0 9 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L4.5 5L8 1" stroke="black" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <!-- Mega Menu -->
                                <div class="sh1-mega-menu-wrap">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="sh1-mega-menu-inner">
                                                    <div class="sh1-mega-nav-wrap flex-wrap">
                                                        @php
                                                            $categories = App\Models\Category::where(
                                                                'parent_id',
                                                                '=',
                                                                0,
                                                            )
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
                                                            <div class="mega-single-nav-wrap ">
                                                                <a href="{{ route('products', $category->slug) }}">
                                                                    <div class="sh1-mega-nav-title">
                                                                        {{ $category->title }}</div>
                                                                </a>
                                                                <ul class="sh1-mega-nav mega-navbar-nav">
                                                                    {{-- <li><a class="sh1-mega-nav-link" href="#">Default View</a></li> --}}
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
                                                                                        class="mega-nav-link mega-nav-link-have-sub sh1-mega-nav-link">{{ $subCategory->title }}</a>
                                                                                    <ul class="mega-nav-dropdown">
                                                                                        @foreach ($subSubCategories as $subSubCategory)
                                                                                            <li><a href="{{ route('products', get_category_params($subSubCategory)) }}"
                                                                                                    class="mage-nav-sublink sh1-mega-nav-link">{{ $subSubCategory->title }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </li>
                                                                            @else
                                                                                <li class="mega-nav-item"><a
                                                                                        href="{{ route('products', get_category_params($subCategory)) }}"
                                                                                        class="sh1-mega-nav-link">{{ $subCategory->title }}</a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        @endforeach


                                                    </div>
                                                    <div class="sh1-mega-ads-wrap">
                                                        @foreach ($categories->take(2) as $index => $category)
                                                            <a href="javascript:;" class="sh1-mega-single-ads">
                                                                <img class="banner"
                                                                    src="{{ get_image($category->thumbnail) }}"
                                                                    alt="banner">
                                                                <h3 class="sh1-mega-ads-title text-capitalize">
                                                                    {{ $category->title }}</h3>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="sh1-nav-item"><a class="sh1-nav-link"
                                    href="{{ route('events') }}">{{ get_phrase('Events') }}</a></li>
                            <li class="sh1-nav-item"><a class="sh1-nav-link"
                                    href="{{ route('blog') }}">{{ get_phrase('Blog') }}</a></li>
                            <li class="sh1-nav-item"><a class="sh1-nav-link"
                                    href="{{ route('store') }}">{{ get_phrase('Store') }}</a></li>
                        </ul>
                    </nav>
                    <div class="sh1-header-right d-flex align-items-center gap-2">
                        <div class="sh1-header-right-items d-flex align-items-center gap-6px">
                            <div class="d-none d-lg-block">
                                <a href="javascript:void(0)" class="sh1-header-right-item" data-bs-toggle="modal"
                                    data-bs-target="#searchModal">
                                    <span
                                        class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-title="Search">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.8718 14.8721L18.7693 18.7695" stroke="black"
                                                stroke-width="1.28017" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M1.23071 9.02583C1.23071 13.3308 4.72059 16.8207 9.02558 16.8207C11.1818 16.8207 13.1336 15.9452 14.5447 14.5303C15.951 13.1203 16.8205 11.1746 16.8205 9.02583C16.8205 4.72084 13.3306 1.23096 9.02558 1.23096C4.72059 1.23096 1.23071 4.72084 1.23071 9.02583Z"
                                                stroke="black" stroke-width="1.28017" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <a href="javascript:;" class="sh1-header-right-item">
                                <span
                                    class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle position-relative"
                                    data-bs-toggle="tooltip" data-bs-title="Cart">
                                    <span class="dark-circle-badge"
                                        id="header-cart-item-counter">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                                        data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                        aria-controls="offcanvasCart">
                                        <path
                                            d="M16.5771 18.7694C17.3035 18.7694 17.8925 18.1805 17.8925 17.4541C17.8925 16.7276 17.3035 16.1387 16.5771 16.1387C15.8507 16.1387 15.2617 16.7276 15.2617 17.4541C15.2617 18.1805 15.8507 18.7694 16.5771 18.7694Z"
                                            fill="black" stroke="black" stroke-width="1.28017"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M7.80782 18.7694C8.53426 18.7694 9.1232 18.1805 9.1232 17.4541C9.1232 16.7276 8.53426 16.1387 7.80782 16.1387C7.08135 16.1387 6.49243 16.7276 6.49243 17.4541C6.49243 18.1805 7.08135 18.7694 7.80782 18.7694Z"
                                            fill="black" stroke="black" stroke-width="1.28017"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M3.86148 2.9848H18.7692L17.0153 12.631H5.61533L3.86148 2.9848ZM3.86148 2.9848C3.71533 2.40018 2.98456 1.23096 1.23071 1.23096"
                                            stroke="black" stroke-width="1.28017" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M17.0153 12.6309H5.61534H4.06386C2.49916 12.6309 1.66919 13.3159 1.66919 14.3847C1.66919 15.4535 2.49916 16.1386 4.06386 16.1386H16.5769"
                                            stroke="black" stroke-width="1.28017" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                            <div class="d-none d-lg-block">
                                <a href="javascript:;" class="sh1-header-right-item">
                                    <span
                                        class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle position-relative"
                                        data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                        <span class="dark-circle-badge"
                                            id="header-cart-item-counter">{{ \App\Models\Wishlist_item::where('user_id', auth()->id())->count() }}</span>
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.2308 6.94287C21.2308 8.44969 20.645 9.89701 19.5988 10.9676C17.1908 13.4329 14.8552 16.0035 12.3572 18.3794C11.7846 18.9161 10.8763 18.8965 10.3283 18.3355L3.1315 10.9676C0.956168 8.74054 0.956168 5.14518 3.1315 2.91813C5.3282 0.66919 8.90687 0.66919 11.1036 2.91813L11.3652 3.18593L11.6266 2.91828C12.6798 1.83944 14.1143 1.23096 15.6127 1.23096C17.1112 1.23096 18.5455 1.83939 19.5988 2.91813C20.6451 3.98883 21.2308 5.43607 21.2308 6.94287Z"
                                                stroke="black" stroke-width="1.28017" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <!-- Without Login -->

                            <!-- Login Dropdown -->
                            @if (Auth::check())
                                <div class="dropdown">
                                    <button class="btn sh1-user-dropdown-btn dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="sh1-user-dropdown-profile">
                                            <span
                                                class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-title="Profile">
                                                <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                            </span>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end sh1-user-dropdown-menu">
                                        <div class="d-flex align-items-center gap-1 sh1-user-dropdown-header">
                                            <div class="sh1-user-dropdown-profile2">
                                                <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                            </div>
                                            <h4 class="sh1-user-dropdown-name">{{ auth()->user()->name }}</h4>
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
                                    class="sh1-header-right-item">
                                    <span
                                        class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-title="Login">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.76998 9.31813C6.45324 9.31813 4.56769 7.43258 4.56769 5.11583C4.56769 2.79909 6.45324 0.913544 8.76998 0.913544C11.0867 0.913544 12.9723 2.79909 12.9723 5.11583C12.9723 7.43258 11.0867 9.31813 8.76998 9.31813ZM8.76998 2.00979C7.05983 2.00979 5.66394 3.40569 5.66394 5.11583C5.66394 6.82598 7.05983 8.22188 8.76998 8.22188C10.4801 8.22188 11.876 6.82598 11.876 5.11583C11.876 3.40569 10.4801 2.00979 8.76998 2.00979Z"
                                                fill="black" />
                                            <path
                                                d="M15.048 16.6265C14.7483 16.6265 14.4999 16.378 14.4999 16.0783C14.4999 13.557 11.9273 11.5106 8.77013 11.5106C5.61293 11.5106 3.0404 13.557 3.0404 16.0783C3.0404 16.378 2.79192 16.6265 2.49228 16.6265C2.19264 16.6265 1.94415 16.378 1.94415 16.0783C1.94415 12.9577 5.00634 10.4144 8.77013 10.4144C12.5339 10.4144 15.5961 12.9577 15.5961 16.0783C15.5961 16.378 15.3476 16.6265 15.048 16.6265Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </a>
                            @endif
                        </div>
                        <button class="sh1-menu-button d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 5.25H3C2.59 5.25 2.25 4.91 2.25 4.5C2.25 4.09 2.59 3.75 3 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z"
                                    fill="#0F1311"></path>
                                <path
                                    d="M21 10.25H3C2.59 10.25 2.25 9.91 2.25 9.5C2.25 9.09 2.59 8.75 3 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z"
                                    fill="#0F1311"></path>
                                <path
                                    d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z"
                                    fill="#0F1311"></path>
                                <path
                                    d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z"
                                    fill="#0F1311"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
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

<!-- Start Search Modal  -->
<div class="d-none d-lg-block">
    <div class="modal fade header-search-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('filter.search') }}" method="post">
                        @csrf
                        <div class="header-search-form">
                            <input type="search" name="search" class="form-control header-search-input"
                                placeholder="{{ get_phrase('Search for products...') }}">
                            <button class="btn header-search-btn" type="submit">
                                <img src="{{ asset('assets/frontend/shoe/images/svg-icons/search-white-16.svg') }}"
                                    alt="icon">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Search Modal  -->
