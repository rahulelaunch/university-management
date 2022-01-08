@extends('admin-layout.master')
<title>Dashboard | Micart Admin</title>
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

    .zone-part .form-control {
        height: 38px;
        padding: 0 12px;
        font-weight: 600;
        letter-spacing: 0;
        background-color: rgb(255 255 255 / 0.20);
        border: none;
        color: #fff;
        text-transform: capitalize;
    }

    .zone-part .form-control option {
        color: #333333;
    }

    .home-card-text-area h6 {
        color: #fff;
        font-weight: 600;
    }

    .zone-count-row .col-12:not(:last-child) {
        border-right: 1px solid rgb(255 255 255 / 25%);
    }

    .sales-zone-part .form-control {
        height: 38px;
        padding: 0 12px;
        font-weight: 600;
        letter-spacing: 0;
        text-transform: capitalize;
        background: #f5f5f5;
        display: inline-block;
    }

    .total-sales-count h4 {
        margin-bottom: 0;
        font-weight: 600;
    }

    .widget-chart-one .widget-heading .tabs a {
        font-size: 14px;
        letter-spacing: 1px;
        font-weight: 600;
        padding: 5px 7px;
        background: #373f4b;
        color: #fff;
        border-radius: 4px;
    }

    .widget-chart-one .widget-heading .tab-pills li.active a {
        background-color: #0179fb;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        text-align: left;
    }

    .w-summary-info-title{
        margin-left: 1%;
        margin-bottom: -20px;
    }
    .summary-count{
        margin-left: 90%;
        margin-bottom: 10px;
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
                        <h4 class="mt-0 mb-4">Not Yet Accepted orders</h4>
                        <div class="home-card-text-area py-2">
                            <h5>
                                <span id="accptedOrder"></span>
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
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card-col dashboard-bg-green">
                    <div class="p-3 text-white ">
                        <h4 class="mt-0 mb-4">Active Shoppers</h4>
                        <div class="home-card-text-area py-2">
                            <h5>
                                <span id="TotalShopper"></span>
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
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="dashboard-card-col dashboard-bg-danger">
                    <div class="p-3 text-white ">
                        <h4 class="mt-0 mb-4">Warning Shoppers</h4>
                        <div class="home-card-text-area py-2">
                            <h6>
                                <p>Shopper accepted after 16 hours</p>
                                <span id="driverAccepted"></span>
                                </h5>
                                <i class="feather icon-shopping-bag dashboard-card-icon"></i>
                        </div>
                        <div class="home-card-text-area py-2">
                            <h6>
                                <p>Accepted but shopping not done </p>
                                <span id="shippingNotDone"></span>
                                </h5>
                                <i class="feather icon-shopping-bag dashboard-card-icon"></i>
                        </div>
                        <div class="home-card-text-area py-2">
                            <h6>
                                <p>Accepted but delivery not done</p>
                                <span id="deliveryNotDone"></span>
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
                <div class="dashboard-card-col dashboard-bg-info">
                    <div class="p-3 text-white ">
                        <div class="widget-heading d-flex justify-content-between">
                            <h4 class="mt-0 mb-4">Zone</h4>
                            <div class="zone-part">
                                <select name="zone" id="zone" class="form-control js-example-basic-single"
                                    onchange="zone(this.value)">
                                  
                                </select>
                            </div>
                        </div>
                        <div class="home-card-text-area py-2">
                            <div class="row justify-content-between zone-count-row">
                                <div class="col-12 col-sm-6 mt-4">
                                    <div class="zone-count text-center">
                                        <h6>Stores</h6>
                                        <h5><span class="TotalStore"></span></span></h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-4">
                                    <div class="zone-count text-center">
                                        <h6>Shoppers</h6>
                                        <h5><span class="TotalProgressOrder"></span></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
    </div>
    @endsection
    @push('admin-script')

    @endpush
