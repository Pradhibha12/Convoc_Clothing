@extends('layouts.admin')
@push('title', get_phrase('Page List'))
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
                    {{ get_phrase('Page List') }}
                </h4>

                <a href="{{ route('admin.page.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add new Page') }}</span>
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

            @if ($counted = $pages->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Page Title') }}</th>
                                <th scope="col">{{ get_phrase('Button Placement') }}</th>
                                <th scope="col">{{ get_phrase('Status') }}</th>
                                <th scope="col">{{ get_phrase('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $key => $page)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h3 class="title text-14px my-2">{{$page->title}} <a href="{{route('page',['slug' => $page->slug])}}" target="_blank"><i class="fi-rr-arrow-up-right-from-square"></i></a></h3>
                                    </td>
                                    <td>
                                        {{ucfirst($page->button_placement)}}
                                    </td>
                                    <td>
                                        @if ($page->status == 1)
                                            <span class="badge bg-success">{{ get_phrase('Active') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ get_phrase('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.page.edit', ['id' => $page->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $pages->links() }}
                    </div>
                @endif
            @else
                {{-- @include('admin.no_data') --}}
            @endif
        </div>
    </div>
@endsection
@push('js')
@endpush
