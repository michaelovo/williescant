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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

(function ($) {
  $(document).on('ready', function () {
    // Tooltips & Popovers
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover(); // Dismiss Popovers on next click

    $('.popover-dismiss').popover({
      trigger: 'focus'
    }); // Datatables integration

    $('.table_dt').DataTable(); // Custom Scroll

    $('.u-sidebar').mCustomScrollbar({
      scrollbarPosition: 'outside',
      scrollInertia: 150
    }); //Removing images from add product modal view

    $(document).on('click', '.deleteImageBtn', function () {
      var image = $(this).attr('data-id');
      $(this).parent().remove();
      var images = document.getElementById('add-image').files;
      images[image]['isvalid'] = false;
      var inputValid = false;

      var _iterator = _createForOfIteratorHelper(images),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var img = _step.value;

          if (img['isvalid'] == true) {
            inputValid = true;
          }
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }

      if (!inputValid) {
        images = Array.from(images);
        document.getElementById('add-image').value = '';
      }
    }); //Removing images from edit Product modal view

    $(document).on('click', '.deleteEditImageBtn', function () {
      var image = $(this).attr('data-id');
      $(this).parent().remove();
      var images = document.getElementById('edit-image').files;
      images[image]['isvalid'] = false;
      var inputValid = false;

      var _iterator2 = _createForOfIteratorHelper(images),
          _step2;

      try {
        for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
          var img = _step2.value;

          if (img['isvalid'] == true) {
            inputValid = true;
          }
        }
      } catch (err) {
        _iterator2.e(err);
      } finally {
        _iterator2.f();
      }

      var oldItemCount = parseInt($('#edit-image').attr('oldImgCount'));

      if (!inputValid && oldItemCount < 1) {
        images = Array.from(images);
        document.getElementById('edit-image').value = '';
      }
    });
  });
})(jQuery); // A Swal mixin for timed alerts.


var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: function onOpen(toast) {
    toast.addEventListener('mouseenter', Swal.stopTimer);
    toast.addEventListener('mouseleave', Swal.resumeTimer);
  }
});
/**
 * Image Preview Function.
 * Renders the images preview to add and edit product forms
 */

var imagesPreview = function imagesPreview(input, placeToInsertImagePreview, type) {
  var previewDimensions = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
  $(placeToInsertImagePreview).html(""); //Clear Preview after every Image selection..

  if (input.files) {
    // console.log(input.files)
    var action = type == 'add' ? 'deleteImageBtn' : 'deleteEditImageBtn';
    var filesAmount = input.files.length;

    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();
      var count = 0;
      var file = input.files[i];

      reader.onload = function (event) {
        var imgContainer = $($.parseHTML("\n          <div class=\"card form-group col-md-5 mr-1 mt-2\">\n          </div>\n          "));
        var height = 75;
        var width = "100%";

        if (previewDimensions) {
          width = previewDimensions.width;
          height = previewDimensions.height;
        }

        var image = $($.parseHTML("<img alt=\"".concat(file['name'], "\" id=\"").concat(action, "-image-preview__item\" height=\"").concat(height, "\" width=").concat(width, ">"))).attr('src', event.target.result);
        image.appendTo($(imgContainer));
        var deleteBtn = $($.parseHTML("\n            <button class=\"btn btn-sm btn-outline-danger mt-1 ".concat(action, "\" img-name=\"").concat(file['name'], "\" type=\"button\">\n              Remove\n            </button>\n            "))).attr('data-id', count);
        deleteBtn.appendTo(imgContainer);
        imgContainer.appendTo(placeToInsertImagePreview);
        count += 1;
      };

      reader.readAsDataURL(input.files[i]);
      input.files[i]['isvalid'] = true; // A check to confirm which image actually gets send to backend for processing.
    }
  }
};
/**
 * Calculates the monthly date boundaries and returns the first and the last date of the
 * current month.
 */


function getMonthDateBounds() {
  var today = new Date();
  m = today.getMonth();
  y = today.getFullYear();
  start = new Date(y, m, 1); //first day of current month

  end = new Date(y, m + 1, 0); //last day of current month

  startDateString = "".concat(start.getFullYear(), "-").concat(start.getMonth() + 1, "-").concat(start.getDate());
  endDateString = "".concat(end.getFullYear(), "-").concat(end.getMonth() + 1, "-").concat(end.getDate());
  return [startDateString, endDateString];
}
/**
 * Validates form inputs to check if there are empty fields on the required fields
 * @param {String} form
 * @param {Boolean} markInvalid
 */


function validateFormInputs(form) {
  var markInvalid = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  var tabValid = true;
  var formFields = $("#".concat(form)).find('input[required]');

  for (var _i = 0; _i < formFields.length; _i++) {
    if ($(formFields[_i]).val().length == 0) {
      if (markInvalid) {
        $(formFields[_i]).addClass('is-invalid');
      }

      tabValid = false;
    } else {
      $(formFields[_i]).removeClass('is-invalid');
    }
  }

  return tabValid;
}

/***/ }),

/***/ 6:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\williescant\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });