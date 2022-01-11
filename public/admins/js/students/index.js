/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/students/index.js ***!
  \****************************************/


$(document).ready(function () {
  var tablename = $('#studentTable');
  var url = route('university.students.index');
  tablename.DataTable({
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
      url: url
    },
    columnDefs: [],
    columns: [{
      data: 'name',
      name: 'name'
    }, {
      data: 'email',
      name: 'email'
    }, {
      data: 'contact_no',
      name: 'contact_no'
    }, {
      data: 'address',
      name: 'address'
    }, {
      data: function data(_data) {
        return "\n                    \n                      <a href=\"#\" class=\"btn btn-danger\" id=\"btnDelete\" data-id=\"".concat(_data.id, "\">Delete</a>");
      },
      name: 'id'
    }]
  });
  $(document).on('click', '#btnDelete', function () {
    var id = $(this).data('id');
    deleteItem(route('university.students.destroy', id), tablename, 'Student');
  });
});
/******/ })()
;