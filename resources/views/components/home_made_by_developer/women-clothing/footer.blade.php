{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<div class="commonDivHidden">
    <ul class="smallDeviceShow ">
        <li><a href="{{route('home')}}"> <i class="fi fi-rr-home"> </i>{{get_phrase('Home')}}</a></li>
         <li><a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu"><i class="fi fi-rr-menu-burger"></i> {{get_phrase('Product')}}</a></li>
        <li><a href="{{ route('proceed.to.checkout') }}"><i class="fi  fi-rr-shopping-cart"></i> {{get_phrase('Cart')}}</a></li>
         @if(Auth::check())
             @if(auth()->user()->user_type == 'admin')
                <li><a href="{{ route('admin.dashboard') }}"><i class="fi fi-rr-circle-user"></i> {{get_phrase('Account')}}</a></li>
            @else
               <li><a href="{{ route('customer.account') }}"><i class="fi fi-rr-circle-user"></i> {{get_phrase('Account')}}</a></li>
            @endif
        @else 
        <li><a href="javascript:;" onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')" ><i class="fi fi-rr-circle-user"></i> {{get_phrase('Login')}}</a></li>
        @endif
    </ul>
</div>

   
   <!-- Footer Start -->
    <footer class="footer-section wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-main-area">
                        <div class="footer-logo-area">
                            <a href="{{route('home')}}" class="footer-logo">
                                <img class="logo" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                            </a>
                            <p class="ft-info-text builder-editable" builder-identity="WOF1">{{get_phrase('Step into a world where fashion meets femininity. Discover the season’s latest must-haves.')}}</p>
                            
                            
                        </div>
                        <div class="footer-nav-area">
                            <div class="ft-nav-wrap ft-nav-wrap-outer">
                                <h3 class="ft-nav-title builder-editable" builder-identity="WOF2">{{get_phrase('Quick Links')}}</h3>
                                <ul class="ft-navbar-nav">
                                    <li class="ft-nav-item"><a href="{{route('home')}}" class="ft-nav-link">{{get_phrase('Home')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('all_products')}}" class="ft-nav-link">{{get_phrase('Products')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{get_phrase('blog')}}" class="ft-nav-link">{{get_phrase('Blog')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('events')}}" class="ft-nav-link">{{get_phrase('Events')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('store')}}" class="ft-nav-link">{{get_phrase('Store')}}</a></li>
                                </ul>
                            </div>
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                            @endphp
                            <div class="ft-nav-right">
                                <div class="ft-right-nav-main">
                                    <div class="ft-nav-wrap ft-nav-wrap-inner">
                                        <h3 class="ft-nav-title builder-editable" builder-identity="WOF3">{{get_phrase('Top Categories')}}</h3>
                                        <ul class="ft-navbar-nav">
                                             @foreach($categories as $category)
                                                <li><a href="{{ route('products', $category->slug) }}" class="ft-nav-link">{{ $category->title }}</a></li>
                                             @endforeach
                                        </ul>
                                    </div>
                                    <div class="ft-nav-wrap ft-nav-wrap-inner">
                                        <h3 class="ft-nav-title builder-editable" builder-identity="WOF4">{{get_phrase('Support')}}</h3>
                                        <ul class="ft-navbar-nav">
                                            <li><a href="{{route('about_us')}}" class="ft-nav-link">{{get_phrase('About Us')}}</a></li>
                                            <li><a href="{{route('contact_us')}}" class="ft-nav-link">{{get_phrase('Contact Us')}}</a></li>
                                            <li><a href="{{route('terms_and_conditions')}}" class="ft-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                            <li><a href="{{route('privacy_policy')}}" class="ft-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                            <li><a href="{{route('refund_policy')}}" class="ft-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright-area flex-wrap">
                        <p class="ft-copyright-text builder-editable" builder-identity="WOF5">{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
                        <ul class="d-flex align-items-center flex-wrap gap-12px">
                                <li>
                                    <a href="{{get_settings('contact_instagram')}}" target="_blank" class="ft-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 29 30" fill="none">
                                            <g clip-path="url(#clip0_33_839)">
                                                <path d="M21.2309 0.640625H8.08267C3.80344 0.640625 0.322144 4.12192 0.322144 8.40115V21.5496C0.322144 25.8286 3.80344 29.3099 8.08267 29.3099H21.2312C25.5102 29.3099 28.9915 25.8286 28.9915 21.5496V8.40115C28.9915 4.12192 25.5102 0.640625 21.2309 0.640625ZM27.3107 21.5496C27.3107 24.9019 24.5834 27.6292 21.2309 27.6292H8.08267C4.7302 27.6292 2.00286 24.9019 2.00286 21.5496V8.40115C2.00286 5.04868 4.7302 2.32134 8.08267 2.32134H21.2312C24.5834 2.32134 27.3107 5.04868 27.3107 8.40115V21.5496Z" fill="black"/>
                                                <path d="M14.6555 7.13574C10.3329 7.13574 6.81641 10.6523 6.81641 14.9748C6.81641 19.2973 10.3329 22.8138 14.6555 22.8138C18.978 22.8138 22.4945 19.2973 22.4945 14.9748C22.4945 10.6523 18.978 7.13574 14.6555 7.13574ZM14.6555 21.1331C11.2599 21.1331 8.49712 18.3706 8.49712 14.9748C8.49712 11.5792 11.2599 8.81646 14.6555 8.81646C18.0512 8.81646 20.8138 11.5792 20.8138 14.9748C20.8138 18.3706 18.0512 21.1331 14.6555 21.1331Z" fill="black"/>
                                                <path d="M22.6824 4.35059C21.4051 4.35059 20.3662 5.3897 20.3662 6.66677C20.3662 7.94406 21.4051 8.98317 22.6824 8.98317C23.9597 8.98317 24.9988 7.94406 24.9988 6.66677C24.9988 5.38948 23.9597 4.35059 22.6824 4.35059ZM22.6824 7.30235C22.332 7.30235 22.0468 7.01715 22.0468 6.66677C22.0468 6.31617 22.332 6.03118 22.6824 6.03118C23.033 6.03118 23.3182 6.31617 23.3182 6.66677C23.3182 7.01715 23.033 7.30235 22.6824 7.30235Z" fill="black"/>
                                            </g> 
                                            <defs>
                                                <clipPath id="clip0_33_839">
                                                <rect width="28.6694" height="28.6694" fill="white" transform="translate(0.322266 0.640625)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{get_settings('contact_linkedin')}}" target="_blank" class="ft-social-link">
                                        <svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M26.7514 26.4408V18.0413C26.7514 13.9132 25.8627 10.7598 21.0466 10.7598C18.7246 10.7598 17.1765 12.0211 16.5459 13.2252H16.4885V11.1324H11.9304V26.4408H16.6892V18.844C16.6892 16.8372 17.0619 14.9165 19.5273 14.9165C21.964 14.9165 21.9927 17.1812 21.9927 18.9586V26.4121H26.7514V26.4408Z" fill="black"/>
                                            <path d="M4.19031 11.1328H8.94908V26.4412H4.19031V11.1328Z" fill="black"/>
                                            <path d="M6.56969 3.50781C5.05032 3.50781 3.81763 4.74051 3.81763 6.25988C3.81763 7.77925 5.05032 9.04061 6.56969 9.04061C8.08906 9.04061 9.32175 7.77925 9.32175 6.25988C9.32175 4.74051 8.08906 3.50781 6.56969 3.50781Z" fill="black"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{get_settings('contact_twitter')}}" target="_blank" class="ft-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 29 30" fill="none">
                                            <g clip-path="url(#clip0_33_849)">
                                                <path d="M17.2678 12.7801L27.7111 0.640625H25.2364L16.1685 11.1812L8.92592 0.640625H0.57251L11.5246 16.5798L0.57251 29.31H3.04738L12.6234 18.1788L20.272 29.31H28.6254L17.2672 12.7801H17.2678ZM13.8781 16.7203L12.7684 15.1331L3.93912 2.50367H7.74038L14.8657 12.696L15.9754 14.2832L25.2376 27.5317H21.4363L13.8781 16.7209V16.7203Z" fill="black"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_33_849">
                                                <rect width="28.6694" height="28.6694" fill="white" transform="translate(0.263794 0.640625)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Scroll Top -->
    <div class="scroll-progress-wrap">
        <svg class="scroll-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- Scroll Top -->
 {{-- Women  Cloting --}}
<script src="{{ asset('assets/frontend/women-clothing/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/women-clothing/vendors/mixitup/mixitup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/women-clothing/vendors/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/women-clothing/vendors/wow-js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/women-clothing/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/women-clothing/js/script.js') }}"></script>