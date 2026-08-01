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
                        <a href="{{ route('product', $product->slug) }}" class="mb-10px al-title2-16px fw-bold text-link">{{ $product->title }}</a>
                         <div class="pc-stars-ratings">
                                <div class=" d-flex align-items-center">
                                        @php
                                            $rating = $product->average_rating;
                                            $fullStars = floor($rating); // full stars count
                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                        @endphp

                                        {{-- Full stars --}}
                                        @for($i = 0; $i < $fullStars; $i++)
                                            <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#F86626"/>
                                                </svg>
                                            </div>
                                        @endfor

                                        {{-- Half star --}}
                                        @if($halfStar)
                                                <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <defs>
                                                        <linearGradient id="half-grad">
                                                            <stop offset="50%" stop-color="#F86626"/>
                                                            <stop offset="50%" stop-color="#ccc"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                </svg>
                                            </div>
                                        @endif

                                        {{-- Empty stars --}}
                                        @for($i = 0; $i < $emptyStars; $i++)
                                                <div class="svg-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                </svg>
                                            </div>
                                        @endfor
                                </div>
                                <p>({{ number_format($product->average_rating, 1) }})</p>
                            </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
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
                    </div>
                    <a href="{{ route('product', $product->slug) }}" class="btn sm-btn-outline-white">
                        {{ get_phrase('Shop Now') }}
                    </a>
                </div>
                <p class="al-subtitle2-14px">{{ \Illuminate\Support\Str::limit($product->summary, 150, '...') }}</p>
            </div>
        </div>
    </div>
</div>