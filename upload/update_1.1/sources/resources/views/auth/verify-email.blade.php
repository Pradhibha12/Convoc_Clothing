@extends('layouts.frontend')
@push('title', 'Verification')
@push('meta')
@endpush
@push('css')
@endpush
<style>
    .mcg-24{
        padding: 120px 0;
    }
   .login-banner-content h1 {
	margin-bottom: 10px;
	font-weight: 500;
	font-size: 39px;
}
</style>
@section('content')
    <!-- Start Login Register Area -->
    <section>
        <div class="container">
            <div class="row mcg-24 mt-24 mb-80 align-items-center">
                <!-- Left Banner Area -->
                <div class="col-md-7 order-2 order-md-1">
                    <div class="login-banner-wrap">
                        <div class="login-banner-area">
                            <div class="login-banner-content">
                                <h1 class="title">{{ get_phrase('Your gateway to worldwide products starts here.') }}</h1>
                                <p class="info">{{ get_phrase('We’re excited to have you onboard. Verify your email to unlock a world of shopping.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Login & Register Form Area -->
                <div class="col-md-5 order-1 order-md-2">
                    <div class="login-register-area">
                        <div class="login-tab-title">
                            <h4 class="title text-start mb-2">{{ get_phrase('Thanks for signing up!') }}</h4>
                        </div>
                        <div class="login-register-form">

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ get_phrase('A new verification link has been sent to the email address.') }}
                                </div>
                            @else
                                <p class="info mb-2">{{ get_phrase('Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                            @endif
                            <form action="{{ route('verification.send') }}" method="post">
                                @csrf
                                <button type="submit" class="btn fsh-btn-dark mt-2">{{ get_phrase('Click Verify Email') }}</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login Register Area -->
@endsection

@push('js')

@endpush