{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Best Sellers Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-40px">
                        <p class="title-badge mx-auto mb-28px wow animate__fadeInUp builder-editable" builder-identity="COBE1" data-wow-delay=".1s">{{get_phrase('Best Sellers')}}</p>
                        <h2 class="section-title text-center mb-22px max-w-867px mx-auto wow animate__fadeInUp builder-editable" builder-identity="COBE2" data-wow-delay=".2s">{{get_phrase('What Everyone’s Brewing Right Now')}}</h2>
                        <p class="section-subtitle text-center max-w-621px mx-auto wow animate__fadeInUp builder-editable" builder-identity="COBE3" data-wow-delay=".3s">{{get_phrase('Discover what our community is loving right now — from rich coffee blends and soothing teas to must-have brewing tools and eco-friendly accessories. Tried, loved, and reordered often.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row gx-17px gy-4 justify-content-center bs-product-row wow animate__fadeInUp" data-wow-delay=".4s">
                @php 
                    $products = \App\Models\Product::where('status', 1)->latest()->take(6)->get();
                @endphp
                 @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product-card">
                        <div class="product-card-banner">
                            <a href="javascript:;" class="pc-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9999 1.73567C12.203 0.624328 13.7699 0 15.4054 0C17.1716 0 18.8576 0.727969 20.092 2.01102C21.3177 3.28391 22 4.99979 22 6.78176C22 8.5638 21.3176 10.2798 20.092 11.5525C19.2771 12.3993 18.4634 13.2652 17.6455 14.1357C15.9843 15.9038 14.3052 17.6908 12.5611 19.3744L12.557 19.3783C11.6575 20.2337 10.2331 20.2027 9.372 19.3081L1.90734 11.5524C-0.63578 8.91015 -0.63578 4.65341 1.90734 2.01113C4.39596 -0.574523 8.40338 -0.666338 10.9999 1.73567Z" fill="#1B1107"/>
                                    </svg>
                                </span>
                            </a>
                            <a onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="pc-card-view">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Quick View')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M3.10498 11.8772C6.26288 4.85963 15.7366 4.85963 18.8945 11.8772" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.9997 15.386C9.54632 15.386 8.36816 14.2078 8.36816 12.7544C8.36816 11.301 9.54632 10.1228 10.9997 10.1228C12.4532 10.1228 13.6313 11.301 13.6313 12.7544C13.6313 14.2078 12.4532 15.386 10.9997 15.386Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </a>
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            <a href="{{ route('product', $product->slug) }}" class="pc-card-btn">{{get_phrase('Shop Now')}}</a>
                        </div>

                        <div class="d-flex justify-content-between">
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
                                
                                <div class="d-flex align-items-center gap-1 justify-content-center">
                                    <div class="pc-star">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                            <path d="M9 0L11.5498 5.49048L17.5595 6.21885L13.1257 10.3405L14.2901 16.2812L9 13.338L3.70993 16.2812L4.87432 10.3405L0.440492 6.21885L6.45019 5.49048L9 0Z" fill="#FFC633"/>
                                        </svg>
                                    </div>
                                    <p class="pc-total-rating">{{ number_format($product->average_rating, 1) }}</p>
                                </div> 
                         </div>

                        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 30, '...') }}</a>
                        <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 70, '...') }}</p>
                         
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn cts-btn-outline-black builder-editable" builder-identity="COBE8">{{get_phrase('Explore Collection')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best Sellers Area End -->