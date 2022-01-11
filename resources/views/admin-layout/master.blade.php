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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
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
<style>
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 57px;
  height: 30px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 23px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    </style>

<body>



    <!-- Begin page -->
    <div id="layout-wrapper">
        
        @include('admin-layout.header')
        @routes
        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->
        @include('admin-layout.sidebar')

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
		@include('admin-layout.footer')
    @show

    @stack('admin-script')

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</body>

</html>
