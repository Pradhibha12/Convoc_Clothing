  <!-- Hero Area Start -->
    <section class="hero-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-content-area">
                        <div class="hero-position-image1 wow animate__fadeInLeft" data-wow-delay=".1s">
                            <img class="img" src=" {{ asset('assets/frontend/women-clothing/images/hero-banner1.webp') }}" alt="">
                        </div>
                        <div class="hero-position-image2 wow animate__fadeInRight" data-wow-delay=".1s">
                            <img class="img" src="{{ asset('assets/frontend/women-clothing/images/hero-banner2.webp') }}" alt="">
                        </div>
                        <!-- Swiper -->
                        <div class="swiper hero-slider wow animate__fadeInUp" data-wow-delay=".2s">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="hero-slide-content">
                                        <p class="hero-title-badge">{{get_phrase('Brand For Woman’s Fashion')}}</p>
                                        <h1 class="hero-title">{{get_phrase('Fashion That Speaks!')}}</h1>
                                        <p class="hero-subtitle">{{get_phrase('Step into a world where fashion meets femininity.')}}</p>
                                        <div class="text-center">
                                            <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn">{{get_phrase('Shop New Arrivals')}}</a>
                                        </div>
                                    </div>
                                </div> 
                                <div class="swiper-slide">
                                    <div class="hero-slide-content">
                                        <p class="hero-title-badge">{{get_phrase(' Brand For Woman’s Fashion')}}</p>
                                        <h1 class="hero-title">{{get_phrase('Fashion That Speaks!')}}</h1>
                                        <p class="hero-subtitle">{{get_phrase('Step into a world where fashion meets femininity. 2')}}</p>
                                        <div class="text-center">
                                            <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn">{{get_phrase('Shop New Arrivals')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-slide-content">
                                        <p class="hero-title-badge">{{get_phrase('Brand For Woman’s Fashion')}}</p>
                                        <h1 class="hero-title">{{get_phrase('Fashion That Speaks!')}}</h1>
                                        <p class="hero-subtitle">{{get_phrase('Step into a world where fashion meets femininity. 3')}}</p>
                                        <div class="text-center">
                                            <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn">{{get_phrase('Shop New Arrivals')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area End -->
     
    <!-- Category Area Start -->
    <section class="section-mb category-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <h5 class="section-sm-title mb-16px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Shop by Category')}}</h5>
                        <h2 class="section-title text-center max-w-744px mx-auto mb-16px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Effortless Picks for Every Day!')}}</h2>
                        <p class="section-subtitle text-center mx-auto max-w-612px category-section-subtitle wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Find your perfect pieces for every moment curated to match your mood, style, & lifestyle.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn wc-btn-outline-dark">{{get_phrase('Explore Collection')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
                 @php
                    $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(6)->get();
                    @endphp
                   @foreach($categories as $category) 
                   
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <a href="{{ route('products', get_category_params($category)) }}" class="category-item">
                            <div class="category-iconbox">
                                <img src="{{ get_image($category->icon) }}" alt="">
                            </div>
                            <h4 class="category-title">{{ $category->title }}</h4>
                            <span class="category-arrow">
                                <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.991948 18.6125C0.225673 19.1693 0.0558042 20.2418 0.612536 21.0081C1.16927 21.7743 2.24178 21.9442 3.00805 21.3875L0.991948 18.6125ZM24.7445 4.97411C24.8927 4.03861 24.2544 3.16011 23.3189 3.01194L8.07394 0.597376C7.13843 0.449206 6.25994 1.08747 6.11177 2.02298C5.9636 2.95848 6.60186 3.83698 7.53737 3.98515L21.0885 6.13143L18.9422 19.6825C18.794 20.618 19.4323 21.4965 20.3678 21.6447C21.3033 21.7929 22.1818 21.1546 22.3299 20.2191L24.7445 4.97411ZM2 20L3.00805 21.3875L24.0587 6.09329L23.0506 4.70583L22.0426 3.31836L0.991948 18.6125L2 20Z" fill="black"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Category Area End -->

    <!-- Trending Product Area Start -->
    <section class="trending-product-section section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-50px">
                        <h5 class="section-sm-title mb-22px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Trending Now')}}</h5>
                        <h2 class="section-title text-center max-w-744px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Our community’s most-loved picks this week')}}</h2>
                    </div>
                    <div class="mixitup-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                          <button type="button" data-filter=".show-all" class="product-filter-btn mixitup-control-active">{{get_phrase('All')}}</button>
                            @foreach($categories->take(4) as $category)
                            <button type="button" data-filter=".cat-{{$category->id}}" class="product-filter-btn mixitup-control-active">{{$category->title}}</button>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="row product-card-row mixitup wow animate__fadeInUp" data-wow-delay=".4s">
                @php 
                   $products =App\Models\Product::where('status', 1)->latest()->take(8)->get();
                @endphp
               @foreach($products as $product)
                @php 
                    $category =  App\Models\Category::where('id', $product->category_id)->first();
                @endphp
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mix show-all">
                    <div class="product-card">
                        <div class="pc-banner-wrap2">
                            <a href="{{ route('product', $product->slug) }}" class="product-card-banner">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                            </a>
                            
                            <div class="pc-banner-icons">
                                <a  href="javascript:;"  class="product-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49509C13.0949 3.48589 14.5211 2.91895 16.0098 2.91895C17.6173 2.91895 19.1519 3.58001 20.2755 4.74512C21.3911 5.90102 22.0122 7.4592 22.0122 9.07738C22.0122 10.6956 21.391 12.2539 20.2755 13.4096C19.5338 14.1786 18.7932 14.9649 18.0487 15.7554C16.5366 17.361 15.0084 18.9837 13.4208 20.5126L13.4171 20.5161C12.5984 21.293 11.3019 21.2647 10.5181 20.4524L3.72374 13.4096C1.40898 11.0102 1.40898 7.14465 3.72374 4.74523C5.98889 2.39723 9.63646 2.31385 11.9998 4.49509Z" fill="#4A4A4A"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="product-card-view">
                                    <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="view">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M2.5 10.8334C5.5 4.16671 14.5 4.16671 17.5 10.8334" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 14.1666C8.61925 14.1666 7.5 13.0474 7.5 11.6666C7.5 10.2859 8.61925 9.16663 10 9.16663C11.3807 9.16663 12.5 10.2859 12.5 11.6666C12.5 13.0474 11.3807 14.1666 10 14.1666Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <a href="{{ route('product', $product->slug) }}"  class="product-card-btn btn wc-btn-dark"> {{ get_phrase('Shop Now') }}
                            </a>
                        </div>
                        <div class="product-card-body">
                            <a href="{{ route('product', $product->slug) }}" class="product-card-category">{{$category->title}}</a>
                             <div class="pc-stars-ratings d-flex">
                                    <div class="pc-stars ">
                                        @php
                                            $rating = $product->average_rating;
                                            $fullStars = floor($rating); // full stars count
                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                        @endphp

                                        {{-- Full stars --}}
                                        @for($i = 0; $i < $fullStars; $i++)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#FFC633"/>
                                                </svg>
                                            </div>
                                        @endfor

                                        {{-- Half star --}}
                                        @if($halfStar)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <defs>
                                                        <linearGradient id="half-grad">
                                                            <stop offset="50%" stop-color="#FFC633"/>
                                                            <stop offset="50%" stop-color="#ccc"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                </svg>
                                            </div>
                                        @endif

                                        {{-- Empty stars --}}
                                        @for($i = 0; $i < $emptyStars; $i++)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                </svg>
                                            </div>
                                        @endfor
                                    </div>

                                    <p class="pc-rating-average ms-1">{{ number_format($product->average_rating, 1) }}</p>
                                </div>
                            <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 20, '...') }}</a>
                            <p class="product-card-subtitle"> {{ \Illuminate\Support\Str::limit($product->summary, 60, '...') }}</p>
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
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- Category wise latest 8 --}}
                  @foreach($categories->take(4) as $category)
                        @php 
                            $catProducts = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()
                                        ->take(8)->get();
                        @endphp

                    @foreach($catProducts as $catproduct)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mix cat-{{$catproduct->category_id}}">
                            <div class="product-card">
                                <div class="pc-banner-wrap2">
                                    <a href="{{ route('product', $catproduct->slug) }}" class="product-card-banner">
                                        @php
                                            $thumbnails = json_decode($catproduct->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                                    </a>
                                    
                                    <div class="pc-banner-icons">
                                        <a  href="javascript:;"  class="product-card-wishlist {{ wishlist_class($catproduct->id) }}" 
                                onclick="toggleWishlist({{ $catproduct->id }}, this)">
                                            <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49509C13.0949 3.48589 14.5211 2.91895 16.0098 2.91895C17.6173 2.91895 19.1519 3.58001 20.2755 4.74512C21.3911 5.90102 22.0122 7.4592 22.0122 9.07738C22.0122 10.6956 21.391 12.2539 20.2755 13.4096C19.5338 14.1786 18.7932 14.9649 18.0487 15.7554C16.5366 17.361 15.0084 18.9837 13.4208 20.5126L13.4171 20.5161C12.5984 21.293 11.3019 21.2647 10.5181 20.4524L3.72374 13.4096C1.40898 11.0102 1.40898 7.14465 3.72374 4.74523C5.98889 2.39723 9.63646 2.31385 11.9998 4.49509Z" fill="#4A4A4A"/>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $catproduct->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="product-card-view">
                                            <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="view">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M2.5 10.8334C5.5 4.16671 14.5 4.16671 17.5 10.8334" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10 14.1666C8.61925 14.1666 7.5 13.0474 7.5 11.6666C7.5 10.2859 8.61925 9.16663 10 9.16663C11.3807 9.16663 12.5 10.2859 12.5 11.6666C12.5 13.0474 11.3807 14.1666 10 14.1666Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <a href="{{ route('product', $catproduct->slug) }}"  class="product-card-btn btn wc-btn-dark">
                                       {{ get_phrase('Shop Now') }}
                                    </a>
                                </div>
                                <div class="product-card-body">
                                    <a href="{{ route('product', $catproduct->slug) }}" class="product-card-category">{{$category->title}}</a>
                                    <div class="pc-stars-ratings d-flex">
                                            <div class="pc-stars ">
                                                @php
                                                    $rating = $catproduct->average_rating;
                                                    $fullStars = floor($rating); // full stars count
                                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                                @endphp

                                                {{-- Full stars --}}
                                                @for($i = 0; $i < $fullStars; $i++)
                                                    <div class="pc-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#FFC633"/>
                                                        </svg>
                                                    </div>
                                                @endfor

                                                {{-- Half star --}}
                                                @if($halfStar)
                                                    <div class="pc-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                            <defs>
                                                                <linearGradient id="half-grad">
                                                                    <stop offset="50%" stop-color="#FFC633"/>
                                                                    <stop offset="50%" stop-color="#ccc"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                        </svg>
                                                    </div>
                                                @endif

                                                {{-- Empty stars --}}
                                                @for($i = 0; $i < $emptyStars; $i++)
                                                    <div class="pc-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                        </svg>
                                                    </div>
                                                @endfor
                                            </div>

                                            <p class="pc-rating-average ms-1">{{ number_format($catproduct->average_rating, 1) }}</p>
                                        </div>
                                    <a href="{{ route('product', $catproduct->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($catproduct->title, 20, '...') }}</a>
                                    <p class="product-card-subtitle"> {{ \Illuminate\Support\Str::limit($catproduct->summary, 60, '...') }}</p>
                                    @if ($catproduct->is_discounted)
                                        @php
                                            $discount = $catproduct->discount;
                                        @endphp
                                        @if ($discount->discount_type == 'percentage')
                                            <h4 class="product-card-price">{{ currency(($catproduct->price / 100) * $discount->discount_value) }}</h4>
                                        @else
                                            <h4 class="product-card-price">{{ currency($catproduct->price) }}</h4>
                                        @endif
                                        @else
                                            <h4 class="product-card-price">{{ currency($catproduct->price) }}</h4>
                                        @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>
    <!-- Trending Product Area End -->

    <!-- Seasonal Product Area Start -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="seasonal-section-title-area">
                        <h5 class="section-sm-title mb-22px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Seasonal Style Picks')}}</h5>
                        <div class="d-flex align-items-start align-items-lg-center justify-content-start justify-content-lg-between column-gap-4 row-gap-4 flex-column flex-lg-row">
                            <h2 class="section-title seasonal-section-title wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Handpicked looks to match the moment')}}</h2>
                            <a href="{{route('all_products')}}" class="btn-underline text-nowrap wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Explore Collection')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-card-row2 mb-20px wow animate__fadeInUp" data-wow-delay=".4s">
                @foreach($latest_products as $product)
                @php 
                    $category =  App\Models\Category::where('id', $product->category_id)->first();
                @endphp
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 ">
                    <div class="product-card">
                        <div class="pc-banner-wrap2">
                            <a href="{{ route('product', $product->slug) }}" class="product-card-banner">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                            </a>
                           
                            <div class="pc-banner-icons">
                                <a  href="javascript:;"  class="product-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49509C13.0949 3.48589 14.5211 2.91895 16.0098 2.91895C17.6173 2.91895 19.1519 3.58001 20.2755 4.74512C21.3911 5.90102 22.0122 7.4592 22.0122 9.07738C22.0122 10.6956 21.391 12.2539 20.2755 13.4096C19.5338 14.1786 18.7932 14.9649 18.0487 15.7554C16.5366 17.361 15.0084 18.9837 13.4208 20.5126L13.4171 20.5161C12.5984 21.293 11.3019 21.2647 10.5181 20.4524L3.72374 13.4096C1.40898 11.0102 1.40898 7.14465 3.72374 4.74523C5.98889 2.39723 9.63646 2.31385 11.9998 4.49509Z" fill="#4A4A4A"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="product-card-view">
                                    <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="view">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M2.5 10.8334C5.5 4.16671 14.5 4.16671 17.5 10.8334" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 14.1666C8.61925 14.1666 7.5 13.0474 7.5 11.6666C7.5 10.2859 8.61925 9.16663 10 9.16663C11.3807 9.16663 12.5 10.2859 12.5 11.6666C12.5 13.0474 11.3807 14.1666 10 14.1666Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <a href="{{ route('product', $product->slug) }}"  class="product-card-btn btn wc-btn-dark">
                               {{ get_phrase('Shop Now') }}
                            </a>
                        </div>
                        <div class="product-card-body">
                            <a href="javascript:;" class="product-card-category">{{$category->title}}</a>
                             <div class="pc-stars-ratings d-flex">
                                    <div class="pc-stars ">
                                        @php
                                            $rating = $product->average_rating;
                                            $fullStars = floor($rating); // full stars count
                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                        @endphp

                                        {{-- Full stars --}}
                                        @for($i = 0; $i < $fullStars; $i++)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#FFC633"/>
                                                </svg>
                                            </div>
                                        @endfor

                                        {{-- Half star --}}
                                        @if($halfStar)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <defs>
                                                        <linearGradient id="half-grad">
                                                            <stop offset="50%" stop-color="#FFC633"/>
                                                            <stop offset="50%" stop-color="#ccc"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                </svg>
                                            </div>
                                        @endif

                                        {{-- Empty stars --}}
                                        @for($i = 0; $i < $emptyStars; $i++)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                </svg>
                                            </div>
                                        @endfor
                                    </div>

                                    <p class="pc-rating-average ms-1">{{ number_format($product->average_rating, 1) }}</p>
                                </div>
                            <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 20, '...') }}</a>
                            <p class="product-card-subtitle"> {{ \Illuminate\Support\Str::limit($product->summary, 60, '...') }}</p>
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
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn wc-btn-outline-dark min-w-177px mx-auto">{{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Seasonal Product Area End -->

    <!-- Promotional Deal Area Start -->
    <section class="promotional-deal-section overflow-hidden section-mb">
        <div class="container">
            <div class="row align-items-center gx-4">
                <div class="col-lg-6">
                    <div class="promotional-deal-banner wow animate__fadeInLeft" data-wow-delay=".1s">
                        <img class="banner" src=" {{ asset('assets/frontend/women-clothing/images/promotion-banner.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="promotional-deal-content">
                        <h5 class="section-sm-title mb-22px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Promotions & Deals')}}</h5>
                        <h2 class="section-title mb-22px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Fashion finds you don’t want to miss.')}}</h2>
                        <p class="promotional-section-subtitle wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Limited-time offers on your favorite styles 50% OFF Summer Dresses . Shop now and save big while they last!')}}</p>
                         <a href="javascript:;" class="btn wc-btn-outline-dark min-w-177px mx-auto wow animate__fadeInUp" data-wow-delay=".5s">{{get_phrase('Shop Now')}}</a>
                       
                        <div class="promotion-discount-wrap">
                            <h5 class="pdw-category">{{get_phrase('Fashion')}}</h5>
                            <h4 class="pdw-title">{{get_phrase('Sale')}}</h4>
                            <p class="pdw-subtitle">{{get_phrase('up to 50% off')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Promotional Deal Area End -->

    <!-- Style It Your Way Area Start -->
    <section class="section-mb style-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="style-main-wrap">
                        <div class="style-banner1 wow animate__fadeInLeft" data-wow-delay=".1s">
                            <img class="banner" src="{{ asset('assets/frontend/women-clothing/images/style-banner1.webp') }}" alt="banner">
                        </div>
                        <div class="style-content">
                            <h5 class="section-sm-title mb-4 text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Style It Your Way')}}</h5>
                            <h2 class="section-title text-center mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Looks for every vibe and every version of you!')}}</h2>
                            <p class="style-section-subtitle wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Discover curated outfit ideas that match your mood, moment, and lifestyle — because great style starts with inspiration.')}}</p>
                            <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                                <a href="javascript:;" class="btn wc-btn-outline-dark min-w-177px mx-auto">{{get_phrase('Shop Now')}}</a>
                            </div>
                        </div>
                        <div class="style-banner2-wrap wow animate__fadeInRight" data-wow-delay=".1s">
                            <div class="style-banner2">
                                <img class="banner" src="{{ asset('assets/frontend/women-clothing/images/style-banner2.webp') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Style It Your Way Area End -->

    <!-- Testimonial Area Start -->
    <section class="testimonial-section overflow-hidden section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-section-title-area">
                        <h5 class="section-sm-title mb-4 text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Testimonials')}}</h5>
                        <h2 class="section-title text-center mb-30px max-w-744px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Loved by women everywhere')}}</h2>
                    </div>
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
                                    @for($i = 1; $i <= 5; $i++)
                                    <div class="ts-rating-star">
                                        <svg width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4064 1.30566L22.476 11.5761L33.8128 13.2331L25.6096 21.2231L27.5456 32.5107L17.4064 27.1786L7.26725 32.5107L9.20321 21.2231L1 13.2331L12.3368 11.5761L17.4064 1.30566Z" fill="#F9DF56" stroke="#F0D44C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    @endfor
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
    <!-- Testimonial Area End -->

    <!-- Blog Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-section-title-area">
                        <h5 class="section-sm-title mb-22px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('News & Insights')}}</h5>
                        <h2 class="section-title text-center max-w-744px mx-auto wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Tips, trends, and how-tos from our fashion editors')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row blog-card-row wow animate__fadeInUp" data-wow-delay=".3s">
                @foreach($blogs->take(3) as $blog)
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-banner">
                            <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                        </a>
                        <div>
                            <a href="javascript:;" class="blog-card-category">{{ $blog->created_at->format('d M, Y') }}</a>
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-title">{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</a>
                            <p class="blog-card-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn wc-sm-btn-outline-dark">{{get_phrase('Read More')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Blog Area End -->
     
     <!-- Why Choose us? Area Start -->
    <section class="why-choose-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wcu-section-title-area">
                        <h5 class="section-sm-title mb-22px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Why Choose us?')}}</h5>
                        <h2 class="section-title text-center max-w-744px mx-auto mb-32px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Why Shop With Us?')}}</h2>
                        <p class="section-subtitle2 text-center mx-auto max-w-494px wcu-section-subtitle wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Style tips, trend alerts, and outfit inspo to keep your wardrobe fresh and fabulous.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn wc-btn-outline-dark min-w-177px">{{get_phrase('Shop Now')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gy-5 wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div>
                        <div class="why-choose-icon">
                            <img class="icon" src="{{ asset('assets/frontend/women-clothing/images/svg-icons/why-choose-icon1.svg') }}" alt="">
                        </div>
                        <h4 class="why-choose-title">{{get_phrase('Secure Checkout')}}</h4>
                        <p class="why-choose-subtitle">{{get_phrase('Secure with multiple payment options')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div>
                        <div class="why-choose-icon">
                            <img class="icon" src="{{ asset('assets/frontend/women-clothing/images/svg-icons/why-choose-icon2.svg') }}" alt="">
                        </div>
                        <h4 class="why-choose-title">{{get_phrase('Free Shipping')}}</h4>
                        <p class="why-choose-subtitle">{{get_phrase('on orders over $50')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div>
                        <div class="why-choose-icon">
                            <img class="icon" src="{{ asset('assets/frontend/women-clothing/images/svg-icons/why-choose-icon3.svg') }}" alt="">
                        </div>
                        <h4 class="why-choose-title">{{get_phrase('Easy Returns')}}</h4>
                        <p class="why-choose-subtitle">{{get_phrase('within 14 days')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div>
                        <div class="why-choose-icon">
                            <img class="icon" src="{{ asset('assets/frontend/women-clothing/images/svg-icons/why-choose-icon4.svg') }}" alt="">
                        </div>
                        <h4 class="why-choose-title">{{get_phrase('Style-Obsessed Team')}}</h4>
                        <p class="why-choose-subtitle">{{get_phrase('curating new trends weekly')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose us? Area End -->
