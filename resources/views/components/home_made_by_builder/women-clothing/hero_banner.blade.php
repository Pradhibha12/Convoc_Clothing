{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}  
  
  <!-- Hero Area Start -->
    <section class="hero-section overflow-hidden"> 
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-content-area">
                        <div class="hero-position-image1 wow animate__fadeInLeft" data-wow-delay=".1s">
                            <img class="img builder-editable" builder-identity="WOB1" src=" {{ asset('assets/frontend/women-clothing/images/new-hero-banner1.png') }}" alt="">
                        </div>
                        <div class="hero-position-image2 wow animate__fadeInRight" data-wow-delay=".1s">
                            <img class="img builder-editable" builder-identity="WOB2" src="{{ asset('assets/frontend/women-clothing/images/new-hero-banner2.png') }}" alt="">
                        </div>
                        <!-- Swiper -->
                        <div class="swiper hero-slider wow animate__fadeInUp" data-wow-delay=".2s">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="hero-slide-content">
                                        <p class="hero-title-badge builder-editable" builder-identity="WOB3">{{get_phrase('Brand For Woman’s Fashion')}}</p>
                                        <h1 class="hero-title builder-editable" builder-identity="WOB4">{{get_phrase('Style that feels natural')}}</h1>
                                        <p class="hero-subtitle builder-editable" builder-identity="WOB5">{{get_phrase('Step into a world where fashion meets femininity.')}}</p>
                                        <div class="text-center">
                                            <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn builder-editable" builder-identity="WOB6">{{get_phrase('Shop New Arrivals')}}</a>
                                        </div>
                                    </div>
                                </div> 
                                <div class="swiper-slide">
                                    <div class="hero-slide-content">
                                        <p class="hero-title-badge builder-editable" builder-identity="WOB7">{{get_phrase(' Brand For Woman’s Fashion')}}</p>
                                        <h1 class="hero-title builder-editable" builder-identity="WOB8">{{get_phrase('Fashion That Speaks!')}}</h1>
                                        <p class="hero-subtitle builder-editable" builder-identity="WOB9">{{get_phrase('Step into a world where fashion meets femininity. 2')}}</p>
                                        <div class="text-center">
                                            <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn builder-editable" builder-identity="WOB10">{{get_phrase('Shop New Arrivals')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-slide-content">
                                        <p class="hero-title-badge builder-editable" builder-identity="WOB11">{{get_phrase('Brand For Woman’s Fashion')}}</p>
                                        <h1 class="hero-title builder-editable" builder-identity="WOB12">{{get_phrase('Fashion That Speaks!')}}</h1>
                                        <p class="hero-subtitle builder-editable" builder-identity="WOB13">{{get_phrase('Step into a world where fashion meets femininity. 3')}}</p>
                                        <div class="text-center">
                                            <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn builder-editable" builder-identity="WOB14">{{get_phrase('Shop New Arrivals')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area End -->