/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/college-courses/index.js ***!
  \***********************************************/


$(document).ready(function () {
  var tablename = $('#collegeCourseTable');
  var url = route('college.college-courses.index');
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
      'targets': [6],
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
      data: function data(row) {
        return row.college.name;
      },
      name: 'college.name'
    }, {
      data: function data(row) {
        return row.course.name;
      },
      name: 'course.name'
    }, {
      data: 'merit_seat',
      name: 'merit_seat'
    }, {
      data: 'reserved_seat',
      name: 'reserved_seat'
    }, {
      data: 'seat_no',
      name: 'seat_no'
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
      url: route('college.college-courses.store'),
      type: 'post',
      data: $(this).serialize(),
      success: function success(result) {
        displaySuccessMessage('Setting created successfully.');
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
      url: route('college.college-courses.edit', id),
      type: 'get',
      success: function success(result) {
        $('.course_id').val(result.data.course_id);
        $('#expenseId').val(result.data.id);
        $('.merit_seat').val(result.data.merit_seat);
        $('.reserved_seat').val(result.data.reserved_seat);
        $('#editModal').modal('show');
      }
    });
  });
  $(document).on('submit', '#editForm', function (e) {
    e.preventDefault();
    var id = $('#expenseId').val();
    $.ajax({
      url: route('college.collegeCourses.update', id),
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
    deleteItem(route('college.college-courses.destroy', id), tablename, 'College-Course');
  });
});
/******/ })()
;