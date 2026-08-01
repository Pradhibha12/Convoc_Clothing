<!-- Banner Area End -->
<section class="banner-section section-mb overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-area-main">
                    <div class="banner-left-area">
                        <h1 class="banner-title wow animate__fadeInUp" data-wow-delay=".1s">
                            <span class="banner-title-shape">
                                <img class="shape" src="{{ asset('assets/frontend/drinks/images/pomegranate-shape.png') }}" alt="">
                            </span>
                            <span>{{get_phrase('Your Daily Essentials, Delivered Fresh & Fast.')}}</span>
                        </h1>
                        <p class="banner-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('From crave-worthy snacks to organic produce - shop everything in one place.')}}</p>
                        <div class="d-flex align-items-center gap-20px flex-wrap banner-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn dr-btn-light">{{get_phrase('Start Shopping')}}</a>
                        </div>
                        <div class="banner-circle-typography wow animate__fadeInUp" data-wow-delay=".5s">
                            <img class="typography-shape" src="{{ asset('assets/frontend/drinks/images/circle-typography.png') }}" alt="">
                        </div>
                    </div>
                    <div class="banner-area-banner wow animate__fadeInRight" data-wow-delay=".1s">
                        <img class="banner d-none d-lg-block" src="{{ asset('assets/frontend/drinks/images/banner-image1.webp') }}" alt="banner">
                        <img class="banner d-block d-lg-none" src="{{ asset('assets/frontend/drinks/images/banner-image2.webp') }}" alt="banner">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area Start -->

<!-- Explore What You Crave Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="category-title-area wow animate__fadeInUp" data-wow-delay=".1s">
                    <h2 class="section-title text-center category-area-title">{{get_phrase('Explore What')}}</h2>
                    <h2 class="section-title text-center category-area-title">{{get_phrase('You Crave')}}</h2>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="category1-card">
                    <h4 class="category1-card-title">{{get_phrase('Snacks')}}</h4>
                    <p class="category1-card-subtitle">{{get_phrase('crunchy, sweet, savory treats for every mood.')}}</p>
                    <a href="{{route('all_products')}}" class="btn dr-sm2-btn">{{get_phrase('Shop Now')}}</a>
                    <div class="category1-card-banner">
                        <img class="banner" src="{{ asset('assets/frontend/drinks/images/category-banner11.webp') }}" alt="banner">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="w-100 h-100">
                    <div class="category2-card mb-20px">
                        <h4 class="category2-card-title">{{get_phrase('Beverages')}}</h4>
                        <p class="category2-card-subtitle">{{get_phrase('hydrate in style with our premium drink picks.')}}</p>
                        <a href="{{route('all_products')}}" class="btn dr-sm2-btn">{{get_phrase('Shop Now')}}</a>
                        <div class="category2-card-banner">
                            <img class="banner" src="{{ asset('assets/frontend/drinks/images/category-banner2.webp') }}" alt="banner">
                        </div>
                    </div>
                    <div class="category3-card">
                        <h4 class="category3-card-title">{{get_phrase('Organic Produce')}}</h4>
                        <p class="category3-card-subtitle">{{get_phrase('handpicked, locally sourced, always fresh.')}}</p>
                        <a href="{{route('all_products')}}" class="btn dr-sm2-btn">{{get_phrase('Shop Now')}}</a>
                        <div class="category3-card-banner">
                            <img class="banner" src="{{ asset('assets/frontend/drinks/images/category-banner3.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="category4-card">
                    <h4 class="category4-card-title">{{get_phrase('Meal Kits')}}</h4>
                    <p class="category4-card-subtitle">{{get_phrase('easy-to-cook kits for stress-free meals.')}}</p>
                    <a href="{{route('all_products')}}" class="btn dr-sm2-btn">{{get_phrase('Shop Now')}}</a>
                    <div class="category4-card-banner">
                        <img class="banner" src="{{ asset('assets/frontend/drinks/images/category-banner4.webp') }}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Explore What You Crave Area End -->

<!-- Top Picks, Loved by Everyone Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h2 class="section-title mb-4 wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Top Picks, Loved by Everyone')}}</h2>
                    <p class="section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase("Products flying off our shelves - grab them before they're gone!")}}</p>
                </div>
            </div>
        </div>
        <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                        @php 
                           $allproduct =App\Models\Product::where('status', 1)->latest()->take(8)->get();
                        @endphp
                        @foreach($allproduct as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('product', $product->slug) }}" class="product-card">
                                <div class="product-card-banner">
                                    @php
                                        $thumbnails = json_decode($product->thumbnail, true);
                                        $firstImage = $thumbnails[0] ?? null;
                                    @endphp
                                    <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                </div>
                                <div class="product-card-body">
                                    <h5 class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</h5>
                                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px">
                                        @if ($product->is_discounted)
                                        @php
                                            $discount = $product->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                            <h5 class="pc-new-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h5>
                                            <h4 class="pc-old-price">{{ currency($product->price) }}</h4>
                                        @else
                                          <h5 class="pc-new-price">{{ currency($product->price) }}</h5>
                                        @endif
                                        @else
                                           <h5 class="pc-new-price">{{ currency($product->price) }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                       
                    </div>
                    <div class="swiper-pagination"></div>
                </div>    
            </div>
        </div>
    </div>
</section>
<!-- Top Picks, Loved by Everyone Area End -->

<!-- Text Slider Area Start -->
<section class="section-mb wow animate__fadeInUp" data-wow-delay=".1s">
    <!-- Swiper -->
    <div class="swiper text-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="text-slide-wrap">
                    <h2 class="text-slider-text text-nowrap">{{get_phrase('Premium Support')}}</h2>
                    <div class="text-slider-dot"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="text-slide-wrap">
                    <h2 class="text-slider-text text-nowrap">{{get_phrase('14 Day Returns')}}</h2>
                    <div class="text-slider-dot"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="text-slide-wrap">
                    <h2 class="text-slider-text text-nowrap">{{get_phrase('Flexible Payment')}}</h2>
                    <div class="text-slider-dot"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="text-slide-wrap">
                    <h2 class="text-slider-text text-nowrap">{{get_phrase('Premium Support')}}</h2>
                    <div class="text-slider-dot"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="text-slide-wrap">
                    <h2 class="text-slider-text text-nowrap">{{get_phrase('14 Day Returns')}}</h2>
                    <div class="text-slider-dot"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="text-slide-wrap">
                    <h2 class="text-slider-text text-nowrap">{{get_phrase('Flexible Payment')}}</h2>
                    <div class="text-slider-dot"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Text Slider Area End -->

<!-- Offer Timer Area Start -->
<section class="offer-timer-section section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="offer-timer-area">
                    
                    <h2 class="offer-section-title wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Get 15% off your first order')}}</h2>
                    <p class="offer-section-subtitle wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase("Load up on your favorites, and we’ll throw in an extra one on the house. Whether you're nuts for nuts or crave crunchy kicks, now's your chance to snack smart.")}}</p>
                    <a href="javascript:;" class="btn dr-btn-green-light wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('Snack Now')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Offer Timer Area End -->
    
<!-- We Keep It Clean & Trustworthy Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h2 class="section-title mb-4 text-center advantage-section-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('We Keep It Clean & Trustworthy')}}</h2>
                    <p class="section-subtitle text-center advantage-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase("Products flying off our shelves - grab them before they're gone!")}}</p>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="advantage-card">
                    <div class="advantage-card-icon">
                        <img class="icon" src="{{ asset('assets/frontend/drinks/images/advantage-icon1.svg') }}" alt="icon">
                    </div>
                    <h5 class="advantage-card-title">{{get_phrase('USDA Organic Certified')}}</h5>
                    <p class="advantage-card-subtitle">{{get_phrase('Every ingredient is grown without synthetic pesticides or chemicals.')}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="advantage-card">
                    <div class="advantage-card-icon">
                        <img class="icon" src="{{ asset('assets/frontend/drinks/images/advantage-icon2.svg') }}" alt="icon">
                    </div>
                    <h5 class="advantage-card-title">{{get_phrase('Non-GMO Ingredients')}}</h5>
                    <p class="advantage-card-subtitle">{{get_phrase('Our snacks are crafted without any genetically modified ingredients.')}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="advantage-card">
                    <div class="advantage-card-icon">
                        <img class="icon" src="{{ asset('assets/frontend/drinks/images/advantage-icon3.svg') }}" alt="icon">
                    </div>
                    <h5 class="advantage-card-title">{{get_phrase('Fair Trade Certified')}}</h5>
                    <p class="advantage-card-subtitle">{{get_phrase('We partner with ethical farms to ensure fair wages and sustainable practices.')}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="advantage-card">
                    <div class="advantage-card-icon">
                        <img class="icon" src="{{ asset('assets/frontend/drinks/images/advantage-icon4.svg') }}" alt="icon">
                    </div>
                    <h5 class="advantage-card-title">{{get_phrase('Locally Sourced Produce')}}</h5>
                    <p class="advantage-card-subtitle">{{get_phrase('We prioritize local farms for peak flavor and minimal footprint.')}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- We Keep It Clean & Trustworthy Area End -->

<!-- Fresh for the Season Area Start -->
<section class="mb-20px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h2 class="section-title mb-4 text-center advantage-section-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Fresh for the Season')}}</h2>
                    <p class="section-subtitle text-center advantage-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Try our Spring picks - vibrant produce, refreshing drinks & more.')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mixitup-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                    @php
                        $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                    @endphp
                    <button type="button" data-filter=".show-all" class="product-filter-btn mixitup-control-active">{{get_phrase('All')}}</button>
                     @foreach($categories->take(4) as $category)
                        <button type="button" data-filter=".cat-{{$category->id}}" class="product-filter-btn"> {{ $category->title }} </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center mb-4 mixitup wow animate__fadeInUp" data-wow-delay=".4s">
             @php 
                $allproduct =App\Models\Product::where('status', 1)->latest()->take(8)->get();
            @endphp
               @foreach($allproduct as $product)
            <div class="col-sm-6 col-lg-4 col-xl-3 mix show-all">
                <a href="{{ route('product', $product->slug) }}" class="product-card">
                    <div class="product-card-banner">
                        @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                    </div>
                    <div class="product-card-body">
                        <h5 class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</h5>
                        <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px">
                            @if ($product->is_discounted)
                            @php
                                $discount = $product->discount;
                            @endphp
                            @if ($discount->discount_type == 'percentage')
                                <h5 class="pc-new-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h5>
                                <h4 class="pc-old-price">{{ currency($product->price) }}</h4>
                            @else
                                <h5 class="pc-new-price">{{ currency($product->price) }}</h5>
                            @endif
                            @else
                                <h5 class="pc-new-price">{{ currency($product->price) }}</h5>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
             @foreach($categories->take(4) as $category)
                    @php 
                        $catProducts = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()->take(8)->get();
                    @endphp
                   @foreach($catProducts as $catproduct)
                        <div class="col-sm-6 col-lg-4 col-xl-3 mix cat-{{$catproduct->category_id}}">
                            <a href="{{ route('product', $catproduct->slug) }}" class="product-card">
                                <div class="product-card-banner">
                                    @php
                                        $thumbnails = json_decode($catproduct->thumbnail, true);
                                        $firstImage = $thumbnails[0] ?? null;
                                    @endphp
                                    <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                </div>
                                <div class="product-card-body">
                                    <h5 class="product-card-title">{{ \Illuminate\Support\Str::limit($catproduct->title, 70, '...') }}</h5>
                                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px">
                                        @if ($catproduct->is_discounted)
                                        @php
                                            $discount = $catproduct->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                            <h5 class="pc-new-price">{{ currency(($catproduct->price / 100) * $discount->discount_value) }}</h5>
                                            <h4 class="pc-old-price">{{ currency($catproduct->price) }}</h4>
                                        @else
                                            <h5 class="pc-new-price">{{ currency($catproduct->price) }}</h5>
                                        @endif
                                        @else
                                            <h5 class="pc-new-price">{{ currency($catproduct->price) }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                   @endforeach
            @endforeach
        </div>
       

    </div>
</section>
<!-- Fresh for the Season Area End -->
    
<!-- Testimonials Area Start -->
<section class="testimonial-section section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-title-area">
                    <h2 class="section-title mb-4 wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('What Our Shoppers Are Saying')}}</h2>
                    <p class="section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Happy Customers makes us Happy')}}</p>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
            @foreach($reviews->take(6) as $review)
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card">
                    <div class="d-flex align-items-center gap-2 mb-20px">
                        @for($i=1; $i<=5; $i++)
                        <div class="svg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <g clip-path="url(#clip0_101_956)">
                                    <path d="M6.1822 5.50494L1.3972 6.19869L1.31245 6.21594C1.18415 6.25 1.06719 6.3175 0.973516 6.41154C0.879839 6.50559 0.812799 6.62281 0.779243 6.75124C0.745687 6.87966 0.746817 7.0147 0.782517 7.14255C0.818217 7.2704 0.887209 7.38648 0.982446 7.47894L4.44895 10.8532L3.63145 15.6194L3.6217 15.7019C3.61384 15.8346 3.6414 15.967 3.70153 16.0856C3.76167 16.2041 3.85223 16.3045 3.96395 16.3766C4.07566 16.4486 4.20451 16.4897 4.33731 16.4955C4.4701 16.5014 4.60207 16.4718 4.7197 16.4099L8.9992 14.1599L13.2689 16.4099L13.3439 16.4444C13.4677 16.4932 13.6023 16.5082 13.7338 16.4878C13.8652 16.4674 13.9889 16.4124 14.0921 16.3284C14.1953 16.2444 14.2744 16.1345 14.3211 16.0099C14.3678 15.8853 14.3805 15.7506 14.3579 15.6194L13.5397 10.8532L17.0077 7.47819L17.0662 7.41444C17.1498 7.31152 17.2046 7.18828 17.225 7.05729C17.2454 6.92629 17.2308 6.79223 17.1825 6.66874C17.1343 6.54525 17.0541 6.43677 16.9503 6.35433C16.8465 6.27189 16.7227 6.21844 16.5914 6.19944L11.8064 5.50494L9.66745 1.16994C9.60555 1.04434 9.50973 0.938578 9.39084 0.86462C9.27194 0.790662 9.13472 0.751465 8.9947 0.751465C8.85467 0.751465 8.71745 0.790662 8.59855 0.86462C8.47966 0.938578 8.38384 1.04434 8.32195 1.16994L6.1822 5.50494Z" fill="#FF6600"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_101_956">
                                    <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        @endfor
                    </div>
                    <p class="testimonial-comment mb-30px">{{$review->comment}}</p>
                    <div class="mb-30px">
                        <h5 class="ts-user-name">{{ $review->user->name }}</h5>
                        <p class="ts-user-role">{{ $review->created_at->format('F j, Y') }}</p>
                    </div>
                  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Testimonials Area End -->


    
<!-- Get Inspired in the Kitchen Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end gap-4 mb-40px">
                    <div class="blog-title-area">
                        <h2 class="section-title mb-4 wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Get Inspired in the Kitchen')}}</h2>
                        <p class="section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Try simple recipes using our fresh picks.')}}</p>
                    </div>
                    <a href="{{route('blog')}}" class="btn dr-btn-outline-secondary wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('View All')}}</a>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".4s">
            @foreach($blogs->take(4) as $blog)
            @php 
                $category = App\Models\Blog_category::where('id', $blog->blog_category_id)->first();
            @endphp 
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="dr-blog-card">
                    <div class="blog-card-banner">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </div>
                    <div class="blog-card-body">
                        <div class="blog-date-category">
                            <p class="dr-blog-date">{{ $blog->created_at->format('d M, Y') }}</p>
                            <h4 class="dr-blog-category">{{$category->title}}</h4>
                        </div>
                        <p class="dr-blog-title">{{ $blog->title }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Get Inspired in the Kitchen Area End -->

<!-- Shipping Support Area End -->
<section class="shipping-support-section section-mb wow animate__fadeInUp" data-wow-delay=".1s">
    <div class="container">
        <div class="row g-20px justify-content-center">
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="d-flex align-items-center gap-12px">
                    <div class="circle-iconbox">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="18" viewBox="0 0 27 18" fill="none">
                            <g clip-path="url(#clip0_101_1288)">
                                <path d="M26.562 8.31113C26.2823 7.96113 25.8917 7.72224 25.459 7.64446L25.2531 4.69446C25.459 4.69446 25.6278 4.5389 25.6648 4.32779L25.7439 3.85001C25.8337 3.36113 25.7176 2.85557 25.4167 2.47224C25.1265 2.10557 24.699 1.90557 24.2134 1.90557H21.1102L21.2633 1.00001C21.3055 0.750015 21.2475 0.494459 21.0944 0.300014C20.9414 0.111126 20.7144 1.44788e-05 20.4769 0.00557003H5.19312C4.72869 0.0166811 4.33288 0.366681 4.24844 0.850015L2.89738 8.92224C2.85516 9.16113 3.00293 9.39446 3.23514 9.44446C3.46736 9.49446 3.68374 9.33335 3.73124 9.0889V9.07779L5.08229 1.00001C5.09812 0.944459 5.14034 0.900015 5.1984 0.894459H20.4242L19.0784 8.92779C19.0362 9.17224 19.1892 9.40001 19.4214 9.44446C19.6536 9.4889 19.87 9.32779 19.9122 9.08335L20.0072 8.50001H25.0631C25.4115 8.50001 25.7123 8.6389 25.9128 8.8889C26.05 9.06668 26.1345 9.28335 26.1503 9.51113H24.7465C24.5407 9.51113 24.3665 9.66668 24.3296 9.87779L24.1712 10.8278C24.1026 11.1945 24.1923 11.5778 24.4193 11.8667C24.6462 12.1445 24.9787 12.3056 25.3323 12.3H25.7281L25.4009 14.2611H24.2873C24.2134 13.8722 24.0498 13.5056 23.8071 13.2C23.3743 12.6556 22.7357 12.3556 22.018 12.3556C20.8569 12.3556 19.7381 13.1556 19.2156 14.2556H19.0467L19.5956 10.9778C19.6378 10.7333 19.4848 10.5056 19.2525 10.4611C19.0203 10.4167 18.8039 10.5778 18.7617 10.8222L18.1865 14.2556H10.3599C10.286 13.8667 10.1224 13.5 9.87959 13.1945C9.44683 12.65 8.80825 12.35 8.0905 12.35C6.92944 12.35 5.81059 13.15 5.28812 14.25H2.86572L3.0346 13.2389H4.93452C5.16673 13.2389 5.35672 13.0389 5.35672 12.7945C5.35672 12.55 5.16673 12.35 4.93452 12.35H0.422205C0.189992 12.35 0 12.55 0 12.7945C0 13.0389 0.189992 13.2389 0.422205 13.2389H2.17436L2.02131 14.1445C1.97909 14.3945 2.03714 14.65 2.19019 14.8445C2.34324 15.0333 2.57017 15.1445 2.80766 15.1389H5.01368C4.89758 15.8945 5.07174 16.6056 5.5045 17.15C5.93726 17.6945 6.57056 17.9945 7.29359 17.9945C8.73436 17.9945 10.1065 16.7611 10.3599 15.25C10.3651 15.2167 10.3704 15.1778 10.3757 15.1445H18.9359C18.8198 15.9 18.9939 16.6111 19.4267 17.1556C19.8595 17.7 20.498 18 21.2158 18C22.6566 18 24.0287 16.7667 24.2821 15.2556C24.2873 15.2222 24.2926 15.1833 24.2979 15.15H25.7545C25.9603 15.15 26.1345 14.9945 26.1714 14.7833L26.9683 10.0333C27.0739 9.38335 26.9314 8.77224 26.562 8.31113ZM20.155 7.60557L20.6405 4.69446H24.4034L24.6093 7.60557H20.155ZM24.9101 3.69446L24.8943 3.80001H20.7936L20.9625 2.7889H24.2134C24.4245 2.77779 24.6304 2.87224 24.7676 3.0389C24.9048 3.21113 24.9523 3.44446 24.9101 3.69446ZM9.53127 15.1C9.34656 16.2056 8.34382 17.1056 7.29359 17.1056C6.82389 17.1056 6.41751 16.9222 6.14836 16.5833C5.87393 16.2333 5.76837 15.7611 5.85281 15.2556C6.03753 14.15 7.04027 13.25 8.0905 13.25C8.5602 13.25 8.96658 13.4389 9.23573 13.7722C9.51016 14.1167 9.61572 14.5889 9.53127 15.1ZM23.4535 15.1C23.2688 16.2056 22.266 17.1056 21.2158 17.1056C20.7461 17.1056 20.3397 16.9222 20.0706 16.5833C19.7961 16.2333 19.6906 15.7611 19.775 15.2556C19.9597 14.15 20.9625 13.25 22.0127 13.25C22.4824 13.25 22.8888 13.4389 23.1579 13.7722C23.4324 14.1167 23.5379 14.5889 23.4535 15.1ZM25.8759 11.4056H25.327C25.2267 11.4111 25.1317 11.3722 25.0631 11.2889C24.9998 11.2 24.9734 11.0833 24.9998 10.9778L25.0948 10.3945H26.0395L25.8759 11.4056ZM8.38604 14.5556C8.23299 14.3667 8.00606 14.2556 7.76857 14.2611C7.30414 14.2722 6.90833 14.6222 6.82389 15.1056C6.78167 15.3556 6.83972 15.6111 6.99277 15.8056C7.14582 15.9945 7.37275 16.1056 7.61024 16.1C8.07467 16.0889 8.47048 15.7389 8.55493 15.2556C8.60242 15.0056 8.53909 14.75 8.38604 14.5556ZM22.3135 14.5556C22.1605 14.3667 21.9335 14.2556 21.6961 14.2611C21.2316 14.2722 20.8358 14.6222 20.7514 15.1056C20.7091 15.3556 20.7672 15.6111 20.9202 15.8056C21.0733 15.9945 21.3002 16.1056 21.5377 16.1C22.0022 16.0889 22.398 15.7389 22.4824 15.2556C22.5299 15.0056 22.4666 14.75 22.3135 14.5556ZM17.0518 12.3556H11.6951C11.4629 12.3556 11.2729 12.5556 11.2729 12.8C11.2729 13.0445 11.4629 13.2445 11.6951 13.2445H17.0518C17.284 13.2445 17.474 13.0445 17.474 12.8C17.474 12.5556 17.2893 12.3556 17.0518 12.3556ZM9.44156 10.4556H1.64132C1.40911 10.4556 1.21912 10.6611 1.22439 10.9056C1.22439 11.15 1.41439 11.3445 1.64132 11.3445H9.44156C9.67377 11.3445 9.86376 11.1389 9.85848 10.8945C9.85848 10.6556 9.67377 10.4556 9.44156 10.4556Z" fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_101_1288">
                                <rect width="27" height="18" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div>
                        <h4 class="shipping-support-title">{{get_phrase('FREE SHIPPING')}}</h4>
                        <p class="shipping-support-subtitle">{{get_phrase('You will love at great low prices')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="d-flex align-items-center gap-12px">
                    <div class="circle-iconbox">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="25" viewBox="0 0 21 25" fill="none">
                            <g clip-path="url(#clip0_101_1374)">
                                <path d="M20.6294 4.3125C17.1705 3.3125 13.8352 1.9375 10.8088 0.0625C10.6235 -0.0625 10.4382 -0.0625 10.2529 0.0625C7.16465 1.9375 3.82936 3.375 0.4323 4.3125C0.185242 4.375 -5.24562e-05 4.5625 -5.24562e-05 4.8125V10.1875C-0.0618172 14.4375 1.60583 18.5 4.6323 21.5C6.91759 23.75 9.57348 25 10.4999 25C11.4264 25 14.0823 23.75 16.3676 21.5C19.3941 18.5625 21.0617 14.4375 20.9999 10.1875V4.8125C20.9999 4.5625 20.8147 4.375 20.6294 4.3125ZM19.9499 10.1875C20.0117 14.125 18.4676 17.9375 15.6264 20.75C13.4029 23 10.9941 23.9375 10.4999 23.9375C10.0058 23.9375 7.59701 22.9375 5.37348 20.75C2.59406 18 0.988183 14.1875 1.04995 10.1875V5.1875C4.32348 4.25 7.53524 2.875 10.4999 1.125C13.4647 2.875 16.6764 4.25 19.9499 5.1875V10.1875ZM6.97936 11.4375C6.29995 10.75 5.24995 10.75 4.57054 11.4375C3.89112 12.125 3.89112 13.1875 4.57054 13.875L7.59701 17C8.27642 17.6875 9.32642 17.6875 10.0058 17L16.3676 10.5C17.047 9.8125 17.047 8.75 16.3676 8.0625C15.6882 7.375 14.6382 7.375 14.0205 8.0625L8.8323 13.3125L6.97936 11.4375ZM14.7617 8.75C15.0088 8.5 15.4411 8.5 15.6882 8.75C15.9352 9 15.9352 9.4375 15.6882 9.6875L9.26465 16.1875C9.14112 16.3125 8.95583 16.375 8.8323 16.375C8.64701 16.375 8.46171 16.3125 8.33818 16.1875L5.31171 13.0625C5.06465 12.8125 5.06465 12.375 5.31171 12.125C5.55877 11.875 5.99112 11.875 6.23818 12.125L8.46171 14.375C8.64701 14.5625 8.95583 14.5625 9.20289 14.375L14.7617 8.75Z" fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_101_1374">
                                <rect width="21" height="25" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div>
                        <h4 class="shipping-support-title">{{get_phrase('Flexible Payment')}}</h4>
                        <p class="shipping-support-subtitle">{{get_phrase('Pay Wth Multiple Credit Cards')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="d-flex align-items-center gap-12px">
                    <div class="circle-iconbox">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                            <g clip-path="url(#clip0_101_1368)">
                                <path d="M22.6101 8.47006L14.6301 4.06006C14.2101 3.85006 13.7201 3.85006 13.3701 4.06006L5.39007 8.47006C4.97007 8.68006 4.69007 9.17006 4.69007 9.66006V18.4101C4.69007 18.9001 4.97007 19.3201 5.39007 19.6001L13.3701 24.0101C13.7901 24.2201 14.2801 24.2201 14.6301 24.0101L22.6101 19.6001C23.0301 19.3901 23.3101 18.9001 23.3101 18.4101V9.59006C23.3101 9.10006 23.0301 8.68006 22.6101 8.47006ZM13.8601 4.97006C13.9301 4.90006 14.0001 4.90006 14.0701 4.97006L17.2201 6.72006L9.52007 10.9901L6.30007 9.17006L13.8601 4.97006ZM13.4401 22.7501L5.88007 18.5501C5.81007 18.4801 5.74007 18.4101 5.74007 18.3401V10.0801L9.31007 12.1101L13.4401 14.4201V22.7501ZM10.7801 11.6201L18.4801 7.35006L21.7701 9.17006L14.0701 13.4401L10.7801 11.6201ZM22.1901 18.4101C22.1901 18.4801 22.1201 18.5501 22.0501 18.6201L14.4901 22.8201V14.4201L22.1201 10.1501L22.1901 18.4101ZM10.1501 13.9301L7.28007 12.3201C7.14007 12.2501 6.93007 12.2501 6.72007 12.3201C6.58007 12.3901 6.44007 12.6001 6.44007 12.8101V15.1201C6.44007 15.3301 6.58007 15.4701 6.72007 15.6101L9.59007 17.2201C9.66007 17.2901 9.73007 17.2901 9.87007 17.2901C9.94007 17.2901 10.0801 17.2901 10.1501 17.2201C10.2901 17.1501 10.4301 16.9401 10.4301 16.7301V14.4201C10.4301 14.2101 10.3601 14.0001 10.1501 13.9301ZM9.38007 15.7501L7.56007 14.7701V13.7201L9.38007 14.7001V15.7501ZM12.4601 19.6701L10.9901 18.9001C10.7101 18.7601 10.3601 18.8301 10.2201 19.1101C10.0801 19.3901 10.1501 19.7401 10.4301 19.8801L11.9001 20.6501C11.9701 20.7201 12.0401 20.7201 12.1801 20.7201C12.4601 20.7201 12.7401 20.4401 12.7401 20.1601C12.7401 19.9501 12.6001 19.8101 12.4601 19.6701ZM25.4801 5.95006L26.4601 4.90006C26.6701 4.69006 26.6701 4.34006 26.4601 4.13006C26.3901 4.06006 26.2501 3.99006 26.0401 3.99006H23.3101C23.0301 3.99006 22.7501 4.20006 22.7501 4.55006V7.28006C22.7501 7.49006 22.8901 7.70006 23.1001 7.77006C23.1701 7.77006 23.2401 7.84006 23.3101 7.84006C23.4501 7.84006 23.5901 7.77006 23.7301 7.70006L24.6401 6.79006C28.6301 12.6701 27.1601 20.7201 21.2801 24.7101C17.6401 27.2301 12.9501 27.6501 8.89007 25.9001C8.61007 25.7601 8.26007 25.9001 8.19007 26.1801C8.05007 26.4601 8.19007 26.7401 8.47007 26.8801C10.2201 27.6501 12.1101 28.0001 14.0001 28.0001C21.7001 28.0001 28.0001 21.7701 28.0001 14.0001C28.0001 11.1301 27.0901 8.33006 25.4801 5.95006ZM7.28007 25.0601C7.00007 24.8501 6.72007 24.9201 6.51007 25.2001C6.37007 25.4801 6.44007 25.7601 6.72007 25.9701C6.79007 26.0401 6.93007 26.0401 7.00007 26.0401C7.21007 26.0401 7.35007 25.9701 7.49007 25.7601C7.63007 25.5501 7.56007 25.2001 7.28007 25.0601ZM21.3501 2.10006C21.0701 1.96006 20.7201 2.03006 20.5801 2.31006C20.4401 2.59006 20.5101 2.87006 20.7901 3.01006C21.0701 3.15006 21.3501 3.08006 21.5601 2.80006C21.7701 2.52006 21.6301 2.24006 21.3501 2.10006ZM19.5301 1.12006C12.3901 -1.88994 4.20007 1.40006 1.12007 8.47006C-0.769927 12.9501 -0.279927 18.0601 2.52007 22.0501L1.54007 23.1001C1.33007 23.3101 1.33007 23.6601 1.54007 23.8701C1.61007 23.9401 1.75007 24.0101 1.96007 24.0101H4.69007C4.97007 24.0101 5.25007 23.8001 5.25007 23.4501V20.7201C5.25007 20.4401 5.04007 20.1601 4.69007 20.1601C4.55007 20.1601 4.41007 20.2301 4.27007 20.3001L3.36007 21.2101C-0.139927 16.1001 0.560073 9.17006 4.90007 4.83006C8.61007 1.05006 14.2801 6.01532e-05 19.1101 2.10006C19.3901 2.24006 19.7401 2.10006 19.8101 1.82006C19.9501 1.61006 19.8101 1.26006 19.5301 1.12006Z" fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_101_1368">
                                <rect width="28" height="28" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div>
                        <h4 class="shipping-support-title">{{get_phrase('14 Day Returns')}}</h4>
                        <p class="shipping-support-subtitle">{{get_phrase('Within 30 days for an exchange')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="d-flex align-items-center gap-12px">
                    <div class="circle-iconbox">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="28" viewBox="0 0 19 28" fill="none">
                            <g clip-path="url(#clip0_101_1371)">
                                <path d="M17.7151 21.3455L12.9894 19.379C12.7824 19.2938 12.6423 19.0868 12.6423 18.8615V17.8569L13.5253 17.3638C14.2804 16.9437 14.7798 16.1766 14.859 15.312V15.2877H15.3218C16.1804 15.2877 16.8747 14.5936 16.8747 13.7352V12.7793C17.0147 12.4444 17.4045 11.3668 17.4045 9.88128C17.4045 7.83562 16.5946 5.87519 15.1391 4.43227C14.5849 3.87823 13.9577 3.40944 13.2635 3.04414C13.2391 1.36377 11.5583 0 9.49391 0C7.42949 0 5.74263 1.36377 5.71827 3.04414C5.03013 3.40944 4.39679 3.87823 3.84263 4.43227C2.39936 5.87519 1.58333 7.83562 1.58942 9.88128C1.58942 11.3668 1.97917 12.4444 2.11923 12.7793V13.7352C2.11923 14.5936 2.81346 15.2877 3.67212 15.2938H4.13494V15.3181C4.2141 16.1826 4.71346 16.9498 5.46859 17.3699L6.3516 17.863V18.8676C6.3516 19.0928 6.21763 19.2998 6.00449 19.3851L1.27885 21.3516C0.505449 21.6682 0 22.4231 0 23.2694V26.4475C0 27.3059 0.694231 28 1.55288 28.0061H17.441C18.2997 28.0061 18.9939 27.312 18.9939 26.4475V23.2694C19 22.4231 18.4946 21.6682 17.7151 21.3455ZM15.8881 13.7352C15.8881 14.0457 15.6385 14.2953 15.3279 14.2953H14.9564L15.1574 12.1096H15.3279C15.6385 12.1096 15.8881 12.3592 15.8881 12.6697V13.7352ZM9.5 0.99239C10.8032 0.99239 11.8933 1.66819 12.1978 2.56925C10.45 1.96651 8.55 1.96651 6.80224 2.56925C7.10673 1.66819 8.19679 0.99239 9.5 0.99239ZM3.67212 14.2953C3.36154 14.2953 3.11186 14.0457 3.11186 13.7352V12.6758C3.11186 12.3653 3.36154 12.1157 3.67212 12.1157H3.84263L4.04359 14.3014L3.67212 14.2953ZM5.95577 16.4932C5.48686 16.2314 5.17628 15.7565 5.12756 15.2207L4.75 11.0624C5.79744 11.0502 6.84487 10.9406 7.86795 10.7275C10.5901 10.1613 12.8128 8.93151 14.2926 7.16591C14.4692 6.95282 14.4388 6.64231 14.2317 6.46575C14.0186 6.28919 13.708 6.31963 13.5314 6.52664C10.3038 10.3805 4.31763 10.0639 4.23237 10.0578C3.95833 10.0396 3.72692 10.2405 3.70256 10.5145V10.5997L3.75128 11.1172H3.67212C3.33718 11.1172 3.01442 11.2268 2.74647 11.4277C2.63686 10.9163 2.58205 10.3988 2.58205 9.88128C2.58205 8.09741 3.28846 6.38661 4.55513 5.13242C5.85224 3.82953 7.61218 3.11111 9.5 3.11111C11.3878 3.11111 13.1478 3.82953 14.4449 5.13242C15.7115 6.39269 16.4179 8.09741 16.4179 9.88128C16.4179 10.3988 16.3631 10.9224 16.2535 11.4277C15.9856 11.2268 15.6628 11.1172 15.3279 11.1172H15.2426L15.2913 10.5997C15.3035 10.4536 15.2548 10.3075 15.1452 10.204L14.0856 9.1446C13.8846 8.95586 13.574 8.96804 13.3853 9.16895C13.2087 9.35769 13.2087 9.65601 13.3853 9.85084L14.2804 10.7458L13.9272 14.6362C13.5192 14.9954 12.2343 15.8904 9.5 15.8904C9.22596 15.8965 9.00673 16.1157 9.00673 16.3897C9.00673 16.6575 9.22596 16.8767 9.5 16.8828C11.4 16.8828 12.7032 16.4871 13.5436 16.067C13.4096 16.2435 13.2391 16.3897 13.0442 16.4992L10.2856 18.0335C9.7984 18.3075 9.2016 18.3075 8.70833 18.0335L5.95577 16.4932ZM6.38814 20.2922C6.96667 20.0487 7.34423 19.4825 7.34423 18.8554V18.4049L8.22724 18.8919C9.01891 19.3364 9.98109 19.3364 10.7667 18.8919L11.6497 18.4049V18.8554C11.6497 19.4825 12.0272 20.0487 12.6058 20.2922L13.1295 20.5114C12.1978 21.5951 11.2965 22.1309 10.6875 22.3927C10.0115 22.6849 9.54872 22.7093 9.5 22.7093C9.45128 22.7093 8.98846 22.6849 8.3125 22.3927C7.70353 22.1309 6.80224 21.5951 5.87051 20.5114L6.38814 20.2922ZM3.17885 27.0076H1.55288C1.24231 27.0076 0.992628 26.758 0.992628 26.4475V23.2694C0.992628 23.1355 1.01699 23.0015 1.06571 22.8798L2.77083 24.2435C3.03269 24.4505 3.17885 24.7671 3.17885 25.0959V27.0076ZM14.8285 25.0898V27.0076H4.17147V25.0898C4.17147 24.4566 3.88526 23.8539 3.3859 23.4642L1.80865 22.204L4.90833 20.9132C6.54647 22.9346 8.1968 23.4947 9.00064 23.6469V25.3272C9.00064 25.6012 9.22596 25.8265 9.5 25.8265C9.77404 25.8265 9.99936 25.6012 9.99936 25.3272V23.6469C10.8032 23.4947 12.4535 22.9346 14.0917 20.9132L17.1913 22.204L15.6141 23.4642C15.1147 23.8539 14.8285 24.4566 14.8285 25.0898ZM18.0074 26.4475C18.0074 26.758 17.7577 27.0076 17.4471 27.0076H15.8272V25.0898C15.8272 24.7549 15.9795 24.4444 16.2353 24.2374L17.9404 22.8737C17.9891 23.0015 18.0135 23.1294 18.0135 23.2633L18.0074 26.4475ZM8.88494 12.4627C8.64744 11.9696 8.075 11.653 7.42949 11.653C6.78397 11.653 6.21154 11.9696 5.97404 12.4627C5.85224 12.7062 5.95577 13.0046 6.19936 13.1263C6.44295 13.2481 6.74135 13.1446 6.86314 12.9011C6.86314 12.9011 6.86314 12.895 6.86923 12.895C6.93013 12.7732 7.14327 12.6454 7.42949 12.6454C7.7157 12.6454 7.93494 12.7732 7.98974 12.895C8.10545 13.1446 8.40385 13.2481 8.64744 13.1324C8.89712 13.0167 9.00064 12.7184 8.88494 12.4749C8.89103 12.4688 8.89103 12.4627 8.88494 12.4627ZM13.026 12.4627C12.7885 11.9696 12.216 11.653 11.5705 11.653C10.925 11.653 10.3526 11.9696 10.1151 12.4627C9.99327 12.7062 10.0968 13.0046 10.3404 13.1263C10.584 13.2481 10.8824 13.1446 11.0042 12.9011C11.0042 12.9011 11.0042 12.895 11.0103 12.895C11.0712 12.7732 11.2843 12.6454 11.5705 12.6454C11.8567 12.6454 12.076 12.7732 12.1308 12.895C12.2465 13.1446 12.5449 13.2481 12.7946 13.1324C13.0442 13.0167 13.1478 12.7184 13.026 12.4627Z" fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_101_1371">
                                <rect width="19" height="28" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div>
                        <h4 class="shipping-support-title">{{get_phrase('Premium Support')}}</h4>
                        <p class="shipping-support-subtitle">{{get_phrase('Outstanding premium support')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shipping Support Area End -->