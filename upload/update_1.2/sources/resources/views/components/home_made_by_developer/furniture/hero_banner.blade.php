{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Banner Area Start -->
<section class="banner-section-main section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content-area">
                    <!-- Lamp shape -->
                    <span class="banner-lamp-shape">
                        <img class="builder-editable" builder-identity="FF1" src="{{ asset('assets/frontend/furniture/images/all-images/banner-shape.webp') }}" alt="">
                        <span class="banner-lamp-line"></span>
                    </span>
                    <div class="banner-content-lef">
                        <h2 class="bn-sm-title">{{get_phrase('Modern')}} <span class="ec2-text-skin">{{get_phrase('Furniture')}}</span> {{get_phrase('for')}} <img class="banner-title-shape" src="{{ asset('assets/frontend/furniture/images/all-images/banner-title-shape.svg') }}"> {{get_phrase('Every')}}</h2>
                        <h1 class="banner-title">{{get_phrase('Lifestyl')}}<span class="banner-title-typo">{{get_phrase('e')}}</span></h1>
                        <p class="banner-subtitle builder-editable" builder-identity="FF5">{{get_phrase('The gently curved lines accentuated by sewn details are kind to your body and pleasant to look at also mechanism.')}}</p>
                        <a href="{{route('all_products')}}" class="btn ec-btn-skin builder-editable" builder-identity="FF4">{{get_phrase('Shop Now')}}</a>
                    </div>
                    <div class="banner-content-right">
                        <div class="banner-content-right-inner">
                            <div class="banner-content-right-position">
                                <div class="banner-product-details">
                                    <h3 class="title builder-editable" builder-identity="FF2">{{get_phrase('Astronio Minimal Chair')}}</h3>
                                </div>
                                <img class="banner builder-editable" builder-identity="FF3" src="{{ asset('assets/frontend/furniture/images/all-images/banner-all-images.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->