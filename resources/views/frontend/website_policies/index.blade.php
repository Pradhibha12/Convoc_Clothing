@extends('layouts.frontend')

@php
    // Dynamic titles
    $pageTitles = [
        'privacy_policy' => 'Privacy Policy',
        'privacy_pilicy' => 'Privacy Policy',
        'terms_and_conditions' => 'Terms & Conditions',
        'about_us' => 'About Us',
        'refund_policy' => 'Refund Policy',
        'shipping_policy' => 'Shipping Policy',
    ];

    $pageTitle = $pageTitles[$slug] ?? 'Information Page';

    $content = get_frontend_settings($slug);

    // Detect all headings from content
    preg_match_all('/<(h1|h2|h3|strong)[^>]*>(.*?)<\/\1>/', $content, $matches);
    $headings = $matches[2];

    // Add IDs to each heading dynamically
    $i = 0;
    $finalContent = preg_replace_callback(
        '/<(h1|h2|h3|h4|h5|h6|strong)[^>]*>(.*?)<\/\1>/',
        function($m) use (&$i) {
            return '<h2 id="section_'.$i++.'" class="section-heading">'.$m[2].'</h2>';
        },
        $content
    );
@endphp

@push('title', $pageTitle . ' | ' . get_settings('system_title'))
@push('meta')
    <meta name="title" content="{{ $pageTitle }} | {{ get_settings('system_title') }}">
@endpush

@section('content')

<style>
    .policy-page{
        margin-top: 40px;
    }
    .sidebar-menu {
    position: sticky;
    top: 100px;
    background: #fff;
    margin-top: -13px;
}

.sidebar-menu .sidebar-link {
	font-size: 16px;
	color: #494F5B;
	font-weight: 500;
}

.sidebar-menu .sidebar-link:hover {
    color: #000000;
    border-bottom: 1px solid #000000;
}

.section-heading {
     font-size: 24px !important;
    margin-bottom: 16px;
    line-height: 32px;
    color: #000000;
    font-weight: 600;
}
.section-heading strong,
.section-heading h4 b,
.section-heading h4 p,
.editor-page-content  p b span,
.section-heading h4 p span,
.section-heading span{
     font-size: 24px !important;
     line-height: 32px;
    color: #000000;
    font-weight: 600 !important;
}
.editor-page-content font ,
.editor-page-content p {
    font-size: 16px !important;
    font-weight: 400;
    color: #494F5B;
    line-height: 28px;
}
.editor-page-content h4 p ,
.editor-page-content h4 p  span font,
.editor-page-content h4 p font span{
    font-size: 16px !important;
    font-weight: 400;
    color: #494F5B;
    line-height: 28px;
}
.sidebar-menu   .list-unstyled li{
    margin: 20px 0 !important;
}
.sidebar-menu .sidebar-link.active {
    color: #000 !important;
    border-bottom: 1.5px solid #000;
    font-weight: 600;
    padding-bottom: 12px;
}

</style>

<!-- Breadcrumb -->
<section class="page-breadcrumb ">
    <div class="container">
        <div class="breadcrumb-area mt-30px mb-30px text-center">
            <h1 class="al-title-42px mb-20px">{{ $pageTitle }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fsh-breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{get_phrase('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="policy-page">
    <div class="container">
        <div class="row gy-4 mb-100px">

            <!-- LEFT SIDEBAR -->
            <div class="col-md-3">
                <div class="sidebar-menu">
                    <ul class="list-unstyled">
                        @foreach($headings as $index => $title)
                            <li class="mb-2">
                                <a class="sidebar-link" href="#section_{{ $index }}">
                                    {{ strip_tags($title) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-md-9">
                <div class="editor-page-content">
                    {!! $finalContent !!}
                </div>
            </div>

        </div>
    </div>
</section>


<script>
    "use strict";
document.addEventListener("DOMContentLoaded", function () {

    const links = document.querySelectorAll(".sidebar-link");

    // Set first item active by default
    if (links.length > 0) {
        links[0].classList.add("active");
    }

    // On click
    links.forEach(link => {
        link.addEventListener("click", function () {
            links.forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
</script>

@endsection
