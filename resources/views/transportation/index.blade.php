@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('transportation.index') }}">Transportasi</a>
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
            Data Transportasi
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
                                        <a href="transportation/create" id="sample_editable_1_new" class="btn sbold green"> 
                                            Transportasi Baru
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
                                    <th> ID Tranportasi </th>
                                    <th> Supir </th>                               
                                    <th> Pengantaran </th>
                                    <th> Biaya Transport </th>
                                    <th> Harga Sewa </th>
                                    <th> Keuntungan </th>
                                    <th> Tanggal Pengantaran </th>
                                    <th> Keterangan </th>
                                    <th> Aksi </th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_transportation as $data)
                                    <tr class="odd gradeX">
                                        <td> {{ $data->id_transportation }} </td>
                                        <td> {{ $data->employee->name .'|'. $data->employee->id_employee }} </td>
                                        <td> 
                                            {{ $data->starting_point .' - '. $data->destination }} 
                                            <br> 
                                            {{ $data->distance .' Km ' }} 
                                        </td>
                                        <td> {{ 'Rp ' . number_format($data->cost) }} </td>
                                        <td>
                                            <a href="{{ route('transaction_transportation_index' , $data->id_transportation)}}"> 
                                                {{ 'Rp ' . number_format($data->total) }} 
                                            </a>

                                            @if ($data->total - ($data->transaction_transportation->sum('nominal')) > 0)
                                                <br>
                                                BELUM LUNAS
                                            @endif
                                        </td>
                                        <td> {{ 'Rp ' . ($data->total-$data->cost) }} </td>
                                        <td> {{ date('d M, Y', strtotime($data->date)) }} </td>
                                        <td> {{ $data->description }} </td>  
                                        <td>
                                            <div class="row button-on-table">
                                                <div class="col-xs-6">
                                                    <a href="{{ route('transportation.edit', $data->id_transportation) }}" class="btn btn-icon-only green">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <form action="{{ action('TransportationController@destroy', $data->id_transportation) }}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-icon-only red">
                                                            <i class="fa fa-remove"></i>
                                                        </button>
                                                    </form>
                                                </div>
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