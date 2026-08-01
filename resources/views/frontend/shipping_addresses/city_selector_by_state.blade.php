<select class="form-select select2-no-search" name="city_id" data-minimum-results-for-search="Infinity" required>
    @forelse (App\Models\City::where('state_id', $state_id)->get() as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
    @empty
        <option value="">{{ get_phrase('No cities found') }}</option>
    @endforelse
</select>

<script>
    'use strict';
    $('select.select2-no-search:not(".inited")').select2({
        dropdownParent: $('#ajaxModal')
    });
</script>