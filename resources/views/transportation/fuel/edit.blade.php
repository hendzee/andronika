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
                    <span>Edit Data Solar</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Edit Data Bahan Bakar          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('FuelController@update', $data_fuel->id_fuel) }}" method="POST" class="form-horizontal form-row-seperated">                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{ $data_fuel->name }}" class="form-control" placeholder="Nama" disabled/>
                                    <span class="help-block"> Nama Bahan Bakar Kendaraan </span>
                                </div>
                            </div>                                                          
                            <div class="form-group">
                                <label class="control-label col-md-3">Harga</label>
                                <div class="col-md-9">
                                    <input type="text" name="price" value="{{ $data_fuel->price }}" class="form-control" placeholder="Harga"/>
                                    <span class="help-block"> Harga Bahan Bakar Per Liter </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal</label>
                                <div class="col-md-9">
                                    <input name="date" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value=" {{ date('M d Y', strtotime($data_fuel->date)) }}"/>
                                    <span class="help-block"> Tanggal Harga Bahan Bakar Baru </span>
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
                                        <a href="{{ route('fuel.index') }}">
                                            <button type="button" class="btn default">Batal</button>
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