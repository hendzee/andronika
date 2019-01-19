@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('project_purchase_index', $id_project) }}"> Pembelian Barang </a>
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
            Pembelian      
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectPurchaseController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_project->name . ' | ' . date('d M, Y', strtotime($data_project->start)) }}" placeholder="Nama Lengkap" class="form-control" disabled/>                                        
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $id_project }}" name="id_project" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                        <select name="id_supply" class="form-control">
                                            @foreach($data_supply as $data)
                                                <option value={{ $data->id_supply }}>
                                                    {{ $data->item_name . " ($data->measure)" }}
                                                </option>                                                
                                            @endforeach                                        
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Beli</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ old('date') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('date'))
                                            <span class="help-block"> {{ $errors->first('date') }} </span>
                                        @else
                                            <span class="help-block"> mm/dd/yyy. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('total_item') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Jumlah</label>
                                    <div class="col-md-9">
                                        <input name="total_item" value="{{ old('total_item') }}" type="text" placeholder="Jumlah Barang" class="form-control" />
                                        
                                        @if ($errors->has('total_item'))
                                            <span class="help-block"> {{ $errors->first('total_item') }} </span>
                                        @else
                                            <span class="help-block"> Jumlah barang. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('price_per_item') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Harga/Satuan</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('price_per_item') }}" placeholder="Harga/Satuan" class="form-control masking-form"/>
                                                <input type="hidden" id="total_hidden" name="price_per_item" class="masking-form-hidden">
                                            </div>

                                            @if ($errors->has('price_per_item'))
                                                <span class="help-block"> {{ $errors->first('price_per_item') }} </span>
                                            @endif
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('resp_person') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Pembeli</label>
                                    <div class="col-md-9">
                                        <input name="resp_person" value="{{ old('resp_person') }}" type="text" placeholder="Pembeli" class="form-control" />
                                        
                                        @if ($errors->has('resp_person'))
                                            <span class="help-block"> {{ $errors->first('resp_person') }} </span>
                                        @else
                                            <span class="help-block"> Nama pembeli. </span>
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
                                        <a href="{{ route('project_purchase_index', $id_project) }}" class="btn default"> 
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