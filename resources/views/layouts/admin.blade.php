<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{ config(['app.name' => get_settings('system_title')]) }}
    <title>@stack('title') | {{ config('app.name') }}</title>

    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{ get_image(get_frontend_settings('favicon')) }}" />
    <meta content="{{ csrf_token() }}" name="csrf_token" />
    @stack('meta')
    <!-- End meta -->

    {{-- bootstrap --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/bootstrap-5.3.3/css/bootstrap.min.css') }}" />

    {{-- FlatIcons --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}" />

    {{-- Font awesome icons --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/icon-picker/fontawesome-iconpicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/icon-picker/icons/fontawesome-all.min.css') }}" />

    {{-- Summernote --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/summernote/summernote-lite.min.css') }}" rel="stylesheet">

    {{-- Yaireo Tagify --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/tagify-master/dist/tagify.css') }}" rel="stylesheet" type="text/css" />

    {{-- Select2 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- Date range picker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/magnific-popup/magnific-popup.css') }}">


    {{-- Custom css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/custom.css') }}">

    @stack('css')

    <script type="text/javascript" src="{{ asset('assets/global/jquery-3.7.1/jquery-3.7.1.min.js') }}"></script>

</head>

<body>
        <!-- Sidebar Navigation -->
        <div class="ol-sidebar print-d-none">
            @include('admin.navigation')
        </div>

        <div class="ol-sidebar-content">
            @include('admin.header')
            <div class="ol-body-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>


    @include('admin.modal')

    <script type="text/javascript" src="{{ asset('assets/global/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Summernote --}}
    <script type="text/javascript" src="{{ asset('assets/global/summernote/summernote-lite.min.js') }}"></script>

    {{-- Icon --}}
    <script type="text/javascript" src="{{ asset('assets/global/icon-picker/fontawesome-iconpicker.min.js') }}"></script>

    {{-- Jquery form --}}
    <script type="text/javascript" src="{{ asset('assets/global/jquery-form/jquery.form.min.js') }}"></script>

    {{-- Jquery UI --}}
    <script type="text/javascript" src="{{ asset('assets/global/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>

    {{-- Yaireo Tagify --}}
    <script type="text/javascript" src="{{ asset('assets/global/tagify-master/dist/tagify.min.js') }}"></script>

    {{-- Select2 --}}
    <script type="text/javascript" src="{{ asset('assets/global/select2/select2.min.js') }}"></script>

    {{-- Date range picker --}}
    <script type="text/javascript" src="{{ asset('assets/global/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    {{-- Html to PDF --}}
    <script type="text/javascript" src="{{ asset('assets/global/html2pdf/html2pdf.bundle.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/backend/js/script.js') }}"></script>

    @include('admin.toaster')
    @include('admin.common_scripts')
    @include('admin.init')
    @stack('js')
</body>

</html>
