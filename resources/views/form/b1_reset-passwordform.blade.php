@extends('form.layouts')
@section('sub-title')
| change-password
@stop

@section('content')
<style type="text/css">
    .help-block{color: red;}
</style>
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                	<h3>New Password</h3>
	                
                      @if($errors->any())
                          @foreach ($errors->all() as $error)

                              <div class="alert alert-danger alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  {!!  $error !!}
                              </div>
                          @endforeach
                      @endif
                      
                    <form role="form" method="POST" action="{{ route('admin.password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group has-feedback">
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email') }}" placeholder="Email" data-mask="email" required autofocus>
                        </div>

                        <div class="form-group  has-feedback">
                            <input type="password" name="password" class="form-control" value="" placeholder="New password">
                        </div>

                        <div class="form-group ">
                            <input type="password" name="password_confirmation" class="form-control" value="" placeholder="Confirm Password">
                            
                        </div>

                        @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if(session('error'))
                    <div class="alert alert-danger">
                        <strong>{{session('error')}}</strong>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{session('success')}}</strong>
                    </div>
                    @endif
                      @if (session('message'))
                          <div class="alert alert-{{ session('type')}}">
                              {{ session('message') }}
                          </div>
                      @endif
                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Update password">
                        </div>
                    </form>


                    <p>Back to  <a href="{{url('/login')}}">Sign In</a></p>
                    <div class="back_home"><a href="{{url('/')}}" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Back to Home</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop