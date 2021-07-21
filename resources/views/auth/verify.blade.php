@extends('layouts.app', ['page_title' => 'Verify Email'])

@section('content')
    @include('menu.logged_out_nav')
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
                            <div class="mb-3">
                                <div class="mb-5 text-center">
                                    <h1 class="h2">{{ __('A fresh verification link has been sent to your email address.') }}</h1>
                                    <p class="small">{{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }}</p>
                                </div>
                            </div>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
