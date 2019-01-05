@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $data_project->id_project) }}"> Detail Projek </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Menu</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            {{ $data_project->name }}
            <small>{{ date('d M, Y', strtotime($data_project->start)) }}</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp. <span data-counter="counterup" data-value="{{$income}}">0</span>
                        </div>
                        <div class="desc"> Pemasukan </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp. <span data-counter="counterup" data-value="{{$outcome}}">0</span>
                        </div>
                        <div class="desc"> Pengeluaran </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp. <span data-counter="counterup" data-value="{{ $assets }}">0</span>                           
                        </div>
                        <div class="desc"> Profit </div>
                    </div>
                </a>
            </div>           
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Menu </th>
                                        <th> Aksi </th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PEMBAYARAN PROJEK</td>
                                        <td>
                                            <a class="btn green btn-md" href="{{ route('project_payment_index', $id_project) }}" class="nav-link ">
                                                <span class="title">LIHAT DETAIL</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>KEBUTUHAN BARANG</td>
                                        <td>
                                            <a class="btn green btn-md" href="{{ route('project_supply_index', $id_project) }}" class="nav-link ">
                                                <span class="title">LIHAT DETAIL</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PEMBELIAN BARANG</td>
                                        <td>
                                            <a href="{{ route('project_purchase_index', $id_project) }}" class="btn green btn-md">LIHAT DETAIL</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DATA PEKERJA</td>
                                        <td>
                                            <a href="{{ route('project_worker_index', $id_project) }}" class="btn green btn-md">LIHAT DETAIL</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>GAJI PEKERJA (HARIAN)</td>
                                        <td>
                                            <a href="{{ route('worker_salary_index', $id_project) }}" class="btn green btn-md">LIHAT DETAIL</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>GAJI PEKERJA (KONTRAK)</td>
                                        <td>
                                            <a href="{{ route('worker_contract_index', $id_project) }}" class="btn green btn-md">LIHAT DETAIL</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DATA MUTASI</td>
                                        <td>
                                            <a href="{{ route('mutation.show', $id_project) }}" class="btn green btn-md">LIHAT DETAIL</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->                
            </div>
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Informasi </th>
                                        <th> Detail </th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Projek</td>
                                        <td>{{ $data_project->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $data_project->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Klien</td>
                                        <td>{{ $data_project->client->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Projek</td>
                                        <td>{{ $data_project->island }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mulai</td>
                                        <td>{{ date('d M, Y', strtotime($data_project->start)) }}</td>
                                    </tr>                                    
                                    <tr>
                                        <td>Tgl. Berakhir / Deadline</td>
                                        <td>{{ date('d M, Y', strtotime($data_project->end)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Projek</td>
                                        <td>{{ 'Rp. ' . $data_project->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->                
            </div>
        </div>
    </div>
@endsection