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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sidebar-nav.js":
/*!*************************************!*\
  !*** ./resources/js/sidebar-nav.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  var target = '.u-sidebar',
      $sidebarInvoker = $('.js-sidebar-invoker'),
      $body = $('body'),
      closeAllExceptThis = Boolean($sidebarInvoker.data('is-close-all-except-this')),
      windowWidth = window.innerWidth,
      closedItems = [];

  function closeEffect(target, closedItems) {
    var windowWidth = window.innerWidth;
    $(target).addClass('toggled');

    if (closedItems.length > 0 && windowWidth >= 768) {
      var items = closedItems.toString();
      $(items).slideUp(400, function () {
        $(target + '.toggled').addClass('action mini');
        $body.addClass('side-nav-on-action');
        $(items).parent().removeClass('u-sidebar-nav--opened');
      });
    } else {
      $(target + '.toggled').addClass('action mini');
      $body.addClass('side-nav-on-action');
    }
  }

  function openEffect(target, closedItems) {
    var windowWidth = window.innerWidth;
    $(target).removeClass('mini action toggled');
    $body.removeClass('side-nav-on-action');

    if (closedItems.length > 0 && windowWidth >= 768) {
      setTimeout(function () {
        $(closedItems.toString()).parent().addClass('u-sidebar-nav--opened');
        $('body:not(.sidebar-tablet-closed) ' + closedItems.toString()).slideDown(400);
      }, 300);
    }
  }

  $(window).on('load', function () {
    // Sidebar
    if ($('.u-sidebar-nav--opened').length) {
      $('.u-sidebar-nav--opened > .u-sidebar-nav-menu__link[data-target]').each(function () {
        closedItems.push($(this).data('target'));
      });
    }

    $sidebarInvoker.on('click', function (e) {
      e.preventDefault();
      $body.removeClass('sidebar-tablet-closed sidebar-mobile-closed');

      if ($(target).hasClass('toggled')) {
        openEffect(target, closedItems);
      } else {
        closeEffect(target, closedItems);
      }
    });
    $('.u-sidebar-nav-menu__link[data-target]').on('click', function (e) {
      e.preventDefault();
      var itemTarget = $(this).data('target');

      if (closeAllExceptThis) {
        closedItems = [];
        $('.u-sidebar-nav-menu--top-level ul:not("' + itemTarget + '")').slideUp(400).parent().removeClass('u-sidebar-nav--opened');
        $(itemTarget).slideToggle(400).parent().toggleClass('u-sidebar-nav--opened');

        if ($(this).parent().hasClass('u-sidebar-nav--opened')) {
          closedItems.push(itemTarget);
        }

        if ($body.hasClass('tablet-mode')) {
          $body.toggleClass('has-tablet-opened-items');
        }
      } else {
        closedItems.push(itemTarget);
        $(itemTarget).slideToggle(400).parent().toggleClass('u-sidebar-nav--opened');

        if ($body.hasClass('tablet-mode')) {
          $body.toggleClass('has-tablet-opened-items');
        }
      }
    });
    $(window).on('resize', function () {
      var windowWidth = window.innerWidth;

      if (windowWidth < 768) {
        $body.removeClass('tablet-mode desktop-mode side-nav-on-action sidebar-tablet-closed').addClass('mobile-mode sidebar-mobile-closed');
      } else if (windowWidth >= 768 && windowWidth <= 992) {
        $body.removeClass('mobile-mode sidebar-mobile-closed desktop-mode side-nav-on-action').addClass('tablet-mode sidebar-tablet-closed');
      } else {
        $body.removeClass('tablet-mode mobile-mode sidebar-mobile-closed sidebar-tablet-closed has-tablet-opened-items').addClass('desktop-mode');
      }

      if (windowWidth < 768) {
        $(target + '.toggled').removeClass('mini');
      } else if (windowWidth >= 768 && windowWidth <= 992) {
        $(target + '.toggled').addClass('mini');
      } else {
        $(target + '.toggled').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
          $(target + '.toggled').addClass('mini');
        });
      }

      if (windowWidth >= 768 && windowWidth <= 992) {
        $(target).addClass('tablet');

        if (!$body.hasClass('has-tablet-opened-items')) {
          closeEffect(target, closedItems);
        }
      } else {
        $(target).removeClass('tablet');

        if (!$body.hasClass('side-nav-on-action')) {
          openEffect(target, closedItems);
        } else if ($body.hasClass('side-nav-on-action desktop-mode')) {
          openEffect(target, closedItems);
        }
      }
    }).resize();
  });
})(jQuery);

/***/ }),

/***/ 7:
/*!*******************************************!*\
  !*** multi ./resources/js/sidebar-nav.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/williescant/resources/js/sidebar-nav.js */"./resources/js/sidebar-nav.js");


/***/ })

/******/ });