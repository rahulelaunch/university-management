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
      'width': '20%'
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
        return "\n                    <a href=\"#\" class=\"btn btn-primary edit-btn\" data-id=\"".concat(_data.id, "\">Edit</a>\n                      <a href=\"#\" class=\"btn btn-danger\" id=\"btnDelete\" data-id=\"").concat(_data.id, "\">Delete</a>");
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
  $(document).on('click', '.edit-btn', function () {
    var id = $(this).attr('data-id');
    $.ajax({
      url: route('university.courses.edit', id),
      type: 'get',
      success: function success(result) {
        $('.name').val(result.data.name);
        $('#expenseId').val(result.data.id);
        $('#editModal').modal('show');
      }
    });
  });
  $(document).on('submit', '#editForm', function (e) {
    e.preventDefault();
    var id = $('#expenseId').val();
    $.ajax({
      url: route('university.course.update', id),
      type: 'post',
      data: $(this).serialize(),
      success: function success(result) {
        displaySuccessMessage(result.message);
        tablename.DataTable().ajax.reload(null, false);
        $('#editModal').modal('hide');
      },
      error: function error(result) {
        displayErrorMessage(result);
      }
    });
  });
  $(document).on('click', '#btnDelete', function () {
    var id = $(this).data('id');
    deleteItem(route('university.courses.destroy', id), tablename, 'Course');
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
        displaySuccessMessage('Course status changed successfully.');
        tablename.DataTable().ajax.reload(null, false);
      }
    });
  });
});
/******/ })()
;