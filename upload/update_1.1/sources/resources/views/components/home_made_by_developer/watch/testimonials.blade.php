{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

   <!-- Customers Testimonials Area Start -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="testimonial-section-title-area">
                    <div class="wch-section-badge mb-30px justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
                        <img class="badge-shape-left" src=" {{ asset('assets/frontend/watch/images/badge-shape-left.svg') }}" alt="shape">
                        <p class="builder-editable" builder-identity="WDS29">{{get_phrase('Customers Testimonials')}}</p>
                        <img class="badge-shape-right" src="{{ asset('assets/frontend/watch/images/badge-shape-right.svg') }}" alt="shape">
                    </div>
                    <h2 class="section-title mb-40px text-center max-w-1053px mx-auto wow animate__fadeInUp" data-wow-delay=".2s"><span class="fst-italic builder-editable" builder-identity="WDS30">{{get_phrase('What Our Customers Are Saying!')}}</span></h2>
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
                                            <div class="ts-rating-star d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28" fill="none">
                                                        <g clip-path="url(#clip0_26_303)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4742 0.952733L18.9195 8.28201L26.9548 9.2838C27.6988 9.37967 28.2432 10.0662 28.1476 10.8106C28.0993 11.1735 27.9182 11.488 27.6605 11.7081L21.8113 17.1857L23.3381 25.1445C23.4808 25.8888 22.9945 26.6045 22.2497 26.7476C21.9255 26.8047 21.6012 26.7476 21.3339 26.5949L14.2335 22.692L7.14349 26.5949C6.47574 26.967 5.6454 26.7191 5.28296 26.0603C5.12036 25.7646 5.08238 25.44 5.1399 25.1445L6.65679 17.1857L0.750369 11.641C0.205779 11.1255 0.17702 10.2576 0.692481 9.71336C0.921452 9.46521 1.2179 9.33174 1.52282 9.2934V9.2838L9.55782 8.28201L13.0027 0.952733C13.318 0.265821 14.1295 -0.0203003 14.816 0.294581C15.1213 0.437641 15.3411 0.676199 15.4742 0.952733Z" fill="url(#paint0_linear_26_303)"/>
                                                        </g>
                                                        <defs>
                                                            <linearGradient id="paint0_linear_26_303" x1="0.323242" y1="0.166992" x2="0.323242" y2="26.7693" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#FFC400"/>
                                                            <stop offset="1" stop-color="#FF9F00"/>
                                                            </linearGradient>
                                                            <clipPath id="clip0_26_303">
                                                            <rect width="29.4363" height="27.4739" fill="white" transform="translate(0.323242 0.166992)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                @endfor
                                            </div>
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
    <!-- Customers Testimonials Area End -->