@extends('layouts.admin')
@push('title', get_phrase('Shipping zones'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
     
        <div class="ol-card-body p-3 mb-5">
            <div class="row  mb-4">
                <div class="col-6 d-flex align-items-center gap-3">
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> {{ get_phrase('Export') }} <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Shipping-zones-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{ route('admin.shipping_zone.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add new shipping zone') }}</span>
                    </a>
                </div>

            </div>

            @if ($counted = $shipping_zones->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Zone name') }}</th>
                                <th scope="col">{{ get_phrase('Description') }}</th>
                                <th scope="col">{{ get_phrase('Region') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shipping_zones as $key => $shipping_zone)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        {{ $shipping_zone->name }}
                                    </td>
                                    <td>
                                        <p class="ellipsis-line-2">{{ $shipping_zone->description }}</p>
                                    </td>
                                    <td>
                                        {{ get_phrase('____ Regions', $shipping_zone->regions->count()) }}
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.shipping_zone.edit', ['id' => $shipping_zone->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="#" onclick="confirmModal('{{ route('admin.shipping_zone.delete', ['id' => $shipping_zone->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
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
                        {{ $shipping_zones->links() }}
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
