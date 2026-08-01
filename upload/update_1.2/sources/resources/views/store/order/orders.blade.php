@extends('layouts.vendor')
@push('title', get_phrase('Order List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4 mt-3">
                <div class="col-md-9 d-flex flex-wrap align-items-center gap-3">
                    <div class="custom-dropdown">
                        <button class="dropdown-header btn ol-btn-light"> 
                            {{ get_phrase('Export') }} 
                            <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'order-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>

                  <style>
                        .filterOption .select2-selection {
                            width: 140px;
                        }
                    </style>

                            <form id="filter-dropdown" action="{{ route('vendor.orders') }}" method="get">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <div class="filter-option d-flex flex-wrap  gap-3">
                                        <div class="filter-option d-flex align-items-center flex-wrap gap-3">
                                            <div>
                                               
                                                <input type="text" name="created_at" value="{{ request('created_at') }}" placeholder="{{ get_phrase('Select a date') }}" class="ol-form-control form-control daterangepickers position-relative" />
                                            </div>

                                                <div class="filterOption">
                                                  
                                                    <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="status" data-placeholder="Type to search...">
                                                        <option value="all">{{ get_phrase('All') }}</option>

                                                        @foreach (App\Models\Order_status::orderBy('name', 'asc')->get() as $status)
                                                            <option value="{{ $status->identifier }}" @if (request('status') == $status->identifier) selected @endif>
                                                                {{ $status->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> 

                                            </div>
                                            <div class="filter-button d-flex justify-content-end align-items-center">
                                                <button type="submit" class="ol-btn-primary">{{ get_phrase('Filter') }}</button>
                                            </div>

                                    </div>
                                   
                                </form>

                    @if (isset($_GET) && count($_GET) > 0)
                        <a href="{{ route('vendor.orders') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <form action="{{ route('vendor.orders') }}" method="get">

                        @php
                            $queries = request()->query();
                            unset($queries['search']);
                        @endphp
                        <div class="row">
                            <div class="col-lg-10 col-9">
                                <div class="search-input flex-grow-1">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search By Id Or  Name') }}" class="ol-form-control form-control" />
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <button type="submit" class="btn ol-btn-primary w-100" id="submit-button"><span class="fi-rr-search d-flex justify-content-center"></span></button>
                            </div>
                        </div>
                        @foreach ($queries as $key => $query)
                            <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                        @endforeach
                    </form>
                </div>
            </div>

            @if ($counted = $orders->count() > 0)
                
                <div class="table-responsive">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#{{ get_phrase('ID') }}</th>
                                <th scope="col">{{ get_phrase('Item QTY') }}</th>
                                <th scope="col">{{ get_phrase('Customer') }}</th>
                                <th scope="col">{{ get_phrase('Order status') }}</th>
                                <th scope="col">{{ get_phrase('Order amount') }}</th>
                                <th scope="col">{{ get_phrase('Order Date') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>
                                        #{{ $order->id + 100 }}
                                    </td>
                                    <td>
                                        @php
                                            $totalItems = $order->order_items->sum('quantity');
                                        @endphp
                                        <p>{{ $totalItems }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center min-w-200px">
                                            <img class="image-40" width="40" height="40" src="{{ get_image($order->customer->photo) }}">
                                            <div class="ms-2 mt-1">
                                                <h4 class="title fs-14px">{{ $order->customer->name }}</h4>

                                                <a class="btn btn-light btn-icon m-1" href="tel:{{ $order->customer->phone }}" data-bs-toggle="tooltip" title="{{ get_phrase('Phone') }}">
                                                    <i class="fi-rr-phone-plus"></i>
                                                </a>

                                                <a class="btn btn-light btn-icon m-1" href="mailto:{{ $order->customer->email }}" data-bs-toggle="tooltip" title="{{ get_phrase('Email') }}">
                                                    <i class="fi-rr-envelope"></i>
                                                </a>

                                                @php
                                                    $addressParts = [];
                                                @endphp

                                                @if ($order->shipping_address)
                                                    @php

                                                        // Check each field and add it if available
                                                        if ($order->shipping_address->zip_code) {
                                                            $addressParts[] = $order->shipping_address->zip_code;
                                                        }
                                                        if (isset($order->shipping_address->city->name)) {
                                                            $addressParts[] = $order->shipping_address->city->name;
                                                        }
                                                        if (isset($order->shipping_address->state->name)) {
                                                            $addressParts[] = $order->shipping_address->state->name;
                                                        }
                                                        if (isset($order->shipping_address->country->name)) {
                                                            $addressParts[] = $order->shipping_address->country->name;
                                                        }

                                                        // Combine available fields into a full address
                                                        $fullAddress = implode(', ', $addressParts);
                                                    @endphp
                                                @endif

                                                @if (!empty($addressParts))
                                                    <a class="btn btn-light btn-icon m-1" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($fullAddress) }}" target="_blank" title="{{ get_phrase('View on Map') }}">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                         @php
                                            $status = $order->order_updates()->latest()->first()?->order_status ?? (object)[
                                                'name'  => 'Pending',
                                                'color' => '#6c757d'
                                            ];
                                        @endphp
                                        
                                        <span class="badge text-uppercase"
                                            style="background-color: {{ $status->color }}30; color: {{ $status->color }};">
                                            {{ get_phrase($status->name) }}
                                        </span>
                                    </td>
                                    <td width="200px">
                                        <p>{{ currency($order->grand_total) }}</p>
                                        <span class="badge bg-dark text-uppercase">{{ $order->payment_method }}</span>
                                    </td>
                                    <td> 
                                        <span class=" text-uppercase">
                                            {{ $order->created_at->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td class="print-d-none">
                                        <a href="{{ route('vendor.order.details', ['id' => $order->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('View details') }}" class="btn btn-success-light btn-icon m-1"><i class="fi-rr-money-check"></i></a>
                                        <a href="javascript:;" onclick="confirmModal('{{ route('vendor.order.delete', ['id' => $order->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon m-1"><i class="fi-rr-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center gr-15 flex-wrap">
                    <p class="admin-tInfo">
                        {{ get_phrase('Showing') . ' ' . count($orders) . ' ' . get_phrase('of') . ' ' . $orders->total() . ' ' . get_phrase('data') }}
                    </p>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center mt-3 flex-wrap gr-15">
                        {{ $orders->links() }}
                    </div>
                @endif
            @else
                @include('store.data_not_found')
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

