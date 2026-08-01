@php
    $return_details = \App\Models\Order_return::find($id);
@endphp

@if($return_details)
<div class="ol-card p-2">
    <div class="ol-card-body">
        <form action="{{ route('admin.order.return.refund', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label ol-form-label">{{ get_phrase('Refund By') }} - </label>
                <div class="eRadios d-flex align-items-center">
                    <div class="form-check">
                        <input type="radio" value="offline" name="refund_by" class="form-check-input eRadioSuccess" id="refund_by_offline" required checked>
                        <label for="refund_by_offline" class="form-check-label">{{ get_phrase('Offline') }}</label>
                    </div>

                    @if($return_details->order->payment_method == 'stripe' || $return_details->order->payment_method == 'paypal')
                        <div class="form-check ms-3">
                            <input type="radio" value="online" name="refund_by" class="form-check-input eRadioPrimary" id="refund_by_online" required>
                            <label for="refund_by_online" class="form-check-label">{{ get_phrase('Online') }}</label>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Online Info --}}
            <div id="online_info" class="mb-3 d-none">
                <div class="border p-3 rounded bg-light">
                    <p><strong>{{ get_phrase('Order ID') }}:</strong> {{ $return_details->order->id }}</p>
                    <p><strong>{{ get_phrase('Total Items') }}:</strong> {{ $return_details->order->order_items->sum('quantity') }}</p>
                    <p><strong>{{ get_phrase('Total Amount') }}:</strong> {{ $return_details->order->currency_code }} {{ $return_details->order->grand_total }}</p>
                    <p><strong>{{ get_phrase('Payment Method') }}:</strong> {{ ucfirst($return_details->order->payment_method) }}</p>
                </div>
            </div>

            {{-- Offline Proof Image --}}
            <div id="offline_image" class="mb-3">
                <label for="image" class="form-label ol-form-label">
                    {{ get_phrase('Proof of payment') }} <small>({{ get_phrase('Upload only image for offline payment') }})</small>
                </label>
                <input type="file" name="image" class="form-control ol-form-control" id="image" accept="image/*">
            </div>

            <div class="input-group mb-5">
                <button type="submit" class="btn ol-btn-primary">{{ get_phrase('Submit') }}</button>
            </div>
        </form>
    </div>
</div>
@endif

<script>
    "use strict";

    function toggleRefundDetails() {
        const onlineRadio = document.getElementById('refund_by_online');
        const offlineRadio = document.getElementById('refund_by_offline');

        const isOnline = onlineRadio && onlineRadio.checked;
        const isOffline = offlineRadio && offlineRadio.checked;

        // Show/hide based on selection
        if (isOnline) {
            document.getElementById('online_info')?.classList.remove('d-none');
            document.getElementById('offline_image')?.classList.add('d-none');
        } else if (isOffline) {
            document.getElementById('online_info')?.classList.add('d-none');
            document.getElementById('offline_image')?.classList.remove('d-none');
        } else {
            // Fallback (show both if logic fails)
            document.getElementById('online_info')?.classList.remove('d-none');
            document.getElementById('offline_image')?.classList.remove('d-none');
        }
    }

    document.querySelectorAll('input[name="refund_by"]').forEach(radio => {
        radio.addEventListener('change', toggleRefundDetails);
    });

    // Trigger toggle on page load
    toggleRefundDetails();

    $('.ol-select2').select2({
        dropdownParent: $("#ajaxModal")
    });
</script>

