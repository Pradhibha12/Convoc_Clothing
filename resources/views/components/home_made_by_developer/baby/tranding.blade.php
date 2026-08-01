{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Start Trending Products Section  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <p class="section-sm-title mb-30px wow animate__fadeInUp builder-editable" builder-identity="BNT1" data-wow-delay=".1s"><span class="line"></span>{{get_phrase('Trending Products')}}<span class="line"></span></p>
                        <div class="tp-section-title-wrap">
                            <div class="tp-section-title-left">
                                <h2 class="section-title wow animate__fadeInUp builder-editable" builder-identity="BNT2" data-wow-delay=".2s">{{get_phrase('Our most-loved products by moms & dads everywhere!')}}</h2>
                            </div>
                            <div class="tp-section-title-right">
                                <p class="section-subtitle wow animate__fadeInUp builder-editable" builder-identity="BNT3" data-wow-delay=".3s">{{get_phrase('Discover the top picks trusted by thousands of happy parents. These bestsellers are flying off the shelves—for good reason!')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 trending-products-wrap wow animate__fadeInUp" data-wow-delay=".4s">
               @php 
               use Illuminate\Support\Facades\DB;
                $trendyProducts = App\Models\Product::select(
                            'products.*',
                            DB::raw('COUNT(reviews.id) as review_count'),
                            DB::raw('AVG(reviews.rating) as avg_rating')
                        )
                        ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                        ->where('products.status', 1)
                        ->groupBy('products.id')
                        ->orderByDesc('review_count')
                        ->take(4)
                        ->get();
               @endphp
                @foreach($trendyProducts as $product)
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <a href="{{ route('product', $product->slug) }}" class="product-card">
                        <div class="product-card-banner">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                        </div>
                        <div>
                            <h4 class="product-card-title">{{$product->title}}</h4>
                            <p class="product-card-category capitalize">{{$product->quality_label}}</p>
                            <div class="pc-price-rating-wrap">
                                
                                  @if ($product->is_discounted()->exists())
                                    @if ($product->is_discounted->discount_type == 'flat')
                                        <div class="d-flex align-items-baseline gap-2">
                                            <h6 class="product-card-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                            <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                        </div>
                                    @else
                                        @php
                                            $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                        @endphp
                                        <div class="d-flex align-items-baseline gap-2">
                                            <h6 class="product-card-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                        </div>
                                        
                                    @endif
                                @else
                                        <h6 class="product-card-price">{{ currency($product->price) }}</h6>
                                @endif
                                <div class="pc-rating-wrap">
                                    <div class="pc-stars">
                                              @php
                                                $rating = $product->average_rating;
                                                $fullStars = floor($rating); // full stars count
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                            @endphp
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.87419 1.37819L10.8921 5.67108L15.5986 6.25785C16.0344 6.314 16.3532 6.71613 16.2972 7.15215C16.269 7.36466 16.1629 7.54887 16.0119 7.67781L12.586 10.8861L13.4802 15.5477C13.5638 15.9837 13.279 16.4029 12.8428 16.4867C12.6529 16.5201 12.4629 16.4867 12.3063 16.3973L8.14748 14.1113L3.99475 16.3973C3.60363 16.6152 3.11729 16.47 2.905 16.0842C2.80976 15.911 2.78752 15.7208 2.82121 15.5477L3.70968 10.8861L0.250176 7.63851C-0.0688001 7.33659 -0.0856451 6.82821 0.21627 6.50945C0.350383 6.36411 0.524016 6.28593 0.702617 6.26347V6.25785L5.40886 5.67108L7.42659 1.37819C7.61125 0.975855 8.08657 0.808268 8.4887 0.9927C8.66751 1.07649 8.79623 1.21622 8.87419 1.37819Z"
                                                        fill="#FFD23C"/>
                                                </svg>
                                            </div>
                                       </div>
                                    <p class="pc-total-rating">({{ number_format($product->average_rating, 1) }})</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn ba-btn-outline-dark">
                            <span class="builder-editable" builder-identity="BNT4">{{get_phrase('View All Products')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                <path d="M2.4375 1.14179C2.40683 1.65843 2.76563 2.08629 3.23896 2.09728L7.5956 2.19832L0.712227 9.10554C0.355865 9.46313 0.320697 10.0555 0.633679 10.4287C0.946662 10.8018 1.48931 10.8144 1.84567 10.4568L8.72918 3.54946L8.44686 8.30581C8.41615 8.8225 8.775 9.25031 9.24832 9.2613C9.72164 9.27228 10.1302 8.86233 10.1609 8.3456L10.5772 1.33062C10.592 1.08244 10.5158 0.842404 10.3655 0.663225C10.2152 0.484047 10.0031 0.380413 9.77577 0.375137L3.35 0.226058C2.87672 0.215115 2.46817 0.625067 2.4375 1.14179Z" fill="black"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Products Section  -->