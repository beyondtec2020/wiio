@extends('layouts.dashboard')
@section('sub-title')

@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('content')	
<section class="content-header"><h1>{{$title}} </h1>
<a href="#" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong> Bookmark-Listing</strong></h3>
              
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            @foreach($Bookmark as $data)
            <div class="row">
                <div class="timeline-item">
                    <div class="col-md-3">
                    <a href="{{asset('public/images/'.$data->AddList->CountImage()->first()->image)}}">
                    <img src="{{asset('public/images/'.$data->AddList->CountImage()->first()->image)}}" alt="{{$data->AddList->title}}" class="img-responsive"></a>
                    </div>

                      <h3 class="timeline-header"><a href="{{url('/single-post/'.$data->AddList->id.'/'.$data->AddList->slug)}}">{{$data->AddList->title}}</a> </h3>
                      <div class="timeline-body">{{$data->AddList->short_desc}}</div>
                      <div class="timeline-footer">
                      <p>({{$data->AddList->review()->count('addlist_id')}} reviews)</p>
                        <a href="{{url('del-to-favourites/'.$data->id)}}" onclick="return checkDelete()" class="btn btn-danger btn-xs">Delete</a>
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer"></div> -->
        </div>
      </div>
    </div>
</section>
@stop


@section('script')
@stop