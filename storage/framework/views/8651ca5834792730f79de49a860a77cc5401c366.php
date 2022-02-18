<?php $__env->startSection('category'); ?>

<style type="text/css">
    .contactus_bg {
        background-image:url(<?php echo e(asset('public/images/'.$bg->search_bg)); ?>);
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="container">
        <div class="white-text text-center div_zindex">
            <h1> Todas as Cidades</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section id="popular_cities" class="section-padding">
    <div class="container">
    	<div class="row">
        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-md-3">
                <div class="cities_list" style="background:url(<?php echo e(asset('public/images/'.$data->city_image)); ?>) no-repeat center;">
                    <div class="city_listings_info">
                        <h4><?php echo e($data->name); ?></h4>
                        <div class="listing_number"><span><?php echo e($data->addlists()->where('status',1)->count()); ?> listing</span> </div>
                    </div>
                    <a href="<?php echo e(url('/single-city/'.$data->id.'/'.$data->slug)); ?>" class="overlay_link"></a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <nav class="pagination_nav">
          <?php echo $city->links(); ?>

        </nav>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>