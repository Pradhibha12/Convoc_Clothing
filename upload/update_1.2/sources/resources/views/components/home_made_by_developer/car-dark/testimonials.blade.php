{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Start Testimonial Area -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testi-section-title-area">
                        <h5 class="sm-title-badge3 mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="CTI16" data-wow-delay=".1s">{{ get_phrase('Testimonials') }}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="CTI17" data-wow-delay=".2s">{{ get_phrase('Summer Sale is Here!') }}</h2>
                        <p class="section-subtitle text-center mb-30px max-w-581px mx-auto wow animate__fadeInUp builder-editable" builder-identity="CTI18" data-wow-delay=".3s">{{ get_phrase('From innovative tech to must-have accessories, these customer favorites are making drives smoother, safer, and more stylish. Don’t miss out — grab yours today!') }}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-white">
                                <span class="builder-editable" builder-identity="CTI20">{{ get_phrase('Explore All Products') }}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".5s">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                             @php 
                              $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                           @endphp
                            @foreach($reviews as $review)
                            <div class="swiper-slide">
                                <div class="single-testimonial">
                                    <p class="testimonial-comment">{{$review->comment}}</p>
                                    <div class="d-flex align-items-start gap-2">
                                        <div class="ts-user-profile">
                                            <img class="user" src="{{ get_image($review->user->photo) }}" alt="">
                                        </div>
                                        <div>
                                            <h5 class="ts-user-name">{{ $review->user->name }}</h5>
                                                <div class="ts-user-rating-stars">
                                                    @for($i = 1; $i <= 5; $i++)
                                                    <div class="ts-rating-star">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewbox="0 0 30 28" fill="none">
                                                            <g clip-path="url(#clip0_26_303)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4742 0.952733L18.9195 8.28201L26.9548 9.2838C27.6988 9.37967 28.2432 10.0662 28.1476 10.8106C28.0993 11.1735 27.9182 11.488 27.6605 11.7081L21.8113 17.1857L23.3381 25.1445C23.4808 25.8888 22.9945 26.6045 22.2497 26.7476C21.9255 26.8047 21.6012 26.7476 21.3339 26.5949L14.2335 22.692L7.14349 26.5949C6.47574 26.967 5.6454 26.7191 5.28296 26.0603C5.12036 25.7646 5.08238 25.44 5.1399 25.1445L6.65679 17.1857L0.750369 11.641C0.205779 11.1255 0.17702 10.2576 0.692481 9.71336C0.921452 9.46521 1.2179 9.33174 1.52282 9.2934V9.2838L9.55782 8.28201L13.0027 0.952733C13.318 0.265821 14.1295 -0.0203003 14.816 0.294581C15.1213 0.437641 15.3411 0.676199 15.4742 0.952733Z" fill="url(#paint0_linear_26_303)"></path>
                                                            </g>
                                                            <defs>
                                                                <lineargradient id="paint0_linear_26_303" x1="0.323242" y1="0.166992" x2="0.323242" y2="26.7693" gradientunits="userSpaceOnUse">
                                                                <stop stop-color="#FFC400"></stop>
                                                                <stop offset="1" stop-color="#FF9F00"></stop>
                                                                </lineargradient>
                                                                <clippath id="clip0_26_303">
                                                                <rect width="29.4363" height="27.4739" fill="white" transform="translate(0.323242 0.166992)"></rect>
                                                                </clippath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="testimonial-nav">
                            <div class="swiper-button-prev">
                                <svg width="9" height="15" viewbox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.60023 2.84364L3.29727 7.7045L8.60023 12.5654C9.13326 13.0539 9.13326 13.8432 8.60023 14.3318C8.0672 14.8204 7.20615 14.8204 6.67312 14.3318L0.399772 8.58145C-0.133258 8.09286 -0.133258 7.3036 0.399772 6.81501L6.67312 1.06467C6.79955 0.948513 6.94974 0.85636 7.11508 0.793484C7.28042 0.730607 7.45767 0.698242 7.63667 0.698242C7.81568 0.698242 7.99293 0.730607 8.15827 0.793484C8.32361 0.85636 8.47379 0.948513 8.60023 1.06467C9.11959 1.55326 9.13326 2.35505 8.60023 2.84364Z" fill="white"></path>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg width="9" height="15" viewbox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.399772 12.5528L5.70273 7.69199L0.399772 2.83113C-0.133257 2.34254 -0.133257 1.55328 0.399772 1.06469C0.932802 0.576095 1.79385 0.576095 2.32688 1.06469L8.60023 6.81503C9.13326 7.30362 9.13326 8.09288 8.60023 8.58147L2.32688 14.3318C2.20045 14.448 2.05026 14.5401 1.88492 14.603C1.71958 14.6659 1.54233 14.6982 1.36333 14.6982C1.18432 14.6982 1.00707 14.6659 0.841733 14.603C0.676393 14.5401 0.526205 14.448 0.399772 14.3318C-0.11959 13.8432 -0.133257 13.0414 0.399772 12.5528Z" fill="white"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->