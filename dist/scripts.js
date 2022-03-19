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

/***/ "./assets/js/customizer.js":
/*!*********************************!*\
  !*** ./assets/js/customizer.js ***!
  \*********************************/
/***/ (() => {

eval("/* global wp, jQuery */\r\n/**\r\n * File customizer.js.\r\n *\r\n * Theme Customizer enhancements for a better user experience.\r\n *\r\n * Contains handlers to make Theme Customizer preview reload changes asynchronously.\r\n */\r\n\r\n( function( $ ) {\r\n\t// Site title and description.\r\n\twp.customize( 'blogname', function( value ) {\r\n\t\tvalue.bind( function( to ) {\r\n\t\t\t$( '.site-title a' ).text( to );\r\n\t\t} );\r\n\t} );\r\n\twp.customize( 'blogdescription', function( value ) {\r\n\t\tvalue.bind( function( to ) {\r\n\t\t\t$( '.site-description' ).text( to );\r\n\t\t} );\r\n\t} );\r\n\r\n\t// Header text color.\r\n\twp.customize( 'header_textcolor', function( value ) {\r\n\t\tvalue.bind( function( to ) {\r\n\t\t\tif ( 'blank' === to ) {\r\n\t\t\t\t$( '.site-title, .site-description' ).css( {\r\n\t\t\t\t\tclip: 'rect(1px, 1px, 1px, 1px)',\r\n\t\t\t\t\tposition: 'absolute',\r\n\t\t\t\t} );\r\n\t\t\t} else {\r\n\t\t\t\t$( '.site-title, .site-description' ).css( {\r\n\t\t\t\t\tclip: 'auto',\r\n\t\t\t\t\tposition: 'relative',\r\n\t\t\t\t} );\r\n\t\t\t\t$( '.site-title a, .site-description' ).css( {\r\n\t\t\t\t\tcolor: to,\r\n\t\t\t\t} );\r\n\t\t\t}\r\n\t\t} );\r\n\t} );\r\n}( jQuery ) );\r\n\n\n//# sourceURL=webpack://blank-theme/./assets/js/customizer.js?");

/***/ }),

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
/******/ 	__webpack_modules__["./assets/js/customizer.js"]();
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./assets/js/scripts.js"]();
/******/ 	
/******/ })()
;