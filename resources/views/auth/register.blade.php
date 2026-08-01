<style>
    .fsh-form-control::placeholder{
        text-transform: lowercase;
    }
    .toggle-password{
    cursor: pointer;
}
</style>
<div class="mb-20px">
    <h4 class="al-title-24px text-center dark">{{ get_phrase('Create Account') }}</h4>
</div>
<form action="{{ route('register') }}" method="post" class="form">
    @csrf
    <div class="mb-4">
        <label for="name" class="form-label fsh-form-label">{{ get_phrase('Name') }}</label>
        <input type="text" class="form-control fsh-form-control" id="name" name="name" placeholder="{{ get_phrase('Enter your full name') }}" required>
    </div>

    <div class="mb-4">
        <label for="email" class="form-label fsh-form-label">{{ get_phrase('Email') }}</label>
        <input type="email" class="form-control fsh-form-control" id="email" name="email" placeholder="{{ get_phrase('Enter your email address') }}" required>
    </div>

    <div class="mb-4">
        <label for="user-password2" class="form-label fsh-form-label">{{ get_phrase('Password') }}</label>
        <div class="input-password-wrap position-relative">
            <input type="password" class="form-control fsh-form-control password-field1" id="user-password2" name="password" placeholder="{{ get_phrase('Enter your password') }}" required>
            
            <div class="password-icons toggle-password position-absolute end-0 top-50 translate-middle-y me-3" data-toggle=".password-field1" >
                <img class="eye-lock" src="{{ asset('assets/frontend/fashion/images/image-icons/eye-slash-gray-20.svg') }}" alt="Hide">
                <img class="eye-unlock d-none" src="{{ asset('assets/frontend/fashion/images/image-icons/eye-gray-20.svg') }}" alt="Show">
            </div>
        </div>
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="form-label fsh-form-label">{{ get_phrase('Confirm Password') }}</label>
        <div class="input-password-wrap position-relative">
            <input type="password" class="form-control fsh-form-control password-field2" id="password_confirmation" name="password_confirmation" placeholder="{{ get_phrase('Enter your password again') }}" required>
            
            <div class="password-icons toggle-password position-absolute end-0 top-50 translate-middle-y me-3" data-toggle=".password-field2" >
                <img class="eye-lock" src="{{ asset('assets/frontend/fashion/images/image-icons/eye-slash-gray-20.svg') }}" alt="Hide">
                <img class="eye-unlock d-none" src="{{ asset('assets/frontend/fashion/images/image-icons/eye-gray-20.svg') }}" alt="Show">
            </div>
        </div>
    </div>

    <button type="submit" class="btn fsh-btn-dark w-100 mb-12px">{{ strtoupper(get_phrase('CREATE ACCOUNT')) }}</button>
    <a href="javascript:;" onclick="load_view('{{ route('view', ['path' => 'auth.login_modal']) }}', '#formModal .modal-body')" class="btn fsh-btn-outline-secondary w-100">{{ strtoupper(get_phrase('LOG IN')) }}</a>
</form>

<script type="text/javascript">
"use strict";
$(document).ready(function () {
    $(".toggle-password").click(function () {
        const input = $($(this).data("toggle"));
        const eyeOpen = $(this).find(".eye-unlock");
        const eyeClose = $(this).find(".eye-lock");

        if (input.attr("type") === "password") {
            input.attr("type", "text");
            eyeOpen.removeClass("d-none");
            eyeClose.addClass("d-none");
        } else {
            input.attr("type", "password");
            eyeOpen.addClass("d-none");
            eyeClose.removeClass("d-none");
        }
    });
});
</script>
