@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Form Stuff</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Bonus   
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectBonusController@store', $id_worker) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->id_project }}" disabled class="form-control" />
                                        <span class="help-block"> ID Projek </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $data_bonus->id_project }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Pekerja</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->id_worker }}" disabled class="form-control" />
                                        <span class="help-block"> ID Pekerja </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_worker" value="{{ $data_bonus->id_worker }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Bonus</label>
                                    <div class="col-md-9">
                                        <input type="text" name="bonus" placeholder="Jumlah Bonus" class="form-control" />
                                        <span class="help-block"> Jumlah Bonus </span>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-md-3">Deskripsi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="description" placeholder="Deskripsi" class="form-control" />
                                        <span class="help-block"> Deskripsi </span>
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
                                        <button type="button" class="btn default">Batal</button>
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