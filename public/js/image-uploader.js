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

/***/ "./resources/js/image-uploader.js":
/*!****************************************!*\
  !*** ./resources/js/image-uploader.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*! Image Uploader - v1.0.0 - 15/07/2019
 * Copyright (c) 2019 Christian Bayer; Licensed MIT */
(function ($) {
  $.fn.imageUploader = function (options) {
    // Default settings
    var defaults = {
      preloaded: [],
      imagesInputName: 'images',
      preloadedInputName: 'preloaded',
      label: 'Drag & Drop files here or click to browse'
    }; // Get instance

    var plugin = this; // Set empty settings

    plugin.settings = {}; // Plugin constructor

    plugin.init = function () {
      // Define settings
      plugin.settings = $.extend(plugin.settings, defaults, options); // Run through the elements

      plugin.each(function (i, wrapper) {
        // Create the container
        var $container = createContainer(); // Append the container to the wrapper

        $(wrapper).append($container); // Set some bindings

        $container.on("dragover", fileDragHover.bind($container));
        $container.on("dragleave", fileDragHover.bind($container));
        $container.on("drop", fileSelectHandler.bind($container)); // If there are preloaded images

        if (plugin.settings.preloaded.length) {
          // Change style
          $container.addClass('has-files'); // Get the upload images container

          var $uploadedContainer = $container.find('.uploaded'); // Set preloaded images preview

          for (var _i = 0; _i < plugin.settings.preloaded.length; _i++) {
            $uploadedContainer.append(createImg(plugin.settings.preloaded[_i].src, plugin.settings.preloaded[_i].id, true));
          }
        }
      });
    };

    var dataTransfer = new DataTransfer();

    var createContainer = function createContainer() {
      // Create the image uploader container
      var $container = $('<div>', {
        "class": 'image-uploader'
      }),
          // Create the input type file and append it to the container
      $input = $('<input>', {
        type: 'file',
        id: plugin.settings.imagesInputName + '-' + random(),
        name: plugin.settings.imagesInputName + '[]',
        multiple: ''
      }).appendTo($container),
          // Create the uploaded images container and append it to the container
      $uploadedContainer = $('<div>', {
        "class": 'uploaded'
      }).appendTo($container),
          // Create the text container and append it to the container
      $textContainer = $('<div>', {
        "class": 'upload-text'
      }).appendTo($container),
          // Create the icon and append it to the text container
      $i = $('<i>', {
        "class": 'material-icons',
        text: 'cloud_upload'
      }).appendTo($textContainer),
          // Create the text and append it to the text container
      $span = $('<span>', {
        text: plugin.settings.label
      }).appendTo($textContainer); // Listen to container click and trigger input file click

      $container.on('click', function (e) {
        // Prevent browser default event and stop propagation
        prevent(e); // Trigger input click

        $input.trigger('click');
      }); // Stop propagation on input click

      $input.on("click", function (e) {
        e.stopPropagation();
      }); // Listen to input files changed

      $input.on('change', fileSelectHandler.bind($container));
      return $container;
    };

    var prevent = function prevent(e) {
      // Prevent browser default event and stop propagation
      e.preventDefault();
      e.stopPropagation();
    };

    var createImg = function createImg(src, id) {
      // Create the upladed image container
      var $container = $('<div>', {
        "class": 'uploaded-image'
      }),
          // Create the img tag
      $img = $('<img>', {
        src: src
      }).appendTo($container),
          // Create the delete button
      $button = $('<button>', {
        "class": 'delete-image'
      }).appendTo($container),
          // Create the delete icon
      $i = $('<i>', {
        "class": 'material-icons',
        text: 'clear'
      }).appendTo($button); // If the images are preloaded

      if (plugin.settings.preloaded.length) {
        // Set a identifier
        $container.attr('data-preloaded', true); // Create the preloaded input and append it to the container

        var $preloaded = $('<input>', {
          type: 'hidden',
          name: plugin.settings.preloadedInputName + '[]',
          value: id
        }).appendTo($container);
      } else {
        // Set the identifier
        $container.attr('data-index', id);
      } // Stop propagation on click


      $container.on("click", function (e) {
        // Prevent browser default event and stop propagation
        prevent(e);
      }); // Set delete action

      $button.on("click", function (e) {
        // Prevent browser default event and stop propagation
        prevent(e); // If is not a preloaded image

        if ($container.data('index')) {
          // Get the image index
          var index = parseInt($container.data('index')); // Update other indexes

          $container.find('.uploaded-image[data-index]').each(function (i, cont) {
            if (i > index) {
              $(cont).attr('data-index', i - 1);
            }
          }); // Remove the file from input

          dataTransfer.items.remove(index);
        } // Remove this image from the container


        $container.remove(); // If there is no more uploaded files

        if (!$container.find('.uploaded-image').length) {
          // Remove the 'has-files' class
          $container.removeClass('has-files');
        }
      });
      return $container;
    };

    var fileDragHover = function fileDragHover(e) {
      // Prevent browser default event and stop propagation
      prevent(e); // Change the container style

      if (e.type === "dragover") {
        $(this).addClass('drag-over');
      } else {
        $(this).removeClass('drag-over');
      }
    };

    var fileSelectHandler = function fileSelectHandler(e) {
      // Prevent browser default event and stop propagation
      prevent(e); // Get the jQuery element instance

      var $container = $(this); // Change the container style

      $container.removeClass('drag-over'); // Get the files

      var files = e.target.files || e.originalEvent.dataTransfer.files; // Makes the upload

      setPreview($container, files);
    };

    var setPreview = function setPreview($container, files) {
      // Add the 'has-files' class
      $container.addClass('has-files'); // Get the upload images container

      var $uploadedContainer = $container.find('.uploaded'),
          // Get the files input
      $input = $container.find('input[type="file"]'); // Run through the files

      $(files).each(function (i, file) {
        // Add it to data transfer
        dataTransfer.items.add(file); // Set preview

        $uploadedContainer.append(createImg(URL.createObjectURL(file), dataTransfer.items.length - 1));
      }); // Update input files

      $input.prop('files', dataTransfer.files);
    }; // Generate a random id


    var random = function random() {
      return Date.now() + Math.floor(Math.random() * 100 + 1);
    };

    this.init(); // Return the instance

    return this;
  };
})(jQuery);

/***/ }),

/***/ 6:
/*!**********************************************!*\
  !*** multi ./resources/js/image-uploader.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\williescant\resources\js\image-uploader.js */"./resources/js/image-uploader.js");


/***/ })

/******/ });