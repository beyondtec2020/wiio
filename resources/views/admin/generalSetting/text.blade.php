@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')

@stop
@section('content')	
	<section class="content-header">
		<h1> <i class="fa fa-cogs "></i> General Settings</h1>
	</section>
	<section class="content">

    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>About Us </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class=" btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class=" btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="{{route('about')}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                    <textarea id="editor1" name="about" rows="12" class="form-control">
                        {{$GeneralSetting->about}}
                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">
              <i class="fa fa-refresh "></i> <strong> Update About Us</strong>
              </button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info ">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Privacy & Policy </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="{{route('privacy')}}" method="post">
              {{csrf_field()}}
              	<input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                    <textarea id="editor2" name="privacy" rows="12" class="form-control">
                        {{$GeneralSetting->privacy}}
                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">
              <i class="fa fa-refresh "></i> <strong> Update  Privacy & Policy </strong>
              </button>
            </div>
			</form>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Site Map </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="{{route('sitemap')}}" method="post">
              {{csrf_field()}}
                <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                    <textarea id="editor3" name="sitemap" rows="12" class="form-control">
                        {{$GeneralSetting->sitemap}}
                    </textarea>
            </div>
            <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                <i class="fa fa-refresh "></i> <strong>  Update Sitemap</strong>
                </button>
              </div>
            </form>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong>Terms & Conditions </strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="{{route('terms')}}" method="post">
              {{csrf_field()}}
              	<input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                    <textarea id="editor4" name="terms" rows="12"  class="form-control">
                        {{$GeneralSetting->terms}}
                    </textarea>
            </div>
            <!-- /.box-body -->
	            <div class="box-footer">
	              <button class="btn btn-lg btn-primary btn-block" type="submit">
	              <i class="fa fa-refresh "></i> <strong>  Update Terms & Conditions</strong>
	              </button>
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
