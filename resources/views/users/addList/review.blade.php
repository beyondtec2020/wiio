@extends('layouts.user_dashboard')
@section('sub-title')
| Post reviews
@stop
@section('style')
<style type="text/css">
    b{
        float: left;
        margin-right: 5px;
    }
    p{
        margin-top: -5px;
    }
    .fa{
        font-size: 15px;
    }
</style>

@stop
@section('content')
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2 class="pull-left"> Avaliações</h2>
                <a href="{{URL::previous()}}" class=" btn-primary col-md-offset-9 " style="background: #38ccff none repeat scroll 0 0;
    border: medium none;
    border-radius: 3px;
    color: #ffffff;
    font-size: 16px;
    font-weight: 700;
    line-height: 30px;
    width: auto;
    padding: 8px 22px;"> <i class="fa fa-arrow-left"></i> Voltar</a>

      <button class="btn btn-info" title="Report"><i class="fa fa-comment-o"></i> {{$AddList->report()->count()}}</button>
          
				</div>
			</div>
		</div>
     

    <div class="row">			
        <div class="col-md-12">
             <div class="add_listing_info">
             <b>Título: </b> <p>{{$AddList->title}}</p>
             </div>
        </div>
        <?php $rr = $AddList->report()->paginate(10); ?>
        @foreach($rr as $data)
        <?php $user = App\User::where('id',$data->user_id)->first(); ?>
        <div class="col-md-12">
             <div class="add_listing_info">
             <div style="width: 20%; float: left;">
             @if(!$user->profile)
            <img src="{{asset('public/assets/admin/images/pro.png')}}" class="img-circle" alt="User Image" style="width: 90px; height: 90px;">
              @else
              <img src="{{asset('public/images/'.$user->profile)}}" class="img-circle" alt="User Image" style="width: 90px; height: 90px;">
              @endif
              <br>
              <b class="text-danger" style="padding-left: 10px;">{{$user->first_name}} {{$user->last_name}}</b> 
              </div>
             <h6>{{$data->title}}</h6>
              <p>{{$data->description}}</p>
             </div>
        </div>
        @endforeach

        {{$rr->render()}}
   

	</div>
@stop

@section('script')
@stop


