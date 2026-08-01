
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Inspirational Content Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inspirational-title-area">
                    <p class="bs-title-badge mx-auto mb-26px wow animate__fadeInUp builder-editable" builder-identity="BI1" data-wow-delay=".1s">{{get_phrase('Inspirational Content')}}</p>
                    <h2 class="section-title text-center mb-12px wow animate__fadeInUp builder-editable" builder-identity="BI2" data-wow-delay=".2s">{{get_phrase('Real People. Real Adventures.')}}</h2>
                    <p class="section-subtitle text-center inspirational-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="BI3" data-wow-delay=".3s">{{get_phrase('See how our bags fit into your world. Snapshots from customers around the globe.')}}</p>
                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px wow animate__fadeInUp" data-wow-delay=".4s">
                        <a href="{{route('all_products')}}" class="btn bs-btn-skin">
                            <span class="builder-editable" builder-identity="BI4">{{get_phrase('Shop Now!')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                <path d="M1.77997 8.65667L0.436635 8.65667L0.436635 11.3433L1.77997 11.3433L1.77997 8.65667ZM21.5365 10.9499C22.0611 10.4253 22.0611 9.57472 21.5365 9.05012L12.9876 0.501199C12.463 -0.023406 11.6124 -0.0234059 11.0878 0.501199C10.5632 1.0258 10.5632 1.87635 11.0878 2.40096L18.6869 10L11.0878 17.599C10.5632 18.1236 10.5632 18.9742 11.0878 19.4988C11.6124 20.0234 12.463 20.0234 12.9876 19.4988L21.5365 10.9499ZM1.77997 10L1.77997 11.3433L20.5866 11.3433L20.5866 10L20.5866 8.65667L1.77997 8.65667L1.77997 10Z" fill="white"/>
                            </svg>
                        </a>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <div class="inspirational-gallery-main">
                    <div>
                        <div class="inspirational-img-wrap1">
                            <img class="image builder-editable" builder-identity="BI5" src="{{ asset('assets/frontend/bags/images/inspirational-image1.webp') }}" alt="inspirational">
                        </div>
                    </div>
                    <div>
                        <div class="inspirational-img-wrap2 mb-12px">
                            <img class="image builder-editable" builder-identity="BI6" src="{{ asset('assets/frontend/bags/images/inspirational-image2.webp') }}" alt="inspirational">
                        </div>
                        <div class="inspirational-img-wrap3">
                            <img class="image builder-editable" builder-identity="BI7" src="{{ asset('assets/frontend/bags/images/inspirational-image3.webp') }}" alt="inspirational">
                        </div>
                    </div>
                    <div>
                        <div class="inspirational-img-wrap4 mb-12px">
                            <img class="image builder-editable" builder-identity="BI8" src="{{ asset('assets/frontend/bags/images/inspirational-image4.webp') }}" alt="inspirational">
                        </div>
                        <div class="inspirational-img-wrap5">
                            <img class="image builder-editable" builder-identity="BI9" src="{{ asset('assets/frontend/bags/images/inspirational-image5.webp') }}" alt="inspirational">
                        </div>
                    </div>
                    <div>
                        <div class="inspirational-img-wrap2 mb-12px">
                            <img class="image builder-editable" builder-identity="BI10" src="{{ asset('assets/frontend/bags/images/inspirational-image6.webp') }}" alt="inspirational">
                        </div>
                        <div class="inspirational-img-wrap3">
                            <img class="image builder-editable" builder-identity="BI11" src="{{ asset('assets/frontend/bags/images/inspirational-image7.webp') }}" alt="inspirational">
                        </div>
                    </div>
                    <div>
                        <div class="inspirational-img-wrap1">
                            <img class="image builder-editable" builder-identity="BI12" src="{{ asset('assets/frontend/bags/images/inspirational-image8.webp') }}" alt="inspirational">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inspirational Content Area End -->