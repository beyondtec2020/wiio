<?php $__env->startSection('popular-cities'); ?>
<section id="popular_cities" class="section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="bottom-line">Principais Cidades</h2>
            <p></p>
        </div>
        <div class="row">
        <?php $__currentLoopData = $city->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-md-3">
                <div class="cities_list" style="background:url(<?php echo e(asset('public/images/'.$data->city_image)); ?>) no-repeat center;">
                    <div class="city_listings_info">
                        <h4><?php echo e($data->name); ?></h4>
                        <div class="listing_number"><span style="font-weight:bold"><?php echo e($data->addlists()->where('status',1)->count()); ?> listing</span> </div>
                    </div>
                    <a href="<?php echo e(url('/single-city/'.$data->id.'/'.$data->slug)); ?>" class="overlay_link"></a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="text-center">
            <a href="<?php echo e(url('/all-cities')); ?>" class="btn">View More Cities </a>
        </div>
    </div>
</section>


<section class="" style="padding: 20px 0px;">
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                    <?php $__currentLoopData = $A728X90; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('/click-add/'.$v->id)); ?>" target="_blank"> 
                      <?php if($v->advert_type == 1): ?>
                      <img class="img-responsive" src="<?php echo e(asset('public/images/advertise/'.$v->val1)); ?>" alt="" />
                      <?php else: ?>
                          <?php echo $v->val; ?>

                      <?php endif; ?>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>