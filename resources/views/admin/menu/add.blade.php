@extends('layouts.dashboard')
@section('sub-title')
 {{ $subTitle }}
@stop
@section('style')
@stop
@section('content')	
<section class="content-header"><h1>Menu </h1>
<a href="{{url('/menu')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-plus"></i><strong> Add Menu</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-9 col-sm-offset-2">@include('errors.errors')</div>

             <form action="{{url('/save-menu')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2  control-label">
                    Name :</label>
                  <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="Name" value="" required="">
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="" class="col-sm-2  control-label">
                    Description :</label>
                  <div class="col-sm-9">
                  <textarea id="editor4" name="description" rows="12"  class="form-control">
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2  control-label">
                    Status :</label>
                  <div class="col-sm-9">
                  	<select name="status" id="status" class="form-control has-error" required="" >
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                  </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-paper-plane"></i> <strong>  Add Category </strong>
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
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
@stop
    	