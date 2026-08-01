@extends('layouts.admin')
@push('title', get_phrase('Order statuses'))
@push('meta')
@endpush
@push('css')
<style>
    .color-box {
        width: 50px;
        height: 20px;
        display: inline-block;
        border: 1px solid #000;
    }
</style>
@endpush
@section('content')

    <div class="ol-card">
        <div class="ol-card-body  pt-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                  <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> {{ get_phrase('Export') }} <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Status-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>

                <div class="row gap-1">
                    <a href="javascript:;" onclick="ajaxModal('{{ route('view', ['path' => 'admin.order_status.order_status_sort']) }}', '{{ get_phrase('Status Sorting') }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Status Sorting') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px me-2">
                        <span>{{ get_phrase('Sort Order Status') }}</span>
                    </a>

                    <a href="{{ route('admin.order.status_add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add New Order Status') }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="ol-card-body p-3 mb-5">
           

            @if ($counted = $statuses->count() > 0)
                <div class="table-responsive">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#{{ get_phrase('ID') }}</th>
                                <th scope="col">{{ get_phrase('Name') }}</th>
                                <th scope="col">{{ get_phrase('Color') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $key => $status)
                                <tr>
                                    <td>
                                        <b>#{{ $key + 1 }}</b>
                                    </td>
                                    <td>
                                        <p>{{ $status->name }}</p>
                                    </td>
                                    <td>
                                        <div class="color-box" style="background-color: {{ $status['color'] }}"></div>
                                    </td>
                                    <td class="print-d-none">
                                        <a href="{{ route('admin.order.status_edit', ['id' => $status->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon m-1"><i class="fi-rr-pencil"></i></a>
                                        <a href="javascript:;" onclick="confirmModal('{{ route('admin.order.status_delete', ['id' => $status->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon m-1"><i class="fi-rr-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                @include('admin.data_not_found')
            @endif
        </div>
    </div>
@endsection
@push('js')
@endpush
