{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Popular Sales Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center builder-editable" builder-identity="1">{{get_phrase('Top Sales')}}</h1>
            </div>
        </div>
        <div class="row gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @php 
               $topProducts = App\Models\Product::where('status', 1)->where('label', 'top-seller')->latest()->get(); 
            @endphp
            @foreach($topProducts->chunk(3) as $chunk)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <ul class="sales-list-group">
                     @foreach($chunk as $product)
                    <li class="sales-list-item">
                        @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <a href="{{ route('product', $product->slug) }}" class="sales-list-image">
                            <img src="{{ get_image($firstImage) }}" alt="">
                        </a>
                        <div class="sales-list-details">
                            <a href="{{ route('product', $product->slug) }}" class="al-title-16px text-link mb-12px">{{ $product->title }}</a>
                            <div class="d-flex align-items-center gap-2 mb-12px">
                                @if ($product->is_discounted)
                                    @php
                                        $discount = $product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                        <h4 class="al-title-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                        <h4 class="al-title-16px fw-medium ec-text-gray">>{{ currency($product->price) }}</h4>
                                    @else
                                        <h4 class="al-title-18px">{{ currency($discount->discount_value) }}</h4>
                                    @endif
                                        <h4 class="al-title-18px"><del>{{ currency($product->price) }}</del></h4>
                                    @else
                                        <h4 class="al-title-18px">{{ currency($product->price) }}</h4>
                                    @endif
                            </div>
                            <a href="{{ route('product', $product->slug) }}" class="btn ec-sm2-btn-dark text-capitalize">
                                <span>{{get_phrase('Shop Now')}}</span>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{route('all_products')}}" class="btn ec-btn-outline-dark pe-4 icon-right">
                        <span class="builder-editable" builder-identity="2">{{get_phrase('View All')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46969L12.2802 3.21969C12.1388 3.08307 11.9493 3.00747 11.7527 3.00918C11.5561 3.01089 11.3679 3.08977 11.2289 3.22883C11.0898 3.36788 11.011 3.55599 11.0092 3.75264C11.0075 3.94929 11.0831 4.13874 11.2198 4.28019L15.1895 8.24994H2C1.80109 8.24994 1.61032 8.32896 1.46967 8.46961C1.32902 8.61026 1.25 8.80103 1.25 8.99994C1.25 9.19885 1.32902 9.38962 1.46967 9.53027C1.61032 9.67092 1.80109 9.74994 2 9.74994H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8716 11.0517 13.9631C11.0124 14.0546 10.9917 14.1531 10.9908 14.2526C10.9899 14.3522 11.0089 14.451 11.0466 14.5432C11.0843 14.6353 11.14 14.7191 11.2105 14.7895C11.2809 14.8599 11.3646 14.9156 11.4568 14.9533C11.549 14.991 11.6477 15.01 11.7473 15.0091C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8518 12.2802 14.7802L17.5303 9.53019C17.6709 9.38954 17.7498 9.19881 17.7498 8.99994C17.7498 8.80107 17.6709 8.61034 17.5303 8.46969Z" fill="#0F1311"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Sales Area End -->