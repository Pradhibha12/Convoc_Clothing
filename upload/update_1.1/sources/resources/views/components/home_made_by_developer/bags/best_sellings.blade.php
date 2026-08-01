{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}



<!-- Best Sellers Area Start -->
<section class="best-sellers-section section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="bs-title-badge mb-26px wow animate__fadeInUp builder-editable" builder-identity="BS1" data-wow-delay=".1s">{{get_phrase('Best Sellers')}}</p>
                    <div class="best-sellers-title-area">
                        <div>
                            <h2 class="section-title wow animate__fadeInUp builder-editable" builder-identity="BS2" data-wow-delay=".2s">{{get_phrase('Top Picks Loved by Customers')}}</h2>
                        </div>
                        <div class="best-sellers-title-right">
                            <p class="section-subtitle mb-30px wow animate__fadeInUp builder-editable" builder-identity="BS3" data-wow-delay=".3s">{{get_phrase('Popular favorites flying off our shelves. Grab yours before they’re gone!')}}</p>
                            <div class="d-flex align-items-center flex-wrap gap-12px wow animate__fadeInUp" data-wow-delay=".4s">
                                <a href="{{route('all_products')}}" class="btn bs-btn-skin">
                                    <span class="builder-editable" builder-identity="BS4">{{get_phrase('Shop Now!')}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                        <path d="M1.77997 8.65667L0.436635 8.65667L0.436635 11.3433L1.77997 11.3433L1.77997 8.65667ZM21.5365 10.9499C22.0611 10.4253 22.0611 9.57472 21.5365 9.05012L12.9876 0.501199C12.463 -0.023406 11.6124 -0.0234059 11.0878 0.501199C10.5632 1.0258 10.5632 1.87635 11.0878 2.40096L18.6869 10L11.0878 17.599C10.5632 18.1236 10.5632 18.9742 11.0878 19.4988C11.6124 20.0234 12.463 20.0234 12.9876 19.4988L21.5365 10.9499ZM1.77997 10L1.77997 11.3433L20.5866 11.3433L20.5866 10L20.5866 8.65667L1.77997 8.65667L1.77997 10Z" fill="white"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 wow animate__fadeInUp" data-wow-delay=".1s">
            @php 
                $Bestproducted =App\Models\Product::where('status', 1)->where('label', 'best-seller')->latest()->take(3)->get();
            @endphp
               @foreach($Bestproducted as $product)
            <div class="col-md-6 col-xl-4">
                <div class="product-card">
                    <div class="pci-slider-wrap">
                        <!-- Swiper -->
                        <div class="swiper pci-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="pci-slider-image">
                                        @php
                                            $thumbnails = json_decode($product->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-12px flex-wrap pc-rating-wrap">
                            <div class="d-flex align-items-center gap-1">
                                @php
                                    $rating = $product->average_rating;
                                    $fullStars = floor($rating); // full stars count
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // half star check
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                @endphp
                                @for($i = 0; $i < $fullStars; $i++)
                                <div class="svg-block">
                                    <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.2351 0.97998L16.9847 9.0486L25.8224 10.119L19.3022 16.176L21.0145 24.9062L13.2351 20.581L5.4557 24.9062L7.168 16.176L0.647771 10.119L9.48542 9.0486L13.2351 0.97998Z" fill="#FFC633"/>
                                    </svg>
                                </div>
                                @endfor
                                  @if($halfStar)
                                    <div class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="31" viewBox="0 0 25 25" fill="none">
                                        <path d="M12.6993 3.7688L10.0072 9.90566L3.62445 10.7014L8.34339 15.2899L7.09074 21.9186L12.6993 18.6175V3.7688Z" fill="#FFC633"/>
                                        <path d="M12.6994 18.6178L18.308 21.9188L17.0553 15.2901L21.7742 10.7016L15.3915 9.90591L12.6994 3.76904V18.6178Z" ffill="url(#halfStarGradient)" stroke="#FFC633" stroke-width="0.5"/>
                                    </svg>
                                    
                                    </div>
                                @endif
                                @for($i = 0; $i < $emptyStars; $i++)
                                <div class="svg-block">
                                    <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.2351 0.97998L16.9847 9.0486L25.8224 10.119L19.3022 16.176L21.0145 24.9062L13.2351 20.581L5.4557 24.9062L7.168 16.176L0.647771 10.119L9.48542 9.0486L13.2351 0.97998Z" fill="#ddd"/>
                                    </svg>
                                </div>
                                @endfor
                            </div>
                            <p class="product-card-rating">({{ number_format($product->average_rating, 1) }})</p>
                        </div>
                        <a href="{{ route('product', $product->slug) }}" class="product-card-title">{{$product->title}}</a>
                        <p class="product-card-subtitle">{{ \Illuminate\Support\Str::limit($product->summary, 70, '...') }}</p>
                            @if ($product->is_discounted)
                            @php
                                $discount = $product->discount;
                            @endphp
                            @if ($discount->discount_type == 'percentage')
                                <h3 class="product-card-price">{{ currency(($product->price / 100) * $discount->discount_value) }}</h3>
                            @else
                                <h3 class="product-card-price">{{ currency($product->price) }}</h3>
                            @endif
                            @else
                                <h3 class="product-card-price">{{ currency($product->price) }}</h3>
                            @endif
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <a href="{{ route('product', $product->slug) }}" class="btn bsb2-btn-skin">
                                <span>{{get_phrase('Shop Now!')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                    <path d="M1.07892 6.92357L0.0225108 6.92357L0.022511 9.03639L1.07892 9.03639L1.07892 6.92357ZM16.6257 8.72697C17.0382 8.31442 17.0382 7.64554 16.6257 7.23299L9.90275 0.51005C9.49019 0.0974972 8.82131 0.0974973 8.40876 0.51005C7.99621 0.922603 7.99621 1.59148 8.40876 2.00404L14.3847 7.97998L8.40876 13.9559C7.99621 14.3685 7.99621 15.0374 8.40876 15.4499C8.82131 15.8625 9.49019 15.8625 9.90275 15.4499L16.6257 8.72697ZM1.07892 7.97998L1.07892 9.03639L15.8787 9.03639L15.8787 7.97998L15.8787 6.92357L1.07892 6.92357L1.07892 7.97998Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>
<!-- Best Sellers Area End -->