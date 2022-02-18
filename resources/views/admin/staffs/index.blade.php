@extends('layouts.dashboard')

@section('sub-title')
 
@stop

@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/css/bootstrap-table.css')}}">
@stop
@section('content') 
<section class="content-header"><h1><i class="fa fa-user"></i> Users </h1>
<a href="{{route('addstaffs')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add User </b> </a>
</section>
<section class="content">
    
<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="Name" data-sortable="true" >Staff Name</th>
                            <th data-field="email" data-sortable="true">Staff Email </th>
                            <th data-field="phone" data-sortable="true">Phone</th>
                            <th data-field="Role" data-sortable="true">Role </th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                          <td class="text-center"></td>
                            <td class="">{{$user->first_name}} {{$user->last_name}} </td>
                         <td class="">{{$user->email}}</td>
                         <td class="">{{$user->phone}}</td>
                         <td class="">
                         @foreach($user->roles as $role)
                            {{$role->name}}
                         @endforeach
                         </td>
                            <td class="">
                              @if($user->status == 1)
                              <span class="label label-success">Active </span>
                              @else
                              <span class="label label-danger">Deactive </span>
                              @endif
                            
                            </td>
                            <td class="">
                              <a class="btn btn-primary btn-xs" href="{{url('/edit-staffs/'.$user->id)}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                              </a>
                              
                              
                              @if($user->id != 1)
                              @if($user->status == 1)
                                <a class="btn btn-warning btn-xs" href="{{url('/upb-staff/'.$user->id)}}">
                                    <span class="glyphicon glyphicon-remove"></span>  Not Allow
                                </a>
                              @else
                              <a class="btn btn-success btn-xs" href="{{url('/pb-staff/'.$user->id)}}">
                                    <span class="glyphicon glyphicon-ok"></span>  Allow Access
                                </a>
                              @endif
                            @endif
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
</div>
<!-- /.row -->
</section>
@stop



@section('script')
<script src="{{asset('public/assets/admin/js/bootstrap-table.js')}}"></script>
@stop
