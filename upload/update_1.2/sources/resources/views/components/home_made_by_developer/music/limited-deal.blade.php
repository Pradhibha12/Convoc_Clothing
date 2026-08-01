{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Limited Time Deal Area Start  -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ltd-section-title-area">
                        <h2 class="section-title text-center mb-20px max-w-582px mx-auto wow animate__fadeInUp builder-editable" builder-identity="ML1" data-wow-delay=".1s">{{get_phrase("Limited-Time Deals You Can’t Miss")}}🔥</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto wow animate__fadeInUp builder-editable" builder-identity="ML2"  data-wow-delay=".2s">{{get_phrase('Get exclusive discounts on best-selling guitars, keyboards, drum kits & more.  Donâ€™t miss your chance to upgrade your sound â€” at unbeatable prices.')}}</p>
                    </div>
                </div>
            </div>
            <div class="limited-deal-card-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="row limited-deal-row">
                    @php
                        $latest_products = App\Models\Product::where('status', 1)->take(3)->orderBy('created_at', 'desc')->get();
                      @endphp      
                     @foreach($latest_products as $product)  
                    <div class="col-md-6 col-lg-4">
                        <div class="limited-deal-card">
                            <a href="{{ route('product', $product->slug) }}" class="ld-card-banner">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                <span class="ld-product-rating">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M9.8876 3.18421L11.0448 5.27694C11.2034 5.5642 11.6013 5.83709 11.9286 5.87397L13.8766 6.11883C15.1238 6.2729 15.4454 7.15805 14.5966 8.08518L13.1505 9.65584C12.9091 9.91905 12.7838 10.4212 12.8808 10.7658L13.3875 12.615C13.786 14.0749 13.0281 14.68 11.6962 13.9629L9.83566 12.961C9.49681 12.7779 8.95857 12.8045 8.64022 13.0102L6.86905 14.1566C5.60113 14.976 4.79432 14.4366 5.07253 12.9501L5.4288 11.069C5.49531 10.7173 5.33584 10.2266 5.07263 9.98524L3.49335 8.53682C2.57168 7.68487 2.81961 6.77685 4.04777 6.51941L5.96546 6.11884C6.28911 6.04854 6.66417 5.75187 6.79585 5.45002L7.77833 3.26559C8.31537 2.08867 9.26281 2.05158 9.8876 3.18421Z" fill="black"/>
                                    </svg>
                                    <span>{{ number_format($product->average_rating, 1) }}</span>
                                </span>
                               
                            </a>
                            <div>
                                <div class="d-flex gap-3 justify-content-between mb-10px">
                                    <a href="{{ route('product', $product->slug) }}" class="ld-card-title">{{$product->title}}</a>
                                    <a href="javascript:;"  class="ld-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                        <span class="ld-card-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 4.49533C13.095 3.48613 14.5211 2.91919 16.0098 2.91919C17.6174 2.91919 19.152 3.58025 20.2756 4.74537C21.3912 5.90127 22.0123 7.45944 22.0123 9.07763C22.0123 10.6959 21.3911 12.2541 20.2756 13.4099C19.5339 14.1788 18.7932 14.9652 18.0488 15.7556C16.5367 17.3612 15.0084 18.984 13.4209 20.5128L13.4172 20.5164C12.5985 21.2932 11.3019 21.265 10.5182 20.4527L3.72382 13.4098C1.40906 11.0104 1.40906 7.14489 3.72382 4.74547C5.98897 2.39747 9.63654 2.3141 11.9999 4.49533Z" fill="#828282"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>

                                
                                <div class="d-flex gap-3 justify-content-between align-items-center">
                                     @if ($product->is_discounted()->exists())
                                        @if ($product->is_discounted->discount_type == 'flat')
                                            <div class="d-flex align-items-baseline gap-2">
                                                <h6 class="ld-current-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                            </div>
                                        @else
                                            @php
                                                $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                            @endphp
                                            <div class="d-flex align-items-baseline gap-2">
                                                <h6 class="ld-current-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                    <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                            </div>
                                            
                                        @endif
                                    @else
                                            <h6 class="ld-current-price">{{ currency($product->price) }}</h6>
                                    @endif
                                    <a href="javascript:;"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn mi-btn-dark">
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
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Limited Time Deal Area End  -->