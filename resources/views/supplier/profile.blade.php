@extends('layouts.app', ["page_title" => "Profile - WillieScant"])

@section('content')
    @if(Auth::user()->type == 2)
        @include('menu.supplier_nav')
    @elseif(Auth::user()->type == 3)
        @include('menu.customer_nav')
    @endif
    <!-- Header (Topbar) -->
    <main class="u-main" role="main">
        @if(Auth::user()->type == 2)
            @include('include.sidebar._sidebar')
        @endif
    <div class="u-content">
        <div class="u-body">
            <h1 class="h2 font-weight-semibold mb-3">Your Profile</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 border-md-right border-light text-center">
                            <img class="img-fluid rounded mb-3"
                                 src="{{asset('storage/images/avatars/img1.jpg')}}" alt="Avatar"
                                 width="84">
                            <form id="change_avatar_form" class="text-center w-75 m-auto">
                                <input type="file" id="avatar" name="avatar" class="form-control form-control-sm mb-1" required>
                                <input type="submit" class="btn btn-sm btn-primary" value="Change Avatar">
                            </form>
                            <h3 class="mb-2 mt-3">Username: martinromario55</h3>
                            <h5 class="mb-2 text-muted">Full Names:
                                Martin Romario                                </h5>
                            <h5 class="text-muted mb-2">Phone: 0797738962</h5>
                            <!-- <h5 class="text-muted mb-2">Email:  -->
                            <h5 class="text-muted mb-2">Business Name:                                 </h5>
                            <h5 class="text-muted mb-4">
                                Address: N/A                                </h5>
                            <a class="text-light btn btn-sm btn-primary" data-toggle="modal"
                               href="#changePasswordModal">
                                <i class="fa fa-key mr-2"></i> Change Password
                            </a>
                        </div>

                        <div class="col-md-8 pl-4">
                            <h2 class="card-title">Edit Details</h2>
                            <div class="mt-4">
                                <form class="mb-3" action="/supplier/profile.php"
                                      id="profile-form" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="first_name" class="required-label">First Name</label>
                                                <input id="first_name" class="form-control" name="first_name"
                                                       type="text" placeholder="" required
                                                       value="Martin">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="last_name" class="required-label">Last Name</label>
                                                <input id="last_name" class="form-control" name="last_name"
                                                       type="text" placeholder="" required
                                                       value="Romario">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="username" class="required-label">Username</label>
                                                <input id="username"
                                                       class="form-control "
                                                       name="username" type="text" placeholder="" required
                                                       value="martinromario55">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="phone" class="required-label">Phone Number</label>
                                                <input id="phone" class="form-control" name="phone" type="text"
                                                       placeholder="" required
                                                       value="0797738962">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="business_name" class="required-label">Business Name</label>
                                                <input type="text" class="form-control" id="business_name" name="business_name" required
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="kra_pin">Kra Pin: </label>
                                                <input id="kra_pin" class="form-control" name="pin" type="text"
                                                       placeholder="KRA PIN"
                                                       value="">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="email" class="required-label">Email</label>
                                                <input id="email" class="form-control" name="email" type="email" required
                                                    placeholder=""
                                                    value="">
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="website">Website: </label>
                                                <input type="text" class="form-control" id="website" name="website"
                                                       placeholder="Your website"  value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="address">Location</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block" type="submit">Update
                                        Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <!-- End Footer -->
    </div>
    </main>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Change Password</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="get" id="change_password_form" >
                <div class=" modal-body">
                    <!-- Errors -->
                    <div id="modal-errors" class="alert alert-danger fade show d-none" role="alert">
                        <i class="fa fa-minus-circle alert-icon mr-3"></i>
                        <span>Error: Failed to change your password. Try again later</span>
                    </div>
                    <div id="modal-general-errors" class="alert alert-soft-danger d-none fade show" role="alert">
                        <i class="fa fa-minus-circle alert-icon mr-3"></i>
                        <span class="small">Correct one or more errors below</span>
                    </div>
                    <div id="modal-success" class="alert alert-soft-success d-none fade show" role="alert">
                        <i class="fa fa-check-circle alert-icon mr-3"></i>
                        <span class="small">Successfully changed your password</span>
                    </div>
                    <!-- End Errors -->
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="password">Old Password</label>
                                <input id="password" class="form-control" name="password" type="password"
                                       placeholder="Enter your old password" required>
                                <div class="invalid-feedback">
                                    Old password is incorrect
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="newPassword">New password</label>
                                <input id="newPassword" class="form-control" name="newPassword" type="password"
                                       placeholder="Enter your new password" required>
                                <div class="invalid-feedback">
                                    New password must be atleast 8 characters long and must contain a letter, word and
                                    special character.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="confirmPassword">Confirm New password</label>
                                <input id="confirmPassword" class="form-control" name="confirmPassword" type="password"
                                       placeholder="Re-enter your new password" required>
                                <div class="invalid-feedback">
                                    New password and confirmation do not match
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span data-dismiss="modal" class="mr-2" style="font-weight: 600; cursor: pointer;">Cancel</span>
                    <input type="submit" class="btn btn-primary pl-4 pr-4" value="Update">
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Change Password Modal -->

    <!-- Custom Javascript -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#change_password_form").submit(function (e) {
                e.preventDefault();
                old_password = $("#password").val();
                new_password = $("#newPassword").val();
                confirm_password = $("#confirmPassword").val();

                errors = $("#modal-errors");
                general_errors = $("#modal-general-errors");
                success = $("#modal-success");

                $("#modal-success").addClass("d-none");
                $("#modal-errors").addClass("d-none");
                $("#modal-general-erros").addClass("d-none");

                if (new_password != confirm_password) {
                    $("#newPassword").addClass('is-invalid');
                    $("#confirmPassword").addClass('is-invalid');
                } else {
                    $("#newPassword").removeClass('is-invalid');
                    $("#confirmPassword").removeClass('is-invalid');
                }
                $.ajax({
                    type: 'POST',
                    url: "/supplier/helpers/update_password.php",
                    data: {
                        'password': old_password,
                        'new_password': new_password,
                        'confirm_password': confirm_password
                    },
                    statusCode: {
                        401: function(response) {
                            window.location.href = '/auth/logout.php';
                        }
                    },
                    success: function (result) {
                        res = JSON.parse(result);
                        if (res['success']) {
                            $("#modal-success").removeClass("d-none");
                            $("#newPassword").removeClass('is-invalid');
                            $("#confirmPassword").removeClass('is-invalid');
                            $("#password").removeClass('is-invalid');
                        } else if (res['error']) {
                            $("#modal-error").removeClass("d-none");
                        } else {
                            if (!res['old_password_valid']) {
                                $("#modal-general-errors").removeClass("d-none");
                                $("#password").addClass("is-invalid");
                            } else {
                                $("#modal-general-errors").addClass("d-none");
                                $("#password").removeClass("is-invalid");
                            }
                            if (!res['new_password_valid']) {
                                $("#modal-general-errors").removeClass("d-none");
                                $("#newPassword").addClass("is-invalid");
                                $("#confirmPassword").addClass("is-invalid");
                            }
                        }
                    }
                });
            });

            $("#change_avatar_form").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(e.target);
                $.ajax({
                    type: 'POST',
                    url: "/supplier/helpers/change_profile.php",
                    processData: false,
                    contentType: false,
                    data: formData,
                    statusCode: {
                        401: function(response) {
                            window.location.href = '/auth/logout.php';
                        }
                    },
                    success: function (result) {
                        res = JSON.parse(result);
                        if(res['success']) {
                            window.location.reload();
                        } else {
                            Toast.fire({
                                'icon':'error',
                                'text': res['error']
                            });
                        }
                    },
                    error: function(err) {
                        Toast.fire({
                            'icon':'error',
                            'text': 'Server Error. Failed to update profile. Try again later.'
                        });
                    }
                });
            });
        });
    </script>
@endsection
