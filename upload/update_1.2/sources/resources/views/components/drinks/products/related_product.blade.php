<style>
 .product-card-banner-slide {
	height: 250px;
}
</style>

<!-- Swiper -->
<div class="swiper products-slider">
    <div class="swiper-wrapper">
               
            @foreach ($product->related_products()->where('status', 1)->take(30)->get() as $related_product)
               <a href="{{ route('product', $related_product->slug) }}" class="product-card swiper-slide">
                    <div class="product-card-banner">
                        @php
                            $thumbnails = json_decode($related_product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                    </div>
                    <div class="product-card-body">
                        <h5 class="product-card-title">{{ \Illuminate\Support\Str::limit($related_product->title, 70, '...') }}</h5>
                        <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px">
                              @if ($related_product->is_discounted()->exists())
                                @if ($related_product->is_discounted->discount_type == 'flat')
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="pc-new-price">  {{ currency($related_product->price - $related_product->is_discounted->discount_value) }} </h6>
                                        <h6 class="pc-old-price"><del>{{ currency($related_product->price) }}</del></h6>
                                    </div>
                                @else
                                    @php
                                        $discount_amount = $related_product->price * ($related_product->is_discounted->discount_value / 100);
                                    @endphp
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="pc-new-price"> {{ currency($related_product->price - $discount_amount) }}  </h6>
                                            <h6 class="pc-old-price"><del>{{ currency($related_product->price) }}</del></h6>
                                    </div>
                                    
                                @endif
                            @else
                                    <h6 class="pc-new-price">{{ currency($related_product->price) }}</h6>
                            @endif
                        </div>
                    </div>
                </a>
             @endforeach
    </div>
</div>