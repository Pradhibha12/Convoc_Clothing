{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Fresh for the Season Area Start -->
<section class="mb-20px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h2 class="section-title mb-4 text-center advantage-section-title wow animate__fadeInUp builder-editable" builder-identity="DSS1" data-wow-delay=".1s">{{get_phrase('Fresh for the Season')}}</h2>
                    <p class="section-subtitle text-center advantage-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="DSS2" data-wow-delay=".2s">{{get_phrase('Try our Spring picks - vibrant produce, refreshing drinks & more.')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mixitup-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                    @php
                        $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                    @endphp
                    <button type="button" data-filter=".show-all" class="product-filter-btn mixitup-control-active">{{get_phrase('All')}}</button>
                     @foreach($categories->take(4) as $category)
                        <button type="button" data-filter=".cat-{{$category->id}}" class="product-filter-btn"> {{ $category->title }} </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center mb-4 mixitup wow animate__fadeInUp" data-wow-delay=".4s">
             @php 
                $allproduct =App\Models\Product::where('status', 1)->latest()->take(8)->get();
            @endphp
               @foreach($allproduct as $product)
            <div class="col-sm-6 col-lg-4 col-xl-3 mix show-all">
                <a href="{{ route('product', $product->slug) }}" class="product-card">
                    <div class="product-card-banner">
                        @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                    </div>
                    <div class="product-card-body">
                        <h5 class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</h5>
                        <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px">
                            @if ($product->is_discounted()->exists())
                                @if ($product->is_discounted->discount_type == 'flat')
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="pc-new-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                        <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                @else
                                    @php
                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                    @endphp
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="pc-new-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                            <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                    
                                @endif
                            @else
                                    <h6 class="pc-new-price">{{ currency($product->price) }}</h6>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
             @foreach($categories->take(4) as $category)
                    @php 
                        $catProducts = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()->take(8)->get();
                    @endphp
                   @foreach($catProducts as $catproduct)
                        <div class="col-sm-6 col-lg-4 col-xl-3 mix cat-{{$catproduct->category_id}}">
                            <a href="{{ route('product', $catproduct->slug) }}" class="product-card">
                                <div class="product-card-banner">
                                    @php
                                        $thumbnails = json_decode($catproduct->thumbnail, true);
                                        $firstImage = $thumbnails[0] ?? null;
                                    @endphp
                                    <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                </div>
                                <div class="product-card-body">
                                    <h5 class="product-card-title">{{ \Illuminate\Support\Str::limit($catproduct->title, 70, '...') }}</h5>
                                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px">
                                        @if ($catproduct->is_discounted()->exists())
                                                @if ($catproduct->is_discounted->discount_type == 'flat')
                                                    <div class="d-flex align-items-baseline gap-2">
                                                        <h6 class="pc-new-price">  {{ currency($catproduct->price - $catproduct->is_discounted->discount_value) }} </h6>
                                                        <h6 class="pc-old-price"><del>{{ currency($catproduct->price) }}</del></h6>
                                                    </div>
                                                @else
                                                    @php
                                                        $discount_amount = $catproduct->price * ($catproduct->is_discounted->discount_value / 100);
                                                    @endphp
                                                    <div class="d-flex align-items-baseline gap-2">
                                                        <h6 class="pc-new-price "> {{ currency($catproduct->price - $discount_amount) }}  </h6>
                                                            <h6 class="pc-old-price"><del>{{ currency($catproduct->price) }}</del></h6>
                                                    </div>
                                                    
                                                @endif
                                            @else
                                                    <h6 class="pc-new-price">{{ currency($catproduct->price) }}</h6>
                                            @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                   @endforeach
            @endforeach
        </div>
       <div class="text-center mt-5 mb-5">
           <a href="{{ route('all_products') }}" class="btn dr-btn-outline-secondary wow animate__fadeInUp builder-editable" builder-identity="DB30" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">{{get_phrase('View All Products')}}</a>
       </div>

    </div>
</section>
<!-- Fresh for the Season Area End -->