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
<footer class="fn-footer-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="fn-footer-area">
                    <div class="footer-logo-area">
                        <a href="{{route('home')}}" class="fn-footer-logo">
                            <img class="logo" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                        </a>
                        <p class="footer-info-subtitle mb-4">{{get_settings('summary')}}</p>
                       
                        <ul class="d-flex align-items-center gap-12px flex-wrap">
                            <li>
                                <a href="{{get_settings('contact_instagram')}}" target="_blank" class="footer-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_32_67)">
                                            <path d="M17.0961 0.418945H6.61433C3.20292 0.418945 0.427628 3.19424 0.427628 6.60565V17.0876C0.427628 20.4989 3.20292 23.2742 6.61433 23.2742H17.0963C20.5076 23.2742 23.2828 20.4989 23.2828 17.0876V6.60565C23.2828 3.19424 20.5076 0.418945 17.0961 0.418945ZM21.943 17.0876C21.943 19.7601 19.7687 21.9343 17.0961 21.9343H6.61433C3.94174 21.9343 1.7675 19.7601 1.7675 17.0876V6.60565C1.7675 3.93305 3.94174 1.75882 6.61433 1.75882H17.0963C19.7687 1.75882 21.943 3.93305 21.943 6.60565V17.0876Z" fill="black"/>
                                            <path d="M11.8542 5.59668C8.40824 5.59668 5.60487 8.40005 5.60487 11.846C5.60487 15.2919 8.40824 18.0953 11.8542 18.0953C15.3001 18.0953 18.1035 15.2919 18.1035 11.846C18.1035 8.40005 15.3001 5.59668 11.8542 5.59668ZM11.8542 16.7554C9.14723 16.7554 6.94474 14.5531 6.94474 11.846C6.94474 9.13904 9.14723 6.93655 11.8542 6.93655C14.5613 6.93655 16.7636 9.13904 16.7636 11.846C16.7636 14.5531 14.5613 16.7554 11.8542 16.7554Z" fill="black"/>
                                            <path d="M18.2532 3.37695C17.2349 3.37695 16.4066 4.20539 16.4066 5.22355C16.4066 6.24188 17.2349 7.07032 18.2532 7.07032C19.2716 7.07032 20.1 6.24188 20.1 5.22355C20.1 4.20522 19.2716 3.37695 18.2532 3.37695ZM18.2532 5.73027C17.9739 5.73027 17.7465 5.50289 17.7465 5.22355C17.7465 4.94403 17.9739 4.71682 18.2532 4.71682C18.5327 4.71682 18.7601 4.94403 18.7601 5.22355C18.7601 5.50289 18.5327 5.73027 18.2532 5.73027Z" fill="black"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_32_67">
                                            <rect width="22.8553" height="22.8553" fill="white" transform="translate(0.427628 0.418945)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{get_settings('contact_linkedin')}}" target="_blank" class="footer-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <path d="M18.5433 18.9882V12.2916C18.5433 9.00041 17.8348 6.48633 13.9951 6.48633C12.1439 6.48633 10.9097 7.49196 10.4069 8.45188H10.3611V6.78345H6.72716V18.9882H10.5211V12.9315C10.5211 11.3316 10.8183 9.80034 12.7838 9.80034C14.7265 9.80034 14.7494 11.6059 14.7494 13.0229V18.9653H18.5433V18.9882Z" fill="black"/>
                                        <path d="M0.556229 6.7832H4.3502V18.9879H0.556229V6.7832Z" fill="black"/>
                                        <path d="M2.45323 0.704102C1.2419 0.704102 0.259125 1.68688 0.259125 2.89821C0.259125 4.10954 1.2419 5.11517 2.45323 5.11517C3.66456 5.11517 4.64734 4.10954 4.64734 2.89821C4.64734 1.68688 3.66456 0.704102 2.45323 0.704102Z" fill="black"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{get_settings('contact_twitter')}}" target="_blank" class="footer-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_32_77)">
                                            <path d="M14.302 10.0966L22.6274 0.418945H20.6546L13.4256 8.82191L7.65184 0.418945H0.992493L9.72355 13.1257L0.992493 23.2742H2.96547L10.5994 14.4004L16.697 23.2742H23.3563L14.3015 10.0966H14.302ZM11.5997 13.2377L10.7151 11.9724L3.67636 1.90416H6.70673L12.3871 10.0295L13.2717 11.2948L20.6555 21.8565H17.6251L11.5997 13.2381V13.2377Z" fill="black"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_32_77">
                                            <rect width="22.8553" height="22.8553" fill="white" transform="translate(0.746399 0.418945)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-nav-area">
                        <h3 class="footer-nav-title">{{get_phrase('Quick Links')}}</h3>
                        <ul class="footer-nav">
                            <li><a class="footer-nav-link " href="{{route('home')}}">{{get_phrase('Home')}}</a></li>
                            <li><a class="footer-nav-link " href="{{route('blog')}}">{{get_phrase('Blog')}}</a></li>
                            <li><a class="footer-nav-link " href="{{route('store')}}">{{get_phrase('Store')}}</a></li>
                            <li><a class="footer-nav-link " href="{{route('events')}}">{{get_phrase('Events')}}</a></li>
                            <li><a class="footer-nav-link " href="{{route('contact_us')}}">{{get_phrase('Contact Us')}}</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav-area">
                        <h3 class="footer-nav-title">{{get_phrase('Top Categories')}}</h3>
                        @php
                           $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                        @endphp
                         <ul class="footer-nav">
                            @foreach($categories as $category)
                               <li><a href="{{ route('products', $category->slug) }}" class="footer-nav-link">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-nav-area">
                        <h3 class="footer-nav-title">{{get_phrase('Support')}}</h3>
                        <ul class="footer-nav">
                            <li><a href="{{route('about_us')}}" class="footer-nav-link">{{get_phrase('About Us')}}</a></li>
                            <li><a href="{{route('refund_policy')}}" class="footer-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center column-gap-4 row-gap-3 justify-content-between flex-wrap flex-column flex-md-row">
                        <p class="ft-copyright-text text-center">{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
                        <div class="footer-terms-area d-flex align-items-center column-gap-22px row-gap-2 flex-wrap justify-content-center">
                            <a href="{{route('terms_and_conditions')}}" class="ft-bottom-link">{{get_phrase('Terms and condition')}}</a>
                            <a href="{{route('privacy_policy')}}" class="ft-bottom-link">{{get_phrase('Privacy Policy')}}</a>
                        </div>
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
<script src="{{ asset('assets/frontend/fitness/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/fitness/vendors/wow-js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/fitness/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/fitness/js/script.js') }}"></script> 