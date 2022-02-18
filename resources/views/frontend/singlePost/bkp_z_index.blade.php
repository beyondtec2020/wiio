@extends('welcome')
@section('meta')
    <meta name="keywords" content="">
    <meta name="description" content=" {{ $data->short_desc }}">
    <meta property="og:title" content="{{ $data->title }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <?php $metaimg = $data->CountImage()->get(); ?>
    @foreach($metaimg as $v)
    <meta property="og:image" content="{{ asset('public/images/'.$v->image) }}" />
    @endforeach
    
@endsection
@section('style')
<meta name="description" content="{{$data->title}}">

<link rel="stylesheet" href="{{asset('public/assets/css/singlePost.css')}}" type="text/css">
<style type="text/css"> 
.style2_header {
    /*background-image:url({{asset('public/assets/images/listing_img2.jpg')}});*/
    background-image:url({{asset('public/images/'.$data->CountImage()->first()->image)}});
}
</style>
@stop


@section('sub-title')
| {{$data->title}}
@stop
@section('category')

<!-- Listing-detail-Header -->
<section class="listing_detail_header style2_header parallex-bg" id="spost">
	<div class="container">
    	<div class="div_zindex white-text">
        	<div class="row">
            	<div class="col-md-8">
                	<h1>{{$data->title}}</h1>
                    <p>{{$data->short_desc}}</p>
                    <div class="listing_rating">
                        <p><span class="review_score">
                        <?php
                        if ($data->review()->where('addlist_id', '=', $data->id)->first()) {
                            
                            $ratingCount = $data->review()->where('rating', '!=', 0)->count('rating');
                            $ratingSum = $data->review()->where('rating', '!=', 0)->sum('rating');
                            if ( $ratingCount == 0) { 
                                $ratingCount = 1; 
                                }
                                $totalRating = ($ratingSum / $ratingCount);   
                        }else{
                            $totalRating =0;
                        }   
                            
                        ?> {{number_format( $totalRating,1)}}/5</span> 

                                            @switch(number_format( $totalRating,0))
                                                @case(1)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(2)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break
                                                
                                                @case(3)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(4)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(5)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                @break

                                                @default
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            @endswitch
                           ({{$data->review()->count('id')}} Comentários) </p>
                        <!-- <p class="listing_like"><a href="#"><i class="fa fa-heart-o"></i> 5 Likes</a></p> -->
                        <form action="{{url('/add-to-favourite')}}" method="post" style="display: inline-block;">
                        {{csrf_field()}}
                        <p class="listing_favorites">
                        <!-- <a href="" ><i class="fa fa-bookmark-o"></i> Add to favorites</a> -->
                        <input type="hidden" name="postId" value="{{$data->id}}">
                            @if(Sentinel::getUser())
                            <input type="hidden" name="UserID" value="{{Sentinel::getUser()->id}}">
                            @endif
                        <button type="submit" class="" style="background: transparent;border: transparent;"><i class="fa fa-bookmark-o"></i> Adicionar aos favoritos</button>
                        </p>
                        </form>
                        
                    

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing_info">
                        <p class="listing_price"><span><del>deR$ </del></span><del>{{round($data->min_price)}}</del> - <span>porR$</span> {{round($data->max_price)}}</p>
                        <div class="listing_message"><a class="btn" data-toggle="modal" data-target="#message_modal"><i class="fa fa-envelope-o"></i> Enviar Mensagem</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Listing-detail-Header -->

<!-- Listings -->
<section class="listing_info_wrap listing_detail_2">
	<div class="container">
        	<div class="sidebar_wrap listing_action_btn">
                <ul>
                    <li><a data-toggle="modal" data-target="#share_modal"><i class="fa fa-share-alt"></i> Compartilhar</a></li>
                    <li><a data-toggle="modal" data-target="#email_friends_modal"><i class="fa fa-envelope-o"></i>Envie para amigos</a></li>
                    <li><a href="#writereview" class="js-target-scroll"> <i class="fa fa-star"></i> Avaliações</a></li>
                    @if(Sentinel::getUser())
                    <?php  $checkReport = App\Report::where('user_id', Sentinel::getUser()->id)->where('addlist_id',$data->id)->first(); ?>
                    @if(!$checkReport)
                    <li><a data-toggle="modal" data-target="#report_modal" bootstrap-modal-form-open><i class="fa fa-exclamation-triangle"></i> Reportar</a></li>
                    @endif
                    @else
                    <li><a data-toggle="modal" data-target="#report_modal_login" bootstrap-modal-form-open><i class="fa fa-exclamation-triangle"></i> Reportar</a></li>
                    @endif
                </ul>
            </div>
                  
            
            <div class="row">
                <div class="col-md-8">

            <div class="image_slider_wrap">
                <div id="listing_img_slider2">
                    <div class="owl-carousel owl-theme">
                       @foreach($data->CountImage()->get() as $d)
                           <div class="item"><img src="{{asset('public/images/'.$d->image)}}" alt="image"></div>
                       @endforeach
                    </div>    
                </div>
                @if($data->location != null)
                <div class="view_map">
                    <a href="#single_map" class="js-target-scroll"><i class="fa fa-map-marker"></i></a>
                </div>
                @endif
            </div>

                
                    @if($data->video != null)
                    <div class="section-padding  ">
                        <div class="widget_title">
                            <h4>Watch Video</h4>
                        </div>
                        <div class="listing_video videoWrapper">
                          {!! $data->video !!}
                        </div>
                        </div>
                    @endif
                

                    <div class="listinghub_detail">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#description" aria-expanded="true" aria-controls="collapseOne">
                                     <i class="fa  fa-file-text-o"></i> Detalhes da Oferta</a>
                                    </a>
                                  </h4>
                                </div>
                                <div id="description" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                    <p>{!! $data->description!!}</p>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#amenities" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-align-left"></i> Dias Da Semana</a>
                                  </h4>
                                </div>
                                <div id="amenities" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">
                                    <ul>
                                        @foreach($data->totalAmenity()->get() as $d)
                                     <?php   $v = \App\Amenity::where('id',$d->amenities_id)->first(); ?>
                                            @if($v != null)<li><a href="#" > <i class="fa fa-check-square"></i> {{$v->name}} </a></li>@endif
                                        @endforeach
                                        
                                    </ul>
                                  </div>
                                </div>
                              </div>
                        </div>

                        <!-- Listing-Map -->
                        @if($data->location != null )
                        <div id="single_map">
                            <div class="widget_title">
                                 <h4>Mapa</h4>
                            </div>
                            <div id="singleListingMap-container">
                                <div class="map-responsive">
                                {!! $data->location !!}
                                </div>
                            </div>
                        </div>
                        @endif
	                    <!-- /Listing-Map -->
                        
                        <!-- Review-List -->
                        <div class="reviews_list">
                            <?php $count = $data->review()->count()?>
                            @if($count != 0)
                            <div class="widget_title">
                                <h4><span> {{$count}}  Avaliações </span></h4>
                            </div>
                             @endif

                             <?php $reviews = $data->review()->paginate(2); ?>
                            @foreach($reviews as $v)
                            <div class="review_wrap">
                                <div class="review_author">
                                <?php $user = \App\User::where('id',$v->user_id)->first(); ?>
                                    
                                    @if($user->profile == null)
                                    <img src="{{asset('public/assets/admin/images/pro.png')}}" alt="image">
                                    @else
                                    <img src="{{asset('public/images/'.$user->profile)}}" alt="image">
                                    @endif
                                    <figcaption>
                                    <h6><a style="">{{$user->first_name}} {{$user->last_name}}</a></h6>
                                    </figcaption>

                                </div>
                                <div class="review_detail">
                                    <h5>{{$v->title}}</h5>
                                    <p>{{$v->description}}</p>
                                    <div class="listing_rating">
                                        <p><span class="review_score">
                                        @if($v->rating ==null)0 
                                        @else 
                                        {{$v->rating}}
                                        @endif/ 5</span> 
                                            @switch($v->rating)
                                                @case(1)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(2)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break
                                                
                                                @case(3)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(4)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(5)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                @break

                                                @default
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            @endswitch
                                        </p>
                                        <p><i class="fa fa-clock-o"></i> {{$v->created_at->toDayDateTimeString()}}</p>  
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <!-- /Review-List -->
                        
                        <!-- Review-Form -->
                        <div id="writereview" class="review_form">
                         @if(Sentinel::getUser())

                <?php  $checkData = App\Review::where('user_id', Sentinel::getUser()->id)->where('addlist_id',$data->id)->first(); ?>

                            <?php if(!$checkData) {?>
                    	<div class="widget_title">
	                    	 <h4>Write a Review </h4>
                         </div>
    						<form action="{{url('/review-post')}}" method="post" data-toggle="validator" id="reviewForm">
                            {{csrf_field()}}
                            <input type="hidden" name="postId" value="{{$data->id}}">
                            	<div class="form-group">
                                	<label class="form-label">Your Rating for this listing</label>
                                    <div class="listing_rating">
                                        <input name="rating" id="rating-1" value="5" type="radio">
                                        <label for="rating-1" class="fa fa-star"></label>
                                        <input name="rating" id="rating-2" value="4" type="radio">
                                        <label for="rating-2" class="fa fa-star"></label>
                                        <input name="rating" id="rating-3" value="3" type="radio">
                                        <label for="rating-3" class="fa fa-star"></label>
                                        <input name="rating" id="rating-4" value="2" type="radio">
                                        <label for="rating-4" class="fa fa-star"></label>
                                        <input name="rating" id="rating-5" value="1" type="radio">
                                        <label for="rating-5" class="fa fa-star"></label>
                                    </div>
                                </div>

                                <input type="hidden" name="userId" value="{{Sentinel::getUser()->id}}">
                                
                                <div class="form-group {{$errors->has('title') ?'has-error':''}}">
                                	<label class="form-label">Title</label>
                                    <input name="title" type="text"  placeholder="Title of Your Review" class="form-control" id="inputName" data-error="maximum of 80 characters" required>
                                    <div class="help-block with-errors"></div>
                                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                	<label class="form-label">Review</label>
                                    <textarea name="review" cols="" rows="" class="form-control" placeholder="Your Experience" data-error="Please enter Your Experience." id="inputName" required></textarea>
                                    
                                </div>
                                <div class="form-group">
                                	<input type="submit" class="btn btn-block" value="Submit Review">
                                </div>
                            </form>
                            <?php } ?>
                        @else

                        <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Entre com a sua conta</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="{{url('/login-review')}}" method="post" role="form" style="display: block;" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email">
                                         {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Senha">
                                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        <strong>{{session('error')}}</strong>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login btn-block" value="Entrar">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3"><a href="{{url('/forgot-password')}}" tabindex="5" class="forgot-password">Esqueceu Senha?</a>
                                            </div>
                                            <div class="col-lg-6">Caso não tem uma conta?
                                                    <a href="{{url('/register')}}" tabindex="5" class="forgot-password"> Cadastre-se</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                        @endif
                    </div>
                        <!-- Review-Form -->

                    </div>
                </div>
                
                <!-- Sidebar -->
                 <div class="col-md-4">
                    <div class="listinghub_sidebar">
                        <div class="sidebar_wrap listing_contact_info">
                            <div class="widget_title">
                                <h6>Contato</h6>
                            </div>
                            <ul>
                                <li><i class="fa fa-map-marker"></i>{{$data->address}} <br>
                                PO Box : {{$data->zip_code}}, {{$data->city->name}}
                                </li>
                                <li><i class="fa fa-phone"></i> <a href="">{{$data->phone}}</a></li>
                                @if($data->email != null)
                                <li><i class="fa fa-envelope"></i> <a href="mailto:{{$data->email}}">{{$data->email}}</a></li>@endif

                                @if($data->website != null)
                                <li><i class="fa fa-link"></i> <a href="{{$data->website}}" target="_blank">{{$data->website}}</a></li>@endif
                            </ul>
                            <div class="social_links">
                            @if($data->facebook != null)
                                <a href="{{$data->facebook}}" class="facebook_link" target="_blank"><i class="fa fa-facebook-f"></i></a>
                            @endif
                            @if($data->linkdin != null)
                                <a href="{{$data->linkdin}}" class="linkedin_link" target="_blank"><i class="fa fa-linkedin"></i></a>
                            @endif
                            @if($data->twitter != null)
                                <a href="{{$data->twitter}}" class="twitter_link" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                            @if($data->google != null)
                                <a href="{{$data->google}}" class="google_plus_link" target="_blank"><i class="fa fa-google-plus"></i></a>
                            @endif
                            </div>
                        </div>
                        

                        <div class="" style="padding-bottom: 20px;">
                            @foreach($A300X250 as $v)
                            <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
                              @if($v->advert_type == 1)
                              <img class="img-responsive" src="{{asset('public/images/advertise/'.$v->val1)}}" alt="" class="img-responsive" />
                              @else
                                  {!! $v->val !!}
                              @endif
                            </a>
                            @endforeach      
                        </div>

                        <div class="sidebar_wrap ">
                            <div class="widget_title">
                                <h4>Categorias</h4>
                            </div>
                            <div class="listing_video">
                              <ul>
                                @foreach($cat as $dat)
                                  <li><a href="{{url('/single-category/'.$dat->id.'/'.$dat->slug)}}">{{$dat->name}}</a></li>
                                @endforeach
                              </ul>
                            </div>
                        </div>

                        <div class="" style="padding-bottom: 20px;">
                            @foreach($A970X250 as $v)
                            <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
                              @if($v->advert_type == 1)
                              <img class="img-responsive" src="{{asset('public/images/advertise/'.$v->val1)}}" alt="" class="img-responsive" />
                              @else
                                  {!! $v->val !!}
                              @endif
                            </a>
                            @endforeach      
                        </div>

                        <div class="" style="padding-bottom: 0px">
                        <div class="widget_title">
                            <h4>Últimos Anúncios</h4>
                        </div>
                            <div id="latest_listing_slider">
                                <div class="owl-carousel owl-theme">
                                @foreach($latest as $da)
                                        <div class="post_wrap">
                                            <div class="text-center">
                                                <h6><a href="{{url('/single-post/'.$da->id.'/'.$da->slug)}}">{{str_limit($da->title,25,'..')}}</a></h6>
                                            </div>
                                            <div class="post_img">
                                                <div class="listing_cate">
                                                    <span class="cate_icon">
                                                        <a href="{{url('/single-category/'.$da->cat->id.'/'.$da->cat->slug)}}">
                                                        <img src="{{asset('public/images/'.$da->cat->cat_image)}}" alt="icon-img"></a>
                                                    </span>
                                                </div>
                                                <a href="{{url('/single-post/'.$da->id.'/'.$da->slug)}}">
                                                    <img src="{{asset('public/images/'.$da->CountImage()->first()->image)}}" alt="image"></a>
                                                <div class="text-center selo">
                                                    <div class="selo-content">
                                                        <span class="selo-text">{{ abs(round(100 - ($da->max_price* 100) / $da->min_price)) }}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_info">
                                                <p style="margin-bottom: 0px">{{str_limit($da->short_desc,60,'..')}}</p>
                                                <div class="row product-time">
                            <div class="col-sm-6 text-right">
                                <span><del>de:R${{round($da->min_price)}}</del></span>
                            </div>
                            <div class="col-sm-6 text-left">
                                <span class="">por:R${{round($da->max_price)}}</span>
                            </div>
                        </div>
                                                <div class="row product-time">
                                                    <div class="col-sm-6 col-sm-offset-6 text-right">
                                                        <a href="{{url('/single-post/'.$da->id.'/'.$da->slug)}}" class="btn btn-oferta btn-sm text-right">Ver Detalhes</a>
                                                    </div>
                                                </div>
                                                <div class="post_meta">

                                                    <?php
                                                    if ($da->review()->where('addlist_id', '=', $da->id)->first()) {

                                                        $ratingCount = $da->review()->where('rating', '!=', 0)->count('rating');
                                                        $ratingSum = $da->review()->where('rating', '!=', 0)->sum('rating');

                                                        if ( $ratingCount == 0) {
                                                            $ratingCount = 1;
                                                        }
                                                        $totalRating = ($ratingSum / $ratingCount);
                                                    }else{
                                                        $totalRating = 0;
                                                    }

                                                    ?>

                                                    @switch(number_format( $totalRating,0))
                                                        @case(1)
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star"></i>
                                                        @break

                                                        @case(2)
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star"></i>
                                                        @break

                                                        @case(3)
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star"></i>
                                                        @break

                                                        @case(4)
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        @break

                                                        @case(5)
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        @break

                                                        @default
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    @endswitch
                                                    <p class="listing_map_m pull-right"><i class="fa fa-map-marker"></i> {{$da->city->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="" style="padding-bottom: 20px;">
                            @foreach($A300X600 as $v)
                            <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
                              @if($v->advert_type == 1)
                              <img class="img-responsive" src="{{asset('public/images/advertise/'.$v->val1)}}" alt="" class="img-responsive" />
                              @else
                                  {!! $v->val !!}
                              @endif
                            </a>
                            @endforeach      
                        </div>

                                        </div>

                    </div>
                </div>
                <!-- /Sidebar -->
            </div>
    </div>
</section>
<!-- /Listings -->


<!-- Share-Listing -->
<div id="share_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title">Share Listing</h3>
      </div>
      <div class="modal-body">
      	<div class="share_listing">
              <div data-easyshare data-easyshare-url="{{Request::fullUrl() }}">
                <!-- Twitter -->
                <a data-easyshare-button="twitter" data-easyshare-tweet-text="" style="cursor: pointer;"><i class="fa fa-twitter"></i></a>
                <!-- Facebook -->
                <a data-easyshare-button="facebook" style="cursor: pointer;"><i class="fa fa-facebook"></i></a>
                <!-- Google+ -->
                <a data-easyshare-button="google" style="cursor: pointer;"><i class="fa fa-google-plus"></i></a>
                <!-- LinkedIn -->    
                <a data-easyshare-button="linkedin" style="cursor: pointer;"><i class="fa fa-linkedin"></i></a>
                <div data-easyshare-loader>Loading...</div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Share-Listing -->

<!-- Email-to-Friends -->
<div id="email_friends_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title">Email to Friend</h3>
      </div>
      <div class="modal-body">
        <form action="{{url('/share-with-email')}}" method="post" data-toggle="validator" role="form">
        {{csrf_field()}}
          <div class="form-group">
            <input class="form-control" name="name" placeholder="Your Name" type="text" data-error="Please enter name field." required="">
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input class="form-control" name="ownEmail" placeholder="Your Email Address" type="email" required>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input class="form-control" name="friendEmail" placeholder="Friend Email Address" type="email" required>
            <div class="help-block with-errors"></div>
          </div>
          <input type="hidden" name="url" value="{{Request::fullUrl()}}">
          <div class="form-group">
            <textarea rows="4" class="form-control" name="message" placeholder="Message" required=""></textarea>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input value="Submit" class="btn btn-block" type="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Email-to-Friends -->

<!-- Report -->
<div id="report_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title">Report This Listing</h3>
        <p>Please indicate what problem has been found!</p>
      </div>
      <div class="modal-body">
        <form action="{{url('/report-post')}}" method="post" data-toggle="validator" role="form">
        {{csrf_field()}}
        <input type="hidden" name="postId" value="{{$data->id}}">
        @if(Sentinel::getUser())
        <input type="hidden" name="userId" value="{{Sentinel::getUser()->id}}">
        @endif
          <div class="form-group ">
            <div class="radio">
                <input type="radio" name="report_type" value="1" id="RadioGroup1_0" checked>
                <label for="RadioGroup1_0">Duplicate Listing</label>
             </div>
             <div class="radio">
                <input type="radio" name="report_type" value="2" id="RadioGroup1_1">
                <label for="RadioGroup1_1">Wrong Contact Info </label>
             </div>
             <div class="radio">
                <input type="radio" name="report_type" value="3" id="RadioGroup1_2">
                <label for="RadioGroup1_2">Fake Listing</label>
             </div>
             <div class="radio">
                <input type="radio" name="report_type" value="4" id="RadioGroup1_2">
                <label for="RadioGroup1_2">Other Problem</label>
             </div>
          </div>
          <div class="form-group ">
            <textarea rows="4" name="problem_desc" id="inputName" data-error="Please enter your report" class="form-control" placeholder="Problem Description" required></textarea>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input value="Submit" class="btn btn-block" type="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Report -->

<!-- Report -->
<div id="report_modal_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title">Sign In</h3>
      </div>
      <div class="modal-body">
        <form action="{{url('/login-review')}}" method="post" data-toggle="validator">
        {{csrf_field()}}
        
          <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <input type="email" name="email" class="form-control" placeholder="Email">
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
          </div>

          <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <input type="password" name="password" class="form-control" placeholder="Senha">
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group">
            <input value="Submit" class="btn btn-block" type="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Report -->

<!-- Send-Message -->
<div id="message_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title">Enviar Mensagem</h3>
      </div>
      <div class="modal-body">
        <form action="{{url('/send-to-publisher')}}" method="post" data-toggle="validator" role="form">
        {{csrf_field()}}
          <div class="form-group">
          	<input type="text" class="form-control" data-error="Please enter name field." name="name" placeholder="Nome" required>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
          	<input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="help-block with-errors"></div>
          </div>
          <input type="hidden" name="addId" value="{{$data->id}}">
          <input type="hidden" name="url" value="{{Request::fullUrl()}}">
          <input type="hidden" name="userId" value="{{$data->user_id}}">
          <div class="form-group">
            <textarea rows="4" class="form-control" name="message" placeholder="Mensgaem" data-error="Please enter message field." required ></textarea>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input value="Send Message" class="btn btn-block" type="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Send-Message -->

@stop

@section('script')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script src="{{asset('public/assets/js/jquery.kyco.easyshare.js')}}"></script>

<script type="text/javascript">
     $('#spost').load('/single-post', function() {
          $(this).show();
          $("#listing_banner").hide();
        });
    
</script>
<script>
    $.each($('.advanced [data-easyshare-button-count] + [data-easyshare-loader]'), function(i, e) {
      var el        = $(e);
      var done      = false;
      var attr      = el.prev().attr('data-easyshare-button-count')
      var target    = document.querySelector('.advanced [data-easyshare-button-count="' + attr + '"] + [data-easyshare-loader]');
      var startDate = new Date().getTime() / 1000;
      var endDate;

      var observer = new MutationObserver(function(mutations) {
        if (!done) {
          done = true;
          endDate = new Date().getTime() / 1000;
          el.after('Loaded in roughly ', (endDate - startDate).toFixed(2), 's');
        }
      });

      observer.observe(target, {
        attributes: true
      });
    });
  </script>
  

<script type="text/javascript">

</script>
@stop