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
                        <form action="{{ action('EmployeeBonusController@update', $data_bonus->id_bonus) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Bonus</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->id_bonus }}" disabled class="form-control" />
                                        <span class="help-block"> ID Bonus </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_bonus" value="{{ $data_bonus->id_bonus }}" />
                                <input type="hidden" name="id_salary" value="{{ $data_bonus->id_salary }}" />                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Karyawan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->id_employee }}" disabled class="form-control" />
                                        <span class="help-block"> ID Karyawan </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_employee" value="{{ $data_bonus->id_employee }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->employee->name }}" disabled class="form-control" />
                                        <span class="help-block"> Nama Karyawan </span>
                                    </div>
                                </div>
                                <input type="hidden" name="name" value="{{ $data_bonus->employee->name }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nominal</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->bonus }}" name="bonus" placeholder="Nominal" class="form-control" />
                                        <span class="help-block"> Jumlah Gaji yang Diterima Pekerja </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status">
                                            <option value="{{ $data_bonus->status }}">
                                                {{ $data_bonus->status . ' (Nilai Saat Ini)' }}
                                            </option>
                                            <option value="belum diambil">Belum diambil</option>
                                            <option value="diambil">Sudah diambil</option>
                                        </select>
                                        <span class="help-block"> Isikan Jika Bonus Sudah Diambil </span>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-3">keterangan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->description }}" name="desc" placeholder="Nominal" class="form-control" />
                                        <span class="help-block"> Jumlah Gaji yang Diterima Pekerja </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Pengambilan</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ date('d/m/Y', strtotime($data_bonus->date)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Pengambilan Bonus </span>
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