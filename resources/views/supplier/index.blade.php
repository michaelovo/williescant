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
                    <div class="controls">
                        <button class="btn btn-sm btn-outline-primary" data-toggle="modal" href="#" onclick="addProduct()">
                            <i class="fa fa-plus"></i>
                            Add Product
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" href="#" onclick="openImportPurchaseModal()">
                            <i class="fas fa-file-import"></i>
                            Import Product
                        </button>                       
                    </div>                 
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table_dt">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">sku</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                            <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->code}}</td>
                                            <td>{{$product->state}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->unit_price}}</td>
                                            <td>
                                                @if ($product->available)
                                                    <div class="badge badge-soft-success">Yes</div>
                                                @else
                                                    <div class="badge badge-soft-danger">No</div>
                                                @endif
                                            </td>
                                            <td>{{$product->sku}}</td>
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
                                                                data-toggle="modal" href="#" onclick="details('{{$product->id}}')">
                                                                <i class="fa fa-eye mr-3"></i>Details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                data-toggle="modal" href="#" onclick="prepareProduct('{{$product->id}}')">
                                                                <i class="fa fa-cog mr-3"></i>Prepare
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                data-toggle="modal" href="#" onclick="editProduct('{{$product->id}}')">
                                                                <i class="fa fa-edit mr-3"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="d-flex align-items-center text-danger link-muted py-2 px-3"
                                                                href="#!" onclick="deleteProduct('{{$product->id}}')">
                                                                <i class="fa fa-trash mr-3"></i>Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            </tr>                                        
                                    @endforeach


                                </tbody>
                                </tbody>
                            </table>
                        </div>
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
                                    <img id="product-details-img" src="#">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="view-product-details">
                                    <h5 id="product-details-header" class="h4 card-title">
                                        <span class="badge badge-soft-success ml-2"></span>
                                    </h5>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Brand</td>
                                                <td>Color</td>
                                                <td>Size/Weight</td>
                                                <td>Unit Description</td>
                                            </tr>
                                            <tr id="product-details-main">
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
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="name" class="required-label">Name</label>
                                    <input id="name" class="form-control" name="name" type="text"
                                        placeholder="Product name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="description">Description</label>
                                    <input id="description" class="form-control" name="description" type="text"
                                        placeholder="Description your product">
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="brand">Brand</label>
                                    <input id="brand" class="form-control" name="brand" type="text"
                                        placeholder="Product brand">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="quantity" class="required-label">Quantity</label>
                                    <input id="quantity" class="form-control" name="quantity" type="number"
                                        placeholder="Total quantity of products in stock" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="unit_description" class="required-label">Unit Description</label>
                                    <input id="unit_description" class="form-control" name="unit_description"
                                        type="text" placeholder="Units in which the product is sold e.g Bundle/Ream"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="unit_price" class="required-label">Unit Price</label>
                                    <input id="unit_price" class="form-control" name="unit_price" type="number"
                                    step="0.01"  placeholder="Price Per unit" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="size">Size</label>
                                    <input id="size" class="form-control" name="size" type="text"
                                        placeholder="Size/Weight Description of the product">
                                </div>
                            </div>                        
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <span class="form-label-text">Available</span>
                                    <label class="d-flex align-items-center justify-content-between">

                                        <div class="form-toggle">
                                            <input id="available" name="available" type="checkbox">
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="edit-image">Image</label>
                                    <input id="edit-image" class="form-control" name="images" multiple type="file">                                
                                    
                                    <div class="form-row" id="edit-image-preview__container">
                                    </div>        
                                    <div class="form-row" id="edit-image-preview__container__old">
                                    </div>                                                                   
                                </div>                    
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="color">Color</label>
                                    <input id="color" class="form-control" name="color" type="text"
                                        placeholder="Color of the product">
                                </div> 
                            </div>                                                      
                        </div>                        
                        <input id="id" class="form-control" name="id" type="text" hidden required>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="modal-edit-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span>Server Error: Failed to update product. Try again later</span>
                            </div>
                            <div id="modal-edit-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                                role="alert">
                                <i class="fa fa-check-circle alert-icon mr-3"></i>
                                <span class="small">Successfully updated the product</span>
                            </div>
                        </div>
                        <!-- End Errors -->   
                        <div>
                            <span data-dismiss="modal" class="mr-2" style="font-weight: 600; cursor: pointer;">Cancel</span>
                            <input type="submit" class="btn btn-primary pl-4 pr-4" value="Update Product" />
                        </div>                 
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

                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="modal-prepare-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span>Error: Failed to prepare product. Try again later</span>
                            </div>
                            <div id="modal-prepare-success" class="alert alert-soft-success d-none fade mb-0 w-100 show"
                                role="alert">
                                <i class="fa fa-check-circle alert-icon mr-3"></i>
                                <span class="small">Successfully prepared the product</span>
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
                <form class="mb-3" id="add-product-form" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="add-name" class="required-label">Name</label>
                                    <input id="add-name" class="form-control" name="name" type="text"
                                        placeholder="Product name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="add-description">Description</label>
                                    <input id="add-description" class="form-control" name="description" type="text"
                                        placeholder="Description your product">
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="add-brand">Brand</label>
                                    <input id="add-brand" class="form-control" name="brand" type="text"
                                        placeholder="Product brand">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="add-quantity" class="required-label">Quantity</label>
                                    <input id="add-quantity" class="form-control" name="quantity" type="number"
                                        placeholder="Total quantity of products in stock" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="add-unit_description" class="required-label">Unit Description</label>
                                    <input id="add-unit_description" class="form-control" name="unit_description"
                                        type="text" placeholder="Units in which the product is sold e.g Bundle/Ream"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="add-unit_price" class="required-label">Unit Price</label>
                                    <input id="add-unit_price" class="form-control" name="unit_price" type="number"
                                    step="0.01" placeholder="Price Per unit" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="add-color">Color</label>
                                    <input id="add-color" class="form-control" name="color" type="text"
                                        placeholder="Color of the product">
                                </div> 
                            </div>                        
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="add-category" class="required-label">Category</label>
                                    <select class="form-control" name="category_id" id="add-category" required>
                                        <option value="" disabled selected>Select a category</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <span for="add-available" class="form-label-text">Available</span>
                                    <label class="d-flex align-items-center justify-content-between">

                                        <div class="form-toggle">
                                            <input id="add-available" name="available" type="checkbox">
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>                                                        
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">

                                     <label for="add-image" class="required-label">Image</label>
                                    <input id="add-image" class="form-control" name="images" type="file" multiple required>
                                    
                                    <div class="form-row" id="add-image-preview__container">
                                        <div class="card form-group col-md-6 mt-2 d-none">
                                            <div class="card-body d-flex flex-column">
                                                <img src="#" id="add-image-preview__item" alt="Product Image" height="75" width="100%">
                                                <button class="btn btn-sm btn-outline-danger mt-1" type="button" id="add-img-remove">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>                                    
                                    </div> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="add-size">Size</label>
                                    <input id="add-size" class="form-control" name="size" type="text"
                                        placeholder="Size/Weight Description of the product">
                                </div>                          
                            </div>
                        </div>                        
                    </div>

                    <div class="modal-footer justify-content-between">

                        <!-- Errors -->
                        <div>
                            <div id="modal-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span>Server Error: Failed to add product. Try again later</span>
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

    <!-- Import Purchase Modal -->
    <div class="modal fade" id="importProductModal" tabindex="-1" role="dialog" aria-labelledby="importProductModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addProductModal">Import Purchase Items</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mb-3" id="add-product-form" method="POST">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="items-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Receipt Number</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="items-table-body">
                                </tbody>
                            </table>
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
                                style="font-weight: 600; cursor: pointer;">Close</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Import Purchase Modal --> 
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
<script>

// handle image
    oldImageCount = 1;
    $(document).ready(function(){
        $('#edit-image').attr("oldImgCount", oldImageCount);

        $('#add-image').change(function(e) {
            let target = e.target;
            let imagePreviewContainer = $('#add-image-preview__container');
            imagesPreview(e.target, imagePreviewContainer, "add");
        });

        $('#edit-image').change(function(e) {
            let target = e.target;
            let imagePreviewContainer = $('#edit-image-preview__container');
            imagesPreview(e.target, imagePreviewContainer, 'edit');
        });

        // submit new product
        $('#add-product-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData($('#add-product-form')[0]);
            for (const entry of formData.entries()) {
                if(entry[0] == 'images') {
                    formData.delete(entry[0]);
                }
            }

            let images = document.getElementById('add-image').files;
            let filesLength = images.length;
            for (let i = 0; i < filesLength; i++) {
               if(images[i]['isvalid'] !== false) {
                   formData.append('images[]',images[i]);
               }
            }

            $('#modal-success').addClass('d-none');
            $('#modal-errors').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{route('add-product')}}",
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(data) {
                $('#modal-success').removeClass('d-none');
                $('#add-product-form')[0].reset();
                setTimeout(() => {
                    window.location.reload();
                }, 1000)
            }).fail(function(data){
                $('#modal-errors').removeClass('d-none');
            });
        });

        $('#edit-product-form').submit(function(e){
            e.preventDefault();

            let formData = new FormData($('#edit-product-form')[0]);
            for (const entry of formData.entries()) {
                if(entry[0] == 'images') {
                    formData.delete(entry[0]);
                }
            }

            let images = document.getElementById('edit-image').files;
            let id = $('#id').val();
            console.log(images)
            let filesLength = images.length;
            for (let i = 0; i < filesLength; i++) {
                if(images[i]['isvalid'] !== false) {
                    formData.append('images[]', images[i]);
                }
            }

            $.ajax({
                type: 'POST',
                url: `/williescant/supplier/product/update/${id}`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(data){
                console.log(data)
                if(data.status){
                $('#modal-edit-success').removeClass('d-none');
                $('#edit-product-form')[0].reset();
                setTimeout(()=> {
                    window.location.reload();
                }, 1000);  
                }else {
                $('#modal-edit-errors').find('span').text("Error: Failed to update product. Try again later");
                $('#modal-edit-errors').removeClass('d-none');
                }

            }).fail(function(data){
                $('#modal-edit-errors').find('span').text(data);
                $('#modal-edit-errors').removeClass('d-none');
            });
        });

        // prepare product 
        $('#prepare-product-form').submit(function(e){
            e.preventDefault();

            let formData = new FormData($('#prepare-product-form')[0]);
            $('#modal-prepare-success').addClass('d-none');
            $('#modal-prepare-errors').addClass('d-none');
            let product_id = $('#product_id').val();
            $.ajax({
                type: 'POST',
                url: `/williescant/supplier/prepared-product/${product_id}`,
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(data) {
                if(data.success) {
                $('#modal-prepare-success').removeClass('d-none');
                $('#prepare-product-form')[0].reset();
                setTimeout(()=>{
                    window.location.reload();
                },1000)                    
                } else {
                    console.log(data)
                $('#modal-prepare-errors').find('span').text(data.message);
                $('#modal-prepare-errors').removeClass('d-none');
                }

            }).fail(function(data) {
                $('#modal-prepare-errors').find('span').text(data);
                $('#modal-prepare-errors').removeClass('d-none');
            });
        });

    });

    // image preview
    let imagesPreview = function (input, previewContainer, type, previewDimensions=null) {
        $(previewContainer).html(``);
        if(input.files){
            let action = type == 'add'?'deleteImageBtn':'deleteEditImageBtn';
            let filesAmount = input.files.length;
            for(i = 0; i < filesAmount; i++){
                let reader = new FileReader();
                let count = 0;
                let file = input.files[i];
                reader.onload = function(event){
                    let imgContainer = $($.parseHTML(`<div class="card form-group col-md-5 mr-1 mt-2"></div>`));
                    let height = 75;
                    let width = "100%";
                    if(previewDimensions){
                        width = previewDimensions.width;
                        height = previewDimensions.height;
                    }
                    var image = $($.parseHTML(`<img alt="${file['name']}" id="${action}-image-preview__item" height="${height}" width="${width}">`)).attr('src', event.target.result);
                    image.appendTo($(imgContainer));

                    let deleteBtn = $($.parseHTML(
                        `<button class="btn btn-sm btn-outline-danger mt-1 ${action}" img-name="${file['name']} type="button">Remove</button>`
                    )).attr('data-id',count);
                    deleteBtn.appendTo(imgContainer);

                    imgContainer.appendTo(previewContainer);
                    count += 1;
                };
                reader.readAsDataURL(input.files[i]);
                input.files[i]['isvalid'] = true;
            }
        }
    }
    // show product details modal
    function details(product_id) {
        $('#modal-details-errors').addClass('d-none');
        $.ajax({
            type: 'GET',
            url: '/williescant/supplier/product/get-product/'+product_id,
            processData: false,
            contentType: false,
        }).done(function(data) {
            let product = data.product;
            let images = data.images;
            console.log(images[0].image)
            $('#product-details-img').attr('src', `{{asset('${images[0].image}')}}`);
            $('#product-details-header').html(`
                ${product.name}
                ${parseInt(product.available) ? '<span class="badge badge-soft-success ml-2">Available</span>': '<span class="badge badge-soft-danger ml-2">Not Available</span>'}
            `);

            $('#product-details-main').html(`
                <td>${product.brand ? product.brand : 'N/A'}</td>
                <td>${product.color ? product.color : 'N/A'}</td>
                <td>${product.size ? product.size : 'N/A'}</td>
                <td>${product.unit_description ? product.unit_description : 'N/A'}</td>
            `);

            $('#product-details-extra').html(`
                <h5>SKU: <b>${product.sku}</b></h5>
                <h5>Name: <b>${product.name}</b></h5>
                <h5>Quantity: <b>${product.quantity}</b></h5>
                ${ product.description ? `<h5 class="h4">Description: <p class="card-text">${product.description}</p></h5>`: 'N/A'}
            `);
        }).fail(function(data){
            $('#modal-details-errors').removeClass('d-none');
        });
        $('#detailsModal').modal('show');
    }

    function editProduct(product_id) {
        $.ajax({
            type: 'GET',
            url: '/williescant/supplier/edit/'+product_id,
            processData: false,
            contentType: false,
        }).done(function(data) {
            let product = data.product;
            let images = data.images;

            $('#edit-product-form').find('#name').val(product.name);
            $('#edit-product-form').find('#id').val(product.id);
            $('#edit-product-form').find('#description').val(product.description);
            $('#edit-product-form').find('#brand').val(product.brand);
            $('#edit-product-form').find('#quantity').val(product.quantity);
            $('#edit-product-form').find('#unit_description').val(product.unit_description);
            $('#edit-product-form').find('#unit_price').val(product.unit_price);
            $('#edit-product-form').find('#size').val(product.size);
            $('#edit-product-form').find('#color').val(product.color);
            $('#edit-product-form').find('#sku').val(product.sku);

            if(images) {
                let previewContainer = $("#edit-image-preview__container__old");
                previewContainer.html('');
                oldImageCount  = images.length;
                for (const image of images) {
                    console.log(image)
                    previewContainer.append(`
                        <div class="card form-group col-md-5 mr-1 mt-2">
                            <img alt="${product.name}" src="{{asset('${image.image}')}}" id="edit-preview__item" height="75" width="100%">
                            <button class="btn btn-sm btn-outline-danger mt-1" onclick="deleteImage(this, ${image.id}, ${product.id})" image_name="${image.image}" type="button">
                                REMOVE
                            </button>
                        </div>
                    `);
                }
            } else {
                $('#edit-product-form').find('#edit-img-card').addClass('d-none');
            }

            if(parseInt(product.available)) {
                $('#edit-product-form').find('#available').attr('checked', true);
            }

            $('#modal-edit-success').addClass('d-none');
            $('#modal-edit-errors').addClass('d-none');
            $('#editModal').modal('show');
        }).fail(function(data){
            alert('Failed to fetch product details. Try again later');
        })
    }
// prepare products

function prepareProduct(product_id) {
    $.ajax({
        type: 'post',
        url: `/williescant/supplier/prepared-product/${product_id}`,
        data: {'product_id': product_id, 'is_preprared': 1}
    }).done(function(data) {
        if(data.exists){
            alert('product is already prepared. Proceed to edit ready product at the shop tab');
        } else {
            $('#modal-prepare-success').addClass('d-none');
            $('#modal-prepare-errors').addClass('d-none');
            $('#prepare-product-form')[0].reset();
            $('#prepare-product-form').find('#product_id').val(product_id);
            $('#prepareModal').modal('show');
        }
    }).fail(function(data){
        alert(data);
    });
}

// delete product
function deleteProduct(product_id){
    if(confirm("Warning: This product will be deleted permanently")) {
        $.ajax({
            type: 'POST',
            url: `/williescant/supplier/delete/${product_id}`,
        }).done(function(data) {
            setTimeout(()=> {
                window.location.reload();
            }, 1000);
        }).fail(function(data){
            alert(data);
        })
    }
}

// open import purchase modal
function openImportPurchaseModal(){
    $.ajax({
        type: 'GET',
        url: "{{route('import-purchase')}}",
    }).done(function(data){
        console.log(data);
        $('#items-table-body').html(data.markup);
        $('#items-table').DataTable();
        $('#importProductModal').modal('show');
    }).fail(function(data){
        alert(data)
    })
}

// import purchase
function importPurchase(item_id) {
    $.ajax({
        type: 'POST',
        url: "{{route('add-purchase')}}",
        data: {'item_id': item_id}
    }).done(function(data){
        setTimeout(()=>{
            window.location.reload();
        }, 500);
    }).fail(function(data){
        alert(data)
    });
}

// delete image
function deleteImage(image, image_id, product_id){
    let imageName = $(image).attr('image_name')
    if(oldImageCount <= 1) {
        alert("Fail: Save atleast one other product image to delete this image. A product cannot have zero images")
    } else {
        if(confirm("This image will be deleted permanently")) {
            $.ajax({
                type: 'POST',
                url: "{{route('delete-image')}}",
                data: {
                    'id': product_id,
                    'delete_image': true,
                    'image_id': image_id,
                    'image_name': imageName
                }
            }).done(function(data){
                oldImageCount -= 1;
                $('#edit-image').attr('oldImgCount', oldImageCount);
                $(image).parent().remove();
                // setTimeout(()=>{
                //     window.location.reload();
                // }, 500);
            }).fail(function(data){
                alert(data)
            })
        }
    }
}

// Load add product modal
function addProduct() {
    $.ajax({
        type: 'GET',
        url: "{{route('get-category')}}"
    }).done(function(data){
        let addCategoryContainer = $('#add-category');

        for (let category of data) {
            addCategoryContainer.append(`
                <option value="${category.id}">${category.name}</option>
            `);
        }
        $('#addProductModal').modal("show");
    }).fail(function(data){
        alert('Error: Fail to retrieve product categories. Try again later')
    })
}

// Re-submit product for approval

function reSubmitProduct(product_id) {
    if(confirm("This product will be re-submitted for approval")) {
        $.ajax({
            type: "POST",
            url: "{{ route('add-product')}}",
            data: {'id': product_id}
        }).done(function(data){
            setTimeout(()=>{
                window.location.reload();
            }, 1000)
        }).fail(function(data){
            alert("Error: Failed to re submit product. Try again later")
        })
    }
}

</script>
@endsection
