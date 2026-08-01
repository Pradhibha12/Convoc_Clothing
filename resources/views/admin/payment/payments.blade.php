@extends('layouts.admin')
@push('title', get_phrase('Payment history'))
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
                        <button class="dropdown-header btn ol-btn-light"> 
                            {{ get_phrase('Export') }} 
                            <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Payment-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
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
                     <form id="filter-dropdown" action="{{ route('admin.payments') }}" method="get" class="position-relative">
                       <div class="filter-option d-flex  gap-3">
                           <div class="filter-option d-flex align-items-center  gap-3">
                            <div>
                                <input type="text" name="created_at" value="{{ request('created_at') }}" placeholder="{{ get_phrase('Select a date') }}" class="ol-form-control form-control daterangepickers position-relative" />
                            </div>

                                <div class="filterOption">
                                    <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="status" data-placeholder="Type to search...">
                                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>{{ get_phrase('All') }}</option>
                                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>{{ get_phrase('Paid') }}</option>
                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ get_phrase('Pending') }}</option>
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
                        <a href="{{ route('admin.payments') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
               
            </div>

            @if ($counted = $payments->count() > 0)
                
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Order ID') }}</th>
                                <th scope="col">{{ get_phrase('Total amount') }}</th>
                                <th scope="col">{{ get_phrase('Payment status') }}</th>
                                <th scope="col">{{ get_phrase('Payment method') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key => $payment)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        @php
                                            $order_ids = json_decode($payment->order_id, true) ?? [];
                                            $order_ids = array_map(function($id) {
                                                return '#' . ($id + 100);
                                            }, $order_ids);
                                        @endphp
                                        <h3 class="title text-14px">
                                            {{ implode(', ', $order_ids) }}
                                        </h3>
                                    </td>
                                    <td>
                                        <span class="fw-600"> {{currency($payment->total_amount) }}</span>
                                    </td>
                                    <td>
                                        @if ($payment->status == 'paid')
                                            <span class="badge bg-success">{{ get_phrase('Paid') }}</span>
                                        @elseif($payment->status == 'pending')
                                            <span class="badge bg-warning">{{ get_phrase('Pending') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ get_phrase('Unpaid') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-dark text-uppercase">{{ $payment->payment_method }}</span>
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.payment.invoice', ['id' => $payment->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Invoice') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-print"></i></a>
                                            <a href="javascript:;" onclick="confirmModal('{{ route('admin.payment.delete', ['id' => $payment->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center gr-15 flex-wrap">
                    <p class="admin-tInfo">
                        {{ get_phrase('Showing') . ' ' . count($payments) . ' ' . get_phrase('of') . ' ' . $payments->total() . ' ' . get_phrase('data') }}
                    </p>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $payments->links() }}
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
