{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

  <!-- Why Choose Us Area Start -->
    <section class="why-choose-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wch-section-badge mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                        <img class="badge-shape-left" src="{{ asset('assets/frontend/watch-dark/images/badge-shape-left.svg') }}" alt="shape">
                        <p class="builder-editable" builder-identity="WAW1">{{get_phrase('Why Choose Us?')}}</p>
                        <img class="badge-shape-right" src="{{ asset('assets/frontend/watch-dark/images/badge-shape-right.svg') }}" alt="shape">
                    </div>
                    <div class="why-choose-title-area">
                        <h2 class="section-title why-choose-section-title wow animate__fadeInUp builder-editable" builder-identity="WAW2" data-wow-delay=".2s">{{get_phrase('Crafted with Care. Backed by Trust.')}}</h2>
                        <div class="wc-section-title-right">
                            <p class="section-subtitle mb-30px wow animate__fadeInUp builder-editable" builder-identity="WAW3" data-wow-delay=".3s">{{get_phrase('We believe trust is earned—through quality, service, and transparency.')}}</p>
                            <a href="{{route('all_products')}}" class="btn wch-btn-white wow animate__fadeInUp builder-editable" builder-identity="WAW4" data-wow-delay=".4s">{{get_phrase('Shop Now!')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="wch-benefit-wrap">
                        <div class="wch-benefit-icon">
                            <img class="icon builder-editable" builder-identity="WAW5" src="{{ asset('assets/frontend/watch-dark/images/why-choose-icon1.svg ') }}" alt="">
                        </div>
                        <h4 class="wch-benefit-title wch-benefit-line1 builder-editable" builder-identity="WAW6">{{get_phrase('100% Genuine Materials')}}</h4>
                        <p class="wch-benefit-subtitle builder-editable" builder-identity="WAW7">{{get_phrase('Prompt, tracked delivery to your doorstep because you shouldn’t have to wait for beauty.')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="wch-benefit-wrap">
                        <div class="wch-benefit-icon">
                            <img class="icon builder-editable" builder-identity="WAW8" src="{{ asset('assets/frontend/watch-dark/images/why-choose-icon2.svg') }}" alt="">
                        </div>
                        <h4 class="wch-benefit-title wch-benefit-line2 builder-editable" builder-identity="WAW9">{{get_phrase('Secure Payment Guarantee')}}</h4>
                        <p class="wch-benefit-subtitle builder-editable" builder-identity="WAW10">{{get_phrase('Your data is encrypted and your checkout is protected, every step of the way.')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="wch-benefit-wrap">
                        <div class="wch-benefit-icon">
                            <img class="icon builder-editable" builder-identity="WAW11" src="{{ asset('assets/frontend/watch-dark/images/why-choose-icon3.svg') }}" alt="">
                        </div>
                        <h4 class="wch-benefit-title builder-editable" builder-identity="WAW12">{{get_phrase('Fast & Secure Shipping')}}</h4>
                        <p class="wch-benefit-subtitle builder-editable" builder-identity="WAW13">{{get_phrase('Prompt, tracked delivery to your doorstep because you shouldn’t have to wait for beauty.')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Area End -->
