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
        <h1 class="page-title"> Daftar Pekerja</h1>
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
                                    <th data-field="id-project" data-align="center" data-sortable="false">ID Projek</th>
                                    <th data-field="name-worker" data-align="center" data-sortable="true">Nama Pekerja</th>
                                    <th data-field="address" data-align="center" data-sortable="true">Alamat</th>
                                    <th data-field="telp" data-align="center" data-sortable="true">Telepon</th>
                                    <th data-field="gender" data-align="center" data-sortable="true">Gender</th>
                                    <th data-field="age" data-align="center" data-sortable="true">Usia</th>
                                    <th data-field="division" data-align="center" data-sortable="true">Divisi</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>1</td>
                                        <td>Susanto</td>
                                        <td>Jl.Raya Luwuk No.19</td>
                                        <td>08187878878</td>
                                        <td>Pria</td>
                                        <td>34 th</td>
                                        <td>Kuli</td>
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