@extends('layouts.admin')
@push('title', get_phrase('Coupon Add'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Coupon Add') }}
                </h4>

                <a href="{{ route('admin.coupons') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.coupon.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="code" class="form-label ol-form-label">{{ get_phrase('Coupon code') }}</label>
                            <input type="text" value="{{random(6)}}" name="code" class="form-control ol-form-control" id="code" placeholder="{{ get_phrase('Enter coupon code') }}" aria-label="{{ get_phrase('Enter coupon code') }}">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label ol-form-label">{{ get_phrase('Coupon title') }}</label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter coupon title') }}" aria-label="{{ get_phrase('Enter coupon title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label ol-form-label">{{ get_phrase('Coupon Availability') }}</label>
                            <select class="ol-select2" name="user_id" id="user_id">
                                <optgroup>
                                    <option value="">{{ get_phrase('Applicable for all customers') }}</option>
                                </optgroup>
                                <optgroup label=" -- {{get_phrase('Applicable for specific customer')}} -- ">
                                    @foreach ($customers as $customers)
                                        <option value="{{$customers->id}}">{{$customers->name}} ({{$customers->email}})</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="discount_type" class="form-label ol-form-label">{{ get_phrase('Discount Type') }}</label>
                            <select class="ol-select2" name="discount_type" id="discount_type">
                                <option value="flat">{{get_phrase('Flat')}}</option>
                                <option value="percentage">{{get_phrase('Percentage')}}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="discount_value" class="form-label ol-form-label">{{ get_phrase('Discount Value') }}</label>
                            <input type="number" min="0" step="0.01" value="{{ old('discount_value') }}" name="discount_value" class="form-control ol-form-control" id="discount_value" placeholder="{{ get_phrase('Enter discount value') }}" aria-label="{{ get_phrase('Enter discount value') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="minimum_order_amount" class="form-label ol-form-label">{{ get_phrase('Minimum order amount') }}</label>
                            <input type="number" min="0" step="0.01" value="{{ old('minimum_order_amount') }}" name="minimum_order_amount" class="form-control ol-form-control" id="minimum_order_amount" placeholder="{{ get_phrase('Enter minimum order amount') }}" aria-label="{{ get_phrase('Enter minimum order amount') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="maximum_discount_amount" class="form-label ol-form-label">{{ get_phrase('Maximum discount amount') }}</label>
                            <input type="number" min="0" step="0.01" value="{{ old('maximum_discount_amount') }}" name="maximum_discount_amount" class="form-control ol-form-control" id="maximum_discount_amount" placeholder="{{ get_phrase('Enter maximum discount amount') }}" aria-label="{{ get_phrase('Enter maximum discount amount') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="usage_limit" class="form-label ol-form-label">{{ get_phrase('Usage limit') }}</label>
                            <input type="number" min="0" value="{{ old('usage_limit') }}" name="usage_limit" class="form-control ol-form-control" id="usage_limit" placeholder="{{ get_phrase('Enter maximum usage limit') }}" aria-label="{{ get_phrase('Enter maximum usage limit') }}">
                            <small class="title fs-12px">{{get_phrase('Keep it blank to set it as unlimited')}}</small>
                        </div>

                        <div class="mb-3 pb-5">
                            <label for="coupon_period" class="form-label ol-form-label">{{ get_phrase('Coupon Period') }}</label>
                            <div class="position-relative position-relative">
                                <input type="text" value="{{ old('coupon_period') }}" name="coupon_period" class="form-control ol-form-control daterangepicker w-100" id="coupon_period" placeholder="{{ get_phrase('Select date range of coupon period') }}" aria-label="{{ get_phrase('Select date range of coupon period') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Short description') }}</label>
                            <textarea name="description" rows="4" class="form-control ol-form-control" id="description" placeholder="{{ get_phrase('Write description') }}">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}</label>
                            <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*">
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
