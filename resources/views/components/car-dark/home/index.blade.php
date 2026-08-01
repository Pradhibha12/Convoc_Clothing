    <!-- Start Banner Area -->
    <section class="ca-banner-section">
        <div class="container">
            <div class="row g-4  justify-content-center">
                <div class="col-lg-12 col-xl-5">
                    <div class="banner-content-area">
                        <div class="banner-badge wow animate__fadeInUp" data-wow-delay=".1s">
                            <p>{{get_phrase('Drive in ')}} <span class="highlight">{{get_phrase('Style')}}</span></p>
                        </div>
                        <h1 class="banner-title wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Gear Up with the Best Car Accessories.')}}</h1>
                        <p class="banner-subtitle wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('From sleek interiors to smart gadgets — everything your ride needs in one place.')}}</p>
                        <div class="d-flex align-items-center gap-12px flex-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn cab2-btn-skin">
                                <span>{{get_phrase('Shop Now')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                        <path d="M11 1C11 0.447715 10.5523 -3.74211e-07 10 4.72575e-08L1 -1.63477e-07C0.447715 -1.63477e-07 2.8711e-07 0.447715 2.8711e-07 1C2.8711e-07 1.55228 0.447715 2 1 2L9 2L9 10C9 10.5523 9.44772 11 10 11C10.5523 11 11 10.5523 11 10L11 1ZM1 10L1.70711 10.7071L10.7071 1.70711L10 1L9.29289 0.292893L0.292893 9.29289L1 10Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                            <a href="{{route('all_products')}}" class="btn cab2-btn-white">
                                <span>{{get_phrase('Explore All Ctagories')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                        <path d="M11 1C11 0.447715 10.5523 -3.74211e-07 10 4.72575e-08L1 -1.63477e-07C0.447715 -1.63477e-07 2.8711e-07 0.447715 2.8711e-07 1C2.8711e-07 1.55228 0.447715 2 1 2L9 2L9 10C9 10.5523 9.44772 11 10 11C10.5523 11 11 10.5523 11 10L11 1ZM1 10L1.70711 10.7071L10.7071 1.70711L10 1L9.29289 0.292893L0.292893 9.29289L1 10Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <div class="ca-banner-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                        <div class="our-banner-testimonial">
                          @php
                                $reviewCount = App\Models\Product::avg('average_rating');
                                $reviewCount = round($reviewCount, 1); 

                                $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 

                                $fullStars   = floor($reviewCount); 
                                $halfStar    = ($reviewCount - $fullStars >= 0.5) ? 1 : 0; 
                                $emptyStars  = 5 - ($fullStars + $halfStar); 
                            @endphp

                            <h4 class="bn-testimonial-rating">
                                {{ number_format($reviewCount, 1) }}/{{ $totalRatings }}
                            </h4>

                                <p class="bn-testimonial-info">
                                    {{ get_phrase('Trusted by Thousands of Peoples by our Trusted E-commerce Platform!') }}
                                </p>

                                <div class="bn-testimonial-stars d-flex gap-1">
                                    {{-- Full stars --}}
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <path d="M18.1165 7.5772C18.1165 7.4514 18.0679 7.34562 17.9707 7.25985C17.8735 7.17408 17.7277 7.11975 17.5333 7.09688L12.2327 6.32495L9.84828 1.52181C9.77967 1.37314 9.70247 1.26164 9.6167 1.18731C9.53093 1.11297 9.43659 1.07581 9.33366 1.07581C9.23074 1.07581 9.13639 1.11297 9.05062 1.18731C8.96485 1.26164 8.88766 1.37314 8.81904 1.52181L6.43463 6.32495L1.13402 7.09688C0.939607 7.11975 0.793797 7.17408 0.696591 7.25985C0.599384 7.34562 0.550781 7.4514 0.550781 7.5772C0.550781 7.64581 0.573653 7.72301 0.619398 7.80878C0.665142 7.89455 0.72804 7.98318 0.808092 8.07466L4.6506 11.8142L3.74144 17.0977C3.74144 17.1434 3.73858 17.1863 3.73286 17.2264C3.72714 17.2664 3.72428 17.2921 3.72428 17.3036C3.72428 17.3836 3.73286 17.4551 3.75001 17.518C3.76717 17.5809 3.79862 17.6352 3.84436 17.6809C3.87867 17.7381 3.92441 17.7781 3.98159 17.801C4.03877 17.8239 4.10167 17.8353 4.17029 17.8353C4.2389 17.8353 4.30752 17.8239 4.37614 17.801C4.44475 17.7781 4.51909 17.7496 4.59914 17.7152L9.33366 15.2108L14.0682 17.7152C14.1482 17.7496 14.2226 17.7781 14.2912 17.801C14.3598 17.8239 14.4284 17.8353 14.497 17.8353C14.5657 17.8353 14.6257 17.8239 14.6772 17.801C14.7286 17.7781 14.7772 17.7381 14.823 17.6809C14.8573 17.6352 14.883 17.5809 14.9002 17.518C14.9173 17.4551 14.9259 17.3836 14.9259 17.3036V17.1835V17.0977L14.0167 11.8142L17.8421 8.07466C17.9336 7.98318 18.0022 7.8974 18.0479 7.81735C18.0937 7.7373 18.1165 7.65725 18.1165 7.5772Z" fill="#F0AD4E"/>
                                    </svg>
                                    @endfor

                                    {{-- Half star --}}
                                    @if ($halfStar)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19">
                                            <defs>
                                                <linearGradient id="half">
                                                    <stop offset="50%" stop-color="#F0AD4E"/>
                                                    <stop offset="50%" stop-color="#ccc"/>
                                                </linearGradient>
                                            </defs>
                                            <path d="M18.1165 7.5772C18.1165 7.4514 18.0679 7.34562 17.9707 7.25985C17.8735 7.17408 17.7277 7.11975 17.5333 7.09688L12.2327 6.32495L9.84828 1.52181C9.77967 1.37314 9.70247 1.26164 9.6167 1.18731C9.53093 1.11297 9.43659 1.07581 9.33366 1.07581C9.23074 1.07581 9.13639 1.11297 9.05062 1.18731C8.96485 1.26164 8.88766 1.37314 8.81904 1.52181L6.43463 6.32495L1.13402 7.09688C0.939607 7.11975 0.793797 7.17408 0.696591 7.25985C0.599384 7.34562 0.550781 7.4514 0.550781 7.5772C0.550781 7.64581 0.573653 7.72301 0.619398 7.80878C0.665142 7.89455 0.72804 7.98318 0.808092 8.07466L4.6506 11.8142L3.74144 17.0977C3.74144 17.1434 3.73858 17.1863 3.73286 17.2264C3.72714 17.2664 3.72428 17.2921 3.72428 17.3036C3.72428 17.3836 3.73286 17.4551 3.75001 17.518C3.76717 17.5809 3.79862 17.6352 3.84436 17.6809C3.87867 17.7381 3.92441 17.7781 3.98159 17.801C4.03877 17.8239 4.10167 17.8353 4.17029 17.8353C4.2389 17.8353 4.30752 17.8239 4.37614 17.801C4.44475 17.7781 4.51909 17.7496 4.59914 17.7152L9.33366 15.2108L14.0682 17.7152C14.1482 17.7496 14.2226 17.7781 14.2912 17.801C14.3598 17.8239 14.4284 17.8353 14.497 17.8353C14.5657 17.8353 14.6257 17.8239 14.6772 17.801C14.7286 17.7781 14.7772 17.7381 14.823 17.6809C14.8573 17.6352 14.883 17.5809 14.9002 17.518C14.9173 17.4551 14.9259 17.3836 14.9259 17.3036V17.1835V17.0977L14.0167 11.8142L17.8421 8.07466C17.9336 7.98318 18.0022 7.8974 18.0479 7.81735C18.0937 7.7373 18.1165 7.65725 18.1165 7.5772Z" fill="url(#half)"/>
                                        </svg>
                                    @endif

                                    {{-- Empty stars --}}
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <path d="M18.1165 7.5772C18.1165 7.4514 18.0679 7.34562 17.9707 7.25985C17.8735 7.17408 17.7277 7.11975 17.5333 7.09688L12.2327 6.32495L9.84828 1.52181C9.77967 1.37314 9.70247 1.26164 9.6167 1.18731C9.53093 1.11297 9.43659 1.07581 9.33366 1.07581C9.23074 1.07581 9.13639 1.11297 9.05062 1.18731C8.96485 1.26164 8.88766 1.37314 8.81904 1.52181L6.43463 6.32495L1.13402 7.09688C0.939607 7.11975 0.793797 7.17408 0.696591 7.25985C0.599384 7.34562 0.550781 7.4514 0.550781 7.5772C0.550781 7.64581 0.573653 7.72301 0.619398 7.80878C0.665142 7.89455 0.72804 7.98318 0.808092 8.07466L4.6506 11.8142L3.74144 17.0977C3.74144 17.1434 3.73858 17.1863 3.73286 17.2264C3.72714 17.2664 3.72428 17.2921 3.72428 17.3036C3.72428 17.3836 3.73286 17.4551 3.75001 17.518C3.76717 17.5809 3.79862 17.6352 3.84436 17.6809C3.87867 17.7381 3.92441 17.7781 3.98159 17.801C4.03877 17.8239 4.10167 17.8353 4.17029 17.8353C4.2389 17.8353 4.30752 17.8239 4.37614 17.801C4.44475 17.7781 4.51909 17.7496 4.59914 17.7152L9.33366 15.2108L14.0682 17.7152C14.1482 17.7496 14.2226 17.7781 14.2912 17.801C14.3598 17.8239 14.4284 17.8353 14.497 17.8353C14.5657 17.8353 14.6257 17.8239 14.6772 17.801C14.7286 17.7781 14.7772 17.7381 14.823 17.6809C14.8573 17.6352 14.883 17.5809 14.9002 17.518C14.9173 17.4551 14.9259 17.3836 14.9259 17.3036V17.1835V17.0977L14.0167 11.8142L17.8421 8.07466C17.9336 7.98318 18.0022 7.8974 18.0479 7.81735C18.0937 7.7373 18.1165 7.65725 18.1165 7.5772Z" fill="#D5CABA"/>
                                    </svg>
                                    @endfor
                                </div>

                        </div>
                        <div class="banner-overlay-wrap">
                            <div class="bn-overlay-users">
                                
                                @foreach($reviews->take(3) as $review)
                                <div class="bn-overlay-user">
                                    <img class="user" src="{{ get_image($review->user->photo) }}" alt="user">
                                </div>
                                @endforeach
                                <div class="bn-overlay-user-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                        <path d="M12.8264 5.09455V13.0235H4.89746V14.6093H12.8264V22.5383H14.4122V14.6093H22.3412V13.0235H14.4122V5.09455H12.8264Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            <h4 class="bn-overlay-title">{{get_phrase('Check Out Our Products!')}}</h4>
                            <a href="{{route('all_products')}}" class="bn-overlay-btn">
                                <span>{{get_phrase("Let's Get Started")}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
                                        <path d="M8.19493 0.049777L7.48023 0.764484L10.8518 4.13604H0.876953V5.13041H10.8518L7.48023 8.50197L8.19493 9.21667L12.421 4.99058L12.7628 4.63323L12.421 4.27587L8.19493 0.049777Z" fill="white"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <img class="banner" src="{{ asset('assets/frontend/car-dark/images/banner-group.webp ') }}" alt="banner">
                        <div class="ca-banner-car">
                            <img class="car" src="{{ asset('assets/frontend/car-dark/images/banner-car.webp') }}" alt="car">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Brand Area -->
    <section class="section-mb brand-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="brand-section-title wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Trusted by more than 50+ brands')}}</h4>
                      <div class="brand-items-wrap wow animate__fadeInUp" data-wow-delay=".2s">
                            @php 
                                $brands = App\Models\Brand::get();
                            @endphp
                              @foreach($brands as $brand)
                                <div class="brand-item">
                                    <img class="brand" src="{{ get_image($brand->logo) }}" alt="brand">
                                </div>
                            @endforeach
                      </div>
                 </div>
            </div>
        </div>
    </section>
    <!-- End Brand Area -->
     
    <!-- Start Category Area -->
   <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <h5 class="sm-title-badge min-w-140px mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Our Categories')}}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-32px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Upgrade Your Ride with Style & Tech')}}</h2>
                        <p class="section-subtitle text-center mb-40px max-w-505px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase(' From sleek interiors to safety must-haves — explore top categories tailored for every driver.')}}</p>
                        <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-skin">
                                <span>{{get_phrase('Explore All Catagories')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="category-section-main wow animate__fadeInUp" data-wow-delay=".5s">
            <div class="row g-0 justify-content-center">
                 @php
                     $categories = App\Models\Category::where('parent_id', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(4)->get();
                @endphp
                    @foreach($categories as $key => $category)
                        {{-- card --}}
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="category-card{{ $key+1 }}">
                                <h4 class="category-card-title {{ $key > 0 ? 'text-white' : '' }}">
                                    {{ $category->title }}
                                </h4>
                                <p class="category-card-subtitle {{ $key > 0 ? 'text-white' : '' }}">
                                    {{ \Illuminate\Support\Str::limit($category->description, 80, '...') }}
                                </p>
                                <a href="{{ route('products', get_category_params($category)) }}" class="btn ca-sm-btn-white">
                                    <span>{{get_phrase('Shop Now')}}</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <path d="M6.95406 0.97299C6.95406 0.640327 6.68438 0.370651 6.35172 0.370651L0.930664 0.370651C0.598001 0.370651 0.328325 0.640328 0.328325 0.97299C0.328325 1.30565 0.598001 1.57533 0.930664 1.57533L5.74938 1.57533L5.74938 6.39404C5.74938 6.72671 6.01905 6.99638 6.35172 6.99638C6.68438 6.99638 6.95406 6.72671 6.95406 6.39404L6.95406 0.97299ZM0.930664 6.39404L1.35658 6.81996L6.77763 1.39891L6.35172 0.97299L5.9258 0.547072L0.504746 5.96812L0.930664 6.39404Z" fill="black"/>
                                        </svg>
                                    </span>
                                </a>
                                <h3 class="card-number-shadow1">
                                    <span class="number-shadow number-shadow-{{ $key+1 }}">
                                        {{ str_pad($key+1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </h3>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="category-banner">
                                <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- End Category Area -->

    <!-- Start Top Products Area -->
    <section class="top-product-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tp-section-title-area">
                        <h5 class="sm-title-badge2 min-w-140px mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Top Products')}}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-15px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('our top picks flying off the shelves.')}}</h2>
                        <p class="section-subtitle text-center mb-32px max-w-784px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('From innovative tech to must-have accessories, these customer favorites are making drives smoother, safer, and more stylish. Don’t miss out — grab yours today!')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-white">
                                <span>{{get_phrase('Explore All Products')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-slide-area">
            <div class="top-product-wrapper">
                @php 
                   $topProducts = App\Models\Product::where('status', 1)->where('label', 'top-seller')->latest()->get(); 
                @endphp 

                <div class="top-profile-images wow animate__fadeInUp" data-wow-delay=".4s">
                     @foreach($topProducts  as $product)   
                        <div class="top-product-image">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="tp-content-wrap wow animate__fadeInUp" data-wow-delay=".5s">
                    @foreach($topProducts  as $product) 
                    <div class="tp-content-single">
                        <h4 class="top-product-title">{{$product->title}}</h4>
                        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-center mb-3">
                            <div class="tp-rating-wrap">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                        <path d="M10.0976 3.71266L11.3798 6.03138C11.5555 6.34966 11.9964 6.65201 12.359 6.69288L14.5173 6.96418C15.8992 7.13489 16.2556 8.11561 15.3151 9.14286L13.7128 10.8831C13.4454 11.1748 13.3065 11.7311 13.414 12.113L13.9754 14.1618C14.417 15.7794 13.5772 16.4499 12.1015 15.6553L10.0401 14.5452C9.66462 14.3423 9.06825 14.3718 8.71553 14.5997L6.75309 15.8699C5.34826 16.7778 4.45432 16.1801 4.76258 14.5332L5.15732 12.4489C5.23101 12.0593 5.05433 11.5156 4.76269 11.2481L3.01287 9.64328C1.99168 8.69933 2.26637 7.69325 3.62716 7.40802L5.75194 6.96419C6.11053 6.8863 6.52609 6.55759 6.67199 6.22314L7.76057 3.80283C8.3556 2.49882 9.40535 2.45773 10.0976 3.71266Z" fill="#FFBD39"/>
                                    </svg>
                                </span>
                                <p>{{ number_format($product->average_rating, 1) }}</p>
                            </div>
                        </div>
                        <div class="tp-price-buttons">
                            <span class="tp-tag-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 36 36" fill="none">
                                    <path d="M32.25 1.98633H22.6484C22.3499 1.98611 22.0634 2.10408 21.8516 2.31446L2.65625 21.5098C2.23595 21.9321 2 22.5037 2 23.0996C2 23.6955 2.23595 24.2671 2.65625 24.6895L11.7969 33.8301C12.2192 34.2504 12.7909 34.4863 13.3867 34.4863C13.9826 34.4863 14.5542 34.2504 14.9766 33.8301L34.1641 14.6426C34.3744 14.4307 34.4924 14.1443 34.4922 13.8457V4.23633C34.4936 3.94111 34.4367 3.64852 34.3246 3.3754C34.2125 3.10227 34.0476 2.85401 33.8392 2.64489C33.6308 2.43577 33.3831 2.26993 33.1104 2.15691C32.8376 2.04389 32.5452 1.98591 32.25 1.98633Z" stroke="#2B2B2B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="tp-price-line"></span>
                            @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                       <h3 class="tp-content-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h3>
                                    @else
                                       <h3 class="tp-content-price">{{ currency($product->price) }}</h3>
                                    @endif
                                @else
                                   <h3 class="tp-content-price">{{ currency($product->price) }}</h3>
                                @endif
                            <div class="d-flex align-items-center gap-10px flex-wrap justify-content-center">
                                <a href="javascript:;" class="btn cab3-btn-skin"  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                     @if ($product->is_cart_item)
                                        {{ strtoupper(get_phrase('Added To Cart')) }}
                                    @else
                                        {{ strtoupper(get_phrase('Add To Cart')) }}
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- End Top Products Area -->

    <!-- Start Seasonal Area -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="seasonal-section-title-area">
                        <h5 class="sm-title-badge3 min-w-140px mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Seasonal')}}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Summer Sale is Here!')}}</h2>
                        <p class="section-subtitle text-center mb-30px max-w-581px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('From innovative tech to must-have accessories, these customer favorites are making drives smoother, safer, and more stylish. Don’t miss out — grab yours today!')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-white">
                                <span>{{get_phrase('Explore All Products')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"/>
                                    </svg>
                                </span>
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
                              $allProducts = App\Models\Product::where('status', 1)->take(12)->latest()->get(); 
                            @endphp 
                            @foreach($allProducts as $product)
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="pc-banner-wrap">
                                        <a href="javascript:;"  class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                            <span class="pc-bookmark-inner" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                                <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.1875 0.0625C16.712 0.0642369 18.173 0.671065 19.251 1.74902C20.3289 2.82698 20.9358 4.28804 20.9375 5.8125C20.9375 9.0645 18.5245 12.0173 16.042 14.1914C13.5638 16.3617 11.0331 17.741 10.8262 17.8506V17.8516C10.7261 17.9054 10.6137 17.9336 10.5 17.9336C10.3863 17.9336 10.2739 17.9054 10.1738 17.8516V17.8506C9.96691 17.741 7.4362 16.3617 4.95801 14.1914C2.47546 12.0173 0.0625 9.0645 0.0625 5.8125L0.0703125 5.52734C0.142344 4.10677 0.738475 2.75957 1.74902 1.74902C2.75957 0.738475 4.10677 0.142344 5.52734 0.0703125L5.8125 0.0625C7.73017 0.0625 9.40625 0.886962 10.4502 2.27734L10.5 2.34375L10.5498 2.27734C11.5937 0.886962 13.2698 0.0625 15.1875 0.0625Z" fill="#ffffff" stroke="#5A5A5A" stroke-width="0.125"/>
                                                </svg>
                                            </span>
                                        </a>
                                        
                                        <a href="{{ route('product', $product->slug) }}" class="product-card-banner">
                                            @php
                                                $thumbnails = json_decode($product->thumbnail, true);
                                                $firstImage = $thumbnails[0] ?? null;
                                            @endphp
                                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                        </a>
                                        
                                    </div>
                                    <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 20, '...') }}</a>
                                    <div class="d-flex align-items-center justify-content-between column-gap-3 row-gap-2 flex-wrap mb-18px">
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
                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                            <div class="pc-rating-wrap">
                                                <span class="pc-rating-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                        <path d="M6.28556 2.4889L7.04391 3.86029C7.14782 4.04853 7.40859 4.22735 7.62304 4.25152L8.89955 4.41198C9.71685 4.51294 9.92762 5.09298 9.3714 5.70054L8.42375 6.7298C8.26556 6.90229 8.18344 7.23134 8.24701 7.45719L8.57904 8.66895C8.84021 9.62566 8.34355 10.0222 7.47076 9.55227L6.25153 8.89571C6.02947 8.77568 5.67676 8.79315 5.46815 8.92791L4.30748 9.67917C3.47661 10.2162 2.9479 9.86264 3.13022 8.88858L3.36368 7.65585C3.40727 7.42542 3.30277 7.10386 3.13028 6.94566L2.09537 5.9965C1.4914 5.43821 1.65386 4.84318 2.45868 4.67448L3.71536 4.41199C3.92745 4.36592 4.17323 4.1715 4.25952 3.9737L4.90335 2.54223C5.25527 1.77099 5.87613 1.74669 6.28556 2.4889Z" fill="#D2F90B"/>
                                                    </svg>
                                                </span>
                                                <p>{{ number_format($product->average_rating, 1) }}</p>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="d-flex gap-6px align-items-center justify-content-between">
                                        <a href="{{ route('product', $product->slug) }}" class="pc-details-btn">{{get_phrase('View details')}}</a>
                                        <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal"  class="pc-cart-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                <path d="M7.80078 16.7002C8.30466 16.7003 8.78824 16.9006 9.14453 17.2568C9.50057 17.613 9.70107 18.096 9.70117 18.5996C9.70117 19.1034 9.50073 19.5871 9.14453 19.9434C8.78824 20.2996 8.30466 20.4999 7.80078 20.5C7.29681 20.5 6.81338 20.2997 6.45703 19.9434C6.10069 19.587 5.90039 19.1035 5.90039 18.5996C5.90049 18.0959 6.10084 17.6131 6.45703 17.2568C6.81338 16.9005 7.29681 16.7002 7.80078 16.7002ZM16.2012 16.7002C16.7051 16.7002 17.1886 16.9005 17.5449 17.2568C17.901 17.613 18.1015 18.096 18.1016 18.5996C18.1016 19.1034 17.9012 19.5871 17.5449 19.9434C17.1886 20.2997 16.7051 20.5 16.2012 20.5C15.6972 20.5 15.2138 20.2997 14.8574 19.9434C14.5011 19.587 14.3008 19.1035 14.3008 18.5996C14.3009 18.0959 14.5013 17.613 14.8574 17.2568C15.2138 16.9005 15.6972 16.7002 16.2012 16.7002ZM7.80078 17.5C7.50904 17.5 7.22876 17.616 7.02246 17.8223C6.81636 18.0284 6.7003 18.3081 6.7002 18.5996C6.7002 18.8913 6.8162 19.1716 7.02246 19.3779C7.22876 19.5842 7.50905 19.7002 7.80078 19.7002C8.09235 19.7001 8.3719 19.5841 8.57812 19.3779C8.78443 19.1716 8.90039 18.8914 8.90039 18.5996C8.90029 18.308 8.78434 18.0285 8.57812 17.8223C8.37189 17.6161 8.0924 17.5001 7.80078 17.5ZM16.2012 17.5C15.9094 17.5 15.6291 17.616 15.4229 17.8223C15.2168 18.0284 15.1017 18.3081 15.1016 18.5996C15.1016 18.8913 15.2167 19.1717 15.4229 19.3779C15.6292 19.5842 15.9094 19.7002 16.2012 19.7002C16.4928 19.7002 16.7722 19.584 16.9785 19.3779C17.1848 19.1716 17.3008 18.8914 17.3008 18.5996C17.3007 18.308 17.1847 18.0285 16.9785 17.8223C16.7722 17.6161 16.4928 17.5 16.2012 17.5ZM0.900391 0.5H1.56934C2.33161 0.5 2.8491 0.939206 3.20312 1.48145L3.3457 1.71973C3.57996 2.14718 3.75568 2.65711 3.90039 3.14648L4.01562 3.53516L4.41992 3.50293L4.50098 3.5H19.499C20.1216 3.50004 20.5821 4.05807 20.4873 4.6543L20.4609 4.77441L18.2666 12.4648C18.0997 13.0501 17.7465 13.5659 17.2607 13.9326C16.775 14.2991 16.1827 14.4979 15.5742 14.498H8.43652C7.82302 14.4981 7.22615 14.2958 6.73828 13.9238C6.31157 13.5984 5.98849 13.1584 5.80566 12.6572L5.73633 12.4385L4.82422 9.1123L4.82129 9.10254L3.32031 4.04004L3.31055 4.00488C3.12857 3.34353 2.93777 2.64146 2.6416 2.10352C2.49941 1.84222 2.3461 1.63727 2.16211 1.49902C1.9596 1.3469 1.75454 1.29987 1.57129 1.2998H0.900391C0.794276 1.2998 0.692211 1.25764 0.617188 1.18262C0.542316 1.1077 0.500103 1.00628 0.5 0.900391C0.5 0.794315 0.542165 0.692205 0.617188 0.617188C0.673369 0.561011 0.74452 0.523228 0.821289 0.507812L0.900391 0.5ZM4.42285 4.94238L5.5918 8.88672L5.60449 8.93555L5.60547 8.94043L6.50684 12.2266L6.50781 12.2285C6.74764 13.0943 7.53525 13.6972 8.43652 13.6973H15.5742C16.009 13.6973 16.4323 13.5558 16.7793 13.2939C17.1263 13.0321 17.3787 12.6641 17.498 12.2461L19.583 4.9375L19.7646 4.2998H4.23242L4.42285 4.94238Z" fill="white" stroke="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="product-slider-nav">
                            <div class="swiper-button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <path d="M14.8242 4.84668C14.919 4.75202 15.082 4.75197 15.1768 4.84668C15.2713 4.94141 15.2714 5.10451 15.1768 5.19922L8.65625 11.7197C7.98157 12.3949 7.98158 13.4909 8.65625 14.166L15.1768 20.6865C15.2697 20.7796 15.2704 20.9378 15.1807 21.0332C15.1152 21.0912 15.048 21.1133 15 21.1133C14.9356 21.1132 14.8754 21.0902 14.8242 21.0391L8.30371 14.5195C7.43897 13.6548 7.43897 12.2309 8.30371 11.3662L14.8242 4.84668Z" stroke="black"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <path d="M8.91016 20.8629L15.4302 14.3429C16.2002 13.5729 16.2002 12.3129 15.4302 11.5429L8.91016 5.02295" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Seasonal Area -->

    <!-- Start Our Features Area -->
    <section class="our-features-section section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h5 class="sm-title-badge2 mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Our Features')}}</h5>
                        <div class="features-section-title-wrap">
                            <div class="fs-title-left">
                                <h2 class="section-title wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Customize Your Ride make it yourself')}}</h2>
                            </div>
                            <div class="fs-title-right">
                                <p class="section-subtitle mb-30px wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Your car is more than just transportation—it’s your space, your style, and your statement. That’s why we make it easy to personalize every ride with accessories that combine form, function, and flair.')}}</p>
                                <a href="{{route('all_products')}}" class="btn ca-btn-skin wow animate__fadeInUp" data-wow-delay=".4s">
                                    <span>{{get_phrase('Our Features')}}</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                            <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="featured-banner wow animate__fadeInLeft" data-wow-delay=".3s">
                        <img class="banner" src="{{ asset('assets/frontend/car-dark/images/featured-banner.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="ms-lg-4 mt-3 mt-lg-0 wow animate__fadeInUp" data-wow-delay=".4s">
                        <div class="feature-item-wrap">
                            <div class="feature-single">
                                <div class="d-flex align-items-center gap-3 mb-18px">
                                    <div class="skin-icon-box">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.1094 24.2578H15.8906V20.0391H20.1094V24.2578Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.7812 7.38281L18 15.8203" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22.2188 7.38281L15.8906 20.0391L9.5625 7.38281" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.1094 20.0391L26.4375 7.38281" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <mask id="mask0_69_2957" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36">
                                            <path d="M0 -3.8147e-06H36V36H0V-3.8147e-06Z" fill="white"/>
                                            </mask>
                                            <g mask="url(#mask0_69_2957)">
                                            <path d="M15.8906 34.9453V24.2578" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.1094 24.2578V34.9453" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.7266 7.38281C10.9791 7.38281 9.5625 5.96623 9.5625 4.21875C9.5625 2.47127 10.9791 1.05469 12.7266 1.05469H23.2734C25.0209 1.05469 26.4375 2.47127 26.4375 4.21875C26.4375 5.96623 25.0209 7.38281 23.2734 7.38281" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.1094 30.6465C25.1288 30.2614 28.0558 28.6172 29.6016 28.6172C31.3523 28.6172 32.7656 30.0305 32.7656 31.7812C32.7656 33.532 31.3523 34.9453 29.6016 34.9453H6.39844C4.64766 34.9453 3.23438 33.532 3.23438 31.7812C3.23438 30.0305 4.64766 28.6172 6.39844 28.6172C7.94419 28.6172 10.8712 30.2614 15.8906 30.6465" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M27.7586 28.9995C29.1974 21.8224 30.6563 17.9739 30.6563 11.6005C30.6563 9.2706 28.7675 7.38179 26.4375 7.38179H9.5625C7.23256 7.38179 5.34375 9.2706 5.34375 11.6005C5.34375 16.9707 6.27328 20.1427 8.24147 28.9995" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
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
                                            <path d="M9.83789 16.7589H3.44126C2.17439 16.7589 1.14746 15.7169 1.14746 14.4314V6.67279C1.14746 5.38727 2.17439 4.34521 3.44126 4.34521H9.91596" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M29.2607 4.34521H35.7062C36.973 4.34521 38 5.38727 38 6.67279V14.4314C38 15.7169 36.973 16.7589 35.7062 16.7589H29.2802" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M30.5849 10.4463V10.6562C30.5849 13.0244 29.9506 15.3481 28.7499 17.3788H10.3995C9.19876 15.3481 8.56445 13.0244 8.56445 10.6562V10.4463C8.56445 8.07805 9.19876 5.75436 10.3995 3.72363H28.7499C29.9506 5.75436 30.5849 8.07805 30.5849 10.4463Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M19.5737 13.0343C20.925 13.0343 22.0204 11.9228 22.0204 10.5516C22.0204 9.18041 20.925 8.06885 19.5737 8.06885C18.2224 8.06885 17.127 9.18041 17.127 10.5516C17.127 11.9228 18.2224 13.0343 19.5737 13.0343Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M23.3978 22.3444H15.7518C14.4849 22.3444 13.458 21.3023 13.458 20.0168V17.3789H25.6916V20.0168C25.6916 21.3023 24.6647 22.3444 23.3978 22.3444Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22.0204 22.3447H17.127V27.3102H22.0204V22.3447Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M28.4435 36.0001H10.7048C8.17113 36.0001 6.11719 33.916 6.11719 31.345V27.3105H33.0311V31.345C33.0311 33.916 30.9771 36.0001 28.4435 36.0001Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
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
                                            <mask id="mask0_69_3057" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36">
                                            <path d="M0 0H36V36H0V0Z" fill="white"/>
                                            </mask>
                                            <g mask="url(#mask0_69_3057)">
                                            <path d="M12.6624 32.9234L11.4641 34.1215C10.3657 35.2198 8.56834 35.22 7.46999 34.1215L1.87853 28.5299C0.779968 27.4315 0.780179 25.6343 1.87853 24.5358L3.07666 23.3377" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M23.3379 3.07655L24.536 1.87835C25.6344 0.779998 27.4315 0.779998 28.53 1.87835L34.1218 7.46995C35.2201 8.5683 35.2201 10.3656 34.1218 11.4641L32.9232 12.6621" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M32.524 12.2631C33.6224 13.3614 33.6224 15.1588 32.5238 16.2572L16.257 32.5239C15.1588 33.6223 13.3616 33.6223 12.2632 32.5238L3.47611 23.7371C2.37776 22.6387 2.37776 20.8413 3.47611 19.743L19.7432 3.47606C20.8413 2.37771 22.6388 2.37771 23.7371 3.47606L32.524 12.2631Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.86914 21.7393L21.7395 7.86871" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.0645 24.9346L24.9349 11.064" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.2598 28.1299L28.1304 14.2595" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
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

    <!-- Start  How-To Area -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row gy-5 gx-4 gx-lg-5 align-items-center justify-content-center">
                <div class="col-md-10 col-lg-7 col-xl-6">
                    <div class="how-to-banner me-lg-2 wow animate__fadeInLeft" data-wow-delay=".1s">
                        <img class="banner" src="{{ asset('assets/frontend/car-dark/images/how-to-banner.webp') }}" alt="banner">
                    </div>
                </div>
                <div class="col-md-12 col-lg-10 col-xl-6">
                    <div>
                        <h5 class="sm-title-badge3 mb-40px wow animate__fadeInUp" data-wow-delay=".1s"> {{get_phrase('How-To')}}</h5>
                        <h2 class="section-title mb-40px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Your Go-To Hub for Car Hacks, How-Tos & Pro Tip')}}</h2>
                        <p class="section-subtitle mb-26px wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase("Whether you're a car enthusiast or just looking to level up your ride, our step-by-step tutorials make it easy to install, upgrade, and maintain your car accessories like a pro.")}}</p>
                        <div class="d-flex flex-wrap gap-3 mb-5 wow animate__fadeInUp" data-wow-delay=".4s">
                            <div class="how-to-item">
                                <div class="skin-icon-box2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_78_1417)">
                                            <path d="M12.4207 23.5107C12.0485 23.5139 11.6827 23.4139 11.3639 23.2219L7.37934 20.8916C5.88767 20.0574 4.64266 18.8441 3.77013 17.3745C2.89759 15.905 2.42847 14.2311 2.41016 12.5221V6.1547C2.41033 5.72562 2.54191 5.30689 2.78718 4.95482C3.03245 4.60276 3.37966 4.33425 3.7821 4.18541L11.6987 1.27742C12.1649 1.10675 12.6765 1.10675 13.1428 1.27742L21.0594 4.18541C21.4618 4.33425 21.809 4.60276 22.0543 4.95482C22.2996 5.30689 22.4311 5.72562 22.4313 6.1547V12.5221C22.413 14.2311 21.9439 15.905 21.0713 17.3745C20.1988 18.8441 18.9538 20.0574 17.4621 20.8916L13.4776 23.2219C13.1587 23.4139 12.7929 23.5139 12.4207 23.5107ZM12.4207 2.79378C12.3686 2.78429 12.3153 2.78429 12.2632 2.79378L4.34663 5.71489C4.25746 5.74792 4.18094 5.80817 4.12792 5.88711C4.0749 5.96604 4.04807 6.05967 4.05123 6.1547V12.5221C4.07027 13.9441 4.46456 15.3359 5.19421 16.5565C5.92386 17.7772 6.96298 18.7836 8.20644 19.4737L12.191 21.8106C12.2614 21.8491 12.3404 21.8693 12.4207 21.8693C12.501 21.8693 12.58 21.8491 12.6505 21.8106L16.635 19.4737C17.8785 18.7836 18.9176 17.7772 19.6473 16.5565C20.3769 15.3359 20.7712 13.9441 20.7902 12.5221V6.1547C20.7906 6.06189 20.7625 5.97118 20.7097 5.89486C20.6569 5.81855 20.5819 5.76031 20.4948 5.72802L12.5783 2.82003C12.5278 2.80174 12.4744 2.79284 12.4207 2.79378Z" fill="#2B2B2B"/>
                                            <path d="M11.699 15.5746C11.5053 15.5733 11.3177 15.5062 11.1673 15.3842L8.36429 13.021C8.19716 12.8809 8.09255 12.6801 8.07347 12.4628C8.05439 12.2455 8.1224 12.0296 8.26255 11.8624C8.4027 11.6953 8.6035 11.5907 8.82078 11.5716C9.03806 11.5525 9.25402 11.6205 9.42115 11.7607L11.6202 13.6118L15.375 9.47631C15.5212 9.3144 15.7258 9.21722 15.9437 9.20614C16.1616 9.19506 16.375 9.27099 16.5369 9.41723C16.6988 9.56348 16.796 9.76805 16.807 9.98594C16.8181 10.2038 16.7422 10.4172 16.5959 10.5791L12.3423 15.3054C12.2608 15.3941 12.1612 15.464 12.0501 15.5105C11.9391 15.5569 11.8193 15.5788 11.699 15.5746Z" fill="#2B2B2B"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_78_1417">
                                            <rect width="22.9751" height="22.9751" fill="white" transform="translate(0.932617 0.90332)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Premium Products Only')}}</p>
                            </div>
                            <div class="how-to-item">
                                <div class="skin-icon-box2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_78_1410)">
                                            <path d="M20.4328 7.16888V17.6121C20.4328 21.7894 19.3885 22.8337 15.2112 22.8337H8.94524C4.76795 22.8337 3.72363 21.7894 3.72363 17.6121V7.16888C3.72363 2.99159 4.76795 1.94727 8.94524 1.94727H15.2112C19.3885 1.94727 20.4328 2.99159 20.4328 7.16888Z" stroke="#2B2B2B" stroke-width="1.56648" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.1675 5.60254H9.99023" stroke="#2B2B2B" stroke-width="1.56648" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.0787 19.8058C12.9726 19.8058 13.6974 19.081 13.6974 18.1871C13.6974 17.2931 12.9726 16.5684 12.0787 16.5684C11.1847 16.5684 10.46 17.2931 10.46 18.1871C10.46 19.081 11.1847 19.8058 12.0787 19.8058Z" stroke="#2B2B2B" stroke-width="1.56648" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_78_1410">
                                            <rect width="22.9751" height="22.9751" fill="white" transform="translate(0.59082 0.90332)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Wide Selection')}}</p>
                            </div>
                            <div class="how-to-item">
                                <div class="skin-icon-box2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_78_1424)">
                                            <path d="M1.98411 10.8805C1.94016 10.8806 1.89627 10.8773 1.85283 10.8706C1.63787 10.8366 1.44523 10.7186 1.31722 10.5426C1.18922 10.3666 1.13631 10.1469 1.17014 9.93194C1.55189 7.49324 2.71884 5.24568 4.49388 3.53039C6.26892 1.81511 8.55511 0.72577 11.0054 0.42772C13.4558 0.129671 15.9364 0.639188 18.0709 1.87893C20.2054 3.11868 21.8771 5.02096 22.8324 7.29702C22.8817 7.39733 22.9099 7.50665 22.9155 7.61827C22.921 7.7299 22.9037 7.84148 22.8646 7.94617C22.8254 8.05087 22.7653 8.14646 22.688 8.2271C22.6106 8.30774 22.5175 8.37171 22.4145 8.41511C22.3115 8.4585 22.2008 8.48039 22.089 8.47945C21.9772 8.4785 21.8668 8.45473 21.7646 8.4096C21.6624 8.36446 21.5704 8.29892 21.4944 8.21698C21.4184 8.13505 21.3599 8.03845 21.3226 7.9331C20.506 5.98578 19.0763 4.35808 17.2506 3.29717C15.4249 2.23626 13.3028 1.80009 11.2067 2.05488C9.11049 2.30967 7.15471 3.2415 5.63629 4.7089C4.11787 6.17629 3.11976 8.09908 2.79349 10.1853C2.7636 10.3787 2.66562 10.5549 2.51721 10.6824C2.3688 10.8099 2.17974 10.8801 1.98411 10.8805Z" fill="#2B2B2B"/>
                                            <path d="M22.8758 8.86489H22.8692L16.4257 8.81566C16.208 8.81479 15.9997 8.72751 15.8464 8.57301C15.6931 8.41851 15.6075 8.20946 15.6084 7.99184C15.6093 7.77422 15.6966 7.56586 15.8511 7.41259C16.0056 7.25933 16.2146 7.17371 16.4322 7.17458H16.4388L22.0631 7.21725L22.1058 1.59295C22.1073 1.3767 22.1942 1.1698 22.3475 1.01725C22.5008 0.864701 22.7081 0.778834 22.9243 0.77832H22.9302C23.1479 0.780055 23.356 0.86815 23.5088 1.02324C23.6615 1.17834 23.7464 1.38774 23.7449 1.60542L23.6963 8.05026C23.6946 8.26681 23.6074 8.4739 23.4537 8.62647C23.3 8.77903 23.0923 8.86473 22.8758 8.86489Z" fill="#2B2B2B"/>
                                            <path d="M12.4662 22.7332C10.2329 22.7295 8.05009 22.068 6.19047 20.8312C4.33085 19.5944 2.8768 17.8372 2.00991 15.779C1.96061 15.6787 1.93233 15.5693 1.92679 15.4577C1.92125 15.3461 1.93857 15.2345 1.9777 15.1298C2.01682 15.0251 2.07692 14.9295 2.15431 14.8489C2.2317 14.7683 2.32475 14.7043 2.42774 14.6609C2.53074 14.6175 2.64151 14.5956 2.75327 14.5965C2.86503 14.5975 2.97542 14.6213 3.07767 14.6664C3.17992 14.7115 3.27186 14.7771 3.34787 14.859C3.42389 14.9409 3.48236 15.0375 3.5197 15.1429C4.33728 17.0888 5.76725 18.7149 7.59265 19.7745C9.41805 20.8342 11.5393 21.2695 13.6345 21.0145C15.7297 20.7595 17.6845 19.8281 19.2025 18.3615C20.7204 16.8949 21.7186 14.9732 22.0455 12.888C22.0623 12.7816 22.0999 12.6795 22.1562 12.5876C22.2125 12.4956 22.2863 12.4157 22.3735 12.3523C22.5495 12.2243 22.7692 12.1714 22.9842 12.2054C23.0907 12.2222 23.1928 12.2598 23.2847 12.3161C23.3766 12.3723 23.4566 12.4462 23.52 12.5333C23.5833 12.6205 23.6289 12.7193 23.6542 12.8241C23.6794 12.9289 23.6837 13.0376 23.6669 13.1441C23.2446 15.813 21.8852 18.2441 19.8325 20.0014C17.7799 21.7587 15.1683 22.7272 12.4662 22.7332Z" fill="#2B2B2B"/>
                                            <path d="M1.9192 22.2946H1.91329C1.80548 22.2938 1.69888 22.2718 1.59958 22.2298C1.50028 22.1878 1.41023 22.1267 1.33457 22.0499C1.25892 21.9731 1.19914 21.8821 1.15866 21.7822C1.11818 21.6822 1.09779 21.5753 1.09866 21.4675L1.14789 15.0227C1.14963 14.8051 1.23763 14.5971 1.39258 14.4444C1.54754 14.2916 1.75677 14.2066 1.97434 14.208L8.41983 14.2579C8.63745 14.2588 8.84582 14.3461 8.99908 14.5006C9.15235 14.6551 9.23796 14.8641 9.23709 15.0817C9.23622 15.2994 9.14894 15.5077 8.99444 15.661C8.83994 15.8142 8.63089 15.8999 8.41327 15.899H8.40671L2.7824 15.8557L2.73974 21.48C2.73801 21.6965 2.65081 21.9036 2.49714 22.0562C2.34346 22.2087 2.13575 22.2944 1.9192 22.2946Z" fill="#2B2B2B"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_78_1424">
                                            <rect width="22.9751" height="22.9751" fill="white" transform="translate(0.932617 0.0488281)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Affordable Prices')}}</p>
                            </div>
                            <div class="how-to-item">
                                <div class="skin-icon-box2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_78_1432)">
                                            <path d="M9.92594 19.1961C9.92535 18.617 10.1158 18.0539 10.4677 17.594C10.8197 17.1341 11.3135 16.8032 11.8726 16.6525C12.4318 16.5017 13.025 16.5397 13.5604 16.7603C14.0958 16.981 14.5435 17.3721 14.834 17.8731C16.8347 16.9905 17.5843 15.6053 17.5843 12.9727V10.1008C17.5843 6.27929 15.4294 3.63907 12.0799 3.63907C8.73028 3.63907 6.57541 6.28025 6.57541 10.1008V13.4513C6.57515 13.6417 6.49943 13.8242 6.36484 13.9587C6.23025 14.0933 6.04778 14.1691 5.85744 14.1693H4.90014C4.20234 14.1686 3.53332 13.8911 3.03982 13.3978C2.54631 12.9044 2.26859 12.2355 2.26758 11.5377L2.26758 10.5804C2.26834 9.88236 2.54591 9.2131 3.03942 8.71941C3.53293 8.22573 4.20209 7.94791 4.90014 7.9469H5.35773C6.0824 4.5284 8.56275 2.20312 12.0799 2.20312C15.597 2.20312 18.0764 4.5284 18.801 7.9469H19.2586C19.9565 7.94791 20.6255 8.22559 21.119 8.71908C21.6125 9.21256 21.8902 9.88157 21.8912 10.5795V11.5368C21.8904 12.2347 21.6128 12.9039 21.1193 13.3974C20.6257 13.891 19.9566 14.1686 19.2586 14.1693H18.9628C18.9259 15.3031 18.5455 16.399 17.8719 17.3119C17.1984 18.2247 16.2635 18.9115 15.1911 19.2813C15.1798 19.9795 14.8916 20.6446 14.3899 21.1303C13.8882 21.616 13.2141 21.8825 12.5159 21.8712C11.8177 21.8599 11.1526 21.5717 10.6669 21.0701C10.1812 20.5684 9.91464 19.8943 9.92594 19.1961ZM11.3619 19.1961C11.3619 19.4327 11.4321 19.6641 11.5636 19.8609C11.695 20.0577 11.8819 20.211 12.1006 20.3016C12.3192 20.3922 12.5598 20.4159 12.792 20.3697C13.0241 20.3235 13.2373 20.2096 13.4046 20.0422C13.572 19.8749 13.686 19.6616 13.7321 19.4295C13.7783 19.1974 13.7546 18.9568 13.664 18.7381C13.5735 18.5195 13.4201 18.3326 13.2233 18.2011C13.0265 18.0696 12.7952 17.9995 12.5585 17.9995C12.2412 17.9997 11.937 18.1259 11.7126 18.3502C11.4883 18.5746 11.3621 18.8788 11.3619 19.1961ZM19.0202 12.7343H19.2586C19.5761 12.7343 19.8805 12.6083 20.1051 12.3839C20.3297 12.1595 20.4559 11.8552 20.4562 11.5377V10.5804C20.4562 10.263 20.3302 9.9585 20.1058 9.73394C19.8814 9.50938 19.577 9.38309 19.2596 9.38284H19.0202V12.7343ZM3.70352 10.5804V11.5377C3.70403 11.8548 3.83029 12.1588 4.05462 12.383C4.27895 12.6071 4.58302 12.7331 4.90014 12.7334H5.13946V9.38284H4.90014C4.58269 9.38309 4.27833 9.50938 4.05394 9.73394C3.82956 9.9585 3.70352 10.263 3.70352 10.5804Z" fill="#2B2B2B"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_78_1432">
                                            <rect width="22.9751" height="22.9751" fill="white" transform="translate(0.59082 0.0488281)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Customer-First Support')}}</p>
                            </div>
                        </div>
                        <a href="{{route('all_products')}}" class="btn ca-btn-skin wow animate__fadeInUp" data-wow-delay=".5s">
                            <span>{{get_phrase('Get Started')}}</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                    <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  How-To Area -->

    <!-- Start  Why Choose Area -->
    <section class="why-choose-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wc-section-title-area">
                        <h5 class="sm-title-badge2 min-w-140px mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Why Choose Us?')}}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-4 wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Driven by Quality. Trusted by Drivers.')}}</h2>
                        <p class="section-subtitle text-center mb-40px max-w-636px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('we’re not just about selling car accessories — we’re about upgrading your driving experience. Every product we offer is handpicked for performance, durability, and style.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-white">
                                <span>{{get_phrase('Explore All Products')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wow animate__fadeInUp" data-wow-delay=".5s">
            <div class="why-choose-slider-wrap1">
                <!-- Swiper -->
                <div class="swiper why-choose-slider1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('1000+ Happy Customers')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Premium-Quality Products Only')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Fast, Reliable Shipping')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Easy Returns & Secure Checkout')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Expert Support Anytime')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Secure Ecommerce')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="why-choose-slider-wrap2">
                <!-- Swiper -->
                <div class="swiper why-choose-slider2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('1000+ Happy Customers')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Premium-Quality Products Only')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Fast, Reliable Shipping')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Easy Returns & Secure Checkout')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Expert Support Anytime')}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="why-choose-slide">
                                <div class="skin-icon-box3">
                                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1.05664V2.55045" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.71875 1.75098L8.77503 2.80725" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.2256 2.80725L18.2819 1.75098" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.0251 17.4882C6.62978 17.4882 6.24975 17.3314 5.96892 17.0506L1.43765 12.5193C0.854116 11.9358 0.854116 10.9905 1.43765 10.407C2.02119 9.82346 2.96648 9.82346 3.55002 10.407L6.92446 13.7814L13.3469 6.07528C13.8742 5.44215 14.8151 5.3561 15.4505 5.88417C16.0843 6.41223 16.1696 7.35393 15.6416 7.98776L8.17245 16.9507C7.90401 17.2731 7.51233 17.4678 7.09292 17.4868C7.07031 17.4875 7.0477 17.4882 7.0251 17.4882Z" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.1196 11.0139L15.8871 13.7814L22.3593 6.02547C22.8867 5.39234 23.8276 5.3063 24.4629 5.83436C25.0968 6.36243 25.1821 7.30413 24.654 7.93795L17.1351 16.9506C16.8667 17.2731 16.475 17.4678 16.0556 17.4868C16.033 17.4875 16.0104 17.4882 15.9878 17.4882C15.5925 17.4882 15.2124 17.3314 14.9316 17.0506L11.1992 13.3182" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <p>{{get_phrase('Secure Ecommerce')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  Why Choose Area -->

    <!-- Start Testimonial Area -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testi-section-title-area">
                        <h5 class="sm-title-badge3 mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Testimonials')}}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-30px wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Summer Sale is Here!')}}</h2>
                        <p class="section-subtitle text-center mb-30px max-w-581px mx-auto wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('From innovative tech to must-have accessories, these customer favorites are making drives smoother, safer, and more stylish. Don’t miss out — grab yours today!')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-white">
                                <span>{{get_phrase('Explore All Products')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
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
                                                                <stop stop-color="#FFC400"/>
                                                                <stop offset="1" stop-color="#FF9F00"/>
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