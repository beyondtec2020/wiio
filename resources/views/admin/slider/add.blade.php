@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('content')	
<section class="content-header"><h1>Slider </h1>
<a href="{{url('/manage-slider')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-plus"></i><strong> Add Slider</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-9 col-sm-offset-2">@include('errors.errors')</div>

             <form action="{{url('/add-slider')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">
                    Image :</label>
                  <div class="col-sm-9">
                  	<div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Choose Image </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="image" required=""> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code>Image Must be Type of .jpg</code>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-paper-plane"></i> <strong>  Save Slider</strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</section>
@stop


@section('script')
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
    	