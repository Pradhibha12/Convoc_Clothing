
@php
   $layout = $layout == 'sm' ? 'md' : $layout;
@endphp
<style>
    .layout_lg   .product-card-title {
	font-size: 22px;
}
    .layout_md .product-card-title,
    .layout_sm .product-card-title {
	font-size: 18px;
    }
    .layout_md  .pc-new-price,
    .layout_sm  .pc-new-price {
	font-size: 16px;
}
 .layout_lg  .pc-new-price {
	font-size: 20px;
}

</style>
 <!-- Slider -->
<div class="swiper-slide layout_{{$layout}}">
    <div class="product-card">
        <div class="product-card-banner-area">
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
            <a href="javascript:;"  class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                <span class="product-card-bookmark-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8894 4.73164C14.0579 3.65477 15.5796 3.0498 17.1682 3.0498C18.8835 3.0498 20.5211 3.75519 21.72 4.99844C22.9104 6.23185 23.5731 7.89451 23.5731 9.62121C23.5731 11.348 22.9103 13.0107 21.72 14.244C20.9285 15.0645 20.1382 15.9036 19.3439 16.747C17.7304 18.4603 16.0996 20.1918 14.4056 21.8232L14.4017 21.827C13.5281 22.6559 12.1446 22.6258 11.3083 21.759L4.05829 14.2439C1.58832 11.6836 1.58832 7.55887 4.05829 4.99855C6.47534 2.4931 10.3675 2.40414 12.8894 4.73164Z" fill="#26262F"/>
                    </svg>
                </span>
            </a>
            <!-- Swiper -->
            <div class="pc-inner-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-card-banner-slide position-relative">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="category">

                             <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn wch-sm-btn-black">{{get_phrase('Add To Cart')}}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-card-body">
            <div class="d-flex align-items-center gap-2 mb-12px flex-wrap">
                    <div class="pc-star-rating d-flex">
                        @php
                            $rating = $product->average_rating;
                            $fullStars = floor($rating); // full stars count
                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                            $emptyStars = 5 - ($fullStars + $halfStar);
                        @endphp

                        {{-- Full stars --}}
                        @for($i = 0; $i < $fullStars; $i++)
                            <div class="pc-star-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#F86626"/>
                                </svg>
                            </div>
                        @endfor

                        {{-- Half star --}}
                        @if($halfStar)
                            <div class="pc-star-block">
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
                            <div class="pc-star-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                </svg>
                            </div>
                        @endfor
                    </div>

                    <p class="pc-rating-review-total">{{ number_format($product->average_rating, 1) }} <span class="ec-text-gray">({{ $product->reviews->count() }})</span></p>
                </div>

                    <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 30, '...') }}</a>
                    <p class="product-card-subtitle">
                        {{ \Illuminate\Support\Str::limit($product->summary, 50, '...') }}
                    </p>
                    <div class="d-flex align-items-center gap-2 flex-wrap"> 
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
           
        </div>
    </div>
</div>
<!-- Slider -->

