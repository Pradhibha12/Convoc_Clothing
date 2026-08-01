{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Category Area Start -->
    <section class="section-mb category-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <h5 class="section-sm-title mb-16px text-center wow animate__fadeInUp builder-editable" builder-identity="WOC1" data-wow-delay=".1s">{{get_phrase('Shop by Category')}}</h5>
                        <h2 class="section-title text-center max-w-744px mx-auto mb-16px wow animate__fadeInUp builder-editable" builder-identity="WOC2" data-wow-delay=".2s">{{get_phrase('Effortless Picks for Every Day!')}}</h2>
                        <p class="section-subtitle text-center mx-auto  category-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="WOC3" data-wow-delay=".3s">{{get_phrase('Find your perfect pieces for every moment curated to match your mood, style, & lifestyle.')}}</p>
                        
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
                 @php
                    $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(6)->get();
                    @endphp
                   @foreach($categories as $category) 
                   
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <a href="{{ route('products', get_category_params($category)) }}" class="category-item">
                            <div class="category-iconbox">
                                <img src="{{ get_image($category->icon) }}" alt="">
                            </div>
                            <h4 class="category-title">{{ $category->title }}</h4>
                            
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="text-center mt-5 wow animate__fadeInUp" data-wow-delay=".4s">
                <a href="{{route('all_products')}}" class="dark-corner-btn hero-corner-btn builder-editable" builder-identity="WOC4">{{get_phrase('Explore Collection')}}</a>
            </div>
        </div>
    </section>
    <!-- Category Area End -->