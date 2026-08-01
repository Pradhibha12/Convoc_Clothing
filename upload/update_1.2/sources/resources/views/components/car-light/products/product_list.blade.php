<style>
    .product-list-view .product-card-title{
        max-width: 100%;
    }
    .product-list-view .product-card-subtitle {
        font-size: 15px;
        max-width: 100%;
        text-align: left;
    }
    .product-list-view .product-card{
        background: transparent;
        border: none;
    }
    .product-list-view .product-card:hover {
	box-shadow: none;
}
.product-card-price{
    font-size: 18px;
}
.pc-details-btn {
	width: 150px;
	padding: 13px 12px;
}
.product-list-view {
	border: 1px solid #ddd;
	border-radius: 12px;
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
                @if ($product->is_discounted()->exists())
                    @php
                        $discount = $product->is_discounted;
                        if ($discount->discount_type === 'percentage') {
                            $discount_text = $discount->discount_value . '% OFF';
                        } else { // flat
                            $discount_text = currency($discount->discount_value) . ' FLAT';
                        }
                    @endphp

                    <p class="pc-saved-badge capitalize">{{ $discount_text }}</p>
                @endif
            </div>
            <div class="w-100 product-card">
                <div class="d-flex align-items-start gap-3 mb-2 justify-content-between flex-column flex-md-row">
                    <div>
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ $product->title }}</a>
                            <div class="d-flex align-items-center  gap-6px mb-3">
                                <div class="d-flex align-items-center">
                                    @php
                                        $rating = $product->average_rating;
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
                        <p class="product-card-subtitle mt-1">{{ \Illuminate\Support\Str::limit($product->summary, 80, '...') }}</p>

                    </div>
                     
                </div>
                  <a href="{{ route('product', $product->slug) }}" class="btn ca-btn-outline-secondary" >
                        {{get_phrase('View details')}}
                 </a>
                
            </div>
        </div>
    </div>
</div>