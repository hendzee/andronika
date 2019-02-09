@extends('layout.master')
@section('content')
     <!-- BEGIN CONTENT BODY -->
     <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> PT. Andronika Putra Delta
            <small>rekap data perusahaan</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-xs-6">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_income) }}">0</span>
                        </div>
                        <div class="desc"> Total Pemasukkan </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_outcome) }}">0</span> 
                        </div>
                        <div class="desc"> Total Pengeluaran </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_profit) }}">0</span>
                        </div>
                        <div class="desc"> Profit Perusahaan </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_obli) }}"> </div>
                        <div class="desc"> Kewajiban (Gaji Pegawai) </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Site Visits</span>
                            <span class="caption-helper">weekly stats...</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <label class="btn red btn-outline btn-circle btn-sm active">
                                    <input type="radio" name="options" class="toggle" id="option1">New</label>
                                <label class="btn red btn-outline btn-circle btn-sm">
                                    <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_statistics_loading">
                            <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                        <div id="site_statistics_content" class="display-none">
                            <div id="site_statistics" class="chart"> </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-red-sunglo hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Revenue</span>
                            <span class="caption-helper">monthly stats...</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                    <span class="fa fa-angle-down"> </span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;"> Q1 2014
                                            <span class="label label-sm label-default"> past </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Q2 2014
                                            <span class="label label-sm label-default"> past </span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:;"> Q3 2014
                                            <span class="label label-sm label-success"> current </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Q4 2014
                                            <span class="label label-sm label-warning"> upcoming </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_activities_loading">
                            <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                        <div id="site_activities_content" class="display-none">
                            <div id="site_activities" style="height: 228px;"> </div>
                        </div>
                        <div style="margin: 20px 0 10px 30px">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-sm label-success"> Revenue: </span>
                                    <h3>$13,234</h3>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-sm label-info"> Tax: </span>
                                    <h3>$134,900</h3>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-sm label-danger"> Shipment: </span>
                                    <h3>$1,134</h3>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-sm label-warning"> Orders: </span>
                                    <h3>235090</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
@endsection