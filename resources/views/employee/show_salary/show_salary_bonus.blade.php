@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('show_salary.index') }}">Gaji Bulanan</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Bonus Karyawan
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        @if (session('success'))
            <div class="alert alert-success">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ session('error') }} 
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn green btn-outline" href="javascript:;" data-toggle="dropdown">
                                            <span class="hidden-xs"> Import | Print </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right" id="sample_1_tools">
                                            <li>
                                                <a href="javascript:;" data-action="0" class="tool-action">
                                                    <i class="icon-printer"></i> Print</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="1" class="tool-action">
                                                    <i class="icon-check"></i> Copy</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="2" class="tool-action">
                                                    <i class="icon-doc"></i> PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="3" class="tool-action">
                                                <i class="icon-paper-clip"></i> Excel</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="4" class="tool-action">
                                                    <i class="icon-cloud-upload"></i> CSV</a>
                                            </li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>                                                                                                                                        
                                    <th> ID Bonus </th>
                                    <th> ID Karyawan </th>
                                    <th> Nama </th>                                                                    
                                    <th> Bonus </th>
                                    <th> keterangan </th>
                                    <th> Status </th>
                                    <th> Tanggal Ambil </th>                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_bonus as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>{{ $data->id_bonus }}</td>
                                    <td>{{ $data->id_employee }}</td>
                                    <td>{{ $data->employee->name }}</td>                                                                           
                                    <td>{{ 'Rp ' . number_format($data->bonus) }}</td>  
                                    <td>{{ $data->description }}</td> 
                                    <td>
                                        <span class="label label-sm {{ $data->status == 'SUDAH DIAMBIL' ? 'label-success' : 'label-danger' }} top-space">
                                            {{ $data->status }}
                                        </span>
                                    </td>         
                                    <td>
                                        @if ($data->status == 'SUDAH DIAMBIL')
                                            {{ date('d-m-Y', strtotime($data->date)) }}
                                        @else
                                            <span class="label label-sm {{ $data->status == 'SUDAH DIAMBIL' ? 'label-success' : 'label-danger' }} top-space">
                                                {{ $data->status }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>                        
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->                
            </div>
        </div>
    </div>
@endsection