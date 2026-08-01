@php
    $order_statuses = DB::table('order_statuses')->orderBy('sort')->get(); 
@endphp
<div class="row">
    <div class="col-12">
        <div id="section-list" class="list-group d-grid gap-2 border-0 mb-3">
            @foreach ($order_statuses as $key => $order_status)
                <div class="list-group-item rounded-3 py-2 px-2 border-1 draggable-item hover-parent d-flex" id="{{ $order_status->id }}">
                    {{ $order_status->name }} <span class="ms-auto"><i class="fi-rr-apps-sort text-muted ps-2 border-start me-2 mt-1 hover-show cursor-move"></i></span>
                </div>
            @endforeach
        </div>
        <button class="btn ol-btn-primary" onclick="sort()">{{ get_phrase('Save Changes') }}</button>
    </div> <!-- end col -->
</div>

<script>
    'use strict';

    $(function() {
        $("#section-list").sortable({
            axis: "y"
        });
    });

    function sort() {
        var containerArray = ['section-list'];
        var itemArray = [];
        var itemJSON;

        
        for (var i = 0; i < containerArray.length; i++) {
            $('#' + containerArray[i]).each(function() {
                $(this).find('.draggable-item').each(function() {
                    itemArray.push(this.id);
                });
            });
        }

        itemJSON = JSON.stringify(itemArray);

        // console.log(itemJSON);
        $.ajax({
            url: "{{ route('admin.order.status_sort') }}",
            type: 'POST',
            data: {
                itemJSON: itemJSON,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            success: function(response) {
                location.reload();
            }
        });
    }
</script>
