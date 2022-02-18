@extends('welcome')

@section('category')

<style type="text/css">
    .contactus_bg {
        background-image:url({{asset('public/images/'.$bg->search_bg)}});
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="container">
        <div class="white-text text-center div_zindex">
            <h1> Todas as Cidades</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section id="popular_cities" class="section-padding">
    <div class="container">
    	<div class="row">
        @foreach($city as $data)
            <div class="col-sm-6 col-md-3">
                <div class="cities_list" style="background:url({{asset('public/images/'.$data->city_image)}}) no-repeat center;">
                    <div class="city_listings_info">
                        <h4>{{$data->name}}</h4>
                        <div class="listing_number"><span>{{$data->addlists()->where('status',1)->count()}} listing</span> </div>
                    </div>
                    <a href="{{url('/single-city/'.$data->id.'/'.$data->slug)}}" class="overlay_link"></a>
                </div>
            </div>
        @endforeach
        <nav class="pagination_nav">
          {!! $city->links()!!}
        </nav>
    </div>
</section>
@stop