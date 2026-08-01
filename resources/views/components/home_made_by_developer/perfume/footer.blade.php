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
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-top-area">
                        <div class="footer-logo-area">
                            <a href="{{route('home')}}" class="footer-logo">
                                <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                            </a>
                            <div class="mb-20px"> 
                                <p class="footer-info">{{get_settings('summary')}}</p>
                            </div>
                            <ul class="d-flex align-items-center gap-22px flex-wrap">
                                <li>
                                    <a  href="{{get_settings('contact_facebook')}}" target="_blank" class="footer-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 33 33" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0242 32.9203V18.048H6.17285V12.7441H12.0263V7.84777C12.0263 2.9123 15.237 0 20.0943 0C22.4179 0 24.3135 0.228456 24.9001 0.296375V5.84106L20.9896 5.839C18.351 5.839 17.857 7.03068 17.857 8.69779V12.7441H24.6201L23.6672 18.048H17.857V32.9203H12.0242Z" fill="white"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a  href="{{get_settings('contact_twitter')}}" target="_blank" class="footer-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 34 33" fill="none">
                                            <path d="M20.4743 13.8926L32.4116 0H29.5302L19.2394 12.1431L10.9038 0H1.23047L13.7853 18.3176L1.23047 32.9306H4.11189L15.1231 20.17L23.8702 32.9306H33.4407L20.4743 13.8926ZM16.5638 18.4205L15.3289 16.6711L5.14097 2.16107H9.46311L17.6958 13.8926L18.9307 15.7449L29.6331 30.8724H25.311L16.5638 18.4205Z" fill="white"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a  href="{{get_settings('contact_linkedin')}}" target="_blank" class="footer-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 34 33" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4919 31.2614V21.1085C25.4919 18.684 25.4446 15.57 22.2091 15.57C18.9223 15.57 18.4221 18.2085 18.4221 20.9294V31.2614H12.1077V10.3814H18.1669V13.2319H18.2513C19.0951 11.5936 21.1554 9.85859 24.2282 9.85859C30.6188 9.85859 31.7981 14.1828 31.7981 19.8077V31.2614H25.4919ZM4.98851 7.52669C2.96328 7.52669 1.3291 5.84106 1.3291 3.76026C1.3291 1.68563 2.96534 0 4.98851 0C7.00757 0 8.64792 1.68563 8.64792 3.76026C8.64792 5.84106 7.00757 7.52669 4.98851 7.52669ZM8.14779 31.2614H1.82923V10.3814H8.14779V31.2614Z" fill="white"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a  href="{{get_settings('contact_instagram')}}" target="_blank"class="footer-social-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 34 33" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.9341 22.8977C31.8578 24.5564 31.5944 25.6916 31.2096 26.683C30.818 27.7238 30.204 28.6666 29.4106 29.4457C28.631 30.2394 27.6876 30.8534 26.6461 31.2448C25.6547 31.6313 24.5195 31.8947 22.8608 31.971C21.197 32.0472 20.6649 32.0646 16.4307 32.0646C12.1931 32.0646 11.661 32.0472 9.99713 31.971C8.33847 31.8947 7.20323 31.6313 6.21185 31.2448C5.17042 30.8534 4.22698 30.2394 3.44741 29.4457C2.58082 28.5791 2.04873 27.7091 1.6501 26.683C1.2636 25.6916 1.00015 24.5564 0.92389 22.8977C0.849363 21.2339 0.832031 20.7035 0.832031 16.4659C0.832031 12.23 0.851096 11.6979 0.925623 10.034C1.00188 8.37362 1.26533 7.24012 1.65356 6.24874C2.04402 5.20819 2.65679 4.26537 3.44915 3.48603C4.22814 2.69202 5.17096 2.07748 6.21185 1.68525C7.20323 1.30048 8.33847 1.03704 9.99713 0.96078C11.661 0.884519 12.1931 0.867188 16.4307 0.867188C20.6684 0.867188 21.1987 0.884519 22.8626 0.96078C24.5212 1.03704 25.6565 1.30048 26.6479 1.68525C27.6739 2.08389 28.544 2.61771 29.4123 3.48603C30.2789 4.35263 30.8127 5.22269 31.2113 6.24874C31.5961 7.24012 31.8596 8.37362 31.9358 10.034C32.0121 11.6979 32.0294 12.23 32.0294 16.4659C32.0294 20.7035 32.0103 21.2339 31.9341 22.8977ZM29.1263 10.1623C29.057 8.64053 28.8022 7.81554 28.589 7.26612C28.3382 6.58899 27.9398 5.97621 27.4226 5.47227C26.9194 4.9542 26.3064 4.5556 25.6288 4.30583C25.0793 4.09265 24.2526 3.83787 22.7343 3.76854C21.0878 3.69228 20.5938 3.67842 16.429 3.67842C12.2641 3.67842 11.7702 3.69228 10.1254 3.76854C8.60538 3.83787 7.77865 4.09265 7.23096 4.30583C6.50302 4.58834 5.98307 4.92631 5.43538 5.47227C4.91822 5.97621 4.51976 6.58899 4.26894 7.26612C4.05576 7.81554 3.80098 8.64053 3.73165 10.1623C3.65713 11.8071 3.6398 12.301 3.6398 16.4659C3.6398 20.6307 3.65713 21.1247 3.73165 22.7695C3.80098 24.2895 4.05576 25.1162 4.26894 25.6656C4.55319 26.3936 4.88942 26.9135 5.43538 27.4595C5.98133 28.0054 6.50129 28.3434 7.22923 28.6259C7.77865 28.8391 8.60538 29.0939 10.1254 29.1632C11.7719 29.2377 12.2641 29.2533 16.429 29.2533C20.5938 29.2533 21.0878 29.2377 22.7326 29.1632C24.2526 29.0939 25.0793 28.8391 25.6288 28.6259C26.3567 28.3434 26.8766 28.0054 27.4226 27.4595C27.9686 26.9135 28.3065 26.3936 28.589 25.6656C28.8022 25.1162 29.057 24.2895 29.1263 22.7695C29.2008 21.1247 29.2182 20.6307 29.2182 16.4659C29.2182 12.301 29.2008 11.8071 29.1263 10.1623ZM24.7552 10.0098C24.5094 10.0098 24.266 9.96134 24.0389 9.86727C23.8118 9.7732 23.6054 9.63532 23.4316 9.4615C23.2578 9.28769 23.1199 9.08134 23.0259 8.85423C22.9318 8.62713 22.8834 8.38373 22.8834 8.13791C22.8834 7.8921 22.9318 7.64869 23.0259 7.42159C23.1199 7.19448 23.2578 6.98813 23.4316 6.81432C23.6054 6.6405 23.8118 6.50262 24.0389 6.40855C24.266 6.31448 24.5094 6.26607 24.7552 6.26607C25.2517 6.26607 25.7278 6.46328 26.0788 6.81432C26.4299 7.16536 26.6271 7.64147 26.6271 8.13791C26.6271 8.63435 26.4299 9.11047 26.0788 9.4615C25.7278 9.81254 25.2517 10.0098 24.7552 10.0098ZM16.4307 24.4749C14.3064 24.4749 12.269 23.631 10.7668 22.1289C9.2647 20.6267 8.42079 18.5894 8.42079 16.465C8.42079 14.3406 9.2647 12.3033 10.7668 10.8011C12.269 9.29898 14.3064 8.45508 16.4307 8.45508C18.5551 8.45508 20.5924 9.29898 22.0946 10.8011C23.5968 12.3033 24.4407 14.3406 24.4407 16.465C24.4407 18.5894 23.5968 20.6267 22.0946 22.1289C20.5924 23.631 18.5551 24.4749 16.4307 24.4749ZM16.4307 11.2663C15.0517 11.2663 13.7292 11.8141 12.7541 12.7892C11.779 13.7643 11.2312 15.0869 11.2312 16.4659C11.2312 17.8449 11.779 19.1674 12.7541 20.1425C13.7292 21.1176 15.0517 21.6654 16.4307 21.6654C17.8097 21.6654 19.1323 21.1176 20.1074 20.1425C21.0825 19.1674 21.6303 17.8449 21.6303 16.4659C21.6303 15.0869 21.0825 13.7643 20.1074 12.7892C19.1323 11.8141 17.8097 11.2663 16.4307 11.2663Z" fill="white"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-nav-main">
                            <nav class="footer-navbar">
                                <h3 class="footer-nav-title builder-editable" builder-identity="PF1">{{get_phrase('Quick Links')}}</h3>
                                <ul class="footer-navbar-nav">
                                    <li class="footer-nav-item">
                                        <a href="{{route('home')}}" class="footer-nav-link">{{get_phrase('Home')}}</a>
                                    </li>
                                    <li class="footer-nav-item">
                                        <a href="{{route('blog')}}" class="footer-nav-link">{{get_phrase('Blog')}}</a>
                                    </li>
                                    <li class="footer-nav-item">
                                        <a href="{{get_phrase('events')}}" class="footer-nav-link">{{get_phrase('Events')}}</a>
                                    </li>
                                    <li class="footer-nav-item">
                                        <a href="{{get_phrase('store')}}" class="footer-nav-link">{{get_phrase('Store')}}</a>
                                    </li>
                                    <li class="footer-nav-item">
                                        <a href="{{get_phrase('contact_us')}}" class="footer-nav-link">{{get_phrase('Contact Us')}}</a>
                                    </li>
                                    
                                </ul>
                            </nav>
                             @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                            @endphp
                            <nav class="footer-navbar">
                                <h3 class="footer-nav-title builder-editable" builder-identity="PF2">{{get_phrase('Top Categories')}}</h3>
                                <ul class="footer-navbar-nav">
                                    @foreach($categories as $category)
                                    <li class="footer-nav-item"><a href="{{ route('products', $category->slug) }}" class="footer-nav-link">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                            <nav class="footer-navbar">
                                <h3 class="footer-nav-title builder-editable" builder-identity="PF3">{{get_phrase('Support')}}</h3>
                                <ul class="footer-navbar-nav">
                                    <li class="footer-nav-item"><a href="{{route('about_us')}}" class="footer-nav-link">{{get_phrase('About Us')}}</a></li>
                                    <li class="footer-nav-item"><a href="{{route('terms_and_conditions')}}" class="footer-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                    <li class="footer-nav-item"><a href="{{route('privacy_policy')}}" class="footer-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                    <li class="footer-nav-item"><a href="{{route('refund_policy')}}" class="footer-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <h2 class="footer-large-title builder-editable" builder-identity="PF4">{{get_phrase('Aurelique')}}</h2>
                    <div class="ft-copyright-area">
                       <p class="footer-copyright-text builder-editable" builder-identity="PF5">  {{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}} </p>
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


 {{-- Watch --}}
<script src="{{ asset('assets/frontend/perfume/vendors/swiper/swiper-bundle.min.js') }}"></script>
{{-- <script src="{{ asset('assets/frontend/perfume/vendors/wow-js/wow.min.js') }}"></script> --}}
<script src="{{ asset('assets/frontend/perfume/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/perfume/js/script.js') }}"></script>