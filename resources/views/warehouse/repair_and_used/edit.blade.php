@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="#">Warehouse</a>
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
            Edit Data Perbaikan dan Dipakai     
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('RepairAndUsedController@update', $item_name) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $item_name }}" placeholder="Nama Lengkap" class="form-control" disabled/>
                                        <span class="help-block"> Nama Barang </span>
                                    </div>
                                </div>
                                <input type="hidden" name="item_name" value="{{ $item_name }}" class="form-control" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Barang Rusak</label>
                                    <div class="col-md-9">
                                        <input type="text" name="number_repair" value="{{ $repair_and_used == null ? 0 : $repair_and_used->number_repair }}" placeholder="Nama Lengkap" class="form-control" />
                                        <span class="help-block"> Jumlah Barang Rusak </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Barang Dipakai</label>
                                    <div class="col-md-9">
                                        <input type="text" name="number_used" value="{{ $repair_and_used == null ? 0 : $repair_and_used->number_used }}" placeholder="Nama Lengkap" class="form-control" />
                                        <span class="help-block"> Jumlah Barang Dipakai </span>
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
                                        <a href="{{ route('employee.index') }}" class="btn default">
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