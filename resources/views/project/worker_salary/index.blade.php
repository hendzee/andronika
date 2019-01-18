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
                                <div class="col-md-12">
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
                                    <th> 1 Hari </th>                                
                                    <th> 1/2 Hari </th>                                
                                    <th> Gaji/hr </th>
                                    <th> Total </th>
                                    <th> Diambil </th>
                                    <th> Sisa </th>
                                    <th> Bonus </th>
                                    <th> Aksi </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_worker as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>
                                        {{ $data->name }}
                                        <br/>                   
                                        {{ 'Ket: ' . $data->division }}                     
                                    </td>
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
                                        @if ($data->ps_transaction == null)
                                            -    
                                        @else   
                                            @php
                                                $transaction = 0
                                            @endphp                                         
                                            {{ 'Rp ' . number_format($transaction = $data->ps_transaction->sum('nominal')) }}
                                            <br/>                                            
                                        @endif   
                                        
                                        <a href="{{ route('ps_transaction_index', ['id' => $data->id_worker, 
                                            'id_prj' => $data->id_project]) }}">
                                            detail
                                        </a>
                                    </td>
                                    <td>
                                        @if ($data->ps_transaction == null)
                                            -
                                        @else
                                            {{ 'Rp ' . number_format(($total_sal - $transaction)) }} 
                                        @endif                                         
                                    </td>
                                    <td>
                                        @if ($data->worker_salary == null)
                                            -    
                                        @else
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
                                        @endif
                                    </td>                                   
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                AKSI <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('worker_salary.edit', $data->id_worker) }}">
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