{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


 <!-- Start Category Area -->
   <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-section-title-area">
                        <h5 class="sm-title-badge min-w-140px mx-auto mb-30px wow animate__fadeInUp builder-editable" builder-identity="CBC1" data-wow-delay=".1s">{{get_phrase('Our Categories')}}</h5>
                        <h2 class="section-title text-center max-w-877px mx-auto mb-32px wow animate__fadeInUp builder-editable" builder-identity="CBC2" data-wow-delay=".2s">{{get_phrase('Upgrade Your Ride with Style & Tech')}}</h2>
                        <p class="section-subtitle text-center mb-40px max-w-505px mx-auto wow animate__fadeInUp builder-editable" builder-identity="CBC3" data-wow-delay=".3s">{{get_phrase(' From sleek interiors to safety must-haves — explore top categories tailored for every driver.')}}</p>
                        <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('all_products')}}" class="btn ca-btn-skin">
                                <span class="builder-editable" builder-identity="CBC4">{{get_phrase('Explore All Catagories')}}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.70892 1.13512C9.70892 0.654136 9.31901 0.264225 8.83803 0.264224L1 0.264224C0.51902 0.264224 0.129108 0.654136 0.129108 1.13512C0.129109 1.6161 0.51902 2.00601 1 2.00601L7.96714 2.00601L7.96714 8.97314C7.96714 9.45412 8.35705 9.84404 8.83803 9.84404C9.31901 9.84404 9.70892 9.45412 9.70892 8.97314L9.70892 1.13512ZM1 8.97314L1.61581 9.58896L9.45384 1.75093L8.83803 1.13512L8.22221 0.519303L0.384186 8.35733L1 8.97314Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="category-section-main wow animate__fadeInUp" data-wow-delay=".5s">
            <div class="row g-0 justify-content-center">
                 @php
                     $categories = App\Models\Category::where('parent_id', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->take(4)->get();
                @endphp
                    @foreach($categories as $key => $category)
                        {{-- card --}}
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="category-card{{ $key+1 }}">
                                <h4 class="category-card-title {{ $key > 0 ? 'text-white' : '' }}">
                                    {{ $category->title }}
                                </h4>
                                <p class="category-card-subtitle {{ $key > 0 ? 'text-white' : '' }}">
                                    {{ \Illuminate\Support\Str::limit($category->description, 80, '...') }}
                                </p>
                                <a href="{{ route('products', get_category_params($category)) }}" class="btn ca-sm-btn-white">
                                    <span>{{get_phrase('Shop Now')}}</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <path d="M6.95406 0.97299C6.95406 0.640327 6.68438 0.370651 6.35172 0.370651L0.930664 0.370651C0.598001 0.370651 0.328325 0.640328 0.328325 0.97299C0.328325 1.30565 0.598001 1.57533 0.930664 1.57533L5.74938 1.57533L5.74938 6.39404C5.74938 6.72671 6.01905 6.99638 6.35172 6.99638C6.68438 6.99638 6.95406 6.72671 6.95406 6.39404L6.95406 0.97299ZM0.930664 6.39404L1.35658 6.81996L6.77763 1.39891L6.35172 0.97299L5.9258 0.547072L0.504746 5.96812L0.930664 6.39404Z" fill="black"/>
                                        </svg>
                                    </span>
                                </a>
                                <h3 class="card-number-shadow1">
                                    <span class="number-shadow number-shadow-{{ $key+1 }}">
                                        {{ str_pad($key+1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </h3>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="category-banner">
                                <img class="banner" src="{{ get_image($category->thumbnail) }}" alt="banner">
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- End Category Area -->