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
                        <form action="{{ action('WorkerSalaryController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $id_project }}" disabled class="form-control" />
                                        <span class="help-block"> ID Projek </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $id_project }}" />                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerja</label>
                                    <div class="col-md-9">
                                        <select name="id_worker" class="form-control">
                                            @foreach($data_worker as $data)
                                                <option value="{{ $data->id_worker }}">
                                                    {{ $data->name . ' ' . $data->id_worker }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Keterangan Pekerja </span>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Gaji</label>
                                    <div class="col-md-9">
                                        <input type="text" name="salary" class="form-control" />
                                        <span class="help-block"> Jumlah Gaji </span>
                                    </div>
                                </div>                                                          
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Gaji</label>
                                    <div class="col-md-9">
                                        <input name="salary_date" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Pemberian Gaji </span>
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