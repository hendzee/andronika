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
                    <span>Edit Data Bahan Bakar</span>
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
                        <form action="{{ action('TransportationController@update', $data_transportation->id_transportation) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">     
                                <input type="hidden" name="id_transportation" value="{{ $data_transportation->id_transportation }}" />   
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerja</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_transportation->employee->name . ' | ' . $data_transportation->id_employee }}" disabled class="form-control" />
                                        <span class="help-block"> Keterangan Pekerja </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_employee" value="{{ $data_transportation->id_employee }}" /> 
                                <div class="form-group">
                                    <label class="control-label col-md-3">Awal</label>
                                    <div class="col-md-9">
                                        <input type="text" name="starting_point" value="{{ $data_transportation->starting_point }}" class="form-control" placeholder="Tempat Awal"/>
                                        <span class="help-block"> Awal Keberangkatan Barang Dikirim</span>
                                    </div>
                                </div>                                                          
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tujuan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="destination" value="{{ $data_transportation->destination }}" class="form-control" placeholder="Tujuan"/>
                                        <span class="help-block"> Tujuan Akhir Barang Dikirim </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jarak</label>
                                    <div class="col-md-9">
                                        <input type="text" name="distance" value="{{ $data_transportation->distance }}" class="form-control" placeholder="Jarak (KM)"/>
                                        <span class="help-block"> Jarak Tempuh Keberangkatan Sampai Tujuan Dalam Kilometer (KM) </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Total</label>
                                    <div class="col-md-9">
                                        <input type="text" name="cost" value="{{ $data_transportation->cost }}" class="form-control" placeholder="Total Pengeluaran Bahan Bakar"/>
                                        <span class="help-block"> Total Pengeluaran Bahan Bakar </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Keterangan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="description" value="{{ $data_transportation->description }}" class="form-control" placeholder="Keterangan"/>
                                        <span class="help-block"> Keterangan Barang Yang Dikirim </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Token</label>
                                    <div class="col-md-9">
                                        <input type="text" name="url_token" value="{{ $data_transportation->url_token }}" class="form-control" placeholder="Keterangan"/>
                                        <span class="help-block"> Token Pembelian Solar Oleh Supir </span>
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
                                        <a href="{{ route('transportation.index') }}">
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