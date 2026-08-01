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
    <footer class="wch-footer-section">
        <div class="footer-typo-text">
            <img class="text" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content-area">
                        <div class="footer-left-area">
                            <p class="footer-info-text">{{get_phrase('“Discover watches and jewelry that celebrate heritage, precision & personal style.”')}}</p>
                            <div class="d-flex align-items-center flex-wrap gap-20px mb-40px">
                                <ul class="ft-social-list">
                                    <li><a href="{{get_settings('contact_instagram')}}" target="_blank"  class="ft-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                            <g clip-path="url(#clip0_28_91)">
                                                <path d="M21.816 0.24707H8.44788C4.09712 0.24707 0.557617 3.78657 0.557617 8.13733V21.5056C0.557617 25.8562 4.09712 29.3957 8.44788 29.3957H21.8162C26.1667 29.3957 29.7062 25.8562 29.7062 21.5056V8.13733C29.7062 3.78657 26.1667 0.24707 21.816 0.24707ZM27.9974 21.5056C27.9974 24.9139 25.2245 27.6869 21.816 27.6869H8.44788C5.03937 27.6869 2.26643 24.9139 2.26643 21.5056V8.13733C2.26643 4.72882 5.03937 1.95589 8.44788 1.95589H21.8162C25.2245 1.95589 27.9974 4.72882 27.9974 8.13733V21.5056Z" fill="white"/>
                                                <path d="M15.1305 6.85156C10.7357 6.85156 7.1604 10.4269 7.1604 14.8217C7.1604 19.2165 10.7357 22.7918 15.1305 22.7918C19.5253 22.7918 23.1006 19.2165 23.1006 14.8217C23.1006 10.4269 19.5253 6.85156 15.1305 6.85156ZM15.1305 21.0829C11.6782 21.0829 8.86922 18.2742 8.86922 14.8217C8.86922 11.3693 11.6782 8.56038 15.1305 8.56038C18.583 8.56038 21.3918 11.3693 21.3918 14.8217C21.3918 18.2742 18.583 21.0829 15.1305 21.0829Z" fill="white"/>
                                                <path d="M23.2917 4.01953C21.993 4.01953 20.9366 5.07609 20.9366 6.3746C20.9366 7.67334 21.993 8.72989 23.2917 8.72989C24.5905 8.72989 25.647 7.67334 25.647 6.3746C25.647 5.07587 24.5905 4.01953 23.2917 4.01953ZM23.2917 7.02086C22.9355 7.02086 22.6455 6.73086 22.6455 6.3746C22.6455 6.01812 22.9355 5.72835 23.2917 5.72835C23.6482 5.72835 23.9382 6.01812 23.9382 6.3746C23.9382 6.73086 23.6482 7.02086 23.2917 7.02086Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_28_91">
                                                <rect width="29.1487" height="29.1487" fill="white" transform="translate(0.557617 0.24707)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a></li>
                                    
                                    <li><a href="{{get_settings('contact_linkedin')}}" target="_blank" class="ft-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 24" fill="none">
                                            <path d="M24.0689 23.4795V14.9389C24.0689 10.7415 23.1653 7.53516 18.2683 7.53516C15.9073 7.53516 14.3332 8.8177 13.692 10.0419H13.6337V7.91409H8.99902V23.4795H13.8377V15.7551C13.8377 13.7147 14.2166 11.7617 16.7234 11.7617C19.2011 11.7617 19.2302 14.0645 19.2302 15.8717V23.4503H24.0689V23.4795Z" fill="white"/>
                                            <path d="M1.12903 7.91406H5.96771V23.4794H1.12903V7.91406Z" fill="white"/>
                                            <path d="M3.54827 0.161133C2.00339 0.161133 0.75 1.41453 0.75 2.9594C0.75 4.50428 2.00339 5.78682 3.54827 5.78682C5.09315 5.78682 6.34654 4.50428 6.34654 2.9594C6.34654 1.41453 5.09315 0.161133 3.54827 0.161133Z" fill="white"/>
                                        </svg>
                                    </a></li>
                                    <li><a href="{{get_settings('contact_twitter')}}" target="_blank" class="ft-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                            <g clip-path="url(#clip0_28_101)">
                                                <path d="M17.762 12.5895L28.3799 0.24707H25.8638L16.6443 10.9639L9.28066 0.24707H0.787598L11.9228 16.4528L0.787598 29.3957H3.30385L13.0399 18.0784L20.8164 29.3957H29.3095L17.7614 12.5895H17.762ZM14.3157 16.5955L13.1874 14.9818L4.21049 2.14126H8.0753L15.3198 12.504L16.448 14.1177L25.865 27.5877H22.0002L14.3157 16.5961V16.5955Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_28_101">
                                                <rect width="29.1487" height="29.1487" fill="white" transform="translate(0.473877 0.24707)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a></li>
                                </ul>
                                <p class="ft-socail-text">{{get_phrase('Follow us')}}</p>
                            </div>
                            <p class="footer-copyright-text">{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
                        </div>
                        <div class="footer-right-area">
                            <ul class="footer-navbar-nav">
                               <li><a href="{{route('home')}}" class="footer-nav-link">{{get_phrase('Home')}}</a></li>
                                <li ><a href="{{route('all_products')}} " class="footer-nav-link">{{get_phrase('Products')}}</a></li>
                                <li ><a href="{{route('blog')}}" class="footer-nav-link">{{get_phrase('Blog')}}</a></li>
                                <li ><a href="{{route('events')}}" class="footer-nav-link">{{get_phrase('Events')}}</a></li>
                                <li ><a href="{{route('store')}}" class="footer-nav-link">{{get_phrase('Store')}}</a></li>
                            </ul>
                            
                        </div>
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

 {{-- Watch Dark --}}
<script src="{{ asset('assets/frontend/watch-dark/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/watch-dark/vendors/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/watch-dark/vendors/wow-js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/watch-dark/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/watch-dark/js/script.js') }}"></script>