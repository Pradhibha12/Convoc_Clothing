@extends('layouts.admin')
@push('title', get_phrase('City List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4">
                <div class="col-sm-6 d-flex align-items-center flex-wrap gap-3 mb-2">
                   
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> {{ get_phrase('Export') }} <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'City-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
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
                                <form id="filter-dropdown" action="{{ route('admin.cities') }}" method="get">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <div class="filter-option d-flex flex-column gap-3">
                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('State') }}</label>
                                            <select class="form-control ol-form-control ol-select2" name="state" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" {{ request('state') == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
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
                        <a href="{{ route('admin.cities') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                    
                </div>
                <div class="col-sm-6 d-flex justify-content-end mb-2">
                     <a href="{{ route('admin.city.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add new City') }}</span>
                    </a>
                </div>
                
            </div>

            @if ($counted = $cities->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('City') }}</th>
                                <th scope="col">{{ get_phrase('State') }}</th>
                                <th scope="col">{{ get_phrase('Country') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $key => $city)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        {{ $city->name }}
                                    </td>
                                    <td>
                                        {{ $city->state->name }}
                                    </td>
                                    <td>
                                        {{ $city->country->name }}
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.city.edit', ['id' => $city->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="#" onclick="confirmModal('{{ route('admin.city.delete', ['id' => $city->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
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
                        {{ $cities->links() }}
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
