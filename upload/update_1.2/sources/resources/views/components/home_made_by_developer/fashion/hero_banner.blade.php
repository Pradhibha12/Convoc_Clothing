{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Banner Area Start -->
<section class="home-hero-section mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="home-hero-inner-wrap">
                    <!-- Title for tab -->
                        <div class="home-hero-tab-titles d-block d-lg-none">
                        <h2 class="sm-title builder-editable wow animate__fadeInUp" builder-identity="1" data-wow-delay=".2s">{{ get_phrase('Stylish') }}</h2>
                        <img class="title wow animate__fadeInUp builder-editable" builder-identity="2" data-wow-delay=".3s" src="{{ asset('assets/frontend/fashion/images/images/fashion-text..svg') }}" alt="">
                        <p class="sub-title wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('For Any ')}}<span class="fsh-text-skin">{{get_phrase('Season')}}</span></p>
                        </div>
                    <div class="home-hero-banner">
                        <img class="d-none d-lg-block banner builder-editable" builder-identity="3" src="{{ asset('assets/frontend/fashion/images/images/fashion-banner-1.webp') }}" alt="banner">
                        <img class="d-block d-lg-none banner  builder-editable" builder-identity="4" src="{{ asset('assets/frontend/fashion/images/images/fashion-banner-md.png') }}" alt="banner">
                        <div class="home-hero-buttons">
                            <a href="{{route('all_products')}}" class="btn fsh-btn-dark pe-4 icon-right mt-12px wow animate__fadeInUp" data-wow-delay=".3s">
                                <span class="builder-editable" builder-identity="5">{{ get_phrase('Show More') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewbox="0 0 19 18" fill="none">
                                    <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"></path>
                                </svg>
                            </a>
                            <a href="{{ get_settings('system_video') }}" class="text-circle-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                                <img class="spin-text" src="{{ asset('assets/frontend/fashion/images/images/circle-text.svg') }}" alt="">
                                <span class="play-icon">
                                    <svg width="17" height="20" viewbox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.375 8.48446C16.5417 9.15803 16.5417 10.842 15.375 11.5155L2.625 18.8768C1.45833 19.5503 -9.05191e-07 18.7084 -8.46306e-07 17.3612L-2.02768e-07 2.63878C-1.43882e-07 1.29163 1.45833 0.449664 2.625 1.12324L15.375 8.48446Z" fill="white"></path>
                                    </svg>                                            
                                </span>                                        
                            </a>
                        </div>
                    </div>
                    <div class="home-hero-list-wrap wow animate__fadeInUp" data-wow-delay=".5s">
                        <h4 class="al-title-24px mb-3  builder-editable" builder-identity="6">{{ get_phrase('In Collaboration') }}</h4>
                        <ul>
                            <li class="fsh-arrow-list-item  builder-editable" builder-identity="7">{{ get_phrase('Jungmave') }}</li>
                            <li class="fsh-arrow-list-item  builder-editable" builder-identity="8">{{ get_phrase('Gildan') }}</li>
                            <li class="fsh-arrow-list-item  builder-editable" builder-identity="9">{{ get_phrase('Roughnext') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->