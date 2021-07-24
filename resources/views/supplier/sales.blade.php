@extends('layouts.app', ["page_title" => "Sales - WillieScant"])

@section('content')
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
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{Session::get('fail')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
                        <div class="d-flex justify-content-between mb-3">
                            <h1 class="h2 font-wight-semibold">Sales Receipts</h1>
                            <button class="btn btn-sm btn-outline-primary" id="add-sale-modal-btn" data-toggle="modal" href="#">
                                <i class="fa fa-plus mr-2"></i>
                                Add Sale
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table_dt">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>PIN</th>
                                                <th>Receipt No</th>
                                                <th>ETR</th>
                                                <th>Item Count</th>
                                                <th>Sub Total</th>
                                                <th>Total Price</th>
                                                <th>VAT</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>{{$sale->id}}</td>
                                                    <td>{{$sale->pin}}</td>
                                                    <td>{{$sale->receipt_number}}</td>
                                                    <td>{{$sale->etr}}</td>
                                                    <td>{{$sale->total_items}}</td>
                                                    <td>{{$sale->sub_total}}</td>
                                                    <td>{{$sale->total_price}}</td>
                                                    <td>{{$sale->vat}}</td>
                                                    <td>{{$sale->date}}</td>
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
                                                                    href="#" onclick="saleDetails('{{$sale->id}}')">
                                                                    <i class="fa fa-eye mr-2"></i> Details
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                    data-toggle="modal"
                                                                    href="#" onclick="editSale('.$sale['id'].')">
                                                                    <i class="fa fa-edit mr-2"></i> Edit
                                                                </a>
                                                            </li>                                                              
                                                            <li>
                                                                <a href="#" onclick="deleteSale('.$sale['id'].')"
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
                    &copy; 2021 <a class="link-muted" href="https://williescant.co.ke"
                        target="_blank">Willie Scant
                        Company</a>. All
                    Rights Reserved.
                </p>
            </footer>
            <!-- End Footer -->
        </div>
    </main>

    <!-- Add Sale Modal -->
    <div class="modal fade" id="addSaleModal" tabindex="-1" role="dialog" aria-labelledby="addSaleModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addSaleModal">Add Sale Receipt</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="add-sale-form" method="POST" action="{{route('add-sale')}}">
                    @csrf
                    <div class="modal-body">
                    <!-- Supplier and Product details tabs -->
                    <ul class="nav nav-tabs mt-3 mb-3">
                        <li class="nav-item">
                            <a href="#receipt_items" id="add-receipt-items-tab" class="nav-link font-weight-bold active" role="tab"
                                aria-selected="true" data-toggle="tab">Receipt Items</a>
                        </li>                      
                        <li class="nav-item">
                            <a href="#receipt_details" id="add-receipt-details-tab" class="nav-link font-weight-bold" role="tab"
                                aria-selected="true" data-toggle="tab">Receipt Details</a>
                        </li>
                    </ul>
                    <!-- Receipt item and details details tabs -->

                    <!-- Tabs Content -->
                    <div class="tab-content">                    
                        <!-- Receipt Items -->
                        <div class="tab-pane fade show active" id="receipt_items" role="tabpanel">
                            <div class="form-row mb-2 receipt-item">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="product_name_1">Name</label>
                                        <input id="product_name_1" class="form-control" name="receipt_items[0][product_name]" type="text"
                                            placeholder="Product Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="product_description_1">Description</label>
                                        <input id="product_description_1" class="form-control" name="receipt_items[0][product_description]"
                                            type="text" placeholder="Product Description">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="product_quantity_1">Quantity</label>
                                        <input id="product_quantity_1" class="form-control" name="receipt_items[0][product_quantity]" type="number"
                                            placeholder="Product Qauntity" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="product_unit_price_1">Unit Price</label>
                                        <input id="product_unit_price_1" class="form-control" name="receipt_items[0][product_unit_price]"
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
                            <button id="add-item-formset" type="button" class="btn btn-block btn-sm btn-secondary">Add another row</button>                                        
                        </div>
                        <!-- End Receipt Items -->

                        <!-- Receipt Details -->
                        <div class="tab-pane fade" id="receipt_details" role="tabpanel">
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
                                        <label class="required-label" for="etr_number">KRA/ETR Serial No</label>
                                        <input id="etr_number" class="form-control" name="etr"
                                            type="text" placeholder="KRA/ETR/10032006" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="pin">Cutomer's KRA PIN</label>
                                        <input id="pin" class="form-control" name="pin" type="text"
                                            placeholder="P05135163Z" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="customer_name">Customer Name</label>
                                        <input id="customer_name" class="form-control" name="customer_name" type="text"
                                            placeholder="Customer Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
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
                                        step="0.01"  type="number" placeholder="Sub Total" required>
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
                            <span class="small">Successfully added the sale</span>
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
                        <input type="submit" id="add-sale-submit" class="d-none btn btn-primary pl-4 pr-4" value="Add Sale" />
                    </div>                          
                </div>
            </form>                
            </div>
        </div>
    </div>
    <!-- End Add Sale Modal -->


    <!-- Edit Sale Modal -->
    <div class="modal fade" id="editSaleModal" tabindex="-1" role="dialog" aria-labelledby="editSaleModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="editSaleModal">Edit Sale Receipt</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="edit-sale-form">
                    <div class="modal-body">
                    <!-- Supplier and Product details tabs -->
                    <ul class="nav nav-tabs mt-3 mb-3">
                        <li class="nav-item">
                            <a href="#edit-receipt-items" id="edit-receipt-items-tab" class="nav-link font-weight-bold active" role="tab"
                                aria-selected="true" data-toggle="tab">Receipt Items</a>
                        </li>                      
                        <li class="nav-item">
                            <a href="#edit-receipt-details" id="edit-receipt-details-tab" class="nav-link font-weight-bold" role="tab"
                                aria-selected="true" data-toggle="tab">Receipt Details</a>
                        </li>
                    </ul>
                    <!-- Receipt item and details details tabs -->

                    <!-- Tabs Content -->
                    <div class="tab-content">                    
                        <!-- Receipt Items -->
                        <div class="tab-pane fade show active" id="edit-receipt-items" role="tabpanel">                             
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
                            <span class="small">Successfully updated the sale receipt</span>
                        </div>
                    </div>
                    <!-- End Errors -->  
                    <div>
                        <span data-dismiss="modal" class="mr-2"
                            style="font-weight: 600; cursor: pointer;">Cancel</span>
                        <input type="submit" class="btn btn-primary pl-4 pr-4" value="Update Sale" />
                    </div>                          
                </div>
            </form>                
            </div>
        </div>
    </div>
    <!-- End Edit Sale Modal -->

    <!-- View sale Details Modal -->
    <div class="modal fade" id="saleDetailsModal" tabindex="-1" role="dialog"
    aria-labelledby="saleDetailsModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="saleDetailsModal">Sale Receipt Details</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <!-- Supplier and Product details tabs -->
                        <ul class="nav nav-tabs mt-3 mb-3">
                            <li class="nav-item">
                                <a href="#receipt-details" class="nav-link active" role="tab" aria-selected="true" data-toggle="tab">
                                    Receipt Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#receipt-items" class="nav-link" role="tab" aria-selected="true" data-toggle="tab">
                                    Receipt Items
                                </a>
                            </li>
                        </ul>                        
                        <!-- Supplier and Product details tabs -->

                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="receipt-details" role="tabpanel">
                                <div class="row details-row" id="receipt-details-row">
                                </div>                                  
                            </div>

                            <div class="tab-pane fade" id="receipt-items" role="tabpanel">
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
    <!-- End View Sale Details Modal -->
    <script>

var formsetCount = 1;
var editFormsetCount = 1;
var oldItemCount = 1;
let d = new Date();
d = d.toISOString().substring(0,10);
$("#date").attr("max", d);

$("#add-item-formset").click(() => {
    formsetCount += 1;
    let addFormsetBtn = $("#add-item-formset");
    let formset = `
        <div class="form-row mb-2 receipt-item">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_name_${formsetCount}">Name</label>
                    <input id="product_name_${formsetCount}" class="form-control" name="receipt_items[${formsetCount}][product_name]" type="text"
                        placeholder="Product Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="product_description_${formsetCount}">Description</label>
                    <input id="product_description_${formsetCount}" class="form-control" name="receipt_items[${formsetCount}][product_description]"
                        type="text" placeholder="Product Description">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_quantity_${formsetCount}">Quantity</label>
                    <input id="product_quantity_${formsetCount}" class="form-control" name="receipt_items[${formsetCount}][product_quantity]" type="number"
                        placeholder="Product Qauntity" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_unit_price_${formsetCount}"">Unit Price</label>
                    <input id="product_unit_price_${formsetCount}"" class="form-control" name="receipt_items[${formsetCount}][product_unit_price]"
                    step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                </div>
            </div>
            <div class="col-md-6">
                <button type="button" onclick="removeFormset(Event, this, false)" 
                class="btn btn-sm btn-danger text-small remove-item-btn">Remove item ${formsetCount}</button>            
            </div>
            <div class="col-md-12 mt-2">
                <hr/>            
            </div>
        </div>
    `;
    $(formset).insertBefore(addFormsetBtn);
});

$("").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#add-sale-form")[0]);
    $("#modal-success").addClass("d-none");
    $("#modal-errors").addClass("d-none");
    products = [];
    
    // Extract Receipt Items
    for(var i=1; i<formsetCount + 1; i++) {
            var item_1;
            receipt_item = {
                name: $("#add-sale-form").find(`#product_name_${i}`).val(),
                description: $("#add-sale-form").find(`#product_description_${i}`).val(),
                quantity: $("#add-sale-form").find(`#product_quantity_${i}`).val(),
                unit_price: $("#add-sale-form").find(`#product_unit_price_${i}`).val(),
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
        url: "/supplier/includes/add_sale.php",
        data: {...parsedFormdata, 'receipt_products':products},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                $("#modal-success").removeClass('d-none');
                $("#add-sale-form")[0].reset();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else if(res['error']) {
                $("#modal-success").addClass("d-none");
                $("#modal-errors").find("span").text(res['error']);
                $("#modal-errors").removeClass('d-none');        
            } else {
                $("#modal-errors").find("span").text('Server Error. Failed to prepare product.');
                $("#modal-errors").removeClass('d-none');                        
            }
        }
    });
});

$("#edit-sale-form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#edit-sale-form")[0]);
    $("#modal-edit-success").addClass("d-none");
    $("#modal-edit-errors").addClass("d-none");
    products = [];
    old_items = [];
    
    // Extract New Receipt Items
    for(var i=oldItemCount + 1; i< editFormsetCount + oldItemCount; i++) {
        receipt_item = {
            name: $("#edit-sale-form").find(`#edit_product_name_${i}`).val(),
            description: $("#edit-sale-form").find(`#edit_product_description_${i}`).val(),
            quantity: $("#edit-sale-form").find(`#edit_product_quantity_${i}`).val(),
            unit_price: $("#edit-sale-form").find(`#edit_product_unit_price_${i}`).val(),
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
            name: $("#edit-sale-form").find(`#old_product_name_${i}`).val(),
            description: $("#edit-sale-form").find(`#old_product_description_${i}`).val(),
            quantity: $("#edit-sale-form").find(`#old_product_quantity_${i}`).val(),
            unit_price: $("#edit-sale-form").find(`#old_product_unit_price_${i}`).val(),
            id: $("#edit-sale-form").find(`#old_product_id_${i}`).val(),
        }
        old_items.push(receipt_item);

        formData.delete(`old_product_name_${i}`);
        formData.delete(`old_product_description_${i}`);
        formData.delete(`old_product_quantity_${i}`);
        formData.delete(`old_product_unit_price_${i}`);
        formData.delete(`old_product_id_${i}`);
    }
    parsedFormdata = {};
    for (var entry of formData.entries()) {
        parsedFormdata[entry[0]] = entry[1]; 
    }
    // console.log({...parsedFormdata, 'receipt_products':products, 'old_items': old_items});
    $.ajax({
        type: 'POST',
        url: "/supplier/includes/edit_sale.php",
        data: {...parsedFormdata, 'receipt_products':products, 'old_items': old_items},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                $("#modal-edit-success").removeClass('d-none');
                $("#edit-sale-form")[0].reset();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else if(res['error']) {
                $("#modal-edit-success").addClass("d-none");
                $("#modal-edit-errors").find("span").text(res['error']);
                $("#modal-edit-errors").removeClass('d-none');   
            } else {
                $("#modal-edit-errors").find("span").text('Server Error. Failed to update sale.');
                $("#modal-edit-errors").removeClass('d-none');                    
            }
        }
    });
});

function saleDetails(sale_id) {
    $.ajax({
        type: 'GET',
        url: `/williescant/supplier/sale/${sale_id}`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {

            if (result.status = 'success') {
                let receipt_details = `
                <div class="col-3 mb-3 details-item">
                    <div class="details-title">
                        Receipt Number
                    </div>
                    <div class="details-value" id="details-receipt-number">
                        ${result.data.receipt_number}                          
                    </div>
                </div>

                <div class="col-3 mb-3 details-item">
                    <div class="details-title">
                        KRA PIN
                    </div>
                    <div class="details-value" id="details-pin">
                        ${result.data.pin }                       
                    </div>
                </div>

                <div class="col-3 mb-3 details-item">
                    <div class="details-title">
                        Customer Name
                    </div>
                    <div class="details-value" id="details-customer-name">
                        ${result.data.customer_name }                         
                    </div>
                </div>            

                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Item Count
                    </div>
                    <div class="details-value" id="details-item-count">
                       ${result.data.total_items}                        
                    </div>
                </div>  

                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Sub Total
                    </div>
                    <div class="details-value" id="details-sub-total">
                        ${result.data.sub_total}                         
                    </div>
                </div>
                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        VAT
                    </div>
                    <div class="details-value" id="details-vat">
                       ${result.data.vat}                          
                    </div>
                </div>

                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Total
                    </div>
                    <div class="details-value" id="details-total">
                        ${result.data.total_price}                          
                    </div>
                </div> 
                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Date
                    </div>
                    <div class="details-value" id="details-date">
                        ${result.data.date }                         
                    </div>
                </div>  
                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Time
                    </div>
                    <div class="details-value" id="details-time">
                        ${result.data.time }                         
                    </div>
                </div>                         
            `;
                var receipt_items = result.products;
                console.log()
                console.log(receipt_items);
                
                $("#receipt-details-row").html(receipt_details);
                let table_body = '';
                if(receipt_items.length == 0) {
                    table_body = `<tr><td colspan="9" class="text-center">
                    <div class="alert alert-soft-secondary justify-content-center">No receipt items found!</div>
                    </td></tr>`
                } else{
                                    receipt_items.forEach(element => {
                    table_body += `
                    <tr>
                        <td>${element.id}</td>
                        <td>${element.name}</td>
                        <td>${element.description}</td>
                        <td>${element.quantity}</td>
                        <td>${element.unit_price}</td>
                    </tr>`;
                });
                }





                $("#items-details-row").html(table_body);

                $("#saleDetailsModal").modal('show');
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function deleteSale(sale_id) {
    if(confirm("This sale receipt will be deleted permanently")) {
        $.ajax({
        type: 'POST',
        url: "/supplier/includes/delete_sale.php",
        data: {'sale_id': sale_id},
        // processData: false,
        // contentType: false,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
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
function removeFormset(e, formset, edit=false) {
    $(formset).parent().parent().remove();
    if(edit) {
        editFormsetCount -= 1;
        listEditItems();
    } else {
        formsetCount -= 1;
        listAddItems();
    }
}

// Edit sale receipt details
function editSale(sale_id) {
    $("#edit-receipt-items").html(
        `<button id="edit-item-formset" type="button" 
        class="btn btn-block btn-sm btn-secondary">Add another row</button>`);

        $("#edit-item-formset").click(() => {
            let addFormsetBtn = $("#edit-item-formset");
            let formset = `
                <div class="form-row mb-2 receipt-item">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit_product_name_${editFormsetCount}">Name</label>
                            <input id="edit_product_name_${editFormsetCount}" class="form-control" name="edit_product_name_${editFormsetCount}" type="text"
                                placeholder="Product Name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="edit_product_description_${editFormsetCount}">Description</label>
                            <input id="edit_product_description_${editFormsetCount}" class="form-control" name="edit_product_description_${editFormsetCount}"
                                type="text" placeholder="Product Description">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit_product_quantity_${editFormsetCount}">Quantity</label>
                            <input id="edit_product_quantity_${editFormsetCount}" class="form-control" name="edit_product_quantity_${editFormsetCount}" type="number"
                                placeholder="Product Qauntity" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit_product_unit_price_${editFormsetCount}"">Unit Price</label>
                            <input id="edit_product_unit_price_${editFormsetCount}"" class="form-control" name="edit_product_unit_price_${editFormsetCount}"
                            step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="removeFormset(Event, this, true)" 
                            class="remove-item-btn btn btn-sm btn-danger text-small">
                            Remove item ${editFormsetCount + oldItemCount}
                        </button>            
                    </div>
                    <div class="col-md-12 mt-2">
                        <hr/>            
                    </div>
                </div>
            `;
            listEditItems();
            $(formset).insertBefore(addFormsetBtn);
            editFormsetCount += 1;
        });

    $.ajax({
        type: 'GET',
        url: `/supplier/includes/get_sale.php/?sale_id=${sale_id}&edit=1`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            // console.log(result);
            res = JSON.parse(result);
            if (res['success']) {
                var receipt_details = res['receipt_details'];
                var supplier_details = res['supplier_details'];
                var receipt_items = res['receipt_items'];

                oldItemCount = Number(res['data']['total_items']);
                
                $("#edit-supplier-details").html(supplier_details)
                $("#edit-receipt-details").html(receipt_details)
                $(receipt_items).insertBefore($("#edit-item-formset"));

            } else {
                $("#modal-edit-errors").find('span').text('Failed to fetch receipt details try again later')
                $("#modal-edit-errors").removeClass('d-none');
            }
        }
    });    
    $("#editSaleModal").modal("show");
}

// Delete existing receipt item and remove formset.. 
function deleteItem(e, formset, item_id, receipt_id) {
    if(confirm('The item will be deleted permanently')) {
        $.ajax({
            type: 'POST',
            url: "/supplier/includes/delete_item.php",
            data: {'item_id':item_id, 'receipt_id': receipt_id, 'receipt_type': 'sale'},
            statusCode: {
                401: function(response) {
                    window.location.href = '/auth/logout.php';
                }
            },            
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-edit-success").removeClass('d-none');
                    $("#modal-edit-success").find('span').text('Item deleted succesfully');
                    oldItemCount -= 1;
                    $(formset).parent().parent().remove();
                    listEditItems();
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

function listAddItems(){
    window.setTimeout(() => {
        let items = $("#add-sale-form").find($(".receipt-item"));
        console.log(items.length);
        let start = 1;
        for(const item of items) {
            $(item).find($("input[name ^='product_name']")).attr('id', `product_name_${start}`);
            $(item).find($("input[name ^='product_description']")).attr('id', `product_description_${start}`);
            $(item).find($("input[name ^='product_quantity']")).attr('id', `product_quantity_${start}`);
            $(item).find($("input[name ^='product_unit_price']")).attr('id', `product_unit_price_${start}`);
            $(item).find($(".remove-item-btn")).text(`Remove item ${start}`);
            start += 1;
        }
    }, 100);
}

function listEditItems(){
    window.setTimeout(() => {
        var items = $("#edit-sale-form").find($('.receipt-item'));
        var start = 1;
        for(var item of items) {
            $(item).find($("input[name ^='edit_product_name']")).attr('id', `edit_product_name_${start}`);
            $(item).find($("input[name ^='edit_product_description']")).attr('id', `edit_product_description_${start}`);
            $(item).find($("input[name ^='edit_product_quantity']")).attr('id', `edit_product_quantity_${start}`);
            $(item).find($("input[name ^='edit_product_unit_price']")).attr('id', `edit_product_unit_price_${start}`);
            $(item).find($(".remove-item-btn")).text(`Remove item ${start}`);
            start += 1;
        }
    }, 100);
}

// Handles next stepper form operation..
$("#add-sale-modal-btn").click(() => {
    $("#add-sale-form").trigger('reset');
    $("#add-sale-form").find('input').removeClass('is-invalid');
    // Deactivate details tabs first
    $("#add-receipt-details-tab").attr('data-toggle', '');
    $("#add-receipt-details-tab").css({cursor: 'not-allowed'});
    $("#add-modal-next").attr('current-tab', 'items');
    
    // Cleanup after previous modal close..
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-prev").addClass('d-none');
    $("#add-sale-submit").addClass('d-none');
    $("#add-receipt-items-tab").tab("show");

    $("#addSaleModal").modal("show");
});

// Handle prev tab navigation..
$("#add-modal-prev").click(() => {
    let targetTab = $("#add-modal-prev").attr("target_tab");
    $(targetTab).tab("show");
});

$("#add-modal-next").click(() => {
    var tab_valid = true;
    var currentTab = $("#add-modal-next").attr('current-tab');

    if(currentTab == 'items') {
        tab_valid = validateFormInputs("receipt_items");
        if(tab_valid) {
            $("#add-receipt-details-tab").attr('data-toggle', 'tab');
            $("#add-receipt-details-tab").css({cursor: 'pointer'});
            $("#add-modal-next").attr('current-tab', 'details');
            $("#add-receipt-details-tab").tab("show");
            
            // Control buttons changes..
            $("#add-modal-next").addClass('d-none');
            $("#add-modal-prev").attr('target_tab', '#add-receipt-items-tab');
            $("#add-modal-prev").removeClass('d-none');
            $("#add-sale-submit").removeClass("d-none");
        }
    }
});

// Listen to tab changes..
$("#add-receipt-items-tab").on('show.bs.tab', function(e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'items');
    $("#add-sale-submit").addClass('d-none');
    $("#add-modal-prev").addClass('d-none');
 });


 function validateFormInputs(form, markInvalid=true) {
     let tabValid = true;
     let formFields = $(`#${form}`).find('input[required]');
     for(let i = 0; i < formFields.length; i++) {
        if($(formFields[i]).val().length == 0) {
            if(markInvalid) {
                $(formFields[i]).addClass('is-invalid');
            }
            tabValid = false;
        } else {
            $(formFields[i]).removeClass('is-invalid');
        }
    }
    return tabValid;  
 }
</script>
@endsection
