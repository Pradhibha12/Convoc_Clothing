{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Start Category Highlight -->
<section>
    <div class="container section-mb">
        <div class="row">
            <div class="col-12">
                <div class="section-title-area mx-auto cetegory-st-mb">
                    <p class="title-badge mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="sC1" data-wow-delay=".1s">{{get_phrase('Category highlight')}}</p>
                    <h2 class="section-title text-capitalize text-center mb-20px wow animate__fadeInUp builder-editable" builder-identity="sC2" data-wow-delay=".2s">{{get_phrase('Curated Collections for Every Walk of Life')}}</h2>
                    <p class="section-subtitle text-center text-capitalize section-subtitle-max-w mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="sC3" data-wow-delay=".3s">{{get_phrase('Explore top picks for every vibe men’s, women’s, sport, and casual.')}}</p>
                    <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                        <a href="{{route('all_products')}}" class="btn sh1-btn-dark builder-editable" builder-identity="sC4">{{get_phrase('View Products')}}</a>
                    </div>
                </div>
            </div>
        </div>
         @php
            $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
        @endphp
            @foreach ($categories->chunk(4) as $category) 
                <div class="row g-3 wow animate__fadeInUp" data-wow-delay=".2s">
                    <div class="col-sm-6 col-md-6 col-lg-4 order-sm-1 order-md-1 order-lg-1">
                        @if(isset($category[0]))
                            <a href="javascript:;" class="lng-category-card">
                                <img class="banner" src="{{ get_image($category[0]->thumbnail) }}" alt="category">
                                <h3 class="category-card-title text-capitalize">{{ $category[0]->title }}</h3>
                            </a>
                        @endif
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 order-sm-3 order-md-3 order-lg-2">
                        <div class="d-flex flex-column flex-sm-row flex-lg-column gap-20px">
                            @if(isset($category[1]))
                                <a href="javascript:;" class="sml-category-card">
                                    <img class="banner" src="{{ get_image($category[1]->thumbnail) }}" alt="category">
                                    <h3 class="category-card-title text-capitalize">{{ $category[1]->title }}</h3>
                                </a>
                            @endif
                            @if(isset($category[2]))
                                <a href="javascript:;" class="sml-category-card">
                                    <img class="banner" src="{{ get_image($category[2]->thumbnail) }}" alt="category">
                                    <h3 class="category-card-title text-capitalize">{{ $category[2]->title }}</h3>
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 order-sm-2 order-md-2 order-lg-3">
                        @if(isset($category[3]))
                            <a href="javascript:;" class="lng-category-card">
                                <img class="banner" src="{{ get_image($category[3]->thumbnail) }}" alt="category">
                                <h3 class="category-card-title text-capitalize">{{ $category[3]->title }}</h3>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
    </div>
</section>
<!-- End Category Highlight -->