@extends('welcome')

@section('category-timer')
<style type="text/css">
    .categorie_timer{
        background-image:url({{asset('public/images/'.$bg->timer_bg)}});
    }
</style>
<section class="parallex-bg section-padding categorie_timer">
    <div class="dark-overlay"></div>
    <div class="container div_zindex">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        {{--<h1> <span class="counter">{!! $categoryCount!!}</span>+</h1>
                        <h6>CATEGORIAS</h6>--}}
                        <h1> <span class="counter">{{$couponCount}}</span>+</h1>
                        <h6>CUPONS</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        {{--<h1> <span class="counter">{{$lising}} </span>+</h1>
                        <h6>ANÚNCIOS</h6>--}}
                        <h1> <span class="counter">{{$addViewsCouont}} </span>+</h1>
                        <h6>VISUALIZAÇÕES</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h1><span class="counter">{{$users}}</span>+</h1>
                        <h6>USUÁRIOS</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <h1> <span class="counter">{{Visitor::count()}}</span>+{{Visitor::log()  }}</h1>
                        <h6>VISITANTES</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
 <script src="{{asset('public/assets/js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
</script>
@stop