<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add Purchase Receipt</h3> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            <form class="dropzone" method="POST" action="{{route('add-purchase')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Supplier Details</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Receipt Items</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Receipt Details</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>Receipt Pictures</small></a></li>
                        </ul>
                        <div>
                            <div id="step-1">
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
                                            <label for="website">Website</label>
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
                            <div id="step-2">
                                <div id="receipt_item" class="form-row mb-2 receipt-item">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="product_name_1">Name</label>
                                            <input id="product_name_1" class="form-control" name="receipt_products[0][product_name]" type="text"
                                                   placeholder="Product Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="product_description_1">Description</label>
                                            <input id="product_description_1" class="form-control" name="receipt_products[0][product_description]"
                                                   type="text" placeholder="Product Description">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="product_quantity_1">Quantity</label>
                                            <input id="product_quantity_1" class="form-control" name="receipt_products[0][product_quantity]" type="number"
                                                   placeholder="Product Qauntity" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="product_unit_price_1">Unit Price</label>
                                            <input id="product_unit_price_1" class="form-control" name="receipt_products[0][unit_price]"
                                                   step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-sm btn-danger text-small d-none">
                                            DEL <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <hr/>
                                    </div>
                                </div>
                                <button id="addForm" type="button" class="btn btn-block btn-sm btn-secondary ">Add another row</button>
                            </div>
                            <div id="step-3" class="">
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
                            <div id="step-4" class="">
                                <div class="form-row mb-2">
                                    <div class="col form-group mb-2">
                                        <div class="alert alert-soft-info">Please upload full clear images of the receipt</div>
                                            <input type="file" id="file-input" name="receipts_images[]" multiple />
											<div class="form-group row">
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                                <div id="thumb-output"></div>
												{{-- <label class="col-form-label col-lg-3 col-sm-12">Please upload full clear images of the receipt</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
													<div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
														<div class="dropzone-msg dz-message needsclick">
															<h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
															<span class="dropzone-msg-desc">Upload up to 10 files</span>
														</div>
													</div>
												</div>
											</div> --}}
                                    </div>
                                    <div class="d-flex justify-content-end"><button class="btn btn-primary" type="submit">Submit</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
<style>
    #thumb-output{
        display: flex;
        flex-wrap: wrap;
    }
    .thumb{
    margin: 10px 5px 0 0;
    width: 100px;
    height: 100px;
} 
</style>