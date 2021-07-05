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
                            <a href="#edit-receipt-items" class="nav-link font-weight-bold active" role="tab"
                               aria-selected="true" data-toggle="tab">Receipt Items</a>
                        </li>
                        <li class="nav-item">
                            <a href="#edit-receipt-details" class="nav-link font-weight-bold" role="tab"
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
                        <input type="submit" class="btn btn-primary pl-4 pr-4" value="Add Sale" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
