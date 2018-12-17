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
            Edit Pembelian      
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectPurchaseController@update', $data_purchase->id_transaction) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_purchase->project->name . ' | ' . date('d M, Y', strtotime($data_purchase->project->start)) }}" placeholder="Nama Lengkap" class="form-control" disabled/>
                                        <span class="help-block"> Projek </span>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $data_purchase->id_project }}" name="id_project" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                        <select name="name" class="form-control">
                                            <option value="{{ $data_purchase->name }}">
                                                {{ $data_purchase->name . ' (DATA SAAT INI)'}}
                                            </option>
                                            @foreach($data_supply as $data)
                                                <option value={{ $data->item_name }}>
                                                    {{ $data->item_name . " ($data->measure)" }}
                                                </option>                                                
                                            @endforeach                                        
                                        </select>
                                        <span class="help-block"> Nama Barang </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Beli</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ date('m/d/Y', strtotime($data_purchase->date)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Lahir </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah</label>
                                    <div class="col-md-9">
                                        <input name="total_item" value="{{ $data_purchase->total_item }}" type="text" placeholder="Jumlah Barang" class="form-control" />
                                        <span class="help-block"> Jumlah Barang </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Harga/Satuan</label>
                                    <div class="col-md-9">
                                        <input name="price_per_item" value="{{ $data_purchase->price_per_item }}" type="text" placeholder="Harga/Satuan" class="form-control" />
                                        <span class="help-block"> Harga/Satuan </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pembeli</label>
                                    <div class="col-md-9">
                                        <input name="resp_person" value="{{ $data_purchase->resp_person }}" type="text" placeholder="Pembeli" class="form-control" />
                                        <span class="help-block"> Nama Pembeli </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Token</label>
                                    <div class="col-md-9">
                                        <input name="token" value="{{ $data_purchase->token }}" type="text" placeholder="Token" class="form-control" />
                                        <span class="help-block"> Token </span>
                                    </div>
                                </div>                                                               
                            </div>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
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