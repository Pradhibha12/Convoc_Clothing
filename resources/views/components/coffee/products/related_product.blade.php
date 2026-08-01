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
                        <div class="product-card-banner">
                            <a href="javascript:;" class="pc-card-bookmark {{ wishlist_class($related_product->id) }}" 
                                onclick="toggleWishlist({{ $related_product->id }}, this)">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9999 1.73567C12.203 0.624328 13.7699 0 15.4054 0C17.1716 0 18.8576 0.727969 20.092 2.01102C21.3177 3.28391 22 4.99979 22 6.78176C22 8.5638 21.3176 10.2798 20.092 11.5525C19.2771 12.3993 18.4634 13.2652 17.6455 14.1357C15.9843 15.9038 14.3052 17.6908 12.5611 19.3744L12.557 19.3783C11.6575 20.2337 10.2331 20.2027 9.372 19.3081L1.90734 11.5524C-0.63578 8.91015 -0.63578 4.65341 1.90734 2.01113C4.39596 -0.574523 8.40338 -0.666338 10.9999 1.73567Z" fill="#1B1107"/>
                                    </svg>
                                </span>
                            </a>
                            <a onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $related_product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="pc-card-view">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M3.10498 11.8772C6.26288 4.85963 15.7366 4.85963 18.8945 11.8772" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.9997 15.386C9.54632 15.386 8.36816 14.2078 8.36816 12.7544C8.36816 11.301 9.54632 10.1228 10.9997 10.1228C12.4532 10.1228 13.6313 11.301 13.6313 12.7544C13.6313 14.2078 12.4532 15.386 10.9997 15.386Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </a>
                            @php
                                $thumbnails = json_decode($related_product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            <a href="{{ route('product', $related_product->slug) }}" class="pc-card-btn">{{get_phrase('Shop Now')}}</a>
                        </div>
                         <div class="d-flex justify-content-between">
                                  @if ($related_product->is_discounted()->exists())
                                    @if ($related_product->is_discounted->discount_type == 'flat')
                                        <div class="d-flex align-items-baseline gap-2">
                                            <h6 class="product-card-price">  {{ currency($related_product->price - $related_product->is_discounted->discount_value) }} </h6>
                                            <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                        </div>
                                    @else
                                        @php
                                            $discount_amount = $related_product->price * ($related_product->is_discounted->discount_value / 100);
                                        @endphp
                                        <div class="d-flex align-items-baseline gap-2">
                                            <h6 class="product-card-price"> {{ currency($related_product->price - $discount_amount) }}  </h6>
                                                <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($related_product->price) }}</del></h6>
                                        </div>
                                        
                                    @endif
                                @else
                                        <h6 class="product-card-price">{{ currency($related_product->price) }}</h6>
                                @endif
                                
                                <div class="d-flex align-items-center gap-1 justify-content-center">
                                    <div class="pc-star">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                            <path d="M9 0L11.5498 5.49048L17.5595 6.21885L13.1257 10.3405L14.2901 16.2812L9 13.338L3.70993 16.2812L4.87432 10.3405L0.440492 6.21885L6.45019 5.49048L9 0Z" fill="#FFC633"/>
                                        </svg>
                                    </div>
                                    <p class="pc-total-rating">{{ number_format($related_product->average_rating, 1) }}</p>
                                </div>
                         </div>

                        <a href="{{ route('product', $related_product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($related_product->title, 30, '...') }}</a>
                        <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($related_product->summary, 100, '...') }}</p>
                           
                    </div>
             @endforeach
    </div>
</div>
