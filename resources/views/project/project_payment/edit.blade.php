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
            Edit Transfer          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ProjectPaymentController@update', $data_payment->id_payment) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Projek</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_payment->id_project }}" disabled class="form-control" />
                                        <span class="help-block"> ID Projek </span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_project" value="{{ $data_payment->id_project }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Transfer</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_payment->transfer }}" name="transfer" placeholder="Transfer Nominal" class="form-control" />
                                        <span class="help-block"> Transfer Nominal </span>
                                    </div>
                                </div>                             
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal</label>
                                    <div class="col-md-9">
                                        <input name="date" value="{{ date('Y/m/d', strtotime($data_payment->transfer)) }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                                        <span class="help-block"> Tanggal Transfer </span>
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