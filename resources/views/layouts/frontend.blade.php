<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('layouts.seo')

    @stack('meta')

    <title>@stack('title') | {{ get_settings('system_title') }}</title>

    <link rel="shortcut icon" href="{{ get_image(get_frontend_settings('favicon')) }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/global/bootstrap-5.3.3/css/bootstrap.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('assets/global/nice-select/nice-select.css') }}">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/global/select2/select2.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- UI Flat icon -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}">
    <!-- Image Zoom -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/image-zoom/image-zoom.css') }}">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/jquery-ui/jquery-ui.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/swiper/swiper-bundle.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/magnific-popup/magnific-popup.css') }}">
    <!-- R Progressbar -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/rprogressbar/jquery.rprogessbar.min.css') }}">
    <!-- Drift -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/dript/drift-basic.min.css') }}">
    {{-- Summernote --}}
   
    <!-- Venobox Popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/venobox/venobox.min.css') }}">
    <!-- Wow animation -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/wow-js/animate.min.css') }}">
    <!-- Custom Css -->
   
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/responsive.css') }}">
  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/custom.css') }}">

    {{-- Summernote CSS --}}
    <link href="{{ asset('assets/global/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    {{-- Yaireo Tagify CSS --}}
    <link href="{{ asset('assets/global/tagify-master/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
    {{-- jQuery --}}
    <script src="{{ asset('assets/global/jquery-3.7.1/jquery-3.7.1.min.js') }}"></script>

    @stack('css')
     @php
        $active_theme = \App\Models\Theme::where('status', 1)->first();
    @endphp

@if ($active_theme)
    {{-- Include theme-specific CSS/JS --}}
    @include('layouts.themes.' . $active_theme->identifier . '.index')
@endif

</head>
<body>



@php
    $builder_sections = $active_theme && $active_theme->html
        ? json_decode($active_theme->html, true)
        : [];
@endphp


{{-- ================= HOME PAGE ================= --}}
@if ($active_theme && !View::hasSection('is_preview') && Route::currentRouteName() === 'home')

    {{-- HOME: full builder only --}}
    @foreach ($builder_sections as $section)
        @php
            $viewPath = "components.home_made_by_builder.{$active_theme->identifier}.$section";
        @endphp
        @if (view()->exists($viewPath))
            @include($viewPath)
        @endif
    @endforeach


{{-- ================= OTHER PAGES ================= --}}
@else

    {{-- Header (skip in preview) --}}
    @if ($active_theme && !View::hasSection('is_preview'))
        @foreach ($builder_sections as $section)
            @if (in_array($section, ['header_top', 'header']))
                @php
                    $viewPath = "components.home_made_by_builder.{$active_theme->identifier}.$section";
                @endphp
                @if (view()->exists($viewPath))
                    @include($viewPath)
                @endif
            @endif
        @endforeach
    @endif

    {{-- Page Content --}}
    <section>
        @yield('content')
    </section>

    {{-- Footer (skip in preview) --}}
    @if ($active_theme && !View::hasSection('is_preview'))
        @php
            $footerRendered = false;
        @endphp
        @foreach ($builder_sections as $section)
            @if ($section === 'footer')
                @php
                    $viewPath = "components.home_made_by_builder.{$active_theme->identifier}.$section";
                @endphp
                @if (view()->exists($viewPath))
                    @include($viewPath)
                    @php $footerRendered = true; @endphp
                @endif
            @endif
        @endforeach
        @if(!$footerRendered)
            @php
                $fallbackFooter = "components.home_made_by_builder.{$active_theme->identifier}.footer";
            @endphp
            @if (view()->exists($fallbackFooter))
                @include($fallbackFooter)
            @endif
        @endif
    @endif

@endif






<script src="{{ asset('assets/frontend/fashion/vendors/wow-js/wow.min.js') }}"></script>

{{-- @php
        $active_theme = \App\Models\Theme::where('status', 1)->first();
    @endphp

    @if ($active_theme)
        @include('layouts.themes.' . $active_theme->identifier . '.index')
    @endif

</head>

<body>

   

    @component("components.{$active_theme->identifier}.header_top")@endcomponent
    @component("components.{$active_theme->identifier}.header")@endcomponent
 



    @yield('content')


    @component("components.{$active_theme->identifier}.footer")@endcomponent --}}


    {{-- jQuery Form --}}
    <script src="{{ asset('assets/global/jquery-form/jquery.form.min.js') }}"></script>
    {{-- Yaireo Tagify JS --}}
    <script src="{{ asset('assets/global/tagify-master/dist/tagify.min.js') }}"></script>
    {{-- Summernote JS --}}
    <script src="{{ asset('assets/global/summernote/summernote-lite.min.js') }}"></script>

    <script src="{{ asset('assets/global/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/global/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/global/select2/select2.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/fashion/vendors/image-zoom/image-zoom.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/mixitup/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/rprogressbar/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/rprogressbar/jQuery.rProgressbar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/dript/drift.min.js') }}"></script>
  
    <script type="module" src="{{ asset('assets/frontend/fashion/vendors/zoom/zoom.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/venobox/venobox.min.js') }}"></script>
    
    
    <script src="{{ asset('assets/frontend/fashion/js/script.js') }}"></script>

 
    

    @include('frontend.modal')
    @include('frontend.toaster')
    @include('frontend.common_scripts')
    
    <!-- Firebase Global SDK for Mobile OTP Login -->
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth-compat.js"></script>
    
    <script>
        const smsGateway = "{{ get_settings('sms_gateway') ?? 'mock' }}";
        const firebaseConfig = {
            apiKey: "{{ get_settings('firebase_api_key') }}",
            authDomain: "{{ get_settings('firebase_auth_domain') }}",
            projectId: "{{ get_settings('firebase_project_id') }}",
            storageBucket: "{{ get_settings('firebase_storage_bucket') }}",
            messagingSenderId: "{{ get_settings('firebase_messaging_sender_id') }}",
            appId: "{{ get_settings('firebase_app_id') }}"
        };
    </script>
    
    @stack('js')
   <script>
    'use strict';

function toggleWishlist(productId, el) {
    $.ajax({
        url: "{{ route('wishlist.toggle') }}",
        method: "post",
        data: {
            product_id: productId,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            if (response.status === 'added') {
                $(el).addClass('active');
                success('Added to Wishlist');
            } else if (response.status === 'removed') {
                $(el).removeClass('active');
                warning('Removed from Wishlist');
            } else if (response.status === 'error') {
                warning(response.message);
            }
        },
        error: function() {
            warning('Something went wrong!');
        }
    });
}
</script>
@include('frontend.product.share_modal')

</body>

</html>
