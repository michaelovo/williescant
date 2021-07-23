<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add Sale Receipt</h3> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            <form class="dropzone" method="POST" action="{{route('add-purchase')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Receipt Items</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Receipt Details</small></a></li>
                        </ul>
                        <div>
                            <div id="step-1">

                            <div class="form-row mb-2 sale-item">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="product_name_1">Name</label>
                                        <input id="product_name_1" class="form-control" name="sale_items[0][product_name]" type="text"
                                            placeholder="Product Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="product_description_1">Description</label>
                                        <input id="product_description_1" class="form-control" name="sale_items[0][product_description]"
                                            type="text" placeholder="Product Description">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="product_quantity_1">Quantity</label>
                                        <input id="product_quantity_1" class="form-control" name="sale_items[0][product_quantity]" type="number"
                                            placeholder="Product Qauntity" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="required-label" for="product_unit_price_1">Unit Price</label>
                                        <input id="product_unit_price_1" class="form-control" name="sale_items[0][product_unit_price]"
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
                                <button id="add_sale_item" type="button" class="btn btn-block btn-sm btn-secondary">Add another row</button>       
                            </div>
                            <div id="step-2">
                                <div class="form-row mb-2">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="receipt_number">Receipt/Invoice Serial No</label>
                                            <input id="receipt_number" class="form-control" name="receipt_number" type="text" placeholder="0059" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="etr_number">KRA/ETR Serial No</label>
                                            <input id="etr_number" class="form-control" name="etr" type="text" placeholder="KRA/ETR/10032006" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label class="required-label" for="pin">Cutomer's KRA PIN</label>
                                            <input id="pin" class="form-control" name="pin" type="text" placeholder="P05135163Z" required>
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
                                <div class="d-flex justify-content-end"><button class="btn btn-primary" type="submit">Submit</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>