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
.list .tr-white-btn-large {
  padding: 10px 30px;
  gap: 4.5px;
}
.list .tr-white-btn-large svg{
    height: 20px;
}
.list .card-product-price{
    font-size: 20px;
}
 .list .product-list-banner{
        border-radius: 0 ;
    }
</style>
<div class="col-12 list">
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
                                onclick="toggleWishlist({{ $product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                        <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49509C13.0949 3.48589 14.5211 2.91895 16.0098 2.91895C17.6173 2.91895 19.1519 3.58001 20.2755 4.74512C21.3911 5.90102 22.0122 7.4592 22.0122 9.07738C22.0122 10.6956 21.391 12.2539 20.2755 13.4096C19.5338 14.1786 18.7932 14.9649 18.0487 15.7554C16.5366 17.361 15.0084 18.9837 13.4208 20.5126L13.4171 20.5161C12.5984 21.293 11.3019 21.2647 10.5181 20.4524L3.72374 13.4096C1.40898 11.0102 1.40898 7.14465 3.72374 4.74523C5.98889 2.39723 9.63646 2.31385 11.9998 4.49509Z" fill="#4A4A4A"/>
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
                            <a href="{{ route('product', $product->slug) }}" class="tr-white-btn-large btn wc-btn-dark mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path d="M26.6972 30.322C27.9107 30.322 28.8944 29.3415 28.8944 28.132C28.8944 26.9225 27.9107 25.9419 26.6972 25.9419C25.4838 25.9419 24.5 26.9225 24.5 28.132C24.5 29.3415 25.4838 30.322 26.6972 30.322Z" fill="black" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.0488 30.322C13.2622 30.322 14.246 29.3415 14.246 28.132C14.246 26.9225 13.2622 25.9419 12.0488 25.9419C10.8353 25.9419 9.85156 26.9225 9.85156 28.132C9.85156 29.3415 10.8353 30.322 12.0488 30.322Z" fill="black" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.4579 4.04117H30.3596L27.43 20.1016H8.38752L5.4579 4.04117ZM5.4579 4.04117C5.21376 3.06781 3.99309 1.12109 1.06348 1.12109" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27.43 20.1011H8.38753H5.79595C3.18228 20.1011 1.7959 21.2417 1.7959 23.0212C1.7959 24.8007 3.18228 25.9412 5.79595 25.9412H26.6976" stroke="black" stroke-width="1.7758" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>{{get_phrase('Shop Now')}}</a>
                    </div>

                </div>
                  
                 
                
            </div>
        </div>
    </div>
</div>