
<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from themes.webmasterdriver.net/listinghub/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Oct 2017 16:46:01 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>{!!$GeneralSetting->title!!} @yield('sub-title')</title>
<!--Bootstrap -->
<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}" type="text/css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<!--OWL Carousel slider-->
<link rel="stylesheet" href="{{asset('public/assets/css/owl.carousel.css')}}" type="text/css">
<!--FontAwesome Font Style -->
<link href="{{asset('public/assets/css/font-awesome.min.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/color.php') }}?color={{ $GeneralSetting->color }}">

<link rel="shortcut icon" href="{{asset('public/images/'.$GeneralSetting->favico_ico)}}">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 

</head>
<body>
    @yield('content')

<!-- Scripts --> 
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script> 
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('public/assets/js/interface.js')}}"></script> 
<!--Carousel-JS--> 
<script src="{{asset('public/assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript">
  $(".help-block").delay(4000).slideUp(300, function() {
       $(this).alert('close');
    });
  $(".alert").delay(4000).slideUp(300, function() {
       $(this).alert('close');
    });
</script>

 <script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";
    switch(type)
    {
        case 'info':
        toastr.info("{{Session::get('message')}}");
        break;

        case 'warning':
        toastr.warning("{{Session::get('message')}}");
        break;
        
        case 'success':
        toastr.success("{{Session::get('message')}}");
        break;
        
        case 'error':
        toastr.error("{{Session::get('message')}}");
        break;
    }
    @endif
</script>

</body>

</html>