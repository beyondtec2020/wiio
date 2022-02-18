@extends('form.layouts')
@section('sub-title')
| login
@stop
@section('content')

@php
    $redirect_to = Request::get('redirect_to');
    $redirect_to = ($redirect_to) ? '?redirect_to=' . urlencode($redirect_to) : '';
@endphp

<section class="primary-bg">
    <div class="container">
        <div id="login_signup">
            <div class="form_wrap_m">
                <div class="white_box">
                    <h3>Bem vindo de volta!!</h3>

                    <form action="{{ url('/login') . $redirect_to }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <input type="password" name="password" class="form-control" placeholder="Senha">
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Login">
                        </div>
                    </form>
                    <p>Não tem uma conta? <a href="{{url('/register')}}">Assine</a></p>
                    <p><a href="{{url('/admin-password/reset')}}">Esqueceu sua senha?</a></p>
                    <div class="back_home"><a href="{{url('/')}}" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Voltar à página inicial</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

