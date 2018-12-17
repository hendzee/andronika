@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Form Stuff</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            {{ $data_project->name }}
            <small>{{ $data_project->id_project }}</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
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