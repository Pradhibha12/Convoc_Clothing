{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

   <!-- Bestsellers or Trending Products Area Start -->
    <section class="trending-product-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bestsellers-section-title-area">
                        <h2 class="section-title text-center max-w-735px mx-auto mb-6px wow animate__fadeInUp builder-editable" builder-identity="CBB1"  data-wow-delay=".1s">{{get_phrase('Bestsellers  Products')}}</h2>
                        <p class="section-subtitle text-center max-w-520px mx-auto wow animate__fadeInUp builder-editable" builder-identity="CBB2" data-wow-delay=".2s">{{get_phrase('These are the must-haves every driver is adding to their cart.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 product-card-row wow animate__fadeInUp" data-wow-delay=".3s">
                @php 
                    $products = App\Models\Product::where('label', 'best-seller')->take(4)->get();
                @endphp
                @foreach($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-card">
                        <a href="{{ route('product', $product->slug) }}" class="product-card-banner">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                            @if ($product->label)
                            <span class="pc-saved-badge capitalize">{{$product->label}}</span>
                            @endif
                        </a>
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                                <div class="d-flex align-items-center gap-2 mb-12px">
                                    <p class="pc-rating-review-total">{{ number_format($product->average_rating, 1) }}</p>
                                    <div class="pc-star-rating d-flex">
                                        <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#F8C51B"/>
                                                </svg>
                                            </div>
                                    </div>
                                </div>
                            </div>

                              @if ($product->is_discounted)
                                @php
                                    $discount = $product->discount;
                                @endphp
                                @if ($discount->discount_type == 'percentage')
                                    <h5 class="product-card-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h5>
                                @else
                                    <h5 class="product-card-price">{{ currency($product->price) }}</h5>
                                @endif
                                @else
                                  <h5 class="product-card-price">{{ currency($product->price) }}</h5>
                                @endif
                                <div class="sold-progress" progress-value="{{ getSoldProgress($product->id) }}"></div>

                                <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap mb-2">
                                    <p class="available-sold-info">{{get_phrase('Total  Stock:')}} {{$product->total_stock}}</p>
                                    <p class="available-sold-info">{{get_phrase('Sold:')}} {{ getSoldQuantity($product->id) }}</p>
                                </div>
                            <a href="{{ route('product', $product->slug) }}" class="btn ca-btn-outline-secondary w-100">{{get_phrase('View details')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn ca-btn-skin min-w-175px mx-auto builder-editable" builder-identity="CBB3">{{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bestsellers or Trending Products Area End -->