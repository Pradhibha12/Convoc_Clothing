@extends('layouts.admin')
@push('title', get_phrase('Shipping carrier edit'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                

                <a href="{{ route('admin.shipping_carriers') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.shipping_carrier.update', ['id' => $shipping_carrier->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label ol-form-label">{{ get_phrase('Brand name') }}</label>
                            <input type="text" value="{{ $shipping_carrier->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{ get_phrase('Enter shipping carrier name') }}" aria-label="{{ get_phrase('Enter shipping carrier name') }}" required>
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
