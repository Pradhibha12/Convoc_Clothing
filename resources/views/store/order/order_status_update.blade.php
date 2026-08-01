<div class="ol-card p-2">
    <div class="ol-card-body">
        <form action="{{ route('vendor.order.timeline_update', ['id' => $id]) }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <label class="form-label ol-form-label">{{ get_phrase('Select a status') }}</label>
                <select class="ol-select2" name="order_status_id" id="order_status">
                    <option value="">{{ get_phrase('Select a status') }}</option>
                    @foreach (App\Models\Order_status::orderBy('sort')->get() as $order_status)
                        <option value="{{ $order_status->id }}">{{ $order_status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label ol-form-label">{{ get_phrase('Message') }}</label>
                <input type="text" name="message" class="form-control ol-form-control" placeholder="Type your message here if any...">
            </div>
            <div class="input-group mb-5">
                <button type="submit" class="btn ol-btn-primary">{{ get_phrase('Update') }}</button>
            </div>
        </form>
    </div>
</div>

<script>
    "use strict";

    $('.ol-select2').select2({
        dropdownParent: $("#ajaxModal")
    });
</script>
