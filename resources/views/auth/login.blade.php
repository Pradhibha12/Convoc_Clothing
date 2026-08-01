@extends('layouts.frontend')
@push('title', 'Login')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
    <!-- Breadcrumb Area Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area mt-3 mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                        <h1 class="al-title-42px text-center mb-20px">{{ get_phrase('Login') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fsh-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ get_phrase('Login') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <section>
        <div class="container">
            <div class="row justify-content-center mb-100px wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="col-sm-12 col-lg-5 col-md-8 mt-20px">
                    
                    <div class="mb-4">
                        <h3 class="al-title-24px text-center dark">{{ get_phrase('Log In') }}</h3>
                        <p class="text-muted text-center fs-14px mt-1">{{ get_phrase('Enter your mobile number to receive a verification code') }}</p>
                    </div>

                    <div class="mt-4">
                        <!-- Stage A: Enter Phone Number -->
                        <div id="otp-phone-stage" class="otp-stage">
                            <div class="mb-4">
                                <label for="phone" class="form-label fsh-form-label">{{ get_phrase('Mobile Number') }}</label>
                                <div class="position-relative">
                                    <input type="tel" class="form-control fsh-form-control ps-5" id="phone" placeholder="9876543210" maxlength="10">
                                    <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted fw-bold border-end pe-2" style="font-size: 14px; line-height: 1; border-color: #e1e1e7 !important;">+91</span>
                                </div>
                                <small class="text-muted d-block mt-2" style="font-size: 11px;">{{ get_phrase('Enter 10-digit mobile number') }}</small>
                            </div>

                            <!-- Recaptcha Container for Firebase Phone Auth -->
                            <div id="recaptcha-container" class="mb-3"></div>

                            <button type="button" id="send-otp-btn" class="btn fsh-btn-dark w-100" onclick="sendOTP()">{{ strtoupper(get_phrase('SEND VERIFICATION CODE')) }}</button>
                        </div>

                        <!-- Stage B: Enter Verification Code -->
                        <div id="otp-code-stage" class="otp-stage d-none">
                            <div class="mb-4">
                                <label for="otp_code" class="form-label fsh-form-label">{{ get_phrase('Enter 6-Digit Verification Code') }}</label>
                                <input type="text" class="form-control fsh-form-control text-center letter-spacing-5 fw-bold fs-20px" id="otp_code" placeholder="------" maxlength="6">
                                <div class="d-flex justify-content-between mt-2 fs-13px text-muted">
                                    <span>Sent code to: <strong id="display-phone"></strong></span>
                                    <a href="javascript:void(0);" onclick="changePhoneNumber()" class="text-decoration-underline text-danger">{{ get_phrase('Change Phone') }}</a>
                                </div>
                            </div>
                            <button type="button" id="verify-otp-btn" class="btn fsh-btn-dark w-100 mb-3" onclick="verifyOTP()">{{ strtoupper(get_phrase('VERIFY & LOG IN')) }}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script type="text/javascript">
    "use strict";

    let app, auth, recaptchaVerifier, confirmationResult;
    
    $(document).ready(function () {
        // Initialize Firebase if keys are provided
        if (typeof firebase !== 'undefined' && firebaseConfig.apiKey && firebaseConfig.apiKey !== "") {
            if (!firebase.apps.length) {
                app = firebase.initializeApp(firebaseConfig);
            }
            auth = firebase.auth();
            recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                'size': 'invisible',
                'callback': (response) => {
                    // reCAPTCHA solved
                }
            });
        }
    });

    let fullPhoneNumber = '';

    // Send Verification Code (OTP)
    function sendOTP() {
        const phoneInput = document.getElementById('phone').value.trim();
        if (phoneInput.length !== 10 || isNaN(phoneInput)) {
            alert("{{ get_phrase('Please enter a valid 10-digit mobile number') }}");
            return;
        }

        fullPhoneNumber = '+91' + phoneInput;
        document.getElementById('display-phone').innerText = fullPhoneNumber;

        const gateway = (typeof smsGateway !== 'undefined') ? smsGateway : 'mock';

        if (gateway === 'mock' || gateway === 'custom') {
            document.getElementById('send-otp-btn').disabled = true;
            document.getElementById('send-otp-btn').innerText = "{{ get_phrase('SENDING...') }}";

            $.ajax({
                url: "{{ route('login.send_otp') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    phone: fullPhoneNumber
                },
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        if (gateway === 'mock') {
                            alert("{{ get_phrase('Mock verification code sent! Enter 123456 to verify.') }}");
                        } else {
                            alert("{{ get_phrase('Verification code sent successfully!') }}");
                        }
                        showOtpStage();
                    } else {
                        alert(response.message || "{{ get_phrase('Failed to send OTP. Please try again.') }}");
                        document.getElementById('send-otp-btn').disabled = false;
                        document.getElementById('send-otp-btn').innerText = "{{ get_phrase('SEND VERIFICATION CODE') }}";
                    }
                },
                error: function() {
                    alert("{{ get_phrase('Connection error. Please try again.') }}");
                    document.getElementById('send-otp-btn').disabled = false;
                    document.getElementById('send-otp-btn').innerText = "{{ get_phrase('SEND VERIFICATION CODE') }}";
                }
            });
            return;
        }

        if (typeof firebase === 'undefined' || !firebaseConfig.apiKey) {
            alert("{{ get_phrase('Firebase config is not set up. Please contact support!') }}");
            return;
        }

        document.getElementById('send-otp-btn').disabled = true;
        document.getElementById('send-otp-btn').innerText = "{{ get_phrase('SENDING CODE...') }}";

        auth.signInWithPhoneNumber(fullPhoneNumber, recaptchaVerifier)
            .then((result) => {
                confirmationResult = result;
                alert("{{ get_phrase('Verification code sent to your phone number!') }}");
                showOtpStage();
            }).catch((error) => {
                alert(error.message);
                document.getElementById('send-otp-btn').disabled = false;
                document.getElementById('send-otp-btn').innerText = "{{ get_phrase('SEND VERIFICATION CODE') }}";
            });
    }

    function showOtpStage() {
        $('#otp-phone-stage').addClass('d-none');
        $('#otp-code-stage').removeClass('d-none');
    }

    function changePhoneNumber() {
        $('#otp-code-stage').addClass('d-none');
        $('#otp-phone-stage').removeClass('d-none');
        document.getElementById('send-otp-btn').disabled = false;
        document.getElementById('send-otp-btn').innerText = "{{ get_phrase('SEND VERIFICATION CODE') }}";
    }

    // Verify OTP and Log In via Backend
    function verifyOTP() {
        const otpCode = document.getElementById('otp_code').value.trim();
        if (otpCode.length !== 6 || isNaN(otpCode)) {
            alert("{{ get_phrase('Please enter a 6-digit verification code') }}");
            return;
        }

        const gateway = (typeof smsGateway !== 'undefined') ? smsGateway : 'mock';

        if (gateway === 'mock' || gateway === 'custom') {
            document.getElementById('verify-otp-btn').disabled = true;
            document.getElementById('verify-otp-btn').innerText = "{{ get_phrase('VERIFYING...') }}";
            submitOtpLogin(fullPhoneNumber, otpCode);
            return;
        }

        // Firebase Phone Auth Verification
        document.getElementById('verify-otp-btn').disabled = true;
        document.getElementById('verify-otp-btn').innerText = "{{ get_phrase('VERIFYING...') }}";

        confirmationResult.confirm(otpCode)
            .then((result) => {
                // User verified successfully
                submitOtpLogin(fullPhoneNumber);
            }).catch((error) => {
                alert("{{ get_phrase('Invalid verification code!') }}");
                document.getElementById('verify-otp-btn').disabled = false;
                document.getElementById('verify-otp-btn').innerText = "{{ get_phrase('VERIFY & LOG IN') }}";
            });
    }

    // Submit phone number to Laravel backend to establish session
    function submitOtpLogin(phoneNumber, otpCode = '') {
        $.ajax({
            url: "{{ route('login.otp') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                phone: phoneNumber,
                otp_code: otpCode
            },
            dataType: "json",
            success: function(response) {
                if (response.status && response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    alert(response.message || "{{ get_phrase('Authentication failed. Please try again.') }}");
                    document.getElementById('verify-otp-btn').disabled = false;
                    document.getElementById('verify-otp-btn').innerText = "{{ get_phrase('VERIFY & LOG IN') }}";
                }
            },
            error: function() {
                alert("{{ get_phrase('Connection error. Please try again.') }}");
                location.reload();
            }
        });
    }
</script>
@endpush
