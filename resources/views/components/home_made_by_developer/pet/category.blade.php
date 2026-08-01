
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Explore handpicked essentials Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="category-title-area">
                    <h2 class="section-title mb-14px category-section-title text-center wow animate__fadeInUp builder-editable" builder-identity="PC1" data-wow-delay=".1s">{{get_phrase('Explore handpicked essentials for your pet')}}</h2>
                    <p class="section-subtitle category-section-subtitle text-center wow animate__fadeInUp builder-editable" builder-identity="PC2" data-wow-delay=".2s">{{get_phrase('Explore handpicked essentials for your pet — whether they bark, purr, chirp, or swim.')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container wow animate__fadeInUp" data-wow-delay=".3s">
        <div class="row">
            <div class="col-12">
                <div class="project-card-main">
                        @php
                           $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                        @endphp
                         @foreach($categories->take(3) as $index => $category)
                         @php 
                            $cardClass = 'project-card' . ($index+1); 
                         @endphp
                        <div class="{{ $cardClass }}">
                            <div class="{{ $cardClass }}-body">
                                {{-- <p class="project-card-badge mb-20px">For Cats</p> --}}
                                <h3 class="project-card-title mb-2">{{ $category->title }}</h3>
                                <p class="project-card-subtitle mb-26px">{{ $category->description }}</p>
                                <a href="{{ route('products', $category->slug) }}" class="btn ptb3-btn-skin">{{get_phrase('Shop Cat supplies')}}</a>
                            </div>
                            <div class="{{ $cardClass }}-banner">
                                <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Explore handpicked essentials Area End -->