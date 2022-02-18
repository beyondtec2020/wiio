@extends('layouts.dashboard')
@section('sub-title')

@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('content')	
<section class="content-header"><h1>Listing </h1>
<a href="#" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-edit"></i><strong> Edit-Listing</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-9 col-sm-offset-2">@include('errors.errors')</div>

             <form action="{{url('/update-author-lists')}}" method="post" class="form-horizontal" enctype="multipart/form-data" name="updateList">
              {{csrf_field()}}

            <div class="box-body">
            <input type="hidden" name="id" value="{{$AddList->id}}">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    Title :</label>
                  <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" value="{{$AddList->title}}" required="">
                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('short_description') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    Short Description :</label>
                  <div class="col-sm-9">
                  <input type="text" name="short_description" class="form-control" value="{{$AddList->short_desc}}" required>
                  {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    Category :</label>
                  <div class="col-sm-9">
                    <select name="catgory" class="form-control has-error" required>
                      <option value="">Select category</option>
                      @foreach($category as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                    </select>
                    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label"> Address :</label>
                  <div class="col-sm-9">
                    <input type="text" name="address" class="form-control" value="{{$AddList->address}}" required>
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    City :</label>
                  <div class="col-sm-9">
                    <select name="city" class="form-control has-error" required>
                        <option value="">Select city</option>
                        @foreach($city as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label"> Zip-Code :</label>
                  <div class="col-sm-9">
                  <input type="text" name="zip_code" class=" form-control" value="{{$AddList->zip_code}}" required >
                    {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2 control-label"> Phone Number :</label>
                  <div class="col-sm-9">
                  <input type="text" name="phone" value="{{$AddList->phone}}"  class="form-control"  required>
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group ">
                  <label for="" class="col-sm-2  control-label"> Email <span>(optional)</span></label>
                  <div class="col-sm-9">
                  <input type="text" name="email" class="form-control" value="{{$AddList->email}}">
                  </div>
                </div>

                <div class="form-group ">
                  <label for="" class="col-sm-2 control-label"> Website <span>(optional)</span></label>
                  <div class="col-sm-9">
                  <input type="text" name="website" value="{{$AddList->website}}" class="form-control">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-2  control-label"> Facebook <span>(optional)</span></span></label>
                  <div class="col-sm-9">
                  <input type="text" name="facebook" value="{{$AddList->facebook}}" class="form-control">
                  </div>
                </div>

                <div class="form-group ">
                  <label for="" class="col-sm-2 control-label"> Linkdin <span>(optional)</span></label>
                  <div class="col-sm-9">
                  <input type="text" name="linkdin" value="{{$AddList->linkdin}}" class="form-control">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-2  control-label"> Twitter <span>(optional)</span></span></label>
                  <div class="col-sm-9">
                  <input type="text" name="twitter" value="{{$AddList->twitter}}" class="form-control">
                  </div>
                </div>

                <div class="form-group ">
                  <label for="" class="col-sm-2 control-label"> Google Plus <span>(optional)</span></label>
                  <div class="col-sm-9">
                  <input type="text" name="google" value="{{$AddList->google}}"  class="form-control">
                  </div>
                </div>


              <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="" class="col-sm-2  control-label">Description :</label>
                <div class="col-sm-9">
                <textarea class="form-control" name="description" rows="8"> {{$AddList->description}} </textarea>
                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">Amenities <span>(optional)</span></label><br>
                <div class=" col-sm-8">
                  <div class="checkbox" style="margin-left: 20px;">
                  <?php $i=1; $j=1; ?>
                  @foreach($Amenity as $k => $data)
                      <p><input type="checkbox" id="amenities{{++$k}}" name="amenities[{{$j++}}]" value="{{$data->id}}" @foreach($addlistAmenity as  $ss) {{$ss->amenities_id == $data->id ? 'checked' : ''}} @endforeach>
                      <label for="amenities{{$i++}}">{{$data->name}}</label></p>
                  @endforeach
                  </div>
                </div>
              </div>


                <div class="form-inline ">
                  <label for="" class="col-sm-2  control-label"> Min. Price</label>
                  <input type="text" name="min_price" value="{{$AddList->min_price}}" class="col-sm-4 form-control"  style="margin-left: 5px;" min="0">
                  {!! $errors->first('min_price', '<p class="help-block">:message</p>') !!}  
                </div>

                <div class="form-inline {{ $errors->has('max_price') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2 control-label"> Max. Price</label>
                  <input type="text" name="max_price" class="form-control col-sm-4 "  min="0" value="{{$AddList->max_price}}">
                  {!! $errors->first('max_price', '<p class="help-block">:message</p>') !!}
                </div>
                <br><br><br>

              <div class="form-group">
                <label for="" class="col-sm-2  control-label">Youtube Video URL </label>
                <div class="col-sm-9">
                <input type="text" name="video" class="form-control" value="{{$AddList->video}}">
                <code>Only embeded code supported</code>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-2  control-label">Google Location </label>
                <div class="col-sm-9">
                <input type="text" name="location" class="form-control" value="{{$AddList->location}}">
                <code>Only embeded code supported</code>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-2  control-label">Add Gallery Images </label>
                <div class="col-sm-9">
                <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple />
                </div>
                {!! $errors->first('images', '<p class="help-block" style="color: red">:message</p>') !!}
                
                 <div class="form-group">
                        <div id="image_preview" class="col-sm-offset-3" style="margin-top: 10px;"></div>
                  </div> 
                  
                  <div id="see">
                      <?php $view = $AddList->CountImage()->get(); ?>
                  @foreach($view as $k => $v)
                    <div class="col-md-3" >
                    @if($k != 0)
                    <a href="{{url('/del-listing-single-image/'.$v->id)}}" class="close" aria-label="Close" onclick="return checkDelete();">
                      <span aria-hidden="true">&times;</span>
                    </a>
                    @endif
                    <br>
                    <img class="img-responsive" src="{{asset('public/images/'.$v->image)}}" style="margin-bottom: 20px" />
                    </div>
                  @endforeach
                  </div>
              
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-paper-plane"></i> <strong>  Update Listing </strong>
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
  document.forms['updateList'].elements['catgory'].value={{$AddList->cat_id}}
  document.forms['updateList'].elements['city'].value={{$AddList->city_id}}
</script>
@stop


@section('script')
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>

<script src="{{asset('public/assets/admin/js/jquery.form.js')}}"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<script>
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
<script type="text/javascript">
    $("#images").click(function(){
        $("#see").hide();
    });
</script>
@stop
    	