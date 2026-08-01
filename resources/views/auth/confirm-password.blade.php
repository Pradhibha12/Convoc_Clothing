@extends('layouts.frontend')
@push('title', 'Home page')
@push('meta')
@endpush
@push('css')
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
@endpush

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
                            <h4 class="title text-start dark">{{ get_phrase('Confirm Password!') }}</h4>
                        </div>
                        <div class="login-register-form">
                            <p class="info mb-24">{{ get_phrase('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
                            <form action="{{ route('password.confirm') }}" method="post" class="form">
                                @csrf

                                <div class="input-wrap mb-20">
                                    <label for="password" class="form-label lrform-label">{{ get_phrase('Password') }}</label>
                                    <div class="input-password-wrap">
                                        <input name="password" type="password" id="password" class="form-control lrform-control password-field" placeholder="{{ get_phrase('Enter your Password') }}">
                                        <div class="password-icons lock toggle-password" toggle=".password-field">
                                            <img class="eye-lock" src="assets/images/icons/eye-lock.svg" alt="">
                                            <img class="eye-unlock" src="assets/images/icons/eye-unlock.svg" alt="">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="login-signup-btn theme-btn-hover2">{{ get_phrase('Confirm') }}</button>
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
