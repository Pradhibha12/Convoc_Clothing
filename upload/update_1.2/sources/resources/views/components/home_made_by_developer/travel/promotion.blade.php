{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Promotion Section Start -->
<section class="promotion-area overflow-hidden position-relative">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="tr-promotion-left position-relative  wow animate__fadeInLeft" data-wow-delay=".1s">
                    <img class="builder-editable" builder-identity="TP1" src="{{ asset('assets/frontend/travel/images/promotion.png') }}" alt="">
                    <div class="tr-promo">
                        <span class="left-promo vector"><img class="builder-editable" builder-identity="TP2" src="{{ asset('assets/frontend/travel/images/vector3.png') }}" alt="vector"></span>
                        <span class="right-promo vector"><img class="builder-editable" builder-identity="TP3" src="{{ asset('assets/frontend/travel/images/vector4.png') }}" alt="vector"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="tr-section wow animate__fadeInRight" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block builder-editable" builder-identity="TP4">{{get_phrase('Our Deals & Promotions')}}</span>
                    <h2 class="builder-editable" builder-identity="TP5">{{get_phrase('Big adventures start with even bigger savings.')}}</h2>
                    <p class="builder-editable" builder-identity="TP6">{{get_phrase("Discover limited-time offers on your favorite travel essentials—bundles, backpacks, accessories,
                        and more. Whether you're planning a weekend escape or a world tour, now’s the perfect time to
                        gear up for less.")}}</p>
                    <a href="{{route('all_products')}}" class="tr-black-btn-large builder-editable" builder-identity="TP7">{{get_phrase('Shop All Deals')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Promotion Section End -->