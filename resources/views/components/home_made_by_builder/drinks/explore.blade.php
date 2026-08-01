{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Explore What You Crave Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="category-title-area wow animate__fadeInUp" data-wow-delay=".1s">
                    <h2 class="section-title text-center category-area-title builder-editable" builder-identity="DX1">{{get_phrase('Explore What')}}</h2>
                    <h2 class="section-title text-center category-area-title builder-editable" builder-identity="DX2">{{get_phrase('You Crave')}}</h2>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="category1-card">
                    <h4 class="category1-card-title builder-editable" builder-identity="DX3">{{get_phrase('Snacks')}}</h4>
                    <p class="category1-card-subtitle builder-editable" builder-identity="DX4">{{get_phrase('crunchy, sweet, savory treats for every mood.')}}</p>
                    <a href="{{route('all_products')}}" class="btn dr-sm2-btn builder-editable" builder-identity="DX5">{{get_phrase('Shop Now')}}</a>
                    <div class="category1-card-banner">
                        <img class="banner builder-editable" builder-identity="DX6" src="{{ asset('assets/frontend/drinks/images/category-banner11.webp') }}" alt="banner">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="w-100 h-100">
                    <div class="category2-card mb-20px">
                        <h4 class="category2-card-title builder-editable" builder-identity="DX7">{{get_phrase('Beverages')}}</h4>
                        <p class="category2-card-subtitle builder-editable" builder-identity="DX8">{{get_phrase('hydrate in style with our premium drink picks.')}}</p>
                        <a href="{{route('all_products')}}" class="btn dr-sm2-btn builder-editable" builder-identity="DX9">{{get_phrase('Shop Now')}}</a>
                        <div class="category2-card-banner">
                            <img class="banner builder-editable" builder-identity="DX90" src="{{ asset('assets/frontend/drinks/images/category-banner2.webp') }}" alt="banner">
                        </div>
                    </div>
                    <div class="category3-card">
                        <h4 class="category3-card-title builder-editable" builder-identity="DX10">{{get_phrase('Organic Produce')}}</h4>
                        <p class="category3-card-subtitle builder-editable" builder-identity="DX11">{{get_phrase('handpicked, locally sourced, always fresh.')}}</p>
                        <a href="{{route('all_products')}}" class="btn dr-sm2-btn builder-editable" builder-identity="DX12">{{get_phrase('Shop Now')}}</a>
                        <div class="category3-card-banner">
                            <img class="banner builder-editable" builder-identity="DX13" src="{{ asset('assets/frontend/drinks/images/category-banner3.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="category4-card">
                    <h4 class="category4-card-title builder-editable" builder-identity="DX14">{{get_phrase('Meal Kits')}}</h4>
                    <p class="category4-card-subtitle builder-editable" builder-identity="DX15">{{get_phrase('easy-to-cook kits for stress-free meals.')}}</p>
                    <a href="{{route('all_products')}}" class="btn dr-sm2-btn builder-editable" builder-identity="DX16">{{get_phrase('Shop Now')}}</a>
                    <div class="category4-card-banner">
                        <img class="banner builder-editable" builder-identity="DX17" src="{{ asset('assets/frontend/drinks/images/category-banner4.webp') }}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Explore What You Crave Area End -->