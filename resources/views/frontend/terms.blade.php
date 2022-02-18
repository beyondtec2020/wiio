@extends('welcome')

@section('sub-title')
| Terms & Conditions
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
            <h1>Termos e Condições </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<section id="inner_pages">
	<div class="container">
    	<div class="row">
            <div class="col-md-12 grid_view show_listing">
                    {!! $GeneralSetting->terms !!}
            </div>            
        </div>
        <br>
    </div>
</section>


<section class="" style="padding: 20px 0px;" >
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                    @foreach($A970X90 as $v)
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
</section>
@stop

@section('script')

@stop