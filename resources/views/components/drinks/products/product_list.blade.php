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
                        <div class="d-flex align-items-center gap-1 flex-wrap mb-3">
                            <div class="d-flex align-items-center gap-3px">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="svg-block">
                                        @if ($i <= $product->average_rating)
                                            <img src="{{ asset('assets/frontend/grocery/images/image-icons/star-yellow-16.svg') }}" alt="">
                                        @else
                                            <img src="{{ asset('assets/frontend/grocery/images/image-icons/star-yellow-stroke-16.svg') }}" alt="">
                                        @endif
                                    </span>
                                @endfor
                            </div>
                            <p class="al-title2-12px">{{ $product->average_rating ?? 0 }} <span class="ec-text-gray">({{ $product->reviews->count() }})</span></p>
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                             @if ($product->is_discounted()->exists())
                                @if ($product->is_discounted->discount_type == 'flat')
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="pc-new-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                        <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                @else
                                    @php
                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                    @endphp
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="pc-new-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                            <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                    
                                @endif
                            @else
                                    <h6 class="pc-new-price">{{ currency($product->price) }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>