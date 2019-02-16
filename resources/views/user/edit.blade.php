@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{route('user.index')}}">User</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Ganti Password</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            Ganti Password
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
                        <!-- BEGIN FORM-->
                        <form action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal form-row-seperated">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Role</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="role">
                                            <option value="ADMIN">ADMIN</option>
                                            <option value="EMPLOYEE">EMPLOYEE</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            Simpan
                                        </button>
                                        <a href="{{ route('reset_password', $user->id) }}" class="btn red">
                                            Reset Password
                                        </a>
                                        <a href="http://andronika.test/mutation" class="btn default">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
@endsection