@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href=""> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href=""> Pembayaran Projek </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Pembayaran Sewa Barang
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
                                        <a href="{{ route('rent_payment_create', $id_rent) }}" id="sample_editable_1_new" class="btn sbold green"> 
                                            Pembayaran Baru
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
                                                    <i class="fa fa-print"></i> Print </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>                                                                                                    
                                    <th> ID Payment </th>
                                    <th> ID Rent </th>
                                    <th> Nominal </th>                                
                                    <th> Tanggal </th>                                                                                                                    
                                    <th> Aksi </th>                                 
                                </tr>
                            </thead>
                            <tbody>                                
                                @foreach($data_payment as $data)
                                <tr class="odd gradeX">                                                                       
                                    <td>{{ $data->id_payment }}</td>
                                    <td>{{ $data->id_rent }}</td>
                                    <td>{{ 'Rp ' . $data->nominal }}</td>
                                    <td>{{ date('d M, Y', strtotime($data->date)) }}</td>                                        
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                AKSI <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('rent_payment.edit', $data->id_payment) }}">
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
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ 'Total Pembayaran: Rp. ' . $total_trans }}</td>                                                
                                </tr>
                                <tr>
                                    <td colspan="5">{{'Sisa Pembayaran: Rp. ' . $remain}}</td>
                                </tr>
                            </tfoot>
                        </table>                        
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->                
            </div>
        </div>
    </div>
@endsection