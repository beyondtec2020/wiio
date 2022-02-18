@extends('layouts.user_dashboard')
@section('sub-title')
| {{$title}}  Post
@stop

@section('content')
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Lista de ofertas</h2>
				</div>
			</div>
		</div>
		
        <!-- Recent Activity -->
    	<div class="row">
        	<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
					<h4>{{$title}} Ofertas </h4>

					<ul>
					@foreach($AddList as $data)
					<?php $v = $data->CountImage()->first(); ?>
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('public/images/'.$v->image)}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="{{url('/preview-lists/'.$data->id.'/'.$data->slug)}}">{{$data->title}}</a></h3>
										<span>{{$data->short_desc}}</span>
										<div class="star-rating">
											<div class="rating-counter">({{$data->reviews}} views)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								@if($data->status != 2)
								<a href="{{url('/edit-list/'.$data->id.'/'.$data->slug)}}" class="button gray"><i class="fa fa-pencil"></i> Alterar</a>
								@endif

								<a href="{{url('/delete-list/'.$data->id.'/'.$data->slug)}}" onclick="return checkDelete()" class="button red"><i class="fa fa-trash-o"></i> Apagar</a>
							</div>
						</li>
					@endforeach

					</ul>
				</div>
			</div>
		</div>
@stop