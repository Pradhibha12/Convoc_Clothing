{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}



<!-- Featured Categories Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-category-title-area">
                    <p class="bs-title-badge mx-auto mb-26px wow animate__fadeInUp builder-editable" builder-identity="BC1" data-wow-delay=".1s">{{get_phrase('Featured Categories')}}</p>
                    <h2 class="section-title text-center max-w-898px mx-auto mb-14px wow animate__fadeInUp builder-editable" builder-identity="BC2" data-wow-delay=".2s">{{get_phrase('Explore Bags for Every Lifestyle!')}}</h2>
                    <p class="section-subtitle text-center max-w-580px mx-auto featured-category-subtitle wow animate__fadeInUp builder-editable" builder-identity="BC3" data-wow-delay=".3s">{{get_phrase('Find the perfect match for your daily hustle, tech needs, or weekend escapes.')}}</p>
                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px wow animate__fadeInUp" data-wow-delay=".4s">
                        <a href="{{route('all_products')}}" class="btn bs-btn-skin">
                            <span class="builder-editable" builder-identity="BC4">{{get_phrase('Shop Now!')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                <path d="M1.77997 8.65667L0.436635 8.65667L0.436635 11.3433L1.77997 11.3433L1.77997 8.65667ZM21.5365 10.9499C22.0611 10.4253 22.0611 9.57472 21.5365 9.05012L12.9876 0.501199C12.463 -0.023406 11.6124 -0.0234059 11.0878 0.501199C10.5632 1.0258 10.5632 1.87635 11.0878 2.40096L18.6869 10L11.0878 17.599C10.5632 18.1236 10.5632 18.9742 11.0878 19.4988C11.6124 20.0234 12.463 20.0234 12.9876 19.4988L21.5365 10.9499ZM1.77997 10L1.77997 11.3433L20.5866 11.3433L20.5866 10L20.5866 8.65667L1.77997 8.65667L1.77997 10Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper category-slider">
                    <div class="swiper-wrapper">
                        @php
                            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                        @endphp
                        @foreach($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('products', $category->slug) }}" class="category-card">
                                <div class="category-card-banner">
                                    <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                                </div>
                                <div class="category-card-content">
                                    <h3 class="category-card-title">{{$category->title}}</h3>
                                    <div class="category-card-btn">
                                        <div class="category-btn-inner">
                                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.990773 29.2923C0.271274 28.4341 0.336796 27.0452 1.18775 26.1913L21.1581 6.15067L22.0322 5.27357L20.8512 5.246L8.21049 4.95274C7.17662 4.92861 6.38141 4.05638 6.34481 2.95556L6.3478 2.73209C6.41568 1.58947 7.27148 0.663949 8.29801 0.57397L8.50545 0.566998L27.1486 0.999376C27.6811 1.01174 28.1734 1.25422 28.5204 1.66769C28.8239 2.02957 28.9988 2.50143 29.0146 3.00307L29.0112 3.22003L27.8033 23.5734C27.7354 24.7161 26.8798 25.6418 25.8531 25.7315L25.6456 25.7385C24.6117 25.7143 23.817 24.8415 23.7806 23.7406L23.7829 23.5178L24.6023 9.71799L24.6788 8.42728L3.83305 29.345L3.66898 29.4944C2.82539 30.1899 1.66566 30.0969 0.990773 29.2923Z" fill="white" stroke="#DA5C19"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="category-slider-navs wow animate__fadeInUp" data-wow-delay=".2s">
                        <div class="swiper-button-prev">
                            <svg width="29" height="27" viewBox="0 0 29 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.5507 13.8552L2.15936 13.8552M2.15936 13.8552L14.1497 25.4929M2.15936 13.8552L14.1497 2.21756" stroke="black" stroke-width="2.64493" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg width="29" height="27" viewBox="0 0 29 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5072 13.855H26.8985M26.8985 13.855L14.9082 2.21729M26.8985 13.855L14.9082 25.4926" stroke="black" stroke-width="2.64493" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Categories Area End -->