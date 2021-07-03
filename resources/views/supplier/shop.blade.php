


$supplier_id = $_SESSION['user_id'];
$error = '';
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $prepared = "
    SELECT p.id, p.name, p.description, p.quantity as product_quantity,
    p.image, r.id as ready_sale_id, r.selling_price, r.quantity as prepared_quantity
    FROM products p
    INNER JOIN ready_sale r
    ON p.id=r.product_id
    WHERE p.supplier_id='$supplier_id'";

    $search = $_GET['search'] ?? '';
    if($search) {
        $prepared = $prepared." AND p.name LIKE '%$search%' OR p.description LIKE '%$search%'";
    }


    if($result = mysqli_query($conn, $prepared)) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = 'Error: Failed to fetch prepared products. Try again later';
    }
}
?>

<body>
<!-- Header (Topbar) -->
<?php include "../templates/supplier_nav.php" ?>
<!-- End Header (Topbar) -->

<main class="u-main" role="main">
    <!-- Sidebar -->
<?php include "../templates/sidebar.php" ?>
<!-- End Sidebar -->

    <div class="u-content">
        <div class="u-body">
            <h1 class="h2 font-weight-semibold mb-3">Prepared Products (<?php echo sizeof($products) ?>)</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 products">
                            <div class="products-header row mt-3">
                                <div class="form-group col-md-12 mb-0">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
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
                                <?php
                                foreach($products as $product) {
                                    // print_r($product);
                                    $desc = '';
                                    if ($product['description']) {
                                        $desc = '<div class="product-description">Description: '.$product['description'].'</div>';
                                    }
                                    echo '
                                    <div class="product-card">
                                        <img src="../upload/'.$product['image'].'">
                                        <div class="product-info">
                                            <div class="product-name"><b>'.$product['name'].'</b></div>
                                            <div class="product-price">KSH '.$product['selling_price'].'</div>
                                            <div class="product-quantity">Quantity '.$product['prepared_quantity'].'</div>
                                            '.$desc.'
                                        </div>
                                        <div class="add-to-cart">
                                            <a data-toggle="modal" href="#" onclick="editPreparedProduct('.$product['id'].','.$product['ready_sale_id'].')">
                                                <button class="btn btn-sm btn-block btn-primary">EDIT</button>
                                            </a>
                                        </div>
                                    </div>
                                    ';
                                }
                                // } else {
                                //     echo '
                                //     <div>You have not prepared products yet.</div>
                                //     ';
                                // }
                                ?>
                            </div>
                        </div>
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
                                       placeholder="Selling Price" required>
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

                <div class="modal-footer">
                    <!-- Errors -->
                    <div>
                        <div id="modal-edit-errors" class="alert alert-danger fade show d-none mb-0 w-100" role="alert">
                            <i class="fa fa-minus-circle alert-icon mr-3"></i>
                            <span></span>
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

</body>
<?php
include '../templates/body.php';
?>

<script>
    $("#edit-ready-form").submit(function(e) {
        e.preventDefault();
        console.log($("#edit-ready-form")[0]);
        var formData = new FormData($("#edit-ready-form")[0]);
        $("#modal-edit-success").addClass("d-none");
        $("#modal-edit-errors").addClass("d-none");
        $.ajax({
            type: 'POST',
            url: "/willie-online-new/supplier/includes/edit_prepared_product.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-edit-success").removeClass("d-none");
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else if(res['error']) {
                    $("#modal-edit-success").addClass("d-none");
                    $("#modal-edit-errors").find("span").text(res['error']);
                    $("#modal-edit-errors").removeClass('d-none');
                    // $("#modal-prepare-errors").removeClass('d-none');
                }else {
                    $("#modal-edit-errors").find("span").text('Server Error. Failed to prepare product.');
                    $("#modal-edit-errors").removeClass('d-none');
                }
            }
        });
    })
    function editPreparedProduct(product_id, ready_product_id) {
        $("#modal-edit-success").addClass("d-none");
        $("#modal-edit-errors").addClass("d-none");
        $("#edit-ready-form")[0].reset();
        $("#edit-ready-form").find("#product_id").val(product_id);
        $("#edit-ready-form").find("#prepared_product_id").val(ready_product_id);
        $("#editPreparedProductModal").modal("show");
    }
</script>
