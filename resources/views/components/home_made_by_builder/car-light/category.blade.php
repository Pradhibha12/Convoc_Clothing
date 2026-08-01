{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

   <!-- Category Area Start -->
    <section class="category-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <h2 class="section-title text-center max-w-735px mx-auto mb-6px wow animate__fadeInUp builder-editable" builder-identity="CLC1" data-wow-delay=".1s">{{get_phrase('Shop by Category')}}</h2>
                        <p class="section-subtitle text-center max-w-520px mx-auto wow animate__fadeInUp builder-editable" builder-identity="CLC2" data-wow-delay=".2s">{{get_phrase('Find exactly what you need — fast.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper category-slider">
                        <div class="swiper-wrapper">
                              @php
                                $categories = App\Models\Category::where('parent_id', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(4)->get();
                            @endphp
                           @foreach($categories as $category)
                            <div class="swiper-slide">
                                <a href="{{ route('products', get_category_params($category)) }}" class="category-card">
                                    <div>
                                        <div class="category-iconbox">
                                            <img src="{{ get_image($category->icon) }}" >
                                        </div>
                                        <h4 class="category-card-title">{{ $category->title }}</h4>
                                        <p class="category-card-subtitle">{{ \Illuminate\Support\Str::limit($category->description, 60, '...') }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Area End -->