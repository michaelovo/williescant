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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/purchases.js":
/*!***********************************!*\
  !*** ./resources/js/purchases.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

$(document).ready(function () {
  var formsetCount = 1;
  var editFormsetCount = 1;
  var oldItemCount = 1;
  var d = new Date();
  d = d.toISOString().substring(0, 10);
  $("#date").attr("max", d);
  $(".add-item-formset").click(function () {
    formsetCount += 1;
    var addFormsetBtn = $(".add-item-formset");
    var formset = "\n        <div class=\"form-row mb-2 receipt-item\">\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label class=\"required-label\" for=\"product_name_".concat(formsetCount, "\">Name</label>\n                    <input id=\"product_name_").concat(formsetCount, "\" class=\"form-control\" name=\"product_name_").concat(formsetCount, "\" type=\"text\"\n                        placeholder=\"Product Name\" required>\n                </div>\n            </div>\n\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label for=\"product_description_").concat(formsetCount, "\">Description</label>\n                    <input id=\"product_description_").concat(formsetCount, "\" class=\"form-control\" name=\"product_description_").concat(formsetCount, "\"\n                        type=\"text\" placeholder=\"Product Description\">\n                </div>\n            </div>\n\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label class=\"required-label\" for=\"product_quantity_").concat(formsetCount, "\">Quantity</label>\n                    <input id=\"product_quantity_").concat(formsetCount, "\" class=\"form-control\" name=\"product_quantity_").concat(formsetCount, "\" type=\"number\"\n                        placeholder=\"Product Qauntity\" required>\n                </div>\n            </div>\n\n            <div class=\"col-md-6\">\n                <div class=\"form-group mb-2\">\n                    <label class=\"required-label\" for=\"product_unit_price_").concat(formsetCount, "\"\">Unit Price</label>\n                    <input id=\"product_unit_price_").concat(formsetCount, "\"\" class=\"form-control\" name=\"product_unit_price_").concat(formsetCount, "\"\n                    step=\"0.01\" type=\"number\" placeholder=\"Unit Price(Price of a single item)\" required>\n                </div>\n            </div>\n            <div class=\"col-md-6\">\n                <button type=\"button\" onclick=\"removeFormset(Event, this, false)\"\n                    class=\"btn btn-sm btn-danger remove-item-btn text-small\">Remove item ").concat(formsetCount, "</button>\n            </div>\n            <div class=\"col-md-12 mt-2\">\n                <hr/>\n            </div>\n        </div>");
    $(formset).insertBefore(addFormsetBtn);
  });
  $("#edit-purchase-form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($("#edit-purchase-form")[0]);
    $("#modal-edit-success").addClass("d-none");
    $("#modal-edit-errors").addClass("d-none"); // Extract New Receipt Items

    for (var i = oldItemCount + 1; i < editFormsetCount + oldItemCount; i++) {
      receipt_item = {
        name: $("#edit-purchase-form").find("#edit_product_name_".concat(i)).val(),
        description: $("#edit-purchase-form").find("#edit_product_description_".concat(i)).val(),
        quantity: $("#edit-purchase-form").find("#edit_product_quantity_".concat(i)).val(),
        unit_price: $("#edit-purchase-form").find("#edit_product_unit_price_".concat(i)).val()
      };
      formData.append("receipt_products[]", JSON.stringify(receipt_item));
      formData["delete"]("edit_product_name_".concat(i));
      formData["delete"]("edit_product_description_".concat(i));
      formData["delete"]("edit_product_quantity_".concat(i));
      formData["delete"]("edit_product_unit_price_".concat(i));
    } // Extract existing receipt items(To be updatd only)


    for (var i = 1; i < oldItemCount + 1; i++) {
      receipt_item = {
        name: $("#edit-purchase-form").find("#old_product_name_".concat(i)).val(),
        description: $("#edit-purchase-form").find("#old_product_description_".concat(i)).val(),
        quantity: $("#edit-purchase-form").find("#old_product_quantity_".concat(i)).val(),
        unit_price: $("#edit-purchase-form").find("#old_product_unit_price_".concat(i)).val(),
        id: $("#edit-purchase-form").find("#old_product_id_".concat(i)).val()
      };
      formData.append("old_items[]", JSON.stringify(receipt_item));
      formData["delete"]("old_product_name_".concat(i));
      formData["delete"]("old_product_description_".concat(i));
      formData["delete"]("old_product_quantity_".concat(i));
      formData["delete"]("old_product_unit_price_".concat(i));
      formData["delete"]("old_product_id_".concat(i));
    }

    var images = document.getElementById('edit-image').files;
    var filesLength = images.length;

    for (var i = 0; i < filesLength; i++) {
      if (images[i]['isvalid'] !== false) {
        formData.append("images[]", images[i]);
      }
    }

    var _iterator = _createForOfIteratorHelper(formData.entries()),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var entry = _step.value;

        if (entry[0] == 'images') {
          formData["delete"](entry[0]);
        }
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }

    $.ajax({
      type: 'POST',
      url: "/supplier/includes/edit_purchase.php",
      data: formData,
      processData: false,
      contentType: false,
      statusCode: {
        401: function _(response) {
          window.location.href = '/auth/logout.php';
        }
      },
      success: function success(result) {
        res = JSON.parse(result);

        if (res['success']) {
          $("#modal-edit-success").removeClass('d-none');
          $("#edit-purchase-form")[0].reset();
          setTimeout(function () {
            window.location.reload();
          }, 1000);
        } else if (res['error']) {
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
    $("#modal-errors").addClass("d-none"); // Extract Receipt Items

    for (var i = 1; i < formsetCount + 1; i++) {
      receipt_item = {
        name: $("#add-purchase-form").find("#product_name_".concat(i)).val(),
        description: $("#add-purchase-form").find("#product_description_".concat(i)).val(),
        quantity: $("#add-purchase-form").find("#product_quantity_".concat(i)).val(),
        unit_price: $("#add-purchase-form").find("#product_unit_price_".concat(i)).val()
      };
      formData.append("receipt_products[]", JSON.stringify(receipt_item));
      formData["delete"]("product_name_".concat(i));
      formData["delete"]("product_description_".concat(i));
      formData["delete"]("product_quantity_".concat(i));
      formData["delete"]("product_unit_price_".concat(i));
    }

    var images = document.getElementById('add-image').files;
    var filesLength = images.length;

    for (var i = 0; i < filesLength; i++) {
      if (images[i]['isvalid'] !== false) {
        formData.append("images[]", images[i]);
      }
    }

    var _iterator2 = _createForOfIteratorHelper(formData.entries()),
        _step2;

    try {
      for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
        var entry = _step2.value;

        if (entry[0] == 'images') {
          formData["delete"](entry[0]);
        }
      }
    } catch (err) {
      _iterator2.e(err);
    } finally {
      _iterator2.f();
    }

    $.ajax({
      type: 'POST',
      url: "/supplier/includes/add_purchase.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function success(result) {
        res = JSON.parse(result);

        if (res['success']) {
          $("#modal-success").removeClass('d-none');
          $("#add-purchase-form")[0].reset();
          $(".loading").addClass("d-none");
          setTimeout(function () {
            window.location.reload();
          }, 1000);
          Swal.fire({
            'icon': 'success',
            'text': 'Receipt added',
            'timer': 1000
          });
        } else if (res['error']) {
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
      error: function error(err) {
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
      type: "williescant/supplier/purchase/search/".concat(pin),
      statusCode: {
        401: function _(response) {
          window.location.href = '/auth/logout.php';
        }
      },
      success: function success(result) {
        res = JSON.parse(result);

        if (res['success']) {
          var data = res['data'];

          if (target == 'add') {
            Swal.fire({
              title: "Existing details for supplier with that pin found.",
              text: "Click confirm to autofill these details",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: "Confirm",
              cancelButtonText: 'Cancel'
            }).then(function (result) {
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
              title: "Existing details for supplier with that pin found.",
              text: "Click confirm to autofill these details",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: "Confirm",
              cancelButtonText: 'Cancel'
            }).then(function (result) {
              if (result.isConfirmed) {
                $("#edit-purchase-form").find("#edit-supplier_name").val(data['supplier_name']);
                $("#edit-purchase-form").find("#edit-phone").val(data['phone']);
                $("#edit-purchase-form").find("#edit-email").val(data['email']);
                $("#edit-purchase-form").find("#edit-website").val(data['website']);
                $("#edit-purchase-form").find("#edit-location").val(data['location']);
              }
            });
          }
        } else {}
      },
      error: function error(err) {
        Swal.fire({
          'icon': 'error',
          'text': ' Error: Could not search for existing supplier details',
          'timer': 5000
        });
      }
    });
  }

  $("#pin").on('focusout', function () {
    searchPin($('#pin').val(), 'add');
  });

  function purchaseDetails(purchase_id) {
    $.ajax({
      type: 'GET',
      url: "/supplier/includes/get_purchase.php/?purchase_id=".concat(purchase_id),
      statusCode: {
        401: function _(response) {
          window.location.href = '/auth/logout.php';
        }
      },
      success: function success(result) {
        res = JSON.parse(result);

        if (res['success']) {
          var receipt_details = res['receipt_details'];
          var supplier_details = res['supplier_details'];
          var receipt_items = res['receipt_items'];
          var receipt_images = res['images'];
          $("#supplier-details-row").html(supplier_details);
          $("#receipt-details-row").html(receipt_details);

          if (!receipt_items) {
            receipt_items = "<tr><td colspan=\"9\" class=\"text-center\">\n                    <div class=\"alert alert-soft-secondary justify-content-center\">No receipt items found!</div>\n                    </td></tr>";
          }

          $("#items-details-row").html(receipt_items);

          if (!receipt_images) {
            receipt_images = "<div class=\"alert mx-4 text-center w-100 alert-warning\">No receipt images found!</div>";
          }

          $("#receipt_images_container").html(receipt_images);
          $("#purchaseDetailsModal").modal('show');
        } else {// $("#modal-errors").removeClass('d-none');
        }
      }
    });
  }

  function deletePurchase(purchase_id) {
    if (confirm("This purchase receipt will be deleted permanently")) {
      $.ajax({
        type: 'POST',
        url: "/supplier/includes/delete_purchase.php",
        data: {
          'purchase_id': purchase_id
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
  }

  function editPurchase(purchase_id) {
    $.ajax({
      type: 'GET',
      url: "/supplier/includes/get_purchase.php/?purchase_id=".concat(purchase_id, "&edit=1"),
      statusCode: {
        401: function _(response) {
          window.location.href = '/auth/logout.php';
        }
      },
      success: function success(result) {
        res = JSON.parse(result);

        if (res['success']) {
          var receipt_details = res['receipt_details'];
          var supplier_details = res['supplier_details'];
          var receipt_items = res['receipt_items'];
          var images = res['images'];
          oldItemCount = Number(res['data']['total_items']);
          $("#edit-supplier-details").html(supplier_details);
          $("#edit-receipt-details").html(receipt_details);
          $(receipt_items).insertBefore($("#add-item-formset-edit"));
          $("#edit-pin").on('focusout', function () {
            searchPin($('#edit-pin').val(), 'edit');
          });

          if (images) {
            // console.log(product['images']);
            var previewContainer = $("#edit-image-preview__container__old");
            previewContainer.html(images);
          } else {
            $("#edit-product-form").find("#edit-img-card").addClass('d-none');
          }
        } else {
          $("#modal-edit-errors").find('span').text('Failed to fetch receipt details try again later');
          $("#modal-edit-errors").removeClass('d-none');
        }
      }
    });
    $("#edit-receipt-items").html("<button id=\"add-item-formset-edit\" type=\"button\"\n        class=\"btn btn-block btn-sm btn-secondary add-item-formset\">Add another row</button>");
    $("#add-item-formset-edit").click(function () {
      var addFormsetBtn = $("#add-item-formset-edit");
      var formset = "\n            <div class=\"form-row mb-2 receipt-item\">\n                <div class=\"col-md-6\">\n                    <div class=\"form-group mb-2\">\n                        <label class=\"required-label\" for=\"edit_product_name_".concat(editFormsetCount, "\">Name</label>\n                        <input id=\"edit_product_name_").concat(editFormsetCount, "\" class=\"form-control\" name=\"edit_product_name_").concat(editFormsetCount, "\" type=\"text\"\n                            placeholder=\"Product Name\" required>\n                    </div>\n                </div>\n\n                <div class=\"col-md-6\">\n                    <div class=\"form-group mb-2\">\n                        <label for=\"edit_product_description_").concat(editFormsetCount, "\">Description</label>\n                        <input id=\"edit_product_description_").concat(editFormsetCount, "\" class=\"form-control\" name=\"edit_product_description_").concat(editFormsetCount, "\"\n                            type=\"text\" placeholder=\"Product Description\">\n                    </div>\n                </div>\n\n                <div class=\"col-md-6\">\n                    <div class=\"form-group mb-2\">\n                        <label class=\"required-label\" for=\"edit_product_quantity_").concat(editFormsetCount, "\">Quantity</label>\n                        <input id=\"edit_product_quantity_").concat(editFormsetCount, "\" class=\"form-control\" name=\"edit_product_quantity_").concat(editFormsetCount, "\" type=\"number\"\n                            placeholder=\"Product Qauntity\" required>\n                    </div>\n                </div>\n\n                <div class=\"col-md-6\">\n                    <div class=\"form-group mb-2\">\n                        <label class=\"required-label\" for=\"edit_product_unit_price_").concat(editFormsetCount, "\"\">Unit Price</label>\n                        <input id=\"edit_product_unit_price_").concat(editFormsetCount, "\"\" class=\"form-control\" name=\"edit_product_unit_price_").concat(editFormsetCount, "\"\n                        step=\"0.01\"  type=\"number\" placeholder=\"Unit Price(Price of a single item)\" required>\n                    </div>\n                </div>\n                <div class=\"col-md-6\">\n                    <button type=\"button\" onclick=\"removeFormset(Event, this, true)\"\n                        class=\"btn btn-sm btn-danger remove-item-btn text-small\">Remove item ").concat(editFormsetCount + oldItemCount, "</button>\n                </div>\n                <div class=\"col-md-12 mt-2\">\n                    <hr/>\n                </div>\n            </div>\n        ");
      listEditItems();
      $(formset).insertBefore(addFormsetBtn);
      editFormsetCount += 1;
    });
    $("#editPurchaseModal").modal("show");
    listEditItems();
  } // Delete existing item and remove formset..


  function deleteItem(e, formset, item_id, receipt_id) {
    if (confirm('The item will be deleted permanently')) {
      $.ajax({
        type: 'POST',
        url: "/supplier/includes/delete_item.php",
        data: {
          'item_id': item_id,
          'receipt_id': receipt_id,
          'receipt_type': 'purchase'
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
      var items = $("#add-purchase-form").find($(".receipt-item"));
      var start = 1;

      var _iterator3 = _createForOfIteratorHelper(items),
          _step3;

      try {
        for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
          var item = _step3.value;
          $(item).find($("input[name ^='product_name']")).attr('id', "product_name_".concat(start));
          $(item).find($("input[name ^='product_description']")).attr('id', "product_description_".concat(start));
          $(item).find($("input[name ^='product_quantity']")).attr('id', "product_quantity_".concat(start));
          $(item).find($("input[name ^='product_unit_price']")).attr('id', "product_unit_price_".concat(start));
          $(item).find($(".remove-item-btn")).text("Remove item ".concat(start));
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
      var items = $("#edit-purchase-form").find($('.receipt-item'));
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
  }

  function deleteImage(image, image_id, product_id) {
    var imageName = $(image).attr("image_name");

    if (confirm("This image will be deleted permanently")) {
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
          401: function _(response) {
            window.location.href = '/auth/logout.php';
          }
        },
        success: function success(result) {
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
        error: function error(res) {
          Swal.fire({
            'icon': 'error',
            'text': ' Error: Could not delete image. Try again later',
            'timer': 2000
          });
        }
      });
    }
  } // Handles next stepper form operation..


  $("#add-purchase-modal-btn").click(function () {
    $("#add-purchase-form")[0].reset();
    $("#add-purchase-form").find('input').removeClass('is-invalid'); // Deactivate receipt items, details and pictures tabs first

    $("#add-receipt-items-tab").attr('data-toggle', '');
    $("#add-receipt-items-tab").css({
      cursor: 'not-allowed'
    });
    $("#add-receipt-details-tab").attr('data-toggle', '');
    $("#add-receipt-details-tab").css({
      cursor: 'not-allowed'
    });
    $("#add-receipt-picture-tab").attr('data-toggle', '');
    $("#add-receipt-picture-tab").css({
      cursor: 'not-allowed'
    });
    $("#add-modal-next").attr('current-tab', 'supplier'); // Cleanup after modal exit

    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-prev").addClass('d-none');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-supplier-details-tab").tab("show");
    $("#addPurchaseModal").modal("show");
  }); // Handle previous navigation

  $("#add-modal-prev").click(function () {
    var targetTab = $("#add-modal-prev").attr("target_tab");
    $(targetTab).tab("show");
  });
  $("#add-modal-next").click(function () {
    var tab_valid = true;
    var currentTab = $("#add-modal-next").attr('current-tab');

    if (currentTab == 'supplier') {
      // var tab_valid = validateFormInputs("add-supplier-details");
      // if(tab_valid) {
      $("#add-receipt-items-tab").attr('data-toggle', 'tab');
      $("#add-receipt-items-tab").css({
        cursor: 'pointer'
      });
      $("#add-modal-next").attr('current-tab', 'items');
      $("#add-receipt-items-tab").tab("show"); // }
    } else if (currentTab == 'items') {
      // var tab_valid = validateFormInputs("add-receipt-items");
      // if(tab_valid) {
      $("#add-receipt-details-tab").attr('data-toggle', 'tab');
      $("#add-receipt-details-tab").css({
        cursor: 'pointer'
      });
      $("#add-modal-next").attr('current-tab', 'details');
      $("#add-receipt-details-tab").tab("show"); // }
    } else if (currentTab == 'details') {
      // let tab_valid = validateFormInputs("add-receipt-details");
      // if(tab_valid) {
      $("#add-receipt-picture-tab").attr('data-toggle', 'tab');
      $("#add-receipt-picture-tab").css({
        cursor: 'pointer'
      });
      $("#add-modal-next").attr('current-tab', 'picture');
      $("#add-modal-next").addClass('d-none');
      $("#add-purchase-submit").removeClass("d-none");
      $("#add-receipt-picture-tab").tab("show"); // }
    }
  }); // Listen to tab changes..

  $("#add-receipt-items-tab").on('show.bs.tab', function (e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'items');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-modal-prev").attr('target_tab', '#add-supplier-details-tab');
    $("#add-modal-prev").removeClass('d-none');
  });
  $("#add-supplier-details-tab").on('show.bs.tab', function (e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'supplier');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-modal-prev").addClass('d-none');
  });
  $("#add-receipt-details-tab").on('show.bs.tab', function (e) {
    $("#add-modal-next").removeClass('d-none');
    $("#add-modal-next").attr('current-tab', 'details');
    $("#add-purchase-submit").addClass('d-none');
    $("#add-modal-prev").attr('target_tab', '#add-receipt-items-tab');
    $("#add-modal-prev").removeClass('d-none');
  });
  $("#add-receipt-picture-tab").on('show.bs.tab', function (e) {
    $("#add-modal-next").addClass('d-none');
    $("#add-modal-next").attr('current-tab', 'picture');
    $("#add-purchase-submit").removeClass('d-none');
    $("#add-modal-prev").attr('target_tab', '#add-receipt-details-tab');
    $("#add-modal-prev").removeClass('d-none');
  }); // Preview add-receipt images

  $("#add-image").change(function (e) {
    var target = e.target;
    var imagePreviewContainer = $("#add-image-preview__container");
    var previewDimensions = {
      height: 250,
      width: "100%"
    };
    imagesPreview(e.target, imagePreviewContainer, "add", previewDimensions);
  }); // Preview edit-receipt images

  $("#edit-image").change(function (e) {
    var target = e.target;
    var imagePreviewContainer = $("#edit-image-preview__container");
    var previewDimensions = {
      height: 250,
      width: "100%"
    };
    imagesPreview(e.target, imagePreviewContainer, "edit", previewDimensions);
  });
});

/***/ }),

/***/ 2:
/*!*****************************************!*\
  !*** multi ./resources/js/purchases.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\williescant\resources\js\purchases.js */"./resources/js/purchases.js");


/***/ })

/******/ });