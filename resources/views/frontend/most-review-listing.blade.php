@extends('welcome')
@section('style')
@stop
@section('most-review')

<section id="popular_listings" class="section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="bottom-line">Destaques do Dia</h2>
        </div>  

        <div id="popular_listing_slider">
            <div class="owl-carousel owl-theme">
                @foreach($featured as $data)

                    <div class="post_wrap">
                        <div class="text-center">
                            <h6><a href="{{url('/single-post/'.$data->id.'/'.$data->slug)}}">{{str_limit($data->title,25,'..')}}</a></h6>
                        </div>
                        <div class="post_img">
                            <div class="listing_cate">
                            <span class="cate_icon">
                                <a href="{{url('/single-category/'.$data->cat->id.'/'.$data->cat->slug)}}">
                                <img src="{{asset('public/images/'.$data->cat->cat_image)}}" alt="icon-img"></a>
                            </span>
                        </div>
                            <a href="{{url('/single-post/'.$data->id.'/'.$data->slug)}}">
                                <img src="{{asset('public/images/'.$data->CountImage()->first()->image)}}" alt="image"></a>
                            <div class="text-center selo">
                                <div class="selo-content">
                                    <span class="selo-text">{{ abs(round(100 - ($data->max_price* 100) / $data->min_price)) }}%</span>
                                </div>
                            </div>
                        </div>
                        <div class="post_info">
                            <p style="margin-bottom: 0px">{{str_limit($data->short_desc,60,'..')}}</p>
                            <div class="row product-time">
                            <div class="col-sm-6 text-right">
                                <span><del>de:R${{number_format($data->min_price, 2, ",", "")}}</del></span>
                            </div>
                            <div class="col-sm-6 text-left">
                                <span class="">por:R${{number_format($data->max_price, 2, ",", "")}}</span>
                            </div>
                        </div>
                            <div class="row product-time">
                                <div class="col-sm-6 col-sm-offset-6 text-right">
                                    <a href="{{url('/single-post/'.$data->id.'/'.$data->slug)}}" class="btn btn-oferta btn-sm text-right">Ver Detalhes</a>
                                </div>
                            </div>
                            <div class="post_meta">

                                <?php
                                if ($data->review()->where('addlist_id', '=', $data->id)->first()) {

                                    $ratingCount = $data->review()->where('rating', '!=', 0)->count('rating');
                                    $ratingSum = $data->review()->where('rating', '!=', 0)->sum('rating');

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
                                <p class="listing_map_m pull-right"><i class="fa fa-map-marker"></i> {{$data->city->name}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="" style="padding-bottom: 20px;">
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                    @foreach($A970X250 as $v)
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