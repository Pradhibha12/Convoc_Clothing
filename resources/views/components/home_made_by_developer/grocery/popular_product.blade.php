{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Popular Product Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center builder-editable" builder-identity="1">{{ get_phrase('Popular Products') }}</h1>
            </div>
        </div>
        <div class="row gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @php 
                $popular_products = App\Models\Product::where('status', 1)->latest()->take(4)->get();
                @endphp
            @foreach ($popular_products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="product-md-card">
                        <div class="product-md-banner">
                            @if ($product->is_discounted()->exists())
                                @php
                                    $discount = $product->is_discounted;
                                    if ($discount->discount_type === 'percentage') {
                                        $discount_text = $discount->discount_value . '% OFF';
                                    } else { // flat
                                        $discount_text = currency($discount->discount_value) . ' FLAT';
                                    }
                                @endphp
                                <p class="product-discount-badge1 capitalize">{{ $discount_text }}</p>
                             @endif
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                            
                            <div class="view-bookmark-md-wrap">
                                <a href="javascript:void(0)" class="dark-light-iconbtn"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Quick View')}}" aria-describedby="tooltip276572">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="white"/>
                                            <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="white"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:void(0)"   class="dark-light-iconbtn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}" aria-describedby="tooltip276572">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="white"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="product-md-details">
                            <a href="{{ route('product', $product->slug) }}" class="al-title-16px text-link mb-12px">{{ $product->title }}</a>
                            <div class="d-flex align-items-center gap-1 flex-wrap mb-1">
                                <div class="d-flex align-items-center gap-3px">
                                     @php
                                        $rating = $product->average_rating;
                                        $fullStars = floor($rating); // full stars count
                                        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                        $emptyStars = 5 - ($fullStars + $halfStar);
                                    @endphp
                                     @for($i = 0; $i < $fullStars; $i++)
                                    <span class="svg-block">
                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.3393 6.07823L10.7472 7.61265C10.5285 7.82301 10.3801 8.24374 10.4254 8.54485L10.6729 10.3433C10.8338 11.4941 10.1202 11.9932 9.089 11.457L7.34009 10.5412C7.04723 10.3886 6.56875 10.3969 6.28414 10.566L4.75384 11.4611C3.54528 12.1664 2.82344 11.6343 3.14517 10.2731L3.59478 8.37161C3.67727 8.02513 3.52466 7.55078 3.26479 7.31566L1.81699 6.0081C0.781671 5.07178 1.07041 4.22207 2.46458 4.11483L4.22999 3.98283C4.55998 3.95808 4.96008 3.69822 5.1127 3.40536L6.0284 1.6482C6.56875 0.62113 7.43908 0.625255 7.96293 1.66058L8.77964 3.27749C8.91988 3.54973 9.27461 3.81372 9.57572 3.85909L11.7619 4.21382C12.9415 4.41181 13.2014 5.24914 12.3393 6.07823Z" fill="#FBBF27"/>
                                        </svg>
                                    </span>
                                    @endfor
                                    {{-- Half Star --}}
                                        @if($halfStar)
                                            <span class="svg-block">
                                                <svg width="14" height="15" viewBox="0 0 14 15" xmlns="http://www.w3.org/2000/svg">
                                                    <defs>
                                                        <linearGradient id="halfStarGradient">
                                                            <stop offset="50%" stop-color="#FBBF27" />
                                                            <stop offset="50%" stop-color="transparent" />
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M12.3393 6.07823L10.7472 7.61265C10.5285 7.82301 10.3801 8.24374 10.4254 8.54485L10.6729 10.3433C10.8338 11.4941 10.1202 11.9932 9.089 11.457L7.34009 10.5412C7.04723 10.3886 6.56875 10.3969 6.28414 10.566L4.75384 11.4611C3.54528 12.1664 2.82344 11.6343 3.14517 10.2731L3.59478 8.37161C3.67727 8.02513 3.52466 7.55078 3.26479 7.31566L1.81699 6.0081C0.781671 5.07178 1.07041 4.22207 2.46458 4.11483L4.22999 3.98283C4.55998 3.95808 4.96008 3.69822 5.1127 3.40536L6.0284 1.6482C6.56875 0.62113 7.43908 0.625255 7.96293 1.66058L8.77964 3.27749C8.91988 3.54973 9.27461 3.81372 9.57572 3.85909L11.7619 4.21382C12.9415 4.41181 13.2014 5.24914 12.3393 6.07823Z" fill="url(#halfStarGradient)" stroke="#FBBF27" stroke-width="0.5"/>
                                                </svg>
                                            </span>
                                        @endif
                                    @for($i = 0; $i < $emptyStars; $i++)
                                    <span class="svg-block mb-2px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                            <path d="M11.7968 5.96773L11.797 5.96755C12.1985 5.58137 12.2721 5.25849 12.2084 5.05289C12.1447 4.84721 11.9012 4.62231 11.3521 4.53C11.3519 4.52997 11.3516 4.52993 11.3514 4.52989L9.16792 4.17559C8.96666 4.14493 8.76593 4.04607 8.60027 3.92435C8.43383 3.80205 8.28043 3.64027 8.18834 3.4615L8.18742 3.45973L8.18743 3.45973L7.3708 1.84296C7.37078 1.84293 7.37077 1.8429 7.37075 1.84286C7.37074 1.84284 7.37073 1.84283 7.37072 1.84281C7.12863 1.36442 6.84703 1.20178 6.63133 1.20051C6.41521 1.19923 6.13066 1.35904 5.88082 1.8337C5.88074 1.83384 5.88067 1.83398 5.88059 1.83412L4.96534 3.59042C4.864 3.78489 4.69094 3.95243 4.50545 4.07351C4.31983 4.19467 4.09721 4.28533 3.87964 4.30165L3.87958 4.30166L2.1147 4.43361C2.11462 4.43362 2.11453 4.43362 2.11444 4.43363C1.43959 4.48559 1.16273 4.70907 1.09726 4.90084C1.03177 5.09272 1.11437 5.43883 1.6155 5.89209L11.7968 5.96773ZM11.7968 5.96773L10.2048 7.50202M11.7968 5.96773L4.25877 11.3147L5.78738 10.4206C5.78766 10.4204 5.78795 10.4203 5.78823 10.4201C5.97737 10.308 6.21321 10.2573 6.43459 10.2525C6.6565 10.2478 6.89353 10.2885 7.08656 10.3891L7.08699 10.3893L8.83528 11.3047C8.83538 11.3047 8.83547 11.3048 8.83557 11.3048C9.31253 11.5528 9.63816 11.522 9.81529 11.3976C9.99191 11.2737 10.1306 10.9794 10.0563 10.4474L10.0562 10.4469L9.8089 8.64986C9.77895 8.44847 9.81451 8.22662 9.8821 8.03216C9.94996 7.83691 10.0597 7.64159 10.2048 7.50202M10.2048 7.50202L10.3781 7.68217M10.2048 7.50202L10.2046 7.50216L10.3781 7.68217M10.3781 7.68217L11.9703 6.14775L10.0564 8.61437C10.011 8.31326 10.1595 7.89253 10.3781 7.68217ZM3.0633 7.19965L1.61563 5.8922L4.25857 11.3148C3.67319 11.6564 3.31786 11.6306 3.15505 11.5104C2.99256 11.3905 2.86358 11.0595 3.01941 10.4002C3.01941 10.4002 3.01941 10.4002 3.01941 10.4002L3.46892 8.49903C3.46894 8.49894 3.46897 8.49884 3.46899 8.49874C3.52317 8.2709 3.49769 8.01866 3.42754 7.7962C3.35735 7.57365 3.23401 7.3541 3.06347 7.1998L3.0633 7.19965Z" stroke="#FBBF27" stroke-width="0.5"/>
                                        </svg>
                                    </span>
                                    @endfor

                                </div>
                                <p class="al-title2-12px">{{ $product->average_rating ?? 0 }} <span class="ec-text-gray">({{ $product->reviews->count() }})</span></p>
                            </div>
                            <div class="d-flex align-items-end gap-3 justify-content-between flex-wrap">
                                <div class="d-flex align-items-center gap-2 ">
                                      @if ($product->is_discounted()->exists())
                                        @if ($product->is_discounted->discount_type == 'flat')
                                            <div class="d-flex gap-2">
                                                <h6 class="al-title-18px">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                <h6 class="al-title-16px fw-medium ec-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                            </div>
                                        @else
                                            @php
                                                $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                            @endphp
                                            <div class="d-flex gap-2">
                                                <h6 class="al-title-18px"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                    <h6 class="al-title-16px fw-medium ec-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                            </div>
                                            
                                        @endif
                                    @else
                                            <h6 class="al-title-18px">{{ currency($product->price) }}</h6>
                                    @endif
                                </div>
                                <a href="{{ route('product', $product->slug) }}" class="btn ec-sm2-btn-dark text-capitalize">
                                    <span >{{get_phrase('Shop Now')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{route('all_products')}}" class="btn ec-btn-outline-dark pe-4 icon-right">
                        <span class="builder-editable" builder-identity="2">{{get_phrase('View All')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46969L12.2802 3.21969C12.1388 3.08307 11.9493 3.00747 11.7527 3.00918C11.5561 3.01089 11.3679 3.08977 11.2289 3.22883C11.0898 3.36788 11.011 3.55599 11.0092 3.75264C11.0075 3.94929 11.0831 4.13874 11.2198 4.28019L15.1895 8.24994H2C1.80109 8.24994 1.61032 8.32896 1.46967 8.46961C1.32902 8.61026 1.25 8.80103 1.25 8.99994C1.25 9.19885 1.32902 9.38962 1.46967 9.53027C1.61032 9.67092 1.80109 9.74994 2 9.74994H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8716 11.0517 13.9631C11.0124 14.0546 10.9917 14.1531 10.9908 14.2526C10.9899 14.3522 11.0089 14.451 11.0466 14.5432C11.0843 14.6353 11.14 14.7191 11.2105 14.7895C11.2809 14.8599 11.3646 14.9156 11.4568 14.9533C11.549 14.991 11.6477 15.01 11.7473 15.0091C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8518 12.2802 14.7802L17.5303 9.53019C17.6709 9.38954 17.7498 9.19881 17.7498 8.99994C17.7498 8.80107 17.6709 8.61034 17.5303 8.46969Z" fill="#0F1311"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Product Area End -->