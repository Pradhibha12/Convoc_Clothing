@extends('layouts.admin')
@push('title', get_phrase('Edit shipping zone'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
             
                <a href="{{ route('admin.shipping_zones') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.shipping_zone.update', ['id' => $shipping_zone->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Zone name') }}</label>
                            <input type="text" value="{{ $shipping_zone->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter a name') }}" aria-label="{{ get_phrase('Enter a name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="country_id" class="form-label ol-form-label">{{ get_phrase('Select countries') }}</label>

                            @php
                                $selected_countries = $shipping_zone->regions->pluck('country_id')->toArray();
                            @endphp

                            <select name="country_ids[]" class="ol-select2" required multiple>
                                <option value="">{{ get_phrase('Select a country') }}</option>
                                @foreach (App\Models\Country::get() as $country)
                                    <option value="{{ $country->id }}" @if(in_array($country->id, $selected_countries)) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Description') }}</label>
                            <textarea name="description" class="form-control ol-form-control" id="description" placeholder="{{ get_phrase('Enter description') }}" aria-label="{{ get_phrase('Enter description') }}">{{ $shipping_zone->description }}</textarea>
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
