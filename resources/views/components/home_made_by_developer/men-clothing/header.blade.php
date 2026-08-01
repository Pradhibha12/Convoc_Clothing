

<link rel="stylesheet" href="{{ asset('assets/frontend/men-clothing/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/men-clothing/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/men-clothing/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/men-clothing/css/responsive.css') }}">

   

@php
    $current_route = Route::currentRouteName();
@endphp

     <!-- Main Header Start -->
    <header class="mc-header-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mc-header-area">
                        <a href="{{route('home')}}" class="mc-header-logo">
                            <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                        </a>
                        <div class="header-menu-right">
                            <nav class="mc-header-navbar d-none d-lg-block">
                                <ul class="mc-navbar-nav">
                                    <!-- Mega Menu Button -->
                                    <li class="mc-nav-item mc-mega-menu-btn">
                                        <a href="javascript:void(0)" class="mc-nav-link mc-mega-menu-link">
                                            <span>{{get_phrase('Categories')}}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                                                <path d="M14.3369 7.44412L9.04255 12.7385C8.96877 12.8125 8.8811 12.8713 8.78457 12.9113C8.68804 12.9514 8.58454 12.9721 8.48002 12.9721C8.3755 12.9721 8.27201 12.9514 8.17548 12.9113C8.07895 12.8713 7.99128 12.8125 7.9175 12.7385L2.62314 7.44412C2.47395 7.29493 2.39014 7.09258 2.39014 6.8816C2.39014 6.67061 2.47395 6.46826 2.62314 6.31907C2.77233 6.16988 2.97468 6.08607 3.18567 6.08607C3.39666 6.08607 3.599 6.16988 3.74819 6.31907L8.48068 11.0516L13.2132 6.31841C13.3624 6.16922 13.5647 6.0854 13.7757 6.0854C13.9867 6.0854 14.189 6.16922 14.3382 6.31841C14.4874 6.4676 14.5712 6.66995 14.5712 6.88093C14.5712 7.09192 14.4874 7.29427 14.3382 7.44346L14.3369 7.44412Z" fill="black"/>
                                            </svg>
                                        </a>
                                        <!-- Mega Menu -->
                                        <div class="mc-mega-menu-wrap">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        @php
                                                        $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                                                      @endphp
                                                        <div class="mc-mega-inner">
                                                             @foreach ($categories->take(1) as $index => $category)
                                                                @if (!empty($category->thumbnail))
                                                                    <div class="mega-banner">
                                                                        <img class="banner" src="{{ get_image($category->thumbnail) }}" alt=""> 
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="mega-nav-main">

                                                                <div class="mega-nav-wrap flex-wrap mb-40px">
                                                                    @foreach ($categories as $category)
                                                                        @php
                                                                            $subCategories = App\Models\Category::where('parent_id', '=', $category->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                                                                        @endphp
                                                                            <div class="mc-mega-nav mega-nav-width ">
                                                                                
                                                                                <a href="{{ route('products', $category->slug) }}">
                                                                                    <h2 class="mega-nav-title">{{ $category->title }}</h2>
                                                                                </a>
                                                                                <ul class="mega-navbar-nav">
                                                                                 @if (!empty($subCategories) && $subCategories->count() > 0)
                                                                                   @foreach ($subCategories as $subCategory)
                                                                                        @php
                                                                                            $subSubCategories = App\Models\Category::where('parent_id', '=', $subCategory->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                                                                                        @endphp
                                                                                        @if($subCategories->count() > 0 && $subSubCategories->count() > 0)
                                                                                                <li class="mega-nav-item">
                                                                                                    <a href="javascript:void(0)" class="mega-nav-link mega-nav-link-have-sub">{{ $subCategory->title }}</a>
                                                                                                    <ul class="mega-nav-dropdown">
                                                                                                        @foreach ($subSubCategories as $subSubCategory)
                                                                                                            <li><a href="{{ route('products', get_category_params($subSubCategory)) }}" class="mage-nav-sublink">{{ $subSubCategory->title }}</a></li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                </li>
                                                                                            @else
                                                                                                <li class="mega-nav-item"><a href="{{ route('products', get_category_params($subCategory)) }}" class="mega-nav-link">{{ $subCategory->title }}</a></li>
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
                                        </div>
                                    </li>
                                    <li class="mc-nav-item"><a class="mc-nav-link" href="{{route('events')}}">{{get_phrase('Events')}}</a></li>
                                    <li class="mc-nav-item"><a class="mc-nav-link" href="{{route('blog')}}">{{get_phrase('Blog')}}</a></li>
                                    <li class="mc-nav-item"><a class="mc-nav-link" href="{{route('store')}}">{{get_phrase('Store')}}</a></li>
                                </ul>
                            </nav>
                            <form action="{{route('filter.search')}}" method="post" class="header-menu-search-form d-none d-lg-block">
                                @csrf
                                <input type="search" id="searchModal" class="form-control header-menu-search-input" name="search" placeholder="{{get_phrase('Search for Clothes...')}}">
                                <button type="submit" hidden></button>
                            </form>
                            <div class="mc-header-right d-flex align-items-center gap-2 gap-sm-3">
                                <div class="header-access-items">
                                    <a href="javascript:;" class="header-access-item"  data-bs-toggle="tooltip" data-bs-placement="top" title="Cart">
                                        <span class="access-item-inner position-relative header-access-item has-badge" onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')" 
                                     data-bs-toggle="offcanvas" href="#offcanvasCart" role="button" aria-controls="offcanvasCart" >
                                            <span class="dark-circle-badge" id="header-cart-item-counter">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 26 24" fill="none">
                                                <path d="M8.81348 19.8057C9.33086 19.8057 9.82784 20.0132 10.1943 20.3828C10.5606 20.7524 10.7665 21.2539 10.7666 21.7773C10.7666 22.1677 10.6523 22.5497 10.4375 22.874C10.2226 23.1984 9.91723 23.4516 9.56055 23.6006C9.20388 23.7496 8.81111 23.7878 8.43262 23.7119C8.05421 23.6359 7.70588 23.4484 7.43262 23.1729C7.15947 22.8972 6.97298 22.5459 6.89746 22.1631C6.82194 21.7802 6.86075 21.383 7.00879 21.0225C7.1569 20.6618 7.40829 20.3542 7.72949 20.1377C8.05063 19.9213 8.42768 19.8057 8.81348 19.8057ZM20.2715 19.8057C20.7887 19.8058 21.285 20.0133 21.6514 20.3828C22.0178 20.7524 22.2245 21.2538 22.2246 21.7773C22.2246 22.1678 22.1094 22.5497 21.8945 22.874C21.6796 23.1984 21.3743 23.4516 21.0176 23.6006C20.6611 23.7494 20.2689 23.7878 19.8906 23.7119C19.5121 23.636 19.164 23.4485 18.8906 23.1729C18.6174 22.8972 18.431 22.5459 18.3555 22.1631C18.2799 21.7801 18.3187 21.3831 18.4668 21.0225C18.6149 20.6619 18.8654 20.3541 19.1865 20.1377C19.5077 19.9213 19.8856 19.8057 20.2715 19.8057ZM1.32227 0.25H2.7334L2.8916 0.256836C3.25921 0.287968 3.61168 0.423783 3.9082 0.649414C4.20479 0.87512 4.43155 1.18026 4.5625 1.5293L4.6123 1.68066L5.41602 4.5127L5.4668 4.69434H24.6777C24.8451 4.69432 25.0105 4.73439 25.1602 4.81055C25.3097 4.8867 25.4402 4.99748 25.54 5.13379C25.6397 5.27006 25.7061 5.42843 25.7344 5.5957C25.7626 5.76302 25.7516 5.93451 25.7021 6.09668L22.6963 15.9521L22.6953 15.9531C22.5188 16.5394 22.1599 17.0525 21.6719 17.416C21.1839 17.7795 20.5925 17.9749 19.9863 17.9727H9.13672L8.90723 17.9619C8.37385 17.9166 7.86183 17.7207 7.43164 17.3936C7.00134 17.0663 6.67266 16.6231 6.48242 16.1172L6.41016 15.8965L2.64355 2.59863L2.5918 2.41699H1.32227C1.03868 2.41699 0.765656 2.30346 0.564453 2.10059C0.36317 1.89758 0.25 1.62101 0.25 1.33301C0.250085 1.04516 0.363291 0.769327 0.564453 0.566406C0.765665 0.363474 1.03864 0.25 1.32227 0.25ZM6.16992 7.17969L8.47168 15.3018C8.51277 15.4465 8.59986 15.574 8.71973 15.665C8.83967 15.7561 8.98604 15.8058 9.13672 15.8057H19.9854C20.1337 15.8059 20.2784 15.7583 20.3975 15.6699C20.5163 15.5816 20.6031 15.457 20.6465 15.3154L23.127 7.18359L23.2256 6.86133H6.08008L6.16992 7.17969Z" fill="black" stroke="white" stroke-width="0.5"/>
                                            </svg>
                                        </span>
                                    </a>
                                    <!-- Without Login -->
                                    
                                    <!-- Login Dropdown -->
                                     @if(Auth::check())
                                    <div class="dropdown">
                                        <button class="btn header-user-dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                @if(auth()->user()->user_type == 'admin')
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{get_phrase('Admin Dashboard')}}</a>
                                                    </li>
                                                    @else
                                                    @if(auth()->user()->is_vendor == 1)
                                                        <li>
                                                            <a href="{{ route('vendor.dashboard') }}"
                                                                class="dropdown-item @if ($current_route == 'vendor.dashboard') active @endif">{{ get_phrase('Store  Dashboard') }}</a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('customer.wishlist_items') }}" class="dropdown-item @if($current_route == 'customer.wishlist_items') active @endif">{{ get_phrase('Wishlist') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('customer.cart_items') }}" class="dropdown-item @if($current_route == 'customer.cart_items') active @endif">{{ get_phrase('Cart') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('customer.orders') }}" class="dropdown-item @if($current_route == 'customer.orders') active @endif">{{ get_phrase('Orders') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('customer.shipping_addresses') }}" class="dropdown-item @if($current_route == 'customer.shipping_addresses') active @endif">{{ get_phrase('Shipping addresses') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('customer.payments') }}" class="dropdown-item @if($current_route == 'customer.payments') active @endif">{{ get_phrase('Payments') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('customer.profile') }}" class="dropdown-item @if($current_route == 'customer.profile') active @endif">{{ get_phrase('My Profile') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('customer.account') }}" class="dropdown-item @if($current_route == 'customer.account') active @endif">{{ get_phrase('Account') }}</a>
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}">{{ get_phrase('Logout') }}</a>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                                     @else
                                         <a href="javascript:;" class="header-access-item">
                                            <span class="access-item-inner" onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"  data-bs-toggle="tooltip" data-bs-title="Login">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 0.25C15.1152 0.253528 18.1019 1.49252 20.3047 3.69531C22.5075 5.8981 23.7465 8.88479 23.75 12L23.7422 12.4346C23.6618 14.6063 22.98 16.7167 21.7695 18.5283C20.4784 20.4604 18.643 21.9662 16.4961 22.8555C14.3493 23.7446 11.9871 23.9777 9.70801 23.5244C7.42873 23.071 5.33467 21.9519 3.69141 20.3086C2.04814 18.6653 0.928962 16.5713 0.475586 14.292C0.0223242 12.0129 0.255361 9.65074 1.14453 7.50391C2.0338 5.35701 3.53958 3.52156 5.47168 2.23047C7.28333 1.01997 9.39374 0.338166 11.5654 0.257812L12 0.25ZM12 16.6377C10.9122 16.6377 9.8392 16.8944 8.86914 17.3867C7.89924 17.8791 7.05909 18.5937 6.41699 19.4717L6.26758 19.6758L6.47461 19.8232C8.08948 20.9683 10.0203 21.583 12 21.583C13.9797 21.583 15.9105 20.9683 17.5254 19.8232L17.7324 19.6758L17.583 19.4717C16.9409 18.5937 16.1008 17.8791 15.1309 17.3867C14.1608 16.8944 13.0878 16.6377 12 16.6377ZM11.9941 2.40723C10.1946 2.40728 8.4312 2.91376 6.90625 3.86914C5.38127 4.82456 4.15619 6.1903 3.37109 7.80957C2.58604 9.42877 2.27249 11.2364 2.4668 13.0254C2.66119 14.8145 3.35612 16.5129 4.4707 17.9258L4.66699 18.1748L4.86328 17.9258C5.7042 16.8562 6.77641 15.9905 7.99902 15.3936L8.31152 15.2412L8.06641 14.9932C7.30043 14.2174 6.7809 13.2323 6.57324 12.1621C6.36557 11.0917 6.479 9.98356 6.89941 8.97754C7.31983 7.97154 8.02901 7.11213 8.93652 6.50781C9.84396 5.90366 10.9098 5.58106 12 5.58105C13.0902 5.58105 14.156 5.90366 15.0635 6.50781C15.971 7.11213 16.6802 7.97155 17.1006 8.97754C17.521 9.98356 17.6344 11.0917 17.4268 12.1621C17.2191 13.2324 16.6996 14.2174 15.9336 14.9932L15.6885 15.2412L16.001 15.3936C17.1621 15.9605 18.1844 16.7724 19.0049 17.7686L18.8066 18.0215H19.8477L19.6436 17.7607C20.6842 16.3813 21.3346 14.7458 21.5215 13.0254C21.7158 11.2365 21.4032 9.42877 20.6182 7.80957C19.8331 6.19025 18.6071 4.82458 17.082 3.86914C15.5571 2.91384 13.7936 2.40723 11.9941 2.40723ZM12.6553 7.81445C12.0035 7.68489 11.3279 7.75155 10.7139 8.00586C10.0997 8.26025 9.5744 8.69141 9.20508 9.24414C8.83592 9.79679 8.63867 10.4467 8.63867 11.1113C8.63873 12.0025 8.99301 12.8571 9.62305 13.4873C10.2534 14.1176 11.1086 14.4727 12 14.4727C12.6646 14.4727 13.3145 14.2754 13.8672 13.9062C14.4199 13.5369 14.8511 13.0116 15.1055 12.3975C15.3599 11.7833 15.4266 11.1071 15.2969 10.4551C15.1672 9.80323 14.8469 9.20436 14.377 8.73438C13.9069 8.26432 13.3073 7.94414 12.6553 7.81445Z" fill="black" stroke="white" stroke-width="0.5"/>
                                                </svg>
                                            </span>
                                        </a> 
                                     @endif

                                </div>
                                <!-- Menu Button -->
                                <button class="mc-menu-button d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 5.25H3C2.59 5.25 2.25 4.91 2.25 4.5C2.25 4.09 2.59 3.75 3 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z" fill="black"></path>
                                        <path d="M21 10.25H3C2.59 10.25 2.25 9.91 2.25 9.5C2.25 9.09 2.59 8.75 3 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z" fill="black"></path>
                                        <path d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z" fill="black"></path>
                                        <path d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z" fill="black"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Header End -->
<!-- Mobile Menu Start -->
<div class="d-block d-lg-none">
    <div class="offcanvas offcanvas-start menuoffcanvas" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header menuoffcanvas-header mb-3">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body menuoffcanvas-body">
            <form action="{{route('filter.search')}}" method="post" class="mb-20px">
                @csrf
                <div class="position-relative">
                    <input type="search" name="search" class="form-control search-form-control" placeholder="Search Product...">
                    <button type="submit" class="btn search-submit-btn">
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.7544 13.3951L17.3099 16.9506" stroke="white" stroke-width="1.44431" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.31006 8.0618C1.31006 11.9892 4.49377 15.1729 8.42108 15.1729C10.3882 15.1729 12.1687 14.3742 13.456 13.0834C14.7389 11.7971 15.5321 10.0221 15.5321 8.0618C15.5321 4.13444 12.3484 0.950684 8.42108 0.950684C4.49377 0.950684 1.31006 4.13444 1.31006 8.0618Z" stroke="white" stroke-width="1.44431" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>
            <nav class="mb-40px">
                <ul class="d-flex flex-column gap-30px mobile-menu-ul">
                    <li>
                        <a href="{{route('home')}}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.3701 6.25171L13.09 2.55754C11.6509 1.54921 9.44172 1.60421 8.05755 2.67671L3.46505 6.26088C2.54839 6.97588 1.82422 8.44255 1.82422 9.59755V15.9225C1.82422 18.26 3.72172 20.1667 6.05922 20.1667H15.9409C18.2784 20.1667 20.1759 18.2692 20.1759 15.9317V9.71671C20.1759 8.47921 19.3784 6.95755 18.3701 6.25171ZM11.6876 16.5C11.6876 16.8759 11.3759 17.1875 11.0001 17.1875C10.6242 17.1875 10.3126 16.8759 10.3126 16.5V13.75C10.3126 13.3742 10.6242 13.0625 11.0001 13.0625C11.3759 13.0625 11.6876 13.3742 11.6876 13.75V16.5Z" fill="#000000"/>
                            </svg>          
                            <span class="text">{{get_phrase('Home')}}</span>                              
                        </a>
                    </li>
                    <li class="mobile-menuitem-have-sub active-mobile-submenu">
                        <a href="javascript:void(0)" class="d-flex gap-2 mobile-menuitem-a mobile-menuitem-a-have-sub">
                             <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.5258 7.16816L11.4675 11.2565C11.1833 11.4215 10.8258 11.4215 10.5325 11.2565L3.47412 7.16816C2.96995 6.87482 2.84162 6.18732 3.22662 5.75649C3.49245 5.45399 3.79495 5.20649 4.11579 5.03232L9.08412 2.28232C10.1475 1.68649 11.8708 1.68649 12.9341 2.28232L17.9025 5.03232C18.2233 5.20649 18.5258 5.46316 18.7916 5.75649C19.1583 6.18732 19.03 6.87482 18.5258 7.16816Z" fill="#000000"/>
                                <path d="M10.4775 12.9615V19.2131C10.4775 19.9098 9.77169 20.3681 9.14836 20.0656C7.26002 19.1398 4.07919 17.4073 4.07919 17.4073C2.96086 16.7748 2.04419 15.1798 2.04419 13.869V9.13898C2.04419 8.41481 2.80502 7.95647 3.42836 8.31397L10.0192 12.1365C10.2942 12.3106 10.4775 12.6223 10.4775 12.9615Z" fill="#000000"/>
                                <path d="M11.5225 12.9615V19.2131C11.5225 19.9098 12.2283 20.3681 12.8516 20.0656C14.74 19.1398 17.9208 17.4073 17.9208 17.4073C19.0391 16.7748 19.9558 15.1798 19.9558 13.869V9.13898C19.9558 8.41481 19.195 7.95647 18.5716 8.31397L11.9808 12.1365C11.7058 12.3106 11.5225 12.6223 11.5225 12.9615Z" fill="#000000"/>
                            </svg>
                            <span class="text">{{ get_phrase('Categories') }}</span>  
                             <span class="arrow ms-auto">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z" fill="black"/>
                                    </svg>
                                </span>                      
                        </a>

                            <ul class="mobile-dropdown-menu" style="display: block">
                                @foreach ($categories as $category)
                                    @php
                                        $subCategories = App\Models\Category::where('parent_id', $category->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                                    @endphp
                                    @if($subCategories->count() > 0)
                                        <li class="mobile-dropitem-have-sub">
                                            <a href="javascript:void(0)" class="mobile-menuitem-a mobile-dropitem-a-have-sub">
                                               <span class="text"> {{ $category->title }}</span>
                                               <span class="arrow ms-auto">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z" fill="black"/>
                                                </svg>
                                            </span> 
                                            </a>
                                            <ul class="mobile-subdrop-menu">
                                                @foreach ($subCategories as $subCategory)
                                                    @php
                                                        $subSubCategories = App\Models\Category::where('parent_id', $subCategory->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                                                    @endphp
                                                    @if($subSubCategories->count() > 0)
                                                        <li class="mobile-dropitem-have-sub">
                                                            <a href="javascript:void(0)" class="mobile-menuitem-a mobile-dropitem-a-have-sub">
                                                                {{ $subCategory->title }}
                                                              <span class="arrow ms-auto">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.47357 3.52745C6.41108 3.58943 6.36148 3.66316 6.32764 3.7444C6.29379 3.82564 6.27637 3.91278 6.27637 4.00079C6.27637 4.08879 6.29379 4.17593 6.32764 4.25717C6.36148 4.33841 6.41108 4.41214 6.47357 4.47412L9.5269 7.52745C9.58938 7.58943 9.63898 7.66316 9.67283 7.7444C9.70667 7.82564 9.7241 7.91278 9.7241 8.00078C9.7241 8.08879 9.70667 8.17593 9.67283 8.25717C9.63898 8.33841 9.58938 8.41214 9.5269 8.47412L6.47357 11.5274C6.41108 11.5894 6.36148 11.6631 6.32764 11.7444C6.29379 11.8256 6.27637 11.9128 6.27637 12.0008C6.27637 12.0888 6.29379 12.1759 6.32764 12.2572C6.36148 12.3384 6.41108 12.4121 6.47357 12.4741C6.59847 12.5983 6.76744 12.668 6.94357 12.668C7.11969 12.668 7.28866 12.5983 7.41357 12.4741L10.4736 9.41412C10.8481 9.03912 11.0585 8.53079 11.0585 8.00078C11.0585 7.47078 10.8481 6.96245 10.4736 6.58745L7.41357 3.52745C7.28866 3.40329 7.11969 3.33359 6.94357 3.33359C6.76744 3.33359 6.59847 3.40329 6.47357 3.52745Z" fill="black"/>
                                                                </svg>
                                                            </span>    
                                                            </a>
                                                            <ul class="mobile-subdrop-menu">
                                                                @foreach ($subSubCategories as $subSubCategory)
                                                                    <li>
                                                                        <a href="{{ route('products', get_category_params($subSubCategory)) }}" class="mobile-menuitem-a">
                                                                            {{ $subSubCategory->title }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('products', get_category_params($subCategory)) }}" class="mobile-menuitem-a">
                                                                {{ $subCategory->title }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('products', get_category_params($category)) }}" class="mobile-menuitem-a">
                                                {{ $category->title }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                    </li>
                    <li>
                        <a href="{{route('store')}}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.1776 7.97498L14.0251 3.82248C13.1542 2.95165 11.9534 2.48415 10.7251 2.54832L6.14173 2.76832C4.30839 2.85082 2.85089 4.30832 2.75923 6.13248L2.53923 10.7158C2.48423 11.9442 2.94256 13.145 3.81339 14.0158L7.96589 18.1683C9.67089 19.8733 12.4392 19.8733 14.1534 18.1683L18.1776 14.1442C19.8917 12.4483 19.8917 9.67998 18.1776 7.97498ZM8.70839 11.3483C7.26006 11.3483 6.06839 10.1658 6.06839 8.70832C6.06839 7.25082 7.26006 6.06832 8.70839 6.06832C10.1567 6.06832 11.3484 7.25082 11.3484 8.70832C11.3484 10.1658 10.1567 11.3483 8.70839 11.3483ZM16.0692 12.4025L12.4026 16.0692C12.2651 16.2067 12.0909 16.2708 11.9167 16.2708C11.7426 16.2708 11.5684 16.2067 11.4309 16.0692C11.1651 15.8033 11.1651 15.3633 11.4309 15.0975L15.0976 11.4308C15.3634 11.165 15.8034 11.165 16.0692 11.4308C16.3351 11.6967 16.3351 12.1367 16.0692 12.4025Z" fill="#000000"/>
                            </svg>                                   
                            <span class="text">{{get_phrase('Store')}}</span>                              
                        </a>
                    </li>
                    <li>
                        <a href="{{route('events')}}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.4833 2.02579C14.1075 1.64995 13.4567 1.90662 13.4567 2.42912V5.62829C13.4567 6.96662 14.5933 8.07579 15.9775 8.07579C16.8483 8.08495 18.0583 8.08495 19.0942 8.08495C19.6167 8.08495 19.8917 7.47079 19.525 7.10412C18.205 5.77495 15.84 3.38245 14.4833 2.02579Z" fill="#000000"/>
                                <path d="M18.7916 9.34099H16.1425C13.97 9.34099 12.2008 7.57183 12.2008 5.39933V2.75016C12.2008 2.246 11.7883 1.8335 11.2841 1.8335H7.39746C4.57413 1.8335 2.29163 3.66683 2.29163 6.93933V15.061C2.29163 18.3335 4.57413 20.1668 7.39746 20.1668H14.6025C17.4258 20.1668 19.7083 18.3335 19.7083 15.061V10.2577C19.7083 9.75349 19.2958 9.34099 18.7916 9.34099ZM10.5416 16.271H6.87496C6.49913 16.271 6.18746 15.9593 6.18746 15.5835C6.18746 15.2077 6.49913 14.896 6.87496 14.896H10.5416C10.9175 14.896 11.2291 15.2077 11.2291 15.5835C11.2291 15.9593 10.9175 16.271 10.5416 16.271ZM12.375 12.6043H6.87496C6.49913 12.6043 6.18746 12.2927 6.18746 11.9168C6.18746 11.541 6.49913 11.2293 6.87496 11.2293H12.375C12.7508 11.2293 13.0625 11.541 13.0625 11.9168C13.0625 12.2927 12.7508 12.6043 12.375 12.6043Z" fill="#000000"/>
                            </svg>                              
                            <span class="text">{{get_phrase('Events')}}</span>                              
                        </a>
                    </li>
                    <li>
                        <a href="{{route('blog')}}" class="d-flex gap-2 mobile-menuitem-a">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.8333 12.146H9.16663C8.79079 12.146 8.47913 12.4577 8.47913 12.8335C8.47913 13.2093 8.79079 13.521 9.16663 13.521H12.8333C13.2091 13.521 13.5208 13.2093 13.5208 12.8335C13.5208 12.4577 13.2091 12.146 12.8333 12.146Z" fill="#000000"/>
                                <path d="M9.16663 9.854H11C11.3758 9.854 11.6875 9.54234 11.6875 9.1665C11.6875 8.79067 11.3758 8.479 11 8.479H9.16663C8.79079 8.479 8.47913 8.79067 8.47913 9.1665C8.47913 9.54234 8.79079 9.854 9.16663 9.854Z" fill="#000000"/>
                                <path d="M14.8409 1.8335H7.16836C3.83169 1.8335 1.84253 3.82266 1.84253 7.15933V14.8318C1.84253 18.1685 3.83169 20.1577 7.16836 20.1577H14.8409C18.1775 20.1577 20.1667 18.1685 20.1667 14.8318V7.15933C20.1667 3.82266 18.1775 1.8335 14.8409 1.8335ZM16.5 13.7502C16.5 15.5835 15.5834 16.5002 13.75 16.5002H8.25002C6.41669 16.5002 5.50002 15.5835 5.50002 13.7502V8.25016C5.50002 6.41683 6.41669 5.50016 8.25002 5.50016H11.9167C13.75 5.50016 14.6667 6.41683 14.6667 8.25016V9.16683C14.6667 9.671 15.0792 10.0835 15.5834 10.0835C16.0875 10.0835 16.5 10.496 16.5 11.0002V13.7502Z" fill="#000000"/>
                            </svg>                                      
                            <span class="text">{{get_phrase('Blog')}}</span>                              
                        </a>
                    </li>
                </ul>
            </nav>
            
        </div>
    </div>
</div>
<!-- Mobile Menu End -->