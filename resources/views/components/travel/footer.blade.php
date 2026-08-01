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


<!-- Footer Section Start -->
<footer class="footer-area overflow-hidden position-relative wow animate__fadeInUp" data-wow-delay=".1s">
    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector6.png') }}" alt="vector"></span>
    <div class="container">
        <div class="row g-lg-5">
            <div class="col-lg-4">
                <div class="single-footer-block">
                    <img class="footer-image" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="...">
                    <p>{{get_settings('summary')}}</p>
                    <p>{{get_phrase('Copyright ©')}} {{ date('Y') }} | {{get_phrase('All rights reserved by creativeitem.com')}}</p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-footer-block footer-item">
                            <h4>{{get_phrase('Quick Links')}}</h4>
                            <ul >
                                <li><a href="{{route('home')}}" >{{get_phrase('Home')}}</a></li>
                                <li><a href="{{route('blog')}}" >{{get_phrase('Blog')}}</a></li>
                                <li><a href="{{route('store')}}" >{{get_phrase('Store')}}</a></li>
                                <li><a href="{{route('events')}}" >{{get_phrase('Events')}}</a></li>
                                <li><a href="{{route('contact_us')}}" >{{get_phrase('Contact us')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    @php
                        $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(5)->get();
                    @endphp
                    <div class="col-lg-4 col-md-4">
                        <div class="single-footer-block footer-item">
                            <h4 >{{get_phrase('Top Categories')}}</h4>
                            <ul >
                                @foreach($categories as $category)
                                <li><a href="{{ route('products', $category->slug) }}" >{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-footer-block footer-item">
                           <h4 >{{get_phrase('Support')}}</h4>
                            <ul>
                                <li><a href="{{route('about_us')}}" >{{get_phrase('About Us')}}</a></li>
                                <li><a href="{{route('terms_and_conditions')}}" >{{get_phrase('Terms and condition')}}</a></li>
                                <li><a href="{{route('privacy_policy')}}" >{{get_phrase('Privacy Policy')}}</a></li>
                                <li><a href="{{route('refund_policy')}}" >{{get_phrase('Refund Policy')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->


    <!-- Scroll Top -->
    <div class="scroll-progress-wrap">
        <svg class="scroll-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- Scroll Top -->
  <script src="{{ asset('assets/frontend/travel/vendors/wow-js/wow.min.js') }}"></script>  
<script src="{{ asset('assets/frontend/travel/js/header.js') }}"></script>
<script src="{{ asset('assets/frontend/travel/js/script.js') }}"></script>