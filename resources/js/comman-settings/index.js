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

    $(document).on('click', '#btnDelete', function (){
        let id = $(this).data('id');
        deleteItem(route('university.common-Settings.destroy',id), tablename, 'Collage');
    });

  
});
