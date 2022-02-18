@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
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
              <h3 class="box-title "><i class="fa fa-comment-o"></i><strong> Review ({{$AddList->review()->count()}})</strong></h3>
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
      

      <?php $rr = $AddList->review()->paginate(10); ?>
      
      @foreach($rr as $data)
      <div class="row" > 
        <div class="col-xs-2">
        <?php $user = App\User::where('id',$data->user_id)->first(); ?>
          @if(!$user->profile)
          <img src="{{asset('public/assets/admin/images/pro.png')}}" class="img-circle" alt="User Image" style="width: 90px; height: 90px; text-align: center;"><br>
          @else
          <img src="{{asset('public/images/'.$user->profile)}}" class="img-circle" alt="User Image" style="width: 90px; height: 90px; text-align: center;"><br>
          @endif
          <b>{{$user->first_name}} {{$user->last_name}}</b>    
        </div>
        <div class="col-xs-10">
            <p class="text-muted well well-sm no-shadow">
            <b> {{$data->title}}</b><br> {{$data->description}}</p>
            <p><span class="review_score">
                @switch(number_format($data->rating,0))
                      @case(1)
                          <i class="fa fa-star active"></i>
                      @break
                      @case(2)
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                      @break
                      @case(3)
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                      @break
                      @case(4)
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i> 
                          <i class="fa fa-star active"></i>
                      @break
                      @case(5)
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i> 
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                      @break

                      @default
                  @endswitch
                  </span></p>
        </div>
      </div><br>
      @endforeach
      <!-- /.row -->

    </section>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              {!! $rr->render()!!}
            </div>
            
        </div>
      </div>
    </div>


    
</section>
@stop


@section('script')

@stop
      