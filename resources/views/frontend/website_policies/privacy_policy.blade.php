@extends('layouts.frontend')
@push('title', 'Home page')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
    <!-- Start Privacy Banner Area -->
    <section>
        <div class="container">
            <div class="row mt-24 mb-30">
                <div class="col-md-12">
                    <div class="privacy-banner-area terms-banner-area">
                        <div class="left-shadow"></div>
                        <div class="right-shadow"></div>
                        <div class="privacy-banner-content">
                            <h1 class="title mb-20">{{get_phrase('Privacy policy')}}</h1>
                            <p class="info">{{get_phrase('A Privacy Policy page outlines how your e-commerce site collects, uses, and protects customer data, ensuring transparency and compliance with legal regulations.')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Privacy Banner Area -->

    <!-- Start Privacy Policy Content Area -->
    <section>
        <div class="container">
            <div class="row mb-60">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="privacy-policy-content">
                        {!! get_frontend_settings('privacy_policy') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Privacy Policy Content Area -->
@endsection

@push('js')

@endpush
