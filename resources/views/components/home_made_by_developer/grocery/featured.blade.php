{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Featured Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center builder-editable" builder-identity="1">{{ get_phrase('Featured Categories') }}</h1>
            </div>
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper category-slider">
                    @php
                        $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                    @endphp
                    <div class="swiper-wrapper">
                        @php
                            $colors = ['salmon', 'purple', 'green', 'orange']; // Define the colors
                        @endphp
                        @foreach ($categories as $index => $category)
                            <div class="swiper-slide">
                                <a href="{{ route('products', get_category_params($category)) }}" class="category-item bg-{{ $colors[$index % count($colors)] }}-light">
                                    <div class="category-img">
                                        <img src="{{ get_image($category->thumbnail) }}" alt="category">
                                    </div>
                                    <div class="category-content">
                                        <h4 class="al-title-18px fw-medium mb-10px text-center">{{ $category->title }}</h4>
                                        {{-- <p class="al-subtitle-14px text-center ec-text-dark3 lh-1 fw-normal">{{ $category->totalProductCount() }}</p> --}}
                                    </div>
                                </a> 
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Area End -->
