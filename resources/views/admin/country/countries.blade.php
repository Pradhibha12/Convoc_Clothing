@extends('layouts.admin')
@push('title', get_phrase('Country List'))
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
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Country-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @if ($counted = $countries->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Country') }}</th>
                                <th scope="col">{{ get_phrase('Sate') }}</th>
                                <th scope="col">{{ get_phrase('City') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $key => $country)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        {{$country->name}}
                                    </td>
                                    <td>
                                        {{get_phrase('____ States', $country->states->count())}}
                                    </td>
                                    <td>
                                        {{get_phrase('____ Cities', $country->cities->count())}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $countries->links() }}
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
