{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Popular Product Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp builder-editable" builder-identity="FP1" data-wow-delay=".1s">{{get_phrase('Popular Products')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-40px wow animate__fadeInUp" data-wow-delay=".2s">
            @php
                $products = App\Models\Product::where('status', 1)->where('label', 'top-seller')->orderBy('id', 'DESC')->take(8)->get();
             @endphp 
             @foreach($products as $product)  
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
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
                                @if ($product->is_discounted)
                                @php
                                    $discount = $product->discount;
                                @endphp
                                @if ($discount->discount_type == 'percentage')
                                    <h4 class="al-title2-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                        <h4 class="al-title-16px fw-medium ec-text-secondary"><del>{{ currency($product->price) }}</del></h4>
                                @else
                                    <h4 class="al-title2-18px">{{ currency($product->price) }}</h4>
                                @endif
                                @else
                                    <h4 class="al-title2-18px">{{ currency($product->price) }}</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row section-margin">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{route('all_products')}}" class="btn ec-btn-outline-skin">
                        <span class="builder-editable" builder-identity="FP2">{{get_phrase('View All')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46981L12.2802 3.21981C12.1388 3.08319 11.9493 3.0076 11.7527 3.00931C11.5561 3.01101 11.3679 3.08989 11.2289 3.22895C11.0898 3.368 11.011 3.55611 11.0092 3.75276C11.0075 3.94941 11.0831 4.13886 11.2198 4.28031L15.1895 8.25006H2C1.80109 8.25006 1.61032 8.32908 1.46967 8.46973C1.32902 8.61038 1.25 8.80115 1.25 9.00006C1.25 9.19897 1.32902 9.38974 1.46967 9.53039C1.61032 9.67104 1.80109 9.75006 2 9.75006H15.1895L11.2198 13.7198C11.1481 13.789 11.091 13.8718 11.0517 13.9633C11.0124 14.0548 10.9917 14.1532 10.9908 14.2528C10.9899 14.3523 11.0089 14.4511 11.0466 14.5433C11.0843 14.6354 11.14 14.7192 11.2105 14.7896C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0084 11.9453 14.9877 12.0368 14.9484C12.1283 14.9091 12.2111 14.8519 12.2802 14.7803L17.5303 9.53031C17.6709 9.38967 17.7498 9.19893 17.7498 9.00006C17.7498 8.80119 17.6709 8.61046 17.5303 8.46981Z" fill="#2C3E50"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Product Area End -->