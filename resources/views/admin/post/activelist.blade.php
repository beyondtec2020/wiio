@extends('layouts.dashboard')
@section('sub-title')

@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('content')	
<section class="content-header"><h1>My Listing</h1>
<a href="#" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong> {{$title}}-Listing</strong></h3>
              
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            @foreach($AddList as $data)
            <div class="row">
                <div class="timeline-item">
                    <div class="col-md-3">
                    <a href="{{asset('public/images/'.$data->CountImage()->first()->image)}}">
                    <img src="{{asset('public/images/'.$data->CountImage()->first()->image)}}" alt="{{$data->title}}" class="img-responsive"></a>
                    </div>

                      <h3 class="timeline-header"><a href="{{url('/preview-list/'.$data->id.'/'.$data->slug)}}">{{$data->title}}</a> </h3>
                      <div class="timeline-body">{{$data->short_desc}}</div>
                      <div class="timeline-footer">
                      <p>({{$data->review()->count('addlist_id')}} reviews)</p>

                      <a href="{{url('/edit-listing/'.$data->id.'/'.$data->slug)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="{{url('/delete-listing/'.$data->id.'/'.$data->slug)}}" onclick="return checkDelete()" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer"></div> -->

            {{$AddList->render()}}
        </div>
      </div>
    </div>
</section>
@stop


@section('script')
@stop