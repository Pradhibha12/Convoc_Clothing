@extends('layouts.admin')
@push('title', get_phrase('Blog List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4">
                <div class="col-md-6 flex-wrap d-flex align-items-center gap-3">
                    <a href="{{ route('admin.blog.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add new Blog') }}</span>
                    </a>
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> 
                            {{ get_phrase('Export') }} 
                            <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Blog-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
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
                                <form id="filter-dropdown" action="{{ route('admin.blogs') }}" method="get">
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
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Category') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="category" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}</option>

                                                @foreach (App\Models\Blog_category::orderBy('title', 'asc')->get() as $category)
                                                    <option value="{{ $category->slug }}" @if (request('category') == $category->slug) selected @endif>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Blog Creator') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="creator_id" class="ol-select-2" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}
                                                </option>
                                                @foreach (App\Models\User::whereIn('id', App\Models\Blog::pluck('user_id')->unique())->orderBy('name')->get() as $user)
                                                    <option value="{{ $user->id }}" @if (request('creator_id') == $user->id) selected @endif>
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
                        <a href="{{ route('admin.blogs') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <form action="{{ route('admin.blogs') }}" method="get">

                        @php
                            $queries = request()->query();
                            unset($queries['search']);
                        @endphp
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-7 col-10">
                                <div class="search-input flex-grow-1">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search by title') }}" class="ol-form-control form-control" />
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

            @if ($counted = $blogs->count() > 0)
               
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Blog Title') }}</th>
                                <th scope="col">{{ get_phrase('Created By') }}</th>
                                <th scope="col">{{ get_phrase('Category') }}</th>
                                <th scope="col">{{ get_phrase('Status') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $blog)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h3 class="title text-14px">{{ $blog->title }}</h3>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center min-w-200px">
                                            <img class="image-40" width="40" height="40" src="{{ get_image($blog->user->photo) }}">
                                            <div class="ms-2 mt-1">
                                                <h4 class="title fs-14px">{{ $blog->user->name }}</h4>
                                                <p class="sub-title2 text-12px">{{ $blog->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $blog->category->title }}
                                    </td>
                                    <td>
                                        @if ($blog->status == 1)
                                            <span class="badge bg-success">{{ get_phrase('Active') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ get_phrase('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="javascript:;" onclick="confirmModal('{{ route('admin.blog.delete', ['id' => $blog->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                 <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center gr-15 flex-wrap">
                    <p class="admin-tInfo">
                        {{ get_phrase('Showing') . ' ' . count($blogs) . ' ' . get_phrase('of') . ' ' . $blogs->total() . ' ' . get_phrase('data') }}
                    </p>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $blogs->links() }}
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
