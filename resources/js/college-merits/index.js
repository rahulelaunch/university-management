'use strict';

$(document).ready(function () {

    let tablename = $('#collegeMeritTable');
    let url = route('college.college-merits.index');

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
                'targets':[5],
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
                    return row.college.name;
                },
                name:'college.name'
            },
            {
                data:function (row){
                    return row.course.name;
                },
                name:'course.name'
            },

            {
                data:function (row){
                    return row.merits.round_no;
                },
                name:'merits.id'
            },
            
            {
                data: 'merit',
                name: 'merit'
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

    $('#course_id').on('change',function(){
        var id = $(this).val();
        $.ajax({
            url: route('college.collegeMerit-change',id),
            type: 'post',
            data:{'id':id},
            success: function (data) {
                $('select[name="round"]').empty();
                $.each(data ,function(key,value){
                  $('select[name="round"]').append('<option value="'+value['round_no'] +'">'+value['round_no'] +'</option>');
                })
            },
        }); 
    });

    $(document).on('submit', '#expenseForm', function (e) {
        e.preventDefault();
      
        $.ajax({
            url: route('college.college-merits.store'),
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
            url: route('college.college-merits.edit', id),
            type: 'get',
            success: function (result) {
                console.log(result.data.merit_round_id);
                $('.course_id').val(result.data.course_id);
                $('#expenseId').val(result.data.id);
                $('.round').val(result.data.merit_round_id);
                $('.merit').val(result.data.merit);
                $('#editModal').modal('show');
            },
        }); 
    });

    $(document).on('submit', '#editForm', function (e) {
        e.preventDefault();
        let id = $('#expenseId').val();
        $.ajax({
            url: route('college.collegeMerit.update', id),
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
        deleteItem(route('college.college-merits.destroy',id), tablename, 'College-Merit');
    });
 
});
