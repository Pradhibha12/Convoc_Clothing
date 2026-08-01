@extends('layouts.admin')
@push('title', get_phrase('Staff List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4 mt-3">
                <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                    <a href="{{ route('admin.staff.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add new Staff') }}</span>
                    </a>
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> 
                            {{ get_phrase('Export') }} 
                            <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Staff-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="custom-dropdown dropdown-filter @if (!isset($_GET) || (isset($_GET) && count($_GET) == 0))  @endif">
                        <button class="dropdown-header btn ol-btn-light">
                            <i class="fi-rr-filter me-2"></i>
                            {{ get_phrase('Filter') }}

                        </button>
                        <ul class="dropdown-list w-250px">
                            <li>
                                <form id="filter-dropdown" action="{{ route('admin.staffs') }}" method="get">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <div class="filter-option d-flex flex-column gap-3">
                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Status') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="status" class="ol-select-2" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}
                                                </option>

                                                <option value="active"@if (request('status') == 'active') selected @endif>
                                                    {{ get_phrase('Active') }} </option>
                                                <option value="inactive"@if (request('status') == 'inactive') selected @endif>
                                                    {{ get_phrase('Inactive') }} </option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Gender') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="gender" class="ol-select-2" data-placeholder="Type to search...">
                                                <option value="any">{{ get_phrase('Any') }}
                                                </option>

                                                <option value="male"@if (request('gender') == 'male') selected @endif>
                                                    {{ get_phrase('Male') }}</option>
                                                <option value="female"@if (request('gender') == 'female') selected @endif>
                                                    {{ get_phrase('Female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="filter-button d-flex justify-content-end align-items-center mt-3">
                                        <button type="submit" class="ol-btn-primary">{{ get_phrase('Apply') }}</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>

                    @if (isset($_GET) && count($_GET) > 0)
                        <a href="{{ route('admin.staffs') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <form action="{{ route('admin.staffs') }}" method="get">

                        @php
                            $queries = request()->query();
                            unset($queries['search']);
                        @endphp
                        <div class="row">
                             <div class="col-lg-3"></div>
                            <div class="col-lg-7 col-10">
                                <div class="search-input flex-grow-1">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search by staff name or email') }}" class="ol-form-control form-control" />
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn ol-btn-primary w-100" id="submit-button"><span class="fi-rr-search d-flex justify-content-center"></span></button>
                            </div>
                        </div>
                        @foreach ($queries as $key => $query)
                            <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                        @endforeach
                    </form>
                </div>
            </div>

            @if ($counted = $staffs->count() > 0)
                
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Staff') }}</th>
                                <th scope="col">{{ get_phrase('Phone') }}</th>
                                <th scope="col">{{ get_phrase('Address') }}</th>
                                
                                <th scope="col">{{ get_phrase('Status') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $key => $staff)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center min-w-200px">
                                            <img class="image-40" width="40" height="40" src="{{ get_image($staff->photo) }}">
                                            <div class="ms-2 mt-1">
                                                <h4 class="title fs-14px">{{ $staff->name }}</h4>
                                                <p class="sub-title2 text-12px">{{ $staff->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-light btn-icon" href="tel:{{ $staff->phone }}"><i class="fi-rr-phone-plus"></i></a> {{ $staff->phone }}
                                    </td>
                                    <td>
                                        {{ $staff->address }}
                                    </td>
                                   
                                    <td>
                                        @if ($staff->status == 1)
                                            <span class="badge bg-success">{{ get_phrase('Active') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ get_phrase('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.staff.edit', ['id' => $staff->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="javascript:;" onclick="confirmModal('{{ route('admin.staff.delete', ['id' => $staff->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center gr-15 flex-wrap">
                    <p class="admin-tInfo">
                        {{ get_phrase('Showing') . ' ' . count($staffs) . ' ' . get_phrase('of') . ' ' . $staffs->total() . ' ' . get_phrase('data') }}
                    </p>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $staffs->links() }}
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
