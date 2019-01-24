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
                                    </div>
                                </div>      
                                <div class="form-group {{ $errors->has('price_day') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Biaya Sewa</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Rp
                                            </span>
                                            <input type="text" value="{{ old('price_day') }}" placeholder="Biaya" class="form-control masking-form" />
                                            <input type="hidden" id="total_hidden" name="price_day" class="masking-form-hidden">
                                        </div>

                                        @if ($errors->has('price_day'))
                                            <span class="help-block"> {{ $errors->first('price_day') }} </span>
                                        @else
                                            <span class="help-block"> Biaya sewa per hari. </span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="form-group {{ $errors->has('number_item') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Jumlah Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('number_item') }}" name="number_item" class="form-control" />
                                        
                                        @if ($errors->has('number_item'))
                                            <span class="help-block"> {{ $errors->first('number_item') }} </span>
                                        @endif
                                    </div>
                                </div>                                                         
                                <div class="form-group {{ $errors->has('start') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Mulai</label>
                                    <div class="col-md-9">
                                        <input name="start" value="{{ old('start') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('start'))
                                            <span class="help-block"> {{ $errors->first('start') }} </span>
                                        @else
                                            <span class="help-block"> MM/DD/YYY. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('end') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Selesai</label>
                                    <div class="col-md-9">
                                        <input name="end" value="{{ old('end') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('end'))
                                            <span class="help-block"> {{ $errors->first('end') }} </span>
                                        @else
                                            <span class="help-block"> MM/DD/YYY. </span>
                                        @endif
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