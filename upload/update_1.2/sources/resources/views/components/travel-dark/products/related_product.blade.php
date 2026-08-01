<style>
 .product-card-banner-slide {
	height: 250px;
}
</style>

<!-- Swiper -->
<div class="swiper products-slider">
    <div class="swiper-wrapper">
           
            @foreach ($product->related_products()->where('status', 1)->take(30)->get() as $related_product)
                <div class="tr-tranding-card swiper-slide">
                    <div class="tr-tranding-image">
                        <div class="tr-title d-flex justify-content-between">
                            <h4>{{ $related_product->title}}</h4>
                           <span  class="product-card-wishlist {{ wishlist_class($related_product->id) }}" 
                                onclick="toggleWishlist({{ $related_product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49509C13.0949 3.48589 14.5211 2.91895 16.0098 2.91895C17.6173 2.91895 19.1519 3.58001 20.2755 4.74512C21.3911 5.90102 22.0122 7.4592 22.0122 9.07738C22.0122 10.6956 21.391 12.2539 20.2755 13.4096C19.5338 14.1786 18.7932 14.9649 18.0487 15.7554C16.5366 17.361 15.0084 18.9837 13.4208 20.5126L13.4171 20.5161C12.5984 21.293 11.3019 21.2647 10.5181 20.4524L3.72374 13.4096C1.40898 11.0102 1.40898 7.14465 3.72374 4.74523C5.98889 2.39723 9.63646 2.31385 11.9998 4.49509Z" fill="#4A4A4A"/>
                            </svg>
                            </span>
                        </div>
                        @php
                            $thumbnails = json_decode($related_product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img src="{{ get_image($firstImage) }}" alt="image">
                    </div>
                    <div class="tr-tranding-bottom">
                        <div class="tr-price">
                            
                                @if ($related_product->is_discounted()->exists())
                                    @if ($related_product->is_discounted->discount_type == 'flat')
                                        <div class="d-flex justify-content-center align-items-baseline gap-2">
                                            <h6 class="newPrice">  {{ currency($related_product->price - $related_product->is_discounted->discount_value) }} </h6>
                                            <h6 class="delPrice fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                        </div>
                                    @else
                                        @php
                                            $discount_amount = $related_product->price * ($related_product->is_discounted->discount_value / 100);
                                        @endphp
                                        <div class="d-flex justify-content-center align-items-baseline gap-2">
                                            <h6 class="newPrice"> {{ currency($related_product->price - $discount_amount) }}  </h6>
                                                <h6 class="delPrice fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                        </div>
                                        
                                    @endif
                                @else
                                        <h6 class="newPrice">{{ currency($related_product->price) }}</h6>
                                @endif
                        </div>
                        <div class="tr-review">
                            <ul class="d-flex align-items-center">
                                    @php
                                    $rating = $related_product->average_rating;
                                    $fullStars = floor($rating); // full stars count
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                @endphp
                                @for($i = 0; $i < $fullStars; $i++)
                                    <li><img src="{{ asset('assets/frontend/travel-dark/images/rating1.svg') }}" alt=""></li>
                                @endfor
                                    @for($i = 0; $i < $emptyStars; $i++)
                                    <li><img src="{{ asset('assets/frontend/travel-dark/images/rating2.svg') }}" alt=""></li>
                                @endfor
                            </ul>
                            <p>{{ number_format($related_product->average_rating, 1) }}</p>
                        </div>
                    </div>
                        <a href="{{ route('product', $related_product->slug) }}" class="tr-white-btn-large w-100 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M26.6972 30.322C27.9107 30.322 28.8944 29.3415 28.8944 28.132C28.8944 26.9225 27.9107 25.9419 26.6972 25.9419C25.4838 25.9419 24.5 26.9225 24.5 28.132C24.5 29.3415 25.4838 30.322 26.6972 30.322Z" fill="black" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0488 30.322C13.2622 30.322 14.246 29.3415 14.246 28.132C14.246 26.9225 13.2622 25.9419 12.0488 25.9419C10.8353 25.9419 9.85156 26.9225 9.85156 28.132C9.85156 29.3415 10.8353 30.322 12.0488 30.322Z" fill="black" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.4579 4.04117H30.3596L27.43 20.1016H8.38752L5.4579 4.04117ZM5.4579 4.04117C5.21376 3.06781 3.99309 1.12109 1.06348 1.12109" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M27.43 20.1011H8.38753H5.79595C3.18228 20.1011 1.7959 21.2417 1.7959 23.0212C1.7959 24.8007 3.18228 25.9412 5.79595 25.9412H26.6976" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>{{get_phrase('Shop Now')}}</a>
                </div>
             @endforeach
    </div>
</div>