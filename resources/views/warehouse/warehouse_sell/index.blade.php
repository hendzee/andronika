@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('warehouse_sell.index') }}">Penjualan</a>
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
            Penjualan Barang
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
                                        <a href="{{ route('warehouse_sell.create') }}" id="sample_editable_1_new" class="btn sbold green">
                                            Penjualan Barang
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                    <th> Nama Barang </th>                                      
                                    <th> Tgl. Jual </th>
                                    <th> Jumlah </th>
                                    <th> Harga/Item </th>
                                    <th> Total Harga </th>
                                    <th> Oleh </th>
                                    <th class="no-sort"></th>                                                            
                                </tr>
                            </thead>
                            <tbody>                                
                                @foreach($data_sell as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>{{ $data->item_name }}</td>                                                                        
                                    <td>{{ date('d-m-Y', strtotime($data->date)) }}</td>
                                    <td>{{ $data->number }}</td>
                                    <td>{{ 'Rp ' . number_format($data->price_per_item) }}</td>                                        
                                    <td>{{ 'Rp ' . number_format ($data->number * $data->price_per_item) }}</td>
                                    <td>{{ $data->resp_person }}</td>
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-6">
                                                <a href="{{ route('warehouse_sell.edit', $data->id_sell) }}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                <form action="{{ action('WarehouseSellController@destroy', $data->id_sell) }}" method="POST">
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