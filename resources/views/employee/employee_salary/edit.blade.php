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
                        <form action="{{ action('EmployeeSalaryController@update', $data_employee->id_salary) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Gaji</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_employee->employee->id_employee }}" disabled class="form-control" />
                                        <span class="help-block"> ID Gaji </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_salary" value="{{ $data_employee->id_salary }}" />   
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerja</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_employee->employee->name . '-' . $data_employee->id_employee }}" disabled class="form-control" />
                                        <span class="help-block"> Keterangan Pekerja </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_employee" value="{{ $data_employee->id_employee }}" />                                                             
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Gaji</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_employee->salary }}" name="salary" class="form-control" />
                                        <span class="help-block"> Jumlah Gaji </span>
                                    </div>
                                </div>                                                          
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Gaji</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ date('m/d/Y', strtotime($data_employee->date)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Pemberian Gaji </span>
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