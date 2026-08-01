
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
<style>
    .fn-banner-slider .swiper-slide {
    opacity: 0;
}

.fn-banner-slider .swiper-slide-active {
    opacity: 1;
}

</style>
<!-- Start Banner Area -->
<section class="fn-banner-section overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-area">
                    <div class="banner-content-left">
                        <h1 class="fn-banner-title wow animate__fadeInUp" data-wow-delay=".1s">
                            <span class="builder-editable" builder-identity="BF1">{{get_phrase('Empower Your Fitness Journey with Our Products!!')}}</span>
                            <span class="fn-banner-title-shape">
                                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.40918 33.3489L5.10005 38.0399L0.40918 42.7308L9.79102 52.1126L14.4819 47.4217L19.1729 52.1126L22.7881 48.4973L4.02438 29.7337L0.40918 33.3489Z" fill="white"/>
                                    <path d="M23.9671 9.7911L31.0036 16.8274L16.8274 31.0035L9.79113 23.9671L6.16846 27.5899L24.9321 46.3535L28.5548 42.7308L21.5184 35.6945L35.6945 21.5184L42.7308 28.5548L46.3498 24.9357L27.5862 6.17216L23.9671 9.7911Z" fill="white"/>
                                    <path d="M52.1125 9.79108L42.7306 0.409241L38.0398 5.10011L33.3488 0.409241L29.7299 4.02818L48.4935 22.7919L52.1125 19.1729L47.4216 14.482L52.1125 9.79108Z" fill="white"/>
                                </svg>
                            </span>
                        </h1>
                        <p class="fn-banner-subtitle wow animate__fadeInUp builder-editable" builder-identity="BF2" data-wow-delay=".2s">{{get_phrase('Shop top-rated gear for home workouts, cardio strength & more everything you need to crush your goals.')}}</p>
                        <div class="d-flex align-items-start flex-wrap wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn fnb2-btn-skin">
                                <span class="builder-editable" builder-identity="BF3">{{get_phrase('Shop Now!')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                    <path d="M2 10.5L0.5 10.5L0.5 13.5L2 13.5L2 10.5ZM24.0607 13.0607C24.6464 12.4749 24.6464 11.5251 24.0607 10.9393L14.5147 1.3934C13.9289 0.80761 12.9792 0.807611 12.3934 1.3934C11.8076 1.97918 11.8076 2.92893 12.3934 3.51472L20.8787 12L12.3934 20.4853C11.8076 21.0711 11.8076 22.0208 12.3934 22.6066C12.9792 23.1924 13.9289 23.1924 14.5147 22.6066L24.0607 13.0607ZM2 12L2 13.5L23 13.5L23 12L23 10.5L2 10.5L2 12Z" fill="black"/>
                                </svg>
                            </a>
                            
                        </div>
                        <div class="bn-profileNrating wow animate__fadeInUp" data-wow-delay=".4s">
                            <ul class="d-flex align-items-center">
                                 @php 
                                  $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                                @endphp
                                @foreach($reviews->take(3) as $review)
                                <li class="bn-list-profile">
                                    <img class="profile" src="{{ get_image($review->user->photo) }}" alt="">
                                </li>
                                @endforeach
                            </ul>
                            <div>
                                <div class="d-flex align-items-center gap-6px mb-12px">
                                    @for($i = 1; $i <= 5; $i++)
                                    <div class="svg-block">
                                        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_68_3091)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5752 1.49548L16.5175 7.75466L23.3796 8.61019C24.015 8.69205 24.4799 9.27837 24.3983 9.9141C24.357 10.2239 24.2023 10.4925 23.9823 10.6805L18.9871 15.3584L20.291 22.1551C20.4128 22.7908 19.9975 23.402 19.3615 23.5242C19.0846 23.5729 18.8076 23.5242 18.5794 23.3938L12.5156 20.0608L6.46082 23.3938C5.89056 23.7115 5.18146 23.4999 4.87194 22.9373C4.73307 22.6847 4.70064 22.4075 4.74976 22.1551L6.04518 15.3584L1.00112 10.6232C0.53604 10.183 0.511479 9.44178 0.951681 8.97703C1.14722 8.76511 1.40038 8.65113 1.66079 8.61838V8.61019L8.52265 7.75466L11.4646 1.49548C11.7338 0.908863 12.4268 0.664516 13.0132 0.933423C13.2739 1.0556 13.4615 1.25932 13.5752 1.49548Z" fill="url(#paint0_linear_68_3091)"/>
                                            </g>
                                            <defs>
                                            <linearGradient id="paint0_linear_68_3091" x1="0.636353" y1="0.824463" x2="0.636353" y2="23.5428" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FFC400"/>
                                            <stop offset="1" stop-color="#FF9F00"/>
                                            </linearGradient>
                                            <clipPath id="clip0_68_3091">
                                            <rect width="25.1385" height="23.4626" fill="white" transform="translate(0.636353 0.824463)"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    @endfor
                                </div>
                                <h4 class="bn-stars-title builder-editable" builder-identity="BF4">{{get_phrase('100% Customer Satisfaction')}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="banner-slider-area wow animate__slideInRight" data-wow-delay=".2s">
                        <!-- Swiper -->
                        <div class="swiper fn-banner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="banner-slide">
                                        <img class="banner builder-editable" builder-identity="BF5" src="{{ asset('assets/frontend/fitness/images/banner.png') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-slide">
                                        <img class="banner builder-editable" builder-identity="BF50" src="{{ asset('assets/frontend/fitness/images/banner.png') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="banner-slide">
                                        <img class="banner builder-editable" builder-identity="BF51" src="{{ asset('assets/frontend/fitness/images/banner.png') }}" alt="banner">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->