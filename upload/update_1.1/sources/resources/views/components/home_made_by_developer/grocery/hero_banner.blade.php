{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Banner Area Start -->
<section class="main-banner-section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-banner-area">
                    <div class="mb-2 text-center wow animate__fadeInUp" data-wow-delay=".1s">
                        <a href="javascript:;" class="btn ec-sm2-btn-success builder-editable" builder-identity="h2">{{ get_phrase('The Freshness') }}</a>
                    </div>
                    <h1 class="ml-title-60px max-w-837px mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="2" data-wow-delay=".2s">{{ get_phrase('Fresh Groceries') }} <span class="shape-title">{{ get_phrase('Delivered') }}</span> {{ get_phrase('to Your Door') }}</h1>
                    <div class="d-flex align-items-center gap-3 flex-wrap justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
                        <a href="{{route('all_products')}}" class="btn ec-dark-icon-btn">
                            <span class="builder-editable" builder-identity="3">{{ get_phrase('Shop Now') }}</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M6.49994 4L10.4999 8L6.49994 12" stroke="#0F1311" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </a>
                        <a href="{{ get_settings('system_video') }}" class="play-btn video-popup" data-maxwidth="900px" data-vbtype="video">
                            <span>
                                <svg width="50" height="49" viewBox="0 0 50 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="25" cy="24.5" r="24" stroke="#0F1311"/>
                                    <path d="M31.5625 22.9845C32.7292 23.658 32.7292 25.342 31.5625 26.0155L23.0313 30.9411C21.8646 31.6146 20.4062 30.7727 20.4062 29.4255L20.4062 19.5745C20.4062 18.2273 21.8646 17.3854 23.0312 18.0589L31.5625 22.9845Z" fill="#0F1311"/>
                                </svg>
                            </span>
                            <span class="builder-editable" builder-identity="4">{{ get_phrase('Order Process') }}</span>
                        </a>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="d-flex align-items-start justify-content-between gap-3 flex-wrap main-banner-bottom">
                                <div class="fastest-delivery-badge wow animate__fadeInUp" data-wow-delay=".4s">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                            <path d="M15 28.4375C7.5875 28.4375 1.5625 22.4125 1.5625 15C1.5625 7.5875 7.5875 1.5625 15 1.5625C22.4125 1.5625 28.4375 7.5875 28.4375 15C28.4375 22.4125 22.4125 28.4375 15 28.4375ZM15 3.4375C8.625 3.4375 3.4375 8.625 3.4375 15C3.4375 21.375 8.625 26.5625 15 26.5625C21.375 26.5625 26.5625 21.375 26.5625 15C26.5625 8.625 21.375 3.4375 15 3.4375Z" fill="white"/>
                                            <path d="M19.6375 19.9125C19.475 19.9125 19.3125 19.875 19.1625 19.775L15.2875 17.4625C14.325 16.8875 13.6125 15.625 13.6125 14.5125V9.38751C13.6125 8.87501 14.0375 8.45001 14.55 8.45001C15.0625 8.45001 15.4875 8.87501 15.4875 9.38751V14.5125C15.4875 14.9625 15.8625 15.625 16.25 15.85L20.125 18.1625C20.575 18.425 20.7125 19 20.45 19.45C20.2625 19.75 19.95 19.9125 19.6375 19.9125Z" fill="white"/>
                                        </svg>
                                    </span>
                                    <p class="text builder-editable" builder-identity="5">{{ get_phrase('Fastest Delivery') }}</p>
                                </div>
                                <div class="happy-customer-badge wow animate__fadeInUp" data-wow-delay=".5s">
                                    <ul class="d-flex align-items-center">
                                        @php
                                           $reviews = App\Models\Review::where('rating', 5)->latest()->get();
                                        @endphp
                                        @foreach($reviews->take(3) as $review)
                                        <li class="happy-customer-image">
                                            <img src="{{ get_image($review->user->photo) }}" alt="">
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div>
                                        <h4 class="al-title-16px text-capitalize happy-customer-title builder-editable" builder-identity="6">{{ get_phrase('Our Happy Customer') }}</h4>
                                        <div class="d-flex align-items-center gap-1">
                                            <span class="svg-block">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.1021 6.8634L12.2824 8.61703C12.0326 8.85744 11.8629 9.33827 11.9147 9.6824L12.1976 11.7377C12.3814 13.0529 11.5659 13.6233 10.3874 13.0105L8.38864 11.964C8.05395 11.7896 7.50712 11.799 7.18185 11.9923L5.43294 13.0152C4.05172 13.8213 3.22676 13.2132 3.59446 11.6576L4.10829 9.48441C4.20257 9.08843 4.02815 8.54631 3.73117 8.27761L2.07654 6.78326C0.893312 5.71317 1.2233 4.74208 2.81664 4.61952L4.83425 4.46867C5.21138 4.44038 5.66864 4.1434 5.84306 3.8087L6.88958 1.80052C7.50712 0.62672 8.50178 0.631434 9.10046 1.81466L10.0338 3.66256C10.1941 3.97369 10.5995 4.27539 10.9437 4.32725L13.4421 4.73265C14.7903 4.95893 15.0873 5.91588 14.1021 6.8634Z" fill="#FBBF27"/>
                                                </svg>
                                            </span>
                                            @php
                                                $reviewCount = App\Models\Product::avg('average_rating');
                                                $reviewCount = round($reviewCount, 1); 

                                                $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 

                                                $fullStars   = floor($reviewCount); 
                                                $halfStar    = ($reviewCount - $fullStars >= 0.5) ? 1 : 0; 
                                                $emptyStars  = 5 - ($fullStars + $halfStar); 
                                            @endphp
                                            <h6 class="al-title2-14px fw-medium"> {{ number_format($reviewCount, 1) }} <span class="ec-text-success">({{ $totalRatings }} {{get_phrase('Review')}})</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img class="egBanner builder-editable" builder-identity="h1" src="{{ asset('assets/frontend/grocery/images/images/banner-after.png') }}" alt="">
</section>
<!-- Banner Area End -->