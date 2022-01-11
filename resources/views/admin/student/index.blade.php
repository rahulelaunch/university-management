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
                  
                        <h5>Student List</h5>
                        <div class="table-responsive table-hover">
                            @include('admin.student.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('admin-script')
<script>
    let csrfToken = '{{ csrf_token() }}';
</script>
<script src="{{asset('admins/js/students/index.js')}}"></script>
@endpush