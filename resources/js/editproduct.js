$(function() {
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
});
