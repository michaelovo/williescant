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
{{-- <script src=/assets/vendor/jquery-migrate/jquery-migrate.min.js></script>
<script src=/assets/vendor/popper.js/dist/umd/popper.min.js></script>
<script src=/assets/vendor/bootstrap/bootstrap.min.js></script> --}}

<!-- Plugins -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512-vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" crossorigin="anonymous"></script>
<script src=/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js></script>
<script src=/assets/vendor/chart.js/dist/Chart.min.js></script>
<script src="/assets/vendor/datatables/dataTables.min.js"></script>
<script src=/assets/vendor/datatables/dataTables.bootstrap4.min.js></script>
<script src="/assets/vendor/swal/swal.js"></script> --}}


<!-- Initialization  -->
<script src="{{ asset('js/sidebar-nav.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/dashboard-page-scripts.js') }}"></script>
<script>

var formsetCount = 1;
var editFormsetCount = 1;
var oldItemCount = 1;

let d = new Date();
d = d.toISOString().substring(0,10);
$("#date").attr("max", d);

$(".add-item-formset").click(() => {
    formsetCount += 1;
    let addFormsetBtn = $(".add-item-formset");
    let formset = `
        <div class="form-row mb-2 receipt-item">
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
                <button type="button" onclick="removeFormset(Event, this, false)"
                    class="btn btn-sm btn-danger remove-item-btn text-small">Remove item ${formsetCount}</button>            
            </div>
            <div class="col-md-12 mt-2">
                <hr/>            
            </div>
        </div>`;
    $(formset).insertBefore(addFormsetBtn);
});

$("#edit-purchase-form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#edit-purchase-form")[0]);
    $("#modal-edit-success").addClass("d-none");
    $("#modal-edit-errors").addClass("d-none");
    
    // Extract New Receipt Items
    for(var i=oldItemCount + 1; i<editFormsetCount + oldItemCount; i++) {
        receipt_item = {
            name: $("#edit-purchase-form").find(`#edit_product_name_${i}`).val(),
            description: $("#edit-purchase-form").find(`#edit_product_description_${i}`).val(),
            quantity: $("#edit-purchase-form").find(`#edit_product_quantity_${i}`).val(),
            unit_price: $("#edit-purchase-form").find(`#edit_product_unit_price_${i}`).val(),
        }
        formData.append("receipt_products[]", JSON.stringify(receipt_item));

        formData.delete(`edit_product_name_${i}`);
        formData.delete(`edit_product_description_${i}`);
        formData.delete(`edit_product_quantity_${i}`);
        formData.delete(`edit_product_unit_price_${i}`);
    }

    // Extract existing receipt items(To be updatd only)
    for(var i=1; i < oldItemCount + 1; i++) {
        receipt_item = {
            name: $("#edit-purchase-form").find(`#old_product_name_${i}`).val(),
            description: $("#edit-purchase-form").find(`#old_product_description_${i}`).val(),
            quantity: $("#edit-purchase-form").find(`#old_product_quantity_${i}`).val(),
            unit_price: $("#edit-purchase-form").find(`#old_product_unit_price_${i}`).val(),
            id: $("#edit-purchase-form").find(`#old_product_id_${i}`).val(),
        }
        formData.append("old_items[]", JSON.stringify(receipt_item));

        formData.delete(`old_product_name_${i}`);
        formData.delete(`old_product_description_${i}`);
        formData.delete(`old_product_quantity_${i}`);
        formData.delete(`old_product_unit_price_${i}`);
        formData.delete(`old_product_id_${i}`);
    }

    var images = document.getElementById('edit-image').files;
    var filesLength = images.length;
    for (var i = 0; i < filesLength; i++) {
        if (images[i]['isvalid'] !== false) {
            formData.append("images[]", images[i]);
        }
    }    
    for (var entry of formData.entries()) {
        if (entry[0] == 'images') {
            formData.delete(entry[0]);
        }    
    }
    $.ajax({
        type: 'POST',
        url: "/supplier/includes/edit_purchase.php",
        data: formData,
        processData: false,
        contentType: false,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },    
        success: function (result) {
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
    // console.log("Submitting");
    $(".loading").removeClass("d-none");
    e.preventDefault();
    var formData = new FormData($("#add-purchase-form")[0]);
    $("#modal-success").addClass("d-none");
    $("#modal-errors").addClass("d-none");
    
    // Extract Receipt Items
    for(var i=1; i<formsetCount + 1; i++) {
        receipt_item = {
            name: $("#add-purchase-form").find(`#product_name_${i}`).val(),
            description: $("#add-purchase-form").find(`#product_description_${i}`).val(),
            quantity: $("#add-purchase-form").find(`#product_quantity_${i}`).val(),
            unit_price: $("#add-purchase-form").find(`#product_unit_price_${i}`).val(),
        }
        formData.append("receipt_products[]", JSON.stringify(receipt_item));

        formData.delete(`product_name_${i}`);
        formData.delete(`product_description_${i}`);
        formData.delete(`product_quantity_${i}`);
        formData.delete(`product_unit_price_${i}`);
    }  

    var images = document.getElementById('add-image').files;
    var filesLength = images.length;
    for (var i = 0; i < filesLength; i++) {
        if (images[i]['isvalid'] !== false) {
            formData.append("images[]", images[i]);
        }
    }    
    for (var entry of formData.entries()) {
        if (entry[0] == 'images') {
            formData.delete(entry[0]);
        }    
    } 
    $.ajax({
        type: 'POST',
        url: "{{ route('add-purchase') }}",
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                $("#modal-success").removeClass('d-none');
                $("#add-purchase-form")[0].reset();
                $(".loading").addClass("d-none");
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
                Toast.fire({
                    'icon': 'success',
                    'text': 'Receipt added',
                    'timer': 1000
                });
            } else if(res['error']) {
                $("#modal-success").addClass("d-none");
                $("#modal-errors").find("span").text(res['error']);
                $("#modal-errors").removeClass('d-none');
                $(".loading").addClass("d-none");
                Toast.fire({
                    'icon': 'error',
                    'text': res['error'],
                    'timer': 1000
                });
            } else {
                $(".loading").addClass("d-none");
                Toast.fire({
                    'icon': 'error',
                    'text': ' Server Error. Failed to add receipt',
                    'timer': 1000
                });
                $("#modal-errors").find("span").text('Server Error. Failed to add receipt.');
                $("#modal-errors").removeClass('d-none');
            }
        },
        error: function(err){
            $(".loading").addClass("d-none");
            Toast.fire({
                'icon': 'error',
                'text': ' Error: Could not search for existing supplier details',
                'timer': 1000
            });
        }
    });
});

function searchPin(pin, target) {
    $.ajax({
        type: 'GET',
        url: `/williescant/supplier/get-pin/${pin}`,
        success: function (result) {
            // res = JSON.parse(result);
            if (result.status) {
                var data = result.data;
                if(target == 'add') {
                    Swal.fire({
                        title: `Existing details for supplier with that pin found.`,
                        text: "Click confirm to autofill these details",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: `Confirm`,
                        cancelButtonText: 'Cancel',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $("#add-purchase-form").find("#supplier_name").val(data.supplier_name);
                            $("#add-purchase-form").find("#phone").val(data.phone);
                            $("#add-purchase-form").find("#email").val(data.email);
                            $("#add-purchase-form").find("#website").val(data.website);
                            $("#add-purchase-form").find("#location").val(data.location);
                        } 
                    }); 
                } else {
                    Swal.fire({
                        title: `Existing details for supplier with that pin found.`,
                        text: "Click confirm to autofill these details",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: `Confirm`,
                        cancelButtonText: 'Cancel',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $("#edit-purchase-form").find("#edit-supplier_name").val(data['supplier_name']);
                            $("#edit-purchase-form").find("#edit-phone").val(data['phone']);
                            $("#edit-purchase-form").find("#edit-email").val(data['email']);
                            $("#edit-purchase-form").find("#edit-website").val(data['website']);
                            $("#edit-purchase-form").find("#edit-location").val(data['location']);
                        } 
                    });                     
                }
            } else {
            }
        }, 
        error: function(err) {
            Toast.fire({
                'icon': 'error',
                'text': ' Error: Could not search for existing supplier details',
                'timer': 5000 
            });
        }
    });        
}

$("#pin").on('focusout', () => {
    searchPin($('#pin').val(), 'add');
});

function purchaseDetails(purchase_id) {
    $.ajax({
        type: 'GET',
        url: `/supplier/includes/get_purchase.php/?purchase_id=${purchase_id}`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var receipt_details = res['receipt_details'];
                var supplier_details = res['supplier_details'];
                var receipt_items = res['receipt_items'];
                var receipt_images = res['images'];

                $("#supplier-details-row").html(supplier_details)
                $("#receipt-details-row").html(receipt_details)

                if(!receipt_items) {
                    receipt_items = `<tr><td colspan="9" class="text-center">
                    <div class="alert alert-soft-secondary justify-content-center">No receipt items found!</div>
                    </td></tr>`;
                }
                $("#items-details-row").html(receipt_items)

                if(!receipt_images) {
                    receipt_images = `<div class="alert mx-4 text-center w-100 alert-warning">No receipt images found!</div>`;
                }
                $("#receipt_images_container").html(receipt_images)

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
        url: "/supplier/includes/delete_purchase.php",
        data: {'purchase_id': purchase_id},
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

function editPurchase(purchase_id, ) {
    $.ajax({
        type: 'GET',
        url: `/supplier/includes/get_purchase.php/?purchase_id=${purchase_id}&edit=1`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var receipt_details = res['receipt_details'];
                var supplier_details = res['supplier_details'];
                var receipt_items = res['receipt_items'];
                var images = res['images'] 

                oldItemCount = Number(res['data']['total_items']);
                
                $("#edit-supplier-details").html(supplier_details)
                $("#edit-receipt-details").html(receipt_details)
                $(receipt_items).insertBefore($("#add-item-formset-edit"));
                $("#edit-pin").on('focusout', () => {
                    searchPin($('#edit-pin').val(), 'edit');
                });

                if(images) {
                    // console.log(product['images']);
                    var previewContainer = $("#edit-image-preview__container__old");
                    previewContainer.html(images);
                } else {
                    $("#edit-product-form").find("#edit-img-card").addClass('d-none');
                }

            } else {
                $("#modal-edit-errors").find('span').text('Failed to fetch receipt details try again later')
                $("#modal-edit-errors").removeClass('d-none');
            }
        }
    }); 
    $("#edit-receipt-items").html(
        `<button id="add-item-formset-edit" type="button" 
        class="btn btn-block btn-sm btn-secondary add-item-formset">Add another row</button>`);

    $("#add-item-formset-edit").click(() => {
        let addFormsetBtn = $("#add-item-formset-edit");
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
                        step="0.01"  type="number" placeholder="Unit Price(Price of a single item)" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="button" onclick="removeFormset(Event, this, true)" 
                        class="btn btn-sm btn-danger remove-item-btn text-small">Remove item ${editFormsetCount + oldItemCount}</button>            
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
    $("#editPurchaseModal").modal("show");
    listEditItems();
}

// Delete existing item and remove formset.. 
function deleteItem(e, formset, item_id, receipt_id) {
    if(confirm('The item will be deleted permanently')) {
        $.ajax({
            type: 'POST',
            url: "/supplier/includes/delete_item.php",
            data: {'item_id':item_id, 'receipt_id': receipt_id, 'receipt_type': 'purchase'},
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
        let items = $("#add-purchase-form").find($(".receipt-item"));
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
        var items = $("#edit-purchase-form").find($('.receipt-item'));
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

function deleteImage(image, image_id, product_id) {
    var imageName = $(image).attr("image_name")
    if(confirm("This image will be deleted permanently")) {
        $.ajax({
            type: 'POST',
            url: "/supplier/includes/edit_purchase.php",
            data: {
                'purchase_id': product_id,
                'delete_image': true,
                'image_id': image_id,
                'image_name': imageName
            },
            statusCode: {
            401: function(response) {
                    window.location.href = '/auth/logout.php';
                }
            },            
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    Toast.fire({
                        'icon': 'success',
                        'text': 'Image removed successfully',
                        'timer': 2000
                    });                    
                    window.location.reload();
                } else {
                    Toast.fire({
                        'icon': 'error',
                        'text': res['error'],
                        'timer': 2000 
                    });
                }
            },
            error: function(res) {
                Toast.fire({
                    'icon': 'error',
                    'text': ' Error: Could not delete image. Try again later',
                    'timer': 2000 
                });
            }
        }); 
    }
}

// Handles next stepper form operation..
$("#add-purchase-modal-btn").click(() => {
    $("#add-purchase-form")[0].reset();
    $("#add-purchase-form").find('input').removeClass('is-invalid');

    // Deactivate receipt items, details and pictures tabs first
    $("#add-receipt-items-tab").attr('data-toggle', '');
    $("#add-receipt-items-tab").css({cursor: 'not-allowed'});
    $("#add-receipt-details-tab").attr('data-toggle', '');
    $("#add-receipt-details-tab").css({cursor: 'not-allowed'});
    $("#add-receipt-picture-tab").attr('data-toggle', '');
    $("#add-receipt-picture-tab").css({cursor: 'not-allowed'});    
    $("#add-modal-next").attr('current-tab', 'supplier');

    // Cleanup after modal exit
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-prev").addClass('d-none');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-supplier-details-tab").tab("show");


    $("#addPurchaseModal").modal("show");
});

// Handle previous navigation
$("#add-modal-prev").click(() => {
    let targetTab = $("#add-modal-prev").attr("target_tab");
    $(targetTab).tab("show");
});

$("#add-modal-next").click(() => {
    var tab_valid = true;
    var currentTab = $("#add-modal-next").attr('current-tab');

    if(currentTab == 'supplier') {
        var tab_valid = validateFormInputs("add-supplier-details");
        if(tab_valid) {
            $("#add-receipt-items-tab").attr('data-toggle', 'tab');
            $("#add-receipt-items-tab").css({cursor: 'pointer'});
            $("#add-modal-next").attr('current-tab', 'items');
            $("#add-receipt-items-tab").tab("show");
        }
    } else if (currentTab == 'items') {
        var tab_valid = validateFormInputs("add-receipt-items");
        if(tab_valid) {
            $("#add-receipt-details-tab").attr('data-toggle', 'tab');
            $("#add-receipt-details-tab").css({cursor: 'pointer'});
            $("#add-modal-next").attr('current-tab', 'details');
            $("#add-receipt-details-tab").tab("show");
        }    
    } else if (currentTab == 'details') {
        let tab_valid = validateFormInputs("add-receipt-details");
        if(tab_valid) {
            $("#add-receipt-picture-tab").attr('data-toggle', 'tab');
            $("#add-receipt-picture-tab").css({cursor: 'pointer'});
            $("#add-modal-next").attr('current-tab', 'picture');
            $("#add-modal-next").addClass('d-none');
            $("#add-purchase-submit").removeClass("d-none");            
            $("#add-receipt-picture-tab").tab("show");            
        }
    }
});

// Listen to tab changes..
$("#add-receipt-items-tab").on('show.bs.tab', function(e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'items');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-modal-prev").attr('target_tab', '#add-supplier-details-tab');
    $("#add-modal-prev").removeClass('d-none');
 });


$("#add-supplier-details-tab").on('show.bs.tab', function(e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'supplier');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-modal-prev").addClass('d-none');
 });

 $("#add-receipt-details-tab").on('show.bs.tab', function(e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'details');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-modal-prev").attr('target_tab', '#add-receipt-items-tab');
    $("#add-modal-prev").removeClass('d-none');
 });

 $("#add-receipt-picture-tab").on('show.bs.tab', function(e) {
    $("#add-modal-next").addClass('d-none');
    $("#add-modal-next").attr('current-tab', 'picture');
    $("#add-purchase-submit").removeClass('d-none');
    $("#add-modal-prev").attr('target_tab', '#add-receipt-details-tab');
    $("#add-modal-prev").removeClass('d-none');
 });

// Preview add-receipt images
$("#add-image").change(function(e) {
    var target = e.target;
    var imagePreviewContainer = $("#add-image-preview__container");
    let previewDimensions = {height: 250, width: "100%"} 
    imagesPreview(e.target, imagePreviewContainer, "add", previewDimensions);
});

// Preview edit-receipt images
$("#edit-image").change(function(e) {
    var target = e.target;
    var imagePreviewContainer = $("#edit-image-preview__container");
    let previewDimensions = {height: 250, width: "100%"} 
    imagesPreview(e.target, imagePreviewContainer, "edit", previewDimensions);
});


/**
 * Validates form inputs to check if there are empty fields on the required fields
 * @param {String} form
 * @param {Boolean} markInvalid
 */
 function validateFormInputs(form, markInvalid = true) {
  let tabValid = true;
  let formFields = $(`#${form}`).find('input[required]');
  for (let i = 0; i < formFields.length; i++) {
    if ($(formFields[i]).val().length == 0) {
      if (markInvalid) {
        $(formFields[i]).addClass('is-invalid');
      }
      tabValid = false;
    } else {
      $(formFields[i]).removeClass('is-invalid');
    }
  }
  return tabValid;
}

    // image preview
    let imagesPreview = function (input, previewContainer, type, previewDimensions=null) {
        $(previewContainer).html(``);
        if(input.files){
            let action = type == 'add'?'deleteImageBtn':'deleteEditImageBtn';
            let filesAmount = input.files.length;
            for(i = 0; i < filesAmount; i++){
                let reader = new FileReader();
                let count = 0;
                let file = input.files[i];
                reader.onload = function(event){
                    let imgContainer = $($.parseHTML(`<div class="card form-group col-md-5 mr-1 mt-2"></div>`));
                    let height = 75;
                    let width = "100%";
                    if(previewDimensions){
                        width = previewDimensions.width;
                        height = previewDimensions.height;
                    }
                    var image = $($.parseHTML(`<img alt="${file['name']}" id="${action}-image-preview__item" height="${height}" width="${width}">`)).attr('src', event.target.result);
                    image.appendTo($(imgContainer));

                    let deleteBtn = $($.parseHTML(
                        `<button class="btn btn-sm btn-outline-danger mt-1 ${action}" img-name="${file['name']} type="button">Remove</button>`
                    )).attr('data-id',count);
                    deleteBtn.appendTo(imgContainer);

                    imgContainer.appendTo(previewContainer);
                    count += 1;
                };
                reader.readAsDataURL(input.files[i]);
                input.files[i]['isvalid'] = true;
            }
        }
    }

</script>
@endsection
