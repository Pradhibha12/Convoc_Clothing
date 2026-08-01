{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


    <!-- Start Embrace Elegance with Every Spritz Area  -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="embrace-title-area">
                        <h2 class="section-title text-center mb-20px max-w-908px mx-auto wow animate__fadeInUp builder-editable" builder-identity="PC1" data-wow-delay=".1s">{{get_phrase('Embrace Elegance with Every Spritz')}}🌹</h2>
                        <p class="section-subtitle text-center mb-34px max-w-633px mx-auto wow animate__fadeInUp builder-editable" builder-identity="PC2" data-wow-delay=".2s">{{get_phrase('Sensual, floral, and timeless scents for every clean, contemporary fragrances that defy gender norms.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn pf-btn-outline-white builder-editable" builder-identity="PC3">{{get_phrase('Explore Collection')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".4s">
                <div class="col-12">
                    <div class="embrace-content-area">
                        <div class="embrace-banner1">
                            <img class="banner builder-editable" builder-identity="PC4" src=" {{ asset('assets/frontend/perfume/images/embrace-banner1.webp')}}" alt="banner">
                        </div>
                        <ul class="pf-category-nav">
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                            @endphp
                            @foreach($categories as $category)
                            <li class="pf-category-item">
                                <a href="{{ route('products', $category->slug) }}" class="pf-category-link">{{ $category->title }}</a>
                            </li>
                            @endforeach
                           
                        </ul>
                        <div class="embrace-banner2">
                            <img class="banner builder-editable" builder-identity="PC5" src="{{ asset('assets/frontend/perfume/images/embrace-banner2.webp')}}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Embrace Elegance with Every Spritz Area  -->