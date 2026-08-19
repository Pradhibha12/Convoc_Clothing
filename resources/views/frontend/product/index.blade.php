@extends('layouts.frontend')
@push('title', 'Products')
@push('meta')
@endpush
@push('css')
<style>
    /* Prevent image clipping and enforce smooth mobile touch scrolling */
    html, body {
        -webkit-overflow-scrolling: touch;
    }
    .gallery-swatch-dot {
        width: 28px !important;
        height: 28px !important;
        border-radius: 50% !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
        padding: 0 !important;
    }
    .gallery-swatch-dot.active {
        transform: scale(1.2) !important;
        box-shadow: 0 0 0 2px #fff, 0 0 0 4px #FF9900 !important;
        border-color: #000 !important;
    }
    .gallery-swatch-dot:hover {
        transform: scale(1.15) !important;
    }
    img, 
    picture,
    .tf-product-media-wrap, 
    .thumbs-slider, 
    .tf-product-media-main, 
    .tf-product-media-thumbs, 
    .swiper,
    .swiper-wrapper,
    .swiper-slide, 
    .item, 
    .item img,
    .tf-image-zoom {
        touch-action: pan-y !important;
        -webkit-user-drag: none;
        -webkit-touch-callout: default;
    }
    .tf-product-media-main .item img,
    .tf-product-media-main img,
    .tf-image-zoom,
    .swiper-slide img {
        object-fit: contain !important;
        max-width: 100% !important;
        height: auto !important;
        padding: 4px !important;
        box-sizing: border-box !important;
        touch-action: pan-y !important;
    }
    /* Force the 10-color side panel to always stay as a row (never column) */
    .all-colors-side-wrap,
    .all-colors-side-wrap.thumbs-slider-wrap,
    div.all-colors-side-wrap {
        display: flex !important;
        flex-direction: row !important;
        align-items: flex-start !important;
        gap: 12px !important;
    }
    .side-thumbnails-all-colors-grid {
        display: grid !important;
        grid-template-columns: repeat(2, 72px) !important;
        gap: 6px !important;
        width: 150px !important;
        min-width: 150px !important;
        flex: 0 0 150px !important;
        order: -1 !important;
    }
    .side-thumb-card {
        width: 72px !important;
        max-width: 72px !important;
        box-sizing: border-box !important;
        border: 1.5px solid #e2e8f0 !important;
        border-radius: 8px !important;
        padding: 3px !important;
        background: #fff !important;
        cursor: pointer !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        text-align: center !important;
        transition: all 0.2s ease !important;
        pointer-events: auto !important;
        z-index: 10 !important;
        position: relative !important;
        user-select: none !important;
    }
    .side-thumb-card.active {
        border-color: #FF9900 !important;
        box-shadow: 0 0 0 2px rgba(255,153,0,0.35) !important;
        background: #fffdf5 !important;
    }
    .side-thumb-card:hover {
        border-color: #94a3b8 !important;
        box-shadow: 0 3px 8px rgba(0,0,0,0.08) !important;
    }
    .side-thumb-img-wrap {
        width: 62px !important;
        height: 62px !important;
        border-radius: 5px !important;
        overflow: hidden !important;
        background: #f8fafc !important;
    }
    .side-thumb-img-wrap img {
        width: 100% !important;
        height: 100% !important;
        object-fit: contain !important;
    }
    .side-thumb-label {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 2px !important;
        margin-top: 3px !important;
        font-size: 9px !important;
        font-weight: 700 !important;
        color: #1e293b !important;
        max-width: 66px !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        white-space: nowrap !important;
        line-height: 1.2 !important;
    }
    .side-thumb-dot {
        width: 6px !important;
        height: 6px !important;
        border-radius: 50% !important;
        flex-shrink: 0 !important;
    }
    .tf-product-media-main.swiper {
        flex: 1 1 auto !important;
        min-width: 0 !important;
        width: calc(100% - 162px) !important;
    }
    .side-thumbnails-all-colors-grid {
        pointer-events: auto !important;
        z-index: 20 !important;
        position: relative !important;
    }
    @media (max-width: 991px) {
        .tf-image-zoom,
        .item img,
        .swiper-slide {
            pointer-events: auto !important;
            touch-action: pan-y !important;
        }
        .zoomContainer,
        .drift-zoom-pane,
        .drift-bounding-box {
            display: none !important;
            pointer-events: none !important;
        }
        .all-colors-side-wrap,
        .all-colors-side-wrap.thumbs-slider-wrap {
            flex-direction: column-reverse !important;
        }
        .side-thumbnails-all-colors-grid {
            display: flex !important;
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            width: 100% !important;
            min-width: 0 !important;
            flex: 0 0 auto !important;
            padding-bottom: 6px !important;
            gap: 6px !important;
        }
        .side-thumb-card {
            flex: 0 0 70px !important;
            width: 70px !important;
        }
        .tf-product-media-main.swiper {
            width: 100% !important;
        }
    }

    .color-swatch-opt {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: 2px solid #e5e7eb;
        cursor: pointer;
        display: inline-block;
        transition: all 0.2s ease;
    }
    .color-swatch-opt.active, .color-swatch-opt:hover {
        border-color: #000;
        transform: scale(1.15);
        box-shadow: 0 0 0 2px #fff, 0 0 0 4px #FF9900;
    }
    .qty-pack-btn {
        border: 1.5px solid #e5e7eb;
        background: #fff;
        color: #374151;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.04);
    }
    .qty-pack-btn.active, .qty-pack-btn:hover {
        background: #111827;
        color: #fff;
        border-color: #111827;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    /* Product Meta Badges */
    .product-meta-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
        margin-bottom: 16px;
    }
    .product-meta-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f3f4f6;
        color: #4b5563;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid #e5e7eb;
    }
    .product-meta-badge strong {
        color: #111827;
    }
    .badge-in-stock {
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #a7f3d0;
    }
    .badge-out-stock {
        background: #fffbeb;
        color: #d97706;
        border: 1px solid #fde68a;
    }

    /* Modern Attribute & Option Pill Selectors */
    .attribute-group-wrap {
        margin-bottom: 22px;
    }
    .attribute-group-title {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .attribute-group-title .selected-val {
        font-weight: 600;
        color: #2563eb;
    }

    /* Size Chips / Pills Grid */
    .size-chips-grid {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 10px !important;
        margin-top: 6px !important;
        margin-bottom: 20px !important;
    }
    .size-chip-item {
        position: relative !important;
        display: inline-flex !important;
        margin: 0 !important;
        flex: 0 0 auto !important;
    }
    .size-chip-item input[type="radio"] {
        position: absolute !important;
        opacity: 0 !important;
        width: 0 !important;
        height: 0 !important;
        pointer-events: none !important;
    }
    .size-chip-item label, .product-opt-size-pill {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 9px 18px !important;
        background: #ffffff !important;
        border: 1.5px solid #d1d5db !important;
        border-radius: 8px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        color: #1f2937 !important;
        cursor: pointer !important;
        transition: all 0.2s ease-in-out !important;
        user-select: none !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05) !important;
        width: auto !important;
        height: auto !important;
        min-height: 42px !important;
        line-height: 1.3 !important;
        white-space: nowrap !important;
    }
    .size-chip-item label:hover, .product-opt-size-pill:hover {
        border-color: #4b5563 !important;
        background: #f9fafb !important;
        transform: translateY(-1px) !important;
    }
    .size-chip-item input[type="radio"]:checked + label,
    .size-chip-item label.active,
    .product-opt-size-pill.active {
        background: #111827 !important;
        color: #ffffff !important;
        border-color: #111827 !important;
        box-shadow: 0 4px 12px rgba(17, 24, 39, 0.2) !important;
    }

    /* Color Chips / Swatches */
    .color-chips-grid {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 10px !important;
        margin-top: 6px !important;
        margin-bottom: 20px !important;
        align-items: center !important;
    }
    .color-chip-item {
        position: relative !important;
        display: inline-flex !important;
        margin: 0 !important;
        flex: 0 0 auto !important;
    }
    .color-chip-item input[type="radio"] {
        position: absolute !important;
        opacity: 0 !important;
        width: 0 !important;
        height: 0 !important;
        pointer-events: none !important;
    }
    .color-chip-item label, .product-opt-color-pill {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 8px 16px !important;
        background: #ffffff !important;
        border: 1.5px solid #d1d5db !important;
        border-radius: 8px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        color: #1f2937 !important;
        cursor: pointer !important;
        transition: all 0.2s ease-in-out !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05) !important;
        width: auto !important;
        height: auto !important;
        min-height: 40px !important;
        line-height: 1.3 !important;
        user-select: none !important;
        white-space: nowrap !important;
    }
    .color-chip-item .color-dot {
        width: 15px !important;
        height: 15px !important;
        border-radius: 50% !important;
        display: inline-block !important;
        border: 1px solid rgba(0,0,0,0.2) !important;
        flex-shrink: 0 !important;
    }
    .color-chip-item label:hover, .product-opt-color-pill:hover {
        border-color: #4b5563 !important;
        background: #f9fafb !important;
        transform: translateY(-1px) !important;
    }
    .color-chip-item input[type="radio"]:checked + label,
    .color-chip-item label.active,
    .product-opt-color-pill.active {
        background: #111827 !important;
        color: #ffffff !important;
        border-color: #111827 !important;
        box-shadow: 0 4px 12px rgba(17, 24, 39, 0.2) !important;
    }
    .color-chip-item input[type="radio"]:checked + label .color-dot,
    .product-opt-color-pill.active .color-dot {
        border-color: #ffffff !important;
    }

    /* Action Buttons Bar */
    .product-action-bar {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 24px;
        margin-bottom: 24px;
    }
    .product-cart-row {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .product-cart-row .btn-add-cart {
        flex: 1;
        height: 50px;
        background: #111827;
        color: #ffffff;
        font-weight: 700;
        font-size: 15px;
        border-radius: 10px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(17, 24, 39, 0.15);
    }
    .product-cart-row .btn-add-cart:hover {
        background: #000000;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(17, 24, 39, 0.25);
    }
    .btn-buy-now {
        width: 100%;
        height: 50px;
        background: linear-gradient(135deg, #FFB800 0%, #FFA000 100%);
        color: #111827;
        font-weight: 800;
        font-size: 15px;
        border-radius: 10px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s ease;
        box-shadow: 0 4px 14px rgba(255, 160, 0, 0.25);
    }
    .btn-buy-now:hover {
        background: linear-gradient(135deg, #FFA000 0%, #FF8F00 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(255, 160, 0, 0.35);
    }
    .product-icon-btn {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        border: 1.5px solid #e5e7eb;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #374151;
        transition: all 0.2s ease;
        flex-shrink: 0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }
    .product-icon-btn:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #111827;
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
@php
$active_theme = \App\Models\Theme::where('status', 1)->first();
    $body = json_decode($active_theme->body, true);
    $font_family = json_decode($active_theme->general, true);
@endphp

@if (isset($font_family['font_family']))
    <style>
        /* background color */
        .al-title-30px,
        .al-title-16px,
        .fsh-tab-link,
        body {
            font-family: {{ $font_family['font_family'] }} !important;
        }
        /* .al-title-30px {
            font-family: {{ $font_family['title_font_family'] }};
        } */
    </style>
@endif
@if (isset($body['card-background-color']))
    <style>
        /* background color */
        .category-card-body,
        .product-card {
            background-color: {{ $body['card-background-color'] }} ;
            
        }
       
    </style>
@endif 

@if($active_theme->identifier == 'perfume' || $active_theme->identifier == 'travel-dark' || $active_theme->identifier == 'car-dark'  || $active_theme->identifier == 'watch-dark' || $active_theme->identifier == 'coffee')
    @if (isset($body['color']))
        <style>
            /*  color */
            .circle-iconbox-42px span svg path{
                fill: {{ $body['color'] }} !important;
            }
           
          
            /*  color */
        </style>
    @endif

    

@endif

@php 
   $categoryInfo = App\Models\Category::where('id', $product->category_id)->first();
@endphp


    <!-- Breadcrumb Area Start -->
    <section class="mb-28px mt-30px wow animate__fadeInUp" data-wow-delay=".1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb fsh-breadcrumb justify-content-start">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                            @if($categoryInfo)
                                <li class="breadcrumb-item"><a href="{{ route('products', $categoryInfo->slug) }}">{{ $categoryInfo->title }}</a></li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->
    <!-- Product View Area Start -->
    <section>
        <div class="container">
            <div class="row gy-4 mb-30px justify-content-center">
                <div class="col-lg-7 col-md-12 wow animate__fadeInUp" data-wow-delay=".2s">
                    <div class="tf-product-media-wrap">
                        @php
                            $decoded = json_decode($product->thumbnail, true);
                            $thumbnails = (!empty($decoded) && is_array($decoded)) 
                                ? $decoded 
                                : ['uploads/system/placeholder.png'];
                            $image_attrs = json_decode($product->image_attributes, true) ?? [];

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
                                
                                // Plain Catalog Products Mappings
                                'uploads/product/thumbnail/plain_tshirt_unisex.webp' => ['name' => 'Off-White', 'hex' => '#F5F5F0', 'attr_id' => 12],
                                'uploads/product/thumbnail/plain_tshirt_kids.webp' => ['name' => 'Sky Blue', 'hex' => '#38BDF8', 'attr_id' => 31],
                                'uploads/product/thumbnail/plain_polo_unisex.webp' => ['name' => 'Navy', 'hex' => '#0F172A', 'attr_id' => 13],
                                'uploads/product/thumbnail/plain_polo_kids.webp' => ['name' => 'Yellow', 'hex' => '#F59E0B', 'attr_id' => 84],
                                'uploads/product/thumbnail/plain_hoodie_unisex.webp' => ['name' => 'Charcoal', 'hex' => '#4B5563', 'attr_id' => 30],
                                'uploads/product/thumbnail/plain_hoodie_kids.webp' => ['name' => 'Lavender', 'hex' => '#D8B4FE', 'attr_id' => 999],
                                'uploads/product/thumbnail/family_tshirt_set.webp' => ['name' => 'Beige & White', 'hex' => '#E5D9C4', 'attr_id' => 888],
                            ];
                        @endphp
                        <div class="d-flex flex-column align-items-center w-100">
                            <!-- Main Large Product Image -->
                            <div class="main-product-image-container text-center border p-3 rounded bg-white shadow-sm mb-3 w-100" style="position: relative; overflow: hidden; height: 500px; display: flex; align-items: center; justify-content: center;">
                                <img id="mainProductImage" src="{{ get_image($thumbnails[0]) }}?v=5" data-zoom="{{ get_image($thumbnails[0]) }}?v=5" alt="{{ $product->title }}" class="img-fluid tf-image-zoom" style="max-height: 480px; object-fit: contain; transition: opacity 0.2s ease;">
                            </div>
                            
                            @php
                                $first_thumb = $thumbnails[0] ?? '';
                                $first_meta = $polo_color_meta[$first_thumb] ?? null;
                                $first_color_name = $first_meta['name'] ?? 'Black';
                            @endphp
                            <!-- Color Name Label -->
                            <div class="mb-2 fs-14px fw-bold text-dark text-center">
                                Color: <span id="selectedGalleryColorName" class="text-secondary fw-semibold">{{ $first_color_name }}</span>
                            </div>

                            <!-- Small Color Swatch Dots -->
                            <div class="d-flex align-items-center justify-content-center gap-2 mb-4 flex-wrap" id="gallerySwatches">
                                @foreach($thumbnails as $idx => $thumb)
                                    @php
                                        $meta = $polo_color_meta[$thumb] ?? null;
                                        $cName = $meta['name'] ?? null;
                                        $cHex = $meta['hex'] ?? null;
                                        $cAttrId = $meta['attr_id'] ?? '';
                                        
                                        // Auto-mapping colors for non-polo catalog products
                                        if (!$cName) {
                                            $mapped_val = $image_attrs[$thumb] ?? null;
                                            $mapped_color_id = null;
                                            if (is_array($mapped_val)) {
                                                $mapped_color_id = $mapped_val[3] ?? ($mapped_val['3'] ?? null);
                                            }
                                            
                                            // Fallback 1: Use first color mapped in the product's image attributes
                                            if (!$mapped_color_id) {
                                                foreach ($image_attrs as $t => $attrs) {
                                                    if (is_array($attrs)) {
                                                        $cid = $attrs[3] ?? ($attrs['3'] ?? null);
                                                        if ($cid) {
                                                            $mapped_color_id = $cid;
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                            
                                            // Fallback 2: Default to Black (ID 11)
                                            if (!$mapped_color_id) {
                                                $mapped_color_id = 11;
                                            }
                                            
                                            $color_attr = \App\Models\Attribute::find($mapped_color_id);
                                            if ($color_attr) {
                                                $cName = $color_attr->name;
                                                $cHex = $color_attr->input_value ?: '#374151';
                                                $cAttrId = $color_attr->id;
                                            } else {
                                                $cName = 'Black';
                                                $cHex = '#111827';
                                                $cAttrId = 11;
                                            }
                                        }

                                        $mapped_val = $image_attrs[$thumb] ?? '';
                                        $mapped_ids = '';
                                        if (is_array($mapped_val)) {
                                            $mapped_ids = implode(',', array_filter($mapped_val));
                                        } else {
                                            $mapped_ids = $mapped_val ?: $cAttrId;
                                        }
                                    @endphp
                                    <button type="button" 
                                            class="gallery-swatch-dot {{ $loop->first ? 'active' : '' }}" 
                                            style="width: 28px; height: 28px; border-radius: 50%; background-color: {{ $cHex }}; border: 2px solid {{ $cHex == '#FFFFFF' ? '#cbd5e1' : '#e2e8f0' }}; cursor: pointer; transition: all 0.2s ease; position: relative;"
                                            data-image-src="{{ get_image($thumb) }}"
                                            data-color-name="{{ $cName }}"
                                            data-mapped-ids="{{ $mapped_ids }}"
                                            data-index="{{ $idx }}"
                                            data-attr-id="{{ $cAttrId }}"
                                            title="{{ $cName }}"
                                            onclick="changeMainProductImage('{{ get_image($thumb) }}', '{{ $cName }}', this, {{ $idx }}, '{{ $cAttrId }}')">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @if($product->id == 582 || $product->category_id == 58 || $product->category_id == 57 || str_contains(strtolower($product->title), 'corporate'))
                            <div class="mt-3 text-center p-2 rounded-3 bg-light border fw-semibold fs-14px text-dark shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <span>Available Sizes —</span>
                                <span class="badge bg-secondary">S</span>
                                <span class="badge bg-secondary">M</span>
                                <span class="badge bg-secondary">L</span>
                                <span class="badge bg-secondary">XL</span>
                                <span class="badge bg-secondary">XXL</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 wow animate__fadeInUp" data-wow-delay=".3s">
                    <div class="w-100 position-relative">
                        <div class="tf-zoom-main"></div>
                        <div class="d-flex align-items-end justify-content-between gap-10px flex-wrap mb-20px">
                            <div class="w-100">
                                @if($product->id == 582 || $product->category_id == 58 || $product->category_id == 57 || str_contains(strtolower($product->title), 'corporate'))
                                    <!-- PrintMine Header and Rating Line -->
                                    <h3 class="al-title-26px fw-bold text-dark mb-2">{{ $product->title }}</h3>
                                    <div class="d-flex align-items-center gap-3 flex-wrap mb-3">
                                        <div class="d-flex align-items-center fs-14px fw-bold" style="color: #FF9900;">
                                            <span class="me-1">★ ★ ★ ★ ★</span>
                                            <span class="text-dark me-1">4.3</span>
                                            <span class="text-muted fw-normal">(872 Reviews)</span>
                                        </div>
                                        <div class="fs-14px fw-bold" style="color: #D97706;">
                                            12,240+ Orders Delivered
                                        </div>
                                    </div>

                                    <!-- PrintMine Price Box -->
                                    <div class="p-3 rounded-3 mb-3" style="background-color: #F4F4F6;">
                                        <div class="d-flex align-items-center gap-3 mb-1">
                                            <del class="text-muted fs-18px">₹ 1,622.00</del>
                                            <span class="fs-26px fw-bold text-dark">₹ 999.00</span>
                                            <span class="badge px-2 py-1 fs-12px text-uppercase text-white fw-bold" style="background-color: #FF5722; border-radius: 4px;">SAVE 38%</span>
                                        </div>
                                        <div class="fs-13px text-muted fw-medium">
                                            Inclusive of All Taxes
                                        </div>
                                    </div>
                                @else
                                    <h3 class="al-title-30px mb-2 fw-bold text-dark">{{ $product->title }}</h3>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="d-flex align-items-center text-warning fs-14px">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        </div>
                                        <span class="fw-bold fs-14px text-dark">{{ number_format($product->average_rating ?? 5.0, 1) }}</span>
                                        <span class="text-muted fs-13px">({{ $product->reviews->count() > 0 ? $product->reviews->count() : '0' }})</span>
                                    </div>
                               
                                    @php 
                                        $vendor = App\Models\Brand::where('id', $product->brand_id)->first();
                                    @endphp

                                    <div class="product-meta-badges">
                                        @if(!empty($vendor->name))
                                            <span class="product-meta-badge">
                                                <i class="fa-solid fa-store text-muted me-1"></i> Vendor: <strong>{{ $vendor->name }}</strong>
                                            </span>
                                        @else
                                            <span class="product-meta-badge">
                                                <i class="fa-solid fa-store text-muted me-1"></i> Vendor: <strong>Convoc</strong>
                                            </span>
                                        @endif
                                        @if(!empty($product->code))
                                            <span class="product-meta-badge">
                                                <i class="fa-solid fa-barcode text-muted me-1"></i> SKU: <strong>{{ $product->code }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="d-flex align-items-center gap-3 mt-3 mb-2 flex-wrap">
                                        @if ($product->is_discounted()->exists())
                                            @php
                                                $discount = $product->is_discounted;

                                                if ($discount->discount_type == 'percentage') {
                                                    $final_price = $product->price - ($product->price * $discount->discount_value / 100);
                                                    $discount_text = $discount->discount_value . '% OFF';
                                                } else { // flat
                                                    $final_price = $product->price - $discount->discount_value;
                                                    $discount_text = currency($discount->discount_value) . ' FLAT';
                                                }
                                            @endphp

                                            <div class="d-flex align-items-center gap-2">
                                                <h4 class="fs-28px fw-extrabold text-dark mb-0">{{ currency($final_price) }}</h4>
                                                <h5 class="fs-18px text-muted fw-medium text-decoration-line-through mb-0">
                                                    {{ currency($product->price) }}
                                                </h5>
                                                <span class="badge bg-danger px-2 py-1 fs-12px fw-bold">{{ $discount_text }}</span>
                                            </div>
                                        @else
                                            <h4 class="fs-28px fw-extrabold text-dark mb-0">{{ currency($product->price) }}</h4>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="mb-30px">
                            <h6 class="al-subtitle-16px fw-medium fsh-text-dark lh-1 mb-12px">{{ get_phrase('Hurry Up! Only').' '.$product->total_stock.' '.get_phrase('left in stock') }}.</h6>
                           
                            <div class="progress fsh-progress-md mb-12px max-w-450px" role="progressbar" 
                                aria-valuenow="{{ getSoldProgress($product->id) }}" 
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" data-progress="{{ getSoldProgress($product->id) }}"></div>
                            </div>
                        </div> --}}
                        <form class="ajaxForm eProductForm" id="productFormMain" action="{{ route('customer.cart_item.store', ['product_id' => $product->id ?? 582]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($product->id == 582 || $product->category_id == 58 || $product->category_id == 57 || str_contains(strtolower($product->title), 'corporate'))
                                <!-- PrintMine Exact Match Custom Corporate Polo Options -->
                                <div class="corporate-polo-options-wrap mb-30px">

                                    <!-- Upload Your Logo Button -->
                                    <div class="mb-3">
                                        <button type="button" class="btn w-100 py-3 fw-bold text-white fs-16px shadow-sm radius-8 d-flex align-items-center justify-content-center gap-2" onclick="document.getElementById('poloLogoInput').click()" style="background: linear-gradient(135deg, #FF9900 0%, #FFA000 100%); border: none;">
                                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 16a4 4 0 01-.88-7.9 5 5 0 019.76-1.74A4.5 4.5 0 0118 15h-2M12 12v9m0-9l-3 3m3-3l3 3" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span>Upload Your Logo</span>
                                        </button>
                                        <input type="file" name="logo_file" id="poloLogoInput" accept="image/*" class="d-none" onchange="previewPoloLogo(this)">
                                    </div>

                                    <div id="poloLogoPreviewBox" class="mb-3 p-3 bg-light rounded-3 d-none align-items-center justify-content-between border border-warning shadow-sm">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-flex align-items-center justify-content-center bg-white p-2 rounded border" style="min-width: 42px; height: 42px;">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="#FF9900" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V8C22 6.9 21.1 6 20 6H12L10 4Z"/>
                                                </svg>
                                            </div>
                                            <img id="poloLogoImg" src="" style="max-height: 40px; max-width: 55px; object-fit: contain;" class="rounded border bg-white p-1">
                                            <div>
                                                <div id="poloLogoName" class="fw-bold fs-13px text-dark text-truncate max-w-200px">logo.png</div>
                                                <div class="fs-11px text-success fw-semibold"><i class="fa-solid fa-folder-closed text-warning me-1"></i> Logo File Uploaded</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle" onclick="removePoloLogo()">&times;</button>
                                    </div>

                                    <!-- Reassurance Notice Box -->
                                    <div class="mb-4 p-3 rounded-3 border-0 fs-13px" style="background-color: #FFF9E6; color: #3A2E00;">
                                        <div class="mb-2 d-flex align-items-start gap-2">
                                            <span class="fs-16px">📜</span>
                                            <span><strong>We'll Send Design for Approval</strong> After Order is Placed/Confirmed</span>
                                        </div>
                                        <div class="d-flex align-items-start gap-2">
                                            <span class="fs-16px">💬</span>
                                            <span><strong>Don't have a logo? No problem!</strong> Place your order with text only — our team will create and share a custom design for you.</span>
                                        </div>
                                    </div>

                                    <!-- Any Text or Customization Needed (Optional) -->
                                    <div class="mb-4">
                                        <label for="polo_custom_text" class="fw-bold fs-14px text-dark mb-2 d-block">
                                            Any Text or Customization Needed (Optional)
                                        </label>
                                        <div class="position-relative">
                                            <input type="text" name="customization_text" id="polo_custom_text" class="form-control p-3 pe-5 border radius-8" placeholder="Write here">
                                            <span class="position-absolute end-0 top-50 translate-middle-y me-3 text-muted" title="Optional customization instructions">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4m0-4h.01"/></svg>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- QUANTITY WISE BULK PRICING CARD -->
                                    <div class="mb-4 p-3 rounded-3 border bg-white shadow-sm" style="border-color: #E5E7EB !important;">
                                        <div class="fw-bold fs-14px text-dark mb-2 d-flex align-items-center justify-content-between">
                                            <span>QUANTITY WISE BULK PRICING:</span>
                                            <span id="tierSavingsBadge" class="badge bg-success fs-12px">Save up to 50%</span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm text-center mb-2 fs-12px align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>2-4 Pcs</th>
                                                        <th>5-9 Pcs</th>
                                                        <th>10-19 Pcs</th>
                                                        <th>20-49 Pcs</th>
                                                        <th>50-99 Pcs</th>
                                                        <th>100+ Pcs</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="fw-bold text-dark">
                                                        <td id="tier-col-2" class="table-warning border-warning">₹999/pc</td>
                                                        <td id="tier-col-5">₹899/pc</td>
                                                        <td id="tier-col-10">₹799/pc</td>
                                                        <td id="tier-col-20">₹699/pc</td>
                                                        <td id="tier-col-50">₹599/pc</td>
                                                        <td id="tier-col-100">₹499/pc</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-2 mt-1">
                                            <span class="fs-13px text-muted">Estimated Total:</span>
                                            <div>
                                                <span id="poloTotalPriceDisplay" class="fs-18px fw-bold text-dark">₹ 1,998.00</span>
                                                <span id="poloUnitPriceDisplay" class="fs-13px text-primary fw-semibold ms-1">(₹999/pc)</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- QUANTITY PACKS Selection -->
                                    <div class="mb-4">
                                        <label class="fw-bold fs-14px text-dark mb-2 d-block">
                                            QUANTITY: <span id="pmSelectedQtyLabel" class="text-uppercase text-primary fw-bold ms-1">2 PCS SAMPLE</span>
                                        </label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach(['2 Pcs Sample' => 2, '5 Pcs' => 5, '10 Pcs' => 10, '15 Pcs' => 15, '20 Pcs' => 20, '30 Pcs' => 30, '50 Pcs' => 50, '75 Pcs' => 75, '100 Pcs' => 100] as $label => $qty)
                                                <button type="button" class="btn qty-pack-btn {{ $loop->first ? 'active' : '' }}" onclick="selectQtyPack({{ $qty }}, '{{ strtoupper($label) }}', this)">
                                                    {{ $label }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Selection Progress Bar Card -->
                                    <div class="mb-4 p-3 rounded-3 border" style="background-color: #FFF3E0; border-color: #FFE0B2 !important;">
                                        <div class="d-flex align-items-center justify-content-between mb-2 fs-14px fw-bold text-dark">
                                            <div>Select <span id="pmTargetQty">2</span> pieces.</div>
                                            <div>Selected: <span id="pmCurrentQty">0</span>/<span id="pmTargetQtyMax">2</span></div>
                                        </div>
                                        <div class="progress" style="height: 8px; background-color: #FFE0B2;">
                                            <div id="pmProgressBar" class="progress-bar" role="progressbar" style="width: 0%; background-color: #F57C00;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <!-- Available Sizes Counter Breakdown -->
                                    <div class="mb-4">
                                        <label class="fw-bold fs-14px text-dark mb-2 d-block">
                                            AVAILABLE SIZES:
                                        </label>
                                        <div class="d-flex flex-column gap-2">
                                            @foreach(['S (36)', 'M (38)', 'L (40)', 'XL (42)', 'XXL (44)'] as $size)
                                                <div class="d-flex align-items-center justify-content-between border rounded-3 p-2 px-3 bg-white shadow-sm">
                                                    <span class="fw-bold fs-14px text-dark">{{ $size }}</span>
                                                    <div class="d-flex align-items-center">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary border-1 px-3 py-1 fw-bold fs-16px radius-6" onclick="updateSizeCount(this, -1)">-</button>
                                                        <span class="mx-3 fw-bold size-qty-val fs-15px text-dark">0</span>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary border-1 px-3 py-1 fw-bold fs-16px radius-6" onclick="updateSizeCount(this, 1)">+</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Colour Changing Options (All 10 Colors) -->
                                    <div class="mb-4">
                                        <label class="fw-bold fs-14px text-dark mb-2 d-block">
                                            SELECT COLOR: <span id="poloSelectedColorLabel" class="fw-bold text-primary ms-1">Black</span>
                                        </label>
                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                            @php
                                                $allPoloColors = [
                                                    ['name' => 'Black', 'hex' => '#111827', 'index' => 0, 'attr_id' => 11],
                                                    ['name' => 'Navy', 'hex' => '#0F172A', 'index' => 1, 'attr_id' => 13],
                                                    ['name' => 'Royal Blue', 'hex' => '#1D4ED8', 'index' => 2, 'attr_id' => 83],
                                                    ['name' => 'Sky Blue', 'hex' => '#38BDF8', 'index' => 3, 'attr_id' => 31],
                                                    ['name' => 'Red', 'hex' => '#DC2626', 'index' => 4, 'attr_id' => 43],
                                                    ['name' => 'Maroon', 'hex' => '#7F1D1D', 'index' => 5, 'attr_id' => 45],
                                                    ['name' => 'Yellow', 'hex' => '#EAB308', 'index' => 6, 'attr_id' => 84],
                                                    ['name' => 'Orange', 'hex' => '#EA580C', 'index' => 7, 'attr_id' => 85],
                                                    ['name' => 'White', 'hex' => '#FFFFFF', 'index' => 8, 'attr_id' => 12],
                                                    ['name' => 'Charcoal Melange', 'hex' => '#4B5563', 'index' => 9, 'attr_id' => 30],
                                                ];
                                            @endphp
                                            @foreach($allPoloColors as $pc)
                                                <span class="color-swatch-opt {{ $loop->first ? 'active' : '' }}" 
                                                      style="background-color: {{ $pc['hex'] }}; border: {{ $pc['hex'] == '#FFFFFF' ? '1.5px solid #94a3b8' : 'none' }};" 
                                                      title="{{ $pc['name'] }}" 
                                                      data-color-name="{{ $pc['name'] }}"
                                                      data-index="{{ $pc['index'] }}"
                                                      data-attr-id="{{ $pc['attr_id'] }}"
                                                      onclick="selectPoloColor({{ $pc['index'] }}, '{{ $pc['name'] }}', this, {{ $pc['attr_id'] }})"></span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $merged_attr_types = $product->product_merged_attributes();
                            @endphp
                            @foreach ($merged_attr_types as $attr_type_id => $attr_type)
                                @php
                                    $input_type = $attr_type['input_type'] ?? 'text';
                                    $type_name = $attr_type['name'] ?? '';
                                    $type_slug = $attr_type['slug'] ?? 'attr';
                                    $is_custom_text = ($input_type == 'custom_text' || $input_type == 'text_input' || Str::contains(strtolower($type_name), ['custom', 'name', 'father', 'son', 'daughter', 'text_field', 'print', 'personalized', 'customization']));
                                @endphp

                                @if ($is_custom_text)
                                    <div class="custom-attribute-fields p-3 rounded-3 border mb-20px bg-light shadow-sm">
                                        <h6 class="al-title-15px fw-bold text-uppercase mb-3 text-dark border-bottom pb-2">
                                            <i class="fi fi-rr-edit me-1 text-danger"></i> {{ $type_name }}
                                        </h6>
                                        @foreach ($attr_type['attributes'] as $attribute)
                                            <div class="mb-3">
                                                <label for="custom_attr_{{ $attribute['id'] }}" class="al-title-14px fw-bold text-uppercase mb-1 text-danger d-block">
                                                    {{ strtoupper($attribute['name']) }} <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       name="custom_attributes[{{ $attribute['name'] }}]" 
                                                       id="custom_attr_{{ $attribute['id'] }}" 
                                                       class="form-control fsh-form-control p-2 radius-6 bg-white border border-secondary" 
                                                       placeholder="{{ get_phrase('Enter First Name') }}" 
                                                       maxlength="50"
                                                       required>
                                                <small class="text-muted fs-12px d-block mt-1">(Only 10 Characters / Required)</small>
                                            </div>
                                        @endforeach
                                    </div>
                                @elseif ($input_type == 'color')
                                    <div class="attribute-group-wrap">
                                        <label class="attribute-group-title">
                                            <span>{{ $type_name }}:</span> 
                                            <span class="selected-val" id="selected-color-name-{{ $attr_type_id }}">{{ $attr_type['attributes'][0]['name'] ?? '' }}</span>
                                        </label>
                                        <div class="color-chips-grid">
                                            @foreach ($attr_type['attributes'] as $key => $attribute)
                                                @php
                                                    $color_name = trim($attribute['name']);
                                                    $color_map = [
                                                        'black' => '#000000',
                                                        'white' => '#FFFFFF',
                                                        'sky blue' => '#38BDF8',
                                                        'blue' => '#2563EB',
                                                        'navy' => '#0F172A',
                                                        'navy blue' => '#0A192F',
                                                        'red' => '#DC2626',
                                                        'gray' => '#6B7280',
                                                        'grey' => '#6B7280',
                                                        'green' => '#10B981',
                                                        'yellow' => '#F59E0B',
                                                        'pink' => '#EC4899',
                                                        'maroon' => '#831843',
                                                        'orange' => '#EA580C',
                                                        'purple' => '#9333EA',
                                                    ];
                                                    $color_hex = $attribute['input_value'] ?? ($color_map[strtolower($color_name)] ?? '#374151');
                                                    $attr_input_id = 'color_attr_' . $attr_type_id . '_' . $attribute['id'];
                                                @endphp
                                                <div class="color-chip-item">
                                                    <input type="radio" class="attribute-selector-radio" 
                                                           name="{{ $type_slug }}[]" 
                                                           id="{{ $attr_input_id }}" 
                                                           value="{{ $attribute['slug'] }}" 
                                                           autocomplete="off" 
                                                           {{ $key == 0 ? 'checked' : '' }} 
                                                           data-color-name="{{ $attribute['name'] }}"
                                                           data-target-label="selected-color-name-{{ $attr_type_id }}"
                                                           data-attribute-id="{{ $attribute['id'] }}">
                                                    <label for="{{ $attr_input_id }}" class="product-opt-color-pill {{ $key == 0 ? 'active' : '' }}">
                                                        <span class="color-dot" style="background-color: {{ $color_hex }};"></span>
                                                        <span>{{ $attribute['name'] }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="attribute-group-wrap">
                                        <label class="attribute-group-title">
                                            <span>{{ $type_name }}:</span>
                                        </label>
                                        <div class="size-chips-grid">
                                            @foreach ($attr_type['attributes'] as $key => $attribute)
                                                @php
                                                    $attr_input_id = 'size_attr_' . $attr_type_id . '_' . $attribute['id'];
                                                @endphp
                                                <div class="size-chip-item">
                                                    <input type="radio" class="attribute-selector-radio" 
                                                           name="{{ $type_slug }}[]" 
                                                           id="{{ $attr_input_id }}" 
                                                           autocomplete="off" 
                                                           value="{{ $attribute['slug'] }}" 
                                                           {{ $key == 0 ? 'checked' : '' }} 
                                                           data-attribute-id="{{ $attribute['id'] }}">
                                                    <label class="product-opt-size-pill {{ $key == 0 ? 'active' : '' }}" for="{{ $attr_input_id }}">
                                                        {{ $attribute['name'] }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="product-action-bar">
                                <div class="product-cart-row">
                                    <button type="submit" class="btn btn-add-cart">
                                        <i class="fa-solid fa-cart-shopping me-1"></i> {{ strtoupper(get_phrase('ADD TO CART')) }}
                                    </button>
                                    <a href="javascript:;" 
                                       class="product-icon-btn {{ wishlist_class($product->id) }}" 
                                       onclick="toggleWishlist({{ $product->id }}, this)" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                                        <i class="fa-regular fa-heart fs-18px"></i>
                                    </a>
                                    <a href="javascript:;" class="product-icon-btn" id="shareButton" 
                                       onclick="openSocialShareModal(window.location.href, '{{ addslashes($product->title) }}')" data-bs-toggle="tooltip" data-bs-title="Share">
                                        <i class="fa-solid fa-share-nodes fs-18px"></i>
                                    </a>
                                </div>
                                <button type="button" id="buyNowButtonMain" class="btn btn-buy-now">
                                    <i class="fa-solid fa-bolt me-1"></i> {{ strtoupper(get_phrase('BUY IT NOW')) }}
                                </button>
                            </div>
                        </form>
                         
                        <!-- Hidden Buy Now Form -->
                        <form class="buyNowForm d-none" id="buyNowFormMain" action="{{ route('customer.buy_now', ['product_id' => $product->id ?? 582]) }}" method="post" >
                            @csrf
                            <!-- Hidden inputs will be dynamically filled -->
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product View Area End -->


    <!-- Get It Today Area Start -->
    <section>
        <div class="container">
            <div class="row g-30px mb-60px wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="d-flex align-items-start gap-12px">
                        <div class="circle-iconbox-48px svg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12.9988 14.75H11.9988C11.5888 14.75 11.2488 14.41 11.2488 14C11.2488 13.59 11.5888 13.25 11.9988 13.25H12.9988C13.6888 13.25 14.2488 12.69 14.2488 12V2.75H5.9988C4.8188 2.75 3.73877 3.38998 3.15877 4.41998C2.95877 4.77998 2.49882 4.91002 2.13882 4.71002C1.77882 4.51002 1.64878 4.05 1.84878 3.69C2.68878 2.19 4.2788 1.25 5.9988 1.25H14.9988C15.4088 1.25 15.7488 1.59 15.7488 2V12C15.7488 13.52 14.5188 14.75 12.9988 14.75Z" fill="#0D0E10"/>
                                <path d="M19 20.75H18C17.59 20.75 17.25 20.41 17.25 20C17.25 19.31 16.69 18.75 16 18.75C15.31 18.75 14.75 19.31 14.75 20C14.75 20.41 14.41 20.75 14 20.75H10C9.59 20.75 9.25 20.41 9.25 20C9.25 19.31 8.69 18.75 8 18.75C7.31 18.75 6.75 19.31 6.75 20C6.75 20.41 6.41 20.75 6 20.75H5C2.93 20.75 1.25 19.07 1.25 17C1.25 16.59 1.59 16.25 2 16.25C2.41 16.25 2.75 16.59 2.75 17C2.75 18.24 3.76 19.25 5 19.25H5.34997C5.67997 18.1 6.74 17.25 8 17.25C9.26 17.25 10.32 18.1 10.65 19.25H13.36C13.69 18.1 14.75 17.25 16.01 17.25C17.27 17.25 18.33 18.1 18.66 19.25H19C20.24 19.25 21.25 18.24 21.25 17V14.75H19C18.04 14.75 17.25 13.96 17.25 13V10C17.25 9.04 18.03 8.25 19 8.25L17.93 6.38C17.71 5.99 17.29 5.75 16.84 5.75H15.75V12C15.75 13.52 14.52 14.75 13 14.75H12C11.59 14.75 11.25 14.41 11.25 14C11.25 13.59 11.59 13.25 12 13.25H13C13.69 13.25 14.25 12.69 14.25 12V5C14.25 4.59 14.59 4.25 15 4.25H16.84C17.83 4.25 18.74 4.78001 19.23 5.64001L20.94 8.63C21.07 8.86 21.07 9.15 20.94 9.38C20.81 9.61 20.56 9.75 20.29 9.75H19C18.86 9.75 18.75 9.86 18.75 10V13C18.75 13.14 18.86 13.25 19 13.25H22C22.41 13.25 22.75 13.59 22 14.75ZM19 9.75C18.86 9.75 18.75 9.86 18.75 10V13C18.75 13.14 18.86 13.25 19 13.25H21.25V12.2L19.85 9.75H19Z" fill="#0D0E10"/>
                                <path d="M8.00098 22.75C6.48098 22.75 5.25098 21.52 5.25098 20C5.25098 18.48 6.48098 17.25 8.00098 17.25C9.52098 17.25 10.751 18.48 10.751 20C10.751 21.52 9.52098 22.75 8.00098 22.75ZM8.00098 18.75C7.31098 18.75 6.75098 19.31 6.75098 20C6.75098 20.69 7.31098 21.25 8.00098 21.25C8.69098 21.25 9.25098 20.69 9.25098 20C9.25098 19.31 8.69098 18.75 8.00098 18.75Z" fill="#0D0E10"/>
                                <path d="M16 22.75C14.48 22.75 13.25 21.52 13.25 20C13.25 18.48 14.48 17.25 16 17.25C17.52 17.25 18.75 18.48 18.75 20C18.75 21.52 17.52 22.75 16 22.75ZM16 18.75C15.31 18.75 14.75 19.31 14.75 20C14.75 20.69 15.31 21.25 16 21.25C16.69 21.25 17.25 20.69 17.25 20C17.25 19.31 16.69 18.75 16 18.75Z" fill="#0D0E10"/>
                                <path d="M22 14.75H19C18.04 14.75 17.25 13.96 17.25 13V10C17.25 9.04 18.04 8.25 19 8.25H20.29C20.56 8.25 20.81 8.39 20.94 8.63L22.65 11.63C22.71 11.74 22.75 11.87 22.75 12V14C22.75 14.41 22.41 14.75 22 14.75ZM19 9.75C18.86 9.75 18.75 9.86 18.75 10V13C18.75 13.14 18.86 13.25 19 13.25H21.25V12.2L19.85 9.75H19Z" fill="#0D0E10"/>
                                <path d="M8 8.75H2C1.59 8.75 1.25 8.41 1.25 8C1.25 7.59 1.59 7.25 2 7.25H8C8.41 7.25 8.75 7.59 8.75 8C8.75 8.41 8.41 8.75 8 8.75Z" fill="#0D0E10"/>
                                <path d="M6 11.75H2C1.59 11.75 1.25 11.41 1.25 11C1.25 10.59 1.59 10.25 2 10.25H6C6.41 10.25 6.75 10.59 6.75 11C6.75 11.41 6.41 11.75 6 11.75Z" fill="#0D0E10"/>
                                <path d="M4 14.75H2C1.59 14.75 1.25 14.41 1.25 14C1.25 13.59 1.59 13.25 2 13.25H4C4.41 13.25 4.75 13.59 4.75 14C4.75 14.41 4.41 14.75 4 14.75Z" fill="#0D0E10"/>
                            </svg>
                        </div>
                        <div class="max-w-sm-260px">
                            <h2 class="al-title-18px mb-2">{{ get_phrase('Committed to better shopping experiences') }}</h2>
                            <p class="al-subtitle-16px fw-medium">{{ get_phrase('Delivering value with every purchase') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="d-flex align-items-start gap-12px">
                        <div class="circle-iconbox-48px svg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                <path d="M12.5 1.57501C7.32573 1.57501 3.11523 5.78476 3.11523 10.9598V13.7558V14.7008C3.11523 16.4978 4.57698 17.9595 6.37398 17.9595H6.54198C7.50723 17.9595 8.29323 17.1743 8.29323 16.2098V12.249C8.29323 11.2853 7.50873 10.5015 6.54498 10.5015H6.37023C5.65698 10.5015 5.00298 10.7385 4.46598 11.1293V10.9605C4.46598 6.52951 8.06973 2.92501 12.5 2.92501C16.9302 2.92501 20.534 6.52951 20.534 10.9598V11.1285C19.997 10.7385 19.3422 10.5008 18.6297 10.5008H18.455C17.4912 10.5008 16.7067 11.2845 16.7067 12.2483V16.212C16.7067 17.1758 17.4912 17.9595 18.455 17.9595H18.5427C18.2847 18.9863 17.3607 19.752 16.2545 19.752H15.8795C15.6005 18.9848 14.8715 18.432 14.009 18.432H13.4135C12.3125 18.432 11.417 19.3275 11.417 20.4285C11.417 21.5295 12.3125 22.425 13.4135 22.425H14.009C14.8722 22.425 15.6027 21.8708 15.8802 21.102H16.2545C18.2037 21.102 19.79 19.5885 19.9422 17.6775C21.0837 17.1713 21.884 16.0313 21.884 14.7045C21.884 14.388 21.884 14.0723 21.884 13.7558V10.9598C21.8847 5.78476 17.6742 1.57501 12.5 1.57501ZM6.37023 11.8508H6.54498C6.76473 11.8508 6.94248 12.0293 6.94248 12.2483V16.209C6.94248 16.4295 6.76323 16.6095 6.54198 16.6095H6.37398C5.32173 16.6095 4.46598 15.753 4.46598 14.7008C4.46598 14.3858 4.46598 14.0708 4.46598 13.7558C4.46598 12.705 5.32023 11.8508 6.37023 11.8508ZM14.0097 21.075H13.4142C13.0572 21.075 12.7685 20.7848 12.7685 20.4285C12.7685 20.0715 13.058 19.782 13.4142 19.782H14.0097C14.3667 19.782 14.6555 20.0723 14.6555 20.4285C14.6555 20.7848 14.366 21.075 14.0097 21.075ZM20.534 14.7045C20.534 15.7545 19.6797 16.6095 18.6297 16.6095H18.455C18.2352 16.6095 18.0575 16.431 18.0575 16.212V12.2483C18.0575 12.0293 18.2352 11.8508 18.455 11.8508H18.629C19.679 11.8508 20.5332 12.7058 20.5332 13.7558C20.534 14.0723 20.534 14.388 20.534 14.7045Z" fill="#0D0E10"/>
                            </svg>
                        </div>
                        <div class="max-w-sm-260px">
                            <h2 class="al-title-18px mb-2">{{get_phrase('Support Everyday')}}</h2>
                            <p class="al-subtitle-16px fw-medium">{{get_phrase('Support from 8:30 AM to 10:00 PM everyday')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Get It Today Area End -->


    <!-- Tab Area Start -->
    <section>
        <div class="container">
            <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <ul class="nav nav-pills fsh-tab-pills" id="productinfo-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link active" id="pills-info1-tab" data-bs-toggle="pill" data-bs-target="#pills-info1" type="button" role="tab" aria-controls="pills-info1" aria-selected="true">{{get_phrase('Description')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link" id="pills-info2-tab" data-bs-toggle="pill" data-bs-target="#pills-info2" type="button" role="tab" aria-controls="pills-info2" aria-selected="false">{{get_phrase('Additional Information')}}</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link" id="pills-info3-tab" data-bs-toggle="pill" data-bs-target="#pills-info3" type="button" role="tab" aria-controls="pills-info3" aria-selected="false">{{get_phrase('Shipping & Return')}}</button>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                          <button class="nav-link fsh-tab-link" id="pills-info4-tab" data-bs-toggle="pill" data-bs-target="#pills-info4" type="button" role="tab" aria-controls="pills-info4" aria-selected="false">{{get_phrase('Review')}}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productinfo-tabContent">
                        <!-- Description -->
                        <div class="tab-pane fade show active" id="pills-info1" role="tabpanel" aria-labelledby="pills-info1-tab" tabindex="0">
                            <div class="mb-60px mt-4">
                                <p class="al-subtitle-16px mb-4">{!! $product->description !!}</p>
                            </div>
                        </div>
                        <!-- Additional Information -->
                        <div class="tab-pane fade" id="pills-info2" role="tabpanel" aria-labelledby="pills-info2-tab" tabindex="0">
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Summary') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->summary }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Total stock') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->total_stock }} <span class="text-capitalize">{{ $product->unit }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Seller') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->store->name }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Brand') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->brand->name }}</h4>
                                </div>
                            </div>
                            <div class="mt-20px mb-20px">
                                <div class="product-additional-info">
                                    <h3 class="al-title-16px product-additional-title">{{ get_phrase('Quality label') }}</h3>
                                    <h4 class="al-title-16px fw-medium">{{ $product->quality_label }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Shipping & Return -->
                      
                        <!-- Review -->
                        <div class="tab-pane fade" id="pills-info4" role="tabpanel" aria-labelledby="pills-info4-tab" tabindex="0">
                            
                            @php
                                $product_reviews = $product->reviews;
                                $total_reviews = $product_reviews->count();
                            @endphp

                            <div class="mt-30px mb-80px">
                                <div class="d-flex align-items-center flex-wrap ratings-stars-main-wrap pb-30px mb-20px fsh-border-bottom">
                                    <div class="rating-wrap-line">
                                        <div class="d-flex align-items-center gap-2 mb-3">
                                            <h2 class="al-title-30px fw-medium">{{ number_format($product->average_rating ?? 0, 1) }}</h2>
                                            <div class="rating-stars-wrap">
                                                <!-- gray star name 'star-gray-22.svg' -->
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($product->average_rating))
                                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-22.svg') }}" alt="">
                                                    @elseif ($i == ceil($product->average_rating) && !is_int($product->average_rating))
                                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-half-22.svg') }}" alt="">
                                                    @else
                                                        <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-gray-22.svg') }}" alt="">
                                                    @endif
                                                @endfor

                                            </div>
                                        </div>
                                      

                                        <p class="al-subtitle-16px fw-medium lh-1">{{$total_reviews}} {{get_phrase('Global Ratings')}}</p>
                                    </div>
                                    <div class="rating-progress-main-wrap progress-wrap-line">
                                        @for ($i = 5; $i >= 1; $i--)
                                            @php
                                                if ($total_reviews > 0) {
                                                    $star_wise_reviews = $product_reviews->where('rating', $i)->count();
                                                    $percentage = ($star_wise_reviews / $total_reviews) * 100;
                                                } else {
                                                    $star_wise_reviews = 0;
                                                    $percentage = 0;
                                                }
                                            @endphp
                                            <div class="single-rating-progress-wrap">
                                                <h5 class="rating">{{ $i }} {{ $i > 1 ? get_phrase('Stars') : get_phrase('Star') }}</h5>
                                                <div class="animate-progress progressbar-width" data-skill="{{ $percentage }}"></div>
                                                <h5 class="count">{{ $star_wise_reviews }}</h5>
                                            </div>
                                        @endfor
                                    </div>
                                    <div>
                                        <a href="#writeareview" class="btn fsh-btn-outline-dark min-w-255px">{{ strtoupper(get_phrase('WRITE A REVIEW')) }}</a>
                                    </div>
                                </div>
                                @php
                                    $limit = 10;
                                    $reviews = App\Models\Review::where('product_id', $product->id);
                                    $total_reviews = $reviews->count();

                                    if (!isset($skip)) {
                                        $skip = 0;
                                    }
                                    if (!isset($sort_by)) {
                                        $orderBy = 'desc';
                                        $sort_by = 'new';
                                    } else {
                                        $orderBy = $sort_by == 'old' ? 'asc' : 'desc';
                                    }

                                @endphp
                                @if ($skip == 0)
                                <div class="mb-4 pb-20px fsh-border-bottom">
                                    <select onchange="load_view('{{ route('view', ['path' => 'frontend.product.customer_reviews', 'product_id' => $product->id]) }}&sort_by='+$(this).val(), '#customer_reviews');" id="customer_review_sort_value" class="fsh-nice-select radius-lg-select float-none width-fit-content">
                                        <option value="new" @if ($sort_by == 'new') selected @endif>{{ get_phrase('Sort by newest') }}</option>
                                        <option value="old" @if ($sort_by == 'old') selected @endif>{{ get_phrase('Short by oldest') }}</option>
                                    </select>
                                </div>
                                @endif
                                <!-- Customer Reviews -->
                                <div class="mb-30px" id="customer_reviews">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <!-- Review Form -->
                                <div id="writeareview" class="pt-60px">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tab Area End -->


    <!-- Related Products Slider Area Start -->
    <section class="mt-5">
        <div class="container">
            <div class="row mb-20px wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="col-12">
                    <div class="d-flex align-items-start gap-3 justify-content-between">
                        <h1 class="al-title-30px">{{ get_phrase('Related Products') }}</h1>
                        <div class="d-flex align-items-start gap-12px">
                            <button type="button" class="products-slider-prev-btn svg-block item-slider-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14 8L10 12L14 16" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button type="button" class="products-slider-next-btn svg-block item-slider-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M10 8L14 12L10 16" stroke="#0D0E10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                @php
                    $active_theme = \App\Models\Theme::where('status', 1)->first();
                @endphp
            <div class="row mb-100px wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    @include("components.{$active_theme->identifier}.products.related_product")
                </div>
            </div>
        </div>
    </section>
    <!-- Related Products Slider Area End -->



@endsection

@push('js')
    <script type="text/javascript">
        "use strict";
        var isSelfTriggered = false;

        load_view("{{ route('view', ['path' => 'frontend.product.customer_reviews', 'product_id' => $product->id]) }}", "#customer_reviews");
        load_view("{{ route('view', ['path' => 'frontend.product.customer_review_add_update', 'product_id' => $product->id]) }}", "#writeareview");

        let pmTargetQtyVal = 2;

        function previewPoloLogo(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('poloLogoImg').src = e.target.result;
                    document.getElementById('poloLogoName').textContent = input.files[0].name;
                    const box = document.getElementById('poloLogoPreviewBox');
                    if (box) {
                        box.classList.remove('d-none');
                        box.classList.add('d-flex');
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removePoloLogo() {
            const input = document.getElementById('poloLogoInput');
            if (input) input.value = '';
            const box = document.getElementById('poloLogoPreviewBox');
            if (box) {
                box.classList.add('d-none');
                box.classList.remove('d-flex');
            }
        }

        function getUnitPriceForQty(qty) {
            if (qty >= 100) return 499;
            if (qty >= 50) return 599;
            if (qty >= 20) return 699;
            if (qty >= 10) return 799;
            if (qty >= 5) return 899;
            return 999;
        }

        function updateTierHighlight(qty) {
            const tiers = [2, 5, 10, 20, 50, 100];
            tiers.forEach(t => {
                const el = document.getElementById('tier-col-' + t);
                if (el) {
                    el.className = '';
                }
            });

            let activeTier = 2;
            if (qty >= 100) activeTier = 100;
            else if (qty >= 50) activeTier = 50;
            else if (qty >= 20) activeTier = 20;
            else if (qty >= 10) activeTier = 10;
            else if (qty >= 5) activeTier = 5;
            else activeTier = 2;

            const activeEl = document.getElementById('tier-col-' + activeTier);
            if (activeEl) {
                activeEl.className = 'table-warning border-warning fw-bold';
            }
        }

        function updatePricingDisplays(qty) {
            const unitPrice = getUnitPriceForQty(qty);
            const totalPrice = unitPrice * qty;

            const totalEl = document.getElementById('poloTotalPriceDisplay');
            if (totalEl) totalEl.textContent = '₹ ' + totalPrice.toLocaleString('en-IN') + '.00';

            const unitEl = document.getElementById('poloUnitPriceDisplay');
            if (unitEl) unitEl.textContent = '(₹' + unitPrice + '/pc)';

            updateTierHighlight(qty);
        }

        function selectQtyPack(qty, labelText, btn) {
            document.querySelectorAll('.qty-pack-btn').forEach(b => b.classList.remove('active'));
            if (btn) btn.classList.add('active');
            pmTargetQtyVal = qty;

            const lbl = document.getElementById('pmSelectedQtyLabel');
            if (lbl) lbl.textContent = labelText;
            const targetEl = document.getElementById('pmTargetQty');
            if (targetEl) targetEl.textContent = qty;
            const targetMaxEl = document.getElementById('pmTargetQtyMax');
            if (targetMaxEl) targetMaxEl.textContent = qty;

            updatePricingDisplays(qty);
            recalculateQtyProgress();
        }

        function changeMainProductImage(imgSrc, colorName, element, index, attrId) {
            const mainImg = document.getElementById('mainProductImage');
            if (mainImg && imgSrc) {
                mainImg.style.opacity = 0.3;
                setTimeout(() => {
                    const cacheBuster = imgSrc.indexOf('?') === -1 ? '?v=5' : '&v=5';
                    mainImg.src = imgSrc + cacheBuster;
                    mainImg.setAttribute('data-zoom', imgSrc + cacheBuster);
                    mainImg.style.opacity = 1;
                }, 100);
            }

            // Sync swatch dot active class
            document.querySelectorAll('.gallery-swatch-dot').forEach(sw => sw.classList.remove('active'));
            if (element) {
                element.classList.add('active');
            } else {
                const sw = document.querySelectorAll('.gallery-swatch-dot')[index];
                if (sw) sw.classList.add('active');
            }

            // Sync color swatches in the right panel
            document.querySelectorAll('.color-swatch-opt').forEach(s => {
                if (s.getAttribute('data-index') == index || (colorName && s.getAttribute('data-color-name').toLowerCase() === colorName.toLowerCase())) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });

            // Update color label
            const label = document.getElementById('poloSelectedColorLabel');
            if (label && colorName) label.textContent = colorName;

            // Update gallery color name label
            const galleryColorLabel = document.getElementById('selectedGalleryColorName');
            if (galleryColorLabel && colorName) galleryColorLabel.textContent = colorName;

            // Trigger attribute radio button
            if (attrId) {
                const radio = document.querySelector('.attribute-selector-radio[data-attribute-id="' + attrId + '"]');
                if (radio) {
                    isSelfTriggered = true;
                    radio.checked = true;
                    $(radio).trigger('change');
                    isSelfTriggered = false;
                }
            } else if (colorName) {
                // Try selecting attribute by name
                const radio = Array.from(document.querySelectorAll('.attribute-selector-radio')).find(r => r.getAttribute('data-color-name') && r.getAttribute('data-color-name').toLowerCase() === colorName.toLowerCase());
                if (radio) {
                    isSelfTriggered = true;
                    radio.checked = true;
                    $(radio).trigger('change');
                    isSelfTriggered = false;
                }
            }
        }

        function switchGallerySlide(index, name, el, attrId) {
            const swatch = document.querySelectorAll('.gallery-swatch-dot')[index];
            if (swatch) {
                const imgSrc = swatch.getAttribute('data-image-src');
                changeMainProductImage(imgSrc, name, swatch, index, attrId);
            }
        }

        function selectPoloColor(index, name, el, attrId) {
            document.querySelectorAll('.color-swatch-opt').forEach(s => s.classList.remove('active'));
            if (el) el.classList.add('active');

            const swatch = document.querySelectorAll('.gallery-swatch-dot')[index];
            if (swatch) {
                const imgSrc = swatch.getAttribute('data-image-src');
                changeMainProductImage(imgSrc, name, swatch, index, attrId);
            } else {
                changeMainProductImage(null, name, null, index, attrId);
            }
        }

        function updateSizeCount(btn, delta) {
            const valEl = btn.parentElement.querySelector('.size-qty-val');
            if (valEl) {
                let count = parseInt(valEl.textContent) || 0;
                count = Math.max(0, count + delta);
                valEl.textContent = count;
                recalculateQtyProgress();
            }
        }

        function recalculateQtyProgress() {
            let totalSelected = 0;
            document.querySelectorAll('.size-qty-val').forEach(el => {
                totalSelected += parseInt(el.textContent) || 0;
            });

            const currentEl = document.getElementById('pmCurrentQty');
            if (currentEl) currentEl.textContent = totalSelected;

            if (totalSelected > 0) {
                updatePricingDisplays(totalSelected);
            } else {
                updatePricingDisplays(pmTargetQtyVal);
            }

            let pct = Math.min(100, Math.round((totalSelected / pmTargetQtyVal) * 100));
            const bar = document.getElementById('pmProgressBar');
            if (bar) {
                bar.style.width = pct + '%';
                if (totalSelected === pmTargetQtyVal) {
                    bar.style.backgroundColor = '#2E7D32';
                } else if (totalSelected > pmTargetQtyVal) {
                    bar.style.backgroundColor = '#D32F2F';
                } else {
                    bar.style.backgroundColor = '#F57C00';
                }
            }
        }

        $(document).ready(function() {
            // ——— Side Thumbnail Color Switcher ———
            // Use event delegation on the grid container for reliable clicks
            $(document).on('click', '.side-thumb-card', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var idx = parseInt($(this).attr('data-slide-index')) || 0;
                var name = $(this).attr('data-color-name') || '';
                var attrId = $(this).attr('data-attr-id') || '';

                // Update active state
                $('.side-thumb-card').removeClass('active');
                $(this).addClass('active');

                // Sync color swatches
                $('.color-swatch-opt').each(function() {
                    if ($(this).attr('data-index') == idx) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });

                // Update color label
                var $label = $('#poloSelectedColorLabel');
                if ($label.length && name) $label.text(name);

                // Slide the main Swiper — try all possible references
                var swiperInstance = null;
                var mainSwiperEl = document.querySelector('.tf-product-media-main');
                if (mainSwiperEl && mainSwiperEl.swiper) {
                    swiperInstance = mainSwiperEl.swiper;
                } else if (window.productMainSwiper) {
                    swiperInstance = window.productMainSwiper;
                }

                if (swiperInstance) {
                    swiperInstance.slideTo(idx, 300, false);
                    console.log('[Color Switch] Sliding to index ' + idx + ' (' + name + ')');
                } else {
                    console.warn('[Color Switch] Swiper not found! Checking DOM...');
                    // Last resort: swap the visible image src directly
                    var slides = document.querySelectorAll('.tf-product-media-main .swiper-slide');
                    if (slides.length > idx) {
                        slides.forEach(function(sl, i) {
                            sl.style.display = (i === idx) ? 'block' : 'none';
                        });
                    }
                }

                // Trigger attribute radio
                if (attrId) {
                    var $radio = $('.attribute-selector-radio[data-attribute-id="' + attrId + '"]');
                    if ($radio.length) {
                        $radio.prop('checked', true).trigger('change');
                    }
                }
            });

            // Explicit Related Products Swiper Initialization
            if ($('.products-slider').length > 0 && typeof Swiper !== 'undefined') {
                const prevButton = document.querySelector('.products-slider-prev-btn');
                const nextButton = document.querySelector('.products-slider-next-btn');
                const relatedSwiper = new Swiper('.products-slider', {
                    slidesPerView: 1,
                    spaceBetween: 25,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        576: { slidesPerView: 2 },
                        768: { slidesPerView: 2 },
                        992: { slidesPerView: 3 },
                        1200: { slidesPerView: 4 },
                    },
                });
                if (prevButton) {
                    prevButton.addEventListener('click', () => relatedSwiper.slidePrev());
                }
                if (nextButton) {
                    nextButton.addEventListener('click', () => relatedSwiper.slideNext());
                }
            }

            // Color name display initialization
            const colorInputs = document.querySelectorAll('.color-checkbox3-input');
            const colorNameDisplay = document.getElementById('selected-color-name');
            const defaultChecked = document.querySelector('.color-checkbox3-input:checked');
            if (defaultChecked && colorNameDisplay) {
                colorNameDisplay.textContent = defaultChecked.dataset.colorName;
            }

            colorInputs.forEach(input => {
                input.addEventListener('change', function () {
                    if (this.checked && colorNameDisplay) {
                        colorNameDisplay.textContent = this.dataset.colorName;
                    }
                });
            });

            // Buy Now button action
            $('#buyNowButtonMain').on('click', function() {
                const productForm = document.getElementById('productFormMain');
                const buyNowForm = document.getElementById('buyNowFormMain');
                if (!productForm || !buyNowForm) return;

                buyNowForm.innerHTML = '';
                Array.from(productForm.elements).forEach(function (element) {
                    if (element.name && element.value) {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = element.name;
                        input.value = element.value;
                        buyNowForm.appendChild(input);
                    }
                });
                buyNowForm.submit();
            });

            // Progress bar init
            document.querySelectorAll('.progress-bar').forEach(bar => {
                let val = bar.dataset.progress;
                if (val) {
                    val = Math.min(Math.max(val, 0), 100);
                    bar.style.width = val + '%';
                }
            });

            // Share button action
            $('#shareButton').on('click', function() {
                var currentPageUrl = window.location.href;
                $(this).toggleClass('active');
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(currentPageUrl);
                }
            });

            // Dynamic Image Switcher based on Selected Attribute Option
            $(document).on('change', '.attribute-selector-radio', function() {
                if (isSelfTriggered) return;
                var attributeId = $(this).attr('data-attribute-id');
                if (!attributeId) return;

                var swatches = document.querySelectorAll('.gallery-swatch-dot');
                for (var i = 0; i < swatches.length; i++) {
                    var mappedIdsStr = swatches[i].getAttribute('data-mapped-ids') || '';
                    var mappedIds = mappedIdsStr.split(',');
                    if (mappedIds.includes(attributeId.toString())) {
                        var imgSrc = swatches[i].getAttribute('data-image-src');
                        var colorName = swatches[i].getAttribute('data-color-name');
                        changeMainProductImage(imgSrc, colorName, swatches[i], i, attributeId);
                        break;
                    }
                }
            });

            // Active chip selection toggles
            $(document).on('click', '.size-chip-item label', function() {
                $(this).closest('.size-chips-grid').find('label').removeClass('active');
                $(this).addClass('active');
            });
            $(document).on('click', '.color-chip-item label', function() {
                $(this).closest('.color-chips-grid').find('label').removeClass('active');
                $(this).addClass('active');
                var radio = $(this).closest('.color-chip-item').find('input[type="radio"]');
                var targetId = radio.attr('data-target-label');
                var colorName = radio.attr('data-color-name');
                if (targetId && colorName) {
                    var el = document.getElementById(targetId);
                    if (el) el.textContent = colorName;
                }
            });

            // Touch Scroll Fix
            function applyTouchScrollFix() {
                var mainSwiperEl = document.querySelector('.tf-product-media-main');
                if (mainSwiperEl && mainSwiperEl.swiper) {
                    var swiper = mainSwiperEl.swiper;
                    swiper.params.touchReleaseOnEdges = true;
                    swiper.params.passiveListeners = true;
                    swiper.params.threshold = 15;
                    swiper.params.touchAngle = 45;
                    swiper.params.touchStartPreventDefault = false;
                    swiper.params.touchMoveStopPropagation = false;
                    swiper.update();
                }

                $('.tf-image-zoom, .swiper-slide, .tf-product-media-wrap, .thumbs-slider, .tf-product-media-main img').css({
                    'touch-action': 'pan-y',
                    '-webkit-user-drag': 'none'
                });
            }

            setTimeout(applyTouchScrollFix, 300);
            setTimeout(applyTouchScrollFix, 800);
        });
    </script>
@endpush



