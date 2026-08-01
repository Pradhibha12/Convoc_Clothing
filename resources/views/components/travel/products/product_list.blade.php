<style>
    .list{
        padding: 0px;
        border-radius: 5px;
    }
.list .product-card {
	background-color: transparent !important;
    border-radius: 0;
    
}
.list .product-card-title {
	max-width: 100%;
	font-size: 25px;
	line-height: 52px;
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
.list .tr-tomato-btn{
    padding: 9px 22px;
}
</style>
<div class="col-12 list tr-tranding-image">
    <div class="d-block product-list-view">
        <div class="d-flex  gap-4 flex-column flex-md-row">
            <div class="product-list-banner tr-tranding-image">
                @php
                    $thumbnails = json_decode($product->thumbnail, true);
                    $firstImage = $thumbnails[0] ?? null;
                @endphp
                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                <div class="pc-banner-icons">
                    <a href="javascript:;"  class="product-card-wishlist {{ wishlist_class($product->id) }}" 
                onclick="toggleWishlist({{ $product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}" aria-describedby="tooltip276572">
                        <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                             <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.12158 8.25441C8.09142 7.28486 9.40664 6.74019 10.778 6.74019C12.1494 6.74019 13.4646 7.28486 14.4344 8.25441L15.9497 9.76844L17.4651 8.25441C17.9421 7.76045 18.5128 7.36646 19.1438 7.09541C19.7748 6.82437 20.4534 6.6817 21.1401 6.67573C21.8268 6.66977 22.5078 6.80062 23.1434 7.06066C23.779 7.3207 24.3564 7.70472 24.842 8.1903C25.3276 8.67589 25.7116 9.25333 25.9716 9.88892C26.2317 10.5245 26.3625 11.2055 26.3566 11.8922C26.3506 12.5789 26.2079 13.2576 25.9369 13.8885C25.6658 14.5195 25.2718 15.0902 24.7779 15.5672L15.9497 24.3967L7.12158 15.5672C6.15202 14.5974 5.60736 13.2822 5.60736 11.9108C5.60736 10.5395 6.15202 9.22425 7.12158 8.25441Z" fill="black"/>
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
                                        <div class="pc-star">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                            </svg>
                                        </div>
                                    @endfor
                                </div>

                                <p class="pc-rating-average ms-1">{{ number_format($product->average_rating, 1) }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-2 flex-wrap">
                                @if ($product->is_discounted()->exists())
                                    @if ($product->is_discounted->discount_type == 'flat')
                                        <div class="d-flex justify-content-center align-items-baseline gap-2">
                                            <h6 class="card-product-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                            <h6 class="delPrice fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                        </div>
                                    @else
                                        @php
                                            $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                        @endphp
                                        <div class="d-flex justify-content-center align-items-baseline gap-2">
                                            <h6 class="card-product-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                <h6 class="delPrice fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                        </div>
                                        
                                    @endif
                                @else
                                        <h6 class="card-product-price">{{ currency($product->price) }}</h6>
                                @endif
                            </div>
                            <a href="{{ route('product', $product->slug) }}" class="tr-tomato-btn btn  mt-3">
                            <svg width="24" class="me-2" height="24" viewBox="0 0 32 32" fill="none"
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
                            </svg>{{get_phrase('Shop Now')}}</a>
                    </div>

                </div>
                  
                 
                
            </div>
        </div>
    </div>
</div>