<style>
.list .product-card {
	background-color: transparent !important;
    border-radius: 0;
    
}
.list .product-card-title{
    max-width: 100%;
}
.list:hover .product-list-view{
    filter: drop-shadow(0px 4px 22px rgba(0, 0, 0, 0.18));
    border-radius: 12px;
}
.list .product-list-banner {
	padding: 20px;
}
.list .pc-banner-icons {
	top: 20px;
}
.product-card-view,
.product-card-wishlist {
	width: 44.386px;
}
.list .product-card-btn {
	padding: 13.5px;
}
</style>
<div class="col-12 list">
    <div class="d-block product-list-view">
        <div class="d-flex align-items-center gap-4 flex-column flex-md-row">
            <div class="product-list-banner">
                @php
                    $thumbnails = json_decode($product->thumbnail, true);
                    $firstImage = $thumbnails[0] ?? null;
                @endphp
                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                <div class="pc-banner-icons">
                <a href="javascript:;"  class="product-card-wishlist mb-10px {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                    <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4368 2.83259C13.7971 1.579 15.5686 0.874756 17.4178 0.874756C19.4147 0.874756 21.321 1.69591 22.7167 3.14318C24.1024 4.579 24.8739 6.51452 24.8739 8.52459C24.8739 10.5347 24.1023 12.4704 22.7167 13.906C21.7953 14.8611 20.8753 15.8379 19.9506 16.8198C18.0723 18.8142 16.1739 20.8299 14.2019 22.729L14.1973 22.7334C13.1804 23.6984 11.5698 23.6634 10.5963 22.6543L2.15652 13.9059C-0.718808 10.9254 -0.718808 6.1238 2.15652 3.14331C4.97022 0.226694 9.50113 0.123126 12.4368 2.83259Z" fill="#828282"/>
                        </svg>
                    </span>
                </a>
                <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="product-card-view mb-10px">
                    <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="{{'Quick View'}}">
                        <svg width="23" height="14" viewBox="0 0 23 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.55115 7.83139C5.60794 -1.1837 17.7783 -1.1837 21.8351 7.83139" stroke="black" stroke-width="2.0284" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.693 12.3394C9.8259 12.3394 8.31238 10.8259 8.31238 8.95878C8.31238 7.09165 9.8259 5.57812 11.693 5.57812C13.5602 5.57812 15.0737 7.09165 15.0737 8.95878C15.0737 10.8259 13.5602 12.3394 11.693 12.3394Z" stroke="black" stroke-width="2.0284" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </a>
              
            </div>
            </div>
            <div class="w-100 product-card">
                <div class="d-flex align-items-start gap-3 mb-2 justify-content-between flex-column flex-md-row">
                    <div>
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title w-100">{{ $product->title }}</a>
                        <div class="d-flex align-items-center gap-2 mt-2 flex-wrap">
                              @if ($product->is_discounted()->exists())
                                        @if ($product->is_discounted->discount_type == 'flat')
                                            <div class="d-flex align-items-baseline gap-2">
                                                <h6 class="card-product-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                            </div>
                                        @else
                                            @php
                                                $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                            @endphp
                                            <div class="d-flex align-items-baseline gap-2">
                                                <h6 class="card-product-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                    <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                            </div>
                                            
                                        @endif
                                    @else
                                            <h6 class="card-product-price">{{ currency($product->price) }}</h6>
                                    @endif
                        </div>
                        <p class="product-card-subtitle mt-1">{{ \Illuminate\Support\Str::limit($product->summary, 150, '...') }}</p>

                    </div>
                     
                </div>
                  <a href="javascript:;"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="product-card-btn w-auto">
                        @if ($product->is_cart_item)
                            {{ strtoupper(get_phrase('Added To Cart')) }}
                        @else
                            {{ strtoupper(get_phrase('Add To Cart')) }}
                        @endif
                    </a>
                
            </div>
        </div>
    </div>
</div>