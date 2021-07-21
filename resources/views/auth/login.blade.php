@extends('layouts.app', ["page_title" => "Login - WillieScant"])

@section('content')
	<!-- Header (Topbar) -->
@include('menu.logged_out_nav')
	<!-- End Header (Topbar) -->
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
						<div class="text-muted py-3 mt-auto">
							<small><i class="far fa-question-circle mr-1"></i> If you are not able to sign in, please <a
									href="#">contact us</a>.</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection
