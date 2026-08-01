{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<style>
.category-item1::after {
        background-image: var(--bg-image);
    }
</style>
<!-- Banner Section Start -->
<section class="sp-banner-section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sp-banner-area">
                    <div class="sp-banner-left">
                        <div class="banner-title-btn-wrap">
                            <h1 class="bn-title-40px banner-left-title text-white builder-editable" builder-identity="sb1">{{get_phrase('TAKE YOUR GAME TO THE NEXT LEVEL')}}</h1>
                            <div class="d-flex align-items-center gap-18px flex-wrap justify-content-center justify-content-sm-start">
                                <a href="{{route('all_products')}}" class="btn ec-btn-skin builder-editable" builder-identity="sb2">{{get_phrase('Shop Now')}}</a>
                                <a href="{{ get_settings('system_video') }}" class="video-play-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                                    <span class="builder-editable" builder-identity="sb3">{{get_phrase('Watch Video')}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61" fill="none">
                                        <circle opacity="0.13" cx="30.5" cy="30.5" r="24.5" fill="white"/>
                                        <circle opacity="0.07" cx="30.5" cy="30.5" r="30.5" fill="white"/>
                                        <circle cx="30.5" cy="30.5" r="18.5" fill="#C3FF3D"/>
                                        <path d="M37.0625 28.9845C38.2292 29.658 38.2292 31.342 37.0625 32.0155L28.5313 36.9411C27.3646 37.6146 25.9062 36.7727 25.9062 35.4255L25.9062 25.5745C25.9062 24.2273 27.3646 23.3854 28.5312 24.0589L37.0625 28.9845Z" fill="#0E1B29"/>
                                    </svg>
                                </a>
                            </div>
                        </div> 
                        <div class="banner-happy-customer-wrap d-none d-lg-block">
                            <div class="happy-customer-title">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.1531 10.2951L18.4236 12.9255C18.0489 13.2861 17.7943 14.0074 17.8721 14.5236L18.2964 17.6066C18.5721 19.5794 17.3488 20.435 15.5811 19.5158L12.5829 17.946C12.0809 17.6843 11.2606 17.6985 10.7727 17.9884L8.14937 19.5228C6.07755 20.732 4.84012 19.8198 5.39166 17.4864L6.16241 14.2266C6.30383 13.6326 6.0422 12.8195 5.59672 12.4164L3.11478 10.1749C1.33994 8.56974 1.83491 7.11311 4.22493 6.92926L7.25135 6.70298C7.81704 6.66056 8.50293 6.21508 8.76456 5.71303L10.3343 2.70076C11.2606 0.940064 12.7526 0.947135 13.6507 2.72197L15.0507 5.49383C15.2912 5.96052 15.8993 6.41307 16.4155 6.49085L20.1631 7.09896C22.1854 7.43837 22.6309 8.8738 21.1531 10.2951Z" fill="#FBBF27"/>
                                </svg>
                                <span class="builder-editable" builder-identity="sb4">{{get_phrase('Happy Customer')}}</span>
                            </div>
                            @php
                                $reviewCount = App\Models\Product::avg('average_rating');
                                $reviewCount = round($reviewCount, 1); 
                                $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 

                                $fullStars   = floor($reviewCount); 
                                $halfStar    = ($reviewCount - $fullStars >= 0.5) ? 1 : 0; 
                                $emptyStars  = 5 - ($fullStars + $halfStar); 
                            @endphp
                            <p class="happy-customer-subtitle">{{ number_format($reviewCount, 1) }} {{get_phrase('base on')}} {{ $totalRatings }} {{get_phrase('reviews')}}</p>
                        </div>
                    </div>
                    <div class="sp-banner-image wow animate__fadeInUp" data-wow-delay=".3s">
                        <img class="builder-editable" builder-identity="sb5" src="{{ asset('assets/frontend/sports/images/all-images/sp-banner-image.webp') }}" alt="banner">
                    </div>
                    <div class="sp-banner-right">
                        <div class="sp-banner-right-wrap">
                            <div class="bannerR-titles-wrap">
                                <h1 class="bn-title-84px text-white mb-12px builder-editable" builder-identity="sb6">{{get_phrase('100K')}}</h1>
                                <p class="al-subtitle3-16px bannerR-first-subtitle builder-editable" builder-identity="sb7">{{get_phrase('Also, there’s a tilt and height-adjusting mechanism.')}}</p>
                                <p class="al-subtitle3-16px builder-editable" builder-identity="sb8">{{get_phrase('The gently curved lines accentuated by sewn details are kind to your body.')}}</p>
                            </div>
                            <div class="banner-partners-area">
                                <h4 class="banner-partner-title builder-editable" builder-identity="sb9">{{get_phrase('Partners With ')}}<span class="line"></span></h4>
                                <ul class="d-flex align-items-center gap-20px  justify-content-center justify-content-sm-start">
                                    @php 
                                       $brands = App\Models\Brand::orderBy('id', 'desc')->take(3)->get();

                                   @endphp
                                @foreach($brands as $brand)
                                    <li><a href="{{$brand->official_website_link}}" target="_blank" class="svg-block">
                                       <img class="brand"  src="{{ get_image($brand->logo) }}" alt="">
                                    </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->