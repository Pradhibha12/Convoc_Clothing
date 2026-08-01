{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Testimonial Area Start -->
    <section class="testimonial-section overflow-hidden section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-section-title-area">
                        <h5 class="section-sm-title mb-4 text-center wow animate__fadeInUp builder-editable" builder-identity="WOSTI1" data-wow-delay=".1s">{{get_phrase('Testimonials')}}</h5>
                        <h2 class="section-title text-center mb-30px max-w-744px mx-auto wow animate__fadeInUp builder-editable" builder-identity="WOSTI2" data-wow-delay=".2s">{{get_phrase('Loved by women everywhere')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-wrapper wow animate__fadeInUp" data-wow-delay=".3s">
                        <div class="ts-profile-items">
                            @php 
                                    $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                                @endphp
                            @foreach($reviews as $review)
                            <div class="ts-profile-image">
                                <img src="{{ get_image($review->user->photo) }}" alt="">
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="ts-content-items wow animate__fadeInUp" data-wow-delay=".4s">
                            @foreach($reviews as $review)
                            <div class="ts-content-item">
                                
                                <h4 class="ts-user-name">{{ $review->user->name }}</h4>
                                <div class="ts-user-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                    <div class="ts-rating-star">
                                        <svg width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4064 1.30566L22.476 11.5761L33.8128 13.2331L25.6096 21.2231L27.5456 32.5107L17.4064 27.1786L7.26725 32.5107L9.20321 21.2231L1 13.2331L12.3368 11.5761L17.4064 1.30566Z" fill="#F9DF56" stroke="#F0D44C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    @endfor
                                </div>
                                <p class="ts-user-comment">{{ $review->comment }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->