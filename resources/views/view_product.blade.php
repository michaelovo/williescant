
$page_title = "View Product - WillieScant";

    <!-- Header (Topbar) -->
@include('menu.logged_out_nav')
    <main class="u-main pl-0" role="main">
        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card view-product">
                            <div class="card-body row">
                                <div class="col-md-5">
                                    <div class="view-product-img">
                                        <img src="https://fakeimg.pl/250x100/">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="view-product-details">
                                        <h5 class="h4 card-title">Paper Reams </h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Color</td>
                                                    <td>Weight</td>
                                                    <td>Units</td>
                                                </tr>
                                                <tr>
                                                    <td>White</td>
                                                    <td>100</td>
                                                    <td>KG</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h5 class="h5">Price: <b>KSh 1050</b></h5>
                                        <h5>Avalilable Units: <b>KSh 10</b></h5>
                                        <hr>
                                        <h5 class="h4">Description:</h5>
                                        <p class="card-text">
                                            A4 printing Papers. White Gold
                                        </p>
                                        <hr>
                                        <a href="/shop/cart">
                                            <button class="btn btn-primary pl-4 pr-4">ADD TO CART</button>
                                        </a>
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
