
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Testimonial Area Start -->
<section class="testimonial-section section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <p class="bs-title-badge mx-auto mb-26px wow animate__fadeInUp builder-editable" builder-identity="BT1" data-wow-delay=".1s">{{get_phrase('Testimonials')}}</p>
                    <h2 class="section-title text-center max-w-898px mx-auto mb-14px wow animate__fadeInUp builder-editable" builder-identity="BT2" data-wow-delay=".2s">{{get_phrase('What Our Customers Are Saying')}}</h2>
                    <p class="section-subtitle text-center testimonial-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="BT3" data-wow-delay=".3s">{{get_phrase('Real Reviews. Real Journeys.  Join thousands who trust our bags for work, travel, and everyday life.')}}</p>
                    <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                        <a href="javascript:;" class="btn bs-btn-outline-dark px-20px builder-editable" builder-identity="BT4">{{get_phrase('Join Our Happy Customers')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-12">
                <div class="testimonial-wrap-main">
                    <div class="large-testimonial-wrap wow animate__fadeInUp" data-wow-delay=".1s">
                        <div class="swiper-container large-testimonial-view position-relative overflow-hidden">
                            <div class="swiper-wrapper">
                                @php 
                                  $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                                @endphp
                                @foreach($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="single-testimonial">
                                        <div class="testimonial-left-content">
                                           
                                            <div class="testimonial-comment-wrap">
                                                <p class="testimonial-comment">“{{$review->comment}}”</p>
                                            </div>
                                            <div>
                                                <h5 class="ts-user-name">{{ $review->user->name }}</h5>
                                                <p class="ts-user-role">{{ $review->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-user-profile">
                                            <div class="testimonial-quote-shape">
                                                <svg width="37" height="32" viewBox="0 0 37 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.104206 0.724829H14.2357C15.6164 5.2816 16.3067 10.0041 16.3067 14.8923C16.3067 19.8633 15.0479 23.7987 12.5302 26.6984C9.9313 29.6811 6.11417 31.1724 1.0788 31.1724V24.2129C5.13958 24.2129 7.16997 21.686 7.16997 16.6321L7.16997 14.2709H0.104206V0.724829ZM20.6924 0.724829L34.8239 0.724829C36.2046 5.2816 36.8949 10.0041 36.8949 14.8923C36.8949 19.8633 35.6361 23.7987 33.1184 26.6984C30.5195 29.6811 26.7023 31.1724 21.667 31.1724V24.2129C25.7277 24.2129 27.7581 21.686 27.7581 16.6321V14.2709L20.6924 14.2709V0.724829Z" fill="black"/>
                                                </svg>
                                            </div>
                                            <img class="profile" src="{{ get_image($review->user->photo) }}" alt="profile">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="small-testimonial-wrap wow animate__fadeInUp" data-wow-delay=".2s">
                        <div class="swiper-container small-testimonial-view position-relative overflow-hidden">
                            <div class="swiper-wrapper">
                                @foreach($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="small-testimonial">
                                        <div class="sm-testimonial-profile">
                                            <img class="profile" src="{{ get_image($review->user->photo) }}" alt="profile">
                                        </div>
                                        <div>
                                            <h4 class="sm-ts-user-name">{{ $review->user->name }}</h4>
                                            <p class="sm-ts-user-role">{{ $review->created_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="ts-slider-nav">
                                <!-- Add Arrows -->
                                <div class="swiper-button-prev">
                                    <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.0725 10.5913L1.94208 10.5913M1.94208 10.5913L10.9759 19.3594M1.94208 10.5913L10.9759 1.82315" stroke="black" stroke-width="1.99275" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="swiper-button-next">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.72461 10.5914H20.855M20.855 10.5914L11.8212 1.82324M20.855 10.5914L11.8212 19.3595" stroke="black" stroke-width="1.99275" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Area End -->