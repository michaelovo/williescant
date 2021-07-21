@extends('layouts.app', ["page_title" => "Purchases - WillieScant"])

@section('content')
    <!-- Header (Topbar) -->
    @include('menu.supplier_nav')
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        @include('menu.sidebar')
        <!-- End Sidebar -->
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
                            </li>
                        </ul>
                        <!-- End Tabs Nav -->
                        <!-- Tabs Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchases_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-sm btn-outline-primary mr-3" data-toggle="modal" href="#" onclick="openAddPurchaseModal()">
                                            <i class="fa fa-plus"></i> Add Purchase receipt
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" href="#" onclick="exportPurchases()">
                                            <i class="fas fa-file-export"></i> Export Purchases
                                        </button>
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
                                                @foreach($purchases as $key => $purchase)
                                                    <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$purchase->supplier_name}}</td>
                                                    <td>{{$purchase->pin}}</td>
                                                    <td>{{$purchase->receipt_number}}</td>
                                                    <td>{{$purchase->total_items}}</td>
                                                    <td>{{$purchase->sub_total}}</td>
                                                    <td>{{$purchase->vat}}</td>
                                                    <td>{{$purchase->date}}</td>
                                                    <td class="text-center">
                                                        <a id=""  class="btn btn-sm btn-outline-info" href="#!" onclick="unsetPurchase('{{$purchase->id}}')">
                                                            <i class="fa fa-minus"></i> Remove
                                                        </a>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sales_tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-sm btn-outline-primary mr-3" href="#" onclick="openAddSaleModal()">
                                            <i class="fa fa-plus"></i> Add Sale Receipt
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" href="#" onclick="exportSales()">
                                            <i class="fas fa-file-export"></i> Export Sales
                                        </button>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-hover table_dt">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Customer Name</th>
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
                                                @foreach($sales as $key => $sale)
                                                <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>$sale->customer_name</td>
                                                <td>$sale->pin</td>
                                                <td>$sale->receipt_number</td>
                                                <td>$sale->total_items</td>
                                                <td>$sale->sub_total</td>
                                                <td>$sale->vat</td>
                                                <td>$sale->date</td>
                                                <td class="text-center">
                                                    <a id=""  class="btn btn-sm btn-outline-info" href="#!" onclick="setSale('{{$sale->id}}')">
                                                        <i class="fa fa-minus"></i> Remove
                                                    </a>
                                                </td>
                                                </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
                    &copy; <?php echo date("Y");?> <a class="link-muted" href="https://williescant.co.ke"
                        target="_blank">WilieScant
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
                    <h2 class="modal-title" id="addPurchasesModal">Add KRA Purchases</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <tbody id="setPurchaseTableBody">
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Purchases Modal -->


    <!-- Add Purchases Modal -->
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
                <div class="table-responsive mt-3">
                    <table class="table table-hover table_dt">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>PIN</th>
                                <th>Receipt No</th>
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

<script>
function openAddPurchaseModal() {
    $.ajax({
        type: 'GET',
        url: `/willie-online-new/supplier/kra/get_purchases.php/`,
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var markup = res['markup']
                $("#addPurchasesModal").find("#setPurchaseTableBody").html(markup);
                $("#addPurchasesModal").modal("show");
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function openAddSaleModal(){
    $.ajax({
        type: 'GET',
        url: `/willie-online-new/supplier/kra/get_sales.php/`,
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                var markup = res['markup']
                $("#addSalesModal").find("#setSaleTableBody").html(markup);
                $("#addSalesModal").modal("show");
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function setSale(sale_id) {
    $.ajax({
        type: 'POST',
        url: `/willie-online-new/supplier/kra/set_unset_sale.php/`,
        data:{'sale_id': sale_id, 'action': 'set'},
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function unsetSale(sale_id) {
    $.ajax({
        type: 'POST',
        url: `/willie-online-new/supplier/kra/set_unset_sale.php/`,
        data:{'sale_id': sale_id, 'action': 'unset'},
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function setPurchase(purchase_id) {
    $.ajax({
        type: 'POST',
        url: `/willie-online-new/supplier/kra/set_unset_purchase.php/`,
        data:{'purchase_id': purchase_id, 'action': 'set'},
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function unsetPurchase(purchase_id) {
    $.ajax({
        type: 'POST',
        url: `/willie-online-new/supplier/kra/set_unset_purchase.php/`,
        data:{'purchase_id': purchase_id, 'action': 'unset'},
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function exportPurchases(){
    window.location.href = '/willie-online-new/supplier/kra/export_purchases.php/';
}

function exportSales(){
    window.location.href = '/willie-online-new/supplier/kra/export_sales.php/';
}
</script>
@endsection
