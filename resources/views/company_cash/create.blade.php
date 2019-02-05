@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('company_cash.index') }}">Uang Kas Perusahaan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Data Uang Kas</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Uang Kas
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('CompanyCashController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Keterangan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('desc') }}" name="desc" class="form-control" placeholder="Barang (Satuan)"/>
                                        
                                        @if ($errors->has('desc'))
                                            <span class="help-block">{{ $errors->first('desc') }}</span>
                                        @else
                                            <span class="help-block">Keterangan pembelian / jasa dan satuan barang jika ada.</span>
                                        @endif
                                    </div>
                                </div>     
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Harga per satuan</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Rp
                                            </span>
                                            <input type="text" value="{{ old('price') }}" placeholder="Harga Per Satuan" class="form-control masking-form" />
                                            <input type="hidden" id="total_hidden" name="price" class="masking-form-hidden">
                                        </div>

                                        @if ($errors->has('price'))
                                            <span class="help-block"> {{ $errors->first('price') }} </span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Jumlah</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('number') }}" name="number" class="form-control" placeholder="Jumlah"/>
                                        
                                        @if ($errors->has('number'))
                                            <span class="help-block"> {{ $errors->first('number') }} </span>
                                        @else
                                            <span class="help-block">Tulis 1, jika dalam bentuk jasa.</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Pembelian</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ old('date') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('date'))
                                            <span class="help-block">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                </div>                                                                             
                            </div>
                            {{ csrf_field() }}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Simpan</button>
                                        <a href="{{ route('company_cash.index') }}" class="btn default">
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