{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

   <!-- Start New Arrivals Section  -->
    <section class="section-mb new-arrivals-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="na-section-title-area">
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <p class="section-sm-title mb-30px builder-editable" builder-identity="BNE1"><span class="line"></span>{{get_phrase('New Arrivals')}}<span class="line"></span></p>
                        </div>
                        <h2 class="section-title text-center max-w-690px mx-auto mb-3 wow animate__fadeInUp builder-editable" builder-identity="BNE2" data-wow-delay=".2s">{{get_phrase('Fresh finds for your little one')}}</h2>
                        <p class="section-subtitle max-w-682px mx-auto text-center mb-36px wow animate__fadeInUp builder-editable" builder-identity="BNE3" data-wow-delay=".3s">{{get_phrase('Explore the newest baby essentials loved by parents and little ones alike.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ba-btn-outline-dark">
                                <span class="builder-editable" builder-identity="BNE4">{{get_phrase('View All Products')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                    <path d="M2.4375 1.14179C2.40683 1.65843 2.76563 2.08629 3.23896 2.09728L7.5956 2.19832L0.712227 9.10554C0.355865 9.46313 0.320697 10.0555 0.633679 10.4287C0.946662 10.8018 1.48931 10.8144 1.84567 10.4568L8.72918 3.54946L8.44686 8.30581C8.41615 8.8225 8.775 9.25031 9.24832 9.2613C9.72164 9.27228 10.1302 8.86233 10.1609 8.3456L10.5772 1.33062C10.592 1.08244 10.5158 0.842404 10.3655 0.663225C10.2152 0.484047 10.0031 0.380413 9.77577 0.375137L3.35 0.226058C2.87672 0.215115 2.46817 0.625067 2.4375 1.14179Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 wow animate__fadeInUp" data-wow-delay=".4s">
                @php 
                $popular_products = App\Models\Product::where('status', 1)->latest()->take(4)->get();
            @endphp
                @foreach($popular_products as $product)
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
                                
                                 @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                        <h4 class="product-card-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                    @else
                                        <h4 class="product-card-price">{{ currency($product->price) }}</h4>
                                    @endif
                                @else
                                   <h4 class="product-card-price">{{ currency($product->price) }}</h4>
                                @endif
                                 <div class="pc-stars-ratings d-flex">
                                     <div class=" d-flex align-items-center">
                                            @php
                                                $rating = $product->average_rating;
                                                $fullStars = floor($rating); // full stars count
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                            @endphp
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#FFD23C"/>
                                                </svg>
                                            </div>
                                      </div>
                                    <p>({{ number_format($product->average_rating, 1) }})</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End New Arrivals Section  -->