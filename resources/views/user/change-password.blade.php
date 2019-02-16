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
            Kata Sandi
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
                        <form action="{{ route('action_change_password') }}" method="post" id="form_change_password">
                            @csrf
                            <div class="form-group @if($errors->any()) has-error @endif" id="group-old">
                                <label class="control-label">Kata Sandi Sekarang</label>
                                <input type="password" class="form-control" name="current_password"
                                       id="current_password">
                                @if($errors->any())
                                    <span class="help-block" id="message_old">{{ $errors->first() }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kata Sandi Baru</label>
                                <input type="password" class="form-control" name="new_password" id="new_password"></div>
                            <div class="form-group" id="group-retype">
                                <label class="control-label">Tulis Ulang Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="retype">
                                <span class="help-block" id="message"> </span></div>
                            <div class="margin-top-10">
                                <button type="submit" class="btn green"> Simpan </button>
                                <a href="javascript:;" class="btn default"> Batalkan </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
@endsection