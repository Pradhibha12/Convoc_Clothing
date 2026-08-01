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

<!-- Footer start -->
<footer class="footer-section wow animate__fadeInUp" data-wow-delay=".1s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-area">
                    <div class="footer-top-area">
                        <div class="footer-left-content">
                            <a href="{{route('home')}}" class="footer-logo">
                                <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                            </a>
                            <p class="footer-info-subtitle">{{get_settings('summary')}}</p>
                            <div class="footer-contact-wrap">
                                <p class="ft-contact-info mb-18px">{{get_phrase('Phone:')}} {{get_settings('phone')}}</p>
                                <p class="ft-contact-info">{{get_phrase('Address:')}} {{get_settings('system_email')}}</p>
                            </div>
                            <!-- Social Media Links -->
                            <ul class="d-flex align-items-center gap-3 flex-wrap">
                                <li>
                                    <a class="footer-social-link" href="{{get_settings('contact_instagram')}}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 29 29" fill="none">
                                            <g clip-path="url(#clip0_19_1244)">
                                                <path d="M21.1109 0.295898H8.00743C3.7428 0.295898 0.273376 3.76532 0.273376 8.02995V21.1336C0.273376 25.398 3.7428 28.8674 8.00743 28.8674H21.1111C25.3755 28.8674 28.8449 25.398 28.8449 21.1336V8.02995C28.8449 3.76532 25.3755 0.295898 21.1109 0.295898ZM27.1699 21.1336C27.1699 24.4744 24.4519 27.1924 21.1109 27.1924H8.00743C4.6664 27.1924 1.94836 24.4744 1.94836 21.1336V8.02995C1.94836 4.68892 4.6664 1.97088 8.00743 1.97088H21.1111C24.4519 1.97088 27.1699 4.68892 27.1699 8.02995V21.1336Z" fill="white"/>
                                                <path d="M14.5577 6.76953C10.2499 6.76953 6.74542 10.2741 6.74542 14.5818C6.74542 18.8896 10.2499 22.3942 14.5577 22.3942C18.8655 22.3942 22.37 18.8896 22.37 14.5818C22.37 10.2741 18.8655 6.76953 14.5577 6.76953ZM14.5577 20.7192C11.1738 20.7192 8.42041 17.966 8.42041 14.5818C8.42041 11.1979 11.1738 8.44452 14.5577 8.44452C17.9419 8.44452 20.6951 11.1979 20.6951 14.5818C20.6951 17.966 17.9419 20.7192 14.5577 20.7192Z" fill="white"/>
                                                <path d="M22.5574 3.99316C21.2844 3.99316 20.249 5.0288 20.249 6.30161C20.249 7.57463 21.2844 8.61027 22.5574 8.61027C23.8304 8.61027 24.8661 7.57463 24.8661 6.30161C24.8661 5.02859 23.8304 3.99316 22.5574 3.99316ZM22.5574 6.93507C22.2082 6.93507 21.9239 6.65082 21.9239 6.30161C21.9239 5.95218 22.2082 5.66815 22.5574 5.66815C22.9068 5.66815 23.1911 5.95218 23.1911 6.30161C23.1911 6.65082 22.9068 6.93507 22.5574 6.93507Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_19_1244">
                                                <rect width="28.5716" height="28.5716" fill="white" transform="translate(0.273376 0.295898)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                               
                                <li>
                                    <a class="footer-social-link" href="{{get_settings('contact_linkedin')}}" target="_blank">
                                        <svg width="25" height="25" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M26.3699 26.0095V17.638C26.3699 13.5237 25.4842 10.3809 20.6842 10.3809C18.3699 10.3809 16.827 11.638 16.1984 12.838H16.1413V10.7523H11.5984V26.0095H16.3413V18.4381C16.3413 16.438 16.7127 14.5237 19.1699 14.5237C21.5985 14.5237 21.627 16.7809 21.627 18.5523V25.981H26.3699V26.0095Z" fill="white"/>
                                            <path d="M3.88403 10.752H8.62692V26.0092H3.88403V10.752Z" fill="white"/>
                                            <path d="M6.25545 3.15234C4.74115 3.15234 3.51257 4.38092 3.51257 5.89522C3.51257 7.40951 4.74115 8.66666 6.25545 8.66666C7.76974 8.66666 8.99832 7.40951 8.99832 5.89522C8.99832 4.38092 7.76974 3.15234 6.25545 3.15234Z" fill="white"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a class="footer-social-link" href="{{get_settings('contact_twitter')}}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 30 29" fill="none">
                                            <g clip-path="url(#clip0_19_1254)">
                                                <path d="M17.7923 12.394L28.2001 0.295898H25.7338L16.6967 10.8005L9.47891 0.295898H1.15399L12.0688 16.1808L1.15399 28.8675H3.62043L13.1637 17.7742L20.7863 28.8675H29.1112L17.7917 12.394H17.7923ZM14.4142 16.3207L13.3083 14.7389L4.50912 2.15258H8.29741L15.3985 12.3102L16.5044 13.8919L25.7349 27.0952H21.9466L14.4142 16.3213V16.3207Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_19_1254">
                                                <rect width="28.5716" height="28.5716" fill="white" transform="translate(0.846619 0.295898)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-nav-content">
                            <div class="footer-nav">
                                <h2 class="footer-nav-title builder-editable" builder-identity="BF1">{{get_phrase('Quick Links')}}</h2>
                                 <ul class="footer-navbar-nav">
                                    <li><a class="footer-nav-link " href="{{route('home')}}">{{get_phrase('Home')}}</a></li>
                                    <li><a class="footer-nav-link " href="{{route('blog')}}">{{get_phrase('Blog')}}</a></li>
                                    <li><a class="footer-nav-link " href="{{route('store')}}">{{get_phrase('Store')}}</a></li>
                                    <li><a class="footer-nav-link " href="{{route('events')}}">{{get_phrase('Events')}}</a></li>
                                    <li><a class="footer-nav-link " href="{{route('contact_us')}}">{{get_phrase('Contact Us')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        @php
                            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                        @endphp
                       <div class="footer-nav ">
                           <h2 class="footer-nav-title builder-editable" builder-identity="BF2">{{get_phrase('Top Categories')}}</h2>
                            <ul class="footer-navbar-nav">
                                  @foreach($categories as $category)
                                <li><a href="{{ route('products', $category->slug) }}" class="footer-nav-link">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                       
                       <div class="footer-nav ">
                           <h2 class="footer-nav-title builder-editable" builder-identity="BF3">{{get_phrase('Support')}}</h2>
                            <ul class="footer-navbar-nav">
                                <li><a href="{{route('about_us')}}" class="footer-nav-link">{{get_phrase('About Us')}}</a></li>
                                <li><a href="{{route('terms_and_conditions')}}" class="footer-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                <li><a href="{{route('privacy_policy')}}" class="footer-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                <li><a href="{{route('refund_policy')}}" class="footer-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-copyright-area">
                        <p class="footer-copyright-text builder-editable" builder-identity="BF4">{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
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
<script src="{{ asset('assets/frontend/bags/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/bags/js/script.js') }}"></script>