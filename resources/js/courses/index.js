'use strict';

$(document).ready(function () {

    let tablename = $('#courseTable');
    let url = route('university.courses.index');
  
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
                'width':'5%',          
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
                data: 'name',
                name: 'name'
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


    $(document).on('submit', '#expenseForm', function (e) {
        e.preventDefault();
      
        $.ajax({
            url: route('university.courses.store'),
            type: 'post',
            data: new FormData($(this)[0]),
            contentType: false,
            processData: false,
            success: function (result) {
                displaySuccessMessage('Course created successfully.');
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
        deleteItem(route('university.courses.destroy',id), tablename, 'Collage');
    });

    $(document).on('click','#statusCheckBox', function(){
        let status = $(this).is(':checked') ? 1 : 0;
        let id = $(this).attr('data-id');
        $.ajax({
            url:route('university.course-change-status',id),
            type:'POST',
            data:{'status':status},
            success: function(result){
                displaySuccessMessage('Collage status changed successfully.');
                tablename.DataTable().ajax.reload(null, false);
            }
        })
    });

  
});
