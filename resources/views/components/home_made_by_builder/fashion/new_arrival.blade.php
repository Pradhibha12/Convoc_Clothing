
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- New Arrivals Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp  builder-editable" builder-identity="19" data-wow-delay=".2s">{{ get_phrase('New Arrivals') }}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @php 
                $latest_products = App\Models\Product::where('status', 1)->latest()->take(4)->get();
            @endphp
            @foreach ($latest_products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="d-block product-grid-md">
                        <div>
                            <div class="product-grid-banner-md mb-12px">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                @if ($product->is_discounted()->exists())
                                    @php
                                        $discount = $product->is_discounted;
                                        if ($discount->discount_type === 'percentage') {
                                            $discount_text = $discount->discount_value . '% OFF';
                                        } else { // flat
                                            $discount_text = currency($discount->discount_value) . ' FLAT';
                                        }
                                    @endphp

                                    <p class="red-badge-md capitalize">{{ $discount_text }}</p>
                                @endif
                                <a href="{{ route('product', $product->slug) }}" class="btn fsh-btn-dark product-cart-btn-md">{{get_phrase('Show Now')}}</a>
                                 <a href="javascript:void(0)" class="product-wishlist-btn {{ wishlist_class($product->id) }}" onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist" data-bs-placement="left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 20 20" fill="none">
                                            <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="#0D0E10"></path>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:void(0)" class="product-quickview-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View" data-bs-placement="left">
                                        <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="#0D0E10"></path>
                                            <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="#0D0E10"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('product', $product->slug) }}" class="al-title-16px mb-12px product-title-link">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</a>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-start gap-1 mb-12px">
                                       <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="">
                                        <h6 class="al-title-12px fw-medium">{{ $product->average_rating ?? 0 }}</h6>
                                    </div>
                                    <div class="d-flex align-items-start gap-2">
                                        @if ($product->is_discounted()->exists())
                                                @if ($product->is_discounted->discount_type == 'flat')
                                                    <div class="d-flex gap-2">
                                                        <h6 class="al-title-16px">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                        <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                    </div>
                                                @else
                                                    @php
                                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                                    @endphp
                                                    <div class="d-flex gap-2">
                                                       <h6 class="al-title-16px"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                         <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                    </div>
                                                    
                                                @endif
                                            @else
                                                 <h6 class="al-title-16px">{{ currency($product->price) }}</h6>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mb-100px">
            <div class="col-12">
                <div class="text-center wow animate__fadeInUp" data-wow-delay=".2s">
                    <a href="{{route('all_products')}}" class="btn fsh-btn-dark pe-4 icon-right">
                        <span class="builder-editable" builder-identity="20">{{ get_phrase('Show More') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewbox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- New Arrivals Area End -->