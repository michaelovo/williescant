    <!-- Nominate New Modal -->
    <div class="modal fade" id="nominateNewModal" tabindex="-1" role="dialog" aria-labelledby="nominateNewModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="nominateNewModal">Nominate New Accountant</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="nominate-new-form">
                    <div class="modal-body">

                        <!-- Accountant details and permissions tabs -->
                        <ul class="nav nav-tabs mt-3 mb-3">
                            <li class="nav-item">
                                <a href="#add-accountant-details" id="add-accountant-details-tab" class="nav-link active font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Accountant Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#add-accountant-permissions" id="add-accountant-permissions-tab" class="nav-link font-weight-bold" role="tab"
                                   aria-selected="true" data-toggle="tab">Permissions</a>
                            </li>
                        </ul>
                        <!-- Accountant permissions and details tabs -->

                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <!-- Accountant Details -->
                            <div class="tab-pane fade show active" id="add-accountant-details" role="tabpanel">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="first_name">First Name</label>
                                            <input id="first_name" class="form-control" name="first_name" type="text" placeholder="First Name" value='' required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="last_name">Last Name</label>
                                            <input id="last_name" class="form-control" name="last_name" type="text" placeholder="Last Name" value='' required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="phone">Phone Number</label>
                                            <input id="phone" class="form-control"name="phone" type="text" placeholder="07********" value='' required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="required-label" for="email">Email</label>
                                            <input id="email" class="form-control" name="email" type="email"
                                                   placeholder="user@mail.com" value='' required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accountant Details -->

                            <!-- Accountant permissions -->
                            <div class="tab-pane fade show" id="add-accountant-permissions" role="tabpanel">
                                <div class="form-row mb-2 receipt-item">
                                    <div class="col-md-12">
                                        <h4><b>Purchase Receipts</b></h4>
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="purchase_receipts_access" class="form-label-text mr-2"
                                                       style="margin-bottom: 0px; cursor: pointer;">Purchase Receipts Access</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="purchase_receipts_access" name="purchase_receipts_access" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <!-- <div class="d-flex align-items-center mr-3">
                                                <label for="edit-purchase" class="form-label-text mr-2" style="margin-bottom: 0px; cursor: pointer;">Edit</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="edit-purchase" name="edit-purchase" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="view-purchase" class="form-label-text mr-2" style="margin-bottom: 0px; cursor: pointer;">View</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="view-purchase" name="view-purchase" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="delete-purchase" class="form-label-text mr-2" style="margin-bottom: 0px; cursor: pointer;">Delete</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="delete-purchase" name="delete-purchase" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>                                                                                                                                                                                                         -->
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2 mt-2">
                                        <hr/>
                                    </div>
                                    <div class="col-md-12">
                                        <h4><b>Sale Receipts</b></h4>
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="sale_receipts_access" class="form-label-text mr-2"
                                                       style="margin-bottom: 0px; cursor: pointer;">Sale Receipts Access</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="sale_receipts_access" name="sale_receipts_access" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <!-- <div class="d-flex align-items-center mr-3">
                                                <label for="edit-sale" class="form-label-text mr-2" style="margin-bottom: 0px; cursor: pointer;">Edit</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="edit-sale" name="edit-sale" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="view-sale" class="form-label-text mr-2" style="margin-bottom: 0px; cursor: pointer;">View</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="view-sale" name="view-sale" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="delete-sale" class="form-label-text mr-2" style="margin-bottom: 0px; cursor: pointer;">Delete</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="delete-sale" name="delete-sale" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>                                                                                                                                                                                                         -->
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2 mt-2">
                                        <hr/>
                                    </div>
                                    <div class="col-md-12">
                                        <h4><b>Exports</b></h4>
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="export_receipts_access" class="form-label-text mr-2"
                                                       style="margin-bottom: 0px; cursor: pointer;">Export Receipts Access</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="export_receipts_access" name="export_receipts_access" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2 mt-2">
                                        <hr/>
                                    </div>
                                    <div class="col-md-12">
                                        <h4><b>Matching</b></h4>
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center mr-3">
                                                <label for="matching_receipts_access" class="form-label-text mr-2"
                                                       style="margin-bottom: 0px; cursor: pointer;">Matching Receipts Access</label>
                                                <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                                    <div class="form-toggle">
                                                        <input id="matching_receipts_access" name="matching_receipts_access" type="checkbox">
                                                        <div class="form-toggle__item">
                                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accountant permissions -->
                        </div>
                        <!-- End Tabs Content -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="new-accountant-modal-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span></span>
                            </div>
                            <div id="new-accountant-modal-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                                 role="alert">
                                <i class="fa fa-check-circle alert-icon mr-3"></i>
                                <span class="small">Successfully nominated the accountant.</span>
                            </div>
                        </div>
                        <!-- End Errors -->
                        <div>
                                <span data-dismiss="modal" class="mr-2"
                                      style="font-weight: 600; cursor: pointer;">Cancel</span>
                            <button id="nominate-new-prev" type="button" class="d-none btn btn-primary pl-3 pr-3">
                                <i class="fa fa-angle-double-left"></i> Back
                            </button>
                            <button id="nominate-new-next" type="button" class="btn btn-primary pl-3 pr-3">
                                Next <i class="fa fa-angle-double-right"></i>
                            </button>
                            <input type="submit" id="nominate-new-submit" class="d-none btn btn-primary pl-4 pr-4" value="Nominate Accountant" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Nominate New Modal -->