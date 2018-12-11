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
            Gaji Pekerja      
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
                                        <a href="{{ route('worker_salary_create', $id_project) }}" id="sample_editable_1_new" class="btn sbold green"> 
                                            Data Baru
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
                                    <th> ID Pekerja </th>
                                    <th> Nama </th>
                                    <th> Tanggal Gaji </th>                                
                                    <th> Jumlah </th>
                                    <th> Diambil </th>
                                    <th> Sisa </th>
                                    <th> Bonus </th>
                                    <th> Aksi </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_salary as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>{{ $data->id_worker }}</td>
                                    <td>{{ $data->worker->name }}</td>
                                    <td>{{ $data->salary_date }}</td>                                       
                                    <td>{{ $data->salary }}</td>        
                                    <td> 
                                        {{ $transaction = App\PSTransaction::where('id_salary', $data->id_salary)
                                            ->sum('nominal') }}
                                        <br/>
                                        <a href="{{ route('ps_transaction_index', $data->id_salary) }}">
                                            detail
                                        </a>
                                    </td>
                                    <td> {{ $data->salary - $transaction }} </td>
                                    <td>
                                        {{ $bonus = App\ProjectBonus::where('id_worker', $data->id_worker)
                                        ->where('status', 'belum diambil')
                                        ->sum('bonus') }}
                                        <br/>
                                        <a href="{{ route('project_bonus_index', $data->id_worker) }}">
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
                                                    <a href="{{ route('worker_salary.edit', $data->id_salary) }}">
                                                        <i class="icon-docs"></i> Edit 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
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