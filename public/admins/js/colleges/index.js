/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/colleges/index.js ***!
  \****************************************/
$(document).ready(function () {
  alert();
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
        return "\n                    <span class=\"badge outline-badge-primary\">\n                    <a href=\"#\">Edit</a>\n                    </span>\n                   <br><br>\n                   <span class=\"badge outline-badge-success\">\n                    <a href=\"#\">Show</a>\n                    </span> \n                    <br><br>\n                    <span class=\"badge outline-badge-danger\">\n                      <a href=\"#\" id=\"btnDelete\" data-id=\"".concat(_data.id, "\">Delete</a>\n                    </span>");
      },
      name: 'id'
    }]
  });
});
/******/ })()
;