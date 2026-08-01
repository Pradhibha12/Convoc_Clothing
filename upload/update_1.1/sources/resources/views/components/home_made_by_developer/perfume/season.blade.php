{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Start Fragrance for the Season Area  -->
    <section class="section-mb overflow-x-clip">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="seasonal-title-area">
                        <h2 class="section-title text-center mb-20px max-w-655px mx-auto wow animate__fadeInUp builder-editable" builder-identity="PSA1" data-wow-delay=".1s">{{get_phrase('Fragrance for the Season')}}</h2>
                        <p class="section-subtitle text-center mb-34px max-w-459px mx-auto wow animate__fadeInUp builder-editable" builder-identity="PSA2" data-wow-delay=".2s">{{get_phrase('From cozy winter warmth to breezy summer freshness—scent your season right.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn pf-btn-outline-white px-12px builder-editable" builder-identity="PSA3">{{get_phrase('Explore Seasonal Collections')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".4s">
                <div class="col-12">
                    <div class="seasonal-product-area">
                        <a href="{{route('all_products')}}" class="seasonal-product1">
                            <img class="banner builder-editable" builder-identity="PSA4" src=" {{ asset('assets/frontend/perfume/images/seasonal-banner1.webp')}}" alt="profile">
                            <div class="seasonal-product-title-area">
                                <h3 class="seasonal-product-title builder-editable" builder-identity="PSA5">{{get_phrase('Summer Vibes')}}</h3>
                            </div>
                        </a>
                        <a href="{{route('all_products')}}" class="seasonal-product2">
                             <img class="banner builder-editable" builder-identity="PSA6" src=" {{ asset('assets/frontend/perfume/images/seasonal-banner2.webp')}}" alt="profile">
                            <div class="seasonal-product-title-area">
                                <h3 class="seasonal-product-title builder-editable" builder-identity="PSA7"> {{get_phrase('Winter Warmers')}}</h3>
                            </div>
                        </a>
                        <a href="{{route('all_products')}}" class="seasonal-product1">
                             <img class="banner builder-editable" builder-identity="PSA8" src=" {{ asset('assets/frontend/perfume/images/seasonal-banner3.webp')}}" alt="profile">
                            <div class="seasonal-product-title-area">
                                <h3 class="seasonal-product-title builder-editable" builder-identity="PSA9">{{get_phrase('Gifting Picks')}}</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Fragrance for the Season Area  -->