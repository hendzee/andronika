@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $data_supply->id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('project_supply_index', $data_supply->id_project) }}"> Kebutuhan Barang </a>
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
            Edit Data     
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectSupplyController@update', $data_supply->item_name) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_supply->project->name . ' | ' . date('d M, Y', strtotime($data_supply->project->start)) }}" disabled class="form-control" />                                        
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $data_supply->id_project }}" />                                
                                <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('item_name'), $data_supply->item_name }}" name="item_name" placeholder="Nama Barang" class="form-control" />
                                        
                                        @if ($errors->has('item_name'))
                                            <span class="help-block"> {{ $errors->first('item_name') }} </span>    
                                        @endif
                                    </div>
                                </div>                             
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal</label>
                                    <div class="col-md-9">
                                        <select name="measure" class="form-control">
                                            <option value="{{ $data_supply->measure }}">{{ $data_supply->measure }}</option>
                                            <option value="SAK">Sak</option>
                                            <option value="KG">Kg</option>
                                            <option value="TON">Ton</option>
                                            <option value="LITER">Liter</option>
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
                                        <a href="{{ route('project_supply_index', $data_supply->id_project) }}" class="btn default"> 
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