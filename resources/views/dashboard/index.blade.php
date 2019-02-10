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
            <div class="col-md-6">
                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Projek</span>
                            <span class="caption-helper">Terbaru</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn green btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> 
                                    LIHAT SEMUA
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#project_1" data-toggle="tab"> KOTA LUWUK </a>
                                </li>
                                <li>
                                    <a href="#project_2" data-toggle="tab"> BANGGAI LAUT </a>
                                </li>
                                <li>
                                    <a href="#overview_3" data-toggle="tab"> BANGGAI KEPULAUAN </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="project_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Projek </th>
                                                    <th> Nama </th>
                                                    <th> Tanggal </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_project_1 as $data)
                                                    <tr>
                                                        <td>{{ $data->id_project }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->start }}</td>
                                                        <td>
                                                            <a href="javascript:;" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> Lihat </a>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="project_2">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Projek </th>
                                                    <th> Nama </th>
                                                    <th> Tanggal </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_project_2 as $data)
                                                    <tr>
                                                        <td>{{ $data->id_project }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->start }}</td>
                                                        <td>
                                                            <a href="javascript:;" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> Lihat </a>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="project_3">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Projek </th>
                                                    <th> Nama </th>
                                                    <th> Tanggal </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_project_3 as $data)
                                                    <tr>
                                                        <td>{{ $data->id_project }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->start }}</td>
                                                        <td>
                                                            <a href="javascript:;" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> Lihat </a>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
@endsection