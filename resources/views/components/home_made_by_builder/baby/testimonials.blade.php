{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Start Testimonials Section  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tm-section-title-area">
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <p class="section-sm-title mb-30px builder-editable" builder-identity="BTN1"><span class="line"></span>{{get_phrase('Customer Testimonials')}}<span class="line"></span></p>
                        </div>
                        <h2 class="section-title text-center max-w-712px mx-auto mb-3 wow animate__fadeInUp builder-editable" builder-identity="BTN2" data-wow-delay=".2s">{{get_phrase('Loved by Families Everywhere')}}</h2>
                        <p class="section-subtitle max-w-584px mx-auto text-center mb-36px wow animate__fadeInUp builder-editable" builder-identity="BTN3" data-wow-delay=".3s">{{get_phrase('Real stories from happy parents')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('contact_us')}}" class="btn ba-btn-outline-dark px-30px">
                                <span class="builder-editable" builder-identity="BTN4">{{get_phrase('Contact us')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                    <path d="M2.4375 1.14179C2.40683 1.65843 2.76563 2.08629 3.23896 2.09728L7.5956 2.19832L0.712227 9.10554C0.355865 9.46313 0.320697 10.0555 0.633679 10.4287C0.946662 10.8018 1.48931 10.8144 1.84567 10.4568L8.72918 3.54946L8.44686 8.30581C8.41615 8.8225 8.775 9.25031 9.24832 9.2613C9.72164 9.27228 10.1302 8.86233 10.1609 8.3456L10.5772 1.33062C10.592 1.08244 10.5158 0.842404 10.3655 0.663225C10.2152 0.484047 10.0031 0.380413 9.77577 0.375137L3.35 0.226058C2.87672 0.215115 2.46817 0.625067 2.4375 1.14179Z" fill="black"/>
                                </svg>
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
                           $reviews = App\Models\Review::where('rating', 5)->latest()->take(5)->get(); 
                        @endphp
                           @foreach($reviews as $review) 
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <p class="testimonial-comment">{{ $review->comment }}</p>
                                        <div class="tm-user-rating-wrap">
                                            <div>
                                                <h5 class="tm-user-name">{{ $review->user->name }}</h5>
                                            </div>
                                            <div class="tm-rating-stars d-flex">
                                                @php
                                                    $rating = $review->rating; 
                                                @endphp
                                                @for ($i = 1; $i <= $rating; $i++)
                                                    <div class="tm-star">
                                                        <svg width="28" height="27" viewBox="0 0 28 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.9874 22.3802L6.52243 26.8063C6.34787 26.9099 6.14578 26.9609 5.94157 26.9529C5.73735 26.9448 5.54015 26.8781 5.37475 26.761C5.20935 26.644 5.08315 26.4818 5.01202 26.2951C4.9409 26.1083 4.92802 25.9051 4.975 25.7112L6.98666 17.4207L0.360344 11.8671C0.205451 11.7372 0.0934238 11.5655 0.0383478 11.3737C-0.0167282 11.1818 -0.0123938 10.9784 0.0508059 10.789C0.114006 10.5995 0.233249 10.4325 0.393542 10.309C0.553835 10.1854 0.748021 10.1108 0.951683 10.0945L9.66013 9.39817L13.0313 1.53865C13.1101 1.3548 13.2429 1.19778 13.4131 1.08734C13.5832 0.976896 13.783 0.917969 13.9874 0.917969C14.1918 0.917969 14.3916 0.976896 14.5617 1.08734C14.7319 1.19778 14.8647 1.3548 14.9435 1.53865L18.3147 9.39817L27.0231 10.0945C27.2267 10.111 27.4207 10.1858 27.5808 10.3095C27.7409 10.4331 27.8599 10.6001 27.923 10.7895C27.986 10.9789 27.9902 11.1823 27.9351 11.374C27.88 11.5657 27.7679 11.7373 27.6131 11.8671L20.9881 17.4207L22.9998 25.7112C23.0468 25.9051 23.0339 26.1083 22.9628 26.2951C22.8917 26.4818 22.7655 26.644 22.6001 26.761C22.4347 26.8781 22.2375 26.9448 22.0332 26.9529C21.829 26.9609 21.6269 26.9099 21.4524 26.8063L13.9874 22.3802Z" fill="#FFD23C"/>
                                                        </svg>
                                                    </div>
                                                @endfor

                                                @for ($i = $rating+1; $i <= 5; $i++)
                                                    <div class="tm-star">
                                                        <svg width="28" height="27" viewBox="0 0 28 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.9874 22.3802L6.52243 26.8063C6.34787 26.9099 6.14578 26.9609 5.94157 26.9529C5.73735 26.9448 5.54015 26.8781 5.37475 26.761C5.20935 26.644 5.08315 26.4818 5.01202 26.2951C4.9409 26.1083 4.92802 25.9051 4.975 25.7112L6.98666 17.4207L0.360344 11.8671C0.205451 11.7372 0.0934238 11.5655 0.0383478 11.3737C-0.0167282 11.1818 -0.0123938 10.9784 0.0508059 10.789C0.114006 10.5995 0.233249 10.4325 0.393542 10.309C0.553835 10.1854 0.748021 10.1108 0.951683 10.0945L9.66013 9.39817L13.0313 1.53865C13.1101 1.3548 13.2429 1.19778 13.4131 1.08734C13.5832 0.976896 13.783 0.917969 13.9874 0.917969C14.1918 0.917969 14.3916 0.976896 14.5617 1.08734C14.7319 1.19778 14.8647 1.3548 14.9435 1.53865L18.3147 9.39817L27.0231 10.0945C27.2267 10.111 27.4207 10.1858 27.5808 10.3095C27.7409 10.4331 27.8599 10.6001 27.923 10.7895C27.986 10.9789 27.9902 11.1823 27.9351 11.374C27.88 11.5657 27.7679 11.7373 27.6131 11.8671L20.9881 17.4207L22.9998 25.7112C23.0468 25.9051 23.0339 26.1083 22.9628 26.2951C22.8917 26.4818 22.7655 26.644 22.6001 26.761C22.4347 26.8781 22.2375 26.9448 22.0332 26.9529C21.829 26.9609 21.6269 26.9099 21.4524 26.8063L13.9874 22.3802Z" fill="#ddd"/>
                                                        </svg>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                          

                        </div>
                        <div class="testimonial-nav">
                            <div class="swiper-button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none">
                                    <path d="M11.6181 1.49482L10.5264 0.234958L0.272445 9.94451L10.2835 19.9043L11.406 18.6718L2.66367 9.97404L11.6181 1.49482Z" fill="black"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none">
                                    <path d="M0.650434 1.49482L1.74215 0.234958L11.9961 9.94451L1.98503 19.9043L0.862541 18.6718L9.60488 9.97404L0.650434 1.49482Z" fill="black"/>
                                </svg>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonials Section  -->