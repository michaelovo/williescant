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
            <div class="modal-body">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header"><h4>Change your Password</h4></div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{route('update-password')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="current_password"><strong>Current Password:</strong></label>
                                            <input type="password" class="form-control" id="current_password" name="current_password">
                                        </div>
                                        <!-- End Current Password Input -->
                                        <div class="form-group">
                                            <label for="new_password"><strong>New Password:</strong></label>
                                            <input type="password" class="form-control" id="new_password" name="new_password">
                                        </div>
                                        <!-- End New Password Input -->
                                        <div class="form-group">
                                            <label for="new_password_confirmation"><strong>Confirm New Password:</strong></label>
                                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                        </div>
                                        <!-- End New Confirm Password Input -->
                                        <button class="btn btn-success" type="submit">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
