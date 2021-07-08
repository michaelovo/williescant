@extends('layouts.app', ['page_title' => ''])

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
            <div class="d-flex justify-content-between mb-3">
                <h1 class="h2 font-weight-semibold">Inventory</h1>
                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" href="#addProductModal">
                    <i class="fa fa-plus mr-2"></i>
                    Add Product
                </button>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table_dt">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Buying Price</th>
                                <th scope="col">Available</th>
                                <th scope="col">SKU</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($sales as $key => $sale)
                                            <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$sale->name}}</td>
                                            <td>{{$sale->quantity}}</td>
                                            <td>{{$sale->unit_price}}</td>
                                            <td>
                                                @if($sale->available)
                                                    <div class="badge badge-soft-danger">No</div>
                                                @else
                                                    <div class="badge badge-soft-success">Yes</div>
                                                @endif
                                            </td>
                                            <td>{{$sale->sku}}</td>
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
                                                                data-toggle="modal" href="#" onclick="details('{{$sale->id}}')">
                                                                <i class="fa fa-eye mr-3"></i>Details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                data-toggle="modal" href="#" onclick="prepareProduct('{{$sale->id}}')">
                                                                <i class="fa fa-cog mr-3"></i>Prepare
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                data-toggle="modal" href="#" onclick="editProduct('{{$sale->id}}')">
                                                                <i class="fa fa-edit mr-3"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="d-flex align-items-center text-danger link-muted py-2 px-3"
                                                                href="#!" onclick="deleteProduct('{{$sale->id}}')">
                                                                <i class="fa fa-trash mr-3"></i>Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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

<!-- View Product Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="detailsModal">Product Details</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Errors -->
                <div id="modal-details-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                    <i class="fa fa-minus-circle alert-icon mr-3"></i>
                    <span>Error: Failed to retrieve product details. Try again later</span>
                </div>
                <!-- End Errors -->
                <div class="card view-product">
                    <div class="card-body row">
                        <div class="col-md-5">
                            <div class="view-product-img">
                                <img id="product-details-img" src="https://fakeimg.pl/250x100/">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="view-product-details">
                                <h5 id="product-details-header" class="h4 card-title">Paper Reams
                                    <span class="badge badge-soft-success ml-2">Available</span>
                                </h5>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Quantity</td>
                                        <td>Unit Price</td>
                                        <td>Unit Description</td>
                                    </tr>
                                    <tr id="product-details-main">
                                        <td>White</td>
                                        <td>NCR</td>
                                        <td>100</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div id="product-details-extra">
                                    <h5>SKU <b>35353</b></h5>
                                    <h5 class="h5">Price: <b>KSh 1050</b></h5>
                                    <h5>Avalilable Units: <b>KSh 10</b></h5>
                                    <hr>
                                    <h5 class="h4">Description:</h5>
                                    <p class="card-text">
                                        A4 printing Papers. White Gold
                                    </p>
                                </div>
                            </div>
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
<!-- End View Product Modal -->

<!-- Edit Product Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editModal">Edit Product</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="mb-3" action="/" id="edit-product-form">
                <div class="modal-body">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" name="name" type="text"
                                       placeholder="Product name" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <input id="description" class="form-control" name="description" type="text"
                                       placeholder="Description your product">
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="brand">Brand</label>
                                <input id="brand" class="form-control" name="brand" type="text"
                                       placeholder="Product brand">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" class="form-control" name="quantity" type="number"
                                       placeholder="Total quantity of products in stock" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="unit_description">Unit Description</label>
                                <input id="unit_description" class="form-control" name="unit_description"
                                       type="text" placeholder="Units in which the product is sold e.g Bundle/Ream"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="unit_price">Unit Price</label>
                                <input id="unit_price" class="form-control" name="unit_price" type="number"
                                       step="0.01"  placeholder="Price Per unit" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="sku">Product code/SKU</label>
                                <input id="sku" class="form-control" name="sku" type="text"
                                       placeholder="Unique product code">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="size">Size</label>
                                <input id="size" class="form-control" name="size" type="text"
                                       placeholder="Size/Weight Description of the product">
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <span class="form-label-text">Available</span>
                                <label class="d-flex align-items-center justify-content-between">

                                    <div class="form-toggle">
                                        <input id="available" name="available" type="checkbox" checked>
                                        <div class="form-toggle__item">
                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <input id="id" class="form-control" name="id" type="text" hidden required>
                </div>

                <div class="modal-footer">
                    <span data-dismiss="modal" class="mr-2" style="font-weight: 600; cursor: pointer;">Cancel</span>
                    <input type="submit" class="btn btn-primary pl-4 pr-4" value="Save changes" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Product Modal -->

<!-- Prepare Product Modal -->
<div class="modal fade" id="prepareModal" tabindex="-1" role="dialog" aria-labelledby="prepareModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="prepareModal">Prepare Product</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="mb-3"  id="prepare-product-form">
                <div class="modal-body">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="expenses">Expenses</label>
                                <input id="expenses" class="form-control" name="expenses" type="number"
                                       step="0.01" placeholder="Total expenses per unit">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="profit">Profit Margin</label>
                                <input id="profit" class="form-control" name="profit" type="number"
                                       step="0.01" placeholder="Enter Desired Profit margin per unit">
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" class="form-control" name="quantity" type="number"
                                       placeholder="Quantity of unit products to prepare">
                            </div>
                        </div>
                    </div>

                    <input type="text" name="product_id" id="product_id" hidden>

                </div>

                <div class="modal-footer">
                    <!-- Errors -->
                    <div>
                        <div id="modal-prepare-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                            <i class="fa fa-minus-circle alert-icon mr-3"></i>
                            <span></span>
                        </div>
                        <div id="modal-prepare-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                             role="alert">
                            <i class="fa fa-check-circle alert-icon mr-3"></i>
                            <span class="small">Successfully added the product</span>
                        </div>
                    </div>
                    <!-- End Errors -->
                    <div>
                        <span data-dismiss="modal" class="mr-2" style="font-weight: 600; cursor: pointer;">Cancel</span>
                        <input type="submit" class="btn btn-primary pl-4 pr-4" value="Confirm" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Prepare Product Modal -->

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="addProductModal">Add Product</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="mb-3" id="add-product-form" method="POST">
                <div class="modal-body">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" name="name" type="text"
                                       placeholder="Product name" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <input id="description" class="form-control" name="description" type="text"
                                       placeholder="Description your product">
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="brand">Brand</label>
                                <input id="brand" class="form-control" name="brand" type="text"
                                       placeholder="Product brand">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" class="form-control" name="quantity" type="number"
                                       placeholder="Total quantity of products in stock" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="unit_description">Unit Description</label>
                                <input id="unit_description" class="form-control" name="unit_description"
                                       type="text" placeholder="Units in which the product is sold e.g Bundle/Ream"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="unit_price">Unit Price</label>
                                <input id="unit_price" class="form-control" name="unit_price" type="number"
                                       step="0.01" placeholder="Price Per unit" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="sku">Product code/SKU</label>
                                <input id="sku" class="form-control" name="sku" type="text"
                                       placeholder="Unique product code">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="size">Size</label>
                                <input id="size" class="form-control" name="size" type="text"
                                       placeholder="Size/Weight Description of the product">
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="image">Image</label>
                                <input id="image" class="form-control" name="image" type="file" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <span class="form-label-text">Available</span>
                                <label class="d-flex align-items-center justify-content-between">

                                    <div class="form-toggle">
                                        <input id="available" name="available" type="checkbox" checked>
                                        <div class="form-toggle__item">
                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">

                    <!-- Errors -->
                    <div>
                        <div id="modal-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                            <i class="fa fa-minus-circle alert-icon mr-3"></i>
                            <span>Error: Failed to add product. Try again later</span>
                        </div>
                        <div id="modal-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                             role="alert">
                            <i class="fa fa-check-circle alert-icon mr-3"></i>
                            <span class="small">Successfully added the product</span>
                        </div>
                    </div>
                    <!-- End Errors -->
                    <div>
                            <span data-dismiss="modal" class="mr-2"
                                  style="font-weight: 600; cursor: pointer;">Cancel</span>
                        <input type="submit" class="btn btn-primary pl-4 pr-4" value="Add Product" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Product Modal -->

<script>
    $("#add-product-form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#add-product-form")[0]);
        $("#modal-success").addClass("d-none");
        $("#modal-errors").addClass("d-none");
        $.ajax({
            type: 'POST',
            url: "/willie-online-new/supplier/includes/add_product.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-success").removeClass('d-none');
                    $("#add-product-form")[0].reset();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    $("#modal-errors").removeClass('d-none');
                }
            }
        });
    })

    // Show product details modal
    function details(product_id) {
        $("#modal-details-errors").addClass('d-none');
        $.ajax({
            type: 'GET',
            url: `/willie-online-new/supplier/includes/get_product.php/?id=${product_id}`,
            processData: false,
            contentType: false,
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    product = res['data'];
                    $("#product-details-img").attr('src', `../upload/${product['image']}`);
                    $("#product-details-header").html(`
                        ${product['name']}
                        ${product['available'] ?
                        '<span class="badge badge-soft-success ml-2">Available</span>' :
                        '<span class="badge badge-soft-danger ml-2">Not Available</span>'
                    }`);
                    $("#product-details-main").html(`
                        <td>${product['quantity']}</td>
                        <td>KSh ${product['unit_price']}</td>
                        <td>${product['unit_description']}</td>
                    `);

                    $("#product-details-extra").html(`
                        ${product['sku'] ? `<h5>SKU <b>${product['sku']}</b></h5>` : ''}
                        ${product['color'] ? `<h5>Color <b>${product['color']}</b></h5>` : ''}
                        ${product['brand'] ? `<h5>Brand <b>${product['brand']}</b></h5>` : ''}
                        ${product['description'] ?
                        `<h5 class="h4">Description: <p class="card-text">
                                ${product['description']}</p></h5>` : ''}
                    `);
                } else {
                    $("#modal-details-errors").removeClass('d-none');
                }
            }
        });
        $("#detailsModal").modal("show");
    }


    $("#edit-product-form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#edit-product-form")[0]);
        $("#modal-edit-success").addClass("d-none");
        $("#modal-edit-errors").addClass("d-none");
        $.ajax({
            type: 'POST',
            url: "/willie-online-new/supplier/includes/edit_product.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-edit-success").removeClass('d-none');
                    $("#edit-product-form")[0].reset();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    $("#modal-edit-errors").removeClass('d-none');
                }
            }
        });
    });


    $("#prepare-product-form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#prepare-product-form")[0]);
        $("#modal-prepare-success").addClass("d-none");
        $("#modal-prepare-errors").addClass("d-none");
        $.ajax({
            type: 'POST',
            url: "/willie-online-new/supplier/includes/prepare_product.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-prepare-success").removeClass('d-none');
                    $("#prepare-product-form")[0].reset();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else if(res['error']) {
                    $("#modal-prepare-success").addClass("d-none");
                    $("#modal-prepare-errors").find("span").text(res['error']);
                    $("#modal-prepare-errors").removeClass('d-none');
                } else {
                    $("#modal-prepare-errors").find("span").text('Server Error. Failed to prepare product.');
                    $("#modal-prepare-errors").removeClass('d-none');
                }
            }
        });
    });


    function editProduct(product_id) {
        $.ajax({
            type: 'GET',
            url: `/willie-online-new/supplier/includes/get_product.php/?id=${product_id}`,
            processData: false,
            contentType: false,
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    product = res['data'];
                    $("#edit-product-form").find("#name").val(product['name']);
                    $("#edit-product-form").find("#id").val(product['id']);
                    $("#edit-product-form").find("#description").val(product['description']);
                    $("#edit-product-form").find("#brand").val(product['brand']);
                    $("#edit-product-form").find("#quantity").val(product['quantity']);
                    $("#edit-product-form").find("#unit_description").val(product['unit_description']);
                    $("#edit-product-form").find("#unit_price").val(product['unit_price']);
                    $("#edit-product-form").find("#sku").val(product['size']);
                    // $("#edit-product-form").find("#image").val(`../../upload/${product['image']}`);
                    if(product['available']) {
                        $("#edit-product-form").find("#available").attr('checked', 'true');
                    } else {
                        $("#edit-product-form").find("#available").attr('checked', '');
                    }

                } else {
                    $("#modal-edit-errors").removeClass('d-none');
                }
            }
        });
        $("#editModal").modal("show");

    }

    function prepareProduct(product_id) {
        $("#modal-prepare-success").addClass("d-none");
        $("#modal-prepare-errors").addClass("d-none");
        $("#prepare-product-form")[0].reset();
        $("#prepare-product-form").find("#product_id").val(product_id);
        $("#prepareModal").modal("show");
    }

    function deleteProduct(product_id) {
        if(confirm("Warning: This product will be deleted permanently")) {
            $.ajax({
                type: 'POST',
                url: "/willie-online-new/supplier/includes/delete_product.php",
                data: {'id': product_id},
                success: function (result) {
                    console.log(result);
                    res = JSON.parse(result);
                    if (res['success']) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        // $("#modal-prepare-errors").removeClass('d-none');
                    }
                }
            });
        }
    }
</script>
@endsection
