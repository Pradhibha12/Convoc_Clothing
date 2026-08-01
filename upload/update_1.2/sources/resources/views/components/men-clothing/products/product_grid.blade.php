
@php
//    $layout = $layout == 'sm' ? 'md' : $layout;
$layout = $layout ?? 'md';
@endphp

<style>
    .layout_md .product-card-price,
    .layout_md .product-card-title{
        font-size: 18px;
    }
      .layout_lg .product-card-banner{
        max-height: 531px;
    }
 .layout_md .product-card-btn {
	padding: 11.5px;
}
 .layout_sm  .product-card-price,
 .layout_sm  .product-card-title{
    font-size: 16px
}
</style>

<div class="product-card layout_{{$layout}}">
    <div class="product-card-banner">
        <a  href="javascript:;"  class="pc-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
            <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49533C13.0949 3.48613 14.5211 2.91919 16.0098 2.91919C17.6173 2.91919 19.1519 3.58025 20.2755 4.74537C21.3911 5.90127 22.0122 7.45944 22.0122 9.07763C22.0122 10.6959 21.391 12.2541 20.2755 13.4099C19.5338 14.1788 18.7932 14.9652 18.0487 15.7556C16.5366 17.3612 15.0084 18.984 13.4208 20.5128L13.4171 20.5164C12.5984 21.2932 11.3019 21.265 10.5181 20.4527L3.72374 13.4098C1.40898 11.0104 1.40898 7.14489 3.72374 4.74547C5.98889 2.39747 9.63646 2.3141 11.9998 4.49533Z" fill="#0009"/>
                </svg>
            </span>
        </a>
        <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="pc-card-view">
            <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View" aria-describedby="tooltip794951">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M2.5 10.8333C5.5 4.16659 14.5 4.16659 17.5 10.8333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 14.1667C8.61925 14.1667 7.5 13.0475 7.5 11.6667C7.5 10.286 8.61925 9.16675 10 9.16675C11.3807 9.16675 12.5 10.286 12.5 11.6667C12.5 13.0475 11.3807 14.1667 10 14.1667Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
        </a>
        @php
            $thumbnails = json_decode($product->thumbnail, true);
            $firstImage = $thumbnails[0] ?? null;
        @endphp
        <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
        <a href="{{ route('product', $product->slug) }}"   class="btn product-card-btn">
           {{get_phrase('Shop Now')}}
        </a>
    </div>
    <div class="product-card-body pt-3">
        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
        <div class="d-flex justify-content-between">
        <div class="pc-stars-ratings mb-0">
            <div class="product-card-stars">
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
                                    <stop offset="50%" stop-color="#FFC633"/>
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
            <p class="pc-rating-average">{{ number_format($product->average_rating, 1) }}</p>
        </div>
        <div class="pc-price-wrap mb-0">
                @if ($product->is_discounted()->exists())
                    @if ($product->is_discounted->discount_type == 'flat')
                        <div class="d-flex align-items-baseline gap-2">
                            <h6 class="product-card-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                            <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                        </div>
                    @else
                        @php
                            $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                        @endphp
                        <div class="d-flex align-items-baseline gap-2">
                            <h6 class="product-card-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                            <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                        </div>
                        
                    @endif
                @else
                        <h6 class="product-card-price">{{ currency($product->price) }}</h6>
                @endif
        </div>
        </div>
    </div>
</div>