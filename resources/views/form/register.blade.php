@extends('form.layouts')
@section('sub-title')
| registration
@stop

@section('content')

<section class="primary-bg">
    <div class="container">
        <div id="login_signup">
            <div class="form_wrap_m">
                <div class="white_box">
                    <h3>Cadastre-se</h3>
                    <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                            <input type="text" name="first_name" class="form-control" placeholder="Primeiro Nome">
                        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                            <input type="text" name="last_name" class="form-control" placeholder="Segundo Nome">
                        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <input type="password" name="password" class="form-control" placeholder="Senha">
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Senha">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Cadastrar">
                        </div>
                    </form>
                    <p>Já tem uma conta? <a href="{{url('/login')}}">Login</a></p>
                    <div class="back_home"><a href="{{url('/')}}" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Voltar à página inicial</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

