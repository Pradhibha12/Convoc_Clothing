@extends('layouts.admin')
@push('title', get_phrase('Manage profile'))
@push('meta')@endpush
@push('css')@endpush
@section('content')


    <div class="row">
        <div class="col-md-6">
            <div class="ol-card">
                <div class="ol-card-body p-3 mb-5">
                    <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Name') }}</label>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter your name') }}" aria-label="{{ get_phrase('Enter your name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label ol-form-label">{{ get_phrase('Email') }}</label>
                            <input type="text" value="{{ $user->email }}" name="email" class="form-control ol-form-control" id="email" placeholder="{{ get_phrase('Enter your email') }}" aria-label="{{ get_phrase('Enter your email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label ol-form-label">{{ get_phrase('Phone') }}</label>
                            <input type="text" value="{{ $user->phone }}" name="phone" class="form-control ol-form-control" id="phone" placeholder="{{ get_phrase('Enter phone number') }}" aria-label="{{ get_phrase('Enter phone number') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label ol-form-label">{{ get_phrase('Address') }}</label>
                            <textarea name="address" rows="4" class="form-control ol-form-control" id="address" placeholder="{{ get_phrase('Write address') }}">{{ $user->address }}</textarea>
                        </div>

                        @php
                            $selected_city = $user->city;
                            $selected_state = $selected_city->state;
                            $selected_country = $selected_state->country;
                        @endphp

                        <!-- Country -->
                        <div class="mb-3">
                            <label for="country_id" class="form-label ol-form-label">{{ get_phrase('Country') }}</label>
                            <select name="country_id" class="ol-select2" onchange="load_view('{{ route('view', ['path' => 'admin.customer.state_selector_by_country']) }}?country_id='+$(this).val(), '#states_of_selected_country');">
                                @foreach (App\Models\Country::get() as $country)
                                    <option value="{{ $country->id }}" @if ($selected_country->id == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="states_of_selected_country" class="mb-3">
                            <label for="state_id" class="form-label ol-form-label">{{ get_phrase('State') }}</label>
                            <select class="ol-select2" name="state_id" id="state_id">
                                @foreach ($selected_country->states as $state)
                                    <option value="{{ $state->id }}" @if ($selected_state->id == $state->id) selected @endif>{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="cities_of_selected_state" class="mb-3">
                            <label for="city_id" class="form-label ol-form-label">{{ get_phrase('City') }}</label>
                            <select class="ol-select2" name="city_id" data-minimum-results-for-search="Infinity">
                                @foreach ($selected_state->cities as $city)
                                    <option value="{{ $city->id }}" @if ($selected_city->id == $city->id) selected @endif>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="zip" class="form-label ol-form-label">{{ get_phrase('Zip Code') }}</label>
                            <input type="text" value="{{ $user->zip }}" name="zip" class="form-control ol-form-control" id="zip" placeholder="{{ get_phrase('Enter your zip code') }}" aria-label="{{ get_phrase('Enter your zip code') }}" required>
                        </div>

                        <div class="fpb7 mb-2">
                            <label class="form-label ol-form-label">{{ get_phrase('Photo') }}
                                <small>({{ get_phrase('The image size should be any square image') }})</small>
                            </label>
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <img class = "rounded-circle img-thumbnail image-50" src="{{ get_image($user->photo) }}">
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control ol-form-control" name="photo" id="user_image" onchange="changeTitleOfImageUploader(this.id)" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label ol-form-label">{{ get_phrase('Date of Birth') }}</label>
                           <input type="date"
                                value="{{ $user->date_of_birth ? date('Y-m-d', strtotime($user->date_of_birth)) : date('Y-m-d') }}"
                                name="date_of_birth"
                                class="form-control ol-form-control"
                                id="date_of_birth"
                                required>

                        </div>

                        <div class="mb-3">
                            <label for="gender" class="col-sm-2 col-form-label">{{ get_phrase('Gender') }}</label>
                            <div class="eRadios">
                                <div class="form-check">
                                    <input @if($user->gender == 'male') checked @endif type="radio" value="male" name="gender" class="form-check-input eRadioSuccess" id="gender_male">
                                    <label for="gender_male" class="form-check-label">{{get_phrase('Male')}}</label>
                                </div>

                                <div class="form-check">
                                    <input @if($user->gender == 'female') checked @endif type="radio" value="female" name="gender" class="form-check-input eRadioPrimary" id="gender_female">
                                    <label for="gender_female" class="form-check-label">{{get_phrase('Female')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Save Changes') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ol-card">
                <div class="ol-card-body p-3 mb-5">
                    <form action="{{ route('admin.profile_password.update') }}" method="post"> @csrf
                        <div class="fpb7 mb-2">
                            <label class="form-label ol-form-label">{{ get_phrase('Current password') }}</label>
                            <input type="password" class="form-control ol-form-control" name="current_password" required />
                        </div>
                        <div class="fpb7 mb-2">
                            <label class="form-label ol-form-label">{{ get_phrase('New password') }}</label>
                            <input type="password" class="form-control ol-form-control" name="new_password" required />
                        </div>
                        <div class="fpb7 mb-2">
                            <label class="form-label ol-form-label">{{ get_phrase('Confirm password') }}</label>
                            <input type="password" class="form-control ol-form-control" name="confirm_password" required />
                        </div>
                        <div class="fpb7 mb-2">
                            <button type="submit" class="ol-btn-primary">{{ get_phrase('Update password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
