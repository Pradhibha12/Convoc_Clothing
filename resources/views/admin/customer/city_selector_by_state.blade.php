<label for="city_id" class="form-label ol-form-label">{{ get_phrase('City') }}</label>
<select class="ol-select2" name="city_id" id="city_id">
    <option value="">{{ get_phrase('Select a city') }}</option>
    @foreach (App\Models\City::where('state_id', $state_id)->get() as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
</select>

@include('admin.init')