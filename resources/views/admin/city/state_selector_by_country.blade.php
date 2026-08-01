<label for="state_id" class="form-label ol-form-label">{{ get_phrase('State') }}</label>
<select class="ol-select2" name="state_id" id="state_id">
    <option value="">{{ get_phrase('Select a state') }}</option>
    @foreach (App\Models\State::where('country_id', $country_id)->get() as $state)
        <option value="{{$state->id}}">{{$state->name}}</option>
    @endforeach
</select>

@include('admin.init')