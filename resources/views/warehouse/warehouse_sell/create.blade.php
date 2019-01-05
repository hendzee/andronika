@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Form Stuff</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Barang Baru          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ route('warehouse_sell.store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                        <select name="item_name" class="form-control">
                                           @foreach ($data_item as $data)
                                                <option value={{ $data->item_name }}>{{ $data->item_name }}</option>
                                           @endforeach
                                        </select>
                                        <span class="help-block"> 
                                            Jika Barang Belum Tersedia, Buat 
                                            <a href={{ route('warehouse.index') }}> DISINI </a>
                                        </span>
                                    </div>
                                </div>                            
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" name="number" placeholder="Jumlah Barang" class="form-control" />
                                        <span class="help-block"> Jumlah Barang </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Harga Barang / Satuan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="price_per_item" placeholder="Harga Barang / Satuan" class="form-control" />
                                        <span class="help-block"> Harga Barang / Satuan </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Penjualan</label>
                                    <div class="col-md-9">
                                        <input name="date" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Penjualan </span>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3">Penanggung Jawab</label>
                                    <div class="col-md-9">
                                        <input type="text" name="resp_person" placeholder="Penanggung Jawab" class="form-control" />
                                        <span class="help-block"> Penanggung Jawab </span>
                                    </div>
                                </div>                                      
                                <div class="form-group">
                                    <label class="control-label col-md-3">Bukti Transaksi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="token" placeholder="Bukti Transaksi" class="form-control" />
                                        <span class="help-block"> Bukti Transaksi </span>
                                    </div>
                                </div>                                                                                                                                                                           
                            </div>
                            {{ csrf_field() }}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            Simpan
                                        </button>
                                        <button type="button" class="btn default">Batal</button>
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