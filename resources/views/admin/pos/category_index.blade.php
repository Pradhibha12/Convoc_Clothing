<div id="tile-container">
    <div class="row g-3 mt-1">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-md-6 col-xl-4 col-xxl-3 cursor-pointer">
                <div class="custom-grid-card show-product-page" style="background: {{ sprintf('#%02X%02X%02X', mt_rand(200,255), mt_rand(200,255), mt_rand(200,255)) }};" data-href="{{ route('admin.pos.sales.product.view', $category->id) }}">
                    <h4 class="card-title">{{ $category->title }}</h4>
                    <p class="card-subtitle">{{ $category->totalProductCount() }} {{ get_phrase('items') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
