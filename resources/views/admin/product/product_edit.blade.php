@extends('layouts.admin')
@push('title', get_phrase('Manage Product'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="row mt-2">
        <div class="col-md-12">
            <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-6 d-flex align-items-center">
                       <a href="{{ session('product_edit_referrer') ?? route('admin.products') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                            <span class="fi-rr-arrow-alt-left"></span>
                            <span>{{ get_phrase('Back') }}</span>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn ol-btn-outline-secondary px-4 me-2 float-end">{{ get_phrase('Update product') }}</button>
                        <a href="{{ route('admin.product.duplicate', ['id' => $product->id]) }}" class="btn ol-btn-light px-3 me-2 float-end d-flex align-items-center cg-10px"><span class="fi-rr-copy"></span> <span>{{ get_phrase('Duplicate product') }}</span></a>
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
                                    <label for="store_id" class="form-label ol-form-label">{{ get_phrase('Store') }}</label>
                                    <select class="ol-select2" name="store_id" id="store_id" required>
                                        <option value="">{{ get_phrase('Select a store') }}</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}" @if ($store->id == $product->store_id) selected @endif>{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="brand_id" class="form-label ol-form-label">{{ get_phrase('Brand') }}</label>
                                    <select class="ol-select2" name="brand_id" id="brand_id">
                                        <option value="">{{ get_phrase('Select a brand') }}</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="label" class="form-label ol-form-label">{{ get_phrase('Popular label') }}</label>
                                    <select class="ol-select2" name="label" id="label">
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
                                    <select class="ol-select2" name="quality_label" id="quality_label">
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

                        @php
                            $seo_field = App\Models\Seo_field::where('item_table', 'products')->where('item_id', $product->id)->firstOrNew();
                        @endphp

                        <div class="ol-card">
                            <div class="pt-3">
                                <h5 class="title fs-14px ps-3">{{ get_phrase('SEO Settings') }}</h5>
                            </div>
                            <div class="ol-card-body p-3 mb-5">
                                <div class="fpb-7 mb-3">
                                    <label for="meta_title" class="form-label ol-form-label">{{ get_phrase('Meta Title') }}</label>
                                    <input class="form-control ol-form-control" id="meta_title" name="meta_title" type="text" value="{{ $seo_field->meta_title }}" placeholder="Meta Title" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="meta_keywords" class="form-label ol-form-label">{{ get_phrase('Meta Keywords') }}</label>
                                    <input type="text" name="meta_keywords" value="{{ $seo_field->meta_keywords }}" class="tagify ol-form-control w-100" id="meta_keywords" placeholder="Meta keywords" />
                                    <small class="form-label ol-form-label text-muted">{{ get_phrase('Writing your keyword and hit the enter') }}</small>
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="meta_description" class="form-label ol-form-label">{{ get_phrase('Meta Description') }}</label>
                                    <textarea class="form-control ol-form-control" id="meta_description" name="meta_description" type="text" placeholder="Meta Description">{{ $seo_field->meta_description }}</textarea>
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="meta_robot" class="form-label ol-form-label">{{ get_phrase('Meta Robot') }}</label>
                                    <input class="form-control ol-form-control" id="meta_robot" name="meta_robot" type="text" value="{{ $seo_field->meta_robot }}" placeholder="Meta Robot" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="canonical_url" class="form-label ol-form-label">{{ get_phrase(' Canonical Url') }}</label>
                                    <input type="text" class="form-control ol-form-control" data-role="tagsinput" id = "canonical_url" name="canonical_url" placeholder="https://example.com/courses" value="{{ $seo_field->canonical_url }}" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="custom_url" class="form-label ol-form-label">{{ get_phrase(' Custom Url') }}</label>
                                    <input type="text" class="form-control ol-form-control" data-role="tagsinput" id = "custom_url" name="custom_url" placeholder="https://example.com/dresses/courses" value="{{ $seo_field->custom_url }}" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="og_title" class="form-label ol-form-label">{{ get_phrase('Og Title') }}</label>
                                    <input type="text" class="form-control ol-form-control" data-role="tagsinput" id = "og_title" name="og_title" value="{{ $seo_field->og_title }}" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="og_description" class="form-label ol-form-label">{{ get_phrase('Og Description') }}</label>
                                    <textarea class="form-control ol-form-control" id="og_description" name="og_description" type="text">{{ $seo_field->og_description }}</textarea>
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="og_image" class="form-label ol-form-label">{{ get_phrase('Og Image') }}</label>
                                    <div class="og_image mb-2">
                                        <img width="150px" src="{{ get_image($seo_field->og_image) }}" alt="....">
                                    </div>
                                    <input type="file" class="form-control ol-form-control" id = "og_image" name="og_image" value="{{ $seo_field->og_image }}" />
                                    <input type="hidden" name="old_og_image" value="{{ $seo_field->og_image }}">
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="json_ld" class="form-label ol-form-label">{{ get_phrase('Json Id') }}</label>
                                    <textarea class="form-control ol-form-control" id="json_ld" name="json_ld">{{ $seo_field->json_ld }}</textarea>
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
                                        <select class="ol-form-control form-control" onchange="$('#selected_unit').text($(this).val().toUpperCase());" name="unit" id="unit">
                                            <option value="nos" @if ('nos' == $product->unit || empty($product->unit)) selected @endif>{{ get_phrase('Nos') }}</option>
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
                                        <span class="input-group-text" id="selected_unit">{{ strtoupper($product->unit ?? 'NOS') }}</span>
                                        <input type="number" min="0" value="{{ $product->total_stock }}" name="total_stock" class="form-control ol-form-control" id="total_stock" placeholder="{{ get_phrase('Enter total stock') }}" aria-label="{{ get_phrase('Enter total stock') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label ol-form-label">{{ get_phrase('Product category') }}</label>
                                    <select class="ol-select2" name="category_id" id="category_id" onchange="load_view('{{ route('view', ['path' => 'admin.product.attributes_dropdown_list']) }}?category_id='+$(this).val(), '#attributes_dropdown_list'); $('.appended-attributes').html('');" required>
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
                                            @include('admin.product.attributes_dropdown_list', ['category_id' => $product->category_id])
                                        </ul>
                                    </div>
                                </div>

                                <div class="appended-attributes">
                                    @php
                                        $existing_attr_type_ids = $product->product_attributes->pluck('attribute_type_id')->unique();
                                        $cat_attr_type_ids = ($product->category && $product->category->attribute_types) ? $product->category->attribute_types->pluck('id') : collect();
                                        $all_attr_type_ids = $cat_attr_type_ids->merge($existing_attr_type_ids)->unique();
                                        $loaded_attribute_types = App\Models\Attribute_type::whereIn('id', $all_attr_type_ids)->get();
                                    @endphp
                                    @foreach($loaded_attribute_types as $attribute_type)
                                        <div class="border-top" id="attribute_type_{{$attribute_type->id}}">
                                            <input type="hidden" name="visible_attribute_types[]" value="{{$attribute_type->id}}">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center py-3">
                                                    <label for="extra_cost" class="form-label ol-form-label mb-0">{{$attribute_type->name}}</label>
                                                    <button type="button" class="btn ol-btn-danger btn-icon ms-auto" onclick="$('#attribute_type_{{$attribute_type->id}}').remove(); silentAction('{{route('admin.product_attribute.delete', ['attribute_type_id' => $attribute_type->id, 'product_id' => $product->id])}}')" data-bs-toggle="tooltip" title="{{ get_phrase('Remove') }}"><i class="fi-rr-minus-small"></i></button>
                                                </div>
                                            </div>
                                            <div class="mb-3 attribute-value-inputs">
                                                @include('admin.product.attribute_value_inputs', ['attribute_type_id' => $attribute_type->id, 'product_id' => $product->id])
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

                                @php
                                    $p_discount = $product->discount;
                                @endphp

                                <div class="mb-3">
                                    <label for="discount_type" class="form-label ol-form-label">{{ get_phrase('Discount type') }}</label>
                                    <select class="ol-select2" name="discount_type" id="discount_type">
                                        <option value="flat" @if ($p_discount && 'flat' == $p_discount->discount_type) selected @endif>{{ get_phrase('Flat') }}</option>
                                        <option value="percentage" @if ($p_discount && 'percentage' == $p_discount->discount_type) selected @endif>{{ get_phrase('Percentage') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="discount_value" class="form-label ol-form-label">{{ get_phrase('Amount of discount') }}</label>
                                    <input type="number" min="0" step="0.01" value="{{ $p_discount ? $p_discount->discount_value : '' }}" name="discount_value" class="form-control ol-form-control" id="discount_value" placeholder="{{ get_phrase('Enter amount of discount') }}" aria-label="{{ get_phrase('Enter amount of discount') }}">
                                </div>

                                <div class="mb-3 pb-5">
                                    <label for="discount_period" class="form-label ol-form-label">{{ get_phrase('Discount Period') }}</label>
                                    <div class="position-relative position-relative">
                                        <input type="text" value="{{ ($p_discount && $p_discount->start_date) ? date('m/d/Y', strtotime($p_discount->start_date)) . ' - ' . date('m/d/Y', strtotime($p_discount->end_date)) : '' }}" name="discount_period" class="form-control ol-form-control daterangepicker w-100" id="discount_period" placeholder="{{ get_phrase('Select date range of discount period') }}" aria-label="{{ get_phrase('Select date range of discount period') }}">
                                    </div>
                                </div>

                                <div class="mb-3 pb-5">
                                    <label for="discount_status_active" class="form-label ol-form-label">{{ get_phrase('Discount Status') }}</label>
                                    <div class="eRadios d-flex align-items-center">
                                        <div class="form-check">
                                            <input type="radio" value="1" name="discount_status" class="form-check-input eRadioSuccess" id="discount_status_active" @if ($p_discount && 1 == $p_discount->status) checked @endif>
                                            <label for="discount_status_active" class="form-check-label">{{ get_phrase('Active') }}</label>
                                        </div>

                                        <div class="form-check ms-3">
                                            <input type="radio" value="0" name="discount_status" class="form-check-input eRadioPrimary" id="discount_status_inactive" @if (!$p_discount || 0 == $p_discount->status) checked @endif>
                                            <label for="discount_status_inactive" class="form-check-label">{{ get_phrase('Inactive') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ol-card">
                            <div class="pt-3">
                                <h5 class="title fs-14px ps-3">{{ get_phrase('Product Images & Gallery (Multi-Images)') }}</h5>
                            </div>
                            <div class="ol-card-body p-3 mb-5">
                                <div class="mb-3">
                                    <label class="form-label ol-form-label mb-2">{{ get_phrase('Current Product Gallery') }}</label>
                                    <div class="d-flex flex-wrap gap-3 mb-3" id="image-container">
                                        @if(!empty($product->thumbnail) && is_array(json_decode($product->thumbnail, true)))
                                            @foreach(json_decode($product->thumbnail, true) as $key => $image)
                                                @php
                                                    $image = str_replace('\\', '', $image);
                                                    $fileName = basename($image);
                                                    $image_attrs_raw = json_decode($product->image_attributes, true) ?? [];
                                                    $image_attrs = [];
                                                    foreach ($image_attrs_raw as $k => $v) {
                                                        $image_attrs[str_replace('\\', '', $k)] = $v;
                                                    }
                                                    $assigned_attr_id = $image_attrs[$image] ?? '';
                                                @endphp
                                                <div class="position-relative border rounded p-2 shadow-sm d-flex flex-column align-items-center bg-white" id="gallery-image-{{ $key }}" style="width: 140px; min-height: 180px;">
                                                    <div style="width: 120px; height: 120px;" class="position-relative">
                                                        <img class="w-100 h-100 rounded object-fit-cover" src="{{ get_image($image) }}" alt="gallery-image">
                                                        <span class="badge bg-secondary position-absolute top-0 start-0 m-1" style="font-size: 10px;">#{{ $key + 1 }}</span>
                                                        <a href="javascript:void(0);" onclick="delete_gallery_image('{{ route('admin.product.image.delete', ['id' => $product->id]) }}?image={{ urlencode($fileName) }}', 'gallery-image-{{ $key }}')" class="btn btn-danger btn-sm p-0 d-flex align-items-center justify-content-center position-absolute top-0 end-0 m-1 rounded-circle" style="width: 24px; height: 24px;" title="{{ get_phrase('Delete Image') }}">
                                                            <i class="fas fa-trash-alt" style="font-size: 10px;"></i>
                                                        </a>
                                                    </div>
                                                    
                                                    @foreach (App\Models\Attribute_type::has('attributes')->get() as $type)
                                                        @php
                                                            $typeName = strtolower($type->name ?? '');
                                                            $typeSlug = strtolower($type->slug ?? '');
                                                            $isColor = ($typeSlug == 'color' || $typeSlug == 'colour' || str_contains($typeName, 'color') || str_contains($typeName, 'colour'));
                                                        @endphp
                                                        @if ($isColor)
                                                            @php
                                                                $assigned_attr_id = '';
                                                                if (is_array($assigned_attr_id = $image_attrs[$image] ?? '')) {
                                                                    $assigned_attr_id = $image_attrs[$image][$type->id] ?? '';
                                                                } else {
                                                                    $attr = App\Models\Attribute::find($image_attrs[$image] ?? '');
                                                                    if ($attr && $attr->attribute_type_id == $type->id) {
                                                                        $assigned_attr_id = $image_attrs[$image] ?? '';
                                                                    }
                                                                }
                                                            @endphp
                                                            <div class="w-100 mt-1">
                                                                <label class="form-label mb-0" style="font-size: 9px; font-weight: 600; color: #475569;">{{ $type->name }}:</label>
                                                                <select name="image_attributes[{{ $image }}][{{ $type->id }}]" class="form-select form-select-sm py-0" style="font-size: 10px; height: 24px; padding: 2px 5px; border-radius: 4px;">
                                                                    <option value="">No {{ $type->name }}</option>
                                                                    @foreach ($type->attributes as $attr)
                                                                        <option value="{{ $attr->id }}" @if($assigned_attr_id == $attr->id) selected @endif>
                                                                            {{ $attr->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted fs-13px">{{ get_phrase('No gallery images uploaded yet.') }}</p>
                                        @endif
                                    </div>

                                    <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Add / Upload Gallery Images (Select Multiple Files)') }}</label>
                                    <input type="file" name="thumbnail[]" class="form-control ol-form-control" id="thumbnail" accept="image/*" multiple onchange="previewGalleryImages(this, 'new-gallery-previews', true)">
                                    <small class="text-muted d-block mt-1">{{ get_phrase('You can select multiple image files at once to add to this product gallery.') }}</small>
                                    
                                    <div class="d-flex flex-wrap gap-2 mt-2" id="new-gallery-previews"></div>
                                </div>

                                <div class="mb-3 border-top pt-3" id="banner-container">
                                    <label for="banner" class="form-label ol-form-label">{{ get_phrase('Product Banner Image') }}</label>
                                    @if(!empty($product->banner))
                                        <div class="mb-2 position-relative d-inline-block" id="banner-image-preview">
                                            <img width="250" src="{{ get_image($product->banner) }}" class="rounded shadow-sm border" alt="banner">
                                            <a href="javascript:void(0);" onclick="delete_banner_image('{{ route('admin.product.banner.delete', ['id' => $product->id]) }}', 'banner-image-preview')" class="btn btn-danger btn-sm p-0 d-flex align-items-center justify-content-center position-absolute top-0 end-0 m-1 rounded-circle" style="width: 24px; height: 24px;" title="{{ get_phrase('Delete Banner') }}">
                                                <i class="fas fa-trash-alt" style="font-size: 10px;"></i>
                                            </a>
                                        </div>
                                    @endif
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
        function delete_gallery_image(deleteUrl, elementId) {
            if (confirm("{{ get_phrase('Are you sure you want to delete this image from product gallery?') }}")) {
                $.ajax({
                    type: "GET",
                    url: deleteUrl,
                    success: function(response) {
                        $('#' + elementId).fadeOut(300, function() { $(this).remove(); });
                        if(typeof success === 'function') {
                            success("{{ get_phrase('Image deleted successfully') }}");
                        }
                    },
                    error: function() {
                        $('#' + elementId).fadeOut(300, function() { $(this).remove(); });
                    }
                });
            }
        }

        function delete_banner_image(deleteUrl, elementId) {
            if (confirm("{{ get_phrase('Are you sure you want to delete this product banner image?') }}")) {
                $.ajax({
                    type: "GET",
                    url: deleteUrl,
                    success: function(response) {
                        $('#' + elementId).fadeOut(300, function() { $(this).remove(); });
                    },
                    error: function() {
                        $('#' + elementId).fadeOut(300, function() { $(this).remove(); });
                    }
                });
            }
        }

        @php
            $type_selects = [];
            foreach (App\Models\Attribute_type::has('attributes')->get() as $type) {
                $typeName = strtolower($type->name ?? '');
                $typeSlug = strtolower($type->slug ?? '');
                $isColor = ($typeSlug == 'color' || $typeSlug == 'colour' || str_contains($typeName, 'color') || str_contains($typeName, 'colour'));
                if (!$isColor) continue;

                $options_html = '<option value="">No ' . $type->name . '</option>';
                $attributes_list = [];
                foreach ($type->attributes as $attr) {
                    $options_html .= '<option value="' . $attr->id . '">' . $attr->name . '</option>';
                    $attributes_list[] = [
                        'id' => $attr->id,
                        'name' => $attr->name
                    ];
                }
                $type_selects[] = [
                    'name' => $type->name,
                    'id' => $type->id,
                    'options' => $options_html,
                    'attributes' => $attributes_list
                ];
            }
            $type_selects_json = json_encode($type_selects);
        @endphp

        let accumulatedEditFiles = [];

        function getCheckedColors() {
            const checkedCheckboxes = document.querySelectorAll('input[name^="product_attributes[3]"]:checked');
            return Array.from(checkedCheckboxes).map(cb => {
                const name = cb.getAttribute('name');
                const match = name.match(/product_attributes\[3\]\[(\d+)\]/);
                return match ? match[1] : null;
            }).filter(id => id !== null);
        }

        function previewGalleryImages(input, containerId, isFromUserSelect = false) {
            const container = document.getElementById(containerId);
            if (!container) return;

            if (isFromUserSelect && input.files && input.files.length > 0) {
                Array.from(input.files).forEach(file => {
                    const isDuplicate = accumulatedEditFiles.some(f => f.name === file.name && f.size === file.size);
                    if (!isDuplicate) {
                        accumulatedEditFiles.push(file);
                    }
                });
            }

            container.innerHTML = '';

            const dataTransfer = new DataTransfer();
            accumulatedEditFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            input.files = dataTransfer.files;

            const typeSelects = {!! $type_selects_json !!};
            const checkedColors = getCheckedColors();

            accumulatedEditFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'position-relative border rounded p-2 shadow-sm d-flex flex-column align-items-center bg-white';
                    div.style.width = '140px';
                    div.style.minHeight = '180px';

                    let selectsHtml = '';
                    typeSelects.forEach(type => {
                        let optionsHtml = type.options;
                        
                        let matchedColorId = null;
                        if (type.id == 3 && file && file.name) {
                            const filename = file.name.toLowerCase();
                            for (const opt of type.attributes) {
                                const colorName = opt.name.toLowerCase();
                                if (filename.includes(colorName)) {
                                    matchedColorId = opt.id;
                                    break;
                                }
                                const parts = colorName.split(/[\s-_]+/);
                                for (const part of parts) {
                                    if (part.length > 2 && filename.includes(part)) {
                                        matchedColorId = opt.id;
                                        break;
                                    }
                                }
                                if (matchedColorId) break;
                            }
                        }

                        if (type.id == 3 && !matchedColorId && checkedColors.length > 0) {
                            matchedColorId = checkedColors[index % checkedColors.length];
                        }

                        if (matchedColorId) {
                            optionsHtml = optionsHtml.replace('value="' + matchedColorId + '"', 'value="' + matchedColorId + '" selected');
                        }
                        
                        selectsHtml += `
                            <div class="w-100 mt-1">
                                <label class="form-label mb-0" style="font-size: 9px; font-weight: 600; color: #475569;">${type.name}:</label>
                                <select name="new_image_attributes[${index}][${type.id}]" class="form-select form-select-sm py-0" style="font-size: 10px; height: 24px; padding: 2px 5px; border-radius: 4px;">
                                    ${optionsHtml}
                                </select>
                            </div>
                        `;
                    });

                    div.innerHTML = `
                        <div style="width: 120px; height: 120px;" class="position-relative">
                            <img src="${e.target.result}" class="w-100 h-100 rounded object-fit-cover">
                            <span class="badge bg-dark position-absolute top-0 start-0 m-1" style="font-size: 10px;">New ${index + 1}</span>
                            <a href="javascript:void(0);" onclick="removeAccumulatedEditFile(${index}, '${input.id}', '${containerId}')" class="btn btn-danger btn-sm p-0 d-flex align-items-center justify-content-center position-absolute top-0 end-0 m-1 rounded-circle" style="width: 24px; height: 24px;" title="Remove Image">
                                <i class="fas fa-trash-alt" style="font-size: 10px;"></i>
                            </a>
                        </div>
                        ${selectsHtml}
                    `;
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeAccumulatedEditFile(index, inputId, containerId) {
            accumulatedEditFiles.splice(index, 1);
            const input = document.getElementById(inputId);
            previewGalleryImages(input, containerId, false);
        }

        $(document).ready(function() {
            $('#category_id').on('change', function() {
                const catId = $(this).val() || '';
                
                // Reload attributes dropdown list
                load_view("{{ route('view', ['path' => 'admin.product.attributes_dropdown_list']) }}?category_id=" + catId, "#attributes_dropdown_list");
                
                // Reload each appended attribute value checkboxes list with the new category ID
                $('.appended-attributes > div').each(function() {
                    const idAttr = $(this).attr('id');
                    const typeId = idAttr.replace('attribute_type_', '');
                    load_view("{{ route('view', ['path' => 'admin.product.attribute_value_inputs']) }}?attribute_type_id=" + typeId + "&category_id=" + catId, "#" + idAttr + " .attribute-value-inputs");
                });
            });
        });

        function appendAttribute(attribute_name, attribute_type_id) {
            if ($('#attribute_type_' + attribute_type_id).length > 0) {
                return;
            }

            var attributeElem =
                `<div class="border-top" id="attribute_type_${attribute_type_id}">
                    <input type="hidden" name="visible_attribute_types[]" value="${attribute_type_id}">
                    <div class="mb-3">
                        <div class="d-flex align-items-center py-3">
                            <label for="extra_cost" class="form-label ol-form-label mb-0">${attribute_name}</label>
                            <button type="button" class="btn ol-btn-danger btn-icon ms-auto" onclick="$('#attribute_type_${attribute_type_id}').remove();" data-bs-toggle="tooltip" title="{{ get_phrase('Remove') }}"><i class="fi-rr-minus-small"></i></button>
                        </div>
                    </div>
                    <div class="mb-3 attribute-value-inputs"></div>
                </div>`;

            $('.appended-attributes').append(attributeElem);

            const catId = $('#category_id').val() || '';
            load_view("{{ route('view', ['path' => 'admin.product.attribute_value_inputs']) }}?attribute_type_id=" + attribute_type_id + "&category_id=" + catId, "#attribute_type_" + attribute_type_id + " .attribute-value-inputs");
        }
    </script>
@endpush
