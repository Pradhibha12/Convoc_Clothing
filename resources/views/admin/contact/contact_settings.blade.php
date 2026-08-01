@extends('layouts.admin')
@push('title', get_phrase('Contact Page Settings'))

@section('content')
    <form action="{{ route('admin.contact.settings.update') }}" method="post">
        @csrf
        <div class="row">
            <!-- Basic Contact Info -->
            <div class="col-lg-6 mb-4">
                <div class="ol-card h-100">
                    <div class="ol-card-body p-4">
                        <h4 class="title fs-18px mb-3">{{ get_phrase('Contact Details') }}</h4>

                        <div class="mb-3">
                            <label for="contact_title" class="form-label ol-form-label">{{ get_phrase('Page Main Heading') }}</label>
                            <input type="text" name="contact_title" value="{{ get_settings('contact_title') ?? 'Contact Us' }}" class="form-control ol-form-control" id="contact_title">
                        </div>

                        <div class="mb-3">
                            <label for="contact_subtitle" class="form-label ol-form-label">{{ get_phrase('Form Subtitle / Intro Message') }}</label>
                            <textarea name="contact_subtitle" rows="3" class="form-control ol-form-control" id="contact_subtitle">{{ get_settings('contact_subtitle') ?? "We'd love to hear from you about our entire service. Your comments and suggestions will be highly appreciated. Please complete the form below." }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="contact_email" class="form-label ol-form-label">{{ get_phrase('Contact Email') }}</label>
                            <input type="email" value="{{ get_settings('contact_email') ?? get_settings('system_email') }}" name="contact_email" class="form-control ol-form-control" id="contact_email" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_phone" class="form-label ol-form-label">{{ get_phrase('Contact Phone') }}</label>
                            <input type="text" value="{{ get_settings('contact_phone') ?? get_settings('phone') }}" name="contact_phone" class="form-control ol-form-control" id="contact_phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_address" class="form-label ol-form-label">{{ get_phrase('Physical Address') }}</label>
                            <textarea name="contact_address" id="contact_address" rows="3" class="form-control ol-form-control" required>{{ get_settings('contact_address') ?? get_settings('address') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map & Cards Information -->
            <div class="col-lg-6 mb-4">
                <div class="ol-card h-100">
                    <div class="ol-card-body p-4">
                        <h4 class="title fs-18px mb-3">{{ get_phrase('Map & Quick Cards') }}</h4>

                        <div class="mb-3">
                            <label for="contact_map_iframe" class="form-label ol-form-label">{{ get_phrase('Google Map Embed URL / Query') }}</label>
                            <input type="text" name="contact_map_iframe" value="{{ get_settings('contact_map_iframe') }}" class="form-control ol-form-control" id="contact_map_iframe" placeholder="e.g. https://www.google.com/maps?q=Address&output=embed (Leave empty to use address)">
                            <small class="text-muted d-block mt-1">{{ get_phrase('If empty, Google Maps will automatically embed your address.') }}</small>
                        </div>

                        <hr class="my-4">
                        <h5 class="fs-16px mb-3 fw-semibold">{{ get_phrase('Contact Cards Content') }}</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_support_title" class="form-label ol-form-label">{{ get_phrase('Card 1 Title (Support)') }}</label>
                                <input type="text" name="contact_support_title" value="{{ get_settings('contact_support_title') ?? 'Chat to support' }}" class="form-control ol-form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_support_subtitle" class="form-label ol-form-label">{{ get_phrase('Card 1 Subtitle') }}</label>
                                <input type="text" name="contact_support_subtitle" value="{{ get_settings('contact_support_subtitle') ?? 'We’re here to help.' }}" class="form-control ol-form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_visit_title" class="form-label ol-form-label">{{ get_phrase('Card 2 Title (Visit)') }}</label>
                                <input type="text" name="contact_visit_title" value="{{ get_settings('contact_visit_title') ?? 'Visit us' }}" class="form-control ol-form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_visit_subtitle" class="form-label ol-form-label">{{ get_phrase('Card 2 Subtitle') }}</label>
                                <input type="text" name="contact_visit_subtitle" value="{{ get_settings('contact_visit_subtitle') ?? 'Visit our office HQ' }}" class="form-control ol-form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_call_title" class="form-label ol-form-label">{{ get_phrase('Card 3 Title (Call)') }}</label>
                                <input type="text" name="contact_call_title" value="{{ get_settings('contact_call_title') ?? 'Call Us' }}" class="form-control ol-form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_call_subtitle" class="form-label ol-form-label">{{ get_phrase('Card 3 Subtitle') }}</label>
                                <input type="text" name="contact_call_subtitle" value="{{ get_settings('contact_call_subtitle') ?? 'Reach out to us for any inquiries.' }}" class="form-control ol-form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn ol-btn-primary px-5">{{ get_phrase('Save Contact Settings') }}</button>
        </div>
    </form>
@endsection
