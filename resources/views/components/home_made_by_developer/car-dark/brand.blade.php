{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Start Brand Area -->
    <section class="section-mb brand-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="brand-section-title wow animate__fadeInUp builder-editable" builder-identity="CAB1" data-wow-delay=".1s">{{ get_phrase('Trusted by more than 50  brands') }}</h4>
                      <div class="brand-items-wrap wow animate__fadeInUp" data-wow-delay=".2s">
                            @php 
                                $brands = App\Models\Brand::get();
                            @endphp
                              @foreach($brands as $brand)
                                <div class="brand-item">
                                    <img class="brand" src="{{ get_image($brand->logo) }}" alt="brand">
                                </div>
                            @endforeach
                      </div>
                 </div>
            </div>
        </div>
    </section>
    <!-- End Brand Area -->