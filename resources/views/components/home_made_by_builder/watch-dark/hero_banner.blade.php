{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

   <!-- Banner Area Start -->
    <section class="wch-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wch-banner-area">
                        <!-- Slider main container -->
                        <div class="swiper wch-banner-slider">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slider -->
                                <div class="swiper-slide">
                                    <div class="wch-banner-slide">
                                        <div class="bn-rating-star-wrap">
                                            <div class="bn-rating-stars">
                                                 @for($i= 1; $i<=5; $i++)
                                                <div class="bn-rating-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewbox="0 0 26 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0569 0.677142L16.026 6.99343L22.9508 7.85676C23.5919 7.93938 24.0611 8.53104 23.9787 9.17258C23.9371 9.48524 23.781 9.75629 23.559 9.94599L18.5182 14.6665L19.8339 21.5253C19.9569 22.1668 19.5378 22.7835 18.896 22.9068C18.6166 22.956 18.3371 22.9068 18.1067 22.7753L11.9877 19.4118L5.87761 22.7753C5.30215 23.0959 4.58658 22.8823 4.27423 22.3146C4.1341 22.0597 4.10137 21.78 4.15094 21.5253L5.45818 14.6665L0.368093 9.88817C-0.101228 9.44394 -0.126013 8.69595 0.318206 8.22695C0.515531 8.0131 0.771003 7.89808 1.03379 7.86503V7.85676L7.95825 6.99343L10.927 0.677142C11.1987 0.0851697 11.8981 -0.161407 12.4897 0.109954C12.7528 0.233242 12.9422 0.438828 13.0569 0.677142Z" fill="url(#paint0_linear_35_501)"></path>
                                                        <defs>
                                                            <lineargradient id="paint0_linear_35_501" x1="0" y1="-3.13909e-10" x2="0" y2="22.9256" gradientunits="userSpaceOnUse">
                                                            <stop stop-color="#FFC400"></stop>
                                                            <stop offset="1" stop-color="#FF9F00"></stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                 @endfor
                                            </div>
                                            @php 
                                                $totalRatings = App\Models\Product::whereNotNull('average_rating')->count(); 
                                            @endphp
                                           <p class="bn-rating-info builder-editable" builder-identity="WAB40">
                                                {{ get_phrase('Based on') }} {{ $totalRatings }} {{ get_phrase('Reviews!') }}
                                            </p>

                                        </div>
                                        <h1 class="wch-banner-title builder-editable" builder-identity="WAB1">{{ get_phrase('Timeless Elegance Crafted for You! 1') }}</h1>
                                        <p class="wch-banner-subtitle builder-editable" builder-identity="WAB2">{{ get_phrase('“Discover watches and jewelry that celebrate heritage, precision & personal style.”') }}</p>
                                        <div class="d-flex align-items-center justify-content-center gap-12px flex-wrap banner-btns-wrap">
                                            <a href="{{route('all_products')}}" class="btn wch-btn-black min-w-209px builder-editable" builder-identity="WAB3">{{ get_phrase('Shop Now') }}</a>
                                            <a href="{{route('all_products')}}" class="btn wch-btn-white min-w-209px builder-editable" builder-identity="WAB4">{{ get_phrase('Explore Jewelry') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="swiper-slide">
                                    <div class="wch-banner-slide">
                                        <div class="bn-rating-star-wrap">
                                            <div class="bn-rating-stars">
                                                @for($i= 1; $i<=5; $i++)
                                                <div class="bn-rating-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewbox="0 0 26 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0569 0.677142L16.026 6.99343L22.9508 7.85676C23.5919 7.93938 24.0611 8.53104 23.9787 9.17258C23.9371 9.48524 23.781 9.75629 23.559 9.94599L18.5182 14.6665L19.8339 21.5253C19.9569 22.1668 19.5378 22.7835 18.896 22.9068C18.6166 22.956 18.3371 22.9068 18.1067 22.7753L11.9877 19.4118L5.87761 22.7753C5.30215 23.0959 4.58658 22.8823 4.27423 22.3146C4.1341 22.0597 4.10137 21.78 4.15094 21.5253L5.45818 14.6665L0.368093 9.88817C-0.101228 9.44394 -0.126013 8.69595 0.318206 8.22695C0.515531 8.0131 0.771003 7.89808 1.03379 7.86503V7.85676L7.95825 6.99343L10.927 0.677142C11.1987 0.0851697 11.8981 -0.161407 12.4897 0.109954C12.7528 0.233242 12.9422 0.438828 13.0569 0.677142Z" fill="url(#paint0_linear_35_501)"></path>
                                                        <defs>
                                                            <lineargradient id="paint0_linear_35_501" x1="0" y1="-3.13909e-10" x2="0" y2="22.9256" gradientunits="userSpaceOnUse">
                                                            <stop stop-color="#FFC400"></stop>
                                                            <stop offset="1" stop-color="#FF9F00"></stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                @endfor
                                            </div>
                                           <p class="bn-rating-info builder-editable" builder-identity="WAB41">
                                                {{ get_phrase('Based on') }} {{ $totalRatings }} {{ get_phrase('Reviews!') }}
                                            </p>
                                        </div>
                                         <h1 class="wch-banner-title builder-editable" builder-identity="WAB5">{{ get_phrase('Timeless Elegance Crafted for You! 2') }}</h1>
                                        <p class="wch-banner-subtitle">{{get_phrase('“Discover watches and jewelry that celebrate heritage, precision & personal style.”')}}</p>
                                        <div class="d-flex align-items-center justify-content-center gap-12px flex-wrap banner-btns-wrap">
                                            <a href="{{route('all_products')}}" class="btn wch-btn-black min-w-209px builder-editable" builder-identity="WAB6">{{ get_phrase('Shop Now') }}</a>
                                            <a href="{{route('all_products')}}" class="btn wch-btn-white min-w-209px builder-editable" builder-identity="WAB7">{{ get_phrase('Explore Jewelry') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="swiper-slide">
                                    <div class="wch-banner-slide">
                                        <div class="bn-rating-star-wrap">
                                            <div class="bn-rating-stars">
                                                 @for($i= 1; $i<=5; $i++)
                                                <div class="bn-rating-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewbox="0 0 26 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0569 0.677142L16.026 6.99343L22.9508 7.85676C23.5919 7.93938 24.0611 8.53104 23.9787 9.17258C23.9371 9.48524 23.781 9.75629 23.559 9.94599L18.5182 14.6665L19.8339 21.5253C19.9569 22.1668 19.5378 22.7835 18.896 22.9068C18.6166 22.956 18.3371 22.9068 18.1067 22.7753L11.9877 19.4118L5.87761 22.7753C5.30215 23.0959 4.58658 22.8823 4.27423 22.3146C4.1341 22.0597 4.10137 21.78 4.15094 21.5253L5.45818 14.6665L0.368093 9.88817C-0.101228 9.44394 -0.126013 8.69595 0.318206 8.22695C0.515531 8.0131 0.771003 7.89808 1.03379 7.86503V7.85676L7.95825 6.99343L10.927 0.677142C11.1987 0.0851697 11.8981 -0.161407 12.4897 0.109954C12.7528 0.233242 12.9422 0.438828 13.0569 0.677142Z" fill="url(#paint0_linear_35_501)"></path>
                                                        <defs>
                                                            <lineargradient id="paint0_linear_35_501" x1="0" y1="-3.13909e-10" x2="0" y2="22.9256" gradientunits="userSpaceOnUse">
                                                            <stop stop-color="#FFC400"></stop>
                                                            <stop offset="1" stop-color="#FF9F00"></stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                @endfor
                                            </div>
                                            <p class="bn-rating-info builder-editable" builder-identity="WAB42">
                                                {{ get_phrase('Based on') }} {{ $totalRatings }} {{ get_phrase('Reviews!') }}
                                            </p>
                                        </div>
                                         <h1 class="wch-banner-title builder-editable" builder-identity="WAB8">{{ get_phrase('Timeless Elegance Crafted for You! 3') }}</h1>
                                        <p class="wch-banner-subtitle">{{get_phrase('“Discover watches and jewelry that celebrate heritage, precision & personal style.”')}}</p>
                                        <div class="d-flex align-items-center justify-content-center gap-12px flex-wrap banner-btns-wrap">
                                            <a href="{{route('all_products')}}" class="btn wch-btn-black min-w-209px builder-editable" builder-identity="WAB9">{{ get_phrase('Shop Now') }}</a>
                                            <a href="{{route('all_products')}}" class="btn wch-btn-white min-w-209px builder-editable" builder-identity="WAB10">{{ get_phrase('Explore Jewelry') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="swiper-slide">
                                    <div class="wch-banner-slide">
                                        <div class="bn-rating-star-wrap">
                                            <div class="bn-rating-stars">
                                                 @for($i= 1; $i<=5; $i++)
                                                <div class="bn-rating-star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewbox="0 0 26 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0569 0.677142L16.026 6.99343L22.9508 7.85676C23.5919 7.93938 24.0611 8.53104 23.9787 9.17258C23.9371 9.48524 23.781 9.75629 23.559 9.94599L18.5182 14.6665L19.8339 21.5253C19.9569 22.1668 19.5378 22.7835 18.896 22.9068C18.6166 22.956 18.3371 22.9068 18.1067 22.7753L11.9877 19.4118L5.87761 22.7753C5.30215 23.0959 4.58658 22.8823 4.27423 22.3146C4.1341 22.0597 4.10137 21.78 4.15094 21.5253L5.45818 14.6665L0.368093 9.88817C-0.101228 9.44394 -0.126013 8.69595 0.318206 8.22695C0.515531 8.0131 0.771003 7.89808 1.03379 7.86503V7.85676L7.95825 6.99343L10.927 0.677142C11.1987 0.0851697 11.8981 -0.161407 12.4897 0.109954C12.7528 0.233242 12.9422 0.438828 13.0569 0.677142Z" fill="url(#paint0_linear_35_501)"></path>
                                                        <defs>
                                                            <lineargradient id="paint0_linear_35_501" x1="0" y1="-3.13909e-10" x2="0" y2="22.9256" gradientunits="userSpaceOnUse">
                                                            <stop stop-color="#FFC400"></stop>
                                                            <stop offset="1" stop-color="#FF9F00"></stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                               @endfor

                                            </div>
                                           <p class="bn-rating-info builder-editable" builder-identity="WAB43">
                                                {{ get_phrase('Based on') }} {{ $totalRatings }} {{ get_phrase('Reviews!') }}
                                            </p>
                                        </div>
                                        <h1 class="wch-banner-title builder-editable" builder-identity="WAB11">{{ get_phrase('Timeless Elegance Crafted for You! 4') }}</h1>
                                        <p class="wch-banner-subtitle">{{get_phrase('“Discover watches and jewelry that celebrate heritage, precision & personal style.”')}}</p>
                                        <div class="d-flex align-items-center justify-content-center gap-12px flex-wrap banner-btns-wrap">
                                            <a href="{{route('all_products')}}" class="btn wch-btn-black min-w-209px builder-editable" builder-identity="WAB12">{{ get_phrase('Shop Now') }}</a>
                                            <a href="{{route('all_products')}}" class="btn wch-btn-white min-w-209px builder-editable" builder-identity="WAB13">{{ get_phrase('Explore Jewelry') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wch-banner-pagination">
                                <div class="swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="25" viewbox="0 0 39 25" fill="none">
                                        <path d="M13.9832 1.14912C14.8888 1.41559 14.8889 1.41664 14.8888 1.41689L14.8879 1.41693L14.8879 1.41888C14.8875 1.4201 14.8867 1.42207 14.8861 1.42383C14.885 1.42766 14.8837 1.43335 14.8818 1.43962C14.8778 1.4528 14.8715 1.47159 14.8642 1.49496C14.8495 1.54233 14.8283 1.61079 14.8001 1.69659C14.7434 1.86875 14.6585 2.1147 14.5462 2.41603C14.3216 3.0185 13.9828 3.8495 13.5237 4.76736C12.6169 6.58023 11.1905 8.83722 9.1638 10.295C8.34723 10.8824 7.50052 11.3802 6.67478 11.8015L38.2554 10.6778L38.3225 12.5653L6.74194 13.689C7.59563 14.0505 8.47541 14.4868 9.33174 15.0147C11.457 16.3249 13.0402 18.4746 14.0735 20.2185C14.5967 21.1015 14.9937 21.9062 15.2605 22.4912C15.394 22.7839 15.4961 23.0231 15.5649 23.1908C15.5992 23.2745 15.6252 23.3412 15.6432 23.3874C15.6522 23.4102 15.6598 23.4285 15.6647 23.4413C15.667 23.4475 15.6687 23.453 15.6701 23.4568C15.6708 23.4585 15.6718 23.4604 15.6723 23.4616L15.6723 23.4635L15.6733 23.4635C15.6699 23.4651 15.6158 23.4863 14.789 23.7949L13.9047 24.1254L13.9037 24.1235L13.8853 24.0743C13.8709 24.0375 13.8479 23.9811 13.8178 23.9077C13.7573 23.7603 13.6656 23.5438 13.5432 23.2754C13.2977 22.7372 12.9311 21.994 12.4495 21.1812C11.4727 19.5327 10.0797 17.6939 8.3414 16.6222C6.51604 15.497 4.53919 14.814 3.00358 14.4122C2.23929 14.2123 1.59226 14.0832 1.13931 14.0056C0.913402 13.9668 0.73622 13.9407 0.617539 13.9245C0.558229 13.9164 0.512793 13.9112 0.484047 13.9077C0.470105 13.906 0.459866 13.9046 0.453619 13.9039C0.450529 13.9036 0.447789 13.9033 0.446753 13.9032L0.479884 12.9668L0.380287 12.0352C0.381302 12.035 0.384067 12.0346 0.387084 12.034C0.39325 12.0329 0.403429 12.0307 0.417164 12.0281C0.445572 12.0225 0.490597 12.0141 0.549129 12.0019C0.666333 11.9772 0.841293 11.9385 1.06381 11.8839C1.51007 11.7742 2.1464 11.5995 2.89447 11.3458C4.39757 10.8359 6.32102 10.014 8.06172 8.76196C9.71932 7.56953 10.9782 5.63626 11.8354 3.92256C12.258 3.07765 12.5709 2.31015 12.7775 1.75586C12.8804 1.47963 12.9566 1.25704 13.0065 1.1057C13.0313 1.03042 13.0502 0.972504 13.0619 0.934675L13.0768 0.884312L13.0777 0.882325L13.9832 1.14912Z" fill="white"></path>
                                    </svg>
                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="24" viewbox="0 0 39 24" fill="none">
                                        <path d="M23.8991 0.795814C23.0148 1.12595 23.0147 1.12703 23.0148 1.12727L23.0158 1.12724L23.0159 1.12919C23.0164 1.13038 23.0173 1.13227 23.018 1.134C23.0194 1.13775 23.0211 1.14331 23.0234 1.14944C23.0284 1.16231 23.036 1.18058 23.0449 1.2034C23.063 1.2496 23.0889 1.31636 23.1232 1.39996C23.192 1.56765 23.2941 1.80693 23.4276 2.09954C23.6944 2.68453 24.0915 3.48931 24.6146 4.37224C25.648 6.11609 27.2312 8.26597 29.3564 9.57606C30.2127 10.1039 31.0926 10.5402 31.9462 10.9018L0.365577 12.0255L0.432738 13.913L32.0133 12.7893C31.1875 13.2106 30.3409 13.7083 29.5243 14.2957C27.4976 15.7536 26.0712 18.0105 25.1644 19.8234C24.7053 20.7413 24.3665 21.5723 24.1419 22.1747C24.0296 22.4761 23.9447 22.722 23.888 22.8942C23.8598 22.98 23.8386 23.0485 23.8239 23.0958C23.8166 23.1192 23.8103 23.138 23.8063 23.1511C23.8044 23.1575 23.8031 23.1631 23.802 23.1669C23.8014 23.1687 23.8005 23.1707 23.8002 23.1719L23.8003 23.1738L23.7993 23.1739C23.8018 23.1749 23.8485 23.1896 24.7049 23.4416L25.6105 23.7084L25.6114 23.7064L25.6262 23.6561C25.6379 23.6183 25.6568 23.5604 25.6817 23.4851C25.7315 23.3338 25.8077 23.1112 25.9106 22.8349C26.1172 22.2806 26.4301 21.5132 26.8527 20.6682C27.7099 18.9545 28.9688 17.0213 30.6264 15.8288C32.3671 14.5767 34.2905 13.7549 35.7937 13.245C36.5418 12.9912 37.178 12.8166 37.6243 12.7069C37.8469 12.6522 38.0218 12.6135 38.139 12.5889C38.1976 12.5766 38.2425 12.5682 38.271 12.5627C38.2848 12.56 38.2948 12.5579 38.301 12.5568C38.3041 12.5562 38.3068 12.5557 38.3078 12.5555L38.2082 11.6239L38.2414 10.6876C38.2403 10.6875 38.2376 10.6872 38.2345 10.6868C38.2283 10.6861 38.218 10.6847 38.2041 10.683C38.1753 10.6796 38.1299 10.6744 38.0706 10.6663C37.9519 10.6501 37.7747 10.6239 37.5488 10.5852C37.0959 10.5075 36.4488 10.3785 35.6845 10.1786C34.149 9.77682 32.172 9.09374 30.3467 7.96854C28.6085 6.89693 27.2154 5.05804 26.2386 3.40959C25.7571 2.59682 25.3904 1.85353 25.1449 1.31532C25.0226 1.04708 24.9308 0.830493 24.8703 0.683082C24.8402 0.609727 24.8173 0.553328 24.8028 0.516431L24.7845 0.467248L24.7834 0.465331L23.8991 0.795814Z" fill="white"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End --> 