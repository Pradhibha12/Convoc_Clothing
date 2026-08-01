 <style>
.capitalize{
    text-transform: capitalize
}
 .brand-slide-img .brand {
	width: 166px;
	height: 39px;
	object-fit: contain;
}
.category-card-iconbox img{
    height: 40px;
    width: 50px;
}
 </style>
 <!-- Banner Area Start -->
    <section class="wch-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wch-banner-area">
                        <div class="banner-title-area wow animate__fadeInUp" data-wow-delay=".1s">
                            <div class="bn-sun-shape">
                                <img class="shape" src="{{ asset('assets/frontend/watch/images/sun-shape.png') }}" alt="">
                            </div>
                            <h1 class="banner-title wow animate__fadeInUp" data-wow-delay=".2s"><span class="fst-italic">{{get_phrase('Timeless')}}</span> {{get_phrase('Ele')}}<span class="bt-gray">{{get_phrase('gance')}}</span>, <span class="fst-italic fw-semibold">{{get_phrase('Crafted')}}</span> {{get_phrase('for You!')}}</h1>
                            <div class="d-flex align-items-center gap-12px flex-wrap justify-content-center justify-content-xl-start wow animate__fadeInUp" data-wow-delay=".3s">
                                <a href="{{route('all_products')}}" class="btn wch-btn-skin min-w-209px">{{get_phrase('Shop Watches')}}</a>
                            </div>
                        </div>
                        <div class="banner-right-wrap">
                            <div class="d-flex gap-3 align-items-start flex-column flex-md-row justify-content-center justify-content-md-between wow animate__fadeInUp" data-wow-delay=".2s">
                                <div class="banner-raging-wrap">
                                    <div class="bn-rating-stars">
                                        @for ($i = 0; $i < 5; $i++)
                                        <div class="bn-rating-star">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none">
                                                <g clip-path="url(#clip0_13_435)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3358 1.08718L16.3049 7.40346L23.2297 8.2668C23.8708 8.34941 24.3399 8.94107 24.2576 9.58261C24.216 9.89528 24.0599 10.1663 23.8378 10.356L18.7971 15.0766L20.1128 21.9353C20.2358 22.5768 19.8167 23.1936 19.1749 23.3169C18.8955 23.3661 18.6159 23.3169 18.3856 23.1853L12.2665 19.8219L6.15648 23.1853C5.58102 23.5059 4.86544 23.2923 4.5531 22.7246C4.41297 22.4698 4.38024 22.19 4.42981 21.9353L5.73705 15.0766L0.646962 10.2982C0.177642 9.85398 0.152857 9.10598 0.597075 8.63698C0.7944 8.42313 1.04987 8.30811 1.31266 8.27507V8.2668L8.23712 7.40346L11.2059 1.08718C11.4776 0.495204 12.1769 0.248628 12.7686 0.519989C13.0317 0.643276 13.2211 0.848863 13.3358 1.08718Z" fill="url(#paint0_linear_13_435)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_13_435" x1="0.27887" y1="0.410034" x2="0.27887" y2="23.3356" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFC400"/>
                                                    <stop offset="1" stop-color="#FF9F00"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_13_435">
                                                    <rect width="25.3679" height="23.6767" fill="white" transform="translate(0.27887 0.410034)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        @endfor
                                    </div>
                                    @php
                                        $reviewCount = App\Models\Product::avg('average_rating');
                                        $reviewCount = round($reviewCount, 1); 

                                        $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 

                                    @endphp
                                    <p class="bn-rating-info">{{get_phrase('Based on')}} <span class="fw-bold">{{ $totalRatings }}</span> {{get_phrase('Reviews!')}}</p>
                                    <div class="bnrating-arrow-shape">
                                        <img class="shape" src="{{ asset('assets/frontend/watch/images/bn-arrow-shape.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="bn-subtitle-wrap">
                                    <div class="bn-subtitle-shape">
                                       
                                        <img  src="{{ asset('assets/frontend/watch/images/4corner-shape.png') }}" alt="">
                                    </div>
                                    <p class="banner-subtitle">{{get_phrase('“Discover watches and jewelry that celebrate heritage, precision & personal style.”')}}</p>
                                </div>
                            </div>
                            <div class="bn-slider-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                                <!-- Swiper -->
                                <div class="swiper banner-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="wch-banner-slide">
                                                <img class="banner" src="{{ asset('assets/frontend/watch/images/watch-1.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="wch-banner-slide">
                                               <img class="banner" src="{{ asset('assets/frontend/watch/images/watch-2.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="wch-banner-slide">
                                               <img class="banner" src="{{ asset('assets/frontend/watch/images/watch-3.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="wch-banner-slide">
                                                <img class="banner" src="{{ asset('assets/frontend/watch/images/watch-4.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wch-banner-pagination">
                                        <div class="swiper-button-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="25" viewBox="0 0 39 25" fill="none">
                                                <path d="M13.9833 1.14912C14.8888 1.41559 14.8889 1.41664 14.8889 1.41689L14.8879 1.41693L14.888 1.41888C14.8875 1.4201 14.8867 1.42207 14.8862 1.42383C14.8851 1.42766 14.8837 1.43335 14.8819 1.43962C14.8779 1.4528 14.8715 1.47159 14.8643 1.49496C14.8496 1.54233 14.8284 1.61079 14.8001 1.69659C14.7434 1.86875 14.6586 2.1147 14.5462 2.41603C14.3217 3.0185 13.9828 3.8495 13.5237 4.76736C12.617 6.58023 11.1905 8.83722 9.16384 10.295C8.34726 10.8824 7.50055 11.3802 6.67481 11.8015L38.2554 10.6778L38.3226 12.5653L6.74197 13.689C7.59566 14.0505 8.47544 14.4868 9.33177 15.0147C11.457 16.3249 13.0402 18.4746 14.0735 20.2185C14.5967 21.1015 14.9938 21.9062 15.2606 22.4912C15.394 22.7839 15.4961 23.0231 15.5649 23.1908C15.5992 23.2745 15.6252 23.3412 15.6433 23.3874C15.6522 23.4102 15.6598 23.4285 15.6647 23.4413C15.6671 23.4475 15.6688 23.453 15.6702 23.4568C15.6709 23.4585 15.6718 23.4604 15.6723 23.4616L15.6724 23.4635L15.6733 23.4635C15.6699 23.4651 15.6158 23.4863 14.789 23.7949L13.9047 24.1254L13.9037 24.1235L13.8853 24.0743C13.8709 24.0375 13.848 23.9811 13.8178 23.9077C13.7574 23.7603 13.6656 23.5438 13.5432 23.2754C13.2978 22.7372 12.9311 21.994 12.4495 21.1812C11.4727 19.5327 10.0797 17.6939 8.34143 16.6222C6.51607 15.497 4.53922 14.814 3.00361 14.4122C2.23932 14.2123 1.59229 14.0832 1.13934 14.0056C0.913432 13.9668 0.73625 13.9407 0.61757 13.9245C0.558259 13.9164 0.512823 13.9112 0.484077 13.9077C0.470136 13.906 0.459897 13.9046 0.453649 13.9039C0.45056 13.9036 0.44782 13.9033 0.446783 13.9032L0.479914 12.9668L0.380317 12.0352C0.381333 12.035 0.384098 12.0346 0.387114 12.034C0.39328 12.0329 0.40346 12.0307 0.417195 12.0281C0.445603 12.0225 0.490628 12.0141 0.549159 12.0019C0.666364 11.9772 0.841323 11.9385 1.06384 11.8839C1.5101 11.7742 2.14643 11.5995 2.8945 11.3458C4.3976 10.8359 6.32105 10.014 8.06175 8.76196C9.71935 7.56953 10.9782 5.63626 11.8354 3.92256C12.258 3.07765 12.5709 2.31015 12.7775 1.75586C12.8805 1.47963 12.9566 1.25704 13.0065 1.1057C13.0313 1.03042 13.0502 0.972504 13.062 0.934675L13.0768 0.884312L13.0777 0.882325L13.9833 1.14912Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="swiper-button-next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="24" viewBox="0 0 39 24" fill="none">
                                                <path d="M23.8991 0.795814C23.0148 1.12595 23.0147 1.12703 23.0148 1.12727L23.0158 1.12724L23.0159 1.12919C23.0163 1.13038 23.0173 1.13227 23.018 1.134C23.0194 1.13775 23.0211 1.14331 23.0234 1.14944C23.0283 1.16231 23.036 1.18058 23.0449 1.2034C23.0629 1.2496 23.0889 1.31636 23.1232 1.39996C23.192 1.56765 23.2941 1.80693 23.4276 2.09954C23.6944 2.68453 24.0914 3.48931 24.6146 4.37224C25.6479 6.11609 27.2312 8.26597 29.3564 9.57606C30.2126 10.1039 31.0925 10.5402 31.9462 10.9018L0.365562 12.0255L0.432722 13.913L32.0133 12.7893C31.1875 13.2106 30.3409 13.7083 29.5243 14.2957C27.4976 15.7536 26.0711 18.0105 25.1644 19.8234C24.7053 20.7413 24.3664 21.5723 24.1419 22.1747C24.0296 22.4761 23.9447 22.722 23.888 22.8942C23.8597 22.98 23.8386 23.0485 23.8239 23.0958C23.8166 23.1192 23.8103 23.138 23.8063 23.1511C23.8044 23.1575 23.8031 23.1631 23.802 23.1669C23.8014 23.1687 23.8005 23.1707 23.8002 23.1719L23.8003 23.1738L23.7993 23.1739C23.8017 23.1749 23.8485 23.1896 24.7049 23.4416L25.6104 23.7084L25.6114 23.7064L25.6262 23.6561C25.6379 23.6183 25.6568 23.5604 25.6816 23.4851C25.7315 23.3338 25.8077 23.1112 25.9106 22.8349C26.1172 22.2806 26.4301 21.5132 26.8527 20.6682C27.7099 18.9545 28.9687 17.0213 30.6264 15.8288C32.3671 14.5767 34.2905 13.7549 35.7936 13.245C36.5418 12.9912 37.178 12.8166 37.6243 12.7069C37.8469 12.6522 38.0217 12.6135 38.139 12.5889C38.1976 12.5766 38.2425 12.5682 38.2709 12.5627C38.2848 12.56 38.2948 12.5579 38.301 12.5568C38.3041 12.5562 38.3068 12.5557 38.3078 12.5555L38.2082 11.6239L38.2414 10.6876C38.2403 10.6875 38.2376 10.6872 38.2345 10.6868C38.2282 10.6861 38.218 10.6847 38.2041 10.683C38.1753 10.6796 38.1299 10.6744 38.0706 10.6663C37.9519 10.6501 37.7747 10.6239 37.5488 10.5852C37.0959 10.5075 36.4488 10.3785 35.6845 10.1786C34.149 9.77682 32.172 9.09374 30.3467 7.96854C28.6085 6.89693 27.2154 5.05804 26.2386 3.40959C25.7571 2.59682 25.3904 1.85353 25.1449 1.31532C25.0226 1.04708 24.9308 0.830493 24.8703 0.683082C24.8402 0.609727 24.8172 0.553328 24.8028 0.516431L24.7845 0.467248L24.7834 0.465331L23.8991 0.795814Z" fill="white"/>
                                            </svg>
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

    <!-- Brand Area Start -->
    <section class="brand-section overflow-hidden wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper brand-slider">
                        <div class="swiper-wrapper">
                            @php 
                                $brands = App\Models\Brand::get();
                            @endphp
                            @foreach($brands as $brand)
                            <div class="swiper-slide">
                                <div class="brand-slide-img">
                                    <img class="brand" src="{{ get_image($brand->logo) }}" alt="">
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Area End -->

    <!-- Category Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-title-area">
                        <div class="wch-section-badge mb-10px justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <img class="badge-shape-left" src=" {{ asset('assets/frontend/watch/images/badge-shape-left.svg') }}" alt="shape">
                            <p>{{get_phrase('Our Categories')}}</p>
                            <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg') }}" alt="shape">
                        </div>
                        <h2 class="section-title mb-40px text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Shop by')}} <span class="fst-italic">{{get_phrase('Category')}}</span></h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn wch-btn-skin min-w-209px">{{get_phrase('Explore More')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".4s">
                <div class="col-12">
                    <!-- Slider main container -->
                    <div class="swiper category-slider">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                            @endphp
                            @foreach($categories as $category)
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="category-card">
                                    <a href="{{ route('products', get_category_params($category)) }}" class="category-card-banner">
                                        <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="category">
                                    </a>
                                    <div class="category-card-body">
                                        <div class="category-card-iconbox">
                                            <img src="{{ get_image($category->icon) }}" alt="">
                                        </div>
                                        <a href="{{ route('products', get_category_params($category)) }}" class="category-card-title">{{$category->title}}</a>
                                        <p class="category-card-subtitle">{{$category->description}}</p>
                                       
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Area End -->

    <!-- Featured Collection Area Start -->
    <section class="featured-collection-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-50px">
                        <div class="wch-section-badge mb-10px justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <img class="badge-shape-left" src=" {{ asset('assets/frontend/watch/images/badge-shape-left.svg') }} " alt="shape">
                            <p>{{get_phrase('Featured Collection')}}</p>
                            <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg') }}"  alt="shape">
                        </div>
                        <h2 class="section-title mb-26px text-center max-w-922px mx-auto wow animate__fadeInUp" data-wow-delay=".2s"><span class="fst-italic">{{get_phrase('Curated Collections  for Every Taste!')}}</h2>
                        <p class="section-subtitle mb-40px text-center max-w-676px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase("Our community's favorites timeless designs, exceptional quality & the pieces that keep selling out. Discover what everyone’s talking about.")}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn wch-btn-skin min-w-209px">{{get_phrase('Explore All')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-12">
                    <!-- Slider main container -->
                    <div class="swiper featured-collection-slider">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach($popular_products as $product)
                            <!-- Slider -->
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-banner-area">
                                        @if ($product->label)
                                            <p class="product-card-badge capitalize">{{$product->label}}</p>
                                         @endif
                                        <a href="javascript:;"  class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                            <span class="product-card-bookmark-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8894 4.73164C14.0579 3.65477 15.5796 3.0498 17.1682 3.0498C18.8835 3.0498 20.5211 3.75519 21.72 4.99844C22.9104 6.23185 23.5731 7.89451 23.5731 9.62121C23.5731 11.348 22.9103 13.0107 21.72 14.244C20.9285 15.0645 20.1382 15.9036 19.3439 16.747C17.7304 18.4603 16.0996 20.1918 14.4056 21.8232L14.4017 21.827C13.5281 22.6559 12.1446 22.6258 11.3083 21.759L4.05829 14.2439C1.58832 11.6836 1.58832 7.55887 4.05829 4.99855C6.47534 2.4931 10.3675 2.40414 12.8894 4.73164Z" fill="#26262F"/>
                                                </svg>
                                            </span>
                                        </a> 
                                        <!-- Swiper -->
                                        <div class="pc-inner-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="product-card-banner-slide">
                                                        @php
                                                            $thumbnails = json_decode($product->thumbnail, true);
                                                            $firstImage = $thumbnails[0] ?? null;
                                                        @endphp
                                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card-body">
                                        <div class="d-flex align-items-center gap-2 mb-12px flex-wrap">
                                                <div class="pc-star-rating d-flex">
                                                    @php
                                                        $rating = $product->average_rating;
                                                        $fullStars = floor($rating); // full stars count
                                                        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                        $emptyStars = 5 - ($fullStars + $halfStar);
                                                    @endphp

                                                    {{-- Full stars --}}
                                                    @for($i = 0; $i < $fullStars; $i++)
                                                        <div class="pc-star-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                                <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#F86626"/>
                                                            </svg>
                                                        </div>
                                                    @endfor

                                                    {{-- Half star --}}
                                                    @if($halfStar)
                                                        <div class="pc-star-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                                <defs>
                                                                    <linearGradient id="half-grad">
                                                                        <stop offset="50%" stop-color="#F86626"/>
                                                                        <stop offset="50%" stop-color="#ccc"/>
                                                                    </linearGradient>
                                                                </defs>
                                                                <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                            </svg>
                                                        </div>
                                                    @endif

                                                    {{-- Empty stars --}}
                                                    @for($i = 0; $i < $emptyStars; $i++)
                                                        <div class="pc-star-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                                <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                            </svg>
                                                        </div>
                                                    @endfor
                                                </div>

                                                <p class="pc-rating-review-total">{{ number_format($product->average_rating, 1) }} <span class="ec-text-gray">({{ $product->reviews->count() }})</span></p>
                                            </div>

                                         <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 30, '...') }}</a>
                                        <p class="product-card-subtitle">
                                            {{ \Illuminate\Support\Str::limit($product->summary, 50, '...') }}
                                        </p>
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                                            @if ($product->is_discounted)
                                                @php
                                                    $discount = $product->discount;
                                                @endphp
                                                @if ($discount->discount_type == 'percentage')
                                                    <h4 class="pc-new-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                                    <h5 class="pc-old-price">{{currency($product->price)}}</h5>
                                                @else
                                                <h4 class="pc-new-price">{{currency( $product->discount->discount_value)}}</h4>
                                                <h5 class="pc-old-price">{{currency($product->price)}}</h5>
                                                @endif
                                            @else
                                                <h4 class="pc-new-price">{{ currency($product->price) }}</h4>
                                            @endif
                                        </div>
                                        <a href="{{ route('product', $product->slug) }}" class="btn wch-sm-btn-black">{{get_phrase('View Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            @endforeach
                        </div>
                        <div class="product-card-pagination">
                            <div class="swiper-button-prev2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="25" viewBox="0 0 39 25" fill="none">
                                    <path d="M13.9832 1.14912C14.8888 1.41559 14.8889 1.41664 14.8888 1.41689L14.8879 1.41693L14.8879 1.41888C14.8875 1.4201 14.8867 1.42207 14.8861 1.42383C14.885 1.42766 14.8837 1.43335 14.8818 1.43962C14.8778 1.4528 14.8715 1.47159 14.8642 1.49496C14.8495 1.54233 14.8283 1.61079 14.8001 1.69659C14.7434 1.86875 14.6585 2.1147 14.5462 2.41603C14.3216 3.0185 13.9828 3.8495 13.5237 4.76736C12.6169 6.58023 11.1905 8.83722 9.1638 10.295C8.34723 10.8824 7.50052 11.3802 6.67478 11.8015L38.2554 10.6778L38.3225 12.5653L6.74194 13.689C7.59563 14.0505 8.47541 14.4868 9.33174 15.0147C11.457 16.3249 13.0402 18.4746 14.0735 20.2185C14.5967 21.1015 14.9937 21.9062 15.2605 22.4912C15.394 22.7839 15.4961 23.0231 15.5649 23.1908C15.5992 23.2745 15.6252 23.3412 15.6432 23.3874C15.6522 23.4102 15.6598 23.4285 15.6647 23.4413C15.667 23.4475 15.6687 23.453 15.6701 23.4568C15.6708 23.4585 15.6718 23.4604 15.6723 23.4616L15.6723 23.4635L15.6733 23.4635C15.6699 23.4651 15.6158 23.4863 14.789 23.7949L13.9047 24.1254L13.9037 24.1235L13.8853 24.0743C13.8709 24.0375 13.8479 23.9811 13.8178 23.9077C13.7573 23.7603 13.6656 23.5438 13.5432 23.2754C13.2977 22.7372 12.9311 21.994 12.4495 21.1812C11.4727 19.5327 10.0797 17.6939 8.3414 16.6222C6.51604 15.497 4.53919 14.814 3.00358 14.4122C2.23929 14.2123 1.59226 14.0832 1.13931 14.0056C0.913402 13.9668 0.73622 13.9407 0.617539 13.9245C0.558229 13.9164 0.512793 13.9112 0.484047 13.9077C0.470105 13.906 0.459866 13.9046 0.453619 13.9039C0.450529 13.9036 0.447789 13.9033 0.446753 13.9032L0.479884 12.9668L0.380287 12.0352C0.381302 12.035 0.384067 12.0346 0.387084 12.034C0.39325 12.0329 0.403429 12.0307 0.417164 12.0281C0.445572 12.0225 0.490597 12.0141 0.549129 12.0019C0.666333 11.9772 0.841293 11.9385 1.06381 11.8839C1.51007 11.7742 2.1464 11.5995 2.89447 11.3458C4.39757 10.8359 6.32102 10.014 8.06172 8.76196C9.71932 7.56953 10.9782 5.63626 11.8354 3.92256C12.258 3.07765 12.5709 2.31015 12.7775 1.75586C12.8804 1.47963 12.9566 1.25704 13.0065 1.1057C13.0313 1.03042 13.0502 0.972504 13.0619 0.934675L13.0768 0.884312L13.0777 0.882325L13.9832 1.14912Z" fill="black"/>
                                </svg>
                            </div>
                            <div class="swiper-pagination2"></div>
                            <div class="swiper-button-next2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="24" viewBox="0 0 39 24" fill="none">
                                    <path d="M23.8991 0.795814C23.0148 1.12595 23.0147 1.12703 23.0148 1.12727L23.0158 1.12724L23.0159 1.12919C23.0164 1.13038 23.0173 1.13227 23.018 1.134C23.0194 1.13775 23.0211 1.14331 23.0234 1.14944C23.0284 1.16231 23.036 1.18058 23.0449 1.2034C23.063 1.2496 23.0889 1.31636 23.1232 1.39996C23.192 1.56765 23.2941 1.80693 23.4276 2.09954C23.6944 2.68453 24.0915 3.48931 24.6146 4.37224C25.648 6.11609 27.2312 8.26597 29.3564 9.57606C30.2127 10.1039 31.0926 10.5402 31.9462 10.9018L0.365577 12.0255L0.432738 13.913L32.0133 12.7893C31.1875 13.2106 30.3409 13.7083 29.5243 14.2957C27.4976 15.7536 26.0712 18.0105 25.1644 19.8234C24.7053 20.7413 24.3665 21.5723 24.1419 22.1747C24.0296 22.4761 23.9447 22.722 23.888 22.8942C23.8598 22.98 23.8386 23.0485 23.8239 23.0958C23.8166 23.1192 23.8103 23.138 23.8063 23.1511C23.8044 23.1575 23.8031 23.1631 23.802 23.1669C23.8014 23.1687 23.8005 23.1707 23.8002 23.1719L23.8003 23.1738L23.7993 23.1739C23.8018 23.1749 23.8485 23.1896 24.7049 23.4416L25.6105 23.7084L25.6114 23.7064L25.6262 23.6561C25.6379 23.6183 25.6568 23.5604 25.6817 23.4851C25.7315 23.3338 25.8077 23.1112 25.9106 22.8349C26.1172 22.2806 26.4301 21.5132 26.8527 20.6682C27.7099 18.9545 28.9688 17.0213 30.6264 15.8288C32.3671 14.5767 34.2905 13.7549 35.7937 13.245C36.5418 12.9912 37.178 12.8166 37.6243 12.7069C37.8469 12.6522 38.0218 12.6135 38.139 12.5889C38.1976 12.5766 38.2425 12.5682 38.271 12.5627C38.2848 12.56 38.2948 12.5579 38.301 12.5568C38.3041 12.5562 38.3068 12.5557 38.3078 12.5555L38.2082 11.6239L38.2414 10.6876C38.2403 10.6875 38.2376 10.6872 38.2345 10.6868C38.2283 10.6861 38.218 10.6847 38.2041 10.683C38.1753 10.6796 38.1299 10.6744 38.0706 10.6663C37.9519 10.6501 37.7747 10.6239 37.5488 10.5852C37.0959 10.5075 36.4488 10.3785 35.6845 10.1786C34.149 9.77682 32.172 9.09374 30.3467 7.96854C28.6085 6.89693 27.2154 5.05804 26.2386 3.40959C25.7571 2.59682 25.3904 1.85353 25.1449 1.31532C25.0226 1.04708 24.9308 0.830493 24.8703 0.683082C24.8402 0.609727 24.8173 0.553328 24.8028 0.516431L24.7845 0.467248L24.7834 0.465331L23.8991 0.795814Z" fill="black"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Collection Area End -->

    <!-- Highlighted Product Area Start -->
    <section class="highlight-product-section">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-7">
                    <div class="highlighted-product-details wow animate__fadeInUp" data-wow-delay=".1s">
                        <div class="highlight-shape">
                            <img class="shape" src="assets/images/highlight-shape.png" alt="">
                        </div>
                        <div class="wch-section-badge mb-26px wow animate__fadeInUp" data-wow-delay=".2s">
                            <img class="badge-shape-left" src="{{ asset('assets/frontend/watch/images/badge-shape-left.svg') }}" alt="shape">
                            <p>{{get_phrase('Highlighted Product')}}</p>
                            <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg ') }}" alt="shape">
                        </div>
                        <h2 class="section-title hp-section-title wow animate__fadeInUp" data-wow-delay=".3s"><span class="fst-italic text-linear">{{get_phrase('Limited Edition')}}</span>🌟 {{get_phrase('The Valtor Chrono 500!')}}</h2>
                        <div class="hp-subtitle-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                            <p class="section-subtitle fw-bold text-black text-uppercase">{{get_phrase('“Crafted for the Few. Built to Last.”')}}</p>
                            <p class="section-subtitle">{{get_phrase('Only 500 pieces made. Swiss precision meets timeless design.')}}</p>
                            <p class="section-subtitle">{{get_phrase('Precision-engineered in brushed titanium and fitted with genuine Swiss movement, the Valtor Chrono 500 is more than a watch—it’s a symbol of distinction. Sapphire crystal glass, hand-assembled detailing, and a numbered caseback make each piece a rare collectible. Built for those who value time as much as legacy.')}}</p>
                        </div>
                        <a href="{{route('all_products')}}" class="btn wch-btn-skin min-w-209px wow animate__fadeInUp" data-wow-delay=".5s">{{get_phrase('View Full Specs')}}</a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-5">
                    <div class="highlighted-banner-wrap">
                        <div class="highlighted-banner1 wow animate__fadeInRight" data-wow-delay=".3s">
                            <img class="banner" src="{{ asset('assets/frontend/watch/images/highlight-banner1.webp') }}" alt="category">
                        </div>
                        <div class="highlighted-banner2 wow animate__fadeInRight" data-wow-delay=".4s">
                              <img class="banner" src="{{ asset('assets/frontend/watch/images/highlight-banner2.webp') }}" alt="category">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Highlighted Product Area End -->

    <!-- Featured Collection 2 Area Start -->
    <section class="featured-collection2-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fc2-section-title-area">
                        <div class="wch-section-badge mb-30px justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <img class="badge-shape-left" src="{{ asset('assets/frontend/watch/images/badge-shape-left.svg') }}" alt="shape">
                            <p>{{get_phrase('Featured Collection')}}</p>
                            <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg') }}" alt="shape">
                        </div>
                        <h2 class="section-title mb-30px text-center max-w-1053px mx-auto wow animate__fadeInUp" data-wow-delay=".2s"><span class="fst-italic">{{get_phrase('Celebrate life’s moments with timeless pieces designed')}}</h2>
                        <p class="section-subtitle mb-30px text-center max-w-717px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Celebrate life’s moments with timeless pieces designed to mark love, milestones, and everyday beauty.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn wch-btn-skin min-w-209px">{{get_phrase('Shop All Gift Ideas')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-22px gy-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-md-10 col-lg-6">
                    <a href="{{route('all_products')}}" class="collection-card">
                        <div class="collection-card-image">
                              <img class="banner" src="{{ asset('assets/frontend/watch/images/collection-banner1.webp') }}" alt="category">
                        </div>
                        <div class="collection-card-content">
                            <div class="collection-category">
                                <p>{{get_phrase('Anniversary')}}</p>
                                <p>{{get_phrase('Gifts')}}</p>
                            </div>
                            <h3 class="collection-card-title"><span class="fst-italic">{{get_phrase('Celebrate Years')}}</span>, {{get_phrase('Cherish Moments')}}</h3>
                            <p class="collection-card-subtitle">{{get_phrase('Symbolic designs that honor lasting love perfect for meaningful milestones.')}}</p>
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-10 col-lg-6">
                    <a href="{{route('all_products')}}" class="collection-card">
                        <div class="collection-card-image">
                           <img class="banner" src="{{ asset('assets/frontend/watch/images/collection-banner2.webp') }}" alt="category">
                        </div>
                        <div class="collection-card-content">
                            <div class="collection-category">
                                <p>{{get_phrase('Wedding')}}</p>
                                <p>{{get_phrase('Sets')}}</p>
                            </div>
                            <h3 class="collection-card-title"><span class="fst-italic">{{get_phrase('Elegant Beginnings')}}</span>, {{get_phrase('Forever Bonds')}}</h3>
                            <p class="collection-card-subtitle">{{get_phrase('Graceful sets made to shine on your special day and every day after.')}}</p>
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-10 col-lg-6">
                    <a href="{{route('all_products')}}" class="collection-card">
                        <div class="collection-card-image">
                            <img class="banner" src="{{ asset('assets/frontend/watch/images/collection-banner3.webp') }}" alt="category">
                        </div>
                        <div class="collection-card-content">
                            <div class="collection-category">
                                <p>{{get_phrase('Everyday')}}</p>
                                <p>{{get_phrase('Elegance')}}</p>
                            </div>
                            <h3 class="collection-card-title"><span class="fst-italic">{{get_phrase('Effortless Beauty')}}</span>, {{get_phrase('Daily Confidence')}}</h3>
                            <p class="collection-card-subtitle">{{get_phrase('Refined pieces for the ones who believe in beauty in the small moments.')}}</p>
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-10 col-lg-6">
                    <a href="{{route('all_products')}}" class="collection-card">
                        <div class="collection-card-image">
                            <img class="banner" src="{{ asset('assets/frontend/watch/images/collection-banner4.webp') }}" alt="category">
                        </div>
                        <div class="collection-card-content">
                            <div class="collection-category">
                                <p>{{get_phrase('Formal')}}</p>
                                <p>{{get_phrase('Collection')}}</p>
                            </div>
                            <h3 class="collection-card-title"><span class="fst-italic">{{get_phrase('Sophistication')}}</span> {{get_phrase('for Every Occasion')}}</h3>
                            <p class="collection-card-subtitle">{{get_phrase('Impeccable watches and jewelry that complete your look—whether boardroom or ballroom.')}}</p>
                          
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Collection 2 Area End -->

    <!-- Customers Testimonials Area Start -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="testimonial-section-title-area">
                    <div class="wch-section-badge mb-30px justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
                        <img class="badge-shape-left" src=" {{ asset('assets/frontend/watch/images/badge-shape-left.svg') }}" alt="shape">
                        <p>{{get_phrase('Customers Testimonials')}}</p>
                        <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg') }}" alt="shape">
                    </div>
                    <h2 class="section-title mb-40px text-center max-w-1053px mx-auto wow animate__fadeInUp" data-wow-delay=".2s"><span class="fst-italic">{{get_phrase('What Our Customers')}}</span> {{get_phrase('Are Saying!')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                        <div class="testimonial-wrapper wow animate__fadeInUp" data-wow-delay=".3s">
                            <div class="ts-profile-items">
                                @foreach($reviews as $review)
                                    <div class="ts-profile-image">
                                        <img src="{{ get_image($review->user->photo) }}" alt="">
                                    </div>
                                @endforeach
                            </div>

                            <div class="ts-content-items wow animate__fadeInUp" data-wow-delay=".4s">
                                @foreach($reviews as $review)
                                    <div class="ts-content-item">
                                        <h4 class="ts-user-name">{{ $review->user->name }}</h4>
                                        <div class="ts-user-rating">
                                            <div class="ts-rating-star d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28" fill="none">
                                                        <g clip-path="url(#clip0_26_303)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4742 0.952733L18.9195 8.28201L26.9548 9.2838C27.6988 9.37967 28.2432 10.0662 28.1476 10.8106C28.0993 11.1735 27.9182 11.488 27.6605 11.7081L21.8113 17.1857L23.3381 25.1445C23.4808 25.8888 22.9945 26.6045 22.2497 26.7476C21.9255 26.8047 21.6012 26.7476 21.3339 26.5949L14.2335 22.692L7.14349 26.5949C6.47574 26.967 5.6454 26.7191 5.28296 26.0603C5.12036 25.7646 5.08238 25.44 5.1399 25.1445L6.65679 17.1857L0.750369 11.641C0.205779 11.1255 0.17702 10.2576 0.692481 9.71336C0.921452 9.46521 1.2179 9.33174 1.52282 9.2934V9.2838L9.55782 8.28201L13.0027 0.952733C13.318 0.265821 14.1295 -0.0203003 14.816 0.294581C15.1213 0.437641 15.3411 0.676199 15.4742 0.952733Z" fill="url(#paint0_linear_26_303)"/>
                                                        </g>
                                                        <defs>
                                                            <linearGradient id="paint0_linear_26_303" x1="0.323242" y1="0.166992" x2="0.323242" y2="26.7693" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#FFC400"/>
                                                            <stop offset="1" stop-color="#FF9F00"/>
                                                            </linearGradient>
                                                            <clipPath id="clip0_26_303">
                                                            <rect width="29.4363" height="27.4739" fill="white" transform="translate(0.323242 0.166992)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="ts-user-comment">{{ $review->comment }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Customers Testimonials Area End -->

    <!-- Why Choose Us Area Start -->
    <section class="why-choose-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wch-section-badge mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                        <img class="badge-shape-left" src="{{ asset('assets/frontend/watch/images/badge-shape-left.svg') }}" alt="shape">
                        <p>{{get_phrase('Why Choose Us?')}}</p>
                        <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg') }}" alt="shape">
                    </div>
                    <div class="why-choose-title-area">
                        <h2 class="section-title why-choose-section-title wow animate__fadeInUp" data-wow-delay=".2s"><span class="fst-italic text-linear">{{get_phrase('Crafted with Care.')}}</span>{{get_phrase('Backed by Trust.')}}</h2>
                        <div class="wc-section-title-right">
                            <p class="section-subtitle mb-30px wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('We believe trust is earned—through quality, service, and transparency.')}}</p>
                            <a href="{{route('all_products')}}" class="btn wch-btn-skin wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('Shop Now!')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="wch-benefit-wrap">
                        <div class="wch-benefit-icon">
                            <img class="icon" src="{{ asset('assets/frontend/watch/images/why-choose-icon1.svg') }}" alt="">
                        </div>
                        <h4 class="wch-benefit-title wch-benefit-line1">{{get_phrase('100% Genuine Materials')}}</h4>
                        <p class="wch-benefit-subtitle">{{get_phrase('Prompt, tracked delivery to your doorstep because you shouldn’t have to wait for beauty.')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="wch-benefit-wrap">
                        <div class="wch-benefit-icon">
                            <img class="icon" src="{{ asset('assets/frontend/watch/images/why-choose-icon2.svg') }}" alt="">
                        </div>
                        <h4 class="wch-benefit-title wch-benefit-line2">{{get_phrase('Secure Payment Guarantee')}}</h4>
                        <p class="wch-benefit-subtitle">{{get_phrase('Your data is encrypted and your checkout is protected, every step of the way.')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="wch-benefit-wrap">
                        <div class="wch-benefit-icon">
                             <img class="icon" src="{{ asset('assets/frontend/watch/images/why-choose-icon3.svg') }}" alt="">
                        </div>
                        <h4 class="wch-benefit-title">{{get_phrase('Fast & Secure Shipping')}}</h4>
                        <p class="wch-benefit-subtitle">{{get_phrase('Prompt, tracked delivery to your doorstep because you shouldn’t have to wait for beauty.')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area End -->