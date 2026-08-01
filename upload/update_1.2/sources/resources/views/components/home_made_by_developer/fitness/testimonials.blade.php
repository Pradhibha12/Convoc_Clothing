{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Start Our Clients Feedback -->
<section class="clients-feedback-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="feedback-title-area">
                    <div class="text-center">
                        <p class="sml-title-badge mb-30px text-white wow animate__fadeInUp builder-editable" builder-identity="FTT1" data-wow-delay=".1s">{{get_phrase('Our Clients Feedback')}}</p>
                    </div>
                    <h2 class="section-title mb-30px cf-section-title text-center text-white wow animate__fadeInUp builder-editable" builder-identity="FTT2" data-wow-delay=".2s">{{get_phrase('What Our Customers Are Saying?')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Swiper -->
    <div class="swiper testimonial-slider wow animate__fadeInUp" data-wow-delay=".3s">
        <div class="swiper-wrapper">
             @php 
                $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
            @endphp
            @foreach($reviews as $review)
            <div class="swiper-slide">
                <div class="tm-slider-wrap">
                    <div class="testimonial-slide">
                        <div class="tm-quote-icon">
                            <svg width="47" height="39" viewBox="0 0 47 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M46.6603 38.5078H29.1024C27.3869 32.8461 26.5292 26.9786 26.5292 20.9052C26.5292 14.7289 28.0933 9.83929 31.2214 6.23643C34.4505 2.53063 39.1931 0.677734 45.4494 0.677734V9.3246C40.404 9.3246 37.8813 12.4642 37.8813 18.7435V21.6773H46.6603V38.5078ZM21.0802 38.5078H3.52219C1.80675 32.8461 0.949036 26.9786 0.949036 20.9052C0.949036 14.7289 2.51311 9.83929 5.64125 6.23643C8.87031 2.53063 13.613 0.677734 19.8693 0.677734V9.3246C14.8239 9.3246 12.3012 12.4642 12.3012 18.7435V21.6773H21.0802V38.5078Z" fill="black"/>
                            </svg>
                        </div>
                        
                        <p class="testimonial-subtitle"> {{$review->comment}}</p>
                        <div>
                            <div class="tm-user-image">
                                <img class="user" src="{{ get_image($review->user->photo) }}" alt="user">
                            </div>
                            <h4 class="tm-user-name">{{ $review->user->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="testimonial-navs">
            <div class="swiper-button-prev">
                <svg width="25" height="10" viewBox="0 0 25 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.67771 4.53585C0.42137 4.79219 0.42137 5.2078 0.67771 5.46414L4.855 9.64144C5.11134 9.89778 5.52695 9.89778 5.78329 9.64144C6.03963 9.3851 6.03963 8.96949 5.78329 8.71315L2.07014 5L5.78329 1.28685C6.03963 1.03051 6.03963 0.614899 5.78329 0.35856C5.52695 0.10222 5.11134 0.10222 4.855 0.35856L0.67771 4.53585ZM24.3975 5L24.3975 4.3436L1.14185 4.3436L1.14185 5L1.14185 5.6564L24.3975 5.6564L24.3975 5Z" fill="black"/>
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg width="25" height="10" viewBox="0 0 25 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.3999 5.46317C24.6563 5.20683 24.6563 4.79122 24.3999 4.53488L20.2226 0.357587C19.9663 0.101247 19.5507 0.101247 19.2943 0.357587C19.038 0.613926 19.038 1.02953 19.2943 1.28587L23.0075 4.99903L19.2943 8.71218C19.038 8.96852 19.038 9.38412 19.2943 9.64046C19.5507 9.8968 19.9663 9.8968 20.2226 9.64046L24.3999 5.46317ZM0.680176 4.99902L0.680176 5.65542L23.9358 5.65542L23.9358 4.99903L23.9358 4.34263L0.680176 4.34262L0.680176 4.99902Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
</section>
<!-- End Our Clients Feedback -->