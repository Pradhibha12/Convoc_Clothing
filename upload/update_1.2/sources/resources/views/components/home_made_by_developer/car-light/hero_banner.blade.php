{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Banner Area Start -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-area">
                        <div class="hero-title-area">
                            <h1 class="hero-title wow animate__fadeInUp builder-editable" builder-identity="CLB1" data-wow-delay=".1s">{{get_phrase('Style Your Drive with Premium Accessories.')}}</h1>
                            <p class="hero-subtitle wow animate__fadeInUp builder-editable" builder-identity="CLB2" data-wow-delay=".2s">{{get_phrase('From sleek interiors to smart gadgets — everything your ride needs in one place.')}}</p>
                            <div class="hero-btn-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                                <a href="{{route('all_products')}}" class="btn ca-btn-white  builder-editable" builder-identity="CLB3">{{get_phrase('Shop Now')}}</a>
                                <a href="{{route('all_products')}}" class="btn ca-btn-outline-white builder-editable" builder-identity="CLB4">{{get_phrase('Explore Categories')}}</a>
                            </div>
                        </div>
                        <div class="video-player-wrap " >
                              <img class="Ebanner builder-editable " builder-identity="CLB10" src=" {{ asset('assets/frontend/car-light/images/car-banner.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Banner Area End -->