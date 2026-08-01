@extends('layouts.frontend')
@push('title', 'Admin Login')
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
                        <h1 class="al-title-42px text-center mb-20px">{{ get_phrase('Admin Login') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fsh-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ get_phrase('Admin Login') }}</li>
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
                        <h3 class="al-title-24px text-center dark">{{ get_phrase('Admin Authentication') }}</h3>
                        <p class="text-muted text-center fs-14px mt-1">{{ get_phrase('Enter your email and password to access the dashboard') }}</p>
                    </div>

                    <div class="mt-4">
                        <form action="{{ route('admin.login.store') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label fsh-form-label">{{ get_phrase('Email Address') }}</label>
                                <input type="email" class="form-control fsh-form-control" name="email" id="email" placeholder="admin@example.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fsh-form-label">{{ get_phrase('Password') }}</label>
                                <input type="password" class="form-control fsh-form-control" name="password" id="password" placeholder="••••••••" required>
                                @error('password')
                                    <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn fsh-btn-dark w-100">{{ strtoupper(get_phrase('LOG IN')) }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
