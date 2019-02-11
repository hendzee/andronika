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
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">                                
                                <div class="col-md-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn green btn-outline" href="javascript:;" data-toggle="dropdown">
                                            <span class="hidden-xs"> Import | Print </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right" id="sample_1_tools">
                                            <li>
                                                <a href="javascript:;" data-action="0" class="tool-action">
                                                    <i class="icon-printer"></i> Print</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="1" class="tool-action">
                                                    <i class="icon-check"></i> Copy</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="2" class="tool-action">
                                                    <i class="icon-doc"></i> PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="3" class="tool-action">
                                                <i class="icon-paper-clip"></i> Excel</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="4" class="tool-action">
                                                    <i class="icon-cloud-upload"></i> CSV</a>
                                            </li>
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
                                    <th> Ket. Kerja </th>                                                                        
                                    <th> 1 Hari </th>                                
                                    <th> 1/2 Hari </th>                                
                                    <th> Gaji/hr </th>
                                    <th> Total </th>
                                    <th> Diambil </th>
                                    <th> Sisa </th>
                                    <th> Bonus </th>
                                    <th class="no-sort"></th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_worker as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->division }}</td>
                                    <td>
                                        @if ($data->worker_salary == null)
                                            -
                                        @else
                                            {{ $data->worker_salary->fullday . ' hari' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->worker_salary == null)
                                            -
                                        @else
                                            {{ $data->worker_salary->halfday . ' hari' }}
                                        @endif
                                    </td>                                    
                                    <td>
                                        @if ($data->worker_salary == null)
                                            -
                                        @else
                                            {{ 'Rp ' . number_format($data->worker_salary->salary) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->worker_salary == null)
                                            -
                                        @else
                                            @php
                                                $total_sal = ($data->worker_salary->fullday * $data->worker_salary->salary) 
                                                + ($data->worker_salary->halfday * $data->worker_salary->salary * 0.5) 
                                            @endphp
                                            {{ 'Rp ' . number_format($total_sal) }}    
                                        @endif                                        
                                    </td>        
                                    <td>
                                        @if ($data->worker_salary == null)
                                            -    
                                        @else
                                            @if ($data->ps_transaction == null)
                                                0
                                            @else
                                                @php
                                                    $transaction = 0
                                                @endphp                                         
                                                    {{ 'Rp ' . number_format($transaction = $data->ps_transaction->sum('nominal')) }}
                                            @endif
                                            <br/>
                                            <a href="{{ route('ps_transaction_index', ['id' => $data->id_worker, 
                                            'id_prj' => $data->id_project]) }}" class="btn btn-circle btn-sm blue">
                                                <i class="fa fa-search"></i>
                                            </a>                                               
                                        @endif   
                                    </td>
                                    <td>
                                        @if ($data->ps_transaction == null || $data->worker_salary == null)
                                            -
                                        @else
                                            {{ 'Rp ' . number_format(($total_sal - $transaction)) }} 
                                        @endif                                         
                                    </td>
                                    <td>
                                        @if ($data->project_bonus == null)
                                            -    
                                        @else                                            
                                            {{ 'Rp ' . number_format($data->project_bonus->where('status', 'BELUM DIAMBIL')                                                
                                                ->sum('bonus')) 
                                            }}                                                                                       
                                        @endif
                                        <br/>
                                        <a href="{{ route('project_bonus_index', [
                                            'id' => $data->id_worker,
                                            'id_prj' => $data->id_project]) }}" class="btn btn-circle btn-sm blue">
                                            <i class="fa fa-search"></i>
                                        </a> 
                                    </td>                                   
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-12">
                                                <a href="{{ route('worker_salary.edit', $data->id_worker) }}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
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