@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')

@stop
@section('content')	
	<section class="content-header">
		<h1>Dashboard</h1>
	</section>
	<section class="content">

		<!-- Small boxes (Stat box) -->
      <div class="row" id="home">
        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$City->count()}}</h3>
              <p>Total City !</p>
            </div>
            <div class="icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <a href="{{url('/city')}}" class="small-box-footer">View All Posts <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$Category->count()}}</h3>
              <p>Total Category ! </p>
            </div>
            <div class="icon">
              <i class="fa fa-sitemap "></i>
            </div>
            <a href="{{url('/categroy')}}" class="small-box-footer">View All Category <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$AddList->count()}}</h3>
              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="{{url('/posts')}}" class="small-box-footer">View All Product <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->

        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$Advertise->count()}}</h3>
              <p>Addvertisement !</p>
            </div>
            <div class="icon">
              <i class="fa fa-link"></i>
            </div>
            <a href="{{url('/advertise')}}" class="small-box-footer">View All Addvertisement <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        
		<div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$User->count()}}</h3>

              <p>Users </p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{url('/staffs')}}" class="small-box-footer">View All Users <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$Subscriber->count()}}</h3>

              <p>Subscribers ! </p>
            </div>
            <div class="icon">
              <i class="fa fa-comments "></i>
            </div>
            <a href="{{url('/subscribers')}}" class="small-box-footer">View All Subscribers <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->


	</section>
@stop

@section('script')

@stop
