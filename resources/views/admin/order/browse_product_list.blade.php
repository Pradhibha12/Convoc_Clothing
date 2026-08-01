@php
    if (isset($search)) {
        $products = App\Models\Product::where('title', 'like', '%' . $search . '%')->get();
    } else {
        $products = App\Models\Product::limit(30)->get();
    }
@endphp
<style>
    .orderProduct {
        height: 200px;
        overflow-y: auto;
    }
</style>
<div class="orderProduct">
    @foreach ($products as $product)
        <div class="offcanvas-cart-items">
            <div class="offcanvas-cart-item mb-20 d-flex align-items-center">
                @php
                    $thumbnails = json_decode($product->thumbnail, true);
                    $firstImage = $thumbnails[0] ?? null;
                @endphp
                <a href="javascript:;" class="image">
                    <img src="{{ get_image($firstImage) }} " alt="">
                </a>
                <div class="offcanvas-cartitem-details d-flex align-items-center justify-content-between">
                    <div class="title-price">
                        <a href="javascript:;" class="title">{{ $product->title }}</a>
                        <p class="price">
                            @if ($product->is_discounted)
                                @if ($product->discount->discount_type == 'flat')
                                    <span>{{ currency($product->price - $product->discount_value) }}</span>
                                    <span class="old">{{ currency($product->price) }}</span>
                                @else
                                    @php $discount_amount = ($product->price * ($product->discount_value / 100)); @endphp
                                    <span>{{ currency($product->price - $discount_amount) }}</span>
                                    <span class="old">{{ currency($product->price) }}</span>
                                @endif
                            @else
                                <span>{{ currency($product->price) }}</span>
                            @endif
                        </p>
                    </div>
                    <div class="offcanvas-cart-total-remove">
                        <button type="button" class="btn btn-primary-light btn-icon"
                            onclick="append_view('{{ route('view', ['path' => 'admin.order.add_ordered_item', 'product_id' => $product->id]) }}', '#ordered_product_list')"><i
                                class="fi-rr-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-2 border-0">
    @endforeach
</div>
