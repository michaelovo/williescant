$(document).ready(function () {
    var formsetCount = 1;
    var editFormsetCount = 1;
    var oldItemCount = 1;

    let d = new Date();
    d = d.toISOString().substring(0,10);
    $("#date").attr("max", d);

    $(".add-item-formset").click(() => {
        formsetCount += 1;
        let addFormsetBtn = $(".add-item-formset");
        let formset = `
        <div class="form-row mb-2 receipt-item">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_name_${formsetCount}">Name</label>
                    <input id="product_name_${formsetCount}" class="form-control" name="product_name_${formsetCount}" type="text"
                        placeholder="Product Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="product_description_${formsetCount}">Description</label>
                    <input id="product_description_${formsetCount}" class="form-control" name="product_description_${formsetCount}"
                        type="text" placeholder="Product Description">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_quantity_${formsetCount}">Quantity</label>
                    <input id="product_quantity_${formsetCount}" class="form-control" name="product_quantity_${formsetCount}" type="number"
                        placeholder="Product Qauntity" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="required-label" for="product_unit_price_${formsetCount}"">Unit Price</label>
                    <input id="product_unit_price_${formsetCount}"" class="form-control" name="product_unit_price_${formsetCount}"
                    step="0.01" type="number" placeholder="Unit Price(Price of a single item)" required>
                </div>
            </div>
            <div class="col-md-6">
                <button type="button" onclick="removeFormset(Event, this, false)"
                    class="btn btn-sm btn-danger remove-item-btn text-small">Remove item ${formsetCount}</button>
            </div>
            <div class="col-md-12 mt-2">
                <hr/>
            </div>
        </div>`;
        $(formset).insertBefore(addFormsetBtn);
    });

    $("#edit-purchase-form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#edit-purchase-form")[0]);
        $("#modal-edit-success").addClass("d-none");
        $("#modal-edit-errors").addClass("d-none");

        // Extract New Receipt Items
        for(var i=oldItemCount + 1; i<editFormsetCount + oldItemCount; i++) {
            receipt_item = {
                name: $("#edit-purchase-form").find(`#edit_product_name_${i}`).val(),
                description: $("#edit-purchase-form").find(`#edit_product_description_${i}`).val(),
                quantity: $("#edit-purchase-form").find(`#edit_product_quantity_${i}`).val(),
                unit_price: $("#edit-purchase-form").find(`#edit_product_unit_price_${i}`).val(),
            }
            formData.append("receipt_products[]", JSON.stringify(receipt_item));

            formData.delete(`edit_product_name_${i}`);
            formData.delete(`edit_product_description_${i}`);
            formData.delete(`edit_product_quantity_${i}`);
            formData.delete(`edit_product_unit_price_${i}`);
        }

        // Extract existing receipt items(To be updatd only)
        for(var i=1; i < oldItemCount + 1; i++) {
            receipt_item = {
                name: $("#edit-purchase-form").find(`#old_product_name_${i}`).val(),
                description: $("#edit-purchase-form").find(`#old_product_description_${i}`).val(),
                quantity: $("#edit-purchase-form").find(`#old_product_quantity_${i}`).val(),
                unit_price: $("#edit-purchase-form").find(`#old_product_unit_price_${i}`).val(),
                id: $("#edit-purchase-form").find(`#old_product_id_${i}`).val(),
            }
            formData.append("old_items[]", JSON.stringify(receipt_item));

            formData.delete(`old_product_name_${i}`);
            formData.delete(`old_product_description_${i}`);
            formData.delete(`old_product_quantity_${i}`);
            formData.delete(`old_product_unit_price_${i}`);
            formData.delete(`old_product_id_${i}`);
        }

        var images = document.getElementById('edit-image').files;
        var filesLength = images.length;
        for (var i = 0; i < filesLength; i++) {
            if (images[i]['isvalid'] !== false) {
                formData.append("images[]", images[i]);
            }
        }
        for (var entry of formData.entries()) {
            if (entry[0] == 'images') {
                formData.delete(entry[0]);
            }
        }
        $.ajax({
            type: 'POST',
            url: "/supplier/includes/edit_purchase.php",
            data: formData,
            processData: false,
            contentType: false,
            statusCode: {
                401: function(response) {
                    window.location.href = '/auth/logout.php';
                }
            },
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-edit-success").removeClass('d-none');
                    $("#edit-purchase-form")[0].reset();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else if(res['error']) {
                    $("#modal-edit-success").addClass("d-none");
                    $("#modal-edit-errors").find("span").text(res['error']);
                    $("#modal-edit-errors").removeClass('d-none');
                } else {
                    $("#modal-edit-errors").find("span").text('Server Error. Failed to update purchase.');
                    $("#modal-edit-errors").removeClass('d-none');
                }
            }
        });
    });

    $("#add-purchase-form").submit(function (e) {
        // console.log("Submitting");
        $(".loading").removeClass("d-none");
        e.preventDefault();
        var formData = new FormData($("#add-purchase-form")[0]);
        $("#modal-success").addClass("d-none");
        $("#modal-errors").addClass("d-none");

        // Extract Receipt Items
        for(var i=1; i<formsetCount + 1; i++) {
            receipt_item = {
                name: $("#add-purchase-form").find(`#product_name_${i}`).val(),
                description: $("#add-purchase-form").find(`#product_description_${i}`).val(),
                quantity: $("#add-purchase-form").find(`#product_quantity_${i}`).val(),
                unit_price: $("#add-purchase-form").find(`#product_unit_price_${i}`).val(),
            }
            formData.append("receipt_products[]", JSON.stringify(receipt_item));

            formData.delete(`product_name_${i}`);
            formData.delete(`product_description_${i}`);
            formData.delete(`product_quantity_${i}`);
            formData.delete(`product_unit_price_${i}`);
        }

        var images = document.getElementById('add-image').files;
        var filesLength = images.length;
        for (var i = 0; i < filesLength; i++) {
            if (images[i]['isvalid'] !== false) {
                formData.append("images[]", images[i]);
            }
        }
        for (var entry of formData.entries()) {
            if (entry[0] == 'images') {
                formData.delete(entry[0]);
            }
        }
        $.ajax({
            type: 'POST',
            url: "/supplier/includes/add_purchase.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    $("#modal-success").removeClass('d-none');
                    $("#add-purchase-form")[0].reset();
                    $(".loading").addClass("d-none");
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                    Swal.fire({
                        'icon': 'success',
                        'text': 'Receipt added',
                        'timer': 1000
                    });
                } else if(res['error']) {
                    $("#modal-success").addClass("d-none");
                    $("#modal-errors").find("span").text(res['error']);
                    $("#modal-errors").removeClass('d-none');
                    $(".loading").addClass("d-none");
                    Swal.fire({
                        'icon': 'error',
                        'text': res['error'],
                        'timer': 1000
                    });
                } else {
                    $(".loading").addClass("d-none");
                    Swal.fire({
                        'icon': 'error',
                        'text': ' Server Error. Failed to add receipt',
                        'timer': 1000
                    });
                    $("#modal-errors").find("span").text('Server Error. Failed to add receipt.');
                    $("#modal-errors").removeClass('d-none');
                }
            },
            error: function(err){
                $(".loading").addClass("d-none");
                Swal.fire({
                    'icon': 'error',
                    'text': ' Error: Could not search for existing supplier details',
                    'timer': 1000
                });
            }
        });
    });

    function searchPin(pin, target) {
        $.ajax({
            type: `williescant/supplier/purchase/search/${pin}`,
            statusCode: {
                401: function(response) {
                    window.location.href = '/auth/logout.php';
                }
            },
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    var data = res['data'];
                    if(target == 'add') {
                        Swal.fire({
                            title: `Existing details for supplier with that pin found.`,
                            text: "Click confirm to autofill these details",
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: `Confirm`,
                            cancelButtonText: 'Cancel',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#add-purchase-form").find("#supplier_name").val(data['supplier_name']);
                                $("#add-purchase-form").find("#phone").val(data['phone']);
                                $("#add-purchase-form").find("#email").val(data['email']);
                                $("#add-purchase-form").find("#website").val(data['website']);
                                $("#add-purchase-form").find("#location").val(data['location']);
                            }
                        });
                    } else {
                        Swal.fire({
                            title: `Existing details for supplier with that pin found.`,
                            text: "Click confirm to autofill these details",
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: `Confirm`,
                            cancelButtonText: 'Cancel',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#edit-purchase-form").find("#edit-supplier_name").val(data['supplier_name']);
                                $("#edit-purchase-form").find("#edit-phone").val(data['phone']);
                                $("#edit-purchase-form").find("#edit-email").val(data['email']);
                                $("#edit-purchase-form").find("#edit-website").val(data['website']);
                                $("#edit-purchase-form").find("#edit-location").val(data['location']);
                            }
                        });
                    }
                } else {
                }
            },
            error: function(err) {
                Swal.fire({
                    'icon': 'error',
                    'text': ' Error: Could not search for existing supplier details',
                    'timer': 5000
                });
            }
        });
    }

    $("#pin").on('focusout', () => {
        searchPin($('#pin').val(), 'add');
    });

    function purchaseDetails(purchase_id) {
        $.ajax({
            type: 'GET',
            url: `/supplier/includes/get_purchase.php/?purchase_id=${purchase_id}`,
            statusCode: {
                401: function(response) {
                    window.location.href = '/auth/logout.php';
                }
            },
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    var receipt_details = res['receipt_details'];
                    var supplier_details = res['supplier_details'];
                    var receipt_items = res['receipt_items'];
                    var receipt_images = res['images'];

                    $("#supplier-details-row").html(supplier_details)
                    $("#receipt-details-row").html(receipt_details)

                    if(!receipt_items) {
                        receipt_items = `<tr><td colspan="9" class="text-center">
                    <div class="alert alert-soft-secondary justify-content-center">No receipt items found!</div>
                    </td></tr>`;
                    }
                    $("#items-details-row").html(receipt_items)

                    if(!receipt_images) {
                        receipt_images = `<div class="alert mx-4 text-center w-100 alert-warning">No receipt images found!</div>`;
                    }
                    $("#receipt_images_container").html(receipt_images)

                    $("#purchaseDetailsModal").modal('show');
                } else {
                    // $("#modal-errors").removeClass('d-none');
                }
            }
        });
    }

    function deletePurchase(purchase_id) {
        if(confirm("This purchase receipt will be deleted permanently")) {
            $.ajax({
                type: 'POST',
                url: "/supplier/includes/delete_purchase.php",
                data: {'purchase_id': purchase_id},
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

    function editPurchase(purchase_id, ) {
        $.ajax({
            type: 'GET',
            url: `/supplier/includes/get_purchase.php/?purchase_id=${purchase_id}&edit=1`,
            statusCode: {
                401: function(response) {
                    window.location.href = '/auth/logout.php';
                }
            },
            success: function (result) {
                res = JSON.parse(result);
                if (res['success']) {
                    var receipt_details = res['receipt_details'];
                    var supplier_details = res['supplier_details'];
                    var receipt_items = res['receipt_items'];
                    var images = res['images']

                    oldItemCount = Number(res['data']['total_items']);

                    $("#edit-supplier-details").html(supplier_details)
                    $("#edit-receipt-details").html(receipt_details)
                    $(receipt_items).insertBefore($("#add-item-formset-edit"));
                    $("#edit-pin").on('focusout', () => {
                        searchPin($('#edit-pin').val(), 'edit');
                    });

                    if(images) {
                        // console.log(product['images']);
                        var previewContainer = $("#edit-image-preview__container__old");
                        previewContainer.html(images);
                    } else {
                        $("#edit-product-form").find("#edit-img-card").addClass('d-none');
                    }

                } else {
                    $("#modal-edit-errors").find('span').text('Failed to fetch receipt details try again later')
                    $("#modal-edit-errors").removeClass('d-none');
                }
            }
        });
        $("#edit-receipt-items").html(
            `<button id="add-item-formset-edit" type="button"
        class="btn btn-block btn-sm btn-secondary add-item-formset">Add another row</button>`);

        $("#add-item-formset-edit").click(() => {
            let addFormsetBtn = $("#add-item-formset-edit");
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
                        step="0.01"  type="number" placeholder="Unit Price(Price of a single item)" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="button" onclick="removeFormset(Event, this, true)"
                        class="btn btn-sm btn-danger remove-item-btn text-small">Remove item ${editFormsetCount + oldItemCount}</button>
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
        $("#editPurchaseModal").modal("show");
        listEditItems();
    }

    // Delete existing item and remove formset..
    function deleteItem(e, formset, item_id, receipt_id) {
        if(confirm('The item will be deleted permanently')) {
            $.ajax({
                type: 'POST',
                url: "/supplier/includes/delete_item.php",
                data: {'item_id':item_id, 'receipt_id': receipt_id, 'receipt_type': 'purchase'},
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
            let items = $("#add-purchase-form").find($(".receipt-item"));
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
            var items = $("#edit-purchase-form").find($('.receipt-item'));
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

    function deleteImage(image, image_id, product_id) {
        var imageName = $(image).attr("image_name")
        if(confirm("This image will be deleted permanently")) {
            $.ajax({
                type: 'POST',
                url: "/supplier/includes/edit_purchase.php",
                data: {
                    'purchase_id': product_id,
                    'delete_image': true,
                    'image_id': image_id,
                    'image_name': imageName
                },
                statusCode: {
                    401: function(response) {
                        window.location.href = '/auth/logout.php';
                    }
                },
                success: function (result) {
                    res = JSON.parse(result);
                    if (res['success']) {
                        Swal.fire({
                            'icon': 'success',
                            'text': 'Image removed successfully',
                            'timer': 2000
                        });
                        window.location.reload();
                    } else {
                        Swal.fire({
                            'icon': 'error',
                            'text': res['error'],
                            'timer': 2000
                        });
                    }
                },
                error: function(res) {
                    Swal.fire({
                        'icon': 'error',
                        'text': ' Error: Could not delete image. Try again later',
                        'timer': 2000
                    });
                }
            });
        }
    }

    // Handles next stepper form operation..
    $("#add-purchase-modal-btn").click(() => {
        $("#add-purchase-form")[0].reset();
        $("#add-purchase-form").find('input').removeClass('is-invalid');

        // Deactivate receipt items, details and pictures tabs first
        $("#add-receipt-items-tab").attr('data-toggle', '');
        $("#add-receipt-items-tab").css({cursor: 'not-allowed'});
        $("#add-receipt-details-tab").attr('data-toggle', '');
        $("#add-receipt-details-tab").css({cursor: 'not-allowed'});
        $("#add-receipt-picture-tab").attr('data-toggle', '');
        $("#add-receipt-picture-tab").css({cursor: 'not-allowed'});
        $("#add-modal-next").attr('current-tab', 'supplier');

        // Cleanup after modal exit
        $("#add-modal-next").removeClass('d-none');
        $("#add-modal-prev").addClass('d-none');
        $("#add-purchase-submit").addClass('d-none');
        $("#add-supplier-details-tab").tab("show");


        $("#addPurchaseModal").modal("show");
    });

    // Handle previous navigation
    $("#add-modal-prev").click(() => {
        let targetTab = $("#add-modal-prev").attr("target_tab");
        $(targetTab).tab("show");
    });

    $("#add-modal-next").click(() => {
        var tab_valid = true;
        var currentTab = $("#add-modal-next").attr('current-tab');

        if(currentTab == 'supplier') {
            // var tab_valid = validateFormInputs("add-supplier-details");
            // if(tab_valid) {
                $("#add-receipt-items-tab").attr('data-toggle', 'tab');
                $("#add-receipt-items-tab").css({cursor: 'pointer'});
                $("#add-modal-next").attr('current-tab', 'items');
                $("#add-receipt-items-tab").tab("show");
            // }
        } else if (currentTab == 'items') {
            // var tab_valid = validateFormInputs("add-receipt-items");
            // if(tab_valid) {
                $("#add-receipt-details-tab").attr('data-toggle', 'tab');
                $("#add-receipt-details-tab").css({cursor: 'pointer'});
                $("#add-modal-next").attr('current-tab', 'details');
                $("#add-receipt-details-tab").tab("show");
            // }
        } else if (currentTab == 'details') {
            // let tab_valid = validateFormInputs("add-receipt-details");
            // if(tab_valid) {
                $("#add-receipt-picture-tab").attr('data-toggle', 'tab');
                $("#add-receipt-picture-tab").css({cursor: 'pointer'});
                $("#add-modal-next").attr('current-tab', 'picture');
                $("#add-modal-next").addClass('d-none');
                $("#add-purchase-submit").removeClass("d-none");
                $("#add-receipt-picture-tab").tab("show");
            // }
        }
    });

    // Listen to tab changes..
    $("#add-receipt-items-tab").on('show.bs.tab', function(e) {
        $("#add-modal-next").removeClass('d-none');
        $("#add-modal-next").attr('current-tab', 'items');
        $("#add-purchase-submit").addClass('d-none');
        $("#add-modal-prev").attr('target_tab', '#add-supplier-details-tab');
        $("#add-modal-prev").removeClass('d-none');
    });


    $("#add-supplier-details-tab").on('show.bs.tab', function(e) {
        $("#add-modal-next").removeClass('d-none');
        $("#add-modal-next").attr('current-tab', 'supplier');
        $("#add-purchase-submit").addClass('d-none');
        $("#add-modal-prev").addClass('d-none');
    });

    $("#add-receipt-details-tab").on('show.bs.tab', function(e) {
        $("#add-modal-next").removeClass('d-none');
        $("#add-modal-next").attr('current-tab', 'details');
        $("#add-purchase-submit").addClass('d-none');
        $("#add-modal-prev").attr('target_tab', '#add-receipt-items-tab');
        $("#add-modal-prev").removeClass('d-none');
    });

    $("#add-receipt-picture-tab").on('show.bs.tab', function(e) {
        $("#add-modal-next").addClass('d-none');
        $("#add-modal-next").attr('current-tab', 'picture');
        $("#add-purchase-submit").removeClass('d-none');
        $("#add-modal-prev").attr('target_tab', '#add-receipt-details-tab');
        $("#add-modal-prev").removeClass('d-none');
    });

    // Preview add-receipt images
    $("#add-image").change(function(e) {
        var target = e.target;
        var imagePreviewContainer = $("#add-image-preview__container");
        let previewDimensions = {height: 250, width: "100%"}
        imagesPreview(e.target, imagePreviewContainer, "add", previewDimensions);
    });

    // Preview edit-receipt images
    $("#edit-image").change(function(e) {
        var target = e.target;
        var imagePreviewContainer = $("#edit-image-preview__container");
        let previewDimensions = {height: 250, width: "100%"}
        imagesPreview(e.target, imagePreviewContainer, "edit", previewDimensions);
    });
})
