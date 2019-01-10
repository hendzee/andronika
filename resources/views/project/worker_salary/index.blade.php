@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.show', $id_project) }}"> Menu </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('worker_salary_index', $id_project) }}"> Gaji Harian </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar</span>
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
                                    <th> Pekerja </th>                                                                        
                                    <th> Fullday </th>                                
                                    <th> Halfday </th>                                
                                    <th> Gaji/hr </th>
                                    <th> Total </th>
                                    <th> Diambil </th>
                                    <th> Sisa </th>
                                    <th> Bonus </th>
                                    <th> Aksi </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_salary as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>
                                        {{ $data->worker->name }}
                                        <br/>                   
                                        {{ 'Ket: ' . $data->worker->division }}                     
                                    </td>
                                    <td>{{ $data->fullday . ' hari' }}</td>
                                    <td>{{ $data->halfday . ' hari' }}</td>                                    
                                    <td>{{ 'Rp ' . number_format($data->salary) }}</td>
                                    <td>
                                        @php
                                           $total_sal = ($data->fullday * $data->salary) + ($data->halfday * $data->salary * 0.5) 
                                        @endphp
                                        {{ 'Rp ' . number_format($total_sal) }}    
                                    </td>        
                                    <td> 
                                        @php
                                           $transaction = App\PSTransaction::where('id_salary', $data->id_salary)
                                            ->sum('nominal') 
                                        @endphp
                                        {{ 'Rp ' . number_format($transaction) }}
                                        <br/>
                                        <a href="{{ route('ps_transaction_index', ['id' => $data->id_salary, 
                                            'id_prj' => $data->id_project]) }}">
                                            detail
                                        </a>
                                    </td>
                                    <td> {{ 'Rp ' . number_format(($total_sal - $transaction)) }} </td>
                                    <td>
                                        @php
                                            $bonus = App\ProjectBonus::where('id_worker', $data->id_worker)
                                                ->where('status', 'belum diambil')
                                                ->sum('bonus') 
                                        @endphp
                                        {{ 'Rp ' . number_format($bonus) }}
                                        <br/>
                                        <a href="{{ route('project_bonus_index', [
                                            'id' => $data->id_worker,
                                            'id_prj' => $data->id_project]) }}">
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