 <link rel="stylesheet" href="{{ asset('assets/frontend/watch/vendors/slick/slick.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/frontend/watch/vendors/slick/slick-theme.css') }}">

 <link rel="stylesheet" href="{{ asset('assets/frontend/watch/css/header.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/frontend/watch/css/footer.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/frontend/watch/css/style.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/frontend/watch/css/responsive.css') }}">

 <style>
     .dark-circle-badge {
         height: 16px;
         width: 16px;
     }
 </style>
 

 @php
     $current_route = Route::currentRouteName();
 @endphp


 <!-- Main Header Start -->
 <header class="wch-header-section">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="wch-header-area">
                     <a href="{{ route('home') }}" class="wch-header-logo">
                         <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="">
                     </a>
                     <div class="header-menu-right">
                         <nav class="wch-header-navbar d-none d-lg-block">
                             <ul class="wch-navbar-nav">
                                 <!-- Mega Menu Button -->
                                 <li class="wch-nav-item wch-mega-menu-btn">
                                     <a href="javascript:void(0)" class="wch-nav-link wch-mega-menu-link">
                                         <span>{{ get_phrase('Categories') }}</span>
                                         <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6"
                                             viewBox="0 0 10 6" fill="none">
                                             <path d="M9 1L5 5L1 1" stroke="#ffffffb3" stroke-width="1.2"
                                                 stroke-linecap="round" stroke-linejoin="round" />
                                         </svg>
                                     </a>
                                     @php
                                         $categories = App\Models\Category::where('parent_id', '=', 0)
                                             ->orderBy('sort', 'asc')
                                             ->orderBy('title', 'asc')
                                             ->get();
                                     @endphp
                                     <!-- Mega Menu -->
                                     <div class="wch-mega-menu-wrap">
                                         <div class="container">
                                             <div class="row">
                                                 <div class="col-12">
                                                     <div class="wch-mega-inner">
                                                         <div class="mega-banner-area">
                                                             @foreach ($categories->take(2) as $index => $category)
                                                                 @if (!empty($category->thumbnail))
                                                                     @if ($index === 0)
                                                                         <div class="mega-large-banner">
                                                                             <img class="banner"
                                                                                 src="{{ get_image($category->thumbnail) }}"
                                                                                 alt="{{ $category->title }}">
                                                                         </div>
                                                                     @else
                                                                         <div class="mega-small-banner">
                                                                             <img class="banner"
                                                                                 src="{{ get_image($category->thumbnail) }}"
                                                                                 alt="{{ $category->title }}">
                                                                         </div>
                                                                     @endif
                                                                 @endif
                                                             @endforeach
                                                         </div>
                                                         <div class="mega-nav-main ">
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
                                                                 <div class="wch-mega-nav">
                                                                     <a
                                                                         href="{{ route('products', $category->slug) }}">
                                                                         <h2 class="mega-nav-title">
                                                                             {{ $category->title }}</h2>
                                                                     </a>
                                                                     <ul class="mega-navbar-nav">
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
                                                                     </ul>
                                                                 </div>
                                                             @endforeach
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="wch-nav-item"><a class="wch-nav-link"
                                         href="{{ route('blog') }}">{{ get_phrase('Blog') }}</a></li>
                                 <li class="wch-nav-item"><a class="wch-nav-link"
                                         href="{{ route('events') }}">{{ get_phrase('Events') }}</a></li>
                             </ul>
                         </nav>
                         <form action="{{ route('filter.search') }}" method="post"
                             class="header-menu-search-form d-none d-lg-block">
                             @csrf
                             <input type="search" name="search" class="form-control header-menu-search-input"
                                 placeholder="{{ get_phrase('Search for products...') }}">
                             <button type="submit" hidden></button>
                         </form>
                         <div class="wch-header-right d-flex align-items-center gap-2">
                             <div class="wch-header-right-items">
                                 <a onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')"
                                     data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                     aria-controls="offcanvasCart" class="wch-header-right-item">
                                     <span
                                         class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle py-14px"
                                         data-bs-toggle="tooltip" data-bs-title="Cart" data-bs-placement="right">
                                         <span class="svg-block position-relative">
                                             <span class="dark-circle-badge"
                                                 id="header-cart-item-counter">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                             <svg width="27" height="24" viewBox="0 0 27 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M9.27576 19.8555C9.78556 19.8555 10.2746 20.0585 10.6351 20.4189C10.9954 20.7793 11.1985 21.2678 11.1986 21.7773C11.1986 22.11 11.1117 22.4365 10.9486 22.7246L10.8744 22.8457C10.6896 23.1222 10.4365 23.3452 10.141 23.4941L10.0111 23.5537C9.7039 23.6809 9.3698 23.7259 9.04138 23.6855L8.90076 23.6631C8.57448 23.5982 8.27161 23.4496 8.02087 23.2334L7.91638 23.1367C7.64773 22.8679 7.46513 22.5251 7.39099 22.1523C7.3262 21.8263 7.34695 21.49 7.45056 21.1758L7.50037 21.042C7.64587 20.6909 7.89234 20.3909 8.20837 20.1797C8.52439 19.9686 8.89571 19.8555 9.27576 19.8555ZM20.8314 19.8555C21.3412 19.8555 21.8303 20.0585 22.1908 20.4189C22.551 20.7793 22.7532 21.2678 22.7533 21.7773C22.7533 22.1575 22.6412 22.5296 22.4301 22.8457C22.2453 23.1222 21.9922 23.3452 21.6967 23.4941L21.5668 23.5537C21.2156 23.6991 20.8292 23.7372 20.4564 23.6631C20.0836 23.5889 19.7409 23.4055 19.472 23.1367C19.2034 22.8679 19.0208 22.5251 18.9467 22.1523C18.8819 21.8263 18.9026 21.49 19.0062 21.1758L19.056 21.042C19.2015 20.6909 19.448 20.3908 19.764 20.1797C20.0801 19.9686 20.4514 19.8555 20.8314 19.8555ZM1.72009 0.299805H3.14392L3.30017 0.306641C3.66217 0.337147 4.00946 0.469375 4.30115 0.689453C4.59278 0.909501 4.81503 1.20722 4.94373 1.54688L4.99353 1.69531L5.8031 4.52734L5.8656 4.74414H25.2758C25.397 4.74413 25.517 4.76626 25.6302 4.80762L25.7416 4.85547C25.8498 4.9101 25.9472 4.98328 26.0297 5.07129L26.1068 5.16406C26.1789 5.26163 26.2339 5.37055 26.2679 5.48633L26.2943 5.60449C26.3146 5.72384 26.3141 5.8454 26.2924 5.96387L26.264 6.08203L23.2318 15.9375L23.2308 15.9385C23.0778 16.442 22.7866 16.8907 22.392 17.2344L22.2162 17.375C21.7929 17.6876 21.2916 17.8739 20.7699 17.9141L20.5453 17.9219H9.60291C8.99214 17.9199 8.39817 17.7203 7.91052 17.3525C7.48383 17.0307 7.15853 16.5955 6.97009 16.0986L6.89783 15.8818L3.099 2.58398L3.0365 2.36621H1.72009C1.48051 2.36614 1.24955 2.28328 1.0658 2.13281L0.989624 2.06445C0.795836 1.87067 0.68689 1.60706 0.68689 1.33301L0.691772 1.23145C0.711856 1.02861 0.792104 0.836378 0.921265 0.678711L0.989624 0.602539C1.15925 0.432908 1.38187 0.328121 1.61853 0.304688L1.72009 0.299805ZM6.56384 7.19336L8.88513 15.3154C8.91853 15.4322 8.97973 15.5391 9.06287 15.626L9.15271 15.7061C9.24972 15.7791 9.36311 15.8264 9.48181 15.8457L9.60193 15.8555H20.5433C20.6627 15.8557 20.78 15.8275 20.8851 15.7734L20.9857 15.7109C21.0819 15.6401 21.1598 15.5474 21.2123 15.4414L21.2562 15.3311V15.3301L23.7572 7.19922L23.8763 6.81152H6.45447L6.56384 7.19336Z"
                                                     fill="white" stroke="#111116" stroke-width="0.6" />
                                             </svg>
                                         </span>
                                     </span>
                                 </a>
                                 <!-- Without Login -->

                                 @if (Auth::check())
                                     <!-- for login user -->
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
                                                     <img src="{{ get_image(auth()->user()->photo) }}"
                                                         alt="user">
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
                                             onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"
                                             class="svg-link header-svg-link d-flex align-items-center"
                                             data-bs-toggle="modal">
                                             <span class="svg-block header-svg-link-inner" data-bs-toggle="tooltip"
                                                 data-bs-title="Login" data-bs-placement="right">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                     height="18" viewBox="0 0 18 18" fill="none">
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
                             <!-- Menu Button -->
                             <button class="wch-menu-button d-block d-lg-none" type="button"
                                 data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
                                 aria-controls="offcanvasMenu">
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
     </div>
 </header>
 <!-- Main Header End -->
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
                                             @if (!empty($subCategories) && $subCategories->count() > 0)
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
                                             @endif
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
