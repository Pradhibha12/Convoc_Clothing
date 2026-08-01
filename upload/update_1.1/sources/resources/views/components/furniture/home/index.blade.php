<!-- Banner Area Start -->
<section class="banner-section-main section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content-area">
                    <!-- Lamp shape -->
                    <span class="banner-lamp-shape">
                        <img src="{{ asset('assets/frontend/furniture/images/all-images/banner-shape.webp') }}" alt="">
                        <span class="banner-lamp-line"></span>
                    </span>
                    <div class="banner-content-lef">
                        <h2 class="bn-sm-title">{{get_phrase('Modern')}} <span class="ec2-text-skin">{{get_phrase('Furniture')}}</span> {{get_phrase('for')}} <img class="banner-title-shape" src="{{ asset('assets/frontend/furniture/images/all-images/banner-title-shape.svg') }}"> {{get_phrase('Every')}}</h2>
                        <h1 class="banner-title">{{get_phrase('Lifestyl')}}<span class="banner-title-typo">{{get_phrase('e')}}</span></h1>
                        <p class="banner-subtitle">{{get_phrase('The gently curved lines accentuated by sewn details are kind to your body and pleasant to look at also mechanism.')}}</p>
                        <a href="{{route('all_products')}}" class="btn ec-btn-skin">{{get_phrase('Shop Now')}}</a>
                    </div>
                    <div class="banner-content-right">
                        <div class="banner-content-right-inner">
                            <div class="banner-content-right-position">
                                <div class="banner-product-details">
                                    <h3 class="title">{{get_phrase('Astronio Minimal Chair')}}</h3>
                                </div>
                                <img class="banner" src="{{ asset('assets/frontend/furniture/images/all-images/banner-all-images.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->


<!-- Featured Category Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Featured Categories')}}</h1>
                </div>
            </div>
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper category-slider">
                    <div class="swiper-wrapper">
                         @php
                            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                        @endphp
                        <!-- Single Slide -->
                        @foreach($categories as $category)
                            <div class="swiper-slide">
                                <div class="single-category-card">
                                    <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="">
                                    <div class="category-btn-wrap">
                                        <a href="{{ route('products', $category->slug) }}" class="btn ec2-btn-white">{{ $category->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Slide -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Category Area End -->


<!-- Popular Product Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Popular Products')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-40px wow animate__fadeInUp" data-wow-delay=".2s">
            @php
                $products = App\Models\Product::where('status', 1)->where('label', 'top-seller')->orderBy('id', 'DESC')->take(8)->get();
             @endphp 
             @foreach($products as $product)  
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="product-md-card">
                    <div class="product-md-banner mb-3">
                        @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                        <div class="product-md-buttons">
                            <a href="javascript:;"  class="white-icon-btn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="d-flex align-items-center justify-content-center w-100 h-100" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 16.2375C8.7675 16.2375 8.5425 16.2075 8.355 16.14C5.49 15.1575 0.9375 11.67 0.9375 6.5175C0.9375 3.8925 3.06 1.7625 5.67 1.7625C6.9375 1.7625 8.1225 2.2575 9 3.1425C9.8775 2.2575 11.0625 1.7625 12.33 1.7625C14.94 1.7625 17.0625 3.9 17.0625 6.5175C17.0625 11.6775 12.51 15.1575 9.645 16.14C9.4575 16.2075 9.2325 16.2375 9 16.2375ZM5.67 2.8875C3.6825 2.8875 2.0625 4.515 2.0625 6.5175C2.0625 11.64 6.99 14.49 8.7225 15.0825C8.8575 15.1275 9.15 15.1275 9.285 15.0825C11.01 14.49 15.945 11.6475 15.945 6.5175C15.945 4.515 14.325 2.8875 12.3375 2.8875C11.1975 2.8875 10.14 3.42 9.4575 4.3425C9.2475 4.6275 8.7675 4.6275 8.5575 4.3425C7.86 3.4125 6.81 2.8875 5.67 2.8875Z" fill="#15191D"/>
                                    </svg>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="white-icon-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                <span class="d-flex align-items-center justify-content-center w-100 h-100" data-bs-toggle="tooltip" data-bs-title="Quick View">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.00043 12.247C7.20793 12.247 5.75293 10.792 5.75293 8.99954C5.75293 7.20704 7.20793 5.75204 9.00043 5.75204C10.7929 5.75204 12.2479 7.20704 12.2479 8.99954C12.2479 10.792 10.7929 12.247 9.00043 12.247ZM9.00043 6.87704C7.83043 6.87704 6.87793 7.82954 6.87793 8.99954C6.87793 10.1695 7.83043 11.122 9.00043 11.122C10.1704 11.122 11.1229 10.1695 11.1229 8.99954C11.1229 7.82954 10.1704 6.87704 9.00043 6.87704Z" fill="#15191D"/>
                                        <path d="M8.99908 15.7651C6.17908 15.7651 3.51658 14.1151 1.68658 11.2501C0.891582 10.0126 0.891582 7.99509 1.68658 6.75009C3.52408 3.88509 6.18658 2.23509 8.99908 2.23509C11.8116 2.23509 14.4741 3.88509 16.3041 6.75009C17.0991 7.98759 17.0991 10.0051 16.3041 11.2501C14.4741 14.1151 11.8116 15.7651 8.99908 15.7651ZM8.99908 3.36009C6.57658 3.36009 4.25908 4.81509 2.63908 7.35759C2.07658 8.23509 2.07658 9.76509 2.63908 10.6426C4.25908 13.1851 6.57658 14.6401 8.99908 14.6401C11.4216 14.6401 13.7391 13.1851 15.3591 10.6426C15.9216 9.76509 15.9216 8.23509 15.3591 7.35759C13.7391 4.81509 11.4216 3.36009 8.99908 3.36009Z" fill="#15191D"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="product-md-details">
                        <div class="d-flex align-items-center gap-1 mb-2">
                            <span class="svg-block">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.3393 6.00541L10.7472 7.53983C10.5285 7.7502 10.3801 8.17093 10.4254 8.47203L10.6729 10.2704C10.8338 11.4213 10.1202 11.9204 9.089 11.3841L7.34009 10.4684C7.04723 10.3158 6.56875 10.3241 6.28414 10.4932L4.75384 11.3883C3.54528 12.0936 2.82344 11.5615 3.14517 10.2003L3.59478 8.29879C3.67727 7.95231 3.52466 7.47796 3.26479 7.24285L1.81699 5.93529C0.781671 4.99896 1.07041 4.14926 2.46458 4.04201L4.22999 3.91002C4.55998 3.88527 4.96008 3.62541 5.1127 3.33255L6.0284 1.57539C6.56875 0.548315 7.43908 0.55244 7.96293 1.58776L8.77964 3.20468C8.91988 3.47692 9.27461 3.7409 9.57572 3.78627L11.7619 4.14101C12.9415 4.339 13.2014 5.17633 12.3393 6.00541Z" fill="#FBBF27"/>
                                </svg>
                            </span>
                            <span class="al-subtitle2-14px">({{ $product->reviews->count() }}) {{get_phrase('Reviews')}}</span>
                        </div>
                        <a href="{{ route('product', $product->slug) }}" class="al-title-16px text-link mb-20px">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</a>
                        <div class="d-flex align-items-start gap-2 flex-wrap justify-content-between">
                            <div class="d-flex align-items-start gap-2">
                                @if ($product->is_discounted)
                                @php
                                    $discount = $product->discount;
                                @endphp
                                @if ($discount->discount_type == 'percentage')
                                    <h4 class="al-title2-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                        <h4 class="al-title-16px fw-medium ec-text-secondary"><del>{{ currency($product->price) }}</del></h4>
                                @else
                                    <h4 class="al-title2-18px">{{ currency($product->price) }}</h4>
                                @endif
                                @else
                                    <h4 class="al-title2-18px">{{ currency($product->price) }}</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row section-margin">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{route('all_products')}}" class="btn ec-btn-outline-skin">
                        <span>{{get_phrase('View All')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46981L12.2802 3.21981C12.1388 3.08319 11.9493 3.0076 11.7527 3.00931C11.5561 3.01101 11.3679 3.08989 11.2289 3.22895C11.0898 3.368 11.011 3.55611 11.0092 3.75276C11.0075 3.94941 11.0831 4.13886 11.2198 4.28031L15.1895 8.25006H2C1.80109 8.25006 1.61032 8.32908 1.46967 8.46973C1.32902 8.61038 1.25 8.80115 1.25 9.00006C1.25 9.19897 1.32902 9.38974 1.46967 9.53039C1.61032 9.67104 1.80109 9.75006 2 9.75006H15.1895L11.2198 13.7198C11.1481 13.789 11.091 13.8718 11.0517 13.9633C11.0124 14.0548 10.9917 14.1532 10.9908 14.2528C10.9899 14.3523 11.0089 14.4511 11.0466 14.5433C11.0843 14.6354 11.14 14.7192 11.2105 14.7896C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0084 11.9453 14.9877 12.0368 14.9484C12.1283 14.9091 12.2111 14.8519 12.2802 14.7803L17.5303 9.53031C17.6709 9.38967 17.7498 9.19893 17.7498 9.00006C17.7498 8.80119 17.6709 8.61046 17.5303 8.46981Z" fill="#2C3E50"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Product Area End -->


<!-- Discount Timer Area Start -->
<section>
    <div class="container">
        <div class="row section-margin">
            <div class="col-12">
                <div class="discount-timer-area wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="discount-timer-content">
                        <h2 class="dta-title text-center mb-20px">{{get_phrase('New Collection')}} <span class="ec2-text-skin"><span class="ff-futura fw-normal">{{get_phrase('50%')}}</span> {{get_phrase('OFF')}}</span></h2>
                        <p class="dta-subtitle text-center mb-30px">{{get_phrase('The standard chunk of Lorem Ipsum used since the 1500s is reproduced for those. Sections 1.10.32 and 1.10.33 from Finibus Bonorum et Malorum')}}</p>
                        <div class="text-center">
                            <a href="{{route('all_products')}}" class="btn ec2-btn-skin dta-btn">{{get_phrase('Grab It Now')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Timer Area End -->


<!-- Most Popular Items Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Featured Items')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 align-items-center section-margin">
            <div class="col-lg-4 col-md-5  wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="offer-ads-card">
                    <img class="banner" src="{{ asset('assets/frontend/furniture/images/all-images/offer-ads-banner.webp') }}" alt="banner">
                    <div class="offer-ads-content">
                        <h4 class="al-title-20px fw-medium text-white mb-6px">{{get_phrase('Limited Price Offer! ')}}</h4>
                        <h1 class="oads-title">{{get_phrase('Summer Sale Offer')}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7  wow animate__fadeInUp" data-wow-delay=".3s">
                <!-- Swiper -->
                <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                        @php
                            $featuredProducts = App\Models\Product::where('status', 1)->where('label', 'featured')->orderBy('id', 'DESC')->get();
                        @endphp 
                        @foreach($featuredProducts as $product)  
                        <div class="swiper-slide">
                           <div class="product-md-card">
                                    <div class="product-md-banner mb-3">
                                        @php
                                            $thumbnails = json_decode($product->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                        <div class="product-md-buttons">
                                            <a href="javascript:;"  class="white-icon-btn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                                <span class="d-flex align-items-center justify-content-center w-100 h-100" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 16.2375C8.7675 16.2375 8.5425 16.2075 8.355 16.14C5.49 15.1575 0.9375 11.67 0.9375 6.5175C0.9375 3.8925 3.06 1.7625 5.67 1.7625C6.9375 1.7625 8.1225 2.2575 9 3.1425C9.8775 2.2575 11.0625 1.7625 12.33 1.7625C14.94 1.7625 17.0625 3.9 17.0625 6.5175C17.0625 11.6775 12.51 15.1575 9.645 16.14C9.4575 16.2075 9.2325 16.2375 9 16.2375ZM5.67 2.8875C3.6825 2.8875 2.0625 4.515 2.0625 6.5175C2.0625 11.64 6.99 14.49 8.7225 15.0825C8.8575 15.1275 9.15 15.1275 9.285 15.0825C11.01 14.49 15.945 11.6475 15.945 6.5175C15.945 4.515 14.325 2.8875 12.3375 2.8875C11.1975 2.8875 10.14 3.42 9.4575 4.3425C9.2475 4.6275 8.7675 4.6275 8.5575 4.3425C7.86 3.4125 6.81 2.8875 5.67 2.8875Z" fill="#15191D"/>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)" class="white-icon-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <span class="d-flex align-items-center justify-content-center w-100 h-100" data-bs-toggle="tooltip" data-bs-title="Quick View">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.00043 12.247C7.20793 12.247 5.75293 10.792 5.75293 8.99954C5.75293 7.20704 7.20793 5.75204 9.00043 5.75204C10.7929 5.75204 12.2479 7.20704 12.2479 8.99954C12.2479 10.792 10.7929 12.247 9.00043 12.247ZM9.00043 6.87704C7.83043 6.87704 6.87793 7.82954 6.87793 8.99954C6.87793 10.1695 7.83043 11.122 9.00043 11.122C10.1704 11.122 11.1229 10.1695 11.1229 8.99954C11.1229 7.82954 10.1704 6.87704 9.00043 6.87704Z" fill="#15191D"/>
                                                        <path d="M8.99908 15.7651C6.17908 15.7651 3.51658 14.1151 1.68658 11.2501C0.891582 10.0126 0.891582 7.99509 1.68658 6.75009C3.52408 3.88509 6.18658 2.23509 8.99908 2.23509C11.8116 2.23509 14.4741 3.88509 16.3041 6.75009C17.0991 7.98759 17.0991 10.0051 16.3041 11.2501C14.4741 14.1151 11.8116 15.7651 8.99908 15.7651ZM8.99908 3.36009C6.57658 3.36009 4.25908 4.81509 2.63908 7.35759C2.07658 8.23509 2.07658 9.76509 2.63908 10.6426C4.25908 13.1851 6.57658 14.6401 8.99908 14.6401C11.4216 14.6401 13.7391 13.1851 15.3591 10.6426C15.9216 9.76509 15.9216 8.23509 15.3591 7.35759C13.7391 4.81509 11.4216 3.36009 8.99908 3.36009Z" fill="#15191D"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-md-details">
                                        <div class="d-flex align-items-center gap-1 mb-2">
                                            <span class="svg-block">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.3393 6.00541L10.7472 7.53983C10.5285 7.7502 10.3801 8.17093 10.4254 8.47203L10.6729 10.2704C10.8338 11.4213 10.1202 11.9204 9.089 11.3841L7.34009 10.4684C7.04723 10.3158 6.56875 10.3241 6.28414 10.4932L4.75384 11.3883C3.54528 12.0936 2.82344 11.5615 3.14517 10.2003L3.59478 8.29879C3.67727 7.95231 3.52466 7.47796 3.26479 7.24285L1.81699 5.93529C0.781671 4.99896 1.07041 4.14926 2.46458 4.04201L4.22999 3.91002C4.55998 3.88527 4.96008 3.62541 5.1127 3.33255L6.0284 1.57539C6.56875 0.548315 7.43908 0.55244 7.96293 1.58776L8.77964 3.20468C8.91988 3.47692 9.27461 3.7409 9.57572 3.78627L11.7619 4.14101C12.9415 4.339 13.2014 5.17633 12.3393 6.00541Z" fill="#FBBF27"/>
                                                </svg>
                                            </span>
                                            <span class="al-subtitle2-14px">({{ $product->reviews->count() }}) {{get_phrase('Reviews')}}</span>
                                        </div>
                                        <a href="{{ route('product', $product->slug) }}" class="al-title-16px text-link mb-20px">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</a>
                                        <div class="d-flex align-items-start gap-2 flex-wrap justify-content-between">
                                            <div class="d-flex align-items-start gap-2">
                                                @if ($product->is_discounted)
                                                @php
                                                    $discount = $product->discount;
                                                @endphp
                                                @if ($discount->discount_type == 'percentage')
                                                    <h4 class="al-title2-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                                        <h4 class="al-title-16px fw-medium ec-text-secondary"><del>{{ currency($product->price) }}</del></h4>
                                                @else
                                                    <h4 class="al-title2-18px">{{ currency($product->price) }}</h4>
                                                @endif
                                                @else
                                                    <h4 class="al-title2-18px">{{ currency($product->price) }}</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="product-slider-navigation">
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                <path d="M0.969749 9.31234L6.21975 4.06234C6.3612 3.92572 6.55065 3.85013 6.7473 3.85183C6.94395 3.85354 7.13206 3.93242 7.27111 4.07148C7.41017 4.21053 7.48905 4.39864 7.49076 4.59529C7.49246 4.79194 7.41687 4.98139 7.28025 5.12284L3.3105 9.09259H16.5C16.6989 9.09259 16.8897 9.17161 17.0303 9.31226C17.171 9.45291 17.25 9.64368 17.25 9.84259C17.25 10.0415 17.171 10.2323 17.0303 10.3729C16.8897 10.5136 16.6989 10.5926 16.5 10.5926H3.3105L7.28025 14.5623C7.35188 14.6315 7.40902 14.7143 7.44833 14.8058C7.48763 14.8973 7.50832 14.9957 7.50919 15.0953C7.51005 15.1949 7.49108 15.2936 7.45337 15.3858C7.41566 15.478 7.35997 15.5617 7.28955 15.6321C7.21913 15.7026 7.13539 15.7582 7.04322 15.796C6.95104 15.8337 6.85228 15.8526 6.7527 15.8518C6.65312 15.8509 6.5547 15.8302 6.4632 15.7909C6.37169 15.7516 6.28894 15.6945 6.21975 15.6228L0.969749 10.3728C0.829145 10.2322 0.75016 10.0415 0.75016 9.84259C0.75016 9.64372 0.829145 9.45299 0.969749 9.31234Z" fill="#2C3E50"/>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                <path d="M17.0303 9.31234L11.7802 4.06234C11.6388 3.92572 11.4493 3.85013 11.2527 3.85183C11.0561 3.85354 10.8679 3.93242 10.7289 4.07148C10.5898 4.21053 10.511 4.39864 10.5092 4.59529C10.5075 4.79194 10.5831 4.98139 10.7198 5.12284L14.6895 9.09259H1.5C1.30109 9.09259 1.11032 9.17161 0.96967 9.31226C0.829018 9.45291 0.75 9.64368 0.75 9.84259C0.75 10.0415 0.829018 10.2323 0.96967 10.3729C1.11032 10.5136 1.30109 10.5926 1.5 10.5926H14.6895L10.7198 14.5623C10.6481 14.6315 10.591 14.7143 10.5517 14.8058C10.5124 14.8973 10.4917 14.9957 10.4908 15.0953C10.4899 15.1949 10.5089 15.2936 10.5466 15.3858C10.5843 15.478 10.64 15.5617 10.7105 15.6321C10.7809 15.7026 10.8646 15.7582 10.9568 15.796C11.049 15.8337 11.1477 15.8526 11.2473 15.8518C11.3469 15.8509 11.4453 15.8302 11.5368 15.7909C11.6283 15.7516 11.7111 15.6945 11.7802 15.6228L17.0303 10.3728C17.1709 10.2322 17.2498 10.0415 17.2498 9.84259C17.2498 9.64372 17.1709 9.45299 17.0303 9.31234Z" fill="#2C3E50"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Most Popular Items Area End -->


<!-- Customer Feedback Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Our Customer Feedback')}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section-margin wow animate__fadeInUp" data-wow-delay=".2s">
        <!-- Swiper -->
        <div class="swiper testimonial-slider">
            <div class="swiper-wrapper">
                <!-- Single Slide -->
                @foreach($reviews as $review)
                <div class="swiper-slide">
                    <div class="single-testimonial">
                        <div class="testimonial-stars">
                            @for($i = 1; $i <= 5; $i++)
                            <div class="svg-block">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.3647 7.72121L14.3176 9.69404C14.0365 9.9645 13.8456 10.5054 13.9039 10.8926L14.2221 13.2048C14.429 14.6844 13.5115 15.3261 12.1857 14.6367L9.93708 13.4594C9.56054 13.2632 8.94536 13.2738 8.57943 13.4912L6.61191 14.642C5.05804 15.5489 4.12996 14.8648 4.54362 13.1147L5.12168 10.6698C5.22775 10.2244 5.03153 9.61449 4.69742 9.3122L2.83596 7.63105C1.50483 6.4272 1.87606 5.33472 3.66858 5.19684L5.93839 5.02713C6.36265 4.99531 6.87707 4.6612 7.0733 4.28467L8.25063 2.02546C8.94536 0.704942 10.0644 0.710245 10.7379 2.04137L11.7879 4.12027C11.9682 4.47029 12.4243 4.8097 12.8115 4.86803L15.6222 5.32412C17.139 5.57867 17.4731 6.65525 16.3647 7.72121Z" fill="#FBBF27"/>
                                </svg>
                            </div>
                            @endfor
                        </div>
                        <div class="mb-30px">
                            <p class="testimonial-comment">“{{$review->comment}}”</p>
                        </div>
                        <div class="d-flex align-items-center gap-12px justify-content-center">
                            <div class="testimonial-profile">
                                <img src="{{ asset('assets/frontend/furniture/images/all-images/user.svg') }}" alt="user">
                            </div>
                            <div>
                                <h4 class="tm-user-name">{{ $review->user->name }}</h4>
                                <p class="testimonial-date">{{ $review->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Single Slide -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- Customer Feedback Area End -->


<!-- Blog Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Our Blog')}}</h1>
                </div>
            </div>
        </div>
        <div class="row  gy-4 section-margin wow animate__fadeInUp" data-wow-delay=".2s">
            @foreach($blogs->take(3) as $blog)
            @php 
             $category = App\Models\Blog_category::where('id', $blog->blog_category_id)->first();
            @endphp
            <div class="col-lg-4 col-md-6">
                <div class="ec-blog-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="ec-blog-banner mb-3">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </a>
                    <div>
                        <p class="blog-date">{{ $blog->created_at->format('d M, Y') }}/ <span class="minimize-color">{{$category->title}}</span></p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="al-title2-20px mb-20px text-link">{{ $blog->title }}</a>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn ec-btn-outline-skin ec-blog-card-btn">{{get_phrase('READ MORE')}}</a>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>
<!-- Blog Area End -->


 