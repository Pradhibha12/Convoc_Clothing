{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}



<!-- Start Our Ambassadors -->
<section class="overflow-hidden">
    <div class="container section-pb">
        <div class="row align-items-center justify-content-center gx-4 gy-5">
            <div class="col-lg-6 col-md-10">
                <div class="ambassador-card-area">
                    <div class="ambassador-card wow animate__slideInLeft" data-wow-delay=".1s">
                        <p class="ambassador-badge builder-editable" builder-identity="FA1">{{get_phrase('Popular')}}</p>
                        <img class="ambassador-banner builder-editable" builder-identity="FA2" src="{{ asset('assets/frontend/fitness/images/ambassador-banner1.webp') }}" alt="banner">
                        <a href="{{ get_settings('system_video') }}" class="ambassador-card-play-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                            <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.105 9.54392C23.5519 10.9566 23.5519 14.4884 21.105 15.9011L5.50515 24.9077C3.05826 26.3204 -0.000354767 24.5545 -0.000354767 21.7291L-0.000354767 3.71593C-0.000354767 0.890509 3.05826 -0.875386 5.50515 0.537327L21.105 9.54392Z" fill="white"/>
                            </svg>
                        </a>
                        <div class="ambassador-card-details">
                            <div>
                                <h3 class="ambassador-card-title builder-editable" builder-identity="FA3">{{get_phrase('William Torres')}}</h3>
                                <p class="ambassador-card-subtitle builder-editable" builder-identity="FA4">{{get_phrase('High-energy image of Ashley in workout gear')}}</p>
                            </div>
                            <a href="javascript:;" class="ambassador-card-btn">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.8833 1.95223C20.8833 1.04438 20.1473 0.308413 19.2395 0.308413L4.44509 0.308413C3.53723 0.308413 2.80126 1.04438 2.80126 1.95223C2.80126 2.86009 3.53723 3.59606 4.44509 3.59606H17.5957V16.7466C17.5957 17.6545 18.3316 18.3904 19.2395 18.3904C20.1473 18.3904 20.8833 17.6545 20.8833 16.7466L20.8833 1.95223ZM1.70538 19.4863L2.86774 20.6487L20.4018 3.11459L19.2395 1.95223L18.0771 0.789877L0.543026 18.324L1.70538 19.4863Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div>
                    <p class="sml-title-badge mb-30px wow animate__fadeInUp builder-editable" builder-identity="FA5" data-wow-delay=".1s">{{get_phrase('Our Ambassadors')}}</p>
                    <h2 class="section-title mb-28px wow animate__fadeInUp builder-editable" builder-identity="FA6" data-wow-delay=".2s">{{get_phrase('Meet Our Fitness Ambassador')}}</h2>
                    <p class="section-subtitle fw-bold wow animate__fadeInUp builder-editable" builder-identity="FA7" data-wow-delay=".3s"><span class="fn-text-skin2">{{get_phrase('Strong is a mindset')}}</span>{{get_phrase('. I lift to lead.')}}</p>
                    <p class="section-subtitle fw-medium mb-32px wow animate__fadeInUp builder-editable" builder-identity="FA8" data-wow-delay=".4s">{{get_phrase('“Ashley is a certified personal trainer & wellness coach dedicated to helping men build strength & confidence through smart, sustainable lifting programs. With a focus on empowerment, he brings energy and expertise to every session.”')}}</p>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Ambassadors -->