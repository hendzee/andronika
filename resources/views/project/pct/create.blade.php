@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $data_transaction->id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('worker_contract_index', $data_transaction->id_project) }}"> Pekerja Kontrak </a>
                    <i class="fa fa-circle"></i>
                </li>                
                <li>
                    <a href="{{ route('pct_index', ['id' => $id_contract, 
                        'id_prj' => $data_transaction->id_project]) }}"> 
                        Pembayaran Kontrak 
                    </a>
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
            Pembayaran Kontrak
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('PCTController@store', $id_contract) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_transaction->project->name . ' | ' . date('d M, Y', strtotime($data_transaction->project->start)) }}" disabled class="form-control" />
                                        <span class="help-block"> Projek </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $data_transaction->id_project }}" />                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerja</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_transaction->worker->name . ' | ' . $data_transaction->worker->address}}" disabled class="form-control" />
                                        <span class="help-block"> Pekerja </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_worker" value="{{ $data_transaction->id_worker }}" />                                
                                <input type="hidden" name="id_contract" value="{{ $data_transaction->id_contract }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nominal</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nominal" placeholder="Nominal" class="form-control" />
                                        <span class="help-block"> Jumlah Gaji yang Diterima Pekerja </span>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Pengambilan</label>
                                    <div class="col-md-9">
                                        <input name="date" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Pengambilan Gaji </span>
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
                                        <a href="{{ route('pct_index', ['id' => $id_contract, 
                                            'id_prj' => $data_transaction->id_project]) }}" class="btn default"> 
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