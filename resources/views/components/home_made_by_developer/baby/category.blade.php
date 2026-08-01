{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Start Category Section  -->
    <section class="category-section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <p class="section-sm-title mb-30px builder-editable" builder-identity="BCC1"><span class="line"></span>{{get_phrase('Shop by Category')}}<span class="line"></span></p>
                        </div>
                        <h2 class="section-title text-center max-w-690px mx-auto mb-26px wow animate__fadeInUp builder-editable" builder-identity="BCC2" data-wow-delay=".2s">{{get_phrase("Essentials for Every Stage of Your Baby's Growth!")}}</h2>
                        <p class="section-subtitle max-w-584px mx-auto text-center mb-36px wow animate__fadeInUp builder-editable" builder-identity="BCC3" data-wow-delay=".3s">{{get_phrase("From cozy clothing to travel-ready gear, find everything your little one needs — all in one place.")}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ba-btn-outline-dark">
                                <span class="builder-editable" builder-identity="BCC4">{{get_phrase("View All Categories")}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                    <path d="M2.4375 1.14179C2.40683 1.65843 2.76563 2.08629 3.23896 2.09728L7.5956 2.19832L0.712227 9.10554C0.355865 9.46313 0.320697 10.0555 0.633679 10.4287C0.946662 10.8018 1.48931 10.8144 1.84567 10.4568L8.72918 3.54946L8.44686 8.30581C8.41615 8.8225 8.775 9.25031 9.24832 9.2613C9.72164 9.27228 10.1302 8.86233 10.1609 8.3456L10.5772 1.33062C10.592 1.08244 10.5158 0.842404 10.3655 0.663225C10.2152 0.484047 10.0031 0.380413 9.77577 0.375137L3.35 0.226058C2.87672 0.215115 2.46817 0.625067 2.4375 1.14179Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper category-slider"> 
                        <div class="swiper-wrapper">
                             @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                            @endphp
                            @foreach($categories as $category)
                                <div class="swiper-slide">
                                    <div class="category-slide">
                                        <a href="{{ route('products', get_category_params($category)) }}" class="category-banner">
                                            <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="">
                                        </a>
                                        <a href="{{ route('products', get_category_params($category)) }}" class="category-title">{{$category->title}}</a>
                                        <p class="category-subtitle">{{ \Illuminate\Support\Str::limit($category->description, 50, '...') }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="category-pagination">
                            <div class="swiper-button-prev">
                                <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.88189 1.23535L1.11719 9.00006L8.88189 16.7648" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.11811 16.7646L8.88281 8.99994L1.11811 1.23524" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Category Section  -->