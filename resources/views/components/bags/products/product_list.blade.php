
<style>
    .product-list-view  {
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding:12px;
    }
   .product-list-view  .product-card-title ,
   .product-list-view  .product-card-price {
	font-size: 24px;
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
            </div>
            <div class="w-100">
                <div class="d-flex align-items-start gap-3 mb-4 justify-content-between flex-column flex-md-row">
                    <div>
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ $product->title }}</a>
                        <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 130, '...') }}</p>
                        
                        <div class="d-flex align-items-center gap-1 flex-wrap mb-3">
                           <div class="d-flex align-items-center">
                                @php
                                    $rating = $product->average_rating;
                                    $fullStars = floor($rating); // full stars count
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                @endphp
                                @for($i = 0; $i < $fullStars; $i++)
                                <div class="svg-block">
                                    <svg width="22" height="22" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.2351 0.97998L16.9847 9.0486L25.8224 10.119L19.3022 16.176L21.0145 24.9062L13.2351 20.581L5.4557 24.9062L7.168 16.176L0.647771 10.119L9.48542 9.0486L13.2351 0.97998Z" fill="#FFC633"/>
                                    </svg>
                                </div>
                                @endfor
                                 @if($halfStar)
                                    <div class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 25 25" fill="none">
                                        <path d="M12.6993 3.7688L10.0072 9.90566L3.62445 10.7014L8.34339 15.2899L7.09074 21.9186L12.6993 18.6175V3.7688Z" fill="#FFC633"/>
                                        <path d="M12.6994 18.6178L18.308 21.9188L17.0553 15.2901L21.7742 10.7016L15.3915 9.90591L12.6994 3.76904V18.6178Z" ffill="url(#halfStarGradient)" stroke="#FFC633" stroke-width="0.5"/>
                                    </svg>
                                    
                                    </div>
                                @endif
                                @for($i = 0; $i < $emptyStars; $i++)
                                <div class="svg-block">
                                    <svg width="22" height="22" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.2351 0.97998L16.9847 9.0486L25.8224 10.119L19.3022 16.176L21.0145 24.9062L13.2351 20.581L5.4557 24.9062L7.168 16.176L0.647771 10.119L9.48542 9.0486L13.2351 0.97998Z" fill="#ddd"/>
                                    </svg>
                                </div>
                                @endfor
                            </div>
                            <p class="al-title2-12px">({{ number_format($product->average_rating, 1) }})</p>
                        </div>
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
                    </div>
                    <a href="{{ route('product', $product->slug) }}" class="btn bsb2-btn-skin"> {{ get_phrase('Shop Now') }} 

                         <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                    <path d="M1.07892 6.92357L0.0225108 6.92357L0.022511 9.03639L1.07892 9.03639L1.07892 6.92357ZM16.6257 8.72697C17.0382 8.31442 17.0382 7.64554 16.6257 7.23299L9.90275 0.51005C9.49019 0.0974972 8.82131 0.0974973 8.40876 0.51005C7.99621 0.922603 7.99621 1.59148 8.40876 2.00404L14.3847 7.97998L8.40876 13.9559C7.99621 14.3685 7.99621 15.0374 8.40876 15.4499C8.82131 15.8625 9.49019 15.8625 9.90275 15.4499L16.6257 8.72697ZM1.07892 7.97998L1.07892 9.03639L15.8787 9.03639L15.8787 7.97998L15.8787 6.92357L1.07892 6.92357L1.07892 7.97998Z" fill="white"/>
                </svg>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>