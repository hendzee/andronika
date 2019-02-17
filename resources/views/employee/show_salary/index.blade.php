@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('show_salary.index') }}">Karyawan</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Data Karyawan</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Karyawan
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        
        @if (session('success'))
            <div class="alert alert-success">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ session('error') }} 
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#layout_1" data-toggle="tab"> Data Profil Karyawan </a>
                                </li>
                                <li>
                                    <a href="#layout_2" data-toggle="tab"> Data Gaji Karyawan </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="layout_1">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <tr>
                                                <th>ID Karyawan</th>
                                                <td>{{ $data_employee->id_employee }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td>{{ $data_employee->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Divisi</th>
                                                <td>{{ $data_employee->division }}</td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th>
                                                <td>{{ $data_employee->telp }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>{{ date('d-m-Y', strtotime($data_employee->age)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>{{ $data_employee->gender }}</td>
                                            </tr>
                                            <tr>
                                                <th>Agama</th>
                                                <td>{{ $data_employee->religion }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="layout_2">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> Nama </th>
                                                    <th> Tanggal Gaji </th>                                
                                                    <th> Gaji Pokok </th>
                                                    <th> Diambil </th>
                                                    <th> Sisa </th>
                                                    <th> Bonus </th>
                                                    <th> Sisa Bonus </th>                              
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data_salary as $data)
                                                <tr class="odd gradeX"> 
                                                    <td>{{ $data->employee->name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($data->salary_month->date)) }}</td> 
                                                    <td>{{ 'Rp ' . number_format($data->salary) }}</td>                                
                                                    <td>
                                                        @php
                                                            $transaction = $data->employee_transaction->sum('nominal')
                                                        @endphp
                                                        {{ 'Rp ' . number_format($transaction) }}
                                                        <br/>
                                                        <a href="{{ route('show_salary_gaji', $data->id_detail) }}" class="btn btn-circle btn-sm blue">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </td>
                                                    <td>{{ 'Rp ' . number_format(($data->salary - $transaction)) }}</td>
                                                    <td>
                                                        @php
                                                            $bonus = $data->employee_bonus
                                                                ->where('id_detail', $data->id_detail)
                                                                ->where('status', 'SUDAH DIAMBIL')
                                                                ->sum('bonus') 
                                                        @endphp
                                                        {{ 'Rp ' . number_format($bonus) }}
                                                        <br/>
                                                        <a href="{{ route('show_salary_bonus', $data->id_detail) }}" class="btn btn-circle btn-sm blue">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $bonus1 = $data->employee_bonus
                                                                ->where('id_detail', $data->id_detail)
                                                                ->where('status', 'BELUM DIAMBIL')
                                                                ->sum('bonus') 
                                                        @endphp
                                                        {{ 'Rp ' . number_format($bonus1) }}
                                                        <br/>
                                                    </td>
                                                </tr>
                                                @endforeach                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
    </div>
@endsection