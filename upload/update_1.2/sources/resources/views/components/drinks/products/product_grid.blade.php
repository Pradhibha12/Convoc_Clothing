@php
$layout = $layout ?? 'md';
@endphp
<style>
.layout_sm  .product-card-banner {
    height: 250px;
}
.layout_md  .product-card-banner {
	height: 300px;
}
</style>

<a href="{{ route('product', $product->slug) }}" class="product-card layout_{{$layout}}">
    <div class="product-card-banner">
        @php
            $thumbnails = json_decode($product->thumbnail, true);
            $firstImage = $thumbnails[0] ?? null;
        @endphp
        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
    </div>
    <div class="product-card-body">
        <h5 class="product-card-title">{{ \Illuminate\Support\Str::limit($product->title, 70, '...') }}</h5>
        <div class="d-flex align-items-center justify-content-center flex-wrap gap-12px">
            @if ($product->is_discounted()->exists())
                @if ($product->is_discounted->discount_type == 'flat')
                    <div class="d-flex align-items-baseline gap-2">
                        <h6 class="pc-new-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                        <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                    </div>
                @else
                    @php
                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                    @endphp
                    <div class="d-flex align-items-baseline gap-2">
                        <h6 class="pc-new-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                            <h6 class="pc-old-price"><del>{{ currency($product->price) }}</del></h6>
                    </div>
                    
                @endif
            @else
                    <h6 class="pc-new-price">{{ currency($product->price) }}</h6>
            @endif
        </div>
    </div>
</a>