@extends('welcome')

@section('banner')

<style type="text/css">
<?php $i=1; ?>
@foreach($Slider as $k => $d)	
.directory-slide-carousel .carousel-inner .item:nth-child({{++$k}}) {
    background-image: url("{{asset('public/images/slider/'.$d->image)}}");
}
@endforeach
</style>

<section id="banner" class="parallex-bg directory-slide-carousel">

        <!--Start Background Slider-->
        <div class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <!--Start Slide Item-->
                <div class="item active">
                    <div class="slide-carousel-overlay"></div>
                </div>
                <!--End Slide Item-->

                <!--Start Slide Item-->
                <div class="item">
                    <div class="slide-carousel-overlay"></div>
                </div>
                <!--End Slide Item-->

                <!--Start Slide Item-->
                <div class="item">
                    <div class="slide-carousel-overlay"></div>
                </div>
                <!--End Slide Item-->
            </div>
        </div>
        <!--End Background Slider-->
        <div class="intro_text white-text div_zindex carousel-search-form">
            <h1>Bem Vindo ao {{$GeneralSetting->title}}</h1>
            <h5>Pesquise os melhores anúncios com grandes descontos</h5>
            <div class="search_form">
                <form action="{{url('/search-listing')}}" method="get">
                {{ csrf_field() }}
                    <div class="form-group select">
                        <select class="form-control chosen" name="category" required="">
                            <option value="">O que você está procurando?</option>
                            @foreach($cat as $v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group select">
                         <select class="form-control chosen" name="city" required="">
                            <option value="">Cidade</option>
                            @foreach($city as $v)
                                <option value="{{$v->slug}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group search_btn">
                        <input type="submit" value="Pesquisar" class="btn btn-block">
                    </div>
                </form>
            </div>
        </div>
</section>
@stop
@section('script')
<script type="text/javascript">
$(".chosen").chosen();
</script>
@stop