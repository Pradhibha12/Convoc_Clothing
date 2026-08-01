{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Category Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-title-area">
                        <div class="wch-section-badge mb-10px justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <img class="badge-shape-left" src=" {{ asset('assets/frontend/watch/images/badge-shape-left.svg') }}" alt="shape">
                            <p class="builder-editable" builder-identity="WC1">{{get_phrase('Our Categories')}}</p>
                            <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg') }}" alt="shape">
                        </div>
                        <h2 class="section-title mb-40px text-center wow animate__fadeInUp builder-editable" builder-identity="WC2" data-wow-delay=".2s">{{get_phrase('Shop by Category')}} </h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn wch-btn-skin min-w-209px builder-editable" builder-identity="WC3">{{get_phrase('Explore More')}}</a>
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