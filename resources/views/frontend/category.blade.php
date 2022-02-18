@extends('welcome')
@section('sub-title')
    {{$subtitle}}
@stop
@section('category')
<section id="all_category" class="gray_bg">
    <div class="container">
        <div id="category_slider">
            <div class="owl-carousel owl-theme">
                @foreach($cat as $k => $data)
                <div class="item">
                    <a href="{{url('/single-category/'.$data->id.'/'.$data->slug)}}">
                        <div class="category_icon">
                            <img src="{{asset('public/images/'.$data->cat_image)}}" alt="image">
                        </div>
                        <p>{{$data->name}}</p>
                    </a>
                </div>
                @endforeach
                
            </div>
        </div>        
    </div>
</section>
@stop