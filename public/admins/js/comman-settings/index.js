/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/comman-settings/index.js ***!
  \***********************************************/


$(document).ready(function () {
  var tablename = $('#commonSettingTable');
  var url = route('university.common-Settings.index'); // let indexUrl;

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
      data: function data(row) {
        return row.subject.name;
      },
      name: 'subject.name'
    }, {
      data: 'marks',
      name: 'marks'
    }, {
      data: function data(_data) {
        return "\n                    \n                      <a href=\"#\" class=\"btn btn-danger\" id=\"btnDelete\" data-id=\"".concat(_data.id, "\">Delete</a>");
      },
      name: 'id'
    }]
  });
  $(document).on('click', '#addExpenses', function () {
    $('#expenseModal').appendTo('body').modal('show');
  });
  $('#expenseModal').on('hidden.bs.modal', function () {
    $('#expenseForm')[0].reset();
  });
  $(document).on('click', '#btnDelete', function () {
    var id = $(this).data('id');
    deleteItem(route('university.common-Settings.destroy', id), tablename, 'Collage');
  });
});
/******/ })()
;