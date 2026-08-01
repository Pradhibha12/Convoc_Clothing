@extends('layouts.admin')
@push('title', get_phrase('Contact List'))
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
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Contact-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @if ($counted = $contacts->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Name') }}</th>
                                <th scope="col">{{ get_phrase('Email') }}</th>
                                <th scope="col">{{ get_phrase('Phone') }}</th>
                                <th scope="col">{{ get_phrase('Message') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $key => $contact)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h4 class="title fs-14px">{{ $contact->name }}</h4>
                                    </td>
                                    <td>
                                        <a class="text-muted fs-14px" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-light btn-icon" href="tel:{{ $contact->phone }}"><i class="fi-rr-phone-plus"></i></a> {{ $contact->phone }}
                                    </td>
                                    <td>
                                        <p class="ellipsis-line-3">
                                            {{ $contact->message }}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="javascript:;" onclick="confirmModal('{{ route('admin.contact.delete', ['id' => $contact->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
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
                        {{ $contacts->links() }}
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
