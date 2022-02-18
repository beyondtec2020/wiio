@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/admin/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
@stop
@section('content')	
	<section class="content-header">
		<h1>Testimonial</h1>
	</section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong><i class="fa fa-edit"></i> Edit</strong></h3>
              <div class="box-tools pull-right">
              <a href="{{url('/testimonial')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-arrow-left"></i> <b>Back </b> </a>
              </div>
            </div>
            <!-- /.box-header -->
             <div class="box-body pad">
             @include('errors.errors')
              <form action="{{url('/update-testimonial')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{csrf_field()}}

              <input type="hidden" name="id" value="{{$data->id}}">
              <div class="form-group">
                  <label for="" class="col-sm-2  control-label">Author Name :</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" placeholder="Name" required class="form-control" value="{{$data->name}}">
                    
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="" class="col-sm-2  control-label"> Designation :</label>
                  <div class="col-sm-10">
                    <input type="text" name="designation" placeholder="Author Designation" required class="form-control" value="{{$data->designation}}">
                  </div>
                </div>

              <div class="form-group">
              <label for="" class="col-sm-2  control-label">Message :</label>
                <div class="col-md-10">
                  <textarea id="editor1" name="text" rows="15"  class="form-control" >{{$data->description}}</textarea>
                </div>
              </div>

              <div class="form-group">
                  <label for="" class="col-sm-2  control-label">Status :</label>
                  <div class="col-sm-10">
                    <input data-toggle="toggle" {{ $data->status == 1 ? 'checked' : ''}}  data-onstyle="success" data-size="large" data-offstyle="danger" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                  </div>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary  col-md-10 col-lg-offset-2" type="submit">
              <i class="fa fa-paper-plane"></i> <strong> Submit</strong>
              </button>
            </div>
            </form>
        </div>
      </div>
    </div>

	</section>
@stop

@section('script')
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
<script src="{{asset('public/assets/admin/js/bootstrap-toggle.min.js')}}"></script>

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('editor1'); });
    </script>

@stop
