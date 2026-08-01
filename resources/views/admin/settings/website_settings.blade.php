@extends('layouts.admin')
@push('title', get_phrase('Website settings'))
@push('meta')
@endpush
@push('css')
<style>
    .box {
        background: #94949445;
        padding: 17px 20px;
        border-radius: 10px;
    }
    .box .btn {
        background: transparent !important;
    }
</style>
@endpush
@section('content')
 


    <ul class="nav nav-pills mb-3 px-2" id="pills-tab" role="tablist">
        
        <li class="nav-item" role="presentation">
            <button class="nav-link  active " id="pills-website-logo-tab" data-bs-toggle="pill" data-bs-target="#pills-website-logo" type="button" role="tab" aria-controls="pills-website-logo" aria-selected="false">{{ get_phrase('Website Logo') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link " id="pills-website-policy-tab" data-bs-toggle="pill" data-bs-target="#pills-website-policy" type="button" role="tab" aria-controls="pills-website-policy" aria-selected="false">{{ get_phrase('Website Policy') }}</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
       
        <div class="tab-pane fade show active " id="pills-website-logo" role="tabpanel" aria-labelledby="pills-website-logo-tab" tabindex="0">
            <div class="row justify-content-between mt-3">
                
                <div class="col-md-3">
                    <div class="ol-card p-4">
                        <div class="ol-card-body">
                            <form action="{{ route('admin.website.settings.logo.update') }}" method="post" enctype="multipart/form-data" class="text-center">
                                @csrf
                                <div class="form-group mb-2">
                                    <div class="wrapper-image-preview d-flex justify-content-center">
                                        <div class="box">
                                            <div class="upload-options">
                                                <img class="radius-6px" width="200px" height="40px" src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="">
                                                <label for="light_logo" class="btn ol-card p-4-text mt-2">
                                                    <i class="fi-rr-camera"></i>
                                                    <small class="d-block text-muted">{{ get_phrase('Choose an image file') }}</small>
                                                </label>
                                                <input id="light_logo" type="file" class="image-upload d-none" name="light_logo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn ol-btn-primary w-100">{{ get_phrase('Upload light logo') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ol-card p-4">
                        <div class="ol-card-body">
                            <form action="{{ route('admin.website.settings.logo.update') }}" method="post" enctype="multipart/form-data" class="text-center">
                                @csrf
                                <div class="form-group mb-2">
                                    <div class="wrapper-image-preview d-flex justify-content-center">
                                        <div class="box">
                                            <div class="upload-options">
                                                <img class="radius-6px" width="200px" height="40px" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="">
                                                <label for="dark_logo" class="btn ol-card p-4-text mt-2">
                                                    <i class="fi-rr-camera"></i>
                                                    <small class="d-block text-muted">{{ get_phrase('Choose an image file') }}</small>
                                                </label>
                                                <input id="dark_logo" type="file" class="image-upload d-none" name="dark_logo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn ol-btn-primary w-100">{{ get_phrase('Upload dark logo') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ol-card p-4">
                        <div class="ol-card-body">
                            <form action="{{ route('admin.website.settings.logo.update') }}" method="post" enctype="multipart/form-data" class="text-center">
                                @csrf
                                <div class="form-group mb-2">
                                    <div class="wrapper-image-preview d-flex justify-content-center">
                                        <div class="box">
                                            <div class="upload-options">
                                                <img class="radius-6px" width="200px" height="40px" src="{{ get_image(get_frontend_settings('favicon')) }}" alt="">
                                                <label for="favicon" class="btn ol-card p-4-text mt-2">
                                                    <i class="fi-rr-camera"></i>
                                                    <small class="d-block text-muted">{{ get_phrase('Choose an image file') }}</small>
                                                </label>
                                                <input id="favicon" type="file" class="image-upload d-none" name="favicon" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn ol-btn-primary w-100">{{ get_phrase('Upload favicon') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="pills-website-policy" role="tabpanel" aria-labelledby="pills-website-policy-tab" tabindex="0">
            <div class="row">
                <div class="col-md-10">
                    <div class="ol-card p-4">
                        <div class="ol-card-body">
                            <form class="required-form" action="{{ route('admin.website.policies.update') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="about_us" class="form-label ol-form-label">{{ get_phrase('About us') }}</label>
                                    <textarea name="about_us" rows="4" class="form-control ol-form-control text_editor" id="about_us" placeholder="{{ get_phrase('About us') }}">{{ get_frontend_settings('about_us') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="terms_and_conditions" class="form-label ol-form-label">{{ get_phrase('Terms & Conditions') }}</label>
                                    <textarea name="terms_and_conditions" rows="4" class="form-control ol-form-control text_editor" id="terms_and_conditions" placeholder="{{ get_phrase('Terms & Conditions') }}">{{ get_frontend_settings('terms_and_conditions') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="privacy_policy" class="form-label ol-form-label">{{ get_phrase('Privacy policy') }}</label>
                                    <textarea name="privacy_policy" rows="4" class="form-control ol-form-control text_editor" id="privacy_policy" placeholder="{{ get_phrase('Website privacy policy') }}">{{ get_frontend_settings('privacy_policy') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="refund_policy" class="form-label ol-form-label">{{ get_phrase('Refund policy') }}</label>
                                    <textarea name="refund_policy" rows="4" class="form-control ol-form-control text_editor" id="refund_policy" placeholder="{{ get_phrase('Website Refund policy') }}">{{ get_frontend_settings('refund_policy') }}</textarea>
                                </div>


                                <div class="fpb-7 mb-3">
                                    <button type="submit" class="btn ol-btn-primary">{{ get_phrase('Update Policy') }}</button>
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
@endpush
