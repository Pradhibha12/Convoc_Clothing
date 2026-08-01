<style>
.product-image {
	height: 130px;
}
</style>
<div class="row grid-list g-3 mt-2">
    @foreach ($products as $product)
        @php
           
            $storeSettings = $product->store->settings;
            $vat = 0;

            if ($storeSettings && $storeSettings->vat_type === 'percentage') {
                $vat = ($product->price / 100) * $storeSettings->vat_value;
            } else {
                $vat = $storeSettings->vat_value ?? 0;
            }

        @endphp
        
        <div class="col-sm-6 col-md-6 col-xl-4 col-xxl-3 cursor-pointer" id="itemsSetProductForm" data-category-id="{{ $category_id }}" data-id="{{ $product->id }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-vat="{{ $vat }}">
            <div class="product-grid-card">
                <div class="product-image">
                    @php
                        $thumbnails = json_decode($product->thumbnail, true);
                        $firstImage = $thumbnails[0] ?? null;
                    @endphp
                    <img class="image-sub" src="{{ get_image($firstImage) }}" alt="">
                    
                </div>
                <h4 class="product-title">{{ $product?->title }}</h4>
            </div>
        </div>
    @endforeach
</div>