@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{route('user.index')}}">Admin</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar Admin</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Data Admin
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
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th> ID User </th>
                                    <th> Nama </th>
                                    <th> Status Admin </th>
                                    <th class="no-sort"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_user as $data)
                                <tr class="odd gradeX">
                                    <td>{{ $data->id_employee }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        @foreach($data->getRoleNames() as $item)
                                            {{ $item }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-12">
                                                <a href="{{ route('user.edit', $data->id) }}" class="btn btn-icon-only green">
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