<?php $__env->startSection('banner'); ?>

<style type="text/css">
<?php $i=1; ?>
<?php $__currentLoopData = $Slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
.directory-slide-carousel .carousel-inner .item:nth-child(<?php echo e(++$k); ?>) {
    background-image: url("<?php echo e(asset('public/images/slider/'.$d->image)); ?>");
}
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</style>

<section id="banner" class="parallex-bg directory-slide-carousel">

        <!--Start Background Slider-->
        <div class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <!--Start Slide Item-->
                <div class="item active">
                    <div class="slide-carousel-overlay"></div>
                </div>
                <!--End Slide Item-->

                <!--Start Slide Item-->
                <div class="item">
                    <div class="slide-carousel-overlay"></div>
                </div>
                <!--End Slide Item-->

                <!--Start Slide Item-->
                <div class="item">
                    <div class="slide-carousel-overlay"></div>
                </div>
                <!--End Slide Item-->
            </div>
        </div>
        <!--End Background Slider-->
        <div class="intro_text white-text div_zindex carousel-search-form">
            <h1>Bem Vindo ao <?php echo e($GeneralSetting->title); ?></h1>
            <h5>Pesquise os melhores anúncios com grandes descontos</h5>
            <div class="search_form">
                <form action="<?php echo e(url('/search-listing')); ?>" method="get">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group select">
                        <select class="form-control chosen" name="category" required="">
                            <option value="">O que você está procurando?</option>
                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group select">
                         <select class="form-control chosen" name="city" required="">
                            <option value="">Cidade</option>
                            <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->slug); ?>"><?php echo e($v->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group search_btn">
                        <input type="submit" value="Pesquisar" class="btn btn-block">
                    </div>
                </form>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$(".chosen").chosen();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>