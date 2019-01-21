@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">                
                <li>
                    <span>Data Mutasi</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Mutasi
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
                                        <a href="{{ route('mutation.create') }}" id="sample_editable_1_new" class="btn sbold green"> 
                                            Mutasi Baru
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
                                    <th> ID Mutasi </th>
                                    <th> Asal </th>
                                    <th> Tujuan </th>                                
                                    <th> Nominal </th>
                                    <th> date </th>                                    
                                    <th> Aksi </th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_mutation as $data)
                                <tr class="odd gradeX">                                                                       
                                    <td>{{ $data->id_mutation }}</td>
                                    <td>
                                        @if ($data->source != 'PERUSAHAAN')
                                            @php
                                                $get_project = App\Project::where('id_project', $data->source)
                                                    ->first();
                                            @endphp                                            
                                            {{ $get_project->name . ' | ' 
                                                . date('d M, Y', strtotime($get_project->start))
                                            }}                                            
                                        @else                                            
                                            {{ $data->source }}                                            
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->destiny != 'PERUSAHAAN')
                                            @php
                                                $get_project = App\Project::where('id_project', $data->destiny)
                                                    ->first();
                                            @endphp                                            
                                            {{ $get_project->name . ' | ' 
                                                . date('d M, Y', strtotime($get_project->start))
                                            }}                                            
                                        @else                                            
                                            {{ $data->destiny }}                                            
                                        @endif
                                    </td>    
                                    <td>{{ 'Rp ' . number_format($data->nominal) }}</td>                                
                                    <td>{{ date('m D, Y', strtotime($data->date)) }}</td>                                    
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                AKSI <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('mutation.edit', $data->id_mutation) }}">
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