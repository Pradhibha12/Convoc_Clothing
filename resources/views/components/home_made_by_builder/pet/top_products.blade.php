
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Top Picks Product Area Start -->
<section class="top-picks-product-section section-mb overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-product-title-area d-flex justify-content-between align-items-center gap-3 flex-wrap">
                    <h2 class="section-title tp-area-title wow animate__fadeInUp builder-editable" builder-identity="PT1" data-wow-delay=".1s">{{get_phrase('Top Picks Loved by Pet Parents')}}</h2>
                    <div class="tp-title-right">
                        <p class="section-subtitle mb-30px wow animate__fadeInUp builder-editable" builder-identity="PT2" data-wow-delay=".2s">{{get_phrase('Discover our best-selling products tried, tested, & loved by pets and their humans.')}}</p>
                        <a href="{{route('all_products')}}" class="btn pt-btn-skin wow animate__fadeInUp builder-editable" builder-identity="PT3" data-wow-delay=".3s">{{get_phrase('Explore More')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-picks-product-area wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="row gy-4 gx-17px">
                @php 
                    $topProducts = App\Models\Product::where('status', 1)->where('label', 'top-seller')->inRandomOrder()->take(3)->get();
                @endphp
                @foreach($topProducts as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product-card">
                        <div class="card-product-slider-area">
                           <a href="javascript:;" 
                                class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                <span class="h-100 w-100 d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Wishlist')}}">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6477 0.423828C14.6751 0.423828 12.9095 1.3829 11.8088 2.85422C10.708 1.3829 8.94242 0.423828 6.96978 0.423828C3.62391 0.423828 0.910156 3.14848 0.910156 6.51614C0.910156 7.81308 1.11723 9.01197 1.47688 10.1236C3.19886 15.5729 8.50648 18.8316 11.133 19.7253C11.5036 19.8561 12.1139 19.8561 12.4845 19.7253C15.111 18.8316 20.4186 15.5729 22.1406 10.1236C22.5003 9.01197 22.7074 7.81308 22.7074 6.51614C22.7074 3.14848 19.9936 0.423828 16.6477 0.423828Z" fill="#CECECE"/>
                                    </svg>
                                </span>
                            </a>
                            <!-- Slider -->
                            <div class="swiper card-product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card-product-slide">
                                            @php
                                                $thumbnails = json_decode($product->thumbnail, true);
                                                $firstImage = $thumbnails[0] ?? null;
                                            @endphp
                                            <img class="product" src="{{ get_image($firstImage) }}" alt="banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="product-card-body">
                            <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                            <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 60, '...') }}</p>
                            <div class="d-flex align-items-center column-gap-12px row-gap-2 mb-4 flex-wrap">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26" viewBox="0 0 28 26" fill="none">
                                            <path d="M9.20936 7.92414L12.8408 0.816639C13.3069 -0.0957806 14.6538 -0.0957806 15.1199 0.816639L18.7512 7.92414L26.8723 9.07092C27.9142 9.21805 28.3294 10.4555 27.5752 11.1652L21.6998 16.6938L23.0864 24.5042C23.2645 25.5072 22.1747 26.272 21.2424 25.7983L13.9803 22.1087L6.7182 25.7983C5.7859 26.272 4.69612 25.5072 4.87417 24.5042L6.26074 16.6938L0.38551 11.1652C-0.36884 10.4555 0.0464452 9.21805 1.0884 9.07092L9.20936 7.92414Z" fill="#FFC416"/>
                                        </svg>
                                    </div>
                                    
                                    <div class="d-flex align-items-center gap-2px">
                                        <h5 class="product-card-rating">{{ number_format($product->average_rating, 1) }}</h5>
                                        
                                    </div>
                                </div>
                                    @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                            <h3 class="card-product-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h3>
                                    @else
                                        <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                    @endif
                                    @else
                                        <h3 class="card-product-price">{{ currency($product->price) }}</h3>
                                    @endif
                            </div>
                            <a  onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" href="javascript:;" class="btn ptb4-btn-skin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.1014 22.5456C20.9923 22.5456 21.7145 21.8233 21.7145 20.9325C21.7145 20.0416 20.9923 19.3193 20.1014 19.3193C19.2105 19.3193 18.4883 20.0416 18.4883 20.9325C18.4883 21.8233 19.2105 22.5456 20.1014 22.5456Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.34749 22.5451C10.2384 22.5451 10.9606 21.8228 10.9606 20.932C10.9606 20.0411 10.2384 19.3188 9.34749 19.3188C8.45659 19.3188 7.73438 20.0411 7.73438 20.932C7.73438 21.8228 8.45659 22.5451 9.34749 22.5451Z" fill="white" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.50846 3.18793H22.7904L20.6396 15.0174H6.65928L4.50846 3.18793ZM4.50846 3.18793C4.32922 2.47099 3.43305 1.03711 1.28223 1.03711" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.639 15.0176H6.65868H4.75603C2.83717 15.0176 1.81934 15.8577 1.81934 17.1684C1.81934 18.4791 2.83717 19.3192 4.75603 19.3192H20.1013" stroke="white" stroke-width="1.61311" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>
                                     @if ($product->is_cart_item)
                                        {{ get_phrase('Added To Cart')}}
                                    @else
                                        {{ get_phrase('Add To Cart') }}
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Top Picks Product Area End -->
