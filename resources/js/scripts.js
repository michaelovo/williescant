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
        url: `/williescant/supplier/sale/edit/${sale_id}`,    
        success: function (result) {
            // console.log(result);
            res = JSON.parse(result);
            if (result.status) {
                var receipt_details = `
                <div class="form-row mb-2">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit-receipt_number">Receipt Number</label>
                            <input id="edit-receipt_number" class="form-control" name="receipt_number"
                            value=${result.data.receipt_number}" type="text" placeholder="Enter Receipt Number" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit-pin">KRA PIN</label>
                            <input id="edit-pin" class="form-control" name="pin" type="text"
                            value=${result.data.pin}"  placeholder="KRA PIN" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit-customer_name">Customer Name</label>
                            <input id="edit-customer_name" class="form-control" name="customer_name"
                            value=${result.data.customer_name}" type="text" placeholder="Enter Customer Name" required>
                        </div>
                    </div>                   

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit-vat">VAT</label>
                            <input id="edit-vat" class="form-control" name="vat" type="number"
                            step="0.01" value=${result.data.vat}"  placeholder="Total incurred VAT" required>
                        </div>
                    </div>
                </div>

                <div class="form-row mb-2">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit-sub_total">Sub Total</label>
                            <input id="edit-sub_total" class="form-control" name="sub_total"
                            step="0.01" value=${result.data.sub_total}" type="number" placeholder="Sub Total" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit-total_price">Total Price</label>
                            <input id="edit-total_price" class="form-control" name="total_price"
                            step="0.01" value=${result.data.total_price}" type="number" placeholder="Total Price" required>
                        </div>
                    </div>
                </div>

                <div class="form-row mb-2">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="required-label" for="edit-date">Date</label>
                            <input type="edit-date" name="date" value=${result.data.date}" id="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="edit-time">Time</label>
                            <input type="time" name="time"value=${result.data.time}" id="edit-time" class="form-control">
                        </div>
                    </div>

                    <input type="text" name="sale_id" value=${result.data.id}" hidden></input>
                </div>            
                `;  
                // var supplier_details = res['supplier_details'];

                var receipt_items = '';
                result.items.map((item, index) => {
                receipt_items +=`
                        <div class="form-row mb-2">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="required-label" for="new_product_name_${index}">Name</label>
                                <input id="new_product_name_${index}" class="form-control" name="new_product_name_${index}" type="text"
                                    placeholder="Product Name" value="${item.name}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="new_product_description_${index}">Description</label>
                                <input id="new_product_description_${index}" class="form-control" name="new_product_description_${index}"
                                    type="text" value="${item.description}" placeholder="Product Description">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="required-label" for="new_product_quantity_${index}">Quantity</label>
                                <input id="new_product_quantity_${index}" class="form-control" name="new_product_quantity_${index}" type="number"
                                  value="${item.quantity}"  placeholder="Product Qauntity" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label class="required-label" for="new_product_unit_price_${index}">Unit Price</label>
                                <input id="new_product_unit_price_${index}" class="form-control" name="new_product_unit_price_${index}"
                                step="0.01" value="${item.unit_price}" type="number" placeholder="Unit Price(Price of a single item)" required>
                            </div>
                        </div>
                        <input value="${item.id}"  id="new_product_id_${index}"  name="id" hidden>
                        <div class="col-md-6">
                            <button type="button" onclick="deleteItem(Event, this, ${item.id}, '.$receipt_id.')" class="btn btn-sm btn-danger text-small">Remove item</button>            
                        </div>                        
                        <div class="col-md-12 mt-2">
                            <hr/>
                        </div>
                    </div>`;                    
                })
 

                oldItemCount = result.data.total_items;
                
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