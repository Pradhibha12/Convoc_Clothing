<style>
 .product-card-banner-slide {
	height: 250px;
}
</style>

<!-- Swiper -->
<div class="swiper products-slider">
    <div class="swiper-wrapper">
             
            @foreach ($product->related_products()->where('status', 1)->take(30)->get() as $related_product)
                <a href="{{ route('product', $related_product->slug) }}" class="product-card swiper-slide">
                    <div class="product-card-inner">
                        @php
                            $thumbnails = json_decode($related_product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                        <div class="product-card-content">
                            <div class="pc-stars-ratings">
                                <div class=" d-flex align-items-center">
                                        @php
                                            $rating = $related_product->average_rating;
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
                                <p>({{ number_format($related_product->average_rating, 1) }})</p>
                            </div>
                            <h3 class="product-card-title">{{ \Illuminate\Support\Str::limit($related_product->title, 30, '...') }}</h3>
                            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    @if ($related_product->is_discounted()->exists())
                                        @if ($related_product->is_discounted->discount_type == 'flat')
                                            <div class="d-flex align-items-baseline gap-2">
                                                <h6 class="card-product-price">  {{ currency($related_product->price - $related_product->is_discounted->discount_value) }} </h6>
                                                <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                            </div>
                                        @else
                                            @php
                                                $discount_amount = $related_product->price * ($related_product->is_discounted->discount_value / 100);
                                            @endphp
                                            <div class="d-flex align-items-baseline gap-2">
                                                <h6 class="card-product-price"> {{ currency($related_product->price - $discount_amount) }}  </h6>
                                                    <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                            </div>
                                            
                                        @endif
                                    @else
                                            <h6 class="card-product-price">{{ currency($related_product->price) }}</h6>
                                    @endif
                                <p  class="btn sm-btn-outline-white">{{get_phrase('Shop Now')}}</p>
                            </div>
                        </div>
                    </div>
                </a>
             @endforeach
    </div>
</div>