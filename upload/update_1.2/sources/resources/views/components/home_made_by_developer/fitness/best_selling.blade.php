{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Start Our Best Selling products -->
<section>
    <div class="container section-pb">
        <div class="row mb-30px">
            <div class="col-12">
                <p class="sml-title-badge wow animate__fadeInUp builder-editable" builder-identity="FS1" data-wow-delay=".1s">{{get_phrase('Our Best Selling products')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="bsp-title-area">
                    <h2 class="section-title bsp-title wow animate__fadeInUp builder-editable" builder-identity="FS2" data-wow-delay=".2s">{{get_phrase('Our Most Popular Products All in One Place.')}}</h2>
                    <div class="bsp-title-right">
                        <p class="section-subtitle mb-30px wow animate__fadeInUp builder-editable" builder-identity="FS3" data-wow-delay=".3s">{{get_phrase('Our best-selling products, loved by thousands of fitness enthusiasts. Handpicked for performance, durability, and results.')}}</p>
                        <a href="{{route('all_products')}}" class="btn fn-btn-skin gap-12px px-3 wow animate__fadeInUp" data-wow-delay=".5s">
                            <span class="builder-editable" builder-identity="FS4">{{get_phrase('Explore All Products')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                        @php 
                            $allproduct =App\Models\Product::where('status', 1)->latest()->get();
                        @endphp
                        @foreach($allproduct as $product)
                        <div class="swiper-slide">
                            <div class="single-product-card">
                                <div class="pc-slider-wrap">
                                    <!-- Swiper -->
                                    <div class="swiper pc-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="pc-slider-image">
                                                    @php
                                                        $thumbnails = json_decode($product->thumbnail, true);
                                                        $firstImage = $thumbnails[0] ?? null;
                                                    @endphp
                                                    <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <a href="javascript:;"  class="pc-wishlist-btn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)" >
                                        <span class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.12158 8.25441C8.09142 7.28486 9.40664 6.74019 10.778 6.74019C12.1494 6.74019 13.4646 7.28486 14.4344 8.25441L15.9497 9.76844L17.4651 8.25441C17.9421 7.76045 18.5128 7.36646 19.1438 7.09541C19.7748 6.82437 20.4534 6.6817 21.1401 6.67573C21.8268 6.66977 22.5078 6.80062 23.1434 7.06066C23.779 7.3207 24.3564 7.70472 24.842 8.1903C25.3276 8.67589 25.7116 9.25333 25.9716 9.88892C26.2317 10.5245 26.3625 11.2055 26.3566 11.8922C26.3506 12.5789 26.2079 13.2576 25.9369 13.8885C25.6658 14.5195 25.2718 15.0902 24.7779 15.5672L15.9497 24.3967L7.12158 15.5672C6.15202 14.5974 5.60736 13.2822 5.60736 11.9108C5.60736 10.5395 6.15202 9.22425 7.12158 8.25441Z" fill="black"/>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="javascript:;"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="pc-addToCart-btn">
                                        <span class="d-flex align-items-center justify-content-center h-100 w-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Preview')}}">
                                           <svg width="27" height="27" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="#0D0E10"/>
                                        <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="#0D0E10"/>
                                         </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="pc-details-wrap">
                                    <div class="d-flex align-items-center justify-content-center gap-6px mb-3">
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
                                                    <path d="M12.1003 3.7688L14.7924 9.90566L21.1752 10.7014L16.4563 15.2899L17.7089 21.9186L12.1003 18.6175L6.49173 21.9186L7.74437 15.2899L3.02544 10.7014L9.40819 9.90566L12.1003 3.7688Z" fill="#FE6731"/>
                                                </svg>
                                            </div>
                                            @endfor
                                             @if($halfStar)
                                                <div class="svg-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                    <path d="M12.6993 3.7688L10.0072 9.90566L3.62445 10.7014L8.34339 15.2899L7.09074 21.9186L12.6993 18.6175V3.7688Z" fill="#FE6731"/>
                                                    <path d="M12.6994 18.6178L18.308 21.9188L17.0553 15.2901L21.7742 10.7016L15.3915 9.90591L12.6994 3.76904V18.6178Z" ffill="url(#halfStarGradient)" stroke="#FE6731" stroke-width="0.5"/>
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
                                    <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</a>
                                      @if ($product->is_discounted()->exists())
                                            @if ($product->is_discounted->discount_type == 'flat')
                                                <div class="d-flex justify-content-center align-items-baseline gap-2">
                                                    <h6 class="product-card-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                    <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                </div>
                                            @else
                                                @php
                                                    $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                                @endphp
                                                <div class="d-flex justify-content-center align-items-baseline gap-2">
                                                    <h6 class="product-card-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                        <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                </div>
                                                
                                            @endif
                                        @else
                                                <h6 class="product-card-price">{{ currency($product->price) }}</h6>
                                        @endif
                                      <div class="text-center">
                                        <a href="{{ route('product', $product->slug) }}" class="btn fn-btn-dark">
                                            <span>{{get_phrase('Shop Now!')}}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                <path d="M1.54944 8.40248L0.256366 8.40248L0.256366 10.9886L1.54944 10.9886L1.54944 8.40248ZM20.5668 10.6099C21.0718 10.1049 21.0718 9.28619 20.5668 8.78121L12.3377 0.552153C11.8328 0.0471764 11.014 0.0471765 10.509 0.552153C10.0041 1.05713 10.0041 1.87586 10.509 2.38083L17.8238 9.69556L10.5091 17.0103C10.0041 17.5153 10.0041 18.334 10.5091 18.839C11.014 19.3439 11.8328 19.3439 12.3377 18.839L20.5668 10.6099ZM1.54944 9.69556L1.54944 10.9886L19.6525 10.9886L19.6525 9.69556L19.6525 8.40248L1.54944 8.40248L1.54944 9.69556Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="product-slider-navs">
                        <div class="swiper-button-prev">
                            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.8985 10.9856L1.68114 10.9856M1.68114 10.9856L11.7005 20.7102M1.68114 10.9856L11.7005 1.26093" stroke="black" stroke-width="2.21014" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.9855 10.9854H23.2029M23.2029 10.9854L13.1836 1.26074M23.2029 10.9854L13.1836 20.71" stroke="black" stroke-width="2.21014" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Best Selling products -->