@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link href="{{ asset('public/assets/owl/css/owl.carousel.min.css') }}" rel="stylesheet">
<style type="text/css" media="print">
    @media print
{    
    .print,.btn
    {
        display: none !important;
    }
   @page {
    size: auto;   /* auto is the initial value */
    margin: 0px auto;  /* this affects the margin in the printer settings */
}
}
</style>
@stop
@section('content')	
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-eye"></i><strong> Preview </strong></h3>
              <a href="{{URL::previous()}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
              Title: {{$AddList->title}}
            <!-- <small>Date: {{$AddList->updated_at->toFormattedDateString()}}</small> -->

            <div class="btn-group pull-right">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @if($AddList->status == 0) 
                                <li><a href="{{url('/active-list/'.$AddList->id)}}">Active</a></li>
                                <li><a href="{{url('/expired-list/'.$AddList->id)}}">Expired</a></li>
                                @elseif($AddList->status == 1)
                                <li><a href="{{url('/pending-list/'.$AddList->id)}}">Pending</a></li>
                                <li><a href="{{url('/expired-list/'.$AddList->id)}}">Expired</a></li>
                                @elseif($AddList->status == 2)
                                <li><a href="{{url('/active-list/'.$AddList->id)}}">Active</a></li>
                                <li><a href="{{url('/pending-list/'.$AddList->id)}}">Pending</a></li>
                                @endif

                              @if($AddList->is_featured == 0) 
                              <li><a href="{{url('/allow-fetured-list/'.$AddList->id)}}">Allow Fetured</a></li>
                              @else
                              <li><a href="{{url('/disallow-fetured-list/'.$AddList->id)}}">Disallow Fetured</a></li>
                              @endif
                  </ul>
                </div>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Posted By
          <address>
            <strong>{{$AddList->user->first_name}} {{$AddList->user->last_name}}</strong><br><br>
            Phone: {{$AddList->user->phone}}<br>
            Email: {{$AddList->user->email}}
          </address>
        </div>
        <div class="col-sm-2  invoice-col col-sm-offset-4">
          @if(!$AddList->user->profile)
          <img src="{{asset('public/assets/admin/images/pro.png')}}" class="img-circle" alt="User Image"><br>
          @else
          <img src="{{asset('public/images/'.$AddList->user->profile)}}" class="img-circle" alt="User Image"><br>
          @endif
        </div>
        <div class="col-md-2">
          <a href="{{url('/preview-report/'.$AddList->id.'/'.$AddList->slug)}}" class="btn btn-info" title="Report"><i class="fa fa-flag"></i> {{$AddList->reports()->count()}}</a>
          <a href="{{url('/preview-review/'.$AddList->id.'/'.$AddList->slug)}}" class="btn btn-info" title="Review"><i class="fa fa-comment-o"></i> {{$AddList->report()->count()}}</a>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-8">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <b>Short Lines:</b>  {{$AddList->short_desc}}
            </p>
        </div>
        <div class="col-xs-4">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <b>Category name:</b> {{$AddList->cat->name}}
          </p>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-8">
            <p class="text-muted well well-sm no-shadow"><b> Address :</b> 
            {{$AddList->address}}</p>
        </div>
        <div class="col-xs-4">
        <p class="text-muted well well-sm no-shadow" ><b>City name :</b> {{$AddList->city->name}}</p>
        </div>
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow"><b> Zip-Code :</b>  {{$AddList->zip_code}}</p>
        </div>
        <div class="col-xs-6">
        <p class="text-muted well well-sm no-shadow" ><b>Phone Number :</b> {{$AddList->phone}}</p>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-6">
            <p class="text-muted well well-sm no-shadow"><b> Email :</b> {{$AddList->email}}</p>
        </div>
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" ><b>Website :</b> {{$AddList->website}}</p>
        </div>
      </div>
      <!-- /.row -->
      <div class="row"> 
        <div class="col-xs-6">
            <p class="text-muted well well-sm no-shadow"><b> Facebook :</b> {{$AddList->facebook}}</p>
        </div>
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" ><b>Linkdin :</b> {{$AddList->linkdin}}</p>
        </div>
        <div class="col-xs-6">
            <p class="text-muted well well-sm no-shadow"><b> Twitter :</b> {{$AddList->twitter}}</p>
        </div>
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" ><b>Google Plus :</b> {{$AddList->google}}</p>
        </div>
      </div>
      <!-- /.row -->

      <div class="row" > 
      <div class="text-center"> <h1>Gallery</h1></div>
      <div class="owl-carousel">
      <?php  $dd = $AddList->CountImage()->get(); ?>
        @foreach($dd as $d)
        <div class="item">
        <div class="col-xs-12">
          <img src="{{asset('public/images/'.$d->image)}}" class="img-responsive" alt="image">
        </div>
        </div>
        @endforeach
        </div>
      </div><br>
      <!-- /.row -->
     <?php $vv = $AddList->totalAmenity()->get(); ?>

      <div class="row" > 
        <div class="col-xs-4">
        <p class="text-muted well well-sm no-shadow"><b>Max Price :</b> {{$AddList->max_price}}</p>
        <p class="text-muted well well-sm no-shadow"><b>Min Price :</b> {{$AddList->max_price}}</p>
        </div>
        <div class="col-xs-8">
          {!! $AddList->video !!}
        </div>
      </div>


      <br><div class="row" > 
        <div class="col-xs-2">
          <b>Description :</b>
        </div>
        <div class="col-xs-10">
            <p class="text-muted well well-sm no-shadow"> {{$AddList->description}}</p>
        </div>
      </div>
      <!-- /.row -->

      <br><div class="row" > 
        <div class="col-xs-2">
          <b>Amenities :</b>
        </div>
        <div class="col-xs-10">
            <div class="checkbox">
              <?php $i=1; $j=1; ?>
              @foreach($Amenity as $k => $data)
              <p>
              <input type="checkbox" id="amenities{{++$k}}"  value="{{$data->id}}"  disabled=true
              @foreach($vv as  $v) {{$v->amenities_id == $data->id ? 'checked' : ''}} @endforeach >

              <label for="amenities{{$i++}}">{{$data->name}}</label></p>
              @endforeach
              </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="" onclick="myFunction()" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
    </section>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              
            </div>
            
        </div>
      </div>
    </div>


    
</section>
@stop


@section('script')
<script src="{{ asset('public/assets/owl/js/owl.carousel.js') }}"></script>
  <script>
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      })
    </script>

<script>
function myFunction() {
    window.print();
}
</script>
@stop
    	