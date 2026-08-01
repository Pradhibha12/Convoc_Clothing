{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Start Banner Area -->
    <section class="ca-banner-section">
        <div class="container">
            <div class="row g-4  justify-content-center">
                <div class="col-lg-12 col-xl-5">
                    <div class="banner-content-area">
                        <div class="banner-badge wow animate__fadeInUp" data-wow-delay=".1s">
                            <p class="builder-editable" builder-identity="CFB9">{{get_phrase('Drive in ')}} <span class="highlight">{{get_phrase('Style')}}</span></p>
                        </div>
                        <h1 class="banner-title wow animate__fadeInUp builder-editable" builder-identity="CFB1" data-wow-delay=".2s">{{get_phrase('Gear Up with the Best Car Accessories.')}}</h1>
                        <p class="banner-subtitle wow animate__fadeInUp builder-editable" builder-identity="CFB2" data-wow-delay=".3s">{{get_phrase('From sleek interiors to smart gadgets — everything your ride needs in one place.')}}</p>
                        <div class="d-flex align-items-center gap-12px flex-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn cab2-btn-skin">
                                <span class="builder-editable" builder-identity="CFB3">{{get_phrase('Shop Now')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                        <path d="M11 1C11 0.447715 10.5523 -3.74211e-07 10 4.72575e-08L1 -1.63477e-07C0.447715 -1.63477e-07 2.8711e-07 0.447715 2.8711e-07 1C2.8711e-07 1.55228 0.447715 2 1 2L9 2L9 10C9 10.5523 9.44772 11 10 11C10.5523 11 11 10.5523 11 10L11 1ZM1 10L1.70711 10.7071L10.7071 1.70711L10 1L9.29289 0.292893L0.292893 9.29289L1 10Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                            <a href="{{route('all_products')}}" class="btn cab2-btn-white">
                                <span class="builder-editable" builder-identity="CFB4">{{get_phrase('Explore All Ctagories')}}</span>
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
                                @php 
                                $reviews = App\Models\Review::where('rating', 5)->latest()->take(3)->get(); 
                                @endphp
                                @foreach($reviews as $review)
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
                            <h4 class="bn-overlay-title builder-editable" builder-identity="CFB50">{{get_phrase('Check Out Our Products!')}}</h4>
                            <a href="{{route('all_products')}}" class="bn-overlay-btn">
                                <span class="builder-editable" builder-identity="CFB5">{{get_phrase("Let's Get Started")}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
                                        <path d="M8.19493 0.049777L7.48023 0.764484L10.8518 4.13604H0.876953V5.13041H10.8518L7.48023 8.50197L8.19493 9.21667L12.421 4.99058L12.7628 4.63323L12.421 4.27587L8.19493 0.049777Z" fill="white"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <img class="banner builder-editable" builder-identity="CFB6" src="{{ asset('assets/frontend/car-dark/images/banner-group.webp ') }}" alt="banner">
                        <div class="ca-banner-car">
                            <img class="car builder-editable" builder-identity="CFB7" src="{{ asset('assets/frontend/car-dark/images/banner-car.webp') }}" alt="car">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->