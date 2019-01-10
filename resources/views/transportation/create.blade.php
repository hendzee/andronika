@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('employee_salary.index') }}">Transportasi</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Transportasi</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Transportasi Baru        
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('TransportationController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">     
                                <div class="form-group">
                                    <label class="control-label col-md-3">Supir</label>
                                    <div class="col-md-9">
                                        <select name="id_employee" class="form-control">
                                            @foreach($data_employee as $data)
                                                <option value="{{ $data->id_employee }}">
                                                    {{ $data->name . ' | ' . $data->address }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"> Keterangan Supir </span>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-3">Awal</label>
                                    <div class="col-md-9">
                                        <input type="text" name="starting_point" class="form-control" placeholder="Tempat Awal"/>
                                        <span class="help-block"> Awal Keberangkatan Barang Dikirim</span>
                                    </div>
                                </div>                                                          
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tujuan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="destination" class="form-control" placeholder="Tujuan"/>
                                        <span class="help-block"> Tujuan Akhir Barang Dikirim </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jarak</label>
                                    <div class="col-md-9">
                                        <input type="text" name="distance" class="form-control" placeholder="Jarak (KM)"/>
                                        <span class="help-block"> Jarak Tempuh Keberangkatan Sampai Tujuan Dalam Kilometer (KM) </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Total Biaya Solar</label>
                                    <div class="col-md-9">
                                        <input type="text" name="cost" class="form-control" placeholder="Total Pengeluaran Bahan Bakar"/>
                                        <span class="help-block"> Total Pengeluaran Bahan Bakar </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Keterangan Transportasi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="description" class="form-control" placeholder="Keterangan"/>
                                        <span class="help-block"> Keterangan Barang Yang Dikirim </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Token</label>
                                    <div class="col-md-9">
                                        <input type="text" name="url_token" class="form-control" placeholder="Token Solar"/>
                                        <span class="help-block"> Token Pembelian Solar Oleh Supir </span>
                                    </div>
                                </div>                                                                                                                                                 
                            </div>
                            {{ csrf_field() }}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Simpan</button>
                                        <a href="{{ route('transportation.index') }}" class="btn default">
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