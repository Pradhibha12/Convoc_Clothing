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
                <div class="footer-to-wrap">
                    <div class="footer-logo-area">
                        <a href="{{route('home')}}" class="footer-logo">
                            <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                        </a>
                        <p class="footer-logo-subtitle">{{get_settings('summary')}}</p>
                        <a href="mailto:{{get_settings('system_email')}}" class="ft-contact-link mb-20px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 25 21" fill="none">
                                <path d="M2 4.11715C2 3.55565 2.22306 3.01714 2.6201 2.6201C3.01714 2.22306 3.55565 2 4.11715 2H21.0543C21.6158 2 22.1543 2.22306 22.5514 2.6201C22.9484 3.01714 23.1715 3.55565 23.1715 4.11715V16.82C23.1715 17.3815 22.9484 17.92 22.5514 18.3171C22.1543 18.7141 21.6158 18.9372 21.0543 18.9372H4.11715C3.55565 18.9372 3.01714 18.7141 2.6201 18.3171C2.22306 17.92 2 17.3815 2 16.82V4.11715Z" stroke="white" stroke-width="2.54058" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 5.27051L9.94036 11.623C10.6912 12.2238 11.6241 12.5511 12.5857 12.5511C13.5473 12.5511 14.4803 12.2238 15.2311 11.623L23.1715 5.27051" stroke="white" stroke-width="2.54058" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>{{get_settings('system_email')}}</span>
                        </a>
                        <a href="tel:{{get_settings('phone')}}" class="ft-contact-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                <path d="M11.0553 6.48942L7.47413 2.35569C7.06129 1.87933 6.30441 1.88145 5.82487 2.36204L2.87992 5.31228C2.00342 6.18984 1.75254 7.49295 2.2596 8.53776C5.28883 14.8098 10.3472 19.8752 16.6149 22.9132C17.6587 23.4203 18.9607 23.1694 19.8372 22.2918L22.8097 19.314C23.2913 18.8324 23.2924 18.0713 22.8118 17.6584L18.6622 14.0963C18.2282 13.7237 17.5539 13.7724 17.1188 14.2085L15.6749 15.6546C15.601 15.732 15.5037 15.7831 15.3979 15.7999C15.2922 15.8167 15.1838 15.7984 15.0895 15.7477C12.7294 14.3886 10.7716 12.4283 9.41556 10.0663C9.36477 9.97186 9.34639 9.86334 9.36321 9.7574C9.38004 9.65147 9.43115 9.55398 9.50871 9.47989L10.9484 8.03917C11.3845 7.60092 11.4321 6.92343 11.0553 6.48836V6.48942Z" stroke="white" stroke-width="2.54058" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>{{get_settings('phone')}}</span>
                        </a>
                        <ul class="d-flex align-items-center flex-wrap gap-12px mt-3">
                            <li><a href="{{get_settings('contact_instagram')}}" target="_blank" class="ft-social-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_64_2691)">
                                        <path d="M17.0963 0.427734H6.61444C3.20303 0.427734 0.427734 3.20303 0.427734 6.61444V17.0964C0.427734 20.5077 3.20303 23.283 6.61444 23.283H17.0964C20.5077 23.283 23.283 20.5077 23.283 17.0964V6.61444C23.283 3.20303 20.5077 0.427734 17.0963 0.427734ZM21.9431 17.0964C21.9431 19.7688 19.7688 21.9431 17.0963 21.9431H6.61444C3.94184 21.9431 1.7676 19.7688 1.7676 17.0964V6.61444C1.7676 3.94184 3.94184 1.7676 6.61444 1.7676H17.0964C19.7688 1.7676 21.9431 3.94184 21.9431 6.61444V17.0964Z" fill="white"/>
                                        <path d="M11.8543 5.60547C8.40835 5.60547 5.60498 8.40884 5.60498 11.8548C5.60498 15.3007 8.40835 18.1041 11.8543 18.1041C15.3002 18.1041 18.1036 15.3007 18.1036 11.8548C18.1036 8.40884 15.3002 5.60547 11.8543 5.60547ZM11.8543 16.7642C9.14734 16.7642 6.94485 14.5619 6.94485 11.8548C6.94485 9.14783 9.14734 6.94534 11.8543 6.94534C14.5614 6.94534 16.7637 9.14783 16.7637 11.8548C16.7637 14.5619 14.5614 16.7642 11.8543 16.7642Z" fill="white"/>
                                        <path d="M18.2533 3.38574C17.235 3.38574 16.4067 4.21418 16.4067 5.23234C16.4067 6.25067 17.235 7.0791 18.2533 7.0791C19.2717 7.0791 20.1001 6.25067 20.1001 5.23234C20.1001 4.21401 19.2717 3.38574 18.2533 3.38574ZM18.2533 5.73906C17.974 5.73906 17.7466 5.51168 17.7466 5.23234C17.7466 4.95282 17.974 4.72561 18.2533 4.72561C18.5328 4.72561 18.7602 4.95282 18.7602 5.23234C18.7602 5.51168 18.5328 5.73906 18.2533 5.73906Z" fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_64_2691">
                                        <rect width="22.8553" height="22.8553" fill="white" transform="translate(0.427734 0.427734)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a></li>
                            <li><a href="{{get_settings('contact_linkedin')}}" target="_blank" class="ft-social-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                    <path d="M18.5432 18.9969V12.3004C18.5432 9.0092 17.8347 6.49512 13.995 6.49512C12.1437 6.49512 10.9096 7.50075 10.4067 8.46067H10.361V6.79224H6.72705V18.9969H10.521V12.9403C10.521 11.3404 10.8181 9.80913 12.7837 9.80913C14.7264 9.80913 14.7492 11.6147 14.7492 13.0317V18.9741H18.5432V18.9969Z" fill="white"/>
                                    <path d="M0.556641 6.79199H4.35061V18.9967H0.556641V6.79199Z" fill="white"/>
                                    <path d="M2.45338 0.712891C1.24205 0.712891 0.259277 1.69567 0.259277 2.907C0.259277 4.11833 1.24205 5.12396 2.45338 5.12396C3.66471 5.12396 4.64749 4.11833 4.64749 2.907C4.64749 1.69567 3.66471 0.712891 2.45338 0.712891Z" fill="white"/>
                                </svg>
                            </a></li>
                            <li><a href="{{get_settings('contact_twitter')}}" target="_blank" class="ft-social-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_64_2701)">
                                        <path d="M14.3022 10.1054L22.6276 0.427734H20.6548L13.4258 8.8307L7.65202 0.427734H0.992676L9.72373 13.1345L0.992676 23.283H2.96565L10.5996 14.4092L16.6971 23.283H23.3565L14.3017 10.1054H14.3022ZM11.5999 13.2465L10.7153 11.9811L3.67654 1.91295H6.70691L12.3873 10.0383L13.2719 11.3036L20.6557 21.8653H17.6253L11.5999 13.2469V13.2465Z" fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_64_2701">
                                        <rect width="22.8553" height="22.8553" fill="white" transform="translate(0.746582 0.427734)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a></li>
                        </ul>
                    </div>
                    <div class="footer-newsletter-area">
                        <div class="footer-middle-area d-flex justify-content-between flex-wrap">
                                <div class="footer-nav-area">
                                    <h4 class="al-title-18px text-white mb-4 builder-editable" builder-identity="PF1">{{get_phrase('Quick Links')}}</h4>
                                    <ul class="d-flex flex-column gap-10px">
                                        <li><a href="{{route('home')}}" class="footer-nav-link">{{get_phrase('Home')}}</a></li>
                                        <li><a href="{{route('blog')}}" class="footer-nav-link">{{get_phrase('Blog')}}</a></li>
                                        <li><a href="{{route('store')}}" class="footer-nav-link">{{get_phrase('Store')}}</a></li>
                                        <li><a href="{{route('events')}}" class="footer-nav-link">{{get_phrase('Events')}}</a></li>
                                        <li><a href="{{route('contact_us')}}" class="footer-nav-link">{{get_phrase('Contact us')}}</a></li>
                                    </ul> 
                                </div>
                                @php
                                    $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                                @endphp
                                <div class="footer-nav-area">
                                    <h4 class="al-title-18px text-white mb-4 builder-editable" builder-identity="PF2">{{get_phrase('Top Categories')}}</h4>
                                    <ul class="d-flex flex-column gap-10px">
                                        @foreach($categories as $category)
                                        <li><a href="{{ route('products', $category->slug) }}" class="footer-nav-link">{{ $category->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="footer-nav-area">
                                    <h4 class="al-title-18px text-white mb-4 builder-editable" builder-identity="PF3">{{get_phrase('Support')}}</h4>
                                    <ul class="d-flex flex-column gap-10px">
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
    </div>
    <!-- Copyright Area -->
    <div class="footer-bottom-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-area">
                        <p class="ft-copyright-text builder-editable" builder-identity="PF4">{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
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
<script src="{{ asset('assets/frontend/pet/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/pet/js/script.js') }}"></script>