<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admins/images/favicon.ico') }}">

    <link href="{{ asset('admins/css/bootstrap-dark.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admins/css/custom.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- {{-- popupscss --}} -->
    <link href="{{ asset('admins/css/megnifitepopup.css') }}" rel="stylesheet" type="text/css" />

    <!-- {{-- wizard --}} -->

    <!-- Icons Css -->
    <link href="{{ asset('admins/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admins/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admins/libs/twitter-bootstrap-wizard/prettify.css') }}">

    <link href="{{ asset('admins/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- {{-- smscss --}} -->
    <link href="{{ asset('admins/css/sms.css') }}" rel="stylesheet" type="text/css" />

    <!-- {{-- //daterangepicker --}} -->
    <link href="{{ asset('admins/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.default.min.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/sweetalert2.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
</head>


<body>



    <!-- Begin page -->
    <div id="layout-wrapper">
        
        @include('student-layout.header')
        @routes
        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->
        @include('student-layout.sidebar')

        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @section('footer')
		@include('student-layout.footer')
    @show

    @stack('student-script')

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</body>

</html>
