@extends('layouts.admin')
@push('title', get_phrase('Store List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
       
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4">
                <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                    <a href="{{ route('admin.store.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add new Store') }}</span>
                    </a>
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> 
                            {{ get_phrase('Export') }} 
                            <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Store-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
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
                                <form id="filter-dropdown" action="{{ route('admin.stores') }}" method="get">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <div class="filter-option d-flex flex-column gap-3">
                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Owner') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="owner_id" class="ol-select-2" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}
                                                </option>
                                                @foreach (App\Models\User::whereIn('id', App\Models\Store::pluck('user_id')->unique())->orderBy('name')->get() as $user)
                                                    <option value="{{ $user->id }}" @if (request('owner_id') == $user->id) selected @endif>
                                                        {{ ucfirst($user->name) }}
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
                        <a href="{{ route('admin.stores') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <form action="{{ route('admin.stores') }}" method="get">

                        @php
                            $queries = request()->query();
                            unset($queries['search']);
                        @endphp
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-7">
                                <div class="search-input flex-grow-1">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search by store name') }}" class="ol-form-control form-control" />
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn ol-btn-primary w-100" id="submit-button">{{ get_phrase('Search') }}</button>
                            </div>
                        </div>
                        @foreach ($queries as $key => $query)
                            <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                        @endforeach
                    </form>
                </div>
            </div>

            @if ($counted = $stores->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Store name') }}</th>
                                <th scope="col">{{ get_phrase('Store Owner') }}</th>
                                <th scope="col">{{ get_phrase('Phone') }}</th>
                                <th scope="col">{{ get_phrase('Address') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $key => $store)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h3 class="title text-14px">{{ $store->name }}</h3>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center min-w-200px">
                                            <img class="image-40" width="40" height="40" src="{{ get_image($store->user->photo) }}">
                                            <div class="ms-2 mt-1">
                                                <h4 class="title fs-14px">{{ $store->user->name }}</h4>
                                                <p class="sub-title2 text-12px">{{ $store->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-light btn-icon" href="tel:{{ $store->phone }}"><i class="fi-rr-phone-plus"></i></a> {{ $store->phone }}
                                    </td>
                                    <td>
                                        {{ $store->address }}
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.store.edit', ['id' => $store->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            {{-- <a href="#" onclick="confirmModal('{{ route('admin.store.delete', ['id' => $store->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a> --}}
                                            @if(auth()->check() && auth()->user()->role_id == 1 && auth()->id() != $store->user_id)
                                                <a href="#"
                                                onclick="confirmModal('{{ route('admin.store.delete', ['id' => $store->id]) }}')"
                                                data-bs-toggle="tooltip"
                                                title="{{ get_phrase('Delete') }}"
                                                class="btn btn-danger-light btn-icon">
                                                    <i class="fi-rr-trash"></i>
                                                </a>
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
                        {{ $stores->links() }}
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
