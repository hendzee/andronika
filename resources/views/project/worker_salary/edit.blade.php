@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $data_worker->project->id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('worker_salary_index', $data_worker->project->id_project) }}"> Gaji Harian </a>
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
            Data Gaji Baru        
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('WorkerSalaryController@update', $id_worker) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_worker->project->name . ' | ' . date('d M, Y', strtotime($data_worker->project->start)) }}" disabled class="form-control" />                                        
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $data_worker->project->id_project }}" />                                                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerja</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_worker->name . ' | ' . $data_worker->address }}" disabled class="form-control" />                                        
                                    </div>
                                </div>
                                <input type="hidden" name="id_worker" value="{{ $id_worker }}" />                                                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Gaji/Hari</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Rp
                                            </span>
                                            <input type="text" value="{{ $data_worker->worker_salary == null ? 0 : round($data_worker->worker_salary->salary) }}" placeholder="Gaji/Hari" class="form-control masking-form" />
                                            <input type="hidden" id="total_hidden" name="salary" class="masking-form-hidden">
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Hari Kerja (1 hari)</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_worker->worker_salary == null ? 0 : $data_worker->worker_salary->fullday }}" name="fullday" class="form-control" />                                        
                                        <span class="help-block"> Jumlah 1 hari kerja (fullday). </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Hari Kerja (1/2 hari)</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_worker->worker_salary == null ? 0 : $data_worker->worker_salary->halfday }}" name="halfday" class="form-control" />                                        
                                        <span class="help-block"> Jumlah 1/2 hari kerja (halfday). </span>
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
                                        <a href="{{ route('worker_salary_index', $data_worker->project->id_project) }}" class="btn default"> 
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