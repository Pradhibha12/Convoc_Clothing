<link rel="stylesheet" href="{{ asset('assets/frontend/drinks/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/drinks/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/drinks/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/drinks/css/responsive.css') }}">

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

<!-- Logo Header -->
<header class="logo-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo-header-area">
                    <div class="logo-and-category">
                        <a href="{{ route('home') }}" class="header-logo">
                            <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                        </a>
                    </div>
                    <div class="d-flex align-items-center ">
                        <div class="mega-menu-btn-wrap d-none d-lg-block">
                            <a href="javascript:;" class="mega-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M2.03125 3.4375C1.8099 3.4375 1.62435 3.51237 1.47461 3.66211C1.32487 3.81185 1.25 3.9974 1.25 4.21875C1.25 4.4401 1.32487 4.62565 1.47461 4.77539C1.62435 4.92513 1.8099 5 2.03125 5H17.9688C18.1901 5 18.3757 4.92513 18.5254 4.77539C18.6751 4.62565 18.75 4.4401 18.75 4.21875C18.75 3.9974 18.6751 3.81185 18.5254 3.66211C18.3757 3.51237 18.1901 3.4375 17.9688 3.4375H2.03125ZM2.03125 9.21875C1.8099 9.21875 1.62435 9.29362 1.47461 9.44336C1.32487 9.5931 1.25 9.77865 1.25 10C1.25 10.2214 1.32487 10.4069 1.47461 10.5566C1.62435 10.7064 1.8099 10.7812 2.03125 10.7812H17.9688C18.1901 10.7812 18.3757 10.7064 18.5254 10.5566C18.6751 10.4069 18.75 10.2214 18.75 10C18.75 9.77865 18.6751 9.5931 18.5254 9.44336C18.3757 9.29362 18.1901 9.21875 17.9688 9.21875H2.03125ZM2.03125 15C1.8099 15 1.62435 15.0749 1.47461 15.2246C1.32487 15.3743 1.25 15.5599 1.25 15.7812C1.25 16.0026 1.32487 16.1882 1.47461 16.3379C1.62435 16.4876 1.8099 16.5625 2.03125 16.5625H17.9688C18.1901 16.5625 18.3757 16.4876 18.5254 16.3379C18.6751 16.1882 18.75 16.0026 18.75 15.7812C18.75 15.5599 18.6751 15.3743 18.5254 15.2246C18.3757 15.0749 18.1901 15 17.9688 15H2.03125Z"
                                        fill="white" />
                                </svg>
                                <span>{{ get_phrase('All categories') }}</span>
                            </a>
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)
                                    ->orderBy('sort', 'asc')
                                    ->orderBy('title', 'asc')
                                    ->get();
                            @endphp
                            <!-- Mega Menu -->
                            <div class="mega-menu-wrap container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mega-menu-inner-wrap">
                                            <div class="mega-list-ads-wrap d-flex align-items-start">
                                                <div class="mega-list-main-wrap">
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
                                                        <div class="mega-list-wrap">

                                                            <a href="{{ route('products', $category->slug) }}">
                                                                <h5 class="mega-list-title px-10px mb-12px">
                                                                    {{ $category->title }}</h5>
                                                            </a>
                                                            <ul class="mega-nav">
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
                            </div>
                            {{--  --}}

                        </div>
                        <nav class="dr-navbar d-none d-lg-block">
                            <ul class="dr-navbar-nav">
                                <li class="dr-nav-item"><a href="{{ route('home') }}"
                                        class="dr-nav-link @if ($current_route == 'home') active @endif">{{ get_phrase('Home') }}</a>
                                </li>
                                <li class="dr-nav-item"><a href="{{ route('store') }}"
                                        class="dr-nav-link @if ($current_route == 'store') active @endif">{{ get_phrase('Store') }}</a>
                                </li>
                                <li class="dr-nav-item"><a href="{{ route('events') }}"
                                        class="dr-nav-link @if ($current_route == 'events') active @endif">{{ get_phrase('Events') }}</a>
                                </li>
                                <li class="dr-nav-item"><a href="{{ route('blog') }}"
                                        class="dr-nav-link @if ($current_route == 'blog') active @endif">{{ get_phrase('Blog') }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="logo-header-right">
                        <div class="header-access-items">
                            <a href="javascript:;" class="header-access-item" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                                <span class="header-svg-link-inner" data-bs-toggle="tooltip" data-bs-title="Search"
                                    data-bs-placement="top">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M8.625 16.3125C4.3875 16.3125 0.9375 12.8625 0.9375 8.625C0.9375 4.3875 4.3875 0.9375 8.625 0.9375C12.8625 0.9375 16.3125 4.3875 16.3125 8.625C16.3125 12.8625 12.8625 16.3125 8.625 16.3125ZM8.625 2.0625C5.0025 2.0625 2.0625 5.01 2.0625 8.625C2.0625 12.24 5.0025 15.1875 8.625 15.1875C12.2475 15.1875 15.1875 12.24 15.1875 8.625C15.1875 5.01 12.2475 2.0625 8.625 2.0625Z"
                                            fill="#0D0E10" />
                                        <path
                                            d="M16.5 17.0625C16.3575 17.0625 16.215 17.01 16.1025 16.8975L13.5001 14.2951C13.2826 14.0776 13.2826 13.7176 13.5001 13.5001C13.7176 13.2826 14.0776 13.2826 14.2951 13.5001L16.8975 16.1025C17.115 16.32 17.115 16.68 16.8975 16.8975C16.785 17.01 16.6425 17.0625 16.5 17.0625Z"
                                            fill="#0D0E10" />
                                    </svg>
                                </span>
                                </span>
                            </a>
                            <a onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                                data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                aria-controls="offcanvasCart" href="javascript:;" class="header-access-item">
                                <span class="header-access-item-inner stroke position-relative" data-bs-toggle="tooltip"
                                    data-bs-title="Cart">
                                    <span
                                        class="icon-upper-badge">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <path
                                            d="M6.96997 6.39167V5.58333C6.96997 3.70833 8.4783 1.86667 10.3533 1.69167C12.5866 1.475 14.47 3.23333 14.47 5.425V6.575"
                                            stroke="#6D6D6D" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M8.22007 18.3333H13.2201C16.5701 18.3333 17.1701 16.9917 17.3451 15.3583L17.9701 10.3583C18.1951 8.325 17.6117 6.66666 14.0534 6.66666H7.38674C3.8284 6.66666 3.24507 8.325 3.47007 10.3583L4.09507 15.3583C4.27007 16.9917 4.87007 18.3333 8.22007 18.3333Z"
                                            stroke="#6D6D6D" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M13.6328 9.99999H13.6403" stroke="#6D6D6D" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.79881 9.99999H7.80629" stroke="#6D6D6D" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                            <a href="javascript:;" class="header-access-item d-none d-md-block">
                                <span class="header-access-item-inner position-relative" data-bs-toggle="tooltip"
                                    data-bs-title="Wishlist">
                                    <span
                                        class="icon-upper-badge">{{ \App\Models\Wishlist_item::where('user_id', auth()->id())->count() }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <path
                                            d="M18.6302 11.582C18.9557 11.2565 19.2324 10.9082 19.4603 10.5371C19.6882 10.166 19.8802 9.77865 20.0365 9.375C20.1667 8.9974 20.2643 8.61003 20.3294 8.21289C20.3945 7.81575 20.4206 7.42188 20.4076 7.03125C20.3945 6.6276 20.3424 6.23047 20.2513 5.83984C20.1602 5.44922 20.0299 5.0651 19.8607 4.6875C19.6784 4.29688 19.4538 3.91927 19.1868 3.55469C18.9199 3.1901 18.6107 2.85807 18.2591 2.55859C17.8294 2.19401 17.3607 1.90755 16.8529 1.69922C16.3451 1.49088 15.8242 1.36068 15.2904 1.30859C14.7565 1.25651 14.2227 1.28906 13.6888 1.40625C13.1549 1.52344 12.6471 1.72526 12.1654 2.01172L10.8568 2.77344C10.8307 2.78646 10.8079 2.79622 10.7884 2.80273C10.7689 2.80925 10.7461 2.8125 10.7201 2.8125C10.694 2.8125 10.6712 2.80925 10.6517 2.80273C10.6322 2.79622 10.6094 2.78646 10.5833 2.77344L9.27474 2.01172C8.79297 1.72526 8.28516 1.52344 7.7513 1.40625C7.21745 1.28906 6.68359 1.25651 6.14974 1.30859C5.61589 1.36068 5.09505 1.49088 4.58724 1.69922C4.07943 1.90755 3.61068 2.19401 3.18099 2.55859C2.82943 2.85807 2.52018 3.1901 2.25326 3.55469C1.98633 3.91927 1.76172 4.29688 1.57943 4.6875C1.41016 5.0651 1.27995 5.44922 1.1888 5.83984C1.09766 6.23047 1.04557 6.6276 1.03255 7.03125C1.01953 7.42188 1.04557 7.81575 1.11068 8.21289C1.17578 8.61003 1.27344 8.9974 1.40365 9.375C1.5599 9.77865 1.75195 10.166 1.97982 10.5371C2.20768 10.9082 2.48438 11.2565 2.8099 11.582L9.27474 18.1445C9.37891 18.2487 9.48633 18.3366 9.597 18.4082C9.70768 18.4798 9.82161 18.5417 9.9388 18.5938C10.069 18.6458 10.1992 18.6849 10.3294 18.7109C10.4596 18.737 10.5898 18.75 10.7201 18.75C10.8503 18.75 10.9805 18.737 11.1107 18.7109C11.2409 18.6849 11.3711 18.6458 11.5013 18.5938C11.6185 18.5417 11.7324 18.4798 11.8431 18.4082C11.9538 18.3366 12.0612 18.2487 12.1654 18.1445L18.6302 11.582ZM17.5169 10.4883L11.0521 17.0508C10.9609 17.1419 10.8503 17.1875 10.7201 17.1875C10.5898 17.1875 10.4792 17.1419 10.388 17.0508L3.92318 10.4883C3.67578 10.2279 3.46094 9.95117 3.27865 9.6582C3.09635 9.36523 2.95312 9.0625 2.84896 8.75C2.75781 8.47656 2.68945 8.19336 2.64388 7.90039C2.59831 7.60742 2.58203 7.31771 2.59505 7.03125C2.60807 6.73177 2.65039 6.4388 2.72201 6.15234C2.79362 5.86589 2.89453 5.58594 3.02474 5.3125C3.15495 5.02604 3.31771 4.74935 3.51302 4.48242C3.70833 4.2155 3.9362 3.97135 4.19661 3.75C4.79557 3.22917 5.48893 2.93294 6.27669 2.86133C7.06445 2.78971 7.80339 2.95573 8.49349 3.35938L9.80208 4.12109C9.94531 4.19922 10.0951 4.26107 10.2513 4.30664C10.4076 4.35221 10.5638 4.375 10.7201 4.375C10.8763 4.375 11.0326 4.35221 11.1888 4.30664C11.3451 4.26107 11.4948 4.19922 11.638 4.12109L12.9466 3.35938C13.6367 2.95573 14.3757 2.78971 15.1634 2.86133C15.9512 2.93294 16.6445 3.22917 17.2435 3.75C17.5039 3.97135 17.7318 4.2155 17.9271 4.48242C18.1224 4.74935 18.2852 5.02604 18.4154 5.3125C18.5456 5.58594 18.6465 5.86589 18.7181 6.15234C18.7897 6.4388 18.832 6.73177 18.8451 7.03125C18.8581 7.31771 18.8418 7.60742 18.7962 7.90039C18.7507 8.19336 18.6823 8.47656 18.5911 8.75C18.487 9.0625 18.3438 9.36523 18.1615 9.6582C17.9792 9.95117 17.7643 10.2279 17.5169 10.4883Z"
                                            fill="#6D6D6D" />
                                    </svg>
                                </span>
                            </a>

                            <!-- for login user -->
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
                                    class="header-access-item">
                                    <span class="header-access-item-inner stroke" data-bs-toggle="tooltip"
                                        data-bs-title="Login">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                            viewBox="0 0 21 20" fill="none">
                                            <path
                                                d="M10.8534 9.05833C10.77 9.05 10.67 9.05 10.5784 9.05833C8.59502 8.99166 7.02002 7.36666 7.02002 5.36666C7.02002 3.325 8.67002 1.66666 10.72 1.66666C12.7617 1.66666 14.42 3.325 14.42 5.36666C14.4117 7.36666 12.8367 8.99166 10.8534 9.05833Z"
                                                stroke="#6D6D6D" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M6.68657 12.1333C4.66991 13.4833 4.66991 15.6833 6.68657 17.025C8.97824 18.5583 12.7366 18.5583 15.0282 17.025C17.0449 15.675 17.0449 13.475 15.0282 12.1333C12.7449 10.6083 8.98657 10.6083 6.68657 12.1333Z"
                                                stroke="#6D6D6D" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            @endif
                            <button class="dr-menu-button d-block d-lg-none" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
                                aria-controls="offcanvasMenu">
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
    </div>
</header>
<!-- Menu Header -->

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
                            class="form-label modal-search-label mb-12px">{{ get_phrase('Search') }}</label>
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
