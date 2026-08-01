{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Follow us on Instagram Area Start -->
<section class="section-mb insta-gallery-section">
    <div class="container">
        <div class="row insta-gallery-row mb-18px">
            <div class="col-xl-4 align-items-center wow animate__fadeInUp " data-wow-delay=".1s">
                <div class="insta-gallery-title-area">
                    <h2 class="insta-gallery-title section-title mb-14px builder-editable" builder-identity="PF2">{{get_phrase('Follow us on')}} <span class="pt-text-skin">{{get_phrase('Instagram')}}</span></h2>
                    <p class="section-subtitle mb-30px builder-editable" builder-identity="PF3">{{get_phrase('See how our products bring joy to pets everywhere!')}}</p>
                    <a href="javascript:;" class="btn pt-btn-skin px-3 builder-editable" builder-identity="PF4">{{get_phrase('Join Our Pet Community')}} 🐾</a>
                </div>
            </div>
            <div class="col-xl-8 wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="d-flex column-gap-14px row-gap-3 flex-wrap flex-md-nowrap justify-content-center">
                    <div class="insta-gallery1">
                        <img class="banner builder-editable" builder-identity="PF5" src="{{ asset('assets/frontend/pet/images/insta-banner1.webp') }}" alt="instagram">
                    </div>
                    <div class="insta-gallery2">
                        <img class="banner builder-editable" builder-identity="PF6" src="{{ asset('assets/frontend/pet/images/insta-banner2.webp') }}" alt="instagram">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex column-gap-14px row-gap-3 flex-wrap flex-xl-nowrap justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
                    <div class="d-flex column-gap-14px row-gap-3 flex-wrap flex-md-nowrap justify-content-center">
                        <div class="insta-gallery3">
                            <img class="banner builder-editable" builder-identity="PF7" src="{{ asset('assets/frontend/pet/images/insta-banner3.webp') }}" alt="instagram">
                        </div>
                        <div class="insta-gallery4">
                            <img class="banner builder-editable" builder-identity="PF8" src="{{ asset('assets/frontend/pet/images/insta-banner4.webp') }}" alt="instagram">
                        </div>
                    </div>
                    <div class="insta-gallery5">
                        <img class="banner builder-editable" builder-identity="PF9" src="{{ asset('assets/frontend/pet/images/insta-banner5.webp') }}" alt="instagram">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Follow us on Instagram Area End -->