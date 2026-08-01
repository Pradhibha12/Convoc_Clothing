{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Trending Product Area Start -->
    <section class="trending-product-section section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-16px">
                        <h5 class="section-sm-title mb-22px text-center wow animate__fadeInUp builder-editable" builder-identity="WOT1" data-wow-delay=".1s">{{get_phrase('Trending Now')}}</h5>
                        <h2 class="section-title text-center max-w-744px mx-auto wow animate__fadeInUp builder-editable" builder-identity="WOT2" data-wow-delay=".2s">{{get_phrase('Our community’s most-loved picks this week')}}</h2>
                    </div>
                    <div class="mixitup-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                          <button type="button" data-filter=".show-all" class="product-filter-btn mixitup-control-active">{{get_phrase('All')}}</button>
                          @php
                             $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(4)->get();
                          @endphp
                            @foreach($categories as $category)
                            <button type="button" data-filter=".cat-{{$category->id}}" class="product-filter-btn mixitup-control-active">{{$category->title}}</button>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="row product-card-row mixitup wow animate__fadeInUp" data-wow-delay=".4s">
                @php 
                   $products =App\Models\Product::where('status', 1)->latest()->take(8)->get();
                @endphp
               @foreach($products as $product)
                @php 
                    $category =  App\Models\Category::where('id', $product->category_id)->first();
                @endphp
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mix show-all">
                    <div class="product-card">
                        <div class="pc-banner-wrap2">
                          @if ($product->is_discounted()->exists())
                                @php
                                    $discount = $product->is_discounted;
                                    if ($discount->discount_type === 'percentage') {
                                        $discount_text = $discount->discount_value . '% OFF';
                                    } else { // flat
                                        $discount_text = currency($discount->discount_value) . ' FLAT';
                                    }
                                @endphp
                                <div class="disText">
                                    <p class="sky-blue-badge-md">{{ $discount_text }}</p>
                                </div>
                            @endif

                            <a href="{{ route('product', $product->slug) }}" class="product-card-banner">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                            </a>
                            
                            <div class="pc-banner-icons">
                                <a  href="javascript:;"  class="product-card-wishlist {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49509C13.0949 3.48589 14.5211 2.91895 16.0098 2.91895C17.6173 2.91895 19.1519 3.58001 20.2755 4.74512C21.3911 5.90102 22.0122 7.4592 22.0122 9.07738C22.0122 10.6956 21.391 12.2539 20.2755 13.4096C19.5338 14.1786 18.7932 14.9649 18.0487 15.7554C16.5366 17.361 15.0084 18.9837 13.4208 20.5126L13.4171 20.5161C12.5984 21.293 11.3019 21.2647 10.5181 20.4524L3.72374 13.4096C1.40898 11.0102 1.40898 7.14465 3.72374 4.74523C5.98889 2.39723 9.63646 2.31385 11.9998 4.49509Z" fill="#4A4A4A"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="product-card-view">
                                    <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('View')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M2.5 10.8334C5.5 4.16671 14.5 4.16671 17.5 10.8334" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 14.1666C8.61925 14.1666 7.5 13.0474 7.5 11.6666C7.5 10.2859 8.61925 9.16663 10 9.16663C11.3807 9.16663 12.5 10.2859 12.5 11.6666C12.5 13.0474 11.3807 14.1666 10 14.1666Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <a href="{{ route('product', $product->slug) }}"  class="product-card-btn btn wc-btn-dark"> {{ get_phrase('Shop Now') }}
                            </a>
                        </div>
                        <div class="product-card-body">
                            <a href="{{ route('product', $product->slug) }}" class="product-card-category">{{$category->title}}</a>
                             <div class="pc-stars-ratings d-flex">
                                    <div class="pc-stars ">
                                        @php
                                            $rating = $product->average_rating;
                                            $fullStars = floor($rating); // full stars count
                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                        @endphp

                                        {{-- Full stars --}}
                                        @for($i = 0; $i < $fullStars; $i++)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#FFC633"/>
                                                </svg>
                                            </div>
                                        @endfor

                                        {{-- Half star --}}
                                        @if($halfStar)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <defs>
                                                        <linearGradient id="half-grad">
                                                            <stop offset="50%" stop-color="#FFC633"/>
                                                            <stop offset="50%" stop-color="#ccc"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                </svg>
                                            </div>
                                        @endif

                                        {{-- Empty stars --}}
                                        @for($i = 0; $i < $emptyStars; $i++)
                                            <div class="pc-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                    <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                </svg>
                                            </div>
                                        @endfor
                                    </div>

                                    <p class="pc-rating-average ms-1">{{ number_format($product->average_rating, 1) }}</p>
                                </div>
                            <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 20, '...') }}</a>
                            <p class="product-card-subtitle"> {{ \Illuminate\Support\Str::limit($product->summary, 80, '...') }}</p>
                                @if ($product->is_discounted()->exists())
                                    @if ($product->is_discounted->discount_type == 'flat')
                                        <div class="d-flex gap-2">
                                            <h4 class="product-card-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h4>
                                            <del class="d-flex align-items-end">{{ currency($product->price) }}</del>
                                        </div>
                                    @else
                                        @php
                                            $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                        @endphp
                                        <div class="d-flex gap-2">
                                            <h4 class="product-card-price">  {{ currency($product->price - $discount_amount) }}  </h4>
                                            <del class="d-flex align-items-end">{{ currency($product->price) }}</del>
                                        </div>
                                        
                                    @endif
                                @else
                                    <h4 class="product-card-price">{{ currency($product->price) }}</h4>
                                @endif

                        </div>
                    </div>
                </div>
                @endforeach
                {{-- Category wise latest 8 --}}
                  @foreach($categories->take(4) as $category)
                        @php 
                            $catProducts = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()
                                        ->take(8)->get();
                        @endphp

                    @foreach($catProducts as $catproduct)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mix cat-{{$catproduct->category_id}}">
                            <div class="product-card">
                                <div class="pc-banner-wrap2">
                                    @if ($catproduct->is_discounted()->exists())
                                        @php
                                            $discount = $catproduct->is_discounted;
                                            if ($discount->discount_type === 'percentage') {
                                                $discount_text = $discount->discount_value . '% OFF';
                                            } else { // flat
                                                $discount_text = currency($discount->discount_value) . ' FLAT';
                                            }
                                        @endphp
                                        <div class="disText">
                                            <p class="sky-blue-badge-md">{{ $discount_text }}</p>
                                        </div>
                                    @endif
                                    <a href="{{ route('product', $catproduct->slug) }}" class="product-card-banner">
                                        @php
                                            $thumbnails = json_decode($catproduct->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                                    </a>
                                    
                                    <div class="pc-banner-icons">
                                        <a  href="javascript:;"  class="product-card-wishlist {{ wishlist_class($catproduct->id) }}" 
                                onclick="toggleWishlist({{ $catproduct->id }}, this)">
                                            <span class="pc-wishlist-inner" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9998 4.49509C13.0949 3.48589 14.5211 2.91895 16.0098 2.91895C17.6173 2.91895 19.1519 3.58001 20.2755 4.74512C21.3911 5.90102 22.0122 7.4592 22.0122 9.07738C22.0122 10.6956 21.391 12.2539 20.2755 13.4096C19.5338 14.1786 18.7932 14.9649 18.0487 15.7554C16.5366 17.361 15.0084 18.9837 13.4208 20.5126L13.4171 20.5161C12.5984 21.293 11.3019 21.2647 10.5181 20.4524L3.72374 13.4096C1.40898 11.0102 1.40898 7.14465 3.72374 4.74523C5.98889 2.39723 9.63646 2.31385 11.9998 4.49509Z" fill="#4A4A4A"/>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $catproduct->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="product-card-view">
                                            <span class="pc-view-inner" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('View')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M2.5 10.8334C5.5 4.16671 14.5 4.16671 17.5 10.8334" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10 14.1666C8.61925 14.1666 7.5 13.0474 7.5 11.6666C7.5 10.2859 8.61925 9.16663 10 9.16663C11.3807 9.16663 12.5 10.2859 12.5 11.6666C12.5 13.0474 11.3807 14.1666 10 14.1666Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <a href="{{ route('product', $catproduct->slug) }}"  class="product-card-btn btn wc-btn-dark">
                                       {{ get_phrase('Shop Now') }}
                                    </a>
                                </div>
                                <div class="product-card-body">
                                    <a href="{{ route('product', $catproduct->slug) }}" class="product-card-category">{{$category->title}}</a>
                                    <div class="pc-stars-ratings d-flex">
                                            <div class="pc-stars ">
                                                @php
                                                    $rating = $catproduct->average_rating;
                                                    $fullStars = floor($rating); // full stars count
                                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                                @endphp

                                                {{-- Full stars --}}
                                                @for($i = 0; $i < $fullStars; $i++)
                                                    <div class="pc-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#FFC633"/>
                                                        </svg>
                                                    </div>
                                                @endfor

                                                {{-- Half star --}}
                                                @if($halfStar)
                                                    <div class="pc-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                            <defs>
                                                                <linearGradient id="half-grad">
                                                                    <stop offset="50%" stop-color="#FFC633"/>
                                                                    <stop offset="50%" stop-color="#ccc"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="url(#half-grad)"/>
                                                        </svg>
                                                    </div>
                                                @endif

                                                {{-- Empty stars --}}
                                                @for($i = 0; $i < $emptyStars; $i++)
                                                    <div class="pc-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                            <path d="M9.39444 1.91455L6.72279 7.33149L0.751221 8.19515L5.07283 12.4136L4.05115 18.3651L9.39444 15.5568L14.7377 18.3651L13.7161 12.4136L18.0377 8.20103L12.0661 7.33149L9.39444 1.91455Z" fill="#ccc"/>
                                                        </svg>
                                                    </div>
                                                @endfor
                                            </div>

                                            <p class="pc-rating-average ms-1">{{ number_format($catproduct->average_rating, 1) }}</p>
                                        </div>
                                    <a href="{{ route('product', $catproduct->slug) }}" class="product-card-title">{{ \Illuminate\Support\Str::limit($catproduct->title, 20, '...') }}</a>
                                    <p class="product-card-subtitle"> {{ \Illuminate\Support\Str::limit($catproduct->summary, 80, '...') }}</p>
                                      @if ($catproduct->is_discounted()->exists())
                                        @if ($catproduct->is_discounted->discount_type == 'flat')
                                            <div class="d-flex gap-2">
                                                <h4 class="product-card-price">
                                                {{ currency($catproduct->price - $catproduct->is_discounted->discount_value) }}
                                            </h4>
                                              <del class="d-flex align-items-end">{{ currency($catproduct->price) }}</del>
                                            </div>
                                        @else
                                            @php
                                                $discount_amount = $catproduct->price * ($catproduct->is_discounted->discount_value / 100);
                                            @endphp
                                             <div class="d-flex gap-2">
                                                <h4 class="product-card-price">
                                                {{ currency($catproduct->price - $discount_amount) }}
                                            </h4>
                                            <del class="d-flex align-items-end">{{ currency($catproduct->price) }}</del>
                                            </div>
                                        @endif
                                    @else
                                        <h4 class="product-card-price">{{ currency($catproduct->price) }}</h4>
                                    @endif


                                        
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>
    <!-- Trending Product Area End -->