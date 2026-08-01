@extends('layouts.frontend')
@push('title', 'Products')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
@php
     $active_theme = \App\Models\Theme::where('status', 1)->first();
    $body = json_decode($active_theme->body, true);
    $font_family = json_decode($active_theme->general, true);
    $filter = json_decode($active_theme->filter, true);
@endphp

@if (isset($font_family['font_family']) && isset($filter['background-color']) )
    <style>
        /* background color */
        body ,
        .form-checkbox2-label,
        .fsh-md-select .option,
        .fsh-md-select,
        .al-subtitle-14px,
        .fsh-breadcrumb,
        .al-subtitle2-16px,
        
        .al-title-14px,
        .form-checkbox-label,
        .al-title-18px,
        .category-nav-link {
            font-family: {{ $font_family['font_family'] }};
        }
        .form-checkbox-input:checked,
        #slider-range .ui-widget-header ,
        #slider-range .ui-slider-handle {
                background-color: {{ $filter['background-color'] }} ;
                
            }
            .form-checkbox-input:checked {
                border-color:{{ $filter['background-color'] }} ;
            }
            .form-checkbox-label,
            .al-subtitle-14px,
            .al-title-18px,
            .category-nav-link{
                 color:{{ $filter['color'] }} ;
            }
    </style>
@endif
@if(isset($font_family['font_family']))
   <style>
    .al-title-42px,
     .breadcrumb-item a{
          font-family: {{ $font_family['font_family'] }} !important;
    }
   .recap .btn,
    .recap .btn:hover{
        border: 1px solid #D8D8DF;
    }
    /* Font */
   </style>

@endif



    <!-- Breadcrumb Area Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area mt-30px mb-3 wow animate__fadeInUp" data-wow-delay=".1s">
                        <h1 class="al-title-42px text-center">{{ get_phrase('All products') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fsh-breadcrumb mt-3">
                                @php $route_params = []; @endphp
                                @foreach ($selected_categories as $parameter_name => $selected_category)
                                    @php $route_params[$parameter_name] = $selected_category->slug; @endphp
                                    @if ($loop->last)
                                        <li class="breadcrumb-item active" aria-current="page">{{ $selected_category->title }}</li>
                                    @else
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('products', $route_params) }}">{{ $selected_category->title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ol>                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->


    <!-- Filter Grid List Main Area Start -->
    <main class="mt-2">
        <div class="container">
            <div class="row gy-4 mb-100px">
                <!-- Left Sidebar -->
                <div class="col-xl-3 col-lg-4 wow animate__fadeInUp" data-wow-delay=".2s">
                    @include('frontend.products.filter_sidebar')
                </div>
                <div class="col-xl-9 col-lg-8"> 
                    <!-- Top Title Area -->
                    <div class="filter-tab-header mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
                         <div class="recap d-flex align-items-center gap-2">
                            <button class="btn filter-nav-link d-lg-none " type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas" >
                                <svg data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Filter')}}" data-bs-placement="top" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 21.75C13.841 21.75 13.683 21.699 13.55 21.6L9.55005 18.6C9.36205 18.458 9.25 18.236 9.25 18V14C9.25 13.8 9.17203 13.611 9.03003 13.469L3.90906 8.34799C3.48406 7.92199 3.25 7.35799 3.25 6.75699V4.5C3.25 3.259 4.26 2.25 5.5 2.25H18.5C19.74 2.25 20.75 3.259 20.75 4.5V6.75699C20.75 7.35799 20.5159 7.92299 20.0909 8.34799L14.97 13.469C14.828 13.611 14.75 13.799 14.75 14V21C14.75 21.284 14.59 21.544 14.335 21.671C14.229 21.724 14.114 21.75 14 21.75ZM10.75 17.625L13.25 19.5V14C13.25 13.399 13.4841 12.834 13.9091 12.409L19.03 7.28799C19.172 7.14599 19.25 6.95799 19.25 6.75699V4.5C19.25 4.086 18.913 3.75 18.5 3.75H5.5C5.087 3.75 4.75 4.086 4.75 4.5V6.75699C4.75 6.95699 4.82797 7.14599 4.96997 7.28799L10.0909 12.409C10.5159 12.835 10.75 13.399 10.75 14V17.625V17.625Z" fill="#000"/>
                                    </svg>
                            </button>
                            <h4 class="al-title-14px fw-semibold">
                                @if(count($products)> 0)
                                {{ $products->total().' '.get_phrase('Products found') }}
                                @else
                                {{ get_phrase('No products found') }}
                                @endif
                            </h4>
                         </div>
                        <ul class="nav nav-pills filter-nav-pills d-none d-md-flex" id="filter-pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link   filter-nav-link" id="pills-filter3-tab" data-bs-toggle="pill" data-bs-target="#pills-filter3" type="button" role="tab" aria-controls="pills-filter3" aria-selected="false">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.5" cy="1.5" r="1.5" transform="rotate(90 1.5 1.5)" fill="#818195"/>
                                    <circle cx="6.5" cy="1.5" r="1.5" transform="rotate(90 6.5 1.5)" fill="#818195"/>
                                    <circle cx="11.5" cy="1.5" r="1.5" transform="rotate(90 11.5 1.5)" fill="#818195"/>
                                    <circle cx="16.5" cy="1.5" r="1.5" transform="rotate(90 16.5 1.5)" fill="#818195"/>
                                    <circle cx="1.5" cy="6.5" r="1.5" transform="rotate(90 1.5 6.5)" fill="#818195"/>
                                    <circle cx="6.5" cy="6.5" r="1.5" transform="rotate(90 6.5 6.5)" fill="#818195"/>
                                    <circle cx="11.5" cy="6.5" r="1.5" transform="rotate(90 11.5 6.5)" fill="#818195"/>
                                    <circle cx="16.5" cy="6.5" r="1.5" transform="rotate(90 16.5 6.5)" fill="#818195"/>
                                    <circle cx="1.5" cy="11.5" r="1.5" transform="rotate(90 1.5 11.5)" fill="#818195"/>
                                    <circle cx="6.5" cy="11.5" r="1.5" transform="rotate(90 6.5 11.5)" fill="#818195"/>
                                    <circle cx="11.5" cy="11.5" r="1.5" transform="rotate(90 11.5 11.5)" fill="#818195"/>
                                    <circle cx="16.5" cy="11.5" r="1.5" transform="rotate(90 16.5 11.5)" fill="#818195"/>
                                    <circle cx="1.5" cy="16.5" r="1.5" transform="rotate(90 1.5 16.5)" fill="#818195"/>
                                    <circle cx="6.5" cy="16.5" r="1.5" transform="rotate(90 6.5 16.5)" fill="#818195"/>
                                    <circle cx="11.5" cy="16.5" r="1.5" transform="rotate(90 11.5 16.5)" fill="#818195"/>
                                    <circle cx="16.5" cy="16.5" r="1.5" transform="rotate(90 16.5 16.5)" fill="#818195"/>
                                </svg>
                            </button>
                            </li>
                           
                            <li class="nav-item " role="presentation">
                            <button class="nav-link active filter-nav-link" id="pills-filter2-tab" data-bs-toggle="pill" data-bs-target="#pills-filter2" type="button" role="tab" aria-controls="pills-filter2" aria-selected="false">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2" cy="2" r="2" fill="#818195"/>
                                    <circle cx="9" cy="2" r="2" fill="#818195"/>
                                    <circle cx="16" cy="2" r="2" fill="#818195"/>
                                    <circle cx="2" cy="9" r="2" fill="#818195"/>
                                    <circle cx="9" cy="9" r="2" fill="#818195"/>
                                    <circle cx="16" cy="9" r="2" fill="#818195"/>
                                    <circle cx="2" cy="16" r="2" fill="#818195"/>
                                    <circle cx="9" cy="16" r="2" fill="#818195"/>
                                    <circle cx="16" cy="16" r="2" fill="#818195"/>
                                </svg>
                            </button>
                            </li>
                             <li class="nav-item " role="presentation">
                            <button class="nav-link  filter-nav-link" id="pills-filter1-tab" data-bs-toggle="pill" data-bs-target="#pills-filter1" type="button" role="tab" aria-controls="pills-filter1" aria-selected="true">
                                <svg width="14" height="5" viewBox="0 0 14 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#818195"/>
                                    <circle cx="11.5" cy="2.5" r="2.5" fill="#818195"/>
                                </svg>
                            </button>
                            </li>
                            <li class="nav-item " role="presentation">
                            <button class="nav-link filter-nav-link" id="pills-filter4-tab" data-bs-toggle="pill" data-bs-target="#pills-filter4" type="button" role="tab" aria-controls="pills-filter4" aria-selected="false">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="18" height="3" rx="1.5" fill="#818195"/>
                                    <rect y="6" width="18" height="2" rx="1" fill="#818195"/>
                                    <rect y="11" width="18" height="3" rx="1.5" fill="#818195"/>
                                </svg>                                    
                            </button>
                            </li>
                          
                        </ul>
                        <div class="d-flex align-items-center gap-12px">
                            <p class="al-subtitle-14px lh-1 d-none d-md-block">{{ get_phrase('Sort By') }}</p>
                            <form action="">
                                <select name="sort_by" class="fsh-md-select min-w-155px right fsh-nice-select" onchange="document.getElementById('sort_by').value = this.value; submitFilterForm();">
                                    <option value="low-to-high" @if (request()->sort_by == 'low-to-high') selected @endif>{{ get_phrase('Price') }} : {{ get_phrase('Low to High') }}</option>
                                    <option value="high-to-low" @if (request()->sort_by == 'high-to-low') selected @endif>{{ get_phrase('Price') }} : {{ get_phrase('High to Low') }}</option>
                                    <option value="best-rated" @if (request()->sort_by == 'best-rated') selected @endif>{{ get_phrase('Rating') }} : {{ get_phrase('Best rated') }}</option>
                                    <option value="release-date" @if (request()->sort_by == 'release-date') selected @endif>{{ get_phrase('Release Date') }}</option>
                                </select>
                            </form>
                        </div>
                       
                    </div>
                    @php
                        $active_theme = \App\Models\Theme::where('status', 1)->first();
                    @endphp
                    <div>
                        <div class="tab-content wow animate__fadeInUp" data-wow-delay=".4s" id="filter-pills-tabContent">
                            @if(count($products)> 0)
                            <!-- Grid Column 4 -->
                            <div class="tab-pane fade " id="pills-filter3" role="tabpanel" aria-labelledby="pills-filter3-tab" tabindex="0">
                                <div class="row gy-4  mb-30px">
                                    
                                    @foreach ($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            @include("components.{$active_theme->identifier}.products.product_grid", ['layout' => 'sm'])
                                        </div>
                                    @endforeach
                                         
                                </div>
                                <!-- Pagination -->
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                            
                            <!-- Grid Column 3 -->
                            <div class="tab-pane fade show active" id="pills-filter2" role="tabpanel" aria-labelledby="pills-filter2-tab" tabindex="0">
                                <div class="row gy-4 mb-30px">
                                    
                                    @foreach ($products as $product)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            @include("components.{$active_theme->identifier}.products.product_grid", ['layout' => 'md'])
                                        </div>
                                    @endforeach
                                    
                                </div>
                                <!-- Pagination -->
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                            <!-- Grid Column 2 -->
                            <div class="tab-pane fade " id="pills-filter1" role="tabpanel" aria-labelledby="pills-filter1-tab" tabindex="0">
                                <div class="row gy-4 mb-30px">
                                    @foreach ($products as $product)
                                        <div class="col-md-6">
                                            @include("components.{$active_theme->identifier}.products.product_grid", ['layout' => 'lg'])
                                        </div>
                                    @endforeach
                                        
                                </div>
                                <!-- Pagination -->
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                            <!-- List View -->
                            <div class="tab-pane fade" id="pills-filter4" role="tabpanel" aria-labelledby="pills-filter4-tab" tabindex="0">
                                <div class="row gy-4 mb-30px">
                                        @foreach ($products as $product)
                                            @include("components.{$active_theme->identifier}.products.product_list")
                                        @endforeach
                                     
                                </div>
                                <!-- Pagination -->
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                            @else 
                                <div class="col-12 mt-5">
                                         <div class="noData text-center pt-5">
                                               <svg width="228" height="180" viewBox="0 0 228 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.0269 131.549C34.8272 92.1511 21.0986 90.7353 10.2944 78.3568C-0.0532422 66.501 -1.72713 48.4129 1.44201 33.0044C4.60453 17.5892 16.4408 3.4641 31.916 0.592769C55.3703 -3.75392 76.9853 17.2584 100.823 16.4115C112.957 15.9749 124.066 9.91466 135.618 6.17003C162.969 -2.69536 196.473 3.30531 214.099 26.0245C229.561 45.9452 230.03 73.9704 223.831 98.4164C217.506 123.352 204.479 147.216 184.081 162.889C163.683 178.562 135.38 184.933 111.343 175.77C94.1939 169.227 76.9456 155.162 59.7502 161.579C54.1133 163.683 28.5153 175.539 17.0231 162.148C12.0808 156.385 8.64701 139.475 13.0269 131.556V131.549Z" fill="url(#paint0_linear_183_1149)"/>
                                                    <g filter="url(#filter0_dd_183_1149)">
                                                    <path d="M65.054 52.5063L64.313 44.9046C63.9756 41.418 67.0389 38.2621 71.1541 37.8586L148.464 30.3164L152.936 20.3461C153.492 19.1089 154.815 18.2356 156.35 18.0834L174.492 16.3104C176.702 16.092 178.64 17.4351 178.825 19.3074L188.419 117.614C188.419 118.56 188.32 121.478 186.209 124.151C183.285 127.856 178.885 128.08 178.23 128.107L73.4301 138.335L65.054 52.5063Z" fill="#CDE4FF"/>
                                                    <path d="M43.81 54.5771L157.654 43.4689C160.625 43.1778 163.695 45.3148 164.502 48.2324L184.933 122.02C185.74 124.944 183.987 127.545 181.016 127.836L67.1717 138.944C64.201 139.235 61.1311 137.098 60.3239 134.18L39.8932 60.3926C39.0861 57.4683 40.8393 54.8682 43.81 54.5771Z" fill="url(#paint1_linear_183_1149)"/>
                                                    </g>
                                                    <path opacity="0.35" d="M87.0803 90.4024C105.391 90.4024 120.234 75.5594 120.234 57.2498C120.234 38.9401 105.391 24.0972 87.0803 24.0972C68.7701 24.0972 53.9268 38.9401 53.9268 57.2498C53.9268 75.5594 68.7701 90.4024 87.0803 90.4024Z" fill="url(#paint2_linear_183_1149)"/>
                                                    <path d="M103.674 21.9002C84.3877 12.3335 60.7812 20.319 51.2804 39.6376C43.6718 55.1123 47.238 73.121 58.7964 84.593L31.0548 125.989C28.7458 129.436 29.6654 134.1 33.1125 136.409C36.5595 138.718 41.2239 137.799 43.5329 134.352L71.2943 92.9225C90.3422 100.882 112.493 92.5918 121.524 73.7693C130.774 54.4838 122.781 31.3809 103.674 21.9068V21.9002ZM72.7035 85.248C57.0365 77.7323 50.4269 58.9363 57.9429 43.2697C65.5052 27.5171 84.1627 20.9541 99.9158 28.5095C115.59 36.0253 122.192 54.8212 114.676 70.4878C107.114 86.2404 88.4566 92.8035 72.7035 85.248Z" fill="#95C3F9"/>
                                                    <g filter="url(#filter1_dd_183_1149)">
                                                    <path d="M164.014 21.6537C161.071 22.253 158.127 22.8523 155.186 23.447C155.896 27.2043 153.94 31.3307 150.812 33.4346C149.146 33.6287 147.579 34.5783 146.626 35.9677C148.449 34.4818 151.133 34.9864 153.326 35.7998C155.518 36.6131 157.836 37.6812 160.101 37.0754C162.389 36.4673 163.963 34.2283 164.498 31.9094C165.032 29.5906 164.717 27.1739 164.011 21.6473L164.014 21.6537Z" fill="url(#paint3_linear_183_1149)"/>
                                                    </g>
                                                    <g filter="url(#filter2_dd_183_1149)">
                                                    <path d="M170.846 30.9235L170.647 25.5778C172.687 25.861 174.825 25.3815 176.566 24.2473C177.885 23.3883 178.967 22.1768 180.364 21.4491C182.248 20.4659 184.507 20.4777 186.538 21.0365C188.569 21.5954 190.425 22.646 192.256 23.6926C191.045 23.5086 189.815 23.3223 188.598 23.506C187.381 23.6897 186.167 24.2986 185.539 25.3708C185.055 26.2022 184.958 27.2281 184.395 28.0028C183.854 28.7481 182.976 29.1405 182.146 29.5187C177.884 31.4598 173.821 33.841 170.03 36.6204C169.913 35.9215 171.012 35.3387 170.849 30.93L170.846 30.9235Z" fill="url(#paint4_linear_183_1149)"/>
                                                    </g>
                                                    <defs>
                                                    <filter id="filter0_dd_183_1149" x="29.674" y="16.2871" width="168.768" height="142.729" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feMorphology radius="2.00456" operator="erode" in="SourceAlpha" result="effect1_dropShadow_183_1149"/>
                                                    <feOffset dy="4.00911"/>
                                                    <feGaussianBlur stdDeviation="2.00456"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0901961 0 0 0 0 0.219608 0 0 0 0 0.482353 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_183_1149"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feMorphology radius="2.00456" operator="erode" in="SourceAlpha" result="effect2_dropShadow_183_1149"/>
                                                    <feOffset dy="10.0228"/>
                                                    <feGaussianBlur stdDeviation="6.01367"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0902477 0 0 0 0 0.2203 0 0 0 0 0.480404 0 0 0 0.08 0"/>
                                                    <feBlend mode="normal" in2="effect1_dropShadow_183_1149" result="effect2_dropShadow_183_1149"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_183_1149" result="shape"/>
                                                    </filter>
                                                    <filter id="filter1_dd_183_1149" x="136.603" y="21.6475" width="38.1857" height="35.6515" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feMorphology radius="2.00456" operator="erode" in="SourceAlpha" result="effect1_dropShadow_183_1149"/>
                                                    <feOffset dy="4.00911"/>
                                                    <feGaussianBlur stdDeviation="2.00456"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0901961 0 0 0 0 0.219608 0 0 0 0 0.482353 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_183_1149"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feMorphology radius="2.00456" operator="erode" in="SourceAlpha" result="effect2_dropShadow_183_1149"/>
                                                    <feOffset dy="10.0228"/>
                                                    <feGaussianBlur stdDeviation="6.01367"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0902477 0 0 0 0 0.2203 0 0 0 0 0.480404 0 0 0 0.08 0"/>
                                                    <feBlend mode="normal" in2="effect1_dropShadow_183_1149" result="effect2_dropShadow_183_1149"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_183_1149" result="shape"/>
                                                    </filter>
                                                    <filter id="filter2_dd_183_1149" x="159.998" y="20.6548" width="42.2799" height="36.0109" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feMorphology radius="2.00456" operator="erode" in="SourceAlpha" result="effect1_dropShadow_183_1149"/>
                                                    <feOffset dy="4.00911"/>
                                                    <feGaussianBlur stdDeviation="2.00456"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0901961 0 0 0 0 0.219608 0 0 0 0 0.482353 0 0 0 0.03 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_183_1149"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feMorphology radius="2.00456" operator="erode" in="SourceAlpha" result="effect2_dropShadow_183_1149"/>
                                                    <feOffset dy="10.0228"/>
                                                    <feGaussianBlur stdDeviation="6.01367"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.0902477 0 0 0 0 0.2203 0 0 0 0 0.480404 0 0 0 0.08 0"/>
                                                    <feBlend mode="normal" in2="effect1_dropShadow_183_1149" result="effect2_dropShadow_183_1149"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_183_1149" result="shape"/>
                                                    </filter>
                                                    <linearGradient id="paint0_linear_183_1149" x1="138.443" y1="212.879" x2="88.6393" y2="-71.8922" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="white"/>
                                                    <stop offset="0.05" stop-color="#F6F8FF"/>
                                                    <stop offset="0.13" stop-color="#DFE9FF"/>
                                                    <stop offset="0.47" stop-color="#F0F3FF"/>
                                                    <stop offset="0.84" stop-color="white"/>
                                                    <stop offset="1" stop-color="white"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear_183_1149" x1="105.566" y1="73.4748" x2="141.246" y2="166.294" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="white"/>
                                                    <stop offset="0.78" stop-color="#E6E9FC"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint2_linear_183_1149" x1="114.01" y1="37.9265" x2="60.282" y2="76.8128" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="white"/>
                                                    <stop offset="0.78" stop-color="#ECEEFF"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint3_linear_183_1149" x1="152.889" y1="39.703" x2="160.288" y2="24.4751" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#E9EDFF"/>
                                                    <stop offset="0.19" stop-color="#E0E6FF"/>
                                                    <stop offset="0.22" stop-color="#DFE5FF"/>
                                                    <stop offset="0.6" stop-color="#EFF2FF"/>
                                                    <stop offset="0.86" stop-color="#F0F3FF"/>
                                                    <stop offset="0.95" stop-color="#F7F9FF"/>
                                                    <stop offset="1" stop-color="white"/>
                                                    </linearGradient>
                                                    <linearGradient id="paint4_linear_183_1149" x1="174.308" y1="39.419" x2="182.076" y2="23.443" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#E9EDFF"/>
                                                    <stop offset="0.19" stop-color="#E0E6FF"/>
                                                    <stop offset="0.22" stop-color="#DFE5FF"/>
                                                    <stop offset="0.6" stop-color="#EFF2FF"/>
                                                    <stop offset="0.86" stop-color="#F0F3FF"/>
                                                    <stop offset="0.95" stop-color="#F7F9FF"/>
                                                    <stop offset="1" stop-color="white"/>
                                                    </linearGradient>
                                                    </defs>
                                               </svg>
                                                <h4 class="mb-3 mt-3">{{get_phrase('No Result Found')}}</h4>
                                                <p class="mb-2">{{get_phrase('No Data were found matching your selection.')}}</p>
                                                <a href="javascript:void(0)" onclick="goBackToProducts()" class="btn mt-1 fsh-btn-dark">{{get_phrase('Go Back')}}</a>
                                          </div>
                                        </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Filter Grid List Main Area End -->

@endsection

@push('js')

<!-- Add JavaScript for Active Tab -->
<script>
    "use strict";
    document.addEventListener("DOMContentLoaded", function () {
        const tabKey = "activeTab";

        // Check if there's an active tab in localStorage
        const activeTabId = localStorage.getItem(tabKey);

        // If an active tab is found, show it
        if (activeTabId) {
            const activeTabTrigger = document.querySelector(`#${activeTabId}`);
            if (activeTabTrigger) {
                const tabInstance = new bootstrap.Tab(activeTabTrigger);
                tabInstance.show();
            }
        }

        // Save the active tab ID to localStorage when a tab is activated
        const tabTriggers = document.querySelectorAll('[data-bs-toggle="pill"]');
        tabTriggers.forEach(trigger => {
            trigger.addEventListener("shown.bs.tab", function (event) {
                localStorage.setItem(tabKey, event.target.id);
            });
        });
    });

function goBackToProducts() {
    // Get current URL
    const currentUrl = window.location.href;

    // Find the index of "/products"
    const baseIndex = currentUrl.indexOf('/products');

    if (baseIndex !== -1) {
        // Keep only up to "/products"
        const baseUrl = currentUrl.substring(0, baseIndex + 9); 
        window.location.href = baseUrl; // Redirect
    } else {
        // Fallback if not found
        window.history.back();
    }
}
</script>



@endpush
