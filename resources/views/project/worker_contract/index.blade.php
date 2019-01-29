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
                                    <th> Nilai Kontrak </th>                                
                                    <th> Total Pembayaran </th>                                
                                    <th> Sisa Pembayaran </th> 
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
                                                'id_prj' => $id_project]) }}">
                                                detail
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