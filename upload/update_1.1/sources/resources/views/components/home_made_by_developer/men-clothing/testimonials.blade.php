{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Testimonial Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-between flex-column flex-lg-row column-gap-4 row-gap-4 ts-section-title-area">
                        <h1 class="section-title ts-section-title text-center text-lg-start wow animate__fadeInUp builder-editable" builder-identity="METS1" data-wow-delay=".1s">{{get_phrase('Real reviews from men who made the switch.')}}</h1>
                        <div class="d-flex align-items-center gap-3 wow animate__fadeInUp" data-wow-delay=".2s">
                            <button type="button" class="testimonial-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <path d="M10.2221 5.27749L3.11189 12.3877C3.00142 12.4978 2.91376 12.6286 2.85395 12.7727C2.79414 12.9167 2.76335 13.0711 2.76335 13.2271C2.76335 13.3831 2.79414 13.5375 2.85395 13.6816C2.91376 13.8256 3.00142 13.9564 3.11189 14.0665L10.2221 21.1767C10.4447 21.3993 10.7467 21.5244 11.0615 21.5244C11.3763 21.5244 11.6783 21.3993 11.9009 21.1767C12.1235 20.9541 12.2486 20.6522 12.2486 20.3373C12.2486 20.0225 12.1235 19.7205 11.9009 19.4979L6.81414 14.4112L21.3308 14.4112C21.6451 14.4112 21.9465 14.2863 22.1688 14.0641C22.391 13.8418 22.5159 13.5404 22.5159 13.2261C22.5159 12.9118 22.391 12.6104 22.1688 12.3882C21.9465 12.1659 21.6451 12.0411 21.3308 12.0411L6.81414 12.0411L11.9019 6.95432C12.1245 6.73169 12.2496 6.42975 12.2496 6.11492C12.2496 5.80008 12.1245 5.49814 11.9019 5.27551C11.6793 5.05289 11.3773 4.92782 11.0625 4.92782C10.7477 4.92782 10.4457 5.05289 10.2231 5.27551L10.2221 5.27749Z" fill="black"/>
                                </svg>
                            </button>
                            <button type="button" class="testimonial-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <path d="M15.1934 5.27749L22.3036 12.3877C22.4141 12.4978 22.5018 12.6286 22.5616 12.7727C22.6214 12.9167 22.6522 13.0711 22.6522 13.2271C22.6522 13.3831 22.6214 13.5375 22.5616 13.6816C22.5018 13.8256 22.4141 13.9564 22.3036 14.0665L15.1934 21.1767C14.9708 21.3993 14.6689 21.5244 14.354 21.5244C14.0392 21.5244 13.7372 21.3993 13.5146 21.1767C13.292 20.9541 13.1669 20.6522 13.1669 20.3373C13.1669 20.0225 13.292 19.7205 13.5146 19.4979L18.6014 14.4112L4.08469 14.4112C3.7704 14.4112 3.46898 14.2863 3.24675 14.0641C3.02451 13.8418 2.89966 13.5404 2.89966 13.2261C2.89966 12.9118 3.02451 12.6104 3.24675 12.3882C3.46898 12.1659 3.7704 12.0411 4.08469 12.0411L18.6014 12.0411L13.5136 6.95432C13.291 6.73169 13.1659 6.42975 13.1659 6.11492C13.1659 5.80008 13.291 5.49814 13.5136 5.27551C13.7363 5.05289 14.0382 4.92782 14.353 4.92782C14.6679 4.92782 14.9698 5.05289 15.1924 5.27551L15.1934 5.27749Z" fill="black"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-area wow animate__fadeInUp" data-wow-delay=".3s">
            <!-- Swiper -->
            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">
                    @php 
                    $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
                @endphp
                    @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="testimonial-slide">
                            <div class="ts-stars-wrap">
                                @for($i = 1; $i <= 5; $i++)
                                    <div class="ts-star">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="31" viewBox="0 0 34 31" fill="none">
                                            <path d="M17.2264 0L22.064 10.417L33.4661 11.7989L25.0539 19.6188L27.2631 30.8898L17.2264 25.3059L7.18964 30.8898L9.3988 19.6188L0.986612 11.7989L12.3887 10.417L17.2264 0Z" 
                                                fill="{{ $i <= $review->rating ? '#FFC633' : '#E0E0E0' }}"/>
                                        </svg>
                                    </div>
                                @endfor
                            </div>
                            <div class="ts-name-wrap">
                                <h3 class="ts-user-name">{{ $review->user->name }}</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26" fill="none">
                                    <path d="M13.5616 2.66748C11.5303 2.66748 9.54464 3.26982 7.8557 4.39834C6.16675 5.52686 4.85038 7.13086 4.07305 9.00751C3.29571 10.8842 3.09232 12.9492 3.48861 14.9414C3.88489 16.9337 4.86304 18.7637 6.29937 20.2C7.7357 21.6363 9.56569 22.6145 11.5579 23.0108C13.5502 23.407 15.6152 23.2037 17.4919 22.4263C19.3685 21.649 20.9725 20.3326 22.101 18.6437C23.2295 16.9547 23.8319 14.9691 23.8319 12.9378C23.829 10.2148 22.746 7.6042 20.8206 5.67876C18.8952 3.75333 16.2845 2.67036 13.5616 2.66748ZM18.0706 11.1267L12.5405 16.6568C12.4671 16.7303 12.38 16.7886 12.2841 16.8283C12.1882 16.8681 12.0853 16.8885 11.9815 16.8885C11.8777 16.8885 11.7749 16.8681 11.679 16.8283C11.5831 16.7886 11.496 16.7303 11.4226 16.6568L9.05251 14.2868C8.90427 14.1385 8.82099 13.9375 8.82099 13.7278C8.82099 13.5182 8.90427 13.3171 9.05251 13.1689C9.20075 13.0206 9.40181 12.9374 9.61146 12.9374C9.8211 12.9374 10.0222 13.0206 10.1704 13.1689L11.9815 14.981L16.9528 10.0088C17.0262 9.93538 17.1133 9.87715 17.2092 9.83743C17.3051 9.7977 17.4079 9.77726 17.5117 9.77726C17.6155 9.77726 17.7183 9.7977 17.8142 9.83743C17.9101 9.87715 17.9972 9.93538 18.0706 10.0088C18.144 10.0822 18.2023 10.1693 18.242 10.2652C18.2817 10.3611 18.3022 10.4639 18.3022 10.5677C18.3022 10.6715 18.2817 10.7743 18.242 10.8702C18.2023 10.9661 18.144 11.0533 18.0706 11.1267Z" fill="#01AB31"/>
                                </svg>
                            </div>
                            <p class="testimonial-comment">{{ $review->comment }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->
