@extends('layout.master')
@section('content')
    <div class="page-content" style="min-height: 1540px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{route('client.index')}}">Klien</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Edit Data Klien</span>
                </li>
            </ul>         
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> 
            Edit Klien          
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">                    
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{ action('ClientController@update', $data_client->id_client) }}" method="POST" class="form-horizontal form-row-seperated">
                            <div class="form-body">
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Klien</label>
                                    <div class="col-md-9">
                                        <input name="description" value="{{ old('description', $data_client->description) }}" type="text" placeholder="Nama Klien" class="form-control" />
                                        
                                        @if ($errors->has('description'))
                                            <span class="help-block"> {{ $errors->first('description') }} </span>
                                        @else
                                            <span class="help-block"> Nama klien / lembaga. </span>
                                        @endif
                                    </div>
                                </div>                                
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ old('address', $data_client->address) }}" name="address" placeholder="Alamat" class="form-control" />
                                        
                                        @if ($errors->has('address'))
                                            <span class="help-block"> {{ $errors->first('address') }} </span>
                                        @else
                                            <span class="help-block"> Alamat klien (rumah, kantor, dsb). </span>
                                        @endif
                                    </div>
                                </div>                             
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input name="email" value="{{ old('email', $data_client->email) }}" type="text" placeholder="Email" class="form-control" />
                                        
                                        @if ($errors->has('email'))
                                            <span class="help-block"> {{ $errors->first('email') }} </span>
                                        @else
                                            <span class="help-block"> Ex: example.gmail.com. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('telp') ? 'has-error' : '' }}">
                                    <label class="control-label col-md-3">Telpon</label>
                                    <div class="col-md-9">
                                        <input name="telp" value="{{ old('telp', $data_client->telp) }}" type="text" placeholder="Telpon" class="form-control" />
                                        
                                        @if ($errors->has('telp'))
                                            <span class="help-block"> {{ $errors->first('telp') }} </span>
                                        @else
                                            <span class="help-block"> Telpon rumah atau kantor. </span>
                                        @endif
                                    </div>
                                </div>  
                            </div>
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            Simpan
                                        </button>
                                        <a href="{{route('client.index')}}" class="btn default" >Batal</a>
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