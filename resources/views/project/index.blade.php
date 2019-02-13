@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('project.index') }}">Projek</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar Projek</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Projek
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
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="project/create" id="sample_editable_1_new" class="btn sbold green"> 
                                            Projek Baru
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                    <th> ID Projek </th>                                                                                                    
                                    <th> Projek </th>
                                    <th> Klien </th>                                                                 
                                    <th> Mulai </th>
                                    <th> Berakhir </th>  
                                    <th> Pulau </th>  
                                    <th> Status </th>
                                    <th> Hrg. Projek </th>  
                                    <th class="no-sort"> </th>                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_project as $data)
                                <tr class="odd gradeX">
                                    <td> {{ $data->id_project }} </td>                                                                       
                                    <td>                                        
                                        <a href="project/{{ $data->id_project }}">
                                            {{ $data->name }}
                                        </a>                                        
                                    </td>
                                    <td>
                                        {{ $data->client->description }}
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($data->start)) }}</td>                                
                                    <td>{{ date('d-m-Y', strtotime($data->end)) }}</td>                                    
                                    <td>{{ $data->island }}</td>                                    
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="label label-sm top-space {{ $data->status == 'SELESAI' ? 'label-info' : 'label-danger' }}">
                                                    {{ $data->status }}
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                @if ($data->status == 'PROSES')
                                                    <a href="{{ route('project_update_status', ['status' => 'SELESAI', 'id' => $data->id_project]) }}" >
                                                        <span class="label label-sm label-info top-space">
                                                            <i class="fa fa-refresh"></i>
                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('project_update_status', ['status' => 'PROSES', 'id' => $data->id_project]) }}" >
                                                        <span class="label label-sm label-danger top-space">
                                                            <i class="fa fa-refresh"></i>
                                                        </span>
                                                    </a>
                                                @endif                                
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ 'Rp ' . number_format($data->total) }}</td>                                    
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-6">
                                                <a href="project/{{ $data->id_project }}/edit" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                @can('project_delete')
                                                    <form action="{{ action('ProjectController@destroy', $data->id_project) }}" method="POST" class="form-del" data-type="project">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-icon-only red">
                                                            <i class="fa fa-remove"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                                @cannot('project_delete')
                                                    <button class="btn btn-icon-only default error-del">
                                                        <i class="fa fa-remove"></i>
                                                    </button>    
                                                @endcannot
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