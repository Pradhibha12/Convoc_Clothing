{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Start Featured Product -->
<section>
    <div class="container section-mb">
        <div class="row">
            <div class="col-12">
                <div class="featured-title-area">
                    <p class="title-badge mb-30px wow animate__fadeInUp builder-editable" builder-identity="sP1" data-wow-delay=".1s">{{get_phrase('Featured Products')}}</p>
                    <div class="d-flex justify-content-between flex-wrap gap-3">
                        <div class="featured-title-left">
                            <h2 class="section-title text-capitalize wow animate__fadeInUp builder-editable" builder-identity="sP2" data-wow-delay=".2s">{{get_phrase('our best-selling shoes blend timeless style!')}}</h2>
                        </div>
                        <div class="featured-title-right">
                            <p class="section-subtitle text-capitalize mb-30px wow animate__fadeInUp builder-editable" builder-identity="sP3" data-wow-delay=".3s">{{get_phrase('Step into what everyone’s loving our best-selling shoes blend timeless style, next-level comfort & quality that lasts.')}}</p>
                            <a href="{{route('all_products')}}" class="btn sh1b2-btn-dark wow animate__fadeInUp builder-editable" builder-identity="sP4" data-wow-delay=".4s">{{get_phrase('See More')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-20px wow animate__fadeInUp" data-wow-delay=".2s">
              @php 
               $featureProducts = App\Models\Product::where('status', 1)->where('label', 'featured')->latest()->take(3)->get(); 
            @endphp
            @foreach($featureProducts as $product)  
            <div class="col-lg-4 col-md-6">
                <div class="sh1-product-card">
                    <div class="d-flex align-items-start gap-2 justify-content-between mb-18px">
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 30, '...') }}</a>
                        <a href="javascript:;"  class="product-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}" aria-describedby="tooltip276572">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.8298 1.48035C17.6626 1.48035 19.9646 3.7877 19.9646 6.64539C19.9646 7.65303 19.8238 8.59277 19.575 9.47253L19.4617 9.84558L19.4607 9.84949C18.6959 12.2696 17.1293 14.2203 15.4382 15.6737C13.9563 16.9473 12.4007 17.8199 11.2595 18.2821L10.7976 18.455L10.7927 18.4569C10.6907 18.4929 10.5229 18.5194 10.3308 18.5194C10.1867 18.5194 10.056 18.505 9.95679 18.4823L9.8689 18.4569L9.86304 18.455L9.40112 18.2821C8.26005 17.82 6.70514 16.9471 5.22339 15.6737C3.63789 14.3111 2.16086 12.5116 1.35229 10.2977L1.19995 9.84949L1.19897 9.84558L1.08569 9.47253C0.836834 8.59279 0.696045 7.65301 0.696045 6.64539C0.696084 3.7877 2.99806 1.48035 5.83081 1.48035C7.5002 1.48037 8.99679 2.292 9.93042 3.53992L10.3308 4.07507L10.7312 3.53992C11.6648 2.29213 13.1606 1.48042 14.8298 1.48035Z" stroke="black" />
                            </svg>
                        </a>
                    </div>
                    <!-- Swiper -->
                    <div class="swiper product-card-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-card-slide">
                                    @php
                                        $thumbnails = json_decode($product->thumbnail, true);
                                        $firstImage = $thumbnails[0] ?? null;
                                    @endphp
                                    <img class="product" src="{{ get_image($firstImage) }}" alt="shoe">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div class="d-flex align-items-center column-gap-10px row-gap-1 flex-wrap">
                            @if ($product->is_discounted)
                                @php
                                    $discount = $product->discount;
                                @endphp
                                @if ($discount->discount_type == 'percentage')
                                   <h3 class="product-card-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h3>
                                @else
                                    <h3 class="product-card-price">{{ currency($discount->discount_value) }}</h3>
                                @endif
                                @else
                                    <h3 class="product-card-price">{{ currency($product->price) }}</h3>
                                @endif
                            <div class="d-flex align-items-center gap-1">
                                <span class="product-card-star">
                                    <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.57121 8.18081L11.951 1.37288C12.3848 0.498917 13.6384 0.498917 14.0722 1.37288L17.4519 8.18081L25.0102 9.27925C25.98 9.42018 26.3664 10.6054 25.6644 11.2853L20.1962 16.5809L21.4867 24.062C21.6524 25.0228 20.6382 25.7553 19.7705 25.3016L13.0116 21.7675L6.25268 25.3016C5.38498 25.7553 4.37071 25.0228 4.53643 24.062L5.82691 16.5809L0.358797 11.2853C-0.343282 10.6054 0.0432269 9.42018 1.01298 9.27925L8.57121 8.18081Z" fill="#FFC416" />
                                    </svg>
                                </span> 
                                <h4 class="product-card-rating">{{ number_format($product->average_rating, 1) }}</h4>
                            </div>
                        </div>
                        <a href="{{ route('product', $product->slug) }}" class="btn sh1-sm-btn-dark text-nowrap">{{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Featured Product -->