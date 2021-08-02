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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboard-page-scripts.js":
/*!************************************************!*\
  !*** ./resources/js/dashboard-page-scripts.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).on('ready', function () {
    $('.js-overall-income-chart').each(function (i, el) {
      var chart = new Chart(el, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
            label: 'Total Income',
            borderColor: 'rgba(107,21,182,0.6)',
            backgroundColor: 'rgba(107,21,182,0.6)',
            data: [0, 2700, 2600, 2550, 4000, 10000, 20000, 10000, 5000, 6000, 5500, 3000]
          }, {
            label: 'Total Installs',
            borderColor: 'rgba(41,114,250,0.6)',
            backgroundColor: 'rgba(41,114,250,0.6)',
            data: [2700, 2000, 3000, 18000, 10000, 5000, 4000, 5000, 8000, 5000, 2000, 2100]
          }, {
            label: 'Active Users',
            borderColor: 'rgba(97,200,167,0.6)',
            backgroundColor: 'rgba(97,200,167,0.6)',
            data: [0, 2000, 3500, 4000, 3500, 2000, 2100, 5500, 15000, 5500, 2000, 2100]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            },
            line: {
              borderWidth: 1
            }
          },
          scales: {
            xAxes: [{
              gridLines: {
                borderDash: [8, 8],
                color: '#eaf2f9'
              },
              ticks: {
                fontFamily: 'Open Sans',
                fontColor: '#6e7f94'
              }
            }],
            yAxes: [{
              gridLines: {
                borderDash: [8, 8],
                color: '#eaf2f9'
              },
              ticks: {
                fontFamily: 'Open Sans',
                fontColor: '#6e7f94'
              }
            }]
          },
          tooltips: {
            enabled: false,
            intersect: 0,
            custom: function custom(tooltipModel) {
              // Tooltip Element
              var tooltipEl = document.getElementById('overallIncomeChartTooltip' + i); // Create element on first render

              if (!tooltipEl) {
                tooltipEl = document.createElement('div');
                tooltipEl.id = 'overallIncomeChartTooltip' + i;
                tooltipEl.className = 'u-chart-tooltip';
                tooltipEl.innerHTML = '<div class="u-tooltip-body"></div>';
                document.body.appendChild(tooltipEl);
              } // Hide if no tooltip


              if (tooltipModel.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
              } // Set caret Position


              tooltipEl.classList.remove('above', 'below', 'no-transform');

              if (tooltipModel.yAlign) {
                tooltipEl.classList.add(tooltipModel.yAlign);
              } else {
                tooltipEl.classList.add('no-transform');
              }

              function getBody(bodyItem) {
                return bodyItem.lines;
              } // Set Text


              if (tooltipModel.body) {
                var titleLines = tooltipModel.title || [],
                    bodyLines = tooltipModel.body.map(getBody),
                    innerHtml = '<h4 class="u-chart-tooltip__title">';
                titleLines.forEach(function (title) {
                  innerHtml += title;
                });
                innerHtml += '</h4>';
                bodyLines.forEach(function (body, i) {
                  var colors = tooltipModel.labelColors[i];
                  innerHtml += '<div class="u-chart-tooltip__value">' + body + '</div>';
                });
                var tableRoot = tooltipEl.querySelector('.u-tooltip-body');
                tableRoot.innerHTML = innerHtml;
              } // `this` will be the overall tooltip


              var $self = this,
                  position = $self._chart.canvas.getBoundingClientRect(),
                  tooltipWidth = $(tooltipEl).outerWidth(),
                  tooltipHeight = $(tooltipEl).outerHeight(); // Display, position, and set styles for font


              tooltipEl.style.opacity = 1;
              tooltipEl.style.left = position.left + tooltipModel.caretX - tooltipWidth / 2 + 'px';
              tooltipEl.style.top = position.top + tooltipModel.caretY - tooltipHeight - 15 + 'px';
              $(window).on('scroll', function () {
                var position = $self._chart.canvas.getBoundingClientRect(),
                    tooltipWidth = $(tooltipEl).outerWidth(),
                    tooltipHeight = $(tooltipEl).outerHeight(); // Display, position, and set styles for font


                tooltipEl.style.left = position.left + tooltipModel.caretX - tooltipWidth / 2 + 'px';
                tooltipEl.style.top = position.top + tooltipModel.caretY - tooltipHeight - 15 + 'px';
              });
            }
          }
        }
      });
    });
    $('.js-doughnut-chart').each(function (i, el) {
      var data = JSON.parse(el.getAttribute('data-set')),
          colors = JSON.parse(el.getAttribute('data-colors'));
      var chart = new Chart(el, {
        type: 'doughnut',
        data: {
          datasets: [{
            backgroundColor: colors,
            data: data
          }]
        },
        options: {
          legend: {
            display: false
          },
          tooltips: {
            enabled: false
          },
          cutoutPercentage: 87
        }
      });
    });
  });
})(jQuery);

/***/ }),

/***/ 8:
/*!******************************************************!*\
  !*** multi ./resources/js/dashboard-page-scripts.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/williescant/resources/js/dashboard-page-scripts.js */"./resources/js/dashboard-page-scripts.js");


/***/ })

/******/ });