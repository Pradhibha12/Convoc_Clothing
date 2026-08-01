@extends('layouts.admin')
@push('title', get_phrase('Add new attribute type'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
              

                <a href="{{ route('admin.attribute_types') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.attribute_type.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{get_phrase('Attribute Type')}}</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{get_phrase('Enter name of attribute type')}}" aria-label="{{get_phrase('Enter name of attribute type')}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="input_type" class="form-label ol-form-label">{{get_phrase('Input type')}}</label>
                            <select name="input_type" id="input_type" class="ol-select2">
                                <option value="text">{{get_phrase('Text (Radio / Button Selection e.g. Size)')}}</option>
                                <option value="color">{{get_phrase('Color (Color Picker)')}}</option>
                                <option value="custom_text">{{get_phrase('Customer Text Input Field (Required Customer Input Box e.g. Father\'s Name)')}}</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{get_phrase('Add')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
