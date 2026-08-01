{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Trust us Area Start -->
<section class="tr-trust-area bg-motion overflow-hidden position-relative">
    <div class="trust-image wow animate__fadeInRight" data-wow-delay=".1s">
        <img class="builder-editable" builder-identity="TT15" src="{{ asset('assets/frontend/travel/images/image 8.png') }}" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tr-section wow animate__fadeInLeft position-relative" data-wow-delay=".1s">
                    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector5.png') }}"
                            alt="vector"></span>
                    <div class="arrow-line"></div>
                    <span class="d-block builder-editable" builder-identity="TT1">{{get_phrase('Why Choose uS?')}}</span>
                    <h2 class="mb-2">{{get_phrase('Why Travelers Trust Us?')}}</h2>
                    <p class="description builder-editable" builder-identity="TT2">{{get_phrase('Our gear is built to last, no matter where your journey takes you. Trusted
                        by seasoned travelers and adventure seekers worldwide, every product is designed for durability,
                        comfort, & performance')}}</p>
                    <a href="{{route('all_products')}}" class="tr-black-btn-large mt-5 builder-editable" builder-identity="TT3">{{get_phrase('Explore Products')}}</a>
                    <div class="trusted d-flex gap-2">
                        <ul class="tr-kit-motion ">
                            <li>
                                <span><img src="{{ asset('assets/frontend/travel/images/key1.svg') }}" class="builder-editable" builder-identity="TT4" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5 class="builder-editable" builder-identity="TT16">{{get_phrase('Durable Quality')}}</h5>
                                    <p class="builder-editable" builder-identity="TT5">{{get_phrase('Built to withstand the rigors of global travel—tested for performance, comfort, &
                                        resilience.')}}</p>
                                </div>
                            </li>
                            <li>
                                <span><img class="builder-editable" builder-identity="TT6" src="{{ asset('assets/frontend/travel/images/key4.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5 class="builder-editable" builder-identity="TT7">{{get_phrase('Free Shipping')}}</h5>
                                    <p class="builder-editable" builder-identity="TT8">{{get_phrase('Enjoy fast, free shipping on all domestic orders. No minimums, no hidden
                                        fees—just great gear delivered to your door.')}}</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="tr-kit-motion ">
                            <li>
                                <span><img class="builder-editable" builder-identity="TT9" src="{{ asset('assets/frontend/travel/images/key5.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5 class="builder-editable" builder-identity="TT10">{{get_phrase('Innovative Design')}}</h5>
                                    <p class="builder-editable" builder-identity="TT11">{{get_phrase('From anti-theft backpacks to space-saving cubes, every product is designed to
                                        solve real travel problems.')}}</p>
                                </div>
                            </li>
                            <li>
                                <span><img class="builder-editable" builder-identity="TT12" src="{{ asset('assets/frontend/travel/images/key6.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5 class="builder-editable" builder-identity="TT13">{{get_phrase('Eco-Friendly Options')}}</h5>
                                    <p class="builder-editable" builder-identity="TT14">{{get_phrase('Travel lighter with gear made from recycled and sustainable materials. Good for
                                        the planet, great for your journey.')}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</section>
<!-- Trust us Area End  -->