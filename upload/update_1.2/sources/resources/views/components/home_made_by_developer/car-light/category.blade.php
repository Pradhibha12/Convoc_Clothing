{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
   <!-- Category Area Start -->
    <section class="category-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <h2 class="section-title text-center max-w-735px mx-auto mb-6px wow animate__fadeInUp builder-editable" builder-identity="CLC1" data-wow-delay=".1s">{{get_phrase('Shop by Category')}}</h2>
                        <p class="section-subtitle text-center max-w-520px mx-auto wow animate__fadeInUp builder-editable" builder-identity="CLC2" data-wow-delay=".2s">{{get_phrase('Find exactly what you need — fast.')}}</p>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">

                <div class="col-12">
                    <div class="category-wrapper">

                        @php
                            $categories = App\Models\Category::where('parent_id', 0)
                                ->orderBy('sort', 'asc')
                                ->orderBy('title', 'asc')
                                ->take(5)
                                ->get();
                        @endphp

                        {{-- ROW 1 --}}
                        <div class="row-top">
                            @if(isset($categories[0]))
                            <a href="{{ route('products', get_category_params($categories[0])) }}"
                            class="category-cards big">
                                <img src="{{ get_image($categories[0]->thumbnail) }}">
                                <div class="content">
                                    <h4>{{ $categories[0]->title }}</h4>
                                    <p>{{ Str::limit($categories[0]->description, 60) }}</p>
                                </div>
                            </a>
                            @endif

                            @if(isset($categories[1]))
                            <a href="{{ route('products', get_category_params($categories[1])) }}"
                            class="category-cards small">
                                <img src="{{ get_image($categories[1]->thumbnail) }}">
                                <div class="content">
                                    <h4>{{ $categories[1]->title }}</h4>
                                    <p>{{ Str::limit($categories[1]->description, 60) }}</p>
                                </div>
                            </a>
                            @endif
                        </div>

                        {{-- ROW 2 --}}
                        <div class="row-bottom">
                            @foreach($categories->slice(2) as $category)
                                <a href="{{ route('products', get_category_params($category)) }}"
                                class="category-cards">
                                    <img src="{{ get_image($category->thumbnail) }}">
                                    <div class="content">
                                        <h4>{{ $category->title }}</h4>
                                        <p>{{ Str::limit($category->description, 55) }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Category Area End -->