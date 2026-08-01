@extends('layouts.frontend')
@push('title', 'Home page')
@push('meta')
@endpush
@push('css')
<style>
    .mcg-24{
        padding: 90px 0;
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
                            <h4 class="title mb-2">{{ get_phrase('Reset Password') }}</h4>
                        </div>
                        <div class="login-register-form">
                            <p class="info mb-3">{{ get_phrase('This is a secure area of the application. Please enter your password.') }}</p>
                            <form action="{{ route('password.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="input-wrap mb-2">
                                    <label for="email" class="form-label fsh-form-label">{{ get_phrase('Email') }}</label>
                                    <input name="email" value="{{ old('email', $request->email) }}" type="text" class="form-control fsh-form-control" id="email" placeholder="{{ get_phrase('Enter your email address') }}" readonly>
                                </div>

                                <div class="input-wrap mb-2">
                                    <label for="password" class="form-label fsh-form-label">{{ get_phrase('Password') }}</label>
                                    <div class="input-password-wrap">
                                        <input name="password" type="password" id="password" class="form-control fsh-form-control" placeholder="{{ get_phrase('Enter your Password') }}">
                                        
                                    </div>
                                </div>

                                <div class="input-wrap mb-2">
                                    <label for="password_confirmation" class="form-label fsh-form-label">{{ get_phrase('Confirm Password') }}</label>
                                    <div class="input-password-wrap">
                                        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control fsh-form-control" placeholder="{{ get_phrase('Enter your Password') }}">
                                        
                                    </div>
                                </div>

                                <button type="submit" class="btn fsh-btn-dark mt-2">{{ get_phrase('Reset Password') }}</button>
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