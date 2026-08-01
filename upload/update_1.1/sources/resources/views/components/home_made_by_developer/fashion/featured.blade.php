{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
<!-- Featured Product Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp builder-editable" builder-identity="10" data-wow-delay=".2s">{{get_phrase('Featured products')}}</h1>
                </div>
            </div>
        </div>
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                @php
                    $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                @endphp
                <div class="d-flex column-gap-30px row-gap-4 justify-content-center flex-wrap">
                  <button type="button" data-filter=".show-all" class="btn fsh-mixitup-btn mixitup-control-active">{{ get_phrase('All') }}</button>

                    @foreach($categories->take(4) as $category)
                        <button type="button" data-filter=".cat-{{$category->id}}" class="btn fsh-mixitup-btn"> {{ $category->title }} </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mixitup gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".4s">
                 @php 
                   $allproduct =App\Models\Product::where('status', 1)->latest()->take(8)->get();
                @endphp
               @foreach($allproduct as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mix show-all">
                    <div class="d-block product-grid-md">
                        <div>
                            <div class="product-grid-banner-md mb-12px">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp
                                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                @if($product->label)
                                <span class="red-badge-md capitalize">{{$product->label}}</span>
                                @endif
                                
                                <a href="{{ route('product', $product->slug) }}" class="btn fsh-btn-dark product-cart-btn-md">{{get_phrase('Shop Now')}}</a>
                                <a href="javascript:void(0)"  class="product-wishlist-btn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist" data-bs-placement="left">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="#0D0E10"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:;" class="product-quickview-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View" data-bs-placement="left">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="#0D0E10"/>
                                            <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="#0D0E10"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('product', $product->slug) }}" class="al-title-16px mb-12px product-title-link">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</a>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-start gap-1 mb-12px">
                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="">
                                        <h6 class="al-title-12px fw-medium">{{ number_format($product->average_rating, 1) }}</h6>
                                    </div>
                                    <div class="d-flex align-items-start gap-2">
                                        @if ($product->is_discounted)
                                            @php
                                                $discount = $product->discount;
                                            @endphp
                                            @if ($discount->discount_type == 'percentage')
                                                <h6 class="al-title-16px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h6>
                                                <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                            @else
                                            <h6 class="al-title-16px">{{ currency($product->price) }}</h6>
                                            @endif
                                            @else
                                            <h6 class="al-title-16px">{{ currency($product->price) }}</h6>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($categories->take(4) as $category)
                @php 
                    $catProducts = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()->take(8)->get();
                @endphp
                @foreach($catProducts as $catproduct)
                   <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mix cat-{{$catproduct->category_id}}">
                      <div class="d-block product-grid-md">
                            <div>
                                <div class="product-grid-banner-md mb-12px">
                                    @php
                                        $thumbnails = json_decode($catproduct->thumbnail, true);
                                        $firstImage = $thumbnails[0] ?? null;
                                    @endphp
                                    <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                    @if($catproduct->label)
                                    <span class="red-badge-md capitalize">{{$catproduct->label}}</span>
                                    @endif
                                    <a href="{{ route('product', $catproduct->slug) }}" class="btn fsh-btn-dark product-cart-btn-md">{{get_phrase('Shop Now')}}</a>
                                     <a href="javascript:void(0)"  class="product-wishlist-btn {{ wishlist_class($catproduct->id) }}" 
                                        onclick="toggleWishlist({{ $catproduct->id }}, this)">
                                            <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist" data-bs-placement="left">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="#0D0E10"/>
                                                </svg>
                                            </span>
                                        </a>
                                    <a href="javascript:;" class="product-quickview-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $catproduct->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View" data-bs-placement="left">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="#0D0E10"/>
                                                <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="#0D0E10"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('product', $catproduct->slug) }}" class="al-title-16px mb-12px product-title-link">{{ \Illuminate\Support\Str::limit($catproduct->title, 70, '...') }}</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-start gap-1 mb-12px">
                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="">
                                        <h6 class="al-title-12px fw-medium">{{ number_format($catproduct->average_rating, 1) }}</h6>
                                    </div>
                                        <div class="d-flex align-items-start gap-2">
                                            @if ($catproduct->is_discounted)
                                                @php
                                                    $discount = $catproduct->discount;
                                                @endphp
                                                @if ($discount->discount_type == 'percentage')
                                                    <h6 class="al-title-16px">{{ currency(($catproduct->price / 100) * $discount->discount_value) }}</h6>
                                                    <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($catproduct->price) }}</del></h6>
                                                @else
                                                <h6 class="al-title-16px">{{ currency($catproduct->price) }}</h6>
                                                @endif
                                                @else
                                                <h6 class="al-title-16px">{{ currency($catproduct->price) }}</h6>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                @endforeach
            @endforeach

        </div>
       
    </div>
</section>
<!-- Featured Product Area End -->