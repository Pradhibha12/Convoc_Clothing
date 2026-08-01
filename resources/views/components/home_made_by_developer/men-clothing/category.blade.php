{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


    <!-- Category Area Start -->
    <section class="mt-5 section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cs-title-area">
                        <h2 class="section-title text-center mb-30px max-w-687px mx-auto wow animate__fadeInUp builder-editable" builder-identity="MEC1" data-wow-delay=".1s">{{get_phrase('Categories you might like')}}</h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".2s">
                            <a href="{{route('all_products')}}" class="btn mc-btn-outline-black btn-min-218px mx-auto builder-editable" builder-identity="MEC2">{{get_phrase('View All')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 wow animate__fadeInUp" data-wow-delay=".3s">
                 @php
                    $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                @endphp
                @foreach($categories->take(5) as $category)
                    <div class="col">
                        <a href="{{ route('products', get_category_params($category)) }}" class="category-card">
                            <div>
                                <div class="category-card-banner">
                                    <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                                </div>
                                <div class="category-card-body">
                                    <h3 class="category-card-title">{{ $category->title }}</h3>
                                    <span class="category-card-btn">{{get_phrase('Shop Now')}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Category Area End -->