@extends('admin-layout.master')
<title>Micart Admin Profile | Micart Admin</title>
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="" id="admin_profile">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">User-Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="user_name" id="" value="{{$admin->user_name}}" placeholder="User-Name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Email address</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="email" id="" value="{{$admin->email}}"  placeholder="Email Address" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Full Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" id="" value="{{$admin->name}}" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Mobile No.</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="contact" id="" value="{{$admin->contact}}" placeholder="Mobile No.">
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="save" class="btn btn-primary float-right" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('admin-script')
<script>
    $(document).ready(function () {

    $('#admin_profile').validate({

    errorClass: "text-danger",
    submitHandler: function (form, event) {
        event.preventDefault();
        paymentsetting(form);
    }
    });
    function paymentsetting(form)
    {
    $('.text-strong').html('');

    var urls='{{ route("admin.adminprofileupdate") }}';

    $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type:'post',
            url:urls,
            contentType:false,
            processData:false,
            data:new FormData(form),
            success:function(res)
            {
                if(res==1)
                {
                    toastr.success('Adminn Profile Update Successfully!');
                    location.reload();
                }
                if(res==2)
                {
                    toastr.error('Please Try Again!');
                }
            },
            error:function(response)
            {

                    $.each(response.responseJSON.error,function(field_name,error){

                    $('[name='+field_name+']').after('<span class="text-strong" style="color:red">' +error+ '</span>')
                })
            }
        })
    }
});
</script>
@endpush
