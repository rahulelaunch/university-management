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
                    <button class="btn btn-save btn-outline-primary float-right" id="addExpenses">Add Setting</button>
                        <h5>Common Setting List</h5>
                        <div class="table-responsive table-hover">
                            @include('admin.common-setting.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.common-setting.add')
</div>

@endsection

@push('admin-script')
<script>
    let csrfToken = '{{ csrf_token() }}';
  
</script>
<script src="{{asset('admins/js/comman-settings/index.js')}}"></script>
@endpush