@extends('layouts.admin')
@push('title', get_phrase('Store Add'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
             

                <a href="{{ route('admin.stores') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.store.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Store name') }}</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter store name') }}" aria-label="{{ get_phrase('Enter store name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label ol-form-label">{{ get_phrase('Store owner') }}</label>
                            <select class="ol-select2" name="user_id" id="user_id">
                                <option value="">{{ get_phrase('Select store owner') }}</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label ol-form-label">{{ get_phrase('Store phone') }}</label>
                            <input type="text" value="{{ old('phone') }}" name="phone" class="form-control ol-form-control" id="phone" placeholder="{{ get_phrase('Enter store phone') }}" aria-label="{{ get_phrase('Enter store phone') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label ol-form-label">{{ get_phrase('Store address') }}</label>
                            <input type="text" value="{{ old('address') }}" name="address" class="form-control ol-form-control" id="address" placeholder="{{ get_phrase('Enter store address') }}" aria-label="{{ get_phrase('Enter store address') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label ol-form-label">{{ get_phrase('City') }}</label>
                            <input type="text" value="{{ old('city') }}" name="city" class="form-control ol-form-control" id="city" placeholder="{{ get_phrase('Enter name city') }}" aria-label="{{ get_phrase('Enter name city') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label ol-form-label">{{ get_phrase('State') }}</label>
                            <input type="text" value="{{ old('state') }}" name="state" class="form-control ol-form-control" id="state" placeholder="{{ get_phrase('Enter name state') }}" aria-label="{{ get_phrase('Enter name state') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="zip" class="form-label ol-form-label">{{ get_phrase('Zip Code') }}</label>
                            <input type="text" value="{{ old('zip') }}" name="zip" class="form-control ol-form-control" id="zip" placeholder="{{ get_phrase('Enter zip code') }}" aria-label="{{ get_phrase('Enter zip code') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label ol-form-label">{{ get_phrase('Country') }}</label>
                            <input type="text" value="{{ old('country') }}" name="country" class="form-control ol-form-control" id="country" placeholder="{{ get_phrase('Enter country name') }}" aria-label="{{ get_phrase('Enter country name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label ol-form-label">{{ get_phrase('Map Location') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">{{get_phrase('Latitude')}}</span>
                                <input type="text" value="{{ old('longitude') }}" name="latitude" class="ol-form-control form-control" placeholder="{{get_phrase('Enter latitude')}}" aria-label="{{get_phrase('Enter latitude')}}">
                                <span class="input-group-text">{{get_phrase('Longitude')}}</span>
                                <input type="text" value="{{ old('longitude') }}" name="longitude" class="ol-form-control form-control" placeholder="{{get_phrase('Enter longitude')}}" aria-label="{{get_phrase('Enter longitude')}}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Store content') }}</label>
                            <textarea name="description" rows="4" class="form-control ol-form-control" id="description" placeholder="{{ get_phrase('Write description') }}">{{ old('description') }}</textarea>
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
