{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Style Tab Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-center mb-40px max-w-888px mx-auto wow animate__fadeInUp builder-editable" builder-identity="MES1" data-wow-delay=".1s">{{get_phrase('Style Inspiration for Every Moment')}}</h2>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab" tabindex="0">
                            <div class="inspiration-banners-main">
                                <div class="inspiration-banner-wrap mb-4">
                                    <div class="inspiration-banner1">
                                        <h4 class="inspiration-title1 builder-editable" builder-identity="MES2">{{get_phrase('Weekend Casual')}}</h4>
                                        <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black builder-editable" builder-identity="MES3">{{get_phrase('Shop Now')}}</a>
                                    </div>
                                    <div class="inspiration-banner2">
                                        <h4 class="inspiration-title2 builder-editable" builder-identity="MES4">{{get_phrase('Business Formal')}}</h4>
                                        <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black builder-editable" builder-identity="MES5">{{get_phrase('Shop Now')}}</a>
                                    </div>
                                </div>
                                <div class="inspiration-banner-wrap">
                                    <div class="inspiration-banner3">
                                        <div class="ms-auto">
                                            <h4 class="inspiration-title3 builder-editable" builder-identity="MES6">{{get_phrase('Night & Day Wear')}}</h4>
                                            <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black builder-editable" builder-identity="MES7">{{get_phrase('Shop Now')}}</a>
                                        </div>
                                    </div>
                                    <div class="inspiration-banner4">
                                        <h4 class="inspiration-title4 builder-editable" builder-identity="MES8">{{get_phrase('Outdoor Adventures')}}</h4>
                                        <a href="{{route('all_products')}}" class="btn mc-sm-btn-outline-black builder-editable" builder-identity="MES9">{{get_phrase('Shop Now')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Style Tab Area End -->