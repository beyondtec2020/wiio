@extends('layouts.dashboard')

@section('content') 
<section class="content-header"><h1><i class="fa fa-user"></i> Add User </h1>
<a href="{{route('staffs')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>

<section class="content">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-plus"></i> Add New User</h3><br>
              <div class="col-sm-9 col-sm-offset-2">
              @include('errors.errors')
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" name="staffrm" action="{{route('savestaffs')}}" method="post">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">First Name *</label>
                  <div class="col-sm-9">
                    <input type="text" name="first_name" class="form-control"  placeholder="First Name"  autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Last Name *</label>
                  <div class="col-sm-9">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"  autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"> Email *</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" id="email" class="form-control"  placeholder="Email " onblur="makerequest(this.value, 'res');">
                  </div>
                  <span id="res" style="color: red;"></span>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"> Phone *</label>
                  <div class="col-sm-9">
                    <input type="tel" name="phone" class="form-control"  placeholder="Phone" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Password *</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" placeholder="password"  autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Confirm Password *</label>
                  <div class="col-sm-9">
                    <input type="password"  name="password_confirmation" class="form-control" placeholder="password confirmation"  autofocus>
                  </div>
                </div>
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Select Role *</label>
                  <div class="col-sm-9">
                    <select name="role" id="inputRoel" class="form-control" required>
                    <option>Select Role</option>
                    @foreach($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-2">
                    <button class="btn btn-lg btn-primary btn-block " type="submit" id="c_buttons" onclick="return val();" >
                        <i class="fa fa-paper-plane"></i> <strong>  Update Information </strong>
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

@stop