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
                        <p class="section-subtitle text-center mx-auto max-w-612px category-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="WOC3" data-wow-delay=".3s">{{get_phrase('Find your perfect pieces for every moment curated to match your mood, style, & lifestyle.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn wc-btn-outline-dark builder-editable" builder-identity="WOC4">{{get_phrase('Explore Collection')}}</a>
                        </div>
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
                            <span class="category-arrow">
                                <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.991948 18.6125C0.225673 19.1693 0.0558042 20.2418 0.612536 21.0081C1.16927 21.7743 2.24178 21.9442 3.00805 21.3875L0.991948 18.6125ZM24.7445 4.97411C24.8927 4.03861 24.2544 3.16011 23.3189 3.01194L8.07394 0.597376C7.13843 0.449206 6.25994 1.08747 6.11177 2.02298C5.9636 2.95848 6.60186 3.83698 7.53737 3.98515L21.0885 6.13143L18.9422 19.6825C18.794 20.618 19.4323 21.4965 20.3678 21.6447C21.3033 21.7929 22.1818 21.1546 22.3299 20.2191L24.7445 4.97411ZM2 20L3.00805 21.3875L24.0587 6.09329L23.0506 4.70583L22.0426 3.31836L0.991948 18.6125L2 20Z" fill="black"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Category Area End -->