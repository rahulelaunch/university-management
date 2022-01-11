'use strict';

$(document).ready(function () {
    let tablename = $('#studentTable');
    let url = route('university.students.index');

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
                    
                      <a href="#" class="btn btn-danger" id="btnDelete" data-id="${data.id}">Delete</a>`;
                },
                name: 'id',
            }    
         
        ],
    });

    $(document).on('click', '#btnDelete', function (){
        let id = $(this).data('id');
        deleteItem(route('university.students.destroy',id), tablename, 'Student');
    });

});