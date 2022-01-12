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
                    <button class="btn btn-save btn-outline-primary float-right" id="addExpenses">Add Round</button>
                        <h5>Round List</h5>
                        <div class="table-responsive table-hover">
                            @include('admin.merit-round.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.merit-round.add')
    @include('admin.merit-round.edit')
</div>

@endsection

@push('admin-script')
<script>
    let csrfToken = '{{ csrf_token() }}';
</script>
<script src="{{asset('admins/js/merit-rounds/index.js')}}"></script>
@endpush