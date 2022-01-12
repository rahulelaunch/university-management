@extends('college-layout.master')

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
                    <button class="btn btn-save btn-outline-primary float-right" id="addExpenses">Add Merit</button>
                        <h5>Course List</h5>
                        <div class="table-responsive table-hover">
                            @include('college.college-merit.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('college.college-merit.add')
    @include('college.college-merit.edit')
</div>

@endsection

@push('college-script')
<script>
    let csrfToken = '{{ csrf_token() }}';
</script>
<script src="{{asset('colleges/js/college-merits.js')}}"></script>
@endpush