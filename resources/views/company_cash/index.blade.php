@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('company_cash.index') }}">Uang Kas Perusahaan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar Uang Kas</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Uang Kas
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard-stat dashboard-stat-v2 {{ ($data_TCash - ($data_TUCash + $data_cash->sum('total'))) <= 500000 ? 'red' : 'blue' }}">
                    <div class="visual">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format(($data_TCash - ($data_TUCash + $data_cash->sum('total')))) }}">0</span>
                        </div>
                        <div class="desc"> Uang Kas Saat Ini </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="btn-group pull-right">
                    <a href="{{ route('mutation.create') }}" class="btn sbold default btn-dashboard"> 
                        <i class="fa fa-plus"></i> Uang Kas Masuk
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="company_cash/create" id="sample_editable_1_new" class="btn sbold green"> 
                                        Pengeluaran Kas Baru
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="tools"> </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>                                                                                                    
                                    <th> ID Transaksi </th>
                                    <th> Tanggal </th>
                                    <th> Keterangan </th>
                                    <th> Harga Per Satuan </th>
                                    <th> Total </th>
                                    <th> Total Harga </th>
                                    <th> Aksi </th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_cash as $data)
                                <tr class="odd gradeX">
                                    <td> {{ $data->id_transaction }}</td>
                                    <td> {{ date('d-m-Y', strtotime($data->date)) }}</td>
                                    <td> {{ $data->description }}</td>
                                    <td> {{ "Rp " . number_format($data->price) }}</td>
                                    <td> {{ $data->number }}</td>
                                    <td> {{ "Rp " . number_format($data->total) }}</td>
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-6">
                                            <a href="{{ route('company_cash.edit', $data->id_transaction) }}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                <form action="{{ action('CompanyCashController@destroy', $data->id_transaction) }}" method="POST">
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