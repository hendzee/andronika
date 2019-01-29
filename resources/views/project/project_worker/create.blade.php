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
                    <a href="{{ route('project_worker_index', $id_project) }}"> Pekerja </a>
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
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $id_project }}" />
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Nama Lengkap" class="form-control" />
                                        
                                        @if ($errors->has('name'))
                                            <span class="help-block"> {{ $errors->first('name') }} </span>
                                        @else
                                            <span class="help-block"> Nama lengkap. </span>
                                        @endif
                                    </div>
                                </div>                                
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <input name="address" value="{{ old('address') }}" type="text" placeholder="Alamat Rumah" class="form-control" />                                        
                                        
                                        @if ($errors->has('address'))
                                            <span class="help-block"> {{ $errors->first('address') }} </span>
                                        @endif
                                    </div>                                   
                                </div>
                                <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Telpon</label>
                                    <div class="col-md-9">
                                        <input name="telp" value="{{ old('telp') }}" type="text" placeholder="Telpon" class="form-control" />
                                        
                                        @if ($errors->has('telp'))
                                            <span class="help-block"> {{ $errors->first('telp') }} </span>
                                        @else
                                            <span class="help-block"> Telpon / No handphone. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Agama</label>
                                    <div class="col-md-9">
                                        <select name="religion" class="form-control" >
                                            <option value="ISLAM">ISLAM</option>
                                            <option value="KRISTEN">KRISTEN</option>
                                            <option value="HINDU">HINDU</option>
                                            <option value="BUDHA">BUDHA</option>
                                            <option value="KONGHUCU">KONGHUCU</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Pekerjaan</label>
                                    <div class="col-md-9">
                                        <input name="division" value="{{ old('division') }}" type="text" placeholder="Pekerjaan Dalam Projek" class="form-control" />
                                        
                                        @if ($errors->has('division'))
                                            <span class="help-block"> {{ $errors->first('division') }} </span>
                                        @else
                                            <span class="help-block"> Informasi kerja. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Gender</label>
                                    <div class="col-md-9">
                                        <select name="gender" class="form-control" >
                                            <option value="PRIA">PRIA</option>
                                            <option value="WANITA">WANITA</option>                                            
                                        </select>                                        
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
                                            Pilih kontrak (pembayaran dengan sistem kontrak) / harian (dibayar berdasarkan hari kerja)
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