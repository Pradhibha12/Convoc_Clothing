@php

    $identifier = 'skrill';

    $payment_details = session('payment_details');

    $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

    $user = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();
    $keys = json_decode($payment_gateway->keys, true);

    $skrill_merchant_email = $keys['skrill_merchant_email'];
    $secret_passphrase = $keys['secret_passphrase'];

    $test_mode = $payment_gateway->test_mode;

@endphp

<form method="POST" action="https://pay.skrill.com">
    @csrf
    <input type="hidden" name="pay_to_email" value="{{ $skrill_merchant_email }}">
    <input type="hidden" name="merchant_fields" value="customer_number">
    <input type="hidden" name="customer_number" value="{{ $user->id }}">
    <input type="hidden" name="firstname" value="{{ $user->name }}">
    <input type="hidden" name="lastname" value="unknown">
    <input type="hidden" name="recipient_description" value="{{ $skrill_merchant_email }}">
    {{-- <input type="hidden" name="status_url" value="{{ url('payment/skrill_ipn') }}"> --}}
    <input type="hidden" name="amount" value="{{ $payment_details['payable_amount'] }}">
    <input type="hidden" name="currency" value="{{ $payment_gateway->currency }}">
    <input type="hidden" name="transaction_id" value="{{ 'SKR_TXN_' . uniqid() }}">
    <input type="hidden" name="return_url" value="{{ $payment_details['success_url'] . '/' . $payment_gateway->identifier }}">
    <input type="hidden" name="cancel_url" value="{{ $payment_details['cancel_url'] }}">
    <button class="btn-payment btn py-2 px-3" type="submit">{{ get_phrase('Pay by Skrill') }}</button>
</form>
