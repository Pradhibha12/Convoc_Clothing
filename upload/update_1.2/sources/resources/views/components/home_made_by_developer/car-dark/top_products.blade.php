{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Start Top Products Area -->
    <section class="top-product-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tp-section-title-area">
                        <h5 class="sm-title-badge2 min-w-140px mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="CTC1" data-wow-delay=".1s">{{ get_phrase('Top Products') }}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-15px wow animate__fadeInUp builder-editable" builder-identity="CTC2" data-wow-delay=".2s">{{ get_phrase('our top picks flying off the shelves.') }}</h2>
                        <p class="section-subtitle text-center mb-32px max-w-784px mx-auto wow animate__fadeInUp builder-editable" builder-identity="CTC3" data-wow-delay=".3s">{{ get_phrase('From innovative tech to must-have accessories, these customer favorites are making drives smoother, safer, and more stylish. Don’t miss out — grab yours today!') }}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-white">
                                <span class="builder-editable" builder-identity="CTC4">{{ get_phrase('Explore All Products') }}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-slide-area">
            <div class="top-product-wrapper">
                @php 
                   $topProducts = App\Models\Product::where('status', 1)->where('label', 'top-seller')->latest()->get(); 
                @endphp 

                <div class="top-profile-images wow animate__fadeInUp" data-wow-delay=".4s">
                     @foreach($topProducts  as $product)   
                        <div class="top-product-image">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="">
                            
                        </div>
                    @endforeach
                </div>
                <div class="tp-content-wrap wow animate__fadeInUp" data-wow-delay=".5s">
                    @foreach($topProducts  as $product) 
                    <div class="tp-content-single">
                        <h4 class="top-product-title">{{$product->title}}</h4>
                        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-center mb-3">
                            <div class="tp-rating-wrap">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewbox="0 0 19 20" fill="none">
                                        <path d="M10.0976 3.71266L11.3798 6.03138C11.5555 6.34966 11.9964 6.65201 12.359 6.69288L14.5173 6.96418C15.8992 7.13489 16.2556 8.11561 15.3151 9.14286L13.7128 10.8831C13.4454 11.1748 13.3065 11.7311 13.414 12.113L13.9754 14.1618C14.417 15.7794 13.5772 16.4499 12.1015 15.6553L10.0401 14.5452C9.66462 14.3423 9.06825 14.3718 8.71553 14.5997L6.75309 15.8699C5.34826 16.7778 4.45432 16.1801 4.76258 14.5332L5.15732 12.4489C5.23101 12.0593 5.05433 11.5156 4.76269 11.2481L3.01287 9.64328C1.99168 8.69933 2.26637 7.69325 3.62716 7.40802L5.75194 6.96419C6.11053 6.8863 6.52609 6.55759 6.67199 6.22314L7.76057 3.80283C8.3556 2.49882 9.40535 2.45773 10.0976 3.71266Z" fill="#FFBD39"></path>
                                    </svg>
                                </span>
                                <p>{{ number_format($product->average_rating, 1) }}</p>
                            </div>
                        </div>
                        <div class="tp-price-buttons">
                            <span class="tp-tag-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 36 36" fill="none">
                                    <path d="M32.25 1.98633H22.6484C22.3499 1.98611 22.0634 2.10408 21.8516 2.31446L2.65625 21.5098C2.23595 21.9321 2 22.5037 2 23.0996C2 23.6955 2.23595 24.2671 2.65625 24.6895L11.7969 33.8301C12.2192 34.2504 12.7909 34.4863 13.3867 34.4863C13.9826 34.4863 14.5542 34.2504 14.9766 33.8301L34.1641 14.6426C34.3744 14.4307 34.4924 14.1443 34.4922 13.8457V4.23633C34.4936 3.94111 34.4367 3.64852 34.3246 3.3754C34.2125 3.10227 34.0476 2.85401 33.8392 2.64489C33.6308 2.43577 33.3831 2.26993 33.1104 2.15691C32.8376 2.04389 32.5452 1.98591 32.25 1.98633Z" stroke="#2B2B2B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="tp-price-line"></span>
                            
                                @if ($product->is_discounted()->exists())
                                @if ($product->is_discounted->discount_type == 'flat')
                                    <div class="d-flex gap-2">
                                        <h6 class="tp-content-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                        <h6 class=" fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                @else
                                    @php
                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                    @endphp
                                    <div class="d-flex gap-2">
                                        <h6 class="tp-content-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                            <h6 class=" fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                    
                                @endif
                            @else
                                    <h6 class="tp-content-price">{{ currency($product->price) }}</h6>
                            @endif
                            <div class="d-flex align-items-center gap-10px flex-wrap justify-content-center">
                                <a href="javascript:;" class="btn cab3-btn-skin" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                     @if ($product->is_cart_item)
                                        {{ strtoupper(get_phrase('Added To Cart')) }}
                                    @else
                                        {{ strtoupper(get_phrase('Add To Cart')) }}
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- End Top Products Area -->