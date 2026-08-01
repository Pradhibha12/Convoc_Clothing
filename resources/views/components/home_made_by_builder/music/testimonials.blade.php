{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Testimonial Area Start  -->
    <section class="testimonial-section section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ts-section-title-area">
                        <h2 class="section-title text-center mb-18px max-w-765px mx-auto wow animate__fadeInUp builder-editable" builder-identity="MTO1" data-wow-delay=".1s">{{get_phrase('Trusted by Musicians Everywhere')}}</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto ts-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="MTO2" data-wow-delay=".2s">{{get_phrase('See what our community has to say.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('contact_us')}}" class="btn mi-btn-outline-dark px-28px builder-editable" builder-identity="MTO3">{{get_phrase('Contact us')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-main wow animate__fadeInUp" data-wow-delay=".4s">
            <!-- Swiper -->
            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">
                     @php 
                        $reviews = App\Models\Review::where('rating', 5)->latest()->get(); 
                    @endphp
                    @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="testimonial-slide">
                            <div class="ts-slide-left">
                                <div class="ts-rating-wrap">
                                    <div class="ts-rating-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                        <span class="ts-star">
                                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 0.398926L16.6831 8.32963L25.3637 9.3817L18.9593 15.3352L20.6412 23.9161L13 19.6649L5.35879 23.9161L7.04068 15.3352L0.636265 9.3817L9.31694 8.32963L13 0.398926Z" fill="#FFC633"/>
                                            </svg>
                                        </span>
                                        @endfor
                                    </div>
                                </div>
                                <p class="testimonial-comment">{{$review->comment}}</p>
                                <div class="ts-user-area">
                                    <h4 class="ts-user-name">{{ $review->user->name }}</h4>
                                    <p class="ts-user-role">{{ $review->user->address }}</p>
                                </div>
                            </div>
                            <div class="ts-quote-img">
                                <img class="quote" src="{{ asset('assets/frontend/music/images/quote.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="testimonial-nav">
                    <div class="swiper-button-prev">
                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.514302 10.3778C-0.0415809 10.9336 -0.0415809 11.8349 0.514302 12.3908L9.57292 21.4494C10.1288 22.0053 11.0301 22.0053 11.5859 21.4494C12.1418 20.8935 12.1418 19.9923 11.5859 19.4364L3.53384 11.3843L11.5859 3.33217C12.1418 2.77629 12.1418 1.87503 11.5859 1.31915C11.0301 0.763268 10.1288 0.763268 9.57292 1.31915L0.514302 10.3778ZM19.7323 11.3843V9.96085L1.52081 9.96085V11.3843V12.8077L19.7323 12.8077V11.3843Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.9504 11.6584C20.5062 11.1025 20.5062 10.2012 19.9504 9.64534L10.8917 0.586728C10.3359 0.0308463 9.4346 0.0308463 8.87872 0.586728C8.32284 1.14261 8.32284 2.04387 8.87872 2.59975L16.9308 10.6519L8.87872 18.704C8.32284 19.2598 8.32284 20.1611 8.87872 20.717C9.4346 21.2729 10.3359 21.2729 10.8917 20.717L19.9504 11.6584ZM0.73233 10.6519V12.0753H18.9438V10.6519V9.22843H0.73233V10.6519Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End  -->