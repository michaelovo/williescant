@extends('layouts.app')

@section('content')

    <main class="u-main pl-0" role="main">
        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 d-flex flex-column justify-content-center align-items-center bg-white mnh-100vh">
                        <div class="w-75 mt-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="mb-3"  action="{{route('register')}}" id="reg-form" method="POST">
                                @csrf
                                <div class="mb-5 text-center">
                                    <h1 class="h2">Welcome To WillieScant</h1>
                                    <p class="small">Signup for an account with WillieScant by filling the registration form</p>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="first_name">First Name</label>
                                            <input id="first_name" class="form-control @error('first_name')is-invalid @enderror" name="first_name" type="text" placeholder="First Name" value='{{old('first_name')}}' required autocomplete="name" autofocus>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="last_name">Last Name</label>
                                            <input id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" type="text" placeholder="Last Name" value='{{old('last_name')}}' required autocomplete="first_name" autofocus>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="username">Username</label>
                                            <input id="username" class="form-control @error('username')is-invalid @endif" name="username" type="text" placeholder="Username" value='{{old('username')}}' required autocomplete="name" autofocus>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="phone">Phone Number</label>
                                            <input id="phone" class="form-control @error('phone')is-invalid @endif" name="phone" type="text" placeholder="Phone Number" value='{{old('phone')}}' required autocomplete="name" autofocus>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group mb-4">
                                        <label class="required-label" for="email">Email</label>
                                        <input id="email" class="form-control @error('email')is-invalid @endif" name="email" type="email" placeholder="yourname@email.com" value='{{old('email')}}' required autocomplete="name" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
@enderror
                                    </div>S
                                <div class="form-group mb-4">
                                    <label class="required-label" for="type">Join as a:</label>
                                    <select class="custom-select" id="type" name="type" required>
                                        <option value="">Select</option>
                                        <option value="3" @if (old('type') == "3"){{'selected'}} @endif>Customer</option>
                                        <option value="2" @if (old('type') == "2"){{'selected'}} @endif>Supplier</option>
                                    </select>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="password">Password</label>
                                            <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Enter your password" value='{{old('password')}}' required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="confirm_password">Confirm password</label>
                                            <input id="confirm_password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Confirm your password" value='{{old('password_confirmation')}}' required>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                            </form>

                            <p class="small">
                                Already have an account? <a href="#">Login here</a>
                            </p>
                        </div>

                        <div class="text-muted py-3 mt-auto">
                            <small><i class="far fa-question-circle mr-1"></i> If you are not able to sign up, please <a href="#">contact us</a>.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->

            <!-- End Footer -->
        </div>
    </main>
@endsection
