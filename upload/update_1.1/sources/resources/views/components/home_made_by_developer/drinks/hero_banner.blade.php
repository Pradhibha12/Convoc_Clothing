{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Banner Area End -->
<section class="banner-section section-mb overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-area-main">
                    <div class="banner-left-area">
                        <h1 class="banner-title wow animate__fadeInUp" data-wow-delay=".1s">
                            <span class="banner-title-shape">
                                <img class="shape builder-editable" builder-identity="DH10" src="{{ asset('assets/frontend/drinks/images/pomegranate-shape.png') }}" alt="">
                            </span>
                            <span class="builder-editable" builder-identity="DH1">{{get_phrase('Your Daily Essentials, Delivered Fresh & Fast.')}}</span>
                        </h1>
                        <p class="banner-subtitle wow animate__fadeInUp builder-editable" builder-identity="DH2" data-wow-delay=".2s">{{get_phrase('From crave-worthy snacks to organic produce - shop everything in one place.')}}</p>
                        <div class="d-flex align-items-center gap-20px flex-wrap banner-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn dr-btn-light builder-editable" builder-identity="DH3">{{get_phrase('Start Shopping')}}</a>
                        </div>
                        <div class="banner-circle-typography wow animate__fadeInUp" data-wow-delay=".5s">
                            <img class="typography-shape builder-editable" builder-identity="DH6" src="{{ asset('assets/frontend/drinks/images/circle-typography.png') }}" alt="">
                        </div>
                    </div>
                    <div class="banner-area-banner wow animate__fadeInRight" data-wow-delay=".1s">
                        <img class="banner d-none d-lg-block builder-editable" builder-identity="DH4" src="{{ asset('assets/frontend/drinks/images/banner-image1.webp') }}" alt="banner">
                        <img class="banner d-block d-lg-none builder-editable" builder-identity="DH5" src="{{ asset('assets/frontend/drinks/images/banner-image2.webp') }}" alt="banner">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area Start -->