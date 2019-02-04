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
                    <a href="{{ route('transaction_transportation_index', $id_transportation) }}"> Transaksi Transportasi </a>
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
            Edit Transaksi Transportasi
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('TransactionTransportationController@update', $data_transaction->id_transaction) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Transaksi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="id_transaction" value="{{ $data_transaction->id_transaction }}" class="form-control" disabled/>
                                        <span class="help-block">ID Transaksi</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Transportasi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="id_transporation" value="{{ $id_transportation }}" class="form-control" disabled/>
                                        <span class="help-block">ID Transporatsi</span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_transportation" value="{{ $data_transaction->id_transportation }}" />
                                <div class="form-group {{ $errors->has('nominal') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Uang Masuk</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('nominal', round($data_transaction->nominal)) }}" placeholder="Uang Masuk" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="nominal" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('nominal'))
                                            <span class="help-block"> {{ $errors->first('nominal') }} </span>    
                                        @else
                                            <span class="help-block"> Uang Masuk. </span>
                                        @endif
                                    </div>
                                </div>                                     
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Pembayaran</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ old('date', date('m/d/Y', strtotime($data_transaction->date))) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text"/>
                                        
                                        @if ($errors->has('date'))
                                            <span class="help-block"> {{ $errors->first('date') }} </span>
                                        @endif
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
                                        <a href="{{ route('transaction_transportation_index', $data_transaction->id_transportation) }}" class="btn default"> 
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