{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Explore by Instrument Area Start  -->
    <section class="explore-instrument-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="category-section-title wow animate__fadeInUp builder-editable" builder-identity="MC1" data-wow-delay=".1s">{{get_phrase('Explore by Instrument')}}</h2>
                    <!-- Swiper -->
                    <div class="swiper category-slider wow animate__fadeInUp" data-wow-delay=".2s">
                        <div class="swiper-wrapper">
                            @php
                                $categories = App\Models\Category::where('parent_id', '=', 0)
                                    ->orderBy('sort', 'asc')
                                    ->orderBy('title', 'asc')
                                    ->get();
                            @endphp
                             @foreach($categories as $category)
                            <div class="swiper-slide">
                                <a href="{{ route('products', get_category_params($category)) }}" class="category-slide">
                                    <span class="category-icon fill">
                                       <img src="{{ get_image($category->icon) }}" alt="">
                                    </span>
                                    <h4 class="category-title">{{ $category->title }}</h4>
                                    <div class="text-center">
                                        <span class="btn mi-btn-dark category-btn">{{get_phrase('View Products')}}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                        <div class="category-slider-nav">
                            <div class="swiper-button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="25" viewBox="0 0 14 25" fill="none">
                                    <path d="M11.2378 24.5191L0.474845 13.6531C0.324335 13.5017 0.204915 13.3218 0.123431 13.1237C0.0419464 12.9256 0 12.7132 0 12.4986C0 12.2841 0.0419464 12.0717 0.123431 11.8736C0.204915 11.6755 0.324335 11.4956 0.474845 11.3441L11.2378 0.478212C11.5411 0.172018 11.9525 -4.56264e-09 12.3814 0C12.8103 4.56264e-09 13.2217 0.172018 13.525 0.478212C13.8283 0.784405 13.9987 1.19969 13.9987 1.63272C13.9987 2.06574 13.8283 2.48103 13.525 2.78722L3.9042 12.5L13.5263 22.2128C13.8296 22.519 14 22.9343 14 23.3673C14 23.8003 13.8296 24.2156 13.5263 24.5218C13.223 24.828 12.8117 25 12.3828 25C11.9538 25 11.5425 24.828 11.2392 24.5218L11.2378 24.5191Z" fill="black"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="25" viewBox="0 0 14 25" fill="none">
                                    <path d="M2.76216 0.48093L13.5252 11.3469C13.6757 11.4983 13.7951 11.6782 13.8766 11.8763C13.9581 12.0744 14 12.2868 14 12.5014C14 12.7159 13.9581 12.9283 13.8766 13.1264C13.7951 13.3245 13.6757 13.5044 13.5252 13.6559L2.76216 24.5218C2.45887 24.828 2.04752 25 1.61859 25C1.18967 25 0.77832 24.828 0.475027 24.5218C0.171734 24.2156 0.00134567 23.8003 0.00134566 23.3673C0.00134566 22.9343 0.171734 22.519 0.475027 22.2128L10.0958 12.5L0.473682 2.78723C0.170389 2.48103 0 2.06574 0 1.63272C0 1.1997 0.170389 0.78441 0.473682 0.478216C0.776975 0.172022 1.18833 1.90735e-06 1.61725 1.90735e-06C2.04617 1.90735e-06 2.45752 0.172022 2.76082 0.478216L2.76216 0.48093Z" fill="black"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore by Instrument Area End  -->