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
                    <a href="{{ route('transaction_transportation_index', $id_transportation) }}"> Pembayaran </a>
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
            Pembayaran Transportasi
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
                                        <a href="{{ route('transaction_transportation_create', $id_transportation) }}" id="sample_editable_1_new" class="btn sbold green"> 
                                            Pembayaran Baru
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
                                    <th> ID Transaksi </th>
                                    <th> ID Transporatsi </th>
                                    <th> Nominal </th>
                                    <th> Tanggal </th>                
                                    <th class="no-sort"></th>                                                            
                                </tr>
                            </thead>
                            <tbody>                                
                                @foreach($data_trans_transportation as $data)
                                <tr class="odd gradeX">                                                                       
                                    <td>{{ $data->id_transaction }}</td>
                                    <td>{{ $data->id_transportation }}</td>
                                    <td>{{ 'Rp ' . number_format($data->nominal) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($data->date)) }}</td>                                        
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-6">
                                                <a href="{{ route('transaction_transportation.edit', $data->id_transaction) }}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                <form action="{{ action('TransactionTransportationController@destroy', $data->id_transaction) }}" method="POST">
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
                        <div id="pay-info" class="pull-right">
                            <h3>Informasi</h3>
                            <h4>{{ 'Tagihan: Rp ' . number_format($invoice) }}</h4>
                            <h4>{{ 'Total Pembayaran: Rp ' . number_format($total_trans) }}</h4>
                            <h4>{{'Sisa Pembayaran: Rp ' . number_format($remain)}}</h4>
                        </div>                        
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->                
            </div>
        </div>
    </div>
@endsection