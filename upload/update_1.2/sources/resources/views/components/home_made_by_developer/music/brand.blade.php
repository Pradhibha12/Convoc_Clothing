{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Brand Area Start  -->
    <section class="brand-section overflow-hidden">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <h2 class="brand-section-title wow animate__fadeInUp builder-editable" builder-identity="MBBO1" data-wow-delay=".1s">{{get_phrase('The Brands You Love')}}</h2>
                    <!-- Swiper -->
                    <div class="swiper brand-slider wow animate__fadeInUp" data-wow-delay=".2s">
                        <div class="swiper-wrapper">
                            @php 
                                $brands = App\Models\Brand::get();
                            @endphp
                              @foreach($brands as $brand) 
                            <div class="swiper-slide">
                                <div class="brand-slide-img">
                                    <img class="brand" src="{{ get_image($brand->logo) }}" alt="">
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Area End  -->