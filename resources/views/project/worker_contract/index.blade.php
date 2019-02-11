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
                    <a href="{{ route('worker_contract_index', $id_project) }}"> Pekerja Kontrak </a>
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
            Kontrak Pekerja      
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
                                    <th> ID Pekerja </th>                                                                                                                     
                                    <th> Pekerja </th>  
                                    <th> Ket. Kekerja </th>                                                    
                                    <th> Nilai Kontrak </th>                                
                                    <th> Total Pembayaran </th>                                
                                    <th> Sisa Pembayaran </th> 
                                    <th class="no-sort"></th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_worker as $data)
                                <tr class="odd gradeX">  
                                    <td>{{ $data->id_worker }}</td>                                                                                                         
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->division }}</td>
                                    <td>
                                        @if ($data->worker_contract == null)
                                            -
                                        @else
                                            {{ 'Rp ' . number_format($data->worker_contract->contract_value) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->worker_contract == null)
                                            -
                                        @else
                                            @php
                                            $transaction = $data->pct->where('id_contract', $data->id_contract)
                                                ->where('id_worker', $data->id_worker)
                                                ->sum('nominal') 
                                            @endphp
                                            {{ 'Rp ' . number_format($transaction) }}
                                            <br/>
                                            <a href="{{ route('pct_index', [
                                                'id' => $data->id_worker,
                                                'id_prj' => $id_project]) }}" class="btn btn-circle btn-sm blue">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            @endif                                                                                                                                 
                                    </td>
                                    <td>                                        
                                        @if ($data->worker_contract == null)
                                            -
                                        @else
                                            @if ($data->pct == null)
                                                {{ number_format(($data->worker_contract->contract_value)) }}
                                            @else
                                                {{ 'Rp ' . number_format(($data->worker_contract->contract_value - $transaction)) }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-6">
                                                <a href="{{ route('worker_contract.edit', $data->id_worker) }}" class="btn btn-icon-only green">
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