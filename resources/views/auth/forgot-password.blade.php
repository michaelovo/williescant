
$page_title = "Reset Password - WillieScant";

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
                        <div class="w-75 mt-4">
                            <form class="mb-3" action="/">
                                <div class="mb-5 text-center">
                                    <h1 class="h2">Recover Your Password</h1>
                                    <p class="small">If you do not receive an email, please make sure to check your spam
                                        folder as well.</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="email">Your email</label>
                                    <input id="email" class="form-control" name="email" type="email">
                                </div>

                                <button class="btn btn-primary btn-block" type="submit">Recover Password</button>
                            </form>

                            <p class="small text-muted">
                                Don’t have an account? <a href="/auth/register">Sign Up
                                    here</a>
                            </p>
                        </div>

                        <div class="u-login-form text-muted py-3 mt-auto">
                            <small><i class="far fa-question-circle mr-1"></i> If you are not able to recover your
                                password, please <a href="#">contact us</a>.</small>
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

