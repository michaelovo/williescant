
$page_title = "Purchases - WillieScant";


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
                                    href="#addPurchaseModal">
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
                                                    <th>Receipt No</th>
                                                    <th>Item Count</th>
                                                    <th>Sub Total</th>
                                                    <th>VAT</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($purchases as $key => $purchase)
                                                    <tr>
                                                    <td>$key + 1</td>
                                                    <td>$purchase->supplier_name</td>
                                                    <td>$purchase->pin</td>
                                                    <td>$purchase->receipt_number</td>
                                                    <td>$purchase->total_items</td>
                                                    <td>$purchase->sub_total</td>
                                                    <td>$purchase->vat</td>
                                                    <td>$purchase->total_price</td>
                                                    <td>$purchase->date</td>
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
                                                                        href="#" onclick="purchaseDetails('{{$purchase->id}}')">
                                                                        <i class="fa fa-eye mr-2"></i> Details
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                        data-toggle="modal"
                                                                        href="#" onclick="editPurchase('{{$purchase->id}}')">
                                                                        <i class="fa fa-edit mr-2"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" onclick="deletePurchase('{{$purchase->id}}')"
                                                                        class="d-flex align-items-center link-muted text-danger py-2 px-3">
                                                                        <i class="fa fa-ban mr-2"></i> Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    </tr>
                                                    @endforeach
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
                                    <a href="#add-supplier-details" class="nav-link active font-weight-bold" role="tab"
                                        aria-selected="true" data-toggle="tab">Supplier Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#add-receipt-items" class="nav-link font-weight-bold" role="tab"
                                        aria-selected="true" data-toggle="tab">Receipt Items</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#add-receipt-details" class="nav-link font-weight-bold" role="tab"
                                        aria-selected="true" data-toggle="tab">Receipt Details</a>
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
                                    <div class="form-row mb-2">
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
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="required-label" for="receipt_number">Receipt Number</label>
                                                <input id="receipt_number" class="form-control" name="receipt_number"
                                                    type="text" placeholder="Enter Receipt Number" required>
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
                                                <label class="required-label" for="date">Date</label>
                                                <input type="date" name="date" id="date" class="form-control" required>
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
                                <input type="submit" class="btn btn-primary pl-4 pr-4" value="Add Purchase" />
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
    <!-- End Add Purchase Modal -->

</body>
<?php
include '../templates/body.blade.php';
?>

<script>

var formsetCount = 1;
var editFormsetCount = 1;
var oldItemCount = 1;

$(".add-item-formset").click(() => {
    formsetCount += 1;
    let addFormsetBtn = $(".add-item-formset");
    let formset = `
        <div class="form-row mb-2">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_name_${formsetCount}">Name</label>
                    <input id="product_name_${formsetCount}" class="form-control" name="product_name_${formsetCount}" type="text"
                        placeholder="Product Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="product_description_${formsetCount}">Description</label>
                    <input id="product_description_${formsetCount}" class="form-control" name="product_description_${formsetCount}"
                        type="text" placeholder="Product Description">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_quantity_${formsetCount}">Quantity</label>
                    <input id="product_quantity_${formsetCount}" class="form-control" name="product_quantity_${formsetCount}" type="number"
                        placeholder="Product Qauntity" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_unit_price_${formsetCount}"">Unit Price</label>
                    <input id="product_unit_price_${formsetCount}"" class="form-control" name="product_unit_price_${formsetCount}"
                    step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                </div>
            </div>
            <div class="col-md-6">
                <button type="button" onclick="removeFormset(Event, this)" class="btn btn-sm btn-danger text-small">Remove item</button>
            </div>
            <div class="col-md-12 mt-2">
                <hr/>
            </div>
        </div>
    `;
    $(formset).insertBefore(addFormsetBtn);
});

$("#edit-purchase-form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#edit-purchase-form")[0]);
    $("#modal-edit-success").addClass("d-none");
    $("#modal-edit-errors").addClass("d-none");
    products = [];
    old_items = [];

    // Extract New Receipt Items
    for(var i=1; i<editFormsetCount; i++) {
        receipt_item = {
            name: $("#edit-purchase-form").find(`#product_name_${i}`).val(),
            description: $("#edit-purchase-form").find(`#product_description_${i}`).val(),
            quantity: $("#edit-purchase-form").find(`#product_quantity_${i}`).val(),
            unit_price: $("#edit-purchase-form").find(`#product_unit_price_${i}`).val(),
        }
        products.push(receipt_item);

        formData.delete(`product_name_${i}`);
        formData.delete(`product_description_${i}`);
        formData.delete(`product_quantity_${i}`);
        formData.delete(`product_unit_price_${i}`);
    }

    // Extract existing receipt items(To be updatd only)
    for(var i=1; i < oldItemCount + 1; i++) {
        receipt_item = {
            name: $("#edit-purchase-form").find(`#new_product_name_${i}`).val(),
            description: $("#edit-purchase-form").find(`#new_product_description_${i}`).val(),
            quantity: $("#edit-purchase-form").find(`#new_product_quantity_${i}`).val(),
            unit_price: $("#edit-purchase-form").find(`#new_product_unit_price_${i}`).val(),
            id: $("#edit-purchase-form").find(`#new_product_id_${i}`).val(),
        }
        old_items.push(receipt_item);

        formData.delete(`new_product_name_${i}`);
        formData.delete(`new_product_description_${i}`);
        formData.delete(`new_product_quantity_${i}`);
        formData.delete(`new_product_unit_price_${i}`);
        formData.delete(`new_product_id_${i}`);
    }
    parsedFormdata = {};
    for (var entry of formData.entries()) {
        parsedFormdata[entry[0]] = entry[1];
    }
    // console.log({...parsedFormdata, 'receipt_products':products, 'old_items': old_items});
    $.ajax({
        type: 'POST',
        url: "/willie-online-new/supplier/includes/edit_purchase.php",
        data: {...parsedFormdata, 'receipt_products':products, 'old_items': old_items},
        success: function (result) {
            console.log(result);
            res = JSON.parse(result);
            if (res['success']) {
                $("#modal-edit-success").removeClass('d-none');
                $("#edit-purchase-form")[0].reset();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else if(res['error']) {
                $("#modal-edit-success").addClass("d-none");
                $("#modal-edit-errors").find("span").text(res['error']);
                $("#modal-edit-errors").removeClass('d-none');
            } else {
                $("#modal-edit-errors").find("span").text('Server Error. Failed to update purchase.');
                $("#modal-edit-errors").removeClass('d-none');
            }
        }
    });
});

$("#add-purchase-form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#add-purchase-form")[0]);
    $("#modal-success").addClass("d-none");
    $("#modal-errors").addClass("d-none");
    products = [];

    // Extract Receipt Items
    for(var i=1; i<formsetCount + 1; i++) {
        var item_1;
        receipt_item = {
            name: $("#add-purchase-form").find(`#product_name_${i}`).val(),
            description: $("#add-purchase-form").find(`#product_description_${i}`).val(),
            quantity: $("#add-purchase-form").find(`#product_quantity_${i}`).val(),
            unit_price: $("#add-purchase-form").find(`#product_unit_price_${i}`).val(),
        }
        products.push(receipt_item);

        formData.delete(`product_name_${i}`);
        formData.delete(`product_description_${i}`);
        formData.delete(`product_quantity_${i}`);
        formData.delete(`product_unit_price_${i}`);
    }
    parsedFormdata = {};
    for (var entry of formData.entries()) {
        parsedFormdata[entry[0]] = entry[1];
    }

    $.ajax({
        type: 'POST',
        url: "/willie-online-new/supplier/includes/add_purchase.php",
        data: {...parsedFormdata, 'receipt_products':products},
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                $("#modal-success").removeClass('d-none');
                $("#add-purchase-form")[0].reset();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else if(res['error']) {
                $("#modal-success").addClass("d-none");
                $("#modal-errors").find("span").text(res['error']);
                $("#modal-errors").removeClass('d-none');
            } else {
                $("#modal-errors").find("span").text('Server Error. Failed to add receipt.');
                $("#modal-errors").removeClass('d-none');
            }
        }
    });
});

function purchaseDetails(purchase_id) {
    $.ajax({
        type: 'GET',
        url: `/willie-online-new/supplier/includes/get_purchase.php/?purchase_id=${purchase_id}`,
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var receipt_details = res['receipt_details'];
                var supplier_details = res['supplier_details'];
                var receipt_items = res['receipt_items'];

                $("#supplier-details-row").html(supplier_details)
                $("#receipt-details-row").html(receipt_details)
                $("#items-details-row").html(receipt_items)

                $("#purchaseDetailsModal").modal('show');
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function deletePurchase(purchase_id) {
    if(confirm("This purchase receipt will be deleted permanently")) {
        $.ajax({
        type: 'POST',
        url: "/willie-online-new/supplier/includes/delete_purchase.php",
        data: {'purchase_id': purchase_id},
        // processData: false,
        // contentType: false,
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
        });
    }
}

// Remove item formset
function removeFormset(e, formset) {
    $(formset).parent().parent().remove();
}

function editPurchase(purchase_id, ) {
    $("#edit-receipt-items").html(
        `<button id="add-item-formset-edit" type="button"
        class="btn btn-block btn-sm btn-secondary add-item-formset">Add another row</button>`);

        $("#add-item-formset-edit").click(() => {
            let addFormsetBtn = $("#add-item-formset-edit");
            let formset = `
                <div class="form-row mb-2">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="product_name_${editFormsetCount}">Name</label>
                            <input id="product_name_${editFormsetCount}" class="form-control" name="product_name_${editFormsetCount}" type="text"
                                placeholder="Product Name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="product_description_${editFormsetCount}">Description</label>
                            <input id="product_description_${editFormsetCount}" class="form-control" name="product_description_${editFormsetCount}"
                                type="text" placeholder="Product Description">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="product_quantity_${editFormsetCount}">Quantity</label>
                            <input id="product_quantity_${editFormsetCount}" class="form-control" name="product_quantity_${editFormsetCount}" type="number"
                                placeholder="Product Qauntity" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="product_unit_price_${editFormsetCount}"">Unit Price</label>
                            <input id="product_unit_price_${editFormsetCount}"" class="form-control" name="product_unit_price_${editFormsetCount}"
                            step="0.01"  type="number" placeholder="Unit Price(Price of a single item)" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="removeFormset(Event, this)" class="btn btn-sm btn-danger text-small">Remove item</button>
                    </div>
                    <div class="col-md-12 mt-2">
                        <hr/>
                    </div>
                </div>
            `;
            $(formset).insertBefore(addFormsetBtn);
            editFormsetCount += 1;
        });

    $.ajax({
        type: 'GET',
        url: `/willie-online-new/supplier/includes/get_purchase.php/?purchase_id=${purchase_id}&edit=1`,
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var receipt_details = res['receipt_details'];
                var supplier_details = res['supplier_details'];
                var receipt_items = res['receipt_items'];

                oldItemCount = Number(res['data']['total_items']);

                $("#edit-supplier-details").html(supplier_details)
                $("#edit-receipt-details").html(receipt_details)
                $(receipt_items).insertBefore($("#add-item-formset-edit"));

            } else {
                $("#modal-edit-errors").find('span').text('Failed to fetch receipt details try again later')
                $("#modal-edit-errors").removeClass('d-none');
            }
        }
    });
    $("#editPurchaseModal").modal("show");
}

// Delete existing item and remove formset..
function deleteItem(e, formset, item_id, receipt_id) {
    if(confirm('The item will be deleted permanently')) {
        $.ajax({
            type: 'POST',
            url: "/willie-online-new/supplier/includes/delete_item.php",
            data: {'item_id':item_id, 'receipt_id': receipt_id, 'receipt_type': 'purchase'},
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-edit-success").removeClass('d-none');
                    $("#modal-edit-success").find('span').text('Item deleted succesfully');
                    oldItemCount -= 1;
                    $(formset).parent().parent().remove();
                } else if(res['error']) {
                    $("#modal-edit-success").addClass("d-none");
                    $("#modal-edit-errors").find("span").text(res['error']);
                    $("#modal-edit-errors").removeClass('d-none');
                } else {
                    $("#modal-edit-errors").find("span").text('Server Error. Failed to delete item.');
                    $("#modal-edit-errors").removeClass('d-none');
                }
            }
        });
    }
}
</script>
