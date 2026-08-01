@extends('layouts.admin')
@push('title', get_phrase('Admins'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
               

                <a href="{{ route('admin.categories') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
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
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label ol-form-label">{{get_phrase('Category Name')}}</label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control ol-form-control" id="title" placeholder="{{get_phrase('Enter your category name')}}" aria-label="{{get_phrase('Enter your category name')}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label ol-form-label">{{get_phrase('Description')}} <small class="text-muted">({{get_phrase('optional')}})</small></label>
                            <textarea name="description" rows="4" class="form-control ol-form-control" id="description" placeholder="{{get_phrase('Write short description')}}">{{old('description')}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label ol-form-label">{{get_phrase('Icon')}}</label>
                            <input type="file" name="icon" class="form-control ol-form-control" id="icon" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label ol-form-label">{{get_phrase('Thumbnail')}}</label>
                            <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="banner" class="form-label ol-form-label">{{get_phrase('Banner')}}</label>
                            <input type="file" name="banner" class="form-control ol-form-control" id="banner" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="parent_id" class="form-label ol-form-label">{{get_phrase('Select parent category')}}</label>
                            <select name="parent_id" id="parent_id" class="ol-select2">
                                <option value="0">{{get_phrase('Create it as parent')}}</option>

                                @foreach (App\Models\Category::where('parent_id', 0)->get() as $parent_category)
                                    <option @if(old('parent_id') == $parent_category->id) selected @endif value="{{$parent_category->id}}">{{$parent_category->title}}</option>
                                    @foreach (App\Models\Category::where('parent_id', $parent_category->id)->get() as $sub_category)
                                        <option @if(old('parent_id') == $sub_category->id) selected @endif value="{{$sub_category->id}}">- {{$sub_category->title}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sort" class="form-label ol-form-label">{{get_phrase('Sort Order (Serial Number)')}}</label>
                            <input type="number" value="{{ old('sort', 0) }}" name="sort" class="form-control ol-form-control" id="sort" placeholder="{{get_phrase('e.g. 1, 2, 3')}}" min="0">
                        </div>

                        <div class="mb-3">
                            <label for="banner" class="form-label ol-form-label">{{get_phrase('Select attribute types')}}</label>
                            <div class="row mx-0 row-gap-2">
                                @foreach(App\Models\Attribute_type::get() as $attribute_type)
                                    <div class="col-md-3 form-check">
                                        <input name="attribute_types[]" class="form-check-input" type="checkbox" id="attribute_type_{{$attribute_type->id}}" value="{{$attribute_type->id}}">
                                        <label for="attribute_type_{{$attribute_type->id}}" class="form-check-label">{{$attribute_type->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{get_phrase('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
