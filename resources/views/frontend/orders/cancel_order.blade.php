<style>
    .h-138{
        min-height: 138px;
    }
</style>

<div class="ol-card p-2">
    <div class="ol-card-body">
        <form action="{{ route('customer.order.cancel_request', ['order_id' => $id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="order_id" class="form-label up-form-label mb-12px">{{ get_phrase('Order Id') }}</label>
                <input type="text" class="form-control up-form-control" id="order_id" name="order_id" value="{{ '#0000'.$id }}" readonly>
            </div>
            <div class="mb-4">
                <label for="message" class="form-label up-form-label mb-12px">{{ get_phrase('Message') }}</label>
                <textarea class="form-control up-form-control h-138" id="message" name="message" placeholder="Type your message..." spellcheck="false"></textarea>
            </div>
            <div class="mb-4">
                <label for="images" class="form-label up-form-label mb-12px">{{ get_phrase('Image') }}</label>
                <input class="form-control up-form-file" type="file" id="images" name="images[]" accept="image/*" multiple>
            </div>
            <div class="d-flex align-items-center justify-content-end flex-wrap gap-12px flex-wrap-reverse">
                <button type="button" class="btn up3-btn-outline-secondary" data-bs-dismiss="modal">{{ get_phrase('Cancel') }}</button>
                <button type="submit" class="btn up3-btn-dark">{{ get_phrase('Submit') }}</button>
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
