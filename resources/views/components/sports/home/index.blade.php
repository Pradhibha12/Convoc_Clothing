<style>
.category-item1::after {
        background-image: var(--bg-image);
    }
</style>
<!-- Banner Section Start -->
<section class="sp-banner-section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sp-banner-area">
                    <div class="sp-banner-left">
                        <div class="banner-title-btn-wrap">
                            <h1 class="bn-title-40px banner-left-title text-white">{{get_phrase('TAKE YOUR GAME TO THE NEXT LEVEL')}}</h1>
                            <div class="d-flex align-items-center gap-18px flex-wrap justify-content-center justify-content-sm-start">
                                <a href="{{route('all_products')}}" class="btn ec-btn-skin">{{get_phrase('Shop Now')}}</a>
                                <a href="{{ get_settings('system_video') }}" class="video-play-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                                    <span>{{get_phrase('Watch Video')}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61" fill="none">
                                        <circle opacity="0.13" cx="30.5" cy="30.5" r="24.5" fill="white"/>
                                        <circle opacity="0.07" cx="30.5" cy="30.5" r="30.5" fill="white"/>
                                        <circle cx="30.5" cy="30.5" r="18.5" fill="#C3FF3D"/>
                                        <path d="M37.0625 28.9845C38.2292 29.658 38.2292 31.342 37.0625 32.0155L28.5313 36.9411C27.3646 37.6146 25.9062 36.7727 25.9062 35.4255L25.9062 25.5745C25.9062 24.2273 27.3646 23.3854 28.5312 24.0589L37.0625 28.9845Z" fill="#0E1B29"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="banner-happy-customer-wrap d-none d-lg-block">
                            <div class="happy-customer-title">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.1531 10.2951L18.4236 12.9255C18.0489 13.2861 17.7943 14.0074 17.8721 14.5236L18.2964 17.6066C18.5721 19.5794 17.3488 20.435 15.5811 19.5158L12.5829 17.946C12.0809 17.6843 11.2606 17.6985 10.7727 17.9884L8.14937 19.5228C6.07755 20.732 4.84012 19.8198 5.39166 17.4864L6.16241 14.2266C6.30383 13.6326 6.0422 12.8195 5.59672 12.4164L3.11478 10.1749C1.33994 8.56974 1.83491 7.11311 4.22493 6.92926L7.25135 6.70298C7.81704 6.66056 8.50293 6.21508 8.76456 5.71303L10.3343 2.70076C11.2606 0.940064 12.7526 0.947135 13.6507 2.72197L15.0507 5.49383C15.2912 5.96052 15.8993 6.41307 16.4155 6.49085L20.1631 7.09896C22.1854 7.43837 22.6309 8.8738 21.1531 10.2951Z" fill="#FBBF27"/>
                                </svg>
                                <span>{{get_phrase('Happy Customer')}}</span>
                            </div>
                            @php
                                $reviewCount = App\Models\Product::avg('average_rating');
                                $reviewCount = round($reviewCount, 1); 
                                $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 

                                $fullStars   = floor($reviewCount); 
                                $halfStar    = ($reviewCount - $fullStars >= 0.5) ? 1 : 0; 
                                $emptyStars  = 5 - ($fullStars + $halfStar); 
                            @endphp
                            <p class="happy-customer-subtitle">{{ number_format($reviewCount, 1) }} {{get_phrase('base on')}} {{ $totalRatings }} {{get_phrase('reviews')}}</p>
                        </div>
                    </div>
                    <div class="sp-banner-image">
                        <img src="{{ asset('assets/frontend/sports/images/all-images/sp-banner-image.webp') }}" alt="banner">
                    </div>
                    <div class="sp-banner-right">
                        <div class="sp-banner-right-wrap">
                            <div class="bannerR-titles-wrap">
                                <h1 class="bn-title-84px text-white mb-12px">{{get_phrase('100K')}}</h1>
                                <p class="al-subtitle3-16px bannerR-first-subtitle">{{get_phrase('Also, there’s a tilt and height-adjusting mechanism.')}}</p>
                                <p class="al-subtitle3-16px">{{get_phrase('The gently curved lines accentuated by sewn details are kind to your body.')}}</p>
                            </div>
                            <div class="banner-partners-area">
                                <h4 class="banner-partner-title">{{get_phrase('Partners With ')}}<span class="line"></span></h4>
                                <ul class="d-flex align-items-center gap-20px  justify-content-center justify-content-sm-start">
                                    @php 
                                       $brands = App\Models\Brand::orderBy('id', 'desc')->take(3)->get();

                                   @endphp
                                @foreach($brands as $brand)
                                    <li><a href="{{$brand->official_website_link}}" target="_blank" class="svg-block">
                                       <img class="brand"  src="{{ get_image($brand->logo) }}" alt="">
                                    </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->


<!-- Featured Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="bn-title-60px text-uppercase">{{get_phrase('Featured Categories')}}</h1>
            </div>
        </div>
        <div class="row gy-4 section-margin wow animate__fadeInUp" data-wow-delay=".2s">
            
            @php
              $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(4)->get();
            @endphp
            @foreach ($categories as $category)
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-item category-item1" data-image="{{ get_image($category->thumbnail) }}">
                   
                    <h3 class="category-title">{{$category->title}}</h3>
                    <a href="{{ route('products', $category->slug) }}" class="btn ec-md-btn-skin category-btn">{{get_phrase('Shop Now')}}</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Featured Section End -->


<!-- Popular Products Tab Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <div class="d-flex align-items-center gap-3 flex-wrap justify-content-between">
                    <h1 class="bn-title-60px text-uppercase">{{get_phrase('POPULAR PRODUCTS')}}</h1>
                        <ul class="nav nav-pills popular-nav-pills" id="pills-tab" role="tablist">
                             
                            @foreach ($categories->take(4) as $key => $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if($key == 0) active @endif"
                                            id="pills-category{{ $category->id }}-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#pills-category{{ $category->id }}"
                                            type="button"
                                            role="tab"
                                            aria-controls="pills-category{{ $category->id }}"
                                            aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                        {{ $category->title }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                   @foreach ($categories->take(4) as $key => $category)
                    @php 
                        $catProducts = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()->take(8)->get();
                    @endphp
                  
                     <div class="tab-pane fade @if($key == 0) show active @endif" id="pills-category{{ $category->id }}"
                            role="tabpanel" aria-labelledby="pills-category{{ $category->id }}-tab" tabindex="0">
                        <div class="row gy-4">
                            @forelse($catProducts as $product)
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="product-md-card">
                                    <div class="product-md-banner mb-3">
                                        @if($product->label)
                                        <p class="product-sky-badge capitalize">{{$product->label}}</p>
                                        @endif
                                        @php
                                            $thumbnails = json_decode($product->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                        
                                        <a href="javascript:void(0)"   class="dark-light-iconbtn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                                            <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0004 17.5059C9.75927 17.5059 9.52593 17.4748 9.33149 17.4048C6.36038 16.3859 1.63927 12.7692 1.63927 7.42586C1.63927 4.70364 3.84038 2.49475 6.54705 2.49475C7.86149 2.49475 9.09038 3.00808 10.0004 3.92586C10.9104 3.00808 12.1393 2.49475 13.4537 2.49475C16.1604 2.49475 18.3615 4.71142 18.3615 7.42586C18.3615 12.777 13.6404 16.3859 10.6693 17.4048C10.4748 17.4748 10.2415 17.5059 10.0004 17.5059ZM6.54705 3.66142C4.48593 3.66142 2.80593 5.3492 2.80593 7.42586C2.80593 12.7381 7.91593 15.6936 9.7126 16.3081C9.8526 16.3548 10.1559 16.3548 10.2959 16.3081C12.0848 15.6936 17.2026 12.7459 17.2026 7.42586C17.2026 5.3492 15.5226 3.66142 13.4615 3.66142C12.2793 3.66142 11.1826 4.21364 10.4748 5.17031C10.257 5.46586 9.75927 5.46586 9.54149 5.17031C8.81816 4.20586 7.72927 3.66142 6.54705 3.66142Z" fill="white"/>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="{{ route('product', $product->slug) }}" class="add-to-cart-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M13.5417 18.75C14.3471 18.75 15 18.0971 15 17.2917C15 16.4863 14.3471 15.8334 13.5417 15.8334C12.7363 15.8334 12.0833 16.4863 12.0833 17.2917C12.0833 18.0971 12.7363 18.75 13.5417 18.75Z" fill="#0D1927"/>
                                                <path d="M6.87499 18.75C7.68041 18.75 8.33332 18.0971 8.33332 17.2917C8.33332 16.4863 7.68041 15.8334 6.87499 15.8334C6.06957 15.8334 5.41666 16.4863 5.41666 17.2917C5.41666 18.0971 6.06957 18.75 6.87499 18.75Z" fill="#0D1927"/>
                                                <path d="M4.03332 3.28329L3.86666 5.32496C3.83332 5.71663 4.14166 6.04163 4.53332 6.04163H17.2917C17.6417 6.04163 17.9333 5.77496 17.9583 5.42496C18.0667 3.94996 16.9417 2.74996 15.4667 2.74996H5.22499C5.14166 2.38329 4.97499 2.03329 4.71666 1.74163C4.29999 1.29996 3.71666 1.04163 3.11666 1.04163H1.66666C1.32499 1.04163 1.04166 1.32496 1.04166 1.66663C1.04166 2.00829 1.32499 2.29163 1.66666 2.29163H3.11666C3.37499 2.29163 3.61666 2.39996 3.79166 2.58329C3.96666 2.77496 4.04999 3.02496 4.03332 3.28329Z" fill="#0D1927"/>
                                                <path d="M17.0917 7.29163H4.30833C3.95833 7.29163 3.67499 7.55829 3.64166 7.89996L3.34166 11.525C3.22499 12.95 4.34166 14.1666 5.76666 14.1666H15.0333C16.2833 14.1666 17.3833 13.1416 17.475 11.8916L17.75 7.99996C17.7833 7.61663 17.4833 7.29163 17.0917 7.29163Z" fill="#0D1927"/>
                                            </svg>
                                            <span>{{get_phrase('Shop Now')}}</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M17.7083 7.62494C15.7833 4.59994 12.9667 2.85828 9.99999 2.85828C8.51666 2.85828 7.07499 3.29161 5.75832 4.09994C4.44166 4.91661 3.25832 6.10828 2.29166 7.62494C1.45832 8.93328 1.45832 11.0583 2.29166 12.3666C4.21666 15.3999 7.03332 17.1333 9.99999 17.1333C11.4833 17.1333 12.925 16.6999 14.2417 15.8916C15.5583 15.0749 16.7417 13.8833 17.7083 12.3666C18.5417 11.0666 18.5417 8.93328 17.7083 7.62494ZM9.99999 13.3666C8.13332 13.3666 6.63332 11.8583 6.63332 9.99994C6.63332 8.14161 8.13332 6.63328 9.99999 6.63328C11.8667 6.63328 13.3667 8.14161 13.3667 9.99994C13.3667 11.8583 11.8667 13.3666 9.99999 13.3666Z" fill="white"/>
                                                <path d="M9.9965 8C8.89667 8 8 8.89667 8 10.0035C8 11.1033 8.89667 12 9.9965 12C11.0963 12 12 11.1033 12 10.0035C12 8.90368 11.0963 8 9.9965 8Z" fill="white"/>
                                            </svg>
                                            <span>{{get_phrase('Quick View')}}</span>
                                        </a>
                                    </div>
                                    <div class="product-md-details eBottoms">
                                        <a href="{{ route('product', $product->slug) }}" class="mb-10px al-title-16px text-link">{{ $product->title }}</a>
                                        <p class="mb-3 al-subtitle-14px capitalize">{{$product->quality_label}}</p>
                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                              @if ($product->is_discounted)
                                                    @php
                                                        $discount = $product->discount;
                                                    @endphp
                                                    @if ($discount->discount_type == 'percentage')
                                                        <h4 class="al-title-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                                        <h5 class="al-title-16px fw-medium ec-text-secondary"><del>{{ currency($product->price) }}</del></h5>
                                                    @else
                                                        <h4 class="al-title-18px">{{ currency($discount->discount_value) }}</h4>
                                                    @endif
                                                @else
                                                    <h4 class="al-title-18px">{{ currency($product->price) }}</h4>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Products Tab Section End -->


<!-- Discount Section Start -->
<section>
    <div class="container">
        <div class="row section-margin">
            <div class="col-12">
                <div class="ec-discount-area wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="ec-discount-inner">
                        <div class="black-n-white-badge mb-3">
                            <span class="left">{{get_phrase('SALE')}}</span> <span class="right">{{get_phrase('50%')}}</span>
                        </div>
                        <p class="al-subtitle-16px ec-text-dark mb-30px">{{get_phrase('The gently curved lines accentuated by sewn details are kind to your body.')}}</p>
                        <a href="{{route('all_products')}}" class="btn ec-btn-dark">{{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->


<!-- Top Product Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <div class="d-flex align-items-center gap-3 flex-wrap justify-content-between">
                    <h1 class="bn-title-60px text-uppercase">{{get_phrase('TOP PRODUCTS')}}</h1>
                    <a href="{{route('all_products')}}" class="btn ec-btn-outline-dark">{{get_phrase('View More')}}</a>
                </div>
            </div>
        </div>
        <div class="row gy-4 section-margin wow animate__fadeInUp" data-wow-delay=".2s">
             @php 
                   $topProducts =App\Models\Product::where('status', 1)->where('label', 'top-seller')->latest()->take(4)->get();
            @endphp
            @foreach($topProducts as $product)
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
               <div class="product-md-card">
                    <div class="product-md-banner mb-3">
                        @if($product->label)
                        <p class="product-sky-badge capitalize">{{$product->label}}</p>
                        @endif
                        @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                        <a href="javascript:void(0)"  class="dark-light-iconbtn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                            <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0004 17.5059C9.75927 17.5059 9.52593 17.4748 9.33149 17.4048C6.36038 16.3859 1.63927 12.7692 1.63927 7.42586C1.63927 4.70364 3.84038 2.49475 6.54705 2.49475C7.86149 2.49475 9.09038 3.00808 10.0004 3.92586C10.9104 3.00808 12.1393 2.49475 13.4537 2.49475C16.1604 2.49475 18.3615 4.71142 18.3615 7.42586C18.3615 12.777 13.6404 16.3859 10.6693 17.4048C10.4748 17.4748 10.2415 17.5059 10.0004 17.5059ZM6.54705 3.66142C4.48593 3.66142 2.80593 5.3492 2.80593 7.42586C2.80593 12.7381 7.91593 15.6936 9.7126 16.3081C9.8526 16.3548 10.1559 16.3548 10.2959 16.3081C12.0848 15.6936 17.2026 12.7459 17.2026 7.42586C17.2026 5.3492 15.5226 3.66142 13.4615 3.66142C12.2793 3.66142 11.1826 4.21364 10.4748 5.17031C10.257 5.46586 9.75927 5.46586 9.54149 5.17031C8.81816 4.20586 7.72927 3.66142 6.54705 3.66142Z" fill="white"/>
                                </svg>
                            </span>
                        </a>
                        <a href="{{ route('product', $product->slug) }}" class="add-to-cart-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M13.5417 18.75C14.3471 18.75 15 18.0971 15 17.2917C15 16.4863 14.3471 15.8334 13.5417 15.8334C12.7363 15.8334 12.0833 16.4863 12.0833 17.2917C12.0833 18.0971 12.7363 18.75 13.5417 18.75Z" fill="#0D1927"/>
                                <path d="M6.87499 18.75C7.68041 18.75 8.33332 18.0971 8.33332 17.2917C8.33332 16.4863 7.68041 15.8334 6.87499 15.8334C6.06957 15.8334 5.41666 16.4863 5.41666 17.2917C5.41666 18.0971 6.06957 18.75 6.87499 18.75Z" fill="#0D1927"/>
                                <path d="M4.03332 3.28329L3.86666 5.32496C3.83332 5.71663 4.14166 6.04163 4.53332 6.04163H17.2917C17.6417 6.04163 17.9333 5.77496 17.9583 5.42496C18.0667 3.94996 16.9417 2.74996 15.4667 2.74996H5.22499C5.14166 2.38329 4.97499 2.03329 4.71666 1.74163C4.29999 1.29996 3.71666 1.04163 3.11666 1.04163H1.66666C1.32499 1.04163 1.04166 1.32496 1.04166 1.66663C1.04166 2.00829 1.32499 2.29163 1.66666 2.29163H3.11666C3.37499 2.29163 3.61666 2.39996 3.79166 2.58329C3.96666 2.77496 4.04999 3.02496 4.03332 3.28329Z" fill="#0D1927"/>
                                <path d="M17.0917 7.29163H4.30833C3.95833 7.29163 3.67499 7.55829 3.64166 7.89996L3.34166 11.525C3.22499 12.95 4.34166 14.1666 5.76666 14.1666H15.0333C16.2833 14.1666 17.3833 13.1416 17.475 11.8916L17.75 7.99996C17.7833 7.61663 17.4833 7.29163 17.0917 7.29163Z" fill="#0D1927"/>
                            </svg>
                            <span>{{get_phrase('Shop Now')}}</span>
                        </a>
                        <a href="javascript:void(0)" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M17.7083 7.62494C15.7833 4.59994 12.9667 2.85828 9.99999 2.85828C8.51666 2.85828 7.07499 3.29161 5.75832 4.09994C4.44166 4.91661 3.25832 6.10828 2.29166 7.62494C1.45832 8.93328 1.45832 11.0583 2.29166 12.3666C4.21666 15.3999 7.03332 17.1333 9.99999 17.1333C11.4833 17.1333 12.925 16.6999 14.2417 15.8916C15.5583 15.0749 16.7417 13.8833 17.7083 12.3666C18.5417 11.0666 18.5417 8.93328 17.7083 7.62494ZM9.99999 13.3666C8.13332 13.3666 6.63332 11.8583 6.63332 9.99994C6.63332 8.14161 8.13332 6.63328 9.99999 6.63328C11.8667 6.63328 13.3667 8.14161 13.3667 9.99994C13.3667 11.8583 11.8667 13.3666 9.99999 13.3666Z" fill="white"/>
                                <path d="M9.9965 8C8.89667 8 8 8.89667 8 10.0035C8 11.1033 8.89667 12 9.9965 12C11.0963 12 12 11.1033 12 10.0035C12 8.90368 11.0963 8 9.9965 8Z" fill="white"/>
                            </svg>
                            <span>{{get_phrase('Quick View')}}</span>
                        </a>
                    </div>
                    <div class="product-md-details eBottoms">
                        <a href="{{ route('product', $product->slug) }}" class="mb-10px al-title-16px text-link">{{ $product->title }}</a>
                        <p class="mb-3 al-subtitle-14px capitalize">{{$product->quality_label}}</p>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                        <h4 class="al-title-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                        <h5 class="al-title-16px fw-medium ec-text-secondary"><del>{{ currency($product->price) }}</del></h5>
                                    @else
                                        <h4 class="al-title-18px">{{ currency($discount->discount_value) }}</h4>
                                    @endif
                                @else
                                    <h4 class="al-title-18px">{{ currency($product->price) }}</h4>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Top Product Section End -->


<!-- Follow Us Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="bn-title-60px text-uppercase">{{get_phrase('Follow us on Instagram')}}</h1>
            </div>
        </div>
        <div class="row section-margin gy-4 wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-lg-7">
                <div class="d-flex gap-20px flex-wrap mb-20px">
                    <div class="masonry-grid-item masonry-grid-item1">
                        <img class="banner" src="{{ asset('assets/frontend/sports/images/all-images/follow-banner-1.webp') }}" alt="">
                        <a href="javascript:;" class="ec-follow-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <g clip-path="url(#clip0_797_16884)">
                                    <path d="M20 3.60156C25.3438 3.60156 25.9766 3.625 28.0781 3.71875C30.0312 3.80469 31.0859 4.13281 31.7891 4.40625C32.7188 4.76563 33.3906 5.20313 34.0859 5.89844C34.7891 6.60156 35.2188 7.26563 35.5781 8.19531C35.8516 8.89844 36.1797 9.96094 36.2656 11.9062C36.3594 14.0156 36.3828 14.6484 36.3828 19.9844C36.3828 25.3281 36.3594 25.9609 36.2656 28.0625C36.1797 30.0156 35.8516 31.0703 35.5781 31.7734C35.2188 32.7031 34.7812 33.375 34.0859 34.0703C33.3828 34.7734 32.7188 35.2031 31.7891 35.5625C31.0859 35.8359 30.0234 36.1641 28.0781 36.25C25.9688 36.3438 25.3359 36.3672 20 36.3672C14.6562 36.3672 14.0234 36.3438 11.9219 36.25C9.96875 36.1641 8.91406 35.8359 8.21094 35.5625C7.28125 35.2031 6.60937 34.7656 5.91406 34.0703C5.21094 33.3672 4.78125 32.7031 4.42187 31.7734C4.14844 31.0703 3.82031 30.0078 3.73438 28.0625C3.64062 25.9531 3.61719 25.3203 3.61719 19.9844C3.61719 14.6406 3.64062 14.0078 3.73438 11.9062C3.82031 9.95312 4.14844 8.89844 4.42187 8.19531C4.78125 7.26563 5.21875 6.59375 5.91406 5.89844C6.61719 5.19531 7.28125 4.76563 8.21094 4.40625C8.91406 4.13281 9.97656 3.80469 11.9219 3.71875C14.0234 3.625 14.6562 3.60156 20 3.60156ZM20 0C14.5703 0 13.8906 0.0234375 11.7578 0.117188C9.63281 0.210938 8.17188 0.554687 6.90625 1.04688C5.58594 1.5625 4.46875 2.24219 3.35938 3.35938C2.24219 4.46875 1.5625 5.58594 1.04687 6.89844C0.554687 8.17188 0.210938 9.625 0.117188 11.75C0.0234375 13.8906 0 14.5703 0 20C0 25.4297 0.0234375 26.1094 0.117188 28.2422C0.210938 30.3672 0.554687 31.8281 1.04687 33.0938C1.5625 34.4141 2.24219 35.5312 3.35938 36.6406C4.46875 37.75 5.58594 38.4375 6.89844 38.9453C8.17188 39.4375 9.625 39.7812 11.75 39.875C13.8828 39.9688 14.5625 39.9922 19.9922 39.9922C25.4219 39.9922 26.1016 39.9688 28.2344 39.875C30.3594 39.7812 31.8203 39.4375 33.0859 38.9453C34.3984 38.4375 35.5156 37.75 36.625 36.6406C37.7344 35.5312 38.4219 34.4141 38.9297 33.1016C39.4219 31.8281 39.7656 30.375 39.8594 28.25C39.9531 26.1172 39.9766 25.4375 39.9766 20.0078C39.9766 14.5781 39.9531 13.8984 39.8594 11.7656C39.7656 9.64063 39.4219 8.17969 38.9297 6.91406C38.4375 5.58594 37.7578 4.46875 36.6406 3.35938C35.5312 2.25 34.4141 1.5625 33.1016 1.05469C31.8281 0.5625 30.375 0.21875 28.25 0.125C26.1094 0.0234375 25.4297 0 20 0Z" fill="#C3FF3D"/>
                                    <path d="M20.0007 9.72632C14.3289 9.72632 9.72729 14.3279 9.72729 19.9998C9.72729 25.6716 14.3289 30.2732 20.0007 30.2732C25.6726 30.2732 30.2742 25.6716 30.2742 19.9998C30.2742 14.3279 25.6726 9.72632 20.0007 9.72632ZM20.0007 26.6638C16.321 26.6638 13.3367 23.6794 13.3367 19.9998C13.3367 16.3201 16.321 13.3357 20.0007 13.3357C23.6804 13.3357 26.6648 16.3201 26.6648 19.9998C26.6648 23.6794 23.6804 26.6638 20.0007 26.6638Z" fill="#C3FF3D"/>
                                    <path d="M33.0791 9.32007C33.0791 10.6482 32.001 11.7185 30.6807 11.7185C29.3525 11.7185 28.2822 10.6404 28.2822 9.32007C28.2822 7.99194 29.3604 6.92163 30.6807 6.92163C32.001 6.92163 33.0791 7.99976 33.0791 9.32007Z" fill="#C3FF3D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_797_16884">
                                    <rect width="40" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="masonry-grid-item masonry-grid-item2">
                        <img class="banner" src="{{ asset('assets/frontend/sports/images/all-images/follow-banner-2.webp') }}" alt="">
                        <a href="javascript:;" class="ec-follow-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <g clip-path="url(#clip0_797_16884)">
                                    <path d="M20 3.60156C25.3438 3.60156 25.9766 3.625 28.0781 3.71875C30.0312 3.80469 31.0859 4.13281 31.7891 4.40625C32.7188 4.76563 33.3906 5.20313 34.0859 5.89844C34.7891 6.60156 35.2188 7.26563 35.5781 8.19531C35.8516 8.89844 36.1797 9.96094 36.2656 11.9062C36.3594 14.0156 36.3828 14.6484 36.3828 19.9844C36.3828 25.3281 36.3594 25.9609 36.2656 28.0625C36.1797 30.0156 35.8516 31.0703 35.5781 31.7734C35.2188 32.7031 34.7812 33.375 34.0859 34.0703C33.3828 34.7734 32.7188 35.2031 31.7891 35.5625C31.0859 35.8359 30.0234 36.1641 28.0781 36.25C25.9688 36.3438 25.3359 36.3672 20 36.3672C14.6562 36.3672 14.0234 36.3438 11.9219 36.25C9.96875 36.1641 8.91406 35.8359 8.21094 35.5625C7.28125 35.2031 6.60937 34.7656 5.91406 34.0703C5.21094 33.3672 4.78125 32.7031 4.42187 31.7734C4.14844 31.0703 3.82031 30.0078 3.73438 28.0625C3.64062 25.9531 3.61719 25.3203 3.61719 19.9844C3.61719 14.6406 3.64062 14.0078 3.73438 11.9062C3.82031 9.95312 4.14844 8.89844 4.42187 8.19531C4.78125 7.26563 5.21875 6.59375 5.91406 5.89844C6.61719 5.19531 7.28125 4.76563 8.21094 4.40625C8.91406 4.13281 9.97656 3.80469 11.9219 3.71875C14.0234 3.625 14.6562 3.60156 20 3.60156ZM20 0C14.5703 0 13.8906 0.0234375 11.7578 0.117188C9.63281 0.210938 8.17188 0.554687 6.90625 1.04688C5.58594 1.5625 4.46875 2.24219 3.35938 3.35938C2.24219 4.46875 1.5625 5.58594 1.04687 6.89844C0.554687 8.17188 0.210938 9.625 0.117188 11.75C0.0234375 13.8906 0 14.5703 0 20C0 25.4297 0.0234375 26.1094 0.117188 28.2422C0.210938 30.3672 0.554687 31.8281 1.04687 33.0938C1.5625 34.4141 2.24219 35.5312 3.35938 36.6406C4.46875 37.75 5.58594 38.4375 6.89844 38.9453C8.17188 39.4375 9.625 39.7812 11.75 39.875C13.8828 39.9688 14.5625 39.9922 19.9922 39.9922C25.4219 39.9922 26.1016 39.9688 28.2344 39.875C30.3594 39.7812 31.8203 39.4375 33.0859 38.9453C34.3984 38.4375 35.5156 37.75 36.625 36.6406C37.7344 35.5312 38.4219 34.4141 38.9297 33.1016C39.4219 31.8281 39.7656 30.375 39.8594 28.25C39.9531 26.1172 39.9766 25.4375 39.9766 20.0078C39.9766 14.5781 39.9531 13.8984 39.8594 11.7656C39.7656 9.64063 39.4219 8.17969 38.9297 6.91406C38.4375 5.58594 37.7578 4.46875 36.6406 3.35938C35.5312 2.25 34.4141 1.5625 33.1016 1.05469C31.8281 0.5625 30.375 0.21875 28.25 0.125C26.1094 0.0234375 25.4297 0 20 0Z" fill="#C3FF3D"/>
                                    <path d="M20.0007 9.72632C14.3289 9.72632 9.72729 14.3279 9.72729 19.9998C9.72729 25.6716 14.3289 30.2732 20.0007 30.2732C25.6726 30.2732 30.2742 25.6716 30.2742 19.9998C30.2742 14.3279 25.6726 9.72632 20.0007 9.72632ZM20.0007 26.6638C16.321 26.6638 13.3367 23.6794 13.3367 19.9998C13.3367 16.3201 16.321 13.3357 20.0007 13.3357C23.6804 13.3357 26.6648 16.3201 26.6648 19.9998C26.6648 23.6794 23.6804 26.6638 20.0007 26.6638Z" fill="#C3FF3D"/>
                                    <path d="M33.0791 9.32007C33.0791 10.6482 32.001 11.7185 30.6807 11.7185C29.3525 11.7185 28.2822 10.6404 28.2822 9.32007C28.2822 7.99194 29.3604 6.92163 30.6807 6.92163C32.001 6.92163 33.0791 7.99976 33.0791 9.32007Z" fill="#C3FF3D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_797_16884">
                                    <rect width="40" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex gap-20px flex-wrap">
                    <div class="masonry-grid-item masonry-grid-item5">
                        <img class="banner" src="{{ asset('assets/frontend/sports/images/all-images/follow-banner-5.webp') }}" alt="">
                        <a href="javascript:;" class="ec-follow-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <g clip-path="url(#clip0_797_16884)">
                                    <path d="M20 3.60156C25.3438 3.60156 25.9766 3.625 28.0781 3.71875C30.0312 3.80469 31.0859 4.13281 31.7891 4.40625C32.7188 4.76563 33.3906 5.20313 34.0859 5.89844C34.7891 6.60156 35.2188 7.26563 35.5781 8.19531C35.8516 8.89844 36.1797 9.96094 36.2656 11.9062C36.3594 14.0156 36.3828 14.6484 36.3828 19.9844C36.3828 25.3281 36.3594 25.9609 36.2656 28.0625C36.1797 30.0156 35.8516 31.0703 35.5781 31.7734C35.2188 32.7031 34.7812 33.375 34.0859 34.0703C33.3828 34.7734 32.7188 35.2031 31.7891 35.5625C31.0859 35.8359 30.0234 36.1641 28.0781 36.25C25.9688 36.3438 25.3359 36.3672 20 36.3672C14.6562 36.3672 14.0234 36.3438 11.9219 36.25C9.96875 36.1641 8.91406 35.8359 8.21094 35.5625C7.28125 35.2031 6.60937 34.7656 5.91406 34.0703C5.21094 33.3672 4.78125 32.7031 4.42187 31.7734C4.14844 31.0703 3.82031 30.0078 3.73438 28.0625C3.64062 25.9531 3.61719 25.3203 3.61719 19.9844C3.61719 14.6406 3.64062 14.0078 3.73438 11.9062C3.82031 9.95312 4.14844 8.89844 4.42187 8.19531C4.78125 7.26563 5.21875 6.59375 5.91406 5.89844C6.61719 5.19531 7.28125 4.76563 8.21094 4.40625C8.91406 4.13281 9.97656 3.80469 11.9219 3.71875C14.0234 3.625 14.6562 3.60156 20 3.60156ZM20 0C14.5703 0 13.8906 0.0234375 11.7578 0.117188C9.63281 0.210938 8.17188 0.554687 6.90625 1.04688C5.58594 1.5625 4.46875 2.24219 3.35938 3.35938C2.24219 4.46875 1.5625 5.58594 1.04687 6.89844C0.554687 8.17188 0.210938 9.625 0.117188 11.75C0.0234375 13.8906 0 14.5703 0 20C0 25.4297 0.0234375 26.1094 0.117188 28.2422C0.210938 30.3672 0.554687 31.8281 1.04687 33.0938C1.5625 34.4141 2.24219 35.5312 3.35938 36.6406C4.46875 37.75 5.58594 38.4375 6.89844 38.9453C8.17188 39.4375 9.625 39.7812 11.75 39.875C13.8828 39.9688 14.5625 39.9922 19.9922 39.9922C25.4219 39.9922 26.1016 39.9688 28.2344 39.875C30.3594 39.7812 31.8203 39.4375 33.0859 38.9453C34.3984 38.4375 35.5156 37.75 36.625 36.6406C37.7344 35.5312 38.4219 34.4141 38.9297 33.1016C39.4219 31.8281 39.7656 30.375 39.8594 28.25C39.9531 26.1172 39.9766 25.4375 39.9766 20.0078C39.9766 14.5781 39.9531 13.8984 39.8594 11.7656C39.7656 9.64063 39.4219 8.17969 38.9297 6.91406C38.4375 5.58594 37.7578 4.46875 36.6406 3.35938C35.5312 2.25 34.4141 1.5625 33.1016 1.05469C31.8281 0.5625 30.375 0.21875 28.25 0.125C26.1094 0.0234375 25.4297 0 20 0Z" fill="#C3FF3D"/>
                                    <path d="M20.0007 9.72632C14.3289 9.72632 9.72729 14.3279 9.72729 19.9998C9.72729 25.6716 14.3289 30.2732 20.0007 30.2732C25.6726 30.2732 30.2742 25.6716 30.2742 19.9998C30.2742 14.3279 25.6726 9.72632 20.0007 9.72632ZM20.0007 26.6638C16.321 26.6638 13.3367 23.6794 13.3367 19.9998C13.3367 16.3201 16.321 13.3357 20.0007 13.3357C23.6804 13.3357 26.6648 16.3201 26.6648 19.9998C26.6648 23.6794 23.6804 26.6638 20.0007 26.6638Z" fill="#C3FF3D"/>
                                    <path d="M33.0791 9.32007C33.0791 10.6482 32.001 11.7185 30.6807 11.7185C29.3525 11.7185 28.2822 10.6404 28.2822 9.32007C28.2822 7.99194 29.3604 6.92163 30.6807 6.92163C32.001 6.92163 33.0791 7.99976 33.0791 9.32007Z" fill="#C3FF3D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_797_16884">
                                    <rect width="40" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="masonry-grid-item masonry-grid-item6">
                        <img class="banner" src="{{ asset('assets/frontend/sports/images/all-images/follow-banner-6.webp') }}" alt="">
                        <a href="#" class="ec-follow-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <g clip-path="url(#clip0_797_16884)">
                                    <path d="M20 3.60156C25.3438 3.60156 25.9766 3.625 28.0781 3.71875C30.0312 3.80469 31.0859 4.13281 31.7891 4.40625C32.7188 4.76563 33.3906 5.20313 34.0859 5.89844C34.7891 6.60156 35.2188 7.26563 35.5781 8.19531C35.8516 8.89844 36.1797 9.96094 36.2656 11.9062C36.3594 14.0156 36.3828 14.6484 36.3828 19.9844C36.3828 25.3281 36.3594 25.9609 36.2656 28.0625C36.1797 30.0156 35.8516 31.0703 35.5781 31.7734C35.2188 32.7031 34.7812 33.375 34.0859 34.0703C33.3828 34.7734 32.7188 35.2031 31.7891 35.5625C31.0859 35.8359 30.0234 36.1641 28.0781 36.25C25.9688 36.3438 25.3359 36.3672 20 36.3672C14.6562 36.3672 14.0234 36.3438 11.9219 36.25C9.96875 36.1641 8.91406 35.8359 8.21094 35.5625C7.28125 35.2031 6.60937 34.7656 5.91406 34.0703C5.21094 33.3672 4.78125 32.7031 4.42187 31.7734C4.14844 31.0703 3.82031 30.0078 3.73438 28.0625C3.64062 25.9531 3.61719 25.3203 3.61719 19.9844C3.61719 14.6406 3.64062 14.0078 3.73438 11.9062C3.82031 9.95312 4.14844 8.89844 4.42187 8.19531C4.78125 7.26563 5.21875 6.59375 5.91406 5.89844C6.61719 5.19531 7.28125 4.76563 8.21094 4.40625C8.91406 4.13281 9.97656 3.80469 11.9219 3.71875C14.0234 3.625 14.6562 3.60156 20 3.60156ZM20 0C14.5703 0 13.8906 0.0234375 11.7578 0.117188C9.63281 0.210938 8.17188 0.554687 6.90625 1.04688C5.58594 1.5625 4.46875 2.24219 3.35938 3.35938C2.24219 4.46875 1.5625 5.58594 1.04687 6.89844C0.554687 8.17188 0.210938 9.625 0.117188 11.75C0.0234375 13.8906 0 14.5703 0 20C0 25.4297 0.0234375 26.1094 0.117188 28.2422C0.210938 30.3672 0.554687 31.8281 1.04687 33.0938C1.5625 34.4141 2.24219 35.5312 3.35938 36.6406C4.46875 37.75 5.58594 38.4375 6.89844 38.9453C8.17188 39.4375 9.625 39.7812 11.75 39.875C13.8828 39.9688 14.5625 39.9922 19.9922 39.9922C25.4219 39.9922 26.1016 39.9688 28.2344 39.875C30.3594 39.7812 31.8203 39.4375 33.0859 38.9453C34.3984 38.4375 35.5156 37.75 36.625 36.6406C37.7344 35.5312 38.4219 34.4141 38.9297 33.1016C39.4219 31.8281 39.7656 30.375 39.8594 28.25C39.9531 26.1172 39.9766 25.4375 39.9766 20.0078C39.9766 14.5781 39.9531 13.8984 39.8594 11.7656C39.7656 9.64063 39.4219 8.17969 38.9297 6.91406C38.4375 5.58594 37.7578 4.46875 36.6406 3.35938C35.5312 2.25 34.4141 1.5625 33.1016 1.05469C31.8281 0.5625 30.375 0.21875 28.25 0.125C26.1094 0.0234375 25.4297 0 20 0Z" fill="#C3FF3D"/>
                                    <path d="M20.0007 9.72632C14.3289 9.72632 9.72729 14.3279 9.72729 19.9998C9.72729 25.6716 14.3289 30.2732 20.0007 30.2732C25.6726 30.2732 30.2742 25.6716 30.2742 19.9998C30.2742 14.3279 25.6726 9.72632 20.0007 9.72632ZM20.0007 26.6638C16.321 26.6638 13.3367 23.6794 13.3367 19.9998C13.3367 16.3201 16.321 13.3357 20.0007 13.3357C23.6804 13.3357 26.6648 16.3201 26.6648 19.9998C26.6648 23.6794 23.6804 26.6638 20.0007 26.6638Z" fill="#C3FF3D"/>
                                    <path d="M33.0791 9.32007C33.0791 10.6482 32.001 11.7185 30.6807 11.7185C29.3525 11.7185 28.2822 10.6404 28.2822 9.32007C28.2822 7.99194 29.3604 6.92163 30.6807 6.92163C32.001 6.92163 33.0791 7.99976 33.0791 9.32007Z" fill="#C3FF3D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_797_16884">
                                    <rect width="40" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex gap-20px flex-wrap mb-20px">
                    <div class="masonry-grid-item masonry-grid-item3">
                        <img class="banner" src="{{ asset('assets/frontend/sports/images/all-images/follow-banner-3.webp') }}" alt="">
                       <a href="javascript:;" class="ec-follow-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <g clip-path="url(#clip0_797_16884)">
                                    <path d="M20 3.60156C25.3438 3.60156 25.9766 3.625 28.0781 3.71875C30.0312 3.80469 31.0859 4.13281 31.7891 4.40625C32.7188 4.76563 33.3906 5.20313 34.0859 5.89844C34.7891 6.60156 35.2188 7.26563 35.5781 8.19531C35.8516 8.89844 36.1797 9.96094 36.2656 11.9062C36.3594 14.0156 36.3828 14.6484 36.3828 19.9844C36.3828 25.3281 36.3594 25.9609 36.2656 28.0625C36.1797 30.0156 35.8516 31.0703 35.5781 31.7734C35.2188 32.7031 34.7812 33.375 34.0859 34.0703C33.3828 34.7734 32.7188 35.2031 31.7891 35.5625C31.0859 35.8359 30.0234 36.1641 28.0781 36.25C25.9688 36.3438 25.3359 36.3672 20 36.3672C14.6562 36.3672 14.0234 36.3438 11.9219 36.25C9.96875 36.1641 8.91406 35.8359 8.21094 35.5625C7.28125 35.2031 6.60937 34.7656 5.91406 34.0703C5.21094 33.3672 4.78125 32.7031 4.42187 31.7734C4.14844 31.0703 3.82031 30.0078 3.73438 28.0625C3.64062 25.9531 3.61719 25.3203 3.61719 19.9844C3.61719 14.6406 3.64062 14.0078 3.73438 11.9062C3.82031 9.95312 4.14844 8.89844 4.42187 8.19531C4.78125 7.26563 5.21875 6.59375 5.91406 5.89844C6.61719 5.19531 7.28125 4.76563 8.21094 4.40625C8.91406 4.13281 9.97656 3.80469 11.9219 3.71875C14.0234 3.625 14.6562 3.60156 20 3.60156ZM20 0C14.5703 0 13.8906 0.0234375 11.7578 0.117188C9.63281 0.210938 8.17188 0.554687 6.90625 1.04688C5.58594 1.5625 4.46875 2.24219 3.35938 3.35938C2.24219 4.46875 1.5625 5.58594 1.04687 6.89844C0.554687 8.17188 0.210938 9.625 0.117188 11.75C0.0234375 13.8906 0 14.5703 0 20C0 25.4297 0.0234375 26.1094 0.117188 28.2422C0.210938 30.3672 0.554687 31.8281 1.04687 33.0938C1.5625 34.4141 2.24219 35.5312 3.35938 36.6406C4.46875 37.75 5.58594 38.4375 6.89844 38.9453C8.17188 39.4375 9.625 39.7812 11.75 39.875C13.8828 39.9688 14.5625 39.9922 19.9922 39.9922C25.4219 39.9922 26.1016 39.9688 28.2344 39.875C30.3594 39.7812 31.8203 39.4375 33.0859 38.9453C34.3984 38.4375 35.5156 37.75 36.625 36.6406C37.7344 35.5312 38.4219 34.4141 38.9297 33.1016C39.4219 31.8281 39.7656 30.375 39.8594 28.25C39.9531 26.1172 39.9766 25.4375 39.9766 20.0078C39.9766 14.5781 39.9531 13.8984 39.8594 11.7656C39.7656 9.64063 39.4219 8.17969 38.9297 6.91406C38.4375 5.58594 37.7578 4.46875 36.6406 3.35938C35.5312 2.25 34.4141 1.5625 33.1016 1.05469C31.8281 0.5625 30.375 0.21875 28.25 0.125C26.1094 0.0234375 25.4297 0 20 0Z" fill="#C3FF3D"/>
                                    <path d="M20.0007 9.72632C14.3289 9.72632 9.72729 14.3279 9.72729 19.9998C9.72729 25.6716 14.3289 30.2732 20.0007 30.2732C25.6726 30.2732 30.2742 25.6716 30.2742 19.9998C30.2742 14.3279 25.6726 9.72632 20.0007 9.72632ZM20.0007 26.6638C16.321 26.6638 13.3367 23.6794 13.3367 19.9998C13.3367 16.3201 16.321 13.3357 20.0007 13.3357C23.6804 13.3357 26.6648 16.3201 26.6648 19.9998C26.6648 23.6794 23.6804 26.6638 20.0007 26.6638Z" fill="#C3FF3D"/>
                                    <path d="M33.0791 9.32007C33.0791 10.6482 32.001 11.7185 30.6807 11.7185C29.3525 11.7185 28.2822 10.6404 28.2822 9.32007C28.2822 7.99194 29.3604 6.92163 30.6807 6.92163C32.001 6.92163 33.0791 7.99976 33.0791 9.32007Z" fill="#C3FF3D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_797_16884">
                                    <rect width="40" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="masonry-grid-item masonry-grid-item4">
                        <img class="banner" src="{{ asset('assets/frontend/sports/images/all-images/follow-banner-4.webp') }}" alt="">
                        <a href="javascript:;" class="ec-follow-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <g clip-path="url(#clip0_797_16884)">
                                    <path d="M20 3.60156C25.3438 3.60156 25.9766 3.625 28.0781 3.71875C30.0312 3.80469 31.0859 4.13281 31.7891 4.40625C32.7188 4.76563 33.3906 5.20313 34.0859 5.89844C34.7891 6.60156 35.2188 7.26563 35.5781 8.19531C35.8516 8.89844 36.1797 9.96094 36.2656 11.9062C36.3594 14.0156 36.3828 14.6484 36.3828 19.9844C36.3828 25.3281 36.3594 25.9609 36.2656 28.0625C36.1797 30.0156 35.8516 31.0703 35.5781 31.7734C35.2188 32.7031 34.7812 33.375 34.0859 34.0703C33.3828 34.7734 32.7188 35.2031 31.7891 35.5625C31.0859 35.8359 30.0234 36.1641 28.0781 36.25C25.9688 36.3438 25.3359 36.3672 20 36.3672C14.6562 36.3672 14.0234 36.3438 11.9219 36.25C9.96875 36.1641 8.91406 35.8359 8.21094 35.5625C7.28125 35.2031 6.60937 34.7656 5.91406 34.0703C5.21094 33.3672 4.78125 32.7031 4.42187 31.7734C4.14844 31.0703 3.82031 30.0078 3.73438 28.0625C3.64062 25.9531 3.61719 25.3203 3.61719 19.9844C3.61719 14.6406 3.64062 14.0078 3.73438 11.9062C3.82031 9.95312 4.14844 8.89844 4.42187 8.19531C4.78125 7.26563 5.21875 6.59375 5.91406 5.89844C6.61719 5.19531 7.28125 4.76563 8.21094 4.40625C8.91406 4.13281 9.97656 3.80469 11.9219 3.71875C14.0234 3.625 14.6562 3.60156 20 3.60156ZM20 0C14.5703 0 13.8906 0.0234375 11.7578 0.117188C9.63281 0.210938 8.17188 0.554687 6.90625 1.04688C5.58594 1.5625 4.46875 2.24219 3.35938 3.35938C2.24219 4.46875 1.5625 5.58594 1.04687 6.89844C0.554687 8.17188 0.210938 9.625 0.117188 11.75C0.0234375 13.8906 0 14.5703 0 20C0 25.4297 0.0234375 26.1094 0.117188 28.2422C0.210938 30.3672 0.554687 31.8281 1.04687 33.0938C1.5625 34.4141 2.24219 35.5312 3.35938 36.6406C4.46875 37.75 5.58594 38.4375 6.89844 38.9453C8.17188 39.4375 9.625 39.7812 11.75 39.875C13.8828 39.9688 14.5625 39.9922 19.9922 39.9922C25.4219 39.9922 26.1016 39.9688 28.2344 39.875C30.3594 39.7812 31.8203 39.4375 33.0859 38.9453C34.3984 38.4375 35.5156 37.75 36.625 36.6406C37.7344 35.5312 38.4219 34.4141 38.9297 33.1016C39.4219 31.8281 39.7656 30.375 39.8594 28.25C39.9531 26.1172 39.9766 25.4375 39.9766 20.0078C39.9766 14.5781 39.9531 13.8984 39.8594 11.7656C39.7656 9.64063 39.4219 8.17969 38.9297 6.91406C38.4375 5.58594 37.7578 4.46875 36.6406 3.35938C35.5312 2.25 34.4141 1.5625 33.1016 1.05469C31.8281 0.5625 30.375 0.21875 28.25 0.125C26.1094 0.0234375 25.4297 0 20 0Z" fill="#C3FF3D"/>
                                    <path d="M20.0007 9.72632C14.3289 9.72632 9.72729 14.3279 9.72729 19.9998C9.72729 25.6716 14.3289 30.2732 20.0007 30.2732C25.6726 30.2732 30.2742 25.6716 30.2742 19.9998C30.2742 14.3279 25.6726 9.72632 20.0007 9.72632ZM20.0007 26.6638C16.321 26.6638 13.3367 23.6794 13.3367 19.9998C13.3367 16.3201 16.321 13.3357 20.0007 13.3357C23.6804 13.3357 26.6648 16.3201 26.6648 19.9998C26.6648 23.6794 23.6804 26.6638 20.0007 26.6638Z" fill="#C3FF3D"/>
                                    <path d="M33.0791 9.32007C33.0791 10.6482 32.001 11.7185 30.6807 11.7185C29.3525 11.7185 28.2822 10.6404 28.2822 9.32007C28.2822 7.99194 29.3604 6.92163 30.6807 6.92163C32.001 6.92163 33.0791 7.99976 33.0791 9.32007Z" fill="#C3FF3D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_797_16884">
                                    <rect width="40" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="masonry-grid-item masonry-grid-item7">
                    <img class="banner" src="{{ asset('assets/frontend/sports/images/all-images/follow-banner-7.webp') }}" alt="">
                    <a href="javascript:;" class="ec-follow-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <g clip-path="url(#clip0_797_16884)">
                                <path d="M20 3.60156C25.3438 3.60156 25.9766 3.625 28.0781 3.71875C30.0312 3.80469 31.0859 4.13281 31.7891 4.40625C32.7188 4.76563 33.3906 5.20313 34.0859 5.89844C34.7891 6.60156 35.2188 7.26563 35.5781 8.19531C35.8516 8.89844 36.1797 9.96094 36.2656 11.9062C36.3594 14.0156 36.3828 14.6484 36.3828 19.9844C36.3828 25.3281 36.3594 25.9609 36.2656 28.0625C36.1797 30.0156 35.8516 31.0703 35.5781 31.7734C35.2188 32.7031 34.7812 33.375 34.0859 34.0703C33.3828 34.7734 32.7188 35.2031 31.7891 35.5625C31.0859 35.8359 30.0234 36.1641 28.0781 36.25C25.9688 36.3438 25.3359 36.3672 20 36.3672C14.6562 36.3672 14.0234 36.3438 11.9219 36.25C9.96875 36.1641 8.91406 35.8359 8.21094 35.5625C7.28125 35.2031 6.60937 34.7656 5.91406 34.0703C5.21094 33.3672 4.78125 32.7031 4.42187 31.7734C4.14844 31.0703 3.82031 30.0078 3.73438 28.0625C3.64062 25.9531 3.61719 25.3203 3.61719 19.9844C3.61719 14.6406 3.64062 14.0078 3.73438 11.9062C3.82031 9.95312 4.14844 8.89844 4.42187 8.19531C4.78125 7.26563 5.21875 6.59375 5.91406 5.89844C6.61719 5.19531 7.28125 4.76563 8.21094 4.40625C8.91406 4.13281 9.97656 3.80469 11.9219 3.71875C14.0234 3.625 14.6562 3.60156 20 3.60156ZM20 0C14.5703 0 13.8906 0.0234375 11.7578 0.117188C9.63281 0.210938 8.17188 0.554687 6.90625 1.04688C5.58594 1.5625 4.46875 2.24219 3.35938 3.35938C2.24219 4.46875 1.5625 5.58594 1.04687 6.89844C0.554687 8.17188 0.210938 9.625 0.117188 11.75C0.0234375 13.8906 0 14.5703 0 20C0 25.4297 0.0234375 26.1094 0.117188 28.2422C0.210938 30.3672 0.554687 31.8281 1.04687 33.0938C1.5625 34.4141 2.24219 35.5312 3.35938 36.6406C4.46875 37.75 5.58594 38.4375 6.89844 38.9453C8.17188 39.4375 9.625 39.7812 11.75 39.875C13.8828 39.9688 14.5625 39.9922 19.9922 39.9922C25.4219 39.9922 26.1016 39.9688 28.2344 39.875C30.3594 39.7812 31.8203 39.4375 33.0859 38.9453C34.3984 38.4375 35.5156 37.75 36.625 36.6406C37.7344 35.5312 38.4219 34.4141 38.9297 33.1016C39.4219 31.8281 39.7656 30.375 39.8594 28.25C39.9531 26.1172 39.9766 25.4375 39.9766 20.0078C39.9766 14.5781 39.9531 13.8984 39.8594 11.7656C39.7656 9.64063 39.4219 8.17969 38.9297 6.91406C38.4375 5.58594 37.7578 4.46875 36.6406 3.35938C35.5312 2.25 34.4141 1.5625 33.1016 1.05469C31.8281 0.5625 30.375 0.21875 28.25 0.125C26.1094 0.0234375 25.4297 0 20 0Z" fill="#C3FF3D"/>
                                <path d="M20.0007 9.72632C14.3289 9.72632 9.72729 14.3279 9.72729 19.9998C9.72729 25.6716 14.3289 30.2732 20.0007 30.2732C25.6726 30.2732 30.2742 25.6716 30.2742 19.9998C30.2742 14.3279 25.6726 9.72632 20.0007 9.72632ZM20.0007 26.6638C16.321 26.6638 13.3367 23.6794 13.3367 19.9998C13.3367 16.3201 16.321 13.3357 20.0007 13.3357C23.6804 13.3357 26.6648 16.3201 26.6648 19.9998C26.6648 23.6794 23.6804 26.6638 20.0007 26.6638Z" fill="#C3FF3D"/>
                                <path d="M33.0791 9.32007C33.0791 10.6482 32.001 11.7185 30.6807 11.7185C29.3525 11.7185 28.2822 10.6404 28.2822 9.32007C28.2822 7.99194 29.3604 6.92163 30.6807 6.92163C32.001 6.92163 33.0791 7.99976 33.0791 9.32007Z" fill="#C3FF3D"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_797_16884">
                                <rect width="40" height="40" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Follow Us Section End -->


<!-- Customer Feedback Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="bn-title-60px text-uppercase">{{get_phrase('Our Customer Feedback')}}</h1>
            </div>
        </div>
    </div>
    <div class="testimonial-main-wrap section-margin wow animate__fadeInUp" data-wow-delay=".2s">
        <!-- Swiper -->
        <div class="swiper testimonials">
            <div class="swiper-wrapper">
               @foreach($reviews as $review)
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <h5 class="al-title-16px fw-semibold mb-4">{{ $review->created_at->format('F j, Y') }}</h5>
                        <p class="al-subtitle-16px ec-text-dark mb-30px">“{{ $review->comment }}”</p>
                        <div class="d-flex align-items-center gap-12px">
                            <div class="testimonial-profile">
                                <img src="{{ get_image($review->user->photo) }}" alt="user">
                            </div>
                            <div>
                                <h4 class="al-title-16px mb-2">{{ $review->user->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</section>
<!-- Customer Feedback Section End -->


<!-- Blog Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="bn-title-60px text-uppercase">{{get_phrase('TOP BLOGS')}}</h1>
            </div>
        </div>
        <div class=" section-margin justify-content-center wow animate__fadeInUp" data-wow-delay=".2s">
           <div class="row gy-4">
                @foreach($blogs->take(3) as $key => $blog)
                    @if($loop->first)
                        {{-- Left big card --}}
                        <div class="col-lg-5">
                            <div class="blog-grid-card">
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-grid-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                                <div class="blog-grid-details">
                                    <div class="svg-block d-flex align-items-center gap-6px mb-12px">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.9999 1.8335C5.94908 1.8335 1.83325 5.94933 1.83325 11.0002C1.83325 16.051 5.94908 20.1668 10.9999 20.1668C16.0508 20.1668 20.1666 16.051 20.1666 11.0002C20.1666 5.94933 16.0508 1.8335 10.9999 1.8335ZM14.9874 14.2727C14.8591 14.4927 14.6299 14.6118 14.3916 14.6118C14.2724 14.6118 14.1533 14.5843 14.0433 14.511L11.2016 12.8152C10.4958 12.3935 9.97325 11.4677 9.97325 10.6518V6.8935C9.97325 6.51766 10.2849 6.206 10.6608 6.206C11.0366 6.206 11.3483 6.51766 11.3483 6.8935V10.6518C11.3483 10.9818 11.6233 11.4677 11.9074 11.6327L14.7491 13.3285C15.0791 13.521 15.1891 13.9427 14.9874 14.2727Z" fill="#959595"/>
                                        </svg>
                                        <p class="al-subtitle-16px lh-1 mt-2px">{{ $blog->created_at->format('d M, Y') }}</p>
                                    </div>
                                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="text-link al-title-24px mb-3">{{ $blog->title }}</a>
                                    <p class="al-subtitle-16px mb-26px">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                                    <div class="d-flex align-items-center gap-12px eBottoms">
                                        <div class="rounded-img-44px">
                                            <img src="{{ get_image($blog->user->photo) }}" alt="">
                                        </div>
                                        <div>
                                            <p class="al-subtitle-14px mb-2">{{ get_phrase('Written by') }}</p>
                                            <h4 class="al-title-16px">{{ $blog->user->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Start right column --}}
                        <div class="col-lg-7">
                    @else
                            {{-- Right side stacked cards --}}
                            <div class="blog-list-card mb-20px">
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-list-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                                <div class="blog-list-details">
                                    <div class="svg-block d-flex align-items-center gap-6px mb-12px">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.9999 1.8335C5.94908 1.8335 1.83325 5.94933 1.83325 11.0002C1.83325 16.051 5.94908 20.1668 10.9999 20.1668C16.0508 20.1668 20.1666 16.051 20.1666 11.0002C20.1666 5.94933 16.0508 1.8335 10.9999 1.8335ZM14.9874 14.2727C14.8591 14.4927 14.6299 14.6118 14.3916 14.6118C14.2724 14.6118 14.1533 14.5843 14.0433 14.511L11.2016 12.8152C10.4958 12.3935 9.97325 11.4677 9.97325 10.6518V6.8935C9.97325 6.51766 10.2849 6.206 10.6608 6.206C11.0366 6.206 11.3483 6.51766 11.3483 6.8935V10.6518C11.3483 10.9818 11.6233 11.4677 11.9074 11.6327L14.7491 13.3285C15.0791 13.521 15.1891 13.9427 14.9874 14.2727Z" fill="#959595"/>
                                        </svg>
                                        <p class="al-subtitle-16px lh-1 mt-2px">{{ $blog->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="text-link al-title-24px mb-3">{{ $blog->title }}</a>
                                    <p class="al-subtitle-16px mb-20px">{{ \Illuminate\Support\Str::limit($blog->summary, 70, '...') }}</p>
                                    <div class="d-flex align-items-center gap-12px eBottoms">
                                        <div class="rounded-img-44px">
                                            <img src="{{ get_image($blog->user->photo) }}" alt="">
                                        </div>
                                        <div>
                                            <p class="al-subtitle-14px mb-2">{{ get_phrase('Written by') }}</p>
                                            <h4 class="al-title-16px">{{ $blog->user->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif

                    @if($loop->last)
                        </div> {{-- close right column --}}
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</section>
<!-- Blog Section End -->


@push('js')
<script type="text/javascript">

	    "use strict";
    document.querySelectorAll('.category-item1').forEach(item => {
    let img = item.getAttribute('data-image');
    item.style.setProperty('--bg-image', `url(${img})`);
});

</script>
@endpush