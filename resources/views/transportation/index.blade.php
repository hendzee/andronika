@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('transportation.index') }}">Transportasi</a>
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
            Data Transportasi
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
                                        <a href="transportation/create" id="sample_editable_1_new" class="btn sbold green"> 
                                            Transportasi Baru
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
                                    <th> ID Tranportasi </th>
                                    <th> ID Supir </th>
                                    <th> Supir </th>                               
                                    <th> Pengantaran </th>
                                    <th> Biaya Transport </th>
                                    <th> Hrg.Sewa </th>
                                    <th> Sts.Bayar </th>
                                    <th> Keuntungan </th>
                                    <th> Tanggal Pengantaran </th>
                                    <th> Keterangan </th>
                                    <th class="no-sort"></th>                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_transportation as $data)
                                    <tr class="odd gradeX">
                                        <td> {{ $data->id_transportation }} </td>
                                        <td> {{ $data->employee->id_employee }} </td>
                                        <td> {{ $data->employee->name }} </td>
                                        <td> 
                                            {{ 
                                                $data->starting_point 
                                                . ' - ' . $data->destination 
                                                . ', ' . $data->distance . ' Km ' 
                                            }} 
                                        </td>
                                        <td> {{ 'Rp ' . number_format($data->cost) }} </td>
                                        <td>
                                            <a href="{{ route('transaction_transportation_index' , $data->id_transportation)}}"> 
                                                {{ 'Rp ' . number_format($data->total) }} 
                                            </a>
                                        </td>
                                        <td>
                                            @if ($data->total - ($data->transaction_transportation->sum('nominal')) > 0)
                                                <span class="label label-sm label-danger">
                                                    BELUM LUNAS
                                                </span>
                                            @else
                                                <span class="label label-sm label-success">
                                                    LUNAS
                                                </span>
                                            @endif
                                        </td>
                                        <td> {{ 'Rp ' . number_format(($data->total-$data->cost)) }} </td>
                                        <td> {{ date('d-m-Y', strtotime($data->date)) }} </td>
                                        <td> {{ $data->description }} </td>  
                                        <td>
                                            <div class="row button-on-table">
                                                <div class="col-xs-6">
                                                    <a href="{{ route('transportation.edit', $data->id_transportation) }}" class="btn btn-icon-only green">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <form action="{{ action('TransportationController@destroy', $data->id_transportation) }}" method="POST" class="form-del" data-type="transportation">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-icon-only red">
                                                            <i class="fa fa-remove"></i>
                                                        </button>
                                                    </form>
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