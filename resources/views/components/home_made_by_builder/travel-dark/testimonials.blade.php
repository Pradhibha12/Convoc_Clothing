{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Testimonials Section  Start  -->
  <section class="testimonials-area wow animate__fadeInUp" data-wow-delay=".1s">
    <div class="tr-testimonials-image ">
        <img class="builder-editable" builder-identity="TDR1" src="{{ asset('assets/frontend/travel-dark/images/testimonials_bg.png ') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="tr-section wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="arrow-line"></div>
                    <span class="d-block builder-editable" builder-identity="TDR2">{{get_phrase('Testimonials')}}</span>
                    <h2 class="mb-2 builder-editable" builder-identity="TDR3">{{get_phrase('Loved by Thousands of Travelers!')}}</h2>
                    <p class="builder-editable" builder-identity="TDR4">{{get_phrase('Real stories. Real adventures. Real satisfaction.')}}</p>
                </div>
            </div>
            <!-- Testimonials  Slider  -->
             <div class="col-lg-2 col-md-2 col-sm-12"></div>
             <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="testimonials-slider swiper wow animate__fadeInUp" data-wow-delay=".1s">
                     <div class="swiper-wrapper">
                         @php 
                    $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                @endphp
                            <!-- Slider -->
                            @foreach($reviews as $review)
                            <div class="swiper-slide tr-slider-content">
                                    <span><img src="{{ asset('assets/frontend/travel-dark/images/testi_frame.png ') }}" alt=""></span>
                                    <img class="tr-sImage"  src="{{ get_image($review->user->photo) }}" alt="">
                                    <p>{{$review->comment}}</p>
                                    <div class="userInfo">
                                        <h4> {{ $review->user->name }}</h4>
                                        <span>{{ $review->created_at->format('F j, Y') }}</span> 
                                    </div>
                            </div>
                          @endforeach
                            <!-- Slider -->
                     </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-2 col-sm-12"></div>
        </div>
    </div>
  </section>
 <!-- Testimonials Section  End  -->