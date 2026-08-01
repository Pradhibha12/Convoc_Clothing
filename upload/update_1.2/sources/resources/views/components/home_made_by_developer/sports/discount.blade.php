{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Discount Section Start -->
<section>
    <div class="container">
        <div class="row section-margin">
            <div class="col-12">
                <div class="ec-discount-area wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="ec-discount-inner">
                        <div class="black-n-white-badge mb-3">
                            <span class="left builder-editable" builder-identity="sd1">{{get_phrase('SALE')}}</span> <span class="right builder-editable" builder-identity="sd5" >{{get_phrase('50%')}}</span>
                        </div>
                        <p class="al-subtitle-16px ec-text-dark mb-30px builder-editable" builder-identity="sd2">{{get_phrase('The gently curved lines accentuated by sewn details are kind to your body.')}}</p>
                        <a href="{{route('all_products')}}" class="btn ec-btn-dark builder-editable" builder-identity="sc3">{{get_phrase('Shop Now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->