{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Kit  Area Start -->
<section class="tr-kit-area overflow-hidden position-relative">
    <span class="vector position-absolute "><img src="{{ asset('assets/frontend/travel/images/vector3.png') }}" alt="vector"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="kit-image wow animate__fadeInLeft" data-wow-delay=".1s">
                    <img src="{{ asset('assets/frontend/travel/images/kit.png') }}" class="builder-editable" builder-identity="TK1" alt="image">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="tr-section wow animate__fadeInRight" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block builder-editable" builder-identity="TK2">{{get_phrase(' All-in-One Travel Kits')}}</span>
                    <h2 class="mb-2 builder-editable" builder-identity="TK3">{{get_phrase('Curated Bundles for Every Kind of Journey!')}}</h2>
                    <ul class="tr-kit-motion">
                        <li>
                            <span><img src="{{ asset('assets/frontend/travel/images/key1.svg') }}" class="builder-editable" builder-identity="TK4" alt=""></span>
                            <div class="tr-kit-text">
                                <h5 class="builder-editable" builder-identity="TK5">{{get_phrase('Save up to 30% vs. buying individually')}}</h5>
                                <p class="builder-editable" builder-identity="TK6">{{get_phrase('Save up to 30% compared to buying items individually')}}</p>
                            </div>
                        </li>
                        <li>
                            <span><img class="builder-editable" builder-identity="TK7" src="{{ asset('assets/frontend/travel/images/key2.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5 class="builder-editable" builder-identity="TK8">{{get_phrase('Curated by real travelers')}}</h5>
                                <p class="builder-editable" builder-identity="TK9">{{get_phrase('Curated by real travelers for real-world needs')}}</p>
                            </div>
                        </li>
                        <li>
                            <span><img class="builder-editable" builder-identity="TK10" src="{{ asset('assets/frontend/travel/images/key3.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5 class="builder-editable" builder-identity="TK11">{{get_phrase('Perfect gift for travel lovers')}}</h5>
                                <p class="builder-editable" builder-identity="TK12">{{get_phrase('Perfect gift for globetrotters and weekend explorers alike')}}</p>
                            </div>
                        </li>
                    </ul>
                    <a href="{{route('all_products')}}" class="tr-black-btn-large mt-5 builder-editable" builder-identity="TK13">{{get_phrase('Shop All Bundles')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Kit Area End -->