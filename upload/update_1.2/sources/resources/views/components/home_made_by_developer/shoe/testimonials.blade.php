{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Start Our Reviews -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-area mx-auto mb-40px">
                    <p class="title-badge mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="sT1" data-wow-delay=".1s">{{get_phrase('Our Reviews')}}</p>
                    <h2 class="section-title text-capitalize text-center mb-20px wow animate__fadeInUp builder-editable" builder-identity="sT2" data-wow-delay=".2s">{{get_phrase('What Our Customers Are Saying?')}}</h2>
                    <p class="section-subtitle text-center text-capitalize section-subtitle-max-w mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="sT3" data-wow-delay=".3s">{{get_phrase('Real stories. Real comfort. Real style See why thousands are stepping up')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sh1-slider-main section-mb wow animate__fadeInUp" data-wow-delay=".2s">
        <!-- Swiper -->
        <div class="swiper testimonial-slider">
            <div class="swiper-wrapper">
                @php 
                    $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                @endphp
                @foreach($reviews as $review)
                <div class="swiper-slide">
                    <div class="testimonial-slide">
                        <div class="testimonial-details">
                            <div>
                                <div class="testimonial-logo">
                                    <img class="logo" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="logo">
                                </div>
                                <p class="testimonial-comment">{{$review->comment}}</p>
                            </div>
                            <div>
                                <h4 class="ts-user-name">{{ $review->user->name }}</h4>
                                <p class="ts-user-role">{{ $review->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                        <div class="testimonial-user-profile">
                            <img class="profile" src="{{ get_image($review->user->photo) }}" alt="user">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="testimonial-nav-wrap wow animate__fadeInUp" data-wow-delay=".1s">
                <div class="swiper-button-prev">
                    <svg width="25" height="10" viewBox="0 0 25 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.67771 4.53585C0.42137 4.79219 0.42137 5.2078 0.67771 5.46414L4.855 9.64144C5.11134 9.89778 5.52695 9.89778 5.78329 9.64144C6.03963 9.3851 6.03963 8.96949 5.78329 8.71315L2.07014 5L5.78329 1.28685C6.03963 1.03051 6.03963 0.614899 5.78329 0.35856C5.52695 0.10222 5.11134 0.10222 4.855 0.35856L0.67771 4.53585ZM24.3975 4.3436L1.14185 4.3436L1.14185 5.6564L24.3975 5.6564L24.3975 4.3436Z" fill="black" />
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg width="25" height="10" viewBox="0 0 25 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24.3999 5.46317C24.6563 5.20683 24.6563 4.79122 24.3999 4.53488L20.2226 0.357587C19.9663 0.101247 19.5507 0.101247 19.2943 0.357587C19.038 0.613926 19.038 1.02953 19.2943 1.28587L23.0075 4.99903L19.2943 8.71218C19.038 8.96852 19.038 9.38412 19.2943 9.64046C19.5507 9.8968 19.9663 9.8968 20.2226 9.64046L24.3999 5.46317ZM0.680176 5.65542L23.9358 5.65542L23.9358 4.34263L0.680176 4.34262L0.680176 5.65542Z" fill="black" />
                        </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Reviews -->