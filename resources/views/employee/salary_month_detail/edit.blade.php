@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('salary_month.index') }}">Gaji Bulanan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('salary_month_detail.show', $data_detail->id_month) }}">Detail Gaji Bulanan</a>
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
            Edit Gaji Pokok (Bulan Ini)          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('SMDetailController@update', $data_detail->id_detail) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Karyawan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_detail->employee->name . ' | ' . $data_detail->employee->address }}" disabled class="form-control" />                                        
                                    </div>
                                </div>
                                <input type="hidden" name="id_month" value="{{ $data_detail->id_month }}">
                                <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                                    <label class="col-md-3 control-label">Gaji Pokok</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ round($data_detail->salary) }}" id="total" placeholder="Ex.5000000" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="salary" class="masking-form-hidden">
                                            </div>
                                        </div>

                                        @if ($errors->has('salary'))
                                            <span class="help-block"> {{ $errors->first('salary') }} </span>
                                        @else
                                            <span class="help-block"> Sesuaikan dengan gaji pokok pada menu "Gaji Pokok". </span>
                                        @endif
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
                                        <a href="{{ route('salary_month_detail.show', $data_detail->id_month) }}" class="btn default">
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
