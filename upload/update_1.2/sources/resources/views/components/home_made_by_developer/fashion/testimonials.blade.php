{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Testimonial Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp  builder-editable" builder-identity="27" data-wow-delay=".2s">{{get_phrase('What People Are Saying')}}</h1>
                </div>
            </div>
        </div>
        <div class="row mb-100px wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-12">

                <div class="swiper testimonial testimonial-shadow">
                    <div class="swiper-wrapper">
                        @php 
                           $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                        @endphp
                        @foreach($reviews as $review)
                        <div class="swiper-slide">
                            <div class="single-testimonial-card">
                                <div class="d-flex align-items-center gap-1 mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                      <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="star">
                                    @endfor
                                </div>
                                <p class="al-subtitle-16px fsh-text-dark mb-4">{{ $review->comment }}</p>
                                <h4 class="al-title-16px mb-2">{{ $review->user->name }}</h4>
                                <p class="al-subtitle-14px lh-1">{{ $review->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Area End -->