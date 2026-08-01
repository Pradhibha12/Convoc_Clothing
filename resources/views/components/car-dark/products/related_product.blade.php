<style>
 .product-card-banner-slide {
	height: 250px;
}
</style>

<!-- Swiper -->
<div class="swiper products-slider">
    <div class="swiper-wrapper">
          
        @foreach ($product->related_products()->where('status', 1)->take(30)->get() as $related_product)
            <div class="product-card swiper-slide">
                <div class="pc-banner-wrap">
                    <a href="javascript:;"  class="product-card-bookmark {{ wishlist_class($related_product->id) }}" 
                                onclick="toggleWishlist({{ $related_product->id }}, this)">
                        <span class="pc-bookmark-inner" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('wishlist')}}">
                            <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.1875 0.0625C16.712 0.0642369 18.173 0.671065 19.251 1.74902C20.3289 2.82698 20.9358 4.28804 20.9375 5.8125C20.9375 9.0645 18.5245 12.0173 16.042 14.1914C13.5638 16.3617 11.0331 17.741 10.8262 17.8506V17.8516C10.7261 17.9054 10.6137 17.9336 10.5 17.9336C10.3863 17.9336 10.2739 17.9054 10.1738 17.8516V17.8506C9.96691 17.741 7.4362 16.3617 4.95801 14.1914C2.47546 12.0173 0.0625 9.0645 0.0625 5.8125L0.0703125 5.52734C0.142344 4.10677 0.738475 2.75957 1.74902 1.74902C2.75957 0.738475 4.10677 0.142344 5.52734 0.0703125L5.8125 0.0625C7.73017 0.0625 9.40625 0.886962 10.4502 2.27734L10.5 2.34375L10.5498 2.27734C11.5937 0.886962 13.2698 0.0625 15.1875 0.0625Z" fill="#ffffff" stroke="#5A5A5A" stroke-width="0.125"/>
                            </svg>
                        </span>
                    </a>
                    
                    <a href="{{ route('product', $related_product->slug) }}" class="product-card-banner">
                        @php
                            $thumbnails = json_decode($related_product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                    </a>
                    
                </div>
                <a href="{{ route('product', $related_product->slug) }}" class="product-card-title">  {{ \Illuminate\Support\Str::limit($related_product->title, 20, '...') }}</a>
                <div class="d-flex align-items-center justify-content-between column-gap-3 row-gap-2 flex-wrap mb-18px">
                        @if ($related_product->is_discounted()->exists())
                            @if ($related_product->is_discounted->discount_type == 'flat')
                                <div class="d-flex gap-2">
                                    <h6 class="product-card-price">  {{ currency($related_product->price - $related_product->is_discounted->discount_value) }} </h6>
                                    <h6 class=" fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                </div>
                            @else
                                @php
                                    $discount_amount = $related_product->price * ($related_product->is_discounted->discount_value / 100);
                                @endphp
                                <div class="d-flex gap-2">
                                    <h6 class="product-card-price"> {{ currency($related_product->price - $discount_amount) }}  </h6>
                                        <h6 class=" fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                </div>
                                
                            @endif
                        @else
                                <h6 class="product-card-price">{{ currency($related_product->price) }}</h6>
                        @endif
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="pc-rating-wrap">
                            <span class="pc-rating-star">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M6.28556 2.4889L7.04391 3.86029C7.14782 4.04853 7.40859 4.22735 7.62304 4.25152L8.89955 4.41198C9.71685 4.51294 9.92762 5.09298 9.3714 5.70054L8.42375 6.7298C8.26556 6.90229 8.18344 7.23134 8.24701 7.45719L8.57904 8.66895C8.84021 9.62566 8.34355 10.0222 7.47076 9.55227L6.25153 8.89571C6.02947 8.77568 5.67676 8.79315 5.46815 8.92791L4.30748 9.67917C3.47661 10.2162 2.9479 9.86264 3.13022 8.88858L3.36368 7.65585C3.40727 7.42542 3.30277 7.10386 3.13028 6.94566L2.09537 5.9965C1.4914 5.43821 1.65386 4.84318 2.45868 4.67448L3.71536 4.41199C3.92745 4.36592 4.17323 4.1715 4.25952 3.9737L4.90335 2.54223C5.25527 1.77099 5.87613 1.74669 6.28556 2.4889Z" fill="#D2F90B"/>
                                </svg>
                            </span>
                            <p>{{ number_format($related_product->average_rating, 1) }}</p>
                        </div>
                        
                    </div>
                </div>
                <div class="d-flex gap-6px align-items-center justify-content-between">
                    <a href="{{ route('product', $related_product->slug) }}" class="pc-details-btn">{{get_phrase('View details')}}</a>
                    <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $related_product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="pc-cart-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                            <path d="M7.80078 16.7002C8.30466 16.7003 8.78824 16.9006 9.14453 17.2568C9.50057 17.613 9.70107 18.096 9.70117 18.5996C9.70117 19.1034 9.50073 19.5871 9.14453 19.9434C8.78824 20.2996 8.30466 20.4999 7.80078 20.5C7.29681 20.5 6.81338 20.2997 6.45703 19.9434C6.10069 19.587 5.90039 19.1035 5.90039 18.5996C5.90049 18.0959 6.10084 17.6131 6.45703 17.2568C6.81338 16.9005 7.29681 16.7002 7.80078 16.7002ZM16.2012 16.7002C16.7051 16.7002 17.1886 16.9005 17.5449 17.2568C17.901 17.613 18.1015 18.096 18.1016 18.5996C18.1016 19.1034 17.9012 19.5871 17.5449 19.9434C17.1886 20.2997 16.7051 20.5 16.2012 20.5C15.6972 20.5 15.2138 20.2997 14.8574 19.9434C14.5011 19.587 14.3008 19.1035 14.3008 18.5996C14.3009 18.0959 14.5013 17.613 14.8574 17.2568C15.2138 16.9005 15.6972 16.7002 16.2012 16.7002ZM7.80078 17.5C7.50904 17.5 7.22876 17.616 7.02246 17.8223C6.81636 18.0284 6.7003 18.3081 6.7002 18.5996C6.7002 18.8913 6.8162 19.1716 7.02246 19.3779C7.22876 19.5842 7.50905 19.7002 7.80078 19.7002C8.09235 19.7001 8.3719 19.5841 8.57812 19.3779C8.78443 19.1716 8.90039 18.8914 8.90039 18.5996C8.90029 18.308 8.78434 18.0285 8.57812 17.8223C8.37189 17.6161 8.0924 17.5001 7.80078 17.5ZM16.2012 17.5C15.9094 17.5 15.6291 17.616 15.4229 17.8223C15.2168 18.0284 15.1017 18.3081 15.1016 18.5996C15.1016 18.8913 15.2167 19.1717 15.4229 19.3779C15.6292 19.5842 15.9094 19.7002 16.2012 19.7002C16.4928 19.7002 16.7722 19.584 16.9785 19.3779C17.1848 19.1716 17.3008 18.8914 17.3008 18.5996C17.3007 18.308 17.1847 18.0285 16.9785 17.8223C16.7722 17.6161 16.4928 17.5 16.2012 17.5ZM0.900391 0.5H1.56934C2.33161 0.5 2.8491 0.939206 3.20312 1.48145L3.3457 1.71973C3.57996 2.14718 3.75568 2.65711 3.90039 3.14648L4.01562 3.53516L4.41992 3.50293L4.50098 3.5H19.499C20.1216 3.50004 20.5821 4.05807 20.4873 4.6543L20.4609 4.77441L18.2666 12.4648C18.0997 13.0501 17.7465 13.5659 17.2607 13.9326C16.775 14.2991 16.1827 14.4979 15.5742 14.498H8.43652C7.82302 14.4981 7.22615 14.2958 6.73828 13.9238C6.31157 13.5984 5.98849 13.1584 5.80566 12.6572L5.73633 12.4385L4.82422 9.1123L4.82129 9.10254L3.32031 4.04004L3.31055 4.00488C3.12857 3.34353 2.93777 2.64146 2.6416 2.10352C2.49941 1.84222 2.3461 1.63727 2.16211 1.49902C1.9596 1.3469 1.75454 1.29987 1.57129 1.2998H0.900391C0.794276 1.2998 0.692211 1.25764 0.617188 1.18262C0.542316 1.1077 0.500103 1.00628 0.5 0.900391C0.5 0.794315 0.542165 0.692205 0.617188 0.617188C0.673369 0.561011 0.74452 0.523228 0.821289 0.507812L0.900391 0.5ZM4.42285 4.94238L5.5918 8.88672L5.60449 8.93555L5.60547 8.94043L6.50684 12.2266L6.50781 12.2285C6.74764 13.0943 7.53525 13.6972 8.43652 13.6973H15.5742C16.009 13.6973 16.4323 13.5558 16.7793 13.2939C17.1263 13.0321 17.3787 12.6641 17.498 12.2461L19.583 4.9375L19.7646 4.2998H4.23242L4.42285 4.94238Z" fill="white" stroke="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>