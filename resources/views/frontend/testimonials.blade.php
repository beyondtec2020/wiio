
@extends('welcome')

@section('testimonials')

<style type="text/css">
    #testimonials {
    background-image:url({{asset('public/images/'.$bg->testimonial_bg)}});
    position:relative;
}
</style>

<section id="testimonials" class="section-padding parallex-bg">
    <div class="container">
        <div class="section-header text-center white-text div_zindex">
            <h2>O que nossos clientes dizem</h2>
        </div>
        
        <div id="testimonial_slider" class="div_zindex text-center">
            <div class="owl-carousel owl-theme">
            @foreach($Testimonial as $data)
                <div class="item">
                     <div class="testimonial_header">
                            <div>
                                <img src="{{asset('public/images/'.$data->image)}}" style="width: 95px" class="center-block img-circle">
                            </div>
                            <h5>{!! $data->name!!}</h5>
                            <p>{!! $data->designation!!}</p>
                        </div>
                        <p>{!! $data->description !!}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

    </div>
@stop