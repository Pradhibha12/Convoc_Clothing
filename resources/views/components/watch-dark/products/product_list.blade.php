<style>
.list .product-card {
	background-color: transparent !important;
    border-radius: 0;
    
}
.list .product-card-title {
	max-width: 100%;
	font-size: 25px;
	line-height: 52px;
}
.list:hover .product-list-view{
    filter: drop-shadow(0px 4px 22px rgba(0, 0, 0, 0.18));
    border-radius: 12px;
}
.list .product-list-banner {
	padding: 20px;
}

.list .product-card-btn{
    position: inherit;
}
.pc-banner-icons{
    position: absolute;
    right: 8px;
    top: 5px;
    background: #fff;
    padding: 9px;
    border-radius: 50%;
}
.list .tr-gradient2-btn {
  padding: 10px 30px;
  gap: 4.5px;
}
.list .tr-gradient2-btn svg{
    height: 20px;
}
.list .card-product-price{
    font-size: 20px;
}
</style>
<div class="col-12 list">
    <div class="d-block product-list-view">
        <div class="d-flex  gap-4 flex-column flex-md-row">
            <div class="product-list-banner tr-tranding-image">
                  @if ($product->is_discounted()->exists())
                        @php
                            $discount = $product->is_discounted;
                            if ($discount->discount_type === 'percentage') {
                                $discount_text = $discount->discount_value . '% OFF';
                            } else { // flat
                                $discount_text = currency($discount->discount_value) . ' FLAT';
                            }
                        @endphp
                        <p class="product-card-badge capitalize">{{ $discount_text }}</p>
                    @endif
                @php
                    $thumbnails = json_decode($product->thumbnail, true);
                    $firstImage = $thumbnails[0] ?? null;
                @endphp
                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                <div class="pc-banner-icons">
                    <a href="javascript:;" class="product-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                        <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8894 4.73164C14.0579 3.65477 15.5796 3.0498 17.1682 3.0498C18.8835 3.0498 20.5211 3.75519 21.72 4.99844C22.9104 6.23185 23.5731 7.89451 23.5731 9.62121C23.5731 11.348 22.9103 13.0107 21.72 14.244C20.9285 15.0645 20.1382 15.9036 19.3439 16.747C17.7304 18.4603 16.0996 20.1918 14.4056 21.8232L14.4017 21.827C13.5281 22.6559 12.1446 22.6258 11.3083 21.759L4.05829 14.2439C1.58832 11.6836 1.58832 7.55887 4.05829 4.99855C6.47534 2.4931 10.3675 2.40414 12.8894 4.73164Z" fill="#000000"/>
                                    </svg>
                        </span>
                    </a>
               </div>
            </div>
            
            <div class="w-100 product-card">
                <div class="d-flex align-items-start gap-3 mb-2 justify-content-between flex-column flex-md-row">
                    <div class="max-width">
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title w-100">{{ $product->title }}</a>
                        <p class="product-card-subtitle mt-1 mb-2">{{ \Illuminate\Support\Str::limit($product->summary, 90, '...') }}</p>
                        <div class="pc-stars-ratings d-flex">
                                <div class="product-card-stars d-flex">
                                   @php
                                    $rating = $product->average_rating;
                                    $fullStars = floor($rating); // full stars count
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                @endphp
                                    @for($i = 0; $i < $fullStars; $i++)    
                                <div class="pc-star-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                        <g clip-path="url(#clip0_94_3014)">
                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_94_3014">
                                            <rect width="18.7896" height="18.8007" fill="white" transform="translate(0 0.739746)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                @endfor
                                 {{-- Half Star --}}
                                @if($halfStar)
                                    <div class="pc-star-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                            <defs>
                                                <linearGradient id="halfStarGradient">
                                                    <stop offset="50%" stop-color="white" />
                                                    <stop offset="50%" stop-color="transparent" stop-opacity="0.4"/>
                                                </linearGradient>
                                                <clipPath id="clipHalfStar">
                                                    <rect width="18.7896" height="18.8007" fill="white" transform="translate(0 0.739746)"/>
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#clipHalfStar)">
                                                <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#halfStarGradient)"/>
                                            </g>
                                        </svg>
                                    </div>
                                @endif
                                @for($i = 0; $i < $emptyStars; $i++)
                                <div class="pc-star-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10.1784 4.57015L11.799 7.84851L12.0691 8.43603L12.6563 8.52416L16.2733 9.04706L13.7014 11.5734L13.261 12.0023L13.3667 12.5898L13.9833 16.1913L10.7479 14.4934L10.1784 14.2525L9.6323 14.5404L6.39697 16.2148L6.98414 12.6133L7.08984 12.0258L6.65533 11.5734L4.06001 9.01768L7.67701 8.49479L8.26419 8.40666L8.53429 7.81914L10.1784 4.57015ZM10.1784 1.91455L7.50673 7.33149L1.53516 8.19515L5.85677 12.4136L4.83508 18.3651L10.1784 15.5568L15.5217 18.3651L14.5 12.4136L18.8216 8.20103L12.85 7.33149L10.1784 1.91455Z" fill="white"/>
                                    </svg>
                                </div>
                                @endfor
                                </div>

                                <p class="pc-rating-average ms-1">{{ number_format($product->average_rating, 1) }} ( {{ $product->reviews->count() }})</p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-2 flex-wrap">
                                @if ($product->is_discounted()->exists())
                                    @if ($product->is_discounted->discount_type == 'flat')
                                        <div class="d-flex align-items-baseline gap-2">
                                            <h6 class="pc-new-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                            <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                                        </div>
                                    @else
                                        @php
                                            $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                        @endphp
                                        <div class="d-flex align-items-baseline gap-2">
                                            <h6 class="pc-new-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                                        </div>
                                        
                                    @endif
                                @else
                                        <h6 class="pc-new-price">{{ currency($product->price) }}</h6>
                                @endif
                            </div>
                            <a href="{{ route('product', $product->slug) }}" class="btn wch-sm2-btn-white mt-3">{{get_phrase('Shop Now')}}</a>
                    </div>

                </div>
                  
                 
                
            </div>
        </div>
    </div>
</div>