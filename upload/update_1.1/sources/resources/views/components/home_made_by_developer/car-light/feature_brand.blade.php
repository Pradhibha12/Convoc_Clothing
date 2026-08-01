{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Featured Brand Area Start -->
    <section class="featured-brand-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-50px">
                        <h2 class="section-title text-center text-white max-w-735px mx-auto mb-6px wow animate__fadeInUp builder-editable" builder-identity="CTTO1" data-wow-delay=".1s">{{get_phrase('Featured Brands')}}</h2>
                        <p class="section-subtitle text-center text-white max-w-520px mx-auto wow animate__fadeInUp builder-editable" builder-identity="CTTO2" data-wow-delay=".2s">{{get_phrase("We’ve partnered with top manufacturers to bring you the best.")}}</p>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="featured-brand-wrap">
                        @php 
                                $brands = App\Models\Brand::get();
                            @endphp
                        @foreach($brands->take(4) as $brand)
                            <div class="single-featured-brand">
                                <img class="brand" src="{{ get_image($brand->logo) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Brand Area End -->
