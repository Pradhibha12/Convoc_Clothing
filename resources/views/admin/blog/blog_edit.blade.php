@extends('layouts.admin')
@push('title', get_phrase('Blog edit'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    @php
        $seo_field = App\Models\Seo_field::where('item_table', 'blogs')->where('item_id', $blog->id)->firstOrNew();
    @endphp
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
              <ul class="nav nav-pills mb-3 px-2" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if ((isset($_GET['tab']) && $_GET['tab'] == 'blog-details') || !isset($_GET['tab'])) active @endif" id="pills-blog-details-tab" data-bs-toggle="pill" data-bs-target="#pills-blog-details" type="button" role="tab" aria-controls="pills-blog-details" aria-selected="true">{{ get_phrase('Blog Details') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if (isset($_GET['tab']) && $_GET['tab'] == 'seo') active @endif" id="pills-seo-tab" data-bs-toggle="pill" data-bs-target="#pills-seo" type="button" role="tab" aria-controls="pills-seo" aria-selected="false">{{ get_phrase('SEO') }}</button>
                </li>
            </ul>
                <a href="{{ route('admin.blogs') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>

 

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade @if ((isset($_GET['tab']) && $_GET['tab'] == 'blog-details') || !isset($_GET['tab'])) show active @endif" id="pills-blog-details" role="tabpanel" aria-labelledby="pills-blog-details-tab" tabindex="0">
            <div class="row">
                <div class="col-md-7">
                    <div class="ol-card p-4">
                        <div class="ol-card-body">
                            <form action="{{ route('admin.blog.update', ['id' => $blog->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label ol-form-label">{{ get_phrase('Blog title') }}</label>
                                    <input type="text" value="{{ $blog->title }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{ get_phrase('Enter blog title') }}" aria-label="{{ get_phrase('Enter blog title') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="blog_category_id" class="form-label ol-form-label">{{ get_phrase('Blog category') }}</label>
                                    <select class="ol-select2" name="blog_category_id" id="blog_category_id">
                                        <option value="">{{ get_phrase('Select a category') }}</option>
                                        @foreach ($blog_categories as $blog_category)
                                            <option value="{{$blog_category->id}}" @if($blog->blog_category_id == $blog_category->id) selected @endif>{{$blog_category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="summary" class="form-label ol-form-label">{{ get_phrase('Short summary') }}</label>
                                    <textarea name="summary" rows="4" class="form-control ol-form-control" id="summary" placeholder="{{ get_phrase('Write short summary') }}">{{ $blog->summary }}</textarea>
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="keywords" class="form-label ol-form-label">{{ get_phrase('Tags') }}</label>
                                    <input type="text" name="keywords" value="{{ $blog->keywords }}"  class="tagify ol-form-control w-100" id="keywords" placeholder="{{get_phrase('Write some Tags')}}" />
                                    <small class="form-label ol-form-label text-muted">{{ get_phrase('Writing your keyword and hit the enter') }}</small>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label ol-form-label">{{ get_phrase('Blog content') }}</label>
                                    <textarea name="description" rows="4" class="form-control ol-form-control" id="summernote" placeholder="{{ get_phrase('Write description') }}">{{ $blog->description }}</textarea>
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
                                        <option value="1" @if($blog->status == 1) selected @endif>{{ get_phrase('Active') }}</option>
                                        <option value="0" @if($blog->status == 0) selected @endif>{{ get_phrase('Inactive') }}</option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <button class="btn ol-btn-primary">{{ get_phrase('Update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade @if (isset($_GET['tab']) && $_GET['tab'] == 'seo') show active @endif" id="pills-seo" role="tabpanel" aria-labelledby="pills-seo-tab" tabindex="0">
            <div class="row">
                <div class="col-md-7">
                    <div class="ol-card p-4">
                        <div class="ol-card-body">
                            <form class="eForm-sizing" action="{{ route('admin.blog.seo_update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="fpb-7 mb-3">
                                    <label for="meta_title" class="form-label ol-form-label">{{ get_phrase('Meta Title') }}</label>
                                    <input class="form-control ol-form-control" id="meta_title" name="meta_title" type="text" value="{{ $seo_field->meta_title }}" placeholder="Meta Title" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="meta_keywords" class="form-label ol-form-label">{{ get_phrase('Meta Keywords') }}</label>
                                    <input type="text" name="meta_keywords" value="{{ $seo_field->meta_keywords }}" class="tagify ol-form-control w-100" id="meta_keywords" placeholder="Meta keywords" />
                                    <small class="form-label ol-form-label text-muted">{{ get_phrase('Writing your keyword and hit the enter') }}</small>
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="meta_description" class="form-label ol-form-label">{{ get_phrase('Meta Description') }}</label>
                                    <textarea class="form-control ol-form-control" id="meta_description" name="meta_description" type="text" placeholder="Meta Description">{{ $seo_field->meta_description }}</textarea>
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="meta_robot" class="form-label ol-form-label">{{ get_phrase('Meta Robot') }}</label>
                                    <input class="form-control ol-form-control" id="meta_robot" name="meta_robot" type="text" value="{{ $seo_field->meta_robot }}" placeholder="Meta Robot" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="canonical_url" class="form-label ol-form-label">{{ get_phrase(' Canonical Url') }}</label>
                                    <input type="text" class="form-control ol-form-control" data-role="tagsinput" id = "canonical_url" name="canonical_url" placeholder="https://example.com/courses" value="{{ $seo_field->canonical_url }}" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="custom_url" class="form-label ol-form-label">{{ get_phrase(' Custom Url') }}</label>
                                    <input type="text" class="form-control ol-form-control" data-role="tagsinput" id = "custom_url" name="custom_url" placeholder="https://example.com/dresses/courses" value="{{ $seo_field->custom_url }}" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="og_title" class="form-label ol-form-label">{{ get_phrase('Og Title') }}</label>
                                    <input type="text" class="form-control ol-form-control" data-role="tagsinput" id = "og_title" name="og_title" value="{{ $seo_field->og_title }}" />
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="og_description" class="form-label ol-form-label">{{ get_phrase('Og Description') }}</label>
                                    <textarea class="form-control ol-form-control" id="og_description" name="og_description" type="text">{{ $seo_field->og_description }}</textarea>
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="og_image" class="form-label ol-form-label">{{ get_phrase('Og Image') }}</label>
                                    <div class="og_image mb-2">
                                        <img width="150px" src="{{ get_image($seo_field->og_image) }}" alt="....">
                                    </div>
                                    <input type="file" class="form-control ol-form-control" id = "og_image" name="og_image" value="{{ $seo_field->og_image }}" />
                                    <input type="hidden" name="old_og_image" value="{{ $seo_field->og_image }}">
                                </div>

                                <div class="fpb-7 mb-3">
                                    <label for="json_ld" class="form-label ol-form-label">{{ get_phrase('Json Id') }}</label>
                                    <textarea class="form-control ol-form-control" id="json_ld" name="json_ld">{{ $seo_field->json_ld }}</textarea>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="ol-btn-primary">{{ get_phrase('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
