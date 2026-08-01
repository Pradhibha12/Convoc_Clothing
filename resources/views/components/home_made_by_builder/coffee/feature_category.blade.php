{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Featured Category Area Start -->
    <section class="featured-category-section">
        <div class="featured-shape1">
            <img class="shape builder-editable" builder-identity="COT19" src="{{ asset('assets/frontend/coffee/images/nut-shape1.png ') }}" alt="">
        </div>
        <div class="featured-shape2">
            <img class="shape builder-editable" builder-identity="COT20" src="{{ asset('assets/frontend/coffee/images/nut-shape2.png ') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <p class="title-badge mx-auto mb-28px wow animate__fadeInUp builder-editable" builder-identity="COC1" data-wow-delay=".1s">{{get_phrase('Featured Categories')}}</p>
                        <h2 class="section-title text-center mb-3 max-w-739px mx-auto wow animate__fadeInUp builder-editable" builder-identity="COC2" data-wow-delay=".2s">{{get_phrase('Explore What You Love')}}</h2>
                        <p class="section-subtitle text-center mb-30px max-w-621px mx-auto wow animate__fadeInUp builder-editable" builder-identity="COC3" data-wow-delay=".3s">{{get_phrase('Discover artisan coffee blends, soothing teas & beautifully crafted brewing tools all in one place.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn cts-btn-outline-black builder-editable" builder-identity="COC4">{{get_phrase('Explore Collection')}}</a>
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