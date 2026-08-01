@extends('layouts.admin')
@push('title', get_phrase('Event Add'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                

                <a href="{{ route('admin.events') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-7">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label ol-form-label">{{ get_phrase('Event title') }}</label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter event title') }}" aria-label="{{ get_phrase('Enter event title') }}" required>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="discount_type" class="form-label ol-form-label">{{ get_phrase('Discount type') }}</label>
                            <select class="ol-select2" name="discount_type" id="discount_type">
                                <option value="flat">{{ get_phrase('Flat') }}</option>
                                <option value="percentage">{{ get_phrase('Percentage') }}</option>
                            </select>
                        </div> --}}

                        {{-- <div class="mb-3">
                            <label for="discount_value" class="form-label ol-form-label">{{ get_phrase('Amount of discount') }}</label>
                            <input type="number" min="0" step="0.01" value="{{ old('discount_value') }}" name="discount_value" class="form-control ol-form-control" id="discount_value" placeholder="{{ get_phrase('Enter amount of discount') }}" aria-label="{{ get_phrase('Enter amount of discount') }}" required>
                        </div> --}}

                        <div class="mb-3 pb-5">
                            <label for="event_period" class="form-label ol-form-label">{{ get_phrase('Event Period') }}</label>
                            <div class="position-relative position-relative">
                                <input type="text" value="{{ old('event_period') }}" name="event_period" class="form-control ol-form-control daterangepicker w-100" id="event_period" placeholder="{{ get_phrase('Select date range of discount period') }}" aria-label="{{ get_phrase('Select date range of discount period') }}" required>
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="usage_limit" class="form-label ol-form-label">{{ get_phrase('Maximum number of usage') }}</label>
                            <input type="number" min="0" step="0.01" value="{{ old('usage_limit') }}" name="usage_limit" class="form-control ol-form-control" id="usage_limit" placeholder="{{ get_phrase('Maximum number of usage') }}" aria-label="{{ get_phrase('Maximum number of usage') }}" required>
                        </div> --}}

                        <div class="mb-3">
                            <label for="status" class="form-label ol-form-label">{{ get_phrase('Status') }}</label>
                            <select class="ol-select2" name="status" id="status">
                                <option value="0">{{ get_phrase('Inactive') }}</option>
                                <option value="1">{{ get_phrase('Active') }}</option>
                            </select>
                        </div>
                        @php 
                           $products = \App\Models\Product::where('status', 1)->get(); 
                        @endphp
                        <div class="mb-3">
                            <label for="products" class="form-label ol-form-label">{{ get_phrase('Events Products') }}</label>
                            <select class="ol-select2" name="product_id[]" id="products" multiple>
                                <option value="">{{ get_phrase('Select a Product') }}</option>
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label ol-form-label">{{ get_phrase('Short summary') }}</label>
                            <textarea name="summary" rows="4" class="form-control ol-form-control" id="summary" placeholder="{{ get_phrase('Write short summary') }}">{{ old('summary') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Description') }}</label>
                            <textarea name="description" rows="4" class="form-control ol-form-control text_editor" id="description" placeholder="{{ get_phrase('Write description') }}">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}</label>
                            <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="banner" class="form-label ol-form-label">{{ get_phrase('Banner') }}</label>
                            <input type="file" name="banner" class="form-control ol-form-control" id="banner" accept="image/*">
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
