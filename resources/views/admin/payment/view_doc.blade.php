<div class="ol-card p-2">
    <div class="ol-card-body">
        <img src="{{ asset($doc) }}" alt="document" width="100%">
    </div>
</div>

<script>
    "use strict";

    $('.ol-select2').select2({
        dropdownParent: $("#ajaxModal")
    });
</script>
