@php 

$payment_gateway = \App\Models\Payment_gateway::where('identifier', 'offline')->firstOrNew();
$payment_details = session('payment_details');

$amount = $payment_details['payable_amount']; 

@endphp


@php
    $payment_keys = json_decode($payment_gateway->keys, true);
    $bank_information = '';

    if ($payment_keys != '') {
        if ($payment_gateway->status == 1) {
            $bank_information = $payment_keys['bank_information'];

            if ($bank_information == '') {
                $msg = get_phrase("This payment gateway isn't configured.");
            }
        } else {
            $msg = get_phrase('Admin denied transaction through this gateway.');
        }
    } else {
        $msg = get_phrase("This payment gateway isn't configured.");
    }
@endphp

<div class="row my-5">
    <div class="col-md-12 text-start">
        {{ $bank_information }}
    </div>
</div>
<form action="{{ route('payment.success', $payment_gateway->identifier) }}" method="post" enctype="multipart/form-data">@csrf
    <div class="mb-3">
        <label for="" class="form-label d-flex justify-content-between">
            <span>{{ get_phrase('Payment Document') }}</span>
            <span>{{ get_phrase('(jpg, pdf, txt, png, docx)') }}</span>
        </label>
        <div class="fpb7 mb-2">
            <label class="form-label ol-form-label text-start" for="bank_no">{{ get_phrase('Bank no.') }}</label>
            <input class="form-control ol-form-control" type="number" id="bank_no" name="bank_no" placeholder="{{ get_phrase('Bank no.') }}" required>
        </div>
        <div class="fpb7 mb-2">
            <label class="form-label ol-form-label" for="phone_no">{{ get_phrase('Phone no.') }}</label>
            <input class="form-control ol-form-control" type="number" id="phone_no" name="phone_no" placeholder="{{ get_phrase('Phone no.') }}" required>
        </div>
        <div class="fpd7 mb-2">
            <label class="form-label ol-form-label" for="doc">{{ get_phrase('Document') }}</label>
            <input type="file" name="doc" class="form-control" required>
        </div>

    </div>

    <div class="text-end">
        <input type="submit" class="btn-payment btn py-2 px-3" value="{{ get_phrase('Pay offline') }}">
    </div>
</form>

<script>
    "use strict";

    initiatePlugins();
</script>
