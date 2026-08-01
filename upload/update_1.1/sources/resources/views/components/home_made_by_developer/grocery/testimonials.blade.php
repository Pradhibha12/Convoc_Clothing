{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Customer Feedback Area Start -->
<section>
    <div class="container">
        <div class="row mb-50px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center builder-editable" builder-identity="1">{{get_phrase('Our Customer Feedback')}}</h1>
            </div>
        </div>
        <div class="row gy-4 align-items-center justify-content-center section-margin wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-6 col-md-12">
                <div class="customer-feedback-banner">
                    <img class="banner builder-editable" builder-identity="2" src="{{ asset('assets/frontend/grocery/images/images/customer-feedback-banner.webp') }}" alt="banner">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="customer-feedback-testimonial">
                    <!-- Swiper -->
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                            @php 
                           $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                        @endphp
                            @foreach($reviews as $review)
                            <div class="swiper-slide">
                                <div class="single-testimonial">
                                    <p class="al-subtitle3-16px ec-text-dark3 mb-30px">“{{ $review->comment }}”</p>
                                    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <div class="d-flex align-items-center gap-12px">
                                            <div class="rounded-image-44px">
                                                <img src="{{ get_image($review->user->photo) }}" alt="customer">
                                            </div>
                                            <div>
                                                <h4 class="al-title-16px fw-bold mb-2">{{ $review->user->name }}</h4>
                                                <p class="al-subtitle2-14px lh-1">{{ $review->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                        <!-- Starts -->
                                        <div class="d-flex align-items-center gap-1">
                                            @for($i = 0; $i<=5; $i++)
                                            <span class="svg-block">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.8649 7.7173L13.8178 9.69013C13.5367 9.9606 13.3458 10.5015 13.4041 10.8887L13.7223 13.2009C13.9292 14.6805 13.0117 15.3222 11.6859 14.6328L9.43726 13.4555C9.06073 13.2593 8.44554 13.2699 8.07962 13.4873L6.11209 14.6381C4.55822 15.545 3.63015 14.8608 4.0438 13.1108L4.62186 10.6659C4.72793 10.2205 4.53171 9.61058 4.1976 9.30829L2.33614 7.62715C1.00501 6.4233 1.37624 5.33082 3.16876 5.19293L5.43857 5.02323C5.86284 4.99141 6.37726 4.6573 6.57348 4.28076L7.75081 2.02156C8.44554 0.701035 9.56454 0.706339 10.2381 2.03747L11.2881 4.11636C11.4684 4.46638 11.9245 4.80579 12.3117 4.86413L15.1224 5.32021C16.6391 5.57477 16.9733 6.65134 15.8649 7.7173Z" fill="#FBBF27"/>
                                                </svg>
                                            </span>
                                           @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Customer Feedback Area End -->