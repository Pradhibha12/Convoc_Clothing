@php
    $shipping_address = App\Models\Shipping_address::where('id', $id)->firstOrNew();
    $selected_city = $shipping_address->city;
    $selected_state = $shipping_address->state;
    $selected_country = $shipping_address->country;
@endphp
<form action="{{ route('customer.shipping_address.update', ['id' => $id]) }}" method="post">
    @csrf
    <input name="return_route" value="{{$return_route ?? ''}}" type="hidden">
    
    <div class="edit-account-inputs">
        <div class="minput-wrap mb-16 ">
            <label for="title" class="form-label">{{ get_phrase('Enter a title') }}</label>
            <input name="title" id="title" value="{{ $shipping_address->title }}" type="text" class="form-control mform-control" placeholder="{{ get_phrase('Title') }}" required>
        </div>

        <!-- Country -->
        <div class="mb-16">
            <label for="countries3" class="form-label">{{ get_phrase('Select your country') }}</label>
            <select id="countries3" name="country_code" class="form-select select2-no-search" onchange="load_view('{{ route('view', ['path' => 'frontend.shipping_addresses.state_selector_by_country']) }}?country_code='+$(this).val(), '#states_of_selected_country');" required>
                @foreach (App\Models\Country::get() as $country)
                    <option value="{{ $country->code }}" @if ($selected_country->id == $country->id) selected @endif>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-16">
            <div class="col-md-6">
                <label for="state_id" class="form-label">{{ get_phrase('Select your state') }}</label>
                <div id="states_of_selected_country">
                    <select id="state_id" class="form-select select2-no-search" name="state_id" data-minimum-results-for-search="Infinity" required>
                        @foreach ($selected_country->states as $state)
                            <option value="{{ $state->id }}" @if ($selected_state->id == $state->id) selected @endif>{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="city_id" class="form-label">{{ get_phrase('Select your city') }}</label>
                <div id="cities_of_selected_state">
                    <select id="city_id" class="form-select select2-no-search" name="city_id" data-minimum-results-for-search="Infinity" required>
                        @foreach ($selected_state->cities as $city)
                            <option value="{{ $city->id }}" @if ($selected_city->id == $city->id) selected @endif>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="minput-wrap mb-16">
            <label for="zip_code" class="form-label">{{ get_phrase('Enter your zip code') }}</label>
            <input name="zip_code" id="zip_code" value="{{$shipping_address->zip_code}}" type="text" class="form-control mform-control zip-code-lookup-trigger" placeholder="{{ get_phrase('Zip code') }}" required>
        </div>

        <div class="mb-16">
            <label for="address" class="form-label">{{ get_phrase('Enter your full address') }}</label>
            <textarea name="address" class="form-control mform-control" id="address" rows="4" placeholder="{{ get_phrase('Address') }}" required>{{$shipping_address->address}}</textarea>
        </div>

        <button type="submit" class="theme-btn1 theme-btn-hover">{{ get_phrase('Update') }}</button>
    </div>
</form>

<script>
    'use strict';
    $('select.select2-no-search:not(".inited")').select2({
        dropdownParent: $('#ajaxModal')
    });
</script>
