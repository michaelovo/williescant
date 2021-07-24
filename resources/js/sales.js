
var formsetCount = 1;
var editFormsetCount = 1;
var oldItemCount = 1;
let d = new Date();
d = d.toISOString().substring(0,10);
$("#date").attr("max", d);

$("#add-item-formset").click(() => {
    formsetCount += 1;
    let addFormsetBtn = $("#add-item-formset");
    let formset = `
        <div class="form-row mb-2 receipt-item">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_name_${formsetCount}">Name</label>
                    <input id="product_name_${formsetCount}" class="form-control" name="receipt_items[${formsetCount}][product_name]" type="text"
                        placeholder="Product Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="product_description_${formsetCount}">Description</label>
                    <input id="product_description_${formsetCount}" class="form-control" name="receipt_items[${formsetCount}][product_description]"
                        type="text" placeholder="Product Description">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_quantity_${formsetCount}">Quantity</label>
                    <input id="product_quantity_${formsetCount}" class="form-control" name="receipt_items[${formsetCount}][product_quantity]" type="number"
                        placeholder="Product Qauntity" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_unit_price_${formsetCount}"">Unit Price</label>
                    <input id="product_unit_price_${formsetCount}"" class="form-control" name="receipt_items[${formsetCount}][product_unit_price]"
                    step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                </div>
            </div>
            <div class="col-md-6">
                <button type="button" onclick="removeFormset(Event, this, false)" 
                class="btn btn-sm btn-danger text-small remove-item-btn">Remove item ${formsetCount}</button>            
            </div>
            <div class="col-md-12 mt-2">
                <hr/>            
            </div>
        </div>
    `;
    $(formset).insertBefore(addFormsetBtn);
});

$("").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#add-sale-form")[0]);
    $("#modal-success").addClass("d-none");
    $("#modal-errors").addClass("d-none");
    products = [];
    
    // Extract Receipt Items
    for(var i=1; i<formsetCount + 1; i++) {
            var item_1;
            receipt_item = {
                name: $("#add-sale-form").find(`#product_name_${i}`).val(),
                description: $("#add-sale-form").find(`#product_description_${i}`).val(),
                quantity: $("#add-sale-form").find(`#product_quantity_${i}`).val(),
                unit_price: $("#add-sale-form").find(`#product_unit_price_${i}`).val(),
            }
            products.push(receipt_item);

            formData.delete(`product_name_${i}`);
            formData.delete(`product_description_${i}`);
            formData.delete(`product_quantity_${i}`);
            formData.delete(`product_unit_price_${i}`);
    }
    parsedFormdata = {};
    for (var entry of formData.entries()) {
        parsedFormdata[entry[0]] = entry[1]; 
    }

    $.ajax({
        type: 'POST',
        url: "/supplier/includes/add_sale.php",
        data: {...parsedFormdata, 'receipt_products':products},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            res = JSON.parse(result);
            if (res['success']) {
                $("#modal-success").removeClass('d-none');
                $("#add-sale-form")[0].reset();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else if(res['error']) {
                $("#modal-success").addClass("d-none");
                $("#modal-errors").find("span").text(res['error']);
                $("#modal-errors").removeClass('d-none');        
            } else {
                $("#modal-errors").find("span").text('Server Error. Failed to prepare product.');
                $("#modal-errors").removeClass('d-none');                        
            }
        }
    });
});

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
    // console.log({...parsedFormdata, 'receipt_products':products, 'old_items': old_items});
    $.ajax({
        type: 'POST',
        url: "/supplier/includes/edit_sale.php",
        data: {...parsedFormdata, 'receipt_products':products, 'old_items': old_items},
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
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

function saleDetails(sale_id) {
    $.ajax({
        type: 'GET',
        url: `/williescant/supplier/sale/${sale_id}`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {

            if (result.status = 'success') {
                let receipt_details = `
                <div class="col-3 mb-3 details-item">
                    <div class="details-title">
                        Receipt Number
                    </div>
                    <div class="details-value" id="details-receipt-number">
                        ${result.data.receipt_number}                          
                    </div>
                </div>

                <div class="col-3 mb-3 details-item">
                    <div class="details-title">
                        KRA PIN
                    </div>
                    <div class="details-value" id="details-pin">
                        ${result.data.pin }                       
                    </div>
                </div>

                <div class="col-3 mb-3 details-item">
                    <div class="details-title">
                        Customer Name
                    </div>
                    <div class="details-value" id="details-customer-name">
                        ${result.data.customer_name }                         
                    </div>
                </div>            

                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Item Count
                    </div>
                    <div class="details-value" id="details-item-count">
                       ${result.data.total_items}                        
                    </div>
                </div>  

                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Sub Total
                    </div>
                    <div class="details-value" id="details-sub-total">
                        ${result.data.sub_total}                         
                    </div>
                </div>
                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        VAT
                    </div>
                    <div class="details-value" id="details-vat">
                       ${result.data.vat}                          
                    </div>
                </div>

                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Total
                    </div>
                    <div class="details-value" id="details-total">
                        ${result.data.total_price}                          
                    </div>
                </div> 
                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Date
                    </div>
                    <div class="details-value" id="details-date">
                        ${result.data.date }                         
                    </div>
                </div>  
                <div class="col-3 mb-4 details-item">
                    <div class="details-title">
                        Time
                    </div>
                    <div class="details-value" id="details-time">
                        ${result.data.time }                         
                    </div>
                </div>                         
            `;
                var receipt_items = result.products;
                
                $("#receipt-details-row").html(receipt_details);
                if(!receipt_items) {
                    receipt_items = `<tr><td colspan="9" class="text-center">
                    <div class="alert alert-soft-secondary justify-content-center">No receipt items found!</div>
                    </td></tr>`;
                }

                let table_body = '';
                for (item in receipt_items){
                    table_body += `
                    <tr>
                        <td>${item.item_count}</td>
                        <td>${item.name}</td>
                        <td>${item.desc}</td>
                        <td>${item.quantity}</td>
                        <td>${item.unit_price}</td>
                    </tr>`; 
                    }

                $("#items-details-row").html(table_body);

                $("#saleDetailsModal").modal('show');
            } else {
                // $("#modal-errors").removeClass('d-none');
            }
        }
    });
}

function deleteSale(sale_id) {
    if(confirm("This sale receipt will be deleted permanently")) {
        $.ajax({
        type: 'POST',
        url: "/supplier/includes/delete_sale.php",
        data: {'sale_id': sale_id},
        // processData: false,
        // contentType: false,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
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
}

// Remove item formset
function removeFormset(e, formset, edit=false) {
    $(formset).parent().parent().remove();
    if(edit) {
        editFormsetCount -= 1;
        listEditItems();
    } else {
        formsetCount -= 1;
        listAddItems();
    }
}

// Edit sale receipt details
function editSale(sale_id) {
    $("#edit-receipt-items").html(
        `<button id="edit-item-formset" type="button" 
        class="btn btn-block btn-sm btn-secondary">Add another row</button>`);

        $("#edit-item-formset").click(() => {
            let addFormsetBtn = $("#edit-item-formset");
            let formset = `
                <div class="form-row mb-2 receipt-item">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit_product_name_${editFormsetCount}">Name</label>
                            <input id="edit_product_name_${editFormsetCount}" class="form-control" name="edit_product_name_${editFormsetCount}" type="text"
                                placeholder="Product Name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="edit_product_description_${editFormsetCount}">Description</label>
                            <input id="edit_product_description_${editFormsetCount}" class="form-control" name="edit_product_description_${editFormsetCount}"
                                type="text" placeholder="Product Description">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit_product_quantity_${editFormsetCount}">Quantity</label>
                            <input id="edit_product_quantity_${editFormsetCount}" class="form-control" name="edit_product_quantity_${editFormsetCount}" type="number"
                                placeholder="Product Qauntity" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit_product_unit_price_${editFormsetCount}"">Unit Price</label>
                            <input id="edit_product_unit_price_${editFormsetCount}"" class="form-control" name="edit_product_unit_price_${editFormsetCount}"
                            step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="removeFormset(Event, this, true)" 
                            class="remove-item-btn btn btn-sm btn-danger text-small">
                            Remove item ${editFormsetCount + oldItemCount}
                        </button>            
                    </div>
                    <div class="col-md-12 mt-2">
                        <hr/>            
                    </div>
                </div>
            `;
            listEditItems();
            $(formset).insertBefore(addFormsetBtn);
            editFormsetCount += 1;
        });

    $.ajax({
        type: 'GET',
        url: `/supplier/includes/get_sale.php/?sale_id=${sale_id}&edit=1`,
        statusCode: {
            401: function(response) {
                window.location.href = '/auth/logout.php';
            }
        },        
        success: function (result) {
            // console.log(result);
            res = JSON.parse(result);
            if (res['success']) {
                var receipt_details = res['receipt_details'];
                var supplier_details = res['supplier_details'];
                var receipt_items = res['receipt_items'];

                oldItemCount = Number(res['data']['total_items']);
                
                $("#edit-supplier-details").html(supplier_details)
                $("#edit-receipt-details").html(receipt_details)
                $(receipt_items).insertBefore($("#edit-item-formset"));

            } else {
                $("#modal-edit-errors").find('span').text('Failed to fetch receipt details try again later')
                $("#modal-edit-errors").removeClass('d-none');
            }
        }
    });    
    $("#editSaleModal").modal("show");
}

// Delete existing receipt item and remove formset.. 
function deleteItem(e, formset, item_id, receipt_id) {
    if(confirm('The item will be deleted permanently')) {
        $.ajax({
            type: 'POST',
            url: "/supplier/includes/delete_item.php",
            data: {'item_id':item_id, 'receipt_id': receipt_id, 'receipt_type': 'sale'},
            statusCode: {
                401: function(response) {
                    window.location.href = '/auth/logout.php';
                }
            },            
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-edit-success").removeClass('d-none');
                    $("#modal-edit-success").find('span').text('Item deleted succesfully');
                    oldItemCount -= 1;
                    $(formset).parent().parent().remove();
                    listEditItems();
                } else if(res['error']) {
                    $("#modal-edit-success").addClass("d-none");
                    $("#modal-edit-errors").find("span").text(res['error']);
                    $("#modal-edit-errors").removeClass('d-none');        
                } else {
                    $("#modal-edit-errors").find("span").text('Server Error. Failed to delete item.');
                    $("#modal-edit-errors").removeClass('d-none');                        
                }
            }
        });
    }
}

function listAddItems(){
    window.setTimeout(() => {
        let items = $("#add-sale-form").find($(".receipt-item"));
        console.log(items.length);
        let start = 1;
        for(const item of items) {
            $(item).find($("input[name ^='product_name']")).attr('id', `product_name_${start}`);
            $(item).find($("input[name ^='product_description']")).attr('id', `product_description_${start}`);
            $(item).find($("input[name ^='product_quantity']")).attr('id', `product_quantity_${start}`);
            $(item).find($("input[name ^='product_unit_price']")).attr('id', `product_unit_price_${start}`);
            $(item).find($(".remove-item-btn")).text(`Remove item ${start}`);
            start += 1;
        }
    }, 100);
}

function listEditItems(){
    window.setTimeout(() => {
        var items = $("#edit-sale-form").find($('.receipt-item'));
        var start = 1;
        for(var item of items) {
            $(item).find($("input[name ^='edit_product_name']")).attr('id', `edit_product_name_${start}`);
            $(item).find($("input[name ^='edit_product_description']")).attr('id', `edit_product_description_${start}`);
            $(item).find($("input[name ^='edit_product_quantity']")).attr('id', `edit_product_quantity_${start}`);
            $(item).find($("input[name ^='edit_product_unit_price']")).attr('id', `edit_product_unit_price_${start}`);
            $(item).find($(".remove-item-btn")).text(`Remove item ${start}`);
            start += 1;
        }
    }, 100);
}

// Handles next stepper form operation..
$("#add-sale-modal-btn").click(() => {
    $("#add-sale-form").trigger('reset');
    $("#add-sale-form").find('input').removeClass('is-invalid');
    // Deactivate details tabs first
    $("#add-receipt-details-tab").attr('data-toggle', '');
    $("#add-receipt-details-tab").css({cursor: 'not-allowed'});
    $("#add-modal-next").attr('current-tab', 'items');
    
    // Cleanup after previous modal close..
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-prev").addClass('d-none');
    $("#add-sale-submit").addClass('d-none');
    $("#add-receipt-items-tab").tab("show");

    $("#addSaleModal").modal("show");
});

// Handle prev tab navigation..
$("#add-modal-prev").click(() => {
    let targetTab = $("#add-modal-prev").attr("target_tab");
    $(targetTab).tab("show");
});

$("#add-modal-next").click(() => {
    var tab_valid = true;
    var currentTab = $("#add-modal-next").attr('current-tab');

    if(currentTab == 'items') {
        tab_valid = validateFormInputs("receipt_items");
        if(tab_valid) {
            $("#add-receipt-details-tab").attr('data-toggle', 'tab');
            $("#add-receipt-details-tab").css({cursor: 'pointer'});
            $("#add-modal-next").attr('current-tab', 'details');
            $("#add-receipt-details-tab").tab("show");
            
            // Control buttons changes..
            $("#add-modal-next").addClass('d-none');
            $("#add-modal-prev").attr('target_tab', '#add-receipt-items-tab');
            $("#add-modal-prev").removeClass('d-none');
            $("#add-sale-submit").removeClass("d-none");
        }
    }
});

// Listen to tab changes..
$("#add-receipt-items-tab").on('show.bs.tab', function(e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'items');
    $("#add-sale-submit").addClass('d-none');
    $("#add-modal-prev").addClass('d-none');
 });


 function validateFormInputs(form, markInvalid=true) {
     let tabValid = true;
     let formFields = $(`#${form}`).find('input[required]');
     for(let i = 0; i < formFields.length; i++) {
        if($(formFields[i]).val().length == 0) {
            if(markInvalid) {
                $(formFields[i]).addClass('is-invalid');
            }
            tabValid = false;
        } else {
            $(formFields[i]).removeClass('is-invalid');
        }
    }
    return tabValid;  
 }
