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
<footer class="footer-section-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-top-area mb-30px pb-30px d-flex align-items-end justify-content-between gap-4 flex-wrap">
                            <div class="">
                                <a href="{{route('home')}}" class="footer-logo mb-3">
                                    <img class="h-30px" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                                </a>
                                <p class="al-subtitle2-16px max-w-337px">{{get_settings('summary')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="footer-middle-area d-flex justify-content-between flex-wrap">
                            <div class="footer-nav-area">
                                <h4 class="al-title-18px text-white mb-4 builder-editable" builder-identity="f2">{{get_phrase('Quick Links')}}</h4>
                                <ul class="d-flex flex-column gap-18px">
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
                                <h4 class="al-title-18px text-white mb-4 builder-editable" builder-identity="f3">{{get_phrase('Top Categories')}}</h4>
                                <ul class="d-flex flex-column gap-18px">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('products', $category->slug) }}" class="footer-nav-link">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="footer-nav-area">
                                <h4 class="al-title-18px text-white mb-4 builder-editable" builder-identity="f4">{{get_phrase('Support')}}</h4>
                                <ul class="d-flex flex-column gap-18px">
                                    <li><a href="{{route('about_us')}}" class="footer-nav-link">{{get_phrase('About Us')}}</a></li>
                                    <li><a href="{{route('privacy_policy')}}" class="footer-nav-link">{{get_phrase('Privacy Policy')}}</a></li>
                                    <li><a href="{{route('refund_policy')}}" class="footer-nav-link">{{get_phrase('Refund Policy')}}</a></li>
                                    <li><a href="{{route('terms_and_conditions')}}" class="footer-nav-link">{{get_phrase('Terms and condition')}}</a></li>
                                </ul>
                            </div>
                            <div class="footer-nav-area">
                                <h4 class="al-title-18px text-white mb-4 builder-editable" builder-identity="f5">{{get_phrase('Contact Us')}}</h4>
                                <ul class="d-flex flex-column gap-18px">
                                    <li>
                                        <a href="tel:{{get_settings('phone')}}" class="footer-nav-link">
                                            <div class="d-flex column-gap-2 align-items-start">
                                                <img src="{{ asset('assets/frontend/grocery/images/image-icons/call-green-24.svg') }}" alt="icon">
                                                <p class="footer-nav-link">{{get_settings('phone')}}</p>
                                            </div>
                                         </a>
                                     </li>
                                    <li>
                                        <a href="mailto:{{get_settings('system_email')}}" class="footer-nav-link">
                                            <div class="d-flex column-gap-2 align-items-start">
                                                <img src="{{ asset('assets/frontend/grocery/images/image-icons/sms-green-24.svg') }}" alt="icon">
                                                <p class="footer-nav-link">{{get_settings('system_email')}}</p>
                                            </div>
                                         </a>
                                     </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copyright-area d-flex align-items-center justify-content-center justify-content-sm-between column-gap-4 row-gap-4 flex-wrap flex-column flex-sm-row">
                    <p class="al-subtitle2-16px lh-1  text-center text-sm-left builder-editable" builder-identity="f6"> {{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
                    <ul class="d-flex align-items-center gap-20px flex-wrap justify-content-center justify-content-sm-start">
                        <li>
                            <a href="{{get_settings('contact_facebook')}}" target="_blank" class="svg-link d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                    <g clip-path="url(#clip0_1208_14439)">
                                      <path d="M18.8134 8.99994C18.8134 4.02941 14.6019 0 9.4067 0C4.21152 0 0 4.02941 0 8.99994C0 13.492 3.43988 17.2154 7.9369 17.8905V11.6015H5.54848V8.99994H7.9369V7.01714C7.9369 4.76153 9.34129 3.5156 11.49 3.5156C12.5188 3.5156 13.5956 3.69138 13.5956 3.69138V5.90621H12.4095C11.241 5.90621 10.8765 6.60001 10.8765 7.31245V8.99994H13.4854L13.0683 11.6015H10.8765V17.8905C15.3735 17.2154 18.8134 13.492 18.8134 8.99994Z" fill="#9E9EA9"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_1208_14439">
                                        <rect width="18.8134" height="17.9999" fill="white"/>
                                      </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{get_settings('contact_twitter')}}" target="_blank" class="svg-link d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                    <g clip-path="url(#clip0_1208_14442)">
                                      <path d="M11.9519 7.63284L18.8509 0.0527344H17.2161L11.2257 6.63443L6.4412 0.0527344H0.922852L8.15795 10.0054L0.922852 17.9543H2.55778L8.88377 11.0038L13.9365 17.9543H19.4549L11.9515 7.63284H11.9519ZM9.71268 10.0931L8.97961 9.10205L3.14687 1.21605H5.65802L10.3651 7.5803L11.0982 8.57136L17.2168 16.8439H14.7057L9.71268 10.0935V10.0931Z" fill="#9E9EA9"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_1208_14442">
                                        <rect width="18.9393" height="17.9016" fill="#9E9EA9" transform="translate(0.719727 0.0527344)"/>
                                      </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{get_settings('contact_instagram')}}" target="_blank" class="svg-link d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                    <g clip-path="url(#clip0_1208_14435)">
                                      <path d="M9.5629 1.62069C11.967 1.62069 12.2517 1.63124 13.1971 1.67343C14.0758 1.7121 14.5503 1.85975 14.8666 1.9828C15.2849 2.14452 15.5871 2.34139 15.9 2.65428C16.2163 2.97068 16.4096 3.26951 16.5713 3.68787C16.6943 4.00427 16.8419 4.48239 16.8806 5.35778C16.9227 6.30699 16.9333 6.59175 16.9333 8.99291C16.9333 11.3976 16.9227 11.6823 16.8806 12.628C16.8419 13.5069 16.6943 13.9815 16.5713 14.298C16.4096 14.7163 16.2128 15.0186 15.9 15.3315C15.5836 15.6479 15.2849 15.8413 14.8666 16.003C14.5503 16.1261 14.0723 16.2737 13.1971 16.3124C12.2482 16.3546 11.9635 16.3651 9.5629 16.3651C7.15882 16.3651 6.87413 16.3546 5.92867 16.3124C5.04998 16.2737 4.57549 16.1261 4.25917 16.003C3.84092 15.8413 3.53865 15.6444 3.22584 15.3315C2.90951 15.0151 2.7162 14.7163 2.55452 14.298C2.43151 13.9815 2.28389 13.5034 2.24523 12.628C2.20305 11.6788 2.19251 11.3941 2.19251 8.99291C2.19251 6.58824 2.20305 6.30347 2.24523 5.35778C2.28389 4.47888 2.43151 4.00427 2.55452 3.68787C2.7162 3.26951 2.91303 2.96717 3.22584 2.65428C3.54216 2.33787 3.84092 2.14452 4.25917 1.9828C4.57549 1.85975 5.0535 1.7121 5.92867 1.67343C6.87413 1.63124 7.15882 1.62069 9.5629 1.62069ZM9.5629 0C7.12016 0 6.81438 0.0105468 5.85486 0.052734C4.89885 0.0949212 4.24159 0.249608 3.67221 0.471091C3.07822 0.70312 2.57561 1.00898 2.07652 1.51171C1.57391 2.01092 1.26813 2.51366 1.03616 3.10428C0.814731 3.67732 0.660083 4.33122 0.617907 5.28746C0.57573 6.25074 0.565186 6.5566 0.565186 8.99994C0.565186 11.4433 0.57573 11.7491 0.617907 12.7089C0.660083 13.6651 0.814731 14.3226 1.03616 14.8921C1.26813 15.4862 1.57391 15.989 2.07652 16.4882C2.57561 16.9874 3.07822 17.2968 3.66869 17.5253C4.24159 17.7468 4.89533 17.9014 5.85134 17.9436C6.81086 17.9858 7.11664 17.9964 9.55938 17.9964C12.0021 17.9964 12.3079 17.9858 13.2674 17.9436C14.2234 17.9014 14.8807 17.7468 15.4501 17.5253C16.0405 17.2968 16.5432 16.9874 17.0422 16.4882C17.5413 15.989 17.8506 15.4862 18.0791 14.8956C18.3005 14.3226 18.4552 13.6687 18.4973 12.7124C18.5395 11.7527 18.5501 11.4468 18.5501 9.00346C18.5501 6.56011 18.5395 6.25425 18.4973 5.2945C18.4552 4.33825 18.3005 3.68083 18.0791 3.11131C17.8577 2.51365 17.5519 2.01092 17.0493 1.51171C16.5502 1.01249 16.0476 0.70312 15.4571 0.474606C14.8842 0.253123 14.2305 0.0984368 13.2745 0.0562496C12.3114 0.0105468 12.0056 0 9.5629 0Z" fill="#9E9EA9"/>
                                      <path d="M9.56328 4.37695C7.01158 4.37695 4.94141 6.44764 4.94141 8.99997C4.94141 11.5523 7.01158 13.623 9.56328 13.623C12.115 13.623 14.1852 11.5523 14.1852 8.99997C14.1852 6.44764 12.115 4.37695 9.56328 4.37695ZM9.56328 11.9988C7.90784 11.9988 6.56521 10.6558 6.56521 8.99997C6.56521 7.34412 7.90784 6.00116 9.56328 6.00116C11.2187 6.00116 12.5613 7.34412 12.5613 8.99997C12.5613 10.6558 11.2187 11.9988 9.56328 11.9988Z" fill="#9E9EA9"/>
                                      <path d="M15.4471 4.19404C15.4471 4.79169 14.9621 5.27333 14.3681 5.27333C13.7706 5.27333 13.2891 4.78817 13.2891 4.19404C13.2891 3.59638 13.7741 3.11475 14.3681 3.11475C14.9621 3.11475 15.4471 3.5999 15.4471 4.19404Z" fill="#9E9EA9"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_1208_14435">
                                        <rect width="17.9954" height="17.9999" fill="#9E9EA9" transform="translate(0.565186)"/>
                                      </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{get_settings('contact_linkedin')}}" target="_blank"  class="svg-link d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                    <g clip-path="url(#clip0_1208_14433)">
                                      <path d="M17.8878 0H1.856C1.08803 0 0.467041 0.580074 0.467041 1.29726V16.6991C0.467041 17.4163 1.08803 17.9999 1.856 17.9999H17.8878C18.6558 17.9999 19.2804 17.4163 19.2804 16.7026V1.29726C19.2804 0.580074 18.6558 0 17.8878 0ZM6.04859 15.3386H3.25598V6.74644H6.04859V15.3386ZM4.65229 5.57574C3.75571 5.57574 3.03184 4.88317 3.03184 4.02888C3.03184 3.17459 3.75571 2.48201 4.65229 2.48201C5.54519 2.48201 6.26906 3.17459 6.26906 4.02888C6.26906 4.87965 5.54519 5.57574 4.65229 5.57574ZM16.4988 15.3386H13.7099V11.162C13.7099 10.1671 13.6915 8.88392 12.2585 8.88392C10.8071 8.88392 10.5866 9.97025 10.5866 11.0917V15.3386H7.80133V6.74644H10.4764V7.92065H10.5131C10.8842 7.24565 11.7955 6.53199 13.1514 6.53199C15.9771 6.53199 16.4988 8.31088 16.4988 10.6241V15.3386Z" fill="#9E9EA9"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_1208_14433">
                                        <rect width="18.8134" height="17.9999" fill="#9E9EA9" transform="translate(0.467041)"/>
                                      </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                    </ul>
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
 @push('js')

<script src="{{ asset('assets/frontend/grocery/js/script.js') }}"></script>

<script type="text/javascript">

	    "use strict";
    document.querySelectorAll('.progress-bar').forEach(bar => {
    let val = bar.dataset.progress;
    val = Math.min(Math.max(val, 0), 100);
    bar.style.width = val + '%';
});

</script>
@endpush