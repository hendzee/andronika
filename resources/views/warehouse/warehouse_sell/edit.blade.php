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
                    <span>Edit</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Edit Data Penjualan      
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ route('warehouse_sell.update', $data_sell->id_sell) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                        <select name="item_name" class="form-control">
                                            <option value="{{$data_sell->item_name}}">
                                                {{ $data_sell->item_name . ' (DATA SAAT INI)' }}
                                            </option> 
                                            @foreach ($data_item as $data)
                                                <option value={{ $data->item_name }}>{{ $data->item_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Nama Barang </span>
                                    </div>
                                </div>                            
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_sell->number }}" name="number" placeholder="Jumlah Barang" class="form-control" />
                                        <span class="help-block"> Jumlah Barang </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Harga</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ round($data_sell->price_per_item) }}" id="total" placeholder="Harga Per Satuan" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="total" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        <span class="help-block"> Harga per satuan. </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Pembelian</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ date('m/d/Y', strtotime($data_sell->date)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Pembelian </span>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pembeli</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_sell->resp_person }}"  name="resp_person" placeholder="Pembeli" class="form-control" />
                                        <span class="help-block"> Pembeli </span>
                                    </div>
                                </div>                                      
                            </div>
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            Simpan
                                        </button>
                                        <a href="{{ route('warehouse_sell.index') }}" class="btn default">
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