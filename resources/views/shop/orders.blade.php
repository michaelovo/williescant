@extends('layouts.app', ['page_title' => 'Orders - Williescant'])

@section('content')
    <!-- Header (Topbar) -->
@include('menu.customer_nav')
    <!-- End Header (Topbar) -->

    <main class="u-main pl-0" role="main">
        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h1 class="h2 font-wight-semibold mb-4">Your Orders (5)</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">SECURITY CODE</th>
                                                <th scope="col">QUANTITY</th>
                                                <th scope="col">TOTAL COST</th>
                                                <th scope="col">SUPPLIER</th>
                                                <th scope="col">STATUS</th>
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
                                                <td>Ksh 1000</td>
                                                <td>Ksh 2000</td>
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
                                                                    href="#!">
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
                                                                    href="#!">
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
@endsection