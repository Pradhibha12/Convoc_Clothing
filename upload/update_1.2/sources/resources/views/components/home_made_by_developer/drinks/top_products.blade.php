{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Top Picks, Loved by Everyone Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h2 class="section-title mb-4 wow animate__fadeInUp builder-editable" builder-identity="DT1" data-wow-delay=".1s">{{get_phrase('Top Picks, Loved by Everyone')}}</h2>
                    <p class="section-subtitle wow animate__fadeInUp builder-editable" builder-identity="DT2" data-wow-delay=".2s">{{get_phrase("Products flying off our shelves - grab them before they're gone!")}}</p>
                </div>
            </div>
        </div>
        <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                        @php 
                           $allproduct =App\Models\Product::where('status', 1)->latest()->take(8)->get();
                        @endphp
                        @foreach($allproduct as $product)
                        <div class="swiper-slide">
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
                       
                    </div>
                    <div class="swiper-pagination"></div>
                </div>    
            </div>
        </div>
    </div>
</section>
<!-- Top Picks, Loved by Everyone Area End -->