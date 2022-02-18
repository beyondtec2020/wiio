@extends('layouts.user_dashboard')
@section('sub-title')
| booksmarks
@stop
@section('style')
@stop
@section('content')
	<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<!--<h2>My {{$title}}</h2> -->
					<h2>Meus Favoritos</h2>
				</div>
			</div>
		</div>
		
        <!-- Recent Activity -->
    	<div class="row">
        	<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
					<!--<h4>{{$title}} Listings </h4> -->
                   <h4>Lista dos meus Favoritos </h4> 
					<ul>
					@foreach($Bookmark as $data)
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="{{asset('public/images/'.$data->AddList->CountImage()->first()->image)}}" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="{{url('/single-post/'.$data->AddList->id.'/'.$data->AddList->slug)}}">
										{{$data->AddList->title}}</a></h3>
										<span>{{$data->AddList->short_desc}}</span>
										<div class="star-rating">
											<div class="rating-counter">({{$data->AddList->review()->count('addlist_id')}} reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="{{url('del-to-favourite/'.$data->id)}}" onclick="return checkDelete()" class="button red"><i class="fa fa-trash-o"></i> Apagar</a>
							</div>
						</li>
					@endforeach
					</ul>
				</div>
			</div>
		</div>
@stop

@section('script')
@stop
