@extends('layouts.frontend')
@push('title', 'Contact Us')
@push('meta')
@endpush
@push('css')
<style>
    .iFrame iframe{
        border:0;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .contact-card {
    border: 1px solid #D0D2D8;
    border-radius: 16px;
    padding: 28px;
    transition: .2s ease;
}

.contact-card:hover {
    box-shadow: 0 8px 22px rgba(0,0,0,0.05);
}

.icon-box {
    width: 64px;
    height: 64px;
    border: 1px solid #D0D2D8;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 40px;
}



.contact-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 8px;
}

.contact-text {
    font-size: 15px;
    color: #6b7280;
    margin-bottom: 12px;
}

.contact-link {
    font-size: 15px;
    text-decoration: underline;
    font-weight: 500;
}

</style>
@endpush

@php
    $c_title = get_settings('contact_title') ?? 'Contact Us';
    $c_subtitle = get_settings('contact_subtitle') ?? "We'd love to hear from you about our entire service. Your comments and suggestions will be highly appreciated. Please complete the form below.";
    $c_email = get_settings('contact_email') ?? get_settings('system_email');
    $c_phone = get_settings('contact_phone') ?? get_settings('phone');
    $c_address = get_settings('contact_address') ?? get_settings('address');
    $c_map = get_settings('contact_map_iframe') ?: 'https://www.google.com/maps?q=' . urlencode($c_address) . '&output=embed';
    
    $c_support_title = get_settings('contact_support_title') ?? 'Chat to support';
    $c_support_subtitle = get_settings('contact_support_subtitle') ?? 'We’re here to help.';
    $c_visit_title = get_settings('contact_visit_title') ?? 'Visit us';
    $c_visit_subtitle = get_settings('contact_visit_subtitle') ?? 'Visit our office HQ';
    $c_call_title = get_settings('contact_call_title') ?? 'Call Us';
    $c_call_subtitle = get_settings('contact_call_subtitle') ?? 'Reach out to us for any inquiries.';
@endphp

@section('content')

    <!-- Breadcrumb Area Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area mt-30px mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                        <h1 class="al-title-42px text-center mb-20px">{{ get_phrase($c_title) }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fsh-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ get_phrase($c_title) }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->


    <!-- Contact Area Start -->
    <section>
        <div class="container">
            <div class="row gy-4 mb-100px">
                <div class="col-xl-8 col-lg-7 wow animate__fadeInUp" data-wow-delay=".2s">
                    <div>
                        <div class="mb-30px">
                            <h1 class="al-title-30px mb-3">{{ get_phrase('Get in Touch') }}</h1>
                            <p class="al-subtitle3-16px lh-base">{{ get_phrase($c_subtitle) }}</p>
                        </div>
                        <form action="{{ route('contact_us.store') }}" method="post">
                            @csrf
                            <div class="row gy-4 mb-20px">
                                <div class="col-md-6">
                                    <label for="user-name" class="form-label fsh-form-label mb-3">{{ get_phrase('Name') }}</label>
                                    <input type="text" name="name" class="form-control fsh-form-control" id="user-name" placeholder="{{ get_phrase('Your name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="user-email" class="form-label fsh-form-label mb-3">{{ get_phrase('Email') }}</label>
                                    <input type="email" name="email" class="form-control fsh-form-control" id="user-email" placeholder="{{ get_phrase('Your email') }}" required>
                                </div>
                            </div>
                            <div class="mb-20px">
                                <label for="user-phone" class="form-label fsh-form-label mb-3">{{ get_phrase('Phone') }}</label>
                                <input type="text" name="phone" class="form-control fsh-form-control" id="user-phone" placeholder="{{ get_phrase('Your phone') }}">
                            </div>
                            <div class="mb-20px">
                                <label for="user-message" class="form-label fsh-form-label mb-3">{{ get_phrase('Message') }}</label>
                                <textarea class="form-control fsh-form-textarea" name="message" id="user-message" rows="5" placeholder="{{ get_phrase('Type your message...') }}" required></textarea>
                            </div>
                            <button type="submit" class="btn fsh-btn-dark">{{ get_phrase('SUBMIT') }}</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 wow animate__fadeInUp" data-wow-delay=".3s">
                    <div class="iFrame">
                     <iframe 
                        src="{{ $c_map }}" width="100%" height="550" allowfullscreen="" 
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                       </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->
    <!-- Contact Cards Start -->
    <section class="wow animate__fadeInUp" data-wow-delay=".2s">
        <div class="container">
            <div class="row gy-4 mb-100px">
                <div class="col-xl-12 wow animate__fadeInUp" data-wow-delay=".2s">
                    <div>
                        <div class="mb-30px text-center">
                            <h1 class="al-title-30px mb-3">{{ get_phrase('Contact our friendly team') }}</h1>
                            <p class="al-subtitle3-16px lh-base">{{ get_phrase("Let us know how we can help.") }}</p>
                        </div>
                    </div>
                    <div class="row mt-4 gy-4 mb-4">
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="contact-card">
                                <div class="icon-box">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29.3385 13.3327V17.3327C29.3385 22.666 26.6719 25.3327 21.3385 25.3327H20.6719C20.2585 25.3327 19.8585 25.5327 19.6052 25.866L17.6052 28.5327C16.7252 29.706 15.2852 29.706 14.4052 28.5327L12.4052 25.866C12.1919 25.5727 11.6985 25.3327 11.3385 25.3327H10.6719C5.33854 25.3327 2.67188 23.9993 2.67188 17.3327V10.666C2.67188 5.33268 5.33854 2.66602 10.6719 2.66602H18.6719" stroke="#2B2F36" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M26.0052 9.33268C27.8462 9.33268 29.3385 7.8403 29.3385 5.99935C29.3385 4.1584 27.8462 2.66602 26.0052 2.66602C24.1643 2.66602 22.6719 4.1584 22.6719 5.99935C22.6719 7.8403 24.1643 9.33268 26.0052 9.33268Z" stroke="#2B2F36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21.3312 14.6667H21.3432" stroke="#2B2F36" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.9953 14.6667H16.0073" stroke="#2B2F36" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.6593 14.6667H10.6713" stroke="#2B2F36" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </div>

                                <h4 class="contact-title">{{ get_phrase($c_support_title) }}</h4>
                                <p class="contact-text">{{ get_phrase($c_support_subtitle) }}</p>
                                <a href="mailto:{{ $c_email }}" class="contact-link">{{ $c_email }}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact-card">
                                <div class="icon-box">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.05469 10.374V23.3473C3.05469 25.8806 4.85469 26.9206 7.04136 25.6673L10.1747 23.8806C10.8547 23.494 11.988 23.454 12.6947 23.814L19.6947 27.3206C20.4014 27.6673 21.5347 27.6406 22.2147 27.254L27.988 23.9473C28.7214 23.5206 29.3347 22.4806 29.3347 21.6273V8.65395C29.3347 6.12062 27.5347 5.08062 25.348 6.33395L22.2147 8.12062C21.5347 8.50729 20.4014 8.54729 19.6947 8.18729L12.6947 4.69395C11.988 4.34729 10.8547 4.37395 10.1747 4.76062L4.40135 8.06729C3.65469 8.49395 3.05469 9.53395 3.05469 10.374Z" stroke="#2B2F36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.4141 5.33398V22.6673" stroke="#2B2F36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.9766 8.82617V26.6662" stroke="#2B2F36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </div>

                                <h4 class="contact-title">{{ get_phrase($c_visit_title) }}</h4>
                                <p class="contact-text">{{ get_phrase($c_visit_subtitle) }}</p>
                                <span class="contact-link">{{ $c_address }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact-card">
                                <div class="icon-box">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M29.2985 24.4394C29.2985 24.9194 29.1919 25.4127 28.9652 25.8927C28.7385 26.3727 28.4452 26.826 28.0585 27.2527C27.4052 27.9727 26.6852 28.4927 25.8719 28.826C25.0719 29.1594 24.2052 29.3327 23.2719 29.3327C21.9119 29.3327 20.4585 29.0127 18.9252 28.3594C17.3919 27.706 15.8585 26.826 14.3385 25.7194C12.8052 24.5994 11.3519 23.3594 9.96521 21.986C8.59187 20.5994 7.35187 19.146 6.24521 17.626C5.15187 16.106 4.27187 14.586 3.63187 13.0794C2.99188 11.5594 2.67188 10.106 2.67188 8.71935C2.67188 7.81268 2.83187 6.94602 3.15187 6.14602C3.47187 5.33268 3.97854 4.58602 4.68521 3.91935C5.53854 3.07935 6.47187 2.66602 7.45854 2.66602C7.83187 2.66602 8.20521 2.74602 8.53854 2.90602C8.88521 3.06602 9.19187 3.30602 9.43187 3.65268L12.5252 8.01268C12.7652 8.34602 12.9385 8.65268 13.0585 8.94602C13.1785 9.22602 13.2452 9.50602 13.2452 9.75935C13.2452 10.0794 13.1519 10.3994 12.9652 10.706C12.7919 11.0127 12.5385 11.3327 12.2185 11.6527L11.2052 12.706C11.0585 12.8527 10.9919 13.026 10.9919 13.2394C10.9919 13.346 11.0052 13.4394 11.0319 13.546C11.0719 13.6527 11.1119 13.7327 11.1385 13.8127C11.3785 14.2527 11.7919 14.826 12.3785 15.5194C12.9785 16.2127 13.6185 16.9194 14.3119 17.626C15.0319 18.3327 15.7252 18.986 16.4319 19.586C17.1252 20.1727 17.6985 20.5727 18.1519 20.8127C18.2185 20.8394 18.2985 20.8794 18.3919 20.9194C18.4985 20.9594 18.6052 20.9727 18.7252 20.9727C18.9519 20.9727 19.1252 20.8927 19.2719 20.746L20.2852 19.746C20.6185 19.4127 20.9385 19.1594 21.2452 18.9994C21.5519 18.8127 21.8585 18.7194 22.1919 18.7194C22.4452 18.7194 22.7119 18.7727 23.0052 18.8927C23.2985 19.0127 23.6052 19.186 23.9385 19.4127L28.3519 22.546C28.6985 22.786 28.9385 23.066 29.0852 23.3994C29.2185 23.7327 29.2985 24.066 29.2985 24.4394Z" stroke="#2B2F36" stroke-width="2" stroke-miterlimit="10"/>
                                    <path d="M24.6745 12.0007C24.6745 11.2007 24.0478 9.97398 23.1145 8.97398C22.2611 8.05398 21.1278 7.33398 20.0078 7.33398" stroke="#2B2F36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M29.3411 11.9993C29.3411 6.83935 25.1678 2.66602 20.0078 2.66602" stroke="#2B2F36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </div>

                                <h4 class="contact-title">{{ get_phrase($c_call_title) }}</h4>
                                <p class="contact-text">{{ get_phrase($c_call_subtitle) }}</p>
                                <a href="tel:{{ $c_phone }}" class="contact-link">{{ $c_phone }}</a>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </section>
    <!-- Contact Area End -->

@endsection

@push('js')
@endpush
