{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Banner Area Start -->
<section class="home-hero-section mb-100px position-relative overflow-hidden">
    <!-- Curved background lines -->
    <div class="hero-curves d-none d-lg-block" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0;">
        <svg style="width: 100%; height: 100%;" viewBox="0 0 1440 800" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M-100,200 C300,50 800,600 1540,150" stroke="rgba(180, 160, 220, 0.4)" stroke-width="2" stroke-linecap="round"/>
            <path d="M-50,300 C400,150 700,700 1600,250" stroke="rgba(225, 91, 91, 0.2)" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
    </div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <div class="col-12">
                <div class="home-hero-inner-wrap text-center">
                    <!-- Mobile Hero Title -->
                    <div class="home-hero-tab-titles d-block d-lg-none mb-3">
                        <h2 class="sm-title wow animate__fadeInUp" data-wow-delay=".2s">{{get_phrase('Stylish')}}</h2>
                        <img class="title wow animate__fadeInUp my-2" data-wow-delay=".3s" src="{{ asset('assets/frontend/fashion/images/images/fashion-text..svg') }}" alt="Fashion">
                        <p class="sub-title wow animate__fadeInUp" data-wow-delay=".4s">{{get_phrase('For Any ')}}<span class="fsh-text-skin">{{get_phrase('Season')}}</span></p>
                    </div>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@400;600;800&family=Playfair+Display:ital,wght@1,400;1,600&display=swap" rel="stylesheet">

                    <div class="home-hero-banner position-relative mx-auto">
                         <img class="d-none d-lg-block banner builder-editable img-fluid mx-auto" builder-identity="3" src="{{ asset('assets/frontend/fashion/images/images/fashion-banner-clean-hd-v3.webp') }}?v={{ time() }}" alt="banner">
                         <img class="d-block d-lg-none banner builder-editable img-fluid mx-auto" builder-identity="4" src="{{ asset('assets/frontend/fashion/images/images/fashion-banner-md-clean.png') }}?v={{ time() }}" alt="banner">
                        
                        <!-- Clean HD Typography Overlay for Desktop -->
                        <div class="d-none d-lg-block" style="position: absolute; left: 8%; top: 16%; z-index: 11; text-align: left; max-width: 520px; pointer-events: none;">
                            <span style="font-family: 'Outfit', sans-serif; font-size: 13px; font-weight: 700; color: #E15B5B; text-transform: uppercase; letter-spacing: 4px; display: block; margin-bottom: 5px;">New Collection</span>
                            <h2 style="font-family: 'Playfair Display', serif; font-style: italic; font-size: 58px; color: #E15B5B; margin-bottom: -15px; font-weight: 400; line-height: 1.1;">Stylish</h2>
                            <h1 style="font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 110px; color: #111827; margin-bottom: 22px; line-height: 0.95; letter-spacing: -3px;">Fashion.</h1>
                            <p style="font-family: 'Inter', sans-serif; font-size: 15px; color: #4B5563; max-width: 420px; line-height: 1.6; margin-bottom: 0; font-weight: 400;">For Any Season. Express your brand identity with our premium customized polo t-shirts, hoodies, and corporate apparel.</p>
                        </div>

                        <!-- Real HTML Show More button at the mockup's position -->
                        <a href="{{route('all_products')}}" class="btn fsh-btn-dark pe-4 icon-right" style="position: absolute; left: 8%; top: 70%; z-index: 12; padding: 12px 24px; font-size: 14px; font-weight: 600; text-transform: none;">
                            <span>{{get_phrase('Show More')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewbox="0 0 19 18" fill="none" style="margin-left: 8px;">
                                <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.7473 15.0092 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"></path>
                            </svg>
                        </a>

                        <!-- Clean HD rotating text and play button -->
                        <div class="explore-artworks-btn d-none d-lg-block" style="position: absolute; left: 24%; top: 66.5%; width: 10.0%; height: 14.1%; z-index: 13; pointer-events: none;">
                            <div class="explore-circle-wrap" style="position: relative; width: 120px; height: 120px; display: flex; align-items: center; justify-content: center;">
                                <svg viewBox="0 0 100 100" style="width: 100%; height: 100%; animation: spin 15s linear infinite;">
                                    <path id="circlePath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" fill="transparent" />
                                    <text font-family="'Albert Sans', sans-serif" font-size="7.2" font-weight="700" fill="#111827" letter-spacing="2.6">
                                        <textPath href="#circlePath">EXPLORE ARTWORKS • EXPLORE ARTWORKS •</textPath>
                                    </text>
                                </svg>
                                <a href="{{ get_settings('system_video') }}" class="video-popup" data-maxwidth="900px" data-vbtype="video" style="position: absolute; width: 44px; height: 44px; background: #111827; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3); pointer-events: auto; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); z-index: 13;" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 2px;">
                                        <path d="M11 7L1 13V1L11 7Z" fill="white" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->