@extends('welcome')
@section('css')
@stop
@section('sub-title')
| Contact us
@stop
@section('category')
<style type="text/css">
    .contactus_bg {
        background-image:url({{asset('public/images/'.$bg->contact_bg)}});
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	<h1>Fale Conosco </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section id="inner_pages">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<div class="office_info_box">
                	<div class="info_icon">
                    	<i class="fa fa-home"></i>
                    </div>
                    <h4>Endereço</h4>
                    <p>{!! $GeneralSetting->address !!}</p>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="office_info_box">
                	<div class="info_icon">
                    	<i class="fa fa-phone"></i>
                    </div>
                    <h4>Número de telefone</h4>
                    <p>{!! $GeneralSetting->phone !!}</p>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="office_info_box">
                	<div class="info_icon">
                    	<i class="fa fa-envelope-o"></i>
                    </div>
                    <h4>Email</h4>
                    <p><a href="mailto:{{$GeneralSetting->office_email}}">{!! $GeneralSetting->office_email !!}</a>  </p>
                </div>
            </div>
        </div>
        
        <div class="row">
        	<div class="col-md-6">
            	<div class="contact_form">
                	<h4>Vamos entrar em contato</h4>
            		<form action="{{url('/submitContact')}}" method="post">
                    {{csrf_field()}}
                	<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    	<input type="text" name="name" class="form-control" placeholder="Nome">
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
                    <input type="text" name="phone" class="form-control" placeholder="Telefone">
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
                    <input type="text" name="email" class="form-control" placeholder="Insira o seu endereço de email">
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{ $errors->has('subject') ? 'has-error' : ''}}">
                    	<input type="text" name="subject" class="form-control" placeholder="Assunto">
                        {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{ $errors->has('message') ? 'has-error' : ''}}">
                    	<textarea class="form-control"  name="message" placeholder="Mensagem"></textarea>
                        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group">
                    	<input type="submit" class="btn btn-block" value="Enviar">
                    </div>
                </form>
                </div>
            </div>
            
            <div class="col-md-6">
            	<div class="map_wrap">
                <br><br><br>
                	{!! $GeneralSetting->gmaps !!}
                </div>
            </div>
            
        </div>
    </div>
</section>

@stop

@section('script')
@stop