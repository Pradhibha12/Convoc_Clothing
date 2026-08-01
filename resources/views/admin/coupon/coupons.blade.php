@extends('layouts.admin')
@push('title', get_phrase('Coupon List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        <div class="ol-card-body mt-1rem pt-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Coupon List') }}
                </h4>

                <a href="{{ route('admin.coupon.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add new Coupon') }}</span>
                </a>
            </div>
        </div>
        <div class="ol-card-body p-3 mb-5">
            <div class="row mt-3 mb-4">
                <div class="col-md-6 d-flex align-items-center gap-3">
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> {{ get_phrase('Export') }} <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'course-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @if ($counted = $coupons->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Coupon') }}</th>
                                <th scope="col">{{ get_phrase('Customer') }}</th>
                                <th scope="col">{{ get_phrase('Discount amount') }}</th>
                                <th scope="col">{{ get_phrase('Usage limit') }}</th>
                                <th scope="col">{{ get_phrase('Validity') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $key => $coupon)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <p class="fw-500">{{ $coupon->code }}</p>
                                        <small>{{ $coupon->title }}</small>
                                    </td>
                                    <td>
                                        @if ($coupon->user_id)
                                            <p class="fw-500">{{ $coupon->user->name }}</p>
                                            <small>{{ $coupon->user->email }}</small>
                                        @else
                                            <span class="badge bg-light text-dark">{{ get_phrase('Available to all customers') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($coupon->discount_type == 'flat')
                                            <p class="f-500">{{ get_phrase('Discount') }}: {{ currency($coupon->discount_value) }}</p>
                                        @else
                                            <p class="fw-500">{{ get_phrase('Discount') }}: {{ $coupon->discount_value }}%</p>
                                            <p class="fs-12px">{{ get_phrase('Minimum order') }}: {{ currency($coupon->minimum_order_amount) }}</p>
                                            <p class="fs-12px">{{ get_phrase('Maximum discount') }}: {{ currency($coupon->minimum_discount_amount) }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        {{ get_phrase('____ times', $coupon->usage_limit) }}
                                    </td>
                                    <td>
                                        {{ date_formatter($coupon->start_date, 1) }}
                                        -
                                        {{ date_formatter($coupon->end_date, 1) }}
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.coupon.edit', ['id' => $coupon->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="#" onclick="confirmModal('{{ route('admin.coupon.delete', ['id' => $coupon->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
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
                        {{ $coupons->links() }}
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
