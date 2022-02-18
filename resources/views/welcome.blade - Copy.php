<!DOCTYPE HTML>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="{{$GeneralSetting->metakeywords}}">
<meta name="description" content="">
<title>{!!$GeneralSetting->title!!} @yield('sub-title') </title>
<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/assets/css/owl.carousel.css')}}" type="text/css">
<link href="{{asset('public/assets/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/color.php') }}?color={{ $GeneralSetting->color }}">
@yield('meta')
<link rel="shortcut icon" href="{{asset('public/images/'.$GeneralSetting->favico_ico)}}">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 
@yield('style')

</head>
<body>
<style type="text/css">

    .se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    /*background: url(../images/Preloader_2.gif) center no-repeat #fff;*/
    background: url({{asset('public/assets/images/Preloader_2.gif')}}) center no-repeat #fff;
}
</style>
<div class="se-pre-con"></div>
<!-- Header -->
<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
          <div class="navbar-header">
            <div class="logo"> <a href="{{url('/')}}"><img src="{{asset('public/images/'.$GeneralSetting->logo)}}" alt="image"/></a> </div>
            <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav">
              <li><a href="{{url('/')}}">Home</a></li>
              <li class="menu-item-has-children"><a href="#">Categorias</a> <span class="arrow"></span>
                 <ul class="sub-menu">
                    @foreach($cat as $k => $data)
                    <li><a href="{{url('/single-category/'.$data->id.'/'.$data->slug)}}">{{$data->name}}</a></li>
                    @endforeach
                </ul> 
              </li>
              @foreach($menu as $data)
              <li><a href="{{url('/menus/'.$data->id.'/'.$data->slug)}}">{{$data->name}}</a></li>
              @endforeach
             <!-- 
			 <li><a href="{{url('/about-us')}}">About Us</a></li> -->
              <li><a href="{{url('/contact-us')}}">Fale Conosco</a></li>

            @if(!Sentinel::getUser())
              <li><a href="{{url('/login')}}">Login</a></li>
            
            @else
            <li class="menu-item-has-children " style="">
                <a style="   cursor: pointer; "><i class="fa  fa-user"></i> {{Sentinel::getUser()->first_name}} </a>
                 <ul class="sub-menu" >
                @if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='moderator')
                <li><a href="{{url('/moderator')}}"> <i class="fa fa-home" style="font-size: 18px"></i> Painel</a></li>
                @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin')
                <li><a href="{{url('/admin')}}"> <i class="fa fa-home" style="font-size: 18px"></i> Painel</a></li>
                @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='user')
                <li><a href="{{url('/user')}}"> <i class="fa fa-home" style="font-size: 18px"></i> Painel</a></li>
                @endif
                    <li><a href="{{url('/logout')}}"> <i class="fa fa-sign-out" style="font-size: 18px"></i> Logout</a></li>
                </ul> 
            </li>
            </ul>
            @endif 

            @if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin')
            <div class="submit_listing">
                <a href="{{url('/add-lists-user')}}" class="btn outline-btn"><i class="fa  fa-plus-circle"></i> Criar Oferta Grátis</a>
            </div>
            @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='moderator')
            <div class="submit_listing">
                <a href="{{url('/add-lists-user')}}" class="btn outline-btn"><i class="fa  fa-plus-circle"></i> Criar Oferta Grátis</a>
            </div>
            @else
            <div class="submit_listing">
                <a href="{{url('/add-lists')}}" class="btn outline-btn"><i class="fa  fa-plus-circle"></i> Criar Oferta Grátis</a>
            </div>
            @endif

          </div>
        </div>
    </nav>
</header>
<!-- /Header -->

<!-- Banner -->
@yield('banner')
<!-- /Banner -->


<!-- Category-Slider -->
@yield('category')
<!-- /Category-Slider -->

<!-- Popular-Cities/Towns -->
<!-- @yield('popular-cities')  -->
<!-- /Popular Cities/Towns -->

<!-- Popular-Listings -->
 @yield('popular_listings')  
 
<!-- /Popular-Listings -->

<!-- Testimonials -->
<!--@yield('testimonials') -->
<!-- /Testimonials -->

<!-- Featured-->
 @yield('most-review')  


<!--Category Timer -->
@yield('category-timer')
<!--Category Timer -->

<!-- Latest-Blog -->
@yield('latest')
<!-- /Latest-Blog -->

<!-- zaher Disabled testimonials and subscribe zaher 13/oct/2018
<section class="section-bottom " id="">
    
    <div class="row half-row">

        <div class="col-sm-6 half-div color">
            <div class="half-inner">

                <h4 class="bold uppercase" style="color: #fff">Our Clients</h4>
                <p>Some of our great customers who use our Products</p>
            
        
                <div class="partners-carousel alt">
                    <div class="owl-carousel" id="partners-alt">
                    @foreach($client as $data)
                    <div><a href="{{$data->website}}" target="_blank"><img src="{{asset('public/images/'.$data->logo)}}" alt=""/></a></div>
                    @endforeach
                    </div>
                </div>

            </div>
        </div>   

        <div class="col-sm-6 half-div image">
            <div class="half-inner">
                <div class="form-subscribe-wrapper alt">
                <h4>SUBSCRIBE TO OUR NEWSLETTER</h4>
                <p>Subscribe to our newsletter for latest Updates directly in your inbox.</p>
                
                    <form action="{{url('/subscribe')}}" method="post" data-toggle="validator" class="form-subscribe alt" id="form-subscribe">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="formSubscribeEmail" class="sr-only">Enter your email address</label>
                            <input type="email" name="email" class="form-control" name="formSubscribeEmail" id="formSubscribeEmail"
                                   placeholder="Enter your email here" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <button type="submit" class="btn btn-submit">Subscribe Today</button>
                    </form>
                    
                    <p class="form-subscribe-text-sm">* We don’t share any of your information to others</p>

                </div>

            </div>
        </div>

    </div>

</section>
-->

<!-- Footer -->
<footer id="footer" class="secondary-bg">

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="footer_widgets">
                    <div class="logo--footer">
                        <a href="{{url('/')}}"><img src="{{asset('public/images/'.$GeneralSetting->logo)}}" alt="logo" ></a>
                    </div>
                    <br>
                    <p class="text-justify">{!! $GeneralSetting->short_bio !!}</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="footer_widgets">
                    <h5>Categories</h5>
                    <div class="footer_nav">
                        <ul>
                            @foreach($cat as $k => $data)
                            <li><a href="{{url('/single-category/'.$data->id.'/'.$data->slug)}}">{{$data->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="footer_widgets">
                    <div class="footer_widgets">
                    <h5>Connect with Us</h5>
                    <div class="follow_us">
                        <p>
                            <strong>Email:</strong> {!!$GeneralSetting->office_email!!} <br>
                            <strong>Phone:</strong> {!!$GeneralSetting->phone!!}
                        </p>
                        <ul>
                        @foreach($Social as $data)
                            <li><a href="{{$data->link}}" target="_blank">{!! $data->code !!}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p class="text-left">{!! $GeneralSetting->footer !!}</p>
                </div>
                <div class="col-md-offset-2">
                    <div class="footer-menu">
                        <nav>
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                            <!-- Disabled sitemap zaher 12/oct/2018
							<li><a href="{{url('/privacy')}}">Privacy Policy</a></li>                       
							<li><a href="{{url('/site-map')}}">Sitemap</a></li>
							<li><a href="{{url('/terms-and-condition')}}">Terms & condition</a></li>
							-->
                            <li><a href="{{url('/contact-us')}}">Fale Conosco</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->

 <div class="totop" style="">
    <!--Start ClickToTop-->
    <a href="#top"><i class="fa fa-angle-up"></i></a>
</div>

<!-- Scripts --> 
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('public/assets/js/interface.js')}}"></script> 
<!--Carousel-JS--> 
<script src="{{asset('public/assets/js/owl.carousel.min.js')}}"></script>    
<script src="{{asset('public/assets/js/jquery.flexdatalist.js')}}"></script>
<script src="{{asset('public/assets/js/custom.js')}}"></script>

@yield('script')
<script type="text/javascript">
    @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}";
        var message = "{{Session::get('message')}}";
        showMessage(message, type);
    @endif

    $(window).on( "load", function() {
        $(".se-pre-con").fadeOut("slow");
    });

    $(".text-danger").delay(10000).slideUp(300, function() {
        $(this).alert('close');
    });

    $( document ).ready(function() {
        $('a[href=#top]').on('click', function () {
        $('body,html').animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 250) {
            $('.totop').fadeIn();
        } else {
            $('.totop').fadeOut();
        }
    });
});
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-64287157-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-64287157-1');
</script>


</body>
</html>
