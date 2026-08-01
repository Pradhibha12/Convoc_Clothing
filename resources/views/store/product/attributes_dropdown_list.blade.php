@php
    $category = !empty($category_id) ? App\Models\Category::find($category_id) : null;
    if ($category && $category->attribute_types && $category->attribute_types->count() > 0) {
        $attribute_types = $category->attribute_types;
    } else {
        $attribute_types = App\Models\Attribute_type::all();
    }
@endphp

@if($attribute_types && $attribute_types->count() > 0)
    @foreach ($attribute_types as $attribute_type)
        <li><button class="dropdown-item" onclick="appendAttribute('{{ addslashes($attribute_type->name) }}', '{{ $attribute_type->id }}')" type="button">{{ $attribute_type->name }}</button></li>
    @endforeach
@else
    <li><span class="dropdown-item text-muted">{{ get_phrase('No attributes available') }}</span></li>
@endif