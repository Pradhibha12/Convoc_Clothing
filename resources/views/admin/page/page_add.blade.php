@extends('layouts.admin')
@push('title', get_phrase('Page add'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Page add') }}
                </h4>

                <a href="{{ route('admin.pages') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.page.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label ol-form-label">{{ get_phrase('Page title') }}</label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter page title') }}" aria-label="{{ get_phrase('Enter page title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label ol-form-label">{{ get_phrase('Page content') }}</label>
                            <textarea name="content" rows="4" class="form-control ol-form-control text_editor" id="content" placeholder="{{ get_phrase('Write your page content') }}">{{ old('content') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label ol-form-label">{{ get_phrase('Status') }}</label>
                            <select class="ol-select2" name="status" id="status">
                                <option value="0" @if (old('status') == 0) selected @endif>{{ get_phrase('Inactive') }}</option>
                                <option value="1" @if (old('status') == 1) selected @endif>{{ get_phrase('Active') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">{{ get_phrase('Page link') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="page_link2">{{ url('page') }}/</span>
                                <input type="text" class="form-control" name="slug" id="slug" aria-describedby="page_link2 page_link3">
                            </div>
                            <div class="form-text" id="page_link3">{{ get_phrase('Enter the page link, which you want to appear in the url section') }}</div>
                        </div>

                        <div class="mb-3">
                            <label for="button_placement" class="form-label ol-form-label">{{ get_phrase('Button Placement') }}</label>
                            <select class="ol-select2" name="button_placement" id="button_placement">
                                <option value="footer" @if (old('button_placement') == 0) selected @endif>{{ get_phrase('Footer') }}</option>
                                <option value="header" @if (old('button_placement') == 1) selected @endif>{{ get_phrase('Header') }}</option>
                            </select>
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
