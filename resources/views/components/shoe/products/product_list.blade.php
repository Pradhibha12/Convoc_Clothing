<style>
    .product-list-view  {
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px
    }
    .product-list-view .product-card-badge {
        padding: 5.5px 15.5px;
        font-weight: 500;
        font-size: 14px;
        top: 10px;
}
.product-list-view .product-card-wishlist {
	position: absolute;
	right: 0;
	z-index: 99;
	top: 0;
}
</style>

<div class="col-12">
    <div class="d-block product-list-view">
        <div class="d-flex align-items-center gap-4 flex-column flex-md-row">
            <div class="product-list-banner">
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
                <a href="javascript:void(0)"   class="product-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}" aria-describedby="tooltip276572">
                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.8298 1.48035C17.6626 1.48035 19.9646 3.7877 19.9646 6.64539C19.9646 7.65303 19.8238 8.59277 19.575 9.47253L19.4617 9.84558L19.4607 9.84949C18.6959 12.2696 17.1293 14.2203 15.4382 15.6737C13.9563 16.9473 12.4007 17.8199 11.2595 18.2821L10.7976 18.455L10.7927 18.4569C10.6907 18.4929 10.5229 18.5194 10.3308 18.5194C10.1867 18.5194 10.056 18.505 9.95679 18.4823L9.8689 18.4569L9.86304 18.455L9.40112 18.2821C8.26005 17.82 6.70514 16.9471 5.22339 15.6737C3.63789 14.3111 2.16086 12.5116 1.35229 10.2977L1.19995 9.84949L1.19897 9.84558L1.08569 9.47253C0.836834 8.59279 0.696045 7.65301 0.696045 6.64539C0.696084 3.7877 2.99806 1.48035 5.83081 1.48035C7.5002 1.48037 8.99679 2.292 9.93042 3.53992L10.3308 4.07507L10.7312 3.53992C11.6648 2.29213 13.1606 1.48042 14.8298 1.48035Z" stroke="black" />
                        </svg>
                    </span>
                </a>
            </div>
            <div class="w-100">
                <div class="d-flex align-items-start gap-3 mb-4 justify-content-between flex-column flex-md-row">
                    <div>
                        <a href="{{ route('product', $product->slug) }}" class="mb-10px product-lg-card-title">{{ $product->title }}</a>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                             @if ($product->is_discounted()->exists())
                                @if ($product->is_discounted->discount_type == 'flat')
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="product-card-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                        <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                @else
                                    @php
                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                    @endphp
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="product-card-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                            <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                    
                                @endif
                            @else
                                    <h6 class="product-card-price">{{ currency($product->price) }}</h6>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-2 mt-2">
                            <div class="svg-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 28 26" fill="none">
                                    <path d="M9.20936 7.92414L12.8408 0.816639C13.3069 -0.0957806 14.6538 -0.0957806 15.1199 0.816639L18.7512 7.92414L26.8723 9.07092C27.9142 9.21805 28.3294 10.4555 27.5752 11.1652L21.6998 16.6938L23.0864 24.5042C23.2645 25.5072 22.1747 26.272 21.2424 25.7983L13.9803 22.1087L6.7182 25.7983C5.7859 26.272 4.69612 25.5072 4.87417 24.5042L6.26074 16.6938L0.38551 11.1652C-0.36884 10.4555 0.0464452 9.21805 1.0884 9.07092L9.20936 7.92414Z" fill="#FFC416"/>
                                </svg>
                            </div>
                            <div class="d-flex align-items-center gap-2px">
                                <h5 class="product-card-rating">{{ number_format($product->average_rating, 1) }}</h5>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <a  href="{{ route('product', $product->slug) }}" class="btn sh1-sm-btn-dark text-nowrap">
                    {{get_phrase('Shop Now')}}
                </a>
            </div>
        </div>
    </div>
</div>