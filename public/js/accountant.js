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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/accountant.js":
/*!************************************!*\
  !*** ./resources/js/accountant.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // Setup nominate new accountant modal
  $('#nominateNewModal').on('show.bs.modal', function () {
    // First de-activate the next tab..
    $('#add-accountant-permissions-tab').attr('data-toggle', '');
    $('#add-accountant-permissions-tab').css({
      cursor: 'not-allowed'
    }); // Ensure that the details tab is selected and shown..

    $('#add-accountant-details-tab').attr('data-toggle', 'tab');
    $('#add-accountant-details-tab').css({
      cursor: 'pointer'
    });
    $('#add-accountant-details-tab').tab('show'); // then reset the form

    $('#nominate-new-form')[0].reset(); // Then reset the navigation buttons

    $('#nominate-new-next').removeClass('d-none').attr('current-tab', 'details');
    $('#nominate-new-submit').addClass('d-none');
    $('#nominate-new-prev').attr('target_tab', '').addClass('d-none');
  }); // Handle next button click on nominate new modal

  $('#nominate-new-next').click(function () {
    var tab_valid = true;
    var currentTab = $('#nominate-new-next').attr('current-tab');

    if (currentTab == 'details') {
      tab_valid = validateFormInputs('nominate-new-form');

      if (tab_valid) {
        // Now toggle the permissions tab to be visible
        $('#add-accountant-permissions-tab').attr('data-toggle', 'tab');
        $('#add-accountant-permissions-tab').css({
          cursor: 'pointer'
        });
        $('#nominate-new-next').attr('current-tab', 'permissions');
        $('#add-accountant-permissions-tab').tab('show');
      }
    }
  }); // Handle previous navigation

  $('#nominate-new-prev').click(function () {
    var targetTab = $('#nominate-new-prev').attr('target_tab');
    $(targetTab).tab('show');
  }); // Listen to tab changes for each tab

  $('#add-accountant-details-tab').on('show.bs.tab', function (e) {
    $('#nominate-new-next').removeClass('d-none');
    $('#nominate-new-next').attr('current-tab', 'details');
    $('#nominate-new-submit').addClass('d-none');
    $('#nominate-new-prev').attr('target_tab', '');
    $('#nominate-new-prev').addClass('d-none');
  });
  $('#add-accountant-permissions-tab').on('show.bs.tab', function (e) {
    // Hide next button then make submit and previous buttons visible
    $('#nominate-new-next').addClass('d-none');
    $('#nominate-new-next').attr('current-tab', '');
    $('#nominate-new-submit').removeClass('d-none');
    $('#nominate-new-prev').attr('target_tab', '#add-accountant-details-tab');
    $('#nominate-new-prev').removeClass('d-none');
  }); // Handle submit nominate-new-accountant form

  $('#nominate-new-form').submit(function (e) {
    e.preventDefault();
    var formData = new FormData($('#nominate-new-form')[0]);
    $('#new-accountant-modal-success').addClass('d-none');
    $('#new-accountant-modal-errors').addClass('d-none');
    $.ajax({
      type: 'POST',
      url: '/supplier/staff/accountants/nominate-new.php',
      data: formData,
      processData: false,
      contentType: false,
      statusCode: {
        401: function _(response) {
          window.location.href = '/auth/logout.php';
        }
      },
      success: function success(res) {
        // Backend returns content-type json headers so no need of parsing JSON
        if (res['success']) {
          $('#new-accountant-modal-success').removeClass('d-none');
          $('#new-accountant-modal-errors').addClass('d-none');
          window.location.reload();
        } else {
          $('#new-accountant-modal-success').addClass('d-none');
          $('#new-accountant-modal-errors').removeClass('d-none');
          $('#new-accountant-modal-errors').find('span').text(res['error']);
        }
      },
      error: function error(err) {
        $('#new-accountant-modal-success').addClass('d-none');
        $('#new-accountant-modal-errors').removeClass('d-none');
        $('#new-accountant-modal-errors').find('span').text('Server Error. Failed to nominate accountant. Try again later.');
      }
    });
  });
});

/***/ }),

/***/ 3:
/*!******************************************!*\
  !*** multi ./resources/js/accountant.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\williescant\resources\js\accountant.js */"./resources/js/accountant.js");


/***/ })

/******/ });