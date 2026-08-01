{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Start Why Choose US Area  -->
    <section class="section-mb overflow-x-clip">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="why-choose-title-area">
                        <h2 class="section-title text-center mb-20px max-w-908px mx-auto wow animate__fadeInUp builder-editable" builder-identity="PWY1" data-wow-delay=".1s">{{get_phrase('Why Fragrance Lovers Choose Us')}}🌟</h2>
                        <p class="section-subtitle text-center max-w-633px mx-auto wow animate__fadeInUp builder-editable" builder-identity="PWY2" data-wow-delay=".2s">{{get_phrase('Sensual, floral, and timeless scents for every clean, contemporary fragrances that defy gender norms.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="customer-benefit-area">
                        <div>
                            <div class="pf-benefit-wrap1">
                                <div class="pf-benefit-icon mb-20px">
                                    <img class="icon builder-editable" builder-identity="PWY3" src="{{ asset('assets/frontend/perfume/images/benefit-icon1.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px builder-editable" builder-identity="PWY4">{{get_phrase('Authentic Scents')}}</h4>
                                <p class="pf-benefit-subtitle builder-editable" builder-identity="PWY5">{{get_phrase('100% original, verified products')}}</p>
                            </div>
                            <div class="pf-benefit-wrap2">
                                <div class="pf-benefit-icon mb-3">
                                    <img class="icon builder-editable" builder-identity="PWY6" src="{{ asset('assets/frontend/perfume/images/benefit-icon2.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px builder-editable" builder-identity="PWY7">{{get_phrase('Exclusive Deals')}}</h4>
                                <p class="pf-benefit-subtitle builder-editable" builder-identity="PWY8">{{get_phrase('Premium scents at irresistible prices')}}</p>
                            </div>
                        </div>
                        <div class="benefit-banner-area">
                            <img class="banner builder-editable" builder-identity="PWY9" src="{{ asset('assets/frontend/perfume/images/why-choose-banner.webp')}}" alt="banner">
                            <img class="benefit-banner-shape1 "  src="{{ asset('assets/frontend/perfume/images/arrow-vactor1.svg')}}" alt="arrow">
                            <img class="benefit-banner-shape2 "  src="{{ asset('assets/frontend/perfume/images/arrow-vactor2.svg')}}" alt="arrow">
                        </div>
                        <div>
                            <div class="pf-benefit-wrap3">
                                <div class="pf-benefit-icon mb-20px">
                                    <img class="icon builder-editable" builder-identity="PWY12" src="{{ asset('assets/frontend/perfume/images/benefit-icon3.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px builder-editable" builder-identity="PWY13">{{get_phrase('Complimentary Samples')}}</h4>
                                <p class="pf-benefit-subtitle builder-editable" builder-identity="PWY14">{{get_phrase('Enjoy a free sample with every order')}}</p>
                            </div>
                            <div class="pf-benefit-wrap4">
                                <div class="pf-benefit-icon mb-20px">
                                     <img class="icon builder-editable" builder-identity="PWY140" src="{{ asset('assets/frontend/perfume/images/benefit-icon4.svg')}}" alt="icon">
                                </div>
                                <h4 class="pf-benefit-title mb-14px builder-editable" builder-identity="PWY15">{{get_phrase('Fast Shipping')}}</h4>
                                <p class="pf-benefit-subtitle builder-editable" builder-identity="PWY16">{{get_phrase('Delivered fresh and fast across the globe')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{route('all_products')}}" class="btn pf-btn-outline-white builder-editable" builder-identity="PWY19">{{get_phrase('Explore Collection')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Choose US Area  -->