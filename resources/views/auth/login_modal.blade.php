<style>
    .fsh-form-control::placeholder {
        text-transform: lowercase;
    }
</style>

<div class="mb-4">
    <h4 class="al-title-24px text-center dark">{{ get_phrase('Log In') }}</h4>
    <p class="text-muted text-center fs-13px mt-1">{{ get_phrase('Enter your mobile number to receive a verification code') }}</p>
</div>

<div class="mt-2">
    
    <!-- Stage A: Enter Phone -->
    <div id="modal-otp-phone-stage" class="otp-stage-modal">
        <div class="mb-4">
            <label for="modal-phone" class="form-label fsh-form-label">{{ get_phrase('Mobile Number') }}</label>
            <div class="position-relative">
                <input type="tel" class="form-control fsh-form-control ps-5" id="modal-phone" placeholder="9876543210" maxlength="10">
                <span class="position-absolute start-0 top-50 translate-middle-y ps-3 text-muted fw-bold border-end pe-2" style="font-size: 14px; line-height: 1; border-color: #e1e1e7 !important;">+91</span>
            </div>
            <small class="text-muted d-block mt-2" style="font-size: 11px;">{{ get_phrase('Enter 10-digit mobile number') }}</small>
        </div>

        <!-- Invisible Recaptcha -->
        <div id="modal-recaptcha-container" class="mb-3"></div>

        <button type="button" id="modal-send-otp-btn" class="btn fsh-btn-dark w-100" onclick="modalSendOTP()">{{ strtoupper(get_phrase('SEND CODE')) }}</button>
    </div>

    <!-- Stage B: Enter Verification Code -->
    <div id="modal-otp-code-stage" class="otp-stage-modal d-none">
        <div class="mb-4">
            <label for="modal_otp_code" class="form-label fsh-form-label">{{ get_phrase('Enter Verification Code') }}</label>
            <input type="text" class="form-control fsh-form-control text-center letter-spacing-5 fw-bold fs-20px" id="modal_otp_code" placeholder="------" maxlength="6">
            <div class="d-flex justify-content-between mt-2 fs-12px text-muted">
                <span>Sent code to: <strong id="modal-display-phone"></strong></span>
                <a href="javascript:void(0);" onclick="modalChangePhone()" class="text-decoration-underline text-danger">{{ get_phrase('Change') }}</a>
            </div>
        </div>
        <button type="button" id="modal-verify-otp-btn" class="btn fsh-btn-dark w-100" onclick="modalVerifyOTP()">{{ strtoupper(get_phrase('VERIFY & LOG IN')) }}</button>
    </div>

</div>

<script>
"use strict";
$(document).ready(function () {
    // Initialize Firebase if loaded and config keys are set
    // Initialize Firebase if loaded and config keys are set
    if (typeof firebase !== 'undefined' && firebaseConfig.apiKey) {
        if (!firebase.apps.length) {
            firebase.initializeApp(firebaseConfig);
        }
        window.modalRecaptchaVerifier = new firebase.auth.RecaptchaVerifier('modal-recaptcha-container', {
            'size': 'invisible',
            'callback': (response) => {
                // reCAPTCHA solved
            }
        });
    }
});

let modalFullPhone = '';
let modalConfirmationResult;

function modalSendOTP() {
    const phoneInput = document.getElementById('modal-phone').value.trim();
    if (phoneInput.length !== 10 || isNaN(phoneInput)) {
        alert("{{ get_phrase('Please enter a valid 10-digit mobile number') }}");
        return;
    }

    modalFullPhone = '+91' + phoneInput;
    document.getElementById('modal-display-phone').innerText = modalFullPhone;

    const gateway = (typeof smsGateway !== 'undefined') ? smsGateway : 'mock';

    if (gateway === 'mock' || gateway === 'custom') {
        document.getElementById('modal-send-otp-btn').disabled = true;
        document.getElementById('modal-send-otp-btn').innerText = "{{ get_phrase('SENDING...') }}";

        $.ajax({
            url: "{{ route('login.send_otp') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                phone: modalFullPhone
            },
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    if (gateway === 'mock') {
                        alert("{{ get_phrase('Mock code sent! Use 123456 to verify.') }}");
                    } else {
                        alert("{{ get_phrase('Verification code sent successfully!') }}");
                    }
                    showModalOtpStage();
                } else {
                    alert(response.message || "{{ get_phrase('Failed to send OTP. Please try again.') }}");
                    document.getElementById('modal-send-otp-btn').disabled = false;
                    document.getElementById('modal-send-otp-btn').innerText = "{{ get_phrase('SEND CODE') }}";
                }
            },
            error: function() {
                alert("{{ get_phrase('Connection error. Please try again.') }}");
                document.getElementById('modal-send-otp-btn').disabled = false;
                document.getElementById('modal-send-otp-btn').innerText = "{{ get_phrase('SEND CODE') }}";
            }
        });
        return;
    }

    if (typeof firebase === 'undefined' || !firebaseConfig.apiKey) {
        alert("{{ get_phrase('Firebase is not configured. Please contact support!') }}");
        return;
    }

    document.getElementById('modal-send-otp-btn').disabled = true;
    document.getElementById('modal-send-otp-btn').innerText = "{{ get_phrase('SENDING...') }}";

    firebase.auth().signInWithPhoneNumber(modalFullPhone, window.modalRecaptchaVerifier)
        .then((result) => {
            modalConfirmationResult = result;
            alert("{{ get_phrase('Verification code sent successfully!') }}");
            showModalOtpStage();
        }).catch((error) => {
            alert(error.message);
            document.getElementById('modal-send-otp-btn').disabled = false;
            document.getElementById('modal-send-otp-btn').innerText = "{{ get_phrase('SEND CODE') }}";
        });
}

function showModalOtpStage() {
    $('#modal-otp-phone-stage').addClass('d-none');
    $('#modal-otp-code-stage').removeClass('d-none');
}

function modalChangePhone() {
    $('#modal-otp-code-stage').addClass('d-none');
    $('#modal-otp-phone-stage').removeClass('d-none');
    document.getElementById('modal-send-otp-btn').disabled = false;
    document.getElementById('modal-send-otp-btn').innerText = "{{ get_phrase('SEND CODE') }}";
}

function modalVerifyOTP() {
    const otpCode = document.getElementById('modal_otp_code').value.trim();
    if (otpCode.length !== 6 || isNaN(otpCode)) {
        alert("{{ get_phrase('Please enter a 6-digit verification code') }}");
        return;
    }

    const gateway = (typeof smsGateway !== 'undefined') ? smsGateway : 'mock';

    if (gateway === 'mock' || gateway === 'custom') {
        document.getElementById('modal-verify-otp-btn').disabled = true;
        document.getElementById('modal-verify-otp-btn').innerText = "{{ get_phrase('VERIFYING...') }}";
        submitModalOtpLogin(modalFullPhone, otpCode);
        return;
    }

    document.getElementById('modal-verify-otp-btn').disabled = true;
    document.getElementById('modal-verify-otp-btn').innerText = "{{ get_phrase('VERIFYING...') }}";

    modalConfirmationResult.confirm(otpCode)
        .then((result) => {
            submitModalOtpLogin(modalFullPhone);
        }).catch((error) => {
            alert("{{ get_phrase('Invalid verification code!') }}");
            document.getElementById('modal-verify-otp-btn').disabled = false;
            document.getElementById('modal-verify-otp-btn').innerText = "{{ get_phrase('VERIFY & LOG IN') }}";
        });
}

function submitModalOtpLogin(phoneNumber, otpCode = '') {
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
                document.getElementById('modal-verify-otp-btn').disabled = false;
                document.getElementById('modal-verify-otp-btn').innerText = "{{ get_phrase('VERIFY & LOG IN') }}";
            }
        },
        error: function() {
            alert("{{ get_phrase('Connection error. Please try again.') }}");
            location.reload();
        }
    });
}
</script>
