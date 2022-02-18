@extends('welcome')

@section('sub-title')
| Privacy & Policy
@stop
@section('category')
<style type="text/css">
    .contactus_bg {
        background-image:url({{asset('public/images/'.$bg->search_bg)}});
    }
</style>
<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="container">
        <div class="white-text text-center div_zindex">
            <h1>Política de Privacidade  </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section id="inner_pages" >
	<div class="container">
    	<div class="row">
            <div class="col-md-12 grid_view show_listing">
            	{!! $GeneralSetting->privacy !!}
            </div>            
        </div>
        <br>
    </div>
</section>

@stop

@section('script')

@stop