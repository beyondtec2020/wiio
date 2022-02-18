<?php $__env->startSection('category-timer'); ?>
<style type="text/css">
    .categorie_timer{
        background-image:url(<?php echo e(asset('public/images/'.$bg->timer_bg)); ?>);
    }
</style>
<section class="parallex-bg section-padding categorie_timer">
    <div class="dark-overlay"></div>
    <div class="container div_zindex">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        
                        <h1> <span class="counter"><?php echo e($couponCount); ?></span>+</h1>
                        <h6>CUPONS</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        
                        <h1> <span class="counter"><?php echo e($addViewsCouont); ?> </span>+</h1>
                        <h6>VISUALIZAÇÕES</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h1><span class="counter"><?php echo e($users); ?></span>+</h1>
                        <h6>USUÁRIOS</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="timer-panel">
                    <div class="timer-panel-inner">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <h1> <span class="counter"><?php echo e(Visitor::count()); ?></span>+<?php echo e(Visitor::log()); ?></h1>
                        <h6>VISITANTES</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
 <script src="<?php echo e(asset('public/assets/js/jquery.counterup.min.js')); ?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>