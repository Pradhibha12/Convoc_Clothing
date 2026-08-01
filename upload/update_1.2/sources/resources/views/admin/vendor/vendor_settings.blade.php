@extends('layouts.admin')
@push('title', get_phrase('Revenue Settings'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-4 px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Revenue settings') }}
                </h4>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-6">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form action="{{ route('admin.vendor.settings.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="vendor_revenue">{{ get_phrase('Vendor revenue percentage') }}</label>
                            <div class="input-group">
                                <input type="number" name = "vendor_revenue" id = "vendor_revenue" class="form-control ol-form-control"
                                    onkeyup="calculateAdminRevenue(this.value)" min="0" max="100" value="{{ $vendor_revenue->description ?? '' }}">
                                <div class="input-group-append">
                                    <span class="input-group-text ol-form-control">%</span>
                                </div>
                            </div>
                        </div> 
                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="admin_revenue">{{ get_phrase('Admin revenue percentage') }}</label>
                            <div class="input-group">
                                <input type="number" name = "admin_revenue" id = "admin_revenue" class="form-control ol-form-control" value="0" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text ol-form-control">%</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn ol-btn-primary mt-3">{{ get_phrase('Update settings') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <h5 class="mb-3 title fs-16px">{{ get_phrase('Revenue Settings Information') }}</h5>
                    <p class="text-muted">
                        {{ get_phrase('The remaining percentage will automatically be considered as the admin’s commission for managing the platform, services, and transactions.') }}
                    </p>
                    <p class="text-muted mb-0">
                        {{ get_phrase('These settings will be applied to all future orders.') }}
                    </p>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('js')
    <script type="text/javascript">
        "use strict";

        $(document).ready(function() {
            var vendor_revenue = $('#vendor_revenue').val();
            calculateAdminRevenue(vendor_revenue);
        });

        function calculateAdminRevenue(vendor_revenue) {
            if (vendor_revenue <= 100) {
                var admin_revenue = 100 - vendor_revenue;
                $('#admin_revenue').val(admin_revenue);
            } else {
                $('#admin_revenue').val(0);
            }
        }
    </script>
@endpush
