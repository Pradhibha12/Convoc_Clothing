<!-- Start Banner Area -->
<section class="fn-banner-section overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-area">
                    <div class="banner-content-left">
                        <h1 class="fn-banner-title wow animate__fadeInUp" data-wow-delay=".1s">
                            <span>{{get_phrase('Empower Your Fitness Journey with Our Products!!')}}</span>
                            <span class="fn-banner-title-shape">
                                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.40918 33.3489L5.10005 38.0399L0.40918 42.7308L9.79102 52.1126L14.4819 47.4217L19.1729 52.1126L22.7881 48.4973L4.02438 29.7337L0.40918 33.3489Z" fill="white"/>
                                    <path d="M23.9671 9.7911L31.0036 16.8274L16.8274 31.0035L9.79113 23.9671L6.16846 27.5899L24.9321 46.3535L28.5548 42.7308L21.5184 35.6945L35.6945 21.5184L42.7308 28.5548L46.3498 24.9357L27.5862 6.17216L23.9671 9.7911Z" fill="white"/>
                                    <path d="M52.1125 9.79108L42.7306 0.409241L38.0398 5.10011L33.3488 0.409241L29.7299 4.02818L48.4935 22.7919L52.1125 19.1729L47.4216 14.482L52.1125 9.79108Z" fill="white"/>
                                </svg>
                            </span>
                        </h1>
                        <p class="fn-banner-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Shop top-rated gear for home workouts, cardio strength & more everything you need to crush your goals.')}}</p>
                        <div class="d-flex align-items-start flex-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn fnb2-btn-skin">
                                <span>{{get_phrase('Shop Now!')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                    <path d="M2 10.5L0.5 10.5L0.5 13.5L2 13.5L2 10.5ZM24.0607 13.0607C24.6464 12.4749 24.6464 11.5251 24.0607 10.9393L14.5147 1.3934C13.9289 0.80761 12.9792 0.807611 12.3934 1.3934C11.8076 1.97918 11.8076 2.92893 12.3934 3.51472L20.8787 12L12.3934 20.4853C11.8076 21.0711 11.8076 22.0208 12.3934 22.6066C12.9792 23.1924 13.9289 23.1924 14.5147 22.6066L24.0607 13.0607ZM2 12L2 13.5L23 13.5L23 12L23 10.5L2 10.5L2 12Z" fill="black"/>
                                </svg>
                            </a>
                            
                        </div>
                        <div class="bn-profileNrating wow animate__fadeInUp" data-wow-delay=".4s">
                            <ul class="d-flex align-items-center">
                                @foreach($reviews->take(3) as $review)
                                <li class="bn-list-profile">
                                    <img class="profile" src="{{ get_image($review->user->photo) }}" alt="">
                                </li>
                                @endforeach
                            </ul>
                            <div>
                                <div class="d-flex align-items-center gap-6px mb-12px">
                                    @for($i = 1; $i <= 5; $i++)
                                    <div class="svg-block">
                                        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_68_3091)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5752 1.49548L16.5175 7.75466L23.3796 8.61019C24.015 8.69205 24.4799 9.27837 24.3983 9.9141C24.357 10.2239 24.2023 10.4925 23.9823 10.6805L18.9871 15.3584L20.291 22.1551C20.4128 22.7908 19.9975 23.402 19.3615 23.5242C19.0846 23.5729 18.8076 23.5242 18.5794 23.3938L12.5156 20.0608L6.46082 23.3938C5.89056 23.7115 5.18146 23.4999 4.87194 22.9373C4.73307 22.6847 4.70064 22.4075 4.74976 22.1551L6.04518 15.3584L1.00112 10.6232C0.53604 10.183 0.511479 9.44178 0.951681 8.97703C1.14722 8.76511 1.40038 8.65113 1.66079 8.61838V8.61019L8.52265 7.75466L11.4646 1.49548C11.7338 0.908863 12.4268 0.664516 13.0132 0.933423C13.2739 1.0556 13.4615 1.25932 13.5752 1.49548Z" fill="url(#paint0_linear_68_3091)"/>
                                            </g>
                                            <defs>
                                            <linearGradient id="paint0_linear_68_3091" x1="0.636353" y1="0.824463" x2="0.636353" y2="23.5428" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FFC400"/>
                                            <stop offset="1" stop-color="#FF9F00"/>
                                            </linearGradient>
                                            <clipPath id="clip0_68_3091">
                                            <rect width="25.1385" height="23.4626" fill="white" transform="translate(0.636353 0.824463)"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    @endfor
                                </div>
                                <h4 class="bn-stars-title">{{get_phrase('100% Customer Satisfaction')}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="banner-slider-area wow animate__slideInRight" data-wow-delay=".2s">
                        <!-- Swiper -->
                        <div class="swiper fn-banner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/fitness/images/banner.png') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/fitness/images/banner.png') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/fitness/images/banner.png') }}" alt="banner">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Text Slider -->
<section class="text-slider-section banner-bottom-slider">
    <!-- Swiper -->
    <div class="swiper text-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="d-flex align-items-center gap-4">
                    <h2 class="text-slider-text1 text-nowrap">{{get_phrase('Limited-Time Offers Available')}}</h2>
                    <div class="text-slider-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="36" viewBox="0 0 39 36" fill="none">
                            <path d="M36.099 34.202C37.6393 34.0928 38.7994 32.7556 38.6902 31.2153L36.9108 6.11475C36.8016 4.57446 35.4645 3.41432 33.9242 3.52351C32.3839 3.6327 31.2237 4.96987 31.3329 6.51017L32.9146 28.8218L10.603 30.4035C9.06267 30.5127 7.90253 31.8499 8.01172 33.3902C8.12091 34.9304 9.45809 36.0906 10.9984 35.9814L36.099 34.202ZM2.45062 2.39111L0.618336 4.503L34.069 33.5249L35.9013 31.4131L37.7336 29.3012L4.28291 0.279223L2.45062 2.39111Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="d-flex align-items-center gap-4">
                    <h2 class="text-slider-text2 text-nowrap">{{get_phrase('Free Shipping on Orders Over $50')}}</h2>
                    <div class="text-slider-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="36" viewBox="0 0 39 36" fill="none">
                            <path d="M36.099 34.202C37.6393 34.0928 38.7994 32.7556 38.6902 31.2153L36.9108 6.11475C36.8016 4.57446 35.4645 3.41432 33.9242 3.52351C32.3839 3.6327 31.2237 4.96987 31.3329 6.51017L32.9146 28.8218L10.603 30.4035C9.06267 30.5127 7.90253 31.8499 8.01172 33.3902C8.12091 34.9304 9.45809 36.0906 10.9984 35.9814L36.099 34.202ZM2.45062 2.39111L0.618336 4.503L34.069 33.5249L35.9013 31.4131L37.7336 29.3012L4.28291 0.279223L2.45062 2.39111Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="d-flex align-items-center gap-4">
                    <h2 class="text-slider-text1 text-nowrap">{{get_phrase('Limited-Time Offers Available')}}</h2>
                    <div class="text-slider-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="36" viewBox="0 0 39 36" fill="none">
                            <path d="M36.099 34.202C37.6393 34.0928 38.7994 32.7556 38.6902 31.2153L36.9108 6.11475C36.8016 4.57446 35.4645 3.41432 33.9242 3.52351C32.3839 3.6327 31.2237 4.96987 31.3329 6.51017L32.9146 28.8218L10.603 30.4035C9.06267 30.5127 7.90253 31.8499 8.01172 33.3902C8.12091 34.9304 9.45809 36.0906 10.9984 35.9814L36.099 34.202ZM2.45062 2.39111L0.618336 4.503L34.069 33.5249L35.9013 31.4131L37.7336 29.3012L4.28291 0.279223L2.45062 2.39111Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="d-flex align-items-center gap-4">
                    <h2 class="text-slider-text2 text-nowrap">{{get_phrase('10,000+ Happy Customers')}}</h2>
                    <div class="text-slider-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="36" viewBox="0 0 39 36" fill="none">
                            <path d="M36.099 34.202C37.6393 34.0928 38.7994 32.7556 38.6902 31.2153L36.9108 6.11475C36.8016 4.57446 35.4645 3.41432 33.9242 3.52351C32.3839 3.6327 31.2237 4.96987 31.3329 6.51017L32.9146 28.8218L10.603 30.4035C9.06267 30.5127 7.90253 31.8499 8.01172 33.3902C8.12091 34.9304 9.45809 36.0906 10.9984 35.9814L36.099 34.202ZM2.45062 2.39111L0.618336 4.503L34.069 33.5249L35.9013 31.4131L37.7336 29.3012L4.28291 0.279223L2.45062 2.39111Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Text Slider -->

<!-- Start Shop by Category -->
<section>
    <div class="container section-pb">
        <div class="row">
            <div class="col-12">
                <div class="category-title-area">
                    <div class="text-center">
                        <p class="sml-title-badge mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Shop by Category')}}</p>
                    </div>
                    <h2 class="section-title mb-20px ct-section-title text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Shop Fitness Gear by Category You want!')}}</h2>
                    <p class="section-subtitle mb-30px ct-section-subtitle text-center wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase("Find the perfect gear for every workout style. Whether you're building a home gym or upgrading your cardio routine, we’ve got you covered.")}}</p>
                    <div class="d-flex align-items-start justify-content-center flex-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                        <a href="{{route('all_products')}}" class="btn fn-btn-skin">
                            <span>{{get_phrase('Shop Now!')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"></path>
                            </svg>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <div class="category-cards-wrap">
                    @php
                        $categoriess = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                    @endphp
                    @foreach($categoriess->take(4) as $key=> $category)
                    <div class="category-card {{ $key == 0 ? 'active' : '' }}">
                        <div class="category-icon-badge">
                           <img src="{{ get_image($category->icon) }}" alt="icon">
                        </div>
                        <img class="category-banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                        <div class="category-card-content">
                            <h2 class="category-card-title">{{$category->title}}</h2>
                            <a href="{{ route('products', $category->slug) }}" class="btn fn-btn-skin category-card-btn">
                                <span>{{get_phrase('Shop Now!')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <path d="M1.54944 8.70693L0.256366 8.70693L0.256366 11.2931L1.54944 11.2931L1.54944 8.70693ZM20.5668 10.9143C21.0718 10.4094 21.0718 9.59063 20.5668 9.08566L12.3377 0.856596C11.8328 0.35162 11.014 0.35162 10.509 0.856596C10.0041 1.36157 10.0041 2.1803 10.509 2.68528L17.8238 10L10.5091 17.3147C10.0041 17.8197 10.0041 18.6384 10.5091 19.1434C11.014 19.6484 11.8328 19.6484 12.3377 19.1434L20.5668 10.9143ZM1.54944 10L1.54944 11.2931L19.6525 11.2931L19.6525 10L19.6525 8.70693L1.54944 8.70693L1.54944 10Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop by Category -->
    
<!-- Start Our Best Selling products -->
<section>
    <div class="container section-pb">
        <div class="row mb-30px">
            <div class="col-12">
                <p class="sml-title-badge wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Our Best Selling products')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="bsp-title-area">
                    <h2 class="section-title bsp-title wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Our Most Popular Products All in One Place.')}}</h2>
                    <div class="bsp-title-right">
                        <p class="section-subtitle mb-30px wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Our best-selling products, loved by thousands of fitness enthusiasts. Handpicked for performance, durability, and results.')}}</p>
                        <a href="{{route('all_products')}}" class="btn fn-btn-skin gap-12px px-3 wow animate__fadeInUp" data-wow-delay=".5s">
                            <span>{{get_phrase('Explore All Products')}}</span>
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
                            $allproduct =App\Models\Product::where('status', 1)->where('label', 'best-seller')->latest()->get();
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
                                    @if ($product->is_discounted)
                                        @php
                                            $discount = $product->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                           <h4 class="product-card-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                        @else
                                           <h4 class="product-card-price">{{ currency($product->price) }}</h4>
                                        @endif
                                        @else
                                          <h4 class="product-card-price">{{ currency($product->price) }}</h4>
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

<!-- Start Shop by Fitness Goal -->
<section class="fitness-goal-section overflow-hidden">
    <div class="container">
        <div class="row align-items-center justify-content-center gy-5">
            <div class="col-lg-6 col-md-10">
                <div class="fg-details-area">
                    <p class="sml-title-badge text-white mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Shop by Fitness Goal')}}</p>
                    <h2 class="section-title mb-50px text-white wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Personalize shopping experience by goal.')}}</h2>
                    <ul class="fg-step-list wow animate__fadeInUp" data-wow-delay=".3s">
                        <li class="fg-step-item">
                            <div class="fg-step-illustration">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 56 57" fill="none">
                                    <mask id="mask0_27_1889" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="56" height="57">
                                        <path d="M0 0.391113H56V56.3911H0V0.391113Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_27_1889)">
                                        <path d="M31.2812 54.7505V43.813" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M24.7187 54.7505V43.813" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M54.3594 15.3755H47.7969" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M51.0781 12.0942L47.7969 15.3755L51.0781 18.6567" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.64062 15.3755H8.20313" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.92188 12.0942L8.20313 15.3755L4.92188 18.6567" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M26.3594 24.1255C26.3594 23.2194 27.0939 22.4849 28 22.4849C28.9061 22.4849 29.6406 23.2194 29.6406 24.1255C29.6406 25.0316 28.9061 25.7661 28 25.7661C27.0939 25.7661 26.3594 25.0316 26.3594 24.1255Z" fill="black"/>
                                        <path d="M46.5909 38.3442H44.4839C39.532 38.3442 34.7829 40.3113 31.2812 43.813H24.7187C21.2172 40.3113 16.468 38.3442 11.5161 38.3442H9.40916" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M44.5628 27.9068C33.521 33.0291 22.479 33.0291 11.4372 27.9068" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M31.2813 54.7505H43.3125L45.7755 44.8986C46.3189 42.7247 46.5938 40.4924 46.5938 38.2516V38.1597C46.5938 33.9653 45.6171 29.8286 43.7415 26.0772V26.0771C42.0208 22.6358 41.125 18.8413 41.125 14.9937V14.8634C41.125 11.5913 41.7729 8.35175 43.0314 5.33136L44.4063 2.03174H11.5938L12.9686 5.33136C14.2271 8.35175 14.875 11.5913 14.875 14.8634V14.9937C14.875 18.8413 13.9792 22.6358 12.2585 26.0771V26.0772C10.3829 29.8286 9.40626 33.9654 9.40626 38.1597V38.2516C9.40626 40.4924 9.6809 42.7241 10.2243 44.8979C11.1962 48.7853 12.6875 54.7505 12.6875 54.7505H24.7188" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="fg-step-details">
                                <h4 class="fg-step-title text-white">{{get_phrase('Lose Weight')}}</h4>
                                <p class="fg-step-subtitle text-white">{{get_phrase('Burn calories, trim fat, and get moving with gear built for weight loss success.')}}</p>
                            </div>
                        </li>
                        <li class="fg-step-item">
                            <div class="fg-step-illustration">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 58 59" fill="none">
                                    <path d="M21.8644 33.8204L21.0782 33.2897C14.6452 28.9468 5.96895 30.1795 1 36.1421V57.1421H5.9364C14.2588 57.1421 22.3949 54.7064 29.3197 50.1421C37.766 53.2738 47.2913 50.681 52.9266 43.7166L56.2244 39.6408C57.0869 38.5748 57.2438 37.1103 56.6264 35.8893L39.5 1.14209H29L20.25 8.14209L27.5496 18.6421L36.3994 13.3921L34.25 8.14209L29 9.89209" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
                                    <path d="M26.1333 43.1421C20.2451 47.7064 13.3267 50.1421 6.25001 50.1421" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
                                    <path d="M31.9745 16.0171C34.8127 19.9457 36.0119 24.8238 35.3189 29.6207L34.6295 34.3921L41.7094 39.6421" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
                                    <path d="M35.3622 29.3254C35.3622 29.3254 35.3622 29.3254 35.361 29.3254C29.735 28.5517 23.2828 30.6985 18.4083 37.8922" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
                                </svg>
                            </div>
                            <div class="fg-step-details">
                                <h4 class="fg-step-title text-white">{{get_phrase('Build Muscle')}}</h4>
                                <p class="fg-step-subtitle text-white">{{get_phrase('Strengthen and sculpt with powerful tools for muscle growth and serious gains.')}}</p>
                            </div>
                        </li>
                        <li class="fg-step-item">
                            <div class="fg-step-illustration">
                                <svg width="40" height="40" viewBox="0 0 56 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_28_2027" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="56" height="57">
                                    <path d="M0 0.893066H56V56.8931H0V0.893066Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_28_2027)">
                                    <path d="M34.5625 32.2837C34.5625 35.9081 31.6244 38.8462 28 38.8462C24.3756 38.8462 21.4375 35.9081 21.4375 32.2837C21.4375 28.6593 24.3756 25.7212 28 25.7212C31.6244 25.7212 34.5625 28.6593 34.5625 32.2837Z" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
                                    <path d="M41.125 25.7212V29.0024C41.125 30.8147 42.5941 32.2837 44.4063 32.2837V42.1274H11.5938V32.2837C13.4059 32.2837 14.875 30.8147 14.875 29.0024V25.7212H11.5938C7.96939 25.7212 5.03125 28.6593 5.03125 32.2837V48.6899H18.1563V55.2524H37.8438V48.6899H50.9688V32.2837C50.9688 28.6593 48.0306 25.7212 44.4063 25.7212H41.125Z" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
                                    <path d="M28 3.36341L19.7969 12.5962H23.0781V19.1587H32.9219V12.5962H36.2031L28 3.36341Z" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="fg-step-details">
                                <h4 class="fg-step-title text-white">{{get_phrase('Increase Endurance')}}</h4>
                                <p class="fg-step-subtitle text-white">{{get_phrase('Improve stamina and energy with performance-driven cardio equipment.')}}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="row fg-banner-row">
                    <div class="col-sm-6 wow animate__slideInRight" data-wow-delay=".1s">
                        <div class="fg-banner-left">
                            <div class="fg-banner-wrap fg-banner-1 mb-18px">
                                <img class="banner" src="{{ asset('assets/frontend/fitness/images/fitness-goal-banner1.webp') }}" alt="banner">
                            </div>
                            <div class="fg-banner-wrap fg-banner-2">
                                <img class="banner" src="{{ asset('assets/frontend/fitness/images/fitness-goal-banner2.webp') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow animate__slideInRight" data-wow-delay=".2s">
                        <div class="fg-banner-wrap fg-banner-3 mb-18px">
                            <img class="banner" src="{{ asset('assets/frontend/fitness/images/fitness-goal-banner3.webp') }}" alt="banner">
                        </div>
                        <div class="fg-banner-wrap fg-banner-2">
                            <img class="banner" src="{{ asset('assets/frontend/fitness/images/fitness-goal-banner4.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop by Fitness Goal -->

    
<!-- Start Products Highlights -->
<section class="mt-5 pt-5">
    <div class="container section-pb">
        <div class="row">
            <div class="col-12">
                <div class="ph-title-area">
                    <div class="text-center">
                        <p class="sml-title-badge mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Products Highlights')}}</p>
                    </div>
                    <h2 class="section-title mb-30px ph-section-title text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Check out our The Gears Champions Train With.')}}</h2>
                    <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                        <a href="{{route('all_products')}}" class="btn fn-btn-skin">
                            <span>{{get_phrase('Explore Now')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-20px wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-lg-6">
                <div class="product-highlight-card product-highlight-card1">
                    <img class="banner" src="{{ asset('assets/frontend/fitness/images/product-highlight-banner1.webp') }}" alt="banner">
                    <div class="ph-card-details">
                        <h3 class="ph-card-title">{{get_phrase('Apex Adjustable Dumbbells')}}</h3>
                        <p class="ph-card-subtitle">{{get_phrase('Level up your training with space-saving, pro-grade dumbbells that adjust from 5 to 52 lbs in seconds.')}}</p>
                        <a href="javascript:;" class="btn fn-btn-skin px-22px gap-10px">
                            <span>{{get_phrase('Explore Now')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-highlight-card product-highlight-card2">
                    <img class="banner" src="{{ asset('assets/frontend/fitness/images/product-highlight-banner2.webp') }}" alt="banner">
                    <div class="ph-card-details">
                        <h3 class="ph-card-title">{{get_phrase('FlexCore Resistance Band Set')}}</h3>
                        <p class="ph-card-subtitle">{{get_phrase('Portable, versatile, and beginner-friendly — these bands are your all-in-one solution for bodyweight and recovery workouts.')}}</p>
                        <a href="javascript:;" class="btn fn-btn-skin px-22px gap-10px">
                            <span>{{get_phrase('Explore Now')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-highlight-card product-highlight-card2">
                    <img class="banner" src="{{ asset('assets/frontend/fitness/images/product-highlight-banner3.webp') }}" alt="banner">
                    <div class="ph-card-details">
                        <h3 class="ph-card-title">{{get_phrase('Titan Tread 3000')}}</h3>
                        <p class="ph-card-subtitle">{{get_phrase('A sleek, foldable treadmill built for intense home cardio, complete with a smart display and shock absorption.')}}</p>
                        <a href="javascript:;" class="btn fn-btn-skin px-22px gap-10px">
                            <span>{{get_phrase('Explore Now')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-highlight-card product-highlight-card1">
                    <img class="banner" src="{{ asset('assets/frontend/fitness/images/product-highlight-banner4.webp') }}" alt="banner">
                    <div class="ph-card-details">
                        <h3 class="ph-card-title">{{get_phrase('CoreMax Adjustable Bench Pro')}}</h3>
                        <p class="ph-card-subtitle">{{get_phrase('A multi-angle bench designed for maximum versatility—ideal for presses, core work, and full-body strength training.')}}</p>
                        <a href="javascript:;" class="btn fn-btn-skin px-22px gap-10px">
                            <span>{{get_phrase('Explore Now')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Products Highlights -->

<!-- Start Our Ambassadors -->
<section class="overflow-hidden">
    <div class="container section-pb">
        <div class="row align-items-center justify-content-center gx-4 gy-5">
            <div class="col-lg-6 col-md-10">
                <div class="ambassador-card-area">
                    <div class="ambassador-card wow animate__slideInLeft" data-wow-delay=".1s">
                        <p class="ambassador-badge">{{get_phrase('Popular')}}</p>
                        <img class="ambassador-banner" src="{{ asset('assets/frontend/fitness/images/ambassador-banner1.webp') }}" alt="banner">
                        <a href="{{ get_settings('system_video') }}" class="ambassador-card-play-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                            <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.105 9.54392C23.5519 10.9566 23.5519 14.4884 21.105 15.9011L5.50515 24.9077C3.05826 26.3204 -0.000354767 24.5545 -0.000354767 21.7291L-0.000354767 3.71593C-0.000354767 0.890509 3.05826 -0.875386 5.50515 0.537327L21.105 9.54392Z" fill="white"/>
                            </svg>
                        </a>
                        <div class="ambassador-card-details">
                            <div>
                                <h3 class="ambassador-card-title">{{get_phrase('William Torres')}}</h3>
                                <p class="ambassador-card-subtitle">{{get_phrase('High-energy image of Ashley in workout gear')}}</p>
                            </div>
                            <a href="javascript:;" class="ambassador-card-btn">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.8833 1.95223C20.8833 1.04438 20.1473 0.308413 19.2395 0.308413L4.44509 0.308413C3.53723 0.308413 2.80126 1.04438 2.80126 1.95223C2.80126 2.86009 3.53723 3.59606 4.44509 3.59606H17.5957V16.7466C17.5957 17.6545 18.3316 18.3904 19.2395 18.3904C20.1473 18.3904 20.8833 17.6545 20.8833 16.7466L20.8833 1.95223ZM1.70538 19.4863L2.86774 20.6487L20.4018 3.11459L19.2395 1.95223L18.0771 0.789877L0.543026 18.324L1.70538 19.4863Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div>
                    <p class="sml-title-badge mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Our Ambassadors')}}</p>
                    <h2 class="section-title mb-28px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Meet Our Fitness Ambassador')}}</h2>
                    <p class="section-subtitle fw-bold wow animate__fadeInUp" data-wow-delay=".3s"><span class="fn-text-skin2">{{get_phrase('Strong is a mindset')}}</span>{{get_phrase('. I lift to lead.')}}</p>
                    <p class="section-subtitle fw-medium mb-32px wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('“Ashley is a certified personal trainer & wellness coach dedicated to helping men build strength & confidence through smart, sustainable lifting programs. With a focus on empowerment, he brings energy and expertise to every session.”')}}</p>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Ambassadors -->
    
<!-- Start Our Clients Feedback -->
<section class="clients-feedback-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="feedback-title-area">
                    <div class="text-center">
                        <p class="sml-title-badge mb-30px text-white wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Our Clients Feedback')}}</p>
                    </div>
                    <h2 class="section-title mb-30px cf-section-title text-center text-white wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('What Our Customers Are Saying?')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Swiper -->
    <div class="swiper testimonial-slider wow animate__fadeInUp" data-wow-delay=".3s">
        <div class="swiper-wrapper">
            @foreach($reviews as $review)
            <div class="swiper-slide">
                <div class="tm-slider-wrap">
                    <div class="testimonial-slide">
                        <div class="tm-quote-icon">
                            <svg width="47" height="39" viewBox="0 0 47 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M46.6603 38.5078H29.1024C27.3869 32.8461 26.5292 26.9786 26.5292 20.9052C26.5292 14.7289 28.0933 9.83929 31.2214 6.23643C34.4505 2.53063 39.1931 0.677734 45.4494 0.677734V9.3246C40.404 9.3246 37.8813 12.4642 37.8813 18.7435V21.6773H46.6603V38.5078ZM21.0802 38.5078H3.52219C1.80675 32.8461 0.949036 26.9786 0.949036 20.9052C0.949036 14.7289 2.51311 9.83929 5.64125 6.23643C8.87031 2.53063 13.613 0.677734 19.8693 0.677734V9.3246C14.8239 9.3246 12.3012 12.4642 12.3012 18.7435V21.6773H21.0802V38.5078Z" fill="black"/>
                            </svg>
                        </div>
                        
                        <p class="testimonial-subtitle"> {{$review->comment}}</p>
                        <div>
                            <div class="tm-user-image">
                                <img class="user" src="{{ get_image($review->user->photo) }}" alt="user">
                            </div>
                            <h4 class="tm-user-name">{{ $review->user->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="testimonial-navs">
            <div class="swiper-button-prev">
                <svg width="25" height="10" viewBox="0 0 25 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.67771 4.53585C0.42137 4.79219 0.42137 5.2078 0.67771 5.46414L4.855 9.64144C5.11134 9.89778 5.52695 9.89778 5.78329 9.64144C6.03963 9.3851 6.03963 8.96949 5.78329 8.71315L2.07014 5L5.78329 1.28685C6.03963 1.03051 6.03963 0.614899 5.78329 0.35856C5.52695 0.10222 5.11134 0.10222 4.855 0.35856L0.67771 4.53585ZM24.3975 5L24.3975 4.3436L1.14185 4.3436L1.14185 5L1.14185 5.6564L24.3975 5.6564L24.3975 5Z" fill="black"/>
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg width="25" height="10" viewBox="0 0 25 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.3999 5.46317C24.6563 5.20683 24.6563 4.79122 24.3999 4.53488L20.2226 0.357587C19.9663 0.101247 19.5507 0.101247 19.2943 0.357587C19.038 0.613926 19.038 1.02953 19.2943 1.28587L23.0075 4.99903L19.2943 8.71218C19.038 8.96852 19.038 9.38412 19.2943 9.64046C19.5507 9.8968 19.9663 9.8968 20.2226 9.64046L24.3999 5.46317ZM0.680176 4.99902L0.680176 5.65542L23.9358 5.65542L23.9358 4.99903L23.9358 4.34263L0.680176 4.34262L0.680176 4.99902Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>
<!-- End Our Clients Feedback -->