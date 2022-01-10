@extends('admin-layout.master')

@section('title')
college list
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <button class="btn btn-save btn-outline-primary float-right" id="addExpenses">Add College</button>
                            <!-- <button type="button" class="btn btn-save btn-outline-primary float-right" title="Add zone"
                                data-toggle="modal" data-target="#zone_add_modal"> + Add College</button> -->
                 
                        <h5>Colleges List</h5>
                        <div class="table-responsive table-hover">
                            @include('admin.colleges.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.colleges.add')
</div>

@endsection

@push('admin-script')
<script>
    let csrfToken = '{{ csrf_token() }}';
</script>
<script src="{{asset('admins/js/colleges/index.js')}}"></script>
@endpush