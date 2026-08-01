{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
<!-- Top Header Start -->
<style>
    @media (max-width: 576px) {
    .header-phone {
        display: none !important;
    }

    .contact-wrapper {
         flex-direction: row !important;
        width: 100%;
        justify-content: space-between !important;
    }
}

</style>

<!-- Top Header Start -->
<section class="top-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center justify-content-md-between flex-column flex-md-row flex-wrap column-gap-4 row-gap-2 contact-wrapper">
                    <div class="d-flex align-items-center flex-wrap column-gap-4 row-gap-2 justify-content-center justify-content-md-start flex-column flex-sm-row">
                        <div class="d-flex column-gap-2px align-items-start header-phone">
                            <img src="{{ asset('assets/frontend/grocery/images/image-icons/call-calling-white-18.svg') }}" alt="icon">
                            <p class="text-white mt-2px al-subtitle-14px lh-1">{{get_settings('phone')}}</p>
                        </div>
                        <div class="d-flex column-gap-2px align-items-start">
                            <img src="{{ asset('assets/frontend/grocery/images/image-icons/sms-white-18.svg') }}" alt="icon">
                            <p class="text-white mt-2px al-subtitle-14px lh-1">{{ get_phrase('Email') }} : {{get_settings('system_email')}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap column-gap-4 row-gap-2 justify-content-center justify-content-md-end flex-column flex-sm-row">
                       
                        @php
                            $active_language = App\Models\Language::where('id', session('active_lan_id') ?? get_settings('active_lan_id'))->firstOrNew();
                        @endphp
                        <form action="{{ route('home.switch_language') }}" onchange="$(this).submit();">
                            <select name="active_lan_id" class="white-borderless-select right ec-nice-select list-index-1041">
                                @foreach (App\Models\Language::all() as $language)
                                    <option value="{{ $language->id }}" {{ $language->id == $active_language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Header End -->