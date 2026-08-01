@php
    $auth = Auth::user();
@endphp
<div class="card">
    <div class="card-body">
        <form action="{{ route('payment.create', 'cashfree') }}" method="GET">
            @csrf
            <div class="fpb7 mb-2">
                <label class="form-label ol-form-label">{{ get_phrase('Email') }}</label>
                <input class="form-control ol-form-control" name="customer_details[customer_email]" value="{{ $auth->email }}" readonly />
            </div>
            <div class="fpb7 mb-2">
                <label class="form-label ol-form-label">{{ get_phrase('Phone') }}</label>
                <input class="form-control ol-form-control" name="customer_details[customer_phone]" value="{{ $auth->phone }}" required />
            </div>
            <button class="btn-payment btn py-2 px-3" type="submit">{{ get_phrase('Pay by Cashfree') }}</button>
        </form>
    </div>
</div>
