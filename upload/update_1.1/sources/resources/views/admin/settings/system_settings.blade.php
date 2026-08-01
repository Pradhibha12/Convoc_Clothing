@extends('layouts.admin')
@push('title', get_phrase('System settings'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')


    <div class="row">
        <div class="col-md-7">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form action="{{ route('admin.system.settings.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="system_name" class="form-label ol-form-label">{{ get_phrase('System name') }}</label>
                            <input type="text" value="{{ get_settings('system_name') }}" name="system_name" class="form-control ol-form-control" id="system_name" placeholder="{{ get_phrase('Enter system name') }}" aria-label="{{ get_phrase('Enter system name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="system_title" class="form-label ol-form-label">{{ get_phrase('System title') }}</label>
                            <input type="text" value="{{ get_settings('system_title') }}" name="system_title" class="form-control ol-form-control" id="system_title" placeholder="{{ get_phrase('Enter system title') }}" aria-label="{{ get_phrase('Enter system title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="system_email" class="form-label ol-form-label">{{ get_phrase('System email') }}</label>
                            <input type="email" value="{{ get_settings('system_email') }}" name="system_email" class="form-control ol-form-control" id="system_email" placeholder="{{ get_phrase('Enter system email') }}" aria-label="{{ get_phrase('Enter system email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label ol-form-label">{{ get_phrase('Phone') }}</label>
                            <input type="text" value="{{ get_settings('phone') }}" name="phone" class="form-control ol-form-control" id="phone" placeholder="{{ get_phrase('Enter phone number') }}" aria-label="{{ get_phrase('Enter phone number') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label ol-form-label">{{ get_phrase('Summary') }}</label>
                            <textarea name="summary" id="summary" class="form-control" rows="4">{{ get_settings('summary') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label ol-form-label">{{ get_phrase('Address') }}</label>
                            <textarea name="address" id="address" class="form-control">{{ get_settings('address') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="active_lan_id" class="form-label ol-form-label">{{ get_phrase('System language') }}</label>
                            <select class="ol-select2" name="active_lan_id" id="active_lan_id">
                                <option value="">{{ get_phrase('Select a category') }}</option>
                                @foreach (App\Models\Language::get() as $language)
                                    <option value="{{ $language->id }}" @if ($language->id == get_settings('active_lan_id')) selected @endif>{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="purchase_code" class="form-label ol-form-label">{{ get_phrase('Purchase code') }}</label>
                            <input type="text" value="{{ get_settings('purchase_code') }}" name="purchase_code" class="form-control ol-form-control" id="purchase_code" placeholder="{{ get_phrase('Enter purchase code') }}" aria-label="{{ get_phrase('Enter purchase code') }}" required>
                        </div>

                         <div class="mb-3">
                            <label for="verification" class="form-label ol-form-label"> {{get_phrase('Email Verification')}} </label>
                            <select name="signup_email_verification" id="verification" class="form-control ol-form-control ol-select2"  required>
                                <option value="">{{get_phrase('Select email verification')}} </option>
                                <option value="1" @if(get_settings('signup_email_verification') == 1) selected @endif>
                                    {{ get_phrase('Enable') }}
                                </option>
                                <option value="0" @if(get_settings('signup_email_verification') == 0) selected @endif>
                                    {{ get_phrase('Disable') }}
                                </option>  
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="timezone" class="form-label ol-form-label">{{ __('TimeZone') }}</label>
                            <select class="ol-select2" id="timezone" name="timezone">
                                <?php $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL); ?>
                                <?php foreach ($tzlist as $tz): ?>
                                    <option value="{{ $tz }}" {{ $tz == get_settings('timezone') ? 'selected' : '' }}>{{ $tz }}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        
                         <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="facebook">{{ get_phrase('Facebook') }}</label>
                            <input type="text" name = "contact_facebook" id = "facebook" class="form-control ol-form-control" value="{{ get_settings('contact_facebook') }}">
                        </div>

                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="twitter">{{ get_phrase('Twitter') }}</label>
                            <input type="text" name = "contact_twitter" id = "twitter" class="form-control ol-form-control" value="{{ get_settings('contact_twitter') }}">
                        </div>

                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="linkedin">{{ get_phrase('Linkedin') }}</label>
                            <input type="text" name = "contact_linkedin" id = "linkedin" class="form-control ol-form-control" value="{{ get_settings('contact_linkedin') }}">
                        </div>
                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="instagram">{{ get_phrase('Instagram') }}</label>
                            <input type="text" name = "contact_instagram" id = "instagram" class="form-control ol-form-control" value="{{ get_settings('contact_instagram') }}">
                        </div>

                        <div class="mb-3">
                            <label for="system_video" class="form-label ol-form-label">{{ get_phrase('System Video') }}</label>
                            <input type="text" value="{{ get_settings('system_video') }}" name="system_video" class="form-control ol-form-control" id="system_video" placeholder="{{ get_phrase('Enter system video') }}" aria-label="{{ get_phrase('Enter system video') }}">
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Save changes') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="ol-card p-4">
                <h3 class="title text-14px mb-3">{{ get_phrase('Update your software version') }}</h3>
                <div class="ol-card-body">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.setting.version.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="fpb-7 mb-3">
                                <label class="form-label ol-form-label" class="">{{ get_phrase('Update pack') }} <small>(.zip)</small></label>

                                <input type="file" class="form-control ol-form-control" id="file_name" name="file" required onchange="changeTitleOfImageUploader(this)">
                                <small>
                                    {!!get_phrase('Your current version is ____', '<b>'.get_settings('version').'</b>')!!}
                                </small>
                            </div>

                            <button type="submit" class="btn ol-btn-primary">{{ get_phrase('Update') }}</button>
                        </form>
                    </div>
                </div> <!-- end card body-->
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
