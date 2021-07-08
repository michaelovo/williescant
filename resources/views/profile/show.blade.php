@extends('layouts.app', [
    'page_title' => 'Profile'
])

@section('content')
    <main class="u-main" role="main">
        <!-- Sidebar -->
        @if(Auth::user()->type == 2)
            @include('include.sidebar._sidebar')
        @endif
    <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                        {{ session('error')}}
                    </div>
                @endif
                @if (session()->get('message'))
                    <div class="alert alert-success" role="alert">
                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                        {{ session()->get('message')}}
                    </div>
                @endif
                <h1 class="h2 font-weight-semibold mb-3">Your Profile</h1>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 border-md-right border-light text-center">
                                <img class="img-fluid rounded-circle mb-3"
                                     src="{{asset('storage/images/avatars/img1.jpg')}}" alt="Image description" width="84">

                                <h3 class="mb-2">Username: {{ $profile->username }}</h3>
                                <h5 class="mb-2 text-muted">Full Names:
                                    {{$profile->first_name . " " . $profile->last_name}}
                                </h5>
                                <h5 class="text-muted mb-2">Phone: {{ $profile->phone }}</h5>
                                <h5 class="text-muted mb-2">Email: {{ $profile->email }}
                                </h5>
                                <h5 class="text-muted mb-4">
                                    Address: {{ $profile->address ?? 'N\A' }}
                                </h5>
                                <a class="text-light btn btn-sm btn-primary" data-toggle="modal"
                                   href="#changePasswordModal">
                                    <i class="fa fa-key mr-2"></i> Change Password
                                </a>
                            </div>

                            <div class="col-md-8 pl-4">
                                <h2 class="card-title">Edit Details</h2>
                                <div class="mt-2">
                                    @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ $error }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                @endforeach
                                    @endif
                                    <form class="mb-3" action="{{route('update', $profile->id)}}" id="profile-form" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="first_name">First Name</label>
                                                    <input id="first_name" class="form-control" name="first_name"
                                                           type="text" placeholder="" required
                                                           value="{{$profile->first_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="last_name">Last Name</label>
                                                    <input id="last_name" class="form-control" name="last_name"
                                                           type="text" placeholder="" required
                                                           value="{{$profile->last_name}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="username">Username</label>
                                                    <input id="username"
                                                           class="form-control"
                                                           name="username" type="text" placeholder="" required
                                                           value="{{$profile->username}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="phone">Phone Number</label>
                                                    <input id="phone" class="form-control" name="phone" type="text"
                                                           placeholder="" required
                                                           value="{{$profile->phone}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="address">Delivery Address: </label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                           value="{{$profile->address == 'NULL' ? ' ' : $profile->address}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="email">Email</label>
                                                    <input id="email" class="form-control" name="email" type="email"
                                                           placeholder=""
                                                           value="{{$profile->email ?? ' '}}">
                                                </div>
                                            </div>
                                        </div>
                                        <button id="update_btn" class="btn btn-primary btn-block" type="submit">Update
                                            Details</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('include.modal._change-password')
@endsection

