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
                    <div class="d-flex align-items-center flex-wrap column-gap-12px row-gap-2 justify-content-center justify-content-md-start top-header-contacts">
                        <div class="d-flex column-gap-2px align-items-start contact-info-line header-phone">
                            <span class="svg-block">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.215 8.5625C12.8925 8.5625 12.6375 8.3 12.6375 7.985C12.6375 7.7075 12.36 7.13 11.895 6.6275C11.4375 6.14 10.935 5.855 10.515 5.855C10.1925 5.855 9.9375 5.5925 9.9375 5.2775C9.9375 4.9625 10.2 4.7 10.515 4.7C11.265 4.7 12.0525 5.105 12.7425 5.8325C13.3875 6.515 13.8 7.3625 13.8 7.9775C13.8 8.3 13.5375 8.5625 13.215 8.5625Z" fill="#0E1B29"/>
                                    <path d="M15.9226 8.5625C15.6001 8.5625 15.3451 8.3 15.3451 7.985C15.3451 5.3225 13.1776 3.1625 10.5226 3.1625C10.2001 3.1625 9.94507 2.9 9.94507 2.585C9.94507 2.27 10.2001 2 10.5151 2C13.8151 2 16.5001 4.685 16.5001 7.985C16.5001 8.3 16.2376 8.5625 15.9226 8.5625Z" fill="#0E1B29"/>
                                    <path d="M8.2875 11.7125L6.9 13.1C6.6075 13.3925 6.1425 13.3925 5.8425 13.1075C5.76 13.025 5.6775 12.95 5.595 12.8675C4.8225 12.0875 4.125 11.27 3.5025 10.415C2.8875 9.56 2.3925 8.705 2.0325 7.8575C1.68 7.0025 1.5 6.185 1.5 5.405C1.5 4.895 1.59 4.4075 1.77 3.9575C1.95 3.5 2.235 3.08 2.6325 2.705C3.1125 2.2325 3.6375 2 4.1925 2C4.4025 2 4.6125 2.045 4.8 2.135C4.995 2.225 5.1675 2.36 5.3025 2.555L7.0425 5.0075C7.1775 5.195 7.275 5.3675 7.3425 5.5325C7.41 5.69 7.4475 5.8475 7.4475 5.99C7.4475 6.17 7.395 6.35 7.29 6.5225C7.1925 6.695 7.05 6.875 6.87 7.055L6.3 7.6475C6.2175 7.73 6.18 7.8275 6.18 7.9475C6.18 8.0075 6.1875 8.06 6.2025 8.12C6.225 8.18 6.2475 8.225 6.2625 8.27C6.3975 8.5175 6.63 8.84 6.96 9.23C7.2975 9.62 7.6575 10.0175 8.0475 10.415C8.1225 10.49 8.205 10.565 8.28 10.64C8.58 10.9325 8.5875 11.4125 8.2875 11.7125Z" fill="#0E1B29"/>
                                    <path d="M16.4775 14.2475C16.4775 14.4575 16.44 14.675 16.365 14.885C16.3425 14.945 16.32 15.005 16.29 15.065C16.1625 15.335 15.9975 15.59 15.78 15.83C15.4125 16.235 15.0075 16.5275 14.55 16.715C14.5425 16.715 14.535 16.7225 14.5275 16.7225C14.085 16.9025 13.605 17 13.0875 17C12.3225 17 11.505 16.82 10.6425 16.4525C9.77998 16.085 8.91748 15.59 8.06248 14.9675C7.76998 14.75 5.9025 13.1075 5.625 12.875L8.25 10.625C8.46 10.7825 10.05 12.125 10.2075 12.2075C10.245 12.2225 10.29 12.245 10.3425 12.2675C10.4025 12.29 10.4625 12.2975 10.53 12.2975C10.6575 12.2975 10.755 12.2525 10.8375 12.17L11.4075 11.6075C11.595 11.42 11.775 11.2775 11.9475 11.1875C12.12 11.0825 12.2925 11.03 12.48 11.03C12.6225 11.03 12.7725 11.06 12.9375 11.1275C13.1025 11.195 13.275 11.2925 13.4625 11.42L15.945 13.1825C16.14 13.3175 16.275 13.475 16.3575 13.6625C16.4325 13.85 16.4775 14.0375 16.4775 14.2475Z" fill="#0E1B29"/>
                                </svg>
                            </span>
                            <p class="mt-1 al-subtitle3-14px lh-1 text-break">{{get_settings('phone')}}</p>
                        </div>
                        <div class="d-flex column-gap-2px align-items-start">
                            <span class="svg-block">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.75 3.125H5.25C3 3.125 1.5 4.25 1.5 6.875V12.125C1.5 14.75 3 15.875 5.25 15.875H12.75C15 15.875 16.5 14.75 16.5 12.125V6.875C16.5 4.25 15 3.125 12.75 3.125ZM13.1025 7.6925L10.755 9.5675C10.26 9.965 9.63 10.16 9 10.16C8.37 10.16 7.7325 9.965 7.245 9.5675L4.8975 7.6925C4.6575 7.4975 4.62 7.1375 4.8075 6.8975C5.0025 6.6575 5.355 6.6125 5.595 6.8075L7.9425 8.6825C8.5125 9.14 9.48 9.14 10.05 8.6825L12.3975 6.8075C12.6375 6.6125 12.9975 6.65 13.185 6.8975C13.38 7.1375 13.3425 7.4975 13.1025 7.6925Z" fill="#0E1B29"/>
                                </svg>
                            </span>
                            <p class="mt-1 al-subtitle3-14px lh-1 text-break">{{get_phrase('Email :')}} {{get_settings('system_email')}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap column-gap-12px row-gap-2 justify-content-center justify-content-md-end top-header-selects">
                        @php
                            $active_language = App\Models\Language::where('id', session('active_lan_id') ?? get_settings('active_lan_id'))->firstOrNew();
                        @endphp
                        <form action="{{ route('home.switch_language') }}" onchange="$(this).submit();">
                            <select class="white-borderless-select right ec-nice-select list-index-1041" name="active_lan_id">
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