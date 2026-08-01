
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Header Top -->
<section class="header-offer-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper ht-offer-slider">
                    <div class="swiper-wrapper">
                        <!-- Date formate 24 hour -->
                        <div class="swiper-slide">
                            <div class="ht-slider-slide">
                                <div class="ht-slider-title builder-editable" builder-identity="FTF1" >{{ get_phrase("Shop the latest trends at unbeatable prices!") }}</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ht-slider-slide">
                                <div class="ht-slider-title builder-editable" builder-identity="FTF2" >{{ get_phrase("Upgrade your lifestyle with our premium collections!") }}</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ht-slider-slide">
                                <div class="ht-slider-title builder-editable" builder-identity="FTF3" >{{ get_phrase("Enjoy fast delivery and hassle-free returns!") }}</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ht-slider-slide">
                                <div class="ht-slider-title builder-editable" builder-identity="FTF4">{{ get_phrase("Exclusive discounts waiting only for our members!") }}</div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next">
                        <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 11L7 6L1 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="swiper-button-prev">
                        <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 1L1 6L7 11" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>