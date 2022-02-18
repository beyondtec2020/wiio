<?php $__env->startSection('testimonials'); ?>

<style type="text/css">
    #testimonials {
    background-image:url(<?php echo e(asset('public/images/'.$bg->testimonial_bg)); ?>);
    position:relative;
}
</style>

<section id="testimonials" class="section-padding parallex-bg">
    <div class="container">
        <div class="section-header text-center white-text div_zindex">
            <h2>O que nossos clientes dizem</h2>
        </div>
        
        <div id="testimonial_slider" class="div_zindex text-center">
            <div class="owl-carousel owl-theme">
            <?php $__currentLoopData = $Testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                     <div class="testimonial_header">
                            <div>
                                <img src="<?php echo e(asset('public/images/'.$data->image)); ?>" style="width: 95px" class="center-block img-circle">
                            </div>
                            <h5><?php echo $data->name; ?></h5>
                            <p><?php echo $data->designation; ?></p>
                        </div>
                        <p><?php echo $data->description; ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>