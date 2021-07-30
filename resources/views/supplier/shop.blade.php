@extends('layouts.app', ["page_title" => "Shop - WillieScant"])

    <!-- Header (Topbar) -->
@section('content')
@include('menu.supplier_nav')
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
@include('menu.sidebar')
        <!-- End Sidebar -->
 <div class="u-content">
            <div class="u-body">
                <h1 class="h2 font-weight-semibold mb-3">Prepared Products ({{count($prepared)}})</h1>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 products">
                                <div class="products-header row mt-3">
                                    <div class="form-group col-md-12 mb-0">
                                    <form action="{{route('search-prepared')}}"
                                            id="search-ready-form" method="GET">
                                    <div class="input-group mb-0">
                                            <input type="text" class="form-control" name="search" id="search" placeholder="Search for a product"
                                                aria-label="Search Products" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                                <hr class="mb-4 mt-3">


                                <div class="products-body">
                                    @foreach ($prepared as $product)
                                        <div class="product-card">
                                            <img src="{{asset($product->path)}}" alt="">
                                            <div class="product-info">
                                                <div class="product-name">Name: <b>{{$product->name}}</b></div>
                                                <div class="product-name">Code: <b>{{$product->code}}</b></div>
                                                <div class="product-name">Status: <b>{{$product->status}}</b></div>
                                                <div class="product-brand">Brand: <b>{{$product->brand}}</b></div>
                                                <div class="product-price">KSH: {{$product->selling_price}}</div>
                                                <div class="product-quantity">QTY: {{$product->prepared_quantity}}</div>
                                                @if ($product->description != null)
                                                <div class="product-quantity">Description: {{$product->description}}</div>                                                    
                                                @endif
                                                <div class="add-to-cart">
                                                    <a href="#" data-toggle="modal" onclick="editPreparedProduct({{$product->product_id}} , {{$product->ready_sale_id}})">
                                                        <button class="btn btn-sm btn-block btn-primary">EDIT</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
                                    step="0.01"  placeholder="Selling Price" required>
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

                    <div class="modal-footer justify-content-between">
                        <!-- Errors -->
                        <div>
                            <div id="modal-edit-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                                <i class="fa fa-minus-circle alert-icon mr-3"></i>
                                <span>Error: Failed to update prepared product. Try again later</span>
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
    <!-- End Edit Prepared Product Modal -->

<!-- Initialization  -->



<script>
    $('#edit-ready-form').submit(function(e){
        e.preventDefault();
        let formData = new FormData($("#edit-ready-form")[0]);
        $("#modal-edit-success").addClass("d-none");
        $("#modal-edit-errors").addClass("d-none");
        let id = $("#prepared_product_id").val();

        $.ajax({
            type: "POST",
            url: "/williescant/supplier/update-prepared/"+id,
            data: formData,
            processData: false,
            contentType: false,
    }).done(function(data){
        // console.log(data);
            if(data.status){
                $("#modal-edit-success").removeClass("d-none");
                setTimeout(()=>{
                    window.location.reload();
                }, 1000);
            } else {
                $("#modal-edit-success").addClass("d-none");
                $("#modal-edit-errors").find("span").text(data);
                $("#modal-edit-success").addClass("d-none");
            }
        }).fail(function(e){
            $("#modal-edit-errors").find("span").text("ServerError. Fail to prepare product.");
            $("#modal-edit-errors").removeClass("d-none");
        })
    })

    function editPreparedProduct(product_id,ready_product_id){
        $("#modal-edit-success").addClass("d-none");
        $("#modal-edit-errors").addClass("d-none");
        $("#edit-ready-form")[0].reset();

        $.ajax({
            type: 'GET',
            url: `/williescant/supplier/get-single-product/${ready_product_id}`,
            data: {'id': ready_product_id},
            processData: false,
            contentType: false
        }).done(function(data){
            if(data.status) {
                console.log(ready_product_id)
                console.log(data)
                let item = data.data;
                $("#edit-ready-form").find("#selling_price").val(item.selling_price);
                $("#edit-ready-form").find("#quantity").val(item.quantity);
            } else {
                $('#modal-edit-success').addClass('d-none');
                $('#modal-edit-errors').find('span').text(data.error);
                $('#modal-edit-errors').removeClass('d-none');
            }
        }).fail(function(data){
            $("#modal-edit-errors").find("span").text('Server Error.Failedto prepare product.');
            $("#modal-edit-errors").removeClass("d-none");
        });
        $("#edit-ready-form").find("#product_id").val(product_id);
        $("#edit-ready-form").find("#prepared_product_id").val(ready_product_id);
        $("#editPreparedProductModal").modal("show");
    }
</script>
@endsection
