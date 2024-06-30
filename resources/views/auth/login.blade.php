@extends('layouts.app')

@section('content')
<style>
    .login {
        margin-top: 200px; /* Adjusted for better positioning */
    }
    .card {
        border: none;
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Box shadow for depth */
    }
    .card-header {
        background-color: #4a69bd; /* Vibrant header color */
        color: #fff;
        font-size: 24px;
        border-top-left-radius: 10px; /* Rounded corners */
        border-top-right-radius: 10px; /* Rounded corners */
        text-align: center;
    }
    .form-control {
        border-radius: 20px; /* Rounded input fields */
        border: 1px solid #ced4da;
        padding: 10px;
    }
    .btn-primary {
        background-color: #4a69bd; /* Matching button color */
        border: none;
        border-radius: 20px; /* Rounded button */
        padding: 10px 30px;
        font-size: 16px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    }
    .btn-primary:hover {
        background-color: #3c6382; /* Button hover effect */
    }
    .btn-link {
        color: #4a69bd; /* Style for the forgot password link */
    }
    .btn-link:hover {
        color: #3c6382; /* Hover effect for the link */
    }
</style>
<div class="container login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
