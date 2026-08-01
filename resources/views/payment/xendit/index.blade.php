@php
    $payment_details = session('payment_details');
    $payment_gateway = DB::table('payment_gateways')->where('identifier', 'xendit')->first();

    // user information
    $user = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();
@endphp

<a href="{{ route('payment.create', $payment_gateway->identifier) }}" class="btn-payment btn py-2 px-3">{{ get_phrase('Pay by Xendit') }}</a>
