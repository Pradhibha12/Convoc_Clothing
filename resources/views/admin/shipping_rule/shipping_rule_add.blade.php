@extends('layouts.admin')
@push('title', get_phrase('Add shipping rule'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
              

                <a href="{{ route('admin.shipping_rules') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-7">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form action="{{ route('admin.shipping_rule.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="shipping_zone_id" class="form-label ol-form-label">{{ get_phrase('Select shipping zone') }}</label>
                            <select name="shipping_zone_id" id="shipping_zone_id" class="ol-select2" required>
                                <option value="">{{ get_phrase('Select a shipping zone') }}</option>
                                @foreach (App\Models\Shipping_zone::get() as $shipping_zone)
                                    <option value="{{ $shipping_zone->id }}" @if(old('shipping_zone_id') == $shipping_zone->id) selected @endif>{{ $shipping_zone->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="min_weight" class="form-label ol-form-label">{{ get_phrase('Min weight') }} ({{get_phrase('kg')}})</label>
                            <input type="number" value="{{ old('min_weight') }}" name="min_weight" class="form-control ol-form-control" id="min_weight" placeholder="{{ get_phrase('Enter min weight') }}" aria-label="{{ get_phrase('Enter min weight') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="max_weight" class="form-label ol-form-label">{{ get_phrase('Max weight') }} ({{get_phrase('kg')}})</label>
                            <input type="number" value="{{ old('max_weight') }}" name="max_weight" class="form-control ol-form-control" id="max_weight" placeholder="{{ get_phrase('Enter max weight') }}" aria-label="{{ get_phrase('Enter max weight') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="min_price" class="form-label ol-form-label">{{ get_phrase('Min price') }}</label>
                            <input type="number" value="{{ old('min_price') }}" name="min_price" class="form-control ol-form-control" id="min_price" placeholder="{{ get_phrase('Enter min price') }}" aria-label="{{ get_phrase('Enter min price') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="max_price" class="form-label ol-form-label">{{ get_phrase('Max price') }}</label>
                            <input type="number" value="{{ old('max_price') }}" name="max_price" class="form-control ol-form-control" id="max_price" placeholder="{{ get_phrase('Enter max price') }}" aria-label="{{ get_phrase('Enter max price') }}" required>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="cost_type" class="form-label ol-form-label">{{ get_phrase('Cost type') }}</label>
                            <select name="cost_type" id="cost_type" class="ol-select2" required>
                                <option value="flat" @if(old('cost_type') == 'flat') selected @endif>{{ get_phrase('Flat') }}</option>
                                <option value="percentage" @if(old('cost_type') == 'percentage') selected @endif>{{ get_phrase('Percentage') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="cost" class="form-label ol-form-label">{{ get_phrase('Enter shipping cost') }}({{currency()}})</label>
                            <input type="number" value="{{ old('cost') }}" name="cost" class="form-control ol-form-control" id="cost" placeholder="{{ get_phrase('Enter shipping cost') }}" aria-label="{{ get_phrase('Enter shipping cost') }}" required>
                        </div>


                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
