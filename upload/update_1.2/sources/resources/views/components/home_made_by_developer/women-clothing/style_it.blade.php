{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Style It Your Way Area Start -->
    <section class="section-mb style-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="style-main-wrap">
                        <div class="style-banner1 wow animate__fadeInLeft" data-wow-delay=".1s">
                            <img class="banner builder-editable" builder-identity="WOST1" src="{{ asset('assets/frontend/women-clothing/images/style-banner1.webp') }}" alt="banner">
                        </div>
                        <div class="style-content">
                            <h5 class="section-sm-title mb-4 text-center wow animate__fadeInUp builder-editable" builder-identity="WOST2" data-wow-delay=".1s">{{get_phrase('Style It Your Way')}}</h5>
                            <h2 class="section-title text-center mb-30px wow animate__fadeInUp builder-editable" builder-identity="WOST3" data-wow-delay=".2s">{{get_phrase('Looks for every vibe and every version of you!')}}</h2>
                            <p class="style-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="WOST4" data-wow-delay=".3s">{{get_phrase('Discover curated outfit ideas that match your mood, moment, and lifestyle — because great style starts with inspiration.')}}</p>
                            <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                                <a href="{{route('all_products')}}" class="btn dark-corner-btn hero-corner-btn min-w-177px mx-auto builder-editable" builder-identity="WOST5">{{get_phrase('Explore Collection')}}</a>
                            </div>
                        </div>
                        <div class="style-banner2-wrap wow animate__fadeInRight" data-wow-delay=".1s">
                            <div class="style-banner2">
                                <img class="banner builder-editable" builder-identity="WOST6" src="{{ asset('assets/frontend/women-clothing/images/style-banner2.webp') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Style It Your Way Area End -->