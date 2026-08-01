@extends('layouts.customer')
@push('title', 'My Profile')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
    <!-- Edit Profile Area Start -->
    <section>
        <div class="container">
            <div class="row mt-3 mb-100px">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.customer_navigation')
                </div>
                <div class="col-xl-9 col-lg-8">
                    <!-- Top Area -->
                    <div class="d-flex align-items-start justify-content-between gap-2 mb-20px">
                        <div class="d-flex justify-content-between align-items-start align-items-lg-center gap-12px flex-column flex-lg-row w-100">
                            <h1 class="in-title-16px text-white-color">{{ get_phrase('Edit Profile') }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb up-breadcrumb text-white-color">
                                  <li class="breadcrumb-item up-breadcrumb-item text-white-color"><a href="{{route('home') }}">{{ get_phrase('Home') }}</a></li>
                                  <li class="breadcrumb-item up-breadcrumb-item active" aria-current="page">{{ get_phrase('Edit Profile') }}</li>
                                </ol>
                            </nav>
                        </div>
                        <button class="btn up-icon-btn-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#up-sidebar-offcanvas" aria-controls="user-sidebar-offcanvas">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 5.25H3C2.59 5.25 2.25 4.91 2.25 4.5C2.25 4.09 2.59 3.75 3 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z" fill="#242D47"></path>
                                <path d="M21 10.25H3C2.59 10.25 2.25 9.91 2.25 9.5C2.25 9.09 2.59 8.75 3 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z" fill="#242D47"></path>
                                <path d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z" fill="#242D47"></path>
                                <path d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z" fill="#242D47"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Content Area -->
                    <div class="up-content-box">
                        <form action="{{ route('customer.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-30px">
                                <div class="row gx-12px gy-3 mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="user-name2" class="form-label up-form-label">{{ get_phrase('Name') }}</label>
                                            <input name="name" value="{{ auth()->user()->name }}" type="text" class="form-control up-form-control" placeholder="{{ get_phrase('Name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label for="user-email3" class="form-label up-form-label">{{ get_phrase('Email') }}</label>
                                            <input name="email" value="{{ auth()->user()->email }}" type="email" class="form-control up-form-control" placeholder="{{ get_phrase('Email address') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-12px gy-3 mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="user-name2" class="form-label up-form-label">{{ get_phrase('Phone') }}</label>
                                            <input name="phone" value="{{ auth()->user()->phone }}" type="text" class="form-control up-form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $selected_city = App\Models\User::where('id', auth()->id())->firstOrNew()->city;
                                    $selected_state = $selected_city->state;
                                    $selected_country = $selected_state->country;
                                @endphp

                                <div class="row gx-12px gy-3 mb-3">
                                    <div class="col-md-12">
                                        <label for="countries3" class="form-label up-form-label">{{get_phrase('Country')}}</label>
                                        <select id="countries3" name="country_code" class="form-control   up-form-control select2-no-search  up-nice-select " onchange="load_view('{{ route('view', ['path' => 'frontend.profile.state_selector_by_country']) }}?country_code='+$(this).val(), '#states_of_selected_country');">
                                            @foreach (App\Models\Country::get() as $country)
                                                <option value="{{ $country->code }}" @if ($selected_country->id == $country->id) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="states_of_selected_country">
                                            <label for="states" class="form-label up-form-label">{{get_phrase('States')}}</label>
                                            <select class="form-control   up-form-control select2-no-search  up-nice-select" name="state_id" onchange="load_view('{{ route('view', ['path' => 'frontend.profile.city_selector_by_state']) }}?state_id='+$(this).val(), '#cities_of_selected_state');" data-minimum-results-for-search="Infinity">
                                                @foreach ($selected_country->states as $state)
                                                    <option value="{{ $state->id }}" @if ($selected_state->id == $state->id) selected @endif>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="cities_of_selected_state">
                                            <label for="city" class="form-label up-form-label">{{get_phrase('City')}}</label>
                                            <select class="form-control   up-form-control select2-no-search  up-nice-select" name="city_id" data-minimum-results-for-search="Infinity">
                                                @foreach ($selected_state->cities as $city)
                                                    <option value="{{ $city->id }}" @if ($selected_city->id == $city->id) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-12px gy-3">
                                    <div class="col-md-12">
                                        <div>
                                            <label for="zip" class="form-label up-form-label">{{ get_phrase('Zip code') }}</label>
                                            <input name="zip" value="{{ auth()->user()->name }}" type="text" class="form-control up-form-control" placeholder="{{ get_phrase('Zip code') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label for="address" class="form-label up-form-label">{{ get_phrase('Address') }}</label>
                                            <textarea name="address" class="form-control up-form-label" id="address" rows="4" placeholder="{{ get_phrase('Address') }}">{{ auth()->user()->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-12px flex-wrap">
                                <button type="submit" class="btn up-btn-dark">{{ get_phrase('Save changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Edit Profile Area End -->
@endsection

@push('js')
@endpush
