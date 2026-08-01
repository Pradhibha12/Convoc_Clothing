{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Promotional Deal Area Start -->
    <section class="promotional-deal-section overflow-hidden section-mb">
        <div class="container">
            <div class="row align-items-center gx-4">
                <div class="col-lg-6">
                    <div class="promotional-deal-banner wow animate__fadeInLeft" data-wow-delay=".1s">
                        <img class="banner builder-editable" builder-identity="WOPO1" src=" {{ asset('assets/frontend/women-clothing/images/promotion-banner.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="promotional-deal-content">
                        <h5 class="section-sm-title mb-22px wow animate__fadeInUp builder-editable" builder-identity="WOPO2" data-wow-delay=".1s">{{get_phrase('Promotions & Deals')}}</h5>
                        <h2 class="section-title mb-22px wow animate__fadeInUp builder-editable" builder-identity="WOPO3" data-wow-delay=".2s">{{get_phrase('Fashion finds you don’t want to miss.')}}</h2>
                        <p class="promotional-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="WOPO4" data-wow-delay=".3s">{{get_phrase('Limited-time offers on your favorite styles 50% OFF Summer Dresses . Shop now and save big while they last!')}}</p>
                         <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn min-w-177px mx-auto wow animate__fadeInUp builder-editable" builder-identity="WOPO5" data-wow-delay=".5s">{{get_phrase('Explore Collection')}}</a>
                       
                        <div class="promotion-discount-wrap">
                            <h5 class="pdw-category builder-editable" builder-identity="WOPO6">{{get_phrase('Fashion')}}</h5>
                            <h4 class="pdw-title builder-editable" builder-identity="WOPO7">{{get_phrase('Sale')}}</h4>
                            <p class="pdw-subtitle builder-editable" builder-identity="WOPO8">{{get_phrase('up to 50% off')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Promotional Deal Area End -->