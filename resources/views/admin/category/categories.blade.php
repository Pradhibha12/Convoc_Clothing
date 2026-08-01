@extends('layouts.admin')
@push('title', get_phrase('Admins'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card">
        <div class="ol-card-body  pt-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                

                <a href="{{ route('admin.category.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add new Category') }}</span>
                </a>
            </div>
        </div>
        <div class="ol-card-body p-3 mb-5">
               <div class="row g-4 all-category-list">
                    @php
                        $categories = App\Models\Category::where('parent_id', 0)
                            ->orderBy('sort', 'asc')
                            ->orderBy('title', 'asc')
                            ->get();
                    @endphp

                    @foreach ($categories as $category)
                        @php
                            $subCategories = App\Models\Category::where('parent_id', $category->id)
                                ->orderBy('sort', 'asc')
                                ->orderBy('title', 'asc')
                                ->get();
                        @endphp

                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="ol-card category-card radious-10px h-100">
                                <img src="{{ get_image($category->thumbnail) }}" class="card-img-top" alt="...">
                                <h6 class="title fs-14px mb-12px px-3 pt-3 d-flex align-baseline align-items-center">
                                    <img width="30" height="30" class="me-1" src="{{ get_image($category->icon) }}" alt="">
                                      {{ $category->title }}
                                    <span class="text-muted d-inline-block ms-auto">
                                        ({{ count($subCategories) }})
                                    </span>
                                </h6>

                                <div class="ol-card-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($subCategories as $subCategory)
                                            @php
                                                $subSubCategories = App\Models\Category::where('parent_id', $subCategory->id)
                                                    ->orderBy('sort', 'asc')
                                                    ->orderBy('title', 'asc')
                                                    ->get();
                                            @endphp

                                            {{-- Subcategory --}}
                                            <li class="list-group-item text-muted">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <div class="d-flex align-items-center">
                                                             <img width="30" height="30" class="me-1" src="{{ get_image($subCategory->icon) }}" alt="">
                                                              <span class="text-12px">{{ $subCategory->title }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto ms-auto d-flex subcategory-actions">
                                                        <a href="{{ route('admin.category.edit', ['id' => $subCategory->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="mx-1">
                                                            <i class="fi fi-rr-pen-clip"></i>
                                                        </a>
                                                        <a href="javascript:;" onclick="confirmModal('{{ route('admin.category.delete', ['id' => $subCategory->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}">
                                                            <i class="fi-rr-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                {{-- Sub-Subcategories --}}
                                                @if (count($subSubCategories) > 0)
                                                    <ul class="mt-2 ms-4">
                                                        @foreach ($subSubCategories as $subSub)
                                                            <li class="text-muted small d-flex justify-content-between">
                                                                <span>↳ {{ $subSub->title }} </span>
                                                                <span>
                                                                    <a href="{{ route('admin.category.edit', ['id' => $subSub->id]) }}" class="mx-1"><i class="fi fi-rr-pen-clip"></i></a>
                                                                    <a href="javascript:;" onclick="confirmModal('{{ route('admin.category.delete', ['id' => $subSub->id]) }}')"><i class="fi-rr-trash"></i></a>
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="category-footer ol-card-body text-center py-1">
                                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn text-12px fw-600">
                                        <i class="fi fi-rr-pen-clip"></i> {{ get_phrase('Edit') }}
                                    </a>
                                    <a href="javascript:;" onclick="confirmModal('{{ route('admin.category.delete', ['id' => $category->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn text-12px fw-600">
                                        <i class="fi-rr-trash"></i> {{ get_phrase('Delete') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            {{--  --}}
        </div>
    </div>
@endsection
@push('js')
@endpush
