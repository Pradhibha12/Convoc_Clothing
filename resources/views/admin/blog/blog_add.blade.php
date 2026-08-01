@extends('layouts.admin')
@push('title', get_phrase('Blog Add'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                

                <a href="{{ route('admin.blogs') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label ol-form-label">{{ get_phrase('Blog title') }}</label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter blog title') }}" aria-label="{{ get_phrase('Enter blog title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="blog_category_id" class="form-label ol-form-label">{{ get_phrase('Blog category') }}</label>
                            <select class="ol-select2" name="blog_category_id" id="blog_category_id">
                                <option value="">{{ get_phrase('Select a category') }}</option>
                                @foreach ($blog_categories as $blog_category)
                                    <option value="{{$blog_category->id}}">{{$blog_category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label ol-form-label">{{ get_phrase('Short summary') }}</label>
                            <textarea name="summary" rows="4" class="form-control ol-form-control" id="summary" placeholder="{{ get_phrase('Write short summary') }}">{{ old('summary') }}</textarea>
                        </div>
                         <div class="fpb-7 mb-3">
                            <label for="keywords" class="form-label ol-form-label">{{ get_phrase('Tags') }}</label>
                            <input type="text" name="keywords"  class="tagify ol-form-control w-100" id="keywords" placeholder="{{get_phrase('Write some Tags')}}" />
                            <small class="form-label ol-form-label text-muted">{{ get_phrase('Writing your keyword and hit the enter') }}</small>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{ get_phrase('Blog content') }}</label>
                            <textarea name="description" rows="4" class="form-control ol-form-control" id="summernote" placeholder="{{ get_phrase('Write description') }}">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}</label>
                            <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="banner" class="form-label ol-form-label">{{ get_phrase('Banner') }}</label>
                            <input type="file" name="banner" class="form-control ol-form-control" id="banner" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label ol-form-label">{{ get_phrase('Status') }}</label>
                            <select class="ol-select2" name="status" id="status" required>
                                <option value="">{{ get_phrase('Select a Status') }}</option>
                                <option value="1">{{ get_phrase('Active') }}</option>
                                <option value="0">{{ get_phrase('Inactive') }}</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

<script type="text/javascript">
    "use strict";
    
      $('#summernote').summernote({
        placeholder: "{{get_phrase('Write Blog description')}}",
        tabsize: 2,
        height: 340,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']]
        ]
      });
</script>

@endpush
