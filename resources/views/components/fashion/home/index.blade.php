<!-- Banner Area Start -->
<section class="home-hero-section mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="home-hero-inner-wrap">
                    <!-- Title for tab -->
                        <div class="home-hero-tab-titles d-block d-lg-none">
                        <h2 class="sm-title wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Stylish')}}</h2>
                        <img class="title wow animate__fadeInUp" data-wow-delay=".3s" src="{{ asset('assets/frontend/fashion/images/images/fashion-text..svg') }}" alt="">
                        <p class="sub-title wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('For Any ')}}<span class="fsh-text-skin">{{get_phrase('Season')}}</span></p>
                        </div>
                    <div class="home-hero-banner">
                        <img class="d-none d-lg-block banner" src="{{ asset('assets/frontend/fashion/images/images/fashion-banner-1.webp') }}" alt="banner">
                        <img class="d-block d-lg-none banner" src="{{ asset('assets/frontend/fashion/images/images/fashion-banner-md.png') }}" alt="banner">
                        <div class="home-hero-buttons">
                            <a href="{{route('all_products')}}" class="btn fsh-btn-dark pe-4 icon-right mt-12px wow animate__fadeInUp" data-wow-delay=".3s">
                                <span>{{get_phrase('SHOW MORE')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                    <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"></path>
                                </svg>
                            </a>
                            <a href="{{ get_settings('system_video') }}" class="text-circle-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                                <img class="spin-text" src="{{ asset('assets/frontend/fashion/images/images/circle-text.svg') }}" alt="">
                                <span class="play-icon">
                                    <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.375 8.48446C16.5417 9.15803 16.5417 10.842 15.375 11.5155L2.625 18.8768C1.45833 19.5503 -9.05191e-07 18.7084 -8.46306e-07 17.3612L-2.02768e-07 2.63878C-1.43882e-07 1.29163 1.45833 0.449664 2.625 1.12324L15.375 8.48446Z" fill="white"/>
                                    </svg>                                            
                                </span>                                        
                            </a>
                        </div>
                    </div>
                    <div class="home-hero-list-wrap wow animate__fadeInUp" data-wow-delay=".5s">
                        <h4 class="al-title-24px mb-3">{{get_phrase('In Collaboration')}}</h4>
                        <ul>
                            <li class="fsh-arrow-list-item">{{get_phrase('Jungmave')}}</li>
                            <li class="fsh-arrow-list-item">{{get_phrase('Gildan')}}</li>
                            <li class="fsh-arrow-list-item">{{get_phrase('Roughnext')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!-- Featured Product Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Featured products')}}</h1>
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


<!-- Featured Collection Area Start -->
<section class="mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Featured collections')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-100px collection-banner-row">
            <div class="col-12 wow animate__fadeInUp" data-wow-delay=".1s">
                <div class="collection-banner-wrap1"  style="background: url('{{ asset('assets/frontend/fashion/images/images/collection-top-banner.webp') }}') no-repeat center center / cover;">
                    <div class="collection-sell-percent">
                        <h2 class="title">{{get_phrase('SALE')}}</h2>
                        <h1 class="percentage">{{get_phrase('20%')}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="collection-banner-wrap2">
                    <img class="banner" src="{{ asset('assets/frontend/fashion/images/images/collection-second-banner.webp') }}" alt="banner">
                    <a href="{{route('all_products')}}" class="btn fsh-btn-dark collection-banner-btn">{{get_phrase('SHOP NOW')}}</a>
                </div>
            </div>
            <div class="col-md-6 wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="collection-banner-wrap3">
                    <img class="banner" src="{{ asset('assets/frontend/fashion/images/images/collection-third-banner.webp') }}" alt="banner">
                    <div class="collection-trending-wrap">
                        <h2 class="title">{{get_phrase('AUTUMNM')}}</h2>
                        <h1 class="sub-title">{{get_phrase('TRENDING')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Collection Area End -->


<!-- New Arrivals Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp" data-wow-delay=".2s">{{ get_phrase('New Arrivals') }}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @foreach ($latest_products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
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
                                <a href="{{ route('product', $product->slug) }}" class="btn fsh-btn-dark product-cart-btn-md">{{get_phrase('Show Now')}}</a>
                                 <a href="javascript:void(0)"  class="product-wishlist-btn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist" data-bs-placement="left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="#0D0E10"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:void(0)" class="product-quickview-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
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
                                        <h6 class="al-title-12px fw-medium">{{ $product->average_rating ?? 0 }}</h6>
                                    </div>
                                    <div class="d-flex align-items-start gap-2">
                                        @if ($product->is_discounted)
                                            @php
                                                $discount = $product->discount;
                                            @endphp
                                            @if ($discount->discount_type == 'percentage')
                                                <h6 class="al-title-16px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h6>
                                            @else
                                                <h6 class="al-title-16px">{{ currency($discount->discount_value) }}</h6>
                                            @endif
                                            <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
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
        </div>
        <div class="row mb-100px">
            <div class="col-12">
                <div class="text-center wow animate__fadeInUp" data-wow-delay=".2s">
                    <a href="{{route('all_products')}}" class="btn fsh-btn-dark pe-4 icon-right">
                        <span>{{get_phrase('SHOW MORE')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- New Arrivals Area End -->


<!-- Image Gallery Area Start -->
<section class="fsh-light-section mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp" data-wow-delay=".1s">{{get_phrase('Image Gallery')}}</h1>
                </div>
            </div>
        </div>
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <div class="gallery-images-grid">
                    <div class="gallery-single-image gallery-image-22">
                        <img src="{{ asset('assets/frontend/fashion/images/images/gallery-image1.webp') }}" alt="gallery-image">
                        <a href="javascript:;" class="gallery-social-link-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <g clip-path="url(#clip0_477_12803)">
                                    <path d="M15 2.70117C19.0078 2.70117 19.4824 2.71875 21.0586 2.78906C22.5234 2.85352 23.3145 3.09961 23.8418 3.30469C24.5391 3.57422 25.043 3.90234 25.5645 4.42383C26.0918 4.95117 26.4141 5.44922 26.6836 6.14649C26.8887 6.67383 27.1348 7.4707 27.1992 8.92969C27.2695 10.5117 27.2871 10.9863 27.2871 14.9883C27.2871 18.9961 27.2695 19.4707 27.1992 21.0469C27.1348 22.5117 26.8887 23.3027 26.6836 23.8301C26.4141 24.5273 26.0859 25.0313 25.5645 25.5527C25.0371 26.0801 24.5391 26.4023 23.8418 26.6719C23.3145 26.877 22.5176 27.123 21.0586 27.1875C19.4766 27.2578 19.002 27.2754 15 27.2754C10.9922 27.2754 10.5176 27.2578 8.94141 27.1875C7.47656 27.123 6.68555 26.877 6.1582 26.6719C5.46094 26.4023 4.95703 26.0742 4.43555 25.5527C3.9082 25.0254 3.58594 24.5273 3.31641 23.8301C3.11133 23.3027 2.86523 22.5059 2.80078 21.0469C2.73047 19.4648 2.71289 18.9902 2.71289 14.9883C2.71289 10.9805 2.73047 10.5059 2.80078 8.92969C2.86523 7.46484 3.11133 6.67383 3.31641 6.14649C3.58594 5.44922 3.91406 4.94531 4.43555 4.42383C4.96289 3.89648 5.46094 3.57422 6.1582 3.30469C6.68555 3.09961 7.48242 2.85352 8.94141 2.78906C10.5176 2.71875 10.9922 2.70117 15 2.70117ZM15 0C10.9277 0 10.418 0.0175781 8.81836 0.0878906C7.22461 0.158203 6.12891 0.416016 5.17969 0.785156C4.18945 1.17188 3.35156 1.68164 2.51953 2.51953C1.68164 3.35156 1.17187 4.18945 0.785156 5.17383C0.416016 6.12891 0.158203 7.21875 0.0878906 8.8125C0.0175781 10.418 0 10.9277 0 15C0 19.0723 0.0175781 19.582 0.0878906 21.1816C0.158203 22.7754 0.416016 23.8711 0.785156 24.8203C1.17187 25.8106 1.68164 26.6484 2.51953 27.4805C3.35156 28.3125 4.18945 28.8281 5.17383 29.209C6.12891 29.5781 7.21875 29.8359 8.8125 29.9063C10.4121 29.9766 10.9219 29.9941 14.9941 29.9941C19.0664 29.9941 19.5762 29.9766 21.1758 29.9063C22.7695 29.8359 23.8652 29.5781 24.8145 29.209C25.7988 28.8281 26.6367 28.3125 27.4687 27.4805C28.3008 26.6484 28.8164 25.8106 29.1973 24.8262C29.5664 23.8711 29.8242 22.7813 29.8945 21.1875C29.9648 19.5879 29.9824 19.0781 29.9824 15.0059C29.9824 10.9336 29.9648 10.4238 29.8945 8.82422C29.8242 7.23047 29.5664 6.13477 29.1973 5.18555C28.8281 4.18945 28.3184 3.35156 27.4805 2.51953C26.6484 1.6875 25.8105 1.17188 24.8262 0.791016C23.8711 0.421875 22.7812 0.164063 21.1875 0.09375C19.582 0.0175781 19.0723 0 15 0Z" fill="#0D0E10"/>
                                    <path d="M15.0006 7.29468C10.7467 7.29468 7.29553 10.7458 7.29553 14.9998C7.29553 19.2537 10.7467 22.7048 15.0006 22.7048C19.2545 22.7048 22.7057 19.2537 22.7057 14.9998C22.7057 10.7458 19.2545 7.29468 15.0006 7.29468ZM15.0006 19.9978C12.2408 19.9978 10.0026 17.7595 10.0026 14.9998C10.0026 12.24 12.2408 10.0017 15.0006 10.0017C17.7604 10.0017 19.9987 12.24 19.9987 14.9998C19.9987 17.7595 17.7604 19.9978 15.0006 19.9978Z" fill="#0D0E10"/>
                                    <path d="M24.8093 6.98999C24.8093 7.98609 24.0007 8.78882 23.0105 8.78882C22.0144 8.78882 21.2117 7.98023 21.2117 6.98999C21.2117 5.9939 22.0203 5.19116 23.0105 5.19116C24.0007 5.19116 24.8093 5.99976 24.8093 6.98999Z" fill="#0D0E10"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_477_12803">
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="gallery-single-image gallery-image-11">
                        <img src="{{ asset('assets/frontend/fashion/images/images/gallery-image2.webp') }}" alt="gallery-image">
                        <a href="javascript:;" class="gallery-social-link-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <g clip-path="url(#clip0_477_12803)">
                                    <path d="M15 2.70117C19.0078 2.70117 19.4824 2.71875 21.0586 2.78906C22.5234 2.85352 23.3145 3.09961 23.8418 3.30469C24.5391 3.57422 25.043 3.90234 25.5645 4.42383C26.0918 4.95117 26.4141 5.44922 26.6836 6.14649C26.8887 6.67383 27.1348 7.4707 27.1992 8.92969C27.2695 10.5117 27.2871 10.9863 27.2871 14.9883C27.2871 18.9961 27.2695 19.4707 27.1992 21.0469C27.1348 22.5117 26.8887 23.3027 26.6836 23.8301C26.4141 24.5273 26.0859 25.0313 25.5645 25.5527C25.0371 26.0801 24.5391 26.4023 23.8418 26.6719C23.3145 26.877 22.5176 27.123 21.0586 27.1875C19.4766 27.2578 19.002 27.2754 15 27.2754C10.9922 27.2754 10.5176 27.2578 8.94141 27.1875C7.47656 27.123 6.68555 26.877 6.1582 26.6719C5.46094 26.4023 4.95703 26.0742 4.43555 25.5527C3.9082 25.0254 3.58594 24.5273 3.31641 23.8301C3.11133 23.3027 2.86523 22.5059 2.80078 21.0469C2.73047 19.4648 2.71289 18.9902 2.71289 14.9883C2.71289 10.9805 2.73047 10.5059 2.80078 8.92969C2.86523 7.46484 3.11133 6.67383 3.31641 6.14649C3.58594 5.44922 3.91406 4.94531 4.43555 4.42383C4.96289 3.89648 5.46094 3.57422 6.1582 3.30469C6.68555 3.09961 7.48242 2.85352 8.94141 2.78906C10.5176 2.71875 10.9922 2.70117 15 2.70117ZM15 0C10.9277 0 10.418 0.0175781 8.81836 0.0878906C7.22461 0.158203 6.12891 0.416016 5.17969 0.785156C4.18945 1.17188 3.35156 1.68164 2.51953 2.51953C1.68164 3.35156 1.17187 4.18945 0.785156 5.17383C0.416016 6.12891 0.158203 7.21875 0.0878906 8.8125C0.0175781 10.418 0 10.9277 0 15C0 19.0723 0.0175781 19.582 0.0878906 21.1816C0.158203 22.7754 0.416016 23.8711 0.785156 24.8203C1.17187 25.8106 1.68164 26.6484 2.51953 27.4805C3.35156 28.3125 4.18945 28.8281 5.17383 29.209C6.12891 29.5781 7.21875 29.8359 8.8125 29.9063C10.4121 29.9766 10.9219 29.9941 14.9941 29.9941C19.0664 29.9941 19.5762 29.9766 21.1758 29.9063C22.7695 29.8359 23.8652 29.5781 24.8145 29.209C25.7988 28.8281 26.6367 28.3125 27.4687 27.4805C28.3008 26.6484 28.8164 25.8106 29.1973 24.8262C29.5664 23.8711 29.8242 22.7813 29.8945 21.1875C29.9648 19.5879 29.9824 19.0781 29.9824 15.0059C29.9824 10.9336 29.9648 10.4238 29.8945 8.82422C29.8242 7.23047 29.5664 6.13477 29.1973 5.18555C28.8281 4.18945 28.3184 3.35156 27.4805 2.51953C26.6484 1.6875 25.8105 1.17188 24.8262 0.791016C23.8711 0.421875 22.7812 0.164063 21.1875 0.09375C19.582 0.0175781 19.0723 0 15 0Z" fill="#0D0E10"/>
                                    <path d="M15.0006 7.29468C10.7467 7.29468 7.29553 10.7458 7.29553 14.9998C7.29553 19.2537 10.7467 22.7048 15.0006 22.7048C19.2545 22.7048 22.7057 19.2537 22.7057 14.9998C22.7057 10.7458 19.2545 7.29468 15.0006 7.29468ZM15.0006 19.9978C12.2408 19.9978 10.0026 17.7595 10.0026 14.9998C10.0026 12.24 12.2408 10.0017 15.0006 10.0017C17.7604 10.0017 19.9987 12.24 19.9987 14.9998C19.9987 17.7595 17.7604 19.9978 15.0006 19.9978Z" fill="#0D0E10"/>
                                    <path d="M24.8093 6.98999C24.8093 7.98609 24.0007 8.78882 23.0105 8.78882C22.0144 8.78882 21.2117 7.98023 21.2117 6.98999C21.2117 5.9939 22.0203 5.19116 23.0105 5.19116C24.0007 5.19116 24.8093 5.99976 24.8093 6.98999Z" fill="#0D0E10"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_477_12803">
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="gallery-single-image gallery-image-21">
                        <img src="{{ asset('assets/frontend/fashion/images/images/gallery-image3.webp') }}" alt="gallery-image">
                        <a href="javascript:;" class="gallery-social-link-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <g clip-path="url(#clip0_477_12803)">
                                    <path d="M15 2.70117C19.0078 2.70117 19.4824 2.71875 21.0586 2.78906C22.5234 2.85352 23.3145 3.09961 23.8418 3.30469C24.5391 3.57422 25.043 3.90234 25.5645 4.42383C26.0918 4.95117 26.4141 5.44922 26.6836 6.14649C26.8887 6.67383 27.1348 7.4707 27.1992 8.92969C27.2695 10.5117 27.2871 10.9863 27.2871 14.9883C27.2871 18.9961 27.2695 19.4707 27.1992 21.0469C27.1348 22.5117 26.8887 23.3027 26.6836 23.8301C26.4141 24.5273 26.0859 25.0313 25.5645 25.5527C25.0371 26.0801 24.5391 26.4023 23.8418 26.6719C23.3145 26.877 22.5176 27.123 21.0586 27.1875C19.4766 27.2578 19.002 27.2754 15 27.2754C10.9922 27.2754 10.5176 27.2578 8.94141 27.1875C7.47656 27.123 6.68555 26.877 6.1582 26.6719C5.46094 26.4023 4.95703 26.0742 4.43555 25.5527C3.9082 25.0254 3.58594 24.5273 3.31641 23.8301C3.11133 23.3027 2.86523 22.5059 2.80078 21.0469C2.73047 19.4648 2.71289 18.9902 2.71289 14.9883C2.71289 10.9805 2.73047 10.5059 2.80078 8.92969C2.86523 7.46484 3.11133 6.67383 3.31641 6.14649C3.58594 5.44922 3.91406 4.94531 4.43555 4.42383C4.96289 3.89648 5.46094 3.57422 6.1582 3.30469C6.68555 3.09961 7.48242 2.85352 8.94141 2.78906C10.5176 2.71875 10.9922 2.70117 15 2.70117ZM15 0C10.9277 0 10.418 0.0175781 8.81836 0.0878906C7.22461 0.158203 6.12891 0.416016 5.17969 0.785156C4.18945 1.17188 3.35156 1.68164 2.51953 2.51953C1.68164 3.35156 1.17187 4.18945 0.785156 5.17383C0.416016 6.12891 0.158203 7.21875 0.0878906 8.8125C0.0175781 10.418 0 10.9277 0 15C0 19.0723 0.0175781 19.582 0.0878906 21.1816C0.158203 22.7754 0.416016 23.8711 0.785156 24.8203C1.17187 25.8106 1.68164 26.6484 2.51953 27.4805C3.35156 28.3125 4.18945 28.8281 5.17383 29.209C6.12891 29.5781 7.21875 29.8359 8.8125 29.9063C10.4121 29.9766 10.9219 29.9941 14.9941 29.9941C19.0664 29.9941 19.5762 29.9766 21.1758 29.9063C22.7695 29.8359 23.8652 29.5781 24.8145 29.209C25.7988 28.8281 26.6367 28.3125 27.4687 27.4805C28.3008 26.6484 28.8164 25.8106 29.1973 24.8262C29.5664 23.8711 29.8242 22.7813 29.8945 21.1875C29.9648 19.5879 29.9824 19.0781 29.9824 15.0059C29.9824 10.9336 29.9648 10.4238 29.8945 8.82422C29.8242 7.23047 29.5664 6.13477 29.1973 5.18555C28.8281 4.18945 28.3184 3.35156 27.4805 2.51953C26.6484 1.6875 25.8105 1.17188 24.8262 0.791016C23.8711 0.421875 22.7812 0.164063 21.1875 0.09375C19.582 0.0175781 19.0723 0 15 0Z" fill="#0D0E10"/>
                                    <path d="M15.0006 7.29468C10.7467 7.29468 7.29553 10.7458 7.29553 14.9998C7.29553 19.2537 10.7467 22.7048 15.0006 22.7048C19.2545 22.7048 22.7057 19.2537 22.7057 14.9998C22.7057 10.7458 19.2545 7.29468 15.0006 7.29468ZM15.0006 19.9978C12.2408 19.9978 10.0026 17.7595 10.0026 14.9998C10.0026 12.24 12.2408 10.0017 15.0006 10.0017C17.7604 10.0017 19.9987 12.24 19.9987 14.9998C19.9987 17.7595 17.7604 19.9978 15.0006 19.9978Z" fill="#0D0E10"/>
                                    <path d="M24.8093 6.98999C24.8093 7.98609 24.0007 8.78882 23.0105 8.78882C22.0144 8.78882 21.2117 7.98023 21.2117 6.98999C21.2117 5.9939 22.0203 5.19116 23.0105 5.19116C24.0007 5.19116 24.8093 5.99976 24.8093 6.98999Z" fill="#0D0E10"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_477_12803">
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="gallery-single-image gallery-image-21">
                        <img src="{{ asset('assets/frontend/fashion/images/images/gallery-image4.webp') }}" alt="gallery-image">
                        <a href="javascript:;" class="gallery-social-link-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <g clip-path="url(#clip0_477_12803)">
                                    <path d="M15 2.70117C19.0078 2.70117 19.4824 2.71875 21.0586 2.78906C22.5234 2.85352 23.3145 3.09961 23.8418 3.30469C24.5391 3.57422 25.043 3.90234 25.5645 4.42383C26.0918 4.95117 26.4141 5.44922 26.6836 6.14649C26.8887 6.67383 27.1348 7.4707 27.1992 8.92969C27.2695 10.5117 27.2871 10.9863 27.2871 14.9883C27.2871 18.9961 27.2695 19.4707 27.1992 21.0469C27.1348 22.5117 26.8887 23.3027 26.6836 23.8301C26.4141 24.5273 26.0859 25.0313 25.5645 25.5527C25.0371 26.0801 24.5391 26.4023 23.8418 26.6719C23.3145 26.877 22.5176 27.123 21.0586 27.1875C19.4766 27.2578 19.002 27.2754 15 27.2754C10.9922 27.2754 10.5176 27.2578 8.94141 27.1875C7.47656 27.123 6.68555 26.877 6.1582 26.6719C5.46094 26.4023 4.95703 26.0742 4.43555 25.5527C3.9082 25.0254 3.58594 24.5273 3.31641 23.8301C3.11133 23.3027 2.86523 22.5059 2.80078 21.0469C2.73047 19.4648 2.71289 18.9902 2.71289 14.9883C2.71289 10.9805 2.73047 10.5059 2.80078 8.92969C2.86523 7.46484 3.11133 6.67383 3.31641 6.14649C3.58594 5.44922 3.91406 4.94531 4.43555 4.42383C4.96289 3.89648 5.46094 3.57422 6.1582 3.30469C6.68555 3.09961 7.48242 2.85352 8.94141 2.78906C10.5176 2.71875 10.9922 2.70117 15 2.70117ZM15 0C10.9277 0 10.418 0.0175781 8.81836 0.0878906C7.22461 0.158203 6.12891 0.416016 5.17969 0.785156C4.18945 1.17188 3.35156 1.68164 2.51953 2.51953C1.68164 3.35156 1.17187 4.18945 0.785156 5.17383C0.416016 6.12891 0.158203 7.21875 0.0878906 8.8125C0.0175781 10.418 0 10.9277 0 15C0 19.0723 0.0175781 19.582 0.0878906 21.1816C0.158203 22.7754 0.416016 23.8711 0.785156 24.8203C1.17187 25.8106 1.68164 26.6484 2.51953 27.4805C3.35156 28.3125 4.18945 28.8281 5.17383 29.209C6.12891 29.5781 7.21875 29.8359 8.8125 29.9063C10.4121 29.9766 10.9219 29.9941 14.9941 29.9941C19.0664 29.9941 19.5762 29.9766 21.1758 29.9063C22.7695 29.8359 23.8652 29.5781 24.8145 29.209C25.7988 28.8281 26.6367 28.3125 27.4687 27.4805C28.3008 26.6484 28.8164 25.8106 29.1973 24.8262C29.5664 23.8711 29.8242 22.7813 29.8945 21.1875C29.9648 19.5879 29.9824 19.0781 29.9824 15.0059C29.9824 10.9336 29.9648 10.4238 29.8945 8.82422C29.8242 7.23047 29.5664 6.13477 29.1973 5.18555C28.8281 4.18945 28.3184 3.35156 27.4805 2.51953C26.6484 1.6875 25.8105 1.17188 24.8262 0.791016C23.8711 0.421875 22.7812 0.164063 21.1875 0.09375C19.582 0.0175781 19.0723 0 15 0Z" fill="#0D0E10"/>
                                    <path d="M15.0006 7.29468C10.7467 7.29468 7.29553 10.7458 7.29553 14.9998C7.29553 19.2537 10.7467 22.7048 15.0006 22.7048C19.2545 22.7048 22.7057 19.2537 22.7057 14.9998C22.7057 10.7458 19.2545 7.29468 15.0006 7.29468ZM15.0006 19.9978C12.2408 19.9978 10.0026 17.7595 10.0026 14.9998C10.0026 12.24 12.2408 10.0017 15.0006 10.0017C17.7604 10.0017 19.9987 12.24 19.9987 14.9998C19.9987 17.7595 17.7604 19.9978 15.0006 19.9978Z" fill="#0D0E10"/>
                                    <path d="M24.8093 6.98999C24.8093 7.98609 24.0007 8.78882 23.0105 8.78882C22.0144 8.78882 21.2117 7.98023 21.2117 6.98999C21.2117 5.9939 22.0203 5.19116 23.0105 5.19116C24.0007 5.19116 24.8093 5.99976 24.8093 6.98999Z" fill="#0D0E10"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_477_12803">
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="gallery-single-image gallery-image-11">
                        <img src="{{ asset('assets/frontend/fashion/images/images/gallery-image5.webp') }}" alt="gallery-image">
                        <a href="javascript:;" class="gallery-social-link-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <g clip-path="url(#clip0_477_12803)">
                                    <path d="M15 2.70117C19.0078 2.70117 19.4824 2.71875 21.0586 2.78906C22.5234 2.85352 23.3145 3.09961 23.8418 3.30469C24.5391 3.57422 25.043 3.90234 25.5645 4.42383C26.0918 4.95117 26.4141 5.44922 26.6836 6.14649C26.8887 6.67383 27.1348 7.4707 27.1992 8.92969C27.2695 10.5117 27.2871 10.9863 27.2871 14.9883C27.2871 18.9961 27.2695 19.4707 27.1992 21.0469C27.1348 22.5117 26.8887 23.3027 26.6836 23.8301C26.4141 24.5273 26.0859 25.0313 25.5645 25.5527C25.0371 26.0801 24.5391 26.4023 23.8418 26.6719C23.3145 26.877 22.5176 27.123 21.0586 27.1875C19.4766 27.2578 19.002 27.2754 15 27.2754C10.9922 27.2754 10.5176 27.2578 8.94141 27.1875C7.47656 27.123 6.68555 26.877 6.1582 26.6719C5.46094 26.4023 4.95703 26.0742 4.43555 25.5527C3.9082 25.0254 3.58594 24.5273 3.31641 23.8301C3.11133 23.3027 2.86523 22.5059 2.80078 21.0469C2.73047 19.4648 2.71289 18.9902 2.71289 14.9883C2.71289 10.9805 2.73047 10.5059 2.80078 8.92969C2.86523 7.46484 3.11133 6.67383 3.31641 6.14649C3.58594 5.44922 3.91406 4.94531 4.43555 4.42383C4.96289 3.89648 5.46094 3.57422 6.1582 3.30469C6.68555 3.09961 7.48242 2.85352 8.94141 2.78906C10.5176 2.71875 10.9922 2.70117 15 2.70117ZM15 0C10.9277 0 10.418 0.0175781 8.81836 0.0878906C7.22461 0.158203 6.12891 0.416016 5.17969 0.785156C4.18945 1.17188 3.35156 1.68164 2.51953 2.51953C1.68164 3.35156 1.17187 4.18945 0.785156 5.17383C0.416016 6.12891 0.158203 7.21875 0.0878906 8.8125C0.0175781 10.418 0 10.9277 0 15C0 19.0723 0.0175781 19.582 0.0878906 21.1816C0.158203 22.7754 0.416016 23.8711 0.785156 24.8203C1.17187 25.8106 1.68164 26.6484 2.51953 27.4805C3.35156 28.3125 4.18945 28.8281 5.17383 29.209C6.12891 29.5781 7.21875 29.8359 8.8125 29.9063C10.4121 29.9766 10.9219 29.9941 14.9941 29.9941C19.0664 29.9941 19.5762 29.9766 21.1758 29.9063C22.7695 29.8359 23.8652 29.5781 24.8145 29.209C25.7988 28.8281 26.6367 28.3125 27.4687 27.4805C28.3008 26.6484 28.8164 25.8106 29.1973 24.8262C29.5664 23.8711 29.8242 22.7813 29.8945 21.1875C29.9648 19.5879 29.9824 19.0781 29.9824 15.0059C29.9824 10.9336 29.9648 10.4238 29.8945 8.82422C29.8242 7.23047 29.5664 6.13477 29.1973 5.18555C28.8281 4.18945 28.3184 3.35156 27.4805 2.51953C26.6484 1.6875 25.8105 1.17188 24.8262 0.791016C23.8711 0.421875 22.7812 0.164063 21.1875 0.09375C19.582 0.0175781 19.0723 0 15 0Z" fill="#0D0E10"/>
                                    <path d="M15.0006 7.29468C10.7467 7.29468 7.29553 10.7458 7.29553 14.9998C7.29553 19.2537 10.7467 22.7048 15.0006 22.7048C19.2545 22.7048 22.7057 19.2537 22.7057 14.9998C22.7057 10.7458 19.2545 7.29468 15.0006 7.29468ZM15.0006 19.9978C12.2408 19.9978 10.0026 17.7595 10.0026 14.9998C10.0026 12.24 12.2408 10.0017 15.0006 10.0017C17.7604 10.0017 19.9987 12.24 19.9987 14.9998C19.9987 17.7595 17.7604 19.9978 15.0006 19.9978Z" fill="#0D0E10"/>
                                    <path d="M24.8093 6.98999C24.8093 7.98609 24.0007 8.78882 23.0105 8.78882C22.0144 8.78882 21.2117 7.98023 21.2117 6.98999C21.2117 5.9939 22.0203 5.19116 23.0105 5.19116C24.0007 5.19116 24.8093 5.99976 24.8093 6.98999Z" fill="#0D0E10"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_477_12803">
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Image Gallery Area End -->


<!-- Testimonial Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('What People Are Saying')}}</h1>
                </div>
            </div>
        </div>
        <div class="row mb-100px wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper testimonial testimonial-shadow">
                    <div class="swiper-wrapper">
                        <!-- Single Slide -->
                        @foreach($reviews as $review)
                        <div class="swiper-slide">
                            <div class="single-testimonial-card">
                                <div class="d-flex align-items-center gap-1 mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                      <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="star">
                                    @endfor
                                </div>
                                <p class="al-subtitle-16px fsh-text-dark mb-4">{{ $review->comment }}</p>
                                <h4 class="al-title-16px mb-2">{{ $review->user->name }}</h4>
                                <p class="al-subtitle-14px lh-1">{{ $review->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Slide -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Area End -->


<!-- Sponsors Area Start -->
<section class="overflow-hidden">
    <div>
        <div class="row mb-100px">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper sponsor-slider">
                    <div class="swiper-wrapper">
                        <!-- Single Slide -->
                        @php 
                            $brands = App\Models\Brand::get();
                        @endphp
                        @foreach($brands as $brand)
                            <div class="swiper-slide">
                                <div class="single-sponsor-wrap">
                                    <img src="{{ get_image($brand->logo) }}" alt="sponsor">
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Slide -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sponsors Area End -->


<!-- Latest News Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp" data-wow-delay=".3s">{{get_phrase('Latest News')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-100px wow animate__fadeInUp" data-wow-delay=".3s">
            @foreach($blogs->take(3) as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="fsh-blog-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="fsh-blog-banner mb-3">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </a>
                    <div>
                        <p class="al-subtitle2-16px mb-12px">{{ $blog->created_at->format('d M, Y') }}</p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="al-title-20px mb-20px text-link2">{{ $blog->title }}</a>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn fsh-btn-dark pe-4 icon-right fsh-blog-card-btn">
                            <span>{{get_phrase('READ MORE')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> 
<!-- Latest News Area End -->



