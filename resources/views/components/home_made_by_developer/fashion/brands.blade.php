{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
<style>
    .sponsor-slider .swiper-wrapper {
	display: flex;
	justify-content: center;
	gap: 12px;
}
</style>
<!-- Sponsors Area Start -->
<section class="overflow-hidden">
    <div>
        <div class="row mb-100px">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper sponsor-slider">
                    <div class="swiper-wrapper">
                        <!-- Single Slide -->
                        @php 
                            $brands = App\Models\Brand::get();
                        @endphp
                        @foreach($brands as $brand)
                            <div class="swiper-slide">
                                <div class="single-sponsor-wrap">
                                    <img src="{{ get_image($brand->logo) }}" alt="sponsor">
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Slide -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sponsors Area End -->
