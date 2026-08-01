{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Discount Timer Area Start -->
<section>
    <div class="container">
        <div class="row section-margin">
            <div class="col-12">
                <div class="discount-timer-area wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="discount-timer-content">
                        <h2 class="dta-title text-center mb-20px builder-editable" builder-identity="FD3">{{get_phrase('New Collection 50% OFF')}}</h2>
                        <p class="dta-subtitle text-center mb-30px builder-editable" builder-identity="FD1">{{get_phrase('The standard chunk of Lorem Ipsum used since the 1500s is reproduced for those. Sections 1.10.32 and 1.10.33 from Finibus Bonorum et Malorum')}}</p>
                        <div class="text-center">
                            <a href="{{route('all_products')}}" class="btn ec2-btn-skin dta-btn builder-editable" builder-identity="FD2">{{get_phrase('Grab It Now')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Timer Area End -->