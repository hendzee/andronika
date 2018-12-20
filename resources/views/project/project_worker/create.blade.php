@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('project_worker_index', $id_project) }}"> Pekerja Biasa </a>
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
            Pekerja Baru          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectWorkerController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_project->name . ' | ' . date('d M, Y', strtotime($data_project->start)) }}" placeholder="Nama Lengkap" class="form-control" disabled/>
                                        <span class="help-block"> Projek </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $id_project }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" placeholder="Nama Lengkap" class="form-control" />
                                        <span class="help-block"> Nama Lengkap </span>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <input name="address" type="text" placeholder="Alamat Rumah" class="form-control" />
                                        <span class="help-block"> Alamat Rumah </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Telpon</label>
                                    <div class="col-md-9">
                                        <input name="telp" type="text" placeholder="Telpon" class="form-control" />
                                        <span class="help-block"> Telpon / No Handphone </span>
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
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerjaan</label>
                                    <div class="col-md-9">
                                        <input name="division" type="text" placeholder="Pekerjaan Dalam Projek" class="form-control" />
                                        <span class="help-block"> Informasi Kerja </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Gender</label>
                                    <div class="col-md-9">
                                        <select name="gender" class="form-control" >
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>                                            
                                        </select>
                                        <span class="help-block"> Gender </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Metode Gaji</label>
                                    <div class="col-md-9">
                                        <select name="salary_status" class="form-control" >
                                            <option value="KONTRAK">KONTRAK</option>
                                            <option value="HARIAN">HARIAN</option>                                            
                                        </select>
                                        <span class="help-block"> 
                                            Pilih Kontrak (Pembayaran Dengan Sistem Kontrak) / Harian (Dibayar Berdasarkan Hari Kerja)
                                        </span>
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
                                        <a href="{{ route('project_worker_index', $id_project) }}" class="btn default"> 
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