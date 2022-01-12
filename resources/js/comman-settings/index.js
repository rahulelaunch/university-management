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
         {
             'targets':[3],
             'className':'text-center',
             'width':'20%', 
         }
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
                data:function (row){
                    return row.subject.name;
                },
                name:'subject.name'
            },
            {
                data:function(row){
                    return row.marks+'%';
                },
                name: 'marks'
            },
          
            {
                data: function (data) {
                    return `
                      <a href="#" class="btn btn-primary edit-btn" data-id="${data.id}">Edit</a>
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


    
    $(document).on('submit', '#expenseForm', function (e) {
        e.preventDefault();
      
        $.ajax({
            url: route('university.common-Settings.store'),
            type: 'post',
            data: $(this).serialize(),

            success: function (result) {
                displaySuccessMessage('Setting created successfully.');
                $('#expenseModal').modal('hide');
                tablename.DataTable().ajax.reload(null, false);
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    $(document).on('click', '.edit-btn', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: route('university.common-Settings.edit', id),
            type: 'get',
            success: function (result) {
                $('.subject_id').val(result.data.subject_id);
                $('#expenseId').val(result.data.id);
                $('.marks').val(result.data.marks);
                $('#editModal').modal('show');
            },
        });
    });

    $(document).on('submit', '#editForm', function (e) {
        e.preventDefault();
        let id = $('#expenseId').val();
        $.ajax({
            url: route('university.commonSetting.update', id),
            type: 'post',
            data: $(this).serialize(),
            success: function (result) {
                displaySuccessMessage(result.message);
                tablename.DataTable().ajax.reload(null, false);
                $('#editModal').modal('hide');
            },
            error: function (result) {
                displayErrorMessage(result);
            },
        });
    });

    $(document).on('click', '#btnDelete', function (){
        let id = $(this).data('id');
        deleteItem(route('university.common-Settings.destroy',id), tablename, 'Setting');
    });
  
});
