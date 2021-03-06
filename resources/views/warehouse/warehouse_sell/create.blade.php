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
                    <span>Baru</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Penjualan Baru          
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
                                <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Jumlah Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('number') }}" name="number" placeholder="Jumlah Barang" class="form-control" />
                                        
                                        @if ($errors->has('number'))
                                            <span class="help-block"> {{ $errors->first('number') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('price_per_item') ? 'has-error' : '' }}">
                                    <label class="col-md-3 control-label">Harga</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('price_per_item') }}" id="total" placeholder="Harga Per Satuan" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="price_per_item" class="masking-form-hidden">
                                            </div>
                                        </div>

                                        @if ($errors->has('price_per_item'))
                                            <span class="help-block"> {{ $errors->first('price_per_item') }} </span>
                                        @else
                                            <span class="help-block"> Harga per satuan. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Terjual</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ old('date') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('date'))
                                            <span class="help-block"> {{ $errors->first('date') }} </span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="form-group {{ $errors->has('resp_person') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Penanggung Jawab</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('resp_person') }}" name="resp_person" placeholder="Penanggung Jawab" class="form-control" />
                                        
                                        @if ($errors->has('resp_person'))
                                            <span class="help-block"> {{ $errors->first('resp_person') }} </span>
                                        @else
                                            <span class="help-block"> Nama penjual / kasir / penanggung jawab penjualan barang. </span>
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