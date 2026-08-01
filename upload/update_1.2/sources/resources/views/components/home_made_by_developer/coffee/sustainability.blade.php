{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


   <!-- Sustainability Commitment Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row justify-content-center gx-4 gy-5">
                <div class="col-md-10 col-lg-6">
                    <div class="commitment-item-wrap">
                        <div class="commitment-item wow animate__fadeInUp" data-wow-delay=".1s">
                            <div class="commitment-type-icon">
                                {{-- <object data="" type="image/svg+xml"></object> --}}
                                <img class="builder-editable" builder-identity="COST1" src="{{ asset('assets/frontend/coffee/images/commitment-icon1.svg  ') }}" alt="">
                            </div> 
                            <h4 class="commitment-type-title builder-editable" builder-identity="COST2">{{get_phrase('Secure Checkout')}}</h4>
                            <p class="commitment-type-subtitle builder-editable" builder-identity="COST3">{{get_phrase('100% Organic & Fair Trade Certified')}}</p>
                        </div>
                        <div class="commitment-item wow animate__fadeInUp" data-wow-delay=".2s">
                            <div class="commitment-type-icon">
                                {{-- <object data="{{ asset('assets/frontend/coffee/images/commitment-icon2.svg  ') }}" type="image/svg+xml"></object> --}}
                                 <img class="builder-editable" builder-identity="COST6" src="{{ asset('assets/frontend/coffee/images/commitment-icon2.svg  ') }}" alt="">
                            </div>
                            <h4 class="commitment-type-title builder-editable" builder-identity="COST4">{{get_phrase('Green Packaging')}}</h4>
                            <p class="commitment-type-subtitle builder-editable" builder-identity="COST5">{{get_phrase('Biodegradable & Compostable Packaging')}}</p>
                        </div>
                        <div class="commitment-item wow animate__fadeInUp" data-wow-delay=".3s">
                            <div class="commitment-type-icon">
                                {{-- <object data=" {{ asset('assets/frontend/coffee/images/commitment-icon3.svg') }}" type="image/svg+xml"></object> --}}
                                <img class="builder-editable" builder-identity="COST7" src="{{ asset('assets/frontend/coffee/images/commitment-icon3.svg  ') }}" alt="">
                            </div>
                            <h4 class="commitment-type-title builder-editable" builder-identity="COST8">{{get_phrase('Women-Owned.')}}</h4>
                            <p class="commitment-type-subtitle builder-editable" builder-identity="COST9">{{get_phrase('Supporting Local & Women-Led Farms')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div>
                        <p class="title-badge mb-28px wow animate__fadeInUp builder-editable" builder-identity="COST10" data-wow-delay=".1s">{{get_phrase('Sustainability Commitment')}}</p>
                        <h2 class="section-title mb-30px wow animate__fadeInUp builder-editable" builder-identity="COST11" data-wow-delay=".2s">{{get_phrase('Better for You. Better for the Planet.')}}</h2>
                        <p class="section-subtitle mb-40px pb-1 wow animate__fadeInUp builder-editable" builder-identity="COST12" data-wow-delay=".3s">{{get_phrase('Our products are crafted with your well-being and the Earth in mind — using organic ingredients, sustainable farming practices, and eco-conscious packaging for a healthier you and a greener future.')}}</p>
                        <a href="javascript:;" class="btn cts-btn-outline-black wow animate__fadeInUp builder-editable" builder-identity="COST13" data-wow-delay=".4s">{{get_phrase('Read Our Mission')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sustainability Commitment Area End -->