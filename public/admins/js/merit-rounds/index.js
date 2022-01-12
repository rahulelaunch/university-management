/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/merit-rounds/index.js ***!
  \********************************************/


$(document).ready(function () {
  var tablename = $('#meritRoundTable');
  var url = route('university.merit-rounds.index');
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
      'targets': [7],
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
      data: 'round_no',
      name: 'round_no'
    }, {
      data: function data(row) {
        return row.course.name;
      },
      name: 'course.name'
    }, {
      data: 'start_date',
      name: 'start_date'
    }, {
      data: 'end_date',
      name: 'end_date'
    }, {
      data: 'merit_result_declare_date',
      name: 'merit_result_declare_date'
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
      url: route('university.merit-rounds.store'),
      type: 'post',
      data: $(this).serialize(),
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
      url: route('university.merit-rounds.edit', id),
      type: 'get',
      success: function success(result) {
        $('.round_no').val(result.data.round_no);
        $('.course_id').val(result.data.course_id);
        $('.start_date').val(result.data.start_date);
        $('.end_date').val(result.data.end_date);
        $('.merit_result_declare_date').val(result.data.merit_result_declare_date);
        $('#expenseId').val(result.data.id);
        $('#editModal').modal('show');
      }
    });
  });
  $(document).on('submit', '#editForm', function (e) {
    e.preventDefault();
    var id = $('#expenseId').val();
    $.ajax({
      url: route('university.meritRound.update', id),
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
    deleteItem(route('university.merit-rounds.destroy', id), tablename, 'Merit-Round');
  });
  $(document).on('click', '#statusCheckBox', function () {
    var status = $(this).is(':checked') ? 1 : 0;
    var id = $(this).attr('data-id');
    $.ajax({
      url: route('university.meritRounds-change-status', id),
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