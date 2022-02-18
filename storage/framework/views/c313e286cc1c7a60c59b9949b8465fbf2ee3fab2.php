<?php $__env->startSection('sub-title'); ?>
    <?php echo e($subtitle); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('category'); ?>
<section id="all_category" class="gray_bg">
    <div class="container">
        <div id="category_slider">
            <div class="owl-carousel owl-theme">
                <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <a href="<?php echo e(url('/single-category/'.$data->id.'/'.$data->slug)); ?>">
                        <div class="category_icon">
                            <img src="<?php echo e(asset('public/images/'.$data->cat_image)); ?>" alt="image">
                        </div>
                        <p><?php echo e($data->name); ?></p>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>        
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>