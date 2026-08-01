@extends('layouts.admin')

@push('title', get_phrase('Store Settings'))

@section('content')


    <div class="row">
        <div class="col-md-7">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form action="{{ route('admin.store.settings.update', ['id' => $store->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="currency" class="form-label ol-form-label">{{ get_phrase('Currency') }}</label>
                            <input type="text" value="{{ $store->settings->currency ?? '' }}" name="currency"
                                class="form-control ol-form-control" id="currency"
                                placeholder="{{ get_phrase('Enter currency code, e.g., USD') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="vat_type" class="form-label ol-form-label">{{ get_phrase('VAT Type') }}</label>
                            <select name="vat_type" id="vat_type" class="form-control ol-form-control" required>
                                <option value="percentage"
                                    {{ ($store->settings->vat_type ?? '') == 'percentage' ? 'selected' : '' }}>
                                    {{ get_phrase('Percentage') }}
                                </option>
                                <option value="flat" {{ ($store->settings->vat_type ?? '') == 'flat' ? 'selected' : '' }}>
                                    {{ get_phrase('Flat') }}
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="vat_value" class="form-label ol-form-label">{{ get_phrase('VAT Value') }}</label>
                            <input type="number" name="vat_value" id="vat_value" class="form-control ol-form-control"
                                value="{{ $store->settings->vat_value ?? '' }}"
                                placeholder="{{ get_phrase('Enter VAT value') }}" min="0" step="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="shipping_cost"
                                class="form-label ol-form-label">{{ get_phrase('Shipping Cost') }}</label>
                            <input type="number" name="shipping_cost" id="shipping_cost"
                                class="form-control ol-form-control" value="{{ $store->settings->shipping_cost ?? '' }}"
                                placeholder="{{ get_phrase('Enter shipping cost') }}" min="0" step="0.01"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="timezone" class="form-label ol-form-label">{{ get_phrase('Timezone') }}</label>
                            <input type="text" value="{{ $store->settings->timezone ?? '' }}" name="timezone"
                                class="form-control ol-form-control" id="timezone"
                                placeholder="{{ get_phrase('e.g., Asia/Dhaka') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="store_email"
                                class="form-label ol-form-label">{{ get_phrase('Store Email') }}</label>
                            <input type="email" value="{{ $store->settings->store_email ?? '' }}" name="store_email"
                                class="form-control ol-form-control" id="store_email"
                                placeholder="{{ get_phrase('Enter store contact email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="support_phone"
                                class="form-label ol-form-label">{{ get_phrase('Support Phone') }}</label>
                            <input type="text" value="{{ $store->settings->support_phone ?? '' }}" name="support_phone"
                                class="form-control ol-form-control" id="support_phone"
                                placeholder="{{ get_phrase('Enter support phone') }}">
                        </div>

                        <div class="mb-3">
                            <label for="facebook_url"
                                class="form-label ol-form-label">{{ get_phrase('Facebook URL') }}</label>
                            <input type="url" value="{{ $store->settings->facebook_url ?? '' }}" name="facebook_url"
                                class="form-control ol-form-control" id="facebook_url"
                                placeholder="https://facebook.com/yourstore">
                        </div>

                        <div class="mb-3">
                            <label for="instagram_url"
                                class="form-label ol-form-label">{{ get_phrase('Instagram URL') }}</label>
                            <input type="url" value="{{ $store->settings->instagram_url ?? '' }}" name="instagram_url"
                                class="form-control ol-form-control" id="instagram_url"
                                placeholder="https://instagram.com/yourstore">
                        </div>

                        <div class="mb-3">
                            <label for="twitter_url"
                                class="form-label ol-form-label">{{ get_phrase('Twitter URL') }}</label>
                            <input type="url" value="{{ $store->settings->twitter_url ?? '' }}" name="twitter_url"
                                class="form-control ol-form-control" id="twitter_url"
                                placeholder="https://twitter.com/yourstore">
                        </div>

                        
                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Update Settings') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
