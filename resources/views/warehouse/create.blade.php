@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('warehouse.index') }}">Gudang</a>
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
                        <form action="{{ action('WarehouseController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                
                                <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Nama barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('item_name') }}" name="item_name" placeholder="Nama Barang" class="form-control" />                                        

                                        @if ($errors->has('item_name'))
                                            <span class="help-block"> {{ $errors->first('item_name') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status Peminjaman</label>
                                    <div class="col-md-9">
                                        <select name="rent_status" class="form-control">
                                            <option value="BOLEH">BOLEH</option>
                                            <option value="TIDAK">TIDAK</option>                                                
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Satuan</label>
                                    <div class="col-md-9">
                                        <select name="measure" class="form-control">
                                            <option value="Buah">Buah</option>
                                            <option value="Sak">Sak</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Ton">Ton</option>
                                            <option value="Liter">Liter</option>
                                        </select>
                                        <span class="help-block"> Satuan barang. </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Jumlah Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('number') }}" name="number" placeholder="Jumlah Barang" class="form-control" />
                                        
                                        @if ($errors->has('number'))
                                            <span class="help-block"> {{ $errors->first('number') }} </span>
                                        @endif
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
                                        <a href="{{ route('warehouse.index') }}" class="btn default">
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