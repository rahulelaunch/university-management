/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/courses/index.js ***!
  \***************************************/


$(document).ready(function () {
  var tablename = $('#courseTable');
  var url = route('university.courses.index');
  tablename.DataTable({
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
      url: url
    },
    columnDefs: [{
      'targets': [3],
      'className': 'text-center',
      'width': '5%'
    }],
    columns: [{
      "data": null,
      "sortable": false,
      "searchable": false,
      render: function render(data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    }, {
      data: 'name',
      name: 'name'
    }, {
      data: function data(row) {
        return "<label class=\"switch\">\n                        <input data-id=\"".concat(row.id, "\" type=\"checkbox\" id=\"statusCheckBox\" ").concat(row.status == 1 ? 'checked' : '', ">\n                        <span class=\"slider round\"></span>\n                      </label>\n                        ");
      },
      name: 'id'
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
  $(document).on('submit', '#expenseForm', function (e) {
    e.preventDefault();
    $.ajax({
      url: route('university.courses.store'),
      type: 'post',
      data: new FormData($(this)[0]),
      contentType: false,
      processData: false,
      success: function success(result) {
        displaySuccessMessage('Course created successfully.');
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
    deleteItem(route('university.courses.destroy', id), tablename, 'Collage');
  });
  $(document).on('click', '#statusCheckBox', function () {
    var status = $(this).is(':checked') ? 1 : 0;
    var id = $(this).attr('data-id');
    $.ajax({
      url: route('university.course-change-status', id),
      type: 'POST',
      data: {
        'status': status
      },
      success: function success(result) {
        displaySuccessMessage('Collage status changed successfully.');
        tablename.DataTable().ajax.reload(null, false);
      }
    });
  });
});
/******/ })()
;