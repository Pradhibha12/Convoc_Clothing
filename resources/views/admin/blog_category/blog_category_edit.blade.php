@extends('layouts.admin')
@push('title', get_phrase('Edit blog category'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
               

                <a href="{{ route('admin.blog.categories') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-7">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form action="{{ route('admin.blog.category.update', ['id' => $blog_category->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label ol-form-label">{{ get_phrase('Category title') }}</label>
                            <input type="text" value="{{ $blog_category->title }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter category title') }}" aria-label="{{ get_phrase('Enter category title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}</label>
                            <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*">
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
