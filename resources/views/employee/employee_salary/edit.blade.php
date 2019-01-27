@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('employee_salary.index') }}">Gaji Karyawan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Baru/Edit</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Gaji Pokok Karyawan        
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('EmployeeSalaryController@update', $data_employee->id_employee) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerja</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_employee->name . ' | ' . $data_employee->address }}" disabled class="form-control" />
                                        <span class="help-block"> Keterangan Pekerja </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_employee" value="{{ $data_employee->id_employee }}" />                                                             
                                <div class="form-group {{ $errors->has('bonus') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Gaji Pokok</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('salary', $data_employee->employee_salary == null ? 0 : round($data_employee->employee_salary->salary) ) }}" placeholder="Gaji Pokok" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="salary" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('bonus'))
                                            <span class="help-block"> {{ $errors->first('salary') }} </span>    
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
                                        <a href="{{ route('employee_salary.index') }}" class="btn default">
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