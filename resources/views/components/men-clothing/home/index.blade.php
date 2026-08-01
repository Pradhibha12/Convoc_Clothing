    <!-- Banner Area Start -->
    <section class="hero-section">
        <div class="hero-slider-wrap">
            <!-- Swiper -->
            <div class="swiper hero-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <div class="hero-banner-wrap">
                                <div class="hero-banner1">
                                    <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-lg-banner.webp')}}" alt="">
                                </div>
                                <div class="hero-banner2">
                                    <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-sm-banner.webp')}}" alt="">
                                </div>
                            </div>
                            <div class="hero-slide-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="hero-slide-content-inner">
                                                <h1 class="hero-title">{{get_phrase('Redefine Your Wardrobe')}}</h1>
                                                <a href="{{route('all_products')}}" class="btn mc-btn-white hero-btn">{{get_phrase('Explore Collection')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <div class="hero-banner-wrap">
                                <div class="hero-banner1">
                                    <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-lg-banner2.webp')}}" alt="">
                                </div>
                                <div class="hero-banner2">
                                    <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-sm-banner2.webp')}}" alt="">
                                </div>
                            </div>
                            <div class="hero-slide-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="hero-slide-content-inner">
                                                <h1 class="hero-title">{{get_phrase('Redefine Your Wardrobe 2')}}</h1>
                                                <a href="{{route('all_products')}}" class="btn mc-btn-white hero-btn">{{get_phrase('Explore Collection')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <div class="hero-banner-wrap">
                                <div class="hero-banner1">
                                    <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-lg-banner.webp')}}" alt="">
                                </div>
                                <div class="hero-banner2">
                                     <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-sm-banner.webp')}}" alt="">
                                </div>
                            </div>
                            <div class="hero-slide-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="hero-slide-content-inner">
                                                <h1 class="hero-title">{{get_phrase('Redefine Your Wardrobe')}}</h1>
                                                <a href="{{route('all_products')}}" class="btn mc-btn-white hero-btn">{{get_phrase('Explore Collection')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="swiper-slide">
                        <div class="hero-slide">
                            <div class="hero-banner-wrap">
                                <div class="hero-banner1">
                                    <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-lg-banner2.webp')}}" alt="">
                                </div>
                                <div class="hero-banner2">
                                    <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/hero-sm-banner2.webp')}}" alt="">
                                </div>
                            </div>
                            <div class="hero-slide-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="hero-slide-content-inner">
                                                <h1 class="hero-title">{{get_phrase('Redefine Your Wardrobe 2')}}</h1>
                                                <a href="{{route('all_products')}}" class="btn mc-btn-white hero-btn">{{get_phrase('Explore Collection 2')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Brand Area Start -->
    <section class="brand-section overflow-hidden mb-5 pb-3 wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper brand-slider">
                        <div class="swiper-wrapper">
                               @php 
                                $brands = App\Models\Brand::get();
                            @endphp
                              @foreach($brands as $brand)  
                                <div class="swiper-slide">
                                    <div class="brand-slide-img">
                                        <img class="brand" src="{{ get_image($brand->logo) }}" alt="">
                                    </div>
                                </div>
                               @endforeach 
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Area End -->

    <!-- Category Area Start -->
    <section class="mt-5 section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cs-title-area">
                        <h2 class="section-title text-center mb-30px max-w-687px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Categories you might like')}}</h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".2s">
                            <a href="{{route('all_products')}}" class="btn mc-btn-outline-black btn-min-218px mx-auto">{{get_phrase('View All')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 wow animate__fadeInUp" data-wow-delay=".3s">
                 @php
                    $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                @endphp
                @foreach($categories->take(5) as $category)
                    <div class="col">
                        <a href="{{ route('products', get_category_params($category)) }}" class="category-card">
                            <div>
                                <div class="category-card-banner">
                                    <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                                </div>
                                <div class="category-card-body">
                                    <h3 class="category-card-title">{{ $category->title }}</h3>
                                    <span class="category-card-btn">{{get_phrase('Shop Now')}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Category Area End -->

    <!-- Product Area Start -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ps-title-area">
                        <h2 class="section-title text-center mb-30px max-w-888px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Most loved by our customers this week.')}}</h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".2s">
                            <a href="{{route('all_products')}}" class="btn mc-btn-outline-black btn-min-218px mx-auto">{{get_phrase('View All')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-card-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="product-new-badge">
                    <img class="shape" src="{{ asset('assets/frontend/men-clothing/images/product-new-badge.png')}}" alt="">
                </div>
                <div class="row gy-4">
                    @foreach($latest_products as $product)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-card-banner">
                                <a  href="javascript:;"  class="pc-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49533C13.0949 3.48613 14.5211 2.91919 16.0098 2.91919C17.6173 2.91919 19.1519 3.58025 20.2755 4.74537C21.3911 5.90127 22.0122 7.45944 22.0122 9.07763C22.0122 10.6959 21.391 12.2541 20.2755 13.4099C19.5338 14.1788 18.7932 14.9652 18.0487 15.7556C16.5366 17.3612 15.0084 18.984 13.4208 20.5128L13.4171 20.5164C12.5984 21.2932 11.3019 21.265 10.5181 20.4527L3.72374 13.4098C1.40898 11.0104 1.40898 7.14489 3.72374 4.74547C5.98889 2.39747 9.63646 2.3141 11.9998 4.49533Z" fill="#0009"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:;"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="pc-card-view">
                                    <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View" aria-describedby="tooltip794951">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M2.5 10.8333C5.5 4.16659 14.5 4.16659 17.5 10.8333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 14.1667C8.61925 14.1667 7.5 13.0475 7.5 11.6667C7.5 10.286 8.61925 9.16675 10 9.16675C11.3807 9.16675 12.5 10.286 12.5 11.6667C12.5 13.0475 11.3807 14.1667 10 14.1667Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                <a href="{{ route('product', $product->slug) }}"  class="btn product-card-btn">
                                    {{get_phrase('Shop Now')}}
                                </a>
                            </div>
                            <div class="product-card-body pt-3">
                                <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                                <div class="d-flex justify-content-between">
                                    <div class="pc-stars-ratings mb-0">
                                        <div class="product-card-stars">
                                            @php
                                                $rating = $product->average_rating;
                                                $fullStars = floor($rating); // full stars count
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                            @endphp

                                            {{-- Full stars --}}
                                            @for($i = 0; $i < $fullStars; $i++)
                                                <div class="pc-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                        <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#FFC633"/>
                                                    </svg>
                                                </div>
                                            @endfor

                                            {{-- Half star --}}
                                                @if($halfStar)
                                                    <div class="pc-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                            <defs>
                                                                <linearGradient id="half-grad">
                                                                    <stop offset="50%" stop-color="#FFC633"/>
                                                                    <stop offset="50%" stop-color="#ccc"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                        </svg>
                                                    </div>
                                                @endif

                                            {{-- Empty stars --}}
                                            @for($i = 0; $i < $emptyStars; $i++)
                                                <div class="pc-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                        <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>

                                        <p class="pc-rating-average">{{ number_format($product->average_rating, 1) }}</p>
                                    </div>
                                    <div class="pc-price-wrap mb-0">
                                     @if ($product->is_discounted)
                                        @php
                                            $discount = $product->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                           <h4 class="product-card-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                           <h4 class="pc-old-price">{{currency($product->price)}}</h4>
                                        @else
                                           <h4 class="product-card-price">{{ currency($product->price) }}</h4>
                                           <h4 class="pc-old-price">{{currency($product->price)}}</h4>
                                        @endif
                                        @else
                                           <h4 class="product-card-price">{{ currency($product->price) }}</h4>
                                        @endif
                                </div>
                             </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Product Area End -->
     
    <!-- Style Tab Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-center mb-40px max-w-888px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Style Inspiration for Every Moment')}}</h2>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab" tabindex="0">
                            <div class="inspiration-banners-main">
                                <div class="inspiration-banner-wrap mb-4">
                                    <div class="inspiration-banner1">
                                        <h4 class="inspiration-title1">{{get_phrase('Weekend Casual')}}</h4>
                                        <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black">{{get_phrase('Shop Now')}}</a>
                                    </div>
                                    <div class="inspiration-banner2">
                                        <h4 class="inspiration-title2">{{get_phrase('Business Formal')}}</h4>
                                        <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black">{{get_phrase('Shop Now')}}</a>
                                    </div>
                                </div>
                                <div class="inspiration-banner-wrap">
                                    <div class="inspiration-banner3">
                                        <div class="ms-auto">
                                            <h4 class="inspiration-title3">{{get_phrase('Night & Day Wear')}}</h4>
                                            <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black">{{get_phrase('Shop Now')}}</a>
                                        </div>
                                    </div>
                                    <div class="inspiration-banner4">
                                        <h4 class="inspiration-title4">{{get_phrase('Outdoor Adventures')}}</h4>
                                        <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black">{{get_phrase('Shop Now')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Style Tab Area End -->

    <!-- Seasonal Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-between flex-column flex-lg-row column-gap-4 row-gap-4 seasonal-section-title-area">
                        <h1 class="section-title seasonal-section-title text-center text-lg-start wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('This Seasonâ€™s Must-Haves outfits styled for every occasion.')}}</h1>
                        <a href="{{route('all_products')}}" class="btn mc-btn-outline-black btn-min-218px px-26px text-nowrap wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Explore Fall Collection')}}</a>
                    </div>
                </div>
            </div>
            <div class="row seasonal-collection-row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-md-6 col-lg-4">
                    <a href="javascript:;" class="seasonal-product">
                        <div class="w-100 h-100">
                            <div class="seasonal-product-banner">
                                <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/seasonal-image1.webp') }}" alt="banner">
                            </div>
                            <div class="seasonal-product-body">
                                <h4 class="seasonal-product-title">{{get_phrase('Earth-tone Knits')}}</h4>
                                <span class="seasonal-product-arrow">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4896 4.29164C22.6185 3.62188 22.18 2.97448 21.5102 2.84563L10.5958 0.746003C9.92601 0.617159 9.27861 1.05566 9.14977 1.72543C9.02092 2.39519 9.45942 3.04259 10.1292 3.17143L19.8309 5.03777L17.9646 14.7395C17.8357 15.4093 18.2742 16.0567 18.944 16.1855C19.6138 16.3143 20.2612 15.8758 20.39 15.2061L22.4896 4.29164ZM0.803223 17.9258L1.49578 18.9483L21.9695 5.08083L21.2769 4.05835L20.5844 3.03587L0.110666 16.9033L0.803223 17.9258Z" fill="#F7F7F7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="javascript:;" class="seasonal-product">
                        <div class="w-100 h-100">
                            <div class="seasonal-product-banner">
                                 <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/seasonal-image2.webp') }}" alt="banner">
                            </div>
                            <div class="seasonal-product-body">
                                <h4 class="seasonal-product-title">{{get_phrase('Layered Neutrals')}}</h4>
                                <span class="seasonal-product-arrow">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4896 4.29164C22.6185 3.62188 22.18 2.97448 21.5102 2.84563L10.5958 0.746003C9.92601 0.617159 9.27861 1.05566 9.14977 1.72543C9.02092 2.39519 9.45942 3.04259 10.1292 3.17143L19.8309 5.03777L17.9646 14.7395C17.8357 15.4093 18.2742 16.0567 18.944 16.1855C19.6138 16.3143 20.2612 15.8758 20.39 15.2061L22.4896 4.29164ZM0.803223 17.9258L1.49578 18.9483L21.9695 5.08083L21.2769 4.05835L20.5844 3.03587L0.110666 16.9033L0.803223 17.9258Z" fill="#F7F7F7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="javascript:;" class="seasonal-product">
                        <div class="w-100 h-100">
                            <div class="seasonal-product-banner">
                                 <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/seasonal-image3.webp') }}" alt="banner">
                            </div>
                            <div class="seasonal-product-body">
                                <h4 class="seasonal-product-title">{{get_phrase('Waterproof outerwear')}}</h4>
                                <span class="seasonal-product-arrow">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4896 4.29164C22.6185 3.62188 22.18 2.97448 21.5102 2.84563L10.5958 0.746003C9.92601 0.617159 9.27861 1.05566 9.14977 1.72543C9.02092 2.39519 9.45942 3.04259 10.1292 3.17143L19.8309 5.03777L17.9646 14.7395C17.8357 15.4093 18.2742 16.0567 18.944 16.1855C19.6138 16.3143 20.2612 15.8758 20.39 15.2061L22.4896 4.29164ZM0.803223 17.9258L1.49578 18.9483L21.9695 5.08083L21.2769 4.05835L20.5844 3.03587L0.110666 16.9033L0.803223 17.9258Z" fill="#F7F7F7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Seasonal Area End -->

    <!-- Why Choose Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wcs-title-area">
                        <h2 class="section-title text-center mb-30px max-w-750px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Why Men Choose Our brand?')}}</h2>
                       
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="why-choose-main">
                        <div class="why-choose-single">
                            <div class="circle-icon-box">
                                <svg width="55" height="44" viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.4545 28.7036C34.9429 28.7036 41.0133 22.6331 41.0133 15.1447C41.0133 7.65642 34.9429 1.58594 27.4545 1.58594C19.9662 1.58594 13.8958 7.65642 13.8958 15.1447C13.8958 22.6331 19.9662 28.7036 27.4545 28.7036Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M33.6421 10.6362L26.0687 18.7919L22.1294 14.6243" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.4994 29.4546C12.9336 27.8543 12.1032 24.771 9.64484 22.5678C7.18644 20.3646 4.0309 19.8758 2.59675 21.476C1.16261 23.0763 1.99293 26.1596 4.45133 28.3628C6.90973 30.566 10.0653 31.0548 11.4994 29.4546Z" stroke="black" stroke-width="1.5" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.3847 34.2148C18.638 32.081 16.186 30.0356 12.9079 29.6464C9.62981 29.2572 6.76701 30.6715 6.51366 32.8053C6.26031 34.9391 8.71235 36.9845 11.9904 37.3737C15.2685 37.7629 18.1313 36.3486 18.3847 34.2148Z" stroke="black" stroke-width="1.5" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.6781 42.6007C23.9341 42.0566 26.2865 39.8975 25.9324 37.7781C25.5782 35.6586 22.6517 34.3815 19.3957 34.9256C16.1397 35.4696 13.7873 37.6288 14.1415 39.7482C14.4956 41.8676 17.4222 43.1447 20.6781 42.6007Z" stroke="black" stroke-width="1.5" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M50.4578 28.3619C52.9162 26.1587 53.7465 23.0754 52.3124 21.4751C50.8782 19.8749 47.7227 20.3637 45.2643 22.5669C42.8059 24.7701 41.9756 27.8534 43.4097 29.4537C44.8439 31.0539 47.9994 30.5651 50.4578 28.3619Z" stroke="black" stroke-width="1.5" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M42.9172 37.3721C46.1953 36.9829 48.6473 34.9376 48.3939 32.8038C48.1406 30.67 45.2778 29.2557 41.9997 29.6449C38.7216 30.0341 36.2696 32.0794 36.5229 34.2132C36.7763 36.347 39.6391 37.7613 42.9172 37.3721Z" stroke="black" stroke-width="1.5" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M40.7637 39.7473C41.1178 37.6279 38.7654 35.4687 35.5094 34.9247C32.2535 34.3807 29.3269 35.6578 28.9728 37.7772C28.6186 39.8966 30.971 42.0558 34.227 42.5998C37.483 43.1439 40.4095 41.8667 40.7637 39.7473Z" stroke="black" stroke-width="1.5" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="why-choose-title">{{get_phrase('Premium Quality Materials')}}</h4>
                                <p class="why-choose-subtitle">{{get_phrase('Built to last, designed to impress')}}</p>
                            </div>
                        </div>
                        <div class="why-choose-single">
                            <div class="circle-icon-box">
                                <svg width="45" height="43" viewBox="0 0 45 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.29883 14.188H27.8535C28.9642 14.1882 29.8682 15.0919 29.8682 16.2026V18.1001H33.0859C36.4321 18.1001 39.3749 19.8474 40.5957 22.5308L43.998 30.0093L44.002 30.0181L44.0078 30.0269C44.1192 30.2039 44.1845 30.4121 44.1846 30.6362L44.1836 30.6528L44.1846 30.6636V37.2202C44.1846 37.8543 43.6705 38.3694 43.0361 38.3696H40.7207L40.7129 38.5103C40.581 40.6969 38.7598 42.436 36.541 42.436C34.322 42.4358 32.502 40.6967 32.3701 38.5103L32.3613 38.3696H32.2207L17.8574 38.3267L17.7148 38.3257L17.707 38.4683C17.596 40.6743 15.7663 42.4359 13.5332 42.436C11.2999 42.436 9.46908 40.6744 9.3584 38.4683L9.35156 38.3267H5.51855C4.88413 38.3265 4.37012 37.8114 4.37012 37.1772V26.7661H1.29883C0.664268 26.7661 0.150391 26.2513 0.150391 25.6167C0.150437 24.9822 0.664297 24.4683 1.29883 24.4683H4.37012V21.6812H3.11719C2.48283 21.6811 1.96899 21.1667 1.96875 20.5327C1.96875 19.8982 2.48265 19.3833 3.11719 19.3833H4.37012V16.4858H1.29883C0.664319 16.4858 0.150391 15.971 0.150391 15.3364C0.150411 14.7022 0.664306 14.188 1.29883 14.188ZM13.5332 36.3745C12.4955 36.3745 11.6514 37.2186 11.6514 38.2563C11.6514 39.2944 12.4955 40.1382 13.5332 40.1382C14.5708 40.138 15.415 39.2943 15.415 38.2563C15.415 37.2188 14.5708 36.3747 13.5332 36.3745ZM36.541 36.3745C35.5032 36.3747 34.6592 37.2188 34.6592 38.2563C34.6592 39.2943 35.5032 40.138 36.541 40.1382C37.5787 40.1382 38.4229 39.2944 38.4229 38.2563C38.4228 37.2186 37.5787 36.3745 36.541 36.3745ZM29.8682 36.0718H32.9805L33.0244 36.0034C33.7689 34.8457 35.0667 34.0768 36.541 34.0767C38.0155 34.0767 39.314 34.8456 40.0586 36.0034L40.1025 36.0718H41.8867V31.7856H33.915C33.2808 31.7856 32.7656 31.2708 32.7656 30.6362V25.8501C32.7659 24.0182 34.4312 22.5015 36.5127 22.5015H37.9043L37.666 22.2485C36.5851 21.1022 34.8968 20.3979 33.0859 20.3979H29.8682V36.0718ZM8.93457 16.4858H6.66797V19.3833H14.7607C15.3952 19.3835 15.9092 19.8983 15.9092 20.5327C15.9089 21.1667 15.395 21.681 14.7607 21.6812H6.66797V24.4683H10.502C11.1365 24.4683 11.6513 24.9822 11.6514 25.6167C11.6514 26.2513 11.1365 26.7661 10.502 26.7661H6.66797V36.0288H9.99805L10.043 35.9614C10.7918 34.8268 12.0763 34.0767 13.5332 34.0767C14.9899 34.0768 16.2747 34.8269 17.0234 35.9614L17.0674 36.0288H27.5703V16.4849H8.93945C8.93779 16.4849 8.93618 16.4858 8.93457 16.4858ZM36.5127 24.7983C36.1377 24.7983 35.7823 24.9125 35.5176 25.0962C35.2555 25.2782 35.0637 25.544 35.0635 25.8501V29.4878H41.2373L41.1406 29.2759L39.1436 24.8862L39.1035 24.7983H36.5127Z" fill="black" stroke="white" stroke-width="0.3"/>
                                    <path d="M13.4775 0.957031C14.9341 0.957126 16.3534 1.86709 16.3535 3.49512C16.3535 4.82421 15.4094 5.72019 14.4082 6.44922C14.1596 6.6302 13.9109 6.79804 13.6748 6.95996C13.4399 7.12106 13.217 7.27689 13.0244 7.42871C12.8325 7.58001 12.664 7.73303 12.543 7.8916C12.4217 8.0506 12.3398 8.22586 12.3398 8.41797V8.68457H15.8926C15.9899 8.68457 16.1025 8.74625 16.1973 8.88086C16.2906 9.01337 16.3535 9.20076 16.3535 9.40527C16.3534 9.61004 16.2908 9.80455 16.1963 9.94434C16.0995 10.0875 15.9861 10.1514 15.8926 10.1514H11.2695C11.1168 10.1514 10.9231 10.0976 10.7705 10.0029C10.6152 9.90657 10.5362 9.79101 10.5361 9.67773V8.41797C10.5361 7.96137 10.764 7.54003 11.1357 7.13086C11.5078 6.72139 12.008 6.34135 12.5205 5.96387C13.0273 5.59057 13.5495 5.21838 13.9424 4.83594C14.3329 4.45577 14.627 4.03537 14.627 3.55957C14.6269 3.32306 14.5532 3.05564 14.3691 2.84473C14.1815 2.62973 13.8918 2.4883 13.4902 2.48828C13.2079 2.48828 12.9245 2.55794 12.71 2.74316C12.4915 2.9318 12.3662 3.22145 12.3662 3.6123C12.366 3.86915 12.0727 4.20215 11.4512 4.20215C11.2111 4.20214 11.03 4.14787 10.9072 4.02637C10.7846 3.90485 10.6924 3.68847 10.6924 3.30078C10.6924 2.55977 11.0301 1.97817 11.5459 1.57812C12.065 1.17573 12.7659 0.957031 13.4775 0.957031Z" fill="black" stroke="white" stroke-width="0.3"/>
                                    <path d="M21.7642 0.957031C21.906 0.957031 22.1321 1.02019 22.3218 1.14062C22.5141 1.26281 22.6274 1.41559 22.6274 1.57324C22.6273 1.61901 22.6112 1.67302 22.5737 1.76074L20.2798 6.36328L20.1714 6.58105H21.6802V5.52148C21.6802 5.37972 21.7593 5.27045 21.9165 5.18848C22.0779 5.10436 22.3049 5.06056 22.5435 5.06055C22.7823 5.06055 23.0099 5.10434 23.1714 5.18848C23.3284 5.27043 23.4067 5.37982 23.4067 5.52148V6.58105H24.1157C24.2566 6.58117 24.3691 6.65644 24.4536 6.79883C24.5403 6.94509 24.5883 7.15087 24.5884 7.36523C24.5884 7.56794 24.5208 7.77374 24.4194 7.92578C24.3138 8.0841 24.1973 8.15022 24.1157 8.15039H23.4067V9.67773C23.4066 9.81272 23.3283 9.92626 23.1685 10.0137C23.0064 10.1023 22.7794 10.1504 22.5435 10.1504C22.3079 10.1504 22.0814 10.1021 21.9194 10.0137C21.7596 9.92626 21.6803 9.81273 21.6802 9.67773V8.15039H18.4917C18.336 8.15039 18.2062 8.09978 18.1167 8.0127C18.0285 7.92661 17.9664 7.79252 17.9663 7.59961C17.9663 7.51878 17.9861 7.4005 18.0513 7.28125H18.0522L18.0542 7.27734L21.0532 1.39355C21.219 1.07388 21.4885 0.957157 21.7642 0.957031Z" fill="black" stroke="white" stroke-width="0.3"/>
                                    <path d="M27.5962 0.736328C27.8486 0.73635 28.0745 0.793561 28.2319 0.884766C28.3902 0.976415 28.4594 1.08738 28.4595 1.19629V5.02734L28.7456 5.09082C28.9575 4.63247 29.4788 4.19043 30.2202 4.19043C31.292 4.19071 32.2778 5.328 32.2778 6.76855V9.67773C32.2778 9.81256 32.1993 9.92617 32.0396 10.0137C31.8775 10.1023 31.6502 10.1514 31.4146 10.1514C31.1998 10.1513 30.9758 10.103 30.811 10.0137C30.6465 9.92441 30.5649 9.80978 30.5649 9.67773V6.76855C30.5649 6.20148 30.0775 5.64453 29.479 5.64453C28.965 5.64475 28.4595 6.07811 28.4595 6.76855V9.67773C28.4595 9.75799 28.3937 9.87417 28.2271 9.97949C28.067 10.0806 27.8418 10.1513 27.5962 10.1514C27.3296 10.1514 27.1089 10.0802 26.9595 9.98145C26.8065 9.88032 26.7466 9.76467 26.7466 9.67773V1.19629C26.7466 1.08032 26.8099 0.970455 26.9546 0.882812C27.1017 0.793739 27.3228 0.736328 27.5962 0.736328Z" fill="black" stroke="white" stroke-width="0.3"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="why-choose-title">{{get_phrase('Free Shipping')}}</h4>
                                <p class="why-choose-subtitle">{{get_phrase('On all orders over $50')}}</p>
                            </div>
                        </div>
                        <div class="why-choose-single">
                            <div class="circle-icon-box">
                                <svg width="42" height="43" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_8_2824" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="42" height="43">
                                    <path d="M0 0.585938H42V42.5859H0V0.585938Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_8_2824)">
                                    <path d="M40.7695 24.0469C40.7695 18.6103 36.3623 14.2031 30.9258 14.2031H8.61328V9.28125L1.23047 16.6641L8.61328 24.0469V19.125H30.9258C33.6441 19.125 35.8477 21.3286 35.8477 24.0469C35.8477 26.7651 33.6441 28.9687 30.9258 28.9687H13.5352V33.8906H30.9258C36.3623 33.8906 40.7695 29.4834 40.7695 24.0469Z" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                </svg>
                            </div>
                            <div>
                                <h4 class="why-choose-title">{{get_phrase('Hassle-Free Returns')}}</h4>
                                <p class="why-choose-subtitle">{{get_phrase('Easy 30-day return policy')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Area End -->

    <!-- Limited Time Deal Area Start -->
    <section class="section-mb limited-deal-section">
        <div class="container">
            <div class="row align-items-center align-items-xxl-end justify-content-center gy-4">
                <div class="col-md-10 col-lg-5">
                    <div>
                        <h2 class="section-title ltd-section-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('This Weekâ€™s Limited time Deals')}}ðŸ”¥</h2>
                        <p class="ltd-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Donâ€™t miss outâ€”stock up on these limited-time offers.')}}</p>
                        <a href="javascript:;" class="btn mc-btn-outline-black ltd-section-btn wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Shop All Deals')}}</a>
                        <div class="wow animate__fadeInUp" data-wow-delay=".4s">
                            <div class="d-flex align-items-center justify-content-start justify-content-lg-end gap-3 mt-4 mt-lg-3 mt-xxl-0">
                                <button type="button" class="deal-slider-prev">
                                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 15.5859L0.999999 8.58594L8 1.58594" stroke="black" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <button type="button" class="deal-slider-next">
                                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.00024 1.58594L8.00025 8.58594L1.00025 15.5859" stroke="black" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-7">
                    <!-- Swiper -->
                    <div class="swiper limited-deal-slider wow animate__fadeInRight" data-wow-delay=".1s">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="limited-deal-slide">
                                     <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/deal-banner1.webp') }}" alt="banner">
                                    <div class="deal-slide-content">
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-10px">
                                            <p class="deal-slide-subtitle">{{get_phrase('01')}}</p>
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="2" viewBox="0 0 27 2" fill="none">
                                                    <path d="M0.000244141 0.585938H27.0002" stroke="#484848"/>
                                                </svg>
                                            </div>
                                            <p class="deal-slide-subtitle">{{get_phrase('Spring Sale')}}</p>
                                        </div>
                                        <h4 class="deal-slide-title">{{get_phrase('30% OFF')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="limited-deal-slide">
                                      <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/deal-banner2.webp') }}" alt="banner">
                                    <div class="deal-slide-content">
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-10px">
                                            <p class="deal-slide-subtitle">{{get_phrase('02')}}</p>
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="2" viewBox="0 0 27 2" fill="none">
                                                    <path d="M0.000244141 0.585938H27.0002" stroke="#484848"/>
                                                </svg>
                                            </div>
                                            <p class="deal-slide-subtitle">{{get_phrase('Spring Sale')}}</p>
                                        </div>
                                         <h4 class="deal-slide-title">{{get_phrase('30% OFF')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="limited-deal-slide">
                                      <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/deal-banner3.webp') }}" alt="banner">
                                    <div class="deal-slide-content">
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-10px">
                                           <p class="deal-slide-subtitle">{{get_phrase('03')}}</p>
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="2" viewBox="0 0 27 2" fill="none">
                                                    <path d="M0.000244141 0.585938H27.0002" stroke="#484848"/>
                                                </svg>
                                            </div>
                                             <p class="deal-slide-subtitle">{{get_phrase('Spring Sale')}}</p>
                                        </div>
                                        <h4 class="deal-slide-title">{{get_phrase('30% OFF')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="limited-deal-slide">
                                      <img class="banner" src="{{ asset('assets/frontend/men-clothing/images/deal-banner2.webp') }}" alt="banner">
                                    <div class="deal-slide-content">
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-10px">
                                           <p class="deal-slide-subtitle">{{get_phrase('04')}}</p>
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="2" viewBox="0 0 27 2" fill="none">
                                                    <path d="M0.000244141 0.585938H27.0002" stroke="#484848"/>
                                                </svg>
                                            </div>
                                            <p class="deal-slide-subtitle">{{get_phrase('Spring Sale')}}</p>
                                        </div>
                                         <h4 class="deal-slide-title">{{get_phrase('30% OFF')}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Limited Time Deal Area End -->

    <!-- Blog Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bs-title-area">
                        <h2 class="section-title text-center mb-30px max-w-952px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Fashion tips, seasonal styling advice menâ€™s wardrobe wisdom.')}}</h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".2s">
                            <a href="{{route('blog')}}" class="btn mc-btn-outline-black btn-min-218px mx-auto">{{get_phrase('Read All Blogs')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-4 wow animate__fadeInUp" data-wow-delay=".3s">
                @foreach($blogs->take(2) as $blog)
                <div class="col-md-6">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card">
                        <div>
                            <div class="blog-card-banner">
                                <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="blog">
                            </div>
                            <div class="blog-card-date-title">
                                <p class="blog-card-date">{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                            <h4 class="blog-card-title">{{ \Illuminate\Support\Str::limit($blog->title, 40, '...') }}</h4>
                            <p class="blog-card-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 120, '...') }}</p>
                            <span class="bc-read-btn">
                                <span>{{get_phrase('Read More')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                                    <path d="M15.5303 6.11627C15.8232 5.82337 15.8232 5.3485 15.5303 5.05561L10.7574 0.282637C10.4645 -0.0102568 9.98959 -0.0102568 9.6967 0.282637C9.40381 0.57553 9.40381 1.0504 9.6967 1.3433L13.9393 5.58594L9.6967 9.82858C9.40381 10.1215 9.40381 10.5963 9.6967 10.8892C9.98959 11.1821 10.4645 11.1821 10.7574 10.8892L15.5303 6.11627ZM0 5.58594V6.33594H15V5.58594V4.83594H0V5.58594Z" fill="black"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
     
    <!-- Testimonial Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-between flex-column flex-lg-row column-gap-4 row-gap-4 ts-section-title-area">
                        <h1 class="section-title ts-section-title text-center text-lg-start wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Real reviews from men who made the switch.')}}</h1>
                        <div class="d-flex align-items-center gap-3 wow animate__fadeInUp" data-wow-delay=".2s">
                            <button type="button" class="testimonial-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <path d="M10.2221 5.27749L3.11189 12.3877C3.00142 12.4978 2.91376 12.6286 2.85395 12.7727C2.79414 12.9167 2.76335 13.0711 2.76335 13.2271C2.76335 13.3831 2.79414 13.5375 2.85395 13.6816C2.91376 13.8256 3.00142 13.9564 3.11189 14.0665L10.2221 21.1767C10.4447 21.3993 10.7467 21.5244 11.0615 21.5244C11.3763 21.5244 11.6783 21.3993 11.9009 21.1767C12.1235 20.9541 12.2486 20.6522 12.2486 20.3373C12.2486 20.0225 12.1235 19.7205 11.9009 19.4979L6.81414 14.4112L21.3308 14.4112C21.6451 14.4112 21.9465 14.2863 22.1688 14.0641C22.391 13.8418 22.5159 13.5404 22.5159 13.2261C22.5159 12.9118 22.391 12.6104 22.1688 12.3882C21.9465 12.1659 21.6451 12.0411 21.3308 12.0411L6.81414 12.0411L11.9019 6.95432C12.1245 6.73169 12.2496 6.42975 12.2496 6.11492C12.2496 5.80008 12.1245 5.49814 11.9019 5.27551C11.6793 5.05289 11.3773 4.92782 11.0625 4.92782C10.7477 4.92782 10.4457 5.05289 10.2231 5.27551L10.2221 5.27749Z" fill="black"/>
                                </svg>
                            </button>
                            <button type="button" class="testimonial-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <path d="M15.1934 5.27749L22.3036 12.3877C22.4141 12.4978 22.5018 12.6286 22.5616 12.7727C22.6214 12.9167 22.6522 13.0711 22.6522 13.2271C22.6522 13.3831 22.6214 13.5375 22.5616 13.6816C22.5018 13.8256 22.4141 13.9564 22.3036 14.0665L15.1934 21.1767C14.9708 21.3993 14.6689 21.5244 14.354 21.5244C14.0392 21.5244 13.7372 21.3993 13.5146 21.1767C13.292 20.9541 13.1669 20.6522 13.1669 20.3373C13.1669 20.0225 13.292 19.7205 13.5146 19.4979L18.6014 14.4112L4.08469 14.4112C3.7704 14.4112 3.46898 14.2863 3.24675 14.0641C3.02451 13.8418 2.89966 13.5404 2.89966 13.2261C2.89966 12.9118 3.02451 12.6104 3.24675 12.3882C3.46898 12.1659 3.7704 12.0411 4.08469 12.0411L18.6014 12.0411L13.5136 6.95432C13.291 6.73169 13.1659 6.42975 13.1659 6.11492C13.1659 5.80008 13.291 5.49814 13.5136 5.27551C13.7363 5.05289 14.0382 4.92782 14.353 4.92782C14.6679 4.92782 14.9698 5.05289 15.1924 5.27551L15.1934 5.27749Z" fill="black"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-area wow animate__fadeInUp" data-wow-delay=".3s">
            <!-- Swiper -->
            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">
                    @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="testimonial-slide">
                            <div class="ts-stars-wrap">
                                @for($i = 1; $i <= 5; $i++)
                                    <div class="ts-star">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="31" viewBox="0 0 34 31" fill="none">
                                            <path d="M17.2264 0L22.064 10.417L33.4661 11.7989L25.0539 19.6188L27.2631 30.8898L17.2264 25.3059L7.18964 30.8898L9.3988 19.6188L0.986612 11.7989L12.3887 10.417L17.2264 0Z" 
                                                fill="{{ $i <= $review->rating ? '#FFC633' : '#E0E0E0' }}"/>
                                        </svg>
                                    </div>
                                @endfor
                            </div>
                            <div class="ts-name-wrap">
                                <h3 class="ts-user-name">{{ $review->user->name }}</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26" fill="none">
                                    <path d="M13.5616 2.66748C11.5303 2.66748 9.54464 3.26982 7.8557 4.39834C6.16675 5.52686 4.85038 7.13086 4.07305 9.00751C3.29571 10.8842 3.09232 12.9492 3.48861 14.9414C3.88489 16.9337 4.86304 18.7637 6.29937 20.2C7.7357 21.6363 9.56569 22.6145 11.5579 23.0108C13.5502 23.407 15.6152 23.2037 17.4919 22.4263C19.3685 21.649 20.9725 20.3326 22.101 18.6437C23.2295 16.9547 23.8319 14.9691 23.8319 12.9378C23.829 10.2148 22.746 7.6042 20.8206 5.67876C18.8952 3.75333 16.2845 2.67036 13.5616 2.66748ZM18.0706 11.1267L12.5405 16.6568C12.4671 16.7303 12.38 16.7886 12.2841 16.8283C12.1882 16.8681 12.0853 16.8885 11.9815 16.8885C11.8777 16.8885 11.7749 16.8681 11.679 16.8283C11.5831 16.7886 11.496 16.7303 11.4226 16.6568L9.05251 14.2868C8.90427 14.1385 8.82099 13.9375 8.82099 13.7278C8.82099 13.5182 8.90427 13.3171 9.05251 13.1689C9.20075 13.0206 9.40181 12.9374 9.61146 12.9374C9.8211 12.9374 10.0222 13.0206 10.1704 13.1689L11.9815 14.981L16.9528 10.0088C17.0262 9.93538 17.1133 9.87715 17.2092 9.83743C17.3051 9.7977 17.4079 9.77726 17.5117 9.77726C17.6155 9.77726 17.7183 9.7977 17.8142 9.83743C17.9101 9.87715 17.9972 9.93538 18.0706 10.0088C18.144 10.0822 18.2023 10.1693 18.242 10.2652C18.2817 10.3611 18.3022 10.4639 18.3022 10.5677C18.3022 10.6715 18.2817 10.7743 18.242 10.8702C18.2023 10.9661 18.144 11.0533 18.0706 11.1267Z" fill="#01AB31"/>
                                </svg>
                            </div>
                            <p class="testimonial-comment">{{ $review->comment }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->
