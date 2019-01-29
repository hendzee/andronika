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
                                    <th> Nama Barang </th>                                      
                                    <th> Jumlah </th>
                                    <th> Rusak </th>
                                    <th> Dipakai </th>
                                    <th> Dipinjam </th>
                                    <th> Tersedia </th>
                                    <th> Status Pinjam </th>
                                    <th> Aksi </th>                                                            
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
                                        @endphp

                                        {{ $repair = $data->repair_and_used == null ? 0 : $data->repair_and_used->number_repair }}                                        
                                        {{ ' ' . $data->measure }}
                                    </td>
                                    <td>
                                        @php
                                            $used = 0;    
                                        @endphp

                                        {{ $used = $data->repair_and_used == null ? : $data->repair_and_used->number_used }}                                        
                                        {{ ' ' . $data->measure }}
                                    </td>
                                    <td>
                                        @if ($data->rent_status == 'BOLEH')
                                            @php
                                                $rent = 0;
                                            @endphp

                                            {{ $rent = $data->rent->sum('number_item') }}   
                                            {{ ' ' . $data->measure }}                                                                                     
                                        @else
                                            -
                                        @endif                                        
                                    </td>
                                    <td>
                                          @if ($data->rent_status == 'BOLEH')
                                              {{ $data->number - ($repair + $used + $rent) }}
                                          @else
                                              {{ $data->number - ($repair + $used) }}
                                          @endif  

                                          {{ ' ' . $data->measure }}
                                    </td>   
                                    <td> 
                                        {{ $data->rent_status }}                                         
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