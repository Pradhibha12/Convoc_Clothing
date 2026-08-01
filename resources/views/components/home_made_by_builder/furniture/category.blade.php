{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Featured Category Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp builder-editable" builder-identity="FC1" data-wow-delay=".1s">{{get_phrase('Featured Categories')}}</h1>
                </div>
            </div>
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper category-slider">
                    <div class="swiper-wrapper">
                         @php
                            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                        @endphp
                        <!-- Single Slide -->
                        @foreach($categories as $category)
                            <div class="swiper-slide">
                                <div class="single-category-card">
                                    <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="">
                                    <div class="category-btn-wrap">
                                        <a href="{{ route('products', $category->slug) }}" class="btn ec2-btn-white">{{ $category->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Slide -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Category Area End -->
