@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/css/bootstrap-table.css')}}">
@stop
@section('content')	
    <section class="content-header">
    <h1>Subscribers</h1>
    	 <a href="{{ URL::to('downloadExcel/xls') }}" type="button" class="pull-right btn btn-xs"><i class="fa fa-download"></i> <b>Download xls</b></a>

  <a href="{{ URL::to('downloadExcel/xlsx') }}" type="button" class="pull-right btn btn-xs"><i class="fa fa-download"></i> <b>Download  xlsx</b></a>

  <a href="{{ URL::to('downloadExcel/csv') }}" type="button" class="pull-right btn btn-xs"><i class="fa fa-download"></i> <b>Download CSV </b></a>

    </section>
    <section class="content">
    	
<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                @if($subscribers->count() !=0 )Total Subscriber :  {{$subscribers->count()}} @endif
              </h3>
              
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="Subscribers" data-sortable="true" >Subscribers</th><th data-field="date" data-sortable="true" >Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribers as $subscribe)
                        <tr>
                          <td class="text-center"></td>
                            <td class="">{{$subscribe->email}}</td>
                            <td class="">{{$subscribe->created_at->toFormattedDateString()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer"></div>
          </div>
          <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->


    </section>

@stop

@section('script')
<script src="{{asset('public/assets/admin/js/bootstrap-table.js')}}"></script>
@stop
    	