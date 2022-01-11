'use strict';

$(document).ready(function () {
    let tablename = $('#collegeTable');
    let url = route('university.colleges.index');
    // let indexUrl;
    tablename.DataTable({
        deferRender: true,
        scroller: true,
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: url,
        },
        columnDefs: [

        ],
        columns: [
            {
                "data": null,
                "sortable": false,
                "searchable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },

            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'contact_no',
                name: 'contact_no'
            },
            {
                data: 'address',
                name: 'address'
            },

            {
                data:function (row){
                     return `<img  class="rounded-circle" src="${row.logo}" height="50" width="50">`
                },
                name: 'logo'
            },
            {
                data:function(row){
                        return `<label class="switch">
                        <input data-id="${row.id}" type="checkbox" id="statusCheckBox" ${row.status == 1 ? 'checked' : ''}>
                        <span class="slider round"></span>
                      </label>
                        `;
                },
                name:'id',
            },
            {
                data: function (data) {
                    return `
                    
                      <a href="#" class="btn btn-danger" id="btnDelete" data-id="${data.id}">Delete</a>`;
                },
                name: 'id',
            }    
         
        ],
    });

    $(document).on('click', '#addExpenses', function () {
        $('#expenseModal').appendTo('body').modal('show');
    });

    $('#expenseModal').on('hidden.bs.modal', function () {
        $('#expenseForm')[0].reset();
    });

    $.validator.addMethod("pwcheck", function(value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$/i.test(value);
    });

    $('#expenseForm').validate({

        rules:{
                'name':{
                    required:true,
                },
                'email':{
                    required:true,
                },
                'password':{
                    required:true,
                    pwcheck: true,
                    minlength: 8
                },
                'contact_no':{
                    required:true,
                    maxlength:10
                },
                'address':{
                    required:true,
                },
                'logo':{
                    required:true,
                },
        },
        messages:{
            'name':{
                required:'This College Name is required',
            },
            'email':{
                required:'This College Email is required'
            },
            'contact_no':{
                required:'This College No. is required',
                maxlength: "Please Enter Maximum 10 number!"
            },
            'password':{
                required:'This College Password is required',
                pwcheck: "Password must contain one capital letter,one numerical and one special character",
                minlength: "Please Enter Minimim 8 Character!"
            },
            'address':{
                required:'This College Address is required'
            },
            'logo':{
                required:'This College Logo is required'
            },
        },
        submitHandler:function(form){
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
            success: function (result) {
                displaySuccessMessage('College created successfully.');
                $('#expenseModal').modal('hide');
                tablename.DataTable().ajax.reload(null, false);
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    $(document).on('click', '#btnDelete', function (){
        let id = $(this).data('id');
        deleteItem(route('university.colleges.destroy',id), tablename, 'Collage');
    });

    $(document).on('click','#statusCheckBox', function(){
        let status = $(this).is(':checked') ? 1 : 0;
        let id = $(this).attr('data-id');
        $.ajax({
            url:route('university.change-status',id),
            type:'POST',
            data:{'status':status},
            success: function(result){
                displaySuccessMessage('Collage status changed successfully.');
                tablename.DataTable().ajax.reload(null, false);
            }
        })
    });
});
