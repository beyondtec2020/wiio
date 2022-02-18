@extends('layouts.user_dashboard')

@section('sub-title')
| Add Post
@stop

@section('style')
@stop

@section('content')
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Add-List</h2>
				</div>
			</div>
		</div>



        <div class="row">
			
            <div class="col-lg-12 col-md-12">
            
            
            
          
            
				<form action="{{route('saveList')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    	<div class="add_listing_info">
                            <h3>Basic Informations</h3>				
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                                    <label class="label-title"> Title</label>
                                    <input type="text" name="title" class="form-control">
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                </div>
                            <div class="form-group {{ $errors->has('short_description') ? 'has-error' : ''}}">
                                <label class="label-title">Short Description</label>
                                <input type="text" name="short_description" class="form-control">
                                {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                                <label class="label-title">Category</label>
                                <div class="select">
                                    <select class="form-control" name="catgory" required>
                                    <option value="">Select category</option>
                                        @foreach($category as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                   
                        </div> 
                        
                        <div class="add_listing_info">
                            <h3>Contact Info</h3>				
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                <label class="label-title">Address</label>
                                <input type="text" name="address" class="form-control">
                                {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 {{ $errors->has('city') ? 'has-error' : ''}}">
                                    <label class="label-title">City</label>
                                    <div class="select">
                                        <select class="form-control" name="city">
                                        <option value="">Select city</option>
                                        @foreach($city as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                        </select>
                                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                     </div>   
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 {{ $errors->has('zip_code') ? 'has-error' : ''}}">
                                    <label class="label-title">Zip-Code</label>
                                    <input type="text" name="zip_code" class="form-control">
                                    {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                                </div>  
                                <div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
                                    <label class="label-title">Phone Number</label>
                                    <input type="text" name="phone" class="form-control">
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>  
                            </div>
                            <div class="row">
                            	<div class="form-group col-sm-6">
                                    <label class="label-title">Email <span>(optional)</span></label>
                                    <input type="text" name="email" class="form-control">
                                </div>
	                            <div class="form-group col-sm-6">
                                    <label class="label-title">Website <span>(optional)</span></label>
                                    <input type="text" name="website" class="form-control">
                                </div> 
                            </div>
                            <div class="row">
            	                <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Facebook <span>(optional)</span></label>
                                    <input type="text" name="facebook" class="form-control">
                                </div> 
        	                    <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Linkdin <span>(optional)</span></label>
                                    <input type="text" name="linkdin" class="form-control">
                                </div> 
    	                        <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Twitter <span>(optional)</span></label>
                                    <input type="text" name="twitter" class="form-control">
                                </div> 
	                            <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Google Plus <span>(optional)</span></label>
                                    <input type="text" name="google" class="form-control">
                                </div>      
                            </div>             
                        </div>
                        
                        <div class="add_listing_info">
                            <h3>Listing Details</h3>				
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label class="label-title">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                            </div>  
                            <div class="form-group">
                            	<label class="label-title">Amenities <span>(optional)</span></label>
                                <div class="checkbox">
                                <?php $i=1; $j=1; ?>
                                @foreach($Amenity as $k => $data)
                                    <p><input type="checkbox" id="amenities{{++$k}}" name="amenities[{{$j++}}]" value="{{$data->id}}" >
                                    <label for="amenities{{$i++}}">{{$data->name}}</label></p>
                                @endforeach
                                </div>
                            </div>         
                        </div>
                        
                        
                        <div class="add_listing_info">
                            <h3>Add Pricing</h3>	
                            <div class="row">			
                                <div class="form-group col-sm-6 {{ $errors->has('min_price') ? 'has-error' : ''}}">
                                    <label class="label-title">Min. Price</label>
                                    <input type="text" name="min_price" class="form-control" min="0">
                                    {!! $errors->first('min_price', '<p class="help-block">:message</p>') !!}
                                </div>  
                                 <div class="form-group col-sm-6 {{ $errors->has('max_price') ? 'has-error' : ''}}">
                                    <label class="label-title">Max. Price</label>
                                    <input type="text" name="max_price" class="form-control" min="0">
                                    {!! $errors->first('max_price', '<p class="help-block">:message</p>') !!}
                                </div>  
                            </div>
                                     
                        </div>   
                        
                        <div class="add_listing_info">
                            <h3>Add Video</h3>              
                            <div class="form-group">
                                <label class="label-title">Video Youtube URL <code>Only embeded code supported</code></label>
                                <input type="text" name="video" class="form-control">
                            </div>      
                        </div>
                        
                        <div class="add_listing_info">
                            <h3>Add Location</h3>				
                            <div class="form-group">
                                <label class="label-title">Google Location <code>Only embeded code supported</code></label>
                                <input type="text" name="location" class="form-control">
                            </div>      
                        </div>
                        
                        <div class="add_listing_info">
                            <h3>Add Gallery Images</h3>				
                            <div class="row">
                               <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
                                  <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple required />
                              </div>
                              {!! $errors->first('images', '<p class="help-block" style="color: red">:message</p>') !!}
                                <div class="form-group">
                                    <div id="image_preview"></div>
                                </div>
                            </div> 
                        </div>
                        
                        <div class="add_listing_info">
                            <input type="submit" value="Submit Listing" class="btn btn-block">
                        </div>   
                    </form>
			</div>
			</div>

@stop

@section('script')
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
@stop

