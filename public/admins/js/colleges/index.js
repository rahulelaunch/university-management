/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/colleges/index.js ***!
  \****************************************/


$(document).ready(function () {
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
      data: 'email',
      name: 'email'
    }, {
      data: 'contact_no',
      name: 'contact_no'
    }, {
      data: 'address',
      name: 'address'
    }, {
      data: function data(row) {
        return "<img  class=\"rounded-circle\" src=\"".concat(row.logo, "\" height=\"50\" width=\"50\">");
      },
      name: 'logo'
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
  $.validator.addMethod("pwcheck", function (value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$/i.test(value);
  });
  $('#expenseForm').validate({
    rules: {
      'name': {
        required: true
      },
      'email': {
        required: true
      },
      'password': {
        required: true,
        pwcheck: true,
        minlength: 8
      },
      'contact_no': {
        required: true,
        maxlength: 10
      },
      'address': {
        required: true
      },
      'logo': {
        required: true
      }
    },
    messages: {
      'name': {
        required: 'This College Name is required'
      },
      'email': {
        required: 'This College Email is required'
      },
      'contact_no': {
        required: 'This College No. is required',
        maxlength: "Please Enter Maximum 10 number!"
      },
      'password': {
        required: 'This College Password is required',
        pwcheck: "Password must contain one capital letter,one numerical and one special character",
        minlength: "Please Enter Minimim 8 Character!"
      },
      'address': {
        required: 'This College Address is required'
      },
      'logo': {
        required: 'This College Logo is required'
      }
    },
    submitHandler: function submitHandler(form) {
      CustomerAdd(form);
    },
    highlight: function highlight(element, errorClass, validClass) {
      $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
      $(element).parents(".error").removeClass(errorClass).addClass(validClass);
    }
  });
  $(document).on('submit', '#expenseForm', function (e) {
    e.preventDefault();
    $.ajax({
      url: route('university.colleges.store'),
      type: 'post',
      data: new FormData($(this)[0]),
      contentType: false,
      processData: false,
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
  $(document).on('click', '#statusCheckBox', function () {
    var status = $(this).is(':checked') ? 1 : 0;
    var id = $(this).attr('data-id');
    $.ajax({
      url: route('university.change-status', id),
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