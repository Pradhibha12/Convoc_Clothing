{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Adventure  Section  Start  -->
<section class="adventure-area bg-motion overflow-hidden position-relative">
    <div class="container">
        <div class="row g-3 wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-lg-4 col-md-6 ">
                <div class="tr-adventure-box">
                    <div class="tr-section ">
                        <div class="arrow-line"></div>
                        <span class="d-block builder-editable" builder-identity="TKA1">{{get_phrase('Adventure Inspiration')}}</span>
                        <h2 class="builder-editable" builder-identity="TKA2">{{get_phrase('Fuel your next great escape.')}}</h2>
                    </div>
                    <div class="position-relative">
                        <div class="tr-adventure">
                            <img class="builder-editable" builder-identity="TKA3" src="{{ asset('assets/frontend/travel/images/ad1.png') }}" alt="">
                        </div>
                        <div class="tr-ad-motion">
                            <img class="builder-editable" builder-identity="TKA4" src="{{ asset('assets/frontend/travel/images/instagram.png') }}" alt="...">
                            <p class="builder-editable" builder-identity="TKA5">{{get_phrase('Instagram')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="tr-adventure-box">
                    <div class="position-relative">
                        <div class="tr-adventure">
                            <img class="builder-editable" builder-identity="TKA6" src="{{ asset('assets/frontend/travel/images/ad2.png') }}" alt="">
                        </div>
                        <div class="tr-ad-motion">
                            <img class="builder-editable" builder-identity="TKA7" src="{{ asset('assets/frontend/travel/images/instagram.png') }}" alt="...">
                            <p class="builder-editable" builder-identity="TKA8">{{get_phrase('Instagram')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="tr-adventure-box">
                    <div class="position-relative">
                        <div class="tr-adventure">
                            <img class="builder-editable" builder-identity="TKA9" src="{{ asset('assets/frontend/travel/images/ad3.png') }}" alt="">
                        </div>
                        <div class="tr-ad-motion">
                            <img class="builder-editable" builder-identity="TKA10" src="{{ asset('assets/frontend/travel/images/instagram.png') }}" alt="...">
                           <p class="builder-editable" builder-identity="TKA11">{{get_phrase('Instagram')}}</p>
                        </div>
                    </div>
                    <div class="tr-ad-content">
                        <p class="builder-editable" builder-identity="TKA12">{{get_phrase('From mountain peaks to bustling city streets, our gear has been part of thousands of
                            unforgettable adventures. See how travelers around the world pack, explore, and thrive with
                            our essentials by their side.')}}</p>
                        <a href="{{route('all_products')}}" class="tr-black-btn-large builder-editable" builder-identity="TKA13">{{get_phrase('Share Your Journey')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Adventure  Section  End   -->