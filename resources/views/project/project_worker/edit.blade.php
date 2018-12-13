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
            Edit Data Karyawan          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectWorkerController@update', $data_worker->id_worker) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_worker->id_project }}" placeholder="Nama Lengkap" class="form-control" disabled/>
                                        <span class="help-block"> ID Projek </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $data_worker->id_project }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" value="{{ $data_worker->name }}" placeholder="Nama Lengkap" class="form-control" />
                                        <span class="help-block"> Nama Lengkap </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Lahir</label>
                                    <div class="col-md-9">
                                        <input name="age" value="{{ date('d/m/Y', strtotime($data_worker->age)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Lahir </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <input name="address" value="{{ $data_worker->address }}" type="text" placeholder="Alamat Rumah" class="form-control" />
                                        <span class="help-block"> Alamat Rumah </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Telpon</label>
                                    <div class="col-md-9">
                                        <input name="telp" value="{{ $data_worker->telp }}" type="text" placeholder="Telpon" class="form-control" />
                                        <span class="help-block"> Telpon / No Handphone </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Agama</label>
                                    <div class="col-md-9">
                                        <select name="religion" value="{{ $data_worker->religion }}" class="form-control" >
                                            <option value="{{ $data_worker->religion }}">
                                                {{ $data_worker->religion . ' (DATA SAAT INI)' }}
                                            </option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Divisi</label>
                                    <div class="col-md-9">
                                        <select name="division" class="form-control" >
                                            <option value="{{ $data_worker->division }}">
                                                {{ $data_worker->division  . ' (DATA SAAT INI)'}}
                                            </option>
                                            <option value="Bendahara">Bendahara</option>
                                            <option value="Pemasaran">Pemasaran</option>
                                            <option value="Marketing">Marketing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Gender</label>
                                    <div class="col-md-9">
                                    <select name="gender" class="form-control" >
                                            <option value="{{ $data_worker->gender }}">{{ $data_worker->gender }}</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>                                            
                                        </select>
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