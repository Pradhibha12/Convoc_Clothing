     <!-- Hero Banner Area Start  -->
    <section class="mi-hero-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="hero-content-area">
                        <h1 class="hero-title text-center text-lg-start wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Top-quality instruments for musicians of every level.')}}</h1>
                        <p class="hero-subtitle text-center text-lg-start wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Top-quality instruments for musicians of every level.')}}</p>
                        <div class="d-flex align-items-center gap-12px flex-wrap justify-content-center justify-content-lg-start wow animate__fadeInUp" data-wow-delay=".3s">
                           
                            <a href="{{route('all_products')}}" class="btn mib2-btn-outline-dark">
                                <span>{{get_phrase('Explore Collection')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                    <path d="M3.0772 1.11306C3.04036 1.73354 3.47128 2.24739 4.03974 2.26058L9.27203 2.38194L1.00516 10.6774C0.577174 11.1069 0.534937 11.8184 0.910826 12.2665C1.28672 12.7146 1.93843 12.7298 2.36642 12.3003L10.6334 4.00464L10.2944 9.71698C10.2575 10.3375 10.6885 10.8513 11.2569 10.8645C11.8254 10.8777 12.316 10.3854 12.3529 9.76477L12.8529 1.33983C12.8707 1.04178 12.7792 0.753493 12.5987 0.538302C12.4182 0.323111 12.1634 0.198647 11.8904 0.192311L4.17311 0.0132683C3.60469 0.000126692 3.11404 0.492474 3.0772 1.11306Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="hero-slider-area wow animate__fadeInUp" data-wow-delay=".3s">
                        <!-- Swiper -->
                        <div class="swiper hero-banner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/music/images/hero-banner1.webp') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/music/images/hero-banner1.webp') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                         <img class="banner" src="{{ asset('assets/frontend/music/images/hero-banner1.webp') }}" alt="banner">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slider-nav">
                            <button class="hero-slider-prev">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.813708 7.02519C0.423183 7.41572 0.423183 8.04888 0.813708 8.43941L7.17767 14.8034C7.56819 15.1939 8.20136 15.1939 8.59188 14.8034C8.98241 14.4128 8.98241 13.7797 8.59188 13.3892L2.93503 7.7323L8.59188 2.07545C8.98241 1.68492 8.98241 1.05176 8.59188 0.661232C8.20136 0.270708 7.56819 0.270708 7.17767 0.661232L0.813708 7.02519ZM19.7323 7.7323V6.7323L1.52081 6.7323V7.7323V8.7323L19.7323 8.7323V7.7323Z" fill="black"/>
                                </svg>
                            </button>
                            <button class="hero-slider-next">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.651 8.70711C20.0415 8.31658 20.0415 7.68342 19.651 7.29289L13.287 0.928933C12.8965 0.538408 12.2633 0.538408 11.8728 0.928933C11.4823 1.31946 11.4823 1.95262 11.8728 2.34315L17.5296 8L11.8728 13.6569C11.4823 14.0474 11.4823 14.6805 11.8728 15.0711C12.2633 15.4616 12.8965 15.4616 13.287 15.0711L19.651 8.70711ZM0.73233 8V9H18.9438V8V7H0.73233V8Z" fill="black"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Banner Area End  -->
     
    <!-- Explore by Instrument Area Start  -->
    <section class="explore-instrument-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="category-section-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Explore by Instrument')}}</h2>
                    <!-- Swiper -->
                    <div class="swiper category-slider wow animate__fadeInUp" data-wow-delay=".2s">
                        <div class="swiper-wrapper">
                             @foreach($categories as $category)
                            <div class="swiper-slide">
                                <a href="{{ route('products', get_category_params($category)) }}" class="category-slide">
                                    <span class="category-icon fill">
                                       <img src="{{ get_image($category->icon) }}" alt="">
                                    </span>
                                    <h4 class="category-title">{{ $category->title }}</h4>
                                    <div class="text-center">
                                        <span class="btn mi-btn-dark category-btn">{{get_phrase('View Products')}}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                        <div class="category-slider-nav">
                            <div class="swiper-button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="25" viewBox="0 0 14 25" fill="none">
                                    <path d="M11.2378 24.5191L0.474845 13.6531C0.324335 13.5017 0.204915 13.3218 0.123431 13.1237C0.0419464 12.9256 0 12.7132 0 12.4986C0 12.2841 0.0419464 12.0717 0.123431 11.8736C0.204915 11.6755 0.324335 11.4956 0.474845 11.3441L11.2378 0.478212C11.5411 0.172018 11.9525 -4.56264e-09 12.3814 0C12.8103 4.56264e-09 13.2217 0.172018 13.525 0.478212C13.8283 0.784405 13.9987 1.19969 13.9987 1.63272C13.9987 2.06574 13.8283 2.48103 13.525 2.78722L3.9042 12.5L13.5263 22.2128C13.8296 22.519 14 22.9343 14 23.3673C14 23.8003 13.8296 24.2156 13.5263 24.5218C13.223 24.828 12.8117 25 12.3828 25C11.9538 25 11.5425 24.828 11.2392 24.5218L11.2378 24.5191Z" fill="black"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="25" viewBox="0 0 14 25" fill="none">
                                    <path d="M2.76216 0.48093L13.5252 11.3469C13.6757 11.4983 13.7951 11.6782 13.8766 11.8763C13.9581 12.0744 14 12.2868 14 12.5014C14 12.7159 13.9581 12.9283 13.8766 13.1264C13.7951 13.3245 13.6757 13.5044 13.5252 13.6559L2.76216 24.5218C2.45887 24.828 2.04752 25 1.61859 25C1.18967 25 0.77832 24.828 0.475027 24.5218C0.171734 24.2156 0.00134567 23.8003 0.00134566 23.3673C0.00134566 22.9343 0.171734 22.519 0.475027 22.2128L10.0958 12.5L0.473682 2.78723C0.170389 2.48103 0 2.06574 0 1.63272C0 1.1997 0.170389 0.78441 0.473682 0.478216C0.776975 0.172022 1.18833 1.90735e-06 1.61725 1.90735e-06C2.04617 1.90735e-06 2.45752 0.172022 2.76082 0.478216L2.76216 0.48093Z" fill="black"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore by Instrument Area End  -->

    <!-- Limited Time Deal Area Start  -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ltd-section-title-area">
                        <h2 class="section-title text-center mb-20px max-w-582px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Limited-Time Deals You Canâ€™t Miss')}}ðŸ”¥</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Get exclusive discounts on best-selling guitars, keyboards, drum kits & more.  Donâ€™t miss your chance to upgrade your sound â€” at unbeatable prices.')}}</p>
                    </div>
                </div>
            </div>
            <div class="limited-deal-card-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="row limited-deal-row">
                     @foreach($latest_products->take(3) as $product)  
                    <div class="col-md-6 col-lg-4">
                        <div class="limited-deal-card">
                            <a href="{{ route('product', $product->slug) }}" class="ld-card-banner">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                <span class="ld-product-rating">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M9.8876 3.18421L11.0448 5.27694C11.2034 5.5642 11.6013 5.83709 11.9286 5.87397L13.8766 6.11883C15.1238 6.2729 15.4454 7.15805 14.5966 8.08518L13.1505 9.65584C12.9091 9.91905 12.7838 10.4212 12.8808 10.7658L13.3875 12.615C13.786 14.0749 13.0281 14.68 11.6962 13.9629L9.83566 12.961C9.49681 12.7779 8.95857 12.8045 8.64022 13.0102L6.86905 14.1566C5.60113 14.976 4.79432 14.4366 5.07253 12.9501L5.4288 11.069C5.49531 10.7173 5.33584 10.2266 5.07263 9.98524L3.49335 8.53682C2.57168 7.68487 2.81961 6.77685 4.04777 6.51941L5.96546 6.11884C6.28911 6.04854 6.66417 5.75187 6.79585 5.45002L7.77833 3.26559C8.31537 2.08867 9.26281 2.05158 9.8876 3.18421Z" fill="black"/>
                                    </svg>
                                    <span>{{ number_format($product->average_rating, 1) }}</span>
                                </span>
                               
                            </a>
                            <div>
                                <div class="d-flex gap-3 justify-content-between mb-10px">
                                    <a href="{{ route('product', $product->slug) }}" class="ld-card-title">{{$product->title}}</a>
                                    <a href="javascript:;"  class="ld-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                        <span class="ld-card-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 4.49533C13.095 3.48613 14.5211 2.91919 16.0098 2.91919C17.6174 2.91919 19.152 3.58025 20.2756 4.74537C21.3912 5.90127 22.0123 7.45944 22.0123 9.07763C22.0123 10.6959 21.3911 12.2541 20.2756 13.4099C19.5339 14.1788 18.7932 14.9652 18.0488 15.7556C16.5367 17.3612 15.0084 18.984 13.4209 20.5128L13.4172 20.5164C12.5985 21.2932 11.3019 21.265 10.5182 20.4527L3.72382 13.4098C1.40906 11.0104 1.40906 7.14489 3.72382 4.74547C5.98897 2.39747 9.63654 2.3141 11.9999 4.49533Z" fill="#828282"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>

                                
                                <div class="d-flex gap-3 justify-content-between align-items-center">
                                    @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                    <h4 class="ld-current-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                    @else
                                        <h4 class="ld-current-price">{{ currency($product->price) }}</h4>
                                    @endif
                                    @else
                                    <h4 class="ld-current-price">{{ currency($product->price) }}</h4>
                                    @endif
                                    <a href="javascript:;"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn mi-btn-dark">
                                        @if ($product->is_cart_item)
                                            {{ strtoupper(get_phrase('Added To Cart')) }}
                                        @else
                                            {{ strtoupper(get_phrase('Add To Cart')) }}
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Limited Time Deal Area End  -->

    <!-- New Arrivals Products Area Start  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="nap-section-title-area">
                        <h2 class="section-title text-center mb-18px max-w-851px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Check Out Our New Arrivals Products')}}</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto nap-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Discover the latest from Yamaha, Fender, Roland & more.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn mi-btn-outline-dark">{{get_phrase('View all')}}</a>
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
                                    <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="view">
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
                             
                                @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                     <h5 class="product-card-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h5>
                                    @else
                                        <h5 class="product-card-price">{{ currency($product->price) }}</h5>
                                    @endif
                                    @else
                                     <h5 class="product-card-price">{{ currency($product->price) }}</h5>
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

    <!-- Bundles Area Start  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bundles-section-title-area">
                        <h2 class="section-title text-center mb-18px  mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Everything You Need to Get Started')}}ðŸš€</h2>
                        <p class="section-subtitle text-center max-w-834px mx-auto nap-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Our curated kits are ideal for beginners, music students, and home creators â€” offering all the essential gear you need to start playing, recording, and creating with confidence and ease.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn mi-btn-outline-dark px-28px">{{get_phrase('View all Bundles')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".4s">
                <div class="col-12">
                    <div class="bundles-product-wrap">
                        <a href="{{route('all_products')}}" class="bp-large-card">
                            <div class="w-100 h-100">
                                <img class="bpl-card-banner" src=" {{ asset('assets/frontend/music/images/bundle-banner1.webp') }}" alt="banner">
                                <div class="bpl-card-body">
                                    <h3 class="bpl-card-title">{{get_phrase('Guitar Starter Kits')}}</h3>
                                    <p class="bpl-card-subtitle">{{get_phrase('Get everything from a quality guitar to picks, strap, tuner, and amp â€” all in one affordable bundle.')}}</p>
                                    <span class="bpl-card-btn">
                                        <span>{{get_phrase('Shop Kit Now')}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                                            <path d="M14.6674 7.14911C14.9941 6.82244 14.9941 6.2928 14.6674 5.96612L9.34399 0.64269C9.01732 0.316017 8.48768 0.316017 8.161 0.64269C7.83433 0.969362 7.83433 1.499 8.161 1.82568L12.8929 6.55762L8.161 11.2896C7.83433 11.6162 7.83433 12.1459 8.161 12.4725C8.48768 12.7992 9.01732 12.7992 9.34399 12.4725L14.6674 7.14911ZM0.691978 6.55762V7.39411H14.0759V6.55762V5.72112H0.691978V6.55762Z" fill="white"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="bp-small-card-wrap">
                            <a href="{{route('all_products')}}" class="bp-small-card mb-14px">
                                <div class="w-100 h-100">
                                    <img class="bps-card-banner" src="{{ asset('assets/frontend/music/images/bundle-banner2.webp') }}" alt="banner">
                                    <div class="bps-card-body">
                                        <h3 class="bps-card-title">{{get_phrase('Drum Set Bundles')}}</h3>
                                        <div class="bps-subtitle-btn">
                                            <p class="bps-card-subtitle">{{get_phrase('Complete acoustic and electronic drum kits with sticks, throne, and headphones')}}</p>
                                            <span class="bps-card-btn">
                                                <span>{{get_phrase('Shop Kit Now')}}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                                                    <path d="M14.6674 7.14911C14.9941 6.82244 14.9941 6.2928 14.6674 5.96612L9.34399 0.64269C9.01732 0.316017 8.48768 0.316017 8.161 0.64269C7.83433 0.969362 7.83433 1.499 8.161 1.82568L12.8929 6.55762L8.161 11.2896C7.83433 11.6162 7.83433 12.1459 8.161 12.4725C8.48768 12.7992 9.01732 12.7992 9.34399 12.4725L14.6674 7.14911ZM0.691978 6.55762V7.39411H14.0759V6.55762V5.72112H0.691978V6.55762Z" fill="white"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('all_products')}}" class="bp-small-card">
                                <div class="w-100 h-100">
                                    <img class="bps-card-banner" src="{{ asset('assets/frontend/music/images/bundle-banner3.webp') }}" alt="banner">
                                    <div class="bps-card-body">
                                        <h3 class="bps-card-title">{{get_phrase('Home Recording Starter Pack')}}</h3>
                                        <div class="bps-subtitle-btn">
                                            <p class="bps-card-subtitle">{{get_phrase('Mic, audio interface, headphones, and software')}}</p>
                                            <span class="bps-card-btn">
                                                <span>{{get_phrase('Shop Kit Now')}}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                                                    <path d="M14.6674 7.14911C14.9941 6.82244 14.9941 6.2928 14.6674 5.96612L9.34399 0.64269C9.01732 0.316017 8.48768 0.316017 8.161 0.64269C7.83433 0.969362 7.83433 1.499 8.161 1.82568L12.8929 6.55762L8.161 11.2896C7.83433 11.6162 7.83433 12.1459 8.161 12.4725C8.48768 12.7992 9.01732 12.7992 9.34399 12.4725L14.6674 7.14911ZM0.691978 6.55762V7.39411H14.0759V6.55762V5.72112H0.691978V6.55762Z" fill="white"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bundles Area End  -->

    <!-- Testimonial Area Start  -->
    <section class="testimonial-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ts-section-title-area">
                        <h2 class="section-title text-center mb-18px max-w-765px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Trusted by Musicians Everywhere')}}</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto ts-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('See what our community has to say.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('contact_us')}}" class="btn mi-btn-outline-dark px-28px">{{get_phrase('Contact us')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-main wow animate__fadeInUp" data-wow-delay=".4s">
            <!-- Swiper -->
            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">
                    @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="testimonial-slide">
                            <div class="ts-slide-left">
                                <div class="ts-rating-wrap">
                                    <div class="ts-rating-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                        <span class="ts-star">
                                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 0.398926L16.6831 8.32963L25.3637 9.3817L18.9593 15.3352L20.6412 23.9161L13 19.6649L5.35879 23.9161L7.04068 15.3352L0.636265 9.3817L9.31694 8.32963L13 0.398926Z" fill="#FFC633"/>
                                            </svg>
                                        </span>
                                        @endfor
                                    </div>
                                </div>
                                <p class="testimonial-comment">{{$review->comment}}</p>
                                <div class="ts-user-area">
                                    <h4 class="ts-user-name">{{ $review->user->name }}</h4>
                                    <p class="ts-user-role">{{ $review->user->address }}</p>
                                </div>
                            </div>
                            <div class="ts-quote-img">
                                <img class="quote" src="{{ asset('assets/frontend/music/images/quote.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="testimonial-nav">
                    <div class="swiper-button-prev">
                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.514302 10.3778C-0.0415809 10.9336 -0.0415809 11.8349 0.514302 12.3908L9.57292 21.4494C10.1288 22.0053 11.0301 22.0053 11.5859 21.4494C12.1418 20.8935 12.1418 19.9923 11.5859 19.4364L3.53384 11.3843L11.5859 3.33217C12.1418 2.77629 12.1418 1.87503 11.5859 1.31915C11.0301 0.763268 10.1288 0.763268 9.57292 1.31915L0.514302 10.3778ZM19.7323 11.3843V9.96085L1.52081 9.96085V11.3843V12.8077L19.7323 12.8077V11.3843Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.9504 11.6584C20.5062 11.1025 20.5062 10.2012 19.9504 9.64534L10.8917 0.586728C10.3359 0.0308463 9.4346 0.0308463 8.87872 0.586728C8.32284 1.14261 8.32284 2.04387 8.87872 2.59975L16.9308 10.6519L8.87872 18.704C8.32284 19.2598 8.32284 20.1611 8.87872 20.717C9.4346 21.2729 10.3359 21.2729 10.8917 20.717L19.9504 11.6584ZM0.73233 10.6519V12.0753H18.9438V10.6519V9.22843H0.73233V10.6519Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End  -->

    <!-- Blog Area Start  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-section-title-area">
                        <h2 class="section-title text-center mb-18px max-w-765px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Tips and Tutorials for Every Musician')}}</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto blog-section-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Tips, tutorials, and gear guides for every stage of your journey.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('blog')}}" class="btn mi-btn-outline-dark">{{get_phrase('Read All Blogs')}}</a>
                        </div>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-12">
                    @foreach($blogs->take(3) as $blog)
                        @if($loop->iteration == 2) 
                            {{-- second blog reverse layout hobe --}}
                            <div class="blog-post-wrap flex-wrap-reverse wow animate__fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                                <div class="blog-post-body">
                                    <div class="blog-post-body-inner">
                                        <p class="blog-post-date">{{ $blog->created_at->format('d M, Y') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-title">
                                            {{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}
                                        </a>
                                        <p class="blog-post-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-read-btn">
                                            <span>{{ get_phrase('Read Now') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                                                <path d="M22.7079 11.0343C23.2263 10.5159 23.2263 9.67546 22.7079 9.15706L14.2601 0.709242C13.7417 0.190842 12.9012 0.190842 12.3828 0.709242C11.8644 1.22764 11.8644 2.06813 12.3828 2.58653L19.892 10.0957L12.3828 17.6049C11.8644 18.1233 11.8644 18.9638 12.3828 19.4822C12.9012 20.0006 13.7417 20.0006 14.2601 19.4822L22.7079 11.0343ZM0.530151 10.0957V11.4231H21.7693V10.0957V8.76826H0.530151V10.0957Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                            </div>
                        @else
                            {{-- 1st + 3rd blog normal layout hobe --}}
                            <div class="blog-post-wrap wow animate__fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                                <div class="blog-post-body">
                                    <div class="blog-post-body-inner">
                                        <p class="blog-post-date">{{ $blog->created_at->format('d M, Y') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-title">
                                            {{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}
                                        </a>
                                        <p class="blog-post-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-read-btn">
                                            <span>{{ get_phrase('Read Now') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                                                <path d="M22.7079 11.0343C23.2263 10.5159 23.2263 9.67546 22.7079 9.15706L14.2601 0.709242C13.7417 0.190842 12.9012 0.190842 12.3828 0.709242C11.8644 1.22764 11.8644 2.06813 12.3828 2.58653L19.892 10.0957L12.3828 17.6049C11.8644 18.1233 11.8644 18.9638 12.3828 19.4822C12.9012 20.0006 13.7417 20.0006 14.2601 19.4822L22.7079 11.0343ZM0.530151 10.0957V11.4231H21.7693V10.0957V8.76826H0.530151V10.0957Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- Blog Area End  -->

    <!-- Brand Area Start  -->
    <section class="brand-section overflow-hidden">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <h2 class="brand-section-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('The Brands You Love')}}</h2>
                    <!-- Swiper -->
                    <div class="swiper brand-slider wow animate__fadeInUp" data-wow-delay=".2s">
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
    <!-- Brand Area End  -->