@extends('welcome')

@section('sub-title')
| {{$menuslist->name}}
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
            <h1> {!! $menuslist->name !!} </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<section id="inner_pages">
	<div class="container">
    	<div class="row">
            <div class="col-md-12 grid_view show_listing">
                    {!! $menuslist->description !!}
            </div>            
        </div>
        <br>
    </div>
</section>


<section class="section-padding" >
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                    @foreach($A728X90 as $v)
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