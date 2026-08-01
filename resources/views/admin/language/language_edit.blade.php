@extends('layouts.admin')
@push('title', get_phrase('Language Edit'))
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
                    {{ get_phrase('Language Edit') }}
                </h4>

                <a href="{{ route('admin.languages') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.language.update', ['id' => $language->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Language name') }}</label>
                            <input type="text" value="{{ $language->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter language name') }}" aria-label="{{ get_phrase('Enter language name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="direction" class="form-label ol-form-label">{{ get_phrase('Language direction') }}</label>
                            <select class="ol-select2" name="direction" id="direction">
                                <option value="ltr" class="text-uppercase" @if($language->direction == 'ltr') selected @endif>{{ get_phrase('LTR') }}</option>
                                <option value="rtl" class="text-uppercase" @if($language->direction == 'rtl') selected @endif>{{ get_phrase('RTL') }}</option>
                            </select>
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
