@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
@stop
@section('content')	
	<section class="content-header">
		<h1>Seo Settings</h1>
	</section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Website Meta Keywords</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
              <form action="{{route('metakeyword')}}" method="post" class="form-horizontal">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$seo->id}}">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Meta Keywords :</label>
                  <div class="col-sm-9">
                    <textarea id="editor1" name="metakeyword" rows="10" cols="80">
                        {{$seo->metakeyword}}
                    </textarea>
                  </div>
                </div>    
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Meta Keywords</strong>
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
              <h3 class="box-title "><strong>Google Analytics</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
              <form action="{{route('analytics')}}" method="post" class="form-horizontal">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$seo->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Google Analytics:</label>
                  <div class="col-sm-9">
                    <textarea id="editor2" name="analytics" rows="10" cols="80">
                        {{$seo->analytics}}
                    </textarea>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Analytics</strong>
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
              <h3 class="box-title "><strong>Facebook Comments</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
              <form action="{{route('fbcomment')}}" method="post" class="form-horizontal">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$seo->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Scripts :</label>
                  <div class="col-sm-9">
                    <textarea id="" name="fbcomment" rows="10" cols="128">
                        {{$seo->fbcomment}}
                    </textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Site name :</label>
                  <div class="col-sm-9">
                  <input type="text" name="siteurl" class="form-control" value="{{$seo->siteurl}}" placeholder="https://www.sitename.com/">
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Facebook Scripts </strong>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

<script>
  $(function () {
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
  });
</script>

@stop
