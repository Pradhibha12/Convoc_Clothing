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
    <section class="footer-section wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-top-main">
                        <div class="footer-logo-area">
                            <a href="{{route('home')}}" class="footer-logo">
                                <img class="logo" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                            </a>
                            <p class="footer-info-text builder-editable" builder-identity="COF1">{{get_phrase('Discover artisan coffee blends, soothing teas & beautifully crafted brewing tools all in one place.')}}</p>
                            <ul class="ft-contact-group">
                                <li class="ft-contact-info text-break"><span class="sm">{{get_phrase('Email:')}} </span>{{get_settings('system_email')}}</li>
                                <li class="ft-contact-info"><span class="sm">{{get_phrase('Phone:')}} </span>{{get_settings('phone')}}</li>
                            </ul>
                            <ul class="ft-social-items">
                                <li> 
                                    <a href="{{get_settings('contact_instagram')}}" target="_blank" class="ft-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 29 29" fill="none">
                                            <g clip-path="url(#clip0_28_2011)">
                                                <path d="M21.1109 0.286133H8.00749C3.74286 0.286133 0.273438 3.75556 0.273438 8.02019V21.1238C0.273438 25.3882 3.74286 28.8577 8.00749 28.8577H21.1111C25.3755 28.8577 28.845 25.3882 28.845 21.1238V8.02019C28.845 3.75556 25.3755 0.286133 21.1109 0.286133ZM27.17 21.1238C27.17 24.4646 24.452 27.1827 21.1109 27.1827H8.00749C4.66646 27.1827 1.94842 24.4646 1.94842 21.1238V8.02019C1.94842 4.67915 4.66646 1.96112 8.00749 1.96112H21.1111C24.452 1.96112 27.17 4.67915 27.17 8.02019V21.1238Z" fill="black"/>
                                                <path d="M14.5579 6.75977C10.2501 6.75977 6.74561 10.2643 6.74561 14.5721C6.74561 18.8799 10.2501 22.3844 14.5579 22.3844C18.8657 22.3844 22.3702 18.8799 22.3702 14.5721C22.3702 10.2643 18.8657 6.75977 14.5579 6.75977ZM14.5579 20.7094C11.1739 20.7094 8.42059 17.9563 8.42059 14.5721C8.42059 11.1881 11.1739 8.43475 14.5579 8.43475C17.9421 8.43475 20.6952 11.1881 20.6952 14.5721C20.6952 17.9563 17.9421 20.7094 14.5579 20.7094Z" fill="black"/>
                                                <path d="M22.5575 3.9834C21.2844 3.9834 20.249 5.01904 20.249 6.29184C20.249 7.56487 21.2844 8.60051 22.5575 8.60051C23.8305 8.60051 24.8661 7.56487 24.8661 6.29184C24.8661 5.01882 23.8305 3.9834 22.5575 3.9834ZM22.5575 6.9253C22.2083 6.9253 21.924 6.64105 21.924 6.29184C21.924 5.94242 22.2083 5.65838 22.5575 5.65838C22.9069 5.65838 23.1911 5.94242 23.1911 6.29184C23.1911 6.64105 22.9069 6.9253 22.5575 6.9253Z" fill="black"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_28_2011">
                                                <rect width="28.5716" height="28.5716" fill="white" transform="translate(0.273438 0.286133)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{get_settings('contact_linkedin')}}" target="_blank"class="ft-social-link">
                                        <svg width="24" height="24" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M26.2246 25.9998V17.6283C26.2246 13.514 25.3389 10.3711 20.5389 10.3711C18.2246 10.3711 16.6817 11.6282 16.0532 12.8283H15.996V10.7425H11.4531V25.9998H16.196V18.4283C16.196 16.4283 16.5674 14.514 19.0246 14.514C21.4532 14.514 21.4818 16.7711 21.4818 18.5426V25.9712H26.2246V25.9998Z" fill="black"/>
                                            <path d="M3.73926 10.7422H8.48214V25.9994H3.73926V10.7422Z" fill="black"/>
                                            <path d="M6.11055 3.14258C4.59625 3.14258 3.36768 4.37116 3.36768 5.88545C3.36768 7.39975 4.59625 8.6569 6.11055 8.6569C7.62484 8.6569 8.85342 7.39975 8.85342 5.88545C8.85342 4.37116 7.62484 3.14258 6.11055 3.14258Z" fill="black"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{get_settings('contact_instagram')}}" target="_blank" class="ft-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 29" fill="none">
                                            <g clip-path="url(#clip0_28_2021)">
                                                <path d="M17.5739 12.3843L27.9816 0.286133H25.5153L16.4783 10.7908L9.26047 0.286133H0.935547L11.8503 16.171L0.935547 28.8577H3.40198L12.9453 17.7645L20.5679 28.8577H28.8928L17.5733 12.3843H17.5739ZM14.1958 16.3109L13.0899 14.7292L4.29067 2.14282H8.07897L15.18 12.3004L16.2859 13.8822L25.5165 27.0855H21.7282L14.1958 16.3115V16.3109Z" fill="black"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_28_2021">
                                                <rect width="28.5716" height="28.5716" fill="white" transform="translate(0.628418 0.286133)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-nav-main">
                            <div class="footer-nav-wrap">
                                <h3 class="ft-nav-title min-w-225px builder-editable" builder-identity="COF2">{{get_phrase('Quick Links')}}</h3>
                                <ul class="ft-navbar-nav">
                                    <li class="ft-nav-item"><a href="{{route('home')}}" class="ft-nav-link">{{get_phrase('Home')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('blog')}}" class="ft-nav-link">{{get_phrase('Blog')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('events')}}" class="ft-nav-link">{{get_phrase('Events')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('store')}}" class="ft-nav-link">{{get_phrase('Store')}}</a></li>
                                </ul>
                            </div>
                             @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                            @endphp
                            <div class="footer-nav-wrap">
                                <h3 class="ft-nav-title min-w-225px builder-editable" builder-identity="COF3">{{get_phrase('Top Categories')}}</h3>
                                <ul class="ft-navbar-nav">
                                     @foreach($categories as $category)
                                    <li><a href="{{ route('products', $category->slug) }}" class="ft-nav-link">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="footer-nav-wrap">
                                <h3 class="ft-nav-title min-w-225px builder-editable" builder-identity="COF4">{{get_phrase('Support')}}</h3>
                                <ul class="ft-navbar-nav">
                                     <li class="ft-nav-item"><a href="{{route('contact_us')}}" class="ft-nav-link">{{get_phrase('Contact  Us')}}</a></li>
                                     <li class="ft-nav-item"><a href="{{route('about_us')}}" class="ft-nav-link">{{get_phrase('About Us')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('refund_policy')}}" class="ft-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-copyright-area d-flex justify-content-center justify-content-sm-between column-gap-4 row-gap-3 flex-wrap flex-column flex-sm-row">
                            <p class="ft-copyright-text builder-editable" builder-identity="COF5">  {{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}} </p>
                            <ul class="ft-bottom-nav">
                                <li><a href="{{route('terms_and_conditions')}}" class="ft-bottom-navlink">{{get_phrase('Terms of Use')}}</a></li>
                                <li><a href="{{route('privacy_policy')}}" class="ft-bottom-navlink">{{get_phrase('Privacy Policy')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->

    <!-- Scroll Top -->
    <div class="scroll-progress-wrap">
        <svg class="scroll-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- Scroll Top -->

 {{-- Coffe --}}
<script src="{{ asset('assets/frontend/coffee/vendors/swiper/swiper-bundle.min.js') }}"></script>
{{-- <script src="{{ asset('assets/frontend/coffee/vendors/wow-js/wow.min.js') }}"></script> --}}
<script src="{{ asset('assets/frontend/coffee/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/coffee/js/script.js') }}"></script>