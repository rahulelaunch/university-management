@extends('admin-layout.master')
<title>Dashboard | University Admin</title>
@section('content')

<style type="text/css">
    .dashboard-card-col {
        border-radius: 5px;
        overflow: hidden;
        color: #fff;
        position: relative;
        -webkit-box-shadow: 0 4px 10px rgba(75, 75, 90, 0.12);
        box-shadow: 0 4px 10px rgba(75, 75, 90, 0.12);
        margin-bottom: 0px;
        background-color: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .dashboard-card-col h4 {
        font-size: 20px;
        color: #ffffff;
    }

    .dashboard-card-col h5 {
        font-size: 22px;
        color: #ffffff;
        font-weight: 700;
        margin: 0 5px;
    }

    .dashboard-card-bm {
        border-radius: 2px;
        position: relative;
        display: block;
        margin-bottom: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }

    .dashboard-card-bm a {
        position: relative;
        text-align: center;
        padding: 3px 0;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.8);
        display: block;
        z-index: 10;
        background: rgba(0, 0, 0, 0.1);
        text-decoration: none;
    }

    .dashboard-card-icon {
        font-size: 40px;
        color: #fff;
        position: absolute;
        top: 15px;
        right: 12px;
        opacity: 0.8;
    }

    .dashboard-bg-danger {
        background-color: #e7515a !important;
        border-color: #e7515a;
        color: #fff;
    }

    .dashboard-bg-primary {
        background-color: #007bff !important;
        border-color: #007bff;
        color: #fff;
    }

    .dashboard-bg-yellow {
        background-color: #fcba63 !important;
        border-color: #fcba63;
        color: #fff;
    }

    .dashboard-bg-green {
        background-color: #58b765 !important;
        border-color: #58b765;
        color: #fff;
    }

    .dashboard-bg-info {
        background-color: #2196f3 !important;
        border-color: #2196f3;
        color: #fff;
    }

    .dashboard-bg-lightblue {
        background-color: #18acb3;
        border-color: #18acb3;
        color: #fff
    }

</style>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card-col dashboard-bg-primary">
                    <div class="p-3 text-white ">
                        <h4 class="mt-0 mb-4">Colleges</h4>
                        <div class="home-card-text-area py-2">
                            <h5>
                                <span id="accptedOrder">{{$colleges}}</span>
                            </h5>
                            <i class="feather icon-shopping-bag dashboard-card-icon"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-bm mb-0">
                        <a href="{{route('university.colleges.index')}}" class="py-2">All View <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card-col dashboard-bg-lightblue">
                    <div class="p-3 text-white ">
                        <h4 class="mt-0 mb-4">Orders in process</h4>
                        <div class="home-card-text-area py-2">
                            <h5>
                                <span id="TotalProgressOrder"></span></span>
                            </h5>
                            <i class="feather icon-shopping-bag dashboard-card-icon"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-bm mb-0">
                        <a href="" class="py-2">All View <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card-col dashboard-bg-yellow">
                    <div class="p-3 text-white ">
                        <h4 class="mt-0 mb-4">Orders pending delivery</h4>
                        <div class="home-card-text-area py-2">
                            <h5>
                                <span id="orderPendingDelivery"></span>
                            </h5>
                            <i class="feather icon-shopping-bag dashboard-card-icon"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-bm mb-0">
                        <a href="" target="_blank" class="py-2">All
                            View <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card-col dashboard-bg-green">
                    <div class="p-3 text-white ">
                        <h4 class="mt-0 mb-4">Completed Orders</h4>
                        <div class="home-card-text-area py-2">
                            <h5>
                                <span id="TotalTodayCompletedOrder"></span>
                            </h5>
                            <i class="feather icon-shopping-bag dashboard-card-icon"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-bm mb-0">
                        <a href="" class="py-2">All View <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        
        </div>

     
    </div>
    @endsection
    @push('admin-script')

    @endpush
