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
                    <a href="{{ route('salary_month_detail.show', $id_month) }}">Detail Gaji Bulanan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('employee_bonus_index', $id_detail) }}">Bonus Karyawan</a>
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
            Pemberian Bonus
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('EmployeeBonusController@store') }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">ID Karyawan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->id_employee }}" disabled class="form-control" />
                                    </div>
                                </div>
                                <input type="hidden" name="id_employee" value="{{ $data_bonus->id_employee }}" />
                                <input type="hidden" name="id_detail" value="{{ $id_detail }}" />
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $data_bonus->employee->name }}" disabled class="form-control" />
                                    </div>
                                </div>
                                <input type="hidden" name="name" value="{{ $data_bonus->employee->name }}" />
                                <div class="form-group {{ $errors->has('bonus') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Bonus</label>
                                    <div class="col-md-9">
                                        <div class="input-inline">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="text" value="{{ old('bonus') }}" placeholder="Bonus" class="form-control masking-form" />
                                                <input type="hidden" id="total_hidden" name="bonus" class="masking-form-hidden">
                                            </div>
                                        </div>
                                        
                                        @if ($errors->has('bonus'))
                                            <span class="help-block"> {{ $errors->first('bonus') }} </span>    
                                        @else
                                            <span class="help-block"> Jumlah bonus yang diterima karyawan. </span>
                                        @endif
                                    </div>
                                </div>                                     
                                <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Keterangan</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('desc') }}" name="desc" placeholder="Keterangan Bonus" class="form-control" />
                                        
                                        @if ($errors->has('desc'))
                                            <span class="help-block"> {{ $errors->first('desc') }} </span>
                                        @else
                                            <span class="help-block"> Keterangan bonus. </span>
                                        @endif
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
                                        <a href="{{ route('employee_bonus_index', $id_detail) }}" class="btn default">
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