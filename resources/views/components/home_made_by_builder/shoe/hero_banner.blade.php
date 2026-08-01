{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<section class="sh1-header-banner-section">
    <!-- Header Banner Area -->
    <div class="sh1-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex gap-3 align-items-start justify-content-between flex-column flex-lg-row">
                        <h1 class="sh1-banner-title wow animate__fadeInUp builder-editable" builder-identity="sb1" data-wow-delay=".1s">{{ get_phrase('Step Into Style & Comfort!') }}</h1>
                       
                    </div>
                    <!-- Slider Area -->
                    <div class="bn-slider-content-wrap">
                        <div class="bn-slider-content wow animate__fadeInUp" data-wow-delay=".3s">
                            <div class="bn-swiper-container gallery-info position-relative overflow-hidden">
                                 <div class="bn-slider-navs">
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-prev">
                                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.3428 10.7038L1.06487 10.7038M1.06487 10.7038L10.1683 19.5396M1.06487 10.7038L10.1683 1.86814" stroke="black" stroke-width="2.00811" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="swiper-button-next">
                                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.30859 10.7039H20.5865M20.5865 10.7039L11.483 1.86816M20.5865 10.7039L11.483 19.5396" stroke="black" stroke-width="2.00811" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                   <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="bn-slider-content-slide">
                                                <p class="bn-slider-subtitle mb-30px builder-editable" builder-identity="SBS1">{{ get_phrase('Discover the perfect pair for every occasion for man & woman crafted with quality designed for confidence.') }}</p>
                                                <a href="{{route('all_products')}}" class="btn sh1-btn-dark builder-editable" builder-identity="SBS2">{{ get_phrase('Shopping Now!') }}</a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="bn-slider-content-slide">
                                                <p class="bn-slider-subtitle mb-30px builder-editable" builder-identity="SBS3">{{ get_phrase('Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, libero nostrum at ad expedita nobis.') }}</p>
                                                <a href="{{route('all_products')}}" class="btn sh1-btn-dark builder-editable" builder-identity="SBS4">{{ get_phrase('Shopping Now!') }}</a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="bn-slider-content-slide">
                                                <p class="bn-slider-subtitle mb-30px builder-editable" builder-identity="SBS5">{{ get_phrase('Ad culpa modi repellat illo placeat distinctio laborum aut odit molestiae fugit nihil adipisci odio recusandae sapiente cum explicabo.') }}</p>
                                                <a href="{{route('all_products')}}" class="btn sh1-btn-dark builder-editable" builder-identity="SBS6">{{ get_phrase('Shopping Now!') }}</a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="bn-slider-content-slide">
                                                <p class="bn-slider-subtitle mb-30px builder-editable" builder-identity="SBS7">{{ get_phrase('Atque impedit officia fuga id ducimus reprehenderit reiciendis commodi. Temporibus magnam error perferendis mollitia asperiores velit natus in quibusdam sunt.') }}</p>
                                                <a href="{{route('all_products')}}" class="btn sh1-btn-dark builder-editable" builder-identity="SBS8">{{ get_phrase('Shopping Now!') }}</a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="bn-slider-content-slide">
                                                <p class="bn-slider-subtitle mb-30px builder-editable" builder-identity="SBS9">{{ get_phrase('Soluta non quibusdam quae? Labore suscipit expedita voluptatibus fugit tempore nesciunt minima praesentium,') }}</p>
                                                <a href="{{route('all_products')}}" class="btn sh1-btn-dark builder-editable" builder-identity="SBS10">{{ get_phrase('Shopping Now!') }}</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="bn-slider-main wow animate__fadeInUp" data-wow-delay=".4s">
                            <div class="bn-swiper-container gallery-thumbs position-relative overflow-hidden">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="bn-product-slide">
                                            <img class="builder-editable" builder-identity="sb8" src="{{ asset('assets/frontend/shoe/images/bn-slider-product1.webp') }}" alt="product">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="bn-product-slide">
                                            <img class="builder-editable" builder-identity="sb80" src="{{ asset('assets/frontend/shoe/images/bn-slider-product1.webp') }}" alt="product">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="bn-product-slide">
                                            <img class="builder-editable" builder-identity="sb81" src="{{ asset('assets/frontend/shoe/images/bn-slider-product1.webp') }}" alt="product">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="bn-product-slide">
                                            <img class="builder-editable" builder-identity="sb82" src="{{ asset('assets/frontend/shoe/images/bn-slider-product1.webp') }}" alt="product">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="bn-product-slide">
                                            <img class="builder-editable" builder-identity="sb83" src="{{ asset('assets/frontend/shoe/images/bn-slider-product1.webp') }}" alt="product">
                                        </div>
                                    </div>
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>