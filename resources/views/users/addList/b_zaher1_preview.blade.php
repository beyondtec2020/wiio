@extends('layouts.user_dashboard')
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
				<div class="col-md-11">
					<h2 class="pull-left">Visualizar Oferta</h2>
                <a href="{{URL::previous()}}" class=" btn-primary col-md-offset-3" style="background: #38ccff none repeat scroll 0 0;
    border: medium none;
    border-radius: 3px;
    color: #ffffff;
    font-size: 16px;
    font-weight: 700;
    line-height: 30px;
    width: auto;
    padding: 8px 22px;"> <i class="fa fa-arrow-left"></i> Voltar</a>

      <a href="{{url('/preview-user-report/'.$AddList->id.'/'.$AddList->slug)}}" class="btn btn-info" title="Report"><i class="fa fa-flag"></i> {{$AddList->reports()->count()}}</a>
          <a href="{{url('/preview-user-review/'.$AddList->id.'/'.$AddList->slug)}}" class="btn btn-info" title="Review"><i class="fa fa-comment-o"></i> {{$AddList->report()->count()}}</a>
        
				</div>
			</div>
		</div>
     

    <div class="row">			
        <div class="col-md-12">
             <div class="add_listing_info">
             <b>Título da oferta : </b> <p>{{$AddList->title}}</p>
             </div>
        </div>
        <div class="col-md-12">
             <div class="add_listing_info">
             <b>Resumo da oferta : </b> <p>{{$AddList->short_desc}}</p>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="add_listing_info">
                        
            <div class="image_slider_wrap">
                <div id="listing_img_slider">
                    <div class="owl-carousel owl-theme">
                       @foreach($AddList->CountImage()->get() as $d)
                       <div class="item"><img src="{{asset('public/images/'.$d->image)}}" alt="image"/></div>
                       @endforeach
                    </div>    
                </div>
            </div>
             </div>
        </div>
        


        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Categoria : </b> <p>{{$AddList->cat->name}}</p>
             </div>
             <div class="add_listing_info col-md-1">
             <b>Cidade :</b> <p>{{$AddList->city->name}}</p>
             </div>
             <div class="add_listing_info col-md-2">
             <b>CEP :</b> <p>{{$AddList->zip_code}}</p>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Endereço :</b> <p>{{$AddList->address}}</p>
             </div>
             <div class="add_listing_info col-md-3">
             <b>Telefone :</b> <p>{{$AddList->phone}}</p>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="add_listing_info">
             <b style="float: none;">Descrição :</b> <p style="margin-top: 5px;">{{$AddList->description}}</p>
             </div>
        </div>

        <div class="col-md-12">
             <div class="add_listing_info col-md-2" >
             <b>Preço orginal :</b> <p>{{$AddList->max_price}} </p>
             </div>

             <div class="add_listing_info col-md-3">
             <b>Preço da oferta :</b> <p>{{$AddList->min_price}} </p>
             </div>
        </div>

        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Email :</b> <p>{{$AddList->email}} </p>
             </div>
        
             <div class="add_listing_info col-md-3">
             <b>Website :</b> <p>{{$AddList->website}} </p>
             </div>
        </div>

        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Facebook :</b> <p>{{$AddList->facebook}} </p>
             </div> 
             <div class="add_listing_info col-md-3">
             <b>Linkdin :</b> <p>{{$AddList->linkdin}} </p>
             </div>
        </div>

        <div class="col-md-12">
             <div class="add_listing_info col-md-2">
             <b>Twitter :</b> <p>{{$AddList->twitter}} </p>
             </div>
             <div class="add_listing_info col-md-3">
             <b>Google :</b> <p>{{$AddList->google}} </p>
             </div>
        </div>

        <div class="col-md-12">
            <h3>Facilidades </h3>
			<div class="add_listing_info">
             @foreach($AddList->totalAmenity()->get() as $d)
                <?php   $v = \App\Amenity::where('id',$d->amenities_id)->first(); ?>
                <i class="fa fa-check-square-o" aria-hidden="true"></i> {{$v->name}}  <br><br>
                @endforeach
            </div>
		</div>

        @if($AddList->video)
        <div class="col-md-12">
             <div class="add_listing_info">
             <h3>Video</h3>
             {!! $AddList->video !!} 
             </div>
        </div>
        @endif
		
        <div class="col-md-12">
             <div class="add_listing_info">
             <h3>Mapa</h3>
                {!! $AddList->location !!} 
             </div>
        </div>

	</div>
@stop

@section('script')
@stop


