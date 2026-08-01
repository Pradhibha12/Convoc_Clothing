    <!-- Banner Area Start -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-area">
                        <div class="hero-title-area">
                            <h1 class="hero-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Drive in Style. Gear Up with the Best Car Accessories.')}}</h1>
                            <p class="hero-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('From sleek interiors to smart gadgets — everything your ride needs in one place.')}}</p>
                            <div class="hero-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                                <a href="{{route('all_products')}}" class="btn ca-btn-white min-w-134px">{{get_phrase('Shop Now')}}</a>
                                <a href="{{route('all_products')}}" class="btn ca-btn-outline-white">{{get_phrase('Explore Categories')}}</a>
                            </div>
                        </div>
                        <div class="video-player-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                            <div class="plyr__video-embed video-player">
                                <iframe src="{{get_settings('system_video')}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Brand Area Start -->
    <section class="brand-section  overflow-hidden wow animate__fadeInUp" data-wow-delay=".1s">
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
    <section class="category-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <h2 class="section-title text-center max-w-735px mx-auto mb-6px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Shop by Category')}}</h2>
                        <p class="section-subtitle text-center max-w-520px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Find exactly what you need — fast.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper category-slider">
                        <div class="swiper-wrapper">
                              @php
                                $categories = App\Models\Category::where('parent_id', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(4)->get();
                            @endphp
                           @foreach($categories as $category)
                            <div class="swiper-slide">
                                <a href="{{ route('products', get_category_params($category)) }}" class="category-card">
                                    <div>
                                        <div class="category-iconbox">
                                            <img src="{{ get_image($category->icon) }}" >
                                        </div>
                                        <h4 class="category-card-title">{{ $category->title }}</h4>
                                        <p class="category-card-subtitle">{{ \Illuminate\Support\Str::limit($category->description, 60, '...') }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Area End -->

    <!-- Bestsellers or Trending Products Area Start -->
    <section class="trending-product-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bestsellers-section-title-area">
                        <h2 class="section-title text-center max-w-735px mx-auto mb-6px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Bestsellers  Products')}}</h2>
                        <p class="section-subtitle text-center max-w-520px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('These are the must-haves every driver is adding to their cart.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 product-card-row wow animate__fadeInUp" data-wow-delay=".3s">
                @php 
                    $products = App\Models\Product::where('label', 'best-seller')->take(4)->get();
                @endphp
                @foreach($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-card">
                        <a href="{{ route('product', $product->slug) }}" class="product-card-banner">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            @if ($product->label)
                            <span class="pc-saved-badge capitalize">{{$product->label}}</span>
                            @endif
                        </a>
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                                <div class="d-flex align-items-center gap-2 mb-12px">
                                    <p class="pc-rating-review-total">{{ number_format($product->average_rating, 1) }}</p>
                                    <div class="pc-star-rating d-flex">
                                        <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#F8C51B"/>
                                                </svg>
                                            </div>
                                    </div>
                                </div>
                            </div>

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
                                <div class="sold-progress" progress-value="{{ getSoldProgress($product->id) }}"></div>

                                <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap mb-2">
                                    <p class="available-sold-info">{{get_phrase('Total  Stock:')}} {{$product->total_stock}}</p>
                                    <p class="available-sold-info">{{get_phrase('Sold:')}} {{ getSoldQuantity($product->id) }}</p>
                                </div>
                            <a href="{{ route('product', $product->slug) }}" class="btn ca-btn-outline-secondary w-100">{{get_phrase('View details')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn ca-btn-skin min-w-175px mx-auto">{{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bestsellers or Trending Products Area End -->

    <!-- Summer Sale Area Start -->
    <section class="summer-sale-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="summnersale-section-title-area">
                        <h2 class="section-title text-center max-w-735px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Summer Sale is Here!')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4 product-card-row wow animate__fadeInUp" data-wow-delay=".2s">
                @php 
                    $allproducts = App\Models\Product::take(4)->get();
                @endphp
                @foreach($allproducts as $product)
               <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-card">
                        <a href="{{ route('product', $product->slug) }}" class="product-card-banner">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            @if ($product->label)
                            <span class="pc-saved-badge capitalize">{{$product->label}}</span>
                            @endif
                        </a>
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                                <div class="d-flex align-items-center gap-2 mb-12px">
                                    <p class="pc-rating-review-total">{{ number_format($product->average_rating, 1) }}</p>
                                    <div class="pc-star-rating d-flex">
                                        <div class="pc-star">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#F8C51B"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <div class="sold-progress" progress-value="{{ getSoldProgress($product->id) }}"></div>

                                <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap mb-2">
                                    <p class="available-sold-info">{{get_phrase('Total  Stock:')}} {{$product->total_stock}}</p>
                                    <p class="available-sold-info">{{get_phrase('Sold:')}} {{ getSoldQuantity($product->id) }}</p>
                                </div>
                            <a href="{{ route('product', $product->slug) }}" class="btn ca-btn-outline-secondary w-100">{{get_phrase('View details')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach

               
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn ca-btn-skin min-w-175px mx-auto">{{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Summer Sale Area End -->

    <!-- Car Tips Area Start -->
    <section class="car-tips-section overflow-hidden">
        <div class="container">
            <div class="row gx-4 gy-5 align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div>
                        <h2 class="section-title mb-40px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Your Go-To Hub for Car Hacks, How-Tos & Pro Tip')}}</h2>
                        <ul class="wow animate__fadeInUp" data-wow-delay=".2s">
                            <li class="tips-list-item">
                                <div class="tips-list-iconbox">
                                    <svg width="43" height="42" viewBox="0 0 43 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M42.0179 6.4805C42.0179 2.90712 39.1095 0 35.5346 0C32.352 0 29.6995 2.30492 29.1554 5.33206H21.0089C20.6832 5.33206 20.371 5.46101 20.1402 5.69062L0.362221 25.3782C-0.119919 25.8583 -0.120986 26.6391 0.360498 27.1201L14.8862 41.6397C15.3673 42.1206 16.1484 42.1201 16.6289 41.638L36.3248 21.8684C36.5545 21.6377 36.6835 21.3256 36.6835 21.0001V12.857C39.712 12.3131 42.0179 9.66177 42.0179 6.4805ZM34.2216 20.4919L15.7548 39.0278L2.97357 26.252L21.5173 7.793H29.1845C29.4364 9.02332 30.0413 10.1543 30.9502 11.0629C31.431 11.5433 32.2104 11.5432 32.6912 11.0629C33.1718 10.5824 33.1719 9.80335 32.6913 9.32273C32.2527 8.88435 31.9287 8.3623 31.7326 7.793H34.2216V20.4919H34.2216ZM36.6835 10.332V6.56253C36.6835 5.88298 36.1324 5.33206 35.4525 5.33206H31.6815C32.1772 3.67362 33.7165 2.46095 35.5346 2.46095C37.752 2.46095 39.5559 4.26409 39.5559 6.4805C39.5559 8.29783 38.3426 9.83658 36.6835 10.332Z" fill="white"/>
                                        <path d="M12.6872 23.4126C12.2066 22.9321 11.4272 22.9321 10.9465 23.4126C10.4658 23.893 10.4658 24.6721 10.9465 25.1526L16.8548 31.0584C17.3355 31.5389 18.1149 31.5389 18.5956 31.0584C19.0763 30.578 19.0763 29.7989 18.5956 29.3184L12.6872 23.4126Z" fill="white"/>
                                        <path d="M15.9694 20.1294C15.4888 19.6489 14.7094 19.6489 14.2287 20.1294C13.748 20.6098 13.748 21.3889 14.2287 21.8694L20.1371 27.7752C20.6178 28.2557 21.3971 28.2557 21.8778 27.7752C22.3585 27.2948 22.3585 26.5157 21.8778 26.0352L15.9694 20.1294Z" fill="white"/>
                                        <path d="M19.2526 16.8496C18.772 16.3692 17.9926 16.3692 17.5119 16.8496C17.0312 17.33 17.0312 18.1091 17.5119 18.5896L23.4203 24.4954C23.901 24.976 24.6803 24.976 25.161 24.4954C25.6417 24.015 25.6417 23.2359 25.161 22.7554L19.2526 16.8496Z" fill="white"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="tips-list-title">{{get_phrase('Top 5 Car Detailing Hacks')}}</h5>
                                    <p class="tips-list-subtitle">{{get_phrase('Get that showroom shine at home')}}</p>
                                </div>
                            </li>
                            <li class="tips-list-item">
                                <div class="tips-list-iconbox">
                                    <svg width="50" height="28" viewBox="0 0 50 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.59277 0.25H36.8027C37.8821 0.250024 38.8672 0.894085 39.3105 1.89355L42.501 9.08398L42.541 9.17578L42.6338 9.21387L46.415 10.7754C48.44 11.6117 49.75 13.583 49.75 15.8008V22.1191C49.7499 22.7997 49.2039 23.3477 48.5352 23.3477H45.9209L45.9111 23.5869C45.8194 25.9004 43.933 27.7499 41.6318 27.75C39.331 27.75 37.4433 25.9004 37.3516 23.5869L37.3428 23.3477H19.293L19.2842 23.5869C19.1928 25.9004 17.3047 27.75 15.0039 27.75C12.7029 27.7498 10.8163 25.9003 10.7246 23.5869L10.7148 23.3477H8.59277C7.92409 23.3475 7.37807 22.7996 7.37793 22.1191V18.8584H4.58887C3.9201 18.8583 3.37402 18.3105 3.37402 17.6299C3.37402 16.9493 3.9201 16.4015 4.58887 16.4014H7.37793V12.9443H4.58887C3.92026 12.9442 3.37422 12.3969 3.37402 11.7168C3.37402 11.0362 3.9201 10.4884 4.58887 10.4883H7.37793V7.03125H1.46484C0.796113 7.03125 0.250082 6.48341 0.25 5.80273C0.25 5.12241 0.79602 4.57422 1.46484 4.57422H7.37793V1.47852C7.37805 0.797946 7.92417 0.250117 8.59277 0.25ZM15.0039 21.5303C13.9775 21.5305 13.1494 22.3784 13.1494 23.4121C13.1496 24.4456 13.9776 25.2927 15.0039 25.293C16.0305 25.293 16.8582 24.4453 16.8584 23.4121C16.8584 22.3783 16.0306 21.5303 15.0039 21.5303ZM41.6318 21.5303C40.6056 21.5303 39.7773 22.3783 39.7773 23.4121C39.7776 24.4457 40.6053 25.293 41.6318 25.293C42.6583 25.2929 43.4861 24.4453 43.4863 23.4121C43.4863 22.3784 42.6588 21.5303 41.6318 21.5303ZM9.80762 10.4883H12.2061C12.8749 10.4883 13.4209 11.0361 13.4209 11.7168C13.4207 12.3969 12.8748 12.9443 12.2061 12.9443H9.80762V20.8906H11.5186L11.5928 20.791C12.3771 19.747 13.615 19.0734 15.0039 19.0732C16.393 19.0732 17.631 19.7469 18.415 20.791L18.4902 20.8906H38.1465L38.2207 20.791C39.0047 19.7469 40.2427 19.0732 41.6318 19.0732C43.0209 19.0733 44.2586 19.7469 45.043 20.791L45.1182 20.8906H47.3203V15.8008C47.3203 14.5895 46.6056 13.508 45.4961 13.0498L41.4395 11.374L41.3936 11.3555H32.457C31.7884 11.3553 31.2423 10.8074 31.2422 10.127V2.70703H9.80762V10.4883ZM33.6719 8.89844H39.7559L39.5996 8.54688L37.0938 2.89844C37.0459 2.79054 36.9367 2.70706 36.8027 2.70703H33.6719V8.89844Z" fill="white" stroke="#3979F1" stroke-width="0.5"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="tips-list-title">{{get_phrase("Boost Your Ride's Tech")}}</h5>
                                    <p class="tips-list-subtitle">{{get_phrase('Fleet of late-model luxury vehicles (2019–2022)')}}</p>
                                </div>
                            </li>
                            <li class="tips-list-item">
                                <div class="tips-list-iconbox">
                                    <svg width="28" height="44" viewBox="0 0 28 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.0002 31.3916V38.8C22.0002 41.1194 20.1199 43 17.8002 43H9.4002C7.0806 43 5.2002 41.1194 5.2002 38.8V31.3916" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.2002 12.6083V5.19999C5.2002 2.8804 7.0806 1 9.4002 1H17.8002C20.1199 1 22.0002 2.8804 22.0002 5.19999V12.6083" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M26.2 22.0004C26.2 15.0416 20.5588 9.40039 13.6 9.40039C6.64122 9.40039 1 15.0416 1 22.0004C1 28.9591 6.64122 34.6003 13.6 34.6003C20.5588 34.6003 26.2 28.9591 26.2 22.0004Z" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.7996 22.0003H13.5996V17.8003" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="tips-list-title">{{get_phrase('Choosing the Right Floor Mats')}}</h5>
                                    <p class="tips-list-subtitle">{{get_phrase('Must-have gadgets and how to install them')}}</p>
                                </div>
                            </li>
                            <li class="tips-list-item">
                                <div class="tips-list-iconbox">
                                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5996 28.3001C23.8365 28.3001 28.2996 23.993 28.2996 13.6001C28.2996 23.993 32.7314 28.3001 42.9996 28.3001C32.7314 28.3001 28.2996 32.7319 28.2996 43.0001C28.2996 32.7319 23.8365 28.3001 13.5996 28.3001Z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                        <path d="M1 10.45C7.58089 10.45 10.45 7.68121 10.45 1C10.45 7.68121 13.299 10.45 19.9 10.45C13.299 10.45 10.45 13.299 10.45 19.9C10.45 13.299 7.58089 10.45 1 10.45Z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="tips-list-title">{{get_phrase('Quick DIY Upgrades')}}</h5>
                                    <p class="tips-list-subtitle">{{get_phrase('Transform your interior in under 10 minutes')}}</p>
                                </div>
                            </li>
                        </ul>
                        <a href="{{route('all_products')}}" class="btn ca-btn-skin min-w-175px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Grab the Deals')}}</a>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7">
                    <div class="car-tips-banner-wrap ps-xl-5 ps-lg-4">
                        <div class="car-tips-banner wow animate__fadeInRight" data-wow-delay=".3s">
                            <img class="banner" src="{{ asset('assets/frontend/car-light/images/car-tips-banner1.webp') }}" alt="banner">
                        </div>
                        <div class="car-tips-banner wow animate__fadeInRight" data-wow-delay=".4s">
                            <img class="banner" src="{{ asset('assets/frontend/car-light/images/car-tips-banner2.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Tips Area End -->
    
    <!-- Start Our Features Area -->
    <section class="our-features-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="features-section-title-area max-w-751px mx-auto">
                        <h2 class="section-title text-center mb-18px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Customize Your Ride make it yourself')}}</h2>
                        <p class="section-subtitle text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Your car is more than just transportation—it’s your space, your style, and your statement. That’s why we make it easy to personalize every ride with accessories that combine form, function, and flair.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="featured-banner wow animate__fadeInLeft" data-wow-delay=".3s">
                        <img class="banner" src=" {{ asset('assets/frontend/car-light/images/our-feature-banner.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="ms-lg-4 mt-3 mt-lg-0 wow animate__fadeInUp" data-wow-delay=".4s">
                        <div class="feature-item-wrap">
                            <div class="feature-single">
                                <div class="d-flex align-items-center gap-3 mb-18px">
                                    <div class="skin-icon-box">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.1094 24.2578H15.8906V20.0391H20.1094V24.2578Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.7812 7.38281L18 15.8203" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22.2188 7.38281L15.8906 20.0391L9.5625 7.38281" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.1094 20.0391L26.4375 7.38281" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <mask id="mask0_78_1071" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36">
                                            <path d="M0 -3.8147e-06H36V36H0V-3.8147e-06Z" fill="white"/>
                                            </mask>
                                            <g mask="url(#mask0_78_1071)">
                                            <path d="M15.8906 34.9453V24.2578" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.1094 24.2578V34.9453" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.7266 7.38281C10.9791 7.38281 9.5625 5.96623 9.5625 4.21875C9.5625 2.47127 10.9791 1.05469 12.7266 1.05469H23.2734C25.0209 1.05469 26.4375 2.47127 26.4375 4.21875C26.4375 5.96623 25.0209 7.38281 23.2734 7.38281" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.1094 30.6465C25.1288 30.2614 28.0558 28.6172 29.6016 28.6172C31.3523 28.6172 32.7656 30.0305 32.7656 31.7812C32.7656 33.532 31.3523 34.9453 29.6016 34.9453H6.39844C4.64766 34.9453 3.23438 33.532 3.23438 31.7812C3.23438 30.0305 4.64766 28.6172 6.39844 28.6172C7.94419 28.6172 10.8712 30.2614 15.8906 30.6465" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M27.7586 28.9995C29.1974 21.8224 30.6563 17.9739 30.6563 11.6005C30.6563 9.2706 28.7675 7.38179 26.4375 7.38179H9.5625C7.23256 7.38179 5.34375 9.2706 5.34375 11.6005C5.34375 16.9707 6.27328 20.1427 8.24147 28.9995" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <h4 class="feature-title">{{get_phrase('Stylish Seat Covers')}}</h4>
                                </div>
                                <p class="feature-subtitle">{{get_phrase('Add a touch of luxury or sporty flair while protecting your seats from wear and tear. Choose from leather, neoprene, and fabric designs in colors that match your vibe.')}}</p>
                            </div>
                            <div class="feature-single">
                                <div class="d-flex align-items-center gap-3 mb-18px">
                                    <div class="skin-icon-box">
                                        <svg width="39" height="37" viewBox="0 0 39 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.83789 16.7589H3.44126C2.17439 16.7589 1.14746 15.7169 1.14746 14.4314V6.67279C1.14746 5.38727 2.17439 4.34521 3.44126 4.34521H9.91596" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M29.2607 4.34521H35.7062C36.973 4.34521 38 5.38727 38 6.67279V14.4314C38 15.7169 36.973 16.7589 35.7062 16.7589H29.2802" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M30.5849 10.4463V10.6562C30.5849 13.0244 29.9506 15.3481 28.7499 17.3788H10.3995C9.19876 15.3481 8.56445 13.0244 8.56445 10.6562V10.4463C8.56445 8.07805 9.19876 5.75436 10.3995 3.72363H28.7499C29.9506 5.75436 30.5849 8.07805 30.5849 10.4463Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M19.5737 13.0343C20.925 13.0343 22.0204 11.9228 22.0204 10.5516C22.0204 9.18041 20.925 8.06885 19.5737 8.06885C18.2224 8.06885 17.127 9.18041 17.127 10.5516C17.127 11.9228 18.2224 13.0343 19.5737 13.0343Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M23.3978 22.3444H15.7518C14.4849 22.3444 13.458 21.3023 13.458 20.0168V17.3789H25.6916V20.0168C25.6916 21.3023 24.6647 22.3444 23.3978 22.3444Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22.0204 22.3447H17.127V27.3102H22.0204V22.3447Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M28.4435 36.0001H10.7048C8.17113 36.0001 6.11719 33.916 6.11719 31.345V27.3105H33.0311V31.345C33.0311 33.916 30.9771 36.0001 28.4435 36.0001Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <h4 class="feature-title">{{get_phrase('High-Tech Dash Cams')}}</h4>
                                </div>
                                <p class="feature-subtitle">{{get_phrase('Stay safe and capture every journey in crystal-clear HD. Our smart dash cams come with night vision, motion detection, and cloud storage support.')}}</p>
                            </div>
                            <div class="feature-single">
                                <div class="d-flex align-items-center gap-3 mb-18px">
                                    <div class="skin-icon-box">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_78_1114" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36">
                                            <path d="M0 0H36V36H0V0Z" fill="white"/>
                                            </mask>
                                            <g mask="url(#mask0_78_1114)">
                                            <path d="M12.6624 32.9234L11.4641 34.1215C10.3657 35.2198 8.56834 35.22 7.46999 34.1215L1.87853 28.5299C0.779968 27.4315 0.780179 25.6343 1.87853 24.5358L3.07666 23.3377" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M23.3379 3.07655L24.536 1.87835C25.6344 0.779998 27.4315 0.779998 28.53 1.87835L34.1218 7.46995C35.2201 8.5683 35.2201 10.3656 34.1218 11.4641L32.9232 12.6621" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M32.524 12.2631C33.6224 13.3614 33.6224 15.1588 32.5238 16.2572L16.257 32.5239C15.1588 33.6223 13.3616 33.6223 12.2632 32.5238L3.47611 23.7371C2.37776 22.6387 2.37776 20.8413 3.47611 19.743L19.7432 3.47606C20.8413 2.37771 22.6388 2.37771 23.7371 3.47606L32.524 12.2631Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.86914 21.7393L21.7395 7.86871" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.0645 24.9346L24.9349 11.064" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.2598 28.1299L28.1304 14.2595" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <h4 class="feature-title">{{get_phrase('Durable Floor Mats')}}</h4>
                                </div>
                                <p class="feature-subtitle">{{get_phrase('All-weather, easy-to-clean mats designed to take on mud, snow, and spills—keeping your car fresh and spotless year-round.')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Features Area -->

    <!-- Start Testimonial Area -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testi-section-title-area">
                        <h2 class="section-title text-center text-white max-w-735px mx-auto wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Loved by our customers')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                            @foreach($reviews as $review)
                            <div class="swiper-slide">
                                <div class="single-testimonial">
                                    <p class="testimonial-comment">{{$review->comment}}</p>
                                    <div class="d-flex align-items-start gap-2">
                                        <div class="ts-user-profile">
                                            <img class="user" src="{{ get_image($review->user->photo) }}" alt="">
                                        </div>
                                        <div>
                                            <h5 class="ts-user-name">{{ $review->user->name }}</h5>
                                            <div class="ts-user-rating-stars">
                                                
                                                  @for($i = 1; $i <= 5; $i++)
                                                    <div class="ts-rating-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 30 28" fill="none">
                                                            <g clip-path="url(#clip0_26_303)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4742 0.952733L18.9195 8.28201L26.9548 9.2838C27.6988 9.37967 28.2432 10.0662 28.1476 10.8106C28.0993 11.1735 27.9182 11.488 27.6605 11.7081L21.8113 17.1857L23.3381 25.1445C23.4808 25.8888 22.9945 26.6045 22.2497 26.7476C21.9255 26.8047 21.6012 26.7476 21.3339 26.5949L14.2335 22.692L7.14349 26.5949C6.47574 26.967 5.6454 26.7191 5.28296 26.0603C5.12036 25.7646 5.08238 25.44 5.1399 25.1445L6.65679 17.1857L0.750369 11.641C0.205779 11.1255 0.17702 10.2576 0.692481 9.71336C0.921452 9.46521 1.2179 9.33174 1.52282 9.2934V9.2838L9.55782 8.28201L13.0027 0.952733C13.318 0.265821 14.1295 -0.0203003 14.816 0.294581C15.1213 0.437641 15.3411 0.676199 15.4742 0.952733Z" fill="url(#paint0_linear_26_303)"/>
                                                            </g>
                                                            <defs>
                                                                <linearGradient id="paint0_linear_26_303" x1="0.323242" y1="0.166992" x2="0.323242" y2="26.7693" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#F8C51B"/>
                                                                <stop offset="1" stop-color="#F8C51B"/>
                                                                </linearGradient>
                                                                <clipPath id="clip0_26_303">
                                                                <rect width="29.4363" height="27.4739" fill="white" transform="translate(0.323242 0.166992)"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="testimonial-nav">
                            <div class="swiper-button-prev">
                                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.60023 2.84364L3.29727 7.7045L8.60023 12.5654C9.13326 13.0539 9.13326 13.8432 8.60023 14.3318C8.0672 14.8204 7.20615 14.8204 6.67312 14.3318L0.399772 8.58145C-0.133258 8.09286 -0.133258 7.3036 0.399772 6.81501L6.67312 1.06467C6.79955 0.948513 6.94974 0.85636 7.11508 0.793484C7.28042 0.730607 7.45767 0.698242 7.63667 0.698242C7.81568 0.698242 7.99293 0.730607 8.15827 0.793484C8.32361 0.85636 8.47379 0.948513 8.60023 1.06467C9.11959 1.55326 9.13326 2.35505 8.60023 2.84364Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.399772 12.5528L5.70273 7.69199L0.399772 2.83113C-0.133257 2.34254 -0.133257 1.55328 0.399772 1.06469C0.932802 0.576095 1.79385 0.576095 2.32688 1.06469L8.60023 6.81503C9.13326 7.30362 9.13326 8.09288 8.60023 8.58147L2.32688 14.3318C2.20045 14.448 2.05026 14.5401 1.88492 14.603C1.71958 14.6659 1.54233 14.6982 1.36333 14.6982C1.18432 14.6982 1.00707 14.6659 0.841733 14.603C0.676393 14.5401 0.526205 14.448 0.399772 14.3318C-0.11959 13.8432 -0.133257 13.0414 0.399772 12.5528Z" fill="white"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->

    <!-- Featured Brand Area Start -->
    <section class="featured-brand-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-50px">
                        <h2 class="section-title text-center text-white max-w-735px mx-auto mb-6px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Featured Brands')}}</h2>
                        <p class="section-subtitle text-center text-white max-w-520px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase("We’ve partnered with top manufacturers to bring you the best.")}}</p>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="featured-brand-wrap">
                        @foreach($brands->take(4) as $brand)
                            <div class="single-featured-brand">
                                <img class="brand" src="{{ get_image($brand->logo) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Brand Area End -->
