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
@endphp

@if (isset($font_family['font_family']))
    <style>
        /* background color */
        .al-title-30px,
        .al-title-16px,
        .fsh-tab-link,
        body {
            font-family: {{ $font_family['font_family'] }} !important;
        }
        /* .al-title-30px {
            font-family: {{ $font_family['title_font_family'] }};
        } */
    </style>
@endif
@if (isset($body['card-background-color']))
    <style>
        /* background color */
        .category-card-body,
        .product-card {
            background-color: {{ $body['card-background-color'] }} ;
            
        }
       
    </style>
@endif 

@if($active_theme->identifier == 'perfume' || $active_theme->identifier == 'travel-dark' || $active_theme->identifier == 'car-dark'  || $active_theme->identifier == 'watch-dark' || $active_theme->identifier == 'coffee')
    @if (isset($body['color']))
        <style>
            /*  color */
            .circle-iconbox-42px span svg path{
                fill: {{ $body['color'] }} !important;
            }
           
          
            /*  color */
        </style>
    @endif

    

@endif

@php 
   $categoryInfo = App\Models\Category::where('id', $product->category_id)->first();
@endphp


    <!-- Breadcrumb Area Start -->
    <section class="mb-28px mt-30px wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb fsh-breadcrumb justify-content-start">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products', $categoryInfo->slug) }}">{{ $categoryInfo->title }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->
    <!-- Product View Area Start -->
    <section>
        <div class="container">
            <div class="row gy-4 mb-30px justify-content-center">
                <div class="col-lg-6 col-md-9 wow animate__fadeInUp" data-wow-delay=".2s">
                    <div class="tf-product-media-wrap">
                        <div class="thumbs-slider thumbs-slider-wrap">
                            <div dir="ltr" class="swiper tf-product-media-thumbs" data-direction="vertical">
                                <div class="swiper-wrapper">
                                    @php
                                        // $thumbnails = json_decode($product->thumbnail, true) ?? [];
                                        $decoded = json_decode($product->thumbnail, true);

                                        // If decode fails OR is not an array OR is empty → use placeholder as array
                                       $thumbnails = (!empty($decoded) && is_array($decoded)) 
                                        ? $decoded 
                                        : ['uploads/system/placeholder.png'];
                                    @endphp
                                    @foreach($thumbnails as $thumb)
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <img src="{{ get_image($thumb) }}" alt="product-thumb">
                                            </div> 
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div dir="ltr" class="swiper tf-product-media-main fsh-magnific-popup">
                                <div class="swiper-wrapper" >
                                    @php
                                        // $thumbnails = json_decode($product->thumbnail, true) ?? [];
                                        $decoded = json_decode($product->thumbnail, true);
                                    $thumbnails = (!empty($decoded) && is_array($decoded)) 
                                        ? $decoded 
                                        : ['uploads/system/placeholder.png'];
                                    @endphp
                                    @foreach($thumbnails as $thumb)
                                        <div class="swiper-slide ec-product-banner-slide">
                                            <a href="javascript:;"  class="item">
                                                <img class="tf-image-zoom" data-zoom="{{ get_image($thumb) }}" data-src="{{ get_image($thumb) }}" src="{{ get_image($thumb) }}" alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow animate__fadeInUp" data-wow-delay=".3s">
                    <div class="w-100 position-relative">
                        <div class="tf-zoom-main"></div>
                        <div class="d-flex align-items-end justify-content-between gap-10px flex-wrap mb-20px">
                            <div>
                                <h3 class="al-title-30px mb-3">{{ $product->title }}</h3>
                                   <div class="d-flex align-items-center gap-1 mb-2">
                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-20.svg') }}" alt="">
                                        <p class="al-title-16px fw-medium">{{ number_format($product->average_rating ?? 0, 1) }}  <span class="fsh-text-gray">({{ $product->reviews->count() }})</span></p>
                                    </div>
                               
                                @php 
                                    $vendor = App\Models\Brand::where('id', $product->brand_id)->first();
                                @endphp

                                <p class="al-subtitle-16px fsh-text-dark mb-1">{{get_phrase('Vendor :')}} {{ $vendor->name ?? ''}}</p>
                                <p class="al-subtitle-16px fsh-text-dark mb-1">{{get_phrase('SKU :')}} {{ $product->code }}</p>
                                <p class="al-subtitle-16px fsh-text-dark mb-1"> {{ get_phrase('Availability :') }} {{ availiblty($product->id) }}</p>

                                <div class="d-flex align-items-center gap-20px mt-3 flex-wrap">

                                    {{-- @if ($product->is_discounted)
                                        @php
                                            $discount = $product->discount;
                                        @endphp
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-flex align-items-center gap-2">
                                                @if ($discount->discount_type == 'percentage')
                                                    <h5 class="al-title-24px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h5>
                                                @else
                                                    <h5 class="al-title-24px">{{ currency($discount->discount_value) }}</h5>
                                                @endif
                                                <h6 class="al-title-18px fsh-text-gray fw-medium"><del>{{ currency($product->price) }}</del></h6>
                                            </div>
                                            <p class="sky-blue-badge-md">{{ $discount->discount_value }}%</p>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <h5 class="al-title-24px">{{ currency($product->price) }}</h5>
                                            </div>
                                        </div>
                                    @endif --}}

                                    @if ($product->is_discounted()->exists())
                                        @php
                                            $discount = $product->is_discounted;

                                            if ($discount->discount_type == 'percentage') {
                                                $final_price = $product->price - ($product->price * $discount->discount_value / 100);
                                                $discount_text = $discount->discount_value . '% OFF';
                                            } else { // flat
                                                $final_price = $product->price - $discount->discount_value;
                                                $discount_text = currency($discount->discount_value) . ' FLAT';
                                            }
                                        @endphp

                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <h5 class="al-title-24px">{{ currency($final_price) }}</h5>
                                                <h6 class="al-title-18px fsh-text-gray fw-medium">
                                                    <del>{{ currency($product->price) }}</del>
                                                </h6>
                                            </div>
                                            <p class="sky-blue-badge-md">{{ $discount_text }}</p>
                                        </div>
                                    @else
                                        <h5 class="al-title-24px">{{ currency($product->price) }}</h5>
                                    @endif



                                    
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mb-30px">
                            <h6 class="al-subtitle-16px fw-medium fsh-text-dark lh-1 mb-12px">{{ get_phrase('Hurry Up! Only').' '.$product->total_stock.' '.get_phrase('left in stock') }}.</h6>
                           
                            <div class="progress fsh-progress-md mb-12px max-w-450px" role="progressbar" 
                                aria-valuenow="{{ getSoldProgress($product->id) }}" 
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" data-progress="{{ getSoldProgress($product->id) }}"></div>
                            </div>
                        </div> --}}
                        <form class="ajaxForm eProductForm" id="productFormMain" action="{{ route('customer.cart_item.store', ['product_id' => $product->id]) }}" method="post">
                            @csrf
                           @foreach ($product->product_attribute_types as $index => $attribute_type)
                                @if ($attribute_type->input_type == 'text')
                                    <div class="mb-30px">
                                        <h5 class="al-title-16px fw-medium mb-3">{{ $attribute_type->name }}</h5>
                                        <div class="d-flex align-items-center gap-3 flex-wrap justify-content-between">
                                            <div class="d-flex align-items-center gap-12px flex-wrap">
                                                @foreach ($attribute_type->attributes as $attribute)
                                                    <div class="position-relative">
                                                        <label class="size-checkbox2-btn" for="{{ $attribute_type->slug . $attribute->slug }}">{{ $attribute->name }}</label>
                                                        <input type="radio" class="size-checkbox2-input" name="{{ $attribute_type->slug }}[]" id="{{ $attribute_type->slug . $attribute->slug }}" autocomplete="off" value="{{ $attribute->slug }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            
                                @if ($attribute_type->input_type == 'color')
                                    <div class="mb-20px">
                                        <div class="d-flex gap-30px flex-wrap align-items-start">
                                            <div>
                                                <h6 class="al-title-16px fw-medium mb-3">
                                                    <span>{{ $attribute_type->name }} :</span> 
                                                    <span id="selected-color-name">{{ get_phrase('Light Pink') }}</span>
                                                </h6>
                                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                                    @foreach ($attribute_type->attributes as $key => $attribute)
                                                        <div class="position-relative">
                                                            <label class="color-checkbox3-btn" 
                                                                   for="{{ $attribute_type->slug . $attribute->slug }}" 
                                                                   style="--checkbox-color: {{ $attribute->input_value }}"></label>
                                                            <input type="radio" class="color-checkbox3-input" 
                                                                   name="{{ $attribute_type->slug }}[]" 
                                                                   id="{{ $attribute_type->slug . $attribute->slug }}" 
                                                                   value="{{ $attribute->slug }}" 
                                                                   autocomplete="off" 
                                                                   {{ $key == 0 ? 'checked' : '' }} 
                                                                   data-color-name="{{ $attribute->name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                            
                                            <!-- Quantity box beside color -->
                                            <!-- Quantity box beside color -->
                                          
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                             <div class="dtBtn d-flex mb-12px">
                                <button type="submit" class="btn fsh-btn-dark order-3 order-md-1"> {{ strtoupper(get_phrase('ADD TO CART')) }}</button>
                                 <div class="d-flex dtToolBtn align-items-center gap-6px order-1 order-md-2 mb-1 mb-md-0">
                                    <a href="javascript:;" 
                                            class="circle-iconbox-42px {{ wishlist_class($product->id) }}" 
                                            onclick="toggleWishlist({{ $product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="Wishlist" data-bs-placement="top">
                                            <span class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M10.0008 17.5059C9.75965 17.5059 9.52632 17.4748 9.33187 17.4048C6.36076 16.3859 1.63965 12.7692 1.63965 7.42586C1.63965 4.70364 3.84076 2.49475 6.54743 2.49475C7.86187 2.49475 9.09076 3.00808 10.0008 3.92586C10.9108 3.00808 12.1396 2.49475 13.4541 2.49475C16.1608 2.49475 18.3619 4.71142 18.3619 7.42586C18.3619 12.777 13.6408 16.3859 10.6696 17.4048C10.4752 17.4748 10.2419 17.5059 10.0008 17.5059ZM6.54743 3.66142C4.48632 3.66142 2.80632 5.3492 2.80632 7.42586C2.80632 12.7381 7.91632 15.6936 9.71298 16.3081C9.85298 16.3548 10.1563 16.3548 10.2963 16.3081C12.0852 15.6936 17.203 12.7459 17.203 7.42586C17.203 5.3492 15.523 3.66142 13.4619 3.66142C12.2796 3.66142 11.183 4.21364 10.4752 5.17031C10.2574 5.46586 9.75965 5.46586 9.54187 5.17031C8.81854 4.20586 7.72965 3.66142 6.54743 3.66142Z" fill="#0D0E10"/>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="javascript:;" class="circle-iconbox-42px" id="shareButton">
                                            <span class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Share" data-bs-placement="top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <g clip-path="url(#clip0_664_18329)">
                                                    <path d="M13.9346 11.2077C12.885 11.2077 11.9454 11.6865 11.3219 12.437L7.26631 10.1344C7.39243 9.77952 7.46175 9.39792 7.46175 9.00024C7.46175 8.60263 7.39243 8.22103 7.26631 7.86613L11.3216 5.56297C11.945 6.31374 12.8847 6.7927 13.9344 6.7927C15.8067 6.7927 17.3299 5.26891 17.3299 3.39583C17.3301 1.52332 15.8068 0 13.9346 0C12.062 0 10.5386 1.52332 10.5386 3.39576C10.5386 3.79344 10.6079 4.17512 10.7341 4.5301L6.67858 6.83334C6.0552 6.08297 5.11566 5.60432 4.06631 5.60432C2.19356 5.60432 0.669922 7.12764 0.669922 9.00016C0.669922 10.8726 2.19356 12.3959 4.06631 12.3959C5.11566 12.3959 6.05512 11.9173 6.6785 11.167L10.7341 13.4697C10.6079 13.8246 10.5386 14.2064 10.5386 14.6042C10.5386 16.4766 12.062 17.9999 13.9345 17.9999C15.8068 17.9999 17.33 16.4765 17.33 14.6042C17.3301 12.7314 15.8068 11.2077 13.9346 11.2077ZM13.9346 1.1883C15.1516 1.1883 16.1418 2.17854 16.1418 3.39576C16.1418 4.6136 15.1516 5.60432 13.9346 5.60432C12.7173 5.60432 11.7269 4.6136 11.7269 3.39576C11.7269 2.17854 12.7173 1.1883 13.9346 1.1883ZM4.06639 11.2077C2.84886 11.2077 1.8583 10.2174 1.8583 9.00024C1.8583 7.78295 2.84886 6.7927 4.06639 6.7927C5.28344 6.7927 6.27353 7.78295 6.27353 9.00024C6.27353 10.2174 5.28336 11.2077 4.06639 11.2077ZM13.9346 16.8117C12.7173 16.8117 11.7269 15.8214 11.7269 14.6042C11.7269 13.3866 12.7173 12.396 13.9346 12.396C15.1516 12.396 16.1418 13.3866 16.1418 14.6042C16.1418 15.8214 15.1516 16.8117 13.9346 16.8117Z" fill="#0D0E10"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_664_18329">
                                                        <rect width="18" height="18" fill="white"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                             </div>
                        </form>
                         
                        <!-- Hidden Buy Now Form -->
                        <form class="buyNowForm d-none" id="buyNowFormMain" action="{{ route('customer.buy_now', ['product_id' => $product->id]) }}" method="post" >
                            @csrf
                            <!-- Hidden inputs will be dynamically filled -->
                        </form>

                        <div class="mb-30px etBtn">
                            <!-- Buy Now Button -->
                            <button type="button" id="buyNowButtonMain" class="btn fsh-btn-warning w-100">
                                {{ strtoupper(get_phrase('BUY IT NOW')) }}
                            </button>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product View Area End -->


    <!-- Get It Today Area Start -->
    <section>
        <div class="container">
            <div class="row g-30px mb-60px wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="d-flex align-items-start gap-12px">
                        <div class="circle-iconbox-48px svg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12.9988 14.75H11.9988C11.5888 14.75 11.2488 14.41 11.2488 14C11.2488 13.59 11.5888 13.25 11.9988 13.25H12.9988C13.6888 13.25 14.2488 12.69 14.2488 12V2.75H5.9988C4.8188 2.75 3.73877 3.38998 3.15877 4.41998C2.95877 4.77998 2.49882 4.91002 2.13882 4.71002C1.77882 4.51002 1.64878 4.05 1.84878 3.69C2.68878 2.19 4.2788 1.25 5.9988 1.25H14.9988C15.4088 1.25 15.7488 1.59 15.7488 2V12C15.7488 13.52 14.5188 14.75 12.9988 14.75Z" fill="#0D0E10"/>
                                <path d="M19 20.75H18C17.59 20.75 17.25 20.41 17.25 20C17.25 19.31 16.69 18.75 16 18.75C15.31 18.75 14.75 19.31 14.75 20C14.75 20.41 14.41 20.75 14 20.75H10C9.59 20.75 9.25 20.41 9.25 20C9.25 19.31 8.69 18.75 8 18.75C7.31 18.75 6.75 19.31 6.75 20C6.75 20.41 6.41 20.75 6 20.75H5C2.93 20.75 1.25 19.07 1.25 17C1.25 16.59 1.59 16.25 2 16.25C2.41 16.25 2.75 16.59 2.75 17C2.75 18.24 3.76 19.25 5 19.25H5.34997C5.67997 18.1 6.74 17.25 8 17.25C9.26 17.25 10.32 18.1 10.65 19.25H13.36C13.69 18.1 14.75 17.25 16.01 17.25C17.27 17.25 18.33 18.1 18.66 19.25H19C20.24 19.25 21.25 18.24 21.25 17V14.75H19C18.04 14.75 17.25 13.96 17.25 13V10C17.25 9.04 18.03 8.25 19 8.25L17.93 6.38C17.71 5.99 17.29 5.75 16.84 5.75H15.75V12C15.75 13.52 14.52 14.75 13 14.75H12C11.59 14.75 11.25 14.41 11.25 14C11.25 13.59 11.59 13.25 12 13.25H13C13.69 13.25 14.25 12.69 14.25 12V5C14.25 4.59 14.59 4.25 15 4.25H16.84C17.83 4.25 18.74 4.78001 19.23 5.64001L20.94 8.63C21.07 8.86 21.07 9.15 20.94 9.38C20.81 9.61 20.56 9.75 20.29 9.75H19C18.86 9.75 18.75 9.86 18.75 10V13C18.75 13.14 18.86 13.25 19 13.25H22C22.41 13.25 22.75 13.59 22.75 14V17C22.75 19.07 21.07 20.75 19 20.75Z" fill="#0D0E10"/>
                                <path d="M8.00098 22.75C6.48098 22.75 5.25098 21.52 5.25098 20C5.25098 18.48 6.48098 17.25 8.00098 17.25C9.52098 17.25 10.751 18.48 10.751 20C10.751 21.52 9.52098 22.75 8.00098 22.75ZM8.00098 18.75C7.31098 18.75 6.75098 19.31 6.75098 20C6.75098 20.69 7.31098 21.25 8.00098 21.25C8.69098 21.25 9.25098 20.69 9.25098 20C9.25098 19.31 8.69098 18.75 8.00098 18.75Z" fill="#0D0E10"/>
                                <path d="M16 22.75C14.48 22.75 13.25 21.52 13.25 20C13.25 18.48 14.48 17.25 16 17.25C17.52 17.25 18.75 18.48 18.75 20C18.75 21.52 17.52 22.75 16 22.75ZM16 18.75C15.31 18.75 14.75 19.31 14.75 20C14.75 20.69 15.31 21.25 16 21.25C16.69 21.25 17.25 20.69 17.25 20C17.25 19.31 16.69 18.75 16 18.75Z" fill="#0D0E10"/>
                                <path d="M22 14.75H19C18.04 14.75 17.25 13.96 17.25 13V10C17.25 9.04 18.04 8.25 19 8.25H20.29C20.56 8.25 20.81 8.39 20.94 8.63L22.65 11.63C22.71 11.74 22.75 11.87 22.75 12V14C22.75 14.41 22.41 14.75 22 14.75ZM19 9.75C18.86 9.75 18.75 9.86 18.75 10V13C18.75 13.14 18.86 13.25 19 13.25H21.25V12.2L19.85 9.75H19Z" fill="#0D0E10"/>
                                <path d="M8 8.75H2C1.59 8.75 1.25 8.41 1.25 8C1.25 7.59 1.59 7.25 2 7.25H8C8.41 7.25 8.75 7.59 8.75 8C8.75 8.41 8.41 8.75 8 8.75Z" fill="#0D0E10"/>
                                <path d="M6 11.75H2C1.59 11.75 1.25 11.41 1.25 11C1.25 10.59 1.59 10.25 2 10.25H6C6.41 10.25 6.75 10.59 6.75 11C6.75 11.41 6.41 11.75 6 11.75Z" fill="#0D0E10"/>
                                <path d="M4 14.75H2C1.59 14.75 1.25 14.41 1.25 14C1.25 13.59 1.59 13.25 2 13.25H4C4.41 13.25 4.75 13.59 4.75 14C4.75 14.41 4.41 14.75 4 14.75Z" fill="#0D0E10"/>
                            </svg>
                        </div>
                       <div class="max-w-sm-260px">
                            <h2 class="al-title-18px mb-2">{{ get_phrase('Committed to better shopping experiences') }}</h2>
                            <p class="al-subtitle-16px fw-medium">{{ get_phrase('Delivering value with every purchase') }}</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="d-flex align-items-start gap-12px">
                        <div class="circle-iconbox-48px svg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                <path d="M12.5 1.57501C7.32573 1.57501 3.11523 5.78476 3.11523 10.9598V13.7558V14.7008C3.11523 16.4978 4.57698 17.9595 6.37398 17.9595H6.54198C7.50723 17.9595 8.29323 17.1743 8.29323 16.2098V12.249C8.29323 11.2853 7.50873 10.5015 6.54498 10.5015H6.37023C5.65698 10.5015 5.00298 10.7385 4.46598 11.1293V10.9605C4.46598 6.52951 8.06973 2.92501 12.5 2.92501C16.9302 2.92501 20.534 6.52951 20.534 10.9598V11.1285C19.997 10.7385 19.3422 10.5008 18.6297 10.5008H18.455C17.4912 10.5008 16.7067 11.2845 16.7067 12.2483V16.212C16.7067 17.1758 17.4912 17.9595 18.455 17.9595H18.5427C18.2847 18.9863 17.3607 19.752 16.2545 19.752H15.8795C15.6005 18.9848 14.8715 18.432 14.009 18.432H13.4135C12.3125 18.432 11.417 19.3275 11.417 20.4285C11.417 21.5295 12.3125 22.425 13.4135 22.425H14.009C14.8722 22.425 15.6027 21.8708 15.8802 21.102H16.2545C18.2037 21.102 19.79 19.5885 19.9422 17.6775C21.0837 17.1713 21.884 16.0313 21.884 14.7045C21.884 14.388 21.884 14.0723 21.884 13.7558V10.9598C21.8847 5.78476 17.6742 1.57501 12.5 1.57501ZM6.37023 11.8508H6.54498C6.76473 11.8508 6.94248 12.0293 6.94248 12.2483V16.209C6.94248 16.4295 6.76323 16.6095 6.54198 16.6095H6.37398C5.32173 16.6095 4.46598 15.753 4.46598 14.7008C4.46598 14.3858 4.46598 14.0708 4.46598 13.7558C4.46598 12.705 5.32023 11.8508 6.37023 11.8508ZM14.0097 21.075H13.4142C13.0572 21.075 12.7685 20.7848 12.7685 20.4285C12.7685 20.0715 13.058 19.782 13.4142 19.782H14.0097C14.3667 19.782 14.6555 20.0723 14.6555 20.4285C14.6555 20.7848 14.366 21.075 14.0097 21.075ZM20.534 14.7045C20.534 15.7545 19.6797 16.6095 18.6297 16.6095H18.455C18.2352 16.6095 18.0575 16.431 18.0575 16.212V12.2483C18.0575 12.0293 18.2352 11.8508 18.455 11.8508H18.629C19.679 11.8508 20.5332 12.7058 20.5332 13.7558C20.534 14.0723 20.534 14.388 20.534 14.7045Z" fill="#0D0E10"/>
                            </svg>
                        </div>
                        <div class="max-w-sm-260px">
                            <h2 class="al-title-18px mb-2">{{get_phrase('Support Everyday')}}</h2>
                            <p class="al-subtitle-16px fw-medium">{{get_phrase('Support from 8:30 AM to 10:00 PM everyday')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="d-flex align-items-start gap-12px">
                        <div class="circle-iconbox-48px svg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M15.0002 22.75C14.7302 22.75 14.4802 22.6 14.3502 22.37C14.2202 22.14 14.2202 21.85 14.3602 21.62L15.4102 19.87C15.6202 19.51 16.0802 19.4 16.4402 19.61C16.8002 19.82 16.9102 20.28 16.7002 20.64L16.4302 21.09C19.1902 20.44 21.2602 17.96 21.2602 15C21.2602 14.59 21.6002 14.25 22.0102 14.25C22.4202 14.25 22.7602 14.59 22.7602 15C22.7502 19.27 19.2702 22.75 15.0002 22.75Z" fill="#0D0E10"/>
                                <path d="M2 9.75C1.59 9.75 1.25 9.41 1.25 9C1.25 4.73 4.73 1.25 9 1.25C9.27 1.25 9.51999 1.4 9.64999 1.63C9.77999 1.86 9.78 2.15 9.64 2.38L8.59 4.13C8.38 4.49001 7.92 4.60001 7.56 4.39001C7.2 4.18001 7.09 3.71999 7.3 3.35999L7.57001 2.90997C4.81001 3.55997 2.74001 6.04 2.74001 9C2.75001 9.41 2.41 9.75 2 9.75Z" fill="#0D0E10"/>
                                <path d="M17.6804 7.49987C17.5504 7.49987 17.4204 7.4699 17.3004 7.3999L13.3304 5.09985C12.9704 4.88985 12.8504 4.42988 13.0604 4.06988C13.2704 3.70988 13.7304 3.58986 14.0804 3.79986L17.6804 5.87988L21.2504 3.80987C21.6104 3.59987 22.0704 3.72989 22.2704 4.07989C22.4804 4.43989 22.3504 4.89986 22.0004 5.10986L18.0504 7.38989C17.9404 7.45989 17.8104 7.49987 17.6804 7.49987Z" fill="#0D0E10"/>
                                <path d="M17.6797 11.5699C17.2697 11.5699 16.9297 11.2299 16.9297 10.8199V6.73987C16.9297 6.32987 17.2697 5.98987 17.6797 5.98987C18.0897 5.98987 18.4297 6.32987 18.4297 6.73987V10.8199C18.4297 11.2399 18.0897 11.5699 17.6797 11.5699Z" fill="#0D0E10"/>
                                <path d="M17.6794 11.7499C17.2194 11.7499 16.7494 11.6499 16.3794 11.4399L13.9794 10.1099C13.1994 9.67993 12.6094 8.66997 12.6094 7.77997V5.23993C12.6094 4.33993 13.1994 3.33997 13.9894 2.89997L16.3894 1.56995C17.1294 1.15995 18.2394 1.15995 18.9894 1.56995L21.3894 2.89997C22.1694 3.32997 22.7594 4.33992 22.7594 5.22992V7.76996C22.7594 8.66996 22.1694 9.66992 21.3894 10.0999L18.9894 11.4299C18.5994 11.6499 18.1394 11.7499 17.6794 11.7499ZM17.1094 2.86994L14.7094 4.19996C14.4094 4.36996 14.1094 4.87991 14.1094 5.21991V7.75995C14.1094 8.10995 14.4094 8.61997 14.7094 8.77997L17.1094 10.1199C17.3994 10.2799 17.9594 10.2799 18.2494 10.1199L20.6494 8.78992C20.9494 8.61992 21.2494 8.10996 21.2494 7.76996V5.22992C21.2494 4.87992 20.9494 4.36997 20.6494 4.20997L18.2494 2.87995C17.9594 2.70995 17.3894 2.70994 17.1094 2.86994Z" fill="#0D0E10"/>
                                <path d="M6.321 18.4999C6.191 18.4999 6.06099 18.4699 5.94099 18.3999L1.97099 16.0998C1.61099 15.8898 1.49099 15.4299 1.70099 15.0699C1.91099 14.7099 2.37099 14.5899 2.72099 14.7999L6.321 16.8799L9.89099 14.8099C10.251 14.5999 10.711 14.7299 10.911 15.0799C11.121 15.4399 10.991 15.8999 10.641 16.1099L6.69099 18.3899C6.58099 18.4599 6.451 18.4999 6.321 18.4999Z" fill="#0D0E10"/>
                                <path d="M6.32031 22.5699C5.91031 22.5699 5.57031 22.2299 5.57031 21.8199V17.7399C5.57031 17.3299 5.91031 16.9899 6.32031 16.9899C6.73031 16.9899 7.07031 17.3299 7.07031 17.7399V21.8199C7.07031 22.2399 6.74031 22.5699 6.32031 22.5699Z" fill="#0D0E10"/>
                                <path d="M6.32001 22.7499C5.86001 22.7499 5.39 22.6499 5.02 22.4399L2.62 21.1099C1.84 20.6799 1.25 19.67 1.25 18.78V16.2399C1.25 15.3399 1.84 14.3399 2.62 13.9099L5.02 12.58C5.76 12.17 6.88 12.17 7.62 12.58L10.02 13.9099C10.8 14.3399 11.39 15.3499 11.39 16.2399V18.78C11.39 19.68 10.8 20.6799 10.01 21.1199L7.61 22.45C7.25 22.65 6.79001 22.7499 6.32001 22.7499ZM5.75 13.8699L3.35001 15.2C3.05001 15.37 2.75 15.8799 2.75 16.2199V18.76C2.75 19.11 3.05001 19.62 3.35001 19.78L5.75 21.1099C6.04 21.2699 6.6 21.2699 6.89 21.1099L9.28999 19.78C9.58999 19.61 9.89 19.1 9.89 18.76V16.2199C9.89 15.8699 9.58999 15.36 9.28999 15.2L6.89 13.8599C6.61 13.7099 6.04 13.7099 5.75 13.8699Z" fill="#0D0E10"/>
                            </svg>
                        </div>
                        <div class="max-w-sm-260px">
                            <h2 class="al-title-18px mb-2">{{get_phrase('100 Day Returns')}}</h2>
                            <p class="al-subtitle-16px fw-medium">{{get_phrase('Not impressed? Get a refund. You have 100 days to break our hearts.')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Get It Today Area End -->


    <!-- Tab Area Start -->
    <section>
        <div class="container">
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <ul class="nav nav-pills fsh-tab-pills" id="productinfo-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link active" id="pills-info1-tab" data-bs-toggle="pill" data-bs-target="#pills-info1" type="button" role="tab" aria-controls="pills-info1" aria-selected="true">{{get_phrase('Description')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link" id="pills-info2-tab" data-bs-toggle="pill" data-bs-target="#pills-info2" type="button" role="tab" aria-controls="pills-info2" aria-selected="false">{{get_phrase('Additional Information')}}</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link" id="pills-info3-tab" data-bs-toggle="pill" data-bs-target="#pills-info3" type="button" role="tab" aria-controls="pills-info3" aria-selected="false">{{get_phrase('Shipping & Return')}}</button>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link" id="pills-info4-tab" data-bs-toggle="pill" data-bs-target="#pills-info4" type="button" role="tab" aria-controls="pills-info4" aria-selected="false">{{get_phrase('Review')}}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productinfo-tabContent">
                        <!-- Description -->
                        <div class="tab-pane fade show active" id="pills-info1" role="tabpanel" aria-labelledby="pills-info1-tab" tabindex="0">
                            <div class="mb-60px mt-4">
                                <p class="al-subtitle-16px mb-4">{!! $product->description !!}</p>
                            </div>
                        </div>
                        <!-- Additional Information -->
                        <div class="tab-pane fade" id="pills-info2" role="tabpanel" aria-labelledby="pills-info2-tab" tabindex="0">
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Summary') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->summary }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Total stock') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->total_stock }} <span class="text-capitalize">{{ $product->unit }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Seller') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->store->name }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Brand') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->brand->name }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Quality label') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->quality_label }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Shipping & Return -->
                      
                        <!-- Review -->
                        <div class="tab-pane fade" id="pills-info4" role="tabpanel" aria-labelledby="pills-info4-tab" tabindex="0">
                            
                            @php
                                $product_reviews = $product->reviews;
                                $total_reviews = $product_reviews->count();
                            @endphp

                            <div class="mt-30px mb-80px">
                                <div class="d-flex align-items-center flex-wrap ratings-stars-main-wrap pb-30px mb-20px fsh-border-bottom">
                                    <div class="rating-wrap-line">
                                        <div class="d-flex align-items-center gap-2 mb-3">
                                            <h2 class="al-title-30px fw-medium">{{ number_format($product->average_rating ?? 0, 1) }}</h2>
                                            <div class="rating-stars-wrap">
                                                <!-- gray star name 'star-gray-22.svg' -->
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($product->average_rating))
                                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-22.svg') }}" alt="">
                                                    @elseif ($i == ceil($product->average_rating) && !is_int($product->average_rating))
                                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-half-22.svg') }}" alt="">
                                                    @else
                                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-gray-22.svg') }}" alt="">
                                                    @endif
                                                @endfor

                                            </div>
                                        </div>
                                      

                                        <p class="al-subtitle-16px fw-medium lh-1">{{$total_reviews}} {{get_phrase('Global Ratings')}}</p>
                                    </div>
                                    <div class="rating-progress-main-wrap progress-wrap-line">
                                        @for ($i = 5; $i >= 1; $i--)
                                            @php
                                                if ($total_reviews > 0) {
                                                    $star_wise_reviews = $product_reviews->where('rating', $i)->count();
                                                    $percentage = ($star_wise_reviews / $total_reviews) * 100;
                                                } else {
                                                    $star_wise_reviews = 0;
                                                    $percentage = 0;
                                                }
                                            @endphp
                                            <div class="single-rating-progress-wrap">
                                                <h5 class="rating">{{ $i }} {{ $i > 1 ? get_phrase('Stars') : get_phrase('Star') }}</h5>
                                                <div class="animate-progress progressbar-width" data-skill="{{ $percentage }}"></div>
                                                <h5 class="count">{{ $star_wise_reviews }}</h5>
                                            </div>
                                        @endfor
                                    </div>
                                    <div>
                                        <a href="#writeareview" class="btn fsh-btn-outline-dark min-w-255px">{{ strtoupper(get_phrase('WRITE A REVIEW')) }}</a>
                                    </div>
                                </div>
                                @php
                                    $limit = 10;
                                    $reviews = App\Models\Review::where('product_id', $product->id);
                                    $total_reviews = $reviews->count();

                                    if (!isset($skip)) {
                                        $skip = 0;
                                    }
                                    if (!isset($sort_by)) {
                                        $orderBy = 'desc';
                                        $sort_by = 'new';
                                    } else {
                                        $orderBy = $sort_by == 'old' ? 'asc' : 'desc';
                                    }

                                @endphp
                                @if ($skip == 0)
                                <div class="mb-4 pb-20px fsh-border-bottom">
                                    <select onchange="load_view('{{ route('view', ['path' => 'frontend.product.customer_reviews', 'product_id' => $product->id]) }}&sort_by='+$(this).val(), '#customer_reviews');" id="customer_review_sort_value" class="fsh-nice-select radius-lg-select float-none width-fit-content">
                                        <option value="new" @if ($sort_by == 'new') selected @endif>{{ get_phrase('Sort by newest') }}</option>
                                        <option value="old" @if ($sort_by == 'old') selected @endif>{{ get_phrase('Short by oldest') }}</option>
                                    </select>
                                </div>
                                @endif
                                <!-- Customer Reviews -->
                                <div class="mb-30px" id="customer_reviews">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <!-- Review Form -->
                                <div id="writeareview" class="pt-60px">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tab Area End -->


    <!-- Related Products Slider Area Start -->
    <section class="mt-5">
        <div class="container">
            <div class="row mb-20px wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="col-12">
                    <div class="d-flex align-items-start gap-3 justify-content-between">
                        <h1 class="al-title-30px">{{ get_phrase('Related Products') }}</h1>
                        <div class="d-flex align-items-start gap-12px">
                            <button type="button" class="products-slider-prev-btn svg-block item-slider-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14 8L10 12L14 16" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button type="button" class="products-slider-next-btn svg-block item-slider-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M10 8L14 12L10 16" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                @php
                    $active_theme = \App\Models\Theme::where('status', 1)->first();
                @endphp
            <div class="row mb-100px wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    @include("components.{$active_theme->identifier}.products.related_product")
                </div>
            </div>
        </div>
    </section>
    <!-- Related Products Slider Area End -->



@endsection

@push('js')
    <script type="text/javascript">

	    "use strict";

        load_view("{{ route('view', ['path' => 'frontend.product.customer_reviews', 'product_id' => $product->id]) }}", "#customer_reviews");
        load_view("{{ route('view', ['path' => 'frontend.product.customer_review_add_update', 'product_id' => $product->id]) }}", "#writeareview");


        $(document).ready(function() {
            const colorInputs = document.querySelectorAll('.color-checkbox3-input');
            const colorNameDisplay = document.getElementById('selected-color-name');

            // Initialize with the first selected color
            const defaultChecked = document.querySelector('.color-checkbox3-input:checked');
            if (defaultChecked) {
                colorNameDisplay.textContent = defaultChecked.dataset.colorName;
            }

            // Update color name on change
            colorInputs.forEach(input => {
                input.addEventListener('change', function () {
                    if (this.checked) {
                        colorNameDisplay.textContent = this.dataset.colorName;
                    }
                });
            });
        });


        $(document).ready(function() {
            $('#buyNowButtonMain').on('click', function() {
                // Get data from productForm
                const productForm = document.getElementById('productFormMain');
                const buyNowForm = document.getElementById('buyNowFormMain');

                // Clear buyNowForm fields
                buyNowForm.innerHTML = '';

                // Copy inputs from productForm to buyNowForm
                Array.from(productForm.elements).forEach(function (element) {
                    if (element.name && element.value) {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = element.name;
                        input.value = element.value;
                        buyNowForm.appendChild(input);
                    }
                });

                // Submit the buyNowForm
                buyNowForm.submit();
            });
        });

    </script>

   <script type="text/javascript">

	    "use strict";
            document.querySelectorAll('.progress-bar').forEach(bar => {
            let val = bar.dataset.progress;
            val = Math.min(Math.max(val, 0), 100);
            bar.style.width = val + '%';
        });

</script>
<script>
    "use strict";
        $(document).ready(function() {
            $('#shareButton').on('click', function() {
                var currentPageUrl = window.location.href;
                $(this).toggleClass('active');
                navigator.clipboard.writeText(currentPageUrl).then(function() {
                    success('Successfully copied this link!');
                }).catch(function(error) {
                    error('Failed to copy the link!');
                });
            });
        });
</script>




@endpush



