@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Transportasi</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Buat Supir</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Supir Baru          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('DriverController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-9">
                                    <input name="name" type="text" placeholder="Nama Supir" class="form-control" />
                                    <span class="help-block"> Nama Pengemudi </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                <div class="col-md-9">
                                    <input name="address" type="text" placeholder="Alamat Supir" class="form-control" />
                                    <span class="help-block"> Alamat Pengemudi </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telpon</label>
                                <div class="col-md-9">
                                    <input name="telp" type="text" placeholder="Alamat Supir" class="form-control" />
                                    <span class="help-block"> Telpon / Nomor Handphone Pengemudi </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Lahir</label>
                                <div class="col-md-9">
                                        <input name="age" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                    <span class="help-block"> Tanggal lahir Pengemudi </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <select name="gender" class="form-control" >
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>                                            
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3">Agama</label>
                                <div class="col-md-9">
                                    <select name="religion" class="form-control" >
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
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