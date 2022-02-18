@extends('layouts.user_dashboard')
@section('sub-title')
| User Profile
@stop

@section('content')
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Meu Cadastro</h2>
				</div>
			</div>
		</div>

		<div class="row">			
			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
                	<div class="user_image">
                	@if($user->profile == null)
                    	<img src="{{asset('public/assets/admin/images/pro.png')}}" alt="img"> 
                    @else
                    <img src="{{asset('public/images/'.$user->profile)}}" alt="img"> 
                    @endif
                        <div class="buttons-to-right">
                            <a href="{{route('editUserProfile')}}" class="button gray"><i class="fa fa-pencil"></i> Alterar Meu Cadastro</a>
                        </div>
                    </div>
                    <div class="user_info">
                    	<ul>
                        	<li><span>Nome:</span> {{$user->first_name}} {{$user->last_name}}</li>
                            <li><span>Email:</span> {{$user->email}}</li>
                            <li><span>Telefone:</span> {{$user->phone}}</li>
                        </ul>
                    </div>
                </div>
			</div>

		</div>
@stop