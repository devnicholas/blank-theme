/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/scripts.js":
/*!******************************!*\
  !*** ./assets/js/scripts.js ***!
  \******************************/
/***/ (() => {

eval("$(document).ready(function () {\r\n  $(\".active-menu-mobile\").on(\"click\", function () {\r\n    $(\"#sidebar-container\").animate({ left: 0 });\r\n  });\r\n  $(\".desactive-menu-mobile\").on(\"click\", function () {\r\n    $(\"#sidebar-container\").animate({ left: \"-100%\" });\r\n  });\r\n  $(\".slider\").slick({\r\n    autoplay: true,\r\n    autoplaySpeed: 5000,\r\n  });\r\n});\r\n\n\n//# sourceURL=webpack://blank-theme/./assets/js/scripts.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./assets/js/scripts.js"]();
/******/ 	
/******/ })()
;