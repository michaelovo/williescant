$("#edit-sale-form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#edit-sale-form")[0]);
    $("#modal-edit-success").addClass("d-none");
    $("#modal-edit-errors").addClass("d-none");
    products = [];
    old_items = [];
    
    // Extract New Receipt Items
    for(var i=oldItemCount + 1; i< editFormsetCount + oldItemCount; i++) {
        receipt_item = {
            name: $("#edit-sale-form").find(`#edit_product_name_${i}`).val(),
            description: $("#edit-sale-form").find(`#edit_product_description_${i}`).val(),
            quantity: $("#edit-sale-form").find(`#edit_product_quantity_${i}`).val(),
            unit_price: $("#edit-sale-form").find(`#edit_product_unit_price_${i}`).val(),
        }
        products.push(receipt_item);

        formData.delete(`product_name_${i}`);
        formData.delete(`product_description_${i}`);
        formData.delete(`product_quantity_${i}`);
        formData.delete(`product_unit_price_${i}`);
    }

    // Extract existing receipt items(To be updatd only)
    for(var i=1; i < oldItemCount + 1; i++) {
        receipt_item = {
            name: $("#edit-sale-form").find(`#old_product_name_${i}`).val(),
            description: $("#edit-sale-form").find(`#old_product_description_${i}`).val(),
            quantity: $("#edit-sale-form").find(`#old_product_quantity_${i}`).val(),
            unit_price: $("#edit-sale-form").find(`#old_product_unit_price_${i}`).val(),
            id: $("#edit-sale-form").find(`#old_product_id_${i}`).val(),
        }
        old_items.push(receipt_item);

        formData.delete(`old_product_name_${i}`);
        formData.delete(`old_product_description_${i}`);
        formData.delete(`old_product_quantity_${i}`);
        formData.delete(`old_product_unit_price_${i}`);
        formData.delete(`old_product_id_${i}`);
    }
    parsedFormdata = {};
    for (var entry of formData.entries()) {
        parsedFormdata[entry[0]] = entry[1]; 
    }
    var id = $("name=['sale_id']").val();
    // console.log({...parsedFormdata, 'receipt_products':products, 'old_items': old_items});
    $.ajax({
        type: 'POST',
        url: `/williescant/supplier/sale/update/${id}`,
        data: {...parsedFormdata, 'receipt_products':products, 'old_items': old_items},      
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                $("#modal-edit-success").removeClass('d-none');
                $("#edit-sale-form")[0].reset();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else if(res['error']) {
                $("#modal-edit-success").addClass("d-none");
                $("#modal-edit-errors").find("span").text(res['error']);
                $("#modal-edit-errors").removeClass('d-none');   
            } else {
                $("#modal-edit-errors").find("span").text('Server Error. Failed to update sale.');
                $("#modal-edit-errors").removeClass('d-none');                    
            }
        }
    });
});