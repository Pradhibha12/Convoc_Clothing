<select class="form-select select2-no-search" name="state_id" data-minimum-results-for-search="Infinity" onchange="load_view('{{ route('view', ['path' => 'frontend.profile.city_selector_by_state']) }}?state_id='+$(this).val(), '#cities_of_selected_state');">
    @php
        $country = App\Models\Country::where('code', $country_code)->firstOrNew();
        $firstState = App\Models\State::where('country_id', $country->id)->firstOrNew();
    @endphp

    @forelse (App\Models\State::where('country_id', $country->id)->get() as $state)
        <option value="{{ $state->id }}">{{ $state->name }}</option>
    @empty
        <option value="">{{ get_phrase('No states found') }}</option>
    @endforelse
</select>

<script>
    'use strict';

    load_view("{{ route('view', ['path' => 'frontend.profile.city_selector_by_state']) }}?state_id={{ $firstState->id }}", '#cities_of_selected_state');
    initScript();
</script>
