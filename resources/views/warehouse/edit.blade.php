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
                        <form action="{{ action('WarehouseController@update', $data_item->item_name) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_item->item_name }}" name="item_name" placeholder="Nama Barang" class="form-control" />
                                        <span class="help-block"> Nama Barang </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Dapat Dipinjamkan</label>
                                    <div class="col-md-9">                                        
                                        <select name="rent_status" class="form-control">
                                            <option value="{{ $data_item->rent_status }}">
                                                {{ $data_item->rent_status . ' (DATA SAAT INI)' }}
                                            </option>
                                            <option value="BOLEH">BOLEH</option>
                                            <option value="TIDAK">TIDAK</option>                                                
                                        </select>
                                        <span class="help-block"> Dapat Dipinjamkan </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Satuan</label>
                                    <div class="col-md-9">
                                        <select name="measure" class="form-control">
                                            <option value="{{ $data_item->measure }}">
                                                {{ $data_item->measure . ' (DATA SAAT INI)' }}
                                            </option>
                                            <option value="Buah">Buah</option>
                                            <option value="Sak">Sak</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Ton">Ton</option>
                                            <option value="Liter">Liter</option>
                                        </select>
                                        <span class="help-block"> Satuan Barang </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_item->number }}" name="number" placeholder="Jumlah Barang" class="form-control" />
                                        <span class="help-block"> Jumlah Barang </span>
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