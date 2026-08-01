@extends('layouts.admin')
@push('title', get_phrase('Language List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Language List') }}
                </h4>

                <a href="{{ route('admin.language.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add new Language') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="ol-card">
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

            @if ($counted = $languages->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Language') }}</th>
                                <th scope="col">{{ get_phrase('Direction') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $key => $language)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h3 class="title text-14px">{{ $language->name }}</h3>
                                    </td>
                                    <td>
                                        <span class="text-uppercase"></span>{{ $language->direction }}
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.language.edit', ['id' => $language->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="#" onclick="confirmModal('{{ route('admin.language.delete', ['id' => $language->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
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
                        {{ $languages->links() }}
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
