<div class="row justify-content-between">
    <div class="col-md-12">
        <h6 class="text-dark text-14px mb-1">
            {{ get_phrase('Select payment gateway') }}
        </h6>
    </div>
    
    {{-- @php $payment_gateways = \App\Models\Payment_gateway::where('status', 1)->get(); @endphp --}}
    @foreach ($payment_gateways as $key => $payment_gateway)
        <div class="col-auto">
            <div class="payment-gateway-selector ms-auto me-auto" onclick="handlePaymentGateway(this, '{{ $payment_gateway->identifier }}')">
                <img width="80px" src="{{ asset('assets/payment/' . $payment_gateway->identifier . '.png') }}" alt="">
                <i class="fi-br-badge-check text-18px"></i>
            </div>
        </div>
    @endforeach
</div>

<div class="row my-4 justify-content-between">
    <div class="col-md-12" id="paymentForm"></div>
</div>


<script>
    function handlePaymentGateway(elem, identifier) {
        $('.payment-gateway-selector').removeClass('selected');
        $(elem).addClass('selected');

        $('#paymentForm > *').addClass('d-none');

        if ($('#' + identifier + 'Form').length == 0) {
            $('#paymentForm').append('<div id="' + identifier + 'Form"></div>');
        } else {
            $('#' + identifier + 'Form').removeClass('d-none');
        }

        load_view("{{ route('view', ['path' => 'payment']) }}." + identifier + ".index", '#paymentForm #' + identifier + 'Form', true);
    }
</script>
