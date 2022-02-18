@extends('welcome')

@section('latest')

<section id="latest_blog" class="section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="bottom-line">Últimos Anúncios</h2>
        </div>
        
        <div class="row">
            @foreach($latest as $data)
            <div class="col-md-3">
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
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{url('/latest-products')}}" class="btn"> Mais Anúncios </a>
        </div>
        
    </div>
</section>
@stop