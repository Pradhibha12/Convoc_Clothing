
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
<!-- Customer Feedback Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="bn-title-60px text-uppercase builder-editable" builder-identity="st1">{{get_phrase('Our Customer Feedback')}}</h1>
            </div>
        </div>
    </div>
    <div class="testimonial-main-wrap section-margin wow animate__fadeInUp" data-wow-delay=".2s">
        <!-- Swiper -->
        <div class="swiper testimonials">
            <div class="swiper-wrapper">
                @php 
                    $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                @endphp
               @foreach($reviews as $review)
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <h5 class="al-title-16px fw-semibold mb-4">{{ $review->created_at->format('F j, Y') }}</h5>
                        <p class="al-subtitle-16px ec-text-dark mb-30px">“{{ $review->comment }}”</p>
                        <div class="d-flex align-items-center gap-12px">
                            <div class="testimonial-profile">
                                <img src="{{ get_image($review->user->photo) }}" alt="user">
                            </div>
                            <div>
                                <h4 class="al-title-16px mb-2">{{ $review->user->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</section>
<!-- Customer Feedback Section End -->