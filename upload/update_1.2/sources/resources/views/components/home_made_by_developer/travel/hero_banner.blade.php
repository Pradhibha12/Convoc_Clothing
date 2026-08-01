{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Banner  Area Start -->
<section class="banner-area overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-left position-relative wow animate__fadeInUp" data-wow-delay=".1s">
                    <figure class="mb-0">
                        @php 
                            $reviews = App\Models\Review::where('rating', 5)->latest()->get(); 
                        @endphp
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
                            <h1 class="builder-editable" builder-identity="TB1"><span>{{get_phrase('Gear Up')}} </span> {{get_phrase('for Every Journey!')}}</h1>
                            <p class="builder-editable" builder-identity="TB2">{{get_phrase('Explore durable, smart, and eco-conscious travel essentials built for every adventure.')}}
                            </p>
                            <div class="banner-btn">
                                <a href="{{route('all_products')}}" class="tr-tomato-btn builder-editable" builder-identity="TB3">{{get_phrase('Shop Now!')}}</a>
                            </div>
                            <span class="vector_bottom vector"><img src="{{ asset('assets/frontend/travel/images/vector2.png') }}"
                                    alt=""></span>
                        </div>
                        <div class="figure-bottom-slider swiper product-slider product-slider2">
                            <div class="swiper-wrapper ">
                                <!-- Swiper Slider -->
                                 @php 
                                    $topProducts = App\Models\Product::where('status', 1)->inRandomOrder()->take(3)->get();
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
                                        @if ($product->is_discounted()->exists())
                                            @if ($product->is_discounted->discount_type == 'flat')
                                                <div class="d-flex  align-items-baseline gap-2">
                                                    <h6 class="slide-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                    <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                </div>
                                            @else
                                                @php
                                                    $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                                @endphp
                                                <div class="d-flex  align-items-baseline gap-2">
                                                    <h6 class="slide-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                        <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                </div>
                                                
                                            @endif
                                        @else
                                                <h6 class="slide-price">{{ currency($product->price) }}</h6>
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
                    <img class="builder-editable" builder-identity="TB4" src="{{ asset('assets/frontend/travel/images/banner.png') }}" alt="Banner image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner  Area End -->