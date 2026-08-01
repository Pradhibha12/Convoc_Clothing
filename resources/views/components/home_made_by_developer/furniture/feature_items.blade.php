{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Most Popular Items Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp builder-editable" builder-identity="FM1" data-wow-delay=".1s">{{get_phrase('Featured Items')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 align-items-center section-margin">
            <div class="col-lg-4 col-md-5  wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="offer-ads-card">
                    <img class="banner builder-editable" builder-identity="FM2"  src="{{ asset('assets/frontend/furniture/images/all-images/offer-ads-banner.webp') }}" alt="banner">
                    <div class="offer-ads-content">
                        <h4 class="al-title-20px fw-medium text-white mb-6px builder-editable" builder-identity="FM3">{{get_phrase('Limited Price Offer! ')}}</h4>
                        <h1 class="oads-title builder-editable" builder-identity="FM4">{{get_phrase('Summer Sale Offer')}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7  wow animate__fadeInUp" data-wow-delay=".3s">
                <!-- Swiper -->
                <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                        @php
                            $featuredProducts = App\Models\Product::where('status', 1)->where('label', 'featured')->orderBy('id', 'DESC')->get();
                        @endphp 
                        @foreach($featuredProducts as $product)  
                        <div class="swiper-slide">
                           <div class="product-md-card">
                                    <div class="product-md-banner mb-3">
                                        @php
                                            $thumbnails = json_decode($product->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                        <div class="product-md-buttons">
                                            <a href="javascript:;"  class="white-icon-btn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                                <span class="d-flex align-items-center justify-content-center w-100 h-100" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 16.2375C8.7675 16.2375 8.5425 16.2075 8.355 16.14C5.49 15.1575 0.9375 11.67 0.9375 6.5175C0.9375 3.8925 3.06 1.7625 5.67 1.7625C6.9375 1.7625 8.1225 2.2575 9 3.1425C9.8775 2.2575 11.0625 1.7625 12.33 1.7625C14.94 1.7625 17.0625 3.9 17.0625 6.5175C17.0625 11.6775 12.51 15.1575 9.645 16.14C9.4575 16.2075 9.2325 16.2375 9 16.2375ZM5.67 2.8875C3.6825 2.8875 2.0625 4.515 2.0625 6.5175C2.0625 11.64 6.99 14.49 8.7225 15.0825C8.8575 15.1275 9.15 15.1275 9.285 15.0825C11.01 14.49 15.945 11.6475 15.945 6.5175C15.945 4.515 14.325 2.8875 12.3375 2.8875C11.1975 2.8875 10.14 3.42 9.4575 4.3425C9.2475 4.6275 8.7675 4.6275 8.5575 4.3425C7.86 3.4125 6.81 2.8875 5.67 2.8875Z" fill="#15191D"/>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)" class="white-icon-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <span class="d-flex align-items-center justify-content-center w-100 h-100" data-bs-toggle="tooltip" data-bs-title="Quick View">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.00043 12.247C7.20793 12.247 5.75293 10.792 5.75293 8.99954C5.75293 7.20704 7.20793 5.75204 9.00043 5.75204C10.7929 5.75204 12.2479 7.20704 12.2479 8.99954C12.2479 10.792 10.7929 12.247 9.00043 12.247ZM9.00043 6.87704C7.83043 6.87704 6.87793 7.82954 6.87793 8.99954C6.87793 10.1695 7.83043 11.122 9.00043 11.122C10.1704 11.122 11.1229 10.1695 11.1229 8.99954C11.1229 7.82954 10.1704 6.87704 9.00043 6.87704Z" fill="#15191D"/>
                                                        <path d="M8.99908 15.7651C6.17908 15.7651 3.51658 14.1151 1.68658 11.2501C0.891582 10.0126 0.891582 7.99509 1.68658 6.75009C3.52408 3.88509 6.18658 2.23509 8.99908 2.23509C11.8116 2.23509 14.4741 3.88509 16.3041 6.75009C17.0991 7.98759 17.0991 10.0051 16.3041 11.2501C14.4741 14.1151 11.8116 15.7651 8.99908 15.7651ZM8.99908 3.36009C6.57658 3.36009 4.25908 4.81509 2.63908 7.35759C2.07658 8.23509 2.07658 9.76509 2.63908 10.6426C4.25908 13.1851 6.57658 14.6401 8.99908 14.6401C11.4216 14.6401 13.7391 13.1851 15.3591 10.6426C15.9216 9.76509 15.9216 8.23509 15.3591 7.35759C13.7391 4.81509 11.4216 3.36009 8.99908 3.36009Z" fill="#15191D"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-md-details">
                                        <div class="d-flex align-items-center gap-1 mb-2">
                                            <span class="svg-block">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.3393 6.00541L10.7472 7.53983C10.5285 7.7502 10.3801 8.17093 10.4254 8.47203L10.6729 10.2704C10.8338 11.4213 10.1202 11.9204 9.089 11.3841L7.34009 10.4684C7.04723 10.3158 6.56875 10.3241 6.28414 10.4932L4.75384 11.3883C3.54528 12.0936 2.82344 11.5615 3.14517 10.2003L3.59478 8.29879C3.67727 7.95231 3.52466 7.47796 3.26479 7.24285L1.81699 5.93529C0.781671 4.99896 1.07041 4.14926 2.46458 4.04201L4.22999 3.91002C4.55998 3.88527 4.96008 3.62541 5.1127 3.33255L6.0284 1.57539C6.56875 0.548315 7.43908 0.55244 7.96293 1.58776L8.77964 3.20468C8.91988 3.47692 9.27461 3.7409 9.57572 3.78627L11.7619 4.14101C12.9415 4.339 13.2014 5.17633 12.3393 6.00541Z" fill="#FBBF27"/>
                                                </svg>
                                            </span>
                                            <span class="al-subtitle2-14px">({{ $product->reviews->count() }}) {{get_phrase('Reviews')}}</span>
                                        </div>
                                        <a href="{{ route('product', $product->slug) }}" class="al-title-16px text-link mb-20px">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</a>
                                        <div class="d-flex align-items-start gap-2 flex-wrap justify-content-between">
                                            <div class="d-flex align-items-start gap-2">
                                                 @if ($product->is_discounted()->exists())
                                                        @if ($product->is_discounted->discount_type == 'flat')
                                                            <div class="d-flex gap-2">
                                                                <h6 class="al-title2-18px">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                                <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                            </div>
                                                        @else
                                                            @php
                                                                $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                                            @endphp
                                                            <div class="d-flex gap-2">
                                                                <h6 class="al-title2-18px"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                                    <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                            </div>
                                                            
                                                        @endif
                                                    @else
                                                            <h6 class="al-title2-18px">{{ currency($product->price) }}</h6>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="product-slider-navigation">
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                <path d="M0.969749 9.31234L6.21975 4.06234C6.3612 3.92572 6.55065 3.85013 6.7473 3.85183C6.94395 3.85354 7.13206 3.93242 7.27111 4.07148C7.41017 4.21053 7.48905 4.39864 7.49076 4.59529C7.49246 4.79194 7.41687 4.98139 7.28025 5.12284L3.3105 9.09259H16.5C16.6989 9.09259 16.8897 9.17161 17.0303 9.31226C17.171 9.45291 17.25 9.64368 17.25 9.84259C17.25 10.0415 17.171 10.2323 17.0303 10.3729C16.8897 10.5136 16.6989 10.5926 16.5 10.5926H3.3105L7.28025 14.5623C7.35188 14.6315 7.40902 14.7143 7.44833 14.8058C7.48763 14.8973 7.50832 14.9957 7.50919 15.0953C7.51005 15.1949 7.49108 15.2936 7.45337 15.3858C7.41566 15.478 7.35997 15.5617 7.28955 15.6321C7.21913 15.7026 7.13539 15.7582 7.04322 15.796C6.95104 15.8337 6.85228 15.8526 6.7527 15.8518C6.65312 15.8509 6.5547 15.8302 6.4632 15.7909C6.37169 15.7516 6.28894 15.6945 6.21975 15.6228L0.969749 10.3728C0.829145 10.2322 0.75016 10.0415 0.75016 9.84259C0.75016 9.64372 0.829145 9.45299 0.969749 9.31234Z" fill="#2C3E50"/>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                <path d="M17.0303 9.31234L11.7802 4.06234C11.6388 3.92572 11.4493 3.85013 11.2527 3.85183C11.0561 3.85354 10.8679 3.93242 10.7289 4.07148C10.5898 4.21053 10.511 4.39864 10.5092 4.59529C10.5075 4.79194 10.5831 4.98139 10.7198 5.12284L14.6895 9.09259H1.5C1.30109 9.09259 1.11032 9.17161 0.96967 9.31226C0.829018 9.45291 0.75 9.64368 0.75 9.84259C0.75 10.0415 0.829018 10.2323 0.96967 10.3729C1.11032 10.5136 1.30109 10.5926 1.5 10.5926H14.6895L10.7198 14.5623C10.6481 14.6315 10.591 14.7143 10.5517 14.8058C10.5124 14.8973 10.4917 14.9957 10.4908 15.0953C10.4899 15.1949 10.5089 15.2936 10.5466 15.3858C10.5843 15.478 10.64 15.5617 10.7105 15.6321C10.7809 15.7026 10.8646 15.7582 10.9568 15.796C11.049 15.8337 11.1477 15.8526 11.2473 15.8518C11.3469 15.8509 11.4453 15.8302 11.5368 15.7909C11.6283 15.7516 11.7111 15.6945 11.7802 15.6228L17.0303 10.3728C17.1709 10.2322 17.2498 10.0415 17.2498 9.84259C17.2498 9.64372 17.1709 9.45299 17.0303 9.31234Z" fill="#2C3E50"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Most Popular Items Area End -->