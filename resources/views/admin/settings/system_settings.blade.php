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
                            <label for="sms_gateway" class="form-label ol-form-label"> {{get_phrase('SMS OTP Gateway Provider')}} </label>
                            <select name="sms_gateway" id="sms_gateway" class="form-control ol-form-control ol-select2" onchange="toggleSmsFields()" required>
                                <option value="mock" @if(get_settings('sms_gateway') == 'mock' || get_settings('sms_gateway') === null) selected @endif>
                                    {{ get_phrase('Mock Test Mode (Internal Testing - Instant code 123456)') }}
                                </option>
                                <option value="firebase" @if(get_settings('sms_gateway') == 'firebase') selected @endif>
                                    {{ get_phrase('Firebase Phone Authentication (Client-side SMS)') }}
                                </option>  
                                <option value="custom" @if(get_settings('sms_gateway') == 'custom') selected @endif>
                                    {{ get_phrase('Custom HTTP API SMS Gateway (Server-side SMS)') }}
                                </option>  
                                <option value="whatsapp" @if(get_settings('sms_gateway') == 'whatsapp') selected @endif>
                                    {{ get_phrase('WhatsApp Gateway (Evolution API / Baileys)') }}
                                </option>  
                            </select>
                        </div>

                        <!-- Custom SMS API Field -->
                        <div class="mb-3 d-none" id="custom_sms_wrapper">
                            <label for="custom_sms_url" class="form-label ol-form-label">{{ get_phrase('Custom SMS Gateway HTTP API URL') }}</label>
                            <input type="text" value="{{ get_settings('custom_sms_url') }}" name="custom_sms_url" class="form-control ol-form-control" id="custom_sms_url" placeholder="https://api.fast2sms.com/dev/bulkV2?authorization=API_KEY&route=otp&variables_values=OTP&numbers=PHONE">
                            <small class="text-muted d-block mt-1">
                                Use placeholders <strong>PHONE</strong> and <strong>OTP</strong>. The system will replace them dynamically (e.g. `PHONE` -> `9876543210`, `OTP` -> `524185`).
                            </small>
                        </div>

                        <!-- WhatsApp API Fields -->
                        <div class="mb-3 d-none" id="whatsapp_settings_wrapper">
                            <div class="mb-3">
                                <label for="whatsapp_api_url" class="form-label ol-form-label">{{ get_phrase('WhatsApp API Base URL') }}</label>
                                <input type="text" value="{{ get_settings('whatsapp_api_url') }}" name="whatsapp_api_url" class="form-control ol-form-control" id="whatsapp_api_url" placeholder="http://localhost:8080">
                                <small class="text-muted d-block mt-1">Include the protocol (e.g. <code>http://</code> or <code>https://</code>).</small>
                            </div>
                            <div class="mb-3">
                                <label for="whatsapp_instance" class="form-label ol-form-label">{{ get_phrase('WhatsApp Instance Name') }}</label>
                                <input type="text" value="{{ get_settings('whatsapp_instance') }}" name="whatsapp_instance" class="form-control ol-form-control" id="whatsapp_instance" placeholder="my-business">
                            </div>
                            <div class="mb-3">
                                <label for="whatsapp_api_key" class="form-label ol-form-label">{{ get_phrase('WhatsApp API Key / Auth Token') }}</label>
                                <input type="text" value="{{ get_settings('whatsapp_api_key') }}" name="whatsapp_api_key" class="form-control ol-form-control" id="whatsapp_api_key" placeholder="API_KEY_HERE">
                            </div>
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

                        <!-- Firebase Configuration Card/Section -->
                        <div class="card mt-4 border border-secondary rounded-3 overflow-hidden mb-4">
                            <div class="card-header bg-dark text-white p-3 d-flex align-items-center justify-content-between">
                                <h5 class="mb-0 text-white fs-16px"><i class="fas fa-fire me-2 text-warning"></i>{{ get_phrase('Firebase OTP Auth Configuration') }}</h5>
                                <span class="badge bg-secondary text-uppercase">{{ get_phrase('Optional') }}</span>
                            </div>
                            <div class="card-body bg-light p-4">
                                
                                <div class="mb-3">
                                    <label for="firebase_api_key" class="form-label ol-form-label">{{ get_phrase('Firebase API Key') }}</label>
                                    <input type="text" value="{{ get_settings('firebase_api_key') }}" name="firebase_api_key" class="form-control ol-form-control bg-white" id="firebase_api_key" placeholder="AIzaSyA1...">
                                </div>

                                <div class="mb-3">
                                    <label for="firebase_auth_domain" class="form-label ol-form-label">{{ get_phrase('Firebase Auth Domain') }}</label>
                                    <input type="text" value="{{ get_settings('firebase_auth_domain') }}" name="firebase_auth_domain" class="form-control ol-form-control bg-white" id="firebase_auth_domain" placeholder="your-app.firebaseapp.com">
                                </div>

                                <div class="mb-3">
                                    <label for="firebase_project_id" class="form-label ol-form-label">{{ get_phrase('Firebase Project ID') }}</label>
                                    <input type="text" value="{{ get_settings('firebase_project_id') }}" name="firebase_project_id" class="form-control ol-form-control bg-white" id="firebase_project_id" placeholder="your-app-id">
                                </div>

                                <div class="mb-3">
                                    <label for="firebase_storage_bucket" class="form-label ol-form-label">{{ get_phrase('Firebase Storage Bucket') }}</label>
                                    <input type="text" value="{{ get_settings('firebase_storage_bucket') }}" name="firebase_storage_bucket" class="form-control ol-form-control bg-white" id="firebase_storage_bucket" placeholder="your-app.appspot.com">
                                </div>

                                <div class="mb-3">
                                    <label for="firebase_messaging_sender_id" class="form-label ol-form-label">{{ get_phrase('Firebase Messaging Sender ID') }}</label>
                                    <input type="text" value="{{ get_settings('firebase_messaging_sender_id') }}" name="firebase_messaging_sender_id" class="form-control ol-form-control bg-white" id="firebase_messaging_sender_id" placeholder="123456789012">
                                </div>

                                <div class="mb-3">
                                    <label for="firebase_app_id" class="form-label ol-form-label">{{ get_phrase('Firebase App ID') }}</label>
                                    <input type="text" value="{{ get_settings('firebase_app_id') }}" name="firebase_app_id" class="form-control ol-form-control bg-white" id="firebase_app_id" placeholder="1:123456789012:web:1234567890abcdef">
                                </div>

                                <!-- Collapsible Step-by-Step Setup Guide -->
                                <div class="accordion mt-4 border rounded" id="guideAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingGuide">
                                            <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGuide" aria-expanded="false" aria-controls="collapseGuide">
                                                <i class="fas fa-info-circle text-primary me-2"></i>{{ get_phrase('Step-by-Step Guide: How to Get Firebase Credentials') }}
                                            </button>
                                        </h2>
                                        <div id="collapseGuide" class="accordion-collapse collapse" aria-labelledby="headingGuide" data-bs-parent="#guideAccordion">
                                            <div class="accordion-body bg-white text-dark lh-base fs-13px" style="max-height: 400px; overflow-y: auto;">
                                                
                                                <div class="alert alert-warning mb-3 p-3 text-13px" style="border-left: 4px solid #ffc107; background: #fffdf5;">
                                                    <h6 class="fw-bold mb-1 text-dark"><i class="fas fa-exclamation-triangle me-1 text-warning"></i> Firebase Billing Plan Notice (SMS Verification)</h6>
                                                    If you get the error <strong>auth/billing-not-enabled</strong>, it means your Firebase project is currently on the Spark (Free) plan. Firebase requires projects to be upgraded to the <strong>Blaze (Pay-As-You-Go) plan</strong> to use Phone Authentication.
                                                    <ul class="ps-3 mt-1 mb-0">
                                                        <li>Firebase still offers a generous free tier of 10,000 free verifications per month.</li>
                                                        <li>To upgrade, click the <strong>Upgrade</strong> button at the bottom-left corner of the Firebase console dashboard.</li>
                                                    </ul>
                                                </div>

                                                <ol class="ps-3 mb-0">
                                                    <li class="mb-3">
                                                        <strong>{{ get_phrase('Go to Firebase Console') }}:</strong><br>
                                                        Open <a href="https://console.firebase.google.com/" target="_blank" class="text-primary text-decoration-underline">Firebase Console</a> and log in with your Google Account.
                                                    </li>
                                                    <li class="mb-3">
                                                        <strong>{{ get_phrase('Create a Firebase Project') }}:</strong><br>
                                                        Click <strong>Add Project</strong>, enter a project name, choose configuration settings (Google Analytics is optional), and click <strong>Create Project</strong>.
                                                    </li>
                                                    <li class="mb-3">
                                                        <strong>{{ get_phrase('Enable Phone Authentication') }}:</strong><br>
                                                        In the left sidebar, click <strong>Build</strong> -> <strong>Authentication</strong>. Click <strong>Get Started</strong>. Under the <strong>Sign-in method</strong> tab, select <strong>Phone</strong>, switch the enable toggle, and click <strong>Save</strong>.
                                                    </li>
                                                    <li class="mb-3">
                                                        <strong>{{ get_phrase('Register a Web App') }}:</strong><br>
                                                        On the Project Overview page, click the <strong>Web icon (&lt;/&gt;)</strong> to add an app. Enter an App Nickname, click <strong>Register App</strong>.
                                                    </li>
                                                    <li class="mb-3">
                                                        <strong>{{ get_phrase('Copy Firebase Configuration keys') }}:</strong><br>
                                                        Copy the credentials from the `firebaseConfig` block on the screen, paste them into the input fields above, and save.
                                                    </li>
                                                    <li class="mb-3">
                                                        <strong>{{ get_phrase('Add Authorized Domains') }}:</strong><br>
                                                        Go back to <strong>Authentication</strong> -> <strong>Settings</strong> tab -> <strong>Authorized domains</strong>. Click <strong>Add domain</strong> and enter your website domain (e.g. `yourwebsite.com` or local testing domain `127.0.0.1`).
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
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
<script>
    "use strict";

    function toggleSmsFields() {
        let gateway = $('#sms_gateway').val();
        
        // Hide all conditional wrappers
        $('#custom_sms_wrapper').addClass('d-none');
        $('#whatsapp_settings_wrapper').addClass('d-none');
        
        if (gateway === 'custom') {
            $('#custom_sms_wrapper').removeClass('d-none');
        } else if (gateway === 'whatsapp') {
            $('#whatsapp_settings_wrapper').removeClass('d-none');
        }
    }

    $(document).ready(function() {
        toggleSmsFields();
    });
</script>
@endpush
