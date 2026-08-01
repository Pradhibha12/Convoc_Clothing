<style>
    .product-list-view .product-card-title{
        max-width: 100%;
    }
    .product-list-view {
	border-radius: 12px;
}
    .product-list-view .product-card-subtitle {
        font-size: 15px;
        max-width: 100%;
        text-align: left;
    }
    .product-card{
        background: transparent;
        border: none;
        
    }
    .product-card:hover {
	box-shadow: none;
}
.product-card-price{
    font-size: 18px;
}
.pc-details-btn {
	width: 150px;
	padding: 13px 12px;
}
   .product-list-view .card-product-price{
    font-size: 16px;
   }
</style>
<div class="col-12">
    <div class="d-block product-list-view">
        <div class="d-flex align-items-center gap-4 flex-column flex-md-row">
            <div class="product-list-banner">
                @php
                    $thumbnails = json_decode($product->thumbnail, true);
                    $firstImage = $thumbnails[0] ?? null;
                @endphp
                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                 <a href="javascript:;"  class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                    <span class="pc-bookmark-inner" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('wishlist')}}">
                        <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.1875 0.0625C16.712 0.0642369 18.173 0.671065 19.251 1.74902C20.3289 2.82698 20.9358 4.28804 20.9375 5.8125C20.9375 9.0645 18.5245 12.0173 16.042 14.1914C13.5638 16.3617 11.0331 17.741 10.8262 17.8506V17.8516C10.7261 17.9054 10.6137 17.9336 10.5 17.9336C10.3863 17.9336 10.2739 17.9054 10.1738 17.8516V17.8506C9.96691 17.741 7.4362 16.3617 4.95801 14.1914C2.47546 12.0173 0.0625 9.0645 0.0625 5.8125L0.0703125 5.52734C0.142344 4.10677 0.738475 2.75957 1.74902 1.74902C2.75957 0.738475 4.10677 0.142344 5.52734 0.0703125L5.8125 0.0625C7.73017 0.0625 9.40625 0.886962 10.4502 2.27734L10.5 2.34375L10.5498 2.27734C11.5937 0.886962 13.2698 0.0625 15.1875 0.0625Z" fill="#ffffff" stroke="#5A5A5A" stroke-width="0.125"/>
                        </svg>
                    </span>
                </a>
            </div>
            <div class="w-100 product-card">
                <div class="d-flex align-items-start gap-3 mb-2 justify-content-between flex-column flex-md-row">
                    <div>
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ $product->title }}</a>
                        <div class="d-flex align-items-center gap-1 ">
                            <div class="pc-star">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                    <path d="M9 0L11.5498 5.49048L17.5595 6.21885L13.1257 10.3405L14.2901 16.2812L9 13.338L3.70993 16.2812L4.87432 10.3405L0.440492 6.21885L6.45019 5.49048L9 0Z" fill="#FFC633"/>
                                </svg>
                            </div>
                            <p class="pc-total-rating">{{ number_format($product->average_rating, 1) }}</p>
                        </div>

                        <div class="d-flex align-items-center gap-2 mt-2 flex-wrap">
                            @if ($product->is_discounted()->exists())
                                @if ($product->is_discounted->discount_type == 'flat')
                                    <div class="d-flex gap-2">
                                        <h6 class="product-card-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                        <h6 class=" fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                @else
                                    @php
                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                    @endphp
                                    <div class="d-flex gap-2">
                                        <h6 class="product-card-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                            <h6 class=" fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                    
                                @endif
                            @else
                                    <h6 class="product-card-price">{{ currency($product->price) }}</h6>
                            @endif
                        </div>
                        <p class="product-card-subtitle mt-1">{{ \Illuminate\Support\Str::limit($product->summary, 50, '...') }}</p>

                    </div>
                     
                </div>
                  <div class="d-flex gap-6px align-items-center justify-content-between">
                    <a href="{{ route('product', $product->slug) }}" class="pc-details-btn">{{get_phrase('View details')}}</a>
                    <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="pc-cart-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                            <path d="M7.80078 16.7002C8.30466 16.7003 8.78824 16.9006 9.14453 17.2568C9.50057 17.613 9.70107 18.096 9.70117 18.5996C9.70117 19.1034 9.50073 19.5871 9.14453 19.9434C8.78824 20.2996 8.30466 20.4999 7.80078 20.5C7.29681 20.5 6.81338 20.2997 6.45703 19.9434C6.10069 19.587 5.90039 19.1035 5.90039 18.5996C5.90049 18.0959 6.10084 17.6131 6.45703 17.2568C6.81338 16.9005 7.29681 16.7002 7.80078 16.7002ZM16.2012 16.7002C16.7051 16.7002 17.1886 16.9005 17.5449 17.2568C17.901 17.613 18.1015 18.096 18.1016 18.5996C18.1016 19.1034 17.9012 19.5871 17.5449 19.9434C17.1886 20.2997 16.7051 20.5 16.2012 20.5C15.6972 20.5 15.2138 20.2997 14.8574 19.9434C14.5011 19.587 14.3008 19.1035 14.3008 18.5996C14.3009 18.0959 14.5013 17.613 14.8574 17.2568C15.2138 16.9005 15.6972 16.7002 16.2012 16.7002ZM7.80078 17.5C7.50904 17.5 7.22876 17.616 7.02246 17.8223C6.81636 18.0284 6.7003 18.3081 6.7002 18.5996C6.7002 18.8913 6.8162 19.1716 7.02246 19.3779C7.22876 19.5842 7.50905 19.7002 7.80078 19.7002C8.09235 19.7001 8.3719 19.5841 8.57812 19.3779C8.78443 19.1716 8.90039 18.8914 8.90039 18.5996C8.90029 18.308 8.78434 18.0285 8.57812 17.8223C8.37189 17.6161 8.0924 17.5001 7.80078 17.5ZM16.2012 17.5C15.9094 17.5 15.6291 17.616 15.4229 17.8223C15.2168 18.0284 15.1017 18.3081 15.1016 18.5996C15.1016 18.8913 15.2167 19.1717 15.4229 19.3779C15.6292 19.5842 15.9094 19.7002 16.2012 19.7002C16.4928 19.7002 16.7722 19.584 16.9785 19.3779C17.1848 19.1716 17.3008 18.8914 17.3008 18.5996C17.3007 18.308 17.1847 18.0285 16.9785 17.8223C16.7722 17.6161 16.4928 17.5 16.2012 17.5ZM0.900391 0.5H1.56934C2.33161 0.5 2.8491 0.939206 3.20312 1.48145L3.3457 1.71973C3.57996 2.14718 3.75568 2.65711 3.90039 3.14648L4.01562 3.53516L4.41992 3.50293L4.50098 3.5H19.499C20.1216 3.50004 20.5821 4.05807 20.4873 4.6543L20.4609 4.77441L18.2666 12.4648C18.0997 13.0501 17.7465 13.5659 17.2607 13.9326C16.775 14.2991 16.1827 14.4979 15.5742 14.498H8.43652C7.82302 14.4981 7.22615 14.2958 6.73828 13.9238C6.31157 13.5984 5.98849 13.1584 5.80566 12.6572L5.73633 12.4385L4.82422 9.1123L4.82129 9.10254L3.32031 4.04004L3.31055 4.00488C3.12857 3.34353 2.93777 2.64146 2.6416 2.10352C2.49941 1.84222 2.3461 1.63727 2.16211 1.49902C1.9596 1.3469 1.75454 1.29987 1.57129 1.2998H0.900391C0.794276 1.2998 0.692211 1.25764 0.617188 1.18262C0.542316 1.1077 0.500103 1.00628 0.5 0.900391C0.5 0.794315 0.542165 0.692205 0.617188 0.617188C0.673369 0.561011 0.74452 0.523228 0.821289 0.507812L0.900391 0.5ZM4.42285 4.94238L5.5918 8.88672L5.60449 8.93555L5.60547 8.94043L6.50684 12.2266L6.50781 12.2285C6.74764 13.0943 7.53525 13.6972 8.43652 13.6973H15.5742C16.009 13.6973 16.4323 13.5558 16.7793 13.2939C17.1263 13.0321 17.3787 12.6641 17.498 12.2461L19.583 4.9375L19.7646 4.2998H4.23242L4.42285 4.94238Z" fill="white" stroke="white"/>
                        </svg>
                    </a>
                </div>
                        
            </div>
        </div>
    </div>
</div>