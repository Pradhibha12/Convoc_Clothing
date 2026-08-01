{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Featured Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="bn-title-60px text-uppercase builder-editable" builder-identity="sc1">{{get_phrase('Featured Categories')}}</h1>
            </div>
        </div>
        <div class="row gy-4 section-margin wow animate__fadeInUp" data-wow-delay=".2s">
            
            @php
              $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(4)->get();
            @endphp
            @foreach ($categories as $category)
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-item category-item1" data-image="{{ get_image($category->thumbnail) }}">
                   
                    <h3 class="category-title">{{$category->title}}</h3>
                    <a href="{{ route('products', $category->slug) }}" class="btn ec-md-btn-skin category-btn ">{{get_phrase('Shop Now')}}</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Featured Section End -->