{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Category Area Start -->
<section class="category-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="tr-section wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block builder-editable" builder-identity="TDC1">{{get_phrase('Shop by Category')}}</span>
                    <h2 class="mb-2 builder-editable" builder-identity="TDC2">{{get_phrase('Essential Gear for Every Kind of Traveler.')}}</h2>
                    <p class="builder-editable" builder-identity="TDC3">{{get_phrase('Explore durable, smart, and eco-conscious travel essentials built for every adventure.')}}</p>
                </div>
            </div>
        </div>
        <div class="row  wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-lg-12">
                 <div class="category-gallary overflow-hidden">
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(6)->get();
                            @endphp
                            @if($categories->count())
                                <div class="itemBox d-flex">
                                    {{-- Left Big Item --}}
                                    @php $first = $categories->first(); @endphp
                                    <a href="{{ route('products', get_category_params($first)) }}" class="itemLeft items">
                                        <div class="cate-save-icon">
                                            <span><img src="{{ asset('assets/frontend/travel-dark/images/line.svg') }}" alt=""></span>
                                        </div>
                                        <img class="cate-image" src="{{ get_image($first->thumbnail) }}" alt="category image">
                                        <div class="item-content">
                                            <span class="cat-icon">
                                                <img src="{{ get_image($first->icon) }}" alt="">
                                            </span>
                                            <h4>{{ $first->title }}</h4>
                                        </div>
                                    </a>

                                    {{-- Right Side --}}
                                    <div class="itemRight">
                                        {{-- Top 2 items --}}
                                        <div class="tr-item-top d-flex">
                                            @foreach($categories->skip(1)->take(2) as $cat)
                                                <a href="{{ route('products', get_category_params($cat)) }}" class="item{{ $loop->iteration + 1 }} items">
                                                    <div class="cate-save-icon">
                                                        <span><img src="{{ asset('assets/frontend/travel-dark/images/line.svg') }}" alt=""></span>
                                                    </div>
                                                    <img class="cate-image" src="{{ get_image($cat->thumbnail) }}" alt="category image">
                                                    <div class="item-content">
                                                        <span class="cat-icon">
                                                            <img src="{{ get_image($cat->icon) }}" alt="">
                                                        </span>
                                                        <h4>{{ $cat->title }}</h4>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>

                                        {{-- Bottom 3 items --}}
                                        <div class="tr-item-bottom d-flex">
                                            @foreach($categories->skip(3)->take(3) as $cat)
                                                <a href="{{ route('products', get_category_params($cat)) }}" class="item{{ $loop->iteration + 3 }} items">
                                                    <div class="cate-save-icon">
                                                        <span><img src="{{ asset('assets/frontend/travel-dark/images/line.svg') }}" alt=""></span>
                                                    </div>
                                                    <img class="cate-image" src="{{ get_image($cat->thumbnail) }}" alt="category image">
                                                    <div class="item-content">
                                                        <span class="cat-icon">
                                                            <img src="{{ get_image($cat->icon) }}" alt="">
                                                        </span>
                                                        <h4>{{ $cat->title }}</h4>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                  <div class="text-center mt-2">
                     <a href="{{route('all_products')}}" class="tr-white-btn-large mt-5 builder-editable" builder-identity="TDC7">{{get_phrase('Shop Now')}}</a>
                  </div>
            </div>
        </div>
    </div> 
</section>
<!-- Category Area End -->