@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop

@section('content')	
	<section class="content-header">
		<h1>Background Setup</h1>
	</section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12 ">

    @include('errors.errors')

        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong>  Search & Category Background Image</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <form action="{{url('/search_bg')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$Background->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
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
                                    <input type="file" name="search_bg"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                        <code>Image Must be 1920X860 size</code>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($Background->search_bg == null)
                  <h5 style="color: red; text-align: center;">there is no Image</h5>
                  @else
                  <img src="{{asset('public/images/'.$Background->search_bg)}}" height="120px" width="280px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Upload Image </strong>
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
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Testimonial Background Image</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{url('/testimonial_bg')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$Background->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Image :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  Image</span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="testimonial_bg"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    <code>Image Must be 1920X736 size</code>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($Background->testimonial_bg == null)
                  <h5 style="color: red;text-align: center;">there is no Image</h5>
                  @else
                  <img src="{{asset('public/images/'.$Background->testimonial_bg)}}" height="120px" width="280px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Upload Image</strong>
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
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Timer Background Image</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{url('/timer_bg')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$Background->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Image :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  Image</span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="timer_bg"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                        <code>Image Must be 1920X1060 size</code>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($Background->timer_bg == null)
                  <h5 style="color: red;text-align: center;">there is no Image</h5>
                  @else
                  <img src="{{asset('public/images/'.$Background->timer_bg)}}" height="120px" width="280px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Upload Image</strong>
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
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Subscriber Background Image</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{url('/subscriber_bg')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$Background->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Image :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  Image</span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="subscriber_bg"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    <code>Image Must be 1100X700 size</code>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($Background->subscriber_bg == null)
                  <h5 style="color: red;text-align: center;">there is no Image</h5>
                  @else
                  <img src="{{asset('public/images/'.$Background->subscriber_bg)}}" height="120px" width="280px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Upload Image</strong>
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
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> About Us Background</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{url('/about_bg')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}
            <div class="box-body">
                <input type="hidden" name="id" value="{{$Background->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Image :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  Image</span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="about_bg"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    <code>Image Must be 1100X1060 size</code>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($Background->about_bg == null)
                  <h5 style="color: red;text-align: center;">there is no about-us image</h5>
                  @else
                  <img src="{{asset('public/images/'.$Background->about_bg)}}" height="120px" width="280px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Upload Abount Us Image </strong>
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
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Contact-Us Background Image</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{url('/contact_bg')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$Background->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Image :</label>
                  <div class="col-sm-9">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  Image</span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="contact_bg"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                      </div>
                      <code>Image Must be 1920X650 size</code>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($Background->contact_bg == null)
                  <h5 style="color: red;text-align: center;">there is no Contact-us Image</h5>
                  @else
                  <img src="{{asset('public/images/'.$Background->contact_bg)}}" height="120px" width="280px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Upload Image</strong>
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
