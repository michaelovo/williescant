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
                                <a href="#nominated_tab" class="nav-link active" role="tab" aria-selected="true" data-toggle="tab">Nominated Accountants</a>
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
                                                <input id="phone" class="form-control 
                                                " name="phone" type="text" placeholder="07********" 
                                                value='' required>
                                                										
                                            </div>
                                        </div>                                                        
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="required-label" for="email">Email</label>
                                                <input id="email" class="form-control" name="email" type="email" 
                                                placeholder="user@mail.com" 
                                                value='' required>
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
<script>
    $(document).ready(function (){
        // Setup nominate accountant modal
        $("#nominateNewModal").on('show.bs.modal', () => {
            // First de-activate the next tab
            $("#add-accountant-permissions-tab").attr("data-toggle", "");
            $("#add-accountant-permissions-tab").css({cursor: "not-allowed"});
            // Ensurethat the details tab is selected and shown..
            $("#add-accountant-details-tab").attr("data-toggle", "tab");
            $("#add-accountant-details-tab").css({cursor: "pointer"});
            $("#add-accountant-details-tab").tab("show");
            // then reset the form
            $("#nominate-new-form")[0].reset();
            // then reset the navigation buttons
            $("#nomiate-new-next").removeClass("d-none").attr("current-tab", "details");
            $("nominate-new-prev").attr("target_tab", "").addClass("d-none");
        });

        // Handle next button click on nominate new modal
        $("nominate-new-next").on("click", () => {
            let tab_valid = true;
            let currentTab = $("#nominate-new-next").attr("current-tab");
            if(currentTab == "details") {
                tab_valid = validateFormInputs("nominate-new-form");
                if (tab_valid) {
                    // Now toggle the permissions tab to be visible
                    $("#add-accountant-permissions-tab").attr("data-toggle", "tab");
                    $("#add-accountant-permissions-tab").css({cursor: "pointer"});
                    $("#nominate-new-next").attr("current-tab", "permission");
                    $("#add-accountant-permissions-tab").tab("show");
                }
            }
        });

        // Handle previous navigation
        $("#nominate-new-prev").on("click", ()=> {
            let targetTab = $("#nominate-new-prev").attr("target_tab");
            $(targetTab).tab("show");
        });

        // Listen to tab changesfor each tab
        $("#add-accountant-details-tab").on("show.bs.tab",function(e){
            $("#nominate-new-next").removeClass("d-none");
            $("#nominate-new-next").attr("current-tab", "details");
            $("#nominate-new-submit").addClass("d-none");
            $("#nominate-new-prev").attr("target_tab", "");
            $("nominayte-new-prev").addClass("d-none");
        });

        $("#add-accountant-permissions-tab").on("show.bs.tab", function (e){
            // hidenextbutton then submit and previoyus buttons visible
            $("#nominate-new-next").addClass("d-none");
            $("#nominate-new-next").attr("current-tab", "");
            $("#nominate-new-submit").removeClass("d-none");
            $("#nominate-new-prev").attr("target_tab", "#add-accountant-details-tabs");
            $("#nominate-new-prev").removeClass("d-none");
        });

        // haandle submit nominate-new-accountatn form
        $("#nomiate-new-form").on("submit", (event) => {
            event.preventDefault();
            let formData = new FormData($("#nominate-new-form")[0]);
            $("#new-accountant-modal-success").addClass("d-none");
            $("#new-accountant-modal-errors").addClass("d-none");

            $.ajax({
                type: "POST",
                url: `{{route("get-accountants")}}`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(data){
                // backend returns content type json headers so no need of parsing JSON

                if(data.status) {
                    $("#new-accountant-modal-success").removeClass("d-none");
                    $("#new-accountant-modal-errors").addClass("d-none");
                    window.location.reload();
                }else {
                    $("#new-accountant-modal-success").addClass("d-none");
                    $("new-accountant-modal-errors").removeClass("d-none");
                    $("#new-accountant-modal-errors").find("span").text(data);
                }
            }).fail(function(data) {
                $("#new-accountant-modal-success").addClass("d-none");
                $("#new-accountant-modal-errors").removeClass("d-none");
                $("#new-accountant-modal-errors").find("span").text("Server Error. Failed to nominate accountant. Try again later");
            })
        })

        // Handle edit accountant permissions form
        $("#edit-permissions-form").on("submit", (event) => {
            event.preventDefault();

            permissionsData = {
                edit_sales_receipts_access: "",
                edit_purchase_receipts_access: "",
                edit_export_receipts_access: "",
                ediyt_matching_receipts_access: "",
            };

            let formData = new FormData(event.target);
            for (let entry of formData.entries()) {
                permissionsData[entry[0]] = entry[1];
            }
            $("#edit-permissions-modal-success").addClass("d-none");
            $("#edit-permissions-modal-errors").addClass("d-none");

            $.ajax({
                type: "POST",
                url: "{{route('add-product')}}",
                data: {
                    permissions: permissionsData,
                    id: $("#edit_permission_accountant_id").val(),
                    action: "edit",
                }
            }).done(function(data) {
                if(data.status){
                    $("#edit-permissions-modal-success").removeClass("d-none");
                    $("#edit-permissions-modal-errors").addClass("d-none");
                    setTimeout(()=> {
                        window.location.reload();
                    }, 1000);
                } else {
                    $("#edit-permissions-modal-success").addClass("d-none");
                    $("#edit-permissions-modal-errors").removeClass("d-none");
                    $("edit-permissions-modal-errors").find("span").text(data);
                }
            }).fail(function(data) {
                $("#edit-permissions-modal-success").addClass("d-none");
                $("#edit-permissions-modal-errors").removeClass("d-none");
                $("#edit-permissions-modal-errors").find("span").text("Server Error. Failed to update permissions. Try again later");
            })
        })

                    // Handle nominate existing accountant form
            $("#nominate-existing-form").on("submit", (event) => {
                event.preventDefault();
                permissionsData = {
                    edit_sale_receipts_access: "",
                    edit_purchase_receipts_access: "",
                    edit_export_receipts_access: "",
                    edit_matching_receipts_access: ""
                };

                let formData = new FormData(event.target);
                for (let entry of formData.entries()){
                    permissionsData[entry[0]] = entry[1]
                }

                $("#nominate-existing-modal-success").addClass("d-none");
                $("#nominate-existing-modal-errors").addClass("d-none");

                $.ajax({
                    type: "POST",
                    url: "{{route('add-product')}}",
                    data: {
                        permissions: permissionsData,
                        id: $("#nominate_existing_accountant_id").val()
                    }
                }).done(function(data) {
                    if(data.status) {
                        $("#nominate-existing-modal-success").removeClass("d-none");
                        $("#nominate-existing-modal-errors").addClass("d-none");
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        $("#nominate-existing-modal-success").addClass("d-none");
                        $("#nominate-existing-modal-errors").removeClass("d-none");
                        $("#nominate-existing-modal-errors").find("span").text(data);
                    }
                }).fail(function(data) {
                    $("#nominate-existing-modal-success").addClass("d-none")
                    $("#nominate-existing-modal-errors").removeClass("d-none");
                    $("#nominate-existing-modal-errors").find("span").text("Server Error. Failed to nominate accountant. Try again later")
                })
            })

            // Handle switching active suppliers
            $(".switch-supplier").on("click", (event) => {
                switchSupplier(event.target.getAttribute("supplier_id"));
            })

            /**
             * Lock/Unlock an accountant
             * @param {string} accountant_id The id of the accountant to be locked/unlocked
             */
            function lockUnlockAccountant(accountant_id, action) {
                let actionTense;
                if(action == 'lock') {
                    actionTense = 'locked';
                } else {
                    actionTense = 'unlocked';
                }

                let upperCaseAction = action.charAt(0).toUpperCase() + action.slice(1);
                Swal.fire({
                    title: `${upperCaseAction} accountant`,
                    text: `Warning. This accountant will be ${actionTense}`,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '${upperCaseAction} Accountant',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{route('add-product')}}",
                            data: {id: accountant_id, action: action},
                        }).done(function(data) {
                            // Backend returnscontent type json headers so no need to parse
                            if(data.status) {
                                Toast.fire({
                                    icon: "success",
                                    text: `Accountant ${actionTense} successfully`
                                });

                                setTimeout(() => {
                                    window.location.reload();
                                }, 3000);
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    text: data.error
                                });
                            }
                        }).fail(function(data) {
                            Toast.fire({
                                icon: 'error',
                                text: 'Server Error: Try again later'
                            })
                        })
                    } else {
                        Toast.fire({
                            icon: 'info',
                            text: `${upperCaseAction} accountant cancelled`,
                        })
                    }
                })
            }

            /**
             * View the permissions granted to an accountant
             * @param {string} accountant_id The id of the accountant to view permissions
             */

             function viewPermissions(accountant_id) {
                 $.ajax({
                     type: "GET",
                     url: "{{route('add-product')}}",
                 }).done(function(data) {
                     if(data.success) {
                         let permissions = data.permissions;
                         tableBody = $('#permissionsModalTableBody');
                         tableBody.html('');
                         permissions.forEach(function (permission){
                             let normalizedPermName = permission.name.split('_').map((w) => w.charAt(0).toUpperCase() + w.slice(1)).join(' ');
                             tableBody.append(`
                                <tr>
                                    <td>${normalizedPermName}</td>   
                                    <td>${permission.description}</td> 
                                </tr>
                             `);
                         });
                         $("#permissionsModalTable").DataTable();
                         $("#viewPermissions").modal("show");
                     } else {
                         Toast.fire({
                             icon: 'error',
                             text: data.error
                         });
                     }
                 }).fail(function(data) {
                     Toast.fire({
                         icon: 'error',
                         text: 'Server Error: Failed to retrieve permissions'
                     })
                 })
             }


             /** 
              * Loads editPermissions Modal
              * @param {string} accountant_id of the accountant
              */
             function editPermissions(accountant_id) {
                 $.ajax({
                     type: "GET",
                     url: "{{route('add-product')}}",
                 }).done(function(data) {
                     if(data.status) {
                         let permissions = data.permission;
                        //  Reset all checkboxes in edit=-permissions form firsts
                        $("#edit-permissions-form").find('input[type=checkbox]').prop('checked', false);

                        // Then add an hidden accountant_id field
                        $("#edit_permission_accountant_id").val(accountant_id);
                        permissions.forEach((permission) => {
                            $("#edit-permissions-form").find(`#edit_${permission.name}`).prop('checked', true);
                        });
                        $("#editPermissionsModal").modal("show");
                     }else {
                         Toast.fire({
                             icon: 'error',
                             text: permissions.error
                         })
                     }
                 }).fail(function(data) {
                    Toast.fire({
                     icon: 'error',
                     text: 'Server Error: Failed to retrieve permissions.'
                    })
                 })
             }

            /**
             * Loads nominateExisting Modal
             * @param {string} accountant_id
             */ 
            function nominateExisting(accountant_id) {
                $("#nominate_existing_accountant_id").val(accountant_id);
                $("#nominateExisting").modal("show");
            }

            /** 
             * Resends the nomination mail to the accountant
             * @param {string} accountant_id
             */ 
            function resendNominationMail(accountant_id) {
                $.ajax({
                    type: "POST",
                    url: "{{route('add-product')}}",
                    data: {id: accountant_id},
                }).done(function(data) {
                    if(data.status) {
                        Toast.fire({
                            icon: 'success',
                            text: 'Successfully resend nomination email',
                        });
                        setInterval(() => {
                            window.location.reload();
                        }, 3000);
                    } else{
                        Toast.fire({
                            icon: 'error',
                            text: data.message
                        })
                    }
                }).fail(function(data) {
                    Toast.fire({
                        icon: 'error',
                        text: 'Server Error:Failed to resend nomination mail'
                    })
                })
            }

            /** 
             * Switch active supplier
             */ 
            function switchSupplier(supplier_id) {
                Swal.fire({
                    title: `Select Supplier`,
                    text: 'Warning. This will change the active supplier',
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: 'Select',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if(result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{route('add-product')}}",
                            data: {supplier_id: supplier_id},
                        }).done(function(data) {
                            if(data.status) {
                                Toast.fire({
                                    icon: 'success',
                                    text: 'Successfully switched supplier'
                                });
                                setTimeout(() => {
                                    window.location.reload();
                                }, 3000);
                            }else {
                                Toast.fire({
                                    icon: 'error',
                                    text: data.message
                                })
                            }
                        }).fail(function(data) {
                            Toast.fire({
                                icon: 'error',
                                text: 'Server Error: Failed to switch supplier'
                            })
                        })
                    }
                })
            }      
    });

</script>
@endsection