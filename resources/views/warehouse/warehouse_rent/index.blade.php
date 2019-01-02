@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('employee.index') }}">Karyawan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar Karyawan</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Peminjaman Barang
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="employee/create" id="sample_editable_1_new" class="btn sbold green"> 
                                            Peminjaman Baru
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-print"></i> Print 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>                                                                                                    
                                    <th> ID Peminjaman </th>
                                    <th> Klien </th>
                                    <th> Nama Barang </th>                                
                                    <th> Jml. Barang </th>
                                    <th> Hrg. Sewa/Hari </th>
                                    <th> Tgl. Sewa </th>
                                    <th> Tot. Pembayaran </th>                                    
                                    <th> Aksi </th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_rent as $data)
                                <tr class="odd gradeX">                                                                       
                                    <td>{{ $data->id_rent }}</td>
                                    <td>
                                        {{ $data->client->description }}
                                        <br/>
                                        {{ $data->client->address }}
                                    </td>
                                    <td>{{ $data->item_name }}</td>    
                                    <td>{{ $data->number_item }}</td>                                
                                    <td>{{ 'Rp. ' . $data->price_day }}</td>
                                    <td>
                                        {{ 
                                            date('d M, Y', strtotime($data->start)) 
                                            . ' - ' 
                                            . date('d M, Y', strtotime($data->end)) 
                                        }}
                                    </td>
                                    <td>{{ 't' }}</td>                                    
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                AKSI <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="employee/{{ $data->id_employee }}/edit">
                                                        <i class="icon-docs"></i> Edit 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icon-tag"></i> Hapus
                                                    </a>
                                                </li>                                                
                                            </ul>
                                        </div>
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