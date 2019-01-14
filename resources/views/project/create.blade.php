@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.index') }}">Projek</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Projek Baru</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Projek Baru          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Nama projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Nama Projek" class="form-control" />                                        
                                        
                                        @if ($errors->has('name'))
                                            <span class="help-block"> {{ $errors->first('name') }} </span>
                                        @endif
                                    </div>
                                </div>                             
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
                                        <span class="help-block"> Keterangan klien. </span>
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="control-label col-md-3">Daerah</label>
                                    <div class="col-md-9">
                                        <select name="island" class="form-control">
                                            <option value="Luwuk">LUWUK</option>
                                            <option value="Banggai Laut">BANGGAI LAUT</option>
                                            <option value="Banggai Kepulauan">BANGGAI KEPULAUAN</option>
                                        </select>                                        
                                    </div>
                                </div>                                  
                                <div class="form-group {{ $errors->has('start') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Mulai</label>
                                    <div class="col-md-9">
                                        <input name="start" value="{{ old('start') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('start'))
                                            <span class="help-block"> {{ $errors->first('start') }} </span>
                                        @else
                                            <span class="help-block"> dd/mm/yyy. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('end') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Berakhir</label>
                                    <div class="col-md-9">
                                        <input name="end" value="{{ old('end') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('end'))
                                            <span class="help-block"> {{ $errors->first('end') }} </span>
                                        @else
                                            <span class="help-block"> dd/mm/yyy. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                                    <label class="col-md-3 control-label">Harga Projek</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('total') }}" id="total" placeholder="Ex.5000000" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="total" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('total'))
                                            <span class="help-block"> {{ $errors->first('total') }} </span>
                                        @else
                                            <span class="help-block"> Harga projek. </span>
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
                                        <a href="{{ route('project.index') }}" class="btn default">Batal</a>
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
