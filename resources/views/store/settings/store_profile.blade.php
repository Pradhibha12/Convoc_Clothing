@extends('layouts.vendor')
@push('title', get_phrase('Store Profile Settings'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')


    <div class="row">
        <div class="col-md-7">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form action="{{ route('vendor.profile.update', ['id' => $store->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Store name') }}</label>
                            <input type="text" value="{{ $store->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter store name') }}" aria-label="{{ get_phrase('Enter store name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label ol-form-label">{{ get_phrase('Store phone') }}</label>
                            <input type="text" value="{{ $store->phone }}" name="phone" class="form-control ol-form-control" id="phone" placeholder="{{ get_phrase('Enter store phone') }}" aria-label="{{ get_phrase('Enter store phone') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label ol-form-label">{{ get_phrase('Store address') }}</label>
                            <input type="text" value="{{ $store->address }}" name="address" class="form-control ol-form-control" id="address" placeholder="{{ get_phrase('Enter store address') }}" aria-label="{{ get_phrase('Enter store address') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label ol-form-label">{{ get_phrase('City') }}</label>
                            <input type="text" value="{{ $store->city }}" name="city" class="form-control ol-form-control" id="city" placeholder="{{ get_phrase('Enter name city') }}" aria-label="{{ get_phrase('Enter name city') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label ol-form-label">{{ get_phrase('State') }}</label>
                            <input type="text" value="{{ $store->state }}" name="state" class="form-control ol-form-control" id="state" placeholder="{{ get_phrase('Enter name state') }}" aria-label="{{ get_phrase('Enter name state') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="zip" class="form-label ol-form-label">{{ get_phrase('Zip Code') }}</label>
                            <input type="text" value="{{ $store->zip }}" name="zip" class="form-control ol-form-control" id="zip" placeholder="{{ get_phrase('Enter zip code') }}" aria-label="{{ get_phrase('Enter zip code') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label ol-form-label">{{ get_phrase('Country') }}</label>
                            <input type="text" value="{{ $store->country }}" name="country" class="form-control ol-form-control" id="country" placeholder="{{ get_phrase('Enter country name') }}" aria-label="{{ get_phrase('Enter country name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label ol-form-label">{{ get_phrase('Map Location') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">{{get_phrase('Latitude')}}</span>
                                <input type="text" value="{{ $store->latitude }}" name="latitude" class="ol-form-control form-control" placeholder="{{get_phrase('Enter latitude')}}" aria-label="{{get_phrase('Enter latitude')}}">
                                <span class="input-group-text">{{get_phrase('Longitude')}}</span>
                                <input type="text" value="{{ $store->longitude }}" name="longitude" class="ol-form-control form-control" placeholder="{{get_phrase('Enter longitude')}}" aria-label="{{get_phrase('Enter longitude')}}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Store content') }}</label>
                            <textarea name="description" rows="4" class="form-control ol-form-control" id="description" placeholder="{{ get_phrase('Write description') }}">{{ $store->description }}</textarea>
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
