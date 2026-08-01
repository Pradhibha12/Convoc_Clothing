{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Start Shop by Category -->
<section>
    <div class="container section-pb">
        <div class="row">
            <div class="col-12">
                <div class="category-title-area">
                    <div class="text-center">
                        <p class="sml-title-badge mb-30px wow animate__fadeInUp builder-editable" builder-identity="FC1" data-wow-delay=".1s">{{get_phrase('Shop by Category')}}</p>
                    </div>
                    <h2 class="section-title mb-20px ct-section-title text-center wow animate__fadeInUp builder-editable" builder-identity="FC2" data-wow-delay=".2s">{{get_phrase('Shop Fitness Gear by Category You want!')}}</h2>
                    <p class="section-subtitle mb-30px ct-section-subtitle text-center wow animate__fadeInUp builder-editable" builder-identity="FC3" data-wow-delay=".3s">{{get_phrase("Find the perfect gear for every workout style. Whether you're building a home gym or upgrading your cardio routine, we’ve got you covered.")}}</p>
                    <div class="d-flex align-items-start justify-content-center flex-wrap wow animate__fadeInUp" data-wow-delay=".4s">
                        <a href="{{route('all_products')}}" class="btn fn-btn-skin">
                            <span class="builder-editable" builder-identity="FC4">{{get_phrase('Shop Now!')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="19" viewBox="0 0 21 19" fill="none">
                                <path d="M2 8.43085L0.735294 8.43085L0.735294 10.9603L2 10.9603L2 8.43085ZM20.6002 10.5898C21.0941 10.0959 21.0941 9.29517 20.6002 8.80127L12.5516 0.752734C12.0577 0.258836 11.257 0.258836 10.7631 0.752734C10.2692 1.24663 10.2692 2.0474 10.7631 2.5413L17.9173 9.69556L10.7631 16.8498C10.2692 17.3437 10.2692 18.1445 10.7631 18.6384C11.257 19.1323 12.0577 19.1323 12.5516 18.6384L20.6002 10.5898ZM2 9.69556L2 10.9603L19.7059 10.9603L19.7059 9.69556L19.7059 8.43085L2 8.43085L2 9.69556Z" fill="black"></path>
                            </svg>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <div class="category-cards-wrap">
                    @php
                        $categoriess = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                    @endphp
                    @foreach($categoriess->take(4) as $key=> $category)
                    <div class="category-card {{ $key == 0 ? 'active' : '' }}">
                        <div class="category-icon-badge">
                           <img src="{{ get_image($category->icon) }}" alt="icon">
                        </div>
                        <img class="category-banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                        <div class="category-card-content">
                            <h2 class="category-card-title">{{$category->title}}</h2>
                            <a href="{{ route('products', $category->slug) }}" class="btn fn-btn-skin category-card-btn">
                                <span>{{get_phrase('Shop Now!')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <path d="M1.54944 8.70693L0.256366 8.70693L0.256366 11.2931L1.54944 11.2931L1.54944 8.70693ZM20.5668 10.9143C21.0718 10.4094 21.0718 9.59063 20.5668 9.08566L12.3377 0.856596C11.8328 0.35162 11.014 0.35162 10.509 0.856596C10.0041 1.36157 10.0041 2.1803 10.509 2.68528L17.8238 10L10.5091 17.3147C10.0041 17.8197 10.0041 18.6384 10.5091 19.1434C11.014 19.6484 11.8328 19.6484 12.3377 19.1434L20.5668 10.9143ZM1.54944 10L1.54944 11.2931L19.6525 11.2931L19.6525 10L19.6525 8.70693L1.54944 8.70693L1.54944 10Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop by Category -->