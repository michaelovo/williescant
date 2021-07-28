/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sales.js":
/*!*******************************!*\
  !*** ./resources/js/sales.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var formsetCount = 1;
var editFormsetCount = 1;
var oldItemCount = 1;
var d = new Date();
d = d.toISOString().substring(0, 10);
$("#date").attr("max", d);
$("#add-item-formset").click(function () {
  formsetCount += 1;
  var addFormsetBtn = $("#add-item-formset");
  var formset = "\n        <div class=\"form-row mb-2 receipt-item\">\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label class=\"required-label\" for=\"product_name_".concat(formsetCount, "\">Name</label>\n                    <input id=\"product_name_").concat(formsetCount, "\" class=\"form-control\" name=\"receipt_items[").concat(formsetCount, "][product_name]\" type=\"text\"\n                        placeholder=\"Product Name\" required>\n                </div>\n            </div>\n\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label for=\"product_description_").concat(formsetCount, "\">Description</label>\n                    <input id=\"product_description_").concat(formsetCount, "\" class=\"form-control\" name=\"receipt_items[").concat(formsetCount, "][product_description]\"\n                        type=\"text\" placeholder=\"Product Description\">\n                </div>\n            </div>\n\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label class=\"required-label\" for=\"product_quantity_").concat(formsetCount, "\">Quantity</label>\n                    <input id=\"product_quantity_").concat(formsetCount, "\" class=\"form-control\" name=\"receipt_items[").concat(formsetCount, "][product_quantity]\" type=\"number\"\n                        placeholder=\"Product Qauntity\" required>\n                </div>\n            </div>\n\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label class=\"required-label\" for=\"product_unit_price_").concat(formsetCount, "\"\">Unit Price</label>\n                    <input id=\"product_unit_price_").concat(formsetCount, "\"\" class=\"form-control\" name=\"receipt_items[").concat(formsetCount, "][product_unit_price]\"\n                    step=\"0.01\" type=\"number\" placeholder=\"Unit Price(Price of a single item)\" required>\n                </div>\n            </div>\n            <div class=\"col-md-6\">\n                <button type=\"button\" onclick=\"removeFormset(Event, this, false)\" \n                class=\"btn btn-sm btn-danger text-small remove-item-btn\">Remove item ").concat(formsetCount, "</button>            \n            </div>\n            <div class=\"col-md-12 mt-2\">\n                <hr/>            \n            </div>\n        </div>\n    ");
  $(formset).insertBefore(addFormsetBtn);
});
$("").submit(function (e) {
  e.preventDefault();
  var formData = new FormData($("#add-sale-form")[0]);
  $("#modal-success").addClass("d-none");
  $("#modal-errors").addClass("d-none");
  products = []; // Extract Receipt Items

  for (var i = 1; i < formsetCount + 1; i++) {
    var item_1;
    receipt_item = {
      name: $("#add-sale-form").find("#product_name_".concat(i)).val(),
      description: $("#add-sale-form").find("#product_description_".concat(i)).val(),
      quantity: $("#add-sale-form").find("#product_quantity_".concat(i)).val(),
      unit_price: $("#add-sale-form").find("#product_unit_price_".concat(i)).val()
    };
    products.push(receipt_item);
    formData["delete"]("product_name_".concat(i));
    formData["delete"]("product_description_".concat(i));
    formData["delete"]("product_quantity_".concat(i));
    formData["delete"]("product_unit_price_".concat(i));
  }

  parsedFormdata = {};

  var _iterator = _createForOfIteratorHelper(formData.entries()),
      _step;

  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      var entry = _step.value;
      parsedFormdata[entry[0]] = entry[1];
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }

  $.ajax({
    type: 'POST',
    url: "/supplier/includes/add_sale.php",
    data: _objectSpread(_objectSpread({}, parsedFormdata), {}, {
      'receipt_products': products
    }),
    statusCode: {
      401: function _(response) {
        window.location.href = '/auth/logout.php';
      }
    },
    success: function success(result) {
      res = JSON.parse(result);

      if (res['success']) {
        $("#modal-success").removeClass('d-none');
        $("#add-sale-form")[0].reset();
        setTimeout(function () {
          window.location.reload();
        }, 1000);
      } else if (res['error']) {
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
  old_items = []; // Extract New Receipt Items

  for (var i = oldItemCount + 1; i < editFormsetCount + oldItemCount; i++) {
    receipt_item = {
      name: $("#edit-sale-form").find("#edit_product_name_".concat(i)).val(),
      description: $("#edit-sale-form").find("#edit_product_description_".concat(i)).val(),
      quantity: $("#edit-sale-form").find("#edit_product_quantity_".concat(i)).val(),
      unit_price: $("#edit-sale-form").find("#edit_product_unit_price_".concat(i)).val()
    };
    products.push(receipt_item);
    formData["delete"]("product_name_".concat(i));
    formData["delete"]("product_description_".concat(i));
    formData["delete"]("product_quantity_".concat(i));
    formData["delete"]("product_unit_price_".concat(i));
  } // Extract existing receipt items(To be updatd only)


  for (var i = 1; i < oldItemCount + 1; i++) {
    receipt_item = {
      name: $("#edit-sale-form").find("#old_product_name_".concat(i)).val(),
      description: $("#edit-sale-form").find("#old_product_description_".concat(i)).val(),
      quantity: $("#edit-sale-form").find("#old_product_quantity_".concat(i)).val(),
      unit_price: $("#edit-sale-form").find("#old_product_unit_price_".concat(i)).val(),
      id: $("#edit-sale-form").find("#old_product_id_".concat(i)).val()
    };
    old_items.push(receipt_item);
    formData["delete"]("old_product_name_".concat(i));
    formData["delete"]("old_product_description_".concat(i));
    formData["delete"]("old_product_quantity_".concat(i));
    formData["delete"]("old_product_unit_price_".concat(i));
    formData["delete"]("old_product_id_".concat(i));
  }

  parsedFormdata = {};

  var _iterator2 = _createForOfIteratorHelper(formData.entries()),
      _step2;

  try {
    for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
      var entry = _step2.value;
      parsedFormdata[entry[0]] = entry[1];
    } // console.log({...parsedFormdata, 'receipt_products':products, 'old_items': old_items});

  } catch (err) {
    _iterator2.e(err);
  } finally {
    _iterator2.f();
  }

  $.ajax({
    type: 'POST',
    url: "/supplier/includes/edit_sale.php",
    data: _objectSpread(_objectSpread({}, parsedFormdata), {}, {
      'receipt_products': products,
      'old_items': old_items
    }),
    statusCode: {
      401: function _(response) {
        window.location.href = '/auth/logout.php';
      }
    },
    success: function success(result) {
      res = JSON.parse(result);

      if (res['success']) {
        $("#modal-edit-success").removeClass('d-none');
        $("#edit-sale-form")[0].reset();
        setTimeout(function () {
          window.location.reload();
        }, 1000);
      } else if (res['error']) {
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
    url: "/williescant/supplier/sale/".concat(sale_id),
    statusCode: {
      401: function _(response) {
        window.location.href = '/auth/logout.php';
      }
    },
    success: function success(result) {
      if (result.status = 'success') {
        var receipt_details = "\n                <div class=\"col-3 mb-3 details-item\">\n                    <div class=\"details-title\">\n                        Receipt Number\n                    </div>\n                    <div class=\"details-value\" id=\"details-receipt-number\">\n                        ".concat(result.data.receipt_number, "                          \n                    </div>\n                </div>\n\n                <div class=\"col-3 mb-3 details-item\">\n                    <div class=\"details-title\">\n                        KRA PIN\n                    </div>\n                    <div class=\"details-value\" id=\"details-pin\">\n                        ").concat(result.data.pin, "                       \n                    </div>\n                </div>\n\n                <div class=\"col-3 mb-3 details-item\">\n                    <div class=\"details-title\">\n                        Customer Name\n                    </div>\n                    <div class=\"details-value\" id=\"details-customer-name\">\n                        ").concat(result.data.customer_name, "                         \n                    </div>\n                </div>            \n\n                <div class=\"col-3 mb-4 details-item\">\n                    <div class=\"details-title\">\n                        Item Count\n                    </div>\n                    <div class=\"details-value\" id=\"details-item-count\">\n                       ").concat(result.data.total_items, "                        \n                    </div>\n                </div>  \n\n                <div class=\"col-3 mb-4 details-item\">\n                    <div class=\"details-title\">\n                        Sub Total\n                    </div>\n                    <div class=\"details-value\" id=\"details-sub-total\">\n                        ").concat(result.data.sub_total, "                         \n                    </div>\n                </div>\n                <div class=\"col-3 mb-4 details-item\">\n                    <div class=\"details-title\">\n                        VAT\n                    </div>\n                    <div class=\"details-value\" id=\"details-vat\">\n                       ").concat(result.data.vat, "                          \n                    </div>\n                </div>\n\n                <div class=\"col-3 mb-4 details-item\">\n                    <div class=\"details-title\">\n                        Total\n                    </div>\n                    <div class=\"details-value\" id=\"details-total\">\n                        ").concat(result.data.total_price, "                          \n                    </div>\n                </div> \n                <div class=\"col-3 mb-4 details-item\">\n                    <div class=\"details-title\">\n                        Date\n                    </div>\n                    <div class=\"details-value\" id=\"details-date\">\n                        ").concat(result.data.date, "                         \n                    </div>\n                </div>  \n                <div class=\"col-3 mb-4 details-item\">\n                    <div class=\"details-title\">\n                        Time\n                    </div>\n                    <div class=\"details-value\" id=\"details-time\">\n                        ").concat(result.data.time, "                         \n                    </div>\n                </div>                         \n            ");
        var receipt_items = result.products;
        $("#receipt-details-row").html(receipt_details);

        if (!receipt_items) {
          receipt_items = "<tr><td colspan=\"9\" class=\"text-center\">\n                    <div class=\"alert alert-soft-secondary justify-content-center\">No receipt items found!</div>\n                    </td></tr>";
        }

        var table_body = '';

        for (item in receipt_items) {
          table_body += "\n                    <tr>\n                        <td>".concat(item.item_count, "</td>\n                        <td>").concat(item.name, "</td>\n                        <td>").concat(item.desc, "</td>\n                        <td>").concat(item.quantity, "</td>\n                        <td>").concat(item.unit_price, "</td>\n                    </tr>");
        }

        $("#items-details-row").html(table_body);
        $("#saleDetailsModal").modal('show');
      } else {// $("#modal-errors").removeClass('d-none');
      }
    }
  });
}

function deleteSale(sale_id) {
  if (confirm("This sale receipt will be deleted permanently")) {
    $.ajax({
      type: 'POST',
      url: "/supplier/includes/delete_sale.php",
      data: {
        'sale_id': sale_id
      },
      // processData: false,
      // contentType: false,
      statusCode: {
        401: function _(response) {
          window.location.href = '/auth/logout.php';
        }
      },
      success: function success(result) {
        res = JSON.parse(result);

        if (res['success']) {
          setTimeout(function () {
            window.location.reload();
          }, 1000);
        } else {// $("#modal-errors").removeClass('d-none');
        }
      }
    });
  }
} // Remove item formset


function removeFormset(e, formset) {
  var edit = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
  $(formset).parent().parent().remove();

  if (edit) {
    editFormsetCount -= 1;
    listEditItems();
  } else {
    formsetCount -= 1;
    listAddItems();
  }
} // Edit sale receipt details


function editSale(sale_id) {
  $("#edit-receipt-items").html("<button id=\"edit-item-formset\" type=\"button\" \n        class=\"btn btn-block btn-sm btn-secondary\">Add another row</button>");
  $("#edit-item-formset").click(function () {
    var addFormsetBtn = $("#edit-item-formset");
    var formset = "\n                <div class=\"form-row mb-2 receipt-item\">\n                    <div class=\"col-md-6\">\n                        <div class=\"form-group mb-2\">\n                            <label class=\"required-label\" for=\"edit_product_name_".concat(editFormsetCount, "\">Name</label>\n                            <input id=\"edit_product_name_").concat(editFormsetCount, "\" class=\"form-control\" name=\"edit_product_name_").concat(editFormsetCount, "\" type=\"text\"\n                                placeholder=\"Product Name\" required>\n                        </div>\n                    </div>\n\n                    <div class=\"col-md-6\">\n                        <div class=\"form-group mb-2\">\n                            <label for=\"edit_product_description_").concat(editFormsetCount, "\">Description</label>\n                            <input id=\"edit_product_description_").concat(editFormsetCount, "\" class=\"form-control\" name=\"edit_product_description_").concat(editFormsetCount, "\"\n                                type=\"text\" placeholder=\"Product Description\">\n                        </div>\n                    </div>\n\n                    <div class=\"col-md-6\">\n                        <div class=\"form-group mb-2\">\n                            <label class=\"required-label\" for=\"edit_product_quantity_").concat(editFormsetCount, "\">Quantity</label>\n                            <input id=\"edit_product_quantity_").concat(editFormsetCount, "\" class=\"form-control\" name=\"edit_product_quantity_").concat(editFormsetCount, "\" type=\"number\"\n                                placeholder=\"Product Qauntity\" required>\n                        </div>\n                    </div>\n\n                    <div class=\"col-md-6\">\n                        <div class=\"form-group mb-2\">\n                            <label class=\"required-label\" for=\"edit_product_unit_price_").concat(editFormsetCount, "\"\">Unit Price</label>\n                            <input id=\"edit_product_unit_price_").concat(editFormsetCount, "\"\" class=\"form-control\" name=\"edit_product_unit_price_").concat(editFormsetCount, "\"\n                            step=\"0.01\" type=\"number\" placeholder=\"Unit Price(Price of a single item)\" required>\n                        </div>\n                    </div>\n                    <div class=\"col-md-6\">\n                        <button type=\"button\" onclick=\"removeFormset(Event, this, true)\" \n                            class=\"remove-item-btn btn btn-sm btn-danger text-small\">\n                            Remove item ").concat(editFormsetCount + oldItemCount, "\n                        </button>            \n                    </div>\n                    <div class=\"col-md-12 mt-2\">\n                        <hr/>            \n                    </div>\n                </div>\n            ");
    listEditItems();
    $(formset).insertBefore(addFormsetBtn);
    editFormsetCount += 1;
  });
  $.ajax({
    type: 'GET',
    url: "/supplier/includes/get_sale.php/?sale_id=".concat(sale_id, "&edit=1"),
    statusCode: {
      401: function _(response) {
        window.location.href = '/auth/logout.php';
      }
    },
    success: function success(result) {
      // console.log(result);
      res = JSON.parse(result);

      if (res['success']) {
        var receipt_details = res['receipt_details'];
        var supplier_details = res['supplier_details'];
        var receipt_items = res['receipt_items'];
        oldItemCount = Number(res['data']['total_items']);
        $("#edit-supplier-details").html(supplier_details);
        $("#edit-receipt-details").html(receipt_details);
        $(receipt_items).insertBefore($("#edit-item-formset"));
      } else {
        $("#modal-edit-errors").find('span').text('Failed to fetch receipt details try again later');
        $("#modal-edit-errors").removeClass('d-none');
      }
    }
  });
  $("#editSaleModal").modal("show");
} // Delete existing receipt item and remove formset.. 


function deleteItem(e, formset, item_id, receipt_id) {
  if (confirm('The item will be deleted permanently')) {
    $.ajax({
      type: 'POST',
      url: "/supplier/includes/delete_item.php",
      data: {
        'item_id': item_id,
        'receipt_id': receipt_id,
        'receipt_type': 'sale'
      },
      statusCode: {
        401: function _(response) {
          window.location.href = '/auth/logout.php';
        }
      },
      success: function success(result) {
        res = JSON.parse(result);

        if (res['success']) {
          $("#modal-edit-success").removeClass('d-none');
          $("#modal-edit-success").find('span').text('Item deleted succesfully');
          oldItemCount -= 1;
          $(formset).parent().parent().remove();
          listEditItems();
        } else if (res['error']) {
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

function listAddItems() {
  window.setTimeout(function () {
    var items = $("#add-sale-form").find($(".receipt-item"));
    console.log(items.length);
    var start = 1;

    var _iterator3 = _createForOfIteratorHelper(items),
        _step3;

    try {
      for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
        var _item = _step3.value;
        $(_item).find($("input[name ^='product_name']")).attr('id', "product_name_".concat(start));
        $(_item).find($("input[name ^='product_description']")).attr('id', "product_description_".concat(start));
        $(_item).find($("input[name ^='product_quantity']")).attr('id', "product_quantity_".concat(start));
        $(_item).find($("input[name ^='product_unit_price']")).attr('id', "product_unit_price_".concat(start));
        $(_item).find($(".remove-item-btn")).text("Remove item ".concat(start));
        start += 1;
      }
    } catch (err) {
      _iterator3.e(err);
    } finally {
      _iterator3.f();
    }
  }, 100);
}

function listEditItems() {
  window.setTimeout(function () {
    var items = $("#edit-sale-form").find($('.receipt-item'));
    var start = 1;

    var _iterator4 = _createForOfIteratorHelper(items),
        _step4;

    try {
      for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
        var item = _step4.value;
        $(item).find($("input[name ^='edit_product_name']")).attr('id', "edit_product_name_".concat(start));
        $(item).find($("input[name ^='edit_product_description']")).attr('id', "edit_product_description_".concat(start));
        $(item).find($("input[name ^='edit_product_quantity']")).attr('id', "edit_product_quantity_".concat(start));
        $(item).find($("input[name ^='edit_product_unit_price']")).attr('id', "edit_product_unit_price_".concat(start));
        $(item).find($(".remove-item-btn")).text("Remove item ".concat(start));
        start += 1;
      }
    } catch (err) {
      _iterator4.e(err);
    } finally {
      _iterator4.f();
    }
  }, 100);
} // Handles next stepper form operation..


$("#add-sale-modal-btn").click(function () {
  $("#add-sale-form").trigger('reset');
  $("#add-sale-form").find('input').removeClass('is-invalid'); // Deactivate details tabs first

  $("#add-receipt-details-tab").attr('data-toggle', '');
  $("#add-receipt-details-tab").css({
    cursor: 'not-allowed'
  });
  $("#add-modal-next").attr('current-tab', 'items'); // Cleanup after previous modal close..

  $("#add-modal-next").removeClass('d-none');
  $("#add-modal-prev").addClass('d-none');
  $("#add-sale-submit").addClass('d-none');
  $("#add-receipt-items-tab").tab("show");
  $("#addSaleModal").modal("show");
}); // Handle prev tab navigation..

$("#add-modal-prev").click(function () {
  var targetTab = $("#add-modal-prev").attr("target_tab");
  $(targetTab).tab("show");
});
$("#add-modal-next").click(function () {
  var tab_valid = true;
  var currentTab = $("#add-modal-next").attr('current-tab');

  if (currentTab == 'items') {
    tab_valid = validateFormInputs("receipt_items");

    if (tab_valid) {
      $("#add-receipt-details-tab").attr('data-toggle', 'tab');
      $("#add-receipt-details-tab").css({
        cursor: 'pointer'
      });
      $("#add-modal-next").attr('current-tab', 'details');
      $("#add-receipt-details-tab").tab("show"); // Control buttons changes..

      $("#add-modal-next").addClass('d-none');
      $("#add-modal-prev").attr('target_tab', '#add-receipt-items-tab');
      $("#add-modal-prev").removeClass('d-none');
      $("#add-sale-submit").removeClass("d-none");
    }
  }
}); // Listen to tab changes..

$("#add-receipt-items-tab").on('show.bs.tab', function (e) {
  $("#add-modal-next").removeClass('d-none');
  $("#add-modal-next").attr('current-tab', 'items');
  $("#add-sale-submit").addClass('d-none');
  $("#add-modal-prev").addClass('d-none');
});

function validateFormInputs(form) {
  var markInvalid = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  var tabValid = true;
  var formFields = $("#".concat(form)).find('input[required]');

  for (var i = 0; i < formFields.length; i++) {
    if ($(formFields[i]).val().length == 0) {
      if (markInvalid) {
        $(formFields[i]).addClass('is-invalid');
      }

      tabValid = false;
    } else {
      $(formFields[i]).removeClass('is-invalid');
    }
  }

  return tabValid;
}

/***/ }),

/***/ 5:
/*!*************************************!*\
  !*** multi ./resources/js/sales.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\williescant\resources\js\sales.js */"./resources/js/sales.js");


/***/ })

/******/ });