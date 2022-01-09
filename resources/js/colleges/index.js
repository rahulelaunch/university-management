$(document).ready(function () {
    alert();
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
                    <span class="badge outline-badge-primary">
                    <a href="#">Edit</a>
                    </span>
                   <br><br>
                   <span class="badge outline-badge-success">
                    <a href="#">Show</a>
                    </span> 
                    <br><br>
                    <span class="badge outline-badge-danger">
                      <a href="#" id="btnDelete" data-id="${data.id}">Delete</a>
                    </span>`;
                },
                name: 'id',
            }
        ],
    });
});
