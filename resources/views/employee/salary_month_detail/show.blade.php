@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('employee_salary.index') }}">Gaji Karyawan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar Gaji</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Detail Gaji Bulanan
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('smd_create', $id_month) }}" id="sample_editable_1_new" class="btn sbold green"> 
                                            Gaji Baru
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-print"></i> Print </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>                                                                                                    
                                    <th> Karyawan </th>                                    
                                    <th> Divisi </th>
                                    <th> Tanggal Gaji </th>                                
                                    <th> Gaji Pokok </th>
                                    <th> Diambil </th>
                                    <th> Sisa </th>
                                    <th> Bonus </th>
                                    <th> Aksi </th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_detail as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>
                                        {{ $data->employee->name }}
                                        <br/>
                                        {{ $data->id_employee }}
                                    </td>
                                    <td>{{ $data->employee->division }}</td>
                                    <td>{{ date('d M, Y', strtotime($data->salary_month->date)) }}</td> 
                                    <td>{{ 'Rp ' . number_format($data->salary) }}</td>                                
                                    <td>
                                        @php
                                            $transaction = $data->employee_transaction->sum('nominal')
                                        @endphp
                                        {{ 'Rp ' . number_format($transaction) }}
                                        <br/>
                                        <a href="{{ route('employee_transaction_index', $data->id_detail) }}">
                                            detail
                                        </a>
                                    </td>
                                    <td>{{ 'Rp ' . number_format(($data->salary - $transaction)) }}</td>
                                    <td>
                                        @php
                                            $bonus = $data->employee_bonus
                                                ->where('id_detail', $data->id_detail)
                                                ->sum('bonus') 
                                        @endphp
                                        {{ 'Rp ' . $bonus }}
                                        <br/>
                                        <a href="{{ route('employee_bonus_index', $data->id_detail) }}">
                                            detail
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                AKSI <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('salary_month_detail.edit', $data->id_detail) }}">
                                                        <i class="icon-docs"></i> Edit 
                                                    </a>
                                                </li>
                                                <li>                                                    
                                                    <a href="#">
                                                        <i class="icon-tag"></i> Hapus 
                                                    </a>
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->                
            </div>
        </div>
    </div>
@endsection