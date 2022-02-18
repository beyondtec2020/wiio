<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title><?php echo $GeneralSetting->title; ?> <?php echo $__env->yieldContent('sub-title'); ?></title>
<!--Bootstrap -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/bootstrap.min.css')); ?>" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/style.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/dashboard.css')); ?>" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/owl.carousel.css')); ?>" type="text/css">
<!--FontAwesome Font Style -->
<link href="<?php echo e(asset('public/assets/css/font-awesome.min.css')); ?>" rel="stylesheet">
<!-- Fav and touch icons -->
<link rel="shortcut icon" href="<?php echo e(asset('public/images/'.$GeneralSetting->favico_ico )); ?>">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/sweetalert.css')); ?>">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<?php echo $__env->yieldContent('style'); ?>
</head>
<body>
<div class="dashboard_container">
	<!-- Header -->
	<header id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container" style="width: 98%;">
               <div class="navbar-header">
                <div class="logo"> <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('public/images/'.$GeneralSetting->logo)); ?>" alt="image"/></a> </div>
                <div id="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i></div>
              </div>
                <div class="collapse navbar-collapse" id="navigation">
                    <div class="user_nav">
                        <div class="dropdown">
                          <span id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          
                      <?php if(Sentinel::getUser()->profile == null): ?>
                        <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" alt="img"> 
                      <?php else: ?>
                      <img src="<?php echo e(asset('public/images/'.Sentinel::getUser()->profile)); ?>" alt="img"><?php endif; ?>
                            
                          </span>
                          <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="<?php echo e(url('/user')); ?>"><i class="fa fa-cogs"></i> Painel de Controle</a></li>
                            <li><a href="<?php echo e(route('viewUserProfile')); ?>"><i class="fa fa-user-o"></i> Meu Perfil</a></li>
                            <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-power-off"></i> Sair</a></li>                   
                          </ul>
                        </div>
                    </div>
                    <div class="submit_listing">
                        <a href="<?php echo e(url('/add-lists')); ?>" class="btn outline-btn"><i class="fa  fa-plus-circle"></i> Criar Oferta Grátis</a>
                     </div>
                </div>
             </div>   
        </nav>
    </header>
	<!-- /Header -->

	<div id="dashboard">
	<!-- Navigation -->
	<div id="dashboard-nav" class="dashboard-nav">	
		<ul>
        	<li class="<?php echo e(url()->current() == url('/user')?'active':''); ?>" >
          <a href="<?php echo e(url('/user')); ?>"><i class="fa fa-cogs"></i> Painel de Controle</a></li>
			<li><a id="MLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list"></i> Meus Anúncios</a>

				<ul class="dropdown-menu" aria-labelledby="MLabel">
        <?php $userId = Sentinel::getUser()->id;?>
					<li><a href="<?php echo e(route('activeShowList')); ?>">Ativos <span class="nav-tag green">
            <?php echo e($AddList->where('user_id',$userId)->where('status',1)->count()); ?></span></a></li>
					<li><a href="<?php echo e(route('pendingList')); ?>">Pendentes <span class="nav-tag yellow">
            <?php echo e($AddList->where('user_id',$userId)->where('status',0)->count()); ?></span></a></li>
					<li><a href="<?php echo e(route('expiredList')); ?>">Vencidos <span class="nav-tag red">
            <?php echo e($AddList->where('user_id',$userId)->where('status',2)->count()); ?></span></a></li>
				</ul>	
			</li>

			<li class="<?php echo e(url()->current() == url('/review-lists')?'active':''); ?>">
      <a href="<?php echo e(url('/review-lists')); ?>"><i class="fa fa-star-o"></i> Avaliações</a></li>

			<li class="<?php echo e(url()->current() == url('/bookmarks')?'active':''); ?>">
      <a href="<?php echo e(url('/bookmarks')); ?>"><i class="fa fa-bookmark-o"></i> Favoritos</a></li>

			<li class="<?php echo e(url()->current() == url('/add-lists')?'active':''); ?>">
      <a href="<?php echo e(url('/add-lists')); ?>"><i class="fa fa-plus"></i> Criar Anúncio</a></li>

      <li class="<?php echo e(url()->current() == route('viewUserProfile')?'active':''); ?>">
      <a href="<?php echo e(route('viewUserProfile')); ?>"><i class="fa fa-user-o"></i> Meu Perfil</a></li>
			<li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-power-off"></i> Sair</a></li>
		</ul>	
	</div>
	<!-- Navigation / End -->

	<!-- Content -->
	<div class="dashboard-content">
		<?php echo $__env->yieldContent('content'); ?>

		<div class="row">
			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights"><?php echo $GeneralSetting->footer; ?></div>
			</div>
		</div>
	</div>
	<!-- Content / End -->
</div>
</div>

<!-- Scripts --> 
<script src="<?php echo e(asset('public/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/bootstrap.min.js')); ?>"></script> 
<script src="<?php echo e(asset('public/assets/js/interface.js')); ?>"></script> 
<!--Carousel-JS--> 
<script src="<?php echo e(asset('public/assets/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/sweetalert.js')); ?>"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?php echo e(asset('public/assets/js/custom.js')); ?>"></script>
<?php echo $__env->make('Alerts::alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
    $(".alert").delay(4000).slideUp(300, function() {
        $(this).alert('close');
    });

    <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type','info')); ?>";
        var message = "<?php echo e(Session::get('message')); ?>";
        showMessage(message, type);
    <?php endif; ?>

</script>
<?php echo $__env->yieldContent('script'); ?>

</body>
</html>