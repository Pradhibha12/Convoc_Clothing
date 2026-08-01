{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Customer Feedback Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp builder-editable" builder-identity="FTS1"  data-wow-delay=".1s">{{get_phrase('Our Customer Feedback')}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section-margin wow animate__fadeInUp" data-wow-delay=".2s">
        <!-- Swiper -->
        <div class="swiper testimonial-slider">
            <div class="swiper-wrapper">
                <!-- Single Slide -->
                @php 
                $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
            @endphp
                @foreach($reviews as $review)
                <div class="swiper-slide">
                    <div class="single-testimonial">
                        <div class="testimonial-stars">
                            @for($i = 1; $i <= 5; $i++)
                            <div class="svg-block">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.3647 7.72121L14.3176 9.69404C14.0365 9.9645 13.8456 10.5054 13.9039 10.8926L14.2221 13.2048C14.429 14.6844 13.5115 15.3261 12.1857 14.6367L9.93708 13.4594C9.56054 13.2632 8.94536 13.2738 8.57943 13.4912L6.61191 14.642C5.05804 15.5489 4.12996 14.8648 4.54362 13.1147L5.12168 10.6698C5.22775 10.2244 5.03153 9.61449 4.69742 9.3122L2.83596 7.63105C1.50483 6.4272 1.87606 5.33472 3.66858 5.19684L5.93839 5.02713C6.36265 4.99531 6.87707 4.6612 7.0733 4.28467L8.25063 2.02546C8.94536 0.704942 10.0644 0.710245 10.7379 2.04137L11.7879 4.12027C11.9682 4.47029 12.4243 4.8097 12.8115 4.86803L15.6222 5.32412C17.139 5.57867 17.4731 6.65525 16.3647 7.72121Z" fill="#FBBF27"/>
                                </svg>
                            </div>
                            @endfor
                        </div>
                        <div class="mb-30px">
                            <p class="testimonial-comment">“{{$review->comment}}”</p>
                        </div>
                        <div class="d-flex align-items-center gap-12px justify-content-center">
                            <div class="testimonial-profile">
                                <img src="{{ asset('assets/frontend/furniture/images/all-images/user.svg') }}" alt="user">
                            </div>
                            <div>
                                <h4 class="tm-user-name">{{ $review->user->name }}</h4>
                                <p class="testimonial-date">{{ $review->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Single Slide -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- Customer Feedback Area End -->