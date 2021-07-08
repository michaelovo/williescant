
$page_title = "Orders - WillieScant";

    <!-- Header (Topbar) -->
@include('menu.supplier_nav')
    <!-- End Header (Topbar) -->

    <main class="u-main" role="main">
        <!-- Sidebar -->
@include('menu.sidebar')
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="h2 font-wight-semibold mb-4">All Orders</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table_dt">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">SECURITY CODE</th>
                                                <th scope="col">QUANTITY</th>
                                                <th scope="col">COST</th>
                                                <th scope="col">CUSTOMER</th>
                                                <th scope="col">VALUE</th>
                                                <th scope="col">RECEIPT STATUS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    642376
                                                </td>
                                                <td>
                                                    5
                                                </td>
                                                <td>Ksh 2000</td>
                                                <td>Test Customer</td>
                                                <td>
                                                    <span class="badge badge-secondary">Unconfirmed</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Awaiting</span>
                                                </td>
                                                <td class="text-center">
                                                    <a id="actions3Invoker" class="link-muted" href="#!"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-toggle="dropdown">
                                                        <i class="fa fa-sliders-h"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right dropdown"
                                                        style="width: 150px;" aria-labelledby="actions3Invoker">
                                                        <ul class="list-unstyled mb-0">
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                    data-toggle="modal" href="#orderDetailsModal">
                                                                    <i class="fa fa-eye mr-2"></i> Details
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted text-danger py-2 px-3"
                                                                    href="#!">
                                                                    <i class="fa fa-ban mr-2"></i> Cancel
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    465476
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                <td>Ksh 22050</td>
                                                <td>Paper Suppliers</td>
                                                <td>
                                                    <span class="badge badge-success">Delivered</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Received</span>
                                                </td>
                                                <td class="text-center">
                                                    <a id="actions3Invoker" class="link-muted" href="#!"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-toggle="dropdown">
                                                        <i class="fa fa-sliders-h"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right dropdown"
                                                        style="width: 150px;" aria-labelledby="actions3Invoker">
                                                        <ul class="list-unstyled mb-0">
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                    data-toggle="modal" href="#orderDetailsModal">
                                                                    <i class="fa fa-eye mr-2"></i> Details
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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


    <!-- View Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="purchaseDeorderDetailsModaltailsModal">Order Details</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row details-row">

                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                KRA PIN
                            </div>
                            <div class="details-value">
                                A009876546A
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Supplier Name
                            </div>
                            <div class="details-value">
                                Joshua
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Supplier Location
                            </div>
                            <div class="details-value">
                                10663-00100 NAIROBI
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Product Name
                            </div>
                            <div class="details-value">
                                Sticky Glue
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Product Description
                            </div>
                            <div class="details-value">
                                Glue
                            </div>
                        </div>

                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Receipt Number
                            </div>
                            <div class="details-value">
                                55555
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Quantity
                            </div>
                            <div class="details-value">
                                2
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Unit Price
                            </div>
                            <div class="details-value">
                                1000
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Total Price
                            </div>
                            <div class="details-value">
                                2000
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                VAT
                            </div>
                            <div class="details-value">
                                320
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Sub Total
                            </div>
                            <div class="details-value">
                                1680
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Date
                            </div>
                            <div class="details-value">
                                2019-10-19
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Time
                            </div>
                            <div class="details-value">
                                14:22:00
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                SKU
                            </div>
                            <div class="details-value">
                                N/A
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Order Details Modal -->
