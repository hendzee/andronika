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
            Gaji Karyawan
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
                                        <a href="employee_salary/create" id="sample_editable_1_new" class="btn sbold green"> 
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
                                    <th> Devisi </th>
                                    <th> Tanggal Gaji </th>                                
                                    <th> Jumlah </th>
                                    <th> Diambil </th>
                                    <th> Sisa </th>
                                    <th> Bonus </th>
                                    <th> Aksi </th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_employee as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>
                                        {{ $data->employee->name }}
                                        <br/>
                                        {{ $data->id_employee }}
                                    </td>
                                    <td>{{ $data->employee->division }}</td>
                                    <td>{{ date('d M, Y', strtotime($data->date)) }}</td> 
                                    <td>{{ 'Rp. ' . $data->salary }}</td>                                
                                    <td>
                                        @php
                                           $transaction = App\EmployeeTransaction::where('id_salary', $data->id_salary)
                                            ->sum('nominal')
                                        @endphp
                                        {{ 'Rp. ' . $transaction }}
                                        <br/>
                                        <a href="{{ route('employee_transaction_index', $data->id_salary) }}">
                                            detail
                                        </a>
                                    </td>
                                    <td>{{ 'Rp. ' . ($data->salary - $transaction) }}</td>
                                    <td>
                                        @php
                                           $bonus = App\EmployeeBonus::where('id_employee', $data->id_employee)
                                            ->where('status', 'belum diambil')
                                            ->sum('bonus') 
                                        @endphp
                                        {{ 'Rp . ' . $bonus }}
                                        <br/>
                                        <a href="{{ route('employee_bonus_index', $data->id_salary) }}">
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
                                                    <a href="{{ route('employee_salary.edit', $data->id_salary) }}">
                                                        <i class="icon-docs"></i> Edit 
                                                    </a>
                                                </li>
                                                <li>
                                                    {{-- @csrf --}}
                                                    {{-- @method('DELETE') --}}
                                                    {{-- <button type="submit" class="btn btn-danger"> <i class="icon-tag"></i> Hapus</button> --}}
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