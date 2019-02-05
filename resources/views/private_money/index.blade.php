@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="#">Uang Pribadi</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Data Uang Pribadi</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Uang Pribadi
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
                                <div class="col-md-12">
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
                                    <th> ID Mutasi</th>
                                    <th> Asal Tujuan  </th>                               
                                    <th> Nominal </th>
                                    <th> Tanggal </th>
                                    <th> Keterangan </th>
                                    <th> Status </th>                             
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_mutation as $data)
                                <tr class="odd gradeX">
                                    <td>{{ $data->id_mutation }}</td>
                                    <td>{{ $data->source .' - '. $data->destiny}}</td>
                                    <td>{{ 'Rp ' . number_format($data->nominal) }}</td>
                                    <td>{{ date('d M, Y', strtotime($data->date)) }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td> 
                                        @if($data->source == "PRIBADI")
                                            Pengambilan
                                        @else
                                            Pengeluaran
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        Total Pengambilan Uang = {{ $data_take_out->sum('nominal') }}                                        
                                    </td>                                                              
                                </tr>
                                <tr>
                                     <td colspan="6">
                                        Total Pengerluaran Uang = {{ $data_take_in->sum('nominal') }}                                        
                                    </td>
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