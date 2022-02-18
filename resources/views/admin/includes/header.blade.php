<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{!! $GeneralSetting->title !!} @yield('sub-title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="shortcut icon" href="{{asset('public/images/'.$GeneralSetting->favico_ico )}}">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('public/assets/admin/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/assets/admin/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/admin/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/sweetalert.css')}}">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  @yield('style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       <?php   $str = $GeneralSetting->title;?>
      <span class="logo-mini"><b>{!! $str[0] !!}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{!! $GeneralSetting->title !!}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu ">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{$AddList->where('status',0)->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{$AddList->where('status',0)->count()}} notifications to approve</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li>
                  <?php $AddList = $AddList->where('status',0)->take(5); ?>
                    @foreach($AddList as $data)
                    <a href="{{url('/preview-list/'.$data->id.'/'.$data->slug)}}"></i> {{$data->title}}</a>
                    @endforeach
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="{{url('/posts')}}">View all</a></li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(!Sentinel::getUser()->profile)
              <img src="{{asset('public/assets/admin/')}}/images/pro.png" class="user-image" alt="User Image">
              @else
              <img src="{{asset('public/images/'.Sentinel::getUser()->profile)}}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{Sentinel::getUser()->first_name}}  </span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
              @if(!Sentinel::getUser()->profile)
                <img src="{{asset('public/assets/admin/')}}/images/pro.png" class="img-circle" alt="User Image">
                @else
                <img src="{{asset('public/images/'.Sentinel::getUser()->profile)}}" class="img-circle" alt="User Image">
                @endif

                <p>
                  {{Sentinel::getUser()->first_name}}  {{Sentinel::getUser()->last_name}} - {{Sentinel::getUser()->roles()->first()->name}}
                  <small>Member since <?php $dt = \Carbon\Carbon::now();?> {{$dt->toFormattedDateString()}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('editProfile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>