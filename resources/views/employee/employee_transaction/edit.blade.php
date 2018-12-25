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
                    <a href="{{ route('employee_transaction_index', $data_transaction->id_salary) }}">
                        Pengambilan Gaji
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
            Edit Data Pemberian Gaji
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('EmployeeTransactionController@update', $data_transaction->id_transaction) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Transaction</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_transaction->id_transaction }}" disabled class="form-control" />
                                        <span class="help-block"> ID Transaction </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_transaction" value="{{ $data_transaction->id_transaction }}" />
                                <input type="hidden" name="id_salary" value="{{ $data_transaction->id_salary }}" />                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Employee</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_transaction->id_employee }}" disabled class="form-control" />
                                        <span class="help-block"> ID Employee </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_employee" value="{{ $data_transaction->id_employee }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_transaction->employee->name }}" disabled class="form-control" />
                                        <span class="help-block"> Nama Karyawan </span>
                                    </div>
                                </div>
                                <input type="hidden" name="name" value="{{ $data_transaction->employee->name }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nominal</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_transaction->nominal }}" name="nominal" placeholder="Nominal" class="form-control" />
                                        <span class="help-block"> Jumlah Gaji yang Diterima Pekerja </span>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Pengambilan</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ date('d/m/Y', strtotime($data_transaction->date)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Pengambilan Gaji </span>
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
                                        <a href="{{ route('employee_transaction_index', $data_transaction->id_salary) }}" class="btn default">
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