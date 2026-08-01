@extends('layouts.vendor')
@push('title', get_phrase('Manage Product'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
<style>
    .h-45{
        height: 45px;
    }
</style>


    <div class="row mt-4">
        <div class="col-md-12">
            <form action="{{ route('vendor.product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-6 d-flex align-items-center">
                        <h5 class="title fs-14px ps-3">{{ get_phrase('Manager your product details') }}</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end flex-wrap gap-2">
                        <button type="submit" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px h-45">{{ get_phrase('Update product') }}</button>
                        <a href="{{ route('vendor.products') }}" class="btn ol-btn-outline-secondary h-45 d-flex align-items-center cg-10px">
                            <span class="fi-rr-arrow-alt-left"></span>
                            <span>{{ get_phrase('Back') }}</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ol-card">
                            <div class="pt-3">
                                <h5 class="title fs-14px ps-3">{{ get_phrase('Product Info') }}</h5>
                            </div>
                            <div class="ol-card-body p-3 mb-5">
                                <div class="mb-3">
                                    <label for="title" class="form-label ol-form-label">{{ get_phrase('Product title') }}</label>
                                    <input type="text" value="{{ $product->title }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter product title') }}" aria-label="{{ get_phrase('Enter product title') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="brand_id" class="form-label ol-form-label">{{ get_phrase('Brand') }}</label>
                                    <select class="ol-select2" name="brand_id" id="brand_id" required>
                                        <option value="">{{ get_phrase('Select a brand') }}</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="label" class="form-label ol-form-label">{{ get_phrase('Popular label') }}</label>
                                    <select class="ol-select2" name="label" id="label" required>
                                        <option value="">{{ get_phrase('Select a label') }}</option>
                                        <option value="top-seller" @if ('top-seller' == $product->label) selected @endif>{{ get_phrase('Top seller') }}</option>
                                        <option value="best-seller" @if ('best-seller' == $product->label) selected @endif>{{ get_phrase('Best seller') }}</option>
                                        <option value="featured" @if ('featured' == $product->label) selected @endif>{{ get_phrase('Featured') }}</option>
                                        <option value="trendy" @if ('trendy' == $product->label) selected @endif>{{ get_phrase('Trendy') }}</option>
                                        <option value="new-arrival" @if ('new-arrival' == $product->label) selected @endif>{{ get_phrase('New arrival') }}</option>
                                        <option value="hot" @if ('hot' == $product->label) selected @endif>{{ get_phrase('Hot') }}</option>
                                        <option value="exclusive" @if ('exclusive' == $product->label) selected @endif>{{ get_phrase('Exclusive') }}</option>
                                        <option value="limited-edition" @if ('limited-edition' == $product->label) selected @endif>{{ get_phrase('Limited edition') }}</option>
                                        <option value="bestselling" @if ('bestselling' == $product->label) selected @endif>{{ get_phrase('Bestselling') }}</option>
                                        <option value="customer-favorite" @if ('customer-favorite' == $product->label) selected @endif>{{ get_phrase('Customer favorite') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="quality_label" class="form-label ol-form-label">{{ get_phrase('Quality Assurance Label') }}</label>
                                    <select class="ol-select2" name="quality_label" id="quality_label" required>
                                        <option value="">{{ get_phrase('Select a label of quality') }}</option>
                                        <option value="certified" @if ('certified' == $product->quality_label) selected @endif>{{ get_phrase('Certified') }}</option>
                                        <option value="premium" @if ('premium' == $product->quality_label) selected @endif>{{ get_phrase('Premium') }}</option>
                                        <option value="authentic" @if ('authentic' == $product->quality_label) selected @endif>{{ get_phrase('Authentic') }}</option>
                                        <option value="handmade" @if ('handmade' == $product->quality_label) selected @endif>{{ get_phrase('Handmade') }}</option>
                                        <option value="organic" @if ('organic' == $product->quality_label) selected @endif>{{ get_phrase('Organic') }}</option>
                                        <option value="sustainable" @if ('sustainable' == $product->quality_label) selected @endif>{{ get_phrase('Sustainable') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="summary" class="form-label ol-form-label">{{ get_phrase('Short summary') }}</label>
                                    <textarea name="summary" rows="4" class="form-control ol-form-control" id="summary" placeholder="{{ get_phrase('Write short summary') }}">{{ $product->summary }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label ol-form-label">{{ get_phrase('Product description') }}</label>
                                    <textarea name="description" rows="4" class="form-control ol-form-control text_editor" id="description" placeholder="{{ get_phrase('Write description') }}">{{ $product->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="visibility_status_active" class="form-label ol-form-label">{{ get_phrase('Visibility') }} - </label>
                                    <div class="eRadios d-flex align-items-center">
                                        <div class="form-check">
                                            <input type="radio" value="1" @if ('1' == $product->status) checked @endif name="status" class="form-check-input eRadioSuccess" id="visibility_status_active" required="" checked>
                                            <label for="visibility_status_active" class="form-check-label">{{ get_phrase('Active') }}</label>
                                        </div>

                                        <div class="form-check ms-3">
                                            <input type="radio" value="0" @if ('1' != $product->status) checked @endif name="status" class="form-check-input eRadioPrimary" id="status_inactive" required="">
                                            <label for="status_inactive" class="form-check-label">{{ get_phrase('Draft') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ol-card">
                            <div class="pt-3">
                                <h5 class="title fs-14px ps-3">{{ get_phrase('Stock & Related Attriutes') }}</h5>
                            </div>
                            <div class="ol-card-body p-3 mb-5">
                                <div class="mb-3">
                                    <label for="unit" class="form-label ol-form-label">{{ get_phrase('Total stock') }}</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">{{ get_phrase('Unit') }}</span>
                                        <select class="ol-form-control form-control" onchange="$('#selected_unit').text($(this).val().toUpperCase());" name="unit" id="unit" required>
                                            <option value="">{{ get_phrase('Select product unit') }}</option>
                                            <option value="kg" @if ('kg' == $product->unit) selected @endif>{{ get_phrase('Kilogram') }} (kg)</option>
                                            <option value="g" @if ('g' == $product->unit) selected @endif>{{ get_phrase('Gram') }} (g)</option>
                                            <option value="lb" @if ('lb' == $product->unit) selected @endif>{{ get_phrase('Pound') }} (lb)</option>
                                            <option value="oz" @if ('oz' == $product->unit) selected @endif>{{ get_phrase('Ounce') }} (oz)</option>
                                            <option value="L" @if ('L' == $product->unit) selected @endif>{{ get_phrase('Liter') }} (L)</option>
                                            <option value="mL" @if ('mL' == $product->unit) selected @endif>{{ get_phrase('Milliliter') }} (mL)</option>
                                            <option value="gal" @if ('gal' == $product->unit) selected @endif>{{ get_phrase('Gallon') }}</option>
                                            <option value="qt" @if ('qt' == $product->unit) selected @endif>{{ get_phrase('Quart') }}</option>
                                            <option value="pt" @if ('pt' == $product->unit) selected @endif>{{ get_phrase('Pint') }}</option>
                                            <option value="fl-oz" @if ('fl-oz' == $product->unit) selected @endif>{{ get_phrase('Fluid Ounce') }} (fl oz)</option>
                                            <option value="package" @if ('package' == $product->unit) selected @endif>{{ get_phrase('Package') }}</option>
                                            <option value="box" @if ('box' == $product->unit) selected @endif>{{ get_phrase('Box') }}</option>
                                            <option value="bundle" @if ('bundle' == $product->unit) selected @endif>{{ get_phrase('Bundle') }}</option>
                                            <option value="piece" @if ('piece' == $product->unit) selected @endif>{{ get_phrase('Piece') }}</option>
                                            <option value="set" @if ('set' == $product->unit) selected @endif>{{ get_phrase('Set') }}</option>
                                            <option value="dozen" @if ('dozen' == $product->unit) selected @endif>{{ get_phrase('Dozen') }}</option>
                                            <option value="pair" @if ('pair' == $product->unit) selected @endif>{{ get_phrase('Pair') }}</option>
                                            <option value="case" @if ('case' == $product->unit) selected @endif>{{ get_phrase('Case') }}</option>
                                            <option value="carton" @if ('carton' == $product->unit) selected @endif>{{ get_phrase('Carton') }}</option>
                                            <option value="pallet" @if ('pallet' == $product->unit) selected @endif>{{ get_phrase('Pallet') }}</option>
                                            <option value="bag" @if ('bag' == $product->unit) selected @endif>{{ get_phrase('Bag') }}</option>
                                            <option value="sack" @if ('sack' == $product->unit) selected @endif>{{ get_phrase('Sack') }}</option>
                                            <option value="bottle" @if ('bottle' == $product->unit) selected @endif>{{ get_phrase('Bottle') }}</option>
                                            <option value="can" @if ('can' == $product->unit) selected @endif>{{ get_phrase('Can') }}</option>
                                            <option value="jar" @if ('jar' == $product->unit) selected @endif>{{ get_phrase('Jar') }}</option>
                                            <option value="tube" @if ('tube' == $product->unit) selected @endif>{{ get_phrase('Tube') }}</option>
                                            <option value="strip" @if ('strip' == $product->unit) selected @endif>{{ get_phrase('Strip') }}</option>
                                            <option value="roll" @if ('roll' == $product->unit) selected @endif>{{ get_phrase('Roll') }}</option>
                                            <option value="sheet" @if ('sheet' == $product->unit) selected @endif>{{ get_phrase('Sheet') }}</option>
                                            <option value="tablet" @if ('tablet' == $product->unit) selected @endif>{{ get_phrase('Tablet') }}</option>
                                            <option value="capsule" @if ('capsule' == $product->unit) selected @endif>{{ get_phrase('Capsule') }}</option>
                                            <option value="vial" @if ('vial' == $product->unit) selected @endif>{{ get_phrase('Vial') }}</option>
                                            <option value="unit" @if ('unit' == $product->unit) selected @endif>{{ get_phrase('Unit') }}</option>
                                            <option value="each" @if ('each' == $product->unit) selected @endif>{{ get_phrase('Each') }}</option>
                                        </select>
                                        <span class="input-group-text" id="selected_unit">{{ get_phrase('Quantity') }}</span>
                                        <input type="number" min="0" value="{{ $product->total_stock }}" name="total_stock" class="form-control ol-form-control" id="total_stock" placeholder="{{ get_phrase('Enter total stock') }}" aria-label="{{ get_phrase('Enter total stock') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label ol-form-label">{{ get_phrase('Product category') }}</label>
                                    <select class="ol-select2" name="category_id" id="category_id" onchange="load_view('{{ route('view', ['path' => 'store.product.attributes_dropdown_list']) }}?category_id='+$(this).val(), '#attributes_dropdown_list'); $('.appended-attributes').html('');" required>
                                        <option value="">{{ get_phrase('Select a category') }}</option>
                                        @foreach ($product_categories as $product_category)
                                            <optgroup label=" {{ $product_category->title }} ">
                                                <option value="{{ $product_category->id }}" @if ($product_category->id == $product->category_id) selected @endif>{{ $product_category->title }}</option>
                                                @foreach ($product_category->childs as $sub_category)
                                                    <option value="{{ $sub_category->id }}" @if ($sub_category->id == $product->category_id) selected @endif> - {{ $sub_category->title }}</option>
                                                    @foreach ($sub_category->childs as $sub_sub_category)
                                                        <option value="{{ $sub_sub_category->id }}" @if ($sub_sub_category->id == $product->category_id) selected @endif> &nbsp;&nbsp;&nbsp;&nbsp;-- {{ $sub_sub_category->title }}</option>
                                                    @endforeach
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 d-flex align-items-center">
                                    <label for="extra_cost" class="form-label ol-form-label mb-0">{{ get_phrase('Add new attributes') }}</label>

                                    <div class="btn-group dropstart ms-auto">
                                        <button type="button" class="btn ol-btn-primary btn-icon radius-8px" data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" title="{{ get_phrase('Add attribute') }}">
                                            <i class="fi-rr-plus-small"></i>
                                        </button>
                                        <ul class="dropdown-menu" id="attributes_dropdown_list">
                                            @include('store.product.attributes_dropdown_list', ['category_id' => $product->category_id])
                                        </ul>
                                    </div>
                                </div>

                                <div class="appended-attributes">
                                    @foreach($product->category->attribute_types as $attribute_type)
                                        <div class="border-top" id="attribute_type_{{$attribute_type->id}}">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center py-3">
                                                    <label for="extra_cost" class="form-label ol-form-label mb-0">{{$attribute_type->name}}</label>
                                                    <button class="btn ol-btn-danger btn-icon ms-auto" onclick="$('#attribute_type_{{$attribute_type->id}}').remove(); silentAction('{{route('vendor.product_attribute.delete', ['attribute_type_id' => $attribute_type->id, 'product_id' => $product->id])}}')" data-bs-toggle="tooltip" title="{{ get_phrase('Remove') }}"><i class="fi-rr-minus-small"></i></button>
                                                </div>
                                            </div>
                                            <div class="mb-3 attribute-value-inputs">
                                                @include('store.product.attribute_value_inputs', ['attribute_type_id' => $attribute_type->id, 'product_id' => $product->id])
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="ol-card">
                            <div class="pt-3">
                                <h5 class="title fs-14px ps-3">{{ get_phrase('Pricing & Status') }}</h5>
                            </div>
                            <div class="ol-card-body p-3 mb-5">
                                <div class="mb-3">
                                    <label for="price" class="form-label ol-form-label">{{ get_phrase('Price') }} ({{ currency() }})</label>
                                    <input type="number" step="0.01" value="{{ $product->price }}" name="price" class="form-control ol-form-control" id="price" placeholder="{{ get_phrase('Enter product price') }}" aria-label="{{ get_phrase('Enter product price') }}" required>
                                </div>

                                <hr class="my-4">

                                <div class="mb-3">
                                    <label for="discount_type" class="form-label ol-form-label">{{ get_phrase('Discount type') }}</label>
                                    <select class="ol-select2" name="discount_type" id="discount_type">
                                        <option value="flat" @if ('flat' == $product->discount_type) selected @endif>{{ get_phrase('Flat') }}</option>
                                        <option value="percentage" @if ('percentage' == $product->discount_type) selected @endif>{{ get_phrase('Percentage') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="discount_value" class="form-label ol-form-label">{{ get_phrase('Amount of discount') }}</label>
                                    <input type="number" min="0" step="0.01" value="{{ $product->discount->discount_value }}" name="discount_value" class="form-control ol-form-control" id="discount_value" placeholder="{{ get_phrase('Enter amount of discount') }}" aria-label="{{ get_phrase('Enter amount of discount') }}" required>
                                </div>

                                <div class="mb-3 pb-5">
                                    <label for="discount_period" class="form-label ol-form-label">{{ get_phrase('Discount Period') }}</label>
                                    <div class="position-relative position-relative">
                                        <input type="text" value="{{ 
                                                ($product->discount && $product->discount->start_date)
                                                    ? date('m/d/Y', strtotime($product->discount->start_date))
                                                    : date('m/d/Y')
                                            }} - {{
                                                ($product->discount && $product->discount->end_date)
                                                    ? date('m/d/Y', strtotime($product->discount->end_date))
                                                    : date('m/d/Y')
                                            }}" name="discount_period" class="form-control ol-form-control daterangepicker w-100" id="discount_period" placeholder="{{ get_phrase('Select date range of discount period') }}" aria-label="{{ get_phrase('Select date range of discount period') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 pb-5">
                                    <label for="discount_status_active" class="form-label ol-form-label">{{ get_phrase('Discount Status') }}</label>
                                    <div class="eRadios d-flex align-items-center">
                                        <div class="form-check">
                                            <input type="radio" value="1" @if (1 == $product->discount->status) checked @endif name="discount_status" class="form-check-input eRadioSuccess" id="discount_status_active" required="" checked>
                                            <label for="discount_status_active" class="form-check-label">{{ get_phrase('Active') }}</label>
                                        </div>

                                        <div class="form-check ms-3">
                                            <input type="radio" value="0" @if (1 != $product->discount->status) checked @endif name="discount_status" class="form-check-input eRadioPrimary" id="discount_status_inactive" required="">
                                            <label for="discount_status_inactive" class="form-check-label">{{ get_phrase('Inactive') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ol-card">
                            <div class="pt-3">
                                <h5 class="title fs-14px ps-3">{{ get_phrase('Banner & Thumbnail Section') }}</h5>
                            </div>
                            <div class="ol-card-body p-3 mb-5">
                                <div class="mb-3">
                                    <div class="d-flex flex-wrap" id="image-container">
                                        <!-- Image previews will be dynamically added here -->
                                        @if(!empty($product->thumbnail) && json_decode($product->thumbnail))
                                        @foreach(json_decode($product->thumbnail) as $key => $image)
                                        @php
                                            $fileName = basename($image); // extract only the filename
                                        @endphp
                                        <div class="possition_relative" id="image-icon{{$key}}">
                                            <img class="object-fit" src="{{ get_image($image) }}" class="rounded" height="90" width="80">
                                            <a href="javascript:void(0);" onclick="product_image_delete('{{route('vendor.product.image.delete',['id'=> $product->id, 'image'=> $fileName])}}', '{{$key}}')"> <i data-bs-toggle="tooltip" 
                                                data-bs-title="{{  get_phrase('delete') }}" class="fas fa-trash-alt"></i> </a>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}</label>
                                    <input type="file" name="thumbnail[]" class="form-control ol-form-control" id="thumbnail" accept="image/*" multiple>
                                </div>

                                <div class="mb-3">
                                    <img width="300" src="{{ get_image($product->banner) }}" class="mb-2 rounded-1" alt="">
                                    <label for="banner" class="form-label ol-form-label">{{ get_phrase('Banner') }}</label>
                                    <input type="file" name="banner" class="form-control ol-form-control" id="banner" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
@push('js')
    <script>
        function appendAttribute(attribute_name, attribute_type_id) {
            var attributeElem =
                `<div class="border-top" id="attribute_type_${attribute_type_id}">
                    <div class="mb-3">
                        <div class="d-flex align-items-center py-3">
                            <label for="extra_cost" class="form-label ol-form-label mb-0">${attribute_name}</label>
                            <button class="btn ol-btn-danger btn-icon ms-auto" onclick="$('#attribute_type_${attribute_type_id}').remove();" data-bs-toggle="tooltip" title="{{ get_phrase('Remove') }}"><i class="fi-rr-minus-small"></i></button>
                        </div>
                    </div>
                    <div class="mb-3 attribute-value-inputs"></div>
                </div>`;

            $('.appended-attributes').append(attributeElem);

            load_view("{{ route('view', ['path' => 'store.product.attribute_value_inputs']) }}?attribute_type_id=" + attribute_type_id, "#attribute_type_" + attribute_type_id + " .attribute-value-inputs");
        }
    </script>
@endpush
