{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Brand Slider Area End -->
<section class="brand-slider-section">
    <div class="brand-slider-area1">
        <!-- Swiper -->
        <div class="swiper brand-slider brand-slider1">
            <div class="swiper-wrapper">
                 @php 
                    $brands = App\Models\Brand::get();
                  @endphp
                    @foreach($brands as $brand)  
                        <div class="swiper-slide">
                            <div class="brand-slide">
                                <img class="brand" src="{{ get_image($brand->logo) }}" alt="">
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <div class="brand-slider-area2">
        <!-- Swiper -->
        <div class="swiper brand-slider brand-slider2">
            <div class="swiper-wrapper">
                 @foreach($brands as $brand) 
                        <div class="swiper-slide">
                            <div class="brand-slide">
                                <img class="brand" src="{{ get_image($brand->logo) }}" alt="">
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </div>
</section>
<!-- Brand Slider Area End -->