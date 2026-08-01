{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

  <!-- Start Banner Area  -->
    <section class="pf-banner-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-area-main">
                        <div class="banner-content-area">
                            <div class="banner-title-outer wow animate__fadeInUp" data-wow-delay=".1s">
                                <h1 class="pf-banner-title builder-editable" builder-identity="PH1">{{get_phrase('Discover Your Signature Scent.')}}</h1>
                                <img class="title-shape1" src="{{ asset('assets/frontend/perfume/images/banner-title-shape1.svg')}}" alt="shape">
                                <img class="title-shape2" src="{{ asset('assets/frontend/perfume/images/banner-title-shape2.svg')}}" alt="shape">
                            </div>
                            <p class="pf-banner-subtitle wow animate__fadeInUp builder-editable" builder-identity="PH2" data-wow-delay=".2s">{{get_phrase('Elevate your essence with our curated collection of luxury & designer fragrances for every mood & moment.')}}</p>
                            <a href="{{route('all_products')}}" class="btn eBynow pf-btn-outline-white wow animate__fadeInUp builder-editable" builder-identity="PH3" data-wow-delay=".3s">{{get_phrase('Buy Now!')}}</a>
                            <div class="banner-arrow-banner-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                                <a href="javascript:;" class="banner-discover-btn">
                                    <div>
                                        <div class="bn-discover-arrow">
                                            <span class="fi-rr-arrows-h-copy text-white"></span>
                                        </div>
                                        <p class="builder-editable" builder-identity="PH4">{{get_phrase('Discover More')}}</p>
                                    </div>
                                </a>
                                <div class="pf-sm-banner-wrap">
                                    <p class="pf-sm-banner-text builder-editable" builder-identity="PH5" >{{get_phrase('100% Unique Products')}}</p>
                                    <img class="sm-banner builder-editable" builder-identity="PH6"  src=" {{ asset('assets/frontend/perfume/images/sm-banner.webp')}}" alt="banner">
                                </div>
                            </div>
                        </div>
                        <div class="pf-banner-area wow animate__fadeInRight" data-wow-delay=".2s">
                            <img class="banner builder-editable" builder-identity="PH7" src="{{ asset('assets/frontend/perfume/images/banner.webp')}}" alt="banner">
                            <div class="bn-product-served-badge">
                                <div class="d-flex align-items-center">
                                    <img class="product-served-image builder-editable" builder-identity="PH8" src="{{ asset('assets/frontend/perfume/images/product-sm1.png')}}" alt="product">
                                    <img class="product-served-image builder-editable" builder-identity="PH9" src="{{ asset('assets/frontend/perfume/images/product-sm2.png')}}" alt="product">
                                    <img class="product-served-image builder-editable" builder-identity="PH10" src="{{ asset('assets/frontend/perfume/images/product-sm3.png')}}" alt="product">
                                </div>
                                <h5 class="product-served-badge-title builder-editable" builder-identity="PH11">{{get_phrase('1K+ Products Served')}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area  -->