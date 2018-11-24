@extends('layout.master');
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Form Stuff</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">
                                <i class="icon-bell"></i> Action</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-shield"></i> Another action</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> Something else here</a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="#">
                                <i class="icon-bag"></i> Separated link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Transaksi Barang Kebutuhan</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <table id="table-pagination" data-toggle="table" data-url="" data-height="500" data-pagination="true" data-search="true">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id-transaction" data-align="center" data-sortable="false">ID Transaksi</th>
                                    <th data-field="transaction-date" data-align="center" data-sortable="true">Tgl Beli</th>
                                    <th data-field="item-name" data-align="center" data-sortable="true">Nama Barang</th>
                                    <th data-field="item-need" data-align="center" data-sortable="true">Jumlah Barang</th>
                                    <th data-field="item-price" data-align="center" data-sortable="true" data-sorter="priceSorter">Harga / Satuan</th>
                                    <th data-field="total-price" data-align="center" data-sortable="true">Total Harga</th>
                                    <th data-field="buyer" data-align="center" data-sortable="true">Pembeli</th>
                                    <th data-field="token" data-align="center" data-sortable="false">Bukti</th>
                                    <th data-field="status" data-align="center" data-sortable="false">Status</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>AB</td>
                                        <td>10-10-2018</td>
                                        <td>Semen</td>
                                        <td>20 sak</td> 
                                        <td>Rp.75.000</td> 
                                        <td>Rp.1500.000</td>
                                        <td>Cak mad</td>
                                        <td>Gambar</td>
                                        <td>VALID</td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
@endsection