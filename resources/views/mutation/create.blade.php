@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('mutation.index') }}">Mutasi</a>
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
            Mutasi Baru       
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('MutationController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Uang Asal</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="source">
                                            <option value="PERUSAHAAN">PERUSAHAAN</option>
                                            @foreach ($data_project as $data)
                                                <option value="{{ $data->id_project }}">
                                                    {{ $data->name . ' | ' . date('d M, Y', strtotime($data->start)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Uang Asal </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tujuan Uang</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="destiny">
                                                <option value="PERUSAHAAN">PERUSAHAAN</option>
                                                @foreach ($data_project as $data)
                                                    <option value="{{ $data->id_project }}">
                                                            {{ $data->name . ' | ' . date('d M, Y', strtotime($data->start)) }}
                                                    </option>
                                                @endforeach
                                        </select>
                                        <span class="help-block"> Tujuan Uang </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nominal Uang</label>
                                    <div class="col-md-9">
                                        <input name="nominal" type="text" placeholder="Nominal Uang" class="form-control" />
                                        <span class="help-block"> Nominal Uang </span>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Mutasi</label>
                                    <div class="col-md-9">
                                        <input name="date" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Mutasi </span>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Keterangan</label>
                                    <div class="col-md-9">
                                        <input name="description" type="text" placeholder="Keterangan" class="form-control" />
                                        <span class="help-block"> Keterangan </span>
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
                                        <a href="{{ route('mutation.index') }}" class="btn default">
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