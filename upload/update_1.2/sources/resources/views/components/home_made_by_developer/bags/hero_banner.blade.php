{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
<!-- Banner Area Start  -->
<section class="bs-banner-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="eBagContent text-center">

                    <div class="hero8-sm-title-wrap mb-3 mx-auto wow animate__fadeInUp "  data-wow-delay=".1s">
                        <p class="builder-editable" builder-identity="1">{{get_phrase('Trusted by Clients for seamless Products 🔥')}}</p>
                    </div>

                    <h1 class="banner-title wow animate__fadeInUp "  data-wow-delay=".2s">
                        <span class="builder-editable" builder-identity="2">{{get_phrase('Carry Style Comfort & Purpose!')}}</span>
                    </h1>
                    <div class="d-flex justify-content-center gap-3 mt-4 wow animate__fadeInUp "  data-wow-delay=".3s">
                        <a href="{{route('all_products')}}" class="btn bsb3-btn-skin">
                            <span class="builder-editable" builder-identity="3">{{get_phrase('Shop Now!')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                <path d="M2 10.5L0.5 10.5L0.5 13.5L2 13.5L2 10.5ZM24.0607 13.0607C24.6464 12.4749 24.6464 11.5251 24.0607 10.9393L14.5147 1.3934C13.9289 0.80761 12.9792 0.807611 12.3934 1.3934C11.8076 1.97918 11.8076 2.92893 12.3934 3.51472L20.8787 12L12.3934 20.4853C11.8076 21.0711 11.8076 22.0208 12.3934 22.6066C12.9792 23.1924 13.9289 23.1924 14.5147 22.6066L24.0607 13.0607ZM2 12L2 13.5L23 13.5L23 12L23 10.5L2 10.5L2 12Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="{{route('all_products')}}" class="btn bsb3-btn-skin">
                            <span class="builder-editable" builder-identity="4">{{get_phrase('View All Products')}}</span>
                            
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Product Images (Container OUTSIDE) -->
      <!-- Swiper -->
    <div class="swiper curvedSlide wow animate__fadeInUp "  data-wow-delay=".5s">
        <span class="slide-top-curve"></span>
        <span class="slide-bottom-curve"></span>
        <div class="swiper-wrapper">
             <div class="swiper-slide">
                <div class="curved-slide-banner">
                    <a href="javascript:;" class="brand-slide1">
                        <img class="banner builder-editable" builder-identity="5" src="{{ asset('assets/frontend/bags/images/bg1.png') }}">
                    </a>
                </div>
            </div>      
             <div class="swiper-slide">
                <div class="curved-slide-banner">
                    <a href="javascript:;" class="brand-slide1">
                        <img class="banner builder-editable" builder-identity="6" src="{{ asset('assets/frontend/bags/images/bg2.png') }}">
                    </a>
                </div>
            </div>      
             <div class="swiper-slide">
                <div class="curved-slide-banner">
                    <a href="javascript:;" class="brand-slide1">
                        <img class="banner builder-editable" builder-identity="7" src="{{ asset('assets/frontend/bags/images/bg3.png') }}">
                    </a>
                </div>
            </div>      
             <div class="swiper-slide">
                <div class="curved-slide-banner">
                    <a href="javascript:;" class="brand-slide1">
                        <img class="banner builder-editable" builder-identity="8" src="{{ asset('assets/frontend/bags/images/bg4.png') }}">
                    </a>
                </div>
            </div>      
                
        </div>

</section>
<!-- Banner Area End  -->


