@extends('layouts.admin')
@push('title', get_phrase('Offline Payment'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        
        <div class="ol-card-body p-3 mb-5">
            <div class="row  mb-4">
                <div class="col-md-6 d-flex align-items-center gap-3">
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> {{ get_phrase('Export') }} <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Offline-payment-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>
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
                                        <span >{{ $payment->currency_code }} {{ $payment->total_amount }}</span>
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
                                        @php
                                            $payment_details = json_decode($payment->payment_details);
                                        @endphp
                                        {{ get_phrase('Bank No.') }}: {{ $payment_details->bank_no ?? 'N/A' }}<br>
                                        {{ get_phrase('Phone No.') }}: {{ $payment_details->phone_no ?? 'N/A' }}<br>
                                        {{ get_phrase('Document') }}: 
                                        @if (isset($payment_details->file_path))
                                            <a href="javascript:;" onclick="ajaxModal('{{ route('view', ['path' => 'admin.payment.view_doc', 'doc' => $payment_details->file_path]) }}', '{{ get_phrase('Proof of payment') }}', 'modal-lg')" data-bs-toggle="tooltip" title="{{ get_phrase('View proof') }}" class="btn btn-light btn-icon m-1">
                                                <i class="fi fi-rr-picture"></i>
                                            </a>
                                        @else
                                            {{ get_phrase('No Document Provided') }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            @if($payment->status == 'pending' || $payment->status == 'unpaid')
                                                <a href="javascript:;" onclick="confirmModal('{{ route('admin.payment.offline_status', ['id' => $payment->id, 'status' => 'paid']) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Approve') }}" class="btn btn-success-light btn-icon m-1"><i class="fi-rr-check"></i></a>
                                            @endif
                                            @if($payment->status == 'pending')
                                                <a href="javascript:;" onclick="confirmModal('{{ route('admin.payment.offline_status', ['id' => $payment->id, 'status' => 'unpaid']) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Reject') }}" class="btn btn-danger-light btn-icon m-1"><i class="fi-rr-cross"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endpush
