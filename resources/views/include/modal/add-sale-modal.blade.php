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
            <form class="mb-3" id="add-sale-form">
                <div class="modal-body">
                    <!-- Supplier and Product details tabs -->
                    <ul class="nav nav-tabs mt-3 mb-3">
                        <li class="nav-item">
                            <a href="#receipt_items" class="nav-link font-weight-bold active" role="tab"
                               aria-selected="true" data-toggle="tab">Receipt Items</a>
                        </li>
                        <li class="nav-item">
                            <a href="#receipt_details" class="nav-link font-weight-bold" role="tab"
                               aria-selected="true" data-toggle="tab">Receipt Details</a>
                        </li>
                    </ul>
                    <!-- Receipt item and details details tabs -->

                    <!-- Tabs Content -->
                    <div class="tab-content">
                        <!-- Receipt Items -->
                        <div class="tab-pane fade show active" id="receipt_items" role="tabpanel">
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
                            <button id="add-item-formset" type="button" class="btn btn-block btn-sm btn-secondary">Add another row</button>
                        </div>
                        <!-- End Receipt Items -->

                        <!-- Receipt Details -->
                        <div class="tab-pane fade" id="receipt_details" role="tabpanel">
                            <div class="form-row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="receipt_number">Receipt Number</label>
                                        <input id="receipt_number" class="form-control" name="receipt_number"
                                               type="text" placeholder="Enter Receipt Number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="pin">PIN</label>
                                        <input id="pin" class="form-control" name="pin" type="text"
                                               placeholder="KRA PIN" required>
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
                            <span class="small">Successfully added the sale</span>
                        </div>
                    </div>
                    <!-- End Errors -->
                    <div>
                        <span data-dismiss="modal" class="mr-2"
                              style="font-weight: 600; cursor: pointer;">Cancel</span>
                        <input type="submit" class="btn btn-primary pl-4 pr-4" value="Add Sale" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
