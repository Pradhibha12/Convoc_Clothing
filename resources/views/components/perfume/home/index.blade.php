  <style>
  .sm-btn-outline-white,
      .pf-btn-outline-white{
          background: #02020400  !important;
          border: 1px solid #FFFFFF85;
      }
  </style>
  <!-- Start Banner Area  -->
    <section class="pf-banner-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-area-main">
                        <div class="banner-content-area">
                            <div class="banner-title-outer wow animate__fadeInUp" data-wow-delay=".1s">
                                <h1 class="pf-banner-title">{{get_phrase('Discover Your Signature Scent.')}}</h1>
                                <img class="title-shape1" src="{{ asset('assets/frontend/perfume/images/banner-title-shape1.svg')}}" alt="shape">
                                <img class="title-shape2" src="{{ asset('assets/frontend/perfume/images/banner-title-shape2.svg')}}" alt="shape">
                            </div>
                            <p class="pf-banner-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Elevate your essence with our curated collection of luxury & designer fragrances for every mood & moment.')}}</p>
                            <a href="{{route('all_products')}}" class="btn eBynow pf-btn-outline-white wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Buy Now!')}}</a>
                            <div class="banner-arrow-banner-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                                <a href="javascript:;" class="banner-discover-btn">
                                    <div>
                                        <div class="bn-discover-arrow">
                                            <span class="fi-rr-arrows-h-copy text-white"></span>
                                        </div>
                                        <p>{{get_phrase('Discover')}}<br>{{get_phrase('More')}}</p>
                                    </div>
                                </a>
                                <div class="pf-sm-banner-wrap">
                                    <p class="pf-sm-banner-text">{{get_phrase('100% Unique Products')}}</p>
                                    <img class="sm-banner" src=" {{ asset('assets/frontend/perfume/images/sm-banner.webp')}}" alt="banner">
                                </div>
                            </div>
                        </div>
                        <div class="pf-banner-area wow animate__fadeInRight" data-wow-delay=".2s">
                            <img class="banner" src="{{ asset('assets/frontend/perfume/images/banner.webp')}}" alt="banner">
                            <div class="bn-product-served-badge">
                                <div class="d-flex align-items-center">
                                    <img class="product-served-image" src="{{ asset('assets/frontend/perfume/images/product-sm1.png')}}" alt="product">
                                    <img class="product-served-image" src="{{ asset('assets/frontend/perfume/images/product-sm2.png')}}" alt="product">
                                    <img class="product-served-image" src="{{ asset('assets/frontend/perfume/images/product-sm3.png')}}" alt="product">
                                </div>
                                <h5 class="product-served-badge-title">{{get_phrase('1K+ Products Served')}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area  -->

    <!-- Start Embrace Elegance with Every Spritz Area  -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="embrace-title-area">
                        <h2 class="section-title text-center mb-20px max-w-908px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Embrace Elegance with Every Spritz')}}🌹</h2>
                        <p class="section-subtitle text-center mb-34px max-w-633px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Sensual, floral, and timeless scents for every clean, contemporary fragrances that defy gender norms.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn pf-btn-outline-white">{{get_phrase('Explore Collection')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".4s">
                <div class="col-12">
                    <div class="embrace-content-area">
                        <div class="embrace-banner1">
                            <img class="banner" src=" {{ asset('assets/frontend/perfume/images/embrace-banner1.webp')}}" alt="banner">
                        </div>
                        <ul class="pf-category-nav">
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                            @endphp
                            @foreach($categories as $category)
                            <li class="pf-category-item">
                                <a href="{{ route('products', $category->slug) }}" class="pf-category-link">{{ $category->title }}</a>
                            </li>
                            @endforeach
                           
                        </ul>
                        <div class="embrace-banner2">
                            <img class="banner" src="{{ asset('assets/frontend/perfume/images/embrace-banner2.webp')}}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Embrace Elegance with Every Spritz Area  -->

    <!-- Start Bestsellers Fragrances You’ll Love❤ Area  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bestsellers-title-area">
                        <h2 class="section-title bestsellers-section-title title-shape1-active wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Bestsellers Fragrances You’ll Love')}}<span class="section-title-heart">❤</span></h2>
                        <div class="bestsellers-title-right">
                            <p class="section-subtitle mb-34px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Discover the scents everyone’s obsessed with handpicked by real fragrance lovers.')}}</p>
                            <a href="{{route('all_products')}}" class="btn pf-btn-outline-white wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Explore Collection')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-3 gy-28px wow animate__fadeInUp" data-wow-delay=".4s">
                @php 
                    $products = \App\Models\Product::where('status', 1)->latest()->take(6)->get();
                @endphp
                 @foreach($products as $product)
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('product', $product->slug) }}" class="product-card">
                        <div class="product-card-inner">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                            <div class="product-card-content">
                                <div class="pc-stars-ratings">
                                     <div class=" d-flex align-items-center">
                                            @php
                                                $rating = $product->average_rating;
                                                $fullStars = floor($rating); // full stars count
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                            @endphp

                                            {{-- Full stars --}}
                                            @for($i = 0; $i < $fullStars; $i++)
                                                <div class="svg-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                        <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#F86626"/>
                                                    </svg>
                                                </div>
                                            @endfor

                                            {{-- Half star --}}
                                            @if($halfStar)
                                                    <div class="svg-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                        <defs>
                                                            <linearGradient id="half-grad">
                                                                <stop offset="50%" stop-color="#F86626"/>
                                                                <stop offset="50%" stop-color="#ccc"/>
                                                            </linearGradient>
                                                        </defs>
                                                        <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                    </svg>
                                                </div>
                                            @endif

                                            {{-- Empty stars --}}
                                            @for($i = 0; $i < $emptyStars; $i++)
                                                    <div class="svg-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                        <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                    </svg>
                                                </div>
                                            @endfor
                                      </div>
                                    <p>({{ number_format($product->average_rating, 1) }})</p>
                                </div>
                                <h3 class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 30, '...') }}</h3>
                                <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    
                                     @if ($product->is_discounted)
                                        @php
                                            $discount = $product->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                            <h3 class="card-product-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h3>
                                        @else
                                           <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                        @endif
                                    @else
                                        <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                    @endif
                                    <p  class="btn sm-btn-outline-white">{{get_phrase('Shop Now')}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
               @endforeach
            </div>
        </div>
    </section>
    <!-- End Bestsellers Fragrances You’ll Love❤ Area  -->

    <!-- Start Why Choose US Area  -->
    <section class="section-mb overflow-x-clip">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="why-choose-title-area">
                        <h2 class="section-title text-center mb-20px max-w-908px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Why Fragrance Lovers Choose Us')}}🌟</h2>
                        <p class="section-subtitle text-center max-w-633px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Sensual, floral, and timeless scents for every clean, contemporary fragrances that defy gender norms.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="customer-benefit-area">
                        <div>
                            <div class="pf-benefit-wrap1">
                                <div class="pf-benefit-icon mb-20px">
                                    <img class="icon" src="{{ asset('assets/frontend/perfume/images/benefit-icon1.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px">{{get_phrase('Authentic Scents')}}</h4>
                                <p class="pf-benefit-subtitle">{{get_phrase('100% original, verified products')}}</p>
                            </div>
                            <div class="pf-benefit-wrap2">
                                <div class="pf-benefit-icon mb-3">
                                    <img class="icon" src="{{ asset('assets/frontend/perfume/images/benefit-icon2.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px">{{get_phrase('Exclusive Deals')}}</h4>
                                <p class="pf-benefit-subtitle">{{get_phrase('Premium scents at irresistible prices')}}</p>
                            </div>
                        </div>
                        <div class="benefit-banner-area">
                            <img class="banner" src="{{ asset('assets/frontend/perfume/images/why-choose-banner.webp')}}" alt="banner">
                            <img class="benefit-banner-shape1" src="{{ asset('assets/frontend/perfume/images/arrow-vactor1.svg')}}" alt="arrow">
                            <img class="benefit-banner-shape2" src="{{ asset('assets/frontend/perfume/images/arrow-vactor2.svg')}}" alt="arrow">
                        </div>
                        <div>
                            <div class="pf-benefit-wrap3">
                                <div class="pf-benefit-icon mb-20px">
                                    <img class="icon" src="{{ asset('assets/frontend/perfume/images/benefit-icon3.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px">{{get_phrase('Complimentary Samples')}}</h4>
                                <p class="pf-benefit-subtitle">{{get_phrase('Enjoy a free sample with every order')}}</p>
                            </div>
                            <div class="pf-benefit-wrap4">
                                <div class="pf-benefit-icon mb-20px">
                                     <img class="icon" src="{{ asset('assets/frontend/perfume/images/benefit-icon4.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px">{{get_phrase('Fast Shipping')}}</h4>
                                <p class="pf-benefit-subtitle">{{get_phrase('Delivered fresh and fast across the globe')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn pf-btn-outline-white">{{get_phrase('Explore Collection')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Choose US Area  -->

    <!-- Start Limited-Time Offers Area  -->
    <section class="section-mb overflow-x-clip">
        <div class="container">
            <div class="row gx-4 gy-28px justify-content-center justify-content-lg-between align-items-center">
                <div class="col-md-10 col-lg-6">
                    <div class="offer-banner-area wow animate__fadeInLeft" data-wow-delay=".1s">
                        <div class="pf-offer-banner1">
                            <img class="banner1" src="{{ asset('assets/frontend/perfume/images/offer-banner1.webp')}}" alt="banner">
                        </div>
                        <div class="pf-offer-banner2">
                            <img class="banner2" src="{{ asset('assets/frontend/perfume/images/offer-banner2.webp')}}" alt="banner">
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div>
                        <h2 class="section-title mb-3 title-shape2-active wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Limited-Time Offers Just for You')}}</h2>
                        <p class="section-subtitle mb-30px wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Discover the scents everyone’s obsessed with handpicked by real fragrance lovers. Unwrap exclusive deals and irresistible savings on your favorite scents. Hurry — these won’t last long!')}}</p>
                        
                        <div class="d-flex align-items-center flex-wrap gap-10px wow animate__fadeInUp" data-wow-delay=".5s">
                            <a href="{{route('all_products')}}" class="btn pf-btn-outline-white min-w-196px">{{get_phrase('Buy Now!')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Limited-Time Offers Area  -->

    <!-- Start Testimonial Area  -->
    <section class="testimonial-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                              @foreach($reviews->take(5) as $review)   
                            <div class="swiper-slide">
                                <div class="testimonial-slide">
                                    <div class="ts-user-profile">
                                        <img class="profile" src="{{ get_image($review->user->photo) }}" alt="Image">
                                    </div>
                                    <h6 class="ts-user-name">{{ $review->user->name }}</h6>
                                    <p class="testimonial-subcomment">{{ $review->comment }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="115" height="30" viewBox="0 0 115 30" fill="none">
                                <path d="M114.414 16.1759C115.195 15.3949 115.195 14.1286 114.414 13.3475L101.686 0.619592C100.905 -0.161457 99.6389 -0.161457 98.8579 0.619592C98.0768 1.40064 98.0768 2.66697 98.8579 3.44802L110.172 14.7617L98.8579 26.0754C98.0768 26.8565 98.0768 28.1228 98.8579 28.9039C99.6389 29.6849 100.905 29.6849 101.686 28.9039L114.414 16.1759ZM0 14.7617L-1.74846e-07 16.7617L113 16.7617L113 14.7617L113 12.7617L1.74846e-07 12.7617L0 14.7617Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="115" height="30" viewBox="0 0 115 30" fill="none">
                                <path d="M0.585785 13.3475C-0.195259 14.1286 -0.195259 15.3949 0.585785 16.1759L13.3137 28.9039C14.0948 29.6849 15.3611 29.6849 16.1421 28.9039C16.9232 28.1228 16.9232 26.8565 16.1421 26.0754L4.82843 14.7617L16.1421 3.44801C16.9232 2.66696 16.9232 1.40063 16.1421 0.619583C15.3611 -0.161466 14.0948 -0.161466 13.3137 0.619583L0.585785 13.3475ZM115 14.7617V12.7617H2V14.7617V16.7617H115V14.7617Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area  -->

    <!-- Start Fragrance for the Season Area  -->
    <section class="section-mb overflow-x-clip">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="seasonal-title-area">
                        <h2 class="section-title text-center mb-20px max-w-655px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Fragrance for the Season')}}</h2>
                        <p class="section-subtitle text-center mb-34px max-w-459px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('From cozy winter warmth to breezy summer freshness—scent your season right.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn pf-btn-outline-white px-12px">{{get_phrase('Explore Seasonal Collections')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".4s">
                <div class="col-12">
                    <div class="seasonal-product-area">
                        <a href="{{route('all_products')}}" class="seasonal-product1">
                            <img class="banner" src=" {{ asset('assets/frontend/perfume/images/seasonal-banner1.webp')}}" alt="profile">
                            <div class="seasonal-product-title-area">
                                <h3 class="seasonal-product-title">{{get_phrase('Summer Vibes')}}</h3>
                            </div>
                        </a>
                        <a href="{{route('all_products')}}" class="seasonal-product2">
                             <img class="banner" src=" {{ asset('assets/frontend/perfume/images/seasonal-banner2.webp')}}" alt="profile">
                            <div class="seasonal-product-title-area">
                                <h3 class="seasonal-product-title"> {{get_phrase('Winter Warmers')}}</h3>
                            </div>
                        </a>
                        <a href="{{route('all_products')}}" class="seasonal-product1">
                             <img class="banner" src=" {{ asset('assets/frontend/perfume/images/seasonal-banner3.webp')}}" alt="profile">
                            <div class="seasonal-product-title-area">
                                <h3 class="seasonal-product-title">{{get_phrase('Gifting Picks')}}</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Fragrance for the Season Area  -->

    <!-- Start Explore the World of Fragrance! Area  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="explore-title-area">
                        <h2 class="section-title explore-section-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Explore the World of Fragrance!')}}</h2>
                        <div class="explore-title-right">
                            <p class="section-subtitle explore-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Get inspired by our guides, tips, and scent stories to help you find your perfect match.')}}</p>
                            <a href="{{route('contact_us')}}" class="btn pf-btn-outline-white min-w-196px wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Contact Us')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 explore-banner-row justify-content-center wow animate__fadeInUp" data-wow-delay=".4s">
                 @php 
                    $productsImage = \App\Models\Product::where('status', 1)->latest()->take(5)->get();
                @endphp
                 @foreach($productsImage as $product)
                    <div class="col">
                        <div class="sm-rounded-banner">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="image">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Explore the World of Fragrance! Area  -->
