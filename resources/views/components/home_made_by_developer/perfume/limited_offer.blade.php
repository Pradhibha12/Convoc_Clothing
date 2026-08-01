{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Start Limited-Time Offers Area  -->
    <section class="section-mb overflow-x-clip">
        <div class="container">
            <div class="row gx-4 gy-28px justify-content-center justify-content-lg-between align-items-center">
                <div class="col-md-10 col-lg-6">
                    <div class="offer-banner-area wow animate__fadeInLeft" data-wow-delay=".1s">
                        <div class="pf-offer-banner1">
                            <img class="banner1 builder-editable" builder-identity="PLM1" src="{{ asset('assets/frontend/perfume/images/offer-banner1.webp')}}" alt="banner">
                        </div>
                        <div class="pf-offer-banner2">
                            <img class="banner2 builder-editable" builder-identity="PLM2" src="{{ asset('assets/frontend/perfume/images/offer-banner2.webp')}}" alt="banner">
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div>
                        <h2 class="section-title mb-3 title-shape2-active wow animate__fadeInUp builder-editable" builder-identity="PLM3" data-wow-delay=".2s">{{get_phrase('Limited-Time Offers Just for You')}}</h2>
                        <p class="section-subtitle mb-30px wow animate__fadeInUp builder-editable" builder-identity="PLM4" data-wow-delay=".3s">{{get_phrase('Discover the scents everyone’s obsessed with handpicked by real fragrance lovers. Unwrap exclusive deals and irresistible savings on your favorite scents. Hurry — these won’t last long!')}}</p>
                        
                        <div class="d-flex align-items-center flex-wrap gap-10px wow animate__fadeInUp" data-wow-delay=".5s">
                            <a href="{{route('all_products')}}" class="btn pf-btn-outline-white min-w-196px builder-editable" builder-identity="PLM5">{{get_phrase('Buy Now!')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Limited-Time Offers Area  -->