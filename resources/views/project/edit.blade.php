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
            Edit Projek         
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectController@update', $data_project->id_project) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_project->name }}" name="name" placeholder="Nama Projek" class="form-control" />
                                        <span class="help-block"> Nama Projek </span>
                                    </div>
                                </div>                             
                                <div class="form-group">
                                    <label class="control-label col-md-3">Klien</label>
                                    <div class="col-md-9">
                                        <select name="id_client" class="form-control">    
                                            <option value="{{ $data_project->id_client }}">
                                                {{ $data_project->client->description . ' | ' . $data_project->id_client . ' (DATA SAAT INI)' }}
                                            </option>                                        
                                            @foreach($data_client as $data)
                                                <option value="{{ $data->id_client }}">
                                                    {{ $data->description . ' | ' . $data->id_client }}                                                    
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Keterangan Klien </span>
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pulau</label>
                                    <div class="col-md-9">
                                        <select name="island" class="form-control">
                                            <option value="{{ $data_project->island }}"> 
                                                {{ $data_project->island . ' (DATA SAAT INI)' }}
                                            </option>
                                            <option value="Sulawesi">Sulawesi</option>
                                            <option value="Jawa">Jawa</option>
                                            <option value="Kalimantan">Kalimantan</option>
                                        </select>
                                        <span class="help-block"> Pulau </span>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" class="form-control">
                                            <option value="{{ $data_project->status }}">
                                                {{ $data_project->status . ' (DATA SAAT INI)'}}
                                            </option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>                                            
                                        </select>
                                        <span class="help-block"> Status Projek </span>
                                    </div>
                                </div>                            
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Mulai</label>
                                    <div class="col-md-9">
                                        <input name="start" value="{{ date('m/d/Y', strtotime($data_project->start)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Pelaksanaan </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Berakhir</label>
                                    <div class="col-md-9">
                                    <input name="end" value="{{ date('m/d/Y', strtotime($data_project->end)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Berakhir </span>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3">Harga Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value={{ $data_project->total }} name="total" placeholder="Ex.5000000" class="form-control" />
                                        <span class="help-block"> Harga Projek </span>
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