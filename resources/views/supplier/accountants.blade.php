@extends('layouts.app', ["page_title" => "Purchases - WillieScant"])

@section('content')
    <!-- Header (Topbar) -->
    @include('menu.supplier_nav')
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        @include('menu.sidebar')
    <div class="u-content">
        <div class="u-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Tabs Nav -->
                    <ul class="nav nav-tabs ml-md-auto mt-3 mt-md-0">
                        <li class="nav-item">
                            <a href="#nominated_tab" class="nav-link active" role="tab" aria-selected="true"
                               data-toggle="tab">Nominated Accountants</a>
                        </li>
                        <li class="nav-item">
                            <a href="#nominate_existing_tab" class="nav-link" role="tab" aria-selected="true"
                               data-toggle="tab">Nominate Existing</a>
                        </li>
                        <li class="ml-auto">
                            <button class="btn btn-sm btn-outline-primary mr-3" data-toggle="modal" href="#nominateNewModal">
                                <i class="fa fa-plus"></i> Nominate new
                            </button>
                        </li>
                    </ul>
                    <!-- End Tabs Nav -->

                    <!-- Tabs Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nominated_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-0">
                                        <table class="table table-hover table_dt">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Nomination Status</th>
                                                <th>Date Joined</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>Joshua</td>
                                                <td>Ogwang</td>
                                                <td>ogwangongora@gmail.com</td>
                                                <td>+256704073613</td>
                                                <td>Active</td>
                                                <td>2021-06-26 21:17:44</td>
                                                <td class="text-center">
                                                    <a id="actions1Invoker" class="link-muted" href="#!" aria-haspopup="true"
                                                       aria-expanded="false" data-toggle="dropdown">
                                                        <i class="fa fa-sliders-h"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right dropdown"
                                                         style="width: 150px;" aria-labelledby="actions1Invoker">
                                                        <ul class="list-unstyled mb-0">
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                   data-toggle="modal" href="#" onclick="viewPermissions(113)">
                                                                    <i class="fa fa-eye mr-3"></i>View Permissions
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                   data-toggle="modal" href="#" onclick="editPermissions(113)">
                                                                    <i class="fa fa-edit mr-3"></i>Edit Permissions
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                   data-toggle="modal" href="#" onclick="lockUnlockAccountant(113, 'lock')">
                                                                    <i class="fa fa-ban mr-3"></i>Lock
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nominate_existing_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-0">
                                        <table class="table table-hover table_dt">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Date Joined</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>Stephen</td>
                                                <td>Wanyoike</td>
                                                <td>nyoike26@gmail.com</td>
                                                <td>0720893336</td>
                                                <td>2021-05-19 15:30:42</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-soft-primary" onclick="nominateExisting(103)">
                                                        Nominate
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>kawira</td>
                                                <td>thiaine</td>
                                                <td>kawiranancy50@gmail.com</td>
                                                <td>0727800228</td>
                                                <td>2021-03-09 17:59:16</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-soft-primary" onclick="nominateExisting(72)">
                                                        Nominate
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Karanja</td>
                                                <td>Kiragu</td>
                                                <td>einsofent@gmail.com</td>
                                                <td>+254722919664</td>
                                                <td>2021-03-09 16:38:11</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-soft-primary" onclick="nominateExisting(71)">
                                                        Nominate
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Test</td>
                                                <td>Accountant</td>
                                                <td>victorvijay71@gmail.com</td>
                                                <td>0714309973</td>
                                                <td>2021-02-01 16:12:24</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-soft-primary" onclick="nominateExisting(49)">
                                                        Nominate
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Michael</td>
                                                <td>Nyamu</td>
                                                <td>michaelnyamu@gmail.com</td>
                                                <td>0724523731</td>
                                                <td>2021-01-31 19:47:31</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-soft-primary" onclick="nominateExisting(48)">
                                                        Nominate
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Wilson</td>
                                                <td>Njure</td>
                                                <td>williescantcompany4@gmail.com</td>
                                                <td>0727831550</td>
                                                <td>2021-01-27 05:59:49</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-soft-primary" onclick="nominateExisting(47)">
                                                        Nominate
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nominate_new_tab" role="tabpanel">
                            <div class="card">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tabs Content -->
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


    <!-- Modals -->
@include('supplier.accountants._nominate-new')

    <!-- View Permissions Modal -->
    <div class="modal fade" id="viewPermissionsModal" tabindex="-1"
         role="dialog" aria-labelledby="viewPermissionsModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="viewPermissionsModal">Accountant Permissions</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table">
                        <table class="w-100 table-hover" id="permissionsModalTable">
                            <thead>
                            <tr>
                                <th>Permission Name</th>
                                <th>Permission Description</th>
                            </tr>
                            </thead>
                            <tbody id="permissionsModalTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-soft-primary" data-dismiss="modal" class="mr-2">
                            <span
                                style="font-weight: 600; cursor: pointer;">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End View Permissions Modal -->


    <!-- Nominate Existing Accountant Modal -->
    <div class="modal fade" id="nominateExisting" tabindex="-1"
         role="dialog" aria-labelledby="nominateExisting"
         aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="nominateExisting">Setup Permissions</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="nominate-existing-form">
                    <input type="text" id="nominate_existing_accountant_id" name="nominate_existing_accountant_id" value="" hidden>
                    <div class="modal-body">
                        <div class="form-row mb-2 receipt-item">
                            <div class="col-md-12">
                                <h4><b>Purchase Receipts</b></h4>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-3">
                                        <label for="nominate_purchase_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Purchase Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="nominate_purchase_receipts_access" name="nominate_purchase_receipts_access" type="checkbox">
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
                                <h4><b>Sale Receipts</b></h4>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-3">
                                        <label for="nominate_sale_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Sale Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="nominate_sale_receipts_access" name="nominate_sale_receipts_access" type="checkbox">
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
                                <h4><b>Exports</b></h4>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-3">
                                        <label for="nominate_export_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Export Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="nominate_export_receipts_access" name="nominate_export_receipts_access" type="checkbox">
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
                                        <label for="nominate_matching_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Matching Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="nominate_matching_receipts_access" name="nominate_matching_receipts_access" type="checkbox">
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
                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="nominate-existing-modal-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span></span>
                            </div>
                            <div id="nominate-existing-modal-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                                 role="alert">
                                <i class="fa fa-check-circle alert-icon mr-3"></i>
                                <span class="small">Successfully nominated accountant.</span>
                            </div>
                        </div>
                        <!-- End Errors -->
                        <div class="d-flex align-items-center">
                                <span data-dismiss="modal" class="mr-2"
                                      style="font-weight: 600; cursor: pointer;">Cancel
                                </span>
                            <button type="submit" class="btn btn-primary" >Nominate Accountant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Nominate Existing Accountant Modal -->

    <!-- Edit Permissions Modal -->
    <div class="modal fade" id="editPermissionsModal" tabindex="-1"
         role="dialog" aria-labelledby="editPermissionsModal"
         aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="editPermissionsModal">Edit Accountant Permissions</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="edit-permissions-form">
                    <input type="text" id="edit_permission_accountant_id" name="edit_permission_accountant_id" value="" hidden>
                    <div class="modal-body">
                        <div class="form-row mb-2 receipt-item">
                            <div class="col-md-12">
                                <h4><b>Purchase Receipts</b></h4>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-3">
                                        <label for="edit_purchase_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Purchase Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="edit_purchase_receipts_access" name="edit_purchase_receipts_access" type="checkbox">
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
                                <h4><b>Sale Receipts</b></h4>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-3">
                                        <label for="edit_sale_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Sale Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="edit_sale_receipts_access" name="edit_sale_receipts_access" type="checkbox">
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
                                <h4><b>Exports</b></h4>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-3">
                                        <label for="edit_export_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Export Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="edit_export_receipts_access" name="edit_export_receipts_access" type="checkbox">
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
                                        <label for="edit_matching_receipts_access" class="form-label-text mr-2"
                                               style="margin-bottom: 0px; cursor: pointer;">Matching Receipts Access</label>
                                        <label class="d-flex align-items-center justify-content-between" style="margin-bottom: 0px;">
                                            <div class="form-toggle">
                                                <input id="edit_matching_receipts_access" name="edit_matching_receipts_access" type="checkbox">
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
                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="edit-permissions-modal-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span></span>
                            </div>
                            <div id="edit-permissions-modal-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                                 role="alert">
                                <i class="fa fa-check-circle alert-icon mr-3"></i>
                                <span class="small">Successfully updated permissions.</span>
                            </div>
                        </div>
                        <!-- End Errors -->
                        <div class="d-flex align-items-center">
                                <span data-dismiss="modal" class="mr-2"
                                      style="font-weight: 600; cursor: pointer;">Close
                                </span>
                            <button type="submit" class="btn btn-primary" >Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Permissions Modal -->
    <!-- End Modals -->
</main>
<script src="{{ asset('js/accountant.js')}}"></script>
@endsection
