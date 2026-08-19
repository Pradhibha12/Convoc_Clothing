@php
if (!function_exists('get_product_color_variants')) {
    function get_product_color_variants($product) {
        $thumbnails = json_decode($product->thumbnail, true);
        if (!is_array($thumbnails) || empty($thumbnails)) {
            return [];
        }

        $image_attrs = json_decode($product->image_attributes, true);
        if (!is_array($image_attrs)) {
            $image_attrs = [];
        }

        $color_map = [
            11 => ['name' => 'Black', 'hex' => '#111827'],
            12 => ['name' => 'White', 'hex' => '#FFFFFF'],
            13 => ['name' => 'Navy', 'hex' => '#0F172A'],
            30 => ['name' => 'Charcoal Melange', 'hex' => '#4B5563'],
            31 => ['name' => 'Sky Blue', 'hex' => '#38BDF8'],
            43 => ['name' => 'Red', 'hex' => '#DC2626'],
            45 => ['name' => 'Maroon', 'hex' => '#7F1D1D'],
            83 => ['name' => 'Royal Blue', 'hex' => '#1D4ED8'],
            84 => ['name' => 'Yellow', 'hex' => '#EAB308'],
            85 => ['name' => 'Orange', 'hex' => '#EA580C'],
        ];

        $polo_color_meta = [
            'uploads/product/thumbnail/printmine_real_black.webp' => ['name' => 'Black', 'hex' => '#111827', 'attr_id' => 11],
            'uploads/product/thumbnail/printmine_real_navy.webp' => ['name' => 'Navy', 'hex' => '#0F172A', 'attr_id' => 13],
            'uploads/product/thumbnail/printmine_real_royal_blue.webp' => ['name' => 'Royal Blue', 'hex' => '#1D4ED8', 'attr_id' => 83],
            'uploads/product/thumbnail/printmine_real_sky_blue.webp' => ['name' => 'Sky Blue', 'hex' => '#38BDF8', 'attr_id' => 31],
            'uploads/product/thumbnail/printmine_real_red.webp' => ['name' => 'Red', 'hex' => '#DC2626', 'attr_id' => 43],
            'uploads/product/thumbnail/printmine_real_maroon.webp' => ['name' => 'Maroon', 'hex' => '#7F1D1D', 'attr_id' => 45],
            'uploads/product/thumbnail/printmine_real_yellow.webp' => ['name' => 'Yellow', 'hex' => '#EAB308', 'attr_id' => 84],
            'uploads/product/thumbnail/printmine_real_orange.webp' => ['name' => 'Orange', 'hex' => '#EA580C', 'attr_id' => 85],
            'uploads/product/thumbnail/printmine_real_white.webp' => ['name' => 'White', 'hex' => '#FFFFFF', 'attr_id' => 12],
            'uploads/product/thumbnail/printmine_real_gray.webp' => ['name' => 'Charcoal Melange', 'hex' => '#4B5563', 'attr_id' => 30],
        ];

        $variants = [];
        foreach ($thumbnails as $thumb) {
            $normalized_thumb = str_replace('\\', '/', $thumb);

            // Polo check
            if (isset($polo_color_meta[$normalized_thumb])) {
                $meta = $polo_color_meta[$normalized_thumb];
                $variants[] = [
                    'image' => $normalized_thumb,
                    'name' => $meta['name'],
                    'hex' => $meta['hex'],
                    'attr_id' => $meta['attr_id']
                ];
                continue;
            }

            // Database mapping
            $attr_val = $image_attrs[$thumb] ?? $image_attrs[$normalized_thumb] ?? null;
            if ($attr_val) {
                $attr_id = null;
                if (is_array($attr_val)) {
                    $attr_id = $attr_val['3'] ?? reset($attr_val);
                } else {
                    $attr_id = $attr_val;
                }

                if ($attr_id && isset($color_map[$attr_id])) {
                    $variants[] = [
                        'image' => $normalized_thumb,
                        'name' => $color_map[$attr_id]['name'],
                        'hex' => $color_map[$attr_id]['hex'],
                        'attr_id' => $attr_id
                    ];
                    continue;
                }
            }

            // Guess from path / filename
            $filename = strtolower(basename($normalized_thumb));
            $matched = false;
            foreach ($color_map as $id => $color_info) {
                $color_name_lower = strtolower($color_info['name']);
                $color_name_clean = str_replace(' ', '_', $color_name_lower);
                if (str_contains($filename, $color_name_clean) || str_contains($filename, $color_name_lower)) {
                    $variants[] = [
                        'image' => $normalized_thumb,
                        'name' => $color_info['name'],
                        'hex' => $color_info['hex'],
                        'attr_id' => $id
                    ];
                    $matched = true;
                    break;
                }
            }

            if (!$matched) {
                $variants[] = [
                    'image' => $normalized_thumb,
                    'name' => 'Default',
                    'hex' => '#9CA3AF',
                    'attr_id' => null
                ];
            }
        }

        return $variants;
    }
}
@endphp
<!-- Featured Product Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp builder-editable" builder-identity="10" data-wow-delay=".2s">{{ get_phrase('Featured Products') }}</h1>
                </div>
            </div>
        </div>
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                @php
                    $categories = App\Models\Category::where('parent_id', '=', 0)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
                @endphp
                <div class="d-flex column-gap-30px row-gap-4 justify-content-center flex-wrap">
                  <button type="button" data-filter=".show-all" data-url="{{ route('all_products') }}" class="btn fsh-mixitup-btn mixitup-control-active">{{ get_phrase('All') }}</button>

                    @foreach($categories as $category)
                        <button type="button" data-filter=".cat-{{$category->id}}" data-url="{{ route('products', $category->slug) }}" class="btn fsh-mixitup-btn"> {{ strtoupper($category->title) }} </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mixitup gy-4 mb-30px wow animate__fadeInUp" data-wow-delay=".4s">
                 @php 
                   $allproduct =App\Models\Product::where('status', 1)->latest()->take(8)->get();
                @endphp
               @foreach($allproduct as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mix show-all">
                    <div class="d-block product-grid-md">
                        <div>
                            <div class="product-grid-banner-md mb-12px">
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $variants = get_product_color_variants($product);
                                    $unique_variants = [];
                                    $seen_colors = [];
                                    foreach ($variants as $v) {
                                        $color_key = strtolower($v['name']);
                                        if (!in_array($color_key, $seen_colors)) {
                                            $seen_colors[] = $color_key;
                                            $unique_variants[] = $v;
                                        }
                                    }
                                    
                                    $defaultImage = $thumbnails[0] ?? null;
                                    $active_swatch_idx = 0;
                                    if (count($unique_variants) > 1) {
                                        $variant_idx = $loop->index % count($unique_variants);
                                        $defaultImage = $unique_variants[$variant_idx]['image'];
                                        $active_swatch_idx = $variant_idx;
                                    }
                                @endphp
                                <a href="{{ route('product', $product->slug) }}" class="d-block w-100 h-100">
                                    <img class="banner product-card-image-{{ $product->id }}" src="{{ get_image($defaultImage) }}" alt="banner">
                                </a>
                               @if ($product->is_discounted()->exists())
                                            @php
                                                $discount = $product->is_discounted;
                                                if ($discount->discount_type === 'percentage') {
                                                    $discount_text = $discount->discount_value . '% OFF';
                                                } else { // flat
                                                    $discount_text = currency($discount->discount_value) . ' FLAT';
                                                }
                                            @endphp

                                            <p class="red-badge-md capitalize">{{ $discount_text }}</p>
                                        @endif
                                
                                <a href="{{ route('product', $product->slug) }}" class="btn fsh-btn-dark product-cart-btn-md">{{get_phrase('Shop Now')}}</a>
                                <a href="javascript:void(0)" class="product-wishlist-btn {{ wishlist_class($product->id) }}" onclick="toggleWishlist({{ $product->id }}, this)">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist" data-bs-placement="left">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 20 20" fill="none">
                                            <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="#0D0E10"></path>
                                        </svg>
                                    </span>
                                </a>
                                <a href="javascript:;" class="product-quickview-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View" data-bs-placement="left">
                                        <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="#0D0E10"></path>
                                            <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="#0D0E10"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div>
                                @if(count($unique_variants) > 1)
                                    <div class="product-card-swatches d-flex align-items-center gap-1 mt-1 mb-2 justify-content-start flex-wrap">
                                        @foreach($unique_variants as $v_idx => $v)
                                            <span class="color-swatch-dot {{ $v_idx == $active_swatch_idx ? 'active' : '' }}" 
                                                  style="background-color: {{ $v['hex'] }}; cursor: pointer; display: inline-block; width: 15px; height: 15px; border-radius: 50%; border: {{ strtolower($v['name']) == 'white' ? '1px solid #cbd5e1' : '1px solid rgba(0,0,0,0.1)' }}; transition: all 0.2s;" 
                                                  title="{{ $v['name'] }}"
                                                  onclick="event.preventDefault(); changeProductCardImage('{{ $product->id }}', '{{ get_image($v['image']) }}', this)"></span>
                                        @endforeach
                                    </div>
                                @endif
                                <a href="{{ route('product', $product->slug) }}" class="al-title-16px mb-12px product-title-link">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</a>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-start gap-1 mb-12px">
                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="">
                                        <h6 class="al-title-12px fw-medium">{{ number_format($product->average_rating, 1) }}</h6>
                                    </div>
                                    <div class="d-flex align-items-start gap-2">
                                             @if ($product->is_discounted()->exists())
                                                @if ($product->is_discounted->discount_type == 'flat')
                                                    <div class="d-flex gap-2">
                                                        <h6 class="al-title-16px">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                                        <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                    </div>
                                                @else
                                                    @php
                                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                                    @endphp
                                                    <div class="d-flex gap-2">
                                                       <h6 class="al-title-16px"> {{ currency($product->price - $discount_amount) }}  </h6>
                                                         <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                                    </div>
                                                    
                                                @endif
                                            @else
                                                 <h6 class="al-title-16px">{{ currency($product->price) }}</h6>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($categories as $category)
                @php 
                    $subCategoryIds = App\Models\Category::where('parent_id', $category->id)->pluck('id')->toArray();
                    $categoryIds = array_merge([$category->id], $subCategoryIds);
                    $catProducts = App\Models\Product::where('status', 1)->whereIn('category_id', $categoryIds)->latest()->take(8)->get();
                @endphp
                @foreach($catProducts as $catproduct)
                   <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mix cat-{{$category->id}}">
                      <div class="d-block product-grid-md">
                            <div>
                                <div class="product-grid-banner-md mb-12px">
                                    @php
                                        $thumbnails = json_decode($catproduct->thumbnail, true);
                                        $variants = get_product_color_variants($catproduct);
                                        $unique_variants = [];
                                        $seen_colors = [];
                                        foreach ($variants as $v) {
                                            $color_key = strtolower($v['name']);
                                            if (!in_array($color_key, $seen_colors)) {
                                                $seen_colors[] = $color_key;
                                                $unique_variants[] = $v;
                                            }
                                        }
                                        
                                        $defaultImage = $thumbnails[0] ?? null;
                                        $active_swatch_idx = 0;
                                        if (count($unique_variants) > 1) {
                                            $variant_idx = $loop->index % count($unique_variants);
                                            $defaultImage = $unique_variants[$variant_idx]['image'];
                                            $active_swatch_idx = $variant_idx;
                                        }
                                    @endphp
                                    <a href="{{ route('product', $catproduct->slug) }}" class="d-block w-100 h-100">
                                        <img class="banner product-card-image-{{ $catproduct->id }}" src="{{ get_image($defaultImage) }}" alt="banner">
                                    </a>
                                    
                                    @if ($catproduct->is_discounted()->exists())
                                            @php
                                                $discount = $catproduct->is_discounted;
                                                if ($discount->discount_type === 'percentage') {
                                                    $discount_text = $discount->discount_value . '% OFF';
                                                } else { // flat
                                                    $discount_text = currency($discount->discount_value) . ' FLAT';
                                                }
                                            @endphp

                                            <p class="red-badge-md capitalize">{{ $discount_text }}</p>
                                        @endif

                                    <a href="{{ route('product', $catproduct->slug) }}" class="btn fsh-btn-dark product-cart-btn-md">{{get_phrase('Shop Now')}}</a>
                                     <a href="javascript:void(0)" class="product-wishlist-btn {{ wishlist_class($catproduct->id) }}" onclick="toggleWishlist({{ $catproduct->id }}, this)">
                                            <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist" data-bs-placement="left">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 20 20" fill="none">
                                                    <path d="M10.0003 17.5059C9.75916 17.5059 9.52583 17.4748 9.33138 17.4048C6.36027 16.3859 1.63916 12.7692 1.63916 7.42586C1.63916 4.70364 3.84027 2.49475 6.54694 2.49475C7.86138 2.49475 9.09027 3.00808 10.0003 3.92586C10.9103 3.00808 12.1392 2.49475 13.4536 2.49475C16.1603 2.49475 18.3614 4.71142 18.3614 7.42586C18.3614 12.777 13.6403 16.3859 10.6692 17.4048C10.4747 17.4748 10.2414 17.5059 10.0003 17.5059ZM6.54694 3.66142C4.48583 3.66142 2.80583 5.3492 2.80583 7.42586C2.80583 12.7381 7.91583 15.6936 9.71249 16.3081C9.85249 16.3548 10.1558 16.3548 10.2958 16.3081C12.0847 15.6936 17.2025 12.7459 17.2025 7.42586C17.2025 5.3492 15.5225 3.66142 13.4614 3.66142C12.2792 3.66142 11.1825 4.21364 10.4747 5.17031C10.2569 5.46586 9.75916 5.46586 9.54138 5.17031C8.81805 4.20586 7.72916 3.66142 6.54694 3.66142Z" fill="#0D0E10"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    <a href="javascript:;" class="product-quickview-btn" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $catproduct->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Quick View" data-bs-placement="left">
                                            <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.0006 13.3676C8.1417 13.3676 6.63281 11.8587 6.63281 9.99986C6.63281 8.14097 8.1417 6.63208 10.0006 6.63208C11.8595 6.63208 13.3684 8.14097 13.3684 9.99986C13.3684 11.8587 11.8595 13.3676 10.0006 13.3676ZM10.0006 7.79875C8.78726 7.79875 7.79948 8.78652 7.79948 9.99986C7.79948 11.2132 8.78726 12.201 10.0006 12.201C11.2139 12.201 12.2017 11.2132 12.2017 9.99986C12.2017 8.78652 11.2139 7.79875 10.0006 7.79875Z" fill="#0D0E10"></path>
                                                <path d="M9.99952 17.0159C7.07507 17.0159 4.31396 15.3047 2.41618 12.3336C1.59174 11.0503 1.59174 8.95807 2.41618 7.66696C4.32174 4.69585 7.08285 2.98474 9.99952 2.98474C12.9162 2.98474 15.6773 4.69585 17.5751 7.66696C18.3995 8.9503 18.3995 11.0425 17.5751 12.3336C15.6773 15.3047 12.9162 17.0159 9.99952 17.0159ZM9.99952 4.15141C7.4873 4.15141 5.08396 5.6603 3.40396 8.29696C2.82063 9.20696 2.82063 10.7936 3.40396 11.7036C5.08396 14.3403 7.4873 15.8492 9.99952 15.8492C12.5117 15.8492 14.9151 14.3403 16.5951 11.7036C17.1784 10.7936 17.1784 9.20696 16.5951 8.29696C14.9151 5.6603 12.5117 4.15141 9.99952 4.15141Z" fill="#0D0E10"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    @if(count($unique_variants) > 1)
                                        <div class="product-card-swatches d-flex align-items-center gap-1 mt-1 mb-2 justify-content-start flex-wrap">
                                            @foreach($unique_variants as $v_idx => $v)
                                                <span class="color-swatch-dot {{ $v_idx == $active_swatch_idx ? 'active' : '' }}" 
                                                      style="background-color: {{ $v['hex'] }}; cursor: pointer; display: inline-block; width: 15px; height: 15px; border-radius: 50%; border: {{ strtolower($v['name']) == 'white' ? '1px solid #cbd5e1' : '1px solid rgba(0,0,0,0.1)' }}; transition: all 0.2s;" 
                                                      title="{{ $v['name'] }}"
                                                      onclick="event.preventDefault(); changeProductCardImage('{{ $catproduct->id }}', '{{ get_image($v['image']) }}', this)"></span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <a href="{{ route('product', $catproduct->slug) }}" class="al-title-16px mb-12px product-title-link">{{ \Illuminate\Support\Str::limit($catproduct->title, 70, '...') }}</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-start gap-1 mb-12px">
                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="">
                                        <h6 class="al-title-12px fw-medium">{{ number_format($catproduct->average_rating, 1) }}</h6>
                                    </div>
                                        <div class="d-flex align-items-start gap-2">
                                            @if ($catproduct->is_discounted()->exists())
                                                @if ($catproduct->is_discounted->discount_type == 'flat')
                                                    <div class="d-flex gap-2">
                                                        <h6 class="al-title-16px">
                                                        {{ currency($catproduct->price - $catproduct->is_discounted->discount_value) }}
                                                    </h6>
                                                    <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($catproduct->price) }}</del></h6>
                                                @else
                                                    @php
                                                        $discount_amount = $catproduct->price * ($catproduct->is_discounted->discount_value / 100);
                                                    @endphp
                                                    <div class="d-flex gap-2">
                                                        <h6 class="al-title-16px">
                                                        {{ currency($catproduct->price - $discount_amount) }}
                                                    </h6>
                                                    <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($catproduct->price) }}</del></h6>
                                                @endif
                                            @else
                                                <h6 class="al-title-16px">{{ currency($catproduct->price) }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                @endforeach
            @endforeach

        </div>
       
        <!-- See More Button Section -->
        <div class="row mt-4 mb-30px wow animate__fadeInUp" data-wow-delay=".5s">
            <div class="col-12 text-center">
                <a id="seeMoreBtn" href="{{ route('all_products') }}" class="btn fsh-btn-dark px-5 py-3 rounded-pill shadow-sm hover-lift fw-bold border-0" style="font-size: 15px; letter-spacing: 0.5px; transition: all 0.3s ease;">
                    <span>{{ get_phrase('See More Products') }}</span>
                    <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </a>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const filterBtns = document.querySelectorAll('.fsh-mixitup-btn');
                const seeMoreBtn = document.getElementById('seeMoreBtn');
                
                filterBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const targetUrl = this.getAttribute('data-url');
                        if (targetUrl && seeMoreBtn) {
                            seeMoreBtn.setAttribute('href', targetUrl);
                        }
                    });
                });
            });
        </script>
    </div>

<!-- Featured Product Area End --></div></div></section>
@push('css')
<style>
    .color-swatch-dot {
        border-radius: 50%;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .color-swatch-dot:hover {
        transform: scale(1.35);
        box-shadow: 0 0 0 2px #fff, 0 0 0 4px #FF9900 !important;
        z-index: 2;
    }
    .color-swatch-dot.active {
        transform: scale(1.35);
        box-shadow: 0 0 0 2px #fff, 0 0 0 4px #FF9900 !important;
        z-index: 2;
    }
</style>
@endpush

@push('js')
<script>
    if (typeof changeProductCardImage !== 'function') {
        function changeProductCardImage(productId, imageUrl, element) {
            const img = document.querySelector('.product-card-image-' + productId);
            if (img) {
                img.src = imageUrl;
            }
            const swatches = element.parentElement.querySelectorAll('.color-swatch-dot');
            swatches.forEach(s => {
                s.classList.remove('active');
            });
            element.classList.add('active');
        }
    }
</script>
@endpush