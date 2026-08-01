<!-- Banner Area Start -->
<section class="banner-section overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-area-main">
                    <div class="banner-area-top">
                        <div class="banner-title-area">
                            <h1 class="banner-title wow animate__fadeInUp" data-wow-delay=".1s">
                                <span class="banner-title-shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="78" height="78" viewBox="0 0 78 78" fill="none">
                                        <circle cx="39.4052" cy="38.5946" r="36.5633" fill="#FFD33E" stroke="#EF4B3C" stroke-width="4.06259"/>
                                        <path d="M59.6921 23.6485C58.7228 22.6792 57.5072 22.0489 56.186 21.8153C55.9524 20.4942 55.3221 19.2785 54.3528 18.3093C53.1048 17.0611 51.4453 16.3737 49.6795 16.3735C47.9144 16.3736 46.2548 17.0611 45.0067 18.3091C42.9529 20.3629 42.5145 23.5032 43.8066 26.0113L26.8235 42.9944C24.3155 41.7024 21.175 42.1408 19.1214 44.1945C17.873 45.4429 17.1855 47.1025 17.1855 48.8678C17.1855 50.6331 17.873 52.2927 19.1213 53.5409C20.0906 54.5102 21.3062 55.1405 22.6274 55.3741C22.861 56.6951 23.4913 57.9109 24.4606 58.8801C25.7087 60.1282 27.3682 60.8157 29.1342 60.8159C30.8993 60.8158 32.5589 60.1283 33.8069 58.8802C35.8607 56.8264 36.2991 53.6861 35.007 51.178L51.9901 34.1949C54.498 35.4869 57.6384 35.0486 59.6922 32.9948C60.9404 31.7466 61.6279 30.0869 61.6279 28.3217C61.6279 26.5565 60.9404 24.8967 59.6921 23.6485Z" fill="black"/>
                                    </svg>
                                </span>
                                <span>{{get_phrase('Everything Your Pet Needs, All in One Place!')}}</span>
                            </h1>
                            <p class="banner-subtitle wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('From nutritious food to fun toys & grooming essentials  Get quality products for every pet')}}</p>
                            <div class="banner-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                                <a href="{{route('all_products')}}" class="btn ptb2-btn-skin">{{get_phrase('Shop Now!')}}</a>
                                <a href="{{route('all_products')}}" class="iconText-btn">
                                    <span>{{get_phrase('Browse Categories')}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                        <path d="M2 18.3345L18.365 2.70797M18.365 2.70797L3.00906 2.35352M18.365 2.70797L18.0105 18.0639" stroke="black" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="banner-slider-area wow animate__fadeInRight" data-wow-delay=".2s">
                            <!-- Swiper -->
                            <div class="swiper banner-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="banner-slide">
                                            <img class="banner" src="{{ asset('assets/frontend/pet/images/banner-product1.webp') }}" alt="banner">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="banner-slide">
                                            <img class="banner" src="{{ asset('assets/frontend/pet/images/banner-product1.webp') }}" alt="banner">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="banner-slide">
                                            <img class="banner" src="{{ asset('assets/frontend/pet/images/banner-product1.webp') }}" alt="banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-setisfied-customer-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                        <div class="mb-2 d-flex align-items-center gap-2 flex-wrap">
                             @php
                                $reviewCount = App\Models\Product::avg('average_rating');
                                $reviewCount = round($reviewCount, 1); 
                                $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 

                                $fullStars   = floor($reviewCount); 
                                $halfStar    = ($reviewCount - $fullStars >= 0.5) ? 1 : 0; 
                                $emptyStars  = 5 - ($fullStars + $halfStar); 
                            @endphp
                            <h4 class="bs-customer-amount">{{ $totalRatings }}+</h4>
                            <ul class="d-flex align-items-center">
                                @foreach($reviews->take(3) as $review)
                                <li class="bn-list-profile">
                                    <img class="profile" src="{{ get_image($review->user->photo) }}" alt="profile">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <p class="bs-customer-subtitle">{{get_phrase('Satisfied Customers!')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!-- Explore handpicked essentials Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="category-title-area">
                    <h2 class="section-title mb-14px category-section-title text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Explore handpicked essentials for your pet')}}</h2>
                    <p class="section-subtitle category-section-subtitle text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Explore handpicked essentials for your pet — whether they bark, purr, chirp, or swim.')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container wow animate__fadeInUp" data-wow-delay=".3s">
        <div class="row">
            <div class="col-12">
                <div class="project-card-main">
                        @php
                           $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                        @endphp
                         @foreach($categories->take(3) as $index => $category)
                         @php 
                            $cardClass = 'project-card' . ($index+1); 
                         @endphp
                        <div class="{{ $cardClass }}">
                            <div class="{{ $cardClass }}-body">
                                {{-- <p class="project-card-badge mb-20px">For Cats</p> --}}
                                <h3 class="project-card-title mb-2">{{ $category->title }}</h3>
                                <p class="project-card-subtitle mb-26px">{{ $category->description }}</p>
                                <a href="{{ route('products', $category->slug) }}" class="btn ptb3-btn-skin">{{get_phrase('Shop Cat supplies')}}</a>
                            </div>
                            <div class="{{ $cardClass }}-banner">
                                <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Explore handpicked essentials Area End -->

<!-- Top Picks Product Area Start -->
<section class="top-picks-product-section section-mb overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-product-title-area d-flex justify-content-between align-items-center gap-3 flex-wrap">
                    <h2 class="section-title tp-area-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Top Picks Loved by Pet Parents')}}</h2>
                    <div class="tp-title-right">
                        <p class="section-subtitle mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Discover our best-selling products tried, tested, & loved by pets and their humans.')}}</p>
                        <a href="{{route('all_products')}}" class="btn pt-btn-skin wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Explore More')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-picks-product-area wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="row gy-4 gx-17px">
                @php 
                    $topProducts = App\Models\Product::where('status', 1)->where('label', 'top-seller')->inRandomOrder()->take(3)->get();
                @endphp
                @foreach($topProducts as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product-card">
                        <div class="card-product-slider-area">
                           <a href="javascript:;" 
                                class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="h-100 w-100 d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6477 0.423828C14.6751 0.423828 12.9095 1.3829 11.8088 2.85422C10.708 1.3829 8.94242 0.423828 6.96978 0.423828C3.62391 0.423828 0.910156 3.14848 0.910156 6.51614C0.910156 7.81308 1.11723 9.01197 1.47688 10.1236C3.19886 15.5729 8.50648 18.8316 11.133 19.7253C11.5036 19.8561 12.1139 19.8561 12.4845 19.7253C15.111 18.8316 20.4186 15.5729 22.1406 10.1236C22.5003 9.01197 22.7074 7.81308 22.7074 6.51614C22.7074 3.14848 19.9936 0.423828 16.6477 0.423828Z" fill="#CECECE"/>
                                    </svg>
                                </span>
                            </a>
                            <!-- Slider -->
                            <div class="swiper card-product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card-product-slide">
                                            @php
                                                $thumbnails = json_decode($product->thumbnail, true);
                                                $firstImage = $thumbnails[0] ?? null;
                                            @endphp
                                            <img class="product" src="{{ get_image($firstImage) }}" alt="banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="product-card-body">
                            <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                            <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 60, '...') }}</p>
                            <div class="d-flex align-items-center column-gap-12px row-gap-2 mb-4 flex-wrap">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26" viewBox="0 0 28 26" fill="none">
                                            <path d="M9.20936 7.92414L12.8408 0.816639C13.3069 -0.0957806 14.6538 -0.0957806 15.1199 0.816639L18.7512 7.92414L26.8723 9.07092C27.9142 9.21805 28.3294 10.4555 27.5752 11.1652L21.6998 16.6938L23.0864 24.5042C23.2645 25.5072 22.1747 26.272 21.2424 25.7983L13.9803 22.1087L6.7182 25.7983C5.7859 26.272 4.69612 25.5072 4.87417 24.5042L6.26074 16.6938L0.38551 11.1652C-0.36884 10.4555 0.0464452 9.21805 1.0884 9.07092L9.20936 7.92414Z" fill="#FFC416"/>
                                        </svg>
                                    </div>
                                    
                                    <div class="d-flex align-items-center gap-2px">
                                        <h5 class="product-card-rating">{{ number_format($product->average_rating, 1) }}</h5>
                                        
                                    </div>
                                </div>
                                    @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                            <h3 class="card-product-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h3>
                                    @else
                                        <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                    @endif
                                    @else
                                        <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                    @endif
                            </div>
                            <a  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" href="javascript:;" class="btn ptb4-btn-skin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.1014 22.5456C20.9923 22.5456 21.7145 21.8233 21.7145 20.9325C21.7145 20.0416 20.9923 19.3193 20.1014 19.3193C19.2105 19.3193 18.4883 20.0416 18.4883 20.9325C18.4883 21.8233 19.2105 22.5456 20.1014 22.5456Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.34749 22.5451C10.2384 22.5451 10.9606 21.8228 10.9606 20.932C10.9606 20.0411 10.2384 19.3188 9.34749 19.3188C8.45659 19.3188 7.73438 20.0411 7.73438 20.932C7.73438 21.8228 8.45659 22.5451 9.34749 22.5451Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.50846 3.18793H22.7904L20.6396 15.0174H6.65928L4.50846 3.18793ZM4.50846 3.18793C4.32922 2.47099 3.43305 1.03711 1.28223 1.03711" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.639 15.0176H6.65868H4.75603C2.83717 15.0176 1.81934 15.8577 1.81934 17.1684C1.81934 18.4791 2.83717 19.3192 4.75603 19.3192H20.1013" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>
                                     @if ($product->is_cart_item)
                                        {{ get_phrase('Added To Cart')}}
                                    @else
                                        {{ get_phrase('Add To Cart') }}
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Top Picks Product Area End -->




<!-- Expert Pet Care Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-50px">
                    <h2 class="section-title mb-14px pet-care-section-title text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Check out Expert Pet Care Tips!')}}</h2>
                    <p class="section-subtitle pet-care-section-subtitle text-center mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase("Keep your pets happy, healthy, and thriving with advice from veterinarians and seasoned pet parents.")}}</p>
                    <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-lg-6 col-md-10">
                <div class="tips-blog-card tips-blog-card1">
                    <a href="javascript:;" class="tb-card-banner">
                        <img class="banner" src="{{ asset('assets/frontend/pet/images/tips-blog-banner1.webp') }}" alt="banner">
                    </a>
                    <div>
                        <a href="javascript:;" class="tb-card-category">{{get_phrase('Long Hair Care Tips')}}</a>
                        <a href="javascript:;" class="tb-card-title">{{get_phrase('5 Grooming Tips for Long-Haired Dogs')}}</a>
                        <p class="tb-card-subtitle">{{get_phrase('Discover easy ways to prevent tangles and keep your dog’s coat shiny.')}}</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="tips-blog-card tips-blog-card2">
                    <a href="javascript:;" class="tb-card-banner">
                        <img class="banner" src="{{ asset('assets/frontend/pet/images/tips-blog-banner2.webp') }}" alt="banner">
                    </a>
                    <div>
                        <a href="javascript:;" class="tb-card-category">{{get_phrase('Aquarium Setup Guide')}}</a>
                        <a href="javascript:;" class="tb-card-title">{{get_phrase('How to Set Up a Fish Tank in 5 Minutes')}}</a>
                        <p class="tb-card-subtitle">{{get_phrase('A step-by-step visual guide for beginners setting up a freshwater tank.')}}</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Expert Pet Care Area End -->

<!-- Latest Essentials Area Start -->
<section class="latest-essential-section section-mb overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="latest-essential-title-area d-flex justify-content-between align-items-center gap-3 flex-wrap">
                    <h2 class="section-title le-area-title text-center text-xl-start wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Latest Essentials for Every Pet')}}</h2>
                    <div class="le-title-right">
                        <p class="section-subtitle le-area-subtitle mb-30px text-center text-xl-start wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Fresh finds your furry (or feathered) friends will love. Discover the latest in pet care and fun.')}}</p>
                        <div class="d-flex gap-14px align-items-center flex-wrap justify-content-center justify-content-xl-start wow animate__fadeInUp" data-wow-delay=".3s">
                            <button type="button" data-filter=".show-all" class="btn product-filter-btn mixitup-control-active">All Products</button>
                            @foreach($categories->take(3) as $category)
                                <button type="button" data-filter=".cat-{{$category->id}}" class="btn product-filter-btn"> {{ $category->title }} </button>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 gx-17px mixitup wow animate__fadeInUp" data-wow-delay=".4s">
            
            @php 
                $producted =App\Models\Product::where('status', 1)->latest()->take(6)->get();
            @endphp
            @foreach($producted as $product)   
            <div class="col-md-6 col-lg-4 mix show-all">
                 <div class="product-card">
                        <div class="card-product-slider-area">
                           <a href="javascript:;" 
                                class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="h-100 w-100 d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="Bookmark">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6477 0.423828C14.6751 0.423828 12.9095 1.3829 11.8088 2.85422C10.708 1.3829 8.94242 0.423828 6.96978 0.423828C3.62391 0.423828 0.910156 3.14848 0.910156 6.51614C0.910156 7.81308 1.11723 9.01197 1.47688 10.1236C3.19886 15.5729 8.50648 18.8316 11.133 19.7253C11.5036 19.8561 12.1139 19.8561 12.4845 19.7253C15.111 18.8316 20.4186 15.5729 22.1406 10.1236C22.5003 9.01197 22.7074 7.81308 22.7074 6.51614C22.7074 3.14848 19.9936 0.423828 16.6477 0.423828Z" fill="#CECECE"/>
                                    </svg>
                                </span>
                            </a>
                            <!-- Slider -->
                            <div class="swiper card-product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card-product-slide">
                                            @php
                                                $thumbnails = json_decode($product->thumbnail, true);
                                                $firstImage = $thumbnails[0] ?? null;
                                            @endphp
                                            <img class="product" src="{{ get_image($firstImage) }}" alt="banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="product-card-body">
                            <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                            <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 60, '...') }}</p>
                            <div class="d-flex align-items-center column-gap-12px row-gap-2 mb-4 flex-wrap">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26" viewBox="0 0 28 26" fill="none">
                                            <path d="M9.20936 7.92414L12.8408 0.816639C13.3069 -0.0957806 14.6538 -0.0957806 15.1199 0.816639L18.7512 7.92414L26.8723 9.07092C27.9142 9.21805 28.3294 10.4555 27.5752 11.1652L21.6998 16.6938L23.0864 24.5042C23.2645 25.5072 22.1747 26.272 21.2424 25.7983L13.9803 22.1087L6.7182 25.7983C5.7859 26.272 4.69612 25.5072 4.87417 24.5042L6.26074 16.6938L0.38551 11.1652C-0.36884 10.4555 0.0464452 9.21805 1.0884 9.07092L9.20936 7.92414Z" fill="#FFC416"/>
                                        </svg>
                                    </div>
                                    
                                    <div class="d-flex align-items-center gap-2px">
                                        <h5 class="product-card-rating">{{ number_format($product->average_rating, 1) }}</h5>
                                    
                                    </div>
                                </div>
                                    @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                            <h3 class="card-product-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h3>
                                    @else
                                        <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                    @endif
                                    @else
                                        <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                    @endif
                            </div>
                            <a  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" href="javascript:;" class="btn ptb4-btn-skin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.1014 22.5456C20.9923 22.5456 21.7145 21.8233 21.7145 20.9325C21.7145 20.0416 20.9923 19.3193 20.1014 19.3193C19.2105 19.3193 18.4883 20.0416 18.4883 20.9325C18.4883 21.8233 19.2105 22.5456 20.1014 22.5456Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.34749 22.5451C10.2384 22.5451 10.9606 21.8228 10.9606 20.932C10.9606 20.0411 10.2384 19.3188 9.34749 19.3188C8.45659 19.3188 7.73438 20.0411 7.73438 20.932C7.73438 21.8228 8.45659 22.5451 9.34749 22.5451Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.50846 3.18793H22.7904L20.6396 15.0174H6.65928L4.50846 3.18793ZM4.50846 3.18793C4.32922 2.47099 3.43305 1.03711 1.28223 1.03711" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.639 15.0176H6.65868H4.75603C2.83717 15.0176 1.81934 15.8577 1.81934 17.1684C1.81934 18.4791 2.83717 19.3192 4.75603 19.3192H20.1013" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>
                                    @if ($product->is_cart_item)
                                        {{ get_phrase('Added To Cart')}}
                                    @else
                                        {{ get_phrase('Add To Cart') }}
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
            </div>
            @endforeach
            @foreach($categories->take(4) as $category)
                @php 
                    $catProducts = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()->take(6)->get();
                @endphp
                @foreach($catProducts as $catproduct)
                <div class="col-md-6 col-lg-4 mix cat-{{$catproduct->category_id}}">
                     <div class="product-card">
                        <div class="card-product-slider-area">
                            <a href="#" class="product-card-bookmark active">
                                <span class="h-100 w-100 d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="Bookmark">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6477 0.423828C14.6751 0.423828 12.9095 1.3829 11.8088 2.85422C10.708 1.3829 8.94242 0.423828 6.96978 0.423828C3.62391 0.423828 0.910156 3.14848 0.910156 6.51614C0.910156 7.81308 1.11723 9.01197 1.47688 10.1236C3.19886 15.5729 8.50648 18.8316 11.133 19.7253C11.5036 19.8561 12.1139 19.8561 12.4845 19.7253C15.111 18.8316 20.4186 15.5729 22.1406 10.1236C22.5003 9.01197 22.7074 7.81308 22.7074 6.51614C22.7074 3.14848 19.9936 0.423828 16.6477 0.423828Z" fill="#CECECE"/>
                                    </svg>
                                </span>
                            </a>
                            <!-- Slider -->
                            <div class="swiper card-product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card-product-slide">
                                            @php
                                                $thumbnails = json_decode($catproduct->thumbnail, true);
                                                $firstImage = $thumbnails[0] ?? null;
                                            @endphp
                                            <img class="product" src="{{ get_image($firstImage) }}" alt="banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="product-card-body">
                            <a href="{{ route('product', $catproduct->slug) }}" class="product-card-title">{{$catproduct->title}}</a>
                            <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($catproduct->summary, 60, '...') }}</p>
                            <div class="d-flex align-items-center column-gap-12px row-gap-2 mb-4 flex-wrap">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26" viewBox="0 0 28 26" fill="none">
                                            <path d="M9.20936 7.92414L12.8408 0.816639C13.3069 -0.0957806 14.6538 -0.0957806 15.1199 0.816639L18.7512 7.92414L26.8723 9.07092C27.9142 9.21805 28.3294 10.4555 27.5752 11.1652L21.6998 16.6938L23.0864 24.5042C23.2645 25.5072 22.1747 26.272 21.2424 25.7983L13.9803 22.1087L6.7182 25.7983C5.7859 26.272 4.69612 25.5072 4.87417 24.5042L6.26074 16.6938L0.38551 11.1652C-0.36884 10.4555 0.0464452 9.21805 1.0884 9.07092L9.20936 7.92414Z" fill="#FFC416"/>
                                        </svg>
                                    </div>
                                    
                                    <div class="d-flex align-items-center gap-2px">
                                        <h5 class="product-card-rating">{{ number_format($catproduct->average_rating, 1) }}</h5>
                                       
                                    </div>
                                </div>
                                    @if ($catproduct->is_discounted)
                                    @php
                                        $discount = $catproduct->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                            <h3 class="card-product-price">{{ currency(($catproduct->price / 100) * $discount->discount_value) }}</h3>
                                    @else
                                        <h3 class="card-product-price">{{ currency($catproduct->price) }}</h3>
                                    @endif
                                    @else
                                        <h3 class="card-product-price">{{ currency($catproduct->price) }}</h3>
                                    @endif
                            </div>
                            <a  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $catproduct->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" href="javascript:;" class="btn ptb4-btn-skin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.1014 22.5456C20.9923 22.5456 21.7145 21.8233 21.7145 20.9325C21.7145 20.0416 20.9923 19.3193 20.1014 19.3193C19.2105 19.3193 18.4883 20.0416 18.4883 20.9325C18.4883 21.8233 19.2105 22.5456 20.1014 22.5456Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.34749 22.5451C10.2384 22.5451 10.9606 21.8228 10.9606 20.932C10.9606 20.0411 10.2384 19.3188 9.34749 19.3188C8.45659 19.3188 7.73438 20.0411 7.73438 20.932C7.73438 21.8228 8.45659 22.5451 9.34749 22.5451Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.50846 3.18793H22.7904L20.6396 15.0174H6.65928L4.50846 3.18793ZM4.50846 3.18793C4.32922 2.47099 3.43305 1.03711 1.28223 1.03711" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.639 15.0176H6.65868H4.75603C2.83717 15.0176 1.81934 15.8577 1.81934 17.1684C1.81934 18.4791 2.83717 19.3192 4.75603 19.3192H20.1013" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>
                                     @if ($product->is_cart_item)
                                        {{ get_phrase('Added To Cart')}}
                                    @else
                                        {{ get_phrase('Add To Cart') }}
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach

        </div>
    </div>
</section>
<!-- Latest Essentials Area End -->

<!-- Bundle & Save! Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-50px">
                    <h2 class="section-title mb-14px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Bundle & Save!')}}</h2>
                    <p class="section-subtitle bundle-save-section-subtitle text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Curated kits for easier shopping and better value everything your pet needs in one pack.')}}</p>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-6 col-md-10">
                <div class="product-bundle-card product-bundle-card1">
                    <p class="product-bundle1-badge mb-20px">{{get_phrase('Grooming Kit')}}</p>
                    <h3 class="product-bundle-title">{{get_phrase('Fresh & Clean Essentials')}}</h3>
                    <div class="product-bundle1-subtitles">
                        <p class="product-bundle-subtitle">{{get_phrase('Keep your pet looking and feeling their best with our all-in-one grooming bundle.')}}</p>
                        <p class="product-bundle-subtitle">{{get_phrase('Includes shampoo, brush, nail clippers, wipes, and a detangling.')}}</p>
                    </div>
                    <div class="pb-card-banner-wrap">
                        
                        <div class="pb-card-banner1 ms-auto">
                            <img class="banner" src="{{ asset('assets/frontend/pet/images/product-bundle-banner1.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="product-bundle-card product-bundle-card2">
                    <p class="product-bundle2-badge mb-20px">{{get_phrase('Stater Pack')}}</p>
                    <h3 class="product-bundle-title">{{get_phrase('Perfect for New Pet Parents')}}</h3>
                    <div class="product-bundle2-subtitles">
                        <p class="product-bundle-subtitle">{{get_phrase('Everything you need to welcome a new furry friend!')}}</p>
                        <p class="product-bundle-subtitle">{{get_phrase('This kit includes a feeding bowl, leash, toy, training pads, and food samples — ideal for puppies or kittens.')}}</p>
                    </div>
                    <div class="pb-card-banner-wrap">
                        
                        <div class="pb-card-banner2 ms-auto">
                            <img class="banner" src="{{ asset('assets/frontend/pet/images/product-bundle-banner2.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bundle & Save! Area End -->

<!-- Follow us on Instagram Area Start -->
<section class="section-mb insta-gallery-section">
    <div class="container">
        <div class="row insta-gallery-row mb-18px">
            <div class="col-xl-4 align-items-center wow animate__fadeInUp" data-wow-delay=".1s">
                <div class="insta-gallery-title-area">
                    <h2 class="insta-gallery-title section-title mb-14px">{{get_phrase('Follow us on')}} <span class="pt-text-skin">{{get_phrase('Instagram')}}</span></h2>
                    <p class="section-subtitle mb-30px">{{get_phrase('See how our products bring joy to pets everywhere!')}}</p>
                    <a href="#" class="btn pt-btn-skin px-3">{{get_phrase('Join Our Pet Community')}} 🐾</a>
                </div>
            </div>
            <div class="col-xl-8 wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="d-flex column-gap-14px row-gap-3 flex-wrap flex-md-nowrap justify-content-center">
                    <div class="insta-gallery1">
                        <img class="banner" src="{{ asset('assets/frontend/pet/images/insta-banner1.webp') }}" alt="instagram">
                    </div>
                    <div class="insta-gallery2">
                        <img class="banner" src="{{ asset('assets/frontend/pet/images/insta-banner2.webp') }}" alt="instagram">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex column-gap-14px row-gap-3 flex-wrap flex-xl-nowrap justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
                    <div class="d-flex column-gap-14px row-gap-3 flex-wrap flex-md-nowrap justify-content-center">
                        <div class="insta-gallery3">
                            <img class="banner" src="{{ asset('assets/frontend/pet/images/insta-banner3.webp') }}" alt="instagram">
                        </div>
                        <div class="insta-gallery4">
                            <img class="banner" src="{{ asset('assets/frontend/pet/images/insta-banner4.webp') }}" alt="instagram">
                        </div>
                    </div>
                    <div class="insta-gallery5">
                        <img class="banner" src="{{ asset('assets/frontend/pet/images/insta-banner5.webp') }}" alt="instagram">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Follow us on Instagram Area End -->

<!-- Blog Area Start -->
<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-section-title-area">
                    <h2 class="section-title mb-14px blog-section-title text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Smart Reads for Pet Parents')}}</h2>
                    <p class="section-subtitle blog-section-subtitle text-center mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Insights, fun stories, and how-tos for every pet parent.')}}</p>
                    <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                        <a href="{{route('blog')}}" class="btn pt-btn-skin">{{get_phrase('View All Blog Posts')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-20px gy-5 justify-content-center wow animate__fadeInUp" data-wow-delay=".4s">
            @foreach($blogs->take(2) as $key=>$blog)
            @php 
            
               $blogCategory = App\Models\Blog_category::where('id', $blog->blog_category_id)->first(); 
            @endphp
            <div class="col-lg-6 col-md-10">
                <div class="pt-blog-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-banner">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                        <h3 class="blog-number-badge">0{{++$key}}</h3>
                    </a>
                    <div>
                        <a href="javascript:;" class="blog-card-category">{{$blogCategory->title}}</a>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-title">{{ $blog->title }}</a>
                        <p class="blog-card-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 80, '...') }}</p>
                        <div class="d-flex align-items-center column-gap-4 row-gap-2 flex-wrap mb-30px">
                            <div class="blog-iconText">
                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="33" viewBox="0 0 31 33" fill="none">
                                    <path d="M20 4.7819V1.61523M20 4.7819V7.94857M20 4.7819H12.875M1 14.2819V28.5319C1 30.2809 2.41776 31.6986 4.16667 31.6986H26.3333C28.0823 31.6986 29.5 30.2809 29.5 28.5319V14.2819H1Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 14.2832V7.94987C1 6.20097 2.41776 4.7832 4.16667 4.7832H7.33333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.33301 1.61523V7.94857" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M29.5003 14.2832V7.94987C29.5003 6.20097 28.0826 4.7832 26.3337 4.7832H25.542" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text">{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                            
                        </div>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn ptb5-btn-skin">{{get_phrase('Read More')}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Area End -->


