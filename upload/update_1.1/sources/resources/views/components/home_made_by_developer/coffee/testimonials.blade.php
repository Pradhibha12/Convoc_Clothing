{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Testimonials Area Start -->
    <section class="testimonials-section section-mb">
        <div class="testi-leaves-shape">
            <img class="shape builder-editable" builder-identity="COFT18" src="{{ asset('assets/frontend/coffee/images/leaves-shape.png ') }}" alt="">
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center gx-4 gy-5">
                <div class="col-md-10 col-lg-6">
                    <div class="testimonial-banner wow animate__fadeInLeft" data-wow-delay=".1s">
                        <img class="banner builder-editable" builder-identity="COFT1" src=" {{ asset('assets/frontend/coffee/images/testimonial-banner.webp') }} " alt="">
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div class="testimonial-area">
                        <div class="mb-38px">
                            <p class="title-badge mb-28px wow animate__fadeInUp builder-editable" builder-identity="COFT2" data-wow-delay=".2s">{{get_phrase('Testimonials')}}</p>
                            <h2 class="section-title wow animate__fadeInUp builder-editable" builder-identity="COFT3" data-wow-delay=".3s">{{get_phrase('Loved by Thousands of Sippers Worldwide')}}</h2>
                        </div>
                        <!-- Swiper -->
                        <div class="swiper testimonial-slider wow animate__fadeInUp" data-wow-delay=".4s">
                            <div class="swiper-wrapper">
                                @php 
                                  $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                                @endphp
                                @foreach($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="testimonial-slide">
                                        <div class="d-flex align-items-center gap-1 flex-wrap mb-30px">
                                             @for($i = 1; $i <= 5; $i++)
                                                <div class="testimonial-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="31" viewBox="0 0 34 31" fill="none">
                                                        <path d="M17.2264 0L22.064 10.417L33.4661 11.7989L25.0539 19.6188L27.2631 30.8898L17.2264 25.3059L7.18964 30.8898L9.3988 19.6188L0.986612 11.7989L12.3887 10.417L17.2264 0Z" 
                                                            fill="{{ $i <= $review->rating ? '#FFC633' : '#E0E0E0' }}"/>
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>
                                        <p class="testimonial-comment">{{ $review->comment }}</p>
                                        <div class="d-flex align-items-center gap-18px ts-user-info">
                                            <div class="ts-user-profile">
                                                <img class="profile" src="{{ get_image($review->user->photo) }}" alt="">
                                            </div>
                                            <div>
                                                <h5 class="ts-user-name">{{ $review->user->name }}</h5>
                                                <p class="ts-user-role">{{ $review->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="testimonial-nav">
                                <div class="swiper-button-prev">
                                    <svg width="20" height="9" viewBox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.209236 4.07807C-0.0041046 4.29141 -0.00410463 4.6373 0.209236 4.85064L3.68583 8.32723C3.89917 8.54057 4.24506 8.54057 4.4584 8.32723C4.67174 8.11389 4.67174 7.768 4.4584 7.55465L1.3681 4.46435L4.4584 1.37405C4.67174 1.16071 4.67174 0.814819 4.4584 0.601478C4.24506 0.388137 3.89917 0.388137 3.68583 0.601478L0.209236 4.07807ZM19.9502 4.46436L19.9502 3.91806L0.595524 3.91806L0.595524 4.46435L0.595524 5.01065L19.9502 5.01065L19.9502 4.46436Z" fill="black"/>
                                    </svg>
                                </div>
                                <div class="swiper-button-next">
                                    <svg width="21" height="9" viewBox="0 0 21 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.8684 4.84967C20.0817 4.63633 20.0817 4.29043 19.8684 4.07709L16.3918 0.600504C16.1785 0.387164 15.8326 0.387164 15.6192 0.600504C15.4059 0.813845 15.4059 1.15974 15.6192 1.37308L18.7095 4.46338L15.6192 7.55368C15.4059 7.76702 15.4059 8.11292 15.6192 8.32626C15.8326 8.5396 16.1785 8.5396 16.3918 8.32626L19.8684 4.84967ZM0.127441 4.46338L0.127441 5.00967L19.4821 5.00967L19.4821 4.46338L19.4821 3.91709L0.127441 3.91709L0.127441 4.46338Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Area End -->