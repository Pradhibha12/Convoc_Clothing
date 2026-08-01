<form action="{{ route('admin.product.store', ['action_type' => 'quick']) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="ol-card">
                <div class="pt-3">
                    <h5 class="title fs-14px ps-3">{{ get_phrase('Product Info') }}</h5>
                </div>
                <div class="ol-card-body p-3 mb-5">
                    <div class="mb-3">
                        <label for="title_1st" class="form-label ol-form-label">{{ get_phrase('Product title') }}</label>
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control ol-form-control" id="title_1st" placeholder="{{ get_phrase('Enter product title') }}" aria-label="{{ get_phrase('Enter product title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="price_1st" class="form-label ol-form-label">{{ get_phrase('Price') }} ({{ currency() }})</label>
                        <input type="number" min="0" step="0.01" value="{{ old('price') }}" name="price" class="form-control ol-form-control" id="price_1st" placeholder="{{ get_phrase('Enter product price') }}" aria-label="{{ get_phrase('Enter product price') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="store_ids" class="form-label ol-form-label">{{ get_phrase('Store') }}</label>
                        <select class="ol-select2" name="store_id" id="store_ids" required>
                            <option value="">{{ get_phrase('Select a store') }}</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="summary_1st" class="form-label ol-form-label">{{ get_phrase('Short summary') }}</label>
                        <textarea name="summary" rows="4" class="form-control ol-form-control" id="summary_1st" placeholder="{{ get_phrase('Write short summary') }}">{{ old('summary') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="description_1st" class="form-label ol-form-label">{{ get_phrase('Product description') }}</label>
                        <textarea name="description" rows="4" class="form-control ol-form-control text_editor" id="description_1st" placeholder="{{ get_phrase('Write description') }}">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status_active_1st" class="form-label ol-form-label">{{ get_phrase('Visibility') }} - </label>
                        <div class="eRadios d-flex align-items-center">
                            <div class="form-check">
                                <input type="radio" value="1" name="status" class="form-check-input eRadioSuccess" id="status_active_1st" required="" checked>
                                <label for="status_active_1st" class="form-check-label">{{ get_phrase('Active') }}</label>
                            </div>

                            <div class="form-check ms-3">
                                <input type="radio" value="0" name="status" class="form-check-input eRadioPrimary" id="status_inactive_1st" required="">
                                <label for="status_inactive_1st" class="form-check-label">{{ get_phrase('Draft') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ol-card">
                <div class="pt-3">
                    <h5 class="title fs-14px ps-3">{{ get_phrase('Category & Attributes') }}</h5>
                </div>
                <div class="ol-card-body p-3 mb-5">

                    <div class="mb-3">
                        <label for="category_id_1st" class="form-label ol-form-label">{{ get_phrase('Product category') }}</label>
                        <select class="ol-select2" name="category_id" id="category_id_1st" onchange="load_view('{{ route('view', ['path' => 'admin.product.attributes_dropdown_list']) }}?category_id='+$(this).val(), '#attributes_dropdown_list_1st'); $('.appended-attributes').html('');" required>
                            <option value="">{{ get_phrase('Select a category') }}</option>
                            @foreach ($product_categories as $product_category)
                                <optgroup label=" {{ $product_category->title }} ">
                                    <option value="{{ $product_category->id }}">{{ $product_category->title }}</option>
                                    @foreach ($product_category->childs as $sub_category)
                                        <option value="{{ $sub_category->id }}"> - {{ $sub_category->title }}</option>
                                        @foreach ($sub_category->childs as $sub_sub_category)
                                            <option value="{{ $sub_sub_category->id }}"> &nbsp;&nbsp;&nbsp;&nbsp;-- {{ $sub_sub_category->title }}</option>
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
                            <ul class="dropdown-menu" id="attributes_dropdown_list_1st">
                                <li><button class="dropdown-item" type="button">{{ get_phrase('Please select a category') }}</button></li>
                            </ul>
                        </div>
                    </div>

                    <div class="appended-attributes"></div>
                </div>
            </div>
        </div>
    </div>
</form>
