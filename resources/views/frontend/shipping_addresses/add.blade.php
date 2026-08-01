<form class="added shipping" action="{{ route('customer.shipping_address.store') }}" method="post">
    @csrf

    <input name="return_route" value="{{$return_route ?? ''}}" type="hidden">

    <div class="edit-account-inputs">
        <div class="minput-wrap mb-16 ">
            <label for="title" class="form-label text-dark text-16px">{{ get_phrase('Enter a title') }}</label>
            <input name="title" id="title" value="" type="text" class="form-control mform-control" placeholder="{{ get_phrase('Title') }}" required>
        </div>

        <!-- Country -->
        <div class="mb-16">
            <label for="countries3" class="form-label text-dark text-16px mt-2">{{ get_phrase('Select your country') }}</label>
            <select id="countries3" name="country_code" class="form-select select2-no-search mform-control " onchange="load_view('{{ route('view', ['path' => 'frontend.shipping_addresses.state_selector_by_country']) }}?country_code='+$(this).val(), '#states_of_selected_country');" required>
                @foreach (App\Models\Country::get() as $country)
                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-16">
            <div class="col-md-6">
                <label for="state_id" class="form-label text-dark text-16px mt-2">{{ get_phrase('Select your state') }}</label>
                <div id="states_of_selected_country">
                    <select id="state_id" class="form-select select2-no-search mform-control" name="state_id" data-minimum-results-for-search="Infinity" required>
                        <option value="">{{get_phrase('Select country first')}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="city_id" class="form-label text-dark text-16px mt-2">{{ get_phrase('Select your city') }}</label>
                <div id="cities_of_selected_state">
                    <select id="city_id" class="form-select select2-no-search mform-control" name="city_id" data-minimum-results-for-search="Infinity" required>
                        <option value="">{{get_phrase('Select state first')}}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="minput-wrap mb-16">
            <label for="zip_code" class="form-label text-dark text-16px mt-2">{{ get_phrase('Enter your zip code') }}</label>
            <input name="zip_code" id="zip_code" value="" type="text" class="form-control mform-control zip-code-lookup-trigger" placeholder="{{ get_phrase('Zip code') }}" required>
        </div>

        <div class="mb-16">
            <label for="address" class="form-label text-dark text-16px mt-2">{{ get_phrase('Enter your full address') }}</label>
            <textarea name="address" class="form-control mform-control" id="address" rows="4" placeholder="{{ get_phrase('Address') }}" required></textarea>
        </div>

        <button type="submit" class="theme-btn1 fsh-btn-dark mt-2">{{ get_phrase('Add') }}</button>
    </div>
</form>

<script>
    'use strict';
    $('select.select2-no-search:not(".inited")').select2({
        dropdownParent: $('#ajaxModal')
    });
</script>
