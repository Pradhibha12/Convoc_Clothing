{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Category Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-title-area">
                        <div class="wch-section-badge mb-30px justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <img class="badge-shape-left" src="{{ asset('assets/frontend/watch-dark/images/badge-shape-left.svg') }}" alt="shape">
                            <p class="builder-editable" builder-identity="WAC1">{{get_phrase('Our Categories')}}</p>
                            <img class="badge-shape-right" src="{{ asset('assets/frontend/watch-dark/images/badge-shape-right.svg') }}" alt="shape">
                        </div>
                        <h2 class="section-title mb-30px text-center wow animate__fadeInUp builder-editable" builder-identity="WAC2" data-wow-delay=".2s">{{get_phrase('Shop by Category')}}</h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn wch-btn-white min-w-209px builder-editable" builder-identity="WAC3">{{get_phrase('Explore More')}}</a>
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
                            <!-- Slides -->
                             @php 
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(12)->get();
                             @endphp
                            @foreach($categories as $category)
                            <div class="swiper-slide">
                                <div class="category-card">
                                    <a href="{{ route('products', get_category_params($category)) }}" class="category-card-banner">
                                        <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="category">
                                    </a>
                                    <div class="category-card-body">
                                        <div class="category-card-iconbox">
                                            <img src="{{ get_image($category->icon) }}" alt="">
                                        </div>
                                        <a href="{{ route('products', get_category_params($category)) }}" class="category-card-title">{{ $category->title }}</a>
                                        <p class="category-card-subtitle"> {{ \Illuminate\Support\Str::limit($category->description, 90, '...') }}</p>
                                        <a href="{{ route('products', get_category_params($category)) }}" class="category-card-btn">
                                            <span>{{get_phrase('Learn More')}}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
                                                <path d="M24.8755 8.41592C25.2692 8.02225 25.2692 7.384 24.8755 6.99033L18.4604 0.575191C18.0667 0.181526 17.4285 0.181526 17.0348 0.575191C16.6412 0.968856 16.6412 1.60711 17.0348 2.00078L22.7372 7.70312L17.0348 13.4055C16.6412 13.7991 16.6412 14.4374 17.0348 14.8311C17.4285 15.2247 18.0667 15.2247 18.4604 14.8311L24.8755 8.41592ZM0.977783 7.70312V8.71117H24.1628V7.70312V6.69508H0.977783V7.70312Z" fill="#ffffff"/>
                                            </svg>
                                        </a>
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