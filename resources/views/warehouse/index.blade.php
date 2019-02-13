@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="#">Gudang</a>
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
            Data Barang
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
                                        <a href="{{ route('warehouse.create') }}" id="sample_editable_1_new" class="btn sbold green"> 
                                            Data Baru
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
                                    <th> Nama Barang </th>                                      
                                    <th> Jumlah </th>
                                    <th> Rusak </th>
                                    <th> Dipakai </th>
                                    <th> Dipinjam </th>
                                    <th> Tersedia </th>
                                    <th> Status Pinjam </th>
                                    <th class="no-sort"> </th>                                                            
                                </tr>
                            </thead>
                            <tbody>                                
                                @foreach($data_item as $data)
                                <tr class="odd gradeX">                                                                                                           
                                    <td>{{ $data->item_name }}</td>                                    
                                    <td>
                                        @if ($data->number != null)
                                            {{ $data->number . ' ' . $data->measure }}                                            
                                        @else
                                            {{ 0 . ' ' . $data->measure }}                                            
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $repair = 0;
                                            $repair = $data->repair_and_used == null ? 0 : $data->repair_and_used->number_repair
                                        @endphp
                                        
                                        {{  $repair . ' ' . $data->measure }}                                        
                                    </td>
                                    <td>
                                        @php
                                            $used = 0;    
                                            $used = $data->repair_and_used == null ? 0 : $data->repair_and_used->number_used
                                        @endphp

                                        {{  $used . ' ' . $data->measure}}                                        
                                    </td>
                                    <td>
                                        @if ($data->rent_status == 'BOLEH')
                                            @php
                                                $rent = 0;
                                                $rent = $data->rent->where('status', 'DISEWA')
                                                    ->sum('number_item')
                                            @endphp

                                            {{  $rent . ' ' . $data->measure}}   
                                        @else
                                            -
                                        @endif                                        
                                    </td>
                                    <td>
                                        @php
                                            $current_number = 0;
                                        @endphp
                                        
                                        @if ($data->rent_status == 'BOLEH')
                                            @php
                                                $current_number = ($data->number - ($repair + $used + $rent)) 
                                            @endphp
                                            
                                            {{  $current_number . ' ' . $data->measure }}
                                        @else
                                            @php
                                                $current_number = ($data->number - ($repair + $used))   
                                            @endphp
                                            
                                            {{  $current_number . ' ' . $data->measure }}
                                        @endif  
                                    </td>   
                                    <td>
                                        <span class="label label-sm {{ $data->rent_status == 'BOLEH' ? 'label-info' : 'label-danger'}} top-space">
                                            {{ $data->rent_status }}                                         
                                        </span> 
                                    </td>                                     
                                    <td>
                                        <div class="row button-on-table">
                                            <div class="col-xs-6">
                                                <a href="{{ route('warehouse.edit', $data->item_name) }}" class="btn btn-icon-only green">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                <form action="{{ action('WarehouseController@destroy', $data->item_name) }}" method="POST">
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