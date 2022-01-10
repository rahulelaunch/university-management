'use strict';

$(document).ready(function () {
    console.log('rahul');
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
                data: function (data) {
                    return `
                    <span class="badge outline-badge-danger">
                      <a href="#" id="btnDelete" data-id="${data.id}">Delete</a>
                    </span>`;
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

    $(document).on('submit', '#expenseForm', function (e) {
        e.preventDefault();
      
        $.ajax({
            url: route('university.colleges.store'),
            type: 'post',
            data: $(this).serialize(),
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
});
