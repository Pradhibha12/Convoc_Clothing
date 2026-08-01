@php
    $payment_details = session('payment_details');
    $payment_gateway = DB::table('payment_gateways')->where('identifier', 'tazapay')->first();

    // user information
    $user = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();

    $countries = DB::table('countries')->get();
@endphp

<form action="{{ route('payment.create', $payment_gateway->identifier) }}" method="GET">
    @csrf
    <label class="mb-2" for="{{ $payment_gateway->identifier }}-country-code">{{ get_phrase('Select your country') }}</label>
    <select class="form-select ol-modal-select2 ol-select2 form-control ol-form-control" name="country_code" id="{{ $payment_gateway->identifier }}-country-code" required>
        @php
            $iso_country_codes = json_decode(get_settings('iso_country_codes'), true);
        @endphp
        @foreach ($countries as $country)
            <option value="{{ $country->code }}">{{ get_phrase($country->name) }}</option>
        @endforeach
    </select>
    <br>
    <button class="btn-payment btn py-2 px-3" type="submit">{{ get_phrase('Pay by Tazapay') }}</button>
</form>
