@extends('layouts.vendor')
@push('title', get_phrase('Order Edit'))
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
                    {{ get_phrase('Order Edit') }}
                </h4>

                <a href="{{ route('vendor.orders') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('vendor.order.update', ['id' => $order->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label ol-form-label">{{ get_phrase('Order title') }}</label>
                            <input type="text" value="{{ $order->title }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter order title') }}" aria-label="{{ get_phrase('Enter order title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="discount_type" class="form-label ol-form-label">{{ get_phrase('Discount type') }}</label>
                            <select class="ol-select2" name="discount_type" id="discount_type">
                                <option value="flat" @if($order->discount_type == 'flat') selected @endif>{{ get_phrase('Flat') }}</option>
                                <option value="percentage" @if($order->discount_type == 'percentage') selected @endif>{{ get_phrase('Percentage') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="discount_value" class="form-label ol-form-label">{{ get_phrase('Amount of discount') }}</label>
                            <input type="number" min="0" step="0.01" value="{{ $order->discount_value }}" name="discount_value" class="form-control ol-form-control" id="discount_value" placeholder="{{ get_phrase('Enter amount of discount') }}" aria-label="{{ get_phrase('Enter amount of discount') }}" required>
                        </div>

                        <div class="mb-3 pb-5">
                            <label for="order_period" class="form-label ol-form-label">{{ get_phrase('Coupon Period') }}</label>
                            <div class="position-relative position-relative">
                                <input type="text" value="{{date('m/d/Y', strtotime($order->start_date))}} - {{date('m/d/Y', strtotime($order->end_date))}}" name="order_period" class="form-control ol-form-control daterangepicker w-100" id="order_period" placeholder="{{ get_phrase('Select date range of order period') }}" aria-label="{{ get_phrase('Select date range of order period') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="usage_limit" class="form-label ol-form-label">{{ get_phrase('Maximum number of usage') }}</label>
                            <input type="number" min="0" step="0.01" value="{{ $order->usage_limit }}" name="usage_limit" class="form-control ol-form-control" id="usage_limit" placeholder="{{ get_phrase('Maximum number of usage') }}" aria-label="{{ get_phrase('Maximum number of usage') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label ol-form-label">{{ get_phrase('Status') }}</label>
                            <select class="ol-select2" name="status" id="status">
                                <option value="0" @if($order->status == 0) selected @endif>{{ get_phrase('Inactive') }}</option>
                                <option value="1" @if($order->status == 1) selected @endif>{{ get_phrase('Active') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label ol-form-label">{{ get_phrase('Short summary') }}</label>
                            <textarea name="summary" rows="4" class="form-control ol-form-control" id="summary" placeholder="{{ get_phrase('Write short summary') }}">{{ $order->summary }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Description') }}</label>
                            <textarea name="description" rows="4" class="form-control ol-form-control text_editor" id="description" placeholder="{{ get_phrase('Write description') }}">{{ $order->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}</label>
                            <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="banner" class="form-label ol-form-label">{{ get_phrase('Banner') }}</label>
                            <input type="file" name="banner" class="form-control ol-form-control" id="banner" accept="image/*">
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
