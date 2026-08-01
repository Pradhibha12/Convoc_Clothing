<link rel="stylesheet" href="{{ asset('assets/frontend/women-clothing/vendors/slick/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/women-clothing/vendors/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/women-clothing/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/women-clothing/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/women-clothing/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/women-clothing/css/responsive.css') }}">



@php
    $current_route = Route::currentRouteName();
@endphp

<!-- Header Start -->
<header class="wc-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex gap-3 justify-content-between align-items-center">
                    <a href="{{ route('home') }}" class="wc-header-logo">
                        <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                    </a>
                    <nav class="wc-header-navbar d-none d-lg-block">
                        <ul class="wc-navbar-nav">
                            <!-- Mega Menu Button -->
                            <li class="wc-nav-item wc-mega-menu-btn">
                                <a href="javascript:void(0)" class="wc-nav-link wc-mega-menu-link">
                                    <span>{{ get_phrase('Categories') }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 15 15" fill="none">
                                        <path
                                            d="M12.685 6.12247L7.99747 10.81C7.93214 10.8755 7.85452 10.9275 7.76906 10.963C7.68359 10.9985 7.59196 11.0168 7.49942 11.0168C7.40688 11.0168 7.31525 10.9985 7.22978 10.963C7.14432 10.9275 7.0667 10.8755 7.00137 10.81L2.31387 6.12247C2.18178 5.99038 2.10757 5.81123 2.10757 5.62443C2.10757 5.43762 2.18178 5.25847 2.31387 5.12638C2.44596 4.99429 2.62512 4.92008 2.81192 4.92008C2.99872 4.92008 3.17788 4.99429 3.30997 5.12638L7.50001 9.31642L11.69 5.12579C11.8221 4.9937 12.0013 4.91949 12.1881 4.91949C12.3749 4.91949 12.554 4.9937 12.6861 5.12579C12.8182 5.25788 12.8924 5.43704 12.8924 5.62384C12.8924 5.81064 12.8182 5.9898 12.6861 6.12189L12.685 6.12247Z"
                                            fill="black" />
                                    </svg>
                                </a>
                                <!-- Mega Menu -->
                                <div class="wc-mega-menu-wrap">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
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
                                                        <div class="col-6">
                                                            <div class="mega-nav-wrap mega-nav-top">

                                                                <a href="{{ route('products', $category->slug) }}">
                                                                    <h3 class="mega-nav-title">{{ $category->title }}
                                                                    </h3>
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
                                            </div>
                                            <div class="col-6">
                                                <div class="row">

                                                    @foreach ($categories->take(2) as $index => $category)
                                                        <div class="col-lg-6">

                                                            <div class="mega-lg-banner">
                                                                <img class="banner"
                                                                    src="{{ get_image($category->thumbnail) }}"
                                                                    alt="{{ $category->title }}">
                                                            </div>

                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="wc-nav-item"><a class="wc-nav-link"
                                    href="{{ route('events') }}">{{ get_phrase('Events') }}</a></li>
                            <li class="wc-nav-item"><a class="wc-nav-link"
                                    href="{{ route('blog') }}">{{ get_phrase('Blog') }}</a></li>
                            <li class="wc-nav-item"><a class="wc-nav-link"
                                    href="{{ route('store') }}">{{ get_phrase('Store') }}</a></li>
                        </ul>
                    </nav>
                    <div class="d-flex align-items-center justify-content-end gap-2 gap-sm-3">
                        <div class="header-right-items">
                            <div class="d-none d-lg-block" data-bs-toggle="tooltip" data-bs-title="Search">
                                <a href="javascript:void(0)" class="header-access-item" data-bs-toggle="modal"
                                    data-bs-target="#searchModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 25 25" fill="none">
                                        <path
                                            d="M10.8179 0.205078C13.3634 0.121788 15.8454 1.01012 17.7603 2.68945C19.675 4.36873 20.8797 6.71348 21.1294 9.24805C21.379 11.7826 20.6544 14.3174 19.104 16.3379L18.9976 16.4775L19.1216 16.6016L24.396 21.8779L24.3989 21.8818H24.3999C24.5053 21.9872 24.589 22.1123 24.646 22.25C24.703 22.3877 24.7329 22.5355 24.7329 22.6846C24.7329 22.8334 24.7029 22.9806 24.646 23.1182C24.589 23.2559 24.5053 23.3819 24.3999 23.4873C24.2946 23.5925 24.1693 23.6764 24.0317 23.7334C23.8943 23.7903 23.7469 23.8193 23.5981 23.8193C23.4492 23.8193 23.3012 23.7903 23.1636 23.7334C23.026 23.6764 22.9007 23.5925 22.7954 23.4873L17.5161 18.207L17.3921 18.083L17.2524 18.1895C15.2319 19.7399 12.6972 20.4644 10.1626 20.2148C7.62803 19.9652 5.28329 18.7605 3.604 16.8457C1.92467 14.9309 1.03634 12.4489 1.11963 9.90332C1.20294 7.35774 2.25128 4.93866 4.05225 3.1377C5.85321 1.33673 8.27229 0.288389 10.8179 0.205078ZM12.6675 2.63672C11.1636 2.33759 9.60457 2.49136 8.18799 3.07812C6.77154 3.66489 5.56127 4.65881 4.70947 5.93359C3.85766 7.20842 3.40288 8.70702 3.40283 10.2402C3.40494 12.2955 4.22206 14.2664 5.67529 15.7197C7.12866 17.1731 9.09941 17.991 11.1548 17.9932C12.6881 17.9932 14.1875 17.5384 15.4624 16.6865C16.7372 15.8347 17.7302 14.6235 18.3169 13.207C18.9037 11.7905 19.0574 10.2314 18.7583 8.72754C18.4591 7.22403 17.7211 5.84283 16.6372 4.75879C15.553 3.67459 14.1713 2.93585 12.6675 2.63672Z"
                                            fill="black" stroke="white" stroke-width="0.4" />
                                    </svg>
                                </a>
                            </div>
                            <a href="javascript:;" class="header-access-item" data-bs-toggle="tooltip"
                                data-bs-title="Cart">
                                <span class="access-item-inner position-relative"
                                    onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                                    data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                    aria-controls="offcanvasCart" data-bs-toggle="tooltip" data-bs-title="Cart">
                                    <span class="dark-circle-badge"
                                        id="header-cart-item-counter">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="24"
                                        viewBox="0 0 28 24" fill="none">
                                        <path
                                            d="M9.80518 19.6885C10.3395 19.6885 10.8522 19.9005 11.23 20.2783C11.6077 20.6561 11.8198 21.1689 11.8198 21.7031C11.8198 22.1015 11.7013 22.491 11.48 22.8223C11.2586 23.1535 10.9437 23.412 10.5757 23.5645C10.2077 23.7168 9.80226 23.7564 9.41162 23.6787C9.02107 23.6009 8.66198 23.4095 8.38037 23.1279C8.09863 22.8462 7.90732 22.4865 7.82959 22.0957C7.75191 21.705 7.79139 21.2997 7.94385 20.9316C8.09633 20.5637 8.35487 20.2496 8.68604 20.0283C9.01733 19.807 9.40673 19.6885 9.80518 19.6885ZM21.3208 19.6885C21.8551 19.6885 22.3678 19.9005 22.7456 20.2783C23.1234 20.6561 23.3354 21.1688 23.3354 21.7031C23.3354 22.1015 23.2169 22.491 22.9956 22.8223C22.7743 23.1534 22.4602 23.412 22.0923 23.5645C21.7242 23.7169 21.3189 23.7564 20.9282 23.6787C20.5374 23.601 20.1777 23.4097 19.896 23.1279C19.6143 22.8462 19.4229 22.4865 19.3452 22.0957C19.2675 21.705 19.307 21.2997 19.4595 20.9316C19.6119 20.5637 19.8705 20.2496 20.2017 20.0283C20.5329 19.807 20.9224 19.6885 21.3208 19.6885ZM2.27588 0.200195H3.69482C4.13235 0.201626 4.55746 0.344873 4.90674 0.608398C5.21242 0.839051 5.44574 1.15078 5.58057 1.50684L5.63232 1.66211L6.43896 4.48438L6.48096 4.62891H25.7505C25.9269 4.62894 26.1008 4.67061 26.2583 4.75C26.416 4.82957 26.5537 4.94484 26.6587 5.08691C26.7636 5.22901 26.8331 5.39422 26.8628 5.56836C26.8925 5.7425 26.8806 5.92101 26.8286 6.08984L23.8071 15.9121C23.6267 16.5061 23.2596 17.0267 22.7603 17.3955C22.2609 17.7643 21.6554 17.9623 21.0347 17.96H10.1304C9.50027 17.9579 8.88735 17.7515 8.38428 17.3721C7.88134 16.9927 7.51453 16.4606 7.33936 15.8555H7.34033L3.5542 2.60254L3.51221 2.45703H2.27588C1.97652 2.45703 1.68873 2.33863 1.47705 2.12695C1.26554 1.91537 1.14707 1.62827 1.14697 1.3291C1.14697 1.02974 1.26537 0.741955 1.47705 0.530273C1.68873 0.318591 1.97652 0.200195 2.27588 0.200195ZM7.19775 7.1416L9.51123 15.2363C9.54972 15.3706 9.63112 15.4882 9.74268 15.5723C9.85423 15.6563 9.98975 15.7022 10.1294 15.7021H21.0347V15.7012C21.172 15.7013 21.3059 15.6586 21.4165 15.5771C21.5272 15.4956 21.6083 15.3804 21.6489 15.249H21.6499L24.1421 7.14551L24.2212 6.88672H7.12451L7.19775 7.1416Z"
                                            fill="black" stroke="white" stroke-width="0.4" />
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
                                <a href="javascript:;" class="header-access-item">
                                    <span class="access-item-inner"
                                        onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"
                                        data-bs-toggle="tooltip" data-bs-title="Login">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 25 25" fill="none">
                                            <path
                                                d="M12.9902 0.200195C16.1212 0.20375 19.123 1.44913 21.3369 3.66309C23.5509 5.87708 24.7963 8.87874 24.7998 12.0098L24.792 12.4473C24.7111 14.6296 24.0259 16.7498 22.8096 18.5703C21.512 20.5123 19.6675 22.0261 17.5098 22.9199C15.3519 23.8137 12.9773 24.0484 10.6865 23.5928C8.39571 23.1371 6.29125 22.0119 4.63965 20.3604C2.98804 18.7087 1.86291 16.6043 1.40723 14.3135C0.951599 12.0227 1.1853 9.6481 2.0791 7.49023C2.9729 5.33241 4.48676 3.48808 6.42871 2.19043C8.3708 0.892766 10.6545 0.200195 12.9902 0.200195ZM12.9902 16.7012C11.9094 16.7012 10.8437 16.9561 9.87988 17.4453C8.91611 17.9345 8.08139 18.6442 7.44336 19.5166L7.32324 19.6807L7.48926 19.7979C9.097 20.938 11.0193 21.5508 12.9902 21.5508C14.9612 21.5508 16.8835 20.938 18.4912 19.7979L18.6572 19.6807L18.5371 19.5166C17.8991 18.6442 17.0643 17.9345 16.1006 17.4453C15.1368 16.9562 14.071 16.7012 12.9902 16.7012ZM12.9844 2.45898C11.1928 2.45902 9.43717 2.96388 7.91895 3.91504C6.40076 4.86623 5.18101 6.22582 4.39941 7.83789C3.61781 9.45002 3.30647 11.2501 3.5 13.0312C3.6936 14.8122 4.38459 16.5027 5.49414 17.9092L5.65137 18.1084L5.80859 17.9092C6.65485 16.8329 7.73352 15.962 8.96387 15.3613L9.21387 15.2383L9.01758 15.041C8.24395 14.2576 7.71952 13.2625 7.50977 12.1816C7.30005 11.1007 7.41528 9.98178 7.83984 8.96582C8.26442 7.94985 8.97998 7.08199 9.89648 6.47168C10.8129 5.8615 11.8892 5.53613 12.9902 5.53613C14.0912 5.53615 15.1675 5.86147 16.084 6.47168C17.0005 7.08199 17.7161 7.94985 18.1406 8.96582C18.5652 9.98176 18.6804 11.1007 18.4707 12.1816C18.261 13.2625 17.7356 14.2576 16.9619 15.041L16.7666 15.2383L17.0166 15.3613C18.1971 15.9377 19.2355 16.7646 20.0654 17.7812L19.9062 17.9854H20.7412L20.5762 17.7764C21.626 16.3966 22.2821 14.7569 22.4697 13.0312C22.6633 11.2501 22.351 9.45004 21.5693 7.83789C20.7877 6.22579 19.5681 4.86622 18.0498 3.91504C16.5315 2.96388 14.776 2.45898 12.9844 2.45898ZM13.6367 7.87012C12.9939 7.74226 12.3272 7.80779 11.7217 8.05859C11.1163 8.3094 10.5994 8.73449 10.2354 9.2793C9.87125 9.82422 9.67676 10.4647 9.67676 11.1201C9.67677 11.9989 10.026 12.8415 10.6475 13.4629C11.2689 14.0843 12.1114 14.4336 12.9902 14.4336C13.6456 14.4336 14.2862 14.2391 14.8311 13.875C15.3759 13.5109 15.801 12.9931 16.0518 12.3877C16.3024 11.7823 16.368 11.1162 16.2402 10.4736C16.1124 9.83088 15.7964 9.24075 15.333 8.77734C14.8696 8.31395 14.2795 7.99799 13.6367 7.87012Z"
                                                fill="black" stroke="white" stroke-width="0.4" />
                                        </svg>
                                    </span>
                                </a>
                            @endif
                        </div>
                        <!-- Menu Button -->
                        <button class="mi-menu-button d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
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
<!-- Start Search Modal -->
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
                                placeholder="{{get_phrase('Search Product...')}}">
                            <button class="btn header-search-btn" type="submit">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.7544 13.3951L17.3099 16.9506" stroke="white" stroke-width="1.44431"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M1.31006 8.0618C1.31006 11.9892 4.49377 15.1729 8.42108 15.1729C10.3882 15.1729 12.1687 14.3742 13.456 13.0834C14.7389 11.7971 15.5321 10.0221 15.5321 8.0618C15.5321 4.13444 12.3484 0.950684 8.42108 0.950684C4.49377 0.950684 1.31006 4.13444 1.31006 8.0618Z"
                                        stroke="white" stroke-width="1.44431" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Search Modal -->
