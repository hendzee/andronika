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
                    <span>Edit</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Edit Data Peminjaman    
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('WarehouseRentController@update', $data_rent->id_rent) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Klien</label>
                                    <div class="col-md-9">
                                        <select name="id_client" class="form-control">
                                            <option value="{{ $data_rent->id_client }}">
                                                {{ $data_rent->client->description 
                                                    . ' | '
                                                    . $data_rent->client->address
                                                    . ' (DATA SAAT INI)' }}
                                            </option>
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
                                            <option value="{{ $data_rent->item_name }}">
                                                {{ $data_rent->item_name . ' (DATA SAAT INI)' }}
                                            </option>
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
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" class="form-control">
                                            <option value="{{ $data_rent->status }}">
                                                {{ $data_rent->status
                                                    . ' (DATA SAAT INI)' }}
                                            </option>
                                            <option value="DISEWA">DISEWA</option>
                                            <option value="KEMBALI">KEMBALI</option>
                                        </select>
                                        <span class="help-block"> Status </span>
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <label class="control-label col-md-3">Biaya Sewa / Hari</label>
                                    <div class="col-md-9">
                                        <input type="text" value={{ $data_rent->price_day }} name="price_day" class="form-control" />
                                        <span class="help-block"> Biaya Sewa / Hari </span>
                                    </div>
                                </div>  
                                <div class="form-group">
                                        <label class="control-label col-md-3">Jumlah Barang</label>
                                        <div class="col-md-9">
                                            <input type="text" value={{ $data_rent->number_item }} name="number_item" class="form-control" />
                                            <span class="help-block"> Jumlah Barang </span>
                                        </div>
                                    </div>                                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Mulai</label>
                                    <div class="col-md-9">
                                        <input name="start" value={{ date('m/d/Y', strtotime($data_rent->start)) }} class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Mulai </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Selesai</label>
                                    <div class="col-md-9">
                                        <input name="end" value={{ date('m/d/Y', strtotime($data_rent->end)) }} class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Selesai </span>
                                    </div>
                                </div>                                                                                                                                                    
                            </div>
                            {{ method_field('PUT') }}
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