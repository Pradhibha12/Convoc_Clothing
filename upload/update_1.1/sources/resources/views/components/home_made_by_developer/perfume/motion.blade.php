{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Start Explore the World of Fragrance! Area  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="explore-title-area">
                        <h2 class="section-title explore-section-title wow animate__fadeInUp builder-editable" builder-identity="PMO1" data-wow-delay=".1s">{{get_phrase('Explore the World of Fragrance!')}}</h2>
                        <div class="explore-title-right">
                            <p class="section-subtitle explore-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="PMO2" data-wow-delay=".2s">{{get_phrase('Get inspired by our guides, tips, and scent stories to help you find your perfect match.')}}</p>
                            <a href="{{route('contact_us')}}" class="btn pf-btn-outline-white min-w-196px wow animate__fadeInUp builder-editable" builder-identity="PMO3" data-wow-delay=".3s">{{get_phrase('Contact Us')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 explore-banner-row justify-content-center wow animate__fadeInUp" data-wow-delay=".4s">
                 @php 
                    $productsImage = \App\Models\Product::where('status', 1)->latest()->take(5)->get();
                @endphp
                 @foreach($productsImage as $product)
                    <div class="col">
                        <div class="sm-rounded-banner">
                            @php
                                $thumbnails = json_decode($product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                            <img class="banner" src="{{ get_image($firstImage) }}" alt="image">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Explore the World of Fragrance! Area  -->
 