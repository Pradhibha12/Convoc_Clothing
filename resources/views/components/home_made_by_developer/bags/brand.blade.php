
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Brand Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="trusted-brand-area">
                    <h4 class="trusted-brand-title wow animate__fadeInUp builder-editable" builder-identity="BB19" data-wow-delay=".1s">{{get_phrase('OUR TRUSTED BRANDS')}}</h4>
                    <ul class="trusted-brand-list wow animate__fadeInUp" data-wow-delay=".2s">
                        @php 
                            $brands = App\Models\Brand::take(5)->get();
                         @endphp
                              @foreach($brands as $brand) 
                        <li>
                            <a href="javascript:;" class="trusted-brand">
                                <img class="brand" src="{{ get_image($brand->logo) }}" alt="brand">
                            </a>
                        </li>
                       @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brand Area End -->