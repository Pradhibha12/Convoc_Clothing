@extends('layouts.admin')
@push('title', get_phrase('Brand Edit'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
              

                <a href="{{ route('admin.brands') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.brand.update', ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Brand name') }}</label>
                            <input type="text" value="{{ $brand->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter brand name') }}" aria-label="{{ get_phrase('Enter brand name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Description') }}</label>
                            <textarea name="description" rows="4" class="form-control ol-form-control" id="description" placeholder="{{ get_phrase('Write description') }}">{{ $brand->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label ol-form-label">{{ get_phrase('Logo') }}</label>
                            <input type="file" name="logo" class="form-control ol-form-control" id="logo" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="official_website_link" class="form-label ol-form-label">{{ get_phrase('Official website link') }}</label>
                            <input type="link" value="{{ $brand->link }}" name="official_website_link" class="form-control ol-form-control" id="official_website_link" placeholder="{{ get_phrase('Enter official website link') }}" aria-label="{{ get_phrase('Enter official website link') }}">
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
