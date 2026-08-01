<!-- Banner Area Start -->
<section class="main-banner-section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-banner-area">
                    <div class="mb-2 text-center wow animate__fadeInUp" data-wow-delay=".1s">
                        <a href="javascript:;" class="btn ec-sm2-btn-success">{{ get_phrase('The Freshness') }}</a>
                    </div>
                    <h1 class="ml-title-60px max-w-837px mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{ get_phrase('Fresh Groceries') }} <span class="shape-title">{{ get_phrase('Delivered') }}</span> {{ get_phrase('to Your Door') }}</h1>
                    <div class="d-flex align-items-center gap-3 flex-wrap justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
                        <a href="{{route('all_products')}}" class="btn ec-dark-icon-btn">
                            <span>{{ get_phrase('Shop Now') }}</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M6.49994 4L10.4999 8L6.49994 12" stroke="#0F1311" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </a>
                        <a href="{{ get_settings('system_video') }}" class="play-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                            <span>
                                <svg width="50" height="49" viewBox="0 0 50 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="25" cy="24.5" r="24" stroke="#0F1311"/>
                                    <path d="M31.5625 22.9845C32.7292 23.658 32.7292 25.342 31.5625 26.0155L23.0313 30.9411C21.8646 31.6146 20.4062 30.7727 20.4062 29.4255L20.4062 19.5745C20.4062 18.2273 21.8646 17.3854 23.0312 18.0589L31.5625 22.9845Z" fill="#0F1311"/>
                                </svg>
                            </span>
                            <span>{{ get_phrase('Order Process') }}</span>
                        </a>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="d-flex align-items-start justify-content-between gap-3 flex-wrap main-banner-bottom">
                                <div class="fastest-delivery-badge wow animate__fadeInUp" data-wow-delay=".4s">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                            <path d="M15 28.4375C7.5875 28.4375 1.5625 22.4125 1.5625 15C1.5625 7.5875 7.5875 1.5625 15 1.5625C22.4125 1.5625 28.4375 7.5875 28.4375 15C28.4375 22.4125 22.4125 28.4375 15 28.4375ZM15 3.4375C8.625 3.4375 3.4375 8.625 3.4375 15C3.4375 21.375 8.625 26.5625 15 26.5625C21.375 26.5625 26.5625 21.375 26.5625 15C26.5625 8.625 21.375 3.4375 15 3.4375Z" fill="white"/>
                                            <path d="M19.6375 19.9125C19.475 19.9125 19.3125 19.875 19.1625 19.775L15.2875 17.4625C14.325 16.8875 13.6125 15.625 13.6125 14.5125V9.38751C13.6125 8.87501 14.0375 8.45001 14.55 8.45001C15.0625 8.45001 15.4875 8.87501 15.4875 9.38751V14.5125C15.4875 14.9625 15.8625 15.625 16.25 15.85L20.125 18.1625C20.575 18.425 20.7125 19 20.45 19.45C20.2625 19.75 19.95 19.9125 19.6375 19.9125Z" fill="white"/>
                                        </svg>
                                    </span>
                                    <p class="text">{{ get_phrase('Fastest Delivery') }}</p>
                                </div>
                                <div class="happy-customer-badge wow animate__fadeInUp" data-wow-delay=".5s">
                                    <ul class="d-flex align-items-center">
                                        @foreach($reviews->take(3) as $review)
                                        <li class="happy-customer-image">
                                            <img src="{{ get_image($review->user->photo) }}" alt="">
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div>
                                        <h4 class="al-title-16px text-capitalize happy-customer-title">{{ get_phrase('Our Happy Customer') }}</h4>
                                        <div class="d-flex align-items-center gap-1">
                                            <span class="svg-block">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.1021 6.8634L12.2824 8.61703C12.0326 8.85744 11.8629 9.33827 11.9147 9.6824L12.1976 11.7377C12.3814 13.0529 11.5659 13.6233 10.3874 13.0105L8.38864 11.964C8.05395 11.7896 7.50712 11.799 7.18185 11.9923L5.43294 13.0152C4.05172 13.8213 3.22676 13.2132 3.59446 11.6576L4.10829 9.48441C4.20257 9.08843 4.02815 8.54631 3.73117 8.27761L2.07654 6.78326C0.893312 5.71317 1.2233 4.74208 2.81664 4.61952L4.83425 4.46867C5.21138 4.44038 5.66864 4.1434 5.84306 3.8087L6.88958 1.80052C7.50712 0.62672 8.50178 0.631434 9.10046 1.81466L10.0338 3.66256C10.1941 3.97369 10.5995 4.27539 10.9437 4.32725L13.4421 4.73265C14.7903 4.95893 15.0873 5.91588 14.1021 6.8634Z" fill="#FBBF27"/>
                                                </svg>
                                            </span>
                                             @php
                                                $reviewCount = App\Models\Product::avg('average_rating');
                                                $reviewCount = round($reviewCount, 1); 

                                                $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 

                                                $fullStars   = floor($reviewCount); 
                                                $halfStar    = ($reviewCount - $fullStars >= 0.5) ? 1 : 0; 
                                                $emptyStars  = 5 - ($fullStars + $halfStar); 
                                            @endphp
                                            <h6 class="al-title2-14px fw-medium"> {{ number_format($reviewCount, 1) }} <span class="ec-text-success">({{ $totalRatings }} {{get_phrase('Review')}})</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

 
<!-- Featured Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center">{{ get_phrase('Featured Categories') }}</h1>
            </div>
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper category-slider">
                    <div class="swiper-wrapper">
                        @php
                            $colors = ['salmon', 'purple', 'green', 'orange']; // Define the colors
                        @endphp
                        @foreach ($categories as $index => $category)
                            <div class="swiper-slide">
                                <a href="{{ route('products', get_category_params($category)) }}" class="category-item bg-{{ $colors[$index % count($colors)] }}-light">
                                    <div class="category-img">
                                        <img src="{{ get_image($category->thumbnail) }}" alt="category">
                                    </div>
                                    <div class="category-content">
                                        <h4 class="al-title-18px fw-medium mb-10px text-center">{{ $category->title }}</h4>
                                        {{-- <p class="al-subtitle-14px text-center ec-text-dark3 lh-1 fw-normal">{{ $category->totalProductCount() }}</p> --}}
                                    </div>
                                </a> 
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Area End -->


<!-- Popular Product Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center">{{ get_phrase('Popular Products') }}</h1>
            </div>
        </div>
        <div class="row gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @foreach ($popular_products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="product-md-card">
                        <div class="product-md-banner">
                            @if($product->label)
                               <p class="product-discount-badge1 capitalize">{{$product->label}}</p>
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
                                    @if ($product->is_discounted)
                                        @php
                                            $discount = $product->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                            <h6 class="al-title-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h6>
                                        @else
                                            <h6 class="al-title-18px">{{ currency($discount->discount_value) }}</h6>
                                        @endif
                                        <h6 class="al-title-16px fw-medium ec-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    @else
                                        <h6 class="al-title-18px">{{ currency($product->price) }}</h6>
                                    @endif
                                </div>
                                <a href="{{ route('product', $product->slug) }}" class="btn ec-sm2-btn-dark text-capitalize">
                                   
                                    <span>{{get_phrase('Shop Now')}}</span>
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
                        <span>{{get_phrase('View All')}}</span>
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


<!-- Ads Area Start -->
<section>
    <div class="container">
        <div class="row gy-4 justify-content-center section-margin">
            <div class="col-lg-6 col-md-12">
                <div class="ec-ads-one wow animate__fadeInUp" data-wow-delay=".3s">
                    <div class="ads-title-wrap">
                        <h1 class="pd-title-36px">{{get_phrase('Best Quality Agro')}} <span class="ff-pr-fw600">&</span> {{get_phrase('Fresh')}} <span class="ec-text-danger fw-bold">{{get_phrase('Dairy')}}</span> {{get_phrase('Products')}}</h1>
                    </div>
                    <a href="{{route('all_products')}}" class="btn ec-btn-white pe-4">
                        <span>{{get_phrase('Shop Now')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M17.0303 8.46969L11.7802 3.21969C11.6388 3.08307 11.4493 3.00747 11.2527 3.00918C11.0561 3.01089 10.8679 3.08977 10.7289 3.22883C10.5898 3.36788 10.511 3.55599 10.5092 3.75264C10.5075 3.94929 10.5831 4.13874 10.7198 4.28019L14.6895 8.24994H1.5C1.30109 8.24994 1.11032 8.32896 0.96967 8.46961C0.829018 8.61026 0.75 8.80103 0.75 8.99994C0.75 9.19885 0.829018 9.38962 0.96967 9.53027C1.11032 9.67092 1.30109 9.74994 1.5 9.74994H14.6895L10.7198 13.7197C10.6481 13.7889 10.591 13.8716 10.5517 13.9631C10.5124 14.0546 10.4917 14.1531 10.4908 14.2526C10.4899 14.3522 10.5089 14.451 10.5466 14.5432C10.5843 14.6353 10.64 14.7191 10.7105 14.7895C10.7809 14.8599 10.8646 14.9156 10.9568 14.9533C11.049 14.991 11.1477 15.01 11.2473 15.0091C11.3469 15.0083 11.4453 14.9876 11.5368 14.9483C11.6283 14.909 11.7111 14.8518 11.7802 14.7802L17.0303 9.53019C17.1709 9.38954 17.2498 9.19881 17.2498 8.99994C17.2498 8.80107 17.1709 8.61034 17.0303 8.46969Z" fill="#0F1311"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="ec-ads-two wow animate__fadeInUp" data-wow-delay=".4s">
                    <div class="ads-title-wrap">
                       <h1 class="pd-title-36px">
                            {{ get_phrase('Get') }} <span class="fw-bold ff-ss4">{{ get_phrase('10') }}</span> <span class="fw-bold">{{ get_phrase('%') }}</span> 
                            {{ get_phrase('Off On Premium') }} <span class="ec2-text-success fw-bold">{{ get_phrase('Quality') }}</span> 
                            {{ get_phrase('Products') }}
                        </h1>
                    </div>
                    <a href="{{route('all_products')}}" class="btn ec2-btn-success pe-4">
                        <span>{{get_phrase('Shop Now')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M17.0303 8.46969L11.7802 3.21969C11.6388 3.08307 11.4493 3.00747 11.2527 3.00918C11.0561 3.01089 10.8679 3.08977 10.7289 3.22883C10.5898 3.36788 10.511 3.55599 10.5092 3.75264C10.5075 3.94929 10.5831 4.13874 10.7198 4.28019L14.6895 8.24994H1.5C1.30109 8.24994 1.11032 8.32896 0.96967 8.46961C0.829018 8.61026 0.75 8.80103 0.75 8.99994C0.75 9.19885 0.829018 9.38962 0.96967 9.53027C1.11032 9.67092 1.30109 9.74994 1.5 9.74994H14.6895L10.7198 13.7197C10.6481 13.7889 10.591 13.8716 10.5517 13.9631C10.5124 14.0546 10.4917 14.1531 10.4908 14.2526C10.4899 14.3522 10.5089 14.451 10.5466 14.5432C10.5843 14.6353 10.64 14.7191 10.7105 14.7895C10.7809 14.8599 10.8646 14.9156 10.9568 14.9533C11.049 14.991 11.1477 15.01 11.2473 15.0091C11.3469 15.0083 11.4453 14.9876 11.5368 14.9483C11.6283 14.909 11.7111 14.8518 11.7802 14.7802L17.0303 9.53019C17.1709 9.38954 17.2498 9.19881 17.2498 8.99994C17.2498 8.80107 17.1709 8.61034 17.0303 8.46969Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ads Area End -->


<!-- Popular Sales Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center">{{get_phrase('Top Sales')}}</h1>
            </div>
        </div>
        <div class="row gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @php 
               $topProducts = App\Models\Product::where('status', 1)->where('label', 'top-seller')->latest()->get(); 
            @endphp
            @foreach($topProducts->chunk(3) as $chunk)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <ul class="sales-list-group">
                     @foreach($chunk as $product)
                    <li class="sales-list-item">
                        @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <a href="{{ route('product', $product->slug) }}" class="sales-list-image">
                            <img src="{{ get_image($firstImage) }}" alt="">
                        </a>
                        <div class="sales-list-details">
                            <a href="{{ route('product', $product->slug) }}" class="al-title-16px text-link mb-12px">{{ $product->title }}</a>
                            <div class="d-flex align-items-center gap-2 mb-12px">
                                @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                        <h4 class="al-title-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                        <h4 class="al-title-16px fw-medium ec-text-gray">>{{ currency($product->price) }}</h4>
                                    @else
                                        <h4 class="al-title-18px">{{ currency($discount->discount_value) }}</h4>
                                    @endif
                                        <h4 class="al-title-18px"><del>{{ currency($product->price) }}</del></h4>
                                    @else
                                        <h4 class="al-title-18px">{{ currency($product->price) }}</h4>
                                    @endif
                            </div>
                            <a href="{{ route('product', $product->slug) }}" class="btn ec-sm2-btn-dark text-capitalize">
                               
                                <span>{{get_phrase('Shop Now')}}</span>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{route('all_products')}}" class="btn ec-btn-outline-dark pe-4 icon-right">
                        <span>{{get_phrase('View All')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46969L12.2802 3.21969C12.1388 3.08307 11.9493 3.00747 11.7527 3.00918C11.5561 3.01089 11.3679 3.08977 11.2289 3.22883C11.0898 3.36788 11.011 3.55599 11.0092 3.75264C11.0075 3.94929 11.0831 4.13874 11.2198 4.28019L15.1895 8.24994H2C1.80109 8.24994 1.61032 8.32896 1.46967 8.46961C1.32902 8.61026 1.25 8.80103 1.25 8.99994C1.25 9.19885 1.32902 9.38962 1.46967 9.53027C1.61032 9.67092 1.80109 9.74994 2 9.74994H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8716 11.0517 13.9631C11.0124 14.0546 10.9917 14.1531 10.9908 14.2526C10.9899 14.3522 11.0089 14.451 11.0466 14.5432C11.0843 14.6353 11.14 14.7191 11.2105 14.7895C11.2809 14.8599 11.3646 14.9156 11.4568 14.9533C11.549 14.991 11.6477 15.01 11.7473 15.0091C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8518 12.2802 14.7802L17.5303 9.53019C17.6709 9.38954 17.7498 9.19881 17.7498 8.99994C17.7498 8.80107 17.6709 8.61034 17.5303 8.46969Z" fill="#0F1311"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Sales Area End -->


<!-- Best Deal Area Start -->
<section class="best-deal-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="ml-title-48px text-center mb-2 wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Best Deal This Week')}}</h1>
            </div>
        </div>
    </div>
</section>
<section class="best-deal-card-section wow animate__fadeInUp" data-wow-delay=".4s">
    <div class="container">
        <div class="row gy-4 section-margin">
             @php 
               $featureProducts = App\Models\Product::where('status', 1)->where('label', 'featured')->latest()->take(3)->get(); 
            @endphp
            @foreach($featureProducts as $product)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="product-lg-card">
                    <div class="product-lg-banner" >
                        @if($product->label)
                               <p class="product-discount-badge1 capitalize">{{$product->label}}</p>
                        @endif
                        @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                        
                        <div class="view-bookmark-md-wrap">
                            <a href="javascript:void(0)" class="dark-light-iconbtn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" >
                                <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Quick View')}}" >
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="white"/>
                                        <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="white"/>
                                    </svg>
                                </span>
                            </a>
                            <a href="javascript:void(0)"  class="dark-light-iconbtn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}" aria-describedby="tooltip276572">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="white"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="product-lg-details">
                        <a href="{{ route('product', $product->slug) }}" class="al-title-20px text-link mb-12px">{{$product->title}}</a>
                        <div class="d-flex align-items-center gap-1 flex-wrap mb-6px">
                            <div class="d-flex align-items-center gap-3px">
                                 @php
                                    $rating = $product->average_rating;
                                    $fullStars = floor($rating); // full stars count
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                    @endphp
                                     @for($i = 0; $i < $fullStars; $i++)
                                    <img src="{{ asset('assets/frontend/grocery/images/image-icons/star-yellow-16.svg') }}" alt="">
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
                            <p class="al-title-16px">{{ $product->average_rating ?? 0 }} <span class="ec-text-gray">({{ $product->reviews->count() }})</span></p>
                        </div>
                        <div class="d-flex align-items-end gap-3 justify-content-between flex-wrap">
                            <div class="d-flex align-items-center gap-2 ">
                                @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                        <h4 class="al-title2-24px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                        <h4 class="al-title-16px fw-medium ec-text-gray">>{{ currency($product->price) }}</h4>
                                    @else
                                        <h4 class="al-title2-24px">{{ currency($discount->discount_value) }}</h4>
                                    @endif
                                        <h4 class="al-title2-24px"><del>{{ currency($product->price) }}</del></h4>
                                    @else
                                        <h4 class="al-title2-24px">{{ currency($product->price) }}</h4>
                                    @endif
                            </div>
                            <a href="{{ route('product', $product->slug) }}" class="btn ec-sm2-btn-dark text-capitalize py-12px px-4">
                               
                                <span>{{get_phrase('Shop Now')}}</span>
                            </a>
                        </div>
                        <div class="mt-18px">
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-12px">
                                <h6 class="al-title2-14px">{{get_phrase('Total  Stock:')}} {{$product->total_stock}}</h6>
                                <h6 class="al-title2-14px">{{get_phrase('Sold:')}} {{ getSoldQuantity($product->id) }}</h6>
                            </div>
                           <div class="progress ec-progress" role="progressbar" 
                                aria-valuenow="{{ getSoldProgress($product->id) }}" 
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" data-progress="{{ getSoldProgress($product->id) }}"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>
<!-- Best Deal Area End -->


<!-- Customer Feedback Area Start -->
<section>
    <div class="container">
        <div class="row mb-50px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center">{{get_phrase('Our Customer Feedback')}}</h1>
            </div>
        </div>
        <div class="row gy-4 align-items-center justify-content-center section-margin wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-6 col-md-12">
                <div class="customer-feedback-banner">
                    <img class="banner" src="{{ asset('assets/frontend/grocery/images/images/customer-feedback-banner.webp') }}" alt="banner">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="customer-feedback-testimonial">
                    <!-- Swiper -->
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                            @foreach($reviews as $review)
                            <div class="swiper-slide">
                                <div class="single-testimonial">
                                    <p class="al-subtitle3-16px ec-text-dark3 mb-30px">“{{ $review->comment }}”</p>
                                    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <div class="d-flex align-items-center gap-12px">
                                            <div class="rounded-image-44px">
                                                <img src="{{ get_image($review->user->photo) }}" alt="customer">
                                            </div>
                                            <div>
                                                <h4 class="al-title-16px fw-bold mb-2">{{ $review->user->name }}</h4>
                                                <p class="al-subtitle2-14px lh-1">{{ $review->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                        <!-- Starts -->
                                        <div class="d-flex align-items-center gap-1">
                                            @for($i = 0; $i<=5; $i++)
                                            <span class="svg-block">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.8649 7.7173L13.8178 9.69013C13.5367 9.9606 13.3458 10.5015 13.4041 10.8887L13.7223 13.2009C13.9292 14.6805 13.0117 15.3222 11.6859 14.6328L9.43726 13.4555C9.06073 13.2593 8.44554 13.2699 8.07962 13.4873L6.11209 14.6381C4.55822 15.545 3.63015 14.8608 4.0438 13.1108L4.62186 10.6659C4.72793 10.2205 4.53171 9.61058 4.1976 9.30829L2.33614 7.62715C1.00501 6.4233 1.37624 5.33082 3.16876 5.19293L5.43857 5.02323C5.86284 4.99141 6.37726 4.6573 6.57348 4.28076L7.75081 2.02156C8.44554 0.701035 9.56454 0.706339 10.2381 2.03747L11.2881 4.11636C11.4684 4.46638 11.9245 4.80579 12.3117 4.86413L15.1224 5.32021C16.6391 5.57477 16.9733 6.65134 15.8649 7.7173Z" fill="#FBBF27"/>
                                                </svg>
                                            </span>
                                           @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Customer Feedback Area End -->


<!-- Latest News Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center">{{get_phrase('Latest News')}}</h1>
            </div>
        </div>
        <div class="row gy-4 justify-content-center mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @foreach($blogs->take(2) as $blog)
            <div class="col-xl-6 col-lg-10">
                <div class="news-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="news-card-banner">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </a>
                    <div class="new-card-details">
                        <p class="mb-12px al-subtitle-16px fw-medium lh-1">{{ $blog->created_at->format('d M, Y') }}</p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="mb-12px al-title2-20px text-link">{{ $blog->title }}</a>
                        <p class="mb-20px al-subtitle3-16px">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn ec-btn-dark pe-4 icon-right">
                            <span>{{get_phrase('Read Now')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                <path d="M17.0303 8.96981L11.7802 3.71981C11.6388 3.58319 11.4493 3.5076 11.2527 3.50931C11.0561 3.51101 10.8679 3.58989 10.7289 3.72895C10.5898 3.868 10.511 4.05611 10.5092 4.25276C10.5075 4.44941 10.5831 4.63886 10.7198 4.78031L14.6895 8.75006H1.5C1.30109 8.75006 1.11032 8.82908 0.96967 8.96973C0.829018 9.11038 0.75 9.30115 0.75 9.50006C0.75 9.69897 0.829018 9.88974 0.96967 10.0304C1.11032 10.171 1.30109 10.2501 1.5 10.2501H14.6895L10.7198 14.2198C10.6481 14.289 10.591 14.3718 10.5517 14.4633C10.5124 14.5548 10.4917 14.6532 10.4908 14.7528C10.4899 14.8523 10.5089 14.9511 10.5466 15.0433C10.5843 15.1354 10.64 15.2192 10.7105 15.2896C10.7809 15.36 10.8646 15.4157 10.9568 15.4534C11.049 15.4911 11.1477 15.5101 11.2473 15.5092C11.3469 15.5084 11.4453 15.4877 11.5368 15.4484C11.6283 15.4091 11.7111 15.3519 11.7802 15.2803L17.0303 10.0303C17.1709 9.88967 17.2498 9.69893 17.2498 9.50006C17.2498 9.30119 17.1709 9.11046 17.0303 8.96981Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{route('blog')}}" class="btn ec-btn-outline-dark pe-4 icon-right">
                        <span>{{get_phrase('View All')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46969L12.2802 3.21969C12.1388 3.08307 11.9493 3.00747 11.7527 3.00918C11.5561 3.01089 11.3679 3.08977 11.2289 3.22883C11.0898 3.36788 11.011 3.55599 11.0092 3.75264C11.0075 3.94929 11.0831 4.13874 11.2198 4.28019L15.1895 8.24994H2C1.80109 8.24994 1.61032 8.32896 1.46967 8.46961C1.32902 8.61026 1.25 8.80103 1.25 8.99994C1.25 9.19885 1.32902 9.38962 1.46967 9.53027C1.61032 9.67092 1.80109 9.74994 2 9.74994H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8716 11.0517 13.9631C11.0124 14.0546 10.9917 14.1531 10.9908 14.2526C10.9899 14.3522 11.0089 14.451 11.0466 14.5432C11.0843 14.6353 11.14 14.7191 11.2105 14.7895C11.2809 14.8599 11.3646 14.9156 11.4568 14.9533C11.549 14.991 11.6477 15.01 11.7473 15.0091C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8518 12.2802 14.7802L17.5303 9.53019C17.6709 9.38954 17.7498 9.19881 17.7498 8.99994C17.7498 8.80107 17.6709 8.61034 17.5303 8.46969Z" fill="#0F1311"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest News Area End -->

<script type="text/javascript">

	    "use strict";
    document.querySelectorAll('.progress-bar').forEach(bar => {
    let val = bar.dataset.progress;
    val = Math.min(Math.max(val, 0), 100);
    bar.style.width = val + '%';
});

</script>