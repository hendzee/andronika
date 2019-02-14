@extends('layout.master')
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> PT. Andronika Putra Delta
            <small>rekap data perusahaan</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-xs-6">
                <div class="dashboard-stat dashboard-stat-v2 blue">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_income) }}">0</span>
                        </div>
                        <div class="desc"> Total Pemasukkan </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="dashboard-stat dashboard-stat-v2 red">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_outcome) }}">0</span> 
                        </div>
                        <div class="desc"> Total Pengeluaran </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="dashboard-stat dashboard-stat-v2 green">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_profit) }}">0</span>
                        </div>
                        <div class="desc"> Profit Perusahaan </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="dashboard-stat dashboard-stat-v2 purple">
                    <div class="visual">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            Rp <span data-counter="counterup" data-value="{{ number_format($data_obli) }}"> </div>
                        <div class="desc"> Kewajiban (Gaji Pegawai) </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-6">
                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue bold uppercase">
                                <i class="fa fa-building"></i> Projek
                            </span>
                            <span class="caption-helper">Terbaru</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn green btn-sm" href="{{ route('project.index') }}"> 
                                    LIHAT SEMUA
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#project_1" data-toggle="tab"> Kota Luwuk </a>
                                </li>
                                <li>
                                    <a href="#project_2" data-toggle="tab"> Banggai Laut </a>
                                </li>
                                <li>
                                    <a href="#project_3" data-toggle="tab"> Banggai Kepulauan </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="project_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Projek </th>
                                                    <th> Nama </th>
                                                    <th> Tanggal </th>
                                                    <th> Status </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_project_1 as $data)
                                                    <tr>
                                                        <td>{{ $data->id_project }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($data->start)) }}</td>
                                                        <td>
                                                            <span class="label label-sm {{ $data->status == 'PROSES' ? 'label-warning' : 'label-success' }}">
                                                                {{ $data->status }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('project.show', $data->id_project) }}" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> Lihat 
                                                            </a>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="project_2">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Projek </th>
                                                    <th> Nama </th>
                                                    <th> Tanggal </th>
                                                    <th> Status </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_project_2 as $data)
                                                    <tr>
                                                        <td>{{ $data->id_project }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($data->start)) }}</td>
                                                        <td>
                                                            <span class="label label-sm {{ $data->status == 'PROSES' ? 'label-warning' : 'label-success' }}">
                                                                {{ $data->status }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('project.show', $data->id_project) }}" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> Lihat 
                                                            </a>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="project_3">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Projek </th>
                                                    <th> Nama </th>
                                                    <th> Tanggal </th>
                                                    <th> Status </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_project_3 as $data)
                                                    <tr>
                                                        <td>{{ $data->id_project }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($data->start)) }}</td>
                                                        <td>
                                                            <span class="label label-sm {{ $data->status == 'PROSES' ? 'label-warning' : 'label-success' }}">
                                                                {{ $data->status }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('project.show', $data->id_project) }}" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> Lihat 
                                                            </a>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
            <div class="col-md-6">
                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue bold uppercase">
                                <i class="fa fa-shopping-cart"></i> Penjualan
                            </span>
                            <span class="caption-helper">Terbaru</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn green btn-sm" href="{{ route('warehouse_sell.index') }}"> 
                                    LIHAT SEMUA
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#sell_1" data-toggle="tab"> Penjualan Baru </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="sell_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Transaksi </th>
                                                    <th> Nama </th>
                                                    <th> Jumlah </th>
                                                    <th> Harga / Satuan </th>
                                                    <th> Total </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_sell as $data)
                                                    <tr>
                                                        <td>{{ $data->id_sell }}</td>
                                                        <td>{{ $data->item_name }}</td>
                                                        <td>{{ $data->number }}</td>
                                                        <td>{{ $data->price_per_item }}</td>
                                                        <td>{{ 'Rp ' . number_format($data->number * $data->price_per_item) }}</td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue bold uppercase">
                                <i class="fa fa-shopping-cart"></i> Penyewaan
                            </span>
                            <span class="caption-helper">Terbaru</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn green btn-sm" href="{{ route('warehouse_rent.index') }}"> 
                                    LIHAT SEMUA
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#sell_1" data-toggle="tab"> Peyewaan Baru </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="sell_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Sewa </th>
                                                    <th> Nama </th>
                                                    <th> Sts.Bayar </th>
                                                    <th> Sts.Pinjam </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_rent as $data)
                                                    @php
                                                        $start = new DateTime($data->start);
                                                        $end = new DateTime($data->end);
                                                        $diff = date_diff($start, $end);
                                                        $finalDiff =  ($diff->format('%a')) + 1;
                                                        $total = ($finalDiff * ($data->price_day) * ($data->number_item));
                                                        $status = $total - $data->payment->sum('nominal');
                                                    @endphp
                                                    
                                                    <tr>
                                                        <td>{{ $data->id_rent }}</td>
                                                        <td>{{ $data->item_name }}</td>
                                                        <td>
                                                            @if ($status > 0)
                                                                <span class="label label-sm label-danger">
                                                                    BELUM LUNAS
                                                                </span>
                                                            @else
                                                                <span class="label label-sm label-success">
                                                                    LUNAS
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="label label-sm {{ $data->status == 'DISEWA' ? 'label-danger' : 'label-success' }}">
                                                                {{ $data->status }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('rent_payment.show', $data->id_rent) }}" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> Lihat 
                                                            </a>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
            <div class="col-md-6">
                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue bold uppercase">
                                <i class="fa fa-shopping-cart"></i> Transportasi
                            </span>
                            <span class="caption-helper">Terbaru</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn green btn-sm" href="{{ route('transportation.index') }}"> 
                                    LIHAT SEMUA
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#sell_1" data-toggle="tab"> BARU </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="sell_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID Transportasi </th>
                                                    <th> Biaya </th>
                                                    <th> Invoice </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_transport as $data)
                                                    <tr>
                                                        <td>{{ $data->id_transportation }}</td>
                                                        <td>{{ 'Rp ' . number_format($data->cost) }}</td>
                                                        <td>{{ 'Rp ' . number_format($data->total) }}</td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
@endsection