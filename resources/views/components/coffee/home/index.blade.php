<style>
    .category-section-title-area .cts-btn-outline-black{
        background: transparent !important;
        color: inherit !important;
        border-color: inherit !important;
    }
    .subscription-offer-main .section-title,
    .blog-section-title-area .section-title{
        color: #fff !important;
    }
</style>


<!-- Banner Area Start -->
    <section class="hero-section overflow-hidden">
        <div class="container">
            <div class="row justify-content-center align-items-center gx-4 gy-5">
                <div class="col-md-10 col-lg-6">
                    <div class="hero-title-area">
                        <div class="hr-coffee-shape">
                            <img class="shape wow animate__fadeIn" data-wow-delay=".1s" src="{{ asset('assets/frontend/coffee/images/title-coffee-shape.png ') }}" alt="">
                        </div>
                        <h1 class="hero-title text-center text-md-start wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Awaken Your Senses with Every Sip!!')}}</h1>
                        <p class="hero-subtitle text-center text-md-start wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Discover artisan coffee blends, soothing teas & beautifully crafted brewing tools all in one place.')}}</p>
                        <div class="d-flex align-items-center gap-12px flex-wrap justify-content-center justify-content-md-start wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn cts-btn-outline-white">
                                <span>{{get_phrase('Explore Collection')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path d="M3.07735 1.67043C3.04051 2.29091 3.47144 2.80476 4.03989 2.81796L9.27218 2.93931L1.00531 11.2348C0.577327 11.6643 0.53509 12.3758 0.910979 12.8239C1.28687 13.272 1.93859 13.2871 2.36657 12.8577L10.6336 4.56202L10.2945 10.2744C10.2576 10.8949 10.6886 11.4087 11.2571 11.4219C11.8255 11.4351 12.3162 10.9427 12.353 10.3221L12.8531 1.89721C12.8708 1.59915 12.7794 1.31087 12.5988 1.09568C12.4183 0.880484 12.1635 0.75602 11.8905 0.749684L4.17326 0.570641C3.60485 0.5575 3.11419 1.04985 3.07735 1.67043Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div class="hero-slider-area ms-xl-4 wow animate__fadeInRight" data-wow-delay=".1s">
                        <!-- Swiper -->
                        <div class="swiper hero-banner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/coffee/images/coffee-banner.webp ') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/coffee/images/coffee-banner.webp ') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner" src="{{ asset('assets/frontend/coffee/images/coffee-banner.webp ') }}" alt="banner">
                                    </div>
                                </div>
                            </div>
                            <div class="banner-slider-nav">
                                <div class="swiper-button-prev">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.514393 9.72582C-0.0414888 10.2817 -0.0414888 11.183 0.514393 11.7388L9.57301 20.7975C10.1289 21.3533 11.0302 21.3533 11.586 20.7975C12.1419 20.2416 12.1419 19.3403 11.586 18.7844L3.53393 10.7323L11.586 2.68023C12.1419 2.12435 12.1419 1.22308 11.586 0.667202C11.0302 0.111321 10.1289 0.111321 9.57301 0.667202L0.514393 9.72582ZM19.7324 10.7323V9.30891L1.52091 9.30891V10.7323V12.1558L19.7324 12.1558V10.7323Z" fill="white"/>
                                    </svg>
                                </div>
                                <div class="swiper-button-next">
                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.9504 12.0065C20.5063 11.4507 20.5063 10.5494 19.9504 9.99352L10.8918 0.934903C10.336 0.379021 9.43469 0.379021 8.87881 0.934903C8.32293 1.49078 8.32293 2.39205 8.87881 2.94793L16.9309 11L8.87881 19.0521C8.32293 19.608 8.32293 20.5093 8.87881 21.0652C9.43469 21.621 10.336 21.621 10.8918 21.0652L19.9504 12.0065ZM0.732422 11V12.4235H18.9439V11V9.57661H0.732422V11Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Featured Category Area Start -->
    <section class="featured-category-section">
        <div class="featured-shape1">
            <img class="shape" src="{{ asset('assets/frontend/coffee/images/nut-shape1.png ') }}" alt="">
        </div>
        <div class="featured-shape2">
            <img class="shape" src="{{ asset('assets/frontend/coffee/images/nut-shape2.png ') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <p class="title-badge mx-auto mb-28px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Featured Categories')}}</p>
                        <h2 class="section-title text-center mb-3 max-w-739px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Explore What You Love')}}</h2>
                        <p class="section-subtitle text-center mb-30px max-w-621px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Discover artisan coffee blends, soothing teas & beautifully crafted brewing tools all in one place.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn cts-btn-outline-black">{{get_phrase('Explore Collection')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-12">
                    <div class="categories-wrap">
                        @php
                            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                        @endphp
                        @foreach($categories->take(5) as $category)
                        <a href="{{ route('products', get_category_params($category)) }}" class="single-category">
                            <div>
                                <div class="category-banner">
                                    <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                                    <div class="category-view-btn">
                                        <div class="category-view-icon">
                                            <svg width="44" height="27" viewBox="0 0 44 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.9502 15.71C9.90617 -1.97005 33.7741 -1.97005 41.73 15.71" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M21.8399 24.55C18.1782 24.55 15.21 21.5818 15.21 17.92C15.21 14.2583 18.1782 11.29 21.8399 11.29C25.5017 11.29 28.4699 14.2583 28.4699 17.92C28.4699 21.5818 25.5017 24.55 21.8399 24.55Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <p class="text">{{get_phrase('View Details')}}</p>
                                    </div>
                                </div>
                                <div class="category-arrow-icon">
                                    <svg width="31" height="28" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30.2697 4.72522C30.3996 3.66741 29.6473 2.7046 28.5895 2.57472L11.3515 0.458159C10.2937 0.328276 9.3309 1.08051 9.20102 2.13832C9.07114 3.19612 9.82337 4.15894 10.8812 4.28882L26.2038 6.17021L24.3224 21.4929C24.1926 22.5507 24.9448 23.5135 26.0026 23.6434C27.0604 23.7732 28.0232 23.021 28.1531 21.9632L30.2697 4.72522ZM1.3208 25.611L2.50885 27.1316L29.5424 6.01068L28.3543 4.49005L27.1663 2.96941L0.132749 24.0903L1.3208 25.611Z" fill="black"/>
                                    </svg>
                                </div>
                                <h4 class="category-title">{{$category->title}}</h4>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Category Area End -->

    <!-- Best Sellers Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-40px">
                        <p class="title-badge mx-auto mb-28px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Best Sellers')}}</p>
                        <h2 class="section-title text-center mb-22px max-w-867px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('What Everyone’s Brewing Right Now')}}</h2>
                        <p class="section-subtitle text-center max-w-621px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Discover what our community is loving right now — from rich coffee blends and soothing teas to must-have brewing tools and eco-friendly accessories. Tried, loved, and reordered often.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row gx-17px gy-4 justify-content-center bs-product-row wow animate__fadeInUp" data-wow-delay=".4s">
                @php 
                    $products = \App\Models\Product::where('status', 1)->latest()->take(6)->get();
                @endphp
                 @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product-card">
                        <div class="product-card-banner">
                            <a href="javascript:;" class="pc-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9999 1.73567C12.203 0.624328 13.7699 0 15.4054 0C17.1716 0 18.8576 0.727969 20.092 2.01102C21.3177 3.28391 22 4.99979 22 6.78176C22 8.5638 21.3176 10.2798 20.092 11.5525C19.2771 12.3993 18.4634 13.2652 17.6455 14.1357C15.9843 15.9038 14.3052 17.6908 12.5611 19.3744L12.557 19.3783C11.6575 20.2337 10.2331 20.2027 9.372 19.3081L1.90734 11.5524C-0.63578 8.91015 -0.63578 4.65341 1.90734 2.01113C4.39596 -0.574523 8.40338 -0.666338 10.9999 1.73567Z" fill="#1B1107"/>
                                    </svg>
                                </span>
                            </a>
                            <a onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="pc-card-view">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M3.10498 11.8772C6.26288 4.85963 15.7366 4.85963 18.8945 11.8772" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.9997 15.386C9.54632 15.386 8.36816 14.2078 8.36816 12.7544C8.36816 11.301 9.54632 10.1228 10.9997 10.1228C12.4532 10.1228 13.6313 11.301 13.6313 12.7544C13.6313 14.2078 12.4532 15.386 10.9997 15.386Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </a>
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            <a href="{{ route('product', $product->slug) }}" class="pc-card-btn">{{get_phrase('Shop Now')}}</a>
                        </div>

                        <div class="d-flex justify-content-between">
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
                                
                                <div class="d-flex align-items-center gap-1 justify-content-center">
                                    <div class="pc-star">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                            <path d="M9 0L11.5498 5.49048L17.5595 6.21885L13.1257 10.3405L14.2901 16.2812L9 13.338L3.70993 16.2812L4.87432 10.3405L0.440492 6.21885L6.45019 5.49048L9 0Z" fill="#FFC633"/>
                                        </svg>
                                    </div>
                                    <p class="pc-total-rating">{{ number_format($product->average_rating, 1) }}</p>
                                </div> 
                         </div>

                        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 30, '...') }}</a>
                        <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 70, '...') }}</p>
                         
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn cts-btn-outline-black">{{get_phrase('Explore Collection')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best Sellers Area End -->

    <!-- Brewing Guides Area Start -->
    <section class="brewing-guides-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-section-title-area">
                        <p class="title-badge2 mx-auto mb-28px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Brewing Guides')}}</p>
                        <h2 class="section-title text-white text-center max-w-531px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Brew Like a Barista at Home!')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                   <div class="blog-card-main">
                            @foreach($blogs->take(3) as $blog )
                                @if($loop->first)
                                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-lg-card">
                                        <div class="h-100 w-100">
                                            <div class="blog-lg-banner">
                                                <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                            </div>
                                            <div class="blog-lg-content">
                                                <div class="blog-lg-content-left">
                                                    <p class="blog-lg-date">{{ $blog->created_at->format('d M, Y') }}</p>
                                                    <h3 class="blog-lg-title">{{ \Illuminate\Support\Str::limit($blog->title, 40, '...') }}</h3>
                                                    <p class="blog-lg-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 60, '...') }}</p>
                                                </div>
                                                <div class="blog-lg-arrow">
                                                    <svg width="26" height="26" viewBox="0 0 36 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M35.3557 5.45976C35.5072 4.22638 34.6301 3.10376 33.3967 2.95232L13.2976 0.484468C12.0643 0.333028 10.9416 1.21011 10.7902 2.44349C10.6388 3.67687 11.5158 4.79949 12.7492 4.95092L30.615 7.14457L28.4214 25.0104C28.27 26.2438 29.147 27.3664 30.3804 27.5178C31.6138 27.6693 32.7364 26.7922 32.8879 25.5588L35.3557 5.45976ZM1.60205 29.812L2.98729 31.585L34.5077 6.95858L33.1225 5.18555L31.7372 3.41253L0.216812 28.039L1.60205 29.812Z" fill="black"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="blog-md-wrap">
                                    @else
                                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-md-card mb-18px">
                                                <div class="h-100 w-100">
                                                    <div class="blog-md-banner">
                                                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                                    </div>
                                                    <div class="blog-md-content">
                                                        <div class="blog-md-content-left">
                                                            <p class="blog-md-date">{{ $blog->created_at->format('d M, Y') }}</p>
                                                            <h3 class="blog-md-title">{{ \Illuminate\Support\Str::limit($blog->title, 40, '...') }}</h3>
                                                            <p class="blog-md-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 60, '...') }}</p>
                                                        </div>
                                                        <div class="blog-md-arrow">
                                                            <svg width="26" height="26" viewBox="0 0 29 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M28.5249 5.27684C28.6595 4.1805 27.8799 3.18262 26.7836 3.04801L8.91772 0.854359C7.82139 0.719745 6.8235 1.49938 6.68889 2.59571C6.55428 3.69205 7.33391 4.68993 8.43025 4.82454L24.311 6.77445L22.3611 22.6552C22.2265 23.7515 23.0061 24.7494 24.1024 24.884C25.1988 25.0186 26.1966 24.239 26.3313 23.1427L28.5249 5.27684ZM2.02393 24.187L3.25525 25.763L27.7711 6.60912L26.5398 5.0331L25.3085 3.45708L0.792603 22.611L2.02393 24.187Z" fill="black"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                    @endif
                                @endforeach
                           </div> 
                        </div>

                    <div class="text-center">
                        <a href="{{route('blog')}}" class="btn ctsb2-btn-outline-white">{{get_phrase('Explore More Guides')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brewing Guides Area End -->

    <!-- Featured Products Area Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fp-section-title-area">
                        <p class="title-badge mx-auto mb-28px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Featured Products')}}</p>
                        <h2 class="section-title text-center max-w-867px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Featured Products for Coffee & Tea Lovers')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row gx-17px gy-4 justify-content-center featured-products-row wow animate__fadeInUp" data-wow-delay=".3s">
                @php 
                    $featuredProducts = \App\Models\Product::where('status', 1)->where('label' , 'featured')->latest()->take(3)->get();
                @endphp
                @foreach($featuredProducts as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product-card">
                        <div class="product-card-banner">
                            <a href="javascript:;" class="pc-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9999 1.73567C12.203 0.624328 13.7699 0 15.4054 0C17.1716 0 18.8576 0.727969 20.092 2.01102C21.3177 3.28391 22 4.99979 22 6.78176C22 8.5638 21.3176 10.2798 20.092 11.5525C19.2771 12.3993 18.4634 13.2652 17.6455 14.1357C15.9843 15.9038 14.3052 17.6908 12.5611 19.3744L12.557 19.3783C11.6575 20.2337 10.2331 20.2027 9.372 19.3081L1.90734 11.5524C-0.63578 8.91015 -0.63578 4.65341 1.90734 2.01113C4.39596 -0.574523 8.40338 -0.666338 10.9999 1.73567Z" fill="#1B1107"/>
                                    </svg>
                                </span>
                            </a>
                            <a href="javascript:;"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="pc-card-view">
                                <span class="h-100 w-100 d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M3.10498 11.8772C6.26288 4.85963 15.7366 4.85963 18.8945 11.8772" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.9997 15.386C9.54632 15.386 8.36816 14.2078 8.36816 12.7544C8.36816 11.301 9.54632 10.1228 10.9997 10.1228C12.4532 10.1228 13.6313 11.301 13.6313 12.7544C13.6313 14.2078 12.4532 15.386 10.9997 15.386Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </a>
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            <a href="{{ route('product', $product->slug) }}" class="pc-card-btn">{{get_phrase('Shop Now')}}</a>
                        </div>
                         <div class="d-flex justify-content-between">
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
                            
                            <div class="d-flex align-items-center gap-1 justify-content-center">
                                <div class="pc-star">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                        <path d="M9 0L11.5498 5.49048L17.5595 6.21885L13.1257 10.3405L14.2901 16.2812L9 13.338L3.70993 16.2812L4.87432 10.3405L0.440492 6.21885L6.45019 5.49048L9 0Z" fill="#FFC633"/>
                                    </svg>
                                </div>
                                <p class="pc-total-rating">{{ number_format($product->average_rating, 1) }}</p>
                            </div> 
                        </div>
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title"> {{ \Illuminate\Support\Str::limit($product->title, 30, '...') }}</a>
                        <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 70, '...') }}</p>
                        
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn cts-btn-outline-black">{{get_phrase('Explore Collection')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Area End -->

    <!-- Testimonials Area Start -->
    <section class="testimonials-section section-mb">
        <div class="testi-leaves-shape">
            <img class="shape" src="{{ asset('assets/frontend/coffee/images/leaves-shape.png ') }}" alt="">
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center gx-4 gy-5">
                <div class="col-md-10 col-lg-6">
                    <div class="testimonial-banner wow animate__fadeInLeft" data-wow-delay=".1s">
                        <img class="banner" src=" {{ asset('assets/frontend/coffee/images/testimonial-banner.webp') }} " alt="">
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div class="testimonial-area">
                        <div class="mb-38px">
                            <p class="title-badge mb-28px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Testimonials')}}</p>
                            <h2 class="section-title wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Loved by Thousands of Sippers Worldwide')}}</h2>
                        </div>
                        <!-- Swiper -->
                        <div class="swiper testimonial-slider wow animate__fadeInUp" data-wow-delay=".4s">
                            <div class="swiper-wrapper">
                                @foreach($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="testimonial-slide">
                                        <div class="d-flex align-items-center gap-1 flex-wrap mb-30px">
                                             @for($i = 1; $i <= 5; $i++)
                                                <div class="testimonial-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="31" viewBox="0 0 34 31" fill="none">
                                                        <path d="M17.2264 0L22.064 10.417L33.4661 11.7989L25.0539 19.6188L27.2631 30.8898L17.2264 25.3059L7.18964 30.8898L9.3988 19.6188L0.986612 11.7989L12.3887 10.417L17.2264 0Z" 
                                                            fill="{{ $i <= $review->rating ? '#FFC633' : '#E0E0E0' }}"/>
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>
                                        <p class="testimonial-comment">{{ $review->comment }}</p>
                                        <div class="d-flex align-items-center gap-18px ts-user-info">
                                            <div class="ts-user-profile">
                                                <img class="profile" src="{{ get_image($review->user->photo) }}" alt="">
                                            </div>
                                            <div>
                                                <h5 class="ts-user-name">{{ $review->user->name }}</h5>
                                                <p class="ts-user-role">{{ $review->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="testimonial-nav">
                                <div class="swiper-button-prev">
                                    <svg width="20" height="9" viewBox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.209236 4.07807C-0.0041046 4.29141 -0.00410463 4.6373 0.209236 4.85064L3.68583 8.32723C3.89917 8.54057 4.24506 8.54057 4.4584 8.32723C4.67174 8.11389 4.67174 7.768 4.4584 7.55465L1.3681 4.46435L4.4584 1.37405C4.67174 1.16071 4.67174 0.814819 4.4584 0.601478C4.24506 0.388137 3.89917 0.388137 3.68583 0.601478L0.209236 4.07807ZM19.9502 4.46436L19.9502 3.91806L0.595524 3.91806L0.595524 4.46435L0.595524 5.01065L19.9502 5.01065L19.9502 4.46436Z" fill="black"/>
                                    </svg>
                                </div>
                                <div class="swiper-button-next">
                                    <svg width="21" height="9" viewBox="0 0 21 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.8684 4.84967C20.0817 4.63633 20.0817 4.29043 19.8684 4.07709L16.3918 0.600504C16.1785 0.387164 15.8326 0.387164 15.6192 0.600504C15.4059 0.813845 15.4059 1.15974 15.6192 1.37308L18.7095 4.46338L15.6192 7.55368C15.4059 7.76702 15.4059 8.11292 15.6192 8.32626C15.8326 8.5396 16.1785 8.5396 16.3918 8.32626L19.8684 4.84967ZM0.127441 4.46338L0.127441 5.00967L19.4821 5.00967L19.4821 4.46338L19.4821 3.91709L0.127441 3.91709L0.127441 4.46338Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Area End -->

    <!-- Subscription Offer Area Start -->
    <section class="subscription-offer-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="subscription-offer-main">
                        <div class="subscription-offer-content">
                            <p class="title-badge3 mb-28px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Subscription Offer Section')}}</p>
                            <h2 class="section-title mb-4 text-white wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Subscribe & Save on Every Cup!!')}}</h2>
                            <p class="section-subtitle mb-28px text-white subscription-offer-subtitle wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('Get fresh coffee or tea delivered monthly. Customize your blends, choose your schedule, cancel anytime.')}}</p>
                            <ul class="offer-benefit-list wow animate__fadeInUp" data-wow-delay=".5s">
                                <li class="ob-list-item">
                                    <div class="white-icon-box">
                                        <svg width="40" height="22" viewBox="0 0 40 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.87402 0.195312H29.4424C30.3094 0.195408 31.0986 0.703643 31.4531 1.48828L34.0049 7.13867L34.0371 7.20996L34.1094 7.23926L37.1348 8.46582C38.7573 9.12395 39.8047 10.6742 39.8047 12.415V17.3789C39.8047 17.9108 39.369 18.3447 38.8281 18.3447H36.7412L36.7334 18.5332C36.6599 20.348 35.1519 21.8045 33.3057 21.8047C31.4596 21.8047 29.9504 20.3481 29.877 18.5332L29.8691 18.3447H15.4385L15.4316 18.5332C15.3585 20.348 13.8498 21.8045 12.0039 21.8047C10.1575 21.8047 8.64866 20.3481 8.5752 18.5332L8.56738 18.3447H6.87402C6.33332 18.3445 5.89844 17.9107 5.89844 17.3789V14.8184H3.6709C3.13036 14.8182 2.69558 14.3841 2.69531 13.8525C2.69531 13.3207 3.1302 12.8859 3.6709 12.8857H5.89844V10.1719H3.6709C3.13033 10.1717 2.69547 9.73746 2.69531 9.20605C2.69531 8.67425 3.1302 8.24043 3.6709 8.24023H5.89844V5.52539H1.17188C0.631207 5.52539 0.19553 5.09138 0.195312 4.55957C0.195312 4.02792 0.631038 3.59277 1.17188 3.59277H5.89844V1.16211C5.89844 0.630241 6.33339 0.195508 6.87402 0.195312ZM12.0039 16.917C11.1885 16.917 10.5246 17.5795 10.5244 18.3945C10.5244 19.2097 11.1884 19.8721 12.0039 19.8721C12.8193 19.8718 13.4824 19.2092 13.4824 18.3945C13.4822 17.5797 12.8192 16.9172 12.0039 16.917ZM33.3057 16.917C32.4906 16.917 31.8264 17.5795 31.8262 18.3945C31.8262 19.2097 32.4901 19.8721 33.3057 19.8721C34.1211 19.8719 34.7842 19.2093 34.7842 18.3945C34.784 17.5796 34.1212 16.9172 33.3057 16.917ZM7.85059 8.24023H9.76465C10.3055 8.24023 10.7412 8.67413 10.7412 9.20605C10.7411 9.73758 10.3054 10.1719 9.76465 10.1719H7.85059V16.4131H9.21094L9.27051 16.3359C9.89826 15.5156 10.89 14.9854 12.0039 14.9854C13.1177 14.9855 14.109 15.5157 14.7363 16.3359L14.7949 16.4131H30.5137L30.5723 16.3359C31.1997 15.5155 32.1916 14.9854 33.3057 14.9854C34.4196 14.9854 35.4114 15.5155 36.0391 16.3359L36.0977 16.4131H37.8516V12.415C37.8516 11.4615 37.2786 10.6129 36.3936 10.2539L33.1484 8.9375L33.1133 8.92285H25.9658C25.4251 8.92282 24.9894 8.48882 24.9893 7.95703V2.12793H7.85059V8.24023ZM26.9424 6.99121H31.7998L31.6748 6.71484L29.6699 2.27637C29.6313 2.19121 29.5455 2.12803 29.4424 2.12793H26.9424V6.99121Z" fill="black" stroke="white" stroke-width="0.391247"/>
                                        </svg>
                                    </div>
                                    <p>{{get_phrase('Free shipping')}}</p>
                                </li>
                                <li class="ob-list-item">
                                    <div class="white-icon-box">
                                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6006 22.0926C18.3999 22.0926 21.8003 18.8107 21.8003 10.8916C21.8003 18.8107 25.1769 22.0926 33.0001 22.0926C25.1769 22.0926 21.8003 25.4695 21.8003 33.2936C21.8003 25.4695 18.3999 22.0926 10.6006 22.0926Z" stroke="black" stroke-width="1.3" stroke-linejoin="round"/>
                                            <path d="M1 8.49459C6.0139 8.49459 8.19984 6.38485 8.19984 1.29395C8.19984 6.38485 10.3705 8.49459 15.3997 8.49459C10.3705 8.49459 8.19984 10.6655 8.19984 15.6952C8.19984 10.6655 6.0139 8.49459 1 8.49459Z" stroke="black" stroke-width="1.3" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p>{{get_phrase('Early access to limited releases')}}</p>
                                </li>
                                <li class="ob-list-item">
                                    <div class="white-icon-box">
                                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M28.0119 4.90822C28.0119 2.52597 26.073 0.587891 23.6897 0.587891C21.568 0.587891 19.7997 2.12451 19.4369 4.14259H14.0059C13.7888 4.14259 13.5807 4.22856 13.4268 4.38163L0.241481 17.5067C-0.0799458 17.8267 -0.080657 18.3473 0.240332 18.668L9.92416 28.3477C10.2449 28.6683 10.7656 28.668 11.0859 28.3466L24.2166 15.1668C24.3697 15.013 24.4557 14.805 24.4557 14.588V9.15921C26.4746 8.79663 28.0119 7.02907 28.0119 4.90822ZM22.8144 14.2492L10.5032 26.6064L1.98238 18.0892L14.3449 5.78323H19.4563C19.6242 6.60343 20.0276 7.35741 20.6335 7.96314C20.954 8.28344 21.4736 8.28339 21.7941 7.96319C22.1146 7.64283 22.1146 7.12346 21.7942 6.80304C21.5018 6.51079 21.2858 6.16276 21.155 5.78323H22.8144V14.2492H22.8144ZM24.4557 7.47587V4.96291C24.4557 4.50988 24.0883 4.14259 23.635 4.14259H21.121C21.4515 3.03697 22.4777 2.22852 23.6897 2.22852C25.168 2.22852 26.3706 3.43061 26.3706 4.90822C26.3706 6.11978 25.5617 7.14561 24.4557 7.47587Z" fill="black"/>
                                            <path d="M8.45749 16.1963C8.13708 15.876 7.61747 15.876 7.297 16.1963C6.97652 16.5166 6.97652 17.0359 7.297 17.3563L11.2359 21.2935C11.5564 21.6139 12.0759 21.6139 12.3964 21.2935C12.7169 20.9732 12.7169 20.4538 12.3964 20.1335L8.45749 16.1963Z" fill="black"/>
                                            <path d="M10.6465 14.0078C10.326 13.6875 9.80643 13.6875 9.48596 14.0078C9.16549 14.3281 9.16549 14.8475 9.48596 15.1678L13.4249 19.105C13.7453 19.4254 14.2649 19.4254 14.5854 19.105C14.9058 18.7848 14.9058 18.2654 14.5854 17.945L10.6465 14.0078Z" fill="black"/>
                                            <path d="M12.8354 11.8213C12.515 11.501 11.9954 11.501 11.6749 11.8213C11.3545 12.1416 11.3545 12.6609 11.6749 12.9813L15.6138 16.9185C15.9343 17.2389 16.4539 17.2389 16.7743 16.9185C17.0948 16.5982 17.0948 16.0788 16.7743 15.7585L12.8354 11.8213Z" fill="black"/>
                                        </svg>
                                    </div>
                                    <p>{{get_phrase('Free samples in every box')}}</p>
                                </li>
                            </ul>
                            <a href="{{route('all_products')}}" class="btn ctsb2-btn-outline-white wow animate__fadeInUp" data-wow-delay=".5s">{{get_phrase('Build Your Subscription')}}</a>
                        </div>
                        <div class="subscription-offer-banner wow animate__fadeInRight" data-wow-delay=".1s">
                            <div class="so-banner-shape">
                                <img class="shape" src="{{ asset('assets/frontend/coffee/images/coffee-shape.png ') }}" alt="">
                            </div>
                            <img class="banner" src="{{ asset('assets/frontend/coffee/images/tea-cup.webp  ') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscription Offer Area End -->

    <!-- Sustainability Commitment Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row justify-content-center gx-4 gy-5">
                <div class="col-md-10 col-lg-6">
                    <div class="commitment-item-wrap">
                        <div class="commitment-item wow animate__fadeInUp" data-wow-delay=".1s">
                            <div class="commitment-type-icon">
                                <object data="{{ asset('assets/frontend/coffee/images/commitment-icon1.svg  ') }}" type="image/svg+xml"></object>
                            </div> 
                            <h4 class="commitment-type-title">{{get_phrase('Secure Checkout')}}</h4>
                            <p class="commitment-type-subtitle">{{get_phrase('100% Organic & Fair Trade Certified')}}</p>
                        </div>
                        <div class="commitment-item wow animate__fadeInUp" data-wow-delay=".2s">
                            <div class="commitment-type-icon">
                                <object data="{{ asset('assets/frontend/coffee/images/commitment-icon2.svg  ') }}" type="image/svg+xml"></object>
                            </div>
                            <h4 class="commitment-type-title">{{get_phrase('Green Packaging')}}</h4>
                            <p class="commitment-type-subtitle">{{get_phrase('Biodegradable & Compostable Packaging')}}</p>
                        </div>
                        <div class="commitment-item wow animate__fadeInUp" data-wow-delay=".3s">
                            <div class="commitment-type-icon">
                                <object data=" {{ asset('assets/frontend/coffee/images/commitment-icon3.svg') }}" type="image/svg+xml"></object>
                            </div>
                            <h4 class="commitment-type-title">{{get_phrase('Women-Owned.')}}</h4>
                            <p class="commitment-type-subtitle">{{get_phrase('Supporting Local & Women-Led Farms')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div>
                        <p class="title-badge mb-28px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Sustainability Commitment')}}</p>
                        <h2 class="section-title mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Better for You. Better for the Planet.')}}</h2>
                        <p class="section-subtitle mb-40px pb-1 wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Our products are crafted with your well-being and the Earth in mind — using organic ingredients, sustainable farming practices, and eco-conscious packaging for a healthier you and a greener future.')}}</p>
                        <a href="javascript:;" class="btn cts-btn-outline-black wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('Read Our Mission')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sustainability Commitment Area End -->

    <!-- Notice Slider Area Start -->
    <section class="notice-section wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper notice-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="notice-slide">
                                    <p class="notice-slide-text">{{get_phrase('15% Off All Brewing Tools This Week Only')}}</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="notice-slide">
                                    <p class="notice-slide-text">{{get_phrase('15% Off All Brewing Tools This Week Only')}}</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="notice-slide">
                                    <p class="notice-slide-text">{{get_phrase('15% Off All Brewing Tools This Week Only')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="notice-slider-nav">
                            <div class="swiper-button-prev">
                                <svg width="20" height="9" viewBox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.209236 4.07807C-0.0041046 4.29141 -0.00410463 4.6373 0.209236 4.85064L3.68583 8.32723C3.89917 8.54057 4.24506 8.54057 4.4584 8.32723C4.67174 8.11389 4.67174 7.768 4.4584 7.55465L1.3681 4.46435L4.4584 1.37405C4.67174 1.16071 4.67174 0.814819 4.4584 0.601478C4.24506 0.388137 3.89917 0.388137 3.68583 0.601478L0.209236 4.07807ZM19.9502 4.46436L19.9502 3.91806L0.595524 3.91806L0.595524 4.46435L0.595524 5.01065L19.9502 5.01065L19.9502 4.46436Z" fill="black"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg width="21" height="9" viewBox="0 0 21 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.8684 4.84967C20.0817 4.63633 20.0817 4.29043 19.8684 4.07709L16.3918 0.600504C16.1785 0.387164 15.8326 0.387164 15.6192 0.600504C15.4059 0.813845 15.4059 1.15974 15.6192 1.37308L18.7095 4.46338L15.6192 7.55368C15.4059 7.76702 15.4059 8.11292 15.6192 8.32626C15.8326 8.5396 16.1785 8.5396 16.3918 8.32626L19.8684 4.84967ZM0.127441 4.46338L0.127441 5.00967L19.4821 5.00967L19.4821 4.46338L19.4821 3.91709L0.127441 3.91709L0.127441 4.46338Z" fill="black"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Notice Slider Area End -->