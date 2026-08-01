{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Start Seasonal Collections Section  -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-md-10 col-lg-6">
                    <div class="seasonal-collection-banner me-lg-2 wow animate__fadeInLeft" data-wow-delay=".1s">
                        <img class="banner builder-editable" builder-identity="BSE1" src="{{ asset('assets/frontend/baby/images/seasonal-collection-banner.webp ') }}" alt="">
                        <div class="sc-banner-overlay">
                            <h4 class="scb-overlay-off builder-editable" builder-identity="BSE2">{{get_phrase('-50% off')}}</h4>
                            <h4 class="scb-overlay-title builder-editable" builder-identity="BSE3">{{get_phrase('Summer Essentials for Your Baby')}}</h4>
                            <p class="scb-overlay-subtitle builder-editable" builder-identity="BSE4">{{get_phrase('Light and breathable must-haves for warmer days')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div class="ps-lg-4 mt-3 mt-lg-0">
                        <p class="section-sm-title mb-30px wow animate__fadeInUp  builder-editable" builder-identity="BSE5" data-wow-delay=".2s"><span class="line"></span>{{get_phrase('Seasonal Collections')}}<span class="line"></span></p>
                        <h2 class="section-title mb-3 wow animate__fadeInUp  builder-editable" builder-identity="BSE6" data-wow-delay=".3s">{{get_phrase('Curated Collections Just for You!')}}</h2>
                        <p class="section-subtitle mb-36px wow animate__fadeInUp  builder-editable" builder-identity="BSE7" data-wow-delay=".4s">{{get_phrase('Keep your little one cool and comfortable with our handpicked summer must-haves. From breathable fabrics to sun-safe accessories, everything is designed for warmer days and outdoor fun. Perfect for stroll.')}}</p>
                        <a href="{{route('all_products')}}" class="btn ba-btn-outline-dark wow animate__fadeInUp" data-wow-delay=".5s">
                            <span class=" builder-editable" builder-identity="BSE8">{{get_phrase('View All Products')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                <path d="M2.4375 1.14179C2.40683 1.65843 2.76563 2.08629 3.23896 2.09728L7.5956 2.19832L0.712227 9.10554C0.355865 9.46313 0.320697 10.0555 0.633679 10.4287C0.946662 10.8018 1.48931 10.8144 1.84567 10.4568L8.72918 3.54946L8.44686 8.30581C8.41615 8.8225 8.775 9.25031 9.24832 9.2613C9.72164 9.27228 10.1302 8.86233 10.1609 8.3456L10.5772 1.33062C10.592 1.08244 10.5158 0.842404 10.3655 0.663225C10.2152 0.484047 10.0031 0.380413 9.77577 0.375137L3.35 0.226058C2.87672 0.215115 2.46817 0.625067 2.4375 1.14179Z" fill="black"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Seasonal Collections Section  -->