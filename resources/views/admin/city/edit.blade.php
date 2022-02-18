@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('content')	
<section class="content-header"><h1>Manage City </h1>
<a href="{{url('/city')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-edit"></i><strong> Edit Category</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

             <form action="{{url('/update-city')}}" method="post" class="form-horizontal" enctype="multipart/form-data" name="editCategoryForm">
              {{csrf_field()}}

            <div class="box-body">
            <input type="hidden" name="id" value="{{$city->id}}">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    Name :</label>
                  <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="Name" value="{{$city->name}}" >

                  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">Status :</label>
                  <div class="col-sm-9">
                    <select name="status" id="status" class="form-control" required="" >
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh"></i> <strong>  Update City </strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-picture-o"></i> <strong> Edit City Image</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

             <form action="{{url('/update-cityImage')}}" method="post" class="form-horizontal" enctype="multipart/form-data" >
              {{csrf_field()}}

            <div class="box-body">
            <input type="hidden" name="id" value="{{$city->id}}">
                
                <div class="form-group {{ $errors->has('city_image') ? 'has-error' : ''}}">
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
                                    <span class="fileinput-new bold"> Change Image </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="city_image" > </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code>Image Must be Type of PNG</code>
                    </div>
                    {!! $errors->first('city_image', '<p class="help-block">:message</p>') !!}
                    <br>
                    <img src="{{asset('public/images/'.$city->city_image)}}">
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh"></i> <strong>  Update City Image </strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</section>
<script type="text/javascript">
  document.forms['editCategoryForm'].elements['status'].value={{$city->status}}
</script>
@stop


@section('script')
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
    	