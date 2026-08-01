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
    <!-- Start Text Slider -->
   
    <!-- Footer Middle - bottom Area -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Footer Middle Area -->
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                        <nav class="footer-navbar">
                            <h4 class="footer-nav-title builder-editable" builder-identity="DF1">{{get_phrase('Quick Links')}}</h4>
                            <ul class="ft-navbar-nav">
                                <li class="ft-nav-item"><a href="{{route('home')}}" class="ft-nav-link">{{get_phrase('Home')}}</a></li>
                                <li class="ft-nav-item"><a href="{{route('blog')}}" class="ft-nav-link">{{get_phrase('Blog')}}</a></li>
                                <li class="ft-nav-item"><a href="{{route('store')}}" class="ft-nav-link">{{get_phrase('Store')}}</a></li>
                                <li class="ft-nav-item"><a href="{{route('events')}}" class="ft-nav-link">{{get_phrase('Events')}}</a></li>
                                <li class="ft-nav-item"><a href="{{route('contact_us')}}" class="ft-nav-link">{{get_phrase('Contact us')}}</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                         @php
                            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                        @endphp
                        <nav class="footer-navbar">
                             <h4 class="footer-nav-title builder-editable" builder-identity="DF2">{{get_phrase('Top Categories')}}</h4>
                              <ul class="ft-navbar-nav">
                                 @foreach($categories as $category)
                                   <li class="ft-nav-item"><a href="{{ route('products', $category->slug) }}" class="ft-nav-link">{{ $category->title }}</a></li>
                                 @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                         <nav class="footer-navbar">
                            <h4 class="footer-nav-title builder-editable" builder-identity="DF3">{{get_phrase('Support')}}</h4>
                            <ul class="ft-navbar-nav">
                               <li class="ft-nav-item"><a href="{{route('about_us')}}" class="ft-nav-link">{{get_phrase('About Us')}}</a></li>
                                <li class="ft-nav-item"><a href="{{route('terms_and_conditions')}}" class="ft-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                <li class="ft-nav-item"><a href="{{route('privacy_policy')}}" class="ft-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                <li class="ft-nav-item"><a href="{{route('refund_policy')}}" class="ft-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                         <div class="footer-newsletter-area">
                        <div class="max-w-405px">
                            <a href="{{route('home')}}" class="footer-logo mb-3">
                                <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                            </a>
                        </div>
                       <h4 class="ft-bottom-title builder-editable" builder-identity="DF4">{{get_phrase('Our Social Links:')}}</h4>
                        <ul class="d-flex align-items-center gap-6px flex-wrap">
                            <li>
                                <a href="{{get_settings('contact_facebook')}}" target="_blank" class="ft-social-link" target="_blank">
                                    <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="0.5" width="30" height="30" rx="15" fill="#365493"/>
                                        <path d="M18.2888 16.375L18.6853 13.8457H16.2517V12.1914C16.2517 11.8451 16.3542 11.5306 16.5593 11.248C16.7644 10.9655 17.1358 10.8242 17.6736 10.8242H18.781V8.67773C18.781 8.67773 18.5736 8.64811 18.1589 8.58887C17.7442 8.52962 17.2999 8.5 16.8259 8.5C16.3246 8.5 15.8689 8.57292 15.4587 8.71875C15.0486 8.8737 14.7 9.09473 14.4128 9.38184C14.1257 9.66895 13.9047 10.0267 13.7498 10.4551C13.5948 10.8743 13.5173 11.3574 13.5173 11.9043V13.8457H11.2888V16.375H13.5173V22.5H16.2517V16.375H18.2888Z" fill="white"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{get_settings('contact_twitter')}}" target="_blank" class="ft-social-link" target="_blank">
                                    <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="0.5" width="30" height="30" rx="15" fill="black"/>
                                        <path d="M18.7205 9.15625H20.8669L16.1501 14.543L21.6599 21.8438H17.3396L13.9626 17.4004L10.0798 21.8438H7.93335L12.9373 16.0879L7.65991 9.15625H12.0896L15.1384 13.2168L18.7205 9.15625ZM17.9685 20.5859H19.158L11.4607 10.373H10.1892L17.9685 20.5859Z" fill="white"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{get_settings('contact_instagram')}}" target="_blank" class="ft-social-link" target="_blank">
                                    <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="0.5" width="30" height="30" rx="15" fill="#774430"/>
                                        <path d="M14.7849 12.3555C14.3565 12.3555 13.9509 12.4375 13.5681 12.6016C13.1853 12.7656 12.8503 12.9889 12.5632 13.2715C12.2761 13.554 12.0505 13.8867 11.8865 14.2695C11.7224 14.6523 11.6404 15.0625 11.6404 15.5C11.6404 15.9284 11.7224 16.334 11.8865 16.7168C12.0505 17.0996 12.2761 17.4346 12.5632 17.7217C12.8503 18.0088 13.1853 18.2344 13.5681 18.3984C13.9418 18.5625 14.3474 18.6445 14.7849 18.6445C15.2224 18.6445 15.6326 18.5625 16.0154 18.3984C16.3982 18.2344 16.7309 18.0088 17.0134 17.7217C17.296 17.4346 17.5193 17.0996 17.6833 16.7168C17.8474 16.3431 17.9294 15.9375 17.9294 15.5C17.9294 15.0625 17.8474 14.6523 17.6833 14.2695C17.5193 13.8867 17.296 13.554 17.0134 13.2715C16.7309 12.9889 16.3982 12.7656 16.0154 12.6016C15.6326 12.4375 15.2224 12.3555 14.7849 12.3555ZM14.7849 17.5371C14.2289 17.5371 13.7504 17.3389 13.3494 16.9424C12.9483 16.5459 12.7478 16.0651 12.7478 15.5C12.7478 14.9349 12.946 14.4518 13.3425 14.0508C13.739 13.6497 14.2198 13.4492 14.7849 13.4492C15.35 13.4492 15.8331 13.6497 16.2341 14.0508C16.6352 14.4518 16.8357 14.9349 16.8357 15.5C16.8357 16.0651 16.6352 16.5459 16.2341 16.9424C15.8331 17.3389 15.35 17.5371 14.7849 17.5371ZM18.7908 12.2324C18.7908 12.4329 18.7201 12.6038 18.5789 12.7451C18.4376 12.8864 18.2621 12.957 18.0525 12.957C17.852 12.957 17.6811 12.8864 17.5398 12.7451C17.3985 12.6038 17.3279 12.4329 17.3279 12.2324C17.3279 12.0228 17.3985 11.8473 17.5398 11.7061C17.6811 11.5648 17.852 11.4941 18.0525 11.4941C18.2621 11.4941 18.4376 11.5648 18.5789 11.7061C18.7201 11.8473 18.7908 12.0228 18.7908 12.2324ZM20.8689 12.9707C20.8507 12.4785 20.7709 12.0182 20.6296 11.5898C20.4884 11.1615 20.24 10.765 19.8845 10.4004C19.5291 10.0449 19.1348 9.79883 18.7019 9.66211C18.269 9.52539 17.8064 9.44336 17.3142 9.41602C17.059 9.39779 16.699 9.38411 16.2341 9.375C15.7784 9.375 15.2976 9.375 14.7917 9.375C14.2859 9.375 13.8005 9.375 13.3357 9.375C12.8708 9.38411 12.5108 9.39779 12.2556 9.41602C11.7725 9.43425 11.3145 9.514 10.8816 9.65527C10.4486 9.79655 10.0499 10.0449 9.6853 10.4004C9.32983 10.7559 9.08374 11.1501 8.94702 11.583C8.8103 12.016 8.72827 12.4785 8.70093 12.9707C8.6827 13.2259 8.67358 13.5814 8.67358 14.0371C8.66447 14.502 8.65991 14.9873 8.65991 15.4932C8.65991 15.999 8.66447 16.4844 8.67358 16.9492C8.67358 17.4141 8.6827 17.7741 8.70093 18.0293C8.72827 18.5124 8.8103 18.9704 8.94702 19.4033C9.08374 19.8363 9.32983 20.2305 9.6853 20.5859C10.0499 20.9505 10.4464 21.2012 10.8748 21.3379C11.3031 21.4746 11.7634 21.5566 12.2556 21.584C12.5108 21.5931 12.8708 21.6022 13.3357 21.6113C13.8005 21.6204 14.2859 21.625 14.7917 21.625C15.2976 21.625 15.7784 21.6204 16.2341 21.6113C16.699 21.6022 17.059 21.5931 17.3142 21.584C17.8064 21.5566 18.2667 21.4746 18.6951 21.3379C19.1235 21.2012 19.5199 20.9505 19.8845 20.5859C20.24 20.2305 20.4861 19.8363 20.6228 19.4033C20.7595 18.9704 20.8416 18.5124 20.8689 18.0293C20.8871 17.7741 20.9008 17.4141 20.9099 16.9492C20.9099 16.4844 20.9099 15.999 20.9099 15.4932C20.9099 14.9873 20.9099 14.5065 20.9099 14.0508C20.9008 13.5859 20.8871 13.2259 20.8689 12.9707ZM19.5701 19.1094C19.4607 19.3737 19.3057 19.6061 19.1052 19.8066C18.9047 20.0072 18.6677 20.1621 18.3943 20.2715C18.1938 20.3535 17.934 20.4128 17.615 20.4492C17.3051 20.4857 16.977 20.5085 16.6306 20.5176C16.2843 20.5267 15.947 20.5312 15.6189 20.5312C15.2908 20.5221 15.0128 20.5176 14.7849 20.5176C14.5662 20.5176 14.2927 20.5221 13.9646 20.5312C13.6365 20.5312 13.2992 20.5267 12.9529 20.5176C12.6065 20.5085 12.2738 20.4857 11.9548 20.4492C11.6358 20.4128 11.3761 20.3535 11.1755 20.2715C10.9112 20.1712 10.6788 20.0208 10.4783 19.8203C10.2778 19.6198 10.1228 19.3828 10.0134 19.1094C9.9314 18.9089 9.87215 18.6491 9.83569 18.3301C9.79923 18.0111 9.77645 17.6784 9.76733 17.332C9.75822 16.9857 9.75366 16.6484 9.75366 16.3203C9.76278 15.9922 9.76733 15.7188 9.76733 15.5C9.76733 15.2721 9.76278 14.9941 9.75366 14.666C9.75366 14.3379 9.75822 14.0007 9.76733 13.6543C9.77645 13.3079 9.79923 12.9798 9.83569 12.6699C9.87215 12.3509 9.9314 12.0911 10.0134 11.8906C10.1137 11.6172 10.2641 11.3802 10.4646 11.1797C10.6651 10.9792 10.9021 10.8242 11.1755 10.7148C11.3761 10.6419 11.6358 10.5872 11.9548 10.5508C12.2738 10.5143 12.6065 10.4893 12.9529 10.4756C13.2992 10.4619 13.6365 10.4596 13.9646 10.4688C14.2927 10.4688 14.5662 10.4688 14.7849 10.4688C15.0128 10.4688 15.2908 10.4688 15.6189 10.4688C15.947 10.4688 16.2843 10.4733 16.6306 10.4824C16.977 10.4915 17.3051 10.5143 17.615 10.5508C17.934 10.5872 18.1938 10.6419 18.3943 10.7148C18.6677 10.8242 18.9047 10.9792 19.1052 11.1797C19.3057 11.3802 19.4607 11.6172 19.5701 11.8906C19.643 12.0911 19.6977 12.3509 19.7341 12.6699C19.7706 12.9798 19.7957 13.3079 19.8093 13.6543C19.823 14.0007 19.8253 14.3379 19.8162 14.666C19.8162 14.9941 19.8162 15.2721 19.8162 15.5C19.8162 15.7188 19.8162 15.9922 19.8162 16.3203C19.8253 16.6484 19.823 16.9857 19.8093 17.332C19.7957 17.6784 19.7706 18.0111 19.7341 18.3301C19.6977 18.6491 19.643 18.9089 19.5701 19.1094Z" fill="white"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-lg-2"></div>
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
 <script src="{{ asset('assets/frontend/drinks/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/drinks/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/drinks/js/script.js') }}"></script>