@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('worker_contract_index', $id_project) }}"> Pekerja Kontrak </a>
                    <i class="fa fa-circle"></i>
                </li>                
                <li>
                    <a href="{{ route('pct_index', [
                        'id' => $id_worker,
                        'id_prj' => $id_project]) }}"> 
                        Pembayaran Kontrak 
                    </a>
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
            Pembayaran Transfer
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
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('pct_create', $id_worker) }}" id="sample_editable_1_new" class="btn sbold green"> 
                                            Buka Transaksi
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
                                    <th> ID Transaksi </th>                                    
                                    <th> Pekerja </th>                                                                    
                                    <th> Jumlah </th>
                                    <th> Tanggal Ambil </th>                                    
                                    <th> Aksi </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_transaction as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>{{ $data->id_transaction }}</td>                                    
                                    <td>
                                        {{ $data->worker->name }}
                                        <br/>
                                        {{ $data->id_worker }}                                    
                                    </td>                                                                           
                                    <td>{{ 'Rp ' . number_format($data->nominal) }}</td>        
                                    <td>{{ date('d M, y', strtotime($data->date)) }}</td>                                                                                
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-6">
                                                <a href="{{ route('pct.edit', $data->id_transaction) }}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                <form action="{{ action('PCTController@destroy', $data->id_transaction) }}" method="POST">
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