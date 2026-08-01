@php
    if(isset($user_id)){
        $customer = App\Models\User::where('id', $user_id)->firstOrNew();
    }else{
        $customer = new App\Models\User();
    }
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <input type="text" value="{{$customer->name}}" class="form-control ol-form-control" placeholder="{{ get_phrase('Enter customer full name') }}" id="user_name" readonly>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <input type="text" value="{{$customer->phone}}" class="form-control ol-form-control" placeholder="{{ get_phrase('Enter customer phone number') }}" id="user_phone" readonly>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <textarea class="form-control ol-form-control" placeholder="{{get_phrase('Customer address')}}" rows="6" readonly>{{$customer->address}}</textarea>
        </div>
    </div>
</div>