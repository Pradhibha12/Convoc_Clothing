{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

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
                                <span class="builder-editable" builder-identity="PB1">{{get_phrase('Everything Your Pet Needs, All in One Place!')}}</span>
                            </h1>
                            <p class="banner-subtitle wow animate__fadeInUp builder-editable" builder-identity="PB2" data-wow-delay=".2s">{{get_phrase('From nutritious food to fun toys & grooming essentials  Get quality products for every pet')}}</p>
                            <div class="banner-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                                <a href="{{route('all_products')}}" class="btn ptb2-btn-skin builder-editable" builder-identity="PB7">{{get_phrase('Shop Now!')}}</a>
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
                                            <img class="banner builder-editable" builder-identity="PB3" src="{{ asset('assets/frontend/pet/images/banner-product1.webp') }}" alt="banner">
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
                                $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get();
                                
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
                        <p class="bs-customer-subtitle builder-editable" builder-identity="PB6">{{get_phrase('Satisfied Customers!')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->