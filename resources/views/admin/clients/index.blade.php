@extends('layouts.dashboard')
@section('sub-title')
 
@stop
@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/css/bootstrap-table.css')}}">
@stop
@section('content')	
<section class="content-header"><h1>Clients</h1>
<a href="{{url('/add-client')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add new Clients </b> </a>
</section>
<section class="content">
    	
<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title"></h3> -->
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="sl"  >SL.</th>
                            <th data-field="Name" data-sortable="true" >Client website </th>
                            <th data-field="image" data-sortable="true">Client Logo</th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($client as $k=>$cat)
                        <tr>
                          <td class="text-center"></td>
                          <td>{{++$k}}</td>
                            <td><a href="{{$cat->website}}" target="_blank">{{$cat->website}}</a></td>
                           <td class="">
                              <img src="{{asset('public/images/'.$cat->logo)}}" /> 
                           </td>
                            <td class="text-center">
                              @if($cat->status == 1)
                              <span class="label label-success">Active</span>
                              @else
                              <span class="label label-warning">Deactive</span>
                              @endif
                            </td>
                            <td class="">
                                <a class="btn btn-primary btn-xs" href="{{url('/edit-client/'.$cat->id)}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                <a class="btn btn-danger btn-xs" href="{{url('/del-client/'.$cat->id)}}" onclick="return checkDelete()">
                                    <span class="glyphicon glyphicon-trash"></span>  Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
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