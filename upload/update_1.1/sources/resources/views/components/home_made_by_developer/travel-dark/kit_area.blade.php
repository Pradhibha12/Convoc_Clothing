{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Kit  Area Start -->
<section class="tr-kit-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="kit-image wow animate__fadeInLeft" data-wow-delay=".1s">
                    <img class="builder-editable" builder-identity="TDK1" src="{{ asset('assets/frontend/travel-dark/images/kit.png') }}" alt="image">
                </div>
            </div>
            <div class="col-lg-7">
                  <div class="tr-section wow animate__fadeInRight" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block builder-editable" builder-identity="TDK2"> {{get_phrase('All-in-One Travel Kits')}}</span>
                    <h2 class="mb-2 builder-editable" builder-identity="TDK3">{{get_phrase('Curated Bundles for Every Kind of Journey!')}}</h2>
                    <ul class="tr-kit-motion">
                        <li>
                            <span><img class="builder-editable" builder-identity="TDK20" src="{{ asset('assets/frontend/travel-dark/images/key1.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5 class="builder-editable" builder-identity="TDK30">{{get_phrase('Save up to 30% vs. buying individually')}}</h5>
                                <p class="builder-editable" builder-identity="TDK4">{{get_phrase('Save up to 30% compared to buying items individually')}}</p>
                            </div>
                        </li>
                        <li>
                            <span><img class="builder-editable" builder-identity="TDK5" src="{{ asset('assets/frontend/travel-dark/images/key2.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5 class="builder-editable" builder-identity="TDK6">{{get_phrase('Curated by real travelers')}}</h5>
                                <p class="builder-editable" builder-identity="TDK7">{{get_phrase('Curated by real travelers for real-world needs')}}</p>
                            </div>
                        </li>
                        <li>
                            <span><img class="builder-editable" builder-identity="TDK10" src="{{ asset('assets/frontend/travel-dark/images/key3.svg') }}" alt=""></span>
                            <div class="tr-kit-text">
                                <h5 class="builder-editable" builder-identity="TDK8">{{get_phrase('Perfect gift for travel lovers')}}</h5>
                                <p class="builder-editable" builder-identity="TDK9">{{get_phrase('Perfect gift for globetrotters and weekend explorers alike')}}</p>
                            </div>
                        </li>
                    </ul>
                     <a href="{{route('all_products')}}" class="tr-white-btn-large mt-5 builder-editable" builder-identity="TDK11">{{get_phrase('Shop All Bundles')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Kit Area End -->