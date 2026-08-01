@php
    $ordered_product = App\Models\Product::where('id', $product_id)->firstOrNew();
@endphp
<div class="offcanvas-cart-items mb-3 mt-4 pb-4 border-bottom" id="ordered_item_{{ $ordered_product->id }}">
    <div class="offcanvas-cart-item mb-20 d-flex align-items-center">
        <a href="javascript:;" class="image">
            @php
             $thumbnails = json_decode($ordered_product->thumbnail, true);
             $firstImage = $thumbnails[0] ?? null;
           @endphp
            <img src="{{ get_image($firstImage) }}" alt="">
        </a>
        <div class="offcanvas-cartitem-details d-flex align-items-center justify-content-between">
            <div class="title-price">
                <a href="#" class="title">{{ $ordered_product->title }}</a>
                <p class="price">
                    @if ($ordered_product->is_discounted)
                        @if ($ordered_product->discount->discount_type == 'flat')
                            <span>{{ currency($ordered_product->price - $ordered_product->discount_value) }}</span>
                            <span class="old">{{ currency($ordered_product->price) }}</span>
                        @else
                            @php $discount_amount = ($ordered_product->price * ($ordered_product->discount_value / 100)); @endphp
                            <span>{{ currency($ordered_product->price - $discount_amount) }}</span>
                            <span class="old">{{ currency($ordered_product->price) }}</span>
                        @endif
                    @else
                        <span>{{ currency($ordered_product->price) }}</span>
                    @endif
                </p>
            </div>
            <div class="offcanvas-cart-total-remove">
                <div class="offcanvas-cart-total">
                    <button type="button" class="sub3 icon" onclick="product_quantity(this, 'minus')"><span class="fi-rr-minus"></span></button>
                    <input type="number" value="1" min="1" readonly="">
                    <button type="button" class="add3 icon" onclick="product_quantity(this, 'plus')"><span class="fi-rr-plus"></span></button>
                </div>
                <a href="javascript:;" class="remove" onclick="$('#ordered_item_{{ $ordered_product->id }}').remove();">{{ get_phrase('Remove') }}</a>
            </div>
        </div>
    </div>



    @php $random_code_for_name_attr = random(10); @endphp

    @foreach ($ordered_product->category->attribute_types as $attribute_type)
        
    @endforeach












    @foreach ($ordered_product->product_merged_attributes() as $key => $product_attribute_type)
        <div class="row mt-3">
            @php $product_attribute_type_id = $product_attribute_type['id']; @endphp
            <div class="col-auto py-2">{{ $product_attribute_type['name'] }} : </div>

            @if ($product_attribute_type['input_type'] == 'color')
                @foreach ($product_attribute_type['attributes'] as $product_attribute)
                    @php $option_id = random(15); @endphp
                    <div class="col-auto">
                        <div class="radius-8px" width="50px">
                            <input type="radio" class="btn-check" name="product_attributes[{{ $random_code_for_name_attr . '_' . $ordered_product->id }}][{{ $product_attribute_type_id }}][]" id="option_{{ $option_id }}" autocomplete="off" checked>
                            <label class="btn p-1 px-2" for="option_{{ $option_id }}" style="color: {{ $product_attribute['input_value'] }};">{{ $product_attribute['name'] }}</label>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($product_attribute_type['attributes'] as $product_attribute)
                    @php $option_id = random(15); @endphp
                    <div class="col-auto">
                        <div class="radius-8px" width="50px">
                            <input type="radio" class="btn-check" name="product_attributes[{{ $random_code_for_name_attr . '_' . $ordered_product->id }}][{{ $product_attribute_type_id }}][]" id="option_{{ $option_id }}" autocomplete="off" checked>
                            <label class="btn p-1 px-2" for="option_{{ $option_id }}">{{ $product_attribute['name'] }}</label>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endforeach
</div>
