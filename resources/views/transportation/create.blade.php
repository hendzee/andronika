@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
       <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('transportation.index') }}">Transportasi</a>
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
            Data Transportasi Baru        
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('TransportationController@store') }}" method="POST" class="form-horizontal form-row-seperated">
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
                                    <label class="control-label col-md-3">Supir</label>
                                    <div class="col-md-9">
                                        <select name="id_employee" class="form-control">
                                            @foreach($data_employee as $data)
                                                <option value="{{ $data->id_employee }}">
                                                    {{ $data->name . ' | ' . $data->address }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group {{ $errors->has('starting_point') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Awal</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('starting_point') }}" name="starting_point" class="form-control" placeholder="Tempat Awal"/>
                                        
                                        @if ($errors->has('starting_point'))
                                            <span class="help-block"> {{ $errors->first('starting_point') }} </span>    
                                        @else
                                            <span class="help-block"> Alamat asal. </span>
                                        @endif
                                    </div>
                                </div>                                                          
                                <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tujuan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('destination') }}" name="destination" class="form-control" placeholder="Tujuan"/>
                                        
                                        @if ($errors->has('destination'))
                                            <span class="help-block"> {{ $errors->first('destination') }} </span>    
                                        @else
                                            <span class="help-block"> Alamat tujuan. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('distance') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Jarak</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('distance') }}" name="distance" class="form-control" placeholder="Jarak (KM)"/>
                                        
                                        @if ($errors->has('distance'))
                                            <span class="help-block"> {{ $errors->first('distance') }} </span>
                                        @else
                                            <span class="help-block"> Jarak asal dan tujuan (KM). </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Biaya Transport</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('cost') }}" placeholder="Biaya Transport" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="cost" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('cost'))
                                            <span class="help-block"> {{ $errors->first('cost') }} </span>    
                                        @else
                                            <span class="help-block"> Biaya supir dan solar. </span>
                                        @endif
                                    </div>
                                </div>                                     
                                <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Harga Sewa</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('total') }}" placeholder="Harga Sewa" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="total" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('total'))
                                            <span class="help-block"> {{ $errors->first('total') }} </span>    
                                        @else
                                            <span class="help-block"> Harga sewa jasa / pengiriman. </span>
                                        @endif
                                    </div>
                                </div>                                     
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Keterangan Transportasi</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('description') }}" name="description" class="form-control" placeholder="Keterangan"/>
                                        
                                        @if ($errors->has('description'))
                                            <span class="help-block"> {{ $errors->first('description') }} </span>
                                        @else
                                            <span class="help-block"> Keterangan pengiriman. </span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Pengiriman</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ old('date') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('date'))
                                            <span class="help-block"> {{ $errors->first('description') }} </span>
                                        @endif
                                    </div>
                                </div>                                                                                                                                               
                            </div>
                            {{ csrf_field() }}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Simpan</button>
                                        <a href="{{ route('transportation.index') }}" class="btn default">
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