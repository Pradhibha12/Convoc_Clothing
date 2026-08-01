<link rel="stylesheet" href="{{ asset('assets/frontend/coffee/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/coffee/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/coffee/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/coffee/css/responsive.css') }}">

<style>
    .category-section-title-area .cts-btn-outline-black{
        background: transparent !important;
        color: inherit !important;
        border-color: inherit !important;
    }
    .subscription-offer-main .section-title,
    .blog-section-title-area .section-title{
        color: #fff !important;
    }
</style>

@php
    $current_route = Route::currentRouteName();
@endphp


<!-- Main Header -->
<header class="cts-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cts-header-area">
                    <a href="{{ route('home') }}" class="cts-header-logo">
                        <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                    </a>
                    <nav class="cts-header-navbar d-none d-lg-block">
                        <ul class="cts-navbar-nav">
                            <!-- Mega Menu Button -->
                            <li class="cts-nav-item cts-mega-menu-btn">
                                <a href="javascript:void(0)" class="cts-nav-link cts-mega-menu-link">
                                    <span>{{ get_phrase('Categories') }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6"
                                        viewBox="0 0 10 6" fill="none">
                                        <path d="M9 1L5 5L1 1" stroke="white" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <!-- Mega Menu -->
                                <div class="cts-mega-menu-wrap">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                @php
                                                    $categories = App\Models\Category::where('parent_id', '=', 0)
                                                        ->orderBy('sort', 'asc')
                                                        ->orderBy('title', 'asc')
                                                        ->get();
                                                @endphp
                                                <div class="cts-mega-inner align-items-start">
                                                    <div class="mega-banner-wrap">
                                                        @foreach ($categories->take(2) as $index => $category)
                                                            @if (!empty($category->thumbnail))
                                                                <div class="mega-menu-banner mb-18px">
                                                                    <img class="banner"
                                                                        src="{{ get_image($category->thumbnail) }}"
                                                                        alt="">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="mega-nav-main row mt-5">
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
                                                            <div class="col-lg-6">
                                                                <div class="mega-nav-wrap mega-nav-wrap-top">
                                                                    <div class="bs-mega-nav fit-w-280px">
                                                                        <a
                                                                            href="{{ route('products', $category->slug) }}">
                                                                            <h2 class="mega-nav-title">
                                                                                {{ $category->title }}</h2>
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
                                                                                            <ul
                                                                                                class="mega-nav-dropdown">
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
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="cts-nav-item"><a class="cts-nav-link"
                                    href="{{ route('store') }}">{{ get_phrase('Store') }}</a></li>
                            <li class="cts-nav-item"><a class="cts-nav-link"
                                    href="{{ route('events') }}">{{ get_phrase('Event') }}</a></li>
                            <li class="cts-nav-item"><a class="cts-nav-link"
                                    href="{{ route('blog') }}">{{ get_phrase('Blog') }}</a></li>
                            <li class="cts-nav-item"><a class="cts-nav-link"
                                    href="{{ route('contact_us') }}">{{ get_phrase('Contact') }}</a></li>
                        </ul>
                    </nav>
                    <div class="cts-header-right d-flex align-items-center gap-2 gap-md-3">
                        <div class="header-access-items">
                            <a href="javascript:;" class="header-access-item svg-fill position-relative"
                                data-bs-toggle="tooltip" data-bs-title="Cart" data-bs-placement="right">
                                <span class="access-item-inner"
                                    onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                                    data-bs-toggle="offcanvas" href="#offcanvasCart">
                                    <span class="total-item-badge"
                                        id="header-cart-item-counter">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24"
                                        viewBox="0 0 27 24" fill="none">
                                        <path
                                            d="M8.88867 19.9053C9.38522 19.9053 9.86178 20.103 10.2129 20.4541C10.5638 20.8051 10.7606 21.281 10.7607 21.7773C10.7607 22.1476 10.651 22.5105 10.4453 22.8184C10.2396 23.126 9.94741 23.3662 9.60547 23.5078C9.26337 23.6495 8.88661 23.6865 8.52344 23.6143C8.16039 23.542 7.82721 23.3633 7.56543 23.1016C7.30359 22.8397 7.12497 22.5058 7.05273 22.1426C6.98062 21.7796 7.01759 21.4034 7.15918 21.0615C7.30088 20.7194 7.54075 20.4264 7.84863 20.2207C8.15644 20.0151 8.5185 19.9053 8.88867 19.9053ZM20.4443 19.9053C20.9409 19.9053 21.4174 20.103 21.7686 20.4541C22.1194 20.8051 22.3163 21.2811 22.3164 21.7773C22.3164 22.1476 22.2067 22.5105 22.001 22.8184C21.7953 23.126 21.5031 23.3662 21.1611 23.5078C20.819 23.6495 20.4423 23.6865 20.0791 23.6143C19.7159 23.542 19.3819 23.3634 19.1201 23.1016C18.8584 22.8398 18.6806 22.5056 18.6084 22.1426C18.5363 21.7796 18.5732 21.4035 18.7148 21.0615C18.8565 20.7194 19.0964 20.4264 19.4043 20.2207C19.7121 20.0151 20.0742 19.9053 20.4443 19.9053ZM1.33301 0.349609H2.75684L2.9082 0.356445C3.26106 0.386052 3.59948 0.514993 3.88379 0.729492C4.20797 0.974106 4.44449 1.31703 4.55762 1.70703V1.70801L5.36816 4.54102L5.44043 4.79492H24.8887C25.0425 4.79491 25.1947 4.83013 25.332 4.89941C25.4693 4.96868 25.5883 5.0697 25.6797 5.19336C25.7711 5.31707 25.8325 5.4607 25.8584 5.6123C25.8778 5.72599 25.8771 5.84223 25.8564 5.95508L25.8291 6.06738L22.7969 15.9229L22.7959 15.9238C22.6242 16.4891 22.275 16.984 21.7998 17.335C21.3246 17.6859 20.7489 17.8742 20.1582 17.8721H9.21582C8.61589 17.8701 8.03272 17.6737 7.55371 17.3125C7.13462 16.9964 6.815 16.569 6.62988 16.0811L6.55859 15.8682L2.75977 2.57031L2.6875 2.31641H1.33301C1.07233 2.31632 0.822029 2.21265 0.637695 2.02832C0.453488 1.84394 0.349609 1.59365 0.349609 1.33301C0.349695 1.07233 0.453361 0.822029 0.637695 0.637695C0.822029 0.453361 1.07233 0.349695 1.33301 0.349609ZM6.12891 7.20703L8.4502 15.3291C8.4977 15.4952 8.59835 15.6422 8.73633 15.7461C8.87423 15.8498 9.04228 15.9055 9.21484 15.9053H20.1562C20.3262 15.9056 20.4921 15.8517 20.6289 15.751C20.7657 15.6502 20.8668 15.5081 20.917 15.3457V15.3447L23.418 7.21387L23.5576 6.76074H6.00195L6.12891 7.20703Z"
                                            fill="white" stroke-width="0.7" />
                                    </svg>
                                </span>
                            </a>
                            <div class="d-none d-lg-block">
                                <a href="javascript:;" class="header-access-item">
                                    <span class="access-item-inner position-relative" data-bs-toggle="tooltip"
                                        data-bs-title="Wishlist">
                                        <span class="total-item-badge"
                                            id="header-cart-item-counter">{{ \App\Models\Wishlist_item::where('user_id', auth()->id())->count() }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="26"
                                            viewBox="0 0 30 26" fill="none">
                                            <path
                                                d="M28.2222 8.8163C28.2222 10.8783 27.4205 12.8588 25.989 14.3239C22.6938 17.6973 19.4977 21.2151 16.0793 24.4663C15.2958 25.2007 14.0528 25.1739 13.303 24.4063L3.45474 14.3239C0.477977 11.2763 0.477977 6.35631 3.45474 3.30876C6.46076 0.231266 11.3579 0.231266 14.3639 3.30876L14.7219 3.67523L15.0796 3.30897C16.5209 1.83267 18.4838 1 20.5343 1C22.5848 1 24.5476 1.83259 25.989 3.30876C27.4207 4.77394 28.2222 6.75436 28.2222 8.8163Z"
                                                stroke="white" stroke-width="1.7" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <!-- Login Dropdown -->
                            @if (Auth::check())
                                <div class="dropdown">
                                    <button class="btn cts-user-dropdown-btn dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="cts-user-dropdown-profile">
                                            <span
                                                class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-title="Profile">
                                                <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                            </span>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end cts-user-dropdown-menu">
                                        <div class="d-flex align-items-center gap-1 cts-user-dropdown-header">
                                            <div class="cts-user-dropdown-profile2">
                                                <img src="{{ get_image(auth()->user()->photo) }}" alt="user">
                                            </div>
                                            <h4 class="cts-user-dropdown-name">{{ auth()->user()->name }}</h4>
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
                                <div class="">
                                    <a href="javascript:;"
                                        onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"
                                        class="header-access-item" data-bs-toggle="modal">
                                        <span class="access-item-inner" data-bs-toggle="tooltip"
                                            data-bs-title="Login">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                viewBox="0 0 25 24" fill="none">
                                                <path
                                                    d="M12.2222 0.5C18.5734 0.5 23.7222 5.64872 23.7222 12C23.7222 18.3512 18.5734 23.5 12.2222 23.5C5.87089 23.5 0.722168 18.3512 0.722168 12C0.722168 5.64872 5.87089 0.5 12.2222 0.5Z"
                                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                <mask id="path-2-inside-1_28_59" fill="white">
                                                    <path
                                                        d="M2.94727 19.6149C2.94727 19.6149 5.62209 16.2 12.2221 16.2C18.8221 16.2 21.497 19.6149 21.497 19.6149" />
                                                </mask>
                                                <path
                                                    d="M2.16002 18.9982C1.81946 19.433 1.89584 20.0615 2.33062 20.4021C2.76541 20.7427 3.39395 20.6663 3.73451 20.2315L2.16002 18.9982ZM20.7098 20.2315C21.0503 20.6663 21.6789 20.7427 22.1136 20.4021C22.5484 20.0615 22.6248 19.433 22.2842 18.9982L20.7098 20.2315ZM2.94727 19.6149C3.73451 20.2315 3.73416 20.2319 3.73382 20.2324C3.73372 20.2325 3.73338 20.2329 3.73318 20.2332C3.73278 20.2337 3.73242 20.2342 3.73209 20.2346C3.73144 20.2354 3.73095 20.236 3.73062 20.2364C3.72995 20.2373 3.72991 20.2373 3.73051 20.2366C3.7317 20.2351 3.73542 20.2306 3.74171 20.2231C3.7543 20.2083 3.77715 20.1819 3.81053 20.1457C3.87731 20.0732 3.98611 19.9613 4.13919 19.8229C4.44535 19.5459 4.92803 19.1631 5.60589 18.7756C6.95519 18.0045 9.10371 17.2 12.2221 17.2V16.2V15.2C8.74044 15.2 6.25156 16.103 4.61346 17.0392C3.79761 17.5055 3.19909 17.9764 2.79747 18.3397C2.59666 18.5214 2.44493 18.6763 2.33965 18.7905C2.287 18.8477 2.24594 18.8947 2.21612 18.9299C2.20121 18.9475 2.18911 18.9621 2.17977 18.9735C2.17511 18.9793 2.17113 18.9842 2.16784 18.9883C2.1662 18.9904 2.16472 18.9922 2.16342 18.9939C2.16277 18.9947 2.16216 18.9955 2.16159 18.9962C2.16131 18.9966 2.16092 18.9971 2.16078 18.9972C2.16039 18.9977 2.16002 18.9982 2.94727 19.6149ZM12.2221 16.2V17.2C15.3404 17.2 17.489 18.0045 18.8383 18.7756C19.5162 19.1631 19.9989 19.5459 20.305 19.8229C20.4581 19.9614 20.5669 20.0732 20.6337 20.1457C20.6671 20.182 20.69 20.2083 20.7025 20.2232C20.7088 20.2306 20.7126 20.2351 20.7138 20.2366C20.7143 20.2373 20.7143 20.2373 20.7136 20.2364C20.7133 20.236 20.7128 20.2354 20.7122 20.2346C20.7118 20.2342 20.7115 20.2337 20.7111 20.2332C20.7109 20.2329 20.7105 20.2325 20.7104 20.2324C20.7101 20.232 20.7098 20.2315 21.497 19.6149C22.2842 18.9982 22.2838 18.9977 22.2835 18.9972C22.2833 18.9971 22.2829 18.9966 22.2826 18.9962C22.2821 18.9955 22.2815 18.9947 22.2808 18.9939C22.2795 18.9922 22.278 18.9904 22.2764 18.9883C22.2731 18.9842 22.2691 18.9793 22.2645 18.9735C22.2551 18.9621 22.243 18.9474 22.2281 18.9299C22.1983 18.8947 22.1572 18.8477 22.1046 18.7905C21.9993 18.6763 21.8476 18.5213 21.6468 18.3397C21.2451 17.9764 20.6466 17.5055 19.8307 17.0392C18.1926 16.103 15.7037 15.2 12.2221 15.2V16.2Z"
                                                    fill="white" mask="url(#path-2-inside-1_28_59)" />
                                                <path
                                                    d="M12.2217 5.29999C13.9337 5.29999 15.3221 6.68769 15.3223 8.3996C15.3223 10.1117 13.9338 11.5002 12.2217 11.5002C10.5097 11.5 9.12207 10.1116 9.12207 8.3996C9.12228 6.68782 10.5099 5.3002 12.2217 5.29999Z"
                                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            @endif

                        </div>
                        <!-- Menu Button -->
                        <button class="cts-menu-button d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
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
                                                            <span class="arrow ms-auto">
                                                                <svg width="16" height="16"
                                                                    viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z"
                                                                        fill="black" />
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
