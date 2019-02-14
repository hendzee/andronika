@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('mutation.index') }}">Mutasi</a>
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
            Edit Mutasi
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('MutationController@update', $data_mutation->id_mutation) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Uang Asal</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="source">
                                            @if ($data_mutation->source != 'PERUSAHAAN' 
                                                && $data_mutation->source != 'KAS' && $data_mutation->source != 'PRIBADI')
                                                @php
                                                    $get_project = App\Project::where('id_project', $data_mutation->source)
                                                        ->first();
                                                @endphp
                                                <option value="{{ $data_mutation->source }}">
                                                    {{ $get_project->name . ' | ' 
                                                        . date('d M, Y', strtotime($get_project->start))
                                                        . ' (DATA SAAT INI)' }}
                                                </option>
                                            @else
                                                <option value="{{ $data_mutation->source }}">
                                                    {{ $data_mutation->source . ' (DATA SAAT INI)' }}
                                                </option>
                                            @endif    

                                            <option value="PERUSAHAAN">PERUSAHAAN</option>
                                            <option value="KAS">KAS</option>
                                            @can('private_money_add', 'private_money_edit', 
                                                'private_money_delete')
                                                <option value="PRIBADI">PRIBADI</option>
                                            @endcan

                                            @foreach ($data_project as $data)
                                                <option value="{{ $data->id_project }}">
                                                    {{ $data->name . ' | ' . date('d M, Y', strtotime($data->start)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Uang asal / sumber. </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tujuan Uang</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="destiny">                                                
                                            @if ($data_mutation->destiny != 'PERUSAHAAN'
                                                && $data_mutation->destiny != 'KAS' && $data_mutation->destiny != 'PRIBADI')
                                                @php
                                                    $get_project = App\Project::where('id_project', $data_mutation->destiny)
                                                        ->first();
                                                @endphp
                                                <option value="{{ $data_mutation->destiny }}">
                                                    {{ $get_project->name . ' | ' 
                                                        . date('d M, Y', strtotime($get_project->start))
                                                        . ' (DATA SAAT INI)' }}
                                                </option>
                                            @else
                                                <option value="{{ $data_mutation->destiny }}">
                                                    {{ $data_mutation->destiny . ' (DATA SAAT INI)' }}
                                                </option>
                                            @endif                                            
                                            
                                            <option value="PERUSAHAAN">PERUSAHAAN</option>
                                            <option value="KAS">KAS</option>
                                            @can('private_money_add', 'private_money_edit', 
                                                'private_money_delete')
                                                <option value="PRIBADI">PRIBADI</option>
                                            @endcan
                                            
                                            @foreach ($data_project as $data)
                                                <option value="{{ $data->id_project }}">
                                                    {{ $data->name . ' | ' . date('d M, Y', strtotime($data->start)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Tujuan uang mutasi. </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('nominal') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Nominal</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('nominal', round($data_mutation->nominal)) }}" placeholder="Nominal" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="nominal" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('nominal'))
                                            <span class="help-block"> {{ $errors->first('nominal') }} </span>    
                                        @endif
                                    </div>
                                </div>        
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Tanggal Mutasi</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ old('date', date('m/d/Y', strtotime($data_mutation->date))) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        
                                        @if ($errors->has('date'))
                                            <span class="help-block"> {{ $errors->first('date') }} </span>
                                        @endif
                                    </div>
                                </div>                                                                
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Keterangan</label>
                                    <div class="col-md-9">
                                        <input name="description" value="{{ old('description', $data_mutation->description) }}" type="text" placeholder="Keterangan" class="form-control" />
                                        
                                        @if ($errors->has('description'))
                                            <span class="help-block"> {{ $errors->first('description') }} </span>
                                        @else
                                            <span class="help-block"> Keterangan mutasi. </span>
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
                                        <a href="{{ route('mutation.index') }}" class="btn default">
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