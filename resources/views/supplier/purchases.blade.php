@extends('layouts.app', ["page_title" => "Purchases - WillieScant"])

@section('content')
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

                        <div class="d-flex justify-content-between mb-3">
                            <h1 class="h2 font-wight-semibold">Purchase Receipts</h1>
                            <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                    href="#" id="add-purchase-modal-btn">
                                <i class="fa fa-plus mr-2"></i>
                                Add Purchase
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table_dt">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier</th>
                                            <th>PIN</th>
                                            <th>KRA/ETR</th>
                                            <th>Receipt/Serial</th>
                                            <th>Item Count</th>
                                            <th>Sub Total</th>
                                            <th>VAT</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>ESKAR SUPERMARKET</td>
                                            <td>P051774133F</td>
                                            <td>P051774133F</td>
                                            <td>5438</td>
                                            <td>4</td>
                                            <td>327.59</td>
                                            <td>16</td>
                                            <td>380</td>
                                            <td>2021-05-02</td>
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
                                                               data-toggle="modal"
                                                               href="#" onclick="purchaseDetails(395)">
                                                                <i class="fa fa-eye mr-2"></i> Details
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a class="d-flex align-items-center link-muted py-2 px-3"
                                                               data-toggle="modal"
                                                               href="#" onclick="editPurchase(395)">
                                                                <i class="fa fa-edit mr-2"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" onclick="deletePurchase(395)"
                                                               class="d-flex align-items-center link-muted text-danger py-2 px-3">
                                                                <i class="fa fa-trash mr-2"></i> Delete
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
                    &copy; 2021 <a class="link-muted" href="https://williescant.co.ke"
                                   target="_blank">Willie Scant
                        Company</a>. All
                    Rights Reserved.
                </p>
            </footer>
            <!-- End Footer -->
        </div>
    </main>

    <!-- View Purchase Details Modal -->
    <div class="modal fade" id="purchaseDetailsModal" tabindex="-1" role="dialog"
         aria-labelledby="purchaseDetailsModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="purchaseDetailsModal">Purchase Receipt Details</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Supplier and Product details tabs -->
                    <ul class="nav nav-tabs mt-3 mb-3">
                        <li class="nav-item">
                            <a href="#supplier_details" class="nav-link active font-weight-bold" role="tab"
                               aria-selected="true" data-toggle="tab">Supplier Details</a>
                        </li>
                        <li class="nav-item">
                            <a href="#receipt_details" class="nav-link font-weight-bold" role="tab"
                               aria-selected="true" data-toggle="tab">Receipt Details</a>
                        </li>
                        <li class="nav-item">
                            <a href="#receipt_items" class="nav-link font-weight-bold" role="tab"
                               aria-selected="true" data-toggle="tab">Receipt Items</a>
                        </li>
                        <li class="nav-item">
                            <a href="#receipt_images" class="nav-link font-weight-bold" role="tab"
                               aria-selected="true" data-toggle="tab">Receipt Images</a>
                        </li>
                    </ul>
                    <!-- Supplier and Product details tabs -->

                    <!-- Tabs Content -->
                    <div class="tab-content">
                        <!-- Supplier Details -->
                        <div class="tab-pane fade show active" id="supplier_details" role="tabpanel">
                            <div class="row details-row" id="supplier-details-row">
                            </div>
                        </div>
                        <!-- End Supplier Details -->

                        <!-- Receipt Details -->
                        <div class="tab-pane fade" id="receipt_details" role="tabpanel">
                            <div class="row details-row" id="receipt-details-row">
                            </div>
                        </div>
                        <!-- End Receipt Details -->

                        <!-- Receipt Items -->
                        <div class="tab-pane fade" id="receipt_items" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                    </tr>
                                    </thead>
                                    <tbody id="items-details-row">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Receipt Items -->

                        <!-- Receipt images -->
                        <div class="tab-pane fade" id="receipt_images" role="tabpanel">
                            <div class="row" id="receipt_images_container"></div>
                        </div>
                        <!-- End receipt images -->

                    </div>
                    <!-- End Tabs Content -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End View Purchase Details Modal -->


    <!-- Add Purchase Modal -->
    <div class="modal fade" id="addPurchaseModal" tabindex="-1" role="dialog" aria-labelledby="addPurchaseModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addPurchaseModal">Add Purchase Receipt</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="add-purchase-form">
                    <div class="modal-body">

                        <!-- Supplier and Product details tabs -->
                        <ul class="nav nav-tabs mt-3 mb-3">
                            <li class="nav-item">
                                <a href="#add-supplier-details" id="add-supplier-details-tab" class="nav-link active font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Supplier Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#add-receipt-items" id="add-receipt-items-tab" class="nav-link font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Receipt Items</a>
                            </li>
                            <li class="nav-item">
                                <a href="#add-receipt-details" id="add-receipt-details-tab" class="nav-link font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Receipt Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#add-receipt-picture" id="add-receipt-picture-tab" class="nav-link font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Receipt Pictures</a>
                            </li>
                        </ul>
                        <!-- Supplier and Product details tabs -->

                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <!-- Supplier Details -->
                            <div class="tab-pane fade show active" id="add-supplier-details" role="tabpanel">
                                <div class="form-row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="pin">KRA PIN</label>
                                            <input id="pin" class="form-control" name="pin" type="text"
                                                   placeholder="KRA PIN" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="supplier_name">Supplier Name</label>
                                            <input id="supplier_name" class="form-control" name="supplier_name"
                                                   type="text" placeholder="Enter Supplier Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="phone">Phone</label>
                                            <input id="phone" class="form-control" name="phone" type="text"
                                                   placeholder="Supplier Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="email">Email</label>
                                            <input id="email" class="form-control" name="email"
                                                   type="email" placeholder="Enter Supplier Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="website">Wesbite</label>
                                            <input id="website" class="form-control" name="website" type="text"
                                                   placeholder="Supplier Website">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="location">Location</label>
                                            <input id="location" class="form-control" name="location"
                                                   type="text" placeholder="Enter Supplier Location">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Supplier Details -->

                            <!-- Receipt Items -->
                            <div class="tab-pane fade show" id="add-receipt-items" role="tabpanel">
                                <div class="form-row mb-2 receipt-item">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="product_name_1">Name</label>
                                            <input id="product_name_1" class="form-control" name="product_name_1" type="text"
                                                   placeholder="Product Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="product_description_1">Description</label>
                                            <input id="product_description_1" class="form-control" name="product_description_1"
                                                   type="text" placeholder="Product Description">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="product_quantity_1">Quantity</label>
                                            <input id="product_quantity_1" class="form-control" name="product_quantity_1" type="number"
                                                   placeholder="Product Qauntity" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="product_unit_price_1">Unit Price</label>
                                            <input id="product_unit_price_1" class="form-control" name="product_unit_price_1"
                                                   step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" onclick="removeFormset(Event, this, false)"
                                                disabled class="btn btn-sm btn-danger remove-item-btn text-small d-none">
                                        </button>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <hr/>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-block btn-sm btn-secondary add-item-formset">Add another row</button>
                            </div>
                            <!-- End Receipt Items -->

                            <!-- Receipt Details -->
                            <div class="tab-pane fade" id="add-receipt-details" role="tabpanel">
                                <div class="form-row mb-2">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="receipt_number">Receipt/Invoice Serial No</label>
                                            <input id="receipt_number" class="form-control" name="receipt_number"
                                                   type="text" placeholder="0059" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="etr">KRA/ETR Serial No</label>
                                            <input id="etr" class="form-control" name="etr"
                                                   type="text" placeholder="KRA/ETR/10032006" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="vat">VAT</label>
                                            <input id="vat" class="form-control" name="vat" type="number"
                                                   step="0.01" placeholder="Total incurred VAT" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="sub_total">Sub Total</label>
                                            <input id="sub_total" class="form-control" name="sub_total"
                                                   step="0.01" type="number" placeholder="Sub Total" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="total_price">Total Price</label>
                                            <input id="total_price" class="form-control" name="total_price"
                                                   step="0.01" type="number" placeholder="Total Price" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="date">ETR Date</label>
                                            <input type="date" name="date" id="date" class="form-control" placeholder="ETR Date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="time">Time</label>
                                            <input type="time" name="time" id="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Receipt Details -->

                            <!-- Receipt picture upload -->
                            <div class="tab-pane fade" id="add-receipt-picture" role="tabpanel">
                                <div class="form-row mb-2">
                                    <div class="col form-group mb-2">
                                        <div class="alert alert-soft-info">Please upload full clear images of the receipt</div>
                                        <input type="file" id="add-image" name="images" placeholder="Upload full receipt image(s)" multiple>

                                        <div class="form-row" id="add-image-preview__container">
                                            <div class="card form-group col-md-6 mt-2 d-none">
                                                <div class="card-body d-flex flex-column">
                                                    <img src="#" id="add-image-preview__item" alt="Product Image" height="75" width="100%">
                                                    <button class="btn btn-sm btn-outline-danger mt-1" type="button" id="add-img-remove">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Receipt picture upload -->

                        </div>
                        <!-- End Tabs Content -->
                    </div>

                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="modal-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span></span>
                            </div>
                            <div id="modal-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                                 role="alert">
                                <i class="fa fa-check-circle alert-icon mr-3"></i>
                                <span class="small">Successfully added the purchase</span>
                            </div>
                        </div>
                        <!-- End Errors -->
                        <div>
                                <span data-dismiss="modal" class="mr-2"
                                      style="font-weight: 600; cursor: pointer;">Cancel</span>
                            <button id="add-modal-prev" type="button" class="d-none btn btn-primary pl-3 pr-3">
                                <i class="fa fa-angle-double-left"></i> Back
                            </button>
                            <button id="add-modal-next" type="button" class="btn btn-primary pl-3 pr-3">
                                Next <i class="fa fa-angle-double-right"></i>
                            </button>
                            <input type="submit" id="add-purchase-submit" class="d-none btn btn-primary pl-4 pr-4" value="Add Purchase" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Purchase Modal -->

    <!-- Edit Purchase Modal -->
    <div class="modal fade" id="editPurchaseModal" tabindex="-1" role="dialog" aria-labelledby="editPurchaseModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="editPurchaseModal">Edit Purchase Receipt</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="edit-purchase-form">
                    <div class="modal-body">

                        <!-- Supplier and Product details tabs -->
                        <ul class="nav nav-tabs mt-3 mb-3">
                            <li class="nav-item">
                                <a href="#edit-supplier-details" class="nav-link active font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Supplier Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#edit-receipt-items" class="nav-link font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Receipt Items</a>
                            </li>
                            <li class="nav-item">
                                <a href="#edit-receipt-details" class="nav-link font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Receipt Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#edit-receipt-picture" class="nav-link font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Receipt Pictures</a>
                            </li>
                        </ul>
                        <!-- Supplier and Product details tabs -->

                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <!-- Supplier Details -->
                            <div class="tab-pane fade show active" id="edit-supplier-details" role="tabpanel">
                            </div>
                            <!-- End Supplier Details -->

                            <!-- Receipt Items -->
                            <div class="tab-pane fade show" id="edit-receipt-items" role="tabpanel">
                                <button id="add-item-formset-edit" type="button" class="btn btn-block btn-sm btn-secondary">Add another row</button>
                            </div>
                            <!-- End Receipt Items -->

                            <!-- Receipt Details -->
                            <div class="tab-pane fade" id="edit-receipt-details" role="tabpanel">

                            </div>
                            <!-- End Receipt Details -->

                            <!-- Receipt picture -->
                            <div class="tab-pane fade" id="edit-receipt-picture" role="tabpanel">
                                <div class="form-row mb-2">
                                    <div class="col form-group mb-2">
                                        <div class="alert alert-soft-info">Please upload full clear images of the receipt</div>
                                        <input type="file" id="edit-image" name="images" placeholder="Upload full receipt image(s)" multiple>
                                    </div>

                                    <div class="form-row" id="edit-image-preview__container">
                                    </div>
                                    <div class="form-row" id="edit-image-preview__container__old">
                                    </div>
                                </div>
                            </div>
                            <!-- End Receipt picture -->

                        </div>
                        <!-- End Tabs Content -->
                    </div>

                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="modal-edit-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span></span>
                            </div>
                            <div id="modal-edit-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                                 role="alert">
                                <i class="fa fa-check-circle alert-icon mr-3"></i>
                                <span class="small">Successfully updated the purchase</span>
                            </div>
                        </div>
                        <!-- End Errors -->
                        <div>
                                <span data-dismiss="modal" class="mr-2"
                                      style="font-weight: 600; cursor: pointer;">Cancel</span>
                            <input type="submit" class="btn btn-primary pl-4 pr-4" value="Update Purchase" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Purchase Modal -->



    <!-- Global Vendor -->

    <!-- Plugins -->

@include('supplier.purchases._add-new-purchase')
    <!-- Initialization  -->
    <script src="{{asset('./js/purchases.js')}}"></script>
@endsection
