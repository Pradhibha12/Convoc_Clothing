<div class="mb-4">
    <h4 class="al-title-24px text-center dark mb-4">{{ get_phrase('Forgot Password') }}</h4>
    <p class="text-center al-subtitle-14px">
        {{ get_phrase('Lost your password?').' '.get_phrase('Please enter your email address.').' '.get_phrase('You will receive a link to create a new password via email.') }}
    </p>
</div>
<form action="{{ route('password.email') }}" method="post" class="form">
    @csrf
    <div class="mb-4">
        <label for="email" class="form-label fsh-form-label">{{ get_phrase('Email') }}</label>
        <input type="email" class="form-control fsh-form-control" id="email" name="email"  value="{{ old('email') }}" placeholder="Enter your email">
    </div>
    <button type="submit" class="btn fsh-btn-dark w-100 mb-12px">{{ strtoupper(get_phrase('RESET PASSWORD')) }}</button>
    <a onclick="load_view('{{ route('view', ['path' => 'auth.login_modal']) }}', '#formModal .modal-body')" class="btn fsh-btn-outline-secondary w-100">{{ strtoupper(get_phrase('BACK TO LOG IN')) }}</a>
</form>