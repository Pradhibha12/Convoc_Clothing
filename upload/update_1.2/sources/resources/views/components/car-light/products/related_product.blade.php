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
                        <a href="{{ route('product', $related_product->slug) }}" class="product-card-banner">
                            @php
                                $thumbnails = json_decode($related_product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            @if ($related_product->is_discounted()->exists())
                                @php
                                    $discount = $related_product->is_discounted;
                                    if ($discount->discount_type === 'percentage') {
                                        $discount_text = $discount->discount_value . '% OFF';
                                    } else { // flat
                                        $discount_text = currency($discount->discount_value) . ' FLAT';
                                    }
                                @endphp

                                <p class="pc-saved-badge capitalize">{{ $discount_text }}</p>
                            @endif
                        </a>
                        <div class="p-3">
                               <div class="d-flex justify-content-between">
                                <a href="{{ route('product', $related_product->slug) }}" class="product-card-title">{{$related_product->title}}</a>
                                </div>
                                 <div class="d-flex align-items-center  gap-6px mb-3">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $rating = $related_product->average_rating;
                                                $fullStars = floor($rating); // full stars count
                                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                            @endphp
                                            @for($i = 0; $i < $fullStars; $i++)
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                    <path d="M12.1003 3.7688L14.7924 9.90566L21.1752 10.7014L16.4563 15.2899L17.7089 21.9186L12.1003 18.6175L6.49173 21.9186L7.74437 15.2899L3.02544 10.7014L9.40819 9.90566L12.1003 3.7688Z" fill="#F8C51B"/>
                                                </svg>
                                            </div>
                                            @endfor
                                                @if($halfStar)
                                                <div class="svg-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                    <path d="M12.6993 3.7688L10.0072 9.90566L3.62445 10.7014L8.34339 15.2899L7.09074 21.9186L12.6993 18.6175V3.7688Z" fill="#F8C51B"/>
                                                    <path d="M12.6994 18.6178L18.308 21.9188L17.0553 15.2901L21.7742 10.7016L15.3915 9.90591L12.6994 3.76904V18.6178Z" ffill="url(#halfStarGradient)" stroke="#F8C51B" stroke-width="0.5"/>
                                                </svg>
                                                </div>
                                            @endif
                                            @for($i = 0; $i < $emptyStars; $i++)
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                    <path d="M12.6993 3.7688L10.0072 9.90566L3.62445 10.7014L8.34339 15.2899L7.09074 21.9186L12.6993 18.6175V3.7688Z" fill="#D5D5D5"/>
                                                    <path d="M12.6994 18.6178L18.308 21.9188L17.0553 15.2901L21.7742 10.7016L15.3915 9.90591L12.6994 3.76904V18.6178Z" fill="#D5D5D5"/>
                                                </svg>
                                            </div>
                                            @endfor

                                        </div>
                                        <p class="pc-total-rating">{{ number_format($related_product->average_rating, 1) }}</p>
                                  </div>
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
                                <div class="sold-progress" progress-value="{{ getSoldProgress($related_product->id) }}"></div>

                                <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap mb-20">
                                    <p class="available-sold-info">{{get_phrase('Total  Stock:')}} {{$related_product->total_stock}}</p>
                                    <p class="available-sold-info">{{get_phrase('Sold:')}} {{ getSoldQuantity($related_product->id) }}</p>
                                </div>
                            <a href="{{ route('product', $related_product->slug) }}" class="btn ca-btn-outline-secondary w-100">{{get_phrase('View details')}}</a>
                        </div>
                    </div>
             @endforeach
    </div>
</div>