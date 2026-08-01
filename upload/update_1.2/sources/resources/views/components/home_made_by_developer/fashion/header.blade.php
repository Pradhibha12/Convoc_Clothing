{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}} 
 
 <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/header.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/footer.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/responsive.css') }}">

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

 <!-- Logo Header Area Start -->
 <header class="logo-header">
     <div class="container">
         <div class="row justify-content-between align-items-center">
             <div class="col-auto col-lg order-2 order-lg-1">
                 <a href="{{ route('home') }}" class="header-logo">
                     <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                 </a>
             </div>
             <div class="col-auto col-lg-6 order-1 order-lg-2">
                 <div class="d-lg-flex justify-content-center d-none">
                     <nav>
                         <ul class="header-menu-ul">
                             <li class="header-menuitem-have-sub">
                                 <a href="{{ route('home') }}" class="header-menuitem-a header-menuitem-a-have-sub @if ($current_route == 'home') active @endif">
                                     <span>{{ get_phrase('Home') }}</span>
                                 </a>
                             </li>
                             <li class="mega-menu-btn-wrap">
                                 <a href="javascript:void(0)" class="header-menuitem-a mega-menu-btn">
                                     <span>{{ get_phrase('Categories') }}</span>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                                         <path d="M12.4734 6.47332C12.4114 6.41084 12.3376 6.36124 12.2564 6.32739C12.1752 6.29355 12.088 6.27612 12 6.27612C11.912 6.27612 11.8249 6.29355 11.7436 6.32739C11.6624 6.36124 11.5887 6.41084 11.5267 6.47332L8.47335 9.52666C8.41138 9.58914 8.33764 9.63874 8.2564 9.67258C8.17516 9.70643 8.08803 9.72385 8.00002 9.72385C7.91201 9.72385 7.82487 9.70643 7.74363 9.67258C7.66239 9.63874 7.58866 9.58914 7.52669 9.52666L4.47335 6.47332C4.41138 6.41084 4.33764 6.36124 4.2564 6.32739C4.17516 6.29355 4.08803 6.27612 4.00002 6.27612C3.91201 6.27612 3.82487 6.29355 3.74364 6.32739C3.6624 6.36124 3.58866 6.41084 3.52669 6.47332C3.40252 6.59823 3.33282 6.7672 3.33282 6.94332C3.33282 7.11945 3.40252 7.28841 3.52669 7.41332L6.58669 10.4733C6.96169 10.8479 7.47002 11.0582 8.00002 11.0582C8.53002 11.0582 9.03835 10.8479 9.41335 10.4733L12.4734 7.41332C12.5975 7.28841 12.6672 7.11945 12.6672 6.94332C12.6672 6.7672 12.5975 6.59823 12.4734 6.47332Z" fill="#0D0E10"></path>
                                     </svg>
                                 </a>
                                 @php
                                     $categories = App\Models\Category::where('parent_id', '=', 0)
                                         ->orderBy('sort', 'asc')
                                         ->orderBy('title', 'asc')
                                         ->get();
                                 @endphp
                                 <!-- Mega Menu -->
                                 <div class="container mega-menu-wrap">
                                     <div class="row">
                                         <div class="col-12">
                                             <div class="mega-menu-inner-wrap">
                                                 <div class="mega-list-ads-wrap d-flex gap-3 align-items-start">
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
                                                                     <h5 class="al-title-16px px-10px mb-12px">
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
                                                                                     <a href="javascript:void(0)" class="mega-nav-link mega-nav-link-have-sub">{{ $subCategory->title }}</a>
                                                                                     <ul class="mega-nav-dropdown">
                                                                                         @foreach ($subSubCategories as $subSubCategory)
                                                                                             <li><a href="{{ route('products', get_category_params($subSubCategory)) }}" class="mage-nav-sublink">{{ $subSubCategory->title }}</a>
                                                                                             </li>
                                                                                         @endforeach
                                                                                     </ul>
                                                                                 </li>
                                                                             @else
                                                                                 <li class="mega-nav-item"><a href="{{ route('products', get_category_params($subCategory)) }}" class="mega-nav-link">{{ $subCategory->title }}</a>
                                                                                 </li>
                                                                             @endif
                                                                         @endforeach
                                                                     @endif
                                                                 </ul>
                                                             </div>
                                                         @endforeach
                                                     </div>
                                                     <div class="mega-ads-wrap">
                                                         @foreach ($categories->take(1) as $index => $category)
                                                             @if (!empty($category->thumbnail))
                                                                 @if ($index === 0)
                                                                     <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="{{ $category->title }}">
                                                                 @endif
                                                             @endif
                                                         @endforeach
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li><a href="{{ route('store') }}" class="header-menuitem-a @if ($current_route == 'store') active @endif">{{ get_phrase('Store') }}</a>
                             </li>
                             <li><a href="{{ route('events') }}" class="header-menuitem-a @if ($current_route == 'event') active @endif">{{ get_phrase('Events') }}</a>
                             </li>
                             <li><a href="{{ route('blog') }}" class="header-menuitem-a @if ($current_route == 'blog') active @endif">{{ get_phrase('Blog') }}</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
                 <div class="d-block d-lg-none">
                     <button class="menu-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                             <path d="M21 5.25H3C2.59 5.25 2.25 4.91 2.25 4.5C2.25 4.09 2.59 3.75 3 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z" fill="#0F1311"></path>
                             <path d="M21 10.25H3C2.59 10.25 2.25 9.91 2.25 9.5C2.25 9.09 2.59 8.75 3 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z" fill="#0F1311"></path>
                             <path d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z" fill="#0F1311"></path>
                             <path d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z" fill="#0F1311"></path>
                         </svg>
                     </button>
                 </div>
             </div>
             <div class="col-auto col-lg order-3">
                 <div class="d-flex align-items-center gap-4 justify-content-end">
                     <button type="button" class="search-modal-btn d-none d-lg-block svg-link header-svg-link d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#searchModal">
                         <span class="header-svg-link-inner" data-bs-toggle="tooltip" data-bs-title="Search" data-bs-placement="bottom">
                             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 18 18" fill="none">
                                 <path d="M8.625 16.3125C4.3875 16.3125 0.9375 12.8625 0.9375 8.625C0.9375 4.3875 4.3875 0.9375 8.625 0.9375C12.8625 0.9375 16.3125 4.3875 16.3125 8.625C16.3125 12.8625 12.8625 16.3125 8.625 16.3125ZM8.625 2.0625C5.0025 2.0625 2.0625 5.01 2.0625 8.625C2.0625 12.24 5.0025 15.1875 8.625 15.1875C12.2475 15.1875 15.1875 12.24 15.1875 8.625C15.1875 5.01 12.2475 2.0625 8.625 2.0625Z" fill="#0D0E10"></path>
                                 <path d="M16.5 17.0625C16.3575 17.0625 16.215 17.01 16.1025 16.8975L13.5001 14.2951C13.2826 14.0776 13.2826 13.7176 13.5001 13.5001C13.7176 13.2826 14.0776 13.2826 14.2951 13.5001L16.8975 16.1025C17.115 16.32 17.115 16.68 16.8975 16.8975C16.785 17.01 16.6425 17.0625 16.5 17.0625Z" fill="#0D0E10"></path>
                             </svg>
                         </span>
                     </button>
                     <div class="d-flex align-items-center gap-3 justify-content-end">
                         @if (Auth::check())
                             <!-- for login user -->
                             <div class="dropdown order-3">
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
                                         <h4 class="al-title-14px fw-semibold">{{ auth()->user()->name }}</h4>
                                     </div>
                                     <ul>
                                         @if (auth()->user()->user_type == 'admin')
                                             <li>
                                                 <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ get_phrase('Admin Dashboard') }}</a>
                                             </li>
                                         @else
                                            @if(auth()->user()->is_vendor == 1)
                                            <li>
                                                <a href="{{ route('vendor.dashboard') }}"
                                                    class="dropdown-item @if ($current_route == 'vendor.dashboard') active @endif">{{ get_phrase('Store  Dashboard') }}</a>
                                            </li>
                                            @endif
                                             <li>
                                                 <a href="{{ route('customer.wishlist_items') }}" class="dropdown-item @if ($current_route == 'customer.wishlist_items') active @endif">{{ get_phrase('Wishlist') }}</a>
                                             </li>
                                             <li>
                                                 <a href="{{ route('customer.cart_items') }}" class="dropdown-item @if ($current_route == 'customer.cart_items') active @endif">{{ get_phrase('Cart') }}</a>
                                             </li>
                                             <li>
                                                 <a href="{{ route('customer.orders') }}" class="dropdown-item @if ($current_route == 'customer.orders') active @endif">{{ get_phrase('Orders') }}</a>
                                             </li>
                                             <li>
                                                 <a href="{{ route('customer.shipping_addresses') }}" class="dropdown-item @if ($current_route == 'customer.shipping_addresses') active @endif">{{ get_phrase('Shipping addresses') }}</a>
                                             </li>
                                             <li>
                                                 <a href="{{ route('customer.payments') }}" class="dropdown-item @if ($current_route == 'customer.payments') active @endif">{{ get_phrase('Payments') }}</a>
                                             </li>
                                             <li>
                                                 <a href="{{ route('customer.profile') }}" class="dropdown-item @if ($current_route == 'customer.profile') active @endif">{{ get_phrase('My Profile') }}</a>
                                             </li>
                                             <li>
                                                 <a href="{{ route('customer.account') }}" class="dropdown-item @if ($current_route == 'customer.account') active @endif">{{ get_phrase('Account') }}</a>
                                             </li>
                                         @endif
                                         <li>
                                             <a class="dropdown-item" href="{{ route('logout') }}">{{ get_phrase('Logout') }}</a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         @else
                             <!-- without login -->
                             <div class="">
                                 <a href="javascript:;" onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')" class="svg-link header-svg-link d-flex align-items-center" data-bs-toggle="modal">
                                     <span class="svg-block header-svg-link-inner" data-bs-toggle="tooltip" data-bs-title="Login" data-bs-placement="bottom">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 18 18" fill="none">
                                             <path d="M9 9.5625C6.6225 9.5625 4.6875 7.6275 4.6875 5.25C4.6875 2.8725 6.6225 0.9375 9 0.9375C11.3775 0.9375 13.3125 2.8725 13.3125 5.25C13.3125 7.6275 11.3775 9.5625 9 9.5625ZM9 2.0625C7.245 2.0625 5.8125 3.495 5.8125 5.25C5.8125 7.005 7.245 8.4375 9 8.4375C10.755 8.4375 12.1875 7.005 12.1875 5.25C12.1875 3.495 10.755 2.0625 9 2.0625Z" fill="#0D0E10"></path>
                                             <path d="M15.4426 17.0625C15.1351 17.0625 14.8801 16.8075 14.8801 16.5C14.8801 13.9125 12.2401 11.8125 9.00011 11.8125C5.76011 11.8125 3.12012 13.9125 3.12012 16.5C3.12012 16.8075 2.86512 17.0625 2.55762 17.0625C2.25012 17.0625 1.99512 16.8075 1.99512 16.5C1.99512 13.2975 5.13761 10.6875 9.00011 10.6875C12.8626 10.6875 16.0051 13.2975 16.0051 16.5C16.0051 16.8075 15.7501 17.0625 15.4426 17.0625Z" fill="#0D0E10"></path>
                                         </svg>
                                     </span>
                                 </a>
                             </div>
                         @endif
                         <div class="d-none d-lg-block">
                             <a href="javascript:void(0)" class="svg-link header-svg-link d-flex align-items-center">
                                 <span class="header-svg-link-inner" data-bs-toggle="tooltip" data-bs-title="{{ get_phrase('Wishlist') }}" data-bs-placement="bottom">
                                     <span class="svg-block position-relative">
                                         <span class="dark-circle-badge">{{ \App\Models\Wishlist_item::where('user_id', auth()->id())->count() }}</span>
                                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 18 18" fill="none">
                                             <path d="M9 16.2375C8.7675 16.2375 8.5425 16.2075 8.355 16.14C5.49 15.1575 0.9375 11.67 0.9375 6.51745C0.9375 3.89245 3.06 1.76245 5.67 1.76245C6.9375 1.76245 8.1225 2.25745 9 3.14245C9.8775 2.25745 11.0625 1.76245 12.33 1.76245C14.94 1.76245 17.0625 3.89995 17.0625 6.51745C17.0625 11.6775 12.51 15.1575 9.645 16.14C9.4575 16.2075 9.2325 16.2375 9 16.2375ZM5.67 2.88745C3.6825 2.88745 2.0625 4.51495 2.0625 6.51745C2.0625 11.64 6.99 14.49 8.7225 15.0825C8.8575 15.1275 9.15 15.1275 9.285 15.0825C11.01 14.49 15.945 11.6475 15.945 6.51745C15.945 4.51495 14.325 2.88745 12.3375 2.88745C11.1975 2.88745 10.14 3.41995 9.4575 4.34245C9.2475 4.62745 8.7675 4.62745 8.5575 4.34245C7.86 3.41245 6.81 2.88745 5.67 2.88745Z" fill="#0D0E10"></path>
                                         </svg>
                                     </span>
                                 </span>
                             </a>
                         </div>
                         <a onclick="load_view('{{ route('view', ['path' => 'frontend.cart.offcanvas_cart_body']) }}', '#offcanvasCart')" data-bs-toggle="offcanvas" href="#offcanvasCart" role="button" aria-controls="offcanvasCart" class="svg-link header-svg-link d-flex align-items-center">
                             <span class="header-svg-link-inner" data-bs-toggle="tooltip" data-bs-title="Cart" data-bs-placement="bottom">
                                 <span class="svg-block position-relative">
                                     <span class="dark-circle-badge" id="header-cart-item-counter">{{ \App\Models\Cart_item::where('user_id', auth()->id())->count() }}</span>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 18 18" fill="none">
                                         <path d="M12.3673 17.0625H5.62483C4.33483 17.0625 3.36733 16.7175 2.76733 16.035C2.16733 15.3525 1.93482 14.3625 2.09232 13.08L2.76733 7.455C2.96233 5.7975 3.38233 4.3125 6.30733 4.3125H11.7073C14.6248 4.3125 15.0448 5.7975 15.2473 7.455L15.9223 13.08C16.0723 14.3625 15.8473 15.36 15.2473 16.035C14.6248 16.7175 13.6648 17.0625 12.3673 17.0625ZM6.29982 5.4375C4.13982 5.4375 4.03483 6.29249 3.87733 7.58249L3.20233 13.2075C3.08983 14.16 3.22483 14.8575 3.60733 15.285C3.98983 15.7125 4.66483 15.93 5.62483 15.93H12.3673C13.3273 15.93 14.0023 15.7125 14.3848 15.285C14.7673 14.8575 14.9023 14.16 14.7898 13.2075L14.1148 7.58249C13.9573 6.28499 13.8598 5.4375 11.6923 5.4375H6.29982Z" fill="#0D0E10"></path>
                                         <path d="M12 6.5625C11.6925 6.5625 11.4375 6.3075 11.4375 6V3.375C11.4375 2.565 10.935 2.0625 10.125 2.0625H7.875C7.065 2.0625 6.5625 2.565 6.5625 3.375V6C6.5625 6.3075 6.3075 6.5625 6 6.5625C5.6925 6.5625 5.4375 6.3075 5.4375 6V3.375C5.4375 1.9425 6.4425 0.9375 7.875 0.9375H10.125C11.5575 0.9375 12.5625 1.9425 12.5625 3.375V6C12.5625 6.3075 12.3075 6.5625 12 6.5625Z" fill="#0D0E10"></path>
                                     </svg>
                                 </span>
                             </span>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- Logo Header Area End -->

 <!-- Mobile Menu Start -->
 <div class="d-block d-lg-none">
     <div class="offcanvas offcanvas-start menuoffcanvas" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
         <div class="offcanvas-header menuoffcanvas-header mb-3">
             <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body menuoffcanvas-body">

             <form action="{{ route('filter.search') }}" method="post" class="mb-20px">
                 @csrf
                 <div class="position-relative">
                     <input type="search" class="form-control search-form-control" name="search" placeholder="Search Product...">
                     <button type="submit" class="btn search-submit-btn">
                         <svg width="19" height="18" viewbox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M13.7544 13.3951L17.3099 16.9506" stroke="white" stroke-width="1.44431" stroke-linecap="round" stroke-linejoin="round"></path>
                             <path d="M1.31006 8.0618C1.31006 11.9892 4.49377 15.1729 8.42108 15.1729C10.3882 15.1729 12.1687 14.3742 13.456 13.0834C14.7389 11.7971 15.5321 10.0221 15.5321 8.0618C15.5321 4.13444 12.3484 0.950684 8.42108 0.950684C4.49377 0.950684 1.31006 4.13444 1.31006 8.0618Z" stroke="white" stroke-width="1.44431" stroke-linecap="round" stroke-linejoin="round"></path>
                         </svg>
                     </button>
                 </div>
             </form>
             <nav class="mb-40px">
                 <ul class="d-flex flex-column gap-30px mobile-menu-ul">
                     <li>
                         <a href="{{ route('home') }}" class="d-flex gap-2 mobile-menuitem-a">
                             <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M18.3701 6.25171L13.09 2.55754C11.6509 1.54921 9.44172 1.60421 8.05755 2.67671L3.46505 6.26088C2.54839 6.97588 1.82422 8.44255 1.82422 9.59755V15.9225C1.82422 18.26 3.72172 20.1667 6.05922 20.1667H15.9409C18.2784 20.1667 20.1759 18.2692 20.1759 15.9317V9.71671C20.1759 8.47921 19.3784 6.95755 18.3701 6.25171ZM11.6876 16.5C11.6876 16.8759 11.3759 17.1875 11.0001 17.1875C10.6242 17.1875 10.3126 16.8759 10.3126 16.5V13.75C10.3126 13.3742 10.6242 13.0625 11.0001 13.0625C11.3759 13.0625 11.6876 13.3742 11.6876 13.75V16.5Z" fill="#000000"></path>
                             </svg>
                             <span class="text">{{ get_phrase('Home') }}</span>
                         </a>
                     </li>
                     <li class="mobile-menuitem-have-sub active-mobile-submenu">
                         <a href="javascript:void(0)" class="d-flex gap-2 mobile-menuitem-a mobile-menuitem-a-have-sub">
                             <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M18.5258 7.16816L11.4675 11.2565C11.1833 11.4215 10.8258 11.4215 10.5325 11.2565L3.47412 7.16816C2.96995 6.87482 2.84162 6.18732 3.22662 5.75649C3.49245 5.45399 3.79495 5.20649 4.11579 5.03232L9.08412 2.28232C10.1475 1.68649 11.8708 1.68649 12.9341 2.28232L17.9025 5.03232C18.2233 5.20649 18.5258 5.46316 18.7916 5.75649C19.1583 6.18732 19.03 6.87482 18.5258 7.16816Z" fill="#000000"></path>
                                 <path d="M10.4775 12.9615V19.2131C10.4775 19.9098 9.77169 20.3681 9.14836 20.0656C7.26002 19.1398 4.07919 17.4073 4.07919 17.4073C2.96086 16.7748 2.04419 15.1798 2.04419 13.869V9.13898C2.04419 8.41481 2.80502 7.95647 3.42836 8.31397L10.0192 12.1365C10.2942 12.3106 10.4775 12.6223 10.4775 12.9615Z" fill="#000000"></path>
                                 <path d="M11.5225 12.9615V19.2131C11.5225 19.9098 12.2283 20.3681 12.8516 20.0656C14.74 19.1398 17.9208 17.4073 17.9208 17.4073C19.0391 16.7748 19.9558 15.1798 19.9558 13.869V9.13898C19.9558 8.41481 19.195 7.95647 18.5716 8.31397L11.9808 12.1365C11.7058 12.3106 11.5225 12.6223 11.5225 12.9615Z" fill="#000000"></path>
                             </svg>
                             <span class="text">{{ get_phrase('Categories') }}</span>

                         </a>

                         <ul class="mobile-dropdown-menu ">
                             @foreach ($categories as $category)
                                 @php
                                     $subCategories = App\Models\Category::where('parent_id', $category->id)
                                         ->orderBy('sort', 'asc')
                                         ->orderBy('title', 'asc')
                                         ->get();
                                 @endphp
                                 @if ($subCategories->count() > 0)
                                     <li class="mobile-dropitem-have-sub">
                                         <a href="javascript:void(0)" class="mobile-menuitem-a mobile-dropitem-a-have-sub">
                                             <span class="text"> {{ $category->title }}</span>

                                         </a>
                                         <ul class="mobile-subdrop-menu ">
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
                                                         <a href="javascript:void(0)" class="mobile-menuitem-a mobile-dropitem-a-have-sub">
                                                             {{ $subCategory->title }}

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
                         <a href="{{ route('store') }}" class="d-flex gap-2 mobile-menuitem-a">
                             <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M18.1776 7.97498L14.0251 3.82248C13.1542 2.95165 11.9534 2.48415 10.7251 2.54832L6.14173 2.76832C4.30839 2.85082 2.85089 4.30832 2.75923 6.13248L2.53923 10.7158C2.48423 11.9442 2.94256 13.145 3.81339 14.0158L7.96589 18.1683C9.67089 19.8733 12.4392 19.8733 14.1534 18.1683L18.1776 14.1442C19.8917 12.4483 19.8917 9.67998 18.1776 7.97498ZM8.70839 11.3483C7.26006 11.3483 6.06839 10.1658 6.06839 8.70832C6.06839 7.25082 7.26006 6.06832 8.70839 6.06832C10.1567 6.06832 11.3484 7.25082 11.3484 8.70832C11.3484 10.1658 10.1567 11.3483 8.70839 11.3483ZM16.0692 12.4025L12.4026 16.0692C12.2651 16.2067 12.0909 16.2708 11.9167 16.2708C11.7426 16.2708 11.5684 16.2067 11.4309 16.0692C11.1651 15.8033 11.1651 15.3633 11.4309 15.0975L15.0976 11.4308C15.3634 11.165 15.8034 11.165 16.0692 11.4308C16.3351 11.6967 16.3351 12.1367 16.0692 12.4025Z" fill="#000000"></path>
                             </svg>
                             <span class="text">{{ get_phrase('Store') }}</span>
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('events') }}" class="d-flex gap-2 mobile-menuitem-a">
                             <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M14.4833 2.02579C14.1075 1.64995 13.4567 1.90662 13.4567 2.42912V5.62829C13.4567 6.96662 14.5933 8.07579 15.9775 8.07579C16.8483 8.08495 18.0583 8.08495 19.0942 8.08495C19.6167 8.08495 19.8917 7.47079 19.525 7.10412C18.205 5.77495 15.84 3.38245 14.4833 2.02579Z" fill="#000000"></path>
                                 <path d="M18.7916 9.34099H16.1425C13.97 9.34099 12.2008 7.57183 12.2008 5.39933V2.75016C12.2008 2.246 11.7883 1.8335 11.2841 1.8335H7.39746C4.57413 1.8335 2.29163 3.66683 2.29163 6.93933V15.061C2.29163 18.3335 4.57413 20.1668 7.39746 20.1668H14.6025C17.4258 20.1668 19.7083 18.3335 19.7083 15.061V10.2577C19.7083 9.75349 19.2958 9.34099 18.7916 9.34099ZM10.5416 16.271H6.87496C6.49913 16.271 6.18746 15.9593 6.18746 15.5835C6.18746 15.2077 6.49913 14.896 6.87496 14.896H10.5416C10.9175 14.896 11.2291 15.2077 11.2291 15.5835C11.2291 15.9593 10.9175 16.271 10.5416 16.271ZM12.375 12.6043H6.87496C6.49913 12.6043 6.18746 12.2927 6.18746 11.9168C6.18746 11.541 6.49913 11.2293 6.87496 11.2293H12.375C12.7508 11.2293 13.0625 11.541 13.0625 11.9168C13.0625 12.2927 12.7508 12.6043 12.375 12.6043Z" fill="#000000"></path>
                             </svg>
                             <span class="text">{{ get_phrase('Events') }}</span>
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('blog') }}" class="d-flex gap-2 mobile-menuitem-a">
                             <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M12.8333 12.146H9.16663C8.79079 12.146 8.47913 12.4577 8.47913 12.8335C8.47913 13.2093 8.79079 13.521 9.16663 13.521H12.8333C13.2091 13.521 13.5208 13.2093 13.5208 12.8335C13.5208 12.4577 13.2091 12.146 12.8333 12.146Z" fill="#000000"></path>
                                 <path d="M9.16663 9.854H11C11.3758 9.854 11.6875 9.54234 11.6875 9.1665C11.6875 8.79067 11.3758 8.479 11 8.479H9.16663C8.79079 8.479 8.47913 8.79067 8.47913 9.1665C8.47913 9.54234 8.79079 9.854 9.16663 9.854Z" fill="#000000"></path>
                                 <path d="M14.8409 1.8335H7.16836C3.83169 1.8335 1.84253 3.82266 1.84253 7.15933V14.8318C1.84253 18.1685 3.83169 20.1577 7.16836 20.1577H14.8409C18.1775 20.1577 20.1667 18.1685 20.1667 14.8318V7.15933C20.1667 3.82266 18.1775 1.8335 14.8409 1.8335ZM16.5 13.7502C16.5 15.5835 15.5834 16.5002 13.75 16.5002H8.25002C6.41669 16.5002 5.50002 15.5835 5.50002 13.7502V8.25016C5.50002 6.41683 6.41669 5.50016 8.25002 5.50016H11.9167C13.75 5.50016 14.6667 6.41683 14.6667 8.25016V9.16683C14.6667 9.671 15.0792 10.0835 15.5834 10.0835C16.0875 10.0835 16.5 10.496 16.5 11.0002V13.7502Z" fill="#000000"></path>
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
 <div class="modal fade header-search-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body">
                 <div class="mb-20px">
                     <form action="{{ route('filter.search') }}" method="post">
                         @csrf
                         <label for="searchFormControlInput1" class="form-label modal-search-label mb-12px builder-editable" builder-identity="ff1">{{ get_phrase('Search') }}</label>
                         <div class="modal-search-wrap">
                             <input type="search" name="search" class="form-control modal-search-input" id="searchFormControlInput1" placeholder="{{ get_phrase('What are you looking for?') }}">
                             <button type="submit" class="modal-search-btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewbox="0 0 19 18" fill="none">
                                     <path d="M9.36298 16.3125C5.12548 16.3125 1.67548 12.8625 1.67548 8.625C1.67548 4.3875 5.12548 0.9375 9.36298 0.9375C13.6005 0.9375 17.0505 4.3875 17.0505 8.625C17.0505 12.8625 13.6005 16.3125 9.36298 16.3125ZM9.36298 2.0625C5.74048 2.0625 2.80048 5.01 2.80048 8.625C2.80048 12.24 5.74048 15.1875 9.36298 15.1875C12.9855 15.1875 15.9255 12.24 15.9255 8.625C15.9255 5.01 12.9855 2.0625 9.36298 2.0625Z" fill="#0D0E10"></path>
                                     <path d="M17.238 17.0625C17.0955 17.0625 16.953 17.01 16.8405 16.8975L14.238 14.2951C14.0205 14.0776 14.0205 13.7176 14.238 13.5001C14.4555 13.2826 14.8155 13.2826 15.033 13.5001L17.6355 16.1025C17.853 16.32 17.853 16.68 17.6355 16.8975C17.523 17.01 17.3805 17.0625 17.238 17.0625Z" fill="#0D0E10"></path>
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
