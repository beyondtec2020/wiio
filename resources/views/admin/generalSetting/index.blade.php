@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/admin/css/bootstrap-colorpicker.min.css')}}">
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop

@section('content')	
	<section class="content-header">
		<h1>General Settings</h1>
	</section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12 ">

    @include('errors.errors')

        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Manage Logo</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <form action="{{route('logo')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Website logo :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change Logo </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="logo"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code>Image Must be Type of PNG </code>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($GeneralSetting->logo == null)
                  <h5 style="color: red; text-align: center;">there is no logo</h5>
                  @else
                  <img src="{{asset('public/images/'.$GeneralSetting->logo)}}" height="70px" width="150px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Logo </strong>
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
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Manage Preloader Gif</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{url('/update-Preloader')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Preloader Gif :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  Gif </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="preloader"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code> Image Must be type of Gif</code>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  <img src="{{asset('public/assets/images/Preloader_2.gif')}}" class="img-responsive">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update favicon </strong>
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
              <h3 class="box-title "><i class="fa fa-photo"></i> <strong> Manage Favicon Icon</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{route('favico')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                      Favicon Image :</label>
                  <div class="col-sm-9">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change  favicon </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="favico_ico"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code>Favicon Image Must be type of PNG</code>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                  @if($GeneralSetting->favico_ico == null)
                  <h5 style="color: red;text-align: center;">there is no favico.ico</h5>
                  @else
                  <img src="{{asset('public/images/'.$GeneralSetting->favico_ico)}}" height="70px" width="150px">
                  @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update favicon </strong>
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
              <h3 class="box-title "><strong>Website Content</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
             <form action="{{route('webContent')}}" method="post" class="form-horizontal">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Website Title :</label>
                  <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" placeholder="Title" value="{{$GeneralSetting->title}}">
                  </div>
                </div>
                <div class="form-group {{ $errors->has('short_bio') ? 'has-error' : '' }}">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Short Biography :</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" name="short_bio" rows="5">{{$GeneralSetting->short_bio}}</textarea>
                  <span class="text-danger">{{ $errors->first('short_bio') }}</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Website Tag :</label>
                  <div class="col-sm-9">
                  <input type="text" data-role="tagsinput" name="metakeywords" class="form-control"  value="{{$GeneralSetting->metakeywords}}">
                  </div>
                </div>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update </strong>
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
              <h3 class="box-title "><strong>Office Address</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
              <form action="{{route('address')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                     Address :</label>

                  <div class="col-sm-9">
                    <textarea id="editor1" name="address" rows="8" class="form-control">
                        {{$GeneralSetting->address}}
                    </textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2  control-label">
                    Phone :</label>
                  <div class="col-sm-9">
                  <input type="tel" name="phone" class="form-control" placeholder="Phone" value="{{$GeneralSetting->phone}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                    Fax :</label>
                  <div class="col-sm-9">
                  <input type="text" name="fax" class="form-control" placeholder="Fax" value="{{$GeneralSetting->fax}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                    Email :</label>
                  <div class="col-sm-9">
                  <input type="email" name="office_email" class="form-control" placeholder="Email" value="{{$GeneralSetting->office_email}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">
                    Website base color :</label>
                  <div class="col-sm-9">
                  <input type="text" name="color"  value="{{$GeneralSetting->color}}" style="background-color: #{{ $GeneralSetting->color }};color:#fff" class="form-control my-colorpicker1 ">
                  </div>
                </div>
                
                    
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Office Address</strong>
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
              <h3 class="box-title "><strong>Footer Text</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="{{route('footer')}}" method="post">
              {{csrf_field()}}
                <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                    <textarea id="editor2" name="footer" rows="2" class="form-control">
                        {{$GeneralSetting->footer}}
                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Footer text</strong>
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
              <h3 class="box-title "><strong>Google Location Embeded Code</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="{{route('gmaps')}}" method="post">
              {{csrf_field()}}
                <input type="hidden" name="id" value="{{$GeneralSetting->id}}">
                    <textarea  name="gmaps" rows="10" class="form-control">
                        {!! $GeneralSetting->gmaps !!}
                    </textarea>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                  <i class="fa fa-refresh "></i> <strong>  Update Google Location</strong>
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
<script src="{{asset('public/assets/admin/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
  <script src="{{ asset('public/assets/admin/js/bootstrap-colorpicker.js') }}"></script>

<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
   $(function () {
            $('.my-colorpicker1').colorpicker()
        });
</script>

@stop
