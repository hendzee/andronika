@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('warehouse_rent.index') }}">Peminjaman</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Baru</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Peminjaman Baru     
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('WarehouseRentController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Klien</label>
                                    <div class="col-md-9">
                                        <select name="id_client" class="form-control">
                                            @foreach($data_client as $data)
                                                <option value="{{ $data->id_client }}">
                                                    {{ $data->description . ' | ' . $data->address }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Keterangan Klien / Pembeli </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Barang</label>
                                    <div class="col-md-9">
                                        <select name="item_name" class="form-control">
                                            @foreach($data_item as $data)
                                                <option value="{{ $data->item_name }}">
                                                    {{ $data->item_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Keterangan Karyawan </span>
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <label class="control-label col-md-3">Biaya Sewa / Hari</label>
                                    <div class="col-md-9">
                                        <input type="text" name="price_day" class="form-control" />
                                        <span class="help-block"> Biaya Sewa / Hari </span>
                                    </div>
                                </div>  
                                <div class="form-group">
                                        <label class="control-label col-md-3">Jumlah Barang</label>
                                        <div class="col-md-9">
                                            <input type="text" name="number_item" class="form-control" />
                                            <span class="help-block"> Jumlah Barang </span>
                                        </div>
                                    </div>                                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Mulai</label>
                                    <div class="col-md-9">
                                        <input name="start" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Mulai </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Selesai</label>
                                    <div class="col-md-9">
                                        <input name="end" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Selesai </span>
                                    </div>
                                </div>                                                                                                                                                    
                            </div>
                            {{ csrf_field() }}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Simpan</button>
                                        <a href="{{ route('warehouse_rent.index') }}" class="btn default">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->                
            </div>
        </div>
    </div>
@endsection