@extends('layouts.app', ['page_title' => 'Login'])

@section('content')
    <main class="u-main pl-0" role="main">
        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div
                        class="col-lg-8 d-flex flex-column justify-content-center align-items-center bg-white mnh-100vh">
                        <div class="w-75">
                        </div>
                        <div class="w-75 mt-4">
                            <form class="mb-3" action="{{route('login')}}" id="login-form" method="POST">
                                @csrf
                                <div class="mb-5 text-center">
                                    <h1 class="h2">Welcome Back!</h1>
                                    <p class="small">Login with your registered username and password.</p>
                                </div>


                                <div class="form-group mb-4">
                                    <label class="required-label" for="username">Your username</label>
                                    <input id="username" class="form-control @error('username') is-invalid @enderror" name="username" type="text" value='{{old('username')}}' required>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="required-label" for="password">Password</label>
                                        <a class="link-muted small"
                                           href="{{ route('password.request') }}">Forgot
                                            Password?</a>
                                    </div>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </form>

                            <p class="small">
                                Don’t have an account? <a href="{{route('register')}}">Sign Up
                                    here</a>
                            </p>
                        </div>

                        <div class="text-muted py-3 mt-2">
                            <small><i class="far fa-question-circle mr-1"></i> If you are not able to sign in, please <a
                                    href="#">contact us</a>.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
