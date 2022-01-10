'use strict';


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
});

//delete item function
window.deleteItem = function (url, tableId, header, callFunction = null) {
    swal.fire({
        title: 'Delete !',
        text: 'Are you sure want to delete this "' + header + '" ?',
        type: 'warning',
        icon: 'warning',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonColor: '#f5365c',
        cancelButtonColor: '#888888',
        cancelButtonText: 'No',
        confirmButtonText: 'Yes',
    }).then((result) => {
        if (result.isConfirmed) {
            deleteItemAjax(url, tableId, header, callFunction);
        }
    });
};

function deleteItemAjax (url, tableId, header, callFunction = null) {
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        success: function (obj) {
            if (obj.success) {
                if ($(tableId).DataTable().data().count() == 1) {
                    $(tableId).DataTable().page('previous').draw('page');
                } else {
                    $(tableId).DataTable().ajax.reload(null, false);
                }
            }
            swal.fire({
                title: 'Deleted!',
                text: header + ' has been deleted.',
                icon: 'success',
                confirmButtonColor: '#f5365c',
                timer: 2000,
            });
            if (callFunction) {
                eval(window.location.href = callFunction);
            }
        },
        error: function (data) {
            swal.fire({
                title: '',
                text: data.responseJSON.message,
                icon: 'error',
                confirmButtonColor: '#f5365c',
                timer: 5000,
            });
        },
    });
}   

// display tostar

window.displaySuccessMessage = function (message) {
    iziToast.success({
        title: 'Success',
        message: message,
        position: 'topRight',
    });
};

window.displayErrorMessage = function (message) {
    iziToast.error({
        title: 'Error',
        message: message,
        position: 'topRight',
    });
};




