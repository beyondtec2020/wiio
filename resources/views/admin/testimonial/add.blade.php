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
              <h3 class="box-title"><strong><i class="fa fa-plus"></i> Add New Testimonial</strong></h3>
              <div class="box-tools pull-right">
              <a href="{{url('/testimonial')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-arrow-left"></i> <b>Back </b> </a>
              </div>
            </div>
            <!-- /.box-header -->
             <div class="box-body pad">
             @include('errors.errors')
              <form action="{{url('/add-testimonial')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{csrf_field()}}
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label for="" class="col-sm-2  control-label">Author Name :</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" placeholder="Name" required class="form-control">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                
                <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
                  <label for="" class="col-sm-2  control-label"> Designation :</label>
                  <div class="col-sm-10">
                    <input type="text" name="designation" placeholder="Author Designation" required class="form-control">
                    <span class="text-danger">{{ $errors->first('Designation') }}</span>
                  </div>
                </div>

              <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
              <label for="" class="col-sm-2  control-label">Message :</label>
              <div class="col-md-10">
                <textarea id="editor1" name="text" rows="15"  class="form-control" ></textarea>
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                    </div>
              </div>

              <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
              <label for="" class="col-sm-2  control-label">Author Image :</label>
                  <div class="col-sm-10 ">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                          <span class="fileinput-filename"> </span>
                      </div>
                      <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase">
                       <i class="fa fa-picture-o"></i> Select image </span>
                       <span class="fileinput-exists bold uppercase"> Change </span>
                       <input type="file" name="image" > </span>
                       <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

              <div class="form-group">
                  <label for="" class="col-sm-2  control-label">Status :</label>
                  <div class="col-sm-10">
                  <!-- <input data-toggle="toggle" checked data-onstyle="success" data-size="large" data-offstyle="danger" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                   -->
                    <input data-toggle="toggle" checked data-onstyle="success" data-size="large" data-offstyle="danger" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
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
