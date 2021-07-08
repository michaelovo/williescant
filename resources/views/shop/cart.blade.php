$page_title = "Cart - WillieScant";


    <!-- Header (Topbar) -->
@include('menu.customer_nav')
    <!-- End Header (Topbar) -->

    <main class="u-main pl-0" role="main">
        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">PRODUCT</th>
                                                <th scope="col">QUANTITY</th>
                                                <th scope="col">UNIT PRICE</th>
                                                <th scope="col">SUBTOTAL</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div class="row text-dark">
                                                        <div class="col-1 pl-0 pr-0">
                                                            <a href="#">
                                                                <img style="height: 60px; width: 50px"
                                                                    src="https://fakeimg.pl/250x100/" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-8 ml-3">
                                                            <div class="small text-muted">Supplier: Paper Suppliers Ltd.
                                                            </div>
                                                            <a href="" class="text-info mt-1">
                                                                <h5 class="h4">Cool Product Name</h5>
                                                            </a>
                                                            <a href="">
                                                                <button
                                                                    class="btn btn-sm btn-outline-danger pl-1 pr-1 pt-1 pb-1"
                                                                    style="font-size: 0.65rem;">
                                                                    <i class="fa fa-trash"></i> Remove
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input class="w-25 form-control" type="number" value="5">
                                                </td>
                                                <td>Ksh 1000</td>
                                                <td>Ksh 2000</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <div class="row text-dark">
                                                        <div class="col-1 pl-0 pr-0">
                                                            <a href="#">
                                                                <img style="height: 60px; width: 50px"
                                                                    src="https://fakeimg.pl/250x100/" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-8 ml-3">
                                                            <div class="small text-muted">Supplier: Paper Suppliers Ltd.
                                                            </div>
                                                            <a href="" class="text-info mt-1">
                                                                <h5 class="h4">Cool Product Name</h5>
                                                            </a>
                                                            <a href="">
                                                                <button
                                                                    class="btn btn-sm btn-outline-danger pl-1 pr-1 pt-1 pb-1"
                                                                    style="font-size: 0.65rem;">
                                                                    <i class="fa fa-trash"></i> Remove
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input class="w-25 form-control" type="number" value="5">
                                                </td>
                                                <td>Ksh 100</td>
                                                <td>Ksh 500</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row p-0 m-0">
                                        <div class="col-sm-7 col-md-9 p-0"></div>
                                        <div class="col-sm-5 col-md-3 p-0">
                                            <footer class="mt-4 row p-0 m-0">
                                                <div class="col-6 p-0"><b>Total:</b></div>
                                                <div class="col-6 p-0 text-secondary text-left"><b>KSh 2500</b></div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="row p-0 m-0">
                                    <div class="col-sm-7 col-md-8 p-0"></div>
                                    <div class="col-sm-5 col-md-4 p-0">
                                        <a href="#" class="mr-2">
                                            <button class="btn btn-info">CONTINUE SHOPPING</button>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-info">CHECKOUT</button>
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

