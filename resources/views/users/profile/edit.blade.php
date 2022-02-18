@extends('layouts.user_dashboard')
@section('sub-title')
| User Profile
@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('content')
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-edit"></i> Alterar Meu Cadastro</h2>

					<div class="buttons-to-right">
                        <a href="{{route('viewUserProfile')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
                    </div>
				</div>
			</div>
		</div>

	<div class="row">			
		<!-- Listings -->
		<div class="col-lg-12 col-md-12">
			@include('errors.errors')

	    	<div class="add_listing_info">
                <h6><strong>Alterar dados cadastrais</strong></h6>	

                 <form class="form-horizontal" action="{{route('updateProfile')}}" method="post">
            	{{ csrf_field() }}			
	            	<input type="hidden" name="id" value="{{$user->id}}">

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Primeiro Nome :</label>
                  <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
                        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Last Name :</label>
                  <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Email :</label>
                  <div class="col-sm-8">
                    <input type="email" value="{{$user->email}}" name="email" class="form-control" readonly disabled>
                  </div>
                </div>
                <div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Telefone :</label>
                  <div class="col-sm-8">
                    <input type="tel"  name="phone" value="{{$user->phone}}" class="form-control">
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>


                <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                <button type="submit" class="btn btn-primary">Alterar  </button></div>
                	</div>
                </form>                   
            </div> 
        </div>
	</div>



	<div class="row">			
		<!-- Listings -->
		<div class="col-lg-12 col-md-12">
	    	<div class="add_listing_info">
                <h6><strong>  Alteração da foto </strong></h6>	
                 
        <form action="{{route('profile')}}" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-3">
                  @if($user->profile)
                    <img src="{{asset('public/images/'.$user->profile)}}" class="img-circle" alt="User Image"><br>
                    @else

                    <img src="{{asset('public/assets/admin/images/pro.png')}}" class="img-circle" alt="User Image"><br>
                    @endif
                  </div>
            </div>
              <div class="form-group {{ $errors->has('profile') ? 'has-error' : ''}}">
                  <div class="col-sm-5 col-sm-offset-3">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput" style="width: 191px;>
                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                          <span class="fileinput-filename"> </span>
                      </div>
                      <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase">
                       <i class="fa fa-picture-o"></i> Selecionar foto </span>
                       <span class="fileinput-exists bold uppercase"> Alterar </span>
                       <input type="file" name="profile" > </span>
                       <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>

                    {!! $errors->first('profile', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                <button type="submit" class="btn btn-primary" style="min-width: 365px">Carregar foto  </button></div>
                	</div>

                </form>                   
            </div> 
        </div>
	</div>



	<div class="row">			
		<!-- Listings -->
		<div class="col-lg-12 col-md-12">
	    	<div class="add_listing_info">
                <h6><strong> Alteração da senha</strong></h6>	
                 
        <form action="{{route('updatePass')}}" method="post" role="form" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$user->id}}">

              <div class="form-group {{ $errors->has('old_password') ? 'has-error' : ''}}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Senha Atual </label>
                  <div class="col-sm-8">
                    <input type="text" name="old_password" class="form-control" >
                    {{ $errors->has('old_password') ? 'has-error' : ''}}
                  </div>
              </div>
              <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nova Senha *</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" >
                    {{ $errors->has('old_password') ? 'has-error' : ''}}
                  </div>
              </div>

              <div class="form-group {{ $errors->has('password_confirmation')?'has-error':''}}">
                  <label for="inputEmail3" class="col-sm-3 control-label">Confirma a nova senha *</label>
                  <div class="col-sm-8">
                    <input type="password"  name="password_confirmation" class="form-control" >
                    {{ $errors->has('password_confirmation') ? 'has-error' : ''}}
                  </div>
              </div>

                <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                <button type="submit" class="btn btn-primary">Alterar </button></div>
                	</div>
                </form>                   
            </div> 
        </div>
	</div>
@stop

@section('script')
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
