'use strict';

$(document).ready(function () {

    let tablename = $('#commonSettingTable');
    let url = route('university.common-Settings.index');
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
                data:function (row){
                    return row.subject.name;
                },
                name:'subject.name'
            },
            {
                data: 'marks',
                name: 'marks'
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
        deleteItem(route('university.common-Settings.destroy',id), tablename, 'Collage');
    });

  
});
