@extends('layouts.app', ['page_title'=> 'KRA Exports - WillieScant'])

@section('content')
@include('menu.supplier_nav')
<script>saleVat=0</script><script>purchaseVat=0</script><script>savingsSwalr = '';</script>

    <div class="loading d-none">Loading&#8230;</div>
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <!-- Sidebar -->
@include('menu.sidebar')
<!-- End Sidebar -->        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabs Nav -->
                        <ul class="nav nav-tabs ml-md-auto mt-3 mt-md-0">
                            <li class="nav-item">
                                <a href="#purchases_tab" class="nav-link active"
                                    data-target="#purchases_tab, #purchases_control" role="tab" aria-selected="true"
                                    data-toggle="tab">Purchases</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sales_tab" class="nav-link" role="tab" aria-selected="true"
                                    data-toggle="tab">Sales</a>
                            </li>
                            <li class="ml-auto">
                                <button class="btn btn-sm btn-outline-primary mr-3" data-toggle="modal" href="#" onclick="kraDetails()">
                                    <i class="fa fa-eye"></i> KRA details
                                </button>
                            </li>
                        </ul>
                        <!-- End Tabs Nav -->

                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchases_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-sm btn-outline-primary mr-2" data-toggle="modal" href="#" onclick="openAddPurchaseModal()">
                                            <i class="fa fa-plus"></i> Declare
                                        </button>
                                        <a class="btn btn-sm btn-outline-secondary mr-2" href="{{route('export-all')}}">
                                            <i class="fas fa-file-export"></i> Export All
                                        </a>
                                        <button class="btn btn-sm btn-outline-info" href="#" onclick="exportThisMonthPurchases()">
                                            <i class="fas fa-file-export"></i> Export <span class="currentMonthName"></span>
                                        </button>                                        
                                        <form class="form-inline mt-2" id="custom-purchase-export">
                                            <label for="purchase-export-start" class="mr-1">From: </label>
                                            <input class="form-control form-control-inline form-control-sm mr-3" type="date" id="purchase-export-start" name="start" required>
                                            
                                            <label for="purchase-export-end" class="mr-1">To: </label>
                                            <input class="form-control form-control-sm" type="date" id="purchase-export-end" name="end" required>
                                            
                                            <button class="btn btn-sm btn-soft-secondary ml-3">
                                                <i class="fas fa-calendar"></i> Export Custom Range
                                            </button>                                            
                                        </form>
                                        <hr>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-hover table_dt">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Supplier</th>
                                                        <th>PIN</th>
                                                        <th>Receipt No</th>
                                                        <th>Item Count</th>
                                                        <th>Taxable Value</th>
                                                        <th>VAT</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="sales_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-sm btn-outline-primary mr-2" href="#" onclick="openAddSaleModal()">
                                            <i class="fa fa-plus"></i> Declare
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary mr-2" href="#" onclick="exportSales(0)">
                                            <i class="fas fa-file-export"></i> Export All
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" href="#" onclick="exportThisMonthSale()">
                                            <i class="fas fa-file-export"></i> Export <span class="currentMonthName"></span>
                                        </button>  
                                        <form class="form-inline mt-2" id="custom-sale-export">
                                            <label for="sale-export-start" class="mr-1">From: </label>
                                            <input class="form-control form-control-inline form-control-sm mr-3" type="date" id="sale-export-start" name="start" required>
                                            
                                            <label for="sale-export-end" class="mr-1">To: </label>
                                            <input class="form-control form-control-sm" type="date" id="sale-export-end" name="end" required>
                                            
                                            <button class="btn btn-sm btn-soft-secondary ml-3">
                                                <i class="fas fa-calendar"></i> Export Custom Range
                                            </button>                                            
                                        </form>  
                                        <hr>                                     
                                        <div class="table-responsive mt-3">
                                            <table class="table table-hover table_dt">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>PIN</th>
                                                        <th>Receipt No</th>
                                                        <th>ETR</th>
                                                        <th>Item Count</th>
                                                        <th>Taxable Value</th>
                                                        <th>VAT</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs Content -->
                        <script>
                            const monthNames = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                            ];
                            const today = new Date();
                            monthNameText = document.getElementsByClassName("currentMonthName");
                            for(monthName of monthNameText) {
                                monthName.textContent += monthNames[today.getMonth()]
                            }                                             
                        </script>                        
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
    <div class="modal fade" id="purchaseDetailsModal" tabindex="-1" role="dialog" aria-labelledby="purchaseDetailsModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="purchaseDetailsModal">Purchase Receipt Details</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row details-row">

                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                KRA PIN
                            </div>
                            <div class="details-value">
                                A009876546A
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Supplier Name
                            </div>
                            <div class="details-value">
                                Joshua
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Supplier Location
                            </div>
                            <div class="details-value">
                                10663-00100 NAIROBI
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Product Name
                            </div>
                            <div class="details-value">
                                Sticky Glue
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Product Description
                            </div>
                            <div class="details-value">
                                Glue
                            </div>
                        </div>

                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Receipt Number
                            </div>
                            <div class="details-value">
                                55555
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Quantity
                            </div>
                            <div class="details-value">
                                2
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Unit Price
                            </div>
                            <div class="details-value">
                                1000
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Total Price
                            </div>
                            <div class="details-value">
                                2000
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                VAT
                            </div>
                            <div class="details-value">
                                320
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Sub Total
                            </div>
                            <div class="details-value">
                                1680
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Date
                            </div>
                            <div class="details-value">
                                2019-10-19
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                Time
                            </div>
                            <div class="details-value">
                                14:22:00
                            </div>
                        </div>
                        <div class="col-3 mb-4 details-item">
                            <div class="details-title">
                                SKU
                            </div>
                            <div class="details-value">
                                N/A
                            </div>
                        </div>
                    </div>
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


    <!-- Add Purchases Modal -->
    <div class="modal fade" id="addPurchasesModal" tabindex="-1" role="dialog" aria-labelledby="addPurchasesModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-wide" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addPurchasesModal">Declare Purchases</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="form-inline mt-2" id="add-purchase">
                    <label for="add-purchase-start" class="mr-1">From: </label>
                    <input class="form-control form-control-inline form-control-sm mr-3" type="date" id="add-purchase-start" name="start" required>
                    
                    <label for="add-purchase-end" class="mr-1">To: </label>
                    <input class="form-control form-control-sm" type="date" id="add-purchase-end" name="end" required>
                    
                    <button class="btn btn-sm btn-soft-secondary ml-3">
                        <i class="fas fa-calendar"></i> Add Receipts in this range
                    </button>                                            
                </form>
                <div class="table-responsive mt-3">
                    <table class="table table-hover" id="addPurchasesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier</th>
                                <th>PIN</th>
                                <th>Receipt No</th>
                                <th>Item Count</th>
                                <th>Taxable Value</th>
                                <th>VAT</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="setPurchaseTableBody">
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Purchases Modal -->


    <!-- Add Sales Modal -->
    <div class="modal fade" id="addSalesModal" tabindex="-1" role="dialog" aria-labelledby="addSalesModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-wide" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addSalesModal">Add KRA Sales</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="form-inline mt-2" id="add-sale">
                    <label for="add-sale-start" class="mr-1">From: </label>
                    <input class="form-control form-control-inline form-control-sm mr-3" type="date" id="add-sale-start" name="start" required>
                    
                    <label for="add-sale-end" class="mr-1">To: </label>
                    <input class="form-control form-control-sm" type="date" id="add-sale-end" name="end" required>
                    
                    <button class="btn btn-sm btn-soft-secondary ml-3">
                        <i class="fas fa-calendar"></i> Add Receipts in this range
                    </button>                                            
                </form>                
                <div class="table-responsive mt-3">
                    <table class="table table-hover" id="setSaleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>PIN</th>
                                <th>Receipt No</th>
                                <th>ETR</th>
                                <th>Item Count</th>
                                <th>Taxable Value</th>
                                <th>VAT</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="setSaleTableBody">
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Sales Modal -->    

    <!-- View Kra details modal -->
    <div class="modal fade" id="kraDetails" tabindex="-1" role="dialog" aria-labelledby="kraDetails"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-wide" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="kraDetails">KRA Details</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">             
                <div class="table-responsive mt-3">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Declared</th>
                                <th>Not Declared</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="kraDetailsTableBody">                     
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view kra details modal     -->

<!-- Global Vendor -->

<script>
if(savingsSwalr) {
    Swal.fire(savingsSwalr);
}

let d = new Date();
d = d.toISOString().substring(0,10);
$("#sale-export-end, #purchase-export-end").attr("max", d);

$("#custom-purchase-export").submit(function(e) {
    e.preventDefault();
    start = $("#custom-purchase-export").find($("#purchase-export-start")).val();
    end = $("#custom-purchase-export").find($("#purchase-export-end")).val();
    exportCustomPurchase(start, end, 'custom');
});

$("#custom-sale-export").submit(function(e) {
    e.preventDefault();
    start = $("#custom-sale-export").find($("#sale-export-start")).val();
    end = $("#custom-sale-export").find($("#sale-export-end")).val();     
    exportCustomSale(start, end, 'custom');
});

function exportCustomPurchase(start, end, source='current') {
    $.ajax({
        type: 'POST',
        url: `williescant/supplier/export-all`,
        data:{'start': start, 'end': end, 'source': source},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var customSaleVat = parseFloat(res['sales']['data']);
                var customPurchaseVat = parseFloat(res['purchases']['data']);
                if(source == 'custom' && res['paid'] && res['paid']['total']) {
                    var totalPaidVat = Math.round(parseFloat(res['paid']['total']), 2);
                        confirmCustomExportAmount(
                            totalPaidVat,
                            Math.round(parseFloat(res['unpaid']['total']), 2),
                            'purchases',
                            source,
                            start,
                            end
                        );
                } else {
                    confirmExportAmount(
                    Math.round(parseFloat(customPurchaseVat)-parseFloat(customSaleVat), 2),
                    'purchases',
                    source,
                    start,
                    end);
                }
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to export purchases. Try again later",
                });
            }
        },
        error: function (err) {
            Swal.fire({
                icon: "error",
                title: "Server Error. Try again later",
            });
        }
    });  
}

function exportCustomSale(start, end, source='current') {
    $.ajax({
        type: 'POST',
        url: `/supplier/kra/export_sales.php/`,
        data:{'start': start, 'end': end, 'source': source},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var customPurchaseVat = parseFloat(res['purchases']['data']);
                var customSaleVat = parseFloat(res['sales']['data']);
                if(source == 'custom' && res['paid'] && res['paid']['total']) {
                    var totalPaidVat = Math.round(parseFloat(res['paid']['total']), 2);
                    confirmCustomExportAmount(
                        totalPaidVat,
                        Math.round(parseFloat(customPurchaseVat)-parseFloat(customSaleVat), 2),
                        'sales',
                        source,
                        start,
                        end
                    );                    
                } else {
                    confirmExportAmount(
                    Math.round(parseFloat(customPurchaseVat)-parseFloat(customSaleVat), 2),
                    'sales',
                    source,
                    start,
                    end);
                }
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to export sales. Try again later",
                });
            }
        },
        error: function (err) {
            Swal.fire({
                icon: "error",
                title: "Server Error. Try again later",
            });
        }
    });      
}

function exportThisMonthPurchases(){
    let monthBounds = getMonthDateBounds();
    exportCustomPurchase(monthBounds[0], monthBounds[1], 'current');
}

function exportThisMonthSale(){
    let monthBounds = getMonthDateBounds();
    exportCustomSale(monthBounds[0], monthBounds[1], 'current');
}

$("#add-purchase").submit(function(e){
    e.preventDefault();
    start = $("#add-purchase").find($("#add-purchase-start")).val();
    end = $("#add-purchase").find($("#add-purchase-end")).val();

    setPurchase('', start, end);
});

$("#add-sale").submit(function(e){
    e.preventDefault();
    start = $("#add-sale").find($("#add-sale-start")).val();
    end = $("#add-sale").find($("#add-sale-end")).val();

    setSale('', start, end);
});

function openAddPurchaseModal(start='', end='') {
    $.ajax({
        type: 'GET',
        url: `/supplier/kra/get_purchases.php/?start=${start}&end=${end}`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var markup = res['markup']
                if(!markup) {
                    markup = `<tr><td colspan="9" class="text-center">
                    <div class="alert alert-soft-secondary justify-content-center">Zero purchase receipts found</div>
                    </td></tr>`;                    
                }
                $("#addPurchasesModal").find("#setPurchaseTableBody").html(markup);
                $("#addPurchasesModal").modal("show");
                $("#addPurchasesTable").DataTable();
            } else {
                Swal.fire({
                    'icon': 'error',
                    'text': 'Server Error Failed to fetch purchase receipts'
                });
                // $("#modal-errors").removeClass('d-none');
            }
        },
        error: function(err) {
            Swal.fire({
                'icon': 'error',
                'text': 'Server Error Failed to fetch purchase receipts'
            });
        }
    });    
}

function openAddSaleModal(){
    $.ajax({
        type: 'GET',
        url: `/supplier/kra/get_sales.php/`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var markup = res['markup']
                if(!markup) {
                    markup = `<tr><td colspan="9" class="text-center">
                    <div class="alert alert-soft-secondary justify-content-center">Zero sale receipts found</div>
                    </td></tr>`;
                }
                $("#addSalesModal").find("#setSaleTableBody").html(markup);
                $("#addSalesModal").modal("show");
                $("#setSaleTable").DataTable();
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    }); 
}

function setSale(sale_id='', start_date='', end_date='') {
    $.ajax({
        type: 'POST',
        url: `/supplier/kra/set_unset_sale.php/`,
        data:{
            'sale_id': sale_id,
            'action': 'set',
            'start': start_date,
            'end': end_date
        },
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.href= '/supplier/kra.php?compare=1';
                }, 1000);
            } else {
                Swal.fire({
                    'icon': 'error',
                    'text': 'Failed to set sale. Try again later'
                });
                // $("#modal-errors").removeClass('d-none');
            }
        }
    }); 
}

function unsetSale(sale_id) {
    $.ajax({
        type: 'POST',
        url: `/supplier/kra/set_unset_sale.php/`,
        data:{'sale_id': sale_id, 'action': 'unset'},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.href= '/supplier/kra.php?compare=1';
                }, 1000);
            } else {
                Swal.fire({
                    'icon': 'error',
                    'text': 'Failed to unset sale. Try again later'
                })
                // $("#modal-errors").removeClass('d-none');
            }
        }
    }); 
}

function setPurchase(purchase_id='', start_date='', end_date='') {
    $.ajax({
        type: 'POST',
        url: `/supplier/kra/set_unset_purchase.php/`,
        data:{
            'purchase_id': purchase_id,
            'action': 'set',
            'start': start_date,
            'end': end_date
        },
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.href= '/supplier/kra.php?compare=1';
                }, 1000);
            } else {
                Swal.fire({
                    'icon': 'error',
                    'text': 'Failed to set purchase. Try again later'
                });                
                // $("#modal-errors").removeClass('d-none');
            }
        }
    }); 
}

function unsetPurchase(purchase_id) {
    $.ajax({
        type: 'POST',
        url: `/supplier/kra/set_unset_purchase.php/`,
        data:{'purchase_id': purchase_id, 'action': 'unset'},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.href= '/supplier/kra.php?compare=1';
                }, 1000);
            } else {
                Swal.fire({
                    'icon': 'error',
                    'text': 'Failed to unset purchase. Try again later'
                });                
                // $("#modal-errors").removeClass('d-none');
            }
        }
    }); 
}

function exportPurchases(total_vat){
    window.location.href = `williescant/supplier/export-all`;  
}

function exportSales(total_vat){
    window.location.href = `williescant/supplier/export-all`;  
}

function confirmExportAmount(vat_total, target, source='current', start='', end='') {
    var encouragement_text = "Declare more Purchases to ensure maximum savings";
    Swal.fire({
        title: `Your total savings is Ksh ${vat_total}`,
        text: encouragement_text,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: `Proceed to export ${target}`,
        cancelButtonText: 'Declare More Purchases',
        allowOutsideClick: false
        }).then((result) => {
        if (result.isConfirmed) {
            checkSubscription(vat_total, target, source, start, end);
        } else {
            openAddPurchaseModal(start, end);
        }
    });    
}

function confirmCustomExportAmount(vat_paid, unpaid_vat, target, source, start, end) {
    var encouragement_text = "Declare more Purchases to ensure maximum savings";
    Swal.fire({
        title: `Your total savings is Ksh ${vat_paid + unpaid_vat}`,
        text: encouragement_text,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: `Proceed to export ${target}`,
        cancelButtonText: 'Declare More Purchases',
        allowOutsideClick: false
        }).then((result) => {
        if (result.isConfirmed) {
            checkSubscription(unpaid_vat, target, source, start, end);
        } else {
            openAddPurchaseModal(start, end);
        }
    }); 
}

function checkSubscription(vat_total, target, source='current', start='', end='') {
    var exportCharges = Math.round(parseFloat(5/100) * parseFloat(vat_total), 0);
    $(".loading").removeClass("d-none");
    $.ajax({
        type: 'GET',
        url: `/supplier/helpers/check_subscription.php?source=${source}&start=${start}&end=${end}`,
        data: {},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: async function (result) {
            $(".loading").addClass("d-none");
            res = JSON.parse(result);
            if (res['success'] || parseFloat(vat_total) <= 0 || exportCharges < 1) {
                if(target == 'purchases') {
                    window.location.href = `/supplier/kra/export_purchases.php?source=${source}&start=${start}&end=${end}`;  
                } else {
                    window.location.href = `/supplier/kra/export_sales.php?source=${source}&start=${start}&end=${end}`;  
                }
            } 
            else if (res['has_pending']) {
                Swal.fire({
                    title: 'You have a pending payment',
                    text: `Click the complete payment button below to complete this payment`,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: `Complete Payment`,
                    cancelButtonText: 'Cancel',
                    allowOutsideClick: () => !swal.isLoading(),
                    preConfirm: () => {
                        status_check = checkTransactionStatus();
                        if(status_check["status"] == 'Completed') {
                            Swal.fire({
                                icon: "success",
                                title: "Payment completed successfully. Please wait for your export",
                                timer: 10000
                            });
                            if(target == 'purchases') {
                                window.location.href = `/supplier/kra/export_purchases.php?start=${start}&end=${end}`;  
                            } else {
                                window.location.href = `/supplier/kra/export_sales.php?start=${start}&end=${end}`;  
                            }                                
                        } else if (status_check["status"] == 'Cancelled') {
                            Swal.fire({
                                icon: "warning",
                                title: "Payment cancelled. Try again later",
                                timer: 10000
                            });
                        } else if (status_check["status"] == 'Failed') {
                            var message = "Payment Failed. Try again later";
                            if(status["message"]) {
                                message = status_check["message"];
                            }
                            Swal.fire({
                                icon: "error",
                                title: message,
                                timer: 10000
                            });
                        } else {
                            return false;
                        }
                    }                    
                });           
            }
            else {
                var message = `You will be prompted to pay Ksh ${exportCharges} to proceed with this export`;
                if(source == "custom") {
                    message = `You have unpaid fees for KSH ${vat_total} vat savings.\n You will be prompted to pay Ksh ${exportCharges} to proceed with this export`;
                }
                const { value: phoneNumber } = await Swal.fire({
                    title: 'Enter your M-Pesa Registered Phone number',
                    text: message,
                    input: 'text',
                    inputValue: '',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: `Pay Now`,
                    cancelButtonText: 'Cancel',                    
                    inputValidator: (value) => {
                        if (!value) {
                        return 'Phone Number is required!'
                        }
                    }
                });                 
                if(phoneNumber) {
                    proceedToPayment(exportCharges, phoneNumber, vat_total, target, source, start=start, end=end);
                }
            }
        },
        error: function(err) {
            $(".loading").addClass("d-none");
            Swal.fire({
                icon: "error",
                title: "Server Error. Try again later",
            });            
        }
    }); 
}

function proceedToPayment(exportCharges, phone, vat_total, target, source='current', start='', end='') {
    $(".loading").removeClass("d-none");
    $.ajax({
        type: 'POST',
        url: `/supplier/helpers/initiate_payment.php`,
        data: {'charges': exportCharges, 'msisdn': phone},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                timer = 0; 
                var refreshId = setInterval(function() {
                    var status_check = checkTransactionStatus();
                    if (status_check["status"] == 'Completed') {
                        $(".loading").addClass("d-none");
                        clearInterval(refreshId);
                        Swal.fire({
                            icon: "info",
                            title: "Payment completed. Please wait for your export.",
                            timer: 10000
                        });     
                        if(target == 'purchases') {
                            window.location.href = `/supplier/kra/export_purchases.php?source=${source}&start=${start}&end=${end}`;  
                        } else {
                            window.location.href = `/supplier/kra/export_sales.php?source=${source}&start=${start}&end=${end}`;  
                        }                      
                    } else if (status_check["status"] == 'Failed') {
                        let status_message = "Could not complete the payment. Try again later";
                        console.log(status_check["message"]);
                        if(status_check["message"]) {
                            status_message = status_check["message"];
                        }
                        $(".loading").addClass("d-none");
                        clearInterval(refreshId);
                        Swal.fire({
                            icon: "error",
                            title: status_message,
                            timer: 5000
                        });
                        // proceedToC2B(exportCharges, vat_total, target, source, start, end);
                    } else if (status_check["status"] === 'Cancelled') {
                        $(".loading").addClass("d-none");
                        clearInterval(refreshId);
                        Swal.fire({
                            icon: "info",
                            title: "Payment cancelled. Try again later",
                            timer: 5000
                        });
                    }
                    else if(timer >= 120000) {
                        $(".loading").addClass("d-none");
                        clearInterval(refreshId);
                        Swal.fire({
                            icon: "error",
                            title: "Could not complete the payment. Try again later",
                            timer: 5000
                        });
                    // proceedToC2B(exportCharges, vat_total, target, source, start, end);
                    }
                    timer += 5000;
                }, 5000);                 
            } else if(res['error']) {
                $(".loading").addClass("d-none");
                Swal.fire({
                    icon: "error",
                    title: `${res['error']}`,
                });
                // proceedToC2B(exportCharges, vat_total, target, source, start, end);
            } else {
                $(".loading").addClass("d-none");
                Swal.fire({
                    icon: "error",
                    title: `Server Error: Could not initiate the payment. Try again later`,
                    timer: 5000
                });  
                // proceedToC2B(exportCharges, vat_total, target, source, start, end);
            }
        },
        error: function(err) {
            $(".loading").addClass("d-none");
            Swal.fire({
                icon: "error",
                title: `Server Error: Could not complete the payment. Try again later`,
                timer: 5000
            });            
        }
    });     
}

function checkTransactionStatus() {
    var transactionStatus = {"message": ""};
    $.ajax({
        type: 'GET',
        url: `/supplier/helpers/check_transaction_status.php`,
        data: {},
        async: false,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            console.log(result);
            res = JSON.parse(result);
            if (res['success']) {
                transactionStatus["status"] = res['data']['state'];
                if(res['data'].hasOwnProperty('message')) {
                    transactionStatus["message"] = res['data']['message'];                             
                }     
            } else {
                if(res['data'].hasOwnProperty('state')) {
                    transactionStatus["status"] = res['data']['state'];                   
                } else {
                    transactionStatus["status"] = "Failed";            
                }
                if(res['data'].hasOwnProperty('message')) {
                    transactionStatus["message"] = res['data']['message'];                             
                }     
            }
        },
        error: function(err) {
            transactionStatus["status"] = "Failed";
        }
    }); 
    return transactionStatus;
}

async function proceedToC2B(exportCharges, vat_total, target, source='current', start='', end='') {
    const { value: mpesaCode } = await Swal.fire({
        title: `Payment Instructions`,
        html: `
            <p>Open Lipa Na Mpesa, Enter Paybill Number: <b>276660</b>,
                Account: <b>KRA</b>, Amount: <b>${exportCharges}</b></p>
            <p>Then enter the Mpesa Transaction code below for confirmation</p>
            `,
        input: 'text',
        inputValue: '',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: `Confirm Payment`,
        cancelButtonText: 'Cancel',   
        allowOutsideClick: false,
        inputValidator: (value) => {
            if (!value) {
                return 'Mpesa Code is required!'
            }
            else {
                $(".loading").removeClass("d-none");
                $.ajax({
                    type: 'GET',
                    url: `/supplier/helpers/checkc2b_transaction.php?mpesa_code=${value}`,
                    statusCode: {
                        401: function(response) {
                            window.location.href = '/auth/logout.php';
                        }
                    },        
                    success: function (result) {
                        console.log(result);
                        res = JSON.parse(result);
                        if (res['success']) {  
                            $(".loading").addClass("d-none");
                            Swal.fire({
                                icon: "info",
                                title: "Payment completed. Please wait for your export.",
                                timer: 10000
                            });     
                            if(target == 'purchases') {
                                window.location.href = `/supplier/kra/export_purchases.php?source=${source}&start=${start}&end=${end}`;  
                            } else {
                                window.location.href = `/supplier/kra/export_sales.php?source=${source}&start=${start}&end=${end}`;  
                            }         
                        } else if(res['error']) {    
                            $(".loading").addClass("d-none");
                            Swal.fire({
                                icon: "error",
                                title: res['error'],
                                timer: 10000
                            });      
                            return false;                 
                        }
                    },
                    error: function(err) {
                        $(".loading").addClass("d-none");   
                        Swal.fire({
                            icon: "error",
                            title: "Oops, something went wrong. Try again later",
                            timer: 10000
                        });   
                        return false;                                            
                    }
                });
            }              
        }
    }); 
}

function kraDetails() {
    $.ajax({
        type: 'GET',
        url: `/supplier/kra/kra_details.php`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (res) {
            if (res['success']) {
                overall = res['data']['overall'];
                previous = res['data']['previous'];
                current = res['data']['current'];
                next = res['data']['next'];
                tableBody = $("#kraDetailsTableBody").html('');
                tableBody.append(
                    `
                    <tr class="bg-light">
                        <td rowspan=2>Overall Total</td>
                        <td>Total Purchase VAT</td>                    
                        <td>${overall['declared_purchases']}</td>
                        <td>${overall['undeclared_purchases']}</td>                    
                        <td>${overall['total_purchases']}</td>                                     
                    </tr> 
                    <tr class="bg-light">
                        <td>Total Sales VAT</td>                    
                        <td>${overall['declared_sales']}</td>
                        <td>${overall['undeclared_sales']}</td>                    
                        <td>${overall['total_sales']}</td>                                     
                    </tr> 
                    <tr>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                    </tr>

                    <tr class="bg-soft-primary">
                        <td rowspan=2>Previous</td>
                        <td>${previous['month']} Purchase VAT</td>                    
                        <td>${previous['declared_purchases']}</td>
                        <td>${previous['undeclared_purchases']}</td>                    
                        <td>${previous['total_purchases']}</td>                                     
                    </tr> 
                    <tr class="bg-soft-primary">
                        <td>${previous['month']} Sales VAT</td>                    
                        <td>${previous['declared_sales']}</td>
                        <td>${previous['undeclared_sales']}</td>                    
                        <td>${previous['total_sales']}</td>                                     
                    </tr> 
                    <tr>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                    </tr>

                    <tr class="bg-soft-success">
                        <td rowspan=2>Current</td>
                        <td>${current['month']} Purchase VAT</td>                    
                        <td>${current['declared_purchases']}</td>
                        <td>${current['undeclared_purchases']}</td>                    
                        <td>${current['total_purchases']}</td>                                     
                    </tr> 
                    <tr class="bg-soft-success">
                        <td>${current['month']} Sales VAT</td>                    
                        <td>${current['declared_sales']}</td>
                        <td>${current['undeclared_sales']}</td>                    
                        <td>${current['total_sales']}</td>                                     
                    </tr> 
                    <tr>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                        <td style="border-none"></td>
                    </tr>

                    <tr class="bg-soft-secondary">
                        <td rowspan=2>Next</td>
                        <td>${next['month']} Target Purchase VAT</td>                    
                        <td>${next['declared_purchases']}</td>
                        <td>${next['undeclared_purchases']}</td>                    
                        <td>${next['total_purchases']}</td>                                     
                    </tr> 
                    <tr class="bg-soft-secondary">
                        <td>${next['month']} Target Sales VAT</td>                    
                        <td>${next['declared_sales']}</td>
                        <td>${next['undeclared_sales']}</td>                    
                        <td>${next['total_sales']}</td>                                     
                    </tr> 
                    <tr></tr>                                                                                 
                    `
                );
                $("#kraDetails").modal("show");
            } else {
                Swal.fire({
                    'icon': 'error',
                    'text': 'Error: Failed to retrieve kra details.'
                });
            }
        },
        error: function(err) {
            Swal.fire({
                'icon': 'error',
                'text': 'Error: Failed to retrieve kra details.'
            });
        }
    });     
}
</script>
@endsection