@extends('form.layouts')
@section('sub-title')
| password-reset
@stop
@section('content')
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                	<h3>Esqueceu a senha</h3>
                <form  role="form" method="POST" action="{{ route('admin.password.email') }}">
                {!! csrf_field() !!}


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input type="email" name="email" id="email" class="form-control"  placeholder="Email" data-mask="email" required>
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
            
          @if($errors->any())
              @foreach ($errors->all() as $error)

                  <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {!!  $error !!}
                  </div>
              @endforeach
          @endif
            <div class="form-group">
                <input type="submit" class="btn btn-block" value="Enviar código">
            </div>
        </form>


                    <p>Voltar a  <a href="{{url('/login')}}">Página de Login</a></p>
                    <div class="back_home"><a href="{{url('/')}}" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Voltar a página inicial</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop