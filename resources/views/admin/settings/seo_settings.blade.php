@extends('layouts.admin')
@push('title', get_phrase('Seo settings'))
@push('meta')@endpush
@push('css')@endpush
<style>
    .capitalize{
        text-transform: capitalize;
    }
</style>
@section('content')
{{-- {{$active_tab}} --}}
    <div class="ol-card">
       
        <div class="ol-card">
            <div class="ol-card-body p-20px mb-3">
                <div class="d-flex gap-3 flex-wrap flex-md-nowrap">
                    <div class="ol-sidebar-tab">
                        <div class="nav flex-column nav-pills" id="myv-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($seo_fields as $seo_field)
                                <button class="nav-link @if ($active_tab == slugify($seo_field->route)) active @endif" id="v-pills-{{ $seo_field->route }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $seo_field->route }}" type="button" role="tab" aria-controls="v-pills-{{ $seo_field->route }}" aria-selected="false" tabindex="-1">
                                    <span class="capitalize">{{ ucwords(str_replace('_', ' ', $seo_field->route)) }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-content w-100" id="myv-pills-tabContent">
                        @foreach ($seo_fields as $seo_field)
                            <div class="tab-pane fade @if ($active_tab == slugify($seo_field->route)) show active @endif" id="v-pills-{{ $seo_field->route }}" role="tabpanel" aria-labelledby="v-pills-{{ $seo_field->route }}-tab" tabindex="0">
                                <div class="w-100">
                                    <form class="eForm-sizing" action="{{ route('admin.seo.settings.update', ['id' => $seo_field->id]) }}" method="POST" enctype="multipart/form-data">
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
                                                <img width="150px" src="{{ get_image($seo_field->og_image) }}" alt=""> 
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    "use strict";

    function activeTab() {
        $(this).toggleClass("active");
    }
</script>

@push('js')
@endpush
