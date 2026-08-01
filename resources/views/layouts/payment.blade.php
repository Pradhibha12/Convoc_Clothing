<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{csrf_token()}}" name="csrf_token" />
    @stack('meta')

    <title>@stack('title') | {{get_settings('system_title')}}</title>

    <link rel="shortcut icon" href="{{ get_image(get_frontend_settings('favicon')) }}" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/global/bootstrap-5.3.3/css/bootstrap.min.css')}}">
    <!-- Line Icon -->
    <link rel="stylesheet" href="{{asset('assets/frontend/fashion/icons/css/uicons-bold-rounded.css')}}">

    <!-- Nice Select -->
    <link rel="stylesheet" href="{{asset('assets/global/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/global/select2/select2.min.css')}}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/fashion/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/fashion/css/custom.css')}}">
    {{-- jQuery --}}
    <script src="{{asset('assets/global/jquery-3.7.1/jquery-3.7.1.min.js')}}"></script>
    
    @stack('css')
</head>
<body>
    
    @yield('content')
    
    {{-- jQuery Form --}}
    <script src="{{asset('assets/global/jquery-form/jquery.form.min.js')}}"></script>

    <script src="{{asset('assets/global/bootstrap-5.3.3/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/global/nice-select/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/global/select2/select2.min.js')}}"></script>

    @include('frontend.modal')
    @include('frontend.toaster')
    @include('frontend.common_scripts')

    @stack('js')
</body>
</html>
