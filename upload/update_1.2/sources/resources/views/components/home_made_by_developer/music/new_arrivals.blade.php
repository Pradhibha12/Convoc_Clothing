{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

   <!-- New Arrivals Products Area Start  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="nap-section-title-area">
                        <h2 class="section-title text-center mb-18px max-w-851px mx-auto wow animate__fadeInUp builder-editable" builder-identity="MN1"  data-wow-delay=".1s">{{get_phrase('Check Out Our New Arrivals Products')}}</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto nap-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="MN2" data-wow-delay=".2s">{{get_phrase('Discover the latest from Yamaha, Fender, Roland & more.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn mi-btn-outline-dark builder-editable" builder-identity="MN3">{{get_phrase('View all')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-grid-row wow animate__fadeInUp" data-wow-delay=".4s">
                @php 
                    $products = App\Models\Product::where('status', 1)->take(6)->get();
                @endphp
                @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product-card">
                        <div class="pc-banner-wrap">
                            <!-- Swiper -->
                            <div class="swiper pc-banner-slider">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="pc-banner-slide">
                                            @php
                                                $thumbnails = json_decode($product->thumbnail, true);
                                                $firstImage = $thumbnails[0] ?? null;
                                            @endphp
                                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                        </div>
                                    </div>
                                   
                                </div>
                               
                            </div>
                            <div class="pc-banner-icons">
                                <a  href="javascript:;"  class="product-card-wishlist mb-10px {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4368 2.83259C13.7971 1.579 15.5686 0.874756 17.4178 0.874756C19.4147 0.874756 21.321 1.69591 22.7167 3.14318C24.1024 4.579 24.8739 6.51452 24.8739 8.52459C24.8739 10.5347 24.1023 12.4704 22.7167 13.906C21.7953 14.8611 20.8753 15.8379 19.9506 16.8198C18.0723 18.8142 16.1739 20.8299 14.2019 22.729L14.1973 22.7334C13.1804 23.6984 11.5698 23.6634 10.5963 22.6543L2.15652 13.9059C-0.718808 10.9254 -0.718808 6.1238 2.15652 3.14331C4.97022 0.226694 9.50113 0.123126 12.4368 2.83259Z" fill="#828282"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="product-card-view mb-10px">
                                    <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="{{'Quick View'}}">
                                        <svg width="23" height="14" viewBox="0 0 23 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.55115 7.83139C5.60794 -1.1837 17.7783 -1.1837 21.8351 7.83139" stroke="black" stroke-width="2.0284" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.693 12.3394C9.8259 12.3394 8.31238 10.8259 8.31238 8.95878C8.31238 7.09165 9.8259 5.57812 11.693 5.57812C13.5602 5.57812 15.0737 7.09165 15.0737 8.95878C15.0737 10.8259 13.5602 12.3394 11.693 12.3394Z" stroke="black" stroke-width="2.0284" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                               
                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="d-flex gap-3 justify-content-between pc-title-price">
                                <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                             
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
                            <p class="product-card-subtitle"> {{ \Illuminate\Support\Str::limit($product->summary, 90, '...') }}</p>
                            <a href="{{ route('product', $product->slug) }}"  class="product-card-btn">
                                    {{  get_phrase('Shop Now')}}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- New Arrivals Products Area End  -->