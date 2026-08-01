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
        <li><a href="javascript:;" onclick="formModal('{{ route('view', ['path' => 'auth.login_modal']) }}', '{{ get_phrase('Log In') }}')"><i class="fi fi-rr-circle-user"></i> {{get_phrase('Login')}}</a></li>
        @endif
    </ul>
</div>

   
   <!-- Start Footer -->
    <footer class="footer-section">
        <div class="container">
            <div class="row justify-content-between gx-4 gy-5 mb-20px">
                <div class="col-md-6 col-xl-3">
                    <div class="footer-logo-area">
                        <a href="{{route('home')}}" class="footer-logo">
                            <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                        </a>
                        <p class="footer-info-text builder-editable" builder-identity="CFR1">{{ get_phrase('From sleek interiors to smart gadgets everything your ride needs in one place.') }}</p>
                        <ul class="ft-contact-wrap">
                            <li class="mb-20px"><a href="mailto:{{get_settings('system_email')}}" class="ft-contact-link">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="21" viewbox="0 0 26 21" fill="none">
                                        <path d="M1 3.33333C1 2.71449 1.24583 2.121 1.68342 1.68342C2.121 1.24583 2.71449 1 3.33333 1H22C22.6188 1 23.2123 1.24583 23.6499 1.68342C24.0875 2.121 24.3333 2.71449 24.3333 3.33333V17.3333C24.3333 17.9522 24.0875 18.5457 23.6499 18.9832C23.2123 19.4208 22.6188 19.6667 22 19.6667H3.33333C2.71449 19.6667 2.121 19.4208 1.68342 18.9832C1.24583 18.5457 1 17.9522 1 17.3333V3.33333Z" stroke="white" stroke-width="1.69697" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1 6.21191L9.75117 13.2131C10.5787 13.8752 11.6069 14.2359 12.6667 14.2359C13.7264 14.2359 14.7547 13.8752 15.5822 13.2131L24.3333 6.21191" stroke="white" stroke-width="1.69697" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span>{{get_settings('system_email')}}</span>
                            </a></li>
                            <li><a href="tel:+{{get_settings('phone')}}" class="ft-contact-link">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewbox="0 0 21 22" fill="none">
                                        <path d="M8.98369 5.50307L5.82633 1.85852C5.46234 1.43853 4.79503 1.4404 4.37224 1.86412L1.77579 4.46523C1.00302 5.23894 0.781824 6.38784 1.22888 7.30901C3.89963 12.8388 8.35935 17.3048 13.8854 19.9833C14.8056 20.4303 15.9536 20.2091 16.7264 19.4354L19.3471 16.81C19.7717 16.3854 19.7727 15.7143 19.349 15.3503L15.6904 12.2098C15.3078 11.8813 14.7132 11.9242 14.3296 12.3087L13.0566 13.5836C12.9915 13.6519 12.9057 13.6969 12.8124 13.7118C12.7192 13.7266 12.6237 13.7104 12.5405 13.6657C10.4597 12.4675 8.73356 10.7391 7.538 8.6567C7.49323 8.5734 7.47702 8.47771 7.49185 8.38432C7.50669 8.29092 7.55175 8.20497 7.62013 8.13965L8.88943 6.86942C9.27395 6.48303 9.31595 5.88572 8.98369 5.50213V5.50307Z" stroke="white" stroke-width="1.69697" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span>{{get_settings('phone')}}</span>
                            </a></li>
                        </ul>
                      
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="ft-nav-wrap">
                        <h3 class="ft-nav-title builder-editable" builder-identity="CFR2">{{ get_phrase('Quick Links') }}</h3>
                        <ul class="ft-navbar-nav">
                                <li class="ft-nav-item"><a href="{{route('home')}}" class="ft-nav-link">{{get_phrase('Home')}}</a></li>
                            <li class="ft-nav-item"><a href="{{route('blog')}}" class="ft-nav-link">{{get_phrase('Blog')}}</a></li>
                            <li class="ft-nav-item"><a href="{{route('store')}}" class="ft-nav-link">{{get_phrase('Store')}}</a></li>
                            <li class="ft-nav-item"><a href="{{route('events')}}" class="ft-nav-link">{{get_phrase('Events')}}</a></li>
                            <li class="ft-nav-item"><a href="{{route('contact_us')}}" class="ft-nav-link">{{get_phrase('Contact Us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                     <div class="ft-nav-wrap">
                                <h3 class="ft-nav-title builder-editable" builder-identity="CFR3">{{ get_phrase('Support') }}</h3>
                                <ul class="ft-navbar-nav">
                                    <li><a href="{{route('about_us')}}" class="ft-nav-link">{{get_phrase('About Us')}}</a></li>
                                    <li><a href="{{route('terms_and_conditions')}}" class="ft-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                    <li><a href="{{route('privacy_policy')}}" class="ft-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                    <li><a href="{{route('refund_policy')}}" class="ft-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                                </ul>
                            </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                            @endphp
                            <div class="ft-nav-wrap">
                               <h4 class="ft-nav-title builder-editable" builder-identity="CFR4">{{ get_phrase('Top Categories') }}</h4>
                                <ul class="ft-navbar-nav">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('products', $category->slug) }}" class="ft-nav-link">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                </div>
                
                
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-copyright-area">
                        <p class="ft-copyright-text builder-editable" builder-identity="CFR5">{{ get_phrase(' Copyright © 2026 | All rights reserved by creativeitem.com') }}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Scroll Top -->
    <div class="scroll-progress-wrap">
        <svg class="scroll-progress-circle" width="100%" height="100%" viewbox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- Scroll Top -->

 {{-- Baby --}}
<script src="{{ asset('assets/frontend/car-dark/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/car-dark/vendors/slick/slick.min.js') }}"></script>
{{-- <script src="{{ asset('assets/frontend/car-dark/vendors/wow-js/wow.min.js') }}"> --}}
<script src="{{ asset('assets/frontend/car-dark/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/car-dark/js/script.js') }}"></script>