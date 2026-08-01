@extends('layouts.admin')
@push('title', get_phrase('Event List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4 mt-2">
                <div class="col-md-6 d-flex flex-wrap align-items-center gap-3">
                    <a href="{{ route('admin.event.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                            <span class="fi-rr-plus"></span>
                            <span>{{ get_phrase('Add new Event') }}</span>
                        </a>
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> 
                            {{ get_phrase('Export') }} 
                            <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Event-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>

                    @if (isset($_GET) && count($_GET) > 0)
                        <a href="{{ route('admin.events') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>

                <div class="col-md-6 mt-md-0 mt-3">
                    <form class="w-100" action="{{ route('admin.events') }}" method="get" class="d-flex justify-content-between">
                        <div class="row row-gap-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                                <div class="position-relative position-relative">
                                    <input type="text" class="form-control ol-form-control daterangepicker w-100" name="eDateRange" value="{{ $start_date->format('m/d/Y') . ' - ' . $end_date->format('m/d/Y') }}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn ol-btn-primary w-100" id="submit-button" onclick="update_date_range();"> {{ get_phrase('Filter') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            @if ($counted = $events->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Event title') }}</th>
                                {{-- <th scope="col">{{ get_phrase('Discount') }}</th>
                                <th scope="col">{{ get_phrase('Usage limit') }}</th> --}}
                                <th scope="col">{{ get_phrase('Event period') }}</th>
                                <th scope="col">{{ get_phrase('Status') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $key => $event)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h3 class="title text-14px">{{ $event->title }}</h3>
                                    </td>
                                    {{-- <td>
                                        @if ($event->discount_type == 'flat')
                                            {{ currency($event->discount_value) }}
                                        @else
                                            {{ $event->discount_value }}%
                                        @endif
                                    </td> --}}
                                    {{-- <td>
                                        {{ $event->usage_limit }}
                                    </td> --}}
                                    <td>
                                        {{ date_formatter($event->start_date) }} - {{ date_formatter($event->end_date) }}
                                    </td>
                                    <td>
                                        @if ($event->status == 1)
                                            <span class="badge bg-success">{{ get_phrase('Active') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ get_phrase('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.event.edit', ['id' => $event->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="javascript:;" onclick="confirmModal('{{ route('admin.event.delete', ['id' => $event->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
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
                        {{ $events->links() }}
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
