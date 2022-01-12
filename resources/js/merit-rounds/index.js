'use strict';

$(document).ready(function () {

    let tablename = $('#meritRoundTable');
    let url = route('university.merit-rounds.index');
  
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
                'targets':[7],
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
                data: 'round_no',
                name: 'round_no'
            },
            {
                data:function (row){
                    return row.course.name;
                },
                name:'course.name'
            },
            {
                data: 'start_date',
                name: 'start_date'
            },
            {
                data: 'end_date',
                name: 'end_date'
            },
            {
                data: 'merit_result_declare_date',
                name: 'merit_result_declare_date'
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
            url: route('university.merit-rounds.store'),
            type: 'post',
            data: $(this).serialize(),
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

    $(document).on('click', '.edit-btn', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: route('university.merit-rounds.edit', id),
            type: 'get',
            success: function (result) {
                $('.round_no').val(result.data.round_no);
                $('.course_id').val(result.data.course_id);
                $('.start_date').val(result.data.start_date);
                $('.end_date').val(result.data.end_date);
                $('.merit_result_declare_date').val(result.data.merit_result_declare_date);
                $('#expenseId').val(result.data.id);
                $('#editModal').modal('show');
            },
        });
    });

    $(document).on('submit', '#editForm', function (e) {
        e.preventDefault();
        let id = $('#expenseId').val();
        $.ajax({
            url: route('university.meritRound.update', id),
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
        deleteItem(route('university.merit-rounds.destroy',id), tablename, 'Merit-Round');
    });

    $(document).on('click','#statusCheckBox', function(){
        let status = $(this).is(':checked') ? 1 : 0;
        let id = $(this).attr('data-id');
        $.ajax({
            url:route('university.meritRounds-change-status',id),
            type:'POST',
            data:{'status':status},
            success: function(result){
                displaySuccessMessage('Course status changed successfully.');
                tablename.DataTable().ajax.reload(null, false);
            }
        })
    });

});