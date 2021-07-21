<!-- Edit Prepared Product Modal -->
<div class="modal fade" id="editPreparedProductModal" tabindex="-1" role="dialog"
     aria-labelledby="editPreparedProductModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editPreparedProductModal">Edit Prepared Product</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="mb-3" id="edit-ready-form">
                <div class="modal-body">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="selling_price">Selling Price</label>
                                <input id="selling_price" class="form-control" name="selling_price" type="number"
                                       placeholder="Selling Price" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" class="form-control" name="quantity" type="number"
                                       placeholder="Quantity" required>
                            </div>
                        </div>

                        <input type="text" id="product_id" name="product_id" hidden required>
                        <input type="text" id="prepared_product_id" name="prepared_product_id" hidden required>
                    </div>
                </div>
                <div class="modal-footer"><!-- Errors -->
                    <div>
                        <div id="modal-edit-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                            <i class="fa fa-minus-circle alert-icon mr-3"></i>
                            <span></span>
                        </div>
                        <div id="modal-edit-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                             role="alert">
                            <i class="fa fa-check-circle alert-icon mr-3"></i>
                            <span class="small">Successfully updated the prepared product</span>
                        </div>
                    </div>
                    <!-- End Errors -->
                    <div>
                        <span data-dismiss="modal" class="mr-2" style="font-weight: 600; cursor: pointer;">Cancel</span>
                        <input type="submit" class="btn btn-primary pl-4 pr-4" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
