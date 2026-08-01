<!-- Banner  Area Start -->
<section class="banner-area overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-left position-relative wow animate__fadeInUp" data-wow-delay=".1s">
                    <figure class="mb-0">
                        <div class="figure-top">
                            <div class="figure-image d-flex">
                                @foreach($reviews->take(3) as $review)
                                   <img src="{{ get_image($review->user->photo) }}" alt="">
                                @endforeach
                            </div>
                            <div class="rating-icon">
                                  @php
                                    $reviewCount = App\Models\Product::avg('average_rating');
                                    $reviewCount = round($reviewCount, 1); 
                                    $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 
                                @endphp
                                <ul class="d-flex">
                                    @for($i = 1; $i <=5; $i++)
                                    <li>
                                        <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_28_70)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.7164 1.55974L14.2837 7.02112L20.2712 7.7676C20.8256 7.83903 21.2312 8.35062 21.16 8.90532C21.124 9.17567 20.989 9.41003 20.797 9.57406L16.4385 13.6557L17.5762 19.5861C17.6825 20.1408 17.3201 20.6741 16.7652 20.7807C16.5236 20.8232 16.2819 20.7807 16.0828 20.6669L10.7919 17.7587L5.50884 20.6669C5.01127 20.9441 4.39255 20.7595 4.12247 20.2686C4.00131 20.0482 3.97301 19.8063 4.01587 19.5861L5.14618 13.6557L0.74503 9.52406C0.339231 9.13996 0.317801 8.4932 0.701895 8.08768C0.872512 7.90278 1.09341 7.80332 1.32062 7.77475V7.7676L7.30787 7.02112L9.87481 1.55974C10.1097 1.04789 10.7144 0.834683 11.226 1.06932C11.4535 1.17592 11.6172 1.35368 11.7164 1.55974Z"
                                                    fill="url(#paint0_linear_28_70)" />
                                            </g>
                                            <defs>
                                                <linearGradient id="paint0_linear_28_70" x1="0.426758" y1="0.974243"
                                                    x2="0.426758" y2="20.7969" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFC400" />
                                                    <stop offset="1" stop-color="#FF9F00" />
                                                </linearGradient>
                                                <clipPath id="clip0_28_70">
                                                    <rect width="21.9343" height="20.4721" fill="white"
                                                        transform="translate(0.426758 0.974243)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </li>
                                    @endfor
                                </ul>
                                <p>{{ $totalRatings }} + {{get_phrase('Happy Clients Served!')}}</p>
                            </div>
                        </div>
                        <div class="figure-middle position-relative">
                            <h1><span>{{get_phrase('Gear Up')}} </span> {{get_phrase('for Every Journey!')}}</h1>
                            <p>{{get_phrase('Explore durable, smart, and eco-conscious travel essentials built for every adventure.')}}
                            </p>
                            <div class="banner-btn">
                                <a href="{{route('all_products')}}" class="tr-tomato-btn">{{get_phrase('Shop Now!')}}</a>
                            </div>
                            <span class="vector_bottom vector"><img src="{{ asset('assets/frontend/travel/images/vector2.png') }}"
                                    alt=""></span>
                        </div>
                        <div class="figure-bottom-slider swiper product-slider product-slider2">
                            <div class="swiper-wrapper ">
                                <!-- Swiper Slider -->
                                 @php 
                                    $topProducts = App\Models\Product::where('status', 1)->where('label', 'top-seller')->inRandomOrder()->take(3)->get();
                                @endphp
                                @foreach($topProducts as $product)
                                <div class="figure-slide swiper-slide">
                                    <div class="figure-left-image">
                                        @php
                                            $thumbnails = json_decode($product->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <img src="{{ get_image($firstImage) }}" alt="">
                                    </div>
                                    <div class="figure-slider-right  ">
                                        @php
                                            $rating = $product->average_rating;
                                            $fullStars = floor($rating); // full stars count
                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                        @endphp
                                        <div class="d-flex">
                                            <ul>
                                                @for($i = 0; $i < $fullStars; $i++)
                                                <li><img src="{{ asset('assets/frontend/travel/images/rating_tomato.svg') }}" alt=""></li>
                                                @endfor
                                                @for($i = 0; $i < $emptyStars; $i++)
                                                <li><img src="{{ asset('assets/frontend/travel/images/rating_white.svg') }}" alt=""></li>
                                                @endfor
                                            </ul>
                                            <p>({{ number_format($product->average_rating, 1) }})</p>
                                        </div>
                                        <h4>{{ \Illuminate\Support\Str::limit($product->title, 50, '...') }}</h4>
                                        @if ($product->is_discounted)
                                        @php
                                            $discount = $product->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                           <p class="slide-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</p>
                                        @else
                                           <p class="slide-price">{{ currency($product->price) }}</p>
                                        @endif
                                        @else
                                         <p class="slide-price">{{ currency($product->price) }}</p>
                                        @endif
                                        <a href="{{ route('product', $product->slug) }}" class="tr-black-btn-small">{{get_phrase('Shop Now')}}</a>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Swiper Slider -->
                                
                            </div>
                        </div>
                        <span class="vector_top vector"><img src="{{ asset('assets/frontend/travel/images/vector1.png') }}" alt=""></span>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-right-image wow animate__fadeInRight" data-wow-delay=".1s">
                    <img src="{{ asset('assets/frontend/travel/images/banner.png') }}" alt="Banner image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner  Area End -->


<!-- Category Area Start -->
<section class="category-area position-relative">
    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector3.png') }}" alt="vector"></span>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="tr-section wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block">{{get_phrase('Shop by Category')}}</span>
                    <h2 class="mb-2">{{get_phrase('Essential Gear for Every Kind of Traveler.')}}</h2>
                    <p>{{get_phrase('Explore durable, smart, and eco-conscious travel essentials built for every adventure.')}}</p>
                </div>
            </div>
        </div>
        <div class="row  wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-lg-12">
                <div class="category-gallary overflow-hidden">
                    @php
                        $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(6)->get();
                    @endphp
                     @if($categories->count())
                    <div class="itemBox d-flex">
                        @php $first = $categories->first(); @endphp
                        <a href="{{ route('products', get_category_params($first)) }}" class="itemLeft items ">
                            <div class="cate-save-icon">
                                <span><img src="{{ asset('assets/frontend/travel/images/line.svg') }}" alt=""></span>
                            </div>
                            <img class="cate-image" src="{{ get_image($first->thumbnail) }}" alt="category image">
                            <div class="item-content">
                                <span class="cat-icon">
                                    <img src="{{ get_image($first->icon) }}" alt="">
                                </span>
                                <h4>{{ $first->title }}</h4>
                                <span class="tr-black-btn-small ">{{get_phrase('Shop Now')}}</span>
                            </div>
                        </a>
                        <div class="itemRight ">
                            <div class="tr-item-top d-flex">
                                @foreach($categories->skip(1)->take(2) as $cat)
                                <a href="{{ route('products', get_category_params($cat)) }}" class="item{{ $loop->iteration + 1 }} items">
                                    <div class="cate-save-icon">
                                        <span><img src="{{ asset('assets/frontend/travel/images/line.svg') }}" alt=""></span>
                                    </div>
                                    <img class="cate-image" src="{{ get_image($cat->thumbnail) }}" alt="category image">
                                    <div class="item-content">
                                        <span class="cat-icon">
                                            <img src="{{ get_image($first->icon) }}" alt="">
                                        </span>
                                        <h4>{{ $cat->title }}</h4>
                                        <span class="tr-black-btn-small ">{{get_phrase('Shop Now')}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="tr-item-bottom d-flex">
                                @foreach($categories->skip(3)->take(3) as $cat)
                                <a href="{{ route('products', get_category_params($cat)) }}" class="item{{ $loop->iteration + 3 }} items">
                                    <div class="cate-save-icon">
                                        <span><img src="{{ asset('assets/frontend/travel/images/line.svg') }}" alt=""></span>
                                    </div>
                                    <img class="cate-image" src="{{ get_image($cat->thumbnail) }}" alt="category image">
                                    <div class="item-content">
                                        <span class="cat-icon">
                                            <img src="{{ get_image($cat->icon) }}" alt="">
                                        </span>
                                        <h4>{{ $cat->title }}</h4>
                                        <span class="tr-black-btn-small ">{{get_phrase('Shop Now')}}</span>
                                    </div>
                                </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="text-center mt-2">
                    <a href="{{route('all_products')}}" class="tr-black-btn-large mt-5">{{get_phrase('Shop Now')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category Area End -->
<!-- Tranding Products Area Start -->
<section class="tr-tranding-products bg-motion position-relative">
    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector4.png') }}" alt="vector"></span>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="tr-section wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block">{{get_phrase('Trending Products')}}</span>
                    <h2 class="mb-2">{{get_phrase('Top Picks Travelers Always Love!')}}</h2>
                    <p>{{get_phrase('Join thousands of happy travelers who swear by these must-haves. From smart luggage to compact
                        organizers.')}}</p>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-4 wow animate__fadeInUp" data-wow-delay=".1s">
            <!-- Tranding card -->
                @php
                   $trendingProducts = App\Models\Product::where('status', 1)->where('label', 'trendy')->latest()->take(6)->get();
                @endphp 
                @foreach($trendingProducts as $product)
                <div class="col-lg-4 col-md-6 col-sm-12  mb-5">
                    <div class="tr-tranding-card">
                        <div class="tr-tranding-image">
                            <div class="tr-title d-flex justify-content-between">
                                <h4>{{ \Illuminate\Support\Str::limit($product->title, 50, '...') }}</h4>
                                <span class="pc-wishlist-btn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}" aria-describedby="tooltip276572">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.12158 8.25441C8.09142 7.28486 9.40664 6.74019 10.778 6.74019C12.1494 6.74019 13.4646 7.28486 14.4344 8.25441L15.9497 9.76844L17.4651 8.25441C17.9421 7.76045 18.5128 7.36646 19.1438 7.09541C19.7748 6.82437 20.4534 6.6817 21.1401 6.67573C21.8268 6.66977 22.5078 6.80062 23.1434 7.06066C23.779 7.3207 24.3564 7.70472 24.842 8.1903C25.3276 8.67589 25.7116 9.25333 25.9716 9.88892C26.2317 10.5245 26.3625 11.2055 26.3566 11.8922C26.3506 12.5789 26.2079 13.2576 25.9369 13.8885C25.6658 14.5195 25.2718 15.0902 24.7779 15.5672L15.9497 24.3967L7.12158 15.5672C6.15202 14.5974 5.60736 13.2822 5.60736 11.9108C5.60736 10.5395 6.15202 9.22425 7.12158 8.25441Z" fill="black"/>
                                    </svg>
                                </span>
                            </div>
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img src="{{ get_image($firstImage) }}" alt="image">
                        </div>
                        <div class="tr-tranding-bottom">
                            <div class="tr-price">
                                @if ($product->is_discounted)
                                @php
                                    $discount = $product->discount;
                                @endphp
                                @if ($discount->discount_type == 'percentage')
                                     <p class="newPrice">{{ currency(($product->price / 100) * $discount->discount_value) }}</p>
                                     <p class="delPrice">{{ currency($product->price) }}</p>
                                @else
                                    <p class="newPrice">{{ currency($product->price) }}</p>
                                @endif
                                @else
                                     <p class="newPrice">{{ currency($product->price) }}</p>
                                @endif
                            </div>
                            <div class="tr-review">
                                @php
                                    $rating = $product->average_rating;
                                    $fullStars = floor($rating); // full stars count
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                @endphp
                                <ul class="d-flex">
                                     <li><img src="{{ asset('assets/frontend/travel/images/rating1.svg') }}" alt=""></li>
                                </ul>
                                <p>{{ number_format($product->average_rating, 1) }}</p>
                            </div>
                        </div>
                        <a href="{{ route('product', $product->slug) }}" class="tr-tomato-btn w-100 text-center">
                            <svg width="32" class="me-2" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.6972 30.322C27.9107 30.322 28.8944 29.3415 28.8944 28.132C28.8944 26.9225 27.9107 25.9419 26.6972 25.9419C25.4838 25.9419 24.5 26.9225 24.5 28.132C24.5 29.3415 25.4838 30.322 26.6972 30.322Z"
                                    fill="white" stroke="white" stroke-width="1.7758" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M12.0488 30.322C13.2622 30.322 14.246 29.3415 14.246 28.132C14.246 26.9225 13.2622 25.9419 12.0488 25.9419C10.8353 25.9419 9.85156 26.9225 9.85156 28.132C9.85156 29.3415 10.8353 30.322 12.0488 30.322Z"
                                    fill="white" stroke="white" stroke-width="1.7758" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M5.4579 4.04117H30.3596L27.43 20.1016H8.38752L5.4579 4.04117ZM5.4579 4.04117C5.21376 3.06781 3.99309 1.12109 1.06348 1.12109"
                                    stroke="white" stroke-width="1.7758" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M27.43 20.1011H8.38753H5.79595C3.18228 20.1011 1.7959 21.2417 1.7959 23.0212C1.7959 24.8007 3.18228 25.9412 5.79595 25.9412H26.6976"
                                    stroke="white" stroke-width="1.7758" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            {{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
             @endforeach
            <!-- Tranding card -->
            
        </div>
        <div class="text-center mt-2 wow animate__fadeInUp" data-wow-delay=".1s">
            <a href="{{route('all_products')}}" class="tr-black-btn-large mt-5">{{get_phrase('View All Products')}}</a>
        </div>
    </div>
</section>
<!-- Tranding Products Area End -->
<!-- Kit  Area Start -->
<section class="tr-kit-area overflow-hidden position-relative">
    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector3.png') }}" alt="vector"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="kit-image wow animate__fadeInLeft" data-wow-delay=".1s">
                    <img src="{{ asset('assets/frontend/travel/images/kit.png') }}" alt="image">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="tr-section wow animate__fadeInRight" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block">{{get_phrase(' All-in-One Travel Kits')}}</span>
                    <h2 class="mb-2">{{get_phrase('Curated Bundles for Every Kind of Journey!')}}</h2>
                    <ul class="tr-kit-motion">
                        <li>
                            <span><img src="{{ asset('assets/frontend/travel/images/key1.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5>{{get_phrase('Save up to 30% vs. buying individually')}}</h5>
                                <p>{{get_phrase('Save up to 30% compared to buying items individually')}}</p>
                            </div>
                        </li>
                        <li>
                            <span><img src="{{ asset('assets/frontend/travel/images/key2.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5>{{get_phrase('Curated by real travelers')}}</h5>
                                <p>{{get_phrase('Curated by real travelers for real-world needs')}}</p>
                            </div>
                        </li>
                        <li>
                            <span><img src="{{ asset('assets/frontend/travel/images/key3.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5>{{get_phrase('Perfect gift for travel lovers')}}</h5>
                                <p>{{get_phrase('Perfect gift for globetrotters and weekend explorers alike')}}</p>
                            </div>
                        </li>
                    </ul>
                    <a href="{{route('all_products')}}" class="tr-black-btn-large mt-5">{{get_phrase('Shop All Bundles')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Kit Area End -->
<!-- Trust us Area Start -->
<section class="tr-trust-area bg-motion overflow-hidden position-relative">
    <div class="trust-image wow animate__fadeInRight" data-wow-delay=".1s">
        <img src="{{ asset('assets/frontend/travel/images/image 8.png') }}" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tr-section wow animate__fadeInLeft position-relative" data-wow-delay=".1s">
                    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector5.png') }}"
                            alt="vector"></span>
                    <div class="arrow-line"></div>
                    <span class="d-block">{{get_phrase('Why Choose uS?')}}</span>
                    <h2 class="mb-2">{{get_phrase('Why Travelers Trust Us?')}}</h2>
                    <p class="description">{{get_phrase('Our gear is built to last, no matter where your journey takes you. Trusted
                        by seasoned travelers and adventure seekers worldwide, every product is designed for durability,
                        comfort, & performance')}}</p>
                    <a href="{{route('all_products')}}" class="tr-black-btn-large mt-5">{{get_phrase('Explore Products')}}</a>
                    <div class="trusted d-flex gap-2">
                        <ul class="tr-kit-motion ">
                            <li>
                                <span><img src="{{ asset('assets/frontend/travel/images/key1.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5>{{get_phrase('Durable Quality')}}</h5>
                                    <p>{{get_phrase('Built to withstand the rigors of global travel—tested for performance, comfort, &
                                        resilience.')}}</p>
                                </div>
                            </li>
                            <li>
                                <span><img src="{{ asset('assets/frontend/travel/images/key4.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5>{{get_phrase('Free Shipping')}}</h5>
                                    <p>{{get_phrase('Enjoy fast, free shipping on all domestic orders. No minimums, no hidden
                                        fees—just great gear delivered to your door.')}}</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="tr-kit-motion ">
                            <li>
                                <span><img src="{{ asset('assets/frontend/travel/images/key5.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5>{{get_phrase('Innovative Design')}}</h5>
                                    <p>{{get_phrase('From anti-theft backpacks to space-saving cubes, every product is designed to
                                        solve real travel problems.')}}</p>
                                </div>
                            </li>
                            <li>
                                <span><img src="{{ asset('assets/frontend/travel/images/key6.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5>{{get_phrase('Eco-Friendly Options')}}</h5>
                                    <p>{{get_phrase('Travel lighter with gear made from recycled and sustainable materials. Good for
                                        the planet, great for your journey.')}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</section>
<!-- Trust us Area End  -->
<!-- Testimonials Section  Start  -->
<section class="testimonials-area overflow-hidden position-relative wow animate__fadeInUp" data-wow-delay=".1s">
    <div class="tr-testimonials-image ">
        <img src="{{ asset('assets/frontend/travel/images/testimonials_bg.png') }}" alt="">
    </div>
    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector3.png') }}" alt="vector"></span>
    <span class="vector erVector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector4.png') }}" alt="vector"></span>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="tr-section wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block">{{get_phrase('Testimonials')}}</span>
                    <h2 class="mb-2">{{get_phrase('Loved by Thousands of Travelers!')}}</h2>
                    <p>{{get_phrase('Real stories. Real adventures. Real satisfaction.')}}</p>
                </div>
            </div>
            <!-- Testimonials  Slider  -->
            <div class="col-lg-2 col-md-2 col-sm-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="testimonials-slider swiper wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="swiper-wrapper">
                        <!-- Slider -->
                        @foreach($reviews as $review)
                        <div class="swiper-slide tr-slider-content">
                            <span><img src="{{ asset('assets/frontend/travel/images/testi_frame.png') }}" alt=""></span>
                            <img class="tr-sImage" src="{{ get_image($review->user->photo) }}" alt="">
                            <p>{{$review->comment}}</p>
                            <div class="userInfo">
                                <h4>{{ $review->user->name }}</h4>
                                <span>{{ $review->created_at->format('F j, Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                        <!-- Slider -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12"></div>
        </div>
    </div>
</section>
<!-- Testimonials Section  End  -->
<!-- Adventure  Section  Start  -->
<section class="adventure-area bg-motion overflow-hidden position-relative">
    <div class="container">
        <div class="row g-3 wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-lg-4 col-md-6 ">
                <div class="tr-adventure-box">
                    <div class="tr-section ">
                        <div class="arrow-line"></div>
                        <span class="d-block">{{get_phrase('Adventure Inspiration')}}</span>
                        <h2>{{get_phrase('Fuel your next great escape.')}}</h2>
                    </div>
                    <div class="position-relative">
                        <div class="tr-adventure">
                            <img src="{{ asset('assets/frontend/travel/images/ad1.png') }}" alt="">
                        </div>
                        <div class="tr-ad-motion">
                            <img src="{{ asset('assets/frontend/travel/images/instagram.png') }}" alt="...">
                            <p>{{get_phrase('Instagram')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="tr-adventure-box">
                    <div class="position-relative">
                        <div class="tr-adventure">
                            <img src="{{ asset('assets/frontend/travel/images/ad2.png') }}" alt="">
                        </div>
                        <div class="tr-ad-motion">
                            <img src="{{ asset('assets/frontend/travel/images/instagram.png') }}" alt="...">
                            <p>{{get_phrase('Instagram')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="tr-adventure-box">
                    <div class="position-relative">
                        <div class="tr-adventure">
                            <img src="{{ asset('assets/frontend/travel/images/ad3.png') }}" alt="">
                        </div>
                        <div class="tr-ad-motion">
                            <img src="{{ asset('assets/frontend/travel/images/instagram.png') }}" alt="...">
                           <p>{{get_phrase('Instagram')}}</p>
                        </div>
                    </div>
                    <div class="tr-ad-content">
                        <p>{{get_phrase('From mountain peaks to bustling city streets, our gear has been part of thousands of
                            unforgettable adventures. See how travelers around the world pack, explore, and thrive with
                            our essentials by their side.')}}</p>
                        <a href="{{route('all_products')}}" class="tr-black-btn-large">{{get_phrase('Share Your Journey')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Adventure  Section  End   -->
<!-- Promotion Section Start -->
<section class="promotion-area overflow-hidden position-relative">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="tr-promotion-left position-relative  wow animate__fadeInLeft" data-wow-delay=".1s">
                    <img src="{{ asset('assets/frontend/travel/images/promotion.png') }}" alt="">
                    <div class="tr-promo">
                        <span class="left-promo vector"><img src="{{ asset('assets/frontend/travel/images/vector3.png') }}" alt="vector"></span>
                        <span class="right-promo vector"><img src="{{ asset('assets/frontend/travel/images/vector4.png') }}" alt="vector"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="tr-section wow animate__fadeInRight" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block">{{get_phrase('Our Deals & Promotions')}}</span>
                    <h2>{{get_phrase('Big adventures start with even bigger savings.')}}</h2>
                    <p>{{get_phrase("Discover limited-time offers on your favorite travel essentials—bundles, backpacks, accessories,
                        and more. Whether you're planning a weekend escape or a world tour, now’s the perfect time to
                        gear up for less.")}}</p>
                    <a href="{{route('all_products')}}" class="tr-black-btn-large">{{get_phrase('Shop All Deals')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Promotion Section End -->
<!-- Blog Section Start -->
<section class="blog-area overflow-hidden position-relative">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center wow animate__fadeInUp" data-wow-delay=".1s">
                <div class="tr-section">
                    <div class="arrow-line"></div>
                    <span class="d-block">{{get_phrase('Blogs Posts')}}</span>
                    <h2 class="mb-2">{{get_phrase('Travel Smarter with Our Guides')}}</h2>
                    <p>{{get_phrase('Expert tips, gear reviews, and destination inspiration to help you travel lighter, smarter, and
                        better.')}}</p>
                </div>
            </div>
        </div>
        <div class="row g-3 wow animate__fadeInUp" data-wow-delay=".1s">
            @foreach($blogs->take(3) as $key=>$blog)
            @if($loop ->first)
            <div class="col-lg-12">
                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="tr-blog">
                    <div class="tr-big-image">
                        <img src="{{ get_image($blog->thumbnail) }}" alt="">
                    </div>
                    <div class="tr-blog-content">
                        <div class="blog-head">
                            <div class="d-flex">
                                <img src="{{ asset('assets/frontend/travel/images/bg-cal.svg') }}" alt="">
                                <p>{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                        </div>
                        <h4>{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</h4>
                        <div class="blog-bottom">
                            <p>{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}
                            </p>
                            <span class="tr-tomato-btn">{{get_phrase('Read Now!')}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @else
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="tr-blog">
                    <div class="tr-big-image">
                        <img src="{{ get_image($blog->thumbnail) }}" alt="">
                    </div>
                    <div class="tr-blog-content">
                        <div class="blog-head">
                            <div class="d-flex">
                                <img src="{{ asset('assets/frontend/travel/images/bg-cal.svg') }}" alt="">
                                <p>{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                        </div>
                        <h4>{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</h4>
                        <div class="blog-bottom">
                            <p>{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                            <span class="tr-tomato-btn">{{get_phrase('Read Now!')}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
        <div class="text-center mt-2 wow animate__fadeInUp" data-wow-delay=".1s">
            <a href="{{route('blog')}}" class="tr-black-btn-large mt-5">{{get_phrase('Read All Blogs')}}</a>
        </div>

    </div>
</section>
<!-- Blog Section End -->
