@extends('layouts.admin')
@push('title', get_phrase('Application'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    @php
        $pendings = App\Models\Application::where('status', 0)->paginate(10);
        $approved = App\Models\Application::where('status', 1)->paginate(10);
    @endphp

    <div class="ol-card p-4">
        <div class="ol-card-body">
            <ul class="nav nav-tabs eNav-Tabs-custom eTab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="cHome-tab" data-bs-toggle="tab" data-bs-target="#cHome" type="button" role="tab" aria-controls="cHome"
                        aria-selected="true">
                        {{ get_phrase('Pending applications') }}
                        <span></span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cProfile-tab" data-bs-toggle="tab" data-bs-target="#cProfile" type="button" role="tab" aria-controls="cProfile"
                        aria-selected="false">
                        {{ get_phrase('Approved applications') }}
                        <span></span>
                    </button>
                </li>
            </ul>
            <div class="tab-content eNav-Tabs-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="cHome" role="tabpanel" aria-labelledby="cHome-tab">

                    @if ($counted = $pendings->count() > 0)
                        <div class="table-responsive overflow-auto">
                            <table class="table print-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ get_phrase('User') }}</th>
                                        <th scope="col">{{ get_phrase('Store name') }}</th>
                                        <th scope="col">{{ get_phrase('Phone') }}</th>
                                        <th scope="col">{{ get_phrase('Status') }}</th>
                                        <th scope="col">{{ get_phrase('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendings as $key => $pending)
                                        <tr>
                                            <th>
                                                {{ ++$key }}
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center min-w-200px">
                                                    <img class="image-40" width="40" height="40" src="{{ get_image($pending->user->photo) }}">
                                                    <div class="ms-2 mt-1">
                                                        <h4 class="title fs-14px">{{ $pending->user->name }}</h4>
                                                        <p class="sub-title2 text-12px">{{ $pending->user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h3 class="title text-14px">{{ $pending->store_name }}</h3>
                                            </td>
                                            <td>
                                                <a class="btn btn-light btn-icon" href="tel:{{ $pending->phone }}"><i class="fi-rr-phone-plus"></i></a> {{ $pending->phone }}
                                            </td>
                                            <td>
                                                <span class="badge bg-danger text-uppercase">{{ get_phrase('Pending') }}</span>
                                            </td>
                                            <td>
                                                <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                                    <a href="#" onclick="confirmModal('{{ route('admin.vendor.application.approve', $pending->id) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Approve') }}" class="btn btn-success-light btn-icon">
                                                        <i class="fi-rr-check"></i>
                                                    </a>

                                                    <a href="javascript:;" onclick="confirmModal('{{ route('admin.vendor.application.delete', $pending->id) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon">
                                                        <i class="fi-rr-cross"></i>
                                                    </a>
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
                                {{ $pendings->links() }}
                            </div>
                        @endif
                    @else
                        @include('admin.data_not_found')
                    @endif
                </div>
                <div class="tab-pane fade" id="cProfile" role="tabpanel" aria-labelledby="cProfile-tab">
                    @if ($counted = $approved->count() > 0)
                        <div class="table-responsive overflow-auto">
                            <table class="table print-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ get_phrase('User') }}</th>
                                        <th scope="col">{{ get_phrase('Store name') }}</th>
                                        <th scope="col">{{ get_phrase('Phone') }}</th>
                                        <th scope="col">{{ get_phrase('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approved as $key => $approve)
                                        <tr>
                                            <th>
                                                {{ ++$key }}
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center min-w-200px">
                                                    <img class="image-40" width="40" height="40" src="{{ get_image($approve->user->photo) }}">
                                                    <div class="ms-2 mt-1">
                                                        <h4 class="title fs-14px">{{ $approve->user->name }}</h4>
                                                        <p class="sub-title2 text-12px">{{ $approve->user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h3 class="title text-14px">{{ $approve->store_name }}</h3>
                                            </td>
                                            <td>
                                                <a class="btn btn-light btn-icon" href="tel:{{ $approve->phone }}"><i class="fi-rr-phone-plus"></i></a> {{ $approve->phone }}
                                            </td>
                                            <td>
                                                <span class="badge bg-success text-uppercase">{{ get_phrase('Approved') }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Data info and Pagination -->
                        @if ($counted > 0)
                            <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                                {{ $approved->links() }}
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
