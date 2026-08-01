{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Start Testimonial Area  -->
    <section class="testimonial-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                            @php 
                                  $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                                @endphp
                              @foreach($reviews->take(5) as $review)   
                            <div class="swiper-slide">
                                <div class="testimonial-slide">
                                    <div class="ts-user-profile">
                                        <img class="profile" src="{{ get_image($review->user->photo) }}" alt="Image">
                                    </div>
                                    <h6 class="ts-user-name">{{ $review->user->name }}</h6>
                                    <p class="testimonial-subcomment">{{ $review->comment }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="115" height="30" viewBox="0 0 115 30" fill="none">
                                <path d="M114.414 16.1759C115.195 15.3949 115.195 14.1286 114.414 13.3475L101.686 0.619592C100.905 -0.161457 99.6389 -0.161457 98.8579 0.619592C98.0768 1.40064 98.0768 2.66697 98.8579 3.44802L110.172 14.7617L98.8579 26.0754C98.0768 26.8565 98.0768 28.1228 98.8579 28.9039C99.6389 29.6849 100.905 29.6849 101.686 28.9039L114.414 16.1759ZM0 14.7617L-1.74846e-07 16.7617L113 16.7617L113 14.7617L113 12.7617L1.74846e-07 12.7617L0 14.7617Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="115" height="30" viewBox="0 0 115 30" fill="none">
                                <path d="M0.585785 13.3475C-0.195259 14.1286 -0.195259 15.3949 0.585785 16.1759L13.3137 28.9039C14.0948 29.6849 15.3611 29.6849 16.1421 28.9039C16.9232 28.1228 16.9232 26.8565 16.1421 26.0754L4.82843 14.7617L16.1421 3.44801C16.9232 2.66696 16.9232 1.40063 16.1421 0.619583C15.3611 -0.161466 14.0948 -0.161466 13.3137 0.619583L0.585785 13.3475ZM115 14.7617V12.7617H2V14.7617V16.7617H115V14.7617Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area  -->