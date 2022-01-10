/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/colleges/index.js ***!
  \****************************************/


$(document).ready(function () {
  console.log('rahul');
  var tablename = $('#collegeTable');
  var url = route('university.colleges.index'); // let indexUrl;

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
        return "\n                    <span class=\"badge outline-badge-danger\">\n                      <a href=\"#\" id=\"btnDelete\" data-id=\"".concat(_data.id, "\">Delete</a>\n                    </span>");
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
  $(document).on('submit', '#expenseForm', function (e) {
    e.preventDefault();
    $.ajax({
      url: route('university.colleges.store'),
      type: 'post',
      data: $(this).serialize(),
      success: function success(result) {
        displaySuccessMessage('College created successfully.');
        $('#expenseModal').modal('hide');
        tablename.DataTable().ajax.reload(null, false);
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
  $(document).on('click', '#btnDelete', function () {
    var id = $(this).data('id');
    deleteItem(route('university.colleges.destroy', id), tablename, 'Collage');
  });
});
/******/ })()
;