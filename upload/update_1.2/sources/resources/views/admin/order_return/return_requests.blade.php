@extends('layouts.admin')
@push('title', get_phrase('Return Request List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        <div class="ol-card-body p-3 mb-5">
            
            <div class="row mb-4">
                <div class="col-md-8 d-flex align-items-center gap-3">
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> {{ get_phrase('Export') }} <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Return-request-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>
                    {{--  --}}
                    <style>
                        .filterOption .select2-selection {
                            width: 140px;
                        }
                    </style>
                     <form id="filter-dropdown" action="{{ route('admin.order.return_requests') }}" method="get" class="position-relative">
                       <div class="filter-option d-flex  gap-3">
                           <div class="filter-option d-flex align-items-center  gap-3">
                            <div>
                                
                                <input type="text" name="created_at" value="{{ request('created_at') }}" placeholder="{{ get_phrase('Select a date') }}" class="ol-form-control form-control daterangepickers position-relative" />
                            </div>

                                <div class="filterOption">
                                    
                                    <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="status" data-placeholder="Type to search...">
                                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>{{ get_phrase('All') }}</option>
                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ get_phrase('Pending') }}</option>
                                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>{{ get_phrase('Approved') }}</option>
                                        <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>{{ get_phrase('Canceled') }}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="filter-button d-flex justify-content-end align-items-center">
                                <button type="submit" class="ol-btn-primary">{{ get_phrase('Filter') }}</button>
                            </div>

                       </div>
                    </form>
                    {{--  --}}
                    @if (isset($_GET) && count($_GET) > 0)
                        <a href="{{ route('admin.order.return_requests') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
            </div>

            @if ($counted = $return_requests->count() > 0)
                <div class="table-responsive">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">#{{ get_phrase('Order ID') }}</th>
                                <th scope="col">{{ get_phrase('Item QTY') }}</th>
                                <th scope="col">{{ get_phrase('Customer') }}</th>
                                <th scope="col">{{ get_phrase('Order amount') }}</th>
                                <th scope="col">{{ get_phrase('Status') }}</th>
                                <th scope="col">{{ get_phrase('Payment method') }}</th>
                                <th scope="col">{{ get_phrase('Date') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($return_requests as $key => $request)
                                <tr>
                                    <td>
                                       #{{ $key + 1 }}
                                    </td>
                                    <td>
                                        #{{ $request->order_id + 100 }}
                                    </td>
                                    <td>
                                        @php
                                            $totalItems = $request->order->order_items->sum('quantity');
                                        @endphp
                                        <p>{{ $totalItems }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center min-w-200px">
                                            <img class="image-40" width="40" height="40" src="{{ get_image($request->order->customer->photo) }}">
                                            <div class="ms-2 mt-1">
                                                <h4 class="title fs-14px">{{ $request->order->customer->name }}</h4>

                                                <a class="btn btn-light btn-icon m-1" href="tel:{{ $request->order->customer->phone }}" data-bs-toggle="tooltip" title="{{ get_phrase('Phone') }}">
                                                    <i class="fi-rr-phone-plus"></i>
                                                </a>

                                                <a class="btn btn-light btn-icon m-1" href="mailto:{{ $request->order->customer->email }}" data-bs-toggle="tooltip" title="{{ get_phrase('Email') }}">
                                                    <i class="fi-rr-envelope"></i>
                                                </a>

                                                @php
                                                    $addressParts = [];
                                                @endphp

                                                @if ($request->order->shipping_address)
                                                    @php

                                                        // Check each field and add it if available
                                                        if ($request->order->shipping_address->zip_code) {
                                                            $addressParts[] = $request->order->shipping_address->zip_code;
                                                        }
                                                        if (isset($request->order->shipping_address->city->name)) {
                                                            $addressParts[] = $request->order->shipping_address->city->name;
                                                        }
                                                        if (isset($request->order->shipping_address->state->name)) {
                                                            $addressParts[] = $request->order->shipping_address->state->name;
                                                        }
                                                        if (isset($request->order->shipping_address->country->name)) {
                                                            $addressParts[] = $request->order->shipping_address->country->name;
                                                        }

                                                        // Combine available fields into a full address
                                                        $fullAddress = implode(', ', $addressParts);
                                                    @endphp
                                                @endif

                                                @if (!empty($addressParts))
                                                    <a class="btn btn-light btn-icon m-1" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($fullAddress) }}" target="_blank"  data-bs-toggle="tooltip" title="{{ get_phrase('View on Map') }}">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td width="200px">
                                        <p> {{ currency($request->order->grand_total) }}</p>
                                    </td>
                                    <td>
                                        @if($request->status == 'pending')
                                            <span class="badge bg-warning text-uppercase">{{ $request->status }}</span>
                                        @elseif($request->status == 'approved')
                                            <span class="badge bg-success text-uppercase">{{ $request->status }}</span>
                                        @else
                                            <span class="badge bg-danger text-uppercase">{{ $request->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-dark text-uppercase">{{ $request->refund_by }}</span>
                                    </td>
                                     <td>
                                        <span class=" text-uppercase">
                                            {{ $request->created_at->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td class="print-d-none">
                                        <a href="{{ route('admin.order.return_details', ['id' => $request->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('View details') }}" class="btn btn-info btn-icon m-1"><i class="fi-rr-money-check"></i></a>
                                        @if($request->status == 'pending')
                                            <a href="javascript:;" onclick="ajaxModal('{{ route('view', ['path' => 'admin.order_return.refund_modal', 'id' => $request->id]) }}', '{{ get_phrase('Refund order amount') }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Approve Refund') }}" class="btn btn-success-light btn-icon m-1"><i class="fi-rr-check"></i></a>
                                            <a href="javascript:;" onclick="confirmModal('{{ route('admin.order.return.cancel', ['id' => $request->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Cancel') }}" class="btn btn-danger-light btn-icon m-1"><i class="fi-rr-cross"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $return_requests->links() }}
                    </div>
                @endif
            @else
                @include('admin.data_not_found')
            @endif
        </div>
    </div>
@endsection
@push('js')

<script>
     'use strict';
$(function() {
  $('.daterangepickers').daterangepicker({
    opens: 'left',
    ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    locale: {
      format: 'YYYY-MM-DD'
    }
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});


</script>
@endpush
