{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Why Choose Us? Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="why-choose-title-area">
                    <p class="bs-title-badge mx-auto mb-26px wow animate__fadeInUp builder-editable" builder-identity="BSC1" data-wow-delay=".1s">{{get_phrase('Why Choose Us?')}}</p>
                    <h2 class="section-title text-center max-w-898px mx-auto mb-14px wow animate__fadeInUp builder-editable" builder-identity="BSC2" data-wow-delay=".2s">{{get_phrase('What Sets Us Apart?')}}</h2>
                    <p class="section-subtitle text-center max-w-580px mx-auto why-choose-subtitle wow animate__fadeInUp builder-editable" builder-identity="BSC3" data-wow-delay=".3s">{{get_phrase('Quality craftsmanship, eco-conscious values, and design that blends function with fashion.')}}</p>
                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px wow animate__fadeInUp" data-wow-delay=".4s">
                        <a href="{{route('all_products')}}" class="btn bs-btn-skin">
                            <span class="builder-editable" builder-identity="BSC4">{{get_phrase('Shop Now!')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                <path d="M1.77997 8.65667L0.436635 8.65667L0.436635 11.3433L1.77997 11.3433L1.77997 8.65667ZM21.5365 10.9499C22.0611 10.4253 22.0611 9.57472 21.5365 9.05012L12.9876 0.501199C12.463 -0.023406 11.6124 -0.0234059 11.0878 0.501199C10.5632 1.0258 10.5632 1.87635 11.0878 2.40096L18.6869 10L11.0878 17.599C10.5632 18.1236 10.5632 18.9742 11.0878 19.4988C11.6124 20.0234 12.463 20.0234 12.9876 19.4988L21.5365 10.9499ZM1.77997 10L1.77997 11.3433L20.5866 11.3433L20.5866 10L20.5866 8.65667L1.77997 8.65667L1.77997 10Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="why-choose1-card">
                    <img class="why-choose-banner builder-editable" builder-identity="BSC5" src="{{ asset('assets/frontend/bags/images/why-choose-banner1.webp') }}" alt="banner">
                    <div class="why-choose-content">
                        <div class="why-choose-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="58" viewBox="0 0 65 58" fill="none">
                                <path d="M13.963 56.9998C16.8267 56.9998 19.1481 54.6783 19.1481 51.8146C19.1481 48.9509 16.8267 46.6294 13.963 46.6294C11.0993 46.6294 8.77777 48.9509 8.77777 51.8146C8.77777 54.6783 11.0993 56.9998 13.963 56.9998Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M50.5185 56.9998C53.3822 56.9998 55.7037 54.6783 55.7037 51.8146C55.7037 48.9509 53.3822 46.6294 50.5185 46.6294C47.6548 46.6294 45.3333 48.9509 45.3333 51.8146C45.3333 54.6783 47.6548 56.9998 50.5185 56.9998Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M45.3333 51.8149H19.1481" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.77778 51.815H1V38.8521H63.4815V51.815H55.7037" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M34.9344 14.0928H42.7407V38.852H1V14.0928H8.67667" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.1763 14.0948L20.5328 17.4513L26.2778 11.7065" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.8704 26.7963C28.9938 26.7963 34.7685 21.0216 34.7685 13.8981C34.7685 6.7747 28.9938 1 21.8704 1C14.7469 1 8.97223 6.7747 8.97223 13.8981C8.97223 21.0216 14.7469 26.7963 21.8704 26.7963Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M63.4815 38.8518H42.7407V24.2036H54.4074L63.4815 38.8518Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M50.5185 33.6533V38.8516" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4 class="why-choose-title builder-editable" builder-identity="BSC6">{{get_phrase('Free shipping on all orders')}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="w-100 h-100">
                    <div class="why-choose2-card mb-3">
                        <img class="why-choose-banner builder-editable" builder-identity="BSC7" src="{{ asset('assets/frontend/bags/images/why-choose-banner2.webp') }}" alt="banner">
                        <div class="why-choose-content">
                            <div class="why-choose-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
                                    <mask id="mask0_44_810" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="56" height="56">
                                        <path d="M55 55V1H1V55H55Z" fill="white" stroke="white" stroke-width="2"/>
                                    </mask>
                                    <g mask="url(#mask0_44_810)">
                                        <path d="M44.4063 45.3906C42.5941 45.3906 41.125 43.9215 41.125 42.1094V28.9844C41.125 27.1722 42.5941 25.7031 44.4063 25.7031C46.2184 25.7031 47.6875 27.1722 47.6875 28.9844V42.1094C47.6875 43.9215 46.2184 45.3906 44.4063 45.3906Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.5938 45.3906C13.4059 45.3906 14.875 43.9215 14.875 42.1094V28.9844C14.875 27.1722 13.4059 25.7031 11.5938 25.7031C9.78163 25.7031 8.3125 27.1722 8.3125 28.9844V42.1094C8.3125 43.9215 9.78163 45.3906 11.5938 45.3906Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3.9375 29.1851V25.7029C3.9375 12.4136 14.7106 1.64039 28 1.64039C41.2894 1.64039 52.0625 12.4136 52.0625 25.7029V29.1851" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M50.9688 42.1094H47.6875V28.9844H50.9688C52.7809 28.9844 54.25 30.4535 54.25 32.2656V38.8281C54.25 40.6402 52.7809 42.1094 50.9688 42.1094Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.03125 42.1094H8.3125V28.9844H5.03125C3.21913 28.9844 1.75 30.4535 1.75 32.2656V38.8281C1.75 40.6402 3.21913 42.1094 5.03125 42.1094Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M28 51.0781C28 52.8902 26.5309 54.3594 24.7188 54.3594C22.9066 54.3594 21.4375 52.8902 21.4375 51.0781C21.4375 49.266 22.9066 47.7969 24.7188 47.7969C26.5309 47.7969 28 49.266 28 51.0781Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.5938 45.3906C11.5938 48.5318 14.1401 51.0781 17.2813 51.0781H21.4375" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M37.5897 19.6419H29.3478C29.3478 19.6419 33.7115 11.732 34.4316 10.8485C35.1597 9.95509 35.8494 10.5123 35.915 11.3003C35.9807 12.0885 35.8823 23.5156 35.8823 23.5156" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M26.3952 23.4859C26.3952 23.4859 20.132 23.5647 19.8353 23.4657C19.5386 23.3668 20.3109 22.8444 24.4174 16.9772C25.1842 15.8815 25.6064 14.9571 25.786 14.1826L25.8497 13.6846C25.8497 11.8654 24.3748 10.3906 22.5556 10.3906C20.9548 10.3906 19.6208 11.5324 19.3235 13.0461" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                </svg>
                            </div>
                            <h4 class="why-choose-title builder-editable" builder-identity="BSC8">{{get_phrase('24/7 customer support')}}</h4>
                        </div>
                    </div>
                    <div class="why-choose3-card">
                        <p class="why-choose-badge mx-auto builder-editable" builder-identity="BSC9">{{get_phrase('Why Choose Us?')}}</p>
                        <h3 class="why-choose3-title builder-editable" builder-identity="BSC10">{{get_phrase('Unrivaled Quality, Inspired by You!!')}}</h3>
                        <p class="why-choose3-subtitle builder-editable" builder-identity="BSC11">{{get_phrase('Quality craftsmanship, eco-conscious values, and design that blends function with fashion.')}}</p>
                        <div class="text-center">
                            <a href="{{route('all_products')}}" class="btn bs-btn-white">
                                <span class="builder-editable" builder-identity="BSC12">{{get_phrase('Explore')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                    <path d="M2 7.59594L0.943592 7.59594L0.943593 9.70875L2 9.70875L2 7.59594ZM17.5468 9.39934C17.9593 8.98678 17.9593 8.3179 17.5468 7.90535L10.8238 1.18241C10.4113 0.76986 9.74239 0.769861 9.32984 1.18241C8.91729 1.59497 8.91729 2.26385 9.32984 2.6764L15.3058 8.65234L9.32984 14.6283C8.91729 15.0408 8.91729 15.7097 9.32984 16.1223C9.7424 16.5348 10.4113 16.5348 10.8238 16.1223L17.5468 9.39934ZM2 8.65234L2 9.70875L16.7998 9.70875L16.7998 8.65234L16.7998 7.59593L2 7.59594L2 8.65234Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="why-choose1-card">
                    <img class="why-choose-banner builder-editable" builder-identity="BSC21" src="{{ asset('assets/frontend/bags/images/why-choose-banner3.webp') }}" alt="banner">
                    <div class="why-choose-content">
                        <div class="why-choose-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
                                <mask id="mask0_44_716" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="56" height="56">
                                    <path d="M0 0H56V56H0V0Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_44_716)">
                                    <path d="M11.5938 18.0469C11.5938 8.98592 18.939 1.64062 28 1.64062C37.061 1.64062 44.4063 8.98592 44.4063 18.0469C44.4063 27.1078 37.061 34.4531 28 34.4531C18.939 34.4531 11.5938 27.1078 11.5938 18.0469Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.7969 12.5781C19.7969 11.6721 20.5314 10.9375 21.4375 10.9375C22.3436 10.9375 23.0781 11.6721 23.0781 12.5781C23.0781 13.4842 22.3436 14.2188 21.4375 14.2188C20.5314 14.2188 19.7969 13.4842 19.7969 12.5781Z" fill="white"/>
                                    <path d="M36.2031 12.5781C36.2031 11.6721 35.4686 10.9375 34.5625 10.9375C33.6564 10.9375 32.9219 11.6721 32.9219 12.5781C32.9219 13.4842 33.6564 14.2188 34.5625 14.2188C35.4686 14.2188 36.2031 13.4842 36.2031 12.5781Z" fill="white"/>
                                    <path d="M34.5625 20.2344C34.5625 23.8587 31.6244 26.7969 28 26.7969C24.3756 26.7969 21.4375 23.8587 21.4375 20.2344" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M28 41.2344L30.1322 45.5548L34.9002 46.2477L31.4501 49.6106L32.2645 54.3594L28 52.1173L23.7355 54.3594L24.5499 49.6106L21.0997 46.2477L25.8677 45.5548L28 41.2344Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M47.4591 41.2344L49.5914 45.5548L54.3593 46.2477L50.9092 49.6106L51.7236 54.3594L47.4591 52.1173L43.1946 54.3594L44.009 49.6106L40.5588 46.2477L45.3268 45.5548L47.4591 41.2344Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.54088 41.2344L6.40861 45.5548L1.64062 46.2477L5.09075 49.6106L4.27634 54.3594L8.54088 52.1173L12.8054 54.3594L11.991 49.6106L15.4411 46.2477L10.6731 45.5548L8.54088 41.2344Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                        </div>
                        <h4 class="why-choose-title builder-editable" builder-identity="BSC13">{{get_phrase('100% satisfaction guarantee')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Us? Area End -->