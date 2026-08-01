@extends('layouts.vendor')
@push('title', get_phrase('Payment history'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4 mt-3">
                <div class="col-md-6 d-flex align-items-center gap-3">
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

                    @if (isset($_GET) && count($_GET) > 0)
                        <a href="{{ route('vendor.payments') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <form action="{{ route('vendor.payments') }}" method="get">

                        @php
                            $queries = request()->query();
                            unset($queries['search']);
                        @endphp
                        <div class="row">
                              <div class="col-lg-3"></div>
                            <div class="col-lg-7 col-9">
                                <div class="search-input flex-grow-1">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search by order id') }}" class="ol-form-control form-control" />
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

        @if ($payments->isNotEmpty())
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
                                @php
                                    $order_ids = json_decode($payment->order_id, true) ?? [];
                                    // Use the attached filtered orders
                                    $orders = $payment->store_orders ?? collect();

                                    // Sum grand total of these orders
                                    $total_amount = $orders->sum('grand_total');
                                @endphp
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h3 class="title text-14px">
                                            @foreach ($orders as $order)
                                                #{{ $order->id + 100 }}@if(!$loop->last), @endif
                                            @endforeach
                                        </h3>
                                    </td>
                                    <td>
                                        <span class="fw-600">{{ $payment->currency_code }} {{ $total_amount }}</span>
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
                                            <a href="{{ route('vendor.payment.invoice', ['id' => $payment->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Invoice') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-print"></i></a>
                                            <a href="javascript:;" onclick="confirmModal('{{ route('vendor.payment.delete', ['id' => $payment->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
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
               
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $payments->links() }}
                    </div>
               
           @else
                @include('store.data_not_found')
            @endif
        </div>
    </div>
@endsection
@push('js')
@endpush
