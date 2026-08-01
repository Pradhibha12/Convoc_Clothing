@php
    $payment_gateway = \App\Models\Payment_gateway::where('identifier', 'stripe')->firstOrNew();
    $payment_details = session('payment_details');
    $payment_keys = json_decode($payment_gateway->keys, true);
    if ($payment_gateway->test_mode == 1) {
        $key = $payment_keys['secret_key'];
    } else {
        $key = $payment_keys['secret_live_key'];
    }

@endphp

<a href="{{ route('payment.create', $payment_gateway->identifier) }}" class="btn-payment btn py-2 px-3">{{ get_phrase('Pay by Stripe') }}</a>
