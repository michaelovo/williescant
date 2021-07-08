$page_title = "Profile - WillieScant";

@include('menu.customer_nav')
    <main class="u-main pl-0" role="main">
        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h1 class="h2 font-weight-semibold mb-4">Profile</h1>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 border-md-right border-light text-center">
                                        <img class="img-fluid rounded-circle mb-3"
                                            src="{{asset('storage/images/avatars/img1.jpg')}}"
                                            alt="Image description" width="84">

                                        <h3 class="mb-2">Username: {{$user_details->username}}</h3>
                                        <h5 class="mb-2 text-muted">Full Names:
                                            {{$user_details->first_name}} {{$user_details->last_name}}
                                        </h5>
                                        <h5 class="text-muted mb-2">Phone: {{$user_details->phone}}</h5>
                                        <h5 class="text-muted mb-2">Email: {{$user_details->email ?? 'N/A'}}
                                        </h5>
                                        <h5 class="text-muted mb-4">
                                            Address: {{$user_details->address ?? 'N/A'}}
                                        </h5>
                                        <a class="text-light btn btn-sm btn-primary" data-toggle="modal"
                                            href="#changePasswordModal">
                                            <i class="fa fa-key mr-2"></i> Change Password
                                        </a>
                                    </div>

                                    <div class="col-md-8 pl-4">
                                        <h2 class="card-title">Edit Details</h2>
                                        <?php
                                            @if($error)
                                                <div class="alert alert-danger fade show" role="alert">
                                                    <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                                    <span class="small">{{$error}}</span>
                                                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @elseif ($username_taken)
                                                <div class="alert alert-soft-danger fade show" role="alert">
                                                    <i class="fa fa-exclamation-circle alert-icon mr-3"></i>
                                                    <span class="small">The username is not available.</span>
                                                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @elseif ($message)
                                                <div class="alert alert-soft-success fade show" role="alert">
                                                    <i class="fa fa-check-circle alert-icon mr-3"></i>
                                                    <span class="small">{{$message}}</span>
                                                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        <div class="mt-4">
                                            <form class="mb-3"
                                                action="/update"
                                                id="profile-form" method="POST">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="first_name">First Name</label>
                                                            <input id="first_name" class="form-control"
                                                                name="first_name" type="text" placeholder="" required
                                                                value="{{old('first_name')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="last_name">Last Name</label>
                                                            <input id="last_name" class="form-control" name="last_name"
                                                                type="text" placeholder="" required
                                                                value="{{old('last_name')}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="username">Username</label>
                                                            <input id="username" class="form-control @if($username_taken)is-invalid@endif" name="username"
                                                                type="text" placeholder="" required
                                                                value="{{old('username')}}">
                                                                @if($username_taken)
                                                                    <div class="invalid-feedback">
                                                                        This username is not available
                                                                    </div>
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="phone">Phone Number</label>
                                                            <input id="phone" class="form-control" name="phone"
                                                                type="text" placeholder="" required
                                                                value="{{old('phone')}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="address">Delivery Address: </label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address"
                                                                value="{{old('address')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <label for="email">Email</label>
                                                            <input id="email" class="form-control" name="email"
                                                                type="email" placeholder=""
                                                                value="{{old('email')}}">
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
                </div>
            </div>

            <!-- Footer -->
            <footer class="u-footer text-center text-muted text-muted">
                <p class="h5 mb-0 ml-auto">
                    &copy; <?php echo date("Y");?> <a class="link-muted" href="https://williescant.co.ke"
                        target="_blank">WilieScant
                        Company</a>. All
                    Rights Reserved.
                </p>
            </footer>
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
                <form method="get" id="change_password_form">
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
                url: "/willie-online-new/shop/helpers/update_password.php",
                data: {
                    'password': old_password,
                    'new_password': new_password,
                    'confirm_password': confirm_password
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
    });
</script>
