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

    
    <!--Footer Start -->
    <section class="footer-section pt-0 wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="footer-section-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="footer-middle-wrap">
                            <div class="footer-logo-area">
                                <a href="{{route('home')}}" class="footer-logo">
                                    <img class="logo" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                                </a>
                                <p class="ft-info-text">{{get_phrase('We have clothes that suits your style and which you’re proud to wear. For the man.')}}</p>
                                <ul class="d-flex align-items-center gap-12px flex-wrap">
                                    <li>
                                        <a href="{{get_settings('contact_twitter')}}" target="_blank" class="ft-social-link">
                                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.2728 2.08811C11.8293 2.2852 11.3613 2.40838 10.8685 2.48229C11.3613 2.18666 11.7554 1.71857 11.9279 1.15194C11.4598 1.42294 10.9425 1.62003 10.3758 1.74321C9.93238 1.27512 9.29184 0.979492 8.60203 0.979492C7.27169 0.979492 6.1877 2.06348 6.1877 3.39382C6.1877 3.59091 6.21234 3.76336 6.26161 3.93581C4.26609 3.83727 2.46766 2.87647 1.2605 1.3983C1.06341 1.76784 0.94023 2.16202 0.94023 2.60547C0.94023 3.44309 1.35904 4.18217 2.02421 4.62562C1.63004 4.60099 1.2605 4.50244 0.915594 4.32999V4.35463C0.915594 5.53716 1.75322 6.5226 2.86184 6.74432C2.66475 6.79359 2.44303 6.81823 2.2213 6.81823C2.07349 6.81823 1.90103 6.79359 1.75322 6.76896C2.07349 7.72976 2.96038 8.44421 4.01973 8.44421C3.18211 9.08474 2.14739 9.47892 1.01414 9.47892C0.81705 9.47892 0.619962 9.47892 0.44751 9.45428C1.53149 10.1441 2.78793 10.5383 4.16755 10.5383C8.62667 10.5383 11.0656 6.84286 11.0656 3.64018C11.0656 3.54164 11.0656 3.41846 11.0656 3.31991C11.5337 2.99965 11.9525 2.58083 12.2728 2.08811Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{get_settings('contact_facebook')}}" target="_blank" class="ft-social-link">
                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.66899 12.952V7.07472H0.691162V4.78423H2.66899V3.09506C2.66899 1.13479 3.86625 0.0673828 5.61495 0.0673828C6.45259 0.0673828 7.17251 0.129747 7.3823 0.157622V2.20622L6.16949 2.20677C5.21845 2.20677 5.03431 2.65869 5.03431 3.32185V4.78423H7.30245L7.00712 7.07472H5.03431V12.952H2.66899Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{get_settings('contact_instagram')}}" target="_blank" class="ft-social-link">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.36806 1.4041C9.2822 1.4041 9.50888 1.41127 10.265 1.44575C10.7197 1.45132 11.17 1.5348 11.5964 1.69257C11.9057 1.81183 12.1865 1.99453 12.4209 2.22889C12.6553 2.46325 12.8379 2.74409 12.9572 3.05333C13.115 3.47976 13.1985 3.93009 13.204 4.38473C13.2382 5.1409 13.2457 5.36758 13.2457 7.28173C13.2457 9.19587 13.2385 9.42255 13.204 10.1787C13.1985 10.6334 13.115 11.0837 12.9572 11.5101C12.8379 11.8194 12.6553 12.1002 12.4209 12.3346C12.1865 12.5689 11.9057 12.7516 11.5964 12.8709C11.17 13.0287 10.7197 13.1121 10.265 13.1177C9.50922 13.1518 9.28254 13.1593 7.36806 13.1593C5.45357 13.1593 5.22689 13.1522 4.47106 13.1177C4.01642 13.1121 3.56609 13.0287 3.13966 12.8709C2.83042 12.7516 2.54958 12.5689 2.31522 12.3346C2.08086 12.1002 1.89816 11.8194 1.7789 11.5101C1.62113 11.0837 1.53765 10.6334 1.53208 10.1787C1.49794 9.42255 1.49043 9.19587 1.49043 7.28173C1.49043 5.36758 1.4976 5.1409 1.53208 4.38473C1.53765 3.93009 1.62113 3.47976 1.7789 3.05333C1.89816 2.74409 2.08086 2.46325 2.31522 2.22889C2.54958 1.99453 2.83042 1.81183 3.13966 1.69257C3.56609 1.5348 4.01642 1.45132 4.47106 1.44575C5.22723 1.41162 5.45391 1.4041 7.36806 1.4041ZM7.36806 0.112305C5.42216 0.112305 5.17705 0.120498 4.41235 0.155319C3.81733 0.167154 3.22863 0.279816 2.67128 0.488511C2.19317 0.668648 1.76012 0.950938 1.40236 1.31569C1.03728 1.67358 0.754747 2.10688 0.574498 2.5853C0.365803 3.14264 0.253141 3.73134 0.241306 4.32636C0.207168 5.09038 0.198975 5.33549 0.198975 7.28138C0.198975 9.22728 0.207168 9.47239 0.241989 10.2371C0.253824 10.8321 0.366486 11.4208 0.575181 11.9782C0.75523 12.4565 1.03753 12.8898 1.40236 13.2478C1.76032 13.6126 2.19361 13.8949 2.67197 14.0749C3.22931 14.2836 3.81801 14.3963 4.41303 14.4081C5.17773 14.4423 5.42182 14.4511 7.36874 14.4511C9.31566 14.4511 9.55975 14.443 10.3244 14.4081C10.9195 14.3963 11.5082 14.2836 12.0655 14.0749C12.5416 13.8904 12.9739 13.6085 13.3349 13.2474C13.6958 12.8862 13.9774 12.4537 14.1616 11.9775C14.3703 11.4201 14.483 10.8314 14.4948 10.2364C14.5289 9.47239 14.5371 9.22728 14.5371 7.28138C14.5371 5.33549 14.5289 5.09038 14.4941 4.32568C14.4823 3.73066 14.3696 3.14196 14.1609 2.58461C13.9809 2.10626 13.6986 1.67297 13.3338 1.315C12.9758 0.950173 12.5425 0.667877 12.0641 0.487828C11.5068 0.279133 10.9181 0.166472 10.3231 0.154636C9.55906 0.120498 9.31395 0.112305 7.36806 0.112305Z" fill="black"/>
                                                <path d="M7.36948 3.60156C6.64135 3.60156 5.92957 3.81748 5.32416 4.22201C4.71874 4.62653 4.24687 5.2015 3.96823 5.87421C3.68958 6.54691 3.61668 7.28714 3.75873 8.00128C3.90078 8.71542 4.25141 9.3714 4.76627 9.88626C5.28114 10.4011 5.93712 10.7518 6.65126 10.8938C7.3654 11.0359 8.10563 10.963 8.77833 10.6843C9.45104 10.4057 10.026 9.9338 10.4305 9.32838C10.8351 8.72297 11.051 8.01119 11.051 7.28306C11.051 6.30666 10.6631 5.37026 9.97269 4.67985C9.28228 3.98943 8.34588 3.60156 7.36948 3.60156ZM7.36948 9.67275C6.89685 9.67275 6.43482 9.5326 6.04184 9.27001C5.64886 9.00743 5.34256 8.63421 5.16169 8.19755C4.98082 7.76089 4.9335 7.2804 5.02571 6.81685C5.11791 6.35329 5.34551 5.92749 5.67972 5.59329C6.01392 5.25908 6.43972 5.03149 6.90328 4.93928C7.36683 4.84707 7.84732 4.8944 8.28398 5.07527C8.72064 5.25614 9.09386 5.56243 9.35644 5.95541C9.61902 6.3484 9.75918 6.81042 9.75918 7.28306C9.75918 7.91684 9.50741 8.52467 9.05925 8.97282C8.6111 9.42098 8.00327 9.67275 7.36948 9.67275Z" fill="black"/>
                                                <path d="M11.1953 4.3155C11.6703 4.3155 12.0552 3.93051 12.0552 3.4556C12.0552 2.98069 11.6703 2.5957 11.1953 2.5957C10.7204 2.5957 10.3354 2.98069 10.3354 3.4556C10.3354 3.93051 10.7204 4.3155 11.1953 4.3155Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-nav-wrap">
                                <h4 class="ft-nav-title">{{get_phrase('Quick Link')}}</h4>
                                <ul>
                                    <li class="ft-nav-item"><a href="{{route('home')}}" class="ft-nav-link">{{get_phrase('Home')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{get_phrase('blog')}}" class="ft-nav-link">{{get_phrase('Blog')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('events')}}" class="ft-nav-link">{{get_phrase('Events')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('store')}}" class="ft-nav-link">{{get_phrase('Store')}}</a></li>
                                </ul>
                            </div>
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                            @endphp
                            <div class="footer-nav-wrap">
                                <h4 class="ft-nav-title">{{get_phrase('Categories')}}</h4>
                                <ul>
                                   @foreach($categories as $category)
                                    <li class="ft-nav-item"><a href="{{ route('products', $category->slug) }}" class="ft-nav-link">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="footer-nav-wrap">
                                <h4 class="ft-nav-title">{{get_phrase('Support')}}</h4>
                                <ul>
                                    <li class="ft-nav-item"><a href="{{route('about_us')}}" class="ft-nav-link">{{get_phrase('About Us')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('terms_and_conditions')}}" class="ft-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('privacy_policy')}}" class="ft-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                    <li class="ft-nav-item"><a href="{{route('refund_policy')}}" class="ft-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="footer-copyright-area">
                            <p class="ft-copyright-text">{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Footer End -->

    <!-- Scroll Top -->
    <div class="scroll-progress-wrap">
        <svg class="scroll-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- Scroll Top -->
 {{-- Men Cloting --}}
<script src="{{ asset('assets/frontend/men-clothing/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/men-clothing/vendors/wow-js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/men-clothing/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/men-clothing/js/script.js') }}"></script>