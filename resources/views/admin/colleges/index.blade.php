@extends('admin-layout.master')

@section('title')
    Company List
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>Company List</h3>
                </div>
            </div>

            <div class="row" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        @include('admin.colleges.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('admin-script')

    <script>
        console.log('qqq');
        let csrfToken = '{{ csrf_token() }}';
        console.log(csrfToken);
    </script>
    <script src="{{asset('admins/js/colleges/index.js')}}"></script>
@endsection
