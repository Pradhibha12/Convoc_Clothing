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
<footer class="footer-section">
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
                            <!-- Social Media Links -->
                            <ul class="d-flex align-items-center gap-12px flex-wrap">
                                <li>
                                    <a class="footer-social-link" href="{{get_settings('contact_instagram')}}" target="_blank">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_15_1412)">
                                                <path d="M17.0963 0.427734H6.61444C3.20303 0.427734 0.427734 3.20303 0.427734 6.61444V17.0964C0.427734 20.5077 3.20303 23.283 6.61444 23.283H17.0964C20.5077 23.283 23.283 20.5077 23.283 17.0964V6.61444C23.283 3.20303 20.5077 0.427734 17.0963 0.427734ZM21.9431 17.0964C21.9431 19.7688 19.7688 21.9431 17.0963 21.9431H6.61444C3.94184 21.9431 1.7676 19.7688 1.7676 17.0964V6.61444C1.7676 3.94184 3.94184 1.7676 6.61444 1.7676H17.0964C19.7688 1.7676 21.9431 3.94184 21.9431 6.61444V17.0964Z" fill="white" />
                                                <path d="M11.8543 5.60547C8.40835 5.60547 5.60498 8.40884 5.60498 11.8548C5.60498 15.3007 8.40835 18.1041 11.8543 18.1041C15.3002 18.1041 18.1036 15.3007 18.1036 11.8548C18.1036 8.40884 15.3002 5.60547 11.8543 5.60547ZM11.8543 16.7642C9.14734 16.7642 6.94485 14.5619 6.94485 11.8548C6.94485 9.14783 9.14734 6.94534 11.8543 6.94534C14.5614 6.94534 16.7637 9.14783 16.7637 11.8548C16.7637 14.5619 14.5614 16.7642 11.8543 16.7642Z" fill="white" />
                                                <path d="M18.2533 3.38574C17.235 3.38574 16.4067 4.21418 16.4067 5.23234C16.4067 6.25067 17.235 7.0791 18.2533 7.0791C19.2717 7.0791 20.1001 6.25067 20.1001 5.23234C20.1001 4.21401 19.2717 3.38574 18.2533 3.38574ZM18.2533 5.73906C17.974 5.73906 17.7466 5.51168 17.7466 5.23234C17.7466 4.95282 17.974 4.72561 18.2533 4.72561C18.5328 4.72561 18.7602 4.95282 18.7602 5.23234C18.7602 5.51168 18.5328 5.73906 18.2533 5.73906Z" fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_15_1412">
                                                <rect width="22.8553" height="22.8553" fill="white" transform="translate(0.427734 0.427734)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                              
                                <li>
                                    <a class="footer-social-link" href="{{get_settings('contact_linkedin')}}" target="_blank" >
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.5432 20.9974V14.3008C21.5432 11.0097 20.8347 8.49561 16.995 8.49561C15.1437 8.49561 13.9096 9.50124 13.4067 10.4612H13.361V8.79272H9.72705V20.9974H13.521V14.9408C13.521 13.3409 13.8181 11.8096 15.7837 11.8096C17.7264 11.8096 17.7492 13.6152 17.7492 15.0322V20.9746H21.5432V20.9974Z" fill="white" />
                                            <path d="M3.55664 8.79248H7.35061V20.9972H3.55664V8.79248Z" fill="white" />
                                            <path d="M5.45338 2.71338C4.24205 2.71338 3.25928 3.69616 3.25928 4.90748C3.25928 6.11881 4.24205 7.12444 5.45338 7.12444C6.66471 7.12444 7.64749 6.11881 7.64749 4.90748C7.64749 3.69616 6.66471 2.71338 5.45338 2.71338Z" fill="white" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a class="footer-social-link" href="{{get_settings('contact_twitter')}}" target="_blank">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_15_1422)">
                                                <path d="M14.3022 10.1054L22.6276 0.427734H20.6548L13.4258 8.8307L7.65202 0.427734H0.992676L9.72373 13.1345L0.992676 23.283H2.96565L10.5996 14.4092L16.6971 23.283H23.3565L14.3017 10.1054H14.3022ZM11.5999 13.2465L10.7153 11.9811L3.67654 1.91295H6.70691L12.3873 10.0383L13.2719 11.3036L20.6557 21.8653H17.6253L11.5999 13.2469V13.2465Z" fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_15_1422">
                                                <rect width="22.8553" height="22.8553" fill="white" transform="translate(0.746582 0.427734)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-nav-content">
                            <h2 class="footer-nav-title builder-editable" builder-identity="sf1">{{get_phrase('Quick Links')}}</h2>
                            <ul class="footer-navbar-nav">
                                <li><a class="footer-nav-link" href="{{route('home')}}">{{get_phrase('Home')}}</a></li>
                                <li><a class="footer-nav-link" href="{{route('blog')}}">{{get_phrase('Blog')}}</a></li>
                                <li><a class="footer-nav-link" href="{{route('events')}}">{{get_phrase('Event')}}</a></li>
                                <li><a class="footer-nav-link" href="{{route('store')}}">{{get_phrase('Store')}}</a></li>
                                <li><a class="footer-nav-link" href="{{route('contact_us')}}">{{get_phrase('Contact Us')}}</a></li>
                            </ul>
                        </div>
                        
                         @php
                            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                        @endphp
                        <div class="footer-nav-content">
                            <h2 class="footer-nav-title builder-editable" builder-identity="sf2">{{get_phrase('Top Categories')}}</h2>
                            <ul class="footer-navbar-nav">
                                 @foreach($categories as $category)
                                   <li><a href="{{ route('products', $category->slug) }}" class="footer-nav-link">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="footer-nav-content">
                            <h2 class="footer-nav-title builder-editable" builder-identity="sf3">{{get_phrase('Support')}}</h2>
                                 <ul class="footer-navbar-nav">
                                    <li><a href="{{route('about_us')}}" class="footer-nav-link">{{get_phrase('About Us')}}</a></li>
                                    <li><a href="{{route('terms_and_conditions')}}" class="footer-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                    <li><a href="{{route('privacy_policy')}}" class="footer-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                    <li><a href="{{route('refund_policy')}}" class="footer-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                                </ul>
                        </div>
                      
                    </div>
                    <div class="footer-copyright-area">
                        <p class="footer-copyright-text builder-editable" builder-identity="sf4">{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- Scroll Top -->
    <div class="scroll-progress-wrap">
        <svg class="scroll-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- Scroll Top -->
    
<!-- Footer End -->
<script src="{{ asset('assets/frontend/shoe/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/shoe/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/shoe/js/script.js') }}"></script>