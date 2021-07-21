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
