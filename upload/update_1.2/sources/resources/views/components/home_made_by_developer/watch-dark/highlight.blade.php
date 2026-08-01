{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Highlighted Product Area Start -->
    <section class="highlight-product-section">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-7">
                    <div class="highlighted-product-details wow animate__fadeInUp" data-wow-delay=".1s">
                        <div class="highlight-shape">
                            <img class="shape builder-editable" builder-identity="WAH1" src=" {{ asset('assets/frontend/watch-dark/images/highlight-shape.png') }}" alt="">
                        </div>
                        <div class="wch-section-badge mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
                            <img class="badge-shape-left" src="{{ asset('assets/frontend/watch-dark/images/badge-shape-left.svg') }}" alt="shape">
                            <p class="builder-editable" builder-identity="WAH2">{{get_phrase('Highlighted Product')}}</p>
                            <img class="badge-shape-right" src="{{ asset('assets/frontend/watch-dark/images/badge-shape-right.svg ') }}" alt="shape">
                        </div>
                        <h2 class="section-title hp-section-title wow animate__fadeInUp builder-editable" builder-identity="WAH3" data-wow-delay=".3s">{{get_phrase('Limited Edition🌟 The Valtor Chrono 500!')}}</h2>
                        <div class="hp-subtitle-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                            <p class="section-subtitle fw-bold text-uppercase builder-editable" builder-identity="WAH4">{{get_phrase('“Crafted for the Few. Built to Last.”')}}</p>
                            <p class="section-subtitle builder-editable" builder-identity="WAH5">{{get_phrase('Only 500 pieces made. Swiss precision meets timeless design.')}}</p>
                            <p class="section-subtitle builder-editable" builder-identity="WAH6">{{get_phrase('Precision-engineered in brushed titanium and fitted with genuine Swiss movement, the Valtor Chrono 500 is more than a watch—it’s a symbol of distinction. Sapphire crystal glass, hand-assembled detailing, and a numbered caseback make each piece a rare collectible. Built for those who value time as much as legacy.')}}</p>
                        </div>
                        <a href="{{route('all_products')}}" class="btn wch-btn-white min-w-209px wow animate__fadeInUp builder-editable" builder-identity="WAH7" data-wow-delay=".5s">{{get_phrase('View Full Specs')}}</a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-5">
                    <div class="highlighted-banner-wrap">
                        <div class="highlighted-banner1 wow animate__fadeInRight" data-wow-delay=".3s">
                            <img class="banner builder-editable" builder-identity="WAH8" src="{{ asset('assets/frontend/watch-dark/images/highlight-banner1.webp') }}" alt="banner">
                        </div>
                        <div class="highlighted-banner2 wow animate__fadeInRight" data-wow-delay=".4s">
                            <img class="banner builder-editable" builder-identity="WAH9" src="{{ asset('assets/frontend/watch-dark/images/highlight-banner2.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Highlighted Product Area End -->