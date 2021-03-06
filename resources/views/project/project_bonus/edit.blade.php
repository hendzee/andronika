@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $data_bonus->id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('worker_salary_index', $data_bonus->id_project) }}"> Gaji Harian </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('project_bonus_index', [
                        'id' => $data_bonus->id_worker,
                        'id_prj' => $data_bonus->id_project]) }}"> 
                        Bonus 
                    </a>
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
            Edit Data Bonus   
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectBonusController@update', $data_bonus->id_bonus) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->project->name . ' | ' . date('d M, Y', strtotime($data_bonus->project->start)) }}" disabled class="form-control" />
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $data_bonus->id_project }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerja</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->worker->name . ' | ' . $data_bonus->worker->address }}" disabled class="form-control" />
                                    </div>
                                </div>
                                <input type="hidden" name="id_worker" value="{{ $data_bonus->id_worker }}" />                                
                                <div class="form-group {{ $errors->has('bonus') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Jumlah Bonus</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('bonus', round($data_bonus->bonus)) }}" placeholder="Bonus" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="bonus" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('bonus'))
                                            <span class="help-block"> {{ $errors->first('bonus') }} </span>    
                                        @endif
                                    </div>
                                </div>                                    
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Keterangan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('description', $data_bonus->description) }}" name="description" placeholder="Keterangan" class="form-control" />
                                        
                                        @if ($errors->has('description'))
                                            <span class="help-block"> {{ $errors->first('description') }} </span>
                                        @else
                                            <span class="help-block"> Keterangan pemberian bonus. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status">
                                            <option value="{{ $data_bonus->status }}">
                                                {{ $data_bonus->status . ' (Nilai Saat Ini)' }}
                                            </option>
                                            <option value="BELUM DIAMBIL">BELUM DIAMBIL</option>
                                            <option value="DIAMBIL">DIAMBIL</option>
                                        </select>                                        
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Pengambilan</label>
                                    <div class="col-md-9">
                                        @if ($data_bonus->status == null || $data_bonus->status == 'BELUM DIAMBIL')
                                            <input name="date_take" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="{{ old('date_take') }}" />
                                        @else
                                            <input name="date_take" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="{{ old('date_take', date('d-m-Y', strtotime($data_bonus->date_take))) }}" />
                                        @endif
                                        <span class="help-block"> Isikan jika bonus sudah diambil. </span>
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
                                        <a href="{{ route('project_bonus_index', [
                                            'id' => $data_bonus->id_worker,
                                            'id_prj' => $data_bonus->id_project]) }}" class="btn default"> 
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