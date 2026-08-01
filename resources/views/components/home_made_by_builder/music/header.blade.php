<link rel="stylesheet" href="{{ asset('assets/frontend/music/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/music/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/music/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/music/css/responsive.css') }}">



@php
    $current_route = Route::currentRouteName();
@endphp

<!-- Header Start -->
<header class="mi-header-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-4 col-auto">
                <a href="{{ route('home') }}" class="mi-header-logo">
                    <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                </a>
            </div>
            <div class="col-xl-5 col-auto">
                <nav class="mi-header-navbar d-none d-lg-block">
                    <ul class="mi-navbar-nav">
                        <!-- Mega Menu Button -->
                        <li class="mi-nav-item mi-mega-menu-btn">
                            <a href="javascript:void(0)" class="mi-nav-link mi-mega-menu-link">
                                <span>{{ get_phrase('Categories') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <path
                                        d="M12.685 6.12247L7.99747 10.81C7.93214 10.8755 7.85452 10.9275 7.76906 10.963C7.68359 10.9985 7.59196 11.0168 7.49942 11.0168C7.40688 11.0168 7.31525 10.9985 7.22978 10.963C7.14432 10.9275 7.0667 10.8755 7.00137 10.81L2.31387 6.12247C2.18178 5.99038 2.10757 5.81123 2.10757 5.62443C2.10757 5.43762 2.18178 5.25847 2.31387 5.12638C2.44596 4.99429 2.62512 4.92008 2.81192 4.92008C2.99872 4.92008 3.17788 4.99429 3.30997 5.12638L7.50001 9.31642L11.69 5.12579C11.8221 4.9937 12.0013 4.91949 12.1881 4.91949C12.3749 4.91949 12.554 4.9937 12.6861 5.12579C12.8182 5.25788 12.8924 5.43704 12.8924 5.62384C12.8924 5.81064 12.8182 5.9898 12.6861 6.12189L12.685 6.12247Z"
                                        fill="black" />
                                </svg>
                            </a>
                            <!-- Mega Menu -->
                            <div class="mi-mega-menu-wrap">
                                <div class="container">
                                    @php
                                        $categories = App\Models\Category::where('parent_id', '=', 0)
                                            ->orderBy('sort', 'asc')
                                            ->orderBy('title', 'asc')
                                            ->get();
                                    @endphp
                                    <div class="row mega-banner-row">
                                        <div class="col-12">
                                            <div class="d-flex gap-12px">
                                                @foreach ($categories->take(2) as $index => $category)
                                                    @if (!empty($category->thumbnail))
                                                        @if ($index === 0)
                                                            <div class="mega-sm-banner">
                                                                <img class="banner"
                                                                    src="{{ get_image($category->thumbnail) }}"
                                                                    alt="">
                                                            </div>
                                                        @else
                                                            <div class="mega-lg-banner">
                                                                <img class="banner"
                                                                    src="{{ get_image($category->thumbnail) }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mega-nav-main">
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
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mi-nav-item"><a href="{{ route('events') }}"
                                class="mi-nav-link">{{ get_phrase('Events') }}</a></li>
                        <li class="mi-nav-item"><a class="mi-nav-link"
                                href="{{ route('blog') }}">{{ get_phrase('Blogs') }}</a></li>
                        <li class="mi-nav-item"><a class="mi-nav-link"
                                href="{{ route('store') }}">{{ get_phrase('Store') }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-3 col-auto">
                <div class="d-flex align-items-center justify-content-end gap-2 gap-sm-3">
                    <div class="header-right-items">
                        <div class="d-none d-lg-block">
                            <a href="javascript:void(0)" class="header-access-item" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                                <span class="access-item-inner" data-bs-toggle="tooltip" data-bs-title="Search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 30 30" fill="none">
                                        <path
                                            d="M12.374 0.40625C15.5153 0.303453 18.5784 1.39934 20.9414 3.47168C23.3043 5.54394 24.7906 8.43774 25.0986 11.5654C25.4066 14.6933 24.513 17.822 22.5996 20.3154L22.3857 20.5938L22.6338 20.8418L29.2217 27.4316L29.2363 27.4463C29.3496 27.562 29.44 27.698 29.502 27.8477C29.5656 28.0013 29.5986 28.1658 29.5986 28.332C29.5986 28.4985 29.5656 28.6636 29.502 28.8174C29.4383 28.9711 29.3451 29.1109 29.2275 29.2285C29.1099 29.3462 28.9702 29.4402 28.8164 29.5039C28.6626 29.5676 28.4975 29.5996 28.3311 29.5996C28.1646 29.5996 27.9995 29.5676 27.8457 29.5039C27.692 29.4402 27.5522 29.3462 27.4346 29.2285L20.8418 22.6338L20.5938 22.3857L20.3154 22.5996C17.822 24.513 14.6933 25.4066 11.5654 25.0986C8.43774 24.7906 5.54394 23.3043 3.47168 20.9414C1.39935 18.5784 0.303453 15.5153 0.40625 12.374C0.509057 9.23273 1.80297 6.24781 4.02539 4.02539C6.24781 1.80297 9.23273 0.509057 12.374 0.40625ZM14.709 3.14648C12.8016 2.76708 10.8241 2.96182 9.02734 3.70605C7.23066 4.45029 5.6947 5.71018 4.61426 7.32715C3.53384 8.94411 2.95707 10.8453 2.95703 12.79V12.791C2.9598 15.3977 3.99668 17.897 5.83984 19.7402C7.56808 21.4685 9.87324 22.4876 12.3027 22.6104L12.79 22.623C14.7348 22.623 16.6359 22.0463 18.2529 20.9658C19.87 19.8854 21.1308 18.3495 21.875 16.5527C22.6191 14.7562 22.8139 12.7793 22.4346 10.8721C22.0552 8.96466 21.1183 7.21208 19.7432 5.83691C18.3681 4.46197 16.6161 3.52593 14.709 3.14648Z"
                                            fill="black" stroke="white" stroke-width="0.8" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <a href="javascript:;" class="header-access-item" data-bs-toggle="tooltip" data-bs-title="Cart">
                            <span class="access-item-inner"
                                onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                                data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                aria-controls="offcanvasCart" data-bs-toggle="tooltip" data-bs-title="Cart">
                                <span class="position-relative header-access-item has-badge">
                                    <span class="dark-circle-badge"
                                        id="header-cart-item-counter">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="30"
                                        viewBox="0 0 33 30" fill="none">
                                        <path
                                            d="M11.0644 24.7412C11.6917 24.7413 12.2936 24.99 12.7372 25.4336C13.1808 25.8772 13.4295 26.4791 13.4296 27.1064C13.4296 27.5743 13.2911 28.0319 13.0312 28.4209C12.7712 28.8099 12.4019 29.1139 11.9697 29.293C11.5374 29.472 11.0614 29.519 10.6025 29.4277C10.1435 29.3364 9.72145 29.1111 9.39056 28.7803C9.05967 28.4494 8.8344 28.0273 8.7431 27.5684C8.65184 27.1094 8.6988 26.6335 8.87787 26.2012C9.05695 25.7689 9.36089 25.3996 9.74994 25.1396C10.139 24.8798 10.5966 24.7412 11.0644 24.7412ZM25.4472 24.7412C26.0746 24.7412 26.6764 24.99 27.1201 25.4336C27.5637 25.8772 27.8133 26.4791 27.8134 27.1064C27.8134 27.5744 27.6739 28.0318 27.414 28.4209C27.154 28.81 26.7848 29.1139 26.3525 29.293C25.9202 29.472 25.4442 29.519 24.9853 29.4277C24.5266 29.3364 24.1051 29.1109 23.7744 28.7803C23.4435 28.4494 23.2182 28.0273 23.1269 27.5684C23.0356 27.1094 23.0826 26.6335 23.2617 26.2012C23.4408 25.769 23.7438 25.3996 24.1328 25.1396C24.5218 24.8797 24.9793 24.7412 25.4472 24.7412ZM1.65912 0.400391H3.43158L3.62299 0.408203C4.06882 0.445654 4.49619 0.608848 4.85541 0.879883C5.21463 1.15093 5.48903 1.5171 5.6474 1.93555L5.70795 2.11816L6.71576 5.6416L6.79877 5.93164H30.9794C31.1765 5.93166 31.3709 5.97862 31.5468 6.06738C31.7227 6.15616 31.8751 6.28492 31.9921 6.44336C32.1092 6.60193 32.1875 6.78614 32.2206 6.98047C32.2537 7.17467 32.2415 7.37421 32.1835 7.5625L28.4091 19.8291L28.4081 19.8311C28.1921 20.5419 27.7528 21.1641 27.1552 21.6055C26.5576 22.0468 25.8337 22.2839 25.0908 22.2812H11.4706C10.7161 22.2788 9.98223 22.0315 9.37982 21.5771C8.77807 21.1232 8.33972 20.4866 8.12982 19.7627L3.40131 3.20898L3.3183 2.91895H1.65912C1.3252 2.91883 1.00462 2.78593 0.768494 2.5498C0.532536 2.31362 0.40033 1.99305 0.40033 1.65918C0.400441 1.32526 0.532372 1.00468 0.768494 0.768555C1.00462 0.532433 1.3252 0.400502 1.65912 0.400391ZM7.66302 8.96094L10.5517 19.0713C10.6087 19.2705 10.7299 19.4457 10.8954 19.5703C11.0607 19.6947 11.2619 19.7617 11.4687 19.7617H25.0888V19.7607C25.2926 19.761 25.4911 19.697 25.6552 19.5762C25.7783 19.4855 25.8771 19.3671 25.9443 19.2314L26.0009 19.0898L29.1142 8.96875L29.2734 8.45117H7.51752L7.66302 8.96094Z"
                                            fill="black" stroke="white" stroke-width="0.8" />
                                    </svg>
                                </span>

                            </span>
                        </a>

                        <!-- Without Login -->

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

                            <a href="javascript:;"
                                onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"
                                class="header-access-item" data-bs-toggle="modal">
                                <span class="access-item-inner" data-bs-toggle="tooltip" data-bs-title="Login">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30"
                                        viewBox="0 0 31 30" fill="none">
                                        <path
                                            d="M15.4998 0.400391C19.3706 0.404802 23.082 1.94359 25.8191 4.68066C28.5562 7.41774 30.095 11.1292 30.0994 15L30.0896 15.541C29.9896 18.239 29.1433 20.8606 27.6394 23.1113C26.0351 25.5123 23.7545 27.3832 21.0867 28.4883C18.4189 29.5933 15.4832 29.8827 12.6511 29.3193C9.81913 28.756 7.2173 27.366 5.17554 25.3242C3.13377 23.2825 1.74381 20.6806 1.18042 17.8486C0.617083 15.0165 0.906471 12.0809 2.01147 9.41309C3.11651 6.74529 4.98747 4.46462 7.38843 2.86035C9.78937 1.25612 12.6122 0.400391 15.4998 0.400391ZM15.4998 20.71C14.1263 20.71 12.7723 21.0337 11.5476 21.6553C10.3229 22.2769 9.26174 23.1786 8.45093 24.2871L8.21069 24.6152L8.54175 24.8496C10.5752 26.2917 13.0068 27.0664 15.4998 27.0664C17.9927 27.0664 20.4243 26.2917 22.4578 24.8496L22.7888 24.6152L22.5486 24.2871C21.7378 23.1786 20.6766 22.2769 19.4519 21.6553C18.2272 21.0337 16.8732 20.71 15.4998 20.71ZM15.4929 2.92188C13.227 2.92188 11.0069 3.55971 9.08667 4.7627C7.16658 5.96563 5.62406 7.68488 4.6355 9.72363C3.64694 11.7626 3.25206 14.0393 3.49683 16.292C3.74165 18.5446 4.61596 20.683 6.01929 22.4619L6.33374 22.8604L6.64722 22.4609C7.69014 21.1344 9.01959 20.0607 10.5359 19.3203L11.0369 19.0762L10.6453 18.6797C9.6999 17.7222 9.05876 16.5064 8.80249 15.1855C8.54626 13.8646 8.68603 12.4974 9.20483 11.2559C9.7237 10.0143 10.5985 8.95385 11.7185 8.20801C12.8385 7.46218 14.1541 7.06445 15.4998 7.06445C16.8454 7.06445 18.161 7.46218 19.281 8.20801C20.4011 8.95385 21.2758 10.0143 21.7947 11.2559C22.3135 12.4974 22.4532 13.8646 22.197 15.1855C21.9407 16.5064 21.2996 17.7222 20.3542 18.6797L19.9626 19.0762L20.4636 19.3203C21.8821 20.0129 23.1364 20.9979 24.1462 22.208L23.8279 22.6143H25.49L25.1648 22.2002C26.4514 20.4747 27.256 18.4357 27.489 16.292C27.7338 14.0393 27.3389 11.7626 26.3503 9.72363C25.3618 7.68487 23.8193 5.96564 21.8992 4.7627C19.979 3.5597 17.7588 2.9219 15.4929 2.92188ZM16.3367 9.68262C15.5047 9.51713 14.6418 9.60214 13.8582 9.92676C13.0746 10.2514 12.4045 10.8007 11.9333 11.5059C11.4621 12.2111 11.2107 13.0405 11.2107 13.8887C11.2107 15.0262 11.6632 16.1176 12.4675 16.9219C13.2718 17.726 14.3625 18.1777 15.4998 18.1777C16.348 18.1777 17.1773 17.9263 17.8826 17.4551C18.5879 16.9838 19.138 16.314 19.4626 15.5303C19.7872 14.7466 19.8713 13.8837 19.7058 13.0518C19.5403 12.22 19.1317 11.4561 18.532 10.8564C17.9322 10.2567 17.1685 9.84812 16.3367 9.68262Z"
                                            fill="black" stroke="white" stroke-width="0.8" />
                                    </svg>
                                </span>
                            </a>
                        @endif
                    </div>
                    <!-- Menu Button -->
                    <button class="mi-menu-button d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
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
