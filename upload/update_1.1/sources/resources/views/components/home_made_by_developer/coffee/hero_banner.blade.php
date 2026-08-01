{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Banner Area Start -->
    <section class="hero-section overflow-hidden">
        <div class="container">
            <div class="row justify-content-center align-items-center gx-4 gy-5">
                <div class="col-md-10 col-lg-6">
                    <div class="hero-title-area">
                        <div class="hr-coffee-shape">
                            <img class="shape wow animate__fadeIn builder-editable" builder-identity="COB1" data-wow-delay=".1s" src="{{ asset('assets/frontend/coffee/images/title-coffee-shape.png ') }}" alt="">
                        </div>
                        <h1 class="hero-title text-center text-md-start wow animate__fadeInUp builder-editable" builder-identity="COB2" data-wow-delay=".1s">{{get_phrase('Awaken Your Senses with Every Sip!!')}}</h1>
                        <p class="hero-subtitle text-center text-md-start wow animate__fadeInUp builder-editable" builder-identity="COB3" data-wow-delay=".2s">{{get_phrase('Discover artisan coffee blends, soothing teas & beautifully crafted brewing tools all in one place.')}}</p>
                        <div class="d-flex align-items-center gap-12px flex-wrap justify-content-center justify-content-md-start wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn cts-btn-outline-white">
                                <span class="builder-editable" builder-identity="COB4">{{get_phrase('Explore Collection')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path d="M3.07735 1.67043C3.04051 2.29091 3.47144 2.80476 4.03989 2.81796L9.27218 2.93931L1.00531 11.2348C0.577327 11.6643 0.53509 12.3758 0.910979 12.8239C1.28687 13.272 1.93859 13.2871 2.36657 12.8577L10.6336 4.56202L10.2945 10.2744C10.2576 10.8949 10.6886 11.4087 11.2571 11.4219C11.8255 11.4351 12.3162 10.9427 12.353 10.3221L12.8531 1.89721C12.8708 1.59915 12.7794 1.31087 12.5988 1.09568C12.4183 0.880484 12.1635 0.75602 11.8905 0.749684L4.17326 0.570641C3.60485 0.5575 3.11419 1.04985 3.07735 1.67043Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div class="hero-slider-area ms-xl-4 wow animate__fadeInRight" data-wow-delay=".1s">
                        <!-- Swiper -->
                        <div class="swiper hero-banner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner builder-editable" builder-identity="COB5" src="{{ asset('assets/frontend/coffee/images/coffee-banner.webp ') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner builder-editable" builder-identity="COB6" src="{{ asset('assets/frontend/coffee/images/coffee-banner.webp ') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner builder-editable" builder-identity="COB7" src="{{ asset('assets/frontend/coffee/images/coffee-banner.webp ') }}" alt="banner">
                                    </div>
                                </div>
                            </div>
                            <div class="banner-slider-nav">
                                <div class="swiper-button-prev">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.514393 9.72582C-0.0414888 10.2817 -0.0414888 11.183 0.514393 11.7388L9.57301 20.7975C10.1289 21.3533 11.0302 21.3533 11.586 20.7975C12.1419 20.2416 12.1419 19.3403 11.586 18.7844L3.53393 10.7323L11.586 2.68023C12.1419 2.12435 12.1419 1.22308 11.586 0.667202C11.0302 0.111321 10.1289 0.111321 9.57301 0.667202L0.514393 9.72582ZM19.7324 10.7323V9.30891L1.52091 9.30891V10.7323V12.1558L19.7324 12.1558V10.7323Z" fill="white"/>
                                    </svg>
                                </div>
                                <div class="swiper-button-next">
                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.9504 12.0065C20.5063 11.4507 20.5063 10.5494 19.9504 9.99352L10.8918 0.934903C10.336 0.379021 9.43469 0.379021 8.87881 0.934903C8.32293 1.49078 8.32293 2.39205 8.87881 2.94793L16.9309 11L8.87881 19.0521C8.32293 19.608 8.32293 20.5093 8.87881 21.0652C9.43469 21.621 10.336 21.621 10.8918 21.0652L19.9504 12.0065ZM0.732422 11V12.4235H18.9439V11V9.57661H0.732422V11Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->