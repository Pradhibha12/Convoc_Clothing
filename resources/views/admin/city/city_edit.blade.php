@extends('layouts.admin')
@push('title', get_phrase('City Edit'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
              

                <a href="{{ route('admin.cities') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.city.update', ['id' => $city->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('City name') }}</label>
                            <input type="text" value="{{ $city->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter city name') }}" aria-label="{{ get_phrase('Enter city name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="country_id" class="form-label ol-form-label">{{ get_phrase('Country') }}</label>
                            <select class="ol-select2" name="country_id" id="country_id" onchange="load_view('{{route('view', ['path' => 'admin.city.state_selector_by_country'])}}?country_id='+$(this).val(), '#states_of_selected_country');">
                                <option value="">{{ get_phrase('Select a country') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" @if($city->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3" id="states_of_selected_country">
                            <label for="state_id" class="form-label ol-form-label">{{ get_phrase('State') }}</label>
                            <select class="ol-select2" name="state_id" id="state_id">
                                <option value="">{{ get_phrase('Select a state') }}</option>
                                @foreach (App\Models\State::where('country_id', $city->country_id)->get() as $state)
                                    <option value="{{$state->id}}" @if($city->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                @endforeach
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
