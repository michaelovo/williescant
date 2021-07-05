<div class="table-responsive">
    <table class="table table-hover table_dt">
        <thead>
        <tr>
            <th>#</th>
            <th>PIN</th>
            <th>Receipt No</th>
            <th>Item Count</th>
            <th>Sub Total</th>
            <th>Total Price</th>
            <th>VAT</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sales as $key => $sale)

                                                <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$sale->pin}}</td>
                                                <td>{{$sale->receipt_number}}</td>
                                                <td>{{$sale->total_items}}</td>
                                                <td>{{$sale->sub_total}}</td>
                                                <td>{{$sale->total_price}}</td>
                                                <td>{{$sale->vat}}</td>
                                                <td>{{$sale->date}}</td>
                                                <td class="text-center">
                                                    <a id="actions3Invoker" class="link-muted" href="#!"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-toggle="dropdown">
                                                        <i class="fa fa-sliders-h"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right dropdown"
                                                        style="width: 150px;" aria-labelledby="actions3Invoker">
                                                        <ul class="list-unstyled mb-0">
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                    data-toggle="modal"
                                                                    href="#" onclick="saleDetails('{{$sale->id}}')">
                                                                    <i class="fa fa-eye mr-2"></i> Details
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="d-flex align-items-center link-muted py-2 px-3"
                                                                    data-toggle="modal"
                                                                    href="#" onclick="editSale('{{$sale->id}}')">
                                                                    <i class="fa fa-edit mr-2"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" onclick="deleteSale('{{$sale->id}}')"
                                                                    class="d-flex align-items-center link-muted text-danger py-2 px-3">
                                                                    <i class="fa fa-ban mr-2"></i> Delete
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
