@extends('welcome')

@section('popular-cities')
<section id="popular_cities" class="section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="bottom-line">Principais Cidades</h2>
            <p></p>
        </div>
        <div class="row">
        @foreach($city->take(8) as $data)
            <div class="col-sm-6 col-md-3">
                <div class="cities_list" style="background:url({{asset('public/images/'.$data->city_image)}}) no-repeat center;">
                    <div class="city_listings_info">
                        <h4>{{$data->name}}</h4>
                        <div class="listing_number"><span style="font-weight:bold">{{$data->addlists()->where('status',1)->count()}} listing</span> </div>
                    </div>
                    <a href="{{url('/single-city/'.$data->id.'/'.$data->slug)}}" class="overlay_link"></a>
                </div>
            </div>
        @endforeach
        </div>
        <div class="text-center">
            <a href="{{url('/all-cities')}}" class="btn">View More Cities </a>
        </div>
    </div>
</section>


<section class="" style="padding: 20px 0px;">
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                    @foreach($A728X90 as $v)
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