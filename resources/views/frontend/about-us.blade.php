@extends('welcome')

@section('sub-title')
| About us
@stop
@section('category')

<style type="text/css">
    .contactus_bg {
        background-image:url({{asset('public/images/'.$bg->about_bg)}});
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="container">
        <div class="white-text text-center div_zindex">
            <h1>Sobre Nós</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<!-- <section id="spost"> -->
<section id="inner_pages">
	<div class="container">
    	<div class="row">
            <div class="col-md-12 grid_view show_listing">
        	    {!! $GeneralSetting->about !!}
            </div>            
        </div>
        <br>
    </div>
</section>

<section class="" style="padding:  20px 0px;">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                    @foreach($A970X250 as $v)
                    <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
                      @if($v->advert_type == 1)
                      <img class="img-responsive" src="{{asset('public/images/advertise/'.$v->val1)}}" alt="" />
                      @else
                          {!! $v->val !!}
                      @endif
                    </a>
                    @endforeach      
            </div>
        </div>
    </div>
</section>
@stop

@section('script')

@stop