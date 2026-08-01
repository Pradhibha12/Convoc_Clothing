{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

  <!-- Hero Banner Area Start  -->
    <section class="mi-hero-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="hero-content-area">
                        <h1 class="hero-title text-center text-lg-start wow animate__fadeInUp builder-editable" builder-identity="MB1" data-wow-delay=".1s">{{get_phrase('Top-quality instruments for musicians of every level.')}}</h1>
                        <p class="hero-subtitle text-center text-lg-start wow animate__fadeInUp builder-editable" builder-identity="MB2" data-wow-delay=".2s">{{get_phrase('Top-quality instruments for musicians of every level.')}}</p>
                        <div class="d-flex align-items-center gap-12px flex-wrap justify-content-center justify-content-lg-start wow animate__fadeInUp" data-wow-delay=".3s">
                           
                            <a href="{{route('all_products')}}" class="btn mib2-btn-outline-dark">
                                <span class="builder-editable" builder-identity="MB3">{{get_phrase('Explore Collection')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                    <path d="M3.0772 1.11306C3.04036 1.73354 3.47128 2.24739 4.03974 2.26058L9.27203 2.38194L1.00516 10.6774C0.577174 11.1069 0.534937 11.8184 0.910826 12.2665C1.28672 12.7146 1.93843 12.7298 2.36642 12.3003L10.6334 4.00464L10.2944 9.71698C10.2575 10.3375 10.6885 10.8513 11.2569 10.8645C11.8254 10.8777 12.316 10.3854 12.3529 9.76477L12.8529 1.33983C12.8707 1.04178 12.7792 0.753493 12.5987 0.538302C12.4182 0.323111 12.1634 0.198647 11.8904 0.192311L4.17311 0.0132683C3.60469 0.000126692 3.11404 0.492474 3.0772 1.11306Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="hero-slider-area wow animate__fadeInUp" data-wow-delay=".3s">
                        <!-- Swiper -->
                        <div class="swiper hero-banner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner builder-editable" builder-identity="MB4" src="{{ asset('assets/frontend/music/images/hero-banner1.webp') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                        <img class="banner builder-editable" builder-identity="MB5" src="{{ asset('assets/frontend/music/images/hero-banner1.webp') }}" alt="banner">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="hero-banner-slide">
                                         <img class="banner builder-editable" builder-identity="MB6" src="{{ asset('assets/frontend/music/images/hero-banner1.webp') }}" alt="banner">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slider-nav">
                            <button class="hero-slider-prev">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.813708 7.02519C0.423183 7.41572 0.423183 8.04888 0.813708 8.43941L7.17767 14.8034C7.56819 15.1939 8.20136 15.1939 8.59188 14.8034C8.98241 14.4128 8.98241 13.7797 8.59188 13.3892L2.93503 7.7323L8.59188 2.07545C8.98241 1.68492 8.98241 1.05176 8.59188 0.661232C8.20136 0.270708 7.56819 0.270708 7.17767 0.661232L0.813708 7.02519ZM19.7323 7.7323V6.7323L1.52081 6.7323V7.7323V8.7323L19.7323 8.7323V7.7323Z" fill="black"/>
                                </svg>
                            </button>
                            <button class="hero-slider-next">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.651 8.70711C20.0415 8.31658 20.0415 7.68342 19.651 7.29289L13.287 0.928933C12.8965 0.538408 12.2633 0.538408 11.8728 0.928933C11.4823 1.31946 11.4823 1.95262 11.8728 2.34315L17.5296 8L11.8728 13.6569C11.4823 14.0474 11.4823 14.6805 11.8728 15.0711C12.2633 15.4616 12.8965 15.4616 13.287 15.0711L19.651 8.70711ZM0.73233 8V9H18.9438V8V7H0.73233V8Z" fill="black"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Banner Area End  -->