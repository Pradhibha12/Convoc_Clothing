@extends('layouts.admin')
@push('title', get_phrase('Customer Add'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
              

                <a href="{{ route('admin.customers') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.customer.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Customer Name') }}</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter customer name') }}" aria-label="{{ get_phrase('Enter customer name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label ol-form-label">{{ get_phrase('Account Email') }}</label>
                            <input type="text" value="{{ old('email') }}" name="email" class="form-control ol-form-control" id="email" placeholder="{{ get_phrase('Enter customer email') }}" aria-label="{{ get_phrase('Enter customer email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label ol-form-label">{{ get_phrase('Account Password') }}</label>
                            <input type="text" value="{{ old('password') }}" name="password" class="form-control ol-form-control" id="password" placeholder="{{ get_phrase('Enter customer password') }}" aria-label="{{ get_phrase('Enter customer password') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label ol-form-label">{{ get_phrase('Customer Phone') }}</label>
                            <input type="text" value="{{ old('phone') }}" name="phone" class="form-control ol-form-control" id="phone" placeholder="{{ get_phrase('Enter customer phone') }}" aria-label="{{ get_phrase('Enter customer phone') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label ol-form-label">{{ get_phrase('Address') }} <small class="text-muted">({{ get_phrase('optional') }})</small></label>
                            <textarea name="address" rows="4" class="form-control ol-form-control" id="address" placeholder="{{ get_phrase('Write short address') }}">{{ old('address') }}</textarea>
                        </div>

                        <!-- Country -->
                        <div class="mb-3">
                            <label for="country_id" class="form-label ol-form-label">{{ get_phrase('Country') }}</label>
                            <select name="country_id" class="ol-select2" onchange="load_view('{{ route('view', ['path' => 'admin.customer.state_selector_by_country']) }}?country_id='+$(this).val(), '#states_of_selected_country');">
                                @foreach (App\Models\Country::get() as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="states_of_selected_country" class="mb-3">
                            <label for="state_id" class="form-label ol-form-label">{{ get_phrase('State') }}</label>
                            <select class="ol-select2" name="state_id" id="state_id">
                                <option value="">{{ get_phrase('Select a country first') }}</option>
                            </select>
                        </div>

                        <div id="cities_of_selected_state" class="mb-3">
                            <label for="city_id" class="form-label ol-form-label">{{ get_phrase('City') }}</label>
                            <select class="ol-select2" name="city_id" data-minimum-results-for-search="Infinity">
                                <option value="">{{ get_phrase('Select a state first') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="zip" class="form-label ol-form-label">{{ get_phrase('Zip Code') }}</label>
                            <input type="text" value="{{ old('zip') }}" name="zip" class="form-control ol-form-control" id="zip" placeholder="{{ get_phrase('Enter customer zip code') }}" aria-label="{{ get_phrase('Enter customer zip code') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label ol-form-label">{{ get_phrase('Photo') }}</label>
                            <input type="file" name="photo" class="form-control ol-form-control" id="photo" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label ol-form-label">{{ get_phrase('Date of Birth') }}</label>
                            <input type="date" value="{{ old('date_of_birth') }}" name="date_of_birth" class="form-control ol-form-control" id="date_of_birth" placeholder="{{ get_phrase('Enter date of birth') }}" aria-label="{{ get_phrase('Enter date of birth') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="col-sm-2 form-label ol-form-label">{{ get_phrase('Gender') }}</label>
                            <div class="eRadios">
                                <div class="form-check">
                                    <input type="radio" value="male" name="gender" class="form-check-input eRadioSuccess" id="gender_male">
                                    <label for="gender_male" class="form-check-label">{{get_phrase('Male')}}</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" value="female" name="gender" class="form-check-input eRadioPrimary" id="gender_female">
                                    <label for="gender_female" class="form-check-label">{{get_phrase('Female')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label for="email_verified_at" class="form-label ol-form-label"> {{get_phrase('Email Verifed')}} </label>
                        <div class="form-check">
                                <input class="form-check-input" name="email_verified_at" type="checkbox" value="1" id="email_verified_at">
                                <label class="form-check-label" for="email_verified_at"> {{get_phrase('Mark As Verified')}} </label>
                            </div>
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
