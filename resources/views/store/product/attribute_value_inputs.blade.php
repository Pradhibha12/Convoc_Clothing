@php
    $attr_type = App\Models\Attribute_type::find($attribute_type_id);
    
    $is_kids_category = false;
    $cat_id = request('category_id');
    if (!$cat_id && isset($product_id)) {
        $product = App\Models\Product::find($product_id);
        $cat_id = $product ? $product->category_id : null;
    }
    
    if ($cat_id) {
        $category = App\Models\Category::find($cat_id);
        if ($category) {
            $slug = strtolower($category->slug ?? '');
            $name = strtolower($category->name ?? $category->title ?? '');
            $is_kids_category = (
                in_array($cat_id, [6, 45, 46]) ||
                str_contains($slug, 'kid') || str_contains($slug, 'boy') || str_contains($slug, 'girl') ||
                str_contains($name, 'kid') || str_contains($name, 'boy') || str_contains($name, 'girl')
            );
            
            if (!$is_kids_category && $category->parent_id > 0) {
                $parent = App\Models\Category::find($category->parent_id);
                if ($parent) {
                    $parent_slug = strtolower($parent->slug ?? '');
                    $parent_name = strtolower($parent->name ?? $parent->title ?? '');
                    $is_kids_category = (
                        in_array($parent->id, [6, 45, 46]) ||
                        str_contains($parent_slug, 'kid') || str_contains($parent_slug, 'boy') || str_contains($parent_slug, 'girl') ||
                        str_contains($parent_name, 'kid') || str_contains($parent_name, 'boy') || str_contains($parent_name, 'girl')
                    );
                }
            }
        }
    }
@endphp

@if($attr_type && $attr_type->attributes->count() > 0)
    <div class="d-flex flex-wrap align-items-center gap-2 p-3 bg-light border rounded-3">
        @php
            $attributes = $attr_type->attributes;
            if ($attribute_type_id == 1) {
                $size_order = [
                    'S' => 1,
                    'M' => 2,
                    'L' => 3,
                    'XL' => 4,
                    'XXL' => 5,
                    '3XL' => 6,
                    '4XL' => 7,
                    '5XL' => 8
                ];
                $attributes = $attributes->sortBy(function($attr) use ($size_order) {
                    $name = trim($attr->name);
                    if (isset($size_order[$name])) {
                        return $size_order[$name];
                    }
                    return 100 + $attr->id;
                });
            }
        @endphp

        @foreach ($attributes as $attribute)
            @php
                if ($attribute_type_id == 1) {
                    $is_kid_label = str_starts_with(strtolower($attribute->name), 'kid');
                    if ($is_kids_category) {
                        if (!$is_kid_label) {
                            $allowed_kids_sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                            if (!in_array(trim($attribute->name), $allowed_kids_sizes)) {
                                continue;
                            }
                        }
                    } else {
                        if ($is_kid_label) {
                            continue;
                        }
                    }
                }
                $is_checked = false;
                if (isset($product_id) && $product_id > 0) {
                    $is_checked = App\Models\Product_attribute::where('attribute_id', $attribute->id)->where('product_id', $product_id)->exists();
                } else {
                    $is_checked = true;
                }
            @endphp

            <div class="form-check me-3 mb-2 p-2 px-3 border rounded bg-white shadow-sm">
                <input class="form-check-input ms-0 me-2" type="checkbox" name="product_attributes[{{ $attribute_type_id }}][{{ $attribute->id }}]" value="1" id="attr_check_store_{{ $attribute->id }}_{{ isset($product_id) ? $product_id : 'new' }}" {{ $is_checked ? 'checked' : '' }}>
                <label class="form-check-label fw-medium text-dark cursor-pointer" for="attr_check_store_{{ $attribute->id }}_{{ isset($product_id) ? $product_id : 'new' }}">
                    {{ $attribute->name }}
                </label>
            </div>
        @endforeach
    </div>
@endif
