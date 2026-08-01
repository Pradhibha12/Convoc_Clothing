@php
    $payment_gateway = \App\Models\Payment_gateway::where('identifier', 'pagseguro')->firstOrNew();
    $payment_details = session('payment_details');
@endphp

<a href="{{ route('payment.create', $payment_gateway->identifier) }}" class="btn-payment btn py-2 px-3">{{ get_phrase('Pay by Pagseguro') }}</a>
