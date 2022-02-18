<?php $__env->startSection('sub-title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('public/assets/admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<section class="content-header"><h1><?php echo e($title); ?> </h1>
<a href="#" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><strong> Bookmark-Listing</strong></h3>
              
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            <?php $__currentLoopData = $Bookmark; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="timeline-item">
                    <div class="col-md-3">
                    <a href="<?php echo e(asset('public/images/'.$data->AddList->CountImage()->first()->image)); ?>">
                    <img src="<?php echo e(asset('public/images/'.$data->AddList->CountImage()->first()->image)); ?>" alt="<?php echo e($data->AddList->title); ?>" class="img-responsive"></a>
                    </div>

                      <h3 class="timeline-header"><a href="<?php echo e(url('/single-post/'.$data->AddList->id.'/'.$data->AddList->slug)); ?>"><?php echo e($data->AddList->title); ?></a> </h3>
                      <div class="timeline-body"><?php echo e($data->AddList->short_desc); ?></div>
                      <div class="timeline-footer">
                      <p>(<?php echo e($data->AddList->review()->count('addlist_id')); ?> reviews)</p>
                        <a href="<?php echo e(url('del-to-favourites/'.$data->id)); ?>" onclick="return checkDelete()" class="btn btn-danger btn-xs">Delete</a>
                      </div>
                  </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer"></div> -->
        </div>
      </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>